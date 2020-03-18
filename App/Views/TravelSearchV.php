<?php require_once APPROOT . '/Views/headfoot/header.php'; ?>
<!--__________________________________Main___________________________________-->

<div class="row"> <!-- main row -->
<div class="col-md-9 order-2 order-md-1"> <!-- main col -->
  <h2>Kelionių paieška</h2><hr>
<div class="keliones" id="keldiv">

<div class="row">
  <?php if(!isset($data['keliones'])){ $data['keliones'] = [];}?>
    <?php if (empty($data['keliones'])){ echo '<div class="col">Deja kelionių pagal esamus parametrus šiuo metu neturime.</div>'; } ?>

    <?php foreach($data['keliones'] as $kelione): ?>
        <div class="col-sm-12">
          <div class="card my-2 mx-2">
            <div class="kelioniu-img" id="travelSearchV">
              <a href="<?php echo URLROOT . 'kelioneC/kelione?id=' . $kelione['id']; ?>"><img src="<?php echo URLROOT .'public/images/keliones/Visos/' . $kelione['MainImage'];?>" width="100%" alt="CiaturetubutImg"></a>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-8 col-lg-9">
                  <h4><a href="kelioneC/kelione"><?php echo $kelione['Pavadinimas']; ?></a></h4>
                  <p><a href="kelioneC/kelione"><?php echo $kelione['Title'] . ' - €' .  $kelione['Kaina']; ?></a></p>
                </div>
                <div class="col-md-3">
                  <a class="btn btn-primary py-1 px-5" href="<?php echo URLROOT . 'kelioneC/kelione?id=' . $kelione['id']; ?>" role="button">Plačiau</a>
                </div>
              </div>
            </div>
          </div>
        </div>
    <?php endforeach; ?>
</div>
</div>
</div> <!-- /main col -->
<!--______________________________SideBar____________________________________-->
<div class="col-md-3 order-1 order-md-2 px-lg-2 pt-lg-0">
  <div class="row">
    <div class="col px-1 px-lg-2">
      <?php require_once APPROOT . '/Views/bars/sidebar1.php'; ?>
    </div>
  </div>
 </div>

</div> <!-- /main row -->

<!--________________________________Javascript_______________________________-->
<script>
 // if 1st redirect was made
    if (sessionStorage.getItem('1st_redirect_val')){
        jsSearch();
    }
    sessionStorage.removeItem('1st_redirect_val');
</script>
<!--________________________________Javascript_______________________________-->
<!--_________________________________Footer__________________________________-->
<?php require_once APPROOT . '/Views/headfoot/footer.php'; ?>
