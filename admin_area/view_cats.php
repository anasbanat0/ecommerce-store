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
            <i class="fas fa-tachometer-alt"></i> Dashboard / View Categories
          </li>
        </ol>
      </nav>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header pb-0 pt-2">
          <h4 class="card-title">
            <i class="fas fa-money-bill"></i> View Categories
          </h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
              <thead>
                <tr>
                  <th>Category Id</th>
                  <th>Category Title</th>
                  <th>Category Description</th>
                  <th>Delete Category</th>
                  <th>Edit Category</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                $get_cats = "SELECT * FROM `categories`";
                $run_cats = mysqli_query($conn, $get_cats);
                while ($row_cats = mysqli_fetch_array($run_cats)) {
                  $cat_id = $row_cats['cat_id'];
                  $cat_title = $row_cats['cat_title'];
                  $cat_desc = $row_cats['cat_desc'];
                  $i++;
                ?>
                  <tr>
                    <td>#<?= $i ?></td>
                    <td><?= $cat_title ?></td>
                    <td width="400"><?= $cat_desc ?></td>
                    <td class="text-center">
                      <a class="btn btn-danger" href="index.php?delete_cat=<?= $cat_id ?>">
                        <i class="fas fa-trash-alt"></i> Delete
                      </a>
                    </td>
                    <td class="text-center">
                      <a class="btn btn-primary" href="index.php?edit_cat=<?= $cat_id ?>">
                        <i class="fas fa-edit"></i> Edit
                      </a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php } ?>