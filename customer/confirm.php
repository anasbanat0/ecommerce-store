<?php
$title = "Account | Confirm Payment";
session_start();
if (!isset($_SESSION['customer_email'])) {
  echo "<script>window.open('../checkout.php','_self')</script>";
} else {
  require 'includes/db.php';
  include 'functions/functions.php';
  include_once 'includes/header.php';
  if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
  }
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
        <div class="col-md-3 mb-5">
          <?php include_once 'includes/sidebar.php'; ?>
        </div>
        <div class="col-md-9">
          <div class="card">
            <div class="card-header text-center pt-4 pb-3">
              <h2>Please Confirm Your Payment</h2>
            </div>
            <div class="card-body">
              <form action="confirm.php?update_id=<?= $order_id ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="invoice">Invoice No:</label>
                  <input type="text" class="form-control" name="invoice_no" id="invoice" required>
                </div>
                <div class="form-group">
                  <label for="amount">Amount Sent:</label>
                  <input type="text" class="form-control" name="amount_sent" id="amount" required>
                </div>
                <div class="form-group">
                  <label for="payment_mode">Select Payment Mode:</label>
                  <select name="payment_mode" id="payment_mode" class="form-control">
                    <option>Select Payment Mode</option>
                    <option>Bank Code</option>
                    <option>PayPal</option>
                    <option>Visa</option>
                    <option>Perfect Money</option>
                    <option>Credit Card</option>
                    <option>Western union</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="ref_no">Transaction/Reference Id:</label>
                  <input type="text" class="form-control" name="ref_no" id="ref_no" required>
                </div>
                <div class="form-group">
                  <label for="code">Easy Visa/Palestine Code:</label>
                  <input type="text" class="form-control" name="code" id="code" required>
                </div>
                <div class="form-group">
                  <label for="date">Payment Date:</label>
                  <input type="date" class="form-control" name="date" id="date" required>
                </div>
                <div class="text-center">
                  <button type="submit" name="confirm_payment" class="btn btn-primary btn-lg">
                    <i class="fa fa-user fa-lg"></i> Confirm Payment
                  </button>
                </div>
              </form>
              <?php
              if (isset($_POST['confirm_payment'])) {
                $update_id = $_GET['update_id'];
                $invoice_no = $_POST['invoice_no'];
                $amount = $_POST['amount_sent'];
                $payment_mode = $_POST['payment_mode'];
                $ref_no = $_POST['ref_no'];
                $code = $_POST['code'];
                $payment_date = $_POST['date'];
                $complete = "Paid";
                $insert_payment = "INSERT INTO `payments` (`invoice_no`, `amonut`, `payment_mode`, `ref_no`, `code`, `payment_date`) VALUES ('$invoice_no','$amount','$payment_mode','$ref_no','$code','$payment_date')";
                $run_payment = mysqli_query($conn, $insert_payment);
                $update_customer_order = "update customer_orders set order_status='$complete' where order_id='$update_id'";
                $run_customer_order = mysqli_query($conn, $update_customer_order);
                $update_pending_order = "update pending_orders set order_status='$complete' where order_id='$update_id'";
                $run_pending_order = mysqli_query($conn, $update_pending_order);
                if ($run_pending_order) {
                  echo "<script>alert('Your payment has been received, order will be completed within 24 hours.')</script>";
                  echo "<script>window.open('account.php?my_orders','_self')</script>";
                }
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include_once 'includes/footer.php'; ?>
<?php } ?>