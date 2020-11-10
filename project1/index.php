<!doctype html>
<html lang="en">

<head>
  
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Home</title>
  <!-- Bootstrap CSS -->
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
</head>

<body>
<?php 
  session_start();
?>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <!-- <a class="navbar-brand" href="#">Home</a> -->


    <a class="navbar-brand" href="#">
      <img src="/project1/img/unnamed.jpg" width="100" height="40" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Configuration</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            System Management</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Menu Admin</a>
            <a class="dropdown-item" href="index.php?page=display_users">User Accounts</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Privileges</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Posts Management</a>
        </li>
      </ul>
      <script>
        function tuongdoi(){
            location.href = "dangnhap/login.php";
        }
      </script>
      
      <form class="form-inline my-2 my-lg-0" >
        <a>
        <?php if ($_SESSION['avatarname'] != null) 
          echo '<img src="img/'. $_SESSION["avatarname"].'" alt="Avatar" height="40" class="mr-sm-2 rounded-circle z-depth-2" >'
        ?></a>
        <!-- <img src="/project1/img/116571.jpg" alt="Avatar" height="40" class="mr-sm-2 rounded-circle z-depth-2" ></a> -->
        <!-- <?php if (isset($_SESSION["loged"])) echo "<a href='index.php?act=logout' class='btn btn-danger'>Đăng xuất</a>"; ?> -->
        <?php if (isset($_SESSION["loged"]))
          echo
          '<div class="btn-group">
          <button type="button" class="btn btn-secondary dropdown-toggle mr-sm-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          </button>
          <div class="dropdown-menu dropdown-menu-right">
            <button class="dropdown-item" type="button">Setting & Privacy</button>
            <button class="dropdown-item" type="button">Help & Support</button>
            <button class="dropdown-item" type="button">Give feedback</button>
            <button class="dropdown-item" type="button" onclick="tuongdoi()">Log out</button>
          
          </div>
        </div>'; ?>
        <!-- <?php if (isset($_SESSION["loged"])) echo "<button href='index.php?act=logout class='btn btn-outline-success my-2 my-sm-0' type='submit'>Log out</button>"; ?> -->
        <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Log out</button> -->
      </form>

    </div>
  </nav>

  <?php
  if (isset($_GET["act"]) && $_GET["act"] == "logout") {
    unset($_SESSION["loged"]);
    header("location:dangnhap/login.php");
    setcookie("success", "Bạn đã đăng xuất!", time() + 1, "/", "", 0);
  }

  //nếu tồn tại biến $_GET["page"] = "dangky" thì gọi trang đăng ký:
  if (isset($_GET["page"]) && $_GET["page"] == "display_users")
    include "manager_users/display_users.php";
    
  ?>
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>