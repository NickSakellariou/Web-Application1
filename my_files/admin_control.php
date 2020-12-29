<!DOCTYPE html>
<html>
	<head>
		<title>TechItEasy-Laptops</title>
		<meta charset="UTF-8">
		<meta name="viewpoint" content="width=device-width,initial-scale=1">
		<link rel="stylesheet" href="admin_control.css?v=<?php echo time(); ?>">
	</head>
	<body>
		<div class="header">
			<h1>
				<a href="home_page.html">
					<img src="icons/logo.jpeg">
				</a>
				TechItEasy
			</h1>
			<h5>All about electronics</h5>
			<h3>Πάντα δίπλα στον πελάτη με ποιοτικές λύσεις τεχνολογίας!!!</h3>
		</div>
		<div class="mainrow">
			<br>
			<br>
			<a href="admin_login.html">
				<div class="row0">
					<h1>Πατήστε εδώ για έξοδο</h1>
				</div>
			</a>
			<br>
			<div class="row1">
				<h1>Όλες οι κατηγορίες</h1>
			</div>
			<br>
				<?php
				include "config.php";
				$sql="SELECT * FROM categories";
				$result = $conn->query($sql);
				$i=0;
				
				if($result->num_rows>0){
				while($row=$result->fetch_assoc()){
					echo '<div class="row2">';
						echo '<div>';
							echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>';
							echo '<h4>' . $row["category"] . '</h4>';
							echo '<form action="admin_control_edit_category.php?view='.$row["category"].'" method="post" enctype="multipart/form-data">';
							?>
								<label for="category" ><b> EDIT THE CATEGORY <b></label>
								<br>
								<input type="text" name="category" placeholder="New name of category">
								<br>	
								<label for="image" ><b> New image <b></label>
								<br>
								<input type="file" name="image" id="image">
								<br>
								<input type="submit" value="Edit">
							</form>
							<?php
							echo '<br>';
							echo '<br>';
							echo '<br>';
							echo '<a href="admin_control_remove_category.php?view='.$row["category"].'">';
								echo 'Αφαίρεση';
							echo '</a>';
						echo '</div>';
					echo '</div>';
				echo '<br>';
				$categories[$i]=$row["category"];	
				$i++;
				}
				}
				echo '<div class="row6">';
					echo '<div>';
						?>
						<form action="admin_control_add_category.php" method="post" enctype="multipart/form-data">
							<label for="category" ><b> ADD A CATEGORY <b></label>
							<br>
							<br>
							<input type="text" name="category" placeholder="Name of category" required>
							<br>
							<br>
							<label for="image" ><b> Image <b></label>
							<br>
							<input type="file" name="image" id="image" required>
							<br>
							<input type="submit" value="Προσθήκη">
						</form>
						<?php
					echo '</div>';
				echo '</div>';
				
				echo '<br><br><br>';
				?>
				<div class="row1">
					<h1>Όλα τα προϊόντα που είναι αποθηκευμένα στη βάση δεδομένων</h1>
				</div>
				
				<?php
				echo '<br><br><br>';
				for ($i = 0; $i <= sizeof($categories); $i++) {
					if(empty($categories[$i])){
						
						continue;
					}
					$sql="SELECT * FROM $categories[$i]";
					$result = $conn->query($sql);
				  
				echo '<div class="row4"><h1>' . $categories[$i] . '</h1></div>';
				echo '<br>';
				
					if($result->num_rows>0){
					while($row=$result->fetch_assoc()){
						echo '<div class="row3">';
							echo '<div>';
								echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>';
								echo '<h4>' . $row["title"] . '</h4>';
								echo '<label class="container">' . $row["price"] . '€';
								echo '</label>';
								echo '<form action="admin_control_edit_product.php?view='.$categories[$i].'&view2='.$row["title"].'" method="post" enctype="multipart/form-data">';
								echo '<br>';
								echo '<label for="title" ><b> EDIT THE PRODUCT <b></label>';
								echo '<br>';
								echo '<input type="text" name="title" placeholder="New title of product">';
								echo '<br>';
								echo '<input type="text" name="price" placeholder="New price of product">';
								echo '<br>';
								echo '<label for="image" ><b> New image <b></label>';
								echo '<br>';
								echo '<input type="file" name="image" id="image">';
								echo '<br>';
								echo '<input type="submit" value="Edit">';
							echo '</form>';
							echo '<br>';
							echo '<br>';
							echo '<br>';
							echo '<a href="admin_control_remove_product.php?view='.$categories[$i].'&view2='.$row["title"].'">';
								echo 'Αφαίρεση';
							echo '</a>';
						echo '</div>';
					echo '</div>';
				echo '<br>';
				}
				}
					
					echo '<div class="row5">';
					echo '<div>';
						echo '<form action="admin_control_add_product.php?view='.$categories[$i].'" method="post" enctype="multipart/form-data">';
							echo '<label for="title" ><b> ADD A PRODUCT <b></label>';
							echo '<br>';
							echo '<br>';
							echo '<input type="text" name="title" placeholder="Title of product" required>';
							echo '<br>';
							echo '<br>';
							echo '<input type="text" name="price" placeholder="Price of product" required>';
							echo '<br>';
							echo '<br>';
							echo '<label for="image" ><b> Image <b></label>';
							echo '<br>';
							echo '<input type="file" name="image" id="image" required>';
							echo '<br>';
							echo '<input type="submit" value="Προσθήκη">';
						echo '</form>';
					echo '</div>';
					echo '</div>';
					echo '<br><br>';
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