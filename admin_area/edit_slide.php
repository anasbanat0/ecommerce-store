<?php
if (!isset($_SESSION['admin_email'])) {
  echo "<script>window.open('login.php','_self')</script>";
} else {
?>

  <?php
  if (isset($_GET['edit_slide'])) {
    $edit_id = $_GET['edit_slide'];
    $edit_slide = "SELECT * fROM `slider` WHERE `slide_id`='$edit_id'";
    $run_edit = mysqli_query($conn, $edit_slide);
    $row_edit = mysqli_fetch_array($run_edit);
    $slide_id = $row_edit['slide_id'];
    $slide_name = $row_edit['slide_name'];
    $slide_image = $row_edit['slide_image'];
    $slide_url = $row_edit['slide_url'];
  }
  ?>

  <div class="row mt-4">
    <div class="col-lg-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            <i class="fas fa-tachometer-alt"></i> Dashboard / Edit Slide
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
            <i class="fas fa-money-bill"></i> Edit Slide
          </h5>
        </div>
        <div class="card-body">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Slide Name</label>
              <div class="col-md-6">
                <input type="text" name="slide_name" class="form-control" value="<?= $slide_name ?>" required>
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Slide Image</label>
              <div class="col-md-6">
                <input type="file" name="slide_image" class="form-control" required>
                <img src="slides_images/<?= $slide_image ?>" class="img-fluid mt-2 img-thumbnail" width="150" alt="<?= $slide_name ?>">
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Slide URL</label>
              <div class="col-md-6">
                <input type="text" name="slide_url" class="form-control" value="<?= $slide_url ?>" required>
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-md-3"></label>
              <div class="col-md-6">
                <input type="submit" name="update" class="btn btn-primary form-control" value="Update slide">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php
  if (isset($_POST['update'])) {
    $slide_name = $_POST['slide_name'];
    $slide_image = $_FILES['slide_image']['name'];
    $temp_name = $_FILES['slide_image']['tmp_name'];
    $slide_url = $_POST['slide_url'];
    move_uploaded_file($temp_name, "slides_images/$slide_image");
    $update_slide = "UPDATE `slider` SET `slide_name`='$slide_name',`slide_image`='$slide_image',`slide_url`='$slide_url' WHERE `slide_id`='$slide_id'";
    $run_slide = mysqli_query($conn, $update_slide);
    if ($run_slide) {
      echo "<script>alert('One slide has been updated')</script>";
      echo "<script>window.open('index.php?view_slides','_self')</script>";
    }
  }
  ?>

<?php } ?>