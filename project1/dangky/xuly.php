<?php
header('Content-Type: text/html; charset=utf-8');

// Kết nối cơ sở dữ liệu
$connect = mysqli_connect('localhost', 'root', '', 'data') or die('Lỗi kết nối');
mysqli_set_charset($connect, "utf8");

// Dùng isset để kiểm tra Form
if (isset($_POST['dangky'])) {
    $username = $_POST['username'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $birthday = $_POST['birthday'];
    $sex = $_POST['sex'];
    $file = $_FILES['avatarname'];
    $allowType = ['image/png', 'image/jpeg', 'image/gif'];

    $fileName = $file['name'];
    move_uploaded_file($file['tmp_name'], '../img/' . $fileName);
    // Kiểm tra username hoặc email có bị trùng hay không
    $sql = "SELECT * FROM member WHERE username = '$username' OR email = '$email'";
    // Thực thi câu truy vấn
    $result = mysqli_query($connect, $sql);
    // Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc email đã tồn tại trong CSDL
    if (mysqli_num_rows($result) > 0) {
        // Sử dụng javascript để thông báo
        echo '<script language="javascript">alert("Bị trùng tên hoặc email!"); window.location="register.php";</script>';
        // Dừng chương trình
        die();
    }
    //  echo $file['type'];
    //  die();
    //kiểm tra xem 2 mật khẩu có giống nhau hay không:
    if ($pass1 != $pass2 or !in_array($file['type'], $allowType)) {
        header("location:register.php?page=register");
        setcookie("error", "Đăng ký không thành công!", time() + 1, "/", "", 0);
    } else {
        //$pass = md5($pass1);
        mysqli_query($connect, "
            insert into member (username, password, email, phone, birthday, sex, avatarname)
            values ('$username','$pass1','$email','$phone', '$birthday', '$sex', '$fileName')	
        ");
        header("location:register.php?page=register");
        setcookie("success", "Đăng ký thành công!", time() + 1, "/", "", 0);
    }
}
?>
<?php
if (isset($_COOKIE["error"])) {
    echo $_COOKIE["error"];
} else if (isset($_COOKIE["success"])) {
    echo $_COOKIE["success"];
}
?>