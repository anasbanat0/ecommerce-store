<?php
$title = "Services";
include 'includes/db.php';
include 'functions/functions.php';
include_once 'includes/header.php';
?>
<div id="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 mt-4">
        <nav aria-label="breadcrumb">
          <ul class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Services</li>
          </ul>
        </nav>
      </div>
    </div>
    <!-- <div class="row"> -->
    <div class="row services">
      <?php
      $get_services = "SELECT * FROM `services`";
      $run_services = mysqli_query($conn, $get_services);
      while ($row_services = mysqli_fetch_array($run_services)) {
        $service_id = $row_services['service_id'];
        $service_title = $row_services['service_title'];
        $service_image = $row_services['service_image'];
        $service_desc = $row_services['service_desc'];
        $service_button = $row_services['service_button'];
        $service_url = $row_services['service_url'];
      ?>
        <div class="col-md-4 col-sm-6">
          <div class="card mb-4">
            <div class="card-body">
              <img src="admin_area/services_images/<?= $service_image ?>" alt="<?= $service_title ?>" class="img-fluid img-thumbnail">
              <h2 class="text-center mt-3"><?= $service_title ?></h2>
              <p><?= $service_desc ?></p>
              <div class="text-center">
                <a href="<?= $service_url ?>" class="btn btn-primary form-control">
                  <?= $service_button ?>
                </a>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</div>
<?php include_once 'includes/footer.php'; ?>