<?php
if (!isset($_SESSION['admin_email'])) {
  echo "<script>window.open('login.php','_self')</script>";
} else {
?>
  <?php
  if (isset($_GET['edit_enquiry'])) {
    $edit_id = $_GET['edit_enquiry'];
    $get_enquiry_type = "SELECT * FROM `enquiry_type` WHERE `enquiry_id`='$edit_id'";
    $run_enquiry_type = mysqli_query($conn, $get_enquiry_type);
    $row_enquiry_type = mysqli_fetch_array($run_enquiry_type);
    $enquiry_id = $row_enquiry_type['enquiry_id'];
    $enquiry_title = $row_enquiry_type['enquiry_title'];
  }
  ?>
  <div class="row mt-4">
    <div class="col-lg-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            <i class="fas fa-tachometer-alt"></i> Dashboard / Edit Enquiry Type
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
            <i class="fas fa-money-bill"></i> Edit Enquiry Type
          </h5>
        </div>
        <div class="card-body">
          <form action="" method="post">
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Enquiry Type</label>
              <div class="col-md-6">
                <input type="text" name="enquiry_title" class="form-control" value="<?= $enquiry_title ?>">
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-md-3"></label>
              <div class="col-md-6">
                <input type="submit" name="update" class="form-control btn btn-primary" value="Update Enquiry Type">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php
  if (isset($_POST['update'])) {
    $enquiry_title = $_POST['enquiry_title'];
    $update_enquiry = "UPDATE `enquiry_type` SET `enquiry_title`='$enquiry_title' WHERE `enquiry_id`='$enquiry_id'";
    $run_enquiry = mysqli_query($conn, $update_enquiry);
    if ($run_enquiry) {
      echo "<script>alert('Enquiry type has been updated')</script>";
      echo "<script>window.open('index.php?view_enquiry','_self')</script>";
    }
  }
  ?>
<?php } ?>