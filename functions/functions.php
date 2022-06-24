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

function total_price()
{
  global $db;
  $ip_add = getRealUserIp();
  $total = 0;
  $select_cart = "select * from cart where ip_add='$ip_add'";
  $run_cart = mysqli_query($db, $select_cart);
  while ($record = mysqli_fetch_array($run_cart)) {
    $pro_id = $record['p_id'];
    $pro_qty = $record['qty'];
    $get_price = "select * from products where product_id='$pro_id'";
    $run_price = mysqli_query($db, $get_price);
    while ($row_price = mysqli_fetch_array($run_price)) {
      $sub_total = $row_price['product_price'] * $pro_qty;
      $total += $sub_total;
    }
  }
  echo "$" . $total;
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

// getProducts Function Start
function getProducts()
{
  global $db;
  $aWhere = array();
  /// Manufacturers Code Starts ///
  if (isset($_REQUEST['man']) && is_array($_REQUEST['man'])) {
    foreach ($_REQUEST['man'] as $sKey => $sVal) {
      if ((int)$sVal != 0) {
        $aWhere[] = 'manufacturer_id=' . (int)$sVal;
      }
    }
  }
  /// Manufacturers Code Ends ///
  /// Products Categories Code Starts ///
  if (isset($_REQUEST['p_cat']) && is_array($_REQUEST['p_cat'])) {
    foreach ($_REQUEST['p_cat'] as $sKey => $sVal) {
      if ((int)$sVal != 0) {
        $aWhere[] = 'p_cat_id=' . (int)$sVal;
      }
    }
  }
  /// Products Categories Code Ends ///
  /// Categories Code Starts ///
  if (isset($_REQUEST['cat']) && is_array($_REQUEST['cat'])) {
    foreach ($_REQUEST['cat'] as $sKey => $sVal) {
      if ((int)$sVal != 0) {
        $aWhere[] = 'cat_id=' . (int)$sVal;
      }
    }
  }
  /// Categories Code Ends ///
  $per_page = 6;
  if (isset($_GET['page'])) {
    $page = $_GET['page'];
  } else {
    $page = 1;
  }
  $start_from = ($page - 1) * $per_page;
  $sLimit = " order by 1 DESC LIMIT $start_from,$per_page";
  $sWhere = (count($aWhere) > 0 ? ' WHERE ' . implode(' or ', $aWhere) : '') . $sLimit;
  $get_products = "select * from products  " . $sWhere;
  $run_products = mysqli_query($db, $get_products);
  echo "<div class='row'>";
  while ($row_products = mysqli_fetch_array($run_products)) {
    $pro_id = $row_products['product_id'];
    $pro_title = $row_products['product_title'];
    $pro_price = $row_products['product_price'];
    $pro_img1 = $row_products['product_img1'];
    echo "
      <div class='col-md-4 col-sm-6 d-inline-flex center-responsive' >
        <div class='product' >
          <a href='details.php?pro_id=$pro_id' >
            <img src='admin_area/product_images/$pro_img1' class='img-fluid' alt='$pro_title' >
          </a>
          <div class='text' >
            <h3><a href='details.php?product_id=$pro_id'>$pro_title</a></h3>
            <p class='price' > $$pro_price </p>
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
// getProducts Function End


// getPaginator Function Start
function getPaginator()
{
  $per_page = 6;
  global $db;
  $aWhere = array();
  $aPath = '';
  /// Manufacturers Code Starts ///
  if (isset($_REQUEST['man']) && is_array($_REQUEST['man'])) {
    foreach ($_REQUEST['man'] as $sKey => $sVal) {
      if ((int)$sVal != 0) {
        $aWhere[] = 'manufacturer_id=' . (int)$sVal;
        $aPath .= 'man[]=' . (int)$sVal . '&';
      }
    }
  }
  /// Manufacturers Code Ends ///
  /// Products Categories Code Starts ///
  if (isset($_REQUEST['p_cat']) && is_array($_REQUEST['p_cat'])) {
    foreach ($_REQUEST['p_cat'] as $sKey => $sVal) {
      if ((int)$sVal != 0) {
        $aWhere[] = 'p_cat_id=' . (int)$sVal;
        $aPath .= 'p_cat[]=' . (int)$sVal . '&';
      }
    }
  }
  /// Products Categories Code Ends ///
  /// Categories Code Starts ///
  if (isset($_REQUEST['cat']) && is_array($_REQUEST['cat'])) {
    foreach ($_REQUEST['cat'] as $sKey => $sVal) {
      if ((int)$sVal != 0) {
        $aWhere[] = 'cat_id=' . (int)$sVal;
        $aPath .= 'cat[]=' . (int)$sVal . '&';
      }
    }
  }
  /// Categories Code Ends ///
  $sWhere = (count($aWhere) > 0 ? ' WHERE ' . implode(' or ', $aWhere) : '');
  $query = "select * from products " . $sWhere;
  $result = mysqli_query($db, $query);
  $total_records = mysqli_num_rows($result);
  $total_pages = ceil($total_records / $per_page);
  echo "<li class='page-item'><a class='page-link' href='shop.php?page=1";
  if (!empty($aPath)) {
    echo "&" . $aPath;
  }
  echo "' >" . 'First Page' . "</a></li>";
  for ($i = 1; $i <= $total_pages; $i++) {
    echo "<li class='page-item'><a class='page-link' href='shop.php?page=" . $i . (!empty($aPath) ? '&' . $aPath : '') . "' >" . $i . "</a></li>";
  };
  echo "<li class='page-item'><a class='page-link' href='shop.php?page=$total_pages";
  if (!empty($aPath)) {
    echo "&" . $aPath;
  }
  echo "' >" . 'Last Page' . "</a></li>";
}
// getPaginator Function End