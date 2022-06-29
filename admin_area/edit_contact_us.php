<?php
if (!isset($_SESSION['admin_email'])) {
  echo "<script>window.open('login.php','_self')</script>";
} else {
?>
  <?php
  $get_contact_us = "SELECT * FROM `contact_us`";
  $run_contact_us = mysqli_query($conn, $get_contact_us);
  $row_contact_us = mysqli_fetch_array($run_contact_us);
  $contact_email = $row_contact_us['contact_email'];
  $contact_heading = $row_contact_us['contact_heading'];
  $contact_desc = $row_contact_us['contact_desc'];
  ?>
  <div class="row mt-4">
    <div class="col-lg-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            <i class="fas fa-tachometer-alt"></i> Dashboard / Edit Contact Us
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
            <i class="fas fa-money-bill"></i> Edit Contact Us
          </h5>
        </div>
        <div class="card-body">
          <form action="" method="post">
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Contact Email</label>
              <div class="col-md-6">
                <input type="email" name="contact_email" class="form-control" value="<?= $contact_email ?>">
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Contact Heading</label>
              <div class="col-md-6">
                <input type="text" name="contact_heading" class="form-control" value="<?= $contact_heading ?>">
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Contact Description</label>
              <div class="col-md-6">
                <textarea name="contact_desc" class="form-control" cols="30" rows="10"><?= $contact_desc ?></textarea>
              </div>
            </div>
            <div class="form-group form-row">
              <label class="col-md-3"></label>
              <div class="col-md-6">
                <input type="submit" name="submit" class="form-control btn btn-primary" value="Update Contact Us">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php
  if (isset($_POST['submit'])) {
    $contact_email = $_POST['contact_email'];
    $contact_heading = $_POST['contact_heading'];
    $contact_desc = $_POST['contact_desc'];
    $update_contact_us = "UPDATE `contact_us` SET `contact_email`='$contact_email',`contact_heading`='$contact_heading',`contact_desc`='$contact_desc'";
    $run_contact_us = mysqli_query($conn, $update_contact_us);
    if ($run_contact_us) {
      echo "<script>alert('Contact us page has been updated')</script>";
      echo "<script>window.open('index.php?dashboard','_self')</script>";
    }
  }
  ?>
<?php } ?>