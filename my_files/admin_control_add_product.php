<?php
include "config.php";

$category=$_GET['view'];

$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
$image_name = addslashes($_FILES['image']['name']);

$title=$_POST['title'];
$price=$_POST['price'];

$sql="INSERT INTO $category (title,price,image) VALUES('$title','$price','$image')";
	$result = $conn->query($sql);
	if($result===TRUE){
		echo "<script>
		window.location.href='admin_control.php';
		</script>";
	}
	else{
		echo "<script>
		alert('Something went wrong,try again');
		window.location.href='admin_control.php';
		</script>";
	}

?>