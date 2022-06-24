<?php
if (!isset($_SESSION['admin_email'])) {
  echo "<script>window.open('login.php','_self')</script>";
} else {
?>
  <?php
  $file = "../css/style.css";
  if (file_exists($file)) {
    $data = file_get_contents($file);
  }
  ?>
  <div class="row mt-4">
    <div class="col-lg-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">
            <i class="fas fa-tachometer-alt"></i> Dashboard / Edit CSS File
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
            <i class="fas fa-money-bill"></i> Edit CSS File
          </h5>
        </div>
        <div class="card-body">
          <form action="" method="post">
            <div class="form-group form-row">
              <div class="col-md-12">
                <textarea name="newdata" class="form-control" cols="30" rows="25">
                  <?= $data ?>
                </textarea>
              </div>
            </div>
            <div class="form-group form-row">
              <label class="col-md-3"></label>
              <div class="col-md-6">
                <input type="submit" name="update" value="Update CSS File" class="btn btn-primary form-control">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php
  if (isset($_POST['update'])) {
    $newdata = $_POST['newdata'];
    $handle = fopen($file, "w");
    fwrite($handle, $newdata);
    fclose($handle);
    echo "<script>alert('CSS File has been updated')</script>";
    echo "<script>window.open('index.php?edit_css','_self')</script>";
  }
  ?>
<?php } ?>