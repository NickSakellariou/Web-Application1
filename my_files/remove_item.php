<?php
include "config.php";
session_start();

$user=$_SESSION["username"];
$user_cart=$user . "cart";

$title=$_GET['view'];
$sql="DELETE FROM $user_cart WHERE title='$title' LIMIT 1";
$result = $conn->query($sql);
										
if($result===TRUE){
echo "<script>
window.location.href='categories.php';
</script>";
}
else{
	echo "<script>
	alert('Something went wrong,try again');
	window.location.href='categories.php';
	</script>";
}

?>