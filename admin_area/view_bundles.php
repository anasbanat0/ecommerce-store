<?php
if (!isset($_SESSION['admin_email'])) {
  echo "<script>window.open('login.php','_self')</script>";
} else {
?>

  <div class="row mt-4">
    <div class="col-lg-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active">
            <i class="fas fa-tachometer-alt"></i> Dashboard / View Bundles
          </li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header pb-0">
          <h4 class="card-title">
            <i class="fas fa-money-bill"></i> View Bundles
          </h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
              <thead>
                <tr>
                  <th>Bundle ID</th>
                  <th>Bundle Title</th>
                  <th>Bundle Image</th>
                  <th>Bundle Price</th>
                  <th>Bundle sold</th>
                  <th>Bundle Keywords</th>
                  <th>Bundle Date</th>
                  <th>Bundle Delete</th>
                  <th>Bundle Edit</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                $get_pro = "SELECT * FROM `products` WHERE `status`='bundle'";
                $run_pro = mysqli_query($conn, $get_pro);
                while ($row_pro = mysqli_fetch_array($run_pro)) {
                  $pro_id = $row_pro['product_id'];
                  $pro_title = $row_pro['product_title'];
                  $pro_image = $row_pro['product_img1'];
                  $pro_price = $row_pro['product_price'];
                  $pro_keywords = $row_pro['product_keywords'];
                  $pro_date = $row_pro['date'];
                  $i++;
                ?>
                  <tr>
                    <th>#<?= $i ?></th>
                    <td><?= $pro_title ?></td>
                    <td><img src="product_images/<?= $pro_image ?>" class="d-block mx-auto" width="60" alt="<?= $pro_title ?>"></td>
                    <td><?= $pro_price ?></td>
                    <td>
                      <?php
                      $get_sold = "SELECT * FROM pending_orders where product_id='$pro_id'";
                      $run_sold = mysqli_query($conn, $get_sold);
                      $count = mysqli_num_rows($run_sold);
                      echo $count;
                      ?>
                    </td>
                    <td><?= $pro_keywords ?></td>
                    <td><?= $pro_date ?></td>
                    <td>
                      <a href="index.php?delete_bundle=<?= $pro_id ?>">
                        <i class="fas fa-trash-alt"></i> Delete
                      </a>
                    </td>
                    <td>
                      <a href="index.php?edit_bundle=<?= $pro_id ?>">
                        <i class="fas fa-edit"></i> Edit
                      </a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php } ?>