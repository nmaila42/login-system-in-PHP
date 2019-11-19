<?php 
	session_start();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>login system</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	
	<header id="header" class="">
		<nav>
			<div class="main-wrapper">
				<ul>
					<li><a href="index.php" title="">Home</a></li>
				</ul>
				<div class="nav-login">
					<?php
						if (isset($_SESSION['username'])) {
							echo '<form action="includes/logout.inc.php" method="POST">
								<button type="submit" name = "submit">Logout</button>
								</form>
								<a href=update_profile.php"><name="update profile">Update Profile</a>';
						} else {
							echo 	'<form action="includes/login.inc.php" method="POST">
									<input type="text" name="username" placeholder="Username">
									<input type="password" name="password" placeholder="Password">
									<button type="submit" name="login">Login</button>
									</form>
									<a href="reset_password.php"><name="forgot password?">Forgot Password</a>
									<a href="register.php">Register</a>';
						}
					?>
				</div>
			</div>
		</nav>
	</header><!-- /header -->