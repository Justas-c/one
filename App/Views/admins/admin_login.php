<!DOCTYPE html>

<!-- !Almost full header & footer html added manually due to small differences between already loged in and current page -->

<html lang="en">
<head>
  <!-- Bootstrap required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- Stylesheets-->
  <link rel="stylesheet" href="css/myStyle.css">
  <!-- Google material style icons(https://material.io/resources/icons/?style=baseline) (https://google.github.io/material-design-icons/) -->
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

<!--_________________________________/Main___________________________________-->
<div class="row">
    <div class="col-md-3">

    </div>
    <div class="col-4 mt-5">
        <div class="card card-body bg-light mt-5 p-4">
        <div class="row">
          <div class="col">
          <h3>Login</h3>
            <form class="" method="post">
              <div class="form-group">
               <label for="adminloginEmail">Email address: </label><br>
               <input type="text" id="adminloginEmail" name="email" value="<?php if (isset($_POST['email'])) { echo $_POST['email']; } ?>" autocomplete="" required autofocus>
              </div>
              <div class="form-group">
                <label for="adminloginPassword">Password: </label><br>
                <input type="password" id="adminLoginPassword" name="password" autocomplete="off" value="">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Login</button>
              </div>
            </form>
          </div>
        </div>
        </div>
    </div>
    <div class="col-md-3">

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
