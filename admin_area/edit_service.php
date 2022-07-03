<?php
if (!isset($_SESSION['admin_email'])) {
  echo "<script>window.open('login.php','_self')</script>";
} else {
?>
  <?php
  if (isset($_GET['edit_service'])) {
    $edit_id = $_GET['edit_service'];
    $get_services = "SELECT * FROM `services` WHERE `service_id`='$edit_id'";
    $run_services = mysqli_query($conn, $get_services);
    $row_services = mysqli_fetch_array($run_services);
    $service_id = $row_services['service_id'];
    $service_title = $row_services['service_title'];
    $service_image = $row_services['service_image'];
    $service_desc = $row_services['service_desc'];
    $service_button = $row_services['service_button'];
    $service_url = $row_services['service_url'];
    $new_service_image = $row_services['service_image'];
  }
  ?>
  <div class="row mt-4">
    <div class="col-lg-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            <i class="fas fa-tachometer-alt"></i> Dashboard / Edit Service
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
            <i class="fas fa-money-bill"></i> Edit Service
          </h5>
        </div>
        <div class="card-body">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Service Title</label>
              <div class="col-md-6">
                <input type="text" name="service_title" class="form-control" required value="<?= $service_title ?>">
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Service Image</label>
              <div class="col-md-6">
                <input type="file" name="service_image" class="form-control">
                <img src="services_images/<?= $service_image ?>" alt="<?= $service_title ?>" width="100" class="mt-1 img-thumbnail">
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Service Description</label>
              <div class="col-md-6">
                <textarea name="service_desc" class="form-control"><?= $service_desc ?></textarea>
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Service Button</label>
              <div class="col-md-6">
                <input type="text" name="service_button" class="form-control" value="<?= $service_button ?>">
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Service URL</label>
              <div class="col-md-6">
                <input type="url" name="service_url" class="form-control" value="<?= $service_url ?>">
              </div>
            </div>
            <div class="form-group form-row">
              <label class="col-md-3"></label>
              <div class="col-md-6">
                <input type="submit" name="update" class="form-control btn btn-primary" value="Update Service">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php
  if (isset($_POST['update'])) {
    $service_title = $_POST['service_title'];
    $service_desc = $_POST['service_desc'];
    $service_button = $_POST['service_button'];
    $service_url = $_POST['service_url'];
    $service_image = $_FILES['service_image']['name'];
    $tmp_image = $_FILES['service_image']['tmp_name'];
    if (empty($service_image)) {
      $service_image = $new_service_image;
    }
    move_uploaded_file($tmp_image, "services_images/$service_image");
    $update_service = "UPDATE `services` SET `service_title`='$service_title',`service_image`='$service_image',`service_desc`='$service_desc',`service_button`='$service_button',`service_url`='$service_url' WHERE `service_id`='$service_id'";
    $run_services = mysqli_query($conn, $update_service);
    if ($run_services) {
      echo "<script>alert('One service column has been updated')</script>";
      echo "<script>window.open('index.php?view_services','_self')</script>";
    }
  }
  ?>
<?php } ?>