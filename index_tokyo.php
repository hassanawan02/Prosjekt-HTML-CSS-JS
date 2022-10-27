<!doctype html>
<head>
	<title> Sykkelklubben </title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="index_stil.css">
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


	</style>

</head>
<body>
	<div class="innpakning">
	<div class="topptekst"> <h1>Reis til Tokyo</h1></div>
	<div class="banner"><img src="bilder/tokyo_banner.jpg" class="logobanner"></div>
	<div class="menyvalg">
	            <nav>
                <ul>
                    <li><a href="0mal.php">Hjem</a></li>
                    <li><a href="flybillett.php">Flybillett</a></li>
                    <li><a href="hotell.php">Hotell</a></li>
                    <li><a href="spisesteder.php">Spisesteder</a></li>
					<li><a href="attraksjoner.php">Attraksjoner</a></li>
					<li><a href="transportmidler.php">Transportmidler</a></li>
                </ul>
            </nav>
	</div>
	<div class="info">
	<p class="velkommen">Morsomme fakta om Tokyo: </p>
	<ol class="fakta">
		<li class="fakta">Tokyo er faktisk et av de mest teknologiske byene i verden!</li><br>
		<li class="fakta">Tokyo pleide før å hete Edo</li><br>
		<li class="fakta">Det er lite krim i Tokyo, og det er veldig trygt</li><br>
		<li class="fakta">Du kan se Fuji-fjellet fra Tokyo når været er klart</li><br>
	</ol>
	</div>
	<div class="bunntekst">
	<p class="sluttekst">Av Hassan Awan</p>
	</div>

	</div>


</body>
</html>