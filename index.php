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
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="shop.php">Shop</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="checkout.php">My Account</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cart.php">Shopping Cart</a>
          </li>
          <li class="nav-item">
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
  <div class="container mb-5 mt-4" id="slider">
    <div class="col-md-12">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
          <li data-target="#myCarousel" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="admin_area/slides_images/digitization.jpg" class="d-block w-100" alt="Skoda Car">
          </div>
          <div class="carousel-item">
            <img src="admin_area/slides_images/office.jpg" class="d-block w-100" alt="Skoda Car">
          </div>
          <div class="carousel-item">
            <img src="admin_area/slides_images/business.jpg" class="d-block w-100" alt="Skoda Car">
          </div>
          <div class="carousel-item">
            <img src="admin_area/slides_images/binary.jpg" class="d-block w-100" alt="Skoda Car">
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
  <div id="advantages" class="mb-5">
    <div class="container">
      <div class="row">
        <div class="col-sm-4">
          <div class="card">
            <div class="icon">
              <i class="fa fa-heart"></i>
            </div>
            <div class="card-body">
              <h3 class="card-title"><a href="#">WE LOVE OUR CUSTOMERS</a></h3>
              <p class="card-text">We are known to provide best possible service ever.</p>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card">
            <div class="icon">
              <i class="fa fa-tags"></i>
            </div>
            <div class="card-body">
              <h3 class="card-title"><a href="#">BEST PRICES</a></h3>
              <p class="card-text">You can check on all others sites about the orice and then compare with us.</p>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card">
            <div class="icon">
              <i class="fa fa-thumbs-up"></i>
            </div>
            <div class="card-body">
              <h3 class="card-title"><a href="#">100% SATISFACTION GUARANTEED</a></h3>
              <p class="card-text">Free returns on everything for 3 months.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="hot" class="mb-5">
    <div class="card">
      <div class="container">
        <div class="col-md-12">
          <h2>Latest this week</h2>
        </div>
      </div>
    </div>
  </div>
  <div id="content" class="container">
    <div class="row">
      <div class="col-sm-4 single">
        <div class="product">
          <a href="details.php">
            <img src="admin_area/product_images/05.jpg" class="w-100 img-thumbnail" alt="T-Shirt Product">
          </a>
          <div class="text">
            <h3><a href="details.php">Marvel Black Kids POLO T-Shirt</a></h3>
            <p class="price">$50</p>
            <p class="buttons">
              <a href="details.php" class="btn btn-secondary">View Details</a>
              <a href="details.php" class="btn btn-primary">
                <i class="fa fa-shopping-cart"></i> Add to cart
              </a>
            </p>
          </div>
        </div>
      </div>
      <div class="col-sm-4 single">
        <div class="product">
          <a href="details.php">
            <img src="admin_area/product_images/05.jpg" class="w-100 img-thumbnail" alt="T-Shirt Product">
          </a>
          <div class="text">
            <h3><a href="details.php">Marvel Black Kids POLO T-Shirt</a></h3>
            <p class="price">$50</p>
            <p class="buttons">
              <a href="details.php" class="btn btn-secondary">View Details</a>
              <a href="details.php" class="btn btn-primary">
                <i class="fa fa-shopping-cart"></i> Add to cart
              </a>
            </p>
          </div>
        </div>
      </div>
      <div class="col-sm-4 single">
        <div class="product">
          <a href="details.php">
            <img src="admin_area/product_images/05.jpg" class="w-100 img-thumbnail" alt="T-Shirt Product">
          </a>
          <div class="text">
            <h3><a href="details.php">Marvel Black Kids POLO T-Shirt</a></h3>
            <p class="price">$50</p>
            <p class="buttons">
              <a href="details.php" class="btn btn-secondary">View Details</a>
              <a href="details.php" class="btn btn-primary">
                <i class="fa fa-shopping-cart"></i> Add to cart
              </a>
            </p>
          </div>
        </div>
      </div>
      <div class="col-sm-4 single">
        <div class="product">
          <a href="details.php">
            <img src="admin_area/product_images/05.jpg" class="w-100 img-thumbnail" alt="T-Shirt Product">
          </a>
          <div class="text">
            <h3><a href="details.php">Marvel Black Kids POLO T-Shirt</a></h3>
            <p class="price">$50</p>
            <p class="buttons">
              <a href="details.php" class="btn btn-secondary">View Details</a>
              <a href="details.php" class="btn btn-primary">
                <i class="fa fa-shopping-cart"></i> Add to cart
              </a>
            </p>
          </div>
        </div>
      </div>
      <div class="col-sm-4 single">
        <div class="product">
          <a href="details.php">
            <img src="admin_area/product_images/05.jpg" class="w-100 img-thumbnail" alt="T-Shirt Product">
          </a>
          <div class="text">
            <h3><a href="details.php">Marvel Black Kids POLO T-Shirt</a></h3>
            <p class="price">$50</p>
            <p class="buttons">
              <a href="details.php" class="btn btn-secondary">View Details</a>
              <a href="details.php" class="btn btn-primary">
                <i class="fa fa-shopping-cart"></i> Add to cart
              </a>
            </p>
          </div>
        </div>
      </div>
      <div class="col-sm-4 single">
        <div class="product">
          <a href="details.php">
            <img src="admin_area/product_images/05.jpg" class="w-100 img-thumbnail" alt="T-Shirt Product">
          </a>
          <div class="text">
            <h3><a href="details.php">Marvel Black Kids POLO T-Shirt</a></h3>
            <p class="price">$50</p>
            <p class="buttons">
              <a href="details.php" class="btn btn-secondary">View Details</a>
              <a href="details.php" class="btn btn-primary">
                <i class="fa fa-shopping-cart"></i> Add to cart
              </a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>