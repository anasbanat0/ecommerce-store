<?php
$title = "About Us";
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
            <li class="breadcrumb-item active" aria-current="page">About Us</li>
          </ul>
        </nav>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card mb-4">
          <div class="card-body">
            <?php
            $get_about_us = "SELECT * FROM `about_us`";
            $run_about_us = mysqli_query($conn, $get_about_us);
            $row_about_us = mysqli_fetch_array($run_about_us);
            $about_heading = $row_about_us['about_heading'];
            $about_short_desc = $row_about_us['about_short_desc'];
            $about_desc = $row_about_us['about_desc'];
            ?>
            <h2><?= $about_heading ?></h2>
            <p class="lead"><?= $about_short_desc ?></p>
            <p><?= $about_desc ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include_once 'includes/footer.php'; ?>