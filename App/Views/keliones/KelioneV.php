<?php //currentFile('Views/keliones/KelioneV'); ?>
<?php require_once APPROOT . '/Views/headfoot/header.php'; ?>
<!--__________________________________Main___________________________________-->
<div class="row py-3"> <!-- Main row -->
<div class="col-md-9">    <!-- Main Col -->
<div class="kelione ml-4 my-3">
<!--_______________________________Kelione__________________________________ -->

                                <!-- Title -->
<h4>
    <?php echo $data['kelione']['Title'] . ' - ';?>
                                <!-- Kaina -->
  <span style="color:41c0f0"><?php echo '€ ' .  $data['kelione']['Kaina']; ?></span>
</h4>
                                <!-- Kada ikelta -->
  <div style = "font-size: 12px;text-align: right;">
    <?php echo 'Įkelta: ' .  $data['kelione']['KadaIkelta'];?>
  </div>
<hr style="margin-top: 5px;">

                                <!-- Intro -->
<p><?php echo $data['kelione']['Intro'] ?></p>

                                <!-- Img -->
  <img src="<?php echo URLROOT .'public/images/keliones/Visos/' . $data['kelione']['MainImage'];?>" alt="">

                                <!-- Programa -->
<p><?php echo nl2br($data['kelione']['Programa']);?></p>
<hr>
                                <!-- Youtube video -->
<?php
// Gaunam youtube video id kuri dedam i iframe
preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $data['kelione']['video'], $youtube_id);
?>
<div class="youtubevideo1">

<iframe width="100%" height="100%" src="<?php echo 'https://www.youtube.com/embed/' . $youtube_id[1]; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
<!-- _________________________________TEST__________________________________ -->



</div><!-- /kelione -->
</div> <!-- /Main Col -->
<!--______________________________/Kelione__________________________________ -->
<!--______________________________SideBar___________________________________ -->
<div class="col-3"><?php require_once APPROOT . '/Views/bars/sidebar2.php'; ?></div>

</div> <!-- /Main row -->


<!-- _________________________________TEST__________________________________ -->
<p><pre></pre></p>
<p>            <?php //echo $data['kelione'][''] ;?>     </p>
<!-- _________________________________TEST__________________________________ -->
<!--_________________________________Footer__________________________________-->
<?php require_once APPROOT . '/Views/headfoot/footer.php'; ?>
