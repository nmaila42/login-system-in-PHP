<?php 
	include_once 'header.php';
 ?>
	<section class="main-container">
		<div class="main-wrapper">
			<h2>Sign-Up</h2>
			<?php
			if (isset($_GET['error'])) {
				if ($_GET['error'] == "emptyfields") {
					echo '<p class="error"><h3>Please Fill in all Fields</h3></p>';
				}
			}
			if (isset($_GET['error'])) {
				if ($_GET['error'] == "usertaken") {
					echo '<p class="error"><h3>Username already taken, please pick a new one.</h3></p>';
				}
			}
			if (isset($_GET['error'])) {
				if ($_GET['error'] == "passwordcheck") {
					echo '<p class="error"><h3>Passwords do not match, please try again.</h3></p>';
				}
			}
			if (isset($_GET['error'])) {
				if ($_GET['error'] == "invaliduser") {
					echo '<p class="error"><h3>Username may only contain alphabets and numbers.</h3></p>';
				}
			}
			if (isset($_GET['error'])) {
				if ($_GET['error'] == "invalidpassword") {
					echo '<p class="error"><h3>Password can only have uppercase, lowercase or/and numbers.</h3></p>';
				}
			}
			?>
			<!-- Registraion/Signup Form -->
			<form class="signup-form" action="includes/register.inc.php" method="POST">
				<input type="text" name="email" placeholder="E-mail">
				<input type="text" name="username" placeholder="Username">
				<input type="password" name="password" placeholder="Password">
				<input type="password" name="repeat_pwd" placeholder="Reapeat Password">
				<button type="submit" name="register">register</button>
			</form>
		</div>
	</section>

<?php 
	include_once 'footer.php';
?>
