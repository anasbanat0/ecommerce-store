<?php
include 'includes/db.php';
include 'functions/functions.php';
include_once 'includes/header.php';
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
            <li class="breadcrumb-item active" aria-current="page">Search Result</li>
          </ul>
        </nav>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div id="Products">
          <?php
          if (isset($_GET['search'])) {
            $user_keyword = $_GET['user_query'];
            $get_products = "select * from products where product_keywords like '%$user_keyword%'";
            $run_products = mysqli_query($conn, $get_products);
            $count = mysqli_num_rows($run_products);
            if ($count == 0) {
              echo "
                <div class='card mb-4'>
                  <div class='card-body'>
                    <h2>No Search Results Found <span style='color:red'>$user_keyword</span></h2>
                  </div>
                </div>
              ";
            } else {
              echo "<div class='row'>";
              while ($row_products = mysqli_fetch_array($run_products)) {
                $pro_id = $row_products['product_id'];
                $pro_title = $row_products['product_title'];
                $pro_price = $row_products['product_price'];
                $pro_img1 = $row_products['product_img1'];
                $pro_label = $row_products['product_label'];
                $manufacturer_id = $row_products['manufacturer_id'];
                $get_manufacturer = "select * from manufacturers where manufacturer_id='$manufacturer_id'";
                $run_manufacturer = mysqli_query($conn, $get_manufacturer);
                $row_manufacturer = mysqli_fetch_array($run_manufacturer);
                $manufacturer_name = $row_manufacturer['manufacturer_title'];
                $pro_psp_price = $row_products['product_psp_price'];
                $pro_url = $row_products['product_url'];
                if ($pro_label == "Sale" or $pro_label == "Gift") {
                  $product_price = "<del> $$pro_price </del>";
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
                      <div class='label-background'> </div>
                    </a>
                  ";
                }
                echo "
                  <div class='col-md-3 col-sm-6 center-responsive' >
                    <div class='product' >
                      <a href='$pro_url' >
                        <img src='admin_area/product_images/$pro_img1' class='img-fluid' >
                      </a>
                      <div class='text' >
                        <center>
                          <p class='btn btn-primary'>Manufacturer: $manufacturer_name </p>
                        </center>
                        <hr>
                        <h3><a href='$pro_url' >$pro_title</a></h3>
                        <p class='price' > $product_price $product_psp_price </p>
                        <p class='buttons' >
                          <a href='$pro_url' class='btn btn-secondary' >View details</a>
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
            echo "</div>";
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include_once 'includes/footer.php'; ?>