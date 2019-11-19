<?php

	include_once('database.php');
	try{

		$conn = new PDO('mysql:host='.$dbHost, $dbUsername, $dbPassword);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "CREATE DATABASE IF NOT EXISTS `$dbName`";
		$conn->exec($sql);

	}
	catch (PDOException $e) {

		echo $e->getMessage();
	}

	$conn = NULL;

	try{

		$conn = new PDO($dbServername, $dbUsername, $dbPassword);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("CREATE TABLE IF NOT EXISTS `users` ( 
		`id` INT NOT NULL AUTO_INCREMENT , 
		`username` VARCHAR(50) NOT NULL , 
		`email` VARCHAR(50) NOT NULL , 
		`password` VARCHAR(250) NOT NULL , 
		`notifications` BOOLEAN NOT NULL DEFAULT TRUE , 
		`ver_code` VARCHAR(250) NOT NULL , 
		`ver` BOOLEAN NOT NULL DEFAULT FALSE , PRIMARY KEY (`id`)) ENGINE = InnoDB;");
		$stmt->execute();
		echo "table created";
		header ("Location: ../index.php");

	}
	catch (PDOException $e) {
		echo $e->getMessage();
	}
?>