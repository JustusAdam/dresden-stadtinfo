<?php
	$db = mysqli_connect("localhost", "test", "test", "project1");
	if(!$db){
		exit("Error: ".mysqli_connect_error());
	}
?>
