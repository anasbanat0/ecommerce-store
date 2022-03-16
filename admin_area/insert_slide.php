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
            <i class="fas fa-tachometer-alt"></i> Dashboard / Insert Slide
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
            <i class="fas fa-money-bill"></i> Insert Slide
          </h5>
        </div>
        <div class="card-body">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Slide Name</label>
              <div class="col-md-6">
                <input type="text" name="slide_name" class="form-control" required>
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Slide Image</label>
              <div class="col-md-6">
                <input type="file" name="slide_image" class="form-control" required>
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Slide URL</label>
              <div class="col-md-6">
                <input type="text" name="slide_url" class="form-control" required>
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-md-3"></label>
              <div class="col-md-6">
                <input type="submit" name="submit" class="btn btn-primary form-control" value="Insert slide">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php
  if (isset($_POST['submit'])) {
    $slide_name = $_POST['slide_name'];
    $slide_image = $_FILES['slide_image']['name'];
    $temp_name = $_FILES['slide_image']['tmp_name'];
    $slide_url = $_POST['slide_url'];
    $view_slides = "SELECT * FROM `slider`";
    $view_run_slides = mysqli_query($conn, $view_slides);
    $count = mysqli_num_rows($view_run_slides);
    if ($count < 4) {
      move_uploaded_file($temp_name, "slides_images/$slide_image");
      $insert_slide = "INSERT INTO `slider` (`slide_name`,`slide_image`,`slide_url`) VALUES ('$slide_name','$slide_image','$slide_url')";
      $run_slide = mysqli_query($conn, $insert_slide);
      echo "<script>alert('New slide has been inserted')</script>";
      echo "<script>window.open('index.php?view_slides','_self')</script>";
    } else {
      echo "<script>alert('You have already inserted four slides')</script>";
    }
  }
  ?>

<?php } ?>