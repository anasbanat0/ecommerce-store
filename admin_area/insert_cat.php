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
          <form action="" method="post">
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Category Title</label>
              <div class="col-md-6">
                <input type="text" name="cat_title" class="form-control" required>
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Category Description</label>
              <div class="col-md-6">
                <textarea name="cat_desc" id="mytextarea" cols="30" rows="10" required class="form-control"></textarea>
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
    $cat_desc = $_POST['cat_desc'];
    $insert_cat = "INSERT INTO `categories` (`cat_title`,`cat_desc`) VALUES ('$cat_title','$cat_desc')";
    $run_cat = mysqli_query($conn, $insert_cat);
    if ($run_cat) {
      echo "<script>alert('New Category has been inserted')</script>";
      echo "<script>window.open('index.php?view_cats','_self')</script>";
    }
  }
  ?>

<?php } ?>