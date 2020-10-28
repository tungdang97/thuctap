<?php
	if(!isset($_SESSION["loged"])){
		header("location:index.php");
		setcookie("error", "Bạn chưa đăng nhập!", time()+1, "/","", 0);
	}
	else
		echo "Login web thành công!";
		if($_SESSION['image_name'] != null)
		echo '<img width = 100px, height = 100px, src="upload/'. $_SESSION["image_name"].'">'

?>

