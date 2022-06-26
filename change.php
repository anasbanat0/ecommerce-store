<?php
$title = "Cart";
include 'includes/db.php';
include 'functions/functions.php';
include_once 'includes/header.php';
?>

<?php
$ip_add = getRealUserIp();
if (isset($_POST['id'])) {
  $id = $_POST['id'];
  $qty = $_POST['quantity'];
  $change_qty = "UPDATE `cart` SET `qty`= '$qty' WHERE `p_id`='$id' AND `ip_add`='$ip_add'";
  $run_qty = mysqli_query($conn, $change_qty);
}
?>