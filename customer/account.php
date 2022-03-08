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
        <div class="col-md-3 mb-3">
          <?php include 'includes/sidebar.php'; ?>
        </div>
        <div class="col-md-9">
          <div class="card mb-3">
            <?php
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
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include_once 'includes/footer.php'; ?>
<?php } ?>