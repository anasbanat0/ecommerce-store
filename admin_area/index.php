<?php
session_start();
$title = "Admin Panel";
require 'includes/db.php';
include 'includes/header.php';
if (!isset($_SESSION['admin_email'])) {
  echo "<script>window.open('login.php','_self')</script>";
} else {
?>
  <?php
  $admin_session = $_SESSION['admin_email'];
  $get_admin = "SELECT * FROM admins where admin_email='$admin_session'";
  $run_admin = mysqli_query($conn, $get_admin);
  $row_admin = mysqli_fetch_array($run_admin);
  $admin_id = $row_admin['admin_id'];
  $admin_name = $row_admin['admin_name'];
  $admin_email = $row_admin['admin_email'];
  $admin_image = $row_admin['admin_image'];
  $admin_country = $row_admin['admin_country'];
  $admin_job = $row_admin['admin_job'];
  $admin_contact = $row_admin['admin_contact'];
  $admin_about = $row_admin['admin_about'];

  $get_products = "SELECT * FROM products";
  $run_products = mysqli_query($conn, $get_products);
  $count_products = mysqli_num_rows($run_products);

  $get_customers = "SELECT * FROM customers";
  $run_customers = mysqli_query($conn, $get_customers);
  $count_customers = mysqli_num_rows($run_customers);

  $get_p_categories = "SELECT * FROM product_categories";
  $run_p_categories = mysqli_query($conn, $get_p_categories);
  $count_p_categories = mysqli_num_rows($run_p_categories);

  $get_pending_orders = "SELECT * FROM pending_orders";
  $run_pending_orders = mysqli_query($conn, $get_pending_orders);
  $count_pending_orders = mysqli_num_rows($run_pending_orders);
  ?>
  <div id="wrapper">
    <?php include 'includes/sidebar.php'; ?>
    <div id="page-wrapper">
      <div class="container-fluid">
        <?php
        if (isset($_GET['dashboard'])) {
          include 'dashboard.php';
        } elseif (isset($_GET['insert_product'])) {
          include 'insert_product.php';
        } elseif (isset($_GET['view_products'])) {
          include 'view_products.php';
        } elseif (isset($_GET['delete_product'])) {
          include 'delete_product.php';
        } elseif (isset($_GET['edit_product'])) {
          include 'edit_product.php';
        } elseif (isset($_GET['insert_p_cat'])) {
          include 'insert_p_cat.php';
        } elseif (isset($_GET['view_p_cats'])) {
          include 'view_p_cats.php';
        } elseif (isset($_GET['delete_p_cat'])) {
          include 'delete_p_cat.php';
        } elseif (isset($_GET['edit_p_cat'])) {
          include 'edit_p_cat.php';
        } elseif (isset($_GET['insert_cat'])) {
          include 'insert_cat.php';
        } elseif (isset($_GET['view_cats'])) {
          include 'view_cats.php';
        } elseif (isset($_GET['delete_cat'])) {
          include 'delete_cat.php';
        } elseif (isset($_GET['edit_cat'])) {
          include 'edit_cat.php';
        } elseif (isset($_GET['insert_slide'])) {
          include 'insert_slide.php';
        } elseif (isset($_GET['view_slides'])) {
          include 'view_slides.php';
        } elseif (isset($_GET['delete_slide'])) {
          include 'delete_slide.php';
        } elseif (isset($_GET['edit_slide'])) {
          include 'edit_slide.php';
        } elseif (isset($_GET['view_customers'])) {
          include 'view_customers.php';
        } elseif (isset($_GET['customer_delete'])) {
          include 'customer_delete.php';
        } elseif (isset($_GET['view_orders'])) {
          include 'view_orders.php';
        } elseif (isset($_GET['order_delete'])) {
          include 'order_delete.php';
        } elseif (isset($_GET['view_payments'])) {
          include 'view_payments.php';
        } elseif (isset($_GET['payment_delete'])) {
          include 'payment_delete.php';
        } elseif (isset($_GET['insert_user'])) {
          include 'insert_user.php';
        } elseif (isset($_GET['view_users'])) {
          include 'view_users.php';
        } elseif (isset($_GET['user_delete'])) {
          include 'user_delete.php';
        } elseif (isset($_GET['user_profile'])) {
          include 'user_profile.php';
        } elseif (isset($_GET['insert_box'])) {
          include 'insert_box.php';
        } elseif (isset($_GET['view_boxes'])) {
          include 'view_boxes.php';
        } elseif (isset($_GET['delete_box'])) {
          include 'delete_box.php';
        } elseif (isset($_GET['edit_box'])) {
          include 'edit_box.php';
        } elseif (isset($_GET['insert_term'])) {
          include 'insert_term.php';
        } elseif (isset($_GET['view_terms'])) {
          include 'view_terms.php';
        } elseif (isset($_GET['delete_term'])) {
          include 'delete_term.php';
        } elseif (isset($_GET['edit_term'])) {
          include 'edit_term.php';
        } elseif (isset($_GET['edit_css'])) {
          include 'edit_css.php';
        } elseif (isset($_GET['insert_manufacturer'])) {
          include 'insert_manufacturer.php';
        } elseif (isset($_GET['view_manufacturers'])) {
          include 'view_manufacturers.php';
        } elseif (isset($_GET['delete_manufacturer'])) {
          include 'delete_manufacturer.php';
        } elseif (isset($_GET['edit_manufacturer'])) {
          include 'edit_manufacturer.php';
        } elseif (isset($_GET['insert_coupon'])) {
          include 'insert_coupon.php';
        } elseif (isset($_GET['view_coupons'])) {
          include 'view_coupons.php';
        } elseif (isset($_GET['delete_coupon'])) {
          include 'delete_coupon.php';
        } elseif (isset($_GET['edit_coupon'])) {
          include 'edit_coupon.php';
        } elseif (isset($_GET['insert_icon'])) {
          include 'insert_icon.php';
        } elseif (isset($_GET['view_icons'])) {
          include 'view_icons.php';
        } elseif (isset($_GET['delete_icon'])) {
          include 'delete_icon.php';
        } elseif (isset($_GET['edit_icon'])) {
          include 'edit_icon.php';
        } elseif (isset($_GET['insert_bundle'])) {
          include 'insert_bundle.php';
        } elseif (isset($_GET['view_bundles'])) {
          include 'view_bundles.php';
        } elseif (isset($_GET['delete_bundle'])) {
          include 'delete_bundle.php';
        } elseif (isset($_GET['edit_bundle'])) {
          include 'edit_bundle.php';
        } elseif (isset($_GET['insert_rel'])) {
          include 'insert_rel.php';
        } elseif (isset($_GET['view_rel'])) {
          include 'view_rel.php';
        } elseif (isset($_GET['delete_rel'])) {
          include 'delete_rel.php';
        } elseif (isset($_GET['edit_rel'])) {
          include 'edit_rel.php';
        } elseif (isset($_GET['edit_contact_us'])) {
          include 'edit_contact_us.php';
        } elseif (isset($_GET['insert_enquiry'])) {
          include 'insert_enquiry.php';
        } elseif (isset($_GET['view_enquiry'])) {
          include 'view_enquiry.php';
        } elseif (isset($_GET['delete_enquiry'])) {
          include 'delete_enquiry.php';
        } elseif (isset($_GET['edit_enquiry'])) {
          include 'edit_enquiry.php';
        }
        ?>
      </div>
    </div>
  </div>


  <?php include 'includes/footer.php'; ?>
<?php } ?>