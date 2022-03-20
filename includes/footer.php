<div id="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-6">
        <h4>Pages</h4>
        <ul>
          <li><a href="cart.php">Shopping Cart</a></li>
          <li><a href="contact.php">Contact Us</a></li>
          <li><a href="shop.php">Shop</a></li>
          <li>
            <?php
            if (!isset($_SESSION['customer_email'])) {
              echo "<a href='checkout.php'>My Account</a>";
            } else {
              echo "<a href='customer/account.php?my_orders'>My Account</a>";
            }
            ?>
          </li>
        </ul>
        <hr>
        <h4>User Section</h4>
        <ul>
          <li>
            <?php
            if (!isset($_SESSION['customer_email'])) {
              echo "<a href='checkout.php'>Login</a>";
            } else {
              echo "<a href='customer/account.php?my_orders'>My Account</a>";
            }
            ?>
          </li>
          <li>
            <?php
            if (!isset($_SESSION['customer_email'])) {
              echo "<a href='customer_register.php'>Register</a>";
            } else {
              echo "<a href='shop.php'>Shop</a>";
            }
            ?>
          </li>
          <li>
            <a href="terms.php">Terms And Conditions</a>
          </li>
        </ul>
        <hr class="d-block d-sm-none">
      </div>
      <div class="col-md-3 col-sm-6">
        <h4>Top Products Categories</h4>
        <ul>
          <?php
          $get_p_cats = "select * from product_categories";
          $run_p_cats = mysqli_query($conn, $get_p_cats);
          while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {
            $p_cat_id = $row_p_cats['p_cat_id'];
            $p_cat_title = $row_p_cats['p_cat_title'];
            echo "<li><a href='shop.php?product_category=$p_cat_id'>$p_cat_title</a></li>";
          }
          ?>
        </ul>
        <hr class="d-md-none d-lg-none">
      </div>
      <div class="col-md-3 col-sm-6">
        <h4>Where to find us?</h4>
        <p>
          <strong>Group 141 Ltd.</strong>
          <br>Gaza Strip
          <br>Palestine
          <br>00972595109753
          <br>anasba315@gmail.com
          <br>
          <strong>Anas Ali Banat</strong>
        </p>
        <a class="contact" href="contact.php">Go to Contact us page</a>
        <hr class="d-md-none d-lg-none">
      </div>
      <div class="col-md-3 col-sm-6">
        <h4>Get the news</h4>
        <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, est esse! Omnis!</p>
        <form action="https://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('https://feedburner.google.com/fb/a/mailverify?uri=-DigitalWorld', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
          <div class="input-group">
            <input type="email" class="form-control" name="email" placeholder="example@mail.com">
            <input type="hidden" value="-DigitalWorld" name="uri" />
            <input type="hidden" name="loc" value="en_US" />
            <span class="input-group-append">
              <input type="submit" value="subscribe" class="btn btn-primary">
            </span>
          </div>
        </form>
        <hr>
        <h4>Stay in touch</h4>
        <p class="social">
          <a href="#"><i class="fab fa-facebook"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-pinterest"></i></a>
          <a href="#"><i class="fab fa-linkedin"></i></a>
        </p>
      </div>
    </div>
  </div>
</div>
<div id="copyright">
  <div class="container">
    <div class="row">
      <div class="col-6 d-flex flex-row">
        <p>&copy; 2022 Anas Ali Banat</p>
      </div>
      <div class="col-6 d-flex flex-row-reverse">
        <p>Template by <a href="https://www.linkedin.com/in/anasali0" target="_blank">Anas Banat</a></p>
      </div>
    </div>
  </div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>

</html>