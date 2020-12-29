<?php
include "config.php";
session_start();

$username=$_SESSION["username"];
$filename=$_GET['view'];

$comments=$_POST['comments'];
$rating=$_POST['rating'];

$sql="INSERT INTO $filename (username,comments,rating) VALUES('$username','$comments','$rating')";
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
?>