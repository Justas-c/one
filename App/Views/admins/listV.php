<?php require_once APPROOT . '/Views/headfoot/admin_header.php'; ?>
<!--_________________________________/Header_________________________________-->
<div class="row mt-3"> <!-- main row -->

                            <!-- Left sidebar -->
<div class="col-2">
  <?php require_once APPROOT . '/Views/bars/admin/admin_leftsidebar.php'; ?>
</div> <!-- col2 -->

                            <!-- Main Col -->
<div class="col-10">
                    <!-- Title and options button -->
  <div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2>Holiday list</h2>
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" id="optionsDropdown" type="button" data-toggle="dropdown" name="optionsDropdown" aria-expanded="false">Options</button>
        <div class="dropdown-menu dropdown-menu-right" aria-labeledby="optionsDropdown">
          <a class="dropdown-item" href="<?php echo URLROOT . 'admin/adminC/addHolidayForm'; ?>">add Holiday</a>
        </div>
      </div>
  </div>
                        <!-- relevant table -->
<div class="row">
  <div class="col">

  <h2>all</h2>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>id</th>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>email</th>
          <th>telephone</th>
          <th>is_active</th>
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
            <tr>
            <td><?php echo $kelione['id'] ?></td>
            <td><?php echo $kelione['Pavadinimas'] ?></td>
            <td><?php echo $kelione['KelionesTipas'] ?></td>
            <td><?php echo $kelione['KadaIkelta'] ?></td>
            <td><?php echo $kelione['Kaina'] ?></td>
            <td> <button type="button" onClick="" class="btn btn-primary btn-sm" id="adm_edit_holiday">Edit</button> </td>
            <td> <button type="button" onClick="holiday_delete(<?php echo $kelione['id']; ?>)" class="btn btn-danger btn-sm" id="adm_delete_holiday">Delete</button> </td>

        <tr>
    <?php endforeach; ?>
      </tbody>
    </table>
  </div>

</div>
</div>

</div> <!-- /main-col10 -->
</div> <!-- /main row -->
<!--________________________________/TEST___________________________________ -->








<!--_________________________________Footer__________________________________-->
<?php require_once APPROOT . '/Views/headfoot/admin_footer.php'; ?>
