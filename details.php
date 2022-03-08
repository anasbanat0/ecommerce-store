<?php
$title = "Product Details";
include 'includes/db.php';
include 'functions/functions.php';
include_once 'includes/header.php';
if (isset($_GET['product_id'])) {
  $product_id = $_GET['product_id'];
  $get_product = "select * from products where product_id=$product_id";
  $run_product = mysqli_query($conn, $get_product);
  $row_product = mysqli_fetch_array($run_product);
  $p_cat_id = $row_product['p_cat_id'];
  $pro_title = $row_product['product_title'];
  $pro_price = $row_product['product_price'];
  $pro_desc = $row_product['product_desc'];
  $pro_img1 = $row_product['product_img1'];
  $pro_img2 = $row_product['product_img2'];
  $pro_img3 = $row_product['product_img3'];
  $get_p_cat = "select * from product_categories where p_cat_id=$p_cat_id";
  $run_p_cat = mysqli_query($conn, $get_p_cat);
  $row_p_cat = mysqli_fetch_array($run_p_cat);
  $p_cat_title = $row_p_cat['p_cat_title'];
}
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
              <a href="shop.php?product_category=<?= $p_cat_id ?>"><?= $p_cat_title ?></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              <?= $pro_title ?>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">
        <?php include_once 'includes/sidebar.php'; ?>
      </div>
      <div class="col-md-9">
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
                      <img class="img-fluid" src="admin_area/product_images/<?= $pro_img1 ?>" alt="<?= $pro_title ?>">
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="justify-content-center">
                      <img class="img-fluid" src="admin_area/product_images/<?= $pro_img2 ?>" alt="<?= $pro_title ?>">
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="justify-content-center">
                      <img class="img-fluid" src="admin_area/product_images/<?= $pro_img3 ?>" alt="<?= $pro_title ?>">
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
          </div>
          <div class="col-sm-6">
            <div class="card text">
              <div class="card-header pt-4">
                <h2 class="text-center"><?= $pro_title ?></h2>
              </div>
              <div class="card-body">
                <?php add_cart() ?>
                <form action="details.php?add_cart=<?= $product_id ?>" method="post">
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
                  <p class="price">$<?= $pro_price ?></p>
                  <p class="text-center buttons">
                    <button class="btn btn-primary" type="submit">
                      <i class="fa fa-shopping-cart"></i> Add to Cart
                    </button>
                  </p>
                </form>
              </div>
            </div>
            <div class="row mt-3" id="thumbs">
              <div class="col-4">
                <a href="#" class="thumb">
                  <img src="admin_area/product_images/<?= $pro_img1 ?>" class="img-fluid img-thumbnail" alt="<?= $pro_title ?>">
                </a>
              </div>
              <div class="col-4">
                <a href="#" class="thumb">
                  <img src="admin_area/product_images/<?= $pro_img2 ?>" class="img-fluid img-thumbnail" alt="<?= $pro_title ?>">
                </a>
              </div>
              <div class="col-4">
                <a href="#" class="thumb">
                  <img src="admin_area/product_images/<?= $pro_img3 ?>" class="img-fluid img-thumbnail" alt="<?= $pro_title ?>">
                </a>
              </div>
            </div>
            <div id="details"></div>
          </div>
        </div>
        <div class="card px-4 py-3 mb-4" id="details">
          <div>
            <h4>Product details</h4>
            <?= $pro_desc ?>
            <h4>Size</h4>
            <ul>
              <li>Small</li>
              <li>Medium</li>
              <li>Large</li>
            </ul>
          </div>
          <hr>
        </div>
        <div class="row">
          <div class="col-md-3 col-sm-6">
            <div class="card same-height headline py-4 px-4">
              <h3 class="text-center">You also like these products</h3>
            </div>
          </div>
          <?php
          $get_products = "select * from products order by rand() LIMIT 0,3";
          $run_products = mysqli_query($conn, $get_products);
          while ($row_products = mysqli_fetch_array($run_products)) {
            $pro_id = $row_products['product_id'];
            $pro_title = $row_products['product_title'];
            $pro_price = $row_products['product_price'];
            $pro_img1 = $row_products['product_img1'];
            echo "
            <div class='col-md-3 col-sm-6'>
              <div class='product same-height'>
                <a href='details.php?product_id=$pro_id'>
                  <img src='admin_area/product_images/$pro_img1' class='img-fluid w-100' alt='$pro_title'>
                </a>
                <div class='text'>
                  <h3><a href='details.php?product_id=$pro_id'>$pro_title</a></h3>
                  <p class='price'>$$pro_price</p>
                </div>
              </div>
            </div>
            ";
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include_once 'includes/footer.php'; ?>
