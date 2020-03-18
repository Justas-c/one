<!--__________________________________PHP____________________________________-->
<?php //currentFile('Home/index'); ?>
<?php require_once APPROOT . '/Views/headfoot/header.php'; ?>
<!--__________________________________PHP____________________________________-->
                                <!-- Main -->
<div class="row"> <!-- main row -->
<div class="col-md-9 order-2 order-md-1"> <!-- main col -->

                    <!-- Get Current Page title -->
    <div class="row"><div class="col">
        <h1 style="color: #443857">
          <?php
          // Echo title keliones tipas;
          if (isset($data['keliones_tipas'])){
              if ($data['keliones_tipas'] == 'Pazintine' || $data['keliones_tipas'] == 'Egzotine' || $data['keliones_tipas'] == 'Poilsine'){
                  echo substr($data['keliones_tipas'], 0, -1) . 'ės kelionės';
              } elseif($data['keliones_tipas'] == 'Savaitgalio') {
                  echo $data['keliones_tipas'] . ' kelionės';
              } elseif($data['keliones_tipas'] == 'Kruizas') {
                  echo 'Kruizai';
              } elseif($data['keliones_tipas'] == 'PoilsisLietuvoje') {
                  echo 'Poilsis Lietuvoje';
              } else {
                  echo $data['keliones_tipas'];
              }
          }
          ?><hr></h1>
    </div></div>

  <div class="row">
<!--__________________________________TEST__________________________________ -->
    <?php if(!isset($data['keliones'])){ $data['keliones'] = [];}?>
<!--__________________________________TEST__________________________________ -->

      <?php if (empty($data['keliones'])){ echo '<div class="col">Deja kelionių pagal esamus parametrus šiuo metu neturime.</div>'; } ?>
      <?php foreach($data['keliones'] as $kelione): ?>
          <div class="col-sm-12">
            <div class="card my-2 mx-2">
              <div class="kelioniu-img">
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
</div> <!-- /cold-md-9 -->

<!--______________________________SideBar____________________________________-->
<div class="col-md-3 order-1 order-md-2 px-lg-2 pt-lg-0">
  <div class="row">
    <div class="col px-1 px-lg-2">
  <?php require_once APPROOT . '/Views/bars/sidebar1.php'; ?>
    </div>
  </div>
 </div>

</div> <!-- /main row -->
<!--_________________________________Footer__________________________________-->
<?php require_once APPROOT . '/Views/headfoot/footer.php'; ?>
