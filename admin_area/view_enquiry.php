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
            <i class="fas fa-tachometer-alt"></i> Dashboard / View Enquiry
          </li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header pb-0 pt-2">
          <h4 class="card-title">
            <i class="fas fa-money-bill"></i> View Enquiry
          </h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
              <thead>
                <tr>
                  <th>Enquiry Type ID</th>
                  <th>Enquiry Type Title</th>
                  <th>Delete Enquiry Type</th>
                  <th>Edit Enquiry Type</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 0;
                $get_enquiry_types = "SELECT * FROM `enquiry_type`";
                $run_enquiry_types = mysqli_query($conn, $get_enquiry_types);
                while ($row_enquiry_types = mysqli_fetch_array($run_enquiry_types)) {
                  $enquiry_id = $row_enquiry_types['enquiry_id'];
                  $enquiry_title = $row_enquiry_types['enquiry_title'];
                  $i++;
                ?>
                  <tr>
                    <th>#<?= $i ?></th>
                    <td><?= $enquiry_title ?></td>
                    <td class="text-center">
                      <a class="btn btn-danger" href="index.php?delete_enquiry=<?= $enquiry_id ?>">
                        <i class="fas fa-trash-alt"></i> Delete
                      </a>
                    </td>
                    <td class="text-center">
                      <a class="btn btn-primary" href="index.php?edit_enquiry=<?= $enquiry_id ?>">
                        <i class="fas fa-edit"></i> Edit
                      </a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php } ?>