<?php
include 'connect.php';
$id=$_GET['id'];
$query = mysqli_query($connect, "select * from users where id='$id'");
$row = mysqli_fetch_assoc($query);
$path_image = "upload/" . $row['image_name'];

if(isset($_REQUEST['id']) and $_REQUEST['id']!=""){
//$id=$_GET['id'];
unlink($path_image);
$sql = "DELETE FROM users WHERE id='$id'";
if ($connect->query($sql) === TRUE) {
echo "Xoá thành công!";
} else {
echo "Error updating record: " . $connect->error;
}
 
$connect->close();
}
?>