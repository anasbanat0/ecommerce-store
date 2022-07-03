<?php
if (!isset($_SESSION['admin_email'])) {
  echo "<script>window.open('login.php','_self')</script>";
} else {
?>

  <?php
  $get_about_us = "SELECT * FROM `about_us`";
  $run_about_us = mysqli_query($conn, $get_about_us);
  $row_about_us = mysqli_fetch_array($run_about_us);
  $about_heading = $row_about_us['about_heading'];
  $about_short_desc = $row_about_us['about_short_desc'];
  $about_desc = $row_about_us['about_desc'];
  ?>
  <div class="row mt-4">
    <div class="col-lg-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            <i class="fas fa-tachometer-alt"></i> Dashboard / Edit About Us Page
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
            <i class="fas fa-money-bill"></i> Edit About Us Page
          </h5>
        </div>
        <div class="card-body">
          <form action="" method="post">
            <div class="form-group form-row">
              <label class="col-form-label col-md-3 text-right">About Us Heading</label>
              <div class="col-md-7">
                <input type="text" name="about_heading" value="<?= $about_heading ?>" class="form-control" required>
              </div>
            </div>
            <div class="form-group form-row">
              <label class="col-form-label col-md-3 text-right">About Us Short Description</label>
              <div class="col-md-7">
                <textarea name="about_short_desc" class="form-control">
                  <?= $about_short_desc ?>
                </textarea>
              </div>
            </div>
            <div class="form-group form-row">
              <label class="col-form-label col-md-3 text-right">About Us Description</label>
              <div class="col-md-7">
                <textarea name="about_desc" class="form-control">
                  <?= $about_desc ?>
                </textarea>
              </div>
            </div>
            <div class="form-group form-row">
              <label class="col-md-3"></label>
              <div class="col-md-7">
                <input type="submit" name="submit" value="Update About Us Page" class="form-control btn btn-primary">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php
if(isset($_POST['submit'])) {
  $about_heading = $_POST['about_heading'];
  $about_short_desc = $_POST['about_short_desc'];
  $about_desc = $_POST['about_desc'];
  $update_about_us = "UPDATE `about_us` SET `about_heading`='$about_heading',`about_short_desc`='$about_short_desc',`about_desc`='$about_desc'";
  $run_about_us = mysqli_query($conn, $update_about_us);
  if($run_about_us) {
    echo "<script>alert('About us page has been updated')</script>";
    echo "<script>window.open('index.php?dashboard','_self')</script>";
  }
}
?>
<?php } ?>