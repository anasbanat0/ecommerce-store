<?php
$aMan  = array();
$aPCat = array();
$aCat  = array();
/// Manufacturers Code Starts ///
if (isset($_REQUEST['man']) && is_array($_REQUEST['man'])) {
  foreach ($_REQUEST['man'] as $sKey => $sVal) {
    if ((int)$sVal != 0) {
      $aMan[(int)$sVal] = (int)$sVal;
    }
  }
}
/// Manufacturers Code Ends ///
/// Products Categories Code Starts ///
if (isset($_REQUEST['p_cat']) && is_array($_REQUEST['p_cat'])) {
  foreach ($_REQUEST['p_cat'] as $sKey => $sVal) {
    if ((int)$sVal != 0) {
      $aPCat[(int)$sVal] = (int)$sVal;
    }
  }
}
/// Products Categories Code Ends ///
/// Categories Code Starts ///
if (isset($_REQUEST['cat']) && is_array($_REQUEST['cat'])) {
  foreach ($_REQUEST['cat'] as $sKey => $sVal) {
    if ((int)$sVal != 0) {
      $aCat[(int)$sVal] = (int)$sVal;
    }
  }
}
/// Categories Code Ends ///
?>
<div class="card sidebar-menu mb-4">
  <div class="card-header">
    <h5 class="card-title">
      Manufacturers
      <div class="float-right">
        <a href="#" style="color:black;">
          <span class="nav-toggle hide-show">
            Hide
          </span>
        </a>
      </div>
    </h5>
  </div>
  <div class="card-collapse collapse-data">
    <div class="card-body mb-0">
      <div class="input-group">
        <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-manufacturer" placeholder="Filter Manufacturers">
        <a class="input-group-text"><i class="fa fa-search"></i></a>
      </div>
    </div>
    <div class="card-body mt-0 scroll-menu">
      <ul class="nav flex-column category-menu" id="dev-menufacturer">
        <?php
        $get_manufacturer = "SELECT * FROM `manufacturers` WHERE `manufacturer_top`='yes'";
        $run_manufacturer = mysqli_query($conn, $get_manufacturer);
        while ($row_manufacturer = mysqli_fetch_array($run_manufacturer)) {
          $manufacturer_id = $row_manufacturer['manufacturer_id'];
          $manufacturer_title = $row_manufacturer['manufacturer_title'];
          $manufacturer_image = $row_manufacturer['manufacturer_image'];
          if ($manufacturer_image == "") {
          } else {
            $manufacturer_image = "
            &nbsp;<img src='admin_area/other_images/$manufacturer_image' width='20px'>&nbsp;
            ";
          }
          echo "
          <li style='background:#ddd; font-size:12px; margin-bottom: 10px; padding:8px 0 0' class='nav-item checkbox checkbox-primary'>
            <a class='nav-link'>
              <label>
                <input ";
          if (isset($aMan[$manufacturer_id])) {
            echo "checked='checked'";
          }
          echo " style='cursor:pointer;' type='checkbox' value='$manufacturer_id' name='manufacturer' class='get_manufacturer'>
                <span style='cursor:pointer;'>
                  $manufacturer_image
                  $manufacturer_title
                </span>
              </label>
            </a>
          </li>
          ";
        }
        $get_manufacturer = "SELECT * FROM `manufacturers` WHERE `manufacturer_top`='no'";
        $run_manufacturer = mysqli_query($conn, $get_manufacturer);
        while ($row_manufacturer = mysqli_fetch_array($run_manufacturer)) {
          $manufacturer_id = $row_manufacturer['manufacturer_id'];
          $manufacturer_title = $row_manufacturer['manufacturer_title'];
          $manufacturer_image = $row_manufacturer['manufacturer_image'];
          if ($manufacturer_image == "") {
          } else {
            $manufacturer_image = "
            &nbsp;<img src='admin_area/other_images/$manufacturer_image' width='20px'>&nbsp;
            ";
          }
          echo "
          <li style='font-size: 12px; margin-bottom: 10px; padding:8px 0 0' class='nav-item checkbox checkbox-primary'>
            <a class='nav-link'>
              <label>
                <input ";
          if (isset($aMan[$manufacturer_id])) {
            echo "checked='checked'";
          }
          echo " type='checkbox' style='cursor:pointer;' value='$manufacturer_id' name='manufacturer' class='get_manufacturer'>
                <span style='cursor:pointer;'>
                  $manufacturer_image
                  $manufacturer_title
                </span>
              </label>
            </a>
          </li>
          ";
        }
        ?>
      </ul>
    </div>
  </div>
