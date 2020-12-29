<!DOCTYPE html>
<html>
	<head>
		<title>TechItEasy-Laptops</title>
		<meta charset="UTF-8">
		<meta name="viewpoint" content="width=device-width,initial-scale=1">
		<link rel="stylesheet" href="products.css?v=<?php echo time(); ?>">
		<script type="text/javascript">
		function next2(){
			document.getElementById("next2").style.display = "none";
			document.getElementById("step2").style.display = "block";
			document.getElementById("shoppingCart1").style.display = "none";
		}
		function back1(){
			document.getElementById("step2").style.display = "none";
			document.getElementById("next2").style.display = "block";
			document.getElementById("shoppingCart1").style.display = "block";
		}
		function next3(){
			document.getElementById("step3").style.display = "block";
			document.getElementById("shoppingCart2").style.display = "none";
			document.getElementById("back1").style.display = "none";
		}
		function back2(){
			document.getElementById("step3").style.display = "none";
			document.getElementById("shoppingCart2").style.display = "block";
			document.getElementById("back1").style.display = "block";
		}
		function cardOption(){
			document.getElementById("next3").style.display = "block";
			if(document.getElementById("card").checked) {
				document.getElementById("typeCard").disabled = false;
				document.getElementById("numberCard").disabled = false;
				document.getElementById("nameCard").disabled = false;
				document.getElementById("expireDate").disabled = false;
				document.getElementById("cardOptionID").style.display = "block";
			}
			else if(document.getElementById("cash").checked) {
				document.getElementById("typeCard").disabled = true;
				document.getElementById("numberCard").disabled = true;
				document.getElementById("nameCard").disabled = true;
				document.getElementById("expireDate").disabled = true;
				document.getElementById("cardOptionID").style.display = "none";
			}
		}
		</script>
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
				<h1>Επιλέξτε τα προϊόντα που σας ενδιαφέρουν</h1>
			</div>
			<br>
				<?php
				include "config.php";
				session_start();
				$category=$_GET['view'];
				$sql="SELECT * FROM $category";
				$result = $conn->query($sql);

				if($result->num_rows>0){
				while($row=$result->fetch_assoc()){
					echo '<div id="row2">';
						echo '<div>';
							echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>';
							echo '<h4>' . $row["title"] . '</h4>';
							
							echo '<form action="add_item.php?view='.date("Y-m-d H:i:s").'&view2='.$row["price"].'&view3='.$category.'&view4='.$row["title"].'" method="post">';
							echo '<br>';
								echo '<label class="container">' . $row["price"] . '€';
									echo '<input type="checkbox" name="check" required>';
									echo '<span class="checkmark"></span>';
								echo '</label>';
								echo '<br>';
								echo '<br>';
								echo '<label for="quantity" > Quantity (between 1 and 5):</label>';
									echo '<select name="quantity">';
										echo '<option selected value="1">1</option>';
										echo '<option value="2">2</option>';
										echo '<option value="3">3</option>';
										echo '<option value="4">4</option>';
										echo '<option value="5">5</option>';
									echo '</select>';
								echo '<br>';
								echo '<br>';
								echo '<input type="submit" value="Add" >';
							echo '</form>';
						echo '</div>';
					echo '</div>';
					echo '<br>';
				}
				}
				?>
			<br>
			<br>
			<br>
			<div id="shoppingCart1">
				<h2>CART</h2>
				<div id="cartItems1">
				<?php
				$user=$_SESSION["username"];
				$user_cart=$user . "cart";
				$sql="SELECT * FROM $user_cart";
				$result = $conn->query($sql);
				$products_price=0;

				if($result->num_rows>0){
				while($row=$result->fetch_assoc()){
					$products_price+=$row["cost"];
					echo '<h4>' . $row["title"] . ' quantity: ' . $row["quantity"] .' price: '. $row["cost"] .'€ ';
					echo '<a href="remove_item.php?view='.$row["title"].'">';
						echo 'Αφαίρεση';
					echo '</a>';
					echo '</h4>';
				}
				}
				?>
					
				</div>
				<br>
				<?php
				echo '<strong >Products price</strong> <span>' . $products_price. '</span>';
				?>
				<br>
			</div>
			<br>
			<br>
			<br>
			<?php
			$user=$_SESSION["username"];
			$user_cart=$user . "cart";
			$sql="SELECT * FROM $user_cart";
			$result = $conn->query($sql);

			if($result->num_rows>0){
				echo '<div id="next2">';
					?>
					<button type="submit" onclick="next2()">Επόμενο</button>
					<?php
				echo '</div>';
			}
			?>
			<div id="step2">
				<div class="row3">
					<h1>Συμπληρώστε τα στοιχεία σας για την επιβεβαίωση της αγοράς</h1>
				</div>
				<br>
				<div class="row4">
					<h2>Εισάγετε τα στοιχεία σας για την αποστολή της αγοράς</h2>
					<hr>
					<form action="javascript:next3()">
						<input id="street" type="text" placeholder="Οδός" pattern=".{1,}" title="Must contain only characters" required>
						<input id="streetNumber" type="text" placeholder="Αριθμός οδού" pattern="[0-9]+" title="Must contain only numbers" required>
						<input id="area" type="text" placeholder="Περιοχή" pattern=".{1,}" title="Must contain only characters" required>
						<input id="postcode" type="text" placeholder="Ταχυδρομικός Κώδικας" pattern="[0-9]{5}" title="Must contain 5 numbers" required>
						<input id="next3" type="submit" value="Επόμενο">
					</form>
				</div>
				<br>
				<br>
				<br>
				<br>
				<br>
				<div id="shoppingCart2">
					<h2>CART</h2>
					<div id="cartItems2">
					<?php
					$user=$_SESSION["username"];
					$user_cart=$user . "cart";
					$sql="SELECT * FROM $user_cart";
					$result = $conn->query($sql);
					$products_price=0;

					if($result->num_rows>0){
					while($row=$result->fetch_assoc()){
						$products_price+=$row["cost"];
						echo '<h4>' . $row["title"] . ' quantity: ' . $row["quantity"] .' price: '. $row["cost"] .'€ ';
						echo '<a href="remove_item.php?view='.$row["title"].'">';
							echo 'Αφαίρεση';
						echo '</a>';
						echo '</h4>';
					}
					}
					?>
					
				</div>
				<br>
				<?php
				echo '<strong >Products price</strong> <span>' . $products_price. '</span>';
				echo '<br>';
				echo '<br>';
				if($products_price>30){
					$delivery_price=0;
					$total_price=$products_price+$delivery_price;
					echo '<strong >Delivery Price</strong> <span>'. $delivery_price. '</span><br><br>';
					echo '<strong >Total Price</strong> <span>'. $total_price. '</span><br><br>';
				}
				else{
					$delivery_price=2;
					$total_price=$products_price+$delivery_price;
					echo '<strong >Delivery Price</strong> <span>'. $delivery_price. '</span><br><br>';
					echo '<strong >Total Price</strong> <span>'. $total_price. '</span><br><br>';
				}
				?>
						
				</div>
				<br>
				<br>
				<div id="back1">
					<button type="submit" onclick="back1()">Προηγούμενο</button>
				</div>
				<br>
				<br>
				<br>
				<br>
				<br>
			</div>
			<div id="step3">
				<div class="row3">
					<h1>Συμπληρώστε τα στοιχεία της πληρωμής της αγοράς</h1>
				</div>
				<br>
				<div class="row4">
					<h2>Επιθυμείτε πληρωμή με κάρτα ή με αντικαταβολή;</h2>
					<hr>
					<?php
					echo '<form action="final_submit.php">';
					?>
						
						<label class="container">Κάρτα
						  <input type="radio" id="card" name="payment" value="card" onclick="cardOption()">
						  <span class="checkmark"></span>
						</label>
						<br>
						<br>
						<label class="container">Αντικαταβολή
						  <input type="radio" id="cash" name="payment" value="cash" onclick="cardOption()">
						  <span class="checkmark"></span>
						</label>
						<br>
						<br>
						<div id="cardOptionID" style="display:none">
							<input id="typeCard" type="text" placeholder="Τύπος κάρτας (π.χ. Visa,Mastercard)" pattern=".{1,}" title="Must contain only characters" required>
							<input id="numberCard" type="text" placeholder="16-ψήφιος αριθμός κάρτας" pattern="[0-9]{16}" title="Must contain 16 numbers" required>
							<input id="nameCard" type="text" placeholder="Ονοματεπώνυμο" pattern=".{1,}" title="Must contain only characters" required>
							<label for="dateOfExpire">Ημερομηνία λήξης κάρτας</label><br><br>
							<input type="date" name="dateOfExpire" id="expireDate" required>
							<br>
							<br>
						</div>
						<input id="next3" type="submit" value="Επιβεβαίωση">
					</form>
				</div>
				<br>
				<br>
				<br>
				<br>
				<br>
				<div id="shoppingCart3">
					<h2>CART</h2>
					<div id="cartItems3">
					<?php
					$user=$_SESSION["username"];
					$user_cart=$user . "cart";
					$sql="SELECT * FROM $user_cart";
					$result = $conn->query($sql);
					$products_price=0;

					if($result->num_rows>0){
					while($row=$result->fetch_assoc()){
						$products_price+=$row["cost"];
						echo '<h4>' . $row["title"] . ' quantity: ' . $row["quantity"] .' price: '. $row["cost"] .'€';
						echo '<a href="remove_item.php?view='.$row["title"].'">';
							echo 'Αφαίρεση';
						echo '</a>';
						echo '</h4>';
					}
					}
					?>
					
				</div>
				<br>
				<?php
				echo '<strong >Products price</strong> <span>' . $products_price. '</span>';
				echo '<br>';
				echo '<br>';
				if($products_price>30){
					$delivery_price=0;
					$total_price=$products_price+$delivery_price;
					echo '<strong >Delivery Price</strong> <span>'. $delivery_price. '</span><br><br>';
					echo '<strong >Total Price</strong> <span>'. $total_price. '</span><br><br>';
				}
				else{
					$delivery_price=2;
					$total_price=$products_price+$delivery_price;
					echo '<strong >Delivery Price</strong> <span>'. $delivery_price. '</span><br><br>';
					echo '<strong >Total Price</strong> <span>'. $total_price. '</span><br><br>';
				}
				?>
						
				</div>
				<br>
				<br>
				<br>
				<br>
				<br>
				<div id="back2">
					<button type="submit" onclick="back2()">Προηγούμενο</button>
				</div>
				<br>
				<br>
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