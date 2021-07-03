

<div class="container">
	<div class="box">
    <div class="col-12 col-sm-8">
<form class="box" action="/login" method="POST" style="margin-top: 30px; padding-right: 30px; padding-left: 30px;">
	<h3>Login</h3>
	<hr>
	<div class="col-12 col-sm-8">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" value="" style="border-radius: 30px;">
    
</div>
  </div>
  <div class="col-12 col-sm-8">
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="password" placeholder="Password" value="" style="border-radius: 30px;">
  </div>
</div>
      <?php if (isset($validation)): ?>
           <div class="col-12">
           <div class="alert alert-danger" role="alert">
          <?= $validation->listErrors(); ?>

           </div>
           </div>
        <?php endif; ?>
  <!--<div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1"></label>
  </div> !-->
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>