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
            <i class="fas fa-tachometer-alt"></i> Dashboard / View Orders
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
            <i class="fas fa-money-bill"></i> View Orders
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
                  <th>Product Title:</th>
                  <th>Product Qty:</th>
                  <th>Product Size:</th>
                  <th>Order Date:</th>
                  <th>Total Amount:</th>
                  <th>Order Status:</th>
                  <th>Delete Order:</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                $get_orders = "SELECT * FROM `pending_orders`";
                $run_orders = mysqli_query($conn, $get_orders);
                while ($row_orders = mysqli_fetch_array($run_orders)) {
                  $order_id = $row_orders['order_id'];
                  $c_id = $row_orders['customer_id'];
                  $invoice_no = $row_orders['invoice_no'];
                  $product_id = $row_orders['product_id'];
                  $qty = $row_orders['qty'];
                  $size = $row_orders['size'];
                  $order_status = $row_orders['order_status'];
                  $get_products = "SELECT * FROM `products` WHERE `product_id`='$product_id'";
                  $run_products = mysqli_query($conn, $get_products);
                  $row_products = mysqli_fetch_array($run_products);
                  $product_title = $row_products['product_title'];
                  $i++;
                ?>
                  <tr>
                    <th>#<?= $i ?></th>
                    <td>
                      <?php
                      $get_customer = "SELECT * FROM `customers` WHERE `customer_id`='$c_id'";
                      $run_customer = mysqli_query($conn, $get_customer);
                      $row_customer = mysqli_fetch_array($run_customer);
                      $customer_email = $row_customer['customer_email'];
                      echo $customer_email;
                      ?>
                    </td>
                    <td class="bg-warning"><?= $invoice_no ?></td>
                    <td><?= $product_title ?></td>
                    <td><?= $qty ?></td>
                    <td><?= $size ?></td>
                    <td>
                      <?php
                      $get_customer_order = "SELECT * FROM `customer_orders` WHERE `order_id`='$order_id'";
                      $run_customer_order = mysqli_query($conn, $get_customer_order);
                      $row_customer_order = mysqli_fetch_array($run_customer_order);
                      $order_date = $row_customer_order['order_date'];
                      $due_amount = $row_customer_order['due_amount'];
                      echo $order_date;
                      ?>
                    </td>
                    <td>$<?= $due_amount ?></td>
                    <td>
                      <?php
                      if ($order_status == 'pending') {
                        echo $order_status = 'pending';
                      } else {
                        echo $order_status = 'Complete';
                      }
                      ?>
                    </td>
                    <td class="text-center">
                      <a class="btn btn-danger" href="index.php?order_delete=<?= $order_id ?>">
                        <i class="fas fa-trash-alt"></i> Delete
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