<?php 
// $ketnoi['host'] = 'localhost'; 
// $ketnoi['dbname'] = 'data'; // Tên database 
// $ketnoi['username'] = 'root'; // Tên user mặc định là root 
// $ketnoi['password'] = ''; // Password để trống 
// @mysqli_connect( "{$ketnoi['host']}", "{$ketnoi['username']}", "{$ketnoi['password']}") or die("Không thể kết nối database");
// @mysqli_select_db( "{$ketnoi['dbname']}") or die("Không thể chọn database");

$connect = mysqli_connect('localhost', 'root', '', 'data');
mysqli_set_charset($connect, "utf8");
?>