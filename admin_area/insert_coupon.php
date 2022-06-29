<?php
if (!isset($_SESSION['admin_email'])) {
  echo "<script>window.open('login.php','_self')</script>";
} else {
?>

  <div class="row mt-4">
    <div class="col-lg-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            <i class="fas fa-tachometer-alt"></i> Dashboard / Insert Coupon
          </li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header pb-0 pt-2">
          <h5 class="card-title">
            <i class="fas fa-money-bill"></i> Insert Coupon
          </h5>
        </div>
        <div class="card-body">
          <form action="" method="post">
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Coupon Title </label>
              <div class="col-md-6">
                <input type="text" name="coupon_title" class="form-control">
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Coupon Price </label>
              <div class="col-md-6">
                <input type="text" name="coupon_price" class="form-control">
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Coupon Code </label>
              <div class="col-md-6">
                <input type="text" name="coupon_code" class="form-control">
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Coupon Limit </label>
              <div class="col-md-6">
                <input type="number" name="coupon_limit" value="1" min="1" class="form-control">
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Select Product or Bundle</label>
              <div class="col-md-6">
                <select name="product_id" class="form-control">
                  <option disabled>Select Coupon Product</option>
                  <?php
                  $get_p = "SELECT * FROM `products` WHERE `status`='product'";
                  $run_p = mysqli_query($conn, $get_p);
                  while ($row_p = mysqli_fetch_array($run_p)) {
                    $p_id = $row_p['product_id'];
                    $p_title = $row_p['product_title'];
                    echo "<option value='$p_id'>$p_title</option>";
                  }
                  ?>
                  <option disabled>Select Coupon Bundle</option>
                  <?php
                  $get_p = "SELECT * FROM `products` WHERE `status`='bundle'";
                  $run_p = mysqli_query($conn, $get_p);
                  while ($row_p = mysqli_fetch_array($run_p)) {
                    $p_id = $row_p['product_id'];
                    $p_title = $row_p['product_title'];
                    echo "<option value='$p_id'>$p_title</option>";
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group form-row">
              <label class="col-form-label col-md-3 text-right"></label>
              <div class="col-md-6">
                <input type="submit" name="submit" class="form-control btn btn-primary" value="Insert Coupon">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php
  if (isset($_POST['submit'])) {
    $coupon_title = $_POST['coupon_title'];
    $coupon_price = $_POST['coupon_price'];
    $coupon_code = $_POST['coupon_code'];
    $coupon_limit = $_POST['coupon_limit'];
    $product_id = $_POST['product_id'];
    $coupon_used = 0;
    $get_coupons = "SELECT * FROM `coupons` WHERE `product_id`='$product_id' or `coupon_code`='$coupon_code'";
    $run_coupons = mysqli_query($conn, $get_coupons);
    $check_coupons = mysqli_num_rows($run_coupons);
    if ($check_coupons == 1) {
      echo "<script>alert('Coupon code or product already add choose another coupon code or product')</script>";
    } else {
      $insert_coupon = "INSERT INTO `coupons`(`product_id`, `coupon_title`, `coupon_price`, `coupon_code`, `coupon_limit`, `coupon_used`) VALUES ('$product_id','$coupon_title','$coupon_price','$coupon_code','$coupon_limit','$coupon_used')";
      $run_coupon = mysqli_query($conn, $insert_coupon);
      if ($run_coupon) {
        echo "<script>alert('New coupon has been inserted')</script>";
        echo "<script>window.open('index.php?view_coupons','_self')</script>";
      }
    }
  }
  ?>

<?php } ?>