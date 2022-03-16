<?php
if (!isset($_SESSION['admin_email'])) {
  echo "<script>window.open('login.php','_self')</script>";
} else {
?>

  <?php
  if (isset($_GET['edit_cat'])) {
    $edit_id = $_GET['edit_cat'];
    $edit_cat = "SELECT * FROM `categories` WHERE `cat_id`='$edit_id'";
    $run_edit = mysqli_query($conn, $edit_cat);
    $row_edit = mysqli_fetch_array($run_edit);
    $c_id = $row_edit['cat_id'];
    $c_title = $row_edit['cat_title'];
    $c_desc = $row_edit['cat_desc'];
  }
  ?>

  <div class="row mt-4">
    <div class="col-lg-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            <i class="fas fa-tachometer-alt"></i> Dashboard / Edit Category
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
            <i class="fas fa-money-bill"></i> Edit Category
          </h5>
        </div>
        <div class="card-body">
          <form action="" method="post">
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Category Title</label>
              <div class="col-md-6">
                <input type="text" name="cat_title" class="form-control" value="<?= $c_title ?>" required>
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Category Description</label>
              <div class="col-md-6">
                <textarea name="cat_desc" id="mytextarea" cols="30" rows="10" required class="form-control"><?= $c_desc ?></textarea>
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-md-3"></label>
              <div class="col-md-6">
                <input type="submit" name="update" class="btn btn-primary form-control" value="Update Category">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php
  if (isset($_POST['update'])) {
    $cat_title = $_POST['cat_title'];
    $cat_desc = $_POST['cat_desc'];
    $update_cat = "UPDATE `categories` SET `cat_title`='$cat_title',`cat_desc`='$cat_desc' WHERE `cat_id`='$c_id'";
    $run_cat = mysqli_query($conn, $update_cat);
    if ($run_cat) {
      echo "<script>alert('This Category has been updated')</script>";
      echo "<script>window.open('index.php?view_cats','_self')</script>";
    }
  }
  ?>

<?php } ?>