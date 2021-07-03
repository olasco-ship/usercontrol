		
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-6"> 
		<h3><?= $user['firstname'].''.$user['lastname']?></h3>

		<form class="register" action="Users/edit" method="POST">
        
        <div class="form-group">
        	<label>First Name</label>
        	<input type="text" name="firstname" id ="firstname" class="form-control" placeholder="First Name" value="<?= set_value('firstname', $user['firstname']) ?>">
        </div>
        <div class="form-group">
        	<label>Last Name</label>
        	<input type="text" name="lastname" id ="lastname" class="form-control" placeholder="Last Name" value="<?= set_value('lastname', $user['lastname']) ?>">
        </div>
        <div class="form-group">
        	<label>Email</label>
        	<input type="text" readonly id="email" class="form-control" placeholder="Email" value="<?= $user['email'] ?>">
        </div>

        <!--<div class="form-group">
        	<label>Status</label>
        	<input type="text" name="status" id ="status" class="form-control" placeholder="Status" value="<?php set_value('status', $user['status']) ?>">
        </div>!-->
        <div class="form-group">
        	<label>Role</label>
        	<input type="text" name="role" id ="role" class="form-control" placeholder="Role" value="<?= set_value('role', $user['role']) ?>">
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
        <div class="col-12 col-sm-4">
        <button type="submit" class="btn btn-primary" value="submit">Update</button>
    </div>
  </form>
</div>
</div>
</div>
