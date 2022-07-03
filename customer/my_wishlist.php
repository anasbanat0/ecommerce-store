<div class="card-header text-center pt-4 pb-3">
  <h2>My Wishlist</h2>
  <p class="lead">Your all wishlist products on one place</p>
</div>
<div class="card-body">
  <div class="table-responsive">
    <table class="table table-bordered table-hover">
      <thead>
        <tr class="text-center">
          <th>Wishlist No</th>
          <th>Wishlist Product</th>
          <th>Delete Wishlist</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $customer_session = $_SESSION['customer_email'];
        $get_customer = "SELECT * FROM `customers` WHERE `customer_email`='$customer_session'";
        $run_customer = mysqli_query($conn, $get_customer);
        $row_customer = mysqli_fetch_array($run_customer);
        $customer_id = $row_customer['customer_id'];
        $i = 0;
        $get_wishlist = "SELECT * FROM `wishlist` WHERE `customer_id`='$customer_id'";
        $run_wishlist = mysqli_query($conn, $get_wishlist);
        while ($row_wishlist = mysqli_fetch_array($run_wishlist)) {
          $wishlist_id = $row_wishlist['wishlist_id'];
          $product_id = $row_wishlist['product_id'];
          $get_products = "SELECT * FROM `products` WHERE `product_id`='$product_id'";
          $run_products = mysqli_query($conn, $get_products);
          $row_products = mysqli_fetch_array($run_products);
          $product_title = $row_products['product_title'];
          $product_url = $row_products['product_url'];
          $product_img1 = $row_products['product_img1'];
          $i++;
        ?>
          <tr>
            <th class="text-center" width="100">#<?= $i ?></th>
            <td>
              <img src="../admin_area/product_images/<?= $product_img1 ?>" alt="<?= $product_title ?>" width="60">&nbsp;&nbsp;&nbsp;
              <a href="../<?= $product_url ?>">
                <?= $product_title ?>
              </a>
            </td>
            <td>
              <div class="text-center">
                <a class="btn btn-danger" href="account.php?delete_wishlist=<?= $wishlist_id ?>">
                  <i class="fas fa-trash-alt"></i> Delete
                </a>
              </div>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>