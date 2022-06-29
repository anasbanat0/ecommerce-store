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
            <i class="fas fa-tachometer-alt"></i> Dashboard / View Relations
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
            <i class="fas fa-money-bill"></i> View Relations
          </h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
              <thead>
                <tr>
                  <th>Relation ID</th>
                  <th>Relation Title</th>
                  <th>Relation Product</th>
                  <th>Relation Bundle</th>
                  <th>Delete Relation</th>
                  <th>Edit Relation</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                $get_rel = "SELECT * FROM `bundle_product_relation`";
                $run_rel = mysqli_query($conn, $get_rel);
                while ($row_rel = mysqli_fetch_array($run_rel)) {
                  $rel_id = $row_rel['rel_id'];
                  $rel_title = $row_rel['rel_title'];
                  $bundle_id = $row_rel['bundle_id'];
                  $product_id = $row_rel['product_id'];
                  $get_p = "SELECT * FROM `products` WHERE `product_id`='$product_id'";
                  $run_p = mysqli_query($conn, $get_p);
                  $row_p = mysqli_fetch_array($run_p);
                  $p_title = $row_p['product_title'];
                  $get_b = "SELECT * FROM `products` WHERE `product_id`='$bundle_id'";
                  $run_b = mysqli_query($conn, $get_b);
                  $row_b = mysqli_fetch_array($run_b);
                  $b_title = $row_b['product_title'];
                  $i++;
                ?>
                  <tr>
                    <th>#<?= $i ?></th>
                    <td><?= $rel_title ?></td>
                    <td><?= $p_title ?></td>
                    <td><?= $b_title ?></td>
                    <td class="text-center">
                      <a class="btn btn-danger" href="index.php?delete_rel=<?= $rel_id ?>">
                        <i class="fas fa-trash-alt fa-sm"></i> Delete
                      </a>
                    </td>
                    <td class="text-center">
                      <a class="btn btn-primary" href="index.php?edit_rel=<?= $rel_id ?>">
                        <i class="fas fa-edit fa-sm"></i> Edit
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