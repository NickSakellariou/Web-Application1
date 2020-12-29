<?php
include "config.php";

$category=$_GET['view'];
$title=$_GET['view2'];
$sql="DELETE FROM $category WHERE title='$title'";
$result = $conn->query($sql);
										
if($result===TRUE){
		echo "<script>
			window.location.href='admin_control.php';
		</script>";
	}
	else{
		echo "<script>
		alert('Something went wrong,try again');
		</script>";
	}

?>