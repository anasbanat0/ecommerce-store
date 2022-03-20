<?php
$title = "Terms & Conditions";
include 'includes/db.php';
include 'functions/functions.php';
include 'includes/header.php';
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
            <li class="breadcrumb-item active" aria-current="page">Terms And Conditions | Refund Policy</li>
          </ul>
        </nav>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 mb-3">
        <div class="card">
          <div class="card-body">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <?php
              $get_terms = "SELECT * FROM `terms` LIMIT 0,1";
              $run_terms = mysqli_query($conn, $get_terms);
              while ($row_terms = mysqli_fetch_array($run_terms)) {
                $term_title = $row_terms['term_title'];
                $term_link = $row_terms['term_link'];
              ?>
                <a class="nav-link active" id="my_orders" data-toggle="pill" href="#<?= $term_link ?>" role="tab" aria-selected="true"><?= $term_title ?></a>
              <?php } ?>
              <?php
              $count_terms = "SELECT * FROM `terms`";
              $run_count = mysqli_query($conn, $count_terms);
              $count = mysqli_num_rows($run_count);
              $get_terms = "SELECT * FROM `terms` LIMIT 1,$count";
              $run_terms = mysqli_query($conn, $get_terms);
              while ($row_terms = mysqli_fetch_array($run_terms)) {
                $term_title = $row_terms['term_title'];
                $term_link = $row_terms['term_link'];
              ?>
                <a class="nav-link" data-toggle="pill" href="#<?= $term_link ?>" role="tab" aria-selected="false"><?= $term_title ?></a>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-9 mb-3">
        <div class="card">
          <div class="card-body">
            <div class="tab-content">
              <?php
              $get_terms = "SELECT * FROM `terms` LIMIT 0,1";
              $run_terms = mysqli_query($conn, $get_terms);
              while ($row_terms = mysqli_fetch_array($run_terms)) {
                $term_title = $row_terms['term_title'];
                $term_desc = $row_terms['term_desc'];
                $term_link = $row_terms['term_link'];
              ?>
                <div id="<?= $term_link ?>" class="tab-pane fade show active" role="tabpanel">
                  <h3><?= $term_title ?></h3>
                  <p><?= $term_desc ?></p>
                </div>
              <?php } ?>
              <?php
              $count_terms = "SELECT * FROM `terms`";
              $run_count = mysqli_query($conn, $count_terms);
              $count = mysqli_num_rows($run_count);
              $get_terms = "SELECT * FROM `terms` LIMIT 1,$count";
              $run_terms = mysqli_query($conn, $get_terms);
              while ($row_terms = mysqli_fetch_array($run_terms)) {
                $term_title = $row_terms['term_title'];
                $term_desc = $row_terms['term_desc'];
                $term_link = $row_terms['term_link'];
              ?>
                <div id="<?= $term_link ?>" class="tab-pane fade " role="tabpanel">
                  <h3><?= $term_title ?></h3>
                  <p><?= $term_desc ?></p>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include 'includes/footer.php'; ?>