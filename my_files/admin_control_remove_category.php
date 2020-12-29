<?php
include "config.php";

$category=$_GET['view'];
$sql="DELETE FROM categories WHERE category='$category'";
$result = $conn->query($sql);
										
if($result===TRUE){
	$sql = "DROP TABLE $category";
	$result = $conn->query($sql);
	if($result===TRUE){
		echo "<script>
			window.location.href='admin_control.php';
		</script>";
	}
	else{
		echo "<script>
		alert('Something went wrong,try again');
		window.location.href='admin_control.php';
		</script>";
	}
}
else{
	echo "<script>
	alert('Something went wrong,try again');
	window.location.href='admin_control.php';
	</script>";
}

?>