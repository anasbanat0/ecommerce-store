<?php
if (!isset($_SESSION['admin_email'])) {
  echo "<script>
  window.open('login.php', '_self')
</script>";
} else {
?>
  <div class="row mt-4">
    <div class="col-lg-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            <i class="fas fa-tachometer-alt"></i> Dashboard / View Products Categories
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
            <i class="fas fa-money-bill"></i> View Products Categories
          </h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
              <thead>
                <tr>
                  <th>Product Category Id</th>
                  <th>Product Category Title</th>
                  <th>Product Category Description</th>
                  <th>Delete Product Category</th>
                  <th>Edit Product Category</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                $get_p_cats = "SELECT * FROM product_categories";
                $run_p_cats = mysqli_query($conn, $get_p_cats);
                while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {
                  $p_cat_id = $row_p_cats['p_cat_id'];
                  $p_cat_title = $row_p_cats['p_cat_title'];
                  $p_cat_desc = $row_p_cats['p_cat_desc'];
                  $i++;
                ?>
                  <tr>
                    <th>#<?= $i ?></th>
                    <td><?= $p_cat_title ?></td>
                    <td width="400"><?= $p_cat_desc ?></td>
                    <td class="text-center">
                      <a class="btn btn-danger" href="index.php?delete_p_cat=<?= $p_cat_id ?>">
                        <i class="fas fa-trash-alt"></i> Delete
                      </a>
                    </td>
                    <td class="text-center">
                      <a class="btn btn-primary" href="index.php?edit_p_cat=<?= $p_cat_id ?>">
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