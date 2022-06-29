<?php
if (!isset($_SESSION['admin_email'])) {
  echo "<script>window.open('login.php','_self')</script>";
} else {
?>

  <div class="row mt-4">
    <div class="col-lg-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            <i class="fas fa-tachometer-alt"></i> Dashboard / Insert Enquiry Type
          </li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header pb-0 pt-2">
          <h5 class="card-title">
            <i class="fas fa-money-bill"></i> Insert Enquiry Type
          </h5>
        </div>
        <div class="card-body">
          <form action="" method="post">
            <div class="form-group form-row">
              <label for="" class="col-form-label col-md-3 text-right">Enquiry Type</label>
              <div class="col-md-6">
                <input type="text" name="enquiry_title" class="form-control">
              </div>
            </div>
            <div class="form-group form-row">
              <label for="" class="col-md-3"></label>
              <div class="col-md-6">
                <input type="submit" name="submit" class="form-control btn btn-primary" value="Insert Enquiry Type">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php
if(isset($_POST['submit'])) {
  $enquiry_title = $_POST['enquiry_title'];
  $insert_enquiry = "INSERT INTO `enquiry_type` (`enquiry_title`) VALUES ('$enquiry_title')";
  $run_enquiry = mysqli_query($conn, $insert_enquiry);
  if($run_enquiry) {
    echo "<script>alert('New enquiry has been inserted')</script>";
    echo "<script>window.open('index.php?view_enquiry','_self')</script>";
  }
}
?>
<?php } ?>