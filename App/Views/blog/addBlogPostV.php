<?php require_once APPROOT . '/Views/headfoot/admin_header.php'; ?>
<!--_________________________________/Header_________________________________-->
<!-- __________________________________Main_________________________________ -->

<form action="" method="post">
<div class="col-8">
  <label for="blogPav">Pavadinimas:</label>
    <input class="form-control" type="text" id="blogPav" name="Pavadinimas"><br>
  <textarea name="Content" id="editor" rows="10" cols="50"></textarea><br>
  <label for="addBlogPostMainImg">Main Img:</label>
    <input class="form-control" type="file" id="addBlogPostMainImg" name="MainImage" ><br>
  <button class="btn btn-success" type="submit" name="createBlogPost">Create Post</button>
  <!-- set author var -->
  <?php $author = $data['user']->firstname  . ' ' .  $data['user']->lastname; ?>
  <input type="hidden" name="Author" value="<?php echo $author; ?>">
</div>
</form>

<!-- ckeditor5 classic -->
<script src="https://cdn.ckeditor.com/ckeditor5/15.0.0/classic/ckeditor.js"></script>
<script>ClassicEditor.create(document.getElementById('editor'));</script>
<script>
// Set editor width to 100% and height to 350px.
let x = document.getElementById('editor');
console.log(x);
</script>

<?php printr($_SESSION); ?>
























<!--_________________________________Footer__________________________________-->
<?php require_once APPROOT . '/Views/headfoot/admin_footer.php'; ?>
