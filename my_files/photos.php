<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>TechItEasy-Login</title>
		<meta charset="UTF-8">
		<meta name="viewpoint" content="width=device-width,initial-scale=1">
		<link rel="stylesheet" href="photos.css?v=<?php echo time(); ?>">	
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
			<div class="row1">
				<h1>Ανεβάστε την φωτογραφία που επιθυμείτε</h1>
			</div>
			<br>
			<br>
			<br>
			<?php
			echo '<div class="row3">';
				echo '<form action="upload_photo.php?view='.date("Y-m-d H:i:s").'" method="post" enctype="multipart/form-data">';
					echo '<input type="file" name="image" id="image" required>';
					echo '<br>';
					echo '<input type="submit" value="Upload">';
				echo '</form>';
			echo '</div>';	
			?>
			<br>
			<br>
			<br>
			<div class="row2">
				<h1>Φωτογραφίες</h1>
			</div>
			
			<?php
			include "config.php";
			$sql="SELECT * FROM photos";
			$result = $conn->query($sql);
				
			if($result->num_rows>0){
			while($row=$result->fetch_assoc()){
				echo '<br>';
				echo '<div class="row4">';
					echo '<div>';
						echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>';
						echo '<h4>' . $row["username"] . '</h4>';
						echo '<h4>' . $row["date"] . '</h4>';
						echo '<a href="photo.php?view='.$row["username"].'&view2='.$row["date"].'&view3='.$row["image_name"].'">';
							echo 'Περισσότερα';
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