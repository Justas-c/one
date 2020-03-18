<?php require_once APPROOT . '/Views/headfoot/admin_header.php'; ?>
<!--_________________________________/Header_________________________________-->
<!--________________________________ Main Content __________________________ -->

    <!-- list of admins -->
    <div class="row">
      <div class="col">
      <h2>all</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>id</th>
              <th>firstName</th>
              <th>lastName</th>
              <th>email</th>
              <th>telephone</th>
              <th>level</th>
              <th>is active</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($data['all_admins'] as $admin): ?>
                <tr>
                  <td><?php echo $admin['id'] ?></td>
                  <td><?php echo $admin['firstname'] ?></td>
                  <td><?php echo $admin['lastname'] ?></td>
                  <td><?php echo $admin['email'] ?></td>
                  <td><?php echo $admin['telephone'] ?></td>
                  <td><?php echo $admin['level'] ?></td>
                  <td><?php echo $admin['is_active'] ?></td>
                  <?php endforeach; ?>
              </tr>
          </tbody>
        </table>
      </div>

    </div>
    </div>

































<!--_________________________________Footer__________________________________-->
<?php require_once APPROOT . '/Views/headfoot/admin_footer.php'; ?>
