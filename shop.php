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
        <div class='card mb-4'>
          <div class='card-header'>
            <h2>Shop</h2>
          </div>
          <div class='card-body'>
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using all.</p>
          </div>
        </div>
        <div class="flex-wrap" id="Products">
          <?php getProducts(); ?>
        </div>
        <ul class="pagination justify-content-center">
          <?php getPaginator(); ?>
        </ul>
      </div>
      <div id="wait" style="position:absolute;top:20%;left:25%;padding:100px;padding-top:100px">
      </div>
    </div>
  </div>
</div>
<?php include_once 'includes/footer.php'; ?>