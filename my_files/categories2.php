<?php
include "config.php";
$sql="SELECT * FROM categories";
$result = $conn->query($sql);
										
if($result->num_rows>0){
while($row=$result->fetch_assoc()){
	echo '<div class="container">';
			echo '<a href="products.php?view='.$row["category"].'">';
				echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>';
			echo '</a>';
		echo '<h4>' . $row["category"] . '</h4>';
	echo '</div>';
echo '<br><br>';
}
	$conn->close();	
}
else{
	$conn->close();
}
?>