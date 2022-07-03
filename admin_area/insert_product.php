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
            <i class="fas fa-tachometer-alt"></i> Dashboard / Insert Product
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
            <i class="far fa-money-bill-alt"></i> Insert Product
          </h3>
        </div>
        <div class="card-body">
          <form method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-8">
                <div class="form-group">
                  <label class="col-form-label">Product Title</label>
                  <input type="text" name="product_title" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="" class="col-form-label">Product Slug</label>
                  <input type="text" name="product_url" class="form-control" placeholder="Ex: new-t-shirt" required>
                </div>
                <div class="form-group">
                  <label for="" class="col-form-label">Product Tabs</label>
                  <ul class="nav nav-pills mb-3">
                    <li class="nav-item">
                      <a class="nav-link active" href="#description" data-toggle="pill" role="tab">Product Description</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#features" data-toggle="pill" role="tab">Product Features</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#video" data-toggle="pill" role="tab">Sounds and Video</a>
                    </li>
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane fade show active" id="description">
                      <textarea name="product_desc" id="textarea" class="form-control" rows="15"></textarea>
                    </div>
                    <div class="tab-pane fade show" id="features">
                      <textarea name="product_features" id="textarea" class="form-control" rows="15"></textarea>
                    </div>
                    <div class="tab-pane fade show" id="video">
                      <textarea name="product_video" class="form-control" rows="15"></textarea>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="" class="col-form-label">Product Price</label>
                  <input type="text" name="product_price" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="" class="col-form-label">Product Sale Price</label>
                  <input type="text" name="psp_price" class="form-control" required>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="" class="col-form-label">Select A Manufacturer</label>
                  <select class="form-control" name="manufacturer">
                    <option>Select A Manufacturer</option>
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
                <div class="form-group">
                  <label for="" class="col-form-label">Product Category</label>
                  <select name="product_cat" id="" class="form-control">
                    <option>Select a Product Category</option>
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
                <div class="form-group">
                  <label for="" class="col-form-label">Category</label>
                  <select name="cat" class="form-control">
                    <option>Select a Category</option>
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
                <div class="form-group">
                  <label for="" class="col-form-label">Product Image 1</label>
                  <input type="file" name="product_img1" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="" class="col-form-label">Product Image 2</label>
                  <input type="file" name="product_img2" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="" class="col-form-label">Product Image 3</label>
                  <input type="file" name="product_img3" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="" class="col-form-label">Product Keywords</label>
                  <input type="text" name="product_keywords" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="" class="col-form-label">Product Label</label>
                  <input type="text" name="product_label" class="form-control" required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <input type="submit" value="Insert Product" name="submit" class="btn btn-primary form-control">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php
  if (!empty($_POST['submit'])) {
    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $cat = $_POST['cat'];
    $manufacturer_id = $_POST['manufacturer'];
    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_desc'];
    $product_keywords = $_POST['product_keywords'];
    $psp_price = $_POST['psp_price'];
    $product_label = $_POST['product_label'];
    $product_url = $_POST['product_url'];
    $product_features = $_POST['product_features'];
    $product_video = $_POST['product_video'];
    $status = "product";
    $product_img1 = $_FILES['product_img1']['name'];
    $product_img2 = $_FILES['product_img2']['name'];
    $product_img3 = $_FILES['product_img3']['name'];
    $temp_name1 = $_FILES['product_img1']['tmp_name'];
    $temp_name2 = $_FILES['product_img2']['tmp_name'];
    $temp_name3 = $_FILES['product_img3']['tmp_name'];
    move_uploaded_file($temp_name1, "product_images/$product_img1");
    move_uploaded_file($temp_name2, "product_images/$product_img2");
    move_uploaded_file($temp_name3, "product_images/$product_img3");
    $insert_product = "INSERT INTO `products`(`p_cat_id`, `cat_id`, `manufacturer_id`, `date`, `product_title`, `product_url`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_psp_price`, `product_desc`, `product_features`, `product_video`, `product_keywords`, `product_label`, `status`) VALUES ('$product_cat', '$cat', '$manufacturer_id', NOW(), '$product_title', '$product_url', '$product_img1', '$product_img2', '$product_img3', '$product_price', '$psp_price', '$product_desc', '$product_features', '$product_video', '$product_keywords', '$product_label', '$status')";
    $run_product = mysqli_query($conn, $insert_product);
    if ($run_product) {
      echo "<script>alert('Product has been inserted successfully');</script>";
      echo "<script>window.open('index.php?view_products', '_self');</script>";
    }
  }
  ?>
<?php } ?>