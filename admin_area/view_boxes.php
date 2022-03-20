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
            <i class="fas fa-tachometer-alt"></i> Dashboard / View Boxes
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
            <i class="fas fa-money-bill"></i> View Boxes
          </h5>
        </div>
        <div class="card-body">
          <div class="row">
            <?php
            $get_boxes = "SELECT * FROM `boxes_section`";
            $run_boxes = mysqli_query($conn, $get_boxes);
            while ($row_boxes = mysqli_fetch_array($run_boxes)) {
              $box_id = $row_boxes['box_id'];
              $box_title = $row_boxes['box_title'];
              $box_desc = $row_boxes['box_desc'];
            ?>
              <div class="col-lg-4 col-md-4">
                <div class="card mb-2">
                  <div class="card-header pb-0 text-center bg-primary">
                    <h4 class="card-title">
                      <?= $box_title ?>
                    </h4>
                  </div>
                  <div class="card-body">
                    <?= $box_desc ?>
                  </div>
                  <div class="card-footer">
                    <a class="float-left btn btn-danger" href="index.php?delete_box=<?= $box_id ?>">
                      <i class="fas fa-trash-alt"></i> Delete
                    </a>
                    <a class="float-right btn btn-primary" href="index.php?edit_box=<?= $box_id ?>">
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