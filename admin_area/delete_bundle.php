<?php
if (!isset($_SESSION['admin_email'])) {
  echo "<script>window.open('login.php','_self')</script>";
} else {
?>
<?php
  if (isset($_GET['delete_bundle'])) {
    $delete_id = $_GET['delete_bundle'];
    $delete_pro = "DELETE FROM products WHERE product_id='$delete_id'";
    $run_delete = mysqli_query($conn, $delete_pro);
    $delete_rel = "DELETE FROM `bundle_product_relation` WHERE `bundle_id`='$delete_id'";
    $run_rel = mysqli_query($conn, $delete_rel);
    if ($run_rel) {
      echo "<script>alert('One Bundle has been deleted!')</script>";
      echo "<script>window.open('index.php?view_bundles', '_self')</script>";
    }
  }
?>


<?php } ?>