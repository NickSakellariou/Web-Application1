<?php
include "config.php";

$old_category=$_GET['view'];

if($_POST['category']){
    $category = $_POST['category'];
}
if(isset($category)){ 
	$sql="UPDATE categories SET category='$category' WHERE category='$old_category'";
	$result = $conn->query($sql);
	if($result===TRUE){
		$sql="RENAME TABLE $old_category TO $category";
		$result = $conn->query($sql);
		
		if($_FILES["image"]["size"]>0){
			$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
		}
		if(isset($image)){ 
			$sql="UPDATE categories SET image='$image' WHERE category='$category'";
			$result = $conn->query($sql);
		}
		echo "<script>
		window.location.href='admin_control.php';
		</script>";	
	}
}

if($_FILES["image"]["size"]>0){
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
}
if(isset($image)){ 
	$sql="UPDATE categories SET image='$image' WHERE category='$old_category'";
	$result = $conn->query($sql);
}
	
echo "<script>
window.location.href='admin_control.php';
</script>";	

?>