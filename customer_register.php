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
      <div class="col-md-3 mb-5">
        <?php include_once 'includes/sidebar.php'; ?>
      </div>
      <div class="col-md-9">
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
              <label for="password">Customer Password</label>
              <input type="password" class="form-control" name="c_pass" id="password" required>
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
            <div class="text-center">
              <button type="submit" name="register" class="btn btn-primary">
                <i class="fa fa-user-md"></i> Register
              </button>
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
  $c_name = $_POST['c_name'];
  $c_email = $_POST['c_email'];
  $c_pass = $_POST['c_pass'];
  $c_country = $_POST['c_country'];
  $c_city = $_POST['c_city'];
  $c_contact = $_POST['c_contact'];
  $c_address = $_POST['c_address'];
  $c_image = $_FILES['c_image']['name'];
  $c_image_tmp = $_FILES['c_image']['tmp_name'];
  $c_ip = getRealUserIp();
  move_uploaded_file($c_image_tmp, "customer/customer_images/$c_image");
  $insert_customer = "insert into customers (customer_name, customer_email, customer_pass, customer_country, customer_city, customer_contact, customer_address, customer_image, customer_ip) values ('$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_ip')";
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
}
?>