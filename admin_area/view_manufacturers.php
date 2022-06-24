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
            <i class="fas fa-tachometer-alt"></i> Dashboard / View Manufacturers
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
            <i class="fas fa-money-bill"></i> View Manufacturers
          </h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
              <thead>
                <tr class="text-center">
                  <th>Manufacturer ID</th>
                  <th>Manufacturer Title</th>
                  <th>Delete Manufacturer</th>
                  <th>Edit Manufacturer</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                $get_manufacturers = "SELECT * FROM `manufacturers`";
                $run_manufacturers = mysqli_query($conn, $get_manufacturers);
                while ($row_manufacturers = mysqli_fetch_array($run_manufacturers)) {
                  $manufacturer_id = $row_manufacturers['manufacturer_id'];
                  $manufacturer_title = $row_manufacturers['manufacturer_title'];
                  $i++;
                ?>
                  <tr>
                    <th>#<?= $i ?></th>
                    <td><?= $manufacturer_title ?></td>
                    <td class="text-center">
                      <a class="btn btn-danger" href="index.php?delete_manufacturer=<?= $manufacturer_id ?>">
                        <i class="fas fa-trash-alt"></i> Delete
                      </a>
                    </td>
                    <td class="text-center">
                      <a class="btn btn-primary" href="index.php?edit_manufacturer=<?= $manufacturer_id ?>">
                        <i class="fas fa-edit"></i> Edit
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