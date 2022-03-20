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
            <i class="fas fa-tachometer-alt"></i> Dashboard / Insert Term
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
            <i class="fas fa-money-bill"></i> Insert Term
          </h5>
        </div>
        <div class="card-body">
          <form action="" method="post">
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Term Title</label>
              <div class="col-md-6">
                <input type="text" name="term_title" class="form-control" required>
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Term Description</label>
              <div class="col-md-6">
                <textarea name="term_desc" id="mytextarea" class="form-control" cols="30" rows="10"></textarea>
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Term Link</label>
              <div class="col-md-6">
                <input type="text" name="term_link" class="form-control" required>
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-md-3"></label>
              <div class="col-md-6">
                <input type="submit" value="Insert Term" name="submit" class="form-control btn btn-primary">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php
  if (isset($_POST['submit'])) {
    $term_title = $_POST['term_title'];
    $term_desc = $_POST['term_desc'];
    $term_link = $_POST['term_link'];
    $insert_term = "INSERT INTO `terms`(`term_title`,`term_link`,`term_desc`) VALUES ('$term_title','$term_link','$term_desc')";
    $run_term = mysqli_query($conn, $insert_term);
    if ($run_term) {
      echo "<script>alert('New term has been inserted')</script>";
      echo "<script>window.open('index.php?view_terms','_self')</script>";
    }
  }
  ?>
<?php } ?>