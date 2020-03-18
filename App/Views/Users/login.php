<?php //currentFile('Views/Login'); ?>
<?php require_once APPROOT . '/Views/headfoot/header.php'; ?>
<!--__________________________________Main___________________________________-->

<div class="row">
  <div class="col-md-3">
  </div>
<div class="col-md-4">
<div class="card card-body bg-light mt-2 mb-5 p-4">
<h3>Login</h3>
    <form class="" method="post">
      <div class="form-group">
       <label for="loginEmail">Email address: </label><br>
       <input type="text" id="loginEmail" name="email" value="<?php if (isset($_POST['email'])) { echo $_POST['email']; } ?>" autocomplete="" required autofocus>
      </div>
      <div class="form-group">
        <label for="loginPassword">Password: </label><br>
        <input type="password" id="LoginPassword" name="password" autocomplete="off" value="">
      </div>
      <div class="form-group">
        <input type="checkbox" name="remember_me" <?php if (isset($_POST['remember_me'])) {echo 'checked="checked"'; } ?>> Remember me
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Login</button>
      </div>
    </form>
</div>
</div>
</div>











<!--_________________________________Footer__________________________________-->
<?php require APPROOT . '/Views/headfoot/footer.php'; ?>
