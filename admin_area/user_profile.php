<?php
if (!isset($_SESSION['admin_email'])) {
  echo "<script>window.open('login.php','_self')</script>";
} else {
?>
  <?php
  if (isset($_GET['user_profile'])) {
    $edit_id = $_GET['user_profile'];
    $get_admin = "SELECT * FROM `admins` WHERE `admin_id`='$edit_id'";
    $run_admin = mysqli_query($conn, $get_admin);
    $row_admin = mysqli_fetch_array($run_admin);
    $admin_id = $row_admin['admin_id'];
    $admin_name = $row_admin['admin_name'];
    $admin_email = $row_admin['admin_email'];
    $admin_pass = $row_admin['admin_pass'];
    $admin_image = $row_admin['admin_image'];
    $new_admin_image = $row_admin['admin_image'];
    $admin_country = $row_admin['admin_country'];
    $admin_contact = $row_admin['admin_contact'];
    $admin_job = $row_admin['admin_job'];
    $admin_about = $row_admin['admin_about'];
  }
  ?>
  <div class="row mt-4">
    <div class="col-lg-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            <i class="fas fa-tachometer-alt"></i> Dashboard / Edit Profile
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
            <i class="fas fa-money-bill"></i> Edit Profile
          </h4>
        </div>
        <div class="card-body">
          <form method="post" enctype="multipart/form-data">
            <div class="form-group form-row">
              <label class="col-form-label col-md-3 px-5 text-right">User Name</label>
              <div class="col-md-6">
                <input type="text" name="admin_name" value="<?= $admin_name ?>" class="form-control" required>
              </div>
            </div>
            <div class="form-group form-row">
              <label class="col-form-label col-md-3 px-5 text-right">User Email</label>
              <div class="col-md-6">
                <input type="email" name="admin_email" value="<?= $admin_email ?>" class="form-control" required>
              </div>
            </div>
            <div class="form-group form-row">
              <label class="col-form-label col-md-3 px-5 text-right">User Password</label>
              <div class="col-md-6">
                <input type="text" name="admin_pass" value="<?= $admin_pass ?>" class="form-control" required>
              </div>
            </div>
            <div class="form-group form-row">
              <label class="col-form-label col-md-3 px-5 text-right">User Country</label>
              <div class="col-md-6">
                <input type="text" name="admin_country" value="<?= $admin_country ?>" class="form-control" required>
              </div>
            </div>
            <div class="form-group form-row">
              <label class="col-form-label col-md-3 px-5 text-right">User Job</label>
              <div class="col-md-6">
                <input type="text" name="admin_job" value="<?= $admin_job ?>" class="form-control" required>
              </div>
            </div>
            <div class="form-group form-row">
              <label class="col-form-label col-md-3 px-5 text-right">User Contact</label>
              <div class="col-md-6">
                <input type="text" name="admin_contact" value="<?= $admin_contact ?>" class="form-control" required>
              </div>
            </div>
            <div class="form-group form-row">
              <label class="col-form-label col-md-3 px-5 text-right">User About</label>
              <div class="col-md-6">
                <textarea name="admin_about" id="mytextarea" class="form-control" cols="30" rows="10">
                  <?= $admin_about ?>
                </textarea>
              </div>
            </div>
            <div class="form-group form-row">
              <label class="col-form-label col-md-3 px-5 text-right">User Image</label>
              <div class="col-md-6">
                <input type="file" name="admin_image" class="form-control">
                <img src="admin_images/<?= $admin_image ?>" width="100" class="img-fluid mt-2" alt="<?= $admin_name ?>">
              </div>
            </div>
            <div class="form-group form-row">
              <label class="col-md-3"></label>
              <div class="col-md-6">
                <input type="submit" value="Update User" name="update" class="btn btn-primary form-control">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php
  if (isset($_POST['update'])) {
    $admin_name = $_POST['admin_name'];
    $admin_email = $_POST['admin_email'];
    $admin_pass = $_POST['admin_pass'];
    $admin_country = $_POST['admin_country'];
    $admin_job = $_POST['admin_job'];
    $admin_contact = $_POST['admin_contact'];
    $admin_about = $_POST['admin_about'];
    $admin_image = $_FILES['admin_image']['name'];
    $temp_admin_image = $_FILES['admin_image']['tmp_name'];
    move_uploaded_file($temp_admin_image, "admin_images/$admin_image");
    if (empty($admin_image)) {
      $admin_image = $new_admin_image;
    }
    $update_admin = "UPDATE `admins` SET `admin_name`='$admin_name',`admin_email`='$admin_email',`admin_pass`='$admin_pass',`admin_image`='$admin_image',`admin_contact`='$admin_contact',`admin_country`='$admin_country',`admin_job`='$admin_job',`admin_about`='$admin_about' WHERE `admin_id`= '$admin_id'";
    $run_admin = mysqli_query($conn, $update_admin);
    if ($run_admin) {
      echo "<script>alert('User has been updated successfully and login again')</script>";
      echo "<script>window.open('login.php','_self')</script>";
      session_destroy();
    }
  }
  ?>
<?php } ?>