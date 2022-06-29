<?php
if (!isset($_SESSION['admin_email'])) {
  echo "<script>window.open('login.php','_self')</script>";
} else {
?>
  <?php
  if (isset($_GET['edit_rel'])) {
    $edit_id = $_GET['edit_rel'];
    $edit_rel = "SELECT * FROM `bundle_product_relation` WHERE `rel_id`='$edit_id'";
    $run_edit = mysqli_query($conn, $edit_rel);
    $row_edit = mysqli_fetch_array($run_edit);
    $r_id = $row_edit['rel_id'];
    $r_title = $row_edit['rel_title'];
    $r_p = $row_edit['product_id'];
    $r_b = $row_edit['bundle_id'];
    $get_p = "SELECT * FROM `products` WHERE `product_id`='$r_p'";
    $run_p = mysqli_query($conn, $get_p);
    $row_p = mysqli_fetch_array($run_p);
    $p_id = $row_p['product_id'];
    $p_title = $row_p['product_title'];
    $get_b = "SELECT * FROM `products` WHERE `product_id`='$r_b'";
    $run_b = mysqli_query($conn, $get_b);
    $row_b = mysqli_fetch_array($run_b);
    $b_id = $row_b['product_id'];
    $b_title = $row_b['product_title'];
  }
  ?>
  <div class="row mt-4">
    <div class="col-lg-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            <i class="fas fa-tachometer-alt"></i> Dashboard / Edit Relation
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
            <i class="fas fa-money-bill"></i> Edit Relation
          </h5>
        </div>
        <div class="card-body">
          <form action="" method="post">
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Relation Title</label>
              <div class="col-md-6">
                <input type="text" name="rel_title" class="form-control" value="<?= $r_title ?>" required>
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Select Product</label>
              <div class="col-md-6">
                <select name="product_id" class="form-control">
                  <option value="<?= $p_id ?>"><?= $p_title ?></option>
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
                  <option value="<?= $b_id ?>"><?= $b_title ?></option>
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
                <input type="submit" name="update" class="form-control btn btn-primary" value="Update Relation">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php
  if (isset($_POST['update'])) {
    $rel_title = $_POST['rel_title'];
    $product_id = $_POST['product_id'];
    $bundle_id = $_POST['bundle_id'];
    $update_rel = "UPDATE `bundle_product_relation` SET `rel_title`='$rel_title',`product_id`='$product_id',`bundle_id`='$bundle_id' WHERE `rel_id`='$r_id'";
    $run_rel = mysqli_query($conn, $update_rel);
    if($run_rel) {
      echo "<script>alert('Relation has been updated')</script>";
      echo "<script>window.open('index.php?view_rel','_self')</script>";
    }
  }
  ?>
<?php } ?>