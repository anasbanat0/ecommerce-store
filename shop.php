<?php
$title = "Shop";
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
            <li class="breadcrumb-item active" aria-current="page">Shop</li>
          </ul>
        </nav>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 mb-5">
        <?php include_once 'includes/sidebar.php'; ?>
      </div>
      <div class="col-md-9">
        <?php
        if (!isset($_GET['product_category'])) {
          if (!isset($_GET['category_id'])) {
            echo "
            <div class='card mb-4'>
              <div class='card-header'>
                <h2>Shop</h2>
              </div>
              <div class='card-body'>
                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using all.</p>
              </div>
            </div>
            ";
          }
        }
        ?>
        <?php
        if (!isset($_GET['product_category'])) {
          if (!isset($_GET['category_id'])) {
            $per_page = 6;
            if (isset($_GET['page'])) {
              $page = $_GET['page'];
            } else {
              $page = 1;
            }
            $start_from = ($page - 1) * $per_page;
            $get_products = "select * from products order by 1 DESC LIMIT $start_from,$per_page";
            $run_products = mysqli_query($conn, $get_products);
            echo "<div class='row'>";
            while ($row_products = mysqli_fetch_array($run_products)) {
              $pro_id = $row_products['product_id'];
              $pro_title = $row_products['product_title'];
              $pro_price = $row_products['product_price'];
              $pro_img1 = $row_products['product_img1'];
              echo "
                <div class='col-md-4 col-sm-6 d-inline-flex center-responsive'>
                  <div class='product'>
                    <a href='details.php?product_id=$pro_id'>
                      <img src='admin_area/product_images/$pro_img1' class='img-fluid' alt='$pro_title'>
                    </a>
                    <div class='text'>
                      <h3><a href='details.php?product_id=$pro_id'>$pro_title</a></h3>
                      <p class='price'>$$pro_price</p>
                      <p class='buttons row'>
                        <a href='details.php?product_id=$pro_id' class='btn btn-secondary'>View details</a>
                        <a href='details.php?product_id=$pro_id' class='btn btn-primary'>
                          <i class='fa fa-shopping-cart'></i> Add to Cart
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
                ";
            }
            echo "</div>";
        ?>
            <ul class="pagination justify-content-center">
          <?php
            $query = "select * from products";
            $result = mysqli_query($conn, $query);
            $total_records = mysqli_num_rows($result);
            $total_pages = ceil($total_records / $per_page);
            echo "<li class='page-item'><a class='page-link' href='shop.php?page=1'>" . 'First Page' . "</a></li>";
            for ($i = 1; $i <= $total_pages; $i++) {
              echo "<li class='page-item'><a class='page-link' href='shop.php?page=" . $i . "'>" . $i . "</a></li>";
            }
            echo "<li class='page-item'><a class='page-link' href='shop.php?page=$total_pages'>" . 'Last Page' . "</a></li>";
          }
        }
          ?>
            </ul>
            <?php
            getpcatpro();
            getcatpro();
            ?>
      </div>
    </div>
  </div>
</div>
<?php include_once 'includes/footer.php'; ?>
