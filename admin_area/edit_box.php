<?php
if (!isset($_SESSION['admin_email'])) {
  echo "<script>window.open('login.php','_self')</script>";
} else {
?>
  <?php
  if (isset($_GET['edit_box'])) {
    $edit_box = $_GET['edit_box'];
    $get_boxes = "SELECT * FROM `boxes_section` WHERE `box_id`='$edit_box'";
    $run_boxes = mysqli_query($conn, $get_boxes);
    $row_boxes = mysqli_fetch_array($run_boxes);
    $box_id = $row_boxes['box_id'];
    $box_title = $row_boxes['box_title'];
    $box_desc = $row_boxes['box_desc'];
  }
  ?>
  <div class="row mt-4">
    <div class="col-lg-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            <i class="fas fa-tachometer-alt"></i> Dashboard / Edit Box
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
            <i class="fas fa-money-bill"></i> Edit Box
          </h5>
        </div>
        <div class="card-body">
          <form action="" method="post">
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Box Title: </label>
              <div class="col-md-6">
                <input type="text" name="box_title" value="<?= $box_title ?>" class="form-control" required>
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Box Description: </label>
              <div class="col-md-6">
                <textarea name="box_desc" id="mytextarea" class="form-control" cols="30" rows="10"><?= $box_desc ?></textarea>
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-md-3"></label>
              <div class="col-md-6">
                <input type="submit" value="Update Box" name="update" class="form-control btn btn-primary">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php
  if (isset($_POST['update'])) {
    $box_title = $_POST['box_title'];
    $box_desc = $_POST['box_desc'];
    $update_box = "UPDATE `boxes_section` SET `box_title`='$box_title',`box_desc`='$box_desc' WHERE `box_id`='$box_id'";
    $run_box = mysqli_query($conn, $update_box);
    if ($run_box) {
      echo "<script>alert('This box has been updated')</script>";
      echo "<script>window.open('index.php?view_boxes','_self')</script>";
    }
  }
  ?>
<?php } ?>