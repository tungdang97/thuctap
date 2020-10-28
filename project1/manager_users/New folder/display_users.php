<?php
	$connect = mysqli_connect('localhost', 'root', '', 'data') or die ('Lỗi kết nối'); 
    mysqli_set_charset($connect, "utf8");
	$result = mysqli_query($connect, "select * from member");
	?>
	<div class="container">
	<div class="row">
    

        <div class="table-responsive">
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
						<!-- <ul class="list-inline m-0">
							<li class="list-inline-item">
								<a href="edit_user.php?id=<?php echo $row['id']; ?>"><button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a>								
							</li>
							<li class="list-inline-item">
							    <a href="delete_user.php?id=<?php echo $row['id']; ?>"><button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button></a>
							</li>
						</ul> -->

						<td>
						<div class="btn-group">
						<button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit-modal">
							<i class="fa fa-edit"></I>
						</button>
						<button type="button" class="btn btn-info" data-toggle="modal" data-target="#delete-modal">
							<i class="fa fa-trash"></i>
						</button>
						</div>

						</td>
            			</td>
						
						
						<!-- <a href="edit_user.php?id=<?php echo $row['id']; ?>">Edit</a></td>
						<td><a href="delete_user.php?id=<?php echo $row['id']; ?>"> Delete</a></td> -->
					</tr>
				<?php } ?>
			</tbody>

		</table>
	    </div>
	</div>
    </div>