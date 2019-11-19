<?php 
	include_once 'header.php';
 ?>



	<section class="main-container">
		<div class="main-wrapper">
			<h2>Home</h2>
			<?php  

				if (isset($_SESSION['username'])) {
					echo "<h4>You are logged in!</h4>";
				}
				else {

					echo "<h4>you are logged out</h4>";
				}

			?>

		</div>
	</section>

<?php 
	include_once 'footer.php';
?>
