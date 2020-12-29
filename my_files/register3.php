<?php
include "config.php";

$user=$_POST['user'];

$sql="SELECT username FROM login WHERE username = '$user'";
$result = $conn->query($sql);
										
if($result->num_rows>0){
	$conn->close();
	echo "<script>
	alert('This username: $user already exists,try something else');
	window.location.href='register.html';
	</script>";
}
else{
	$conn->close();
	include 'register2.php';
}
?>