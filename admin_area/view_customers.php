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
            <i class="fas fa-tachometer-alt"></i> Dashboard / View Customers
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
            <i class="fas fa-money-bill"></i> View Customers
          </h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
              <thead>
                <tr>
                  <th>Customer No:</th>
                  <th>Customer Name:</th>
                  <th>Customer Email:</th>
                  <th>Customer Image:</th>
                  <th>Customer Country:</th>
                  <th>Customer City:</th>
                  <th>Customer Phone No:</th>
                  <th>Customer Delete:</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                $get_c = "SELECT * FROM `customers`";
                $run_c = mysqli_query($conn, $get_c);
                while ($row_c = mysqli_fetch_array($run_c)) {
                  $c_id = $row_c['customer_id'];
                  $c_name = $row_c['customer_name'];
                  $c_email = $row_c['customer_email'];
                  $c_image = $row_c['customer_image'];
                  $c_country = $row_c['customer_country'];
                  $c_city = $row_c['customer_city'];
                  $c_contact = $row_c['customer_contact'];
                  $i++;
                ?>
                  <tr>
                    <th>#<?= $i ?></th>
                    <td><?= $c_name ?></td>
                    <td><?= $c_email ?></td>
                    <td class="text-center"><img src="../customer/customer_images/<?= $c_image ?>" width="70" alt="<?= $c_name ?>"></td>
                    <td><?= $c_country ?></td>
                    <td><?= $c_city ?></td>
                    <td><?= $c_contact ?></td>
                    <td class="text-center">
                      <a class="btn btn-danger" href="index.php?customer_delete=<?= $c_id ?>">
                        <i class="fas fa-trash-alt fa-sm"></i> Delete
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