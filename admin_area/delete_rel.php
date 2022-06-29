<?php
if (!isset($_SESSION['admin_email'])) {
  echo "<script>window.open('login.php','_self')</script>";
} else {
?>
<?php
  if (isset($_GET['delete_rel'])) {
    $delete_id = $_GET['delete_rel'];
    $delete_rel = "DELETE FROM `bundle_product_relation` WHERE `rel_id`='$delete_id'";
    $run_delete = mysqli_query($conn, $delete_rel);
    if ($run_delete) {
      echo "<script>alert('One relation has been deleted!')</script>";
      echo "<script>window.open('index.php?view_rel', '_self')</script>";
    }
  }
?>


<?php } ?>