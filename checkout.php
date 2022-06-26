<?php
$title = "Checkout";
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
            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
          </ul>
        </nav>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <?php
        if (!isset($_SESSION['customer_email'])) {
          include 'customer/customer_login.php';
        } else {
          include 'payment_options.php';
        }
        ?>

      </div>
    </div>
  </div>
</div>
<?php include_once 'includes/footer.php'; ?>