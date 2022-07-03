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
            <i class="fas fa-tachometer-alt"></i> Dashboard / Insert User
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
            <i class="fas fa-money-bill"></i> Insert User
          </h4>
        </div>
        <div class="card-body">
          <form method="post" enctype="multipart/form-data">
            <div class="form-group form-row">
              <label class="col-form-label col-md-3 px-5 text-right">User Name</label>
              <div class="col-md-6">
                <input type="text" name="admin_name" class="form-control" required>
              </div>
            </div>
            <div class="form-group form-row">
              <label class="col-form-label col-md-3 px-5 text-right">User Email</label>
              <div class="col-md-6">
                <input type="email" name="admin_email" class="form-control" required>
              </div>
            </div>
            <div class="form-group form-row">
              <label class="col-form-label col-md-3 px-5 text-right">User Password</label>
              <div class="col-md-6">
                <input type="password" name="admin_pass" class="form-control" required>
              </div>
            </div>
            <div class="form-group form-row">
              <label class="col-form-label col-md-3 px-5 text-right">User Country</label>
              <div class="col-md-6">
                <input type="text" name="admin_country" class="form-control" required>
              </div>
            </div>
            <div class="form-group form-row">
              <label class="col-form-label col-md-3 px-5 text-right">User Job</label>
              <div class="col-md-6">
                <input type="text" name="admin_job" class="form-control" required>
              </div>
            </div>
            <div class="form-group form-row">
              <label class="col-form-label col-md-3 px-5 text-right">User Contact</label>
              <div class="col-md-6">
                <input type="text" name="admin_contact" class="form-control" required>
              </div>
            </div>
            <div class="form-group form-row">
              <label class="col-form-label col-md-3 px-5 text-right">User About</label>
              <div class="col-md-6">
                <textarea name="admin_about" id="mytextarea" class="form-control" cols="30" rows="10"></textarea>
              </div>
            </div>
            <div class="form-group form-row">
              <label class="col-form-label col-md-3 px-5 text-right">User Image</label>
              <div class="col-md-6">
                <input type="file" name="admin_image" class="form-control" required>
              </div>
            </div>
            <div class="form-group form-row">
              <label class="col-md-3"></label>
              <div class="col-md-6">
                <input type="submit" value="Insert User" name="submit" class="btn btn-primary form-control">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php
  if (isset($_POST['submit'])) {
    $admin_name = $_POST['admin_name'];
    $admin_email = $_POST['admin_email'];
    $admin_pass = $_POST['admin_pass'];
    $encrypted_password = password_hash($admin_pass, PASSWORD_DEFAULT);
    $admin_country = $_POST['admin_country'];
    $admin_job = $_POST['admin_job'];
    $admin_contact = $_POST['admin_contact'];
    $admin_about = $_POST['admin_about'];
    $admin_image = $_FILES['admin_image']['name'];
    $temp_admin_image = $_FILES['admin_image']['tmp_name'];
    move_uploaded_file($temp_admin_image, "admin_images/$admin_image");
    $insert_admin = "INSERT INTO `admins`(`admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_contact`, `admin_country`, `admin_job`, `admin_about`) VALUES ('$admin_name', '$admin_email', '$encrypted_password', '$admin_image', '$admin_contact', '$admin_country', '$admin_job', '$admin_about')";
    $run_admin = mysqli_query($conn, $insert_admin);
    if ($run_admin) {
      echo "<script>alert('One user has been inserted successfully')</script>";
      echo "<script>window.open('index.php?view_users','_self')</script>";
    } else {
      echo "<script>alert('I cannot add new user')</script>";
    }
  }
  ?>
<?php } ?>