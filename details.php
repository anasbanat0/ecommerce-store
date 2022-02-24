<?php include_once 'includes/header.php'; ?>
<div id="content">
  <div class="container">
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
    
    <div class="row">
      <div class="col-md-3 mb-5">
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
                      <img class="img-fluid" src="admin_area/product_images/03.jpg" alt="">
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="justify-content-center">
                      <img class="img-fluid" src="admin_area/product_images/04.jpg" alt="">
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="justify-content-center">
                      <img class="img-fluid" src="admin_area/product_images/05.jpg" alt="">
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
              <div class="card-header">
                <h2 class="text-center">Marvel black kids polo t-shirt</h2>
              </div>
              <div class="card-body">
                <form action="details.php" method="post">
                  <div class="form-group row">
                    <label for="" class="col-md-5 col-form-label">Product Quantity</label>
                    <div class="col-md-7">
                      <select name="product_qty" class="form-control" id="">
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                        <option value="">4</option>
                        <option value="">5</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-md-5 col-form-label">Product Size</label>
                    <div class="col-md-7">
                      <select name="product_size" class="form-control" id="">
                        <option value="">Select a size</option>
                        <option value="">Small</option>
                        <option value="">Medium</option>
                        <option value="">Large</option>
                      </select>
                    </div>
                  </div>
                  <p class="price">$50</p>
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
                  <img src="admin_area/product_images/03.jpg" class="img-fluid img-thumbnail" alt="">
                </a>
              </div>
              <div class="col-4">
                <a href="#" class="thumb">
                  <img src="admin_area/product_images/04.jpg" class="img-fluid img-thumbnail" alt="">
                </a>
              </div>
              <div class="col-4">
                <a href="#" class="thumb">
                  <img src="admin_area/product_images/05.jpg" class="img-fluid img-thumbnail" alt="">
                </a>
              </div>
            </div>
            <div id="details"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include_once 'includes/footer.php'; ?>
