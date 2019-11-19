<?php

if (isset($_POST['register'])) {
	
	require '../config/setup.php';

	// $username = mysql_real_escape_string($conn, $_POST['username']);
	// $email = mysql_real_escape_string($conn, $_POST['email']);
	// $password = mysql_real_escape_string($conn, $_POST['password']);
	// $repeat_pwd = mysql_real_escape_string($conn, $_POST['repeat_pwd']);

	$username = ($_POST['username']);
	$email = ($_POST['email']);
	$password = ($_POST['password']);
	$repeat_pwd = ($_POST['repeat_pwd']);

	//Error handlers
	//Check for empty fields
	if (empty($username) || empty($email) || empty($password) || empty($repeat_pwd)) {
			header ("Location: ../register.php?error=emptyfields&user=".$username."&mail=".$email);
			exit();
		} 
	//Check if input email & username are valid characters 
	else if (!preg_match("/^[a-zA-Z0-9]*$/", $username) && !filter_var($email, FILTER_VALIDATE_EMAIL)){
		header ("Location: ../register.php?error=invaliduseremail");
		exit();
		} 	
	//Check if input username is valid characters 
	else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
			header ("Location: ../register.php?error=invaliduser&mail=".$email);
			exit();
		} 
	//Check if input email & password are valid characters 
	else if (!preg_match("/^[a-zA-Z0-9]*$/", $password)){
		header ("Location: ../register.php?error=invalidpassword");
		exit();
	} 
	//Check if email is valid
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			header ("Location: ../register.php?error=invalidemail&user=".$username);
			exit();
		}
	else if ($password !== $repeat_pwd) {
			header ("Location: ../register.php?error=passwordcheck&user=".$username."&mail=".$email);
			exit();
		} 
	else {

		$exists = FALSE;

		try{
			$sql = "SELECT * FROM `camagru`.`users` WHERE username=? or email=?";
			$stmt = $conn->prepare($sql);
			$stmt->execute([$username, $email]);
			$results = $stmt->fetch(PDO::FETCH_ASSOC);

			if ($results) {
				$exits = TRUE;

					echo "username already taken <br/>";
					header ("Location: ../register.php?error=usertaken");
					exit();
			} else {
				//Hashing the password/ver_code
				$hashedPwd = hash('sha1', $password);;
				$ver_code = hash('sha1', $username);
					
				//Insert the user into the database
				$sql = "INSERT INTO `camagru`.`users` (username, email, `password`, notifications, ver_code, ) VALUES (?, ?, ?, 0, ?);";
				$stmt = $conn->prepare($sql);
				echo "i got here";
				$stmt->execute([$username, $email, $hashedPwd, $ver_code]);
				echo 'seccessfull <br />';
				header ("Location: ../register.php?signup=success");
				exit();
			}
		} 
		catch (PDOException $e) {
				echo $e->getMessage();
			}
		}
		if (!$exists){

			try{
				$sql = 'INSERT INTO users (username, `email`, `password`, notifications, ver_code) VALUES (?, ?, ?, 0, ?)';
				$stmt = $conn->prepare($sql);
				$stmt->execute([$username, $email, $password, $ver_code]);
				echo 'seccessfull <br />';
				
				$msg= "click the link to verify your account: http://127.0.0.1:8080/redirect_here.php?ver_code=$ver_code";
				$headers = array(
					'From: noreply');
	
				mail($email, "Verification email", $msg, implode("\r\n",$headers));
				echo "<br />Check your email ";
	
			} catch (PDOException $e){
				echo $e->getMessage();
			}
		}
	} 
	else {
		header ("Location: ../register.php");
		exit();
	}