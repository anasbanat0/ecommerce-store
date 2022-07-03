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
            <i class="fas fa-tachometer-alt"></i> Dashboard / View Services
          </li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header pb-0 pt-2">
          <h5 class="card-title">
            <i class="fas fa-money-bill"></i> View Services
          </h5>
        </div>
        <div class="card-body">
          <div class="row">
            <?php
            $get_services = "SELECT * FROM `services`";
            $run_services = mysqli_query($conn, $get_services);
            while ($row_services = mysqli_fetch_array($run_services)) {
              $service_id = $row_services['service_id'];
              $service_title = $row_services['service_title'];
              $service_image = $row_services['service_image'];
              $service_desc = substr($row_services['service_desc'], 0, 280);
              $service_button = $row_services['service_button'];
              $service_url = $row_services['service_url'];
            ?>
              <div class="col-lg-4 col-md-4">
                <div class="card mb-3">
                  <div class="card-header bg-primary pb-0">
                    <h3 class="card-title text-center">
                      <?= $service_title ?>
                    </h3>
                  </div>
                  <div class="card-body">
                    <img src="services_images/<?= $service_image ?>" alt="<?= $service_title ?>" class="img-fluid img-thumbnail">
                    <p class="mt-3 mb-0"><?= $service_desc ?></p>
                  </div>
                  <div class="card-footer text-center">
                    <a href="index.php?delete_service=<?= $service_id ?>" class="float-left btn btn-danger">
                      <i class="fas fa-trash-alt"></i> Delete
                    </a>
                    <a href="index.php?edit_service=<?= $service_id ?>" class="float-right btn btn-primary">
                      <i class="fas fa-edit"></i> Edit
                    </a>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php } ?>