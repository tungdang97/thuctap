<?php
	$connect = mysqli_connect('localhost', 'root', '', 'data') or die ('Lỗi kết nối'); 
    mysqli_set_charset($connect, "utf8");
	$result = mysqli_query($connect, "select * from member");
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
							<button type="button" class="btn btn-info edit_data" data-toggle="modal" data-target="#add_data_Modal">
								<i class="fa fa-edit"></I>
							</button>
							<button type="button" class="btn btn-info" data-toggle="modal" data-target="#delete-modal">
								<i class="fa fa-trash"></i>
							</button>
							</div>
						</td>

						
						<div class="modal fade" id="add_data_Modal">
						<!-- <div class="modal fade" id="edit-modal"> -->
						<div class="modal-dialog">
							<div class="modal-content">
							<div class="modal-header">
							<h4 class="modal-title" ><b>Edit User</b></h4>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<!-- <form role="form" action="/edit_user" method="post" id="insert_form"> -->
								<form method="post" id="insert_form">
								<input type="hidden" name="_token">
								<div class="box-body">
									<div class="form-group">
									<label for="exampleInputEmail1">Username</label> 
									<input type="text" value="<?php echo $row['username']; ?>" class="form-control" name="username" id="username" placeholder="Enter username">
									</div>
									<div class="form-group">
									<label for="exampleInputEmail1">Email</label> 
									<input type="text" value="<?php echo $row['email']; ?>" class="form-control" name="email" id="email" placeholder="Enter email">
									</div>
									<div class="form-group">
									<label for="exampleInputEmail1">Phone</label> 
									<input type="text" value="<?php echo $row['phone']; ?>" class="form-control" name="phone" id="phone" placeholder="Enter contact number">
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
									<label for="exampleInputEmail1">Avatar</label>
									<input type="file" class="form-control" name="avatarname" id="avatarname">
									</div>

									<div class="form-group">
									<label for="exampleInputEmail1">Password</label> 
									<input type="password" class="form-control" name="pass1" id="pass1" placeholder="Enter password">
									</div>
									<div class="form-group">
									<label for="exampleInputEmail1">Confirm Password</label> 
									<input type="password" class="form-control" name="pass2" id="pass2" placeholder="Confirm password">
									</div>
									<div class="form-group">
									<label for="exampleInputEmail1">Change Password</label> 
									<input type="password" class="form-control" name="change_password" id="change_password" placeholder="Enter new password or Not">
									</div>
								</div>
								<input type="hidden" name="user_id" id="user_id" />  
                          		<input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />  
								<div class="modal-footer">
									<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary" name="update_user">Save changes</button>
								</div>
								</form>
							</div>
							</div>
						</div>
						</div>
					</tr>
				<?php } ?>
			</tbody>

		</table>
	    </div>
	</div>
	</div>

	<script>
	$(document).ready(function(){  
		$('#add').click(function(){  
			$('#insert').val("Insert");  
			$('#insert_form')[0].reset();  
	});
	$(document).on('click', '.edit_data', function(){  
		var user_id = $(this).attr("id");  
		$.ajax({  
				url:"fetch.php",
				method:"POST",  
				data:{user_id:user_id},  
				dataType:"json",  
				success:function(data){  
					$('#username').val(data.username);  
					$('#email').val(data.email); 
					$('#phone').val(data.phone);  
					$('#sex').val(data.sex);
					$('#password').val(data.pass2);  
					//$('#change_password').val(data.change_password);  
					$('#user_id').val(data.id);
					$('#insert').val("Update"); 
					$('#add_data_Modal').modal('show');  
				}  
		});  
	});
	$('#insert_form').on("submit", function(event){  
		event.preventDefault();  
		if($('#username').val() == "")  
		{  
				alert("Name is required");  
		}  
		else if($('#email').val() == '')  
		{  
				alert("Email is required");  
		}else if($('#sex').val() == '')  
		{  
				alert("Sex is required");  
		}
		else if($('#password').val() == '')
		{  
				alert("Password is required");		
		}
		else if($('#email').val() == '')
		{  
				alert("Confirm password is required");  
		}
		
		else  
		{  
				$.ajax({  
					url:"insert.php",  
					method:"POST",  
					data:$('#insert_form').serialize(),  
					beforeSend:function(){  
						$('#insert').val("Inserting");  
					},  
					success:function(data){  
						$('#insert_form')[0].reset();  
						$('#add_data_Modal').modal('hide');  
						$('#employee_table').html(data);  
					}  
				});  
		}  
	});  
		// $(document).on('click', '.view_data', function(){  
		// 	var user_id = $(this).attr("id");  
		// 	if(user_id != '')  
		// 	{  
		// 			$.ajax({  
		// 				url:"select.php",  
		// 				method:"POST",  
		// 				data:{user_id:user_id},  
		// 				success:function(data){  
		// 					$('#employee_detail').html(data);  
		// 					$('#dataModal').modal('show');  
		// 				}  
		// 			});  
		// 	}            
		// });  
	});  
 </script>
	
