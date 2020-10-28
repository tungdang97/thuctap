<?php  
 $connect = mysqli_connect("localhost", "root", "", "data");  
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
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
    
      if($_POST["employee_id"] != '')  
      {  if (in_array($file['type'], $allowType)) {
          $query = "  
           UPDATE member   
           SET username='$username',   
           email='$email',   
           phone='$phone',   
           birthday = '$birthday',   
           sex = '$sex'
           avatarname = '$fileName';
           WHERE id='".$_POST["employee_id"]."'";
           $message = 'Data Updated';
      }    else {
          $query = "  
          UPDATE member   
          SET username='$username',   
          email='$email',   
          phone='$phone',   
          birthday = '$birthday',   
          sex = '$sex'
          avatarname = ;
          WHERE id='".$_POST["employee_id"]."'";
          $message = 'Data Updated';
      }     
      }  
      else  
      {  
           $query = "  
           INSERT INTO tbl_employee(name, address, gender, designation, age)  
           VALUES('$name', '$address', '$gender', '$designation', '$age');  
           ";  
           $message = 'Data Inserted';  
      }  
      if(mysqli_query($connect, $query))  
      {  
           $output .= '<label class="text-success">' . $message . '</label>';  
           $select_query = "SELECT * FROM tbl_employee ORDER BY id DESC";  
           $result = mysqli_query($connect, $select_query);  
           $output .= '  
                <table class="table table-bordered">  
                     <tr>  
                          <th width="70%">Employee Name</th>  
                          <th width="15%">Edit</th>  
                          <th width="15%">View</th>  
                     </tr>  
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>' . $row["name"] . '</td>  
                          <td><input type="button" name="edit" value="Edit" id="'.$row["id"] .'" class="btn btn-info btn-xs edit_data" /></td>  
                          <td><input type="button" name="view" value="view" id="' . $row["id"] . '" class="btn btn-info btn-xs view_data" /></td>  
                     </tr>  
                ';  
           }  
           $output .= '</table>';  
      }  
      echo $output;  
 }  
 ?>