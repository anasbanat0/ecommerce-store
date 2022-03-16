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
            <i class="fas fa-tachometer-alt"></i> Dashboard / View Payments
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
            <i class="fas fa-money-bill"></i> View Payments
          </h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
              <thead>
                <tr>
                  <th>Payment No:</th>
                  <th>Invoice No:</th>
                  <th>Amount Paid:</th>
                  <th>Payment Method:</th>
                  <th>Reference No:</th>
                  <th>Payment Code:</th>
                  <th>Payment Date:</th>
                  <th>Delete Payment:</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                $get_payments = "SELECT * FROM `payments`";
                $run_payments = mysqli_query($conn, $get_payments);
                while ($row_payments = mysqli_fetch_array($run_payments)) {
                  $payment_id = $row_payments['payment_id'];
                  $invoice_no = $row_payments['invoice_no'];
                  $amount = $row_payments['amount'];
                  $payment_mode = $row_payments['payment_mode'];
                  $ref_no = $row_payments['ref_no'];
                  $code = $row_payments['code'];
                  $payment_date = $row_payments['payment_date'];
                  $i++;
                ?>
                  <tr>
                    <th>#<?= $i ?></th>
                    <td class="bg-warning"><?= $invoice_no ?></td>
                    <td>$<?= $amount ?></td>
                    <td><?= $payment_mode ?></td>
                    <td><?= $ref_no ?></td>
                    <td><?= $code ?></td>
                    <td><?= $payment_date ?></td>
                    <td class="text-center">
                      <a class="btn btn-danger" href="index.php?payment_delete=<?= $payment_id ?>">
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