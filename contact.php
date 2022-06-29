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
            <?php
            $get_contact_us = "SELECT * FROM `contact_us`";
            $run_contact_us = mysqli_query($conn, $get_contact_us);
            $row_contact_us = mysqli_fetch_array($run_contact_us);
            $contact_heading = $row_contact_us['contact_heading'];
            $contact_desc = $row_contact_us['contact_desc'];
            $contact_email = $row_contact_us['contact_email'];
            ?>
            <h2><?= $contact_heading ?></h2>
            <p class="text-muted">
              <?= $contact_desc ?>
            </p>
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
              <label for="message">Select Enquiry Type</label>
              <textarea class="form-control" name="message" id="message" rows="5"></textarea>
            </div>
            <div class="form-group">
              <label for="message">Message</label>
              <select name="enquiry_type" class="form-control">
                <option disabled>Select Enquiry Type</option>
                <?php
                $get_enquiry_types = "SELECT * FROM `enquiry_type`";
                $run_enquiry_types = mysqli_query($conn, $get_enquiry_types);
                while ($row_enquiry_types = mysqli_fetch_array($run_enquiry_types)) {
                  $enquiry_title = $row_enquiry_types['enquiry_title'];
                  echo "<option>$enquiry_title</option>";
                }
                ?>
              </select>
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
            $enquiry_type = $_POST['enquiry_type'];
            $new_message = "
              <h1>This message has been sent by $sender_name</h1>
              <p><b>Sender Email:</b> $sender_email</p>
              <p><b>Sender subject:</b> $sender_subject</p>
              <p><b>Sender Enquiry Type:</b> $enquiry_type</p>
              <p><b>Sender Message:</b> $sender_message</p>
            ";
            $headers = "From $sender_email \r\n";
            $headers .= "Content-type: text/html\r\n";
            mail($contact_email, $sender_subject, $new_message, $headers);
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