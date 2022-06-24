<?php
if (!isset($_SESSION['admin_email'])) {
  echo "<script>window.open('login.php','_self')</script>";
} else {
?>
  <?php
  if (isset($_GET['edit_manufacturer'])) {
    $edit_manufacturer = $_GET['edit_manufacturer'];
    $get_manufacturer = "SELECT * FROM `manufacturers` WHERE `manufacturer_id`='$edit_manufacturer'";
    $run_manufacturer = mysqli_query($conn, $get_manufacturer);
    $row_manufacturer = mysqli_fetch_array($run_manufacturer);
    $m_id = $row_manufacturer['manufacturer_id'];
    $m_title = $row_manufacturer['manufacturer_title'];
    $m_top = $row_manufacturer['manufacturer_top'];
    $m_image = $row_manufacturer['manufacturer_image'];
  }
  ?>
  <div class="row mt-4">
    <div class="col-lg-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            <i class="fas fa-tachometer-alt"></i> Dashboard / Edit Manufacturer
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
            <i class="fas fa-money-bill"></i> Edit Manufacturer
          </h5>
        </div>
        <div class="card-body">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group form-row">
              <label class="col-form-label col-md-3 text-right">Manufacturer Name</label>
              <div class="col-md-6">
                <input type="text" name="manufacturer_name" class="form-control" value="<?= $m_title ?>" required>
              </div>
            </div>
            <div class="form-group form-row">
              <label class="col-form-label col-md-3 text-right">Show as Top Manufacturers</label>
              <div class="col-md-6 mt-2">
                <input type="radio" name="manufacturer_top" value="yes" <?php if ($m_top == 'no') {
                                                                        } else {
                                                                          echo "checked='checked'";
                                                                        } ?>>
                <label>Yes</label>
                <input type="radio" name="manufacturer_top" value="no" <?php if ($m_top == 'no') {
                                                                          echo "checked='checked'";
                                                                        } else {
                                                                        } ?>>
                <label>No</label>
              </div>
            </div>
            <div class="form-group form-row">
              <label class="col-form-label col-md-3 text-right">Select Manufacturer Image</label>
              <div class="col-md-6">
                <input type="file" name="manufacturer_image" class="form-control">
                <img src="other_images/<?php echo $m_image ?>" alt="<?= $m_title ?>" class="mt-1 img-thumbnail" width="70">
              </div>
            </div>
            <div class="form-group form-row">
              <label class="col-form-label col-md-3 text-right"></label>
              <div class="col-md-6">
                <input type="submit" name="update" class="form-control btn btn-primary" value="Update Manufacturer">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php
  if (isset($_POST['update'])) {
    $manufacturer_name = $_POST['manufacturer_name'];
    $manufacturer_top = $_POST['manufacturer_top'];
    $manufacturer_image = $_FILES['manufacturer_image']['name'];
    $tmp_name = $_FILES['manufacturer_image']['tmp_name'];
    move_uploaded_file($tmp_name, "other_images/$manufacturer_image");
    $update_manufacturer = "UPDATE `manufacturers` SET `manufacturer_title`='$manufacturer_name',`manufacturer_top`='$manufacturer_top',`manufacturer_image`='$manufacturer_image' WHERE `manufacturer_id`='$m_id'";
    $run_manufacturer = mysqli_query($conn, $update_manufacturer);
    if ($run_manufacturer) {
      echo "<script>alert('Manufacturer has been updated')</script>";
      echo "<script>window.open('index.php?view_manufacturers', '_self')</script>";
    }
  }
  ?>


<?php } ?>