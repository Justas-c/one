<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Bootstrap required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- Stylesheets-->
  <link rel="stylesheet" href="css/myStyle.css">
  <!--  Google material style icons(https://material.io/resources/icons/?style=baseline) (https://google.github.io/material-design-icons/) -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<title><?php echo 'Admin panel'; ?></title>
</head>
<body>

<!-- show globals -->
<?php //showGlobals($data); ?>

                                <!-- Main divs  -->
<div class="container-fluid"> <!-- main div -->
<div class="row"> <!-- main row -->
<div class="col"> <!-- main col -->

<!-- navbar -->
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <a class="navbar-brand mr-4" href="<?php echo URLROOT . 'admin/adminC/index'; ?>">Admin panel</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#adminNav" aria-controls="adminNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="adminNav">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <i class="material-icons" style="vertical-align:middle;color: grey">home</i>
        <a class="nav-link" style="display:inline-block; padding-left:2px" href="<?php echo URLROOT . 'admin/adminC/index'; ?>">Home</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
    <?php if (!isset($_SESSION['admin_id'])): ?>
      <li class="nav-item">
        <a class="nav-link" href="aLogin">Login</a>
      </li>
      <li class="nav-item mr-5">
          <a class="nav-link" href="aRegister">Register</a>
      </li>
    <?php else: ?>
    <li class="nav-item"><span class="nav-link"><?php echo 'logged in: ' . $data['user']->firstname; ?></span>
    <li class="nav-item"><span class="nav-link">|</span></li>
      <?php //echo 'currenly logged in: ' ?>

    </li>
      <li class="nav-item">
         <a class="nav-link" href="<?php echo URLROOT . 'admin/adminC/aLogout'; ?>";>Logout</a>
      </li>
  <?php endif; ?>
    </ul>
  </div>
</nav>
<!--_________________________________/Header_________________________________-->

<!--__________________________________Main___________________________________-->

<!-- Register Form -->
<div class="row">
<div class="col-3">
</div>
<div class="col-4">
<div class="card card-body bg-light mt-5 p-4">
<h3>Register</h3>
<form id="adminregister-form" class="" method="post">
  <div class="form-group">
    <label for="adminFirstName"> FirstName:</label><br>
      <input id="adminFirstName" class="form-control form-control-sm" type="text" name="adminFirstName" placeholder="firstname" autocomplete="" value="<?php if (isset($_POST['firstname'])) { echo $_POST['firstname']; } ?>" required >
  </div>
  <div class="form-group">
    <label for="adminLastName"> LastName:</label><br>
      <input id="adminLastName" class="form-control form-control-sm" type="text" name="adminLastName" placeholder="lastname" autocomplete="" value="<?php if (isset($_POST['lastname'])) { echo $_POST['lastname']; } ?>" required >
  </div>
  <div class="form-group">
    <label for="adminTel">Tel nr.:</label><br>
      <input id="adminTel" class="form-control form-control-sm" type="text" name="adminTel" placeholder="Name" autocomplete="" value="86 <?php if (isset($_POST['telephone'])) { echo $_POST['telephone']; } ?>" required >
  </div>
  <!-- emaila reikes vietini sukurt -->
  <div class="form-group">
    <label for="adminPassword">Password:</label><br>
      <input id="adminPassword" class="form-control form-control-sm" type="password" name="password" placeholder="Your password" value="" required>
  </div>
  <div class="form-group">
    <label for="admininputPasswordConfirm">Confirm password:</label><br>
      <input id="admininputPasswordConfirm" class="form-control form-control-sm" type="password" name="confirmPassword" placeholder="password confirm" value="" required>
  </div>
      <button id="adminsignup-submit" type="submit">Register</button>
</form>
</div>
<div class="col">
</div>
</div>
</div>


<!--_________________________________/Main___________________________________-->

<!--_________________________________Footer__________________________________-->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</div> <!-- /main col -->
</div> <!-- /main row -->
</div> <!-- /main div -->
</body>
</html>
