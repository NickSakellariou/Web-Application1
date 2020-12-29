<?php
include "config.php";

session_start();

$user=$_SESSION["username"];
$user_order=$user . "order";

$date=$_GET['view'];

$sql="DELETE FROM $user_order WHERE date='$date'";
$result = $conn->query($sql);
										
if($result===TRUE){
echo "<script>
window.location.href='orders.php';
</script>";
}
else{
	echo "<script>
	alert('Something went wrong,try again');
	window.location.href='orders.php';
	</script>";
}

?>