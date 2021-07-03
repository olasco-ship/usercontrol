
      <div class="container">
      <div class="row">
        <div class="col-12 col-sm8- offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-grey   from-wrapper">
      <form class="" action="Admins/admin" method="POST">
      <div class="row">        
        <div class="col-12 col-sm-8">
          <label>Username</label>
          <input type="text" name="username" id ="username" class="form-control" placeholder="User Name" value="<?php set_value('username'); ?>">
        </div>
  
        <div class="col-12 col-sm-8">
          <label>Email</label>
          <input type="text" name="email" id ="email" class="form-control" placeholder="Email" value="<?php set_value('email') ?>">
        </div>

        <!--<div class="form-group">
          <label>Status</label>
          <input type="text" name="status" id ="status" class="form-control" placeholder="Status" value=""
        </div>!-->

        <div class="row">
          <div class="col-12 col-sm-4">
          <label>Password</label>
          <input type="password" name="password" id ="password" class="form-control" placeholder="Password" value="">
        </div>

        <div class="col-12 col-sm-6">
          <label>Confirm-Password</label>
          <input type="password" name="confirm_password" class="form-control" placeholder="Confirm-Password" value="">
        </div>
      </div>

        <?php if (isset($validation)): ?>
           <div class="col-12">
           <div class="alert alert-danger" role="alert">
          <?= $validation->listErrors(); ?>

           </div>
           </div>
        <?php endif; ?>
        <div class="col-12 col-sm-4 pt-3">
        <button type="submit" class="btn btn-primary" value="submit">Save</button>
      </div>
  </form>
  </div>
</div>
</div>
</div>