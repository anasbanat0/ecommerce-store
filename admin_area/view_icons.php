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
            <i class="fas fa-tachometer-alt"></i> Dashboard / View Icons
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
            <i class="fas fa-money-bill"></i> View Icons
          </h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
              <thead>
                <tr>
                  <th>Icon ID</th>
                  <th>Icon Title</th>
                  <th>Product Icon</th>
                  <th>Icon Image</th>
                  <th>Delete Icon</th>
                  <th>Edit Icon</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                $get_icons = "SELECT * FROM `icons`";
                $run_icons = mysqli_query($conn, $get_icons);
                while ($row_icons = mysqli_fetch_array($run_icons)) {
                  $icon_id = $row_icons['icon_id'];
                  $product_id = $row_icons['icon_product'];
                  $icon_title = $row_icons['icon_title'];
                  $icon_image = $row_icons['icon_image'];
                  $get_p = "SELECT * FROM `products` WHERE `product_id`='$product_id'";
                  $run_p = mysqli_query($conn, $get_p);
                  $row_p = mysqli_fetch_array($run_p);
                  $p_title = $row_p['product_title'];
                  $i++;
                ?>
                  <tr>
                    <th>#<?= $i ?></th>
                    <td><?= $icon_title ?></td>
                    <td><?= $p_title ?></td>
                    <td>
                      <img src="icon_images/<?= $icon_image ?>" alt="<?= $icon_title ?>" width="50">
                    </td>
                    <td class="text-center">
                      <a class="btn btn-danger" href="index.php?delete_icon=<?= $icon_id ?>">
                        <i class="fas fa-trash-alt fa-sm"></i> Delete
                      </a>
                    </td>
                    <td class="text-center">
                      <a class="btn btn-primary" href="index.php?edit_icon=<?= $icon_id ?>">
                        <i class="fas fa-edit fa-sm"></i> Edit
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