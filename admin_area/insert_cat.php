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
            <i class="fas fa-tachometer-alt"></i> Dashboard / Insert Category
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
            <i class="fas fa-money-bill"></i> Insert Category
          </h5>
        </div>
        <div class="card-body">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Category Title</label>
              <div class="col-md-6">
                <input type="text" name="cat_title" class="form-control" required>
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Show as Category Top</label>
              <div class="col-md-6 mt-2">
                <input type="radio" name="cat_top" value="yes">
                <label>Yes</label>
                <input type="radio" name="cat_top" value="no">
                <label>No</label>
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Category Image</label>
              <div class="col-md-6">
                <input type="file" name="cat_image" class="form-control">
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-md-3"></label>
              <div class="col-md-6">
                <input type="submit" name="submit" class="btn btn-primary form-control" value="Insert Category">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php
  if (isset($_POST['submit'])) {
    $cat_title = $_POST['cat_title'];
    $cat_top = $_POST['cat_top'];
    $cat_image = $_FILES['cat_image']['name'];
    $temp_name = $_FILES['cat_image']['tmp_name'];
    move_uploaded_file($temp_name,"other_images/$cat_image");
    $insert_cat = "INSERT INTO `categories` (`cat_title`,`cat_top`,`cat_image`) VALUES ('$cat_title','$cat_top','$cat_image')";
    $run_cat = mysqli_query($conn, $insert_cat);
    if ($run_cat) {
      echo "<script>alert('New Category has been inserted')</script>";
      echo "<script>window.open('index.php?view_cats','_self')</script>";
    }
  }
  ?>

<?php } ?>