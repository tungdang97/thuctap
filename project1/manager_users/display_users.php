<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<?php
	$connect = mysqli_connect('localhost', 'root', '', 'data') or die ('Lỗi kết nối'); 
    mysqli_set_charset($connect, "utf8");
	$result = mysqli_query($connect, "select * from member");
	$row = mysqli_fetch_assoc($result);
	//echo $_POST['insert'];
	//echo $_POST['user_id']; die;
	// if (isset($_POST['user_id'])) {
	if(!empty($_POST)) {
		//$query = "";
		$username = $_POST['username'];
		$email = $_POST['email'];
		$birthday = $_POST['birthday'];
		$sex = $_POST['sex'];
		
		$new_file = $_FILES['new_avatar'];
		 $new_avatar_name = $new_file['name'];
		 //echo $new_avatar_name;
		// die();
		 $allowType = ['image/png', 'image/jpeg', 'image/gif'];
		 
		$result = mysqli_query($connect, "select * from member");
		$row = mysqli_fetch_assoc($result);
		 //Lấy dữ liệu nhập vào
		 $password1 = addslashes($_POST['password1']);
		 $password2 = addslashes($_POST['password2']);
		 $new_pw1 = addslashes($_POST['new_pw1']);
		 $new_pw2 = addslashes($_POST['new_pw2']);
		//echo $_POST["user_id"]; die;
		 if($_POST["user_id"] != '') {
			 //echo $_POST["user_id"];die;
			 //echo $_POST["user_id"]; die;
			 if($new_avatar_name != "") {
				   if ($new_pw1 != $new_pw2 || !in_array($new_file['type'], $allowType)) {
						header("location:register.php?page=register");
						setcookie("error", "Nhập sai Password hoặc sai file ảnh!", time() + 1, "/", "", 0);
				   } else {
					echo $row['id'];die;
						move_uploaded_file($new_file['tmp_name'], 'img/' . $new_avatar_name);
						$path_image = "img/" . $row['avatarname'];
						if ($row['avatarname'] !="" && file_exists($path_image)) {
							unlink($path_image);
						}
						$query = "
						UPDATE member
						SET username='$username', email = '$email', birthday='$birthday', sex = '$sex', password = '$new_pw1', avatarname='$new_avatar_name'
						WHERE id=".$row['id'];
						
						$message = 'Data Updated';
						
						mysqli_query($connect, $query);
						//echo "111".$query;die;
				   }
			  } else {
				   $query = "
						UPDATE member
						SET username='$username', email = '$email', birthday='$birthday', sex = '$sex', password = '$new_pw1', avatarname='$new_avatar_name'
						WHERE id=".$row['id']; 
						// WHERE id=".$_POST["user_id"]; 
						$message = 'Data Updated';
						mysqli_query($connect, $query);
			  }
			  echo "abc";
			  // WHERE id='".$id."'";
	
		 } else {
			  if($new_avatar_name != "") { 
				   if ($password1 == "" || $password1 != $password2 || !in_array($new_file['type'], $allowType))
						echo $output = "Nhập sai Password hoặc sai file ảnh!";
				   else {
					   move_uploaded_file($new_file['tmp_name'], 'img/' . $new_avatar_name);
						$query = "
						INSERT INTO member(username, email, birthday, sex, password, avatarname)  
						VALUES('$username', '$email', '$birthday', '$sex', '$password1', $new_avatar_name);  
						";
						$message = 'Data Inserted';
						mysqli_query($connect, $query);
				   }
			  } else {
				   $query = "
				   INSERT INTO member(username, email, birthday, sex, password, avatarname)  
				   VALUES('$username', '$email', '$birthday', '$sex', '$password1', $new_avatar_name);  
				   ";
				   mysqli_query($connect, $query);
			  }
			  //mysqli_query($connect, $query);
	
			  
		 echo "123";
		 }
		//  mysqli_query($connect, $query);
	 }



	?>
	<div class="container">
	<div class="row">
    	<div class="table-responsive">

		<div align="right" style="padding-bottom:20px;">  
			<button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Add</button>  
		</div> 

		<table class="table m-0">
			<thead class="thead-dark">
				<tr>
					<th scope="col">ID</th>
					<th scope="col">UserName</th>
					<th scope="col">Email</th>
					<th scope="col">Phone</th>
					<th scope="col">Birthday</th>
					<th scope="col">Sex</th>
					<th scope="col">Edit / Delete</th>
				</tr>
			</thead>

			<tbody>
				<?php while ($row = mysqli_fetch_assoc($result)) { ?>
					<tr>
						<th scope="row"><?= $row['id'] ?></th> 
						<td><?= $row['username'] ?></td>
						<td><?= $row['email'] ?></td>
						<td><?php echo $row['phone'] ?></td>
						<td><?php echo $row['birthday'] ?></td>
						<td><?= $row['sex'] ?></td>

						<td>
							<div class="btn-group">
							<button type="button" class="btn btn-info edit_data" onclick="thongtin(<?= $row['id'] ?>)">
								<i class="fa fa-edit"></I>
							</button>
							<button type="button" class="btn btn-info delete_data" data-toggle="modal" data-target="#delete-modal">
								<i class="fa fa-trash"></i>
							</button>
							</div>
						</td>

						
						
					</tr>
				<?php } ?>
			</tbody>

		</table>
	    </div>
	</div>
	</div>


	<div class="modal fade" id="add_data_Modal">
						<!-- <div class="modal fade" id="edit-modal"> -->
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
				<h4 class="modal-title" id="modal_title"><b>Edit User</b></h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<!-- <form role="form" action="/edit_user" method="post" id="insert_form"> -->
					<form method="post" action="http://localhost/project1/index.php?page=display_users" id="insert_form" enctype="multipart/form-data">
					<input type="hidden" name="_token">
					<div class="box-body">
						<div class="form-group">
						<label for="exampleInputEmail1">Username</label> 
						<input type="text" value="" class="form-control" name="username" id="username" placeholder="Enter username">
						</div>
						<div class="form-group">
						<label for="exampleInputEmail1">Email</label> 
						<input type="text" value="" class="form-control" name="email" id="email" placeholder="Enter email">
						</div>
						<div class="form-group">
						<label for="exampleInputEmail1">Birthday</label> 
						<input type="date" name="birthday" class="form-control" name="birthday" id="birthday" required/>
						</div>
						<div class="form-group">			
						<label>
						Sex
						<input list=sexes class="form-control" name="sex" id="sex">
						<datalist id=sexes>
						<option value="Female">
						<option value="Male">
						</datalist>
						</label>
						</div>
						
						<div class="form-group">
						<label for="exampleInputEmail1">Avatar</label></br>
						<img src="" width="100px" height="100px" />
						<input type="file" class="form-control" name="new_avatar" id="new_avatar">
						</div>

						<div class="form-group" id="password1">
						<label for="exampleInputEmail1">Password</label> 
						<input type="password" class="form-control" name="password1" id="password1" placeholder="Enter password">
						</div>
						<div class="form-group" id="password2">
						<label for="exampleInputEmail1">Confirm Password</label> 
						<input type="password" class="form-control" name="password2" id="password2" placeholder="Confirm password">
						</div>
						<div class="form-group" id="new_pw">
						<label for="exampleInputEmail1">Change Password</label> 
						<input type="password" class="form-control" name="new_pw1" id="new_pw1" placeholder="Enter new password or Not">
						</div>
						<div class="form-group" id="new_pw2">
						<label for="exampleInputEmail1">Confirm new password</label> 
						<input type="password" class="form-control" name="new_pw2" id="new_pw2" placeholder="Confirm new password">
						</div>
					</div>
					<input type="hidden" name="user_id" id="user_id" />  
					<input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />  
					<!-- <button type="submit" value="Update" name="insert" id="insert" class="btn btn-primary">Update</button> -->
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
					<!-- <button type="submit" class="btn btn-primary" name="update_user">Save changes</button> -->
				</div>
			</div>
		</div>
	</div>
						
	<script>


