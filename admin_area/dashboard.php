<?php
if (!isset($_SESSION['admin_email'])) {
  echo "<script>window.open('login.php','_self')</script>";
} else {
?>
<div class="row">
  <div class="col-lg-12">
    <h1 class="pt-5 pb-3">Dashboard</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
          <i class="fas fa-tachometer-alt"></i> Dashboard
        </li>
      </ol>
    </nav>
  </div>
</div>
<div class="row">
  <div class="col-lg-3 col-md-6">
    <div class="card ">
      <div class="card-header bg-primary">
        <div class="row">
          <div class="col-3">
            <div class="fa fa-tasks fa-5x"></div>
          </div>
          <div class="col-9 text-right">
            <div class="huge"><?= $count_products ?></div>
            <div>Products</div>
          </div>
        </div>
      </div>
      <a href="index.php?view_products">
        <div class="card-footer">
          <span class="float-left">View Details</span>
          <span class="float-right"><i class="fa fa-arrow-circle-right"></i></span>
          <div class="clearfix"></div>
        </div>
      </a>
    </div>
  </div>
  <div class="col-lg-3 col-md-6">
    <div class="card">
      <div class="card-header bg-success">
        <div class="row">
          <div class="col-3">
            <div class="fa fa-comments fa-5x"></div>
          </div>
          <div class="col-9 text-right">
            <div class="huge"><?= $count_customers ?></div>
            <div>Customers</div>
          </div>
        </div>
      </div>
      <a href="index.php?view_customers">
        <div class="card-footer">
          <span class="float-left">View Details</span>
          <span class="float-right"><i class="fa fa-arrow-circle-right"></i></span>
          <div class="clearfix"></div>
        </div>
      </a>
    </div>
  </div>
  <div class="col-lg-3 col-md-6">
    <div class="card ">
      <div class="card-header bg-warning">
        <div class="row">
          <div class="col-3">
            <div class="fa fa-shopping-cart fa-5x"></div>
          </div>
          <div class="col-9 text-right">
            <div class="huge"><?= $count_p_categories ?></div>
            <div>Products Categories</div>
          </div>
        </div>
      </div>
      <a href="index.php?view_p_cats">
        <div class="card-footer">
          <span class="float-left">View Details</span>
          <span class="float-right"><i class="fa fa-arrow-circle-right"></i></span>
          <div class="clearfix"></div>
        </div>
      </a>
    </div>
  </div>
  <div class="col-lg-3 col-md-6">
    <div class="card ">
      <div class="card-header bg-danger">
        <div class="row">
          <div class="col-3">
            <div class="fas fa-life-ring fa-5x"></div>
          </div>
          <div class="col-9 text-right">
            <div class="huge"><?= $count_pending_orders ?></div>
            <div>Orders</div>
          </div>
        </div>
      </div>
      <a href="index.php?view_orders">
        <div class="card-footer">
          <span class="float-left">View Details</span>
          <span class="float-right"><i class="fa fa-arrow-circle-right"></i></span>
          <div class="clearfix"></div>
        </div>
      </a>
    </div>
  </div>
</div>
<div class="row my-4">
  <div class="col-lg-8">
    <div class="card">
      <div class="card-header pb-0 bg-primary">
        <h4 class="card-title text-white">
          <i class="fas fa-money-bill"></i> New Orders
        </h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-hover table-striped">
            <thead>
              <tr>
                <th>Order No:</th>
                <th>Customer Email:</th>
                <th>Invoice No:</th>
                <th>Product ID:</th>
                <th>Product Qty:</th>
                <th>Product Size</th>
                <th>Status:</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i = 0;
              $get_order = "SELECT * FROM pending_orders order by 1 DESC LIMIT 0,5";
              $run_order = mysqli_query($conn, $get_order);
              while ($row_order = mysqli_fetch_array($run_order)) {
                $order_id = $row_order['order_id'];
                $c_id = $row_order['customer_id'];
                $invoice_no = $row_order['invoice_no'];
                $product_id = $row_order['product_id'];
                $qty = $row_order['qty'];
                $size = $row_order['size'];
                $order_status = $row_order['order_status'];
                $i++;
              ?>
                <tr>
                  <th>#<?= $i ?></th>
                  <td>
                    <?php
                    $get_customer = "SELECT * FROM customers where customer_id='$c_id'";
                    $run_customer = mysqli_query($conn, $get_customer);
                    $row_customer = mysqli_fetch_array($run_customer);
                    $customer_email = $row_customer['customer_email'];
                    echo $customer_email;
                    ?>
                  </td>
                  <td><?= $invoice_no ?></td>
                  <td><?= $product_id ?></td>
                  <td><?= $qty ?></td>
                  <td><?= $size ?></td>
                  <td>
                    <?php
                    if ($order_status == 'pending') {
                      echo $order_status = 'pending';
                    } else {
                      echo $order_status = 'Complete';
                    }
                    ?>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <div class="text-right">
          <a href="index.php?view_orders">
            View All Orders <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card">
      <div class="card-body">
        <div class="thumb-info mb-md">
          <img src="admin_images/<?= $admin_image ?>" class="rounded img-fluid" alt="">
          <div class="thumb-info-title">
            <span class="thumb-info-inner"><?= $admin_name ?></span>
            <span class="thumb-info-type"><?= $admin_job ?></span>
          </div>
        </div>
        <div class="mb-md">
          <div class="widget-content-expanded">
            <i class="fa fa-user"></i> <span>Email: </span> <?= $admin_email ?><br>
            <i class="fa fa-user"></i> <span>Country: </span> <?= $admin_country ?><br>
            <i class="fa fa-user"></i> <span>Contact: </span> <?= $admin_contact ?>
          </div>
          <hr class="dotted short">
          <h5 class="text-muted">About</h5>
          <p><?= $admin_about ?></p>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>