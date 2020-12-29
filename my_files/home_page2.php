<?php
include "config.php";
session_start();

$user=$_POST['user'];
$psw=$_POST['psw'];
$user_cart=$user . "cart";

$sql="DELETE FROM $user_cart";
$result = $conn->query($sql);

$sql="SELECT password FROM login WHERE username = '$user'";
$result = $conn->query($sql);
										
if($result->num_rows>0){
	while($row=$result->fetch_assoc()){
		if(password_verify($psw, $row['password'])){
			$_SESSION["username"] = $user;
			echo "<script>
			window.location.href='user_login.php';
			</script>";
		}
		else{
			echo "<script>
			alert('Username and password do not match,try again ');
			window.location.href='home_page.html';
			</script>";
		}
	}
}
else{
	echo "<script>
	alert('Username and password do not match,try again');
	window.location.href='home_page.html';
	</script>";
}
?>