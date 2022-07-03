<div class="card mb-4">
  <div class="card-header pt-4">
    <div class="text-center">
      <h2>Login</h2>
      
      <p class="lead">Already our customer</p>
    </div>
    <p class="text-muted">
      Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nobis praesentium error corporis recusandae esse placeat iste fuga maxime, temporibus dolore animi quasi quidem cumque! Harum ut reprehenderit quas, porro quo repellat saepe accusamus cupiditate quasi facilis labore deleniti maiores neque accusantium soluta quae et laudantium!
    </p>
  </div>
  <div class="card-body">
    <form action="checkout.php" method="post">
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="c_email" id="email" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="c_pass" id="password" class="form-control" required>
      </div>
      <div class="text-center">
        <button name="login" value="Login" class="btn btn-primary">
          <i class="fas fa-sign-in-alt"></i> Login
        </button>
      </div>
      <div class="text-center mt-3">
        <a href="forgot_pass.php">Forgot Password?</a>
      </div>
    </form>
    <hr>
    <div class="text-center mt-4">
      <a href="customer_register.php" class="btn btn-success" style="background: #42b72a; font-size: 18px">
        <i class="fa fa-user"></i> Create new account
      </a>
    </div>
  </div>
</div>
<?php
if (isset($_POST['login'])) {
  $customer_email = $_POST['c_email'];
  $customer_pass = $_POST['c_pass'];
  $select_customer = "select * from customers where customer_email='$customer_email'";
  $run_customer = mysqli_query($conn, $select_customer);
  $check_customer = mysqli_num_rows($run_customer);
  $row_customer = mysqli_fetch_array($run_customer);
  $hash_password = $row_customer['customer_pass'];
  $decrypt_password = password_verify($customer_pass, $hash_password);
  if ($decrypt_password == 0) {
    echo "<script>alert('Your password or email is wrong')</script>";
    exit();
  }
  $get_ip = getRealUserIp();
  $select_cart = "select * from cart where ip_add='$get_ip'";
  $run_cart = mysqli_query($conn, $select_cart);
  $check_cart = mysqli_num_rows($run_cart);
  if ($check_customer == 0) {
    echo "<script>alert('password or email is wrong')</script>";
    exit();
  }
  if ($check_customer == 1 && $check_cart == 0) {
    $_SESSION['customer_email'] = $customer_email;
    echo "<script>alert('You have been logged in')</script>";
    echo "<script>window.open('customer/account.php?my_orders', '_self')</script>";
  } else {
    $_SESSION['customer_email'] = $customer_email;
    echo "<script>alert('You have been logged in')</script>";
    echo "<script>window.open('checkout.php', '_self')</script>";
  }
}
?>