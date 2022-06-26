<?php
$title = "Contact";
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
            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
          </ul>
        </nav>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card mb-4">
          <div class="card-header py-4 text-center">
            <h2>Contact Us</h2>
            <p class="text-muted">If you have any questions, please feel free to <a href="#">Contact Us</a>, our customer service center is working for you 24/7.</p>
          </div>
          <form class="py-4 px-4" action="contact.php" method="post">
            <div class="form-group">
              <label for="name">Name</label>
              <input id="name" type="text" class="form-control" name="name" required>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control" id="email" required>
            </div>
            <div class="form-group">
              <label for="subject">Subject</label>
              <input type="text" class="form-control" name="subject" id="subject" required>
            </div>
            <div class="form-group">
              <label for="message">Message</label>
              <textarea class="form-control" name="message" id="message"></textarea>
            </div>
            <div class="text-center">
              <button type="submit" name="submit" class="btn btn-primary">
                <i class="fa fa-user-md"></i> Send Message
              </button>
            </div>
          </form>
          <?php
          if (isset($_POST['submit'])) {
            // Admin receives email through this code
            $sender_name = $_POST['name'];
            $sender_email = $_POST['email'];
            $sender_subject = $_POST['subject'];
            $sender_message = $_POST['message'];
            $receiver_email = "user1@anasbanat.com";
            mail($receiver_email, $sender_subject, $sender_message, $sender_name, $sender_email);
            // Send email to sender through this code
            $email = $_POST['email'];
            $subject = "Welcome to my website";
            $msg = "I shall get you soon, thanks for sending us email";
            $from = "user1@anasbanat.com";
            mail($email, $subject, $msg, $from);
            echo "<h3 class='text-center pb-4'>Your message has been send successfully</h3>";
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include_once 'includes/footer.php'; ?>