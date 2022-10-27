<!doctype html>
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
form {
	background-color: white;
}
input {
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
		
		$sql = "SELECT * FROM reisetips WHERE attraksjon_id='5'";
		$resultat = $kobling->query($sql);
		
		
	
		echo "<h1 class='overskrift'>Reisetips for Chidorigafuchi</h1>";
		echo "<table>";
		echo "<tr><th>Tittel</th><th>Kommentar</th><th>Navn</th><th>Dato og tid</th></tr>";
		while($rad = $resultat->fetch_assoc()) {
			$tittel = $rad["tittel"];
			$kommentar = $rad["kommentar"];
			$navn = $rad["navn"];
			$dato = $rad["dato"];
			
			echo "<tr><td>$tittel</td><td>$kommentar</td> <td> $navn</td><td>$dato</td></tr>";
		}
		echo "</table>";
		echo "<br>Kilder: <a class='kilde' href='https://no.tripadvisor.com/Attraction_Review-g1066443-d1373705-Reviews-Chidorigafuchi-Chiyoda_Tokyo_Tokyo_Prefecture_Kanto.html'>https://no.tripadvisor.com/Attraction_Review-g1066443-d1373705-Reviews-Chidorigafuchi-Chiyoda_Tokyo_Tokyo_Prefecture_Kanto.html</a>";
	?>
		<?php 
		if(isset($_POST["leggtil"])) {
		
		$kobling = new mysqli($tjener, $brukernavn, $passord, $database);
		
		$kobling->set_charset("utf8");

			
		
		$tittelleggtil = $_POST["tittel"];
		$kommentarleggtil = $_POST["kommentar"];
		$navnleggtil = $_POST["navn"];
		$attraksjon_id = $_POST["attraksjon_id"];
		
			
		$sql = "INSERT INTO reisetips (tittel, kommentar, navn, attraksjon_id) VALUES ('$tittelleggtil', '$kommentarleggtil', '$navnleggtil', '$attraksjon_id')";
		
		if($kobling->query($sql)) {
			echo "Spørringen $sql ble gjennomført!";
		}
		else {
			echo "Noe gikk galt med spørringen $sql ($kobling->error)";
		}
		}	
	?>
		<form method="POST">
		<h1 class="overskrift">Legg til reisetips</h1>
		Tittel: 
		<input type="text" name="tittel"> <br> <br>
		Kommentar: 
		<input type="text" name="kommentar"><br><br>
		Navn: 
		<input type="text" name="navn"><br><br>
		Attraksjon id:  
		<input type="number" name="attraksjon_id"><br><br>
		<input type="submit" name="leggtil" value="Legg til">
		</form>
			<?php 
		
		$kobling->set_charset("utf8");
		$sql = "SELECT * FROM reisetips WHERE attraksjon_id='5'";
		$resultat = $kobling->query($sql);
		
		
		echo "<h1 class='overskrift'> Slett reisetips for Chidorigafuchi </h1>";
		echo "<table>";
		while($rad = $resultat->fetch_assoc()) {
			$reisetips_id = $rad["reisetips_id"];
			$tittel = $rad["tittel"];
			$kommentar = $rad["kommentar"];
			$navn = $rad["navn"];
			$dato = $rad["dato"];
			
			echo "<form method='POST' action='reisetips_slett.php'>";
			echo "<input type='hidden' name='slett_id' value='$reisetips_id'>";
				echo "<tr>";
					echo "<td>$tittel</td>";
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