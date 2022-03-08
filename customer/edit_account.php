<?php
$customer_session = $_SESSION['customer_email'];
$get_customer = "select * from customers where customer_email='$customer_session'";
$run_customer = mysqli_query($conn, $get_customer);
$row_customer = mysqli_fetch_array($run_customer);
$customer_id = $row_customer['customer_id'];
$customer_name = $row_customer['customer_name'];
$customer_email = $row_customer['customer_email'];
$customer_country = $row_customer['customer_country'];
$customer_city = $row_customer['customer_city'];
$customer_contact = $row_customer['customer_contact'];
$customer_address = $row_customer['customer_address'];
$customer_image = $row_customer['customer_image'];

?>
<div class="card-header text-center pt-4 pb-3">
  <h2>Edit Your Account</h2>
</div>
<div class="card-body">
  <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="c_name">Customer Name:</label>
      <input type="text" name="c_name" value="<?= $customer_name ?>" id="c_name" class="form-control">
    </div>
    <div class="form-group">
      <label for="c_email">Customer Email:</label>
      <input type="text" name="c_email" value="<?= $customer_email ?>" id="c_email" class="form-control">
    </div>
    <div class="form-group">
      <label for="c_country">Customer Country:</label>
      <input type="text" name="c_country" value="<?= $customer_country ?>" id="c_country" class="form-control">
    </div>
    <div class="form-group">
      <label for="c_city">Customer City:</label>
      <input type="text" name="c_city" value="<?= $customer_city ?>" id="c_city" class="form-control">
    </div>
    <div class="form-group">
      <label for="c_contact">Customer Contact:</label>
      <input type="text" name="c_contact" value="<?= $customer_contact ?>" id="c_contact" class="form-control">
    </div>
    <div class="form-group">
      <label for="c_address">Customer Address:</label>
      <input type="text" name="c_address" value="<?= $customer_address ?>" id="c_address" class="form-control">
    </div>
    <div class="form-group">
      <label for="c_image">Customer Image:</label>
      <input type="file" name="c_image" id="c_image" class="form-control">
      <img src="customer_images/<?= $customer_image ?>" width="100" class="img-fluid mt-2" alt="Customer Image">
    </div>
    <div class="text-center">
      <button name="update" class="btn btn-primary">
        <i class="fa fa-user-md"></i> Update Profile
      </button>
    </div>
  </form>
  <?php
  if (isset($_POST['update'])) {
    $update_id = $customer_id;
    $c_name = $_POST['c_name'];
    $c_email = $_POST['c_email'];
    $c_country = $_POST['c_country'];
    $c_city = $_POST['c_city'];
    $c_contact = $_POST['c_contact'];
    $c_address = $_POST['c_address'];
    $c_image = $_FILES['c_image']['name'];
    $c_image_tmp = $_FILES['c_image']['tmp_name'];
    move_uploaded_file($c_image_tmp, "customer_images/$c_image");
    $update_customer = "update customers set customer_name='$c_name',customer_email='$c_email',customer_country='$c_country',customer_city='$c_city',customer_contact='$c_contact',customer_address='$c_address',customer_image='$c_image' where customer_id='$update_id'";
    $run_customer = mysqli_query($conn, $update_customer);
    if ($run_customer) {
      echo "<script>alert('Your account has been updated please login again')</script>";
      echo "<script>window.open('../logout.php', '_self')</script>";
    }
  }
  ?>
</div>