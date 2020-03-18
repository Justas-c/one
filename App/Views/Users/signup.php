
<?php //currentFile('Views/signup'); ?>
<?php require_once APPROOT . '/Views/headfoot/header.php'; ?>
<!--__________________________________Main___________________________________-->
<?php
// Display Register errors if any
if (!empty($data) && isset($data['errors'])){
    echo '<div class="alert alert-warning">Registration failed';
    echo '<h5>Please fix the following errors:</h5><ul>';
    foreach($data['errors'] as $error){ echo  '<li>' . $error . '</li>'; }
    echo '</ul></div>';
}
?>
<!-- for some reason registering was taking some time, now it's few seconds, still need to look into it -->
<!-- <p class='alert alert-warning'>Please note it might take about 25 seconds to process the register request.<br> We'r sorry for the inconvenience and currently are working to resolve the issue.</p> -->

<div class="row">
  <div class="col-md-3">
  </div>
<div class="col-md-4">
<div class="card card-body bg-light mt-2 mb-5 p-4">
<h3>Register</h3>
<form id="register-form" class="" method="post" onsubmit="submitFunc()">
  <div class="form-group">
    <label for="inputName">Name:</label><br>
      <input id="inputName" class="form-control form-control-sm" type="text" name="name" placeholder="Name" autocomplete="" value="<?php if (isset($_POST['name'])) { echo $_POST['name']; } ?>" required >
  </div>
  <div class="form-group">
    <label for="inputEmail">Email:</label><br>
      <input id="inputEmail" class="form-control form-control-sm " type="email" name="email" placeholder="Your email" autocomplete="" value="<?php if (isset($_POST['email'])) { echo $_POST['email']; } ?>" required type="email">
  </div>

  <div class="form-group">
    <label for="inputPassword">Password:</label><br>
      <input id="inputPassword" class="form-control form-control-sm" type="password" name="password" placeholder="Your password" value="" required>
  </div>
  <div class="form-group">
    <label for="inputPasswordConfirm">Confirm password:</label><br>
      <input id="inputPasswordConfirm" class="form-control form-control-sm" type="password" name="confirmPassword" placeholder="password confirm" value="" required>
  </div>
      <button class="btn btn-primary" id="signup-submit" type="submit">Register</button>
</form>
</div>
</div>
</div>

<script>
function submitFunc() {
    const submit_button = document.getElementById('signup-submit');
    submit_button.innerHTML = 'Please wait';
    submit_button.disabled = true;
}
</script>

 <!--_________________________________Footer__________________________________-->
 <?php require_once APPROOT . '/Views/headfoot/footer.php'; ?>
