<?php
if (!isset($_SESSION['admin_email'])) {
  echo "<script>window.open('login.php','_self')</script>";
} else {
?>
<?php
  if (isset($_GET['payment_delete'])) {
    $delete_id = $_GET['payment_delete'];
    $delete_payment = "DELETE FROM `payments` WHERE payment_id='$delete_id'";
    $run_delete = mysqli_query($conn, $delete_payment);
    if ($run_delete) {
      echo "<script>alert('Payment has been deleted!')</script>";
      echo "<script>window.open('index.php?view_payments', '_self')</script>";
    }
  }
?>


<?php } ?>