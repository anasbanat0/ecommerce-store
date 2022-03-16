<?php
if (!isset($_SESSION['admin_email'])) {
  echo "<script>window.open('login.php','_self')</script>";
} else {
?>
  <?php
  if (isset($_GET['edit_p_cat'])) {
    $edit_p_cat_id = $_GET['edit_p_cat'];
    $edit_p_cat_query = "SELECT * FROM product_categories WHERE p_cat_id='$edit_p_cat_id'";
    $run_edit = mysqli_query($conn, $edit_p_cat_query);
    $row_edit = mysqli_fetch_array($run_edit);
    $p_cat_id = $row_edit['p_cat_id'];
    $p_cat_title = $row_edit['p_cat_title'];
    $p_cat_desc = $row_edit['p_cat_desc'];
  }
  ?>
  <div class="row mt-4">
    <div class="col-lg-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            <i class="fas fa-tachometer-alt"></i> Dashboard / Edit Product Category
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
            <i class="fas fa-money-bill"></i> Edit Product Category
          </h5>
        </div>
        <div class="card-body">
          <form action="" method="post">
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Product Category Title</label>
              <div class="col-md-6">
                <input type="text" name="p_cat_title" class="form-control" value="<?= $p_cat_title ?>" required>
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Product Category Description</label>
              <div class="col-md-6">
                <textarea name="p_cat_desc" id="mytextarea" cols="30" rows="10" required class="form-control"><?= $p_cat_desc ?></textarea>
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-md-3"></label>
              <div class="col-md-6">
                <input type="submit" name="update" class="btn btn-primary form-control" value="Update">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php
  if (isset($_POST['update'])) {
    $p_cat_title = $_POST['p_cat_title'];
    $p_cat_desc = $_POST['p_cat_desc'];
    $update_p_cat = "UPDATE product_categories SET p_cat_title='$p_cat_title', p_cat_desc='$p_cat_desc' WHERE p_cat_id='$p_cat_id'";
    $run_p_cat = mysqli_query($conn, $update_p_cat);
    if ($run_p_cat) {
      echo "<script>alert('Product category has been updated')</script>";
      echo "<script>window.open('index.php?view_p_cats','_self')</script>";
    }
  }
  ?>

<?php } ?>