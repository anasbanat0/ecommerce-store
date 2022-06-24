<?php
if (!isset($_SESSION['admin_email'])) {
  echo "<script>window.open('login.php','_self')</script>";
} else {
?>
  <?php
  if (isset($_GET['edit_product'])) {
    $edit_id = $_GET['edit_product'];
    $get_p = "SELECT * FROM products where product_id='$edit_id'";
    $run_edit = mysqli_query($conn, $get_p);
    $row_edit = mysqli_fetch_array($run_edit);
    $p_id = $row_edit['product_id'];
    $p_title = $row_edit['product_title'];
    $p_cat = $row_edit['p_cat_id'];
    $cat = $row_edit['cat_id'];
    $m_id = $row_edit['manufacturer_id'];
    $p_image1 = $row_edit['product_img1'];
    $p_image2 = $row_edit['product_img2'];
    $p_image3 = $row_edit['product_img3'];
    $p_price = $row_edit['product_price'];
    $p_desc = $row_edit['product_desc'];
    $p_keywords = $row_edit['product_keywords'];
  }
  $get_manufacturer = "SELECT * FROM `manufacturers` WHERE `manufacturer_id`='$m_id'";
  $run_manufacturer = mysqli_query($conn, $get_manufacturer);
  $row_manufacturer = mysqli_fetch_array($run_manufacturer);
  $manufacturer_id = $row_manufacturer['manufacturer_id'];
  $manufacturer_title = $row_manufacturer['manufacturer_title'];
  $get_p_cat = "SELECT * FROM product_categories where p_cat_id='$p_cat'";
  $run_p_cat = mysqli_query($conn, $get_p_cat);
  $row_p_cat = mysqli_fetch_array($run_p_cat);
  $p_cat_title = $row_p_cat['p_cat_title'];
  $get_cat = "SELECT * FROM categories where cat_id='$cat'";
  $run_cat = mysqli_query($conn, $get_cat);
  $row_cat = mysqli_fetch_array($run_cat);
  $cat_title = $row_cat['cat_title'];
  ?>
  <div class="row mt-4">
    <div class="col-lg-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            <i class="fas fa-tachometer-alt"></i> Dashboard / Edit Product
          </li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="row mb-2">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header pb-1">
          <h3 class="card-title">
            <i class="far fa-money-bill-alt"></i> Edit Product
          </h3>
        </div>
        <div class="card-body">
          <form method="post" enctype="multipart/form-data">
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 px-5 text-right">Product Title</label>
              <div class="col-md-6">
                <input type="text" name="product_title" class="form-control" value="<?= $p_title ?>" required>
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 px-5 text-right">Select A Manufacturer</label>
              <div class="col-md-6">
                <select name="manufacturer" class="form-control">
                  <option value="<?php echo $manufacturer_id ?>"><?php echo $manufacturer_title ?></option>
                  <?php
                  $get_manufacturer = "SELECT * FROM `manufacturers`";
                  $run_manufacturer = mysqli_query($conn, $get_manufacturer);
                  while ($row_manufacturer = mysqli_fetch_array($run_manufacturer)) {
                    $manufacturer_id = $row_manufacturer['manufacturer_id'];
                    $manufacturer_title = $row_manufacturer['manufacturer_title'];
                    echo "<option value='$manufacturer_id'>$manufacturer_title</option>";
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 px-5 text-right">Product Category</label>
              <div class="col-md-6">
                <select name="product_cat" id="" class="form-control">
                  <option value="<?= $p_cat ?>"><?= $p_cat_title ?></option>
                  <?php
                  $get_p_cats = "select * from product_categories";
                  $run_p_cats = mysqli_query($conn, $get_p_cats);
                  while ($row_p_cats = mysqli_fetch_assoc($run_p_cats)) {
                    $p_cat_id = $row_p_cats['p_cat_id'];
                    $p_cat_title = $row_p_cats['p_cat_title'];
                    echo "<option value='$p_cat_id'>$p_cat_title</option>";
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 px-5 text-right">Category</label>
              <div class="col-md-6">
                <select name="cat" class="form-control">
                  <option value="<?= $cat ?>"><?= $cat_title ?></option>
                  <?php
                  $get_cat = "select * from Categories";
                  $run_cat = mysqli_query($conn, $get_cat);
                  while ($row_cat = mysqli_fetch_assoc($run_cat)) {
                    $cat_id = $row_cat['cat_id'];
                    $cat_title = $row_cat['cat_title'];
                    echo "<option value='$cat_id'>$cat_title</option>";
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 px-5 text-right">Product Image 1</label>
              <div class="col-md-6">
                <input type="file" name="product_img1" class="form-control" required>
                <img src="product_images/<?= $p_image1 ?>" class="mt-1 img-thumbnail" width="70" alt="<?= $p_title ?>">
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 px-5 text-right">Product Image 2</label>
              <div class="col-md-6">
                <input type="file" name="product_img2" class="form-control" required>
                <img src="product_images/<?= $p_image2 ?>" class="mt-1 img-thumbnail" width="70" alt="<?= $p_title ?>">
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 px-5 text-right">Product Image 3</label>
              <div class="col-md-6">
                <input type="file" name="product_img3" class="form-control" required>
                <img src="product_images/<?= $p_image3 ?>" class="mt-1 img-thumbnail" width="70" alt="<?= $p_title ?>">
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 px-5 text-right">Product Price</label>
              <div class="col-md-6">
                <input type="text" name="product_price" class="form-control" value="<?= $p_price ?>" required>
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 px-5 text-right">Product Keywords</label>
              <div class="col-md-6">
                <input type="text" name="product_keywords" class="form-control" value="<?= $p_keywords ?>" required>
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 px-5 text-right">Product Description</label>
              <div class="col-md-6">
                <textarea name="product_desc" id="mytextarea" class="form-control"><?= $p_desc ?></textarea>
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3"></label>
              <div class="col-md-6">
                <input type="submit" value="Update Product" name="update" class="btn btn-primary form-control">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php
  if (!empty($_POST['update'])) {
    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $cat = $_POST['cat'];
    $manufacturer_id = $_POST['manufacturer'];
    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_desc'];
    $product_keywords = $_POST['product_keywords'];
    $product_img1 = $_FILES['product_img1']['name'];
    $product_img2 = $_FILES['product_img2']['name'];
    $product_img3 = $_FILES['product_img3']['name'];
    $temp_name1 = $_FILES['product_img1']['tmp_name'];
    $temp_name2 = $_FILES['product_img2']['tmp_name'];
    $temp_name3 = $_FILES['product_img3']['tmp_name'];
    move_uploaded_file($temp_name1, "product_images/$product_img1");
    move_uploaded_file($temp_name2, "product_images/$product_img2");
    move_uploaded_file($temp_name3, "product_images/$product_img3");
    $update_product = "UPDATE `products` SET `p_cat_id`='$product_cat',`cat_id`='$cat',`manufacturer_id`='$manufacturer_id',`date`=NOW(),`product_title`='$product_title',`product_img1`='$product_img1',`product_img2`='$product_img2',`product_img3`='$product_img3',`product_price`='$product_price',`product_desc`='$product_desc',`product_keywords`='$product_keywords' WHERE `product_id`='$p_id'";
    $run_product = mysqli_query($conn, $update_product);
    if ($run_product) {
      echo "<script>alert('Product has been updated successfully')</script>";
      echo "<script>window.open('index.php?view_products','_self')</script>";
    }
  }
  ?>
<?php } ?>