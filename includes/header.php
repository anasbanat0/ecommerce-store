<?php
session_start();
$activePage = basename($_SERVER['PHP_SELF'], ".php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E Commerce Store | <?= $title ?></title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://cdn.tiny.cloud/1/uy676ru9e2040docpmggweipgvsxkbtehmiqwwqc9yhi9fq7/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'advlist autolink lists link image charmap preview anchor pagebreak',
      toolbar_mode: 'floating',
    });
  </script>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
  <div id="top">
    <div class="container">
      <div class="row">
        <div class="col-md-6 offer">
          <a href="#" class="btn btn-sm">
            <?php
            if (!isset($_SESSION['customer_email'])) {
              echo "Welcome: Guest";
            } else {
              echo "Welcome: " . $_SESSION['customer_email'];
            }
            ?>
          </a>
          <a href="#">Shopping Cart Total Price: <?php total_price() ?>, Total Items <?php items(); ?></a>
        </div>
        <div class="col-md-6">
          <ul class="menu">
            <li>
              <?php
              if (!isset($_SESSION['customer_email'])) {
                echo "<a href='customer_register.php'>Register</a>";
              } else {
                echo "<a href='shop.php'>Shop</a>";
              }
              ?>
            </li>
            <li>
              <?php
              if (!isset($_SESSION['customer_email'])) {
                echo "<a href='checkout.php'>My Account</a>";
              } else {
                echo "<a href='customer/account.php?my_orders'>My Account</a>";
              }
              ?>
            </li>
            <li><a href="cart.php">Go to Cart</a></li>
            <li>
              <?php
              if (!isset($_SESSION['customer_email'])) {
                echo "<a href='checkout.php'>Login</a>";
              } else {
                echo "<a href='logout.php'>Logout</a>";
              }
              ?>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" style="display: flex;" href="index.php">
        <img class="img-fluid d-none d-sm-block" width="50px" src="images/logo.png" alt="Icon">
        <img class="img-fluid d-sm-none" width="30px" src="images/logo_small.png" alt="Icon">
        <span style="padding: 0.5rem; line-height: 35px">Multi-vendor</span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item <?= ($activePage == 'index') ? 'active' : ''; ?>">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item <?= ($activePage == 'shop') ? 'active' : ''; ?>">
            <a class="nav-link" href="shop.php">Shop</a>
          </li>
          <li class="nav-item <?= ($activePage == 'account') ? 'active' : ''; ?>">
            <?php
            if (!isset($_SESSION['customer_email'])) {
              echo "<a class='nav-link' href='checkout.php'>My Account</a>";
            } else {
              echo "<a class='nav-link' href='customer/account.php?my_orders'>My Account</a>";
            }
            ?>
          </li>
          <li class="nav-item <?= ($activePage == 'cart') ? 'active' : ''; ?>">
            <a class="nav-link" href="cart.php">Shopping Cart</a>
          </li>
          <li class="nav-item <?= ($activePage == 'about') ? 'active' : ''; ?>">
            <a class="nav-link" href="about.php">About Us</a>
          </li>
          <li class="nav-item <?= ($activePage == 'services') ? 'active' : ''; ?>">
            <a class="nav-link" href="services.php">Services</a>
          </li>
          <li class="nav-item <?= ($activePage == 'contact') ? 'active' : ''; ?>">
            <a class="nav-link" href="contact.php">Contact Us</a>
          </li>
        </ul>
        <form method="get" action="results.php" class="form-inline my-2 my-lg-0 mr-sm-3">
          <input class="form-control" type="search" placeholder="Search" name="user_query" required aria-label="Search">
          <button class="btn btn-primary my-2 my-sm-0" type="submit" value="search" name="search"><i class="fa fa-search"></i></button>
        </form>
        <a class="btn btn-primary navbar-btn float-right" href="cart.php">
          <i class="fa fa-shopping-cart"></i>
          <span><?php items(); ?> items in cart</span>
        </a>
      </div>
    </div>
  </nav>