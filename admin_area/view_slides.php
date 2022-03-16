<?php
if (!isset($_SESSION['admin_email'])) {
  echo "<script>window.open('login.php','_self')</script>";
} else {
?>

  <div class="row mt-4">
    <div class="col-lg-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            <i class="fas fa-tachometer-alt"></i> Dashboard / View Slides
          </li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header pb-0 pt-2">
          <h5 class="card-title">
            <i class="fas fa-money-bill"></i> View Slides
          </h5>
        </div>
        <div class="card-body">
          <div class="row">
            <?php
            $get_slides = "SELECT * FROM `slider`";
            $run_slides = mysqli_query($conn, $get_slides);
            while ($row_slides = mysqli_fetch_array($run_slides)) {
              $slide_id = $row_slides['slide_id'];
              $slide_name = $row_slides['slide_name'];
              $slide_image = $row_slides['slide_image'];
            ?>
              <div class="col-lg-3 col-md-3">
                <div class="card mb-3">
                  <div class="card-header bg-primary pb-0">
                    <h3 class="card-title text-center">
                      <?= $slide_name ?>
                    </h3>
                  </div>
                  <div class="card-body">
                    <img src="slides_images/<?= $slide_image ?>" class="img-fluid" alt="<?= $slide_name ?>">
                  </div>
                  <div class="card-footer text-center">
                    <a href="index.php?delete_slide=<?= $slide_id ?>" class="float-left">
                      <i class="fas fa-trash-alt"></i> Delete
                    </a>
                    <a href="index.php?edit_slide=<?= $slide_id ?>" class="float-right">
                      <i class="fas fa-edit"></i> Edit
                    </a>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php } ?>