<?php require_once APPROOT . '/Views/headfoot/admin_header.php'; ?>
<!--_________________________________/Header_________________________________-->
<!--________________________________ Main Content __________________________ -->

      <!-- list of users -->
    <div class="row">
      <div class="col">

      <h2>all</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>id</th>
              <th>Name</th>
              <th>email</th>
              <th>is active</th>
              <th>smth else</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($data['all_users'] as $user): ?>
                <tr>
                  <td><?php echo $user['id'] ?></td>
                  <td><?php echo $user['name'] ?></td>
                  <td><?php echo $user['email'] ?></td>
                  <td><?php echo $user['is_active'] ?></td>
                  <td><?php echo 'else'; ?></td>
                  <?php endforeach; ?>
              </tr>
          </tbody>
        </table>
      </div>

    </div>
    </div>

































<!--_________________________________Footer__________________________________-->
<?php require_once APPROOT . '/Views/headfoot/admin_footer.php'; ?>
