<?php
include "config.php";
session_start();

$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
$image_name = addslashes($_FILES['image']['name']);

$date=$_GET['view'];
$username=$_SESSION["username"];

$filename = pathinfo($image_name, PATHINFO_FILENAME);

$sql="CREATE TABLE  $filename (username varchar(20),comments text(200),rating int) ";
$result = $conn->query($sql);
										
if($result===TRUE){
	$sql="INSERT INTO photos (image_name,image,username,date) VALUES('$filename','$image','$username','$date')";
	$result = $conn->query($sql);
	if($result===TRUE){
		echo "<script>
		window.location.href='photos.php';
		</script>";
	}
	else{
		echo "<script>
		alert('Something went wrong,try again');
		</script>";
	}
}
else{
	echo "<script>
	alert('Something went wrong,try again2');
	</script>";
}

?>