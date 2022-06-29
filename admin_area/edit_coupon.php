<?php
if (!isset($_SESSION['admin_email'])) {
  echo "<script>window.open('login.php','_self')</script>";
} else {
?>
  <?php
  if (isset($_GET['edit_coupon'])) {
    $edit_id = $_GET['edit_coupon'];
    $edit_coupon = "SELECT * FROM `coupons` WHERE `coupon_id`='$edit_id'";
    $run_edit = mysqli_query($conn, $edit_coupon);
    $row_edit = mysqli_fetch_array($run_edit);
    $c_id = $row_edit['coupon_id'];
    $c_title = $row_edit['coupon_title'];
    $c_price = $row_edit['coupon_price'];
    $c_code = $row_edit['coupon_code'];
    $c_limit = $row_edit['coupon_limit'];
    $c_used = $row_edit['coupon_used'];
    $p_id = $row_edit['product_id'];
    $get_products = "SELECT * FROM `products` WHERE `product_id`='$p_id'";
    $run_products = mysqli_query($conn, $get_products);
    $row_products = mysqli_fetch_array($run_products);
    $product_id = $row_products['product_id'];
    $product_title = $row_products['product_title'];
  }
  ?>
  <div class="row mt-4">
    <div class="col-lg-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            <i class="fas fa-tachometer-alt"></i> Dashboard / Edit Coupon
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
            <i class="fas fa-money-bill"></i> Edit Coupon
          </h5>
        </div>
        <div class="card-body">
          <form action="" method="post">
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Coupon Title </label>
              <div class="col-md-6">
                <input type="text" name="coupon_title" class="form-control" value="<?= $c_title ?>">
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Coupon Price </label>
              <div class="col-md-6">
                <input type="text" name="coupon_price" class="form-control" value="<?= $c_price ?>">
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Coupon Code </label>
              <div class="col-md-6">
                <input type="text" name="coupon_code" class="form-control" value="<?= $c_code ?>">
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Coupon Limit </label>
              <div class="col-md-6">
                <input type="number" name="coupon_limit" min="1" class="form-control" value="<?= $c_limit ?>">
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Select Product or Bundle</label>
              <div class="col-md-6">
                <select name="product_id" class="form-control">
                  <option value="<?= $product_id ?>"><?= $product_title ?></option>
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
                <input type="submit" name="update" class="form-control btn btn-primary" value="Update Coupon">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php
  if (isset($_POST['update'])) {
    $coupon_title = $_POST['coupon_title'];
    $coupon_price = $_POST['coupon_price'];
    $coupon_code = $_POST['coupon_code'];
    $coupon_limit = $_POST['coupon_limit'];
    $product_id = $_POST['product_id'];
    $update_coupon = "UPDATE `coupons` SET `product_id`='$product_id', `coupon_title`='$coupon_title', `coupon_price`='$coupon_price', `coupon_code`='$coupon_code', `coupon_limit`='$coupon_limit', `coupon_used`='$c_used' WHERE `coupon_id`='$c_id'";
    $run_coupon = mysqli_query($conn, $update_coupon);
    if ($run_coupon) {
      echo "<script>alert('This coupon code has been updated')</script>";
      echo "<script>window.open('index.php?view_coupons','_self')</script>";
    }
  }
  ?>

<?php } ?>