function thongtin(id) {
	// alert(id);
	$('#password1').hide();
	$('#password2').hide();
	$('#new_pw').show();
	$('#new_pw2').show()
	var f = 'id=' + id ;
	alert(f);
	$.ajax({  
		
			url:"manager_users/fetch.php",
			//method:"POST",  
			data: f,
			// context: document.body,
			dataType:"json",
			success:function(data){
				//alert(data.id);
				$('#username').val(data.username);  
				$('#email').val(data.email); 
				$('#birthday').val(data.birthday);  
				$('#sex').val(data.sex);
				$('#user_id').val(data.id);
				
				$('#insert').val("Update");
				//$('#newavatar' ).hide();
				$('#add_data_Modal').modal('show');
				
			}
	});
}


	$(document).ready(function(){  
		$('#add').click(function(){
			$('#insert').val("Insert");  
			$('#insert_form')[0].reset();
			$('#new_pw').hide();
			$('#new_pw2').hide();
			$('#password1').show();
			$('#password2').show();
			
		});

		// $('#insert_form').on("submit", function(event){  

		// event.preventDefault();
		// if($('#username').val() == "") 
		// {  
		// 		alert("Name is required");  
		// }  
		// else if($('#email').val() == '')  
		// {  
		// 		alert("Email is required");  
		// }else if($('#sex').val() == '')  
		// {  
		// 		alert("Sex is required");  
		// }
		// else if($('#password').val() == '')
		// {  
		// 		alert("Password is required");
		// }
		
		// else  
		// {  
		// // 	var file_data = $('#new_avatar').prop('files')[0];
		// // 	var form_data = new FormData();  // Create a FormData object
		// // 	form_data.append('file', file_data);  // Append all element in FormData  object

		// // 	$.ajax({
		// // 			url         : 'manager_users/fetch.php',     // point to server-side PHP script 
		// // 			dataType    : 'text',           // what to expect back from the PHP script, if anything
		// // 			cache       : false,
		// // 			contentType : false,
		// // 			processData : false,
		// // 			data        : form_data,                         
		// // 			type        : 'post',
		// // 			success     : function(output){
		// // 				alert(output);              // display response from the PHP script, if any
		// // 			}
        // //  });
        //  	$('#new_avatar').val('');   


		// 		$.ajax({
		// 			url:"manager_users/insert.php",  
		// 			method:"POST",
		// 			data:$('#insert_form').serialize(),
		// 			beforeSend:function(){
		// 				$('#insert').val("Inserting");  
		// 			},  
		// 			success:function(data){ 
		// 				alert(data);
		// 				$('#insert_form')[0].reset();  
		// 				$('#add_data_Modal').modal('hide');  
		// 				location.reload();
		// 			}  
		// 		});
		// }
		// });
	});
 </script>


<?php

// $connect = mysqli_connect("localhost", "root", "", "data");  
 



?>
	
