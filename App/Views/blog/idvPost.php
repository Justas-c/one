<?php require_once APPROOT . '/Views/headfoot/header.php'; ?>
<!--__________________________________Main___________________________________-->
<div class="row py-3"> <!-- Main row -->
<div class="col-md-9">    <!-- Main Col -->
<div class="kelione ml-4 my-3">

<?php
// test
printr($data);
 ?>

                            <!-- Title -->
<h4>
    <?php echo $data['IdvBlogPost']['Pavadinimas'] . ' - ';?>
</h4>
                            <!-- Kada ikelta -->
  <div style = "font-size: 12px;text-align: right;">
    <?php echo 'Įkelta: ' .  explode(' ', $data['IdvBlogPost']['Data'])[0];?>
  </div>
  <div style = "font-size: 12px;text-align: right;">
      <?php echo $data['IdvBlogPost']['Author'];?>
  </div>
<hr style="margin-top: 5px;">

                                <!-- Img -->
  <img src="<?php echo URLROOT .'public/images/blogImg/' . $data['IdvBlogPost']['MainImage'];?>" alt="">

                                <!-- Pavadinimas -->
<p><?php echo nl2br($data['IdvBlogPost']['Pavadinimas']);?></p>
<hr>
                                <!-- Content -->
<?php echo htmlspecialchars_decode($data['IdvBlogPost']['Content']); ?>


</div> <!-- /kelione -->
</div> <!-- /Main Col -->
</div> <!-- /Main row -->
<!--______________________________SideBar___________________________________ -->
<!-- nera kolkas -->
<!--_________________________________Footer__________________________________-->
<?php require_once APPROOT . '/Views/headfoot/footer.php'; ?>
