<?php
$title = "Insert Products";
include 'includes/db.php';
include 'includes/header.php';
?>

<div class="row">
  <div class="col-lg-12">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
          <i class="fas fa-tachometer-alt"></i> Dashboard / Insert Products
        </li>
      </ol>
    </nav>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header pb-1">
        <h3 class="card-title">
          <i class="far fa-money-bill-alt"></i> Insert Products
        </h3>
      </div>
      <div class="card-body">
        <form method="post" enctype="multipart/form-data">
          <div class="form-group form-row">
            <label for="" class="col-form-label col-md-3 px-5 text-right">Product Title</label>
            <div class="col-md-6">
              <input type="text" name="product_title" class="form-control" required>
            </div>
          </div>
          <div class="form-group form-row">
            <label for="" class="col-form-label col-md-3 px-5 text-right">Product Category</label>
            <div class="col-md-6">
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
          </div>
          <div class="form-group form-row">
            <label for="" class="col-form-label col-md-3 px-5 text-right">Category</label>
            <div class="col-md-6">
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
          </div>
          <div class="form-group form-row">
            <label for="" class="col-form-label col-md-3 px-5 text-right">Product Image 1</label>
            <div class="col-md-6">
              <input type="file" name="product_img1" class="form-control" required>
            </div>
          </div>
          <div class="form-group form-row">
            <label for="" class="col-form-label col-md-3 px-5 text-right">Product Image 2</label>
            <div class="col-md-6">
              <input type="file" name="product_img2" class="form-control" required>
            </div>
          </div>
          <div class="form-group form-row">
            <label for="" class="col-form-label col-md-3 px-5 text-right">Product Image 3</label>
            <div class="col-md-6">
              <input type="file" name="product_img3" class="form-control" required>
            </div>
          </div>
          <div class="form-group form-row">
            <label for="" class="col-form-label col-md-3 px-5 text-right">Product Price</label>
            <div class="col-md-6">
              <input type="text" name="product_price" class="form-control" required>
            </div>
          </div>
          <div class="form-group form-row">
            <label for="" class="col-form-label col-md-3 px-5 text-right">Product Keywords</label>
            <div class="col-md-6">
              <input type="text" name="product_keywords" class="form-control" required>
            </div>
          </div>
          <div class="form-group form-row">
            <label for="" class="col-form-label col-md-3 px-5 text-right">Product Description</label>
            <div class="col-md-6">
              <textarea name="product_desc" id="mytextarea" class="form-control"></textarea>
            </div>
          </div>
          <div class="form-group form-row">
            <label for="" class="col-form-label col-md-3"></label>
            <div class="col-md-6">
              <input type="submit" value="Insert Product" name="submit" class="btn btn-primary form-control">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
if(isset($_POST['submit'])) {
  $product_title = $_POST['product_title'];
  $product_cat = $_POST['product_cat'];
  $cat = $_POST['cat'];
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
  $insert_product = "insert into products (p_cat_id, cat_id, date, product_title, product_img1, product_img2, product_img3, product_price, product_desc, product_keywords) values ('$product_cat', '$cat', NOW(), '$product_title', '$product_img1', '$product_img2', '$product_img3', '$product_price', '$product_desc', '$product_keywords')";
  $run_product = mysqli_query($conn, $insert_product);
  if($run_product) {
    echo "<script>alert('Product has been inserted successfully');</script>";
    echo "<script>window.open('insert_product.php', '_self');</script>";
  }
}
?>

<?php include 'includes/footer.php'; ?>