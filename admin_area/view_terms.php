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
            <i class="fas fa-tachometer-alt"></i> Dashboard / View Terms
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
            <i class="fas fa-money-bill"></i> View Terms
          </h5>
        </div>
        <div class="card-body">
          <div class="row">
            <?php
            $get_terms = "SELECT * FROM `terms`";
            $run_terms = mysqli_query($conn, $get_terms);
            while ($row_terms = mysqli_fetch_array($run_terms)) {
              $term_id = $row_terms['term_id'];
              $term_title = $row_terms['term_title'];
              $term_desc = substr($row_terms['term_desc'], 0, 400);
            ?>
              <div class="col-lg-4 col-md-4">
                <div class="card mb-4">
                  <div class="card-header text-center bg-primary">
                    <h4 class="card-title">
                      <?= $term_title ?>
                    </h4>
                  </div>
                  <div class="card-body">
                    <?= $term_desc ?>
                  </div>
                  <div class="card-footer">
                    <a class="float-left btn btn-danger" href="index.php?delete_term=<?= $term_id ?>">
                      <i class="fas fa-trash-alt"></i> Delete
                    </a>
                    <a class="float-right btn btn-primary" href="index.php?edit_term=<?= $term_id ?>">
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