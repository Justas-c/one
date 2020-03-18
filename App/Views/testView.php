<?php //currentFile('Views/TestView'); ?>
<?php //require_once APPROOT . '/Views/headfoot/header.php'; ?>
<!--__________________________________test___________________________________-->


<?php require_once APPROOT . '/Views/headfoot/header.php'; ?>
<!--__________________________________Main___________________________________-->
<div class="row"> <!-- main row -->
  <div class="col-md-9 order-2 order-md-1"> <!-- main col -->

      col9






















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


















<?php br(); ?>
<div class="demo">
  <button type="button" onclick="loadDoc()" name="button">loadDoc</button>
</div>

<div class="demo2">
    <p id="testP">paragraph</p>
</div>



<script>

    function loadDoc(){
        let requestObj = new XMLHttpRequest();
        requestObj.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                alert('hello alert');
                document.getElementById('testP').innerHTML = 'trololo';
            }
        }
        requestObj.open("GET", 'tretretre', true);
        requestObj.send();
        console.log(requestObj);
    }
</script>

<!--__________________________________test__________________________________ -->
<script>
    changeText('test5', 'trololo');


</script>







































<!--_________________________________Footer__________________________________-->
<?php //require_once APPROOT . '/Views/headfoot/footer.php'; ?>
<!--_________________________________Other___________________________________-->
