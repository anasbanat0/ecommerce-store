<?php
$title = "Product Details";
include 'includes/db.php';
include 'functions/functions.php';
include_once 'includes/header.php';
?>
<?php
$product_id = $_GET['product_id'];
$get_product = "SELECT * FROM `products` WHERE `product_url`='$product_id'";
$run_product = mysqli_query($conn, $get_product);
$check_product = mysqli_num_rows($run_product);
if ($check_product == 0) {
  echo "<script>window.open('index.php', '_self')</script>";
} else {
  $row_product = mysqli_fetch_array($run_product);
  $p_cat_id = $row_product['p_cat_id'];
  $pro_id = $row_product['product_id'];
  $pro_title = $row_product['product_title'];
  $pro_price = $row_product['product_price'];
  $pro_desc = $row_product['product_desc'];
  $pro_img1 = $row_product['product_img1'];
  $pro_img2 = $row_product['product_img2'];
  $pro_img3 = $row_product['product_img3'];
  $pro_label = $row_product['product_label'];
  $pro_psp_price = $row_product['product_psp_price'];
  $pro_features = $row_product['product_features'];
  $pro_video = $row_product['product_video'];
  $status = $row_product['status'];
  $pro_url = $row_product['product_url'];
  if ($pro_label == "") {
  } else {
    $product_label = "
        <a class='label sale' href='#' style='color:black;'>
          <div class='thelabel'>$pro_label</div>
          <div class='label-background'></div>
        </a>
      ";
  }
  $get_p_cat = "select * from product_categories where p_cat_id=$p_cat_id";
  $run_p_cat = mysqli_query($conn, $get_p_cat);
  $row_p_cat = mysqli_fetch_array($run_p_cat);
  $p_cat_title = $row_p_cat['p_cat_title'];

?>
  <div id="content">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mt-4">
          <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="index.php">Home</a>
              </li>
              <li class="breadcrumb-item">
                <a href="shop.php">Shop</a>
              </li>
              <li class="breadcrumb-item">
                <a href="shop.php?product_category=<?= @$p_cat_id ?>"><?= @$p_cat_title ?></a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                <?= @$pro_title ?>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="row" id="productMain">
            <div class="col-sm-6">
              <div id="mainImage">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-side-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-side-to="1"></li>
                    <li data-target="#myCarousel" data-side-to="2"></li>
                  </ol>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <div class="justify-content-center">
                        <img class="img-fluid" src="admin_area/product_images/<?= @$pro_img1 ?>" alt="<?= @$pro_title ?>">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <div class="justify-content-center">
                        <img class="img-fluid" src="admin_area/product_images/<?= @$pro_img2 ?>" alt="<?= @$pro_title ?>">
                      </div>
                    </div>
                    <div class="carousel-item">
                      <div class="justify-content-center">
                        <img class="img-fluid" src="admin_area/product_images/<?= @$pro_img3 ?>" alt="<?= @$pro_title ?>">
                      </div>
                    </div>
                  </div>
                  <button class="carousel-control-prev" type="button" data-target="#myCarousel" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-target="#myCarousel" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </button>
                </div>
              </div>
              <?php echo @$product_label; ?>
            </div>
            <div class="col-sm-6">
              <div class="card text">
                <div class="card-header pt-4">
                  <h2 class="text-center"><?= @$pro_title ?></h2>
                </div>
                <div class="card-body">
                  <?php
                  if (isset($_POST['add_cart'])) {
                    $ip_add = getRealUserIp();
                    $p_id = $pro_id;
                    $product_qty = $_POST['product_qty'];
                    $product_size = $_POST['product_size'];
                    $check_product = "select * from cart where ip_add='$ip_add' AND p_id='$p_id'";
                    $run_check = mysqli_query($conn, $check_product);
                    if (mysqli_num_rows($run_check) > 0) {
                      echo "<script>alert('This Product is already added in cart')</script>";
                      echo "<script>window.open('$pro_url', '_self')</script>";
                    } else {
                      $get_price = "SELECT * FROM `products` WHERE `product_id`='$p_id'";
                      $run_price = mysqli_query($conn, $get_price);
                      $row_price = mysqli_fetch_array($run_price);
                      $pro_price = $row_price['product_price'];
                      $pro_psp_price = $row_price['product_psp_price'];
                      $pro_label = $row_price['product_label'];
                      if ($pro_label == "Sale" || $pro_label == "Gift") {
                        $product_price = $pro_psp_price;
                      } else {
                        $product_price = $pro_price;
                      }
                      $query = "INSERT INTO `cart` (`p_id`, `ip_add`, `qty`, `p_price`, `size`) values ('$p_id', '$ip_add', '$product_qty', '$product_price', '$product_size')";
                      $run_query = mysqli_query($conn, $query);
                      echo "<script>window.open('$pro_url', '_self')</script>";
                    }
                  }
                  ?>
                  <form action="" method="post">
                    <?php
                    if ($status == "product") {
                    ?>
                      <div class="form-group row">
                        <label for="" class="col-md-5 col-form-label">Product Quantity</label>
                        <div class="col-md-7">
                          <select name="product_qty" class="form-control" id="">
                            <option>Select quantity</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="" class="col-md-5 col-form-label">Product Size</label>
                        <div class="col-md-7">
                          <select name="product_size" class="form-control">
                            <option>Select a size</option>
                            <option>Small</option>
                            <option>Medium</option>
                            <option>Large</option>
                          </select>
                        </div>
                      </div>
                    <?php } else { ?>
                      <div class="form-group row">
                        <label for="" class="col-md-5 col-form-label">Bundle Quantity</label>
                        <div class="col-md-7">
                          <select name="product_qty" class="form-control" id="">
                            <option>Select quantity</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="" class="col-md-5 col-form-label">Bundle Size</label>
                        <div class="col-md-7">
                          <select name="product_size" class="form-control">
                            <option>Select a size</option>
                            <option>Small</option>
                            <option>Medium</option>
                            <option>Large</option>
                          </select>
                        </div>
                      </div>
                    <?php } ?>
                    <div class="text-center mt-4 mb-2">
                      <?php
                      $get_icons = "SELECT * FROM `icons` WHERE `icon_product`='$pro_id'";
                      $run_icons = mysqli_query($conn, $get_icons);
                      while ($row_icons = mysqli_fetch_array($run_icons)) {
                        $icon_image = $row_icons['icon_image'];
                        echo "<img class='mr-3' src='admin_area/icon_images/$icon_image' width='45' height='45'>";
                      }
                      ?>
                    </div>
                    <?php
                    if ($status == "product") {
                      if ($pro_label == "Sale" || $pro_label == "Gift") {
                        echo "
                            <p class='price'>
                              Product Price: <del>$$pro_price</del><br>
                              Product Sale Price: $$pro_psp_price
                            </p>
                          ";
                      } else {
                        echo "
                          <p class='price'>
                            Product Price: $$pro_price
                          </p>
                        ";
                      }
                    } else {
                      if ($pro_label == "Sale" || $pro_label == "Gift") {
                        echo "
                            <p class='price'>
                              Bundle Price: <del>$$pro_price</del><br>
                              Bundle Sale Price: $$pro_psp_price
                            </p>
                          ";
                      } else {
                        echo "
                          <p class='price'>
                            Bundle Price: $$pro_price
                          </p>
                        ";
                      }
                    }
                    ?>
                    <p class="text-center buttons">
                      <button class="btn btn-primary" type="submit" name="add_cart">
                        <i class="fa fa-shopping-cart"></i> Add to Cart
                      </button>
                    </p>
                  </form>
                </div>
              </div>
              <div class="row mt-3" id="thumbs">
                <div class="col-4">
                  <a href="#" class="thumb">
                    <img src="admin_area/product_images/<?= @$pro_img1 ?>" class="img-fluid img-thumbnail" alt="<?= @$pro_title ?>">
                  </a>
                </div>
                <div class="col-4">
                  <a href="#" class="thumb">
                    <img src="admin_area/product_images/<?= @$pro_img2 ?>" class="img-fluid img-thumbnail" alt="<?= @$pro_title ?>">
                  </a>
                </div>
                <div class="col-4">
                  <a href="#" class="thumb">
                    <img src="admin_area/product_images/<?= @$pro_img3 ?>" class="img-fluid img-thumbnail" alt="<?= @$pro_title ?>">
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="card px-4 py-3 mb-4 mt-4" id="details">
            <ul class="nav nav-pills mb-4">
              <li class="nav-item" role="presentation">
                <a class="nav-link active" href="#description" data-toggle="pill" role="tab" aria-selected="true">
                  <?php
                  if ($status == "product") {
                    echo "Product Description";
                  } else {
                    echo "Bundle Description";
                  }
                  ?>
                </a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" href="#features" data-toggle="pill" role="tab" aria-selected="false">
                  Features
                </a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link" href="#video" data-toggle="pill" role="tab" aria-selected="false">
                  Sounds and Videos
                </a>
              </li>
            </ul>
            <div class="tab-content">
              <div id="description" class="tab-pane fade show active" role="tabpanel">
                <?= $pro_desc ?>
              </div>
              <div id="features" class="tab-pane fade show" role="tabpanel">
                <?= $pro_features ?>
              </div>
              <div id="video" class="tab-pane fade show text-center" role="tabpanel">
                <?= $pro_video ?>
              </div>
            </div>
          </div>
          <div class="row">
            <?php
            if ($status == "product") { ?>
              <div class="col-sm-12">
                <div class="card pt-4 pb-3 mb-4">
                  <h3 class="text-center">You also like these products</h3>
                </div>
              </div>
              <?php
              $get_products = "select * from products order by rand() LIMIT 0,4";
              $run_products = mysqli_query($conn, $get_products);
              while ($row_products = mysqli_fetch_array($run_products)) {
                $pro_id = $row_products['product_id'];
                $pro_title = $row_products['product_title'];
                $pro_price = $row_products['product_price'];
                $pro_img1 = $row_products['product_img1'];
                $pro_label = $row_products['product_label'];
                $manufacturer_id = $row_products['manufacturer_id'];
                $get_manufacturer = "SELECT * FROM `manufacturers` WHERE `manufacturer_id`='$manufacturer_id'";
                $run_manufacturer = mysqli_query($db, $get_manufacturer);
                $row_manufacturer = mysqli_fetch_array($run_manufacturer);
                $manufacturer_name = $row_manufacturer['manufacturer_title'];
                $pro_psp_price = $row_products['product_psp_price'];
                $pro_url = $row_products['product_url'];
                if ($pro_label == "Sale" || $pro_label == "Gift") {
                  $product_price = "<del>$$pro_price</del>";
                  $product_psp_price = "| $$pro_psp_price";
                } else {
                  $product_psp_price = "";
                  $product_price = "$$pro_price";
                }
                if ($pro_label == "") {
                } else {
                  $product_label = "
                  <a class='label sale' href='#' style='color:black;'>
                    <div class='thelabel'>$pro_label</div>
                    <div class='label-background'></div>
                  </a>
                ";
                }
                echo "
                <div class='col-md-3 col-sm-6 center-responsive'>
                  <div class='product'>
                    <a href='$pro_url'>
                      <img src='admin_area/product_images/$pro_img1' class='img-fluid'>
                    </a>
                    <div class='text'>
                      <div class='text-center'>
                        <p class='btn btn-primary'>Manufacturer: $manufacturer_name</p>
                      </div>
                      <hr class='mt-0'>
                      <h3><a href='$pro_url'>$pro_title</a></h3>
                      <p class='price'>$product_price $product_psp_price</p>
                      <p class='buttons'>
                        <a href='$pro_url' class='btn btn-secondary'>View Details</a>
                        <a href='$pro_url' class='btn btn-primary'>
                        <i class='fa fa-shopping-cart'></i> Add to cart
                      </a>
                      </p>
                    </div>
                    $product_label
                  </div>
                </div>
              ";
              }
              ?>
            <?php } else { ?>
              <div class="col-sm-12">
                <div class="card pt-4 pb-3 mb-4">
                  <h5 class="text-center">Bundle Products</h5>
                </div>
              </div>
              <?php
              $get_bundle_product_relation = "SELECT * FROM `bundle_product_relation` WHERE `bundle_id`='$pro_id' ORDER BY rand() LIMIT 0,4";
              $run_bundle_product_relation = mysqli_query($conn, $get_bundle_product_relation);
              while ($row_bundle_product_relation = mysqli_fetch_array($run_bundle_product_relation)) {
                $bundle_product_relation_id = $row_bundle_product_relation['product_id'];
                $get_products = "SELECT * FROM `products` WHERE `product_id`='$bundle_product_relation_id'";
                $run_products = mysqli_query($conn, $get_products);
                while ($row_products = mysqli_fetch_array($run_products)) {
                  $pro_id = $row_products['product_id'];
                  $pro_title = $row_products['product_title'];
                  $pro_price = $row_products['product_price'];
                  $pro_img1 = $row_products['product_img1'];
                  $pro_label = $row_products['product_label'];
                  $manufacturer_id = $row_products['manufacturer_id'];
                  $get_manufacturer = "SELECT * FROM `manufacturers` WHERE `manufacturer_id`='$manufacturer_id'";
                  $run_manufacturer = mysqli_query($db, $get_manufacturer);
                  $row_manufacturer = mysqli_fetch_array($run_manufacturer);
                  $manufacturer_name = $row_manufacturer['manufacturer_title'];
                  $pro_psp_price = $row_products['product_psp_price'];
                  $pro_url = $row_products['product_url'];
                  if ($pro_label == "Sale" || $pro_label == "Gift") {
                    $product_price = "<del>$$pro_price</del>";
                    $product_psp_price = "| $$pro_psp_price";
                  } else {
                    $product_psp_price = "";
                    $product_price = "$$pro_price";
                  }
                  if ($pro_label == "") {
                  } else {
                    $product_label = "
                      <a class='label sale' href='#' style='color:black;'>
                        <div class='thelabel'>$pro_label</div>
                        <div class='label-background'></div>
                      </a>
                    ";
                  }
                  echo "
                    <div class='col-md-3 col-sm-6 center-responsive'>
                      <div class='product'>
                        <a href='$pro_url'>
                          <img src='admin_area/product_images/$pro_img1' class='img-fluid'>
                        </a>
                        <div class='text'>
                          <div class='text-center'>
                            <p class='btn btn-primary'>Manufacturer: $manufacturer_name</p>
                          </div>
                          <hr class='mt-0'>
                          <h3><a href='$pro_url'>$pro_title</a></h3>
                          <p class='price'>$product_price $product_psp_price</p>
                          <p class='buttons'>
                            <a href='$pro_url' class='btn btn-secondary'>View Details</a>
                            <a href='$pro_url' class='btn btn-primary'>
                            <i class='fa fa-shopping-cart'></i> Add to cart
                          </a>
                          </p>
                        </div>
                        $product_label
                      </div>
                    </div>
                  ";
                }
              }
              ?>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include_once 'includes/footer.php'; ?>
<?php } ?>