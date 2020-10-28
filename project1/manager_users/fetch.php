 <?php  
 //fetch.php  
 $connect = mysqli_connect("localhost", "root", "", "data");  
 if(isset($_POST["user_id"]))  
 {  
      $query = "SELECT * FROM member WHERE id = '".$_POST["user_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_assoc($result);  
      echo json_encode($row);  
 }  
 ?>