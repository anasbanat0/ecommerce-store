<?php
$db = mysqli_connect("localhost", "root", "", "ecom_store");

// IP address code starts
function getRealUserIp()
{
  switch (true) {
    case (!empty($_SERVER['HTTP_X_REAL_IP'])):
      return $_SERVER['HTTP_X_REAL_IP'];
    case (!empty($_SERVER['HTTP_CLIENT_IP'])):
      return $_SERVER['HTTP_CLIENT_IP'];
    case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])):
      return $_SERVER['HTTP_X_FORWARDED_FOR'];
    default:
      return $_SERVER['REMOTE_ADDR'];
  }
}
// IP address code Ends

function add_cart()
{
  global $db;
  if (isset($_GET['add_cart'])) {
    $ip_add = getRealUserIp();
    $p_id = $_GET['add_cart'];
    $product_qty = $_POST['product_qty'];
    $product_size = $_POST['product_size'];
    $check_product = "select * from cart where ip_add='$ip_add' AND p_id='$p_id'";
    $run_check = mysqli_query($db, $check_product);
    if (mysqli_num_rows($run_check) > 0) {
      echo "<script>alert('This Product is already added in cart')</script>";
      echo "<script>window.open('details.php?product_id=$p_id', '_self')</script>";
    } else {
      $query = "insert into cart (p_id, ip_add, qty, size) values ('$p_id', '$ip_add', '$product_qty', '$product_size')";
      $run_query = mysqli_query($db, $query);
      echo "<script>window.open('details.php?product_id=$p_id', '_self')</script>";
    }
  }
}

function items()
{
  global $db;
  $ip_add = getRealUserIp();
  $get_items = "select * from cart where ip_add='$ip_add'";
  $result = mysqli_query($db, $get_items);
  $count_items = mysqli_num_rows($result);
  echo $count_items;
}

function total_price() {
  global $db;
  $ip_add = getRealUserIp();
  $total = 0;
  $select_cart = "select * from cart where ip_add='$ip_add'";
  $run_cart = mysqli_query($db, $select_cart);
  while($record = mysqli_fetch_array($run_cart)) {
    $pro_id = $record['p_id'];
    $pro_qty = $record['qty'];
    $get_price = "select * from products where product_id='$pro_id'";
    $run_price = mysqli_query($db, $get_price);
    while($row_price = mysqli_fetch_array($run_price)) {
      $sub_total = $row_price['product_price']*$pro_qty;
      $total += $sub_total;
    }
  }
  echo "$".$total;
}

function getPro()
{
  global $db;
  $get_products = "select * from products order by 1 DESC LIMIT 0,9";
  $run_products = mysqli_query($db, $get_products);
  while ($row_products = mysqli_fetch_array($run_products)) {
    $pro_id = $row_products['product_id'];
    $pro_title = $row_products['product_title'];
    $pro_price = $row_products['product_price'];
    $pro_img1 = $row_products['product_img1'];
    echo "
      <div class='col-md-4 col-sm-6 single'>
        <div class='product'>
          <a href='details.php?product_id=$pro_id'>
            <img src='admin_area/product_images/$pro_img1' class='img-fluid'>
          </a>
          <div class='text'>
            <h3><a href='deatils.php?product_id=$pro_id'>$pro_title</a></h3>
            <p class='price'>$$pro_price</p>
            <p class='buttons'>
              <a href='details.php?product_id=$pro_id' class='btn btn-secondary'>View Details</a>
              <a href='details.php?product_id_$pro_id' class='btn btn-primary'>
              <i class='fa fa-shopping-cart'></i> Add to cart
            </a>
            </p>
          </div>
        </div>
      </div>
      ";
  }
}

function getPCats()
{
  global $db;
  $get_p_cats = "select * from product_categories";
  $run_p_cats = mysqli_query($db, $get_p_cats);
  while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {
    $p_cat_id = $row_p_cats['p_cat_id'];
    $p_cat_title = $row_p_cats['p_cat_title'];
    echo "<li class='nav-item'><a class='nav-link' href='shop.php?product_category=$p_cat_id'>$p_cat_title</a></li>";
  }
}
function getCats()
{
  global $db;
  $get_cats = "select * from categories";
  $run_cats = mysqli_query($db, $get_cats);
  while ($row_cats = mysqli_fetch_array($run_cats)) {
    $cat_id = $row_cats['cat_id'];
    $cat_title = $row_cats['cat_title'];
    echo "<li class='nav-item'><a class='nav-link' href='shop.php?category_id=$cat_id'>$cat_title</a></li>";
  }
}

function getpcatpro()
{
  global $db;
  if (isset($_GET['product_category'])) {
    $p_cat_id = $_GET['product_category'];
    $get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";
    $run_p_cat = mysqli_query($db, $get_p_cat);
    $row_p_cat = mysqli_fetch_array($run_p_cat);
    $p_cat_title = $row_p_cat['p_cat_title'];
    $p_cat_desc = $row_p_cat['p_cat_desc'];
    $get_products = "select * from products where p_cat_id='$p_cat_id'";
    $run_products = mysqli_query($db, $get_products);
    $count = mysqli_num_rows($run_products);
    if ($count == 0) {
      echo "
      <div class='card mb-4'>
        <div class='card-header'>
          <h2>No Products Found In This Product Category</h2>
        </div>
      </div>
      ";
    } else {
      echo "
      <div class='card mb-4'>
        <div class='card-header'>
          <h2>$p_cat_title</h2>
        </div>
        <div class='card-body'>
          <p>$p_cat_desc</p>
        </div>
      </div>
      ";
    }
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
  }
}

function getcatpro()
{
  global $db;
  if (isset($_GET['category_id'])) {
    $cat_id = $_GET['category_id'];
    $get_cat = "select * from categories where cat_id='$cat_id'";
    $run_cat = mysqli_query($db, $get_cat);
    $row_cat = mysqli_fetch_array($run_cat);
    $cat_title = $row_cat['cat_title'];
    $cat_desc = $row_cat['cat_desc'];
    $get_products = "select * from products where cat_id='$cat_id'";
    $run_products = mysqli_query($db, $get_products);
    $count = mysqli_num_rows($run_products);
    if ($count == 0) {
      echo
      "
      <div class='card mb-4'>
        <div class='card-header'>
          <h2>No Products Found In This Category</h2>
        </div>
      </div>
      ";
    } else {
      echo "
      <div class='card mb-4'>
        <div class='card-header'>
          <h2>$cat_title</h2>
        </div>
        <div class='card-body'>
          <p>$cat_desc</p>
        </div>
      </div>
      ";
    }
    echo "<div class='row'>";
    while ($row_products = mysqli_fetch_array($run_products)) {
      $pro_id = $row_products['product_id'];
      $pro_title = $row_products['product_title'];
      $pro_price = $row_products['product_price'];
      $pro_desc = $row_products['product_desc'];
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
  }
}
