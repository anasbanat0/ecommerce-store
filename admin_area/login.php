<?php
$title = "Admin Login";
session_start();
require 'includes/db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="css/login.css">
</head>

<body>
  <div class="container">
    <form class="form-login" action="" method="post">
      <h2 class="form-login-heading">Admin Login</h2>
      <input type="text" name="admin_email" class="form-control" placeholder="Email Address" required>
      <input type="password" name="admin_pass" class="form-control" placeholder="Password" required>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="admin_login">
        Login
      </button>
    </form>
  </div>
</body>

</html>
<?php
if (isset($_POST['admin_login'])) {
  $admin_email = mysqli_real_escape_string($conn, $_POST['admin_email']);
  $admin_pass = mysqli_real_escape_string($conn, $_POST['admin_pass']);
  $get_admin = "SELECT * FROM `admins` WHERE admin_email='$admin_email' AND admin_pass='$admin_pass'";
  $run_admin = mysqli_query($conn, $get_admin);
  $count = mysqli_num_rows($run_admin);
  if ($count == 1) {
    $_SESSION['admin_email'] = $admin_email;
    echo "<script>alert('You have been logged in into admin panel')</script>";
    echo "<script>window.open('index.php?dashboard', '_self')</script>";
  } else {
    echo "<script>alert('Email or Password is Wrong')</script>";
  }
}
?>