</div>
<div class="card sidebar-menu mb-4">
  <div class="card-header pt-3 pb-2">
    <h6 class="">
      Products Categories
      <div class="float-right">
        <a href="#" style="color:black;">
          <span class="nav-toggle hide-show">
            Hide
          </span>
        </a>
      </div>
    </h6>
  </div>
  <div class="card-collapse collapse-data">
    <div class="card-body mb-0">
      <div class="input-group">
        <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-p-cats" placeholder="Product Categories">
        <a class="input-group-text"><i class="fa fa-search"></i></a>
      </div>
    </div>
    <div class="card-body mt-0 scroll-menu">
      <ul class="nav flex-column category-menu" id="dev-p-cats">
        <?php
        $get_p_cats = "SELECT * FROM `product_categories` WHERE `p_cat_top`='yes'";
        $run_p_cats = mysqli_query($conn, $get_p_cats);
        while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {
          $p_cat_id = $row_p_cats['p_cat_id'];
          $p_cat_title = $row_p_cats['p_cat_title'];
          $p_cat_image = $row_p_cats['p_cat_image'];
          if ($p_cat_image == "") {
          } else {
            $p_cat_image = "&nbsp;<img src='admin_area/other_images/$p_cat_image' width='20px'>&nbsp;";
          }
          echo "
          <li style='background: #ddd; font-size: 12px; margin-bottom: 10px; padding:8px 0 0' class='nav-item checkbox checkbox-primary'>
            <a class='nav-link'>
              <label>
                <input ";
          if (isset($aPCat[$p_cat_id])) {
            echo "checked='checked'";
          }
          echo " type='checkbox' style='cursor:pointer;' value='$p_cat_id' name='p_cat' class='get_p_cat' id='p_cat'>
                <span style='cursor:pointer;'>
                  $p_cat_image
                  $p_cat_title
                </span>
              </label>
            </a>
          </li>
          ";
        }
        $get_p_cats = "SELECT * FROM `product_categories` WHERE `p_cat_top`='no'";
        $run_p_cats = mysqli_query($conn, $get_p_cats);
        while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {
          $p_cat_id = $row_p_cats['p_cat_id'];
          $p_cat_title = $row_p_cats['p_cat_title'];
          $p_cat_image = $row_p_cats['p_cat_image'];
          if ($p_cat_image == "") {
          } else {
            $p_cat_image = "&nbsp;<img src='admin_area/other_images/$p_cat_image' width='20px'>&nbsp;";
          }
          echo "
          <li style='font-size: 12px; margin-bottom: 10px; padding:8px 0 0' class='nav-item checkbox checkbox-primary'>
            <a class='nav-link'>
              <label>
                <input ";
          if (isset($aPCat[$p_cat_id])) {
            echo "checked='checked'";
          }
          echo " type='checkbox' style='cursor:pointer;' value='$p_cat_id' name='p_cat' class='get_p_cat' id='p_cat'>
                <span style='cursor:pointer;'>
                  $p_cat_image
                  $p_cat_title
                </span>
              </label>
            </a>
          </li>
          ";
        }
        ?>
      </ul>
    </div>
  </div>
</div>
<div class="card sidebar-menu mb-4">
  <div class="card-header pt-3 pb-2">
    <h6 class="">
      Products Categories
      <div class="float-right">
        <a href="#" style="color:black;">
          <span class="nav-toggle hide-show">
            Hide
          </span>
        </a>
      </div>
    </h6>
  </div>
  <div class="card-collapse collapse-data">
    <div class="card-body mb-0">
      <div class="input-group">
        <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-cats" placeholder="Categories">
        <a class="input-group-text"><i class="fa fa-search"></i></a>
      </div>
    </div>
    <div class="card-body mt-0 scroll-menu">
      <ul class="nav flex-column category-menu" id="dev-cats">
        <?php
        $get_cat = "SELECT * FROM `categories` WHERE `cat_top`='yes'";
        $run_cat = mysqli_query($conn, $get_cat);
        while ($row_cat = mysqli_fetch_array($run_cat)) {
          $cat_id = $row_cat['cat_id'];
          $cat_title = $row_cat['cat_title'];
          $cat_image = $row_cat['cat_image'];
          if ($cat_image == "") {
          } else {
            $cat_image = "&nbsp;<img src='admin_area/other_images/$cat_image' width='20'>&nbsp;";
          }
          echo "
            <li style='background:#ddd; font-size: 12px; margin-bottom: 10px; padding:8px 0 0' class='nav-item checkbox checkbox-primary'>
              <a class='nav-link'>
                <label>
                  <input ";
          if (isset($aCat[$cat_id])) {
            echo "checked='checked'";
          }
          echo " type='checkbox' value='$cat_id' name='cat' style='cursor:pointer;' class='get_cat' id='cat'>
                  <span style='cursor:pointer;'>
                    $cat_image
                    $cat_title
                  </span>
                </label>
              </a>
            </li>
            ";
        }
        $get_cat = "SELECT * FROM `categories` WHERE `cat_top`='no'";
        $run_cat = mysqli_query($conn, $get_cat);
        while ($row_cat = mysqli_fetch_array($run_cat)) {
          $cat_id = $row_cat['cat_id'];
          $cat_title = $row_cat['cat_title'];
          $cat_image = $row_cat['cat_image'];
          if ($cat_image == "") {
          } else {
            $cat_image = "&nbsp;<img src='admin_area/other_images/$cat_image' width='20'>&nbsp;";
          }
          echo "
            <li style='font-size: 12px; margin-bottom: 10px; padding:8px 0 0' class='nav-item checkbox checkbox-primary'>
              <a class='nav-link'>
                <label>
                  <input ";
          if (isset($aCat[$cat_id])) {
            echo "checked='checked'";
          }
          echo " type='checkbox' value='$cat_id' name='cat' style='cursor:pointer;' class='get_cat' id='cat'>
                  <span style='cursor:pointer;'>
                    $cat_image
                    $cat_title
                  </span>
                </label>
              </a>
            </li>
            ";
        }
        ?>
      </ul>
    </div>
  </div>
</div>