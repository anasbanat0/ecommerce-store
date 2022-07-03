<?php
if (!isset($_SESSION['admin_email'])) {
  echo "<script>window.open('login.php','_self')</script>";
} else {
?>
<?php
  if (isset($_GET['delete_service'])) {
    $delete_id = $_GET['delete_service'];
    $delete_service = "DELETE FROM `services` WHERE `service_id`='$delete_id'";
    $run_delete = mysqli_query($conn, $delete_service);
    if ($run_delete) {
      echo "<script>alert('One service has been deleted')</script>";
      echo "<script>window.open('index.php?view_services','_self')</script>";
    }
  }
?>

<?php } ?>