<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>TechItEasy-Login</title>
		<meta charset="UTF-8">
		<meta name="viewpoint" content="width=device-width,initial-scale=1">
		<link rel="stylesheet" href="photo.css?v=<?php echo time(); ?>">	
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
				<h1>Η φωτογραφία που επιλέξατε:</h1>
			</div>
			<br>
			<br>
			<br>
			<?php
			include "config.php";
			
			$username=$_GET['view'];
			$date=$_GET['view2'];
			$filename=$_GET['view3'];
			
			$sql="SELECT rating FROM $filename";
			$result = $conn->query($sql);
			
			if($result->num_rows>0){
			$i=0;
			$rating=0;
			while($row=$result->fetch_assoc()){
				$rating+=$row['rating'];
				$i++;
			}
			$average_rating=$rating/$i;
			}
			
			
			$sql="SELECT image FROM photos WHERE image_name='$filename'";
			$result = $conn->query($sql);
				
			if($result->num_rows>0){
			while($row=$result->fetch_assoc()){
				echo '<div class="row4">';
					echo '<div>';
						echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>';
						echo '<h4>' . $username . '</h4>';
						echo '<h4>' . $date . '</h4>';
						if(!empty($average_rating)){
							echo '<h4>Μέσος όρος βαθμολογίας χρηστών:' . $average_rating . '</h4>';
						}
						else{
							echo '<h4>Αυτή η φωτογραφία δεν έχει βαθμολογηθεί ακόμα</h4>';
						}
					echo '</div>';
				echo '</div>';
			}
			}
			?>
			<br>
			<br>
			<br>
			<div class="row1">
				<h1>Σχόλια και βαθμολογίες χρηστών</h1>
			</div>
			<br>
			<br>
			<br>
			<?php
			
			$sql="SELECT * FROM $filename";
			$result = $conn->query($sql);
				
			if($result->num_rows>0){
			while($row=$result->fetch_assoc()){
				echo '<br>';
				echo '<div class="row5">';
					echo '<div>';
						echo '<h4> User : ' . $row["username"] . '</h4>';
						echo '<h4> Comment : ' . $row["comments"] . '</h4>';
						echo '<h4> Rating : ' . $row["rating"] . '</h4>';
					echo '</div>';
				echo '</div>';
			}
			}
			?>
			<br>
			<br>
			<br>
			<div class="row1">
				<h1>Προσθέστε ένα σχόλιο και μια βαθμολογία</h1>
			</div>
			<br>
			<br>
			<br>
			<?php
			echo '<div class="row3">';
				echo '<form action="add_comment.php?view='.$filename.'" method="post"';
				echo '<br>';
					echo '<textarea maxlength="200" rows="4" cols="50" name="comments" required></textarea>';
					echo '<br>';
					echo '<br>';
					echo '<input type="text" name="rating" pattern="[1-5]" placeholder="Add a rating 1-5" required>';
					echo '<br>';
					echo '<br>';
					echo '<input type="submit" value="Add">';
				echo '</form>';
			echo '</div>';	
			?>
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