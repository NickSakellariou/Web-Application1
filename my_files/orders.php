<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>TechItEasy-Login</title>
		<meta charset="UTF-8">
		<meta name="viewpoint" content="width=device-width,initial-scale=1">
		<link rel="stylesheet" href="orders.css?v=<?php echo time(); ?>">	
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
			<div class="row2">
				<h1>Παραγγελίες</h1>
			</div>
			
			<?php
			include "config.php";
			

			$user=$_SESSION["username"];
			$user_order=$user . "order";
			
			$sql="SELECT * FROM $user_order";
			$result = $conn->query($sql);
				
			if($result->num_rows>0){
			while($row=$result->fetch_assoc()){
				echo '<br>';
				echo '<div class="row4">';
					echo '<div>';
						echo '<h4> Date : ' . $row["date"] . '</h4>';
						echo '<h4> Title : ' . $row["title"] . '</h4>';
						echo '<h4> Quantity : ' . $row["quantity"] . '</h4>';
						echo '<h4> Price : ' . $row["cost"] . '€</h4>';
						echo '<a href="remove_order_item.php?view='.$row["date"].'">';
							echo 'Αφαίρεση';
						echo '</a>';
					echo '</div>';
				echo '</div>';
			}
			}
			?>
		</div>
		<div class="footer">
			&copy;
			<a href="http://www.ds.unipi.gr/" target="_blank">2020 DS_UNIPI
			</a>.
			All rights reserved.
		</div>
	</body>
</html>