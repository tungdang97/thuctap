<!DOCTYPE html>
<html>

<head>
    <title>Editing MySQL Data</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</head>

<body>


    <?php
    include 'connect.php';
    $id = $_GET['id'];
    $query = mysqli_query($connect, "select * from users where id='$id'");
    $row = mysqli_fetch_assoc($query);
    //print_r($row);
    ?>



    <form method="POST" class="form container bg-gradient-primary" enctype="multipart/form-data">
        <h2>Sửa thành viên</h2>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">UserName:</label>
        <div class="col-sm-5">
            <input type="text" value="<?php echo $row['user_name']; ?>" name="user_name" class="form-control">
        </div>
    </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label">FullName:</label>
    <div class="col-sm-5">
      <input type="text"  value="<?php echo $row['full_name']; ?>" name="full_name" class="form-control">
    </div>
  </div>
  <div class="form-group row">
        <label class="col-sm-2 col-form-label">Avatar:</label>
        <div class="col-sm-5">
            <img src="upload/<?= $row['image_name'] ?>" width="100px" height="100px" />
            <input type="file" value="" id="new_avatar" name="new_avatar"></label></br>
        </div>
    </div>
    <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" value="Update" name="update_user" class="btn btn-primary">Update</button>
    </div>
  </div>
   

  



        <?php
        if (isset($_POST['update_user'])) {
            //$id=$_GET['id'];
            $username = $_POST['user_name'];
            $fullname = $_POST['full_name'];
            $new_file = $_FILES['new_avatar'];
            $new_avatar_name = $new_file['name'];
            if ($new_avatar_name != "") {
                $allowType = ['image/png', 'image/jpeg', 'image/gif'];
                move_uploaded_file($new_file['tmp_name'], 'upload/' . $new_avatar_name);

                $path_image = "upload/" . $row['image_name'];
                // if (!unlink($path_image)) {
                //     echo "cannot be deleted due to an error";
                // } else {
                //     echo "has been deleted";
                // }
                unlink($path_image);
                $sql = "UPDATE users SET user_name='$username', full_name='$fullname', image_name='$new_avatar_name' WHERE id='$id'";
                
            } else {
                $sql = "UPDATE users SET user_name='$username', full_name='$fullname' WHERE id='$id'";
            }
            
            if ($connect->query($sql) === TRUE) {
                echo "Update sucessfuly!";
                header("Refresh:3");
                
                
            } else {
                echo "Error updating record: " . $connect->error;
            }
            
            $connect->close();
        }



       




        // $rows = mysqli_query($connect, "
        // 			select * from users where id='$id'
        // 		");
        // $row = mysqli_fetch_assoc($rows);
        // $old_image=$_POST['old_image'];
        // $path_image = "upload/".$old_image;

        ?>
    
  </form>   
</body>

</html>