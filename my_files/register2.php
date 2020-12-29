<?php
include "config.php";

$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$charactersLength = strlen($characters);
$psw = '';
for ($i = 0; $i < 10; $i++) {
	$psw .= $characters[rand(0, $charactersLength - 1)];
}

$hashed_password = password_hash($psw, PASSWORD_DEFAULT);

$name=$_POST['name'];
$surname=$_POST['surname'];
$email=$_POST['email'];
$user=$_POST['user'];

$sql="INSERT INTO login (username,password,name,surname,email ) VALUES('$user','$hashed_password','$name','$surname','$email')";
$result = $conn->query($sql);

$to = $email;
$subject = "your registration is completed";
$txt = "Welcome" . $user . ",your password is: " . $psw . "Now you can login with this password";

$headers = "From: nicksak10@gmail.com";

mail($to, $subject, $txt, $headers);


//To email den to stelnei gia kapoion logo pou den mporw na katalavw,opote evala na fainetai to password me alert


$conn->close();

echo "<script>
alert('Your password is $psw');
window.location.href='home_page.html';
</script>";

?>