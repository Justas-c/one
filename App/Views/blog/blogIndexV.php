<?php require_once APPROOT . '/Views/headfoot/header.php'; ?>
<!--__________________________________Main___________________________________-->
<!-- Main row -->
<div class="row">
  <!-- Main col -->
<div  class="col-md-9">

<!-- reverse array so the newest post will come first -->
<?php $data['allBlogPosts'] = array_reverse($data['allBlogPosts']);  ?>

<?php foreach($data['allBlogPosts'] as $post): ?>
<div class="col-sm-12">
  <div class="card my-2 mx-2">
    <div class="kelioniu-img">
      <a href="<?php //echo URLROOT . 'kelioneC/kelione?id=' . $data[$i]['id']; ?>"><img src="<?php echo URLROOT .'public/images/blogImg/' . $post['MainImage'];?>" width="100%" alt="CiaturetubutImg"></a>
    </div>
    <div class="card-body">
      <div class="row">

      <div class="col-md-8 col-lg-9">
        <h4><a href="#"><?php echo $post['Pavadinimas']; ?></a></h4>
      </div>
      <div class="col-md-3">
        <a class="btn btn-primary py-1 px-5" href="<?php echo URLROOT . 'admin/BlogC/idvBlogPost?id=' . $post['id']; ?>" role="button">Plačiau</a>
      </div>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
</div>



<!-- sidebar -->
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
