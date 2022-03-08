<div class="card-header text-center pt-4 pb-3">
  <h2>Do you really want to delete your account?</h2>
</div>
<div class="card-body text-center">
  <form action="" method="post">
    <input type="submit" class="btn btn-danger" name="yes" value="Yes, I want to delete!">
    <input type="submit" class="btn btn-primary" name="no" value="No, I don't want to delete!">
  </form>
</div>
<?php
$c_email = $_SESSION['customer_email'];
if (isset($_POST['yes'])) {
  $delete_customer = "delete from customers where customer_email='$c_email'";
  $run_delete = mysqli_query($conn, $delete_customer);
  if ($run_delete) {
    session_destroy();
    echo "<script>alert('Your Account has been deleted! Good Bye')</script>";
    echo "<script>window.open('../index.php','_self')</script>";
  }elseif(isset($_POST['no'])) {
    echo "<script>window.open('account.php?my_orders','_self')</script>";
  }
}
?>