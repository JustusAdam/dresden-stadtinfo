<?php
	require_once("db_connect.php");
	include("numbers.php");
	include("content_filler.php");
?>
<!DOCTYPE html>

<html>
<head>
	<title><?php echo "$heading"?></title>
	<link rel="stylesheet" href="generic.css" type="text/css">
</head>
<body>
	<header>
		<div id="HeaderContent">
			<div id="StartButton" onclick="document.location.href='index.html'">
				Start
			</div>
			
			<div id="Title"> 
				<?php 
				echo "$heading";
				?>
			</div>
			
			<div id="UpButtonContainer">
				<div id="Up" onclick="document.location.href='#'">
					&#x21E7
				</div>
			</div>
		</div>
	</header>
	<div id="Global">
		
		<div class="BigBox1">
		
		<h1>Karte? Welche Karte?</h1>
		
		
		</div>
		
		<div id="SmallBoxContainer">
		
			<div class="SmallBox1">
				<?php
					echo "$text";
					?>
			</div>
			
			
			<div class="SmallBox2">
			
			<h1>Insert audio here!</h1>
			
			</div>
		
		</div>
		
		<div class="BigBox2">
		
		<h3>Bildergalerie? Hier gibts keine Bildergalerie. Da m&uuml;ssen sie sich in der Adresse vertan haben. Ja, versuchen sie es mal bei Schulze in der 4ten Etage.</h3>
		</div>
		
	</div>
</body>
</html>
