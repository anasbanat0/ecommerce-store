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
            <i class="fas fa-tachometer-alt"></i> Dashboard / Insert Product Category
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
            <i class="fas fa-money-bill"></i> Insert Product Category
          </h5>
        </div>
        <div class="card-body">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Product Category Title</label>
              <div class="col-md-6">
                <input type="text" name="p_cat_title" class="form-control" required>
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Show as Top Product Category</label>
              <div class="col-md-6 mt-2">
                <input type="radio" name="p_cat_top" value="yes">
                <label>Yes</label>
                <input type="radio" name="p_cat_top" value="no">
                <label>No</label>
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Product Category Image</label>
              <div class="col-md-6">
                <input type="file" name="p_cat_image" class="form-control">
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-md-3"></label>
              <div class="col-md-6">
                <input type="submit" name="submit" class="btn btn-primary form-control" value="Submit">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php
  if (isset($_POST['submit'])) {
    $p_cat_title = $_POST['p_cat_title'];
    $p_cat_top = $_POST['p_cat_top'];
    $p_cat_image = $_FILES['p_cat_image']['name'];
    $temp_name = $_FILES['p_cat_image']['tmp_name'];
    move_uploaded_file($temp_name,"other_images/$p_cat_image");
    $insert_p_cat = "INSERT INTO `product_categories` (`p_cat_title`,`p_cat_top`,`p_cat_image`) VALUES ('$p_cat_title','$p_cat_top','$p_cat_image')";
    $run_p_cat = mysqli_query($conn, $insert_p_cat);
    if ($run_p_cat) {
      echo "<script>alert('New product category has been inserted')</script>";
      echo "<script>window.open('index.php?view_p_cats','_self')</script>";
    }
  }
  ?>

<?php } ?>