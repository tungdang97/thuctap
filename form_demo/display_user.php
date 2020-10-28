<html>

<head>
  <title>Bootstrap Example</title>
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
	$result = mysqli_query($connect, "select * from users");
	?>
	<div class="container">
	<div class="row">
            <div class="col-lg-7 mx-auto">
                <div class="card border-0 shadow">
                    <div class="card-body p-5">

                        <!-- Responsive table -->
                        <div class="table-responsive">
		<table class="table m-0">
			<thead class="thead-dark">
				<tr>
					<th>ID</th>
					<th>UserName</th>
					<th>FullName</th>
					<th>Avatar</th>
					<th>Edit / Delete</th>
				</tr>
			</thead>

			<tbody>
				<?php while ($row = mysqli_fetch_assoc($result)) { ?>

					<tr>
						<td><?= $row['id'] ?></td>
						<td><?= $row['user_name'] ?></td>
						<td><?php echo $row['full_name'] ?></td>
						<td> <?php if ($row['image_name'] != "") { ?>
							<img src="upload/<?= $row['image_name'] ?>" width="100px" /><?php } ?></td>
						<td>
						<ul class="list-inline m-0">
							<li class="list-inline-item">
								<a href="edit_user.php?id=<?php echo $row['id']; ?>"><button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a>								
							</li>
							<li class="list-inline-item">
							<a href="delete_user.php?id=<?php echo $row['id']; ?>"><button class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button></a>
							</li>
						</ul>
						
						<!-- <a href="edit_user.php?id=<?php echo $row['id']; ?>">Edit</a></td>
						<td><a href="delete_user.php?id=<?php echo $row['id']; ?>"> Delete</a></td> -->
					</tr>
				<?php } ?>
			</tbody>

		</table>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>

</body>

</html>