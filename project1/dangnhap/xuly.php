<?php
//Khai báo sử dụng session
session_start();
//Khai báo utf-8 để hiển thị được tiếng việt
header('Content-Type: text/html; charset=UTF-8');
//Xử lý đăng nhập
if (isset($_POST['dangnhap']))
{
//Kết nối tới database
include('connect.php');
  
//Lấy dữ liệu nhập vào
$username = addslashes($_POST['username']);
$password = addslashes($_POST['password']);
  
//Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
if (!$username || !$password) {
echo "</br> Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu. <a href='javascript: history.go(-1)'>Trở lại</a>";
exit;
}
  
// mã hóa pasword
//$password = md5($password);
  
//Kiểm tra tên đăng nhập và password có tồn tại không
$query = mysqli_query($connect, "SELECT * FROM member WHERE username='$username' and password = '$password'");
$count_row = mysqli_num_rows($query);

//Lấy ra kết quả dạng mảng của hàng dữ liệu đăng nhập
$row = mysqli_fetch_assoc($query);

if ($count_row == 1) {
    $_SESSION["loged"] = true;
    $_SESSION["avatarname"] = $row["avatarname"];
    //session_destroy();
    // print_r($_SESSION);
    // die;
    header("location:../index.php");
    setcookie("success", "Đăng nhập thành công!", time() + 1, "/", "", 0);
    // echo '<img src="upload/'. $row["image_name"].'">' ;
} else {
    //header("location:index.php");
    setcookie("error", "Đăng nhập không thành công!", time() + 1, "/", "", 0);
    echo "</br> Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
    exit;
}


  
//So sánh 2 mật khẩu có trùng khớp hay không
// if ($password != $row['password']) {
// echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
// exit;
// }
  
//Lưu tên đăng nhập
$_SESSION['username'] = $username;
echo "Xin chào <b>" .$username . "</b>. Bạn đã đăng nhập thành công. <a href=''>Thoát</a>";
die();
}
?>