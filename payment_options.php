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
    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
      <input type="hidden" name="business" value="aseelbanat@gmail.com">
      <input type="hidden" name="cmd" value="_cart">
      <input type="hidden" name="upload" value="1">
      <input type="hidden" name="currency_code" value="USD">
      <input type="hidden" name="return" value="http://localhost/ecommerce_store/paypal_order.php?c_id=<?= $customer_id ?>">
      <input type="hidden" name="cancel_return" value="http://localhost/ecommerce_store/index.php">
      <?php
      $i = 0;
      $ip_add = getRealUserIp();
      $get_cart = "SELECT * FROM `cart` WHERE `ip_add`='$ip_add'";
      $run_cart = mysqli_query($conn, $get_cart);
      while ($row_cart = mysqli_fetch_array($run_cart)) {
        $pro_id = $row_cart['p_id'];
        $pro_qty = $row_cart['qty'];
        $pro_price = $row_cart['p_price'];
        $get_products = "SELECT * FROM `products` WHERE `product_id`='$pro_id'";
        $run_products = mysqli_query($conn, $get_products);
        $row_products = mysqli_fetch_array($run_products);
        $product_title = $row_products['product_title'];
        $i++;
      ?>
        <input type="hidden" name="item_name_<?= $i ?>" value="<?= $product_title ?>">
        <input type="hidden" name="item_number_<?= $i ?>" value="<?= $i ?>">
        <input type="hidden" name="amount_<?= $i ?>" value="<?= $pro_price ?>">
        <input type="hidden" name="quantity_<?= $i ?>" value="<?= $pro_qty ?>">
      <?php } ?>
      <input type="image" name="submit" width="500" src="images/paypal-credit-cards.jpg" alt="">
    </form>
  </div>
</div>