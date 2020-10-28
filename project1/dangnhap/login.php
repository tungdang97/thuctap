<!DOCTYPE html> 
<html> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<link rel="stylesheet" href="style.css"/> 
</head> 
<body> 
<form action='login.php' class="dangnhap" method='POST' enctype="multipart/form-data"> 
Username: <input type='text' name='username' /> 
Password: <input type='password' name='password' /> 
<input type='submit' class="button" name="dangnhap" value='Sign In' /> 
<a href='../dangky/register.php' title='Đăng ký'>Register now</a> 
<?php require 'xuly.php';


?>
<form> 
</body> 
</html>