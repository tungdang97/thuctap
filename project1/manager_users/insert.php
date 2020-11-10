<?php  
 $connect = mysqli_connect("localhost", "root", "", "data");
 
 if(!empty($_POST))  
 {  
     $output = '';  
     $message = '';  
     $username = $_POST['username'];
     $email = $_POST['email'];
     $birthday = $_POST['birthday'];
     $sex = $_POST['sex'];
     
     // $new_file = $_FILES['new_avatar'];
     // $new_avatar_name = $new_file['name'];
     // $allowType = ['image/png', 'image/jpeg', 'image/gif'];

    $result = mysqli_query($connect, "select * from member");
    $row = mysqli_fetch_assoc($result);
     //Lấy dữ liệu nhập vào
     $password1 = addslashes($_POST['password1']);
     $password2 = addslashes($_POST['password2']);
     $new_pw1 = addslashes($_POST['new_pw1']);
     $new_pw2 = addslashes($_POST['new_pw2']);
     if($_POST["user_id"] != '') {
          
          //if($new_avatar_name != "") {
               // if ($new_pw1 != $new_pw2 || !in_array($new_file['type'], $allowType)) {
               if ($new_pw1 != $new_pw2) {
                    header("location:register.php?page=register");
                    setcookie("error", "Nhập sai Password hoặc sai file ảnh!", time() + 1, "/", "", 0);
               } else {
                    // move_uploaded_file($new_file['tmp_name'], 'img/' . $new_avatar_name);
                    // $path_image = "img/" . $row['avatarname'];
                    // unlink($path_image);
                    $query = "
                    UPDATE member
                    SET username='$username', email = '$email', birthday='$birthday', sex = '$sex', password = '$new_pw1'
                    WHERE id=".$_POST["user_id"]; 
                    $message = 'Data Updated';
                    // echo "111".$query;
               }
          } else {
               $query = "
                    UPDATE member
                    SET username='$username', email = '$email', birthday='$birthday', sex = '$sex', password = '$new_pw1'
                    WHERE id=".$_POST["user_id"]; 
                    $message = 'Data Updated';
                    mysqli_query($connect, $query);
          }
          echo "abc";
          // WHERE id='".$id."'";

     //} else {
          //if($new_avatar_name != "") { 
               // if ($password1 == "" || $password1 != $password2 || !in_array($new_file['type'], $allowType))
               if ($password1 == "" || $password1 != $password2)
                    echo $output = "Nhập sai Password hoặc sai file ảnh!";
               else {
                   // move_uploaded_file($new_file['tmp_name'], 'img/' . $new_avatar_name);
                    $query = "
                    INSERT INTO member(username, email, birthday, sex, password )  
                    VALUES('$username', '$email', '$birthday', '$sex', '$password1');  
                    ";
                    $message = 'Data Inserted';
                    mysqli_query($connect, $query);
               }
          } else {
               $query = "
               INSERT INTO member(username, email, birthday, sex, password)  
               VALUES('$username', '$email', '$birthday', '$sex', '$password1');  
               ";
          //}
          


     echo "123";
     }
     
     
    // mysqli_query($connect, $query);
// mã hóa pasword
//$password = md5($password);
// /echo $output;    
//}

     

    
      
 ?>