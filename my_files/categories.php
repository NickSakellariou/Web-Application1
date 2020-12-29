<!DOCTYPE html>
<html>
	<head>
		<title>TechItEasy-Login</title>
		<meta charset="UTF-8">
		<meta name="viewpoint" content="width=device-width,initial-scale=1">
		<link rel="stylesheet" href="categories.css?v=<?php echo time(); ?>">	
	</head>
	<body>
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
			<div class="row1">
				<h1>Επιλέξτε μία κατηγορία</h1>
			</div>
			<br>
			<br>
			<br>
			<div class="row2">
				<?php include 'categories2.php';?>
			</div>
		</div>
		<div class="footer">
			&copy;
			<a href="http://www.ds.unipi.gr/" target="_blank">2020 DS_UNIPI
			</a>.
			All rights reserved.
		</div>
	</body>
</html>