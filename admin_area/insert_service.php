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
            <i class="fas fa-tachometer-alt"></i> Dashboard / Insert Service
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
            <i class="fas fa-money-bill"></i> Insert Service
          </h5>
        </div>
        <div class="card-body">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Service Title</label>
              <div class="col-md-6">
                <input type="text" name="service_title" class="form-control" required>
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Service Image</label>
              <div class="col-md-6">
                <input type="file" name="service_image" class="form-control" required>
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Service Description</label>
              <div class="col-md-6">
                <textarea name="service_desc" class="form-control"></textarea>
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Service Button</label>
              <div class="col-md-6">
                <input type="text" name="service_button" class="form-control">
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Service URL</label>
              <div class="col-md-6">
                <input type="url" name="service_url" class="form-control">
              </div>
            </div>
            <div class="form-group form-row">
              <label class="col-md-3"></label>
              <div class="col-md-6">
                <input type="submit" name="submit" class="form-control btn btn-primary" value="Insert Service">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php
  if (isset($_POST['submit'])) {
    $service_title = $_POST['service_title'];
    $service_desc = $_POST['service_desc'];
    $service_button = $_POST['service_button'];
    $service_url = $_POST['service_url'];
    $service_image = $_FILES['service_image']['name'];
    $tmp_image = $_FILES['service_image']['tmp_name'];
    move_uploaded_file($tmp_image, "services_images/$service_image");
    $sel_services = "SELECT * FROM `services`";
    $run_services = mysqli_query($conn, $sel_services);
    $count = mysqli_num_rows($run_services);
    if ($count == 3) {
      echo "<script>alert('You have already inserted 3 services columns')</script>";
    } else {
      $insert_service = "INSERT INTO `services` (`service_title`,`service_image`,`service_desc`,`service_button`,`service_url`) VALUES ('$service_title','$service_image','$service_desc','$service_button','$service_url')";
      $run_service = mysqli_query($conn, $insert_service);
      if($run_service) {
        echo "<script>alert('New service column has been inserted')</script>";
        echo "<script>window.open('index.php?view_services','_self')</script>";
      }
    }
  }
  ?>
<?php } ?>