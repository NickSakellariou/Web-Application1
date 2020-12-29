<?php
include "config.php";
session_start();

$user=$_SESSION["username"];
$user_order=$user . "order";
$user_cart=$user . "cart";

$sql="CREATE TABLE  $user_order (date datetime,title varchar(100),quantity int,cost int) ";
$result = $conn->query($sql);
										
if($result===TRUE){
	$sql="INSERT INTO $user_order (date, title, quantity, cost)
			SELECT date, title, quantity, cost FROM $user_cart";
	$result = $conn->query($sql);
	if($result===TRUE){
		echo "<script>
		alert('Η παραγγελία σας ολοκληρώθηκε επιτυχώς!');
		window.location.href='user_login.php';
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
	$sql="INSERT INTO $user_order (date, title, quantity, cost)
			SELECT date, title, quantity, cost FROM $user_cart";
		$result = $conn->query($sql);
	if($result===TRUE){
		echo "<script>
		alert('Η παραγγελία σας ολοκληρώθηκε επιτυχώς!');
		window.location.href='user_login.php';
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