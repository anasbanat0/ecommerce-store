<?php
$title = "Cart";
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
            <li class="breadcrumb-item active" aria-current="page">Cart</li>
          </ul>
        </nav>
      </div>
    </div>
    
    <div class="row">
      <div class="col-md-9" id="cart">
        <div class="card mb-3 py-3 px-3">
          <form action="cart.php" method="post" enctype="multipart/form-data">
            <h2>Shopping Cart</h2>
            <?php
            $ip_add = getRealUserIp();
            $select_cart = "select * from cart where ip_add='$ip_add'";
            $run_cart = mysqli_query($conn, $select_cart);
            $count = mysqli_num_rows($run_cart);
            ?>
            <p class="text-muted">You currently have <?= $count ?> item(s) in your cart.</p>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th colspan="2">Product</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Size</th>
                    <th colspan="1">Delete</th>
                    <th colspan="2">Sub Total</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $total = 0;
                  while ($row_cart = mysqli_fetch_array($run_cart)) {
                    $pro_id = $row_cart['p_id'];
                    $pro_size = $row_cart['size'];
                    $pro_qty = $row_cart['qty'];
                    $get_products = "select * from products where product_id='$pro_id'";
                    $run_products = mysqli_query($conn, $get_products);
                    while ($row_products = mysqli_fetch_array($run_products)) {
                      $product_title = $row_products['product_title'];
                      $product_img1 = $row_products['product_img1'];
                      $only_price = $row_products['product_price'];
                      $sub_total = $row_products['product_price'] * $pro_qty;
                      $total += $sub_total;
                  ?>
                      <tr>
                        <td>
                          <img src="admin_area/product_images/<?= $product_img1 ?>" alt="<?= $product_title ?>">
                        </td>
                        <td>
                          <a href="#"><?= $product_title ?></a>
                        </td>
                        <td>
                          <?= $pro_qty ?>
                        </td>
                        <td>
                          $<?= $only_price ?>.00
                        </td>
                        <td>
                          <?= $pro_size ?>
                        </td>
                        <td>
                          <input type="checkbox" name="remove[]" value="<?= $pro_id ?>">
                        </td>
                        <td>
                          $<?= $sub_total ?>.00
                        </td>
                      </tr>
                  <?php }
                  } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th colspan="5">Total</th>
                    <th colspan="2">$<?= $total ?>.00</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <div class="cart-footer">
              <div class="float-left">
                <a href="shop.php" class="btn btn-secondary">
                  <i class="fa fa-chevron-left"></i> Continue Shopping
                </a>
              </div>
              <div class="float-right">
                <button class="btn btn-secondary" type="submit" name="update" value="Update Cart">
                  <i class="fas fa-sync"></i> Update Cart
                </button>
                <a href="checkout.php" class="btn btn-primary">
                  Proceed to checkout <i class="fa fa-chevron-right"></i>
                </a>
              </div>
            </div>
          </form>
        </div>
        <?php
        function update_cart()
        {
          global $conn;
          if (isset($_POST['update'])) {
            foreach ($_POST['remove'] as $remove_id) {
              $delete_product = "delete from cart where p_id='$remove_id'";
              $run_delete = mysqli_query($conn, $delete_product);
              if ($run_delete) {
                echo "<script>window.open('cart.php','_self')</script>";
              }
            }
          }
        }
        echo @$up_cart = update_cart();
        ?>
        <div class="row mt-4">
          <div class="col-md-3 col-sm-6 mb-3">
            <div class="card same-height headline py-4 px-4">
              <h4 class="text-center">You also like these products</h4>
            </div>
          </div>
          <?php
          $get_products = "select * from products order by rand() LIMIT 0,3";
          $run_products = mysqli_query($conn, $get_products);
          while ($row_products = mysqli_fetch_array($run_products)) {
            $pro_id = $row_products['product_id'];
            $pro_title = $row_products['product_title'];
            $pro_price = $row_products['product_price'];
            $pro_img1 = $row_products['product_img1'];
            echo "
            <div class='col-md-3 col-sm-6'>
            <div class='product same-height'>
              <a href='details.php?product_id=$pro_id'>
                <img src='admin_area/product_images/$pro_img1' class='img-fluid w-100' alt='$pro_title'>
              </a>
              <div class='text'>
                <h3><a href='details.php?product_id=$pro_id'>$pro_title</a></h3>
                <p class='price'>$$pro_price</p>
              </div>
            </div>
          </div>
            ";
          }
          ?>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card py-3 px-3" id="order-summary">
          <div class="card-header">
            <h4>Order Summary</h4>
          </div>
          <p class="text-muted mt-3">Shipping and additional costs are calculated based on the values you have entered.</p>
          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <td>Order Subtotal</td>
                  <th>$<?= $total ?>.00</th>
                </tr>
                <tr>
                  <td>Shipping and handling</td>
                  <th>$0.00</th>
                </tr>
                <tr>
                  <td>Tax</td>
                  <th>$0.00</th>
                </tr>
                <tr class="total">
                  <td>Total</td>
                  <th>$<?= $total ?>.00</th>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include_once 'includes/footer.php'; ?>
