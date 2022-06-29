<?php
if (!isset($_SESSION['admin_email'])) {
  echo "<script>window.open('login.php','_self')</script>";
} else {
?>

  <?php
  if (isset($_GET['edit_icon'])) {
    $edit_id = $_GET['edit_icon'];
    $get_icon = "SELECT * FROM `icons` WHERE `icon_id`='$edit_id'";
    $run_icon = mysqli_query($conn, $get_icon);
    $row_edit = mysqli_fetch_array($run_icon);
    $i_id = $row_edit['icon_id'];
    $i_p = $row_edit['icon_product'];
    $i_title = $row_edit['icon_title'];
    $i_image = $row_edit['icon_image'];
    $new_i_image = $row_edit['icon_image'];
    $get_products = "SELECT * FROM `products` WHERE `product_id`='$i_p'";
    $run_products = mysqli_query($conn, $get_products);
    $row_products = mysqli_fetch_array($run_products);
    $product_id = $row_products['product_id'];
    $product_title = $row_products['product_title'];
  }
  ?>

  <div class="row mt-4">
    <div class="col-lg-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            <i class="fas fa-tachometer-alt"></i> Dashboard / Edit Icon
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
            <i class="fas fa-money-bill"></i> Edit Icon
          </h5>
        </div>
        <div class="card-body">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Icon Title </label>
              <div class="col-md-6">
                <input type="text" name="icon_title" class="form-control" value="<?= $i_title ?>">
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Icon For Products Or Bundles</label>
              <div class="col-md-6">
                <select name="product_id" class="form-control">
                  <option value="<?= $product_id ?>"><?= $product_title ?></option>
                  <?php
                  $get_p = "SELECT * FROM `products` WHERE `status`='product'";
                  $run_p = mysqli_query($conn, $get_p);
                  while ($row_p = mysqli_fetch_array($run_p)) {
                    $p_id = $row_p['product_id'];
                    $p_title = $row_p['product_title'];
                    echo "<option value='$p_id'>$p_title</option>";
                  }
                  ?>
                  <option disabled>Select Icon For Bundles</option>
                  <?php
                  $get_p = "SELECT * FROM `products` WHERE `status`='bundle'";
                  $run_p = mysqli_query($conn, $get_p);
                  while ($row_p = mysqli_fetch_array($run_p)) {
                    $p_id = $row_p['product_id'];
                    $p_title = $row_p['product_title'];
                    echo "<option value='$p_id'>$p_title</option>";
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Select Icon Image</label>
              <div class="col-md-6">
                <input type="file" name="icon_image" class="form-control">
                <img src="icon_images/<?= $i_image ?>" alt="<?= $i_title ?>" class="img-thumbnail mt-1" width="70">
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right"></label>
              <div class="col-md-6">
                <input type="submit" name="update" value="Update Icon" class="form-control btn btn-primary">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php
  if (isset($_POST['update'])) {
    $icon_title = $_POST['icon_title'];
    $icon_image = $_FILES['icon_image']['name'];
    $temp_name = $_FILES['icon_image']['tmp_name'];
    $product_id = $_POST['product_id'];
    move_uploaded_file($temp_name, "icon_images/$icon_image");
    if (empty($icon_image)) {
      $icon_image = $new_i_image;
    }
    $update_icon = "UPDATE `icons` SET `icon_product`='$product_id', `icon_title`='$icon_title', `icon_image`='$icon_image' WHERE `icon_id`='$i_id'";
    $run_update = mysqli_query($conn, $update_icon);
    if ($run_update) {
      echo "<script>alert('One icon has been updated')</script>";
      echo "<script>window.open('index.php?view_icons','_self')</script>";
    }
  }
  ?>
<?php } ?>