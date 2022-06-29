<?php
require 'PHPMailerAutoload.php';
require 'credential.php';
$title = "Checkout";
include 'includes/db.php';
include 'functions/functions.php';
include_once 'includes/header.php';
?>
<div id="content">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mt-4">
        <nav aria-label="breadcrumb">
          <ul class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
          </ul>
        </nav>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card mb-4">
          <div class="card-header text-center pb-2 pt-3">
            <h5>Enter your email below, we will send you, your password</h5>
          </div>
          <div class="text-center px-5 pt-5 pb-3">
            <form action="" method="post">
              <div class="form-group">
                <input type="text" class="form-control" name="c_email" placeholder="Enter your email">
                <!-- <br> -->
                <input type="submit" name="forgot_pass" class="btn btn-primary mt-4" value="Send my password">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
if (isset($_POST['forgot_pass'])) {
  $c_email = $_POST['c_email'];
  $sel_c = "SELECT * FROM `customers` WHERE `customer_email`='$c_email'";
  $run_c = mysqli_query($conn, $sel_c);
  $count_c = mysqli_num_rows($run_c);
  $row_c = mysqli_fetch_array($run_c);
  $c_name = $row_c['customer_name'];
  $c_pass = $row_c['customer_pass'];
  if ($count_c == 0) {
    echo "<script>alert('Sorry, This email is not associated with any account')</script>";
    exit();
  } else {
    $mail = new PHPMailer;
    $mail->SMTPDebug = 1;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Username = EMAIL;
    $mail->Password = PASS;
    $mail->Port = '465';
    $mail->SMTPSecure = 'ssl'; 
    $mail->setFrom(EMAIL, 'Anas Banat');
    $mail->addAddress($c_email);
    $mail->addReplyTo(EMAIL);
    $mail->isHTML(true);
    $mail->Subject = 'Your Password';
    $mail->Body    = "
      <h2 class='text-center'>Your password has been sent to your email</h2>
      <h3 class='text-center'>Dear $c_name</h3>
      <h4 class='text-center'>Your password is: <span><b>$c_pass</b></span></h4>
      <h4 class='text-center'>
        <a href='http://localhost/ecommerce_store/checkout.php'>
          Click here to login your account
        </a>
      </h4>
    ";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    if (!$mail->send()) {
      echo 'Message could not be sent.';
      //echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
      echo "<script>alert('Your password has been sent to you, check your inbox')</script>";
      echo "<script>window.open('checkout.php','_self')</script>";
    }
  }
}
?>
<?php include_once 'includes/footer.php'; ?>