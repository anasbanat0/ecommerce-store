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
            <i class="fas fa-tachometer-alt"></i> Dashboard / Insert Relation
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
            <i class="fas fa-money-bill"></i> Insert Relation
          </h5>
        </div>
        <div class="card-body">
          <form action="" method="post">
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Relation Title</label>
              <div class="col-md-6">
                <input type="text" name="rel_title" class="form-control" required>
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Select Product</label>
              <div class="col-md-6">
                <select name="product_id" class="form-control">
                  <option>Select Product</option>
                  <?php
                  $get_p = "SELECT * FROM `products` WHERE `status`='product'";
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
              <label for="" class="col-form-label col-md-3 text-right">Select Bundle</label>
              <div class="col-md-6">
                <select name="bundle_id" class="form-control">
                  <option>Select Bundle</option>
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
              <label class="col-md-3"></label>
              <div class="col-md-6">
                <input type="submit" name="submit" class="form-control btn btn-primary" value="Insert Relation">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php
  if (isset($_POST['submit'])) {
    $rel_title = $_POST['rel_title'];
    $product_id = $_POST['product_id'];
    $bundle_id = $_POST['bundle_id'];
    $insert_rel = "INSERT INTO `bundle_product_relation` (`rel_title`,`product_id`,`bundle_id`) VALUES ('$rel_title','$product_id','$bundle_id')";
    $run_rel = mysqli_query($conn, $insert_rel);
    if ($run_rel) {
      echo "<script>alert('New relation has been inserted')</script>";
      echo "<script>window.open('index.php?view_rel','_self')</script>";
    }
  }
  ?>
<?php } ?>