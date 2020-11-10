 <?php  
 //fetch.php

//  if ( $_FILES['file']['error'] > 0 ){
//      echo 'Error: ' . $_FILES['file']['error'] . '<br>';
//  }
//  else {
//      if(move_uploaded_file($_FILES['file']['tmp_name'], 'img/' . $_FILES['file']['name']))
//      {
//          echo "File Uploaded Successfully";
//      }
//  }

 $id = $_GET["id"];
 $connect = mysqli_connect("localhost", "root", "", "data");  
 if(isset($id))  
 {  
      $query = "SELECT * FROM member WHERE id = '". $id."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_assoc($result);  
      echo json_encode($row);  
 }  
//  echo $id;
 ?>

 