<div class="box-body">
  <table id="example2" class="table table-bordered table-hover">
    <thead>
      <tr>
        <!-- <th></th> -->
        <th>Username</th>
        <th>Contact</th>
        <th>Email</th>
        <th>Role Type</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $datas)
        <tr>
          <td>{{ $datas->username }}</td>
          <td>{{ $datas->contact }}</td>
          <td>{{ $datas->email }}</td>
          <td>Role Type</td>
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
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

<div class="modal fade" id="edit-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" ><b>Edit User</b></h4>
      </div>
      <div class="modal-body">
        <form role="form" action="/edit_user">
          <input type="hidden" name="_token" value="<?php  ?>">
          <div class="box-body">
            <div class="form-group">
              <label for="exampleInputEmail1">User ID</label> 
              <input type="text" class="form-control" name="user_id" placeholder="User ID" >
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Username</label> 
              <input type="text" class="form-control" name="username" placeholder="Enter username">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email</label> 
              <input type="text" class="form-control" name="email" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Contact</label> 
              <input type="text" class="form-control" name="contact" placeholder="Enter contact">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Change Password</label> 
              <input type="password" class="form-control" name="change_password" placeholder="Enter password">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>