<?php 

session_start();

if (isset($_POST['login'])) {
	include '../config/setup.php';

	$username = $_POST['username'];
	$password = $_POST['password'];

	//Error handlers
	//Check if inputs are empty
	if (empty($username) || empty($password)) {
			echo "fill in fields";
			header("Location: ../index.php?login=empty");
			exit();
	} else {

		try {
			$sql = "SELECT * FROM users WHERE username=? AND `password`=?";
			$stmt = $conn->prepare($sql);
			$stmt->execute([$username, $password]);

			if ($results = $stmt->fetch(PDO::FETCH_ASSOC)) {

				if ($results === FALSE){
					echo "INCORRECT username or Password";
				} else {

					$_SESSION['id'] = $results['id'];
					$_SESSION['username'] =  $results['username'];
					header("Location: ../index.php?login=success");
				} 
			} else {

					header("Location: ../index.php?login=error");
					exit();
				}
			}
			catch (PDOException $e) {
				
				echo $e->getMessage();
			}
	}
}
else {
	header("Location: ../index.php?login=error");
	exit();
}
?>

<!-- // $passwordcheck = password_verify($password, $results['password']);
				// if ($passwordcheck === FALSE) {
				// 	//header("Location: ../index.php?error=userdoesnotexist");
				// 	exit();
				// }
			 	// else if ($passwordcheck === TRUE) {
				// 	//Log in the user here
				// 	$_SESSION['id'] = $results['id'];
				// 	$_SESSION['username'] = $results['username'];

				// 	//header("Location: ../index.php?login=success");
				// 	exit();
				//  } -->