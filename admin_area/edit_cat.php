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
    $c_top = $row_edit['cat_top'];
    $c_image = $row_edit['cat_image'];
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
          <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Category Title</label>
              <div class="col-md-6">
                <input type="text" name="cat_title" class="form-control" value="<?= $c_title ?>" required>
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Show as Category Top</label>
              <div class="col-md-6 mt-2">
                <input type="radio" name="cat_top" value="yes" <?php if ($c_top == "no") {
                                                                } else {
                                                                  echo "checked='checked'";
                                                                } ?>>
                <label>Yes</label>
                <input type="radio" name="cat_top" value="no" <?php if ($c_top == "no") {
                                                                echo "checked='checked'";
                                                              } else {
                                                              } ?>>
                <label>No</label>
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Category Image</label>
              <div class="col-md-6">
                <input type="file" name="cat_image" class="form-control">
                <img src="other_images/<?=$c_image?>" alt="<?=$c_title?>" class="mt-1 img-thumbnail" width="70">
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
    $cat_top = $_POST['cat_top'];
    $cat_image = $_FILES['cat_image']['name'];
    $temp_name = $_FILES['cat_image']['tmp_name'];
    move_uploaded_file($temp_name, "other_images/$cat_image");
    $update_cat = "UPDATE `categories` SET `cat_title`='$cat_title',`cat_top`='$cat_top',`cat_image`='$cat_image' WHERE `cat_id`='$c_id'";
    $run_cat = mysqli_query($conn, $update_cat);
    if ($run_cat) {
      echo "<script>alert('This Category has been updated')</script>";
      echo "<script>window.open('index.php?view_cats','_self')</script>";
    }
  }
  ?>

<?php } ?>