<div class="card-header text-center pt-4 pb-3">
  <h2>Change Password</h2>
</div>
<div class="card-body">
  <form action="" method="post">
    <div class="form-group">
      <label for="old_pass">Enter Your Current Password</label>
      <input type="text" name="old_pass" id="old_pass" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="new_pass">Enter Your New Password</label>
      <input type="password" name="new_pass" id="new_pass" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="new_pass_again">Enter Your New Password Again</label>
      <input type="text" name="new_pass_again" id="new_pass_again" class="form-control" required>
    </div>
    <div class="text-center">
      <button type="submit" name="submit" class="btn btn-primary">
        <i class="fa fa-user-md"></i> Change Password
      </button>
    </div>
  </form>
  <?php
  if (isset($_POST['submit'])) {
    $c_email = $_SESSION['customer_email'];
    $old_pass = $_POST['old_pass'];
    $new_pass = $_POST['new_pass'];
    $new_pass_again = $_POST['new_pass_again'];
    $set_old_pass = "select * from customers where customer_pass='$old_pass' AND customer_email='$c_email'";
    $run_old_pass = mysqli_query($conn, $set_old_pass);
    $check_old_pass = mysqli_num_rows($run_old_pass);
    if ($check_old_pass == 0) {
      echo "<script>alert('Your current password is not valid try again')</script>";
      exit();
    } elseif ($new_pass != $new_pass_again) {
      echo "<script>alert('Your new password does not match')</script>";
      exit();
    }
    $update_pass = "update customers set customer_pass='$new_pass' where customer_email='$c_email'";
    $run_pass = mysqli_query($conn, $update_pass);
    if ($run_pass) {
      echo "<script>alert('Your password has been changed successfully')</script>";
      echo "<script>window.open('account.php?my_orders','_self')</script>";
    }
  }
  ?>
</div>