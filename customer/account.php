<?php
$title = "E Commerce Store | Account";
session_start();
if (!isset($_SESSION['customer_email'])) {
  echo "<script>window.open('../checkout.php','_self')</script>";
} else {
  require 'includes/db.php';
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
              <li class="breadcrumb-item active" aria-current="page">My Account</li>
            </ul>
          </nav>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <?php
          $c_email = $_SESSION['customer_email'];
          $get_customer = "SELECT * FROM `customers` WHERE `customer_email`='$c_email'";
          $run_customer = mysqli_query($conn, $get_customer);
          $row_customer = mysqli_fetch_array($run_customer);
          $customer_confirm_code = $row_customer['customer_confirm_code'];
          $c_name = $row_customer['customer_name'];
          if (!empty($customer_confirm_code)) {
          ?>
            <div class="alert alert-danger">
              <strong>Warning!</strong> Please confirm your email and if you have not received your confirmation email
              <a href="account.php?send_email" class="alert-link">
                Send Email Again
              </a>
            </div>
          <?php } ?>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3 mb-3">
          <?php include 'includes/sidebar.php'; ?>
        </div>
        <div class="col-md-9">
          <div class="card mb-3">
            <?php
            if(isset($_GET[$customer_confirm_code])) {
              $update_customer = "UPDATE `customers` SET `customer_confirm_code`='' WHERE `customer_confirm_code`='$customer_confirm_code'";
              $run_confirm = mysqli_query($conn, $update_customer);
              echo "<script>alert('Your email has been confirmed')</script>";
              echo "<script>window.open('account.php?my_orders','_self')</script>";
            }
            if(isset($_GET['send_email'])) {
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
              echo "<script>alert('Your confirmation email has been sent to you, please check your inbox')</script>";
              echo "<script>window.open('account.php?my_orders','_self')</script>";
            }
            if (isset($_GET['my_orders'])) {
              include 'my_orders.php';
            } elseif (isset($_GET['pay_offline'])) {
              include 'pay_offline.php';
            } elseif (isset($_GET['edit_account'])) {
              include 'edit_account.php';
            } elseif (isset($_GET['change_pass'])) {
              include 'change_pass.php';
            } elseif (isset($_GET['delete_account'])) {
              include 'delete_account.php';
            } elseif (isset($_GET['my_wishlist'])) {
              include 'my_wishlist.php';
            } elseif (isset($_GET['delete_wishlist'])) {
              include 'delete_wishlist.php';
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include_once 'includes/footer.php'; ?>
<?php } ?>