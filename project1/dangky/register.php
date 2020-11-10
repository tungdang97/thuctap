<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="style.css"/>
</head>
<body>
  
<form method="post" action="register.php" class="form" enctype="multipart/form-data">
  
<h3>----------------REGISTER----------------</h3>
  
Username: <input type="text" name="username" value="" required>
  
Password: <input type="" name="pass1" value="" required/>

Confirm Password: <input type="" name="pass2" value="" required/>
  
Email: <input type="email" name="email" value="" required/>
  
Phone: <input type="text" name="phone" value="" required/>

Birthday: <input type="date" name="birthday" value="" required/>

<label>
  Sex:
  <input name=sex list=sexes>
  <datalist id=sexes>
  <option value="Female">
  <option value="Male">
  </datalist>
</label>

<div class="form-group">
				<label >Avatar:</label>
				<input type="file" class="form-control" name="avatarname">
</div>

  
<input class="dangky" type="submit" name="dangky" value="Register now"/>
<p>Already have an account? <a href="/project1/dangnhap/login.php">Sign In</a></p>
<?php require 'xuly.php';?>
</form>
  
</body>
</html>