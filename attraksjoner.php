<!doctype html>
<html>
<head>
	<title> Dynamisk side mal </title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="stilark.css">
	<style>
					* {
    background-color: lightgray;
    font-family: Century Gothic;
    font-size: 16px;
}
.innpakning {
    background-color: white;
    width: auto;
    margin: auto;
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
}
.topptekst {
	background-color: #FFA0CB;
    color: #DBC24D;
    margin: auto;
    display: block;
    padding: 5px;
    order: 1;
    flex-basis: 100%;
    height: 120px;
    font-size: 45px;
    font-weight: bold;
    height: 75px;
}
.banner {
	order: 2;
	display: 5px;
	width: 1333x;
}
.logobanner {
	display: block;
    margin: auto;
    width: 1333px;
	border-top: 4px solid white;
    border-bottom: 4px solid white;
}
.menyvalg {
	order: 3;
}
ul {
    background-color: #FFA0CB;
    list-style-type: none;
    margin: 0;
    padding: 10px;
}
ul li {
    display: inline;
}
nav {
    float: right;
    width: 1333px;
}
ul a {
    padding: 10px 30px;
    color: black;
    font-weight: bold;
    text-decoration: none;
    background-color: #FFA0CB;
    
}
ul a:hover {
    background-color: purple;
}
.info {
	order: 4;
	background-color: white;
    color: black;
    width: 1333px;
    padding: 5px;
    margin: 5px;
}
.bilde {
	border-radius: 5px;
	border: 5px solid #FFA0CB;
}
.bunntekst {
	order: 5;
	background-color: #FFA0CB;
    color: black;
    flex-basis: 100%;
    margin: auto;
    display: block;
    padding: 5px;
}
h1 {
	background-color: #FFA0CB;
	color: black;
	font-size: 40px;
}
.velkommen {
	background-color: white;
	color: black
	font-size: 50px;
}
ol {
	background-color: white;
	color: black;
	list-style-type: none;
}
.fakta {
	background-color: white;
	color: black;
}
ol li {
	display: inline;
}
.sluttekst {
	background-color: #FFA0CB;
	color: black;
}
table {
		border-collapse: collapse;
		background-color: white;
	}
th, td {
		border: 1px solid;
		padding: 5px;
		background-color: white;
	}
.overskrift {
	background-color: white
}
.kilde {
	background-color: white
}
input {
	background-color: white;
}
form {
	background-color: white;
}
h2 {
	background-color: white;
}
	</style>

