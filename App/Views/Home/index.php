<!--__________________________________PHP____________________________________-->
<?php //currentFile('Home/index'); ?>
<?php require_once APPROOT . '/Views/headfoot/header.php'; ?>
<!--__________________________________PHP____________________________________-->
                                <!-- Main -->
<div class="row"> <!-- main row -->
<div class="col-md-9 order-2 order-md-1"> <!-- main col -->
  <div class="row">


    <?php foreach($data['keliones'] as $kelione): ?>
        <div class="col-sm-6 p-md-2 p-1">
          <div class="card my-2 mx-1">
            <div class="mainpage-img">
              <a href="kelioneC/kelione?id=<?php echo $kelione['id']; ?>"><img src="<?php echo URLROOT .'public/images/keliones/Visos/' . $kelione['MainImage'];?>" width="100%" alt="CiaturetubutImg"></a>
            </div>
          <div class="card-body" style="display: block;">
            <h4><a href="kelioneC/kelione?id=<?php echo $kelione['id']; ?>"><?php echo $kelione['Pavadinimas']; ?></a></h4>
            <p><a href="kelioneC/kelione?id=<?php echo $kelione['id']; ?>"><?php echo $kelione['Title'] . ' - € ' .  $kelione['Kaina']; ?></a></p>
            <a class="btn btn-primary py-1 px-3" href="<?php echo URLROOT . 'kelioneC/kelione?id=' . $kelione['id']; ?>" role="button">Plačiau</a>
          </div>
          </div>
        </div>
    <?php endforeach; ?>

  </div>
</div> <!-- /cold-md-9 -->

<!--__________________________________ Sidebar_______________________________-->
<div class="col-md-3 order-1 order-md-2 px-lg-2 pt-lg-0">
  <div class="row">
    <div class="col px-1 px-lg-2">
  <?php require_once APPROOT . '/Views/bars/sidebar1.php'; ?>
    </div>
  </div>
</div>
<!--__________________________________TEST__________________________________ -->
<!--_________________________________/TEST__________________________________ -->
</div>
<!-- /main row dd -->
<!--_________________________________Footer__________________________________-->


<?php require_once APPROOT . '/Views/headfoot/footer.php'; ?>
