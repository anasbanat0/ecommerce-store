<?php
$title = "Home Page";
include 'includes/db.php';
include 'functions/functions.php';
include 'includes/header.php';
?>
<div class="container mb-4 mt-4" id="slider">
  <div class="col-md-12">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
      </ol>
      <div class="carousel-inner">
        <?php
        $get_slides = "select * from slider LIMIT 0,1";
        $run_slides = mysqli_query($conn, $get_slides);
        while ($row_slides = mysqli_fetch_array($run_slides)) {
          $slide_name = $row_slides['slide_name'];
          $slide_image = $row_slides['slide_image'];
          $slide_url = $row_slides['slide_url'];
          echo "
            <div class='carousel-item active'>
              <a href='$slide_url' target='_blank'>
                <img src='admin_area/slides_images/$slide_image' class='d-block w-100' alt='$slide_name'>
              </a>
            </div>
            ";
        }
        ?>
        <?php
        $get_slides = "select * from slider LIMIT 1,3 ";
        $run_slides = mysqli_query($conn, $get_slides);
        while ($row_slides = mysqli_fetch_array($run_slides)) {
          $slide_name = $row_slides['slide_name'];
          $slide_image = $row_slides['slide_image'];
          $slide_url = $row_slides['slide_url'];
          echo "
            <div class='carousel-item'>
              <a href='$slide_url' target='_blank'>
                <img src='admin_area/slides_images/$slide_image' class='d-block w-100' alt='$slide_name'>
              </a>
            </div>
            ";
        }
        ?>
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
<div id="advantages" class="mb-4">
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
<div id="hot" class="mb-4">
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
    <?php
    getPro();
    ?>
  </div>
</div>
<?php include 'includes/footer.php'; ?>