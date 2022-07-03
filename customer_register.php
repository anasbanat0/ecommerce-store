<?php
$title = "Register";
include 'includes/db.php';
include 'functions/functions.php';
include_once 'includes/header.php';
?>
<div id="content">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mt-4">
        <nav aria-label="breadcrumb">
          <ul class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Register</li>
          </ul>
        </nav>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card mb-4">
          <div class="card-header py-4 text-center">
            <h2>Register A New Account</h2>
          </div>
          <form class="py-4 px-4" action="customer_register.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="name">Customer Name</label>
              <input id="name" type="text" class="form-control" name="c_name" required>
            </div>
            <div class="form-group">
              <label for="email">Customer Email</label>
              <input type="email" name="c_email" class="form-control" id="c_email" required>
            </div>
            <div class="form-group">
              <label for="pass">Customer Password</label>
              <div class="input-group">
                <div class="input-group-append">
                  <span class="input-group-text">
                    <i class="fa fa-check tick1"></i>&nbsp;&nbsp;
                    <i class="fa fa-times cross1"></i>
                  </span>
                </div>
                <input type="password" class="form-control" name="c_pass" id="pass" required>
                <div class="input-group-append">
                  <span class="input-group-text">
                    <div id="meter_wrapper">
                      <span id="pass_type"></span>
                      <div id="meter"></div>
                    </div>
                  </span>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="pass">Confirm Password</label>
              <div class="input-group">
                <div class="input-group-append">
                  <span class="input-group-text">
                    <i class="fa fa-check tick2"></i>&nbsp;&nbsp;
                    <i class="fa fa-times cross2"></i>
                  </span>
                </div>
                <input type="password" class="form-control confirm" id="con_pass" required>
              </div>
            </div>
            <div class="form-group">
              <label for="country">Customer Country</label>
              <input type="text" class="form-control" name="c_country" id="country" required>
            </div>
            <div class="form-group">
              <label for="city">Customer City</label>
              <input type="text" class="form-control" name="c_city" id="city" required>
            </div>
            <div class="form-group">
              <label for="contact">Customer Contact</label>
              <input type="text" class="form-control" name="c_contact" id="contact" required>
            </div>
            <div class="form-group">
              <label for="address">Customer Address</label>
              <input type="text" class="form-control" name="c_address" id="address" required>
            </div>
            <div class="form-group">
              <label for="image">Customer Image</label>
              <input type="file" class="form-control" name="c_image" id="image" required>
            </div>
            <div class="form-group">
              <center>
                <p class="g-recaptcha" data-sitekey="6LciJKwgAAAAAIgnoXgDe9VDVVIroo-ykOL9j0w1"></p>
              </center>
            </div>
            <div class="form-group">
              <div class="text-center">
                <button type="submit" name="register" class="btn btn-primary">
                  <i class="fa fa-user-md"></i> Register
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include_once 'includes/footer.php'; ?>
<?php
if (isset($_POST['register'])) {
  $secret = "6LciJKwgAAAAAE0YNDeDlHmObo33f6Kie8GShPdS";
  $response = $_POST['g-recaptcha-response'];
  $remoteip = $_SERVER['REMOTE_ADDR'];
  $url = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip");
  $result = json_decode($url, TRUE);
  if ($result['success'] == 1) {
    $c_name = $_POST['c_name'];
    $c_email = $_POST['c_email'];
    $c_pass = $_POST['c_pass'];
    $encrypted_password = password_hash($c_pass, PASSWORD_DEFAULT);
    $c_country = $_POST['c_country'];
    $c_city = $_POST['c_city'];
    $c_contact = $_POST['c_contact'];
    $c_address = $_POST['c_address'];
    $c_image = $_FILES['c_image']['name'];
    $c_image_tmp = $_FILES['c_image']['tmp_name'];
    $c_ip = getRealUserIp();
    move_uploaded_file($c_image_tmp, "customer/customer_images/$c_image");
    $get_email = "SELECT * FROM `customers` WHERE `customer_email`='$c_email'";
    $run_email = mysqli_query($conn, $get_email);
    $check_email = mysqli_num_rows($run_email);
    if ($check_email == 1) {
      echo "<script>alert('This email is already registered, try another one')</script>";
      exit();
    }
    $customer_confirm_code = mt_rand();
    $subject = "Email Confirmation Message";
    $from = "anasba315@gmail.com";
    $message = "
    <h2>
      Email Confirmation By Anas Banat $c_name
    </h2>
    <a href='localhost/ecommerce_store/customer/account.php?$customer_confirm_code'>
      Click Here To Confirm Email
    </a>
    ";
    $headers = "From: $from \r\n";
    $headers .= "Content-type: text/html\r\n";
    mail($c_email, $subject, $message, $headers);
    $insert_customer = "insert into customers (customer_name, customer_email, customer_pass, customer_country, customer_city, customer_contact, customer_address, customer_image, customer_ip, customer_confirm_code) values ('$c_name','$c_email','$encrypted_password','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_ip','$customer_confirm_code')";
    $run_customer = mysqli_query($conn, $insert_customer);
    $sel_cart = "select * from cart where ip_add='$c_ip'";
    $run_cart = mysqli_query($conn, $sel_cart);
    $check_cart = mysqli_num_rows($run_cart);
    if ($check_cart > 0) {
      $_SESSION['customer_email'] = $c_email;
      echo "<script>alert('You have been registered successfully')</script>";
      echo "<script>window.open('checkout.php','_self')</script>";
    } else {
      $_SESSION['customer_email'] = $c_email;
      echo "<script>alert('You have been registered successfully')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    }
  } else {
    echo "<script>alert('Please Select Captcha, Try Again')</script>";
  }
}
?>