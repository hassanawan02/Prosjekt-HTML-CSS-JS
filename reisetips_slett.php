<!doctype html>
<head>
	<title> Dynamisk side mal </title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="stilark.css">

</head>
<body>
	<div class="innpakning">
	<h1></h1>
	
	<?php 
	if(isset($_POST["slett_id"])) {
		$slett_id = $_POST["slett_id"];
	
	$tjener = "127.0.0.1";
		$brukernavn = "root";
		$passord = "";
		$database = "reisetips_endelig";
		
		$kobling = new mysqli($tjener, $brukernavn, $passord, $database);
		
		if($kobling->connect_error) {
			die("Noe gikk galt!" . $kobling->connect_error);
		}
		else {
			echo "Koblingen er korrekt!";
		}
		
		$kobling->set_charset("utf8");
	}
	else {
		die("Du må angi et reisetips");
	}	
		$sql = "DELETE FROM reisetips WHERE reisetips_id='$slett_id'";
		if($kobling->query($sql)) {
			echo "Spørringen $sql ble gjennomført.";
		}
		else {
			echo "Noe gikk galt med spørringen $sql ($kobling->error)";
		}
	
	?>
	</div>


</body>
</html>