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
            <i class="fas fa-tachometer-alt"></i> Dashboard / Insert Box
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
            <i class="fas fa-money-bill"></i> Insert Box
          </h5>
        </div>
        <div class="card-body">
          <form action="" method="post">
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Box Title: </label>
              <div class="col-md-6">
                <input type="text" name="box_title" class="form-control" required>
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Box Description: </label>
              <div class="col-md-6">
                <textarea name="box_desc" id="mytextarea" class="form-control" cols="30" rows="10"></textarea>
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-md-3"></label>
              <div class="col-md-6">
                <input type="submit" value="Insert Box" name="submit" class="form-control btn btn-primary">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php
  if (isset($_POST['submit'])) {
    $box_title = $_POST['box_title'];
    $box_desc = $_POST['box_desc'];
    $insert_box = "INSERT INTO `boxes_section`(`box_title`, `box_desc`) VALUES ('$box_title','$box_desc')";
    $run_box = mysqli_query($conn, $insert_box);
    if ($run_box) {
      echo "<script>alert('New box has been inserted')</script>";
      echo "<script>window.open('index.php?view_boxes','_self')</script>";
    }
  }
  ?>

<?php } ?>