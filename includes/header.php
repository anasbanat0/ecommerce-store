<?php
$activePage = basename($_SERVER['PHP_SELF'], ".php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E Commerce Store</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div id="top">
    <div class="container">
      <div class="row">
        <div class="col-md-6 offer">
          <a href="#" class="btn btn-sm">Welcome: Guest</a>
          <a href="#">Shopping Cart Total Price: $100, Total Items 2</a>
        </div>
        <div class="col-md-6">
          <ul class="menu">
            <li><a href="customer_register.php">Register</a></li>
            <li><a href="checkout.php">My Account</a></li>
            <li><a href="cart.php">Go to Cart</a></li>
            <li><a href="checkout.php">Login</a></li>
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
          <li class="nav-item <?= ($activePage == 'checkout') ? 'active' : ''; ?>">
            <a class="nav-link" href="checkout.php">My Account</a>
          </li>
          <li class="nav-item <?= ($activePage == 'cart') ? 'active' : ''; ?>">
            <a class="nav-link" href="cart.php">Shopping Cart</a>
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
          <span>4 items in cart</span>
        </a>
      </div>
    </div>
  </nav>