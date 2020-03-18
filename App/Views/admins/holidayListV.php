<?php require_once APPROOT . '/Views/headfoot/admin_header.php'; ?>
<!--_________________________________/Header_________________________________-->
                            <!-- Holiday table -->
<div class="row">
  <div class="col">

  <h2>all</h2>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>id</th>
          <th>Pavadinimas</th>
          <th>Kelionės Tipas</th>
          <th>Įkelta</th>
          <th>Kaina(€)</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <!-- <tr>
          <td>1,001</td>
          <td>Lorem</td>
          <td>ipsum</td>
          <td>dolor</td>
          <td>sit</td>
        </tr> -->
        <?php foreach($data['keliones'] as $kelione): ?>
            <tr id="adm_keliones_tr<?php echo $kelione['id']; ?>">
              <td><?php echo $kelione['id'] ?></td>
              <td><?php echo $kelione['Pavadinimas'] ?></td>
              <td><?php echo $kelione['KelionesTipas'] ?></td>
              <td><?php echo $kelione['KadaIkelta'] ?></td>
              <td><?php echo $kelione['Kaina'] ?></td>
              <td> <button type="button" onClick="holidayEdit(<?php echo $kelione['id']; ?>)" class="btn btn-primary btn-sm" id="adm_edit_holiday">Edit</button> </td>
              <td> <button type="button" onClick="holidayDel(<?php echo $kelione['id']; ?>)" class="btn btn-danger btn-sm" id="adm_delete_holiday">Delete</button> </td>
              <?php endforeach; ?>
            <tr>
      </tbody>
    </table>
  </div>

</div>
</div>

</div> <!-- /main-col10 -->
</div> <!-- /main row -->

                <!-- Javascript for edit/delete holidays  -->
<script>
function holidayEdit(id) {
    // change color of line effected
    let x = document.getElementById("adm_keliones_tr" + id);
    x.style.backgroundColor ="lightgray";
    console.log(x);

        // redirect
        let url = '<?php echo URLROOT . "admin/adminC/editholiday?id=" ?>' + id;
        window.location.href = url;

}

function holidayDel(id){
    // change color of line effected
    let x = document.getElementById("adm_keliones_tr" + id);
    x.style.backgroundColor ="gray";
    console.log(x);

    //set timeout function was added due to alert documentOM doesn't repaint element in time
    setTimeout(function() {
    if (confirm('Are you sure you want to delete this(id= ' + id + ') holiday?')){

        // Ajax call
        let xhr = new XMLHttpRequest();
        let method = 'GET';
        // delete holiday controller
        let url = '<?php echo URLROOT . '/admin/adminC/deleteHoliday?id='?>' + id;
        xhr.open(method, url);
        xhr.send();

        //receiving response from sidebarSearch.php
        xhr.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.readyState);
                console.log(this.status);

                //alert(this.responseText);
            }
        }
        x.style="display:none;";
        alert('holiday deleted');
    } else {
        x.style.backgroundColor ="white";
    }

    }, 50);

}
</script>
































<!--_________________________________Footer__________________________________-->
<?php require_once APPROOT . '/Views/headfoot/admin_footer.php'; ?>
