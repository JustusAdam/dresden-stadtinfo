<?php
	$db = mysqli_connect("localhost", "test-user", "test", "project1");
	if(!$db){
		exit("Error: ".mysqli_connect_error());
	}
	
?>
