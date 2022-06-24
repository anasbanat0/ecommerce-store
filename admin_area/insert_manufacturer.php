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
            <i class="fas fa-tachometer-alt"></i> Dashboard / Insert Manufacturer
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
            <i class="fas fa-money-bill"></i> Insert Manufacturer
          </h5>
        </div>
        <div class="card-body">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group form-row">
              <label class="col-form-label col-md-3 text-right">Manufacturer Name</label>
              <div class="col-md-6">
                <input type="text" name="manufacturer_name" class="form-control" required>
              </div>
            </div>
            <div class="form-group form-row">
              <label class="col-form-label col-md-3 text-right">Show as Top Manufacturers</label>
              <div class="col-md-6 mt-2">
                <input type="radio" name="manufacturer_top" value="yes">
                <label>Yes</label>
                <input type="radio" name="manufacturer_top" value="no">
                <label>No</label>
              </div>
            </div>
            <div class="form-group form-row">
              <label class="col-form-label col-md-3 text-right">Select Manufacturer Image</label>
              <div class="col-md-6">
                <input type="file" name="manufacturer_image" class="form-control">
              </div>
            </div>
            <div class="form-group form-row">
              <label class="col-form-label col-md-3 text-right"></label>
              <div class="col-md-6">
                <input type="submit" name="submit" class="form-control btn btn-primary" value="Insert Manufacturer">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php
  if(isset($_POST['submit'])) {
    $manufacturer_name = $_POST['manufacturer_name'];
    $manufacturer_top = $_POST['manufacturer_top'];
    $manufacturer_image = $_FILES['manufacturer_image']['name'];
    $tmp_name = $_FILES['manufacturer_image']['tmp_name'];
    move_uploaded_file($tmp_name,"other_images/$manufacturer_image");
    $insert_manufacturer = "INSERT INTO `manufacturers` (`manufacturer_title`,`manufacturer_top`,`manufacturer_image`) VALUES ('$manufacturer_name','$manufacturer_top','$manufacturer_image')";
    $run_manufacturer = mysqli_query($conn, $insert_manufacturer);
    if($run_manufacturer) {
      echo "<script>alert('New Manufacturer has been inserted')</script>";
      echo "<script>window.open('index.php?view_manufacturers', '_self')</script>";
    }
  }
  ?>


<?php } ?>