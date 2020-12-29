<!DOCTYPE html>
<html>
	<head>
		<title>TechItEasy-Login</title>
		<meta charset="UTF-8">
		<meta name="viewpoint" content="width=device-width,initial-scale=1">
		<link rel="stylesheet" href="user_login.css?v=<?php echo time(); ?>">	
	</head>
	<body>
		<?php
		include "config.php";
		session_start();
		$user=$_SESSION["username"];
		$user_cart=$user . "cart";
		$sql="DELETE FROM $user_cart";
		$result = $conn->query($sql);
		?>
		<div class="header">
			<h1>
				<a href="home_page.html">
					<img src="icons/logo.jpeg">
				<a>
				TechItEasy
			</h1>
			<h5>All about electronics</h5>
			<h3>Πάντα δίπλα στον πελάτη με ποιοτικές λύσεις τεχνολογίας!!!</h3>
		</div>
		<div class="mainrow">
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<div class="row1">
				<a href="categories.php">
					<h1>Διαθέσιμες κατηγορίες</h1>
				</a>
			</div>
			<br>
			<br>
			<br>
			<div class="row1">
				<a href="orders.php">
					<h1>Παραγγελίες</h1>
				</a>
			</div>
			<br>
			<br>
			<br>
			<div class="row1">
				<a href="photos.php">
					<h1>Φωτογραφίες</h1>
				</a>
			</div>
			<br>
			<br>
			<br>
		</div>
		<div class="footer">
			&copy;
			<a href="http://www.ds.unipi.gr/" target="_blank">2020 DS_UNIPI
			</a>.
			All rights reserved.
		</div>
	</body>
</html>