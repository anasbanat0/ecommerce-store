<?php
if (!isset($_SESSION['admin_email'])) {
  echo "<script>window.open('login.php','_self')</script>";
} else {
?>
  <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark" id="navbar">
    <button class="navbar-toggler mr-4" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="index.php?dashboard">Admin Panel</a>
    <ul class="navbar-nav top-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
          <i class="fa fa-user"></i> <?= $admin_name ?> <b class="caret"></b>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="index.php?user_profile=<?= $admin_id ?>">
            <i class="fa fa-user"></i> Profile
          </a>
          <a class="dropdown-item" href="index.php?view_products">
            <i class="fa fa-envelope"></i> Products
            <span class="badge badge-pill badge-dark"><?= $count_products ?></span>
          </a>
          <a class="dropdown-item" href="index.php?view_customers">
            <i class="fas fa-users-cog"></i> Customers
            <span class="badge badge-pill badge-dark"><?= $count_customers ?></span>
          </a>
          <a class="dropdown-item" href="index.php?view_p_cats">
            <i class="fas fa-tshirt"></i> Product Categories
            <span class="badge badge-pill badge-dark"><?= $count_p_categories ?></span>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php">
            <i class="fas fa-power-off"></i> Logout
          </a>
        </div>
      </li>
    </ul>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav flex-column side-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php?dashboard">
            <i class="fas fa-tachometer-alt"></i> Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" data-toggle="collapse" data-target="#products">
            <i class="fas fa-table"></i> Products
            <i class="fa fa-caret-down"></i>
          </a>
          <ul id="products" class="collapse">
            <li>
              <a href="index.php?insert_product">
                Insert Products
              </a>
            </li>
            <li>
              <a href="index.php?view_products">
                View Products
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link" data-toggle="collapse" data-target="#bundles">
            <i class="fas fa-edit fa-fw"></i> Bundles
            <i class="fas fa-caret-down"></i>
          </a>
          <ul id="bundles" class="collapse">
            <li>
              <a href="index.php?insert_bundle">Insert Bundle</a>
            </li>
            <li>
              <a href="index.php?view_bundles">View Bundles</a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link" data-target="#relations" data-toggle="collapse">
            <i class="fas fa-retweet fa-fw"></i> Assign Product Relations
            <i class="fas fa-caret-down"></i>
          </a>
          <ul id="relations" class="collapse">
            <li>
              <a href="index.php?insert_rel">Insert Relation</a>
            </li>
            <li>
              <a href="index.php?view_rel">View Relations</a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link" data-toggle="collapse" data-target="#icons">
            <i class="fas fa-retweet fa-fw"></i> Icons
            <i class="fas fa-caret-down"></i>
          </a>
          <ul id="icons" class="collapse">
            <li>
              <a href="index.php?insert_icon">Insert Icon</a>
            </li>
            <li>
              <a href="index.php?view_icons">View Icons</a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link" data-toggle="collapse" data-target="#manufacturers">
            <i class="fas fa-briefcase fa-fw"></i> Manufacturers
            <i class="fa fa-caret-down"></i>
          </a>
          <ul id="manufacturers" class="collapse">
            <li>
              <a href="index.php?insert_manufacturer"> Insert Manufacturer</a>
            </li>
            <li>
              <a href="index.php?view_manufacturers"> View Manufacturers</a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" data-toggle="collapse" data-target="#p_cat">
            <i class="fas fa-pencil-alt"></i> Products Categories
            <i class="fa fa-caret-down"></i>
          </a>
          <ul id="p_cat" class="collapse">
            <li>
              <a href="index.php?insert_p_cat">
                Insert Product Category
              </a>
            </li>
            <li>
              <a href="index.php?view_p_cats">
                View Products Categories
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" data-toggle="collapse" data-target="#cat">
            <i class="fas fa-arrows-alt-v"></i> Categories
            <i class="fa fa-caret-down"></i>
          </a>
          <ul id="cat" class="collapse">
            <li>
              <a href="index.php?insert_cat">
                Insert Category
              </a>
            </li>
            <li>
              <a href="index.php?view_cats">
                View Categories
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link" data-toggle="collapse" data-target="#boxes">
            <i class="fas fa-arrows-alt"></i> Boxes Section
            <i class="fa fa-caret-down"></i>
          </a>
          <ul id="boxes" class="collapse">
            <li>
              <a href="index.php?insert_box">Insert Box</a>
            </li>
            <li>
              <a href="index.php?view_boxes">View Boxes</a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" data-toggle="collapse" data-target="#services">
            <i class="fas fa-university"></i> Services
            <i class="fas fa-caret-down"></i>
          </a>
          <ul id="services" class="collapse">
            <li>
              <a href="index.php?insert_service">Insert Service</a>
            </li>
            <li>
              <a href="index.php?view_services">View Services</a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link" data-toggle="collapse" data-target="#contact_us">
            <i class="fa fa-fw fa-edit"></i> Contact Us
            <i class="fas fa-caret-down"></i>
          </a>
          <ul class="collapse" id="contact_us">
            <li><a href="index.php?edit_contact_us">Edit Contact Us</a></li>
            <li><a href="index.php?insert_enquiry">Insert Enquiry Type</a></li>
            <li><a href="index.php?view_enquiry">View Enquiry Types</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="index.php?edit_about_us" class="nav-link">
            <i class="fas fa-fw fa-edit"></i> Edit About Us Page
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link" data-toggle="collapse" data-target="#coupons">
            <i class="fa fa-arrows-alt-v fa-fw"></i> Coupons
            <i class="fa fa-caret-down"></i>
          </a>
          <ul class="collapse" id="coupons">
            <li>
              <a href="index.php?insert_coupon">Insert Coupon</a>
            </li>
            <li>
              <a href="index.php?view_coupons">View Coupons</a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" data-toggle="collapse" data-target="#slides">
            <i class="fas fa-cogs"></i> Slides
            <i class="fa fa-caret-down"></i>
          </a>
          <ul id="slides" class="collapse">
            <li>
              <a href="index.php?insert_slide">
                Insert Slide
              </a>
            </li>
            <li>
              <a href="index.php?view_slides">
                View Slides
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link" data-toggle="collapse" data-target="#terms">
            <i class="fas fa-fist-raised"></i> Terms
            <i class="fa fa-caret-down"></i>
          </a>
          <ul id="terms" class="collapse">
            <li>
              <a href="index.php?insert_term">
                Insert Term
              </a>
            </li>
            <li>
              <a href="index.php?view_terms">
                View Terms
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="index.php?edit_css" class="nav-link">
            <i class="fas fa-file-code"></i> Edit Css File
          </a>
        </li>
        <li class="nav-item">
          <a href="index.php?view_customers" class="nav-link">
            <i class="fas fa-edit"></i> View Customers
          </a>
        </li>
        <li class="nav-item">
          <a href="index.php?view_orders" class="nav-link">
            <i class="fas fa-list"></i> View Orders
          </a>
        </li>
        <li class="nav-item">
          <a href="index.php?view_payments" class="nav-link">
            <i class="fas fa-money-check-alt"></i> View Payments
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" data-toggle="collapse" data-target="#users">
            <i class="fas fa-user"></i> Users
            <i class="fa fa-caret-down"></i>
          </a>
          <ul id="users" class="collapse">
            <li>
              <a href="index.php?insert_user">
                Insert User
              </a>
            </li>
            <li>
              <a href="index.php?view_users">
                View Users
              </a>
            </li>
            <li>
              <a href="index.php?user_profile=<?= $admin_id ?>">
                Edit Profile
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="logout.php" class="nav-link">
            <i class="fas fa-power-off"></i> Logout
          </a>
        </li>
      </ul>
    </div>
  </nav>
<?php } ?>