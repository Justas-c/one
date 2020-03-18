<?php //showGlobals($data); ?>
<?php //printr($_SERVER); ?>
<?php //printr($_GET); ?>
<!--________________________________/Info___________________________________ -->

                    <!-- show only on small screens -->
<div id="logo1" class="d-sm-none pl-3"><a href="<?php echo URLROOT ?>"><img src="<?php echo URLROOT . 'public/icons/MainIcon.png'; ?>" alt="One"></a></div>

                        <!-- Show logged in username -->
<nav class="navbar navbar-expand navbar-light py-0">
  <ul class="navbar-nav"><li class="nav-item"><a class="nav-link" href="<?php echo URLROOT ?>">Home</a></li></ul>
  <ul class="navbar-nav ml-auto">
  <?php if (! \App\Auth::getUser()): ?>
      <li class="nav-item"><a class="nav-link" href="<?php echo URLROOT . 'admin/adminC/alogin';?>">admin</a></li>
      <li class="nav-item"><a class="nav-link" href="<?php echo URLROOT . 'User/UserC/register';?>">Register!</a></li>
      <li class="nav-item"><a class="nav-link" href="<?php echo URLROOT . 'User/UserC/login'?>"> Login</a></li>
  <?php elseif(\App\Auth::getUser()): ?>
      <?php if (isset($data['user']->name)): ?>
        <li class="nav-item"><span class="nav-link"><?php echo 'Currently logged in: ' . $data['user']->name ; ?></span></li>
    <?php elseif(isset($data['user']->firstname)):  ?>
        <li class="nav-item"><span class="nav-link"><?php echo 'Currently logged in: ' . $data['user']->firstname ; ?></span></li>
      <?php endif; ?>
      <li class="nav-item"><span class="nav-link" style="hover">|</span></li>
      <li class="nav-item"><a class="nav-link" href="<?php echo URLROOT . 'User/UserC/logout'; ?>">Logout</a></li>
  <?php endif;?>
  </ul>
</nav>


<!--____________________________________Top navbar___________________________-->
<div class="row">
<div class="col">

<nav class="navbar navbar-expand-sm navbar-light justify-content-end" style="background-color: #41c0f0">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTopContent" aria-controls="navbarTopContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span><span class="ml-2">Meniu</span>
  </button>
    <div class="collapse navbar-collapse" id="navbarTopContent">
      <ul class="navbar-nav">
          <li class="nav-item">
            <i class="material-icons" style="vertical-align:middle">airplanemode_active</i>
            <a class="nav-link" style="display:inline-block; padding-left:0px" href="#">Lėktuvų bilietai</a>
          </li>
        <li class="nav-item">
            <i class="material-icons" style="vertical-align:middle">hotel</i>
          <a class="nav-link" style="display:inline-block; padding-left:0px" href="#">Viešbučiai</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Papildomos paslaugos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Kelionių kryptys</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT . 'admin/blogC/blogIndex'; ?>">Blog'as</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item d-none d-md-block">
          <i class="material-icons md-18" style="vertical-align:middle" >phone </i>
          <a class="nav-link" style="display:inline" href="#">+ 370 123 45678</a>
        </li>
        <li class="nav-item mr-2 d-none d-md-block">
            <i class="material-icons" style="vertical-align:middle">mail_outline</i>
            <a class="nav-link" style="display:inline" href="#">labas@one.lt</a>
        </li>
      </ul>
    </div> <!-- nvavbar collapse -->
</nav>
</div>
</div>

    <!--__________________________________Main Nav_______________________________-->
    <div id="logo1" class="d-none d-sm-inline-block pl-3"><a href="<?php echo URLROOT ?>"><img src="<?php echo URLROOT . 'public/icons/MainIcon.png'; ?>" alt="One"></a></div>
<nav class="navbar navbar-expand-sm navbar-light pb-0" style="display:inline-block">
</button>
<div class="collapse navbar-collapse" id="MainNavbar">
  <ul class="navbar-nav">
    <li class="navbar-item ">
      <a class="nav-link" href="<?php echo URLROOT . 'kelionesC/keliones?KelTipas=OneRekomenduoja'; ?>">One rekomenduoja</a>
    </li>
    <li class="navbar-item">
      <a class="nav-link" href="<?php echo URLROOT . 'kelionesC/keliones?KelTipas=PoilsisLietuvoje'; ?>">Poilsis Lietuvoje</a>
    </li>
    <li class="navbar-item">
      <a class="nav-link" href="<?php echo URLROOT . 'kelionesC/keliones?KelTipas=Pazintine'; ?>">Pažintinės</a>
    </li>
    <li class="navbar-item">
      <a class="nav-link" href="<?php echo URLROOT . 'kelionesC/keliones?KelTipas=Egzotine';?>">Egzotinės</a>
    </li>
    <li class="navbar-item">
      <a class="nav-link" href="<?php echo URLROOT . 'kelionesC/keliones?KelTipas=Savaitgalio'; ?>">Savaitgalio</a>
    </li>
    <li class="navbar-item">
      <a class="nav-link" href="<?php echo URLROOT . 'kelionesC/keliones?KelTipas=Poilsine'; ?>">Poilsinės</a>
    </li>
    <li class="navbar-item">
      <a class="nav-link" href="<?php echo URLROOT . 'kelionesC/keliones?KelTipas=Kruizas'; ?>">Kruizai</a>
    </li>
  </ul>
</div>
</nav>
<?php
// if (isset($_GET['KelTipas']) && $_GET['KelTipas'] == 'Egzotine') {
//       echo "<b>Egzotine</b>";
// } else {
//     echo 'Egzotine';
// }
?>

<!-- Lets make active links -->
<!-- <script type="text/javascript">
    let currentStr = "<?php //echo $_GET['KelTipas']; ?>";
    const mainNavbarObj = {"OneRekomenduoja":0, "PoilsisLietuvoje":1, "Pazintine":2, "Egzotine":3, "Savaitgalio":4, "Poilsine":5, "Kruizas":6}
    let current = document.getElementById('MainNavbar').getElementsByTagName('a')[mainNavbarObj[currentStr]];
    current.className += " activeLink1 ";
</script> -->
