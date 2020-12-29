<?php
include "config.php";
session_start();

$checkbox=$_POST['check'];
$quantity=$_POST['quantity'];

$date=$_GET['view'];
$cost=$_GET['view2'];
$category=$_GET['view3'];
$title=$_GET['view4'];

$user=$_SESSION["username"];
$user_cart=$user . "cart";

$sql="CREATE TABLE  $user_cart (date datetime,title varchar(100),quantity int,cost int) ";
$result = $conn->query($sql);

if($result===TRUE){
	$sql="INSERT INTO  $user_cart (date,title,quantity,cost) VALUES('$date','$title','$quantity','$cost')";
	$result = $conn->query($sql);
	if($result===TRUE){
		echo "<script>;
		window.location.href='categories.php';
		</script>";
	}
	else{
		echo "<script>
		alert('Something went wrong,try again');
		window.location.href='categories.php';
		</script>";
	}
}
else{
	$sql="INSERT INTO  $user_cart (date,title,quantity,cost) VALUES('$date','$title','$quantity','$cost')";
	$result = $conn->query($sql);
	if($result===TRUE){
		echo "<script>;
		window.location.href='categories.php';
		</script>";
	}
	else{
		echo "<script>
		alert('Something went wrong,try again');
		window.location.href='categories.php';
		</script>";
	}
}

?>