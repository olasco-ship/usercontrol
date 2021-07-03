



<!-- Button trigger modal -->
<!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registerModal" border-radius="40px">
  create new user
</button> -->

<?php if (session()->get('success')): ?>
        <div class="aler alert-success" role="alert"></div>
        <?php session()->get('success'); ?>
      <?php endif; ?>
<!-- Modal -->
<script>
document.addEventListener("DOMContentLoaded",function(event) {
  console.log("Domload")
  document.designMode = "on"
  var mode = document.designMode

    function copy(){
    var body =  document.getElementsByTagName("BODY")[0]
    body.execCommand('copy')
    // .execCommand("copy")
    }

    var button = document.getElementsByClassName("copybutton")
    console.log(button)
    button[0].addEventListener("click",function(){copy()})


})
</script>
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="registerModalLabel">Add new user</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form id="register_form" action="Users/register" method="POST">
      <div class="modal-body">
  
        
        <div class="form-group">
        	<label>First Name</label>
        	<input type="text" name="firstname" id ="firstname" class="form-control" placeholder="First Name" value="<?php set_value('firstname'); ?>">
        </div>
        <div class="form-group">
        	<label>Last Name</label>
        	<input type="text" name="lastname" id ="lastname" class="form-control" placeholder="Last Name" value="<?php set_value('lastname') ?>">
        </div>
        <div class="form-group">
        	<label>Email</label>
        	<input type="text" name="email" id ="email" class="form-control" placeholder="Email" value="<?php set_value('email') ?>">
        </div>

        <!--<div class="form-group">
        	<label>Status</label>
        	<input type="text" name="status" id ="status" class="form-control" placeholder="Status" value="<?php set_value('status') ?>">
        </div>!-->
        <div class="form-group">
        	<label>Role</label>
        	<input type="text" name="role" id ="role" class="form-control" placeholder="Role" value="<?= set_value('role') ?>">
        </div>

        <div class="form-group">
        	<label>Password</label>
        	<input type="password" name="password" id ="password" class="form-control" placeholder="Password" value="">
        </div>

        <div class="form-group">
        	<label>Confirm-Password</label>
        	<input type="password" name="confirm_password" class="form-control" placeholder="Confirm-Password" value="">
        </div>

        <?php if (isset($validation)): ?>
           <div class="col-12">
           <div class="alert alert-danger" role="alert">
          <?= $validation->listErrors(); ?>

           </div>
           </div>
        <?php endif; ?>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" value="submit">Save</button>
      </div>
    </div>
  </form>
  </div>
</div>
</div>
</div>

<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registerModal">Create new user</button>
        <button style="display: flex;float: right;cursor: pointer;border-radius: 30px;" onclick="" class="btn btn-primary" name="copybutton">Copy</button>
        <button style="display: flex;float: right;cursor: pointer;border-radius: 30px;margin-right: 10px;" onclick="" class="btn btn-primary">CSV</button>
        <button style="display: flex;float: right;cursor: pointer;border-radius: 30px;margin-right: 10px;" onclick="myFunction()" class="btn btn-primary">Download</button>
      </h6>
    </div>
  </div>
</div>
<table id="tableId" class="table table-bordered">
	<thead>
	<tr>
		<th>ID</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Email</th>
		<th>Status</th>
		<th>Role</th>
		<th>Action</th>

	</tr>
</thead>
<tbody>
  <?php  

  if ($user_data) {
    foreach($user_data as $user){
      ?>
  <tr>
    <td><?php echo $user['id'];?></td>
    <td><?php echo $user['firstname']; ?></td>
    <td><?php echo $user['lastname']; ?></td>
    <td><?php echo $user['email']; ?></td>
    <td style="text-align: center;"><?php if (session('loggedin') =='true') {
      echo $user['active'];
      // code...
    }else{
      echo "Not Active";
    }
    ?></td>
    <td><?php echo $user['role'];?></td>
    <td>
      <form action="Users/edit" method="POST">
        <!--<input type="hidden" name="edit_id" value= ?>"!-->
      <button type="submit" name="edit_id"><i class="fas fa-edit"
         style="font-size:24px; background: gold;cursor: pointer;"></i></button>

      </td>
      </tr>
      <?php
    }
  }
?>


</tbody>


</table>
</body>
</html>