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



<!-- Upper line which states page title and small nav button(addholiday/addblogpost). Row & col10 ends in admin_footer -->
<div class="row mt-3"> <!-- main row -->

                            <!-- Left sidebar -->
<div class="col-2">
  <?php require_once APPROOT . '/Views/bars/admin/admin_leftsidebar.php'; ?>
</div> <!-- col2 -->

                            <!-- Main Col -->
<div class="col-10">
                    <!-- Title and options button -->
  <div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2><?php echo $data['pageTitle']; ?></h2>
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" id="optionsDropdown" type="button" data-toggle="dropdown" name="optionsDropdown" aria-expanded="false">Options</button>
        <div class="dropdown-menu dropdown-menu-right" aria-labeledby="optionsDropdown">
          <a class="dropdown-item" href="<?php echo URLROOT . 'admin/adminC/addHolidayForm'; ?>">add Holiday</a>
          <a class="dropdown-item" href="<?php echo URLROOT . 'admin/BlogC/addPost'; ?>">add BlogPost</a>
        </div>
      </div>
  </div>
