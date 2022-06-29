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
            <i class="fas fa-tachometer-alt"></i> Dashboard / View Coupons
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
            <i class="fas fa-money-bill"></i> View Coupons
          </h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
              <thead>
                <tr class="text-center">
                  <th>Coupon ID</th>
                  <th>Coupon Title</th>
                  <th>Product Title</th>
                  <th>Coupon Price</th>
                  <th>Coupon Code</th>
                  <th>Coupon Limit</th>
                  <th>Coupon Used</th>
                  <th>Delete Coupon</th>
                  <th>Edit Coupon</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                $get_coupons = "SELECT * FROM `coupons`";
                $run_coupons = mysqli_query($conn, $get_coupons);
                while ($row_coupons = mysqli_fetch_array($run_coupons)) :
                  $coupon_id = $row_coupons['coupon_id'];
                  $product_id = $row_coupons['product_id'];
                  $coupon_title = $row_coupons['coupon_title'];
                  $coupon_price = $row_coupons['coupon_price'];
                  $coupon_code = $row_coupons['coupon_code'];
                  $coupon_limit = $row_coupons['coupon_limit'];
                  $coupon_used = $row_coupons['coupon_used'];
                  $get_products = "SELECT * FROM `products` WHERE `product_id`='$product_id'";
                  $run_products = mysqli_query($conn, $get_products);
                  $row_products = mysqli_fetch_array($run_products);
                  $product_title = $row_products['product_title'];
                  $i++;
                ?>
                  <tr>
                    <th>#<?= $i ?></th>
                    <td><?= $coupon_title ?></td>
                    <td><?= $product_title ?></td>
                    <td>$<?= $coupon_price ?></td>
                    <td><?= $coupon_code ?></td>
                    <td><?= $coupon_limit ?></td>
                    <td><?= $coupon_used ?></td>
                    <td class="text-center">
                      <a class="btn btn-danger" href="index.php?delete_coupon=<?= $coupon_id ?>">
                        <i class="fas fa-trash-alt fa-sm"></i> Delete
                      </a>
                    </td>
                    <td class="text-center">
                      <a class="btn btn-primary" href="index.php?edit_coupon=<?= $coupon_id ?>">
                        <i class="fas fa-edit fa-sm"></i> Edit
                      </a>
                    </td>
                  </tr>
                <?php endwhile; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>



<?php } ?>