</head>
<body>
	<div class="innpakning">
	<div class="topptekst"> <h1>Reis til Tokyo</h1></div>
	<div class="banner"><img src="bilder/tokyo_banner.jpg" class="logobanner"></div>
	<div class="menyvalg">
	            <nav>
                <ul>
                    <li><a href="index_tokyo.php">Hjem</a></li>
                    <li><a href="flybillett.php">Flybillett</a></li>
                    <li><a href="hotell.php">Hotell</a></li>
                    <li><a href="spisesteder.php">Spisesteder</a></li>
					<li><a href="attraksjoner.php">Attraksjoner</a></li>
					<li><a href="transportmidler.php">Transportmidler</a></li>
                </ul>
            </nav>
	</div>
	<div class="info">
		<?php
		$tjener = "127.0.0.1";
		$brukernavn = "root";
		$passord = "";
		$database = "reisetips_endelig";
		
		$kobling = new mysqli($tjener, $brukernavn, $passord, $database);
		
		$kobling->set_charset("utf8");
		
		$sql = "SELECT attraksjon_id, attraksjonsnavn, gatenavn, gatenummer, attraksjon.postnummer AS apostnr, beskrivelse, bilde, poststed.postnummer AS postnr, sted FROM attraksjon JOIN poststed ON attraksjon.postnummer=poststed.postnummer";
		$resultat = $kobling->query($sql);
		
		
	
		echo "<h1 class='overskrift'>Oversikt over transportmidler i Tokyo</h1>";
		echo "<h2>Trykk på navnet til en attraksjon for å se reisetipene om dem!</h2>";
		echo "<table>";
		echo "<tr><th>Attraksjonens navn</th><th>Adresse</th><th>Beskrivelse</th><th>Bilde</th></tr>";
		while($rad = $resultat->fetch_assoc()) {
			$attraksjon_id = $rad["attraksjon_id"];
			$attraksjonsnavn = $rad["attraksjonsnavn"];
			$gatenavn = $rad["gatenavn"];
			$gatenummer = $rad["gatenummer"];
			$postnummer = $rad["apostnr"];
			$sted = $rad["sted"];
			$beskrivelse = $rad["beskrivelse"];
			$bilde = $rad["bilde"];
			
			echo "<tr><td><a class='kilde' href='reisetips$attraksjon_id.php'>$attraksjonsnavn</a> </td><td>$gatenavn, $gatenummer, $postnummer, $sted, Tokyo, Japan</td> <td> $beskrivelse</td><td><img src='bilder/$bilde'></td></tr>";
			
		}
		echo "</table>";
		echo "<br>Kilder: <a class='kilde' href='https://no.tripadvisor.com/Attractions-g298184-Activities-a_allAttractions.true-Tokyo_Tokyo_Prefecture_Kanto.html'>https://no.tripadvisor.com/Attractions-g298184-Activities-a_allAttractions.true-Tokyo_Tokyo_Prefecture_Kanto.html</a>";
	?>
				<?php 
		if(isset($_POST["leggtilpost"])) {
		
		$kobling = new mysqli($tjener, $brukernavn, $passord, $database);
		
		$kobling->set_charset("utf8");

		$postnummer = $_POST["postnummer"];
		$sted = $_POST["sted"];
		
			
		$sql = "INSERT INTO poststed (postnummer, sted) VALUES ('$postnummer', '$sted')";
		if($kobling->query($sql)) {
			echo "Spørringen $sql ble gjennomført!";
		}
		else {
			echo "Noe gikk galt med spørringen $sql ($kobling->error)";
		}
		}	
	?>
		<form method="POST">
		<h1 class="overskrift">Legg til attraksjoner</h1>
		<h2>Legg til postnummer og sted før du legger til selve attraksjonen!</h2>
		Postnummer: 
		<input type="text" name="postnummer"><br><br>
		Sted: 
		<input type="text" name="sted"><br><br>
		<input type="submit" name="leggtilpost" value="Legg til">
		</form><br>
			<?php 
		if(isset($_POST["leggtil"])) {
		
		$kobling = new mysqli($tjener, $brukernavn, $passord, $database);
		
		$kobling->set_charset("utf8");

		$attraksjonsnavn = $_POST["attraksjonsnavn"];
		$gatenavn = $_POST["gatenavn"];
		$gatenummer = $_POST["gatenummer"];
		$postnummer = $_POST["postnummer"];
		$beskrivelse = $_POST["beskrivelse"];
		$bilde = $_POST["bilde"];
		
			
		$sql = "INSERT INTO attraksjon (attraksjonsnavn, gatenavn, gatenummer, postnummer, beskrivelse, bilde) VALUES ('$attraksjonsnavn', '$gatenavn', '$gatenummer', '$postnummer', '$beskrivelse', '$bilde')";
		if($kobling->query($sql)) {
			echo "Spørringen $sql ble gjennomført!";
		}
		else {
			echo "Noe gikk galt med spørringen $sql ($kobling->error)";
		}
		}	
	?>
		<h2>Attraksjon</h2>
		<form method="POST">
		Attraksjonsnavn: 
		<input type="text" name="attraksjonsnavn"> <br> <br>
		Gatenavn: 
		<input type="text" name="gatenavn"><br><br>
		Gatenummer: 
		<input type="text" name="gatenummer"><br><br>
		Postnummer: 
		<input type="text" name="postnummer"><br><br>
		Beskrivelse: 
		<input type="text" name="beskrivelse"><br><br>
		Bilde(filnavn): 
		<input type="text" name="bilde"><br><br>
		<input type="submit" name="leggtil" value="Legg til">
		</form>
		
				<?php 
		
		$kobling->set_charset("utf8");
		$sql = "SELECT * FROM attraksjon";
		$resultat = $kobling->query($sql);
		
		
		echo "<h1 class='overskrift'> Slett attraksjoner </h1>";
		echo "<table>";
		while($rad = $resultat->fetch_assoc()) {
			$attraksjon_id = $rad["attraksjon_id"];
			$attraksjonsnavn = $rad["attraksjonsnavn"];
			
			echo "<form method='POST' action='attraksjon_slett.php'>";
			echo "<input type='hidden' name='slett_id' value='$attraksjon_id'>";
				echo "<tr>";
					echo "<td>$attraksjonsnavn</td>";
					echo "<td><input type='submit' value='Slett'></td>";
					echo "</tr>";
			echo "</form>";			
		}
		echo "</table>";
		
	
	?>
	</div>
	<div class="bunntekst">
	<p class="sluttekst">Av Hassan Awan</p>
	</div>

	</div>
	



</body>
</html>