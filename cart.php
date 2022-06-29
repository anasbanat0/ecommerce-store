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
                    $only_price = $row_cart['p_price'];
                    $get_products = "select * from products where product_id='$pro_id'";
                    $run_products = mysqli_query($conn, $get_products);
                    while ($row_products = mysqli_fetch_array($run_products)) {
                      $product_title = $row_products['product_title'];
                      $product_img1 = $row_products['product_img1'];
                      $sub_total = $only_price * $pro_qty;
                      $_SESSION['pro_qty'] = $pro_qty;
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
                          <input type="text" name="quantity" value="<?= $_SESSION['pro_qty'] ?>" data-product_id="<?= $pro_id ?>" class="quantity form-control">
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
              <div class="form-inline float-right my-3">
                <div class="form-group">
                  <label>Coupon Code: </label>&nbsp;&nbsp;&nbsp;
                  <input type="text" name="code" class="form-control">
                </div>&nbsp;&nbsp;
                <input type="submit" class="btn btn-primary" name="apply_coupon" value="Apply Coupon Code">
              </div>
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
        if (isset($_POST['apply_coupon'])) {
          $code = $_POST['code'];
          if ($code == "") {
          } else {
            $get_coupons = "SELECT * FROM `coupons` WHERE `coupon_code`='$code'";
            $run_coupons = mysqli_query($conn, $get_coupons);
            $check_coupons = mysqli_num_rows($run_coupons);
            if ($check_coupons == 1) {
              $row_coupons = mysqli_fetch_array($run_coupons);
              $coupon_pro = $row_coupons['product_id'];
              $coupon_price = $row_coupons['coupon_price'];
              $coupon_limit = $row_coupons['coupon_limit'];
              $coupon_used = $row_coupons['coupon_used'];
              if ($coupon_limit == $coupon_used) {
                echo "<script>alert('Your coupon code has been expired')</script>";
              } else {
                $get_cart = "SELECT * FROM `cart` WHERE `p_id`='$coupon_pro' AND `ip_add`='$ip_add'";
                $run_cart = mysqli_query($conn, $get_cart);
                $check_cart = mysqli_num_rows($run_cart);
                if ($check_cart == 1) {
                  $add_used = "UPDATE `coupons` SET `coupon_used`=`coupon_used`+1 WHERE `coupon_code`='$code'";
                  $run_used = mysqli_query($conn, $add_used);
                  $update_cart = "UPDATE `cart` SET `p_price`='$coupon_price' WHERE `p_id`='$coupon_pro' AND `ip_add`='$ip_add'";
                  $run_update = mysqli_query($conn, $update_cart);
                  echo "<script>alert('Your coupon code has been applied')</script>";
                  echo "<script>window.open('cart.php','_self')</script>";
                } else {
                  echo "<script>alert('Product does not exist in cart')</script>";
                }
              }
            } else {
              echo "<script>alert('Your coupon code is not valid')</script>";
            }
          }
        }
        ?>
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
          <div class="col-md-12">
            <div class="card pt-3 pb-2 mb-4">
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
            $pro_label = $row_products['product_label'];
            $manufacturer_id = $row_products['manufacturer_id'];
            $get_manufacturer = "SELECT * FROM `manufacturers` WHERE `manufacturer_id`='$manufacturer_id'";
            $run_manufacturer = mysqli_query($db, $get_manufacturer);
            $row_manufacturer = mysqli_fetch_array($run_manufacturer);
            $manufacturer_name = $row_manufacturer['manufacturer_title'];
            $pro_psp_price = $row_products['product_psp_price'];
            $pro_url = $row_products['product_url'];
            if ($pro_label == "Sale" || $pro_label == "Gift") {
              $product_price = "<del>$$pro_price</del>";
              $product_psp_price = "| $$pro_psp_price";
            } else {
              $product_psp_price = "";
              $product_price = "$$pro_price";
            }
            if ($pro_label == "") {
            } else {
              $product_label = "
        <a class='label sale' href='#' style='color:black;'>
          <div class='thelabel'>$pro_label</div>
          <div class='label-background'></div>
        </a>
      ";
            }
            echo "
      <div class='col-md-4 col-sm-6 center-responsive'>
        <div class='product'>
          <a href='$pro_url'>
            <img src='admin_area/product_images/$pro_img1' class='img-fluid'>
          </a>
          <div class='text'>
            <div class='text-center'>
              <p class='btn btn-primary'>Manufacturer: $manufacturer_name</p>
            </div>
            <hr class='mt-0'>
            <h3><a href='$pro_url'>$pro_title</a></h3>
            <p class='price'>$product_price $product_psp_price</p>
            <p class='buttons'>
              <a href='$pro_url' class='btn btn-secondary'>View Details</a>
              <a href='$pro_url' class='btn btn-primary'>
              <i class='fa fa-shopping-cart'></i> Add to cart
            </a>
            </p>
          </div>
          $product_label
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