<?php

	$dbServername = 'mysql:host=localhost;dbname=camagru';
	$dbHost = "localhost";
	$dbUsername = "root";
	$dbPassword = "123456";
	$dbName = "camagru";

	$conn = new PDO('mysql:host='.$dbHost, $dbUsername, $dbPassword);
	
	if ($conn) {
		echo "Connected<br>";
	}
	else {
		die(" ");
		echo "connection failed<br>"; 
	}
?>