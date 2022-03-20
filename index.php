<?php
$title = "Home Page";
include 'includes/db.php';
include 'functions/functions.php';
include 'includes/header.php';
?>
<div class="container mb-4 mt-4" id="slider">
  <div class="row">
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
</div>
<div id="advantages" class="mb-0">
  <div class="container">
    <div class="row">
      <?php
      $get_boxes = "SELECT * FROM `boxes_section`";
      $run_boxes = mysqli_query($conn, $get_boxes);
      while ($run_boxes_section = mysqli_fetch_array($run_boxes)) {
        $box_id = $run_boxes_section['box_id'];
        $box_title = $run_boxes_section['box_title'];
        $box_desc = $run_boxes_section['box_desc'];
      ?>
        <div class="col-sm-4">
          <div class="card mb-4">
            <div class="icon">
              <i class="fa fa-heart"></i>
            </div>
            <div class="card-body">
              <h3 class="card-title"><a href="#"><?= $box_title ?></a></h3>
              <p class="card-text"><?= $box_desc ?></p>
            </div>
          </div>
        </div>
      <?php } ?>
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