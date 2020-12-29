<?php
include "config.php";

$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
$image_name = addslashes($_FILES['image']['name']);

$category=$_POST['category'];

$sql="CREATE TABLE  $category (title varchar(100),price int,image longblob) ";
$result = $conn->query($sql);
										
if($result===TRUE){
	$sql="INSERT INTO  categories (category,image) VALUES('$category','$image')";
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
}
else{
	echo "<script>
	alert('Something went wrong,try again');
	window.location.href='admin_control.php';
	</script>";
}

?>