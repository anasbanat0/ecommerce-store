<div class="card sidebar-menu mb-4">
  <div class="card-header">
    <?php
    $customer_session = $_SESSION['customer_email'];
    $get_customer = "select * from customers where customer_email='$customer_session'";
    $run_customer = mysqli_query($conn, $get_customer);
    $row_customer = mysqli_fetch_array($run_customer);
    $customer_image = $row_customer['customer_image'];
    $customer_name = $row_customer['customer_name'];
    if (!isset($_SESSION['customer_email'])) {
    } else {
      echo "
      <img src='customer_images/$customer_image' class='img-thumbnail w-100 card-img-top mb-3' alt='$customer_name'>
      <h5 class='text-center mb-2'>Name: $customer_name</h5>
      ";
    }
    ?>
  </div>
  <div class="card-body">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link <?php if (isset($_GET['my_orders'])) {
                            echo 'active';
                          } ?>" id="my_orders" data-toggle="pill" href="account.php?my_orders" role="tab" aria-selected="true"><i class="fa fa-list"></i> My Order</a>
      <a class="nav-link <?php if (isset($_GET['pay_offline'])) {
                            echo 'active';
                          } ?>" id="pay_offline" data-toggle="pill" href="account.php?pay_offline" role="tab" aria-selected="false"><i class="fa fa-bolt"></i> Pay Offline</a>
      <a class="nav-link <?php if (isset($_GET['edit_account'])) {
                            echo 'active';
                          } ?>" id="edit_account" data-toggle="pill" href="account.php?edit_account" role="tab" aria-selected="false"><i class="fas fa-user-edit"></i> Edit Account</a>
      <a class="nav-link <?php if (isset($_GET['change_pass'])) {
                            echo 'active';
                          } ?>" id="change_pass" data-toggle="pill" href="account.php?change_pass" role="tab" aria-selected="false"><i class="fas fa-user-lock"></i> Change Password</a>
      <a class="nav-link <?php if (isset($_GET['my_wishlist'])) {
                            echo 'active';
                          } ?>" id="my_wishlist" data-toggle="pill" href="account.php?my_wishlist" role="tab" aria-selected="false"><i class="fas fa-heart"></i> My Wishlist</a>
      <a class="nav-link <?php if (isset($_GET['delete_account'])) {
                            echo 'active';
                          } ?>" id="delete_account" data-toggle="pill" href="account.php?delete_account" role="tab" aria-selected="false"><i class="fas fa-trash-alt"></i> Delete Account</a>
      <a class="nav-link" id="logout" data-toggle="pill" href="../logout.php" role="tab" aria-selected="false"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
  </div>
</div>