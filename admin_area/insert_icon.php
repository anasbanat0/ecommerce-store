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
            <i class="fas fa-tachometer-alt"></i> Dashboard / Insert Icon
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
            <i class="fas fa-money-bill"></i> Insert Icon
          </h5>
        </div>
        <div class="card-body">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Icon Title </label>
              <div class="col-md-6">
                <input type="text" name="icon_title" class="form-control">
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Icon For Products or Bundles</label>
              <div class="col-md-6">
                <div class="card">
                  <div class="card-header pb-2">
                    <h5>Select Icon For Products or Bundle</h5>
                  </div>
                  <div class="card-body" style="height: 200px; overflow-y: scroll;">
                    <ul class="nav flex-column nav-pills category-menu">
                      <p>Select Icon For Products</p>
                      <?php
                      $get_p = "SELECT * FROM `products` WHERE `status`='product'";
                      $run_p = mysqli_query($conn, $get_p);
                      while ($row_p = mysqli_fetch_array($run_p)) {
                        $p_id = $row_p['product_id'];
                        $p_title = $row_p['product_title'];
                        echo "<div class='row'><input class='mx-3' type='checkbox' value='$p_id' name='product_id[]'>$p_title</div>";
                      }
                      ?>
                      <p>Select Icon For Bundles</p>
                      <?php
                      $get_p = "SELECT * FROM `products` WHERE `status`='bundle'";
                      $run_p = mysqli_query($conn, $get_p);
                      while ($row_p = mysqli_fetch_array($run_p)) {
                        $p_id = $row_p['product_id'];
                        $p_title = $row_p['product_title'];
                        echo "<div class='row'><input class='mx-3' type='checkbox' value='$p_id' name='product_id[]'>$p_title</div>";
                      }
                      ?>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Select Icon Image</label>
              <div class="col-md-6">
                <input type="file" name="icon_image" class="form-control">
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right"></label>
              <div class="col-md-6">
                <input type="submit" name="submit" value="Insert Icon" class="form-control btn btn-primary">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php
  if (isset($_POST['submit'])) {
    $icon_title = $_POST['icon_title'];
    $icon_image = $_FILES['icon_image']['name'];
    $temp_name = $_FILES['icon_image']['tmp_name'];
    move_uploaded_file($temp_name, "icon_images/$icon_image");
    foreach ($_POST['product_id'] as $product_id) {
      $insert_icon = "INSERT INTO `icons` (`icon_product`, `icon_title`, `icon_image`) VALUES ('$product_id','$icon_title','$icon_image')";
      $run_icon = mysqli_query($conn, $insert_icon);
    }
    echo "<script>alert('New icon has been inserted')</script>";
    echo "<script>window.open('index.php?view_icons','_self')</script>";
  }
  ?>
<?php } ?>