<!-- Delete -->
<div class="modal fade" id="del<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <center><h4 class="modal-title" id="myModalLabel">Delete</h4></center>
                    </div>
                    <div class="modal-body">
    				<?php
    					$del=mysqli_query($connect,"select * from member where id='".$row['id']."'");
    					$drow=mysqli_fetch_array($del);
    				?>
    				<div class="container-fluid">
    					<h5><center>Firstname: <strong><?php echo $drow['firstname']; ?></strong></center></h5> 
                    </div> 
    				</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                        <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                    </div>
     
                </div>
            </div>
        </div>


<!-- Edit -->
<div class="modal fade" id="edit<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <center><h4 class="modal-title" id="myModalLabel">Edit</h4></center>
                    </div>
                    <div class="modal-body">
    				<?php
    					$edit=mysqli_query($conn,"select * from user where id='".$row['id']."'");
    					$erow=mysqli_fetch_array($edit);
    				?>
    				<div class="container-fluid">
    				<form method="POST" action="edit.php?id=<?php echo $erow['id']; ?>">
    					<div class="row">
    						<div class="col-lg-2">
    							<label style="position:relative; top:7px;">Firstname:</label>
    						</div>
    						<div class="col-lg-10">
    							<input type="text" name="firstname" class="form-control" value="<?php echo $erow['firstname']; ?>">
    						</div>
    					</div>
    					<div style="height:10px;"></div>
    					<div class="row">
    						<div class="col-lg-2">
    							<label style="position:relative; top:7px;">Lastname:</label>
    						</div>
    						<div class="col-lg-10">
    							<input type="text" name="lastname" class="form-control" value="<?php echo $erow['lastname']; ?>">
    						</div>
    					</div>
    					<div style="height:10px;"></div>
    					<div class="row">
    						<div class="col-lg-2">
    							<label style="position:relative; top:7px;">Address:</label>
    						</div>
    						<div class="col-lg-10">
    							<input type="text" name="address" class="form-control" value="<?php echo $erow['address']; ?>">
    						</div>
    					</div>
                    </div> 
    				</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                        <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span> Save</button>
                    </div>
    				</form>
                </div>
            </div>
        </div>


<!-- <?php
include 'connect.php';
$id=$_GET['id'];
$query = mysqli_query($connect, "select * from users where id='$id'");
$row = mysqli_fetch_assoc($query);
$path_image = "upload/" . $row['image_name'];

if(isset($_REQUEST['id']) and $_REQUEST['id']!=""){
unlink($path_image);
$sql = "DELETE FROM users WHERE id='$id'";
if ($connect->query($sql) === TRUE) {
echo "Xoá thành công!";
} else {
echo "Error updating record: " . $connect->error;
}
 
$connect->close();
}
?> -->