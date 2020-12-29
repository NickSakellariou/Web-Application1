<?php
include "config.php";

$category=$_GET['view'];
$old_title=$_GET['view2'];

if($_POST['title']){
    $title = $_POST['title'];
}
if(isset($title)){ 
	$sql="UPDATE $category SET title='$title' WHERE title='$old_title'";
	$result = $conn->query($sql);
	if($result===TRUE){
		if($_POST['price']){
			$price = $_POST['price'];
		}
		if(isset($price)){ 
			$sql="UPDATE $category SET price='$price' WHERE title='$title'";
			$result = $conn->query($sql);
			if($result===TRUE){
				if($_FILES["image"]["size"]>0){
					$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
				}
				if(isset($image)){ 
					$sql="UPDATE $category SET image='$image' WHERE title='$title'";
					$result = $conn->query($sql);
				}
				else{
					echo "<script>
					window.location.href='admin_control.php';
					</script>";	
				}
				echo "<script>
				window.location.href='admin_control.php';
				</script>";	
			}
		}
		else{
			if($_FILES["image"]["size"]>0){
				$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
			}
			if(isset($image)){ 
				$sql="UPDATE $category SET image='$image' WHERE title='$title'";
				$result = $conn->query($sql);
			}
			else{
				echo "<script>
				window.location.href='admin_control.php';
				</script>";	
			}
			echo "<script>
			window.location.href='admin_control.php';
			</script>";	
		}
	}
}

if($_POST['price']){
	$price = $_POST['price'];
}
if(isset($price)){ 
	$sql="UPDATE $category SET price='$price' WHERE title='$old_title'";
	$result = $conn->query($sql);
}

if($_FILES["image"]["size"]>0){
	$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
}
if(isset($image)){ 
	$sql="UPDATE $category SET image='$image' WHERE title='$old_title'";
	$result = $conn->query($sql);
}

echo "<script>
window.location.href='admin_control.php';
</script>";	

?>