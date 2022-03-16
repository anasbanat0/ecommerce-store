<?php
if (!isset($_SESSION['admin_email'])) {
  echo "<script>window.open('login.php','_self')</script>";
} else {
?>

  <div class="row mt-4">
    <div class="col-lg-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            <i class="fas fa-tachometer-alt"></i> Dashboard / View Users
          </li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header pb-0 pt-2">
          <h4 class="card-title">
            <i class="fas fa-money-bill"></i> View Users
          </h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
              <thead>
                <tr>
                  <th>User No:</th>
                  <th>User Name:</th>
                  <th>User Email:</th>
                  <th>User Image:</th>
                  <th>User Country:</th>
                  <th>User Job:</th>
                  <th>Delete User:</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                $get_admin = "SELECT * FROM `admins`";
                $run_admin = mysqli_query($conn, $get_admin);
                while ($row_admin = mysqli_fetch_array($run_admin)) {
                  $admin_id = $row_admin['admin_id'];
                  $admin_name = $row_admin['admin_name'];
                  $admin_email = $row_admin['admin_email'];
                  $admin_image = $row_admin['admin_image'];
                  $admin_country = $row_admin['admin_country'];
                  $admin_job = $row_admin['admin_job'];
                  $i++;
                ?>
                  <tr>
                    <td>#<?= $i ?></td>
                    <td><?= $admin_name ?></td>
                    <td><?= $admin_email ?></td>
                    <td><img src="admin_images/<?= $admin_image ?>" width="70" alt="<?= $admin_name ?>"></td>
                    <td><?= $admin_country ?></td>
                    <td><?= $admin_job ?></td>
                    <td class="text-center">
                      <a class="btn btn-danger" href="index.php?user_delete=<?= $admin_id ?>">
                        <i class="fas fa-trash-alt"></i> Delete
                      </a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php } ?>