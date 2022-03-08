<div class="card-header pt-4 pb-3">
  <div class="text-center">
    <h2>My Orders</h2>
    <p class="lead">Your Orders On One Place</p>
    <p class="text-muted">If you have any questions, please feel free to <a href="../contact.php">Contact Us</a>, our customer service center is working for you 24/7.</p>
  </div>
</div>
<div class="card-body">
  <div class="table-responsive">
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>O N:</th>
          <th>Due Amount:</th>
          <th>Invoice No:</th>
          <th>Qty:</th>
          <th>Size:</th>
          <th>Order Date:</th>
          <th>Paid/Unpaid:</th>
          <th>Status:</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $customer_session = $_SESSION['customer_email'];
        $get_customer = "select * from customers where customer_email='$customer_session'";
        $run_customer = mysqli_query($conn, $get_customer);
        $row_customer = mysqli_fetch_array($run_customer);
        $customer_id = $row_customer['customer_id'];
        $get_orders = "select * from customer_orders where customer_id='$customer_id'";
        $run_orders = mysqli_query($conn, $get_orders);
        $i = 0;
        while ($row_orders = mysqli_fetch_array($run_orders)) {
          $order_id = $row_orders['order_id'];
          $due_amount = $row_orders['due_amount'];
          $invoice_no = $row_orders['invoice_no'];
          $qty = $row_orders['qty'];
          $size = $row_orders['size'];
          $order_date = substr($row_orders['order_date'], 0, 11);
          $order_status = $row_orders['order_status'];
          $i++;
          if ($order_status == 'pending') {
            $order_status = "Unpaid";
          } else {
            $order_status == "Paid";
          }
        ?>
          <tr>
            <th>#<?= $i ?></th>
            <td>$<?= $due_amount ?></td>
            <td><?= $invoice_no ?></td>
            <td><?= $qty ?></td>
            <td><?= $size ?></td>
            <td><?= $order_date ?></td>
            <td><?= $order_status ?></td>
            <td>
              <a href="confirm.php?order_id=<?= $order_id ?>" target="_blank" class="btn btn-primary btn-sm">Confirm If Paid</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>