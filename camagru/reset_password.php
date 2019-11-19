<?php 
	include_once 'header.php';
 ?>
	<section class="main-container">
		<div class="main-wrapper">
            <h2>Reset your password</h2>
            <p>An email will be sent to you with instructions onhow to reset your password</p>
			<form class="includes/reset.inc.php" action="includes/register.inc.php" method="POST">
				<input type="text" name="email" placeholder="enter emaiil address">
				<button type="submit" name="Send Request">Send Request</button>
			</form>
		</div>
	</section>

<?php 
	include_once 'footer.php';
?>
