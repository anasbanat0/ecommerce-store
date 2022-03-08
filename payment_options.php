<div class="card mb-4">
  <?php
  $session_email = $_SESSION['customer_email'];
  $select_customer = "select * from customers where customer_email='$session_email'";
  $run_customer = mysqli_query($conn, $select_customer);
  $row_customer = mysqli_fetch_array($run_customer);
  $customer_id = $row_customer['customer_id'];
  ?>
  <div class="text-center">
    <h1>Payment Options For You</h1>
    <p class="lead">
      <a href="order.php?c_id=<?= $customer_id ?>">Pay Offline</a>
    </p>
    <p class="lead">
      <a href="#">
        Pay Online With PayPal
        <img src="images/paypal-credit-cards.jpg" class="img-fluid mt-3 w-50 d-block mx-auto" alt="PayPal Image">
      </a>
    </p>
  </div>
</div>