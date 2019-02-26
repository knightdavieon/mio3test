<?php session_start(); require_once("Connection.php"); ?>

<!-- PROMOTIONAL SALES FUNCTION -->
<?php
date_default_timezone_set('Asia/Manila');
$fulldate = date('d') . "/" . date('m') . "/" . date('Y');
$time = date('H');
//echo '<script type="text/javascript"> alert("'. $time .'"); </script>';
$array = array();
$p_query = mysqli_query($conn, "Select * from tbl_promotional_sales");

while($p_rows = mysqli_fetch_array($p_query)){
  $array[] = $p_rows;
}
foreach($array as $frows){
  if($frows['status'] == "ACTIVE"){
    if($frows['set_date'] <= $fulldate && $frows['end_date'] >= $frows['set_date']){

      if($frows['set_time'] <= $time){
        // echo '<script type="text/javascript"> alert("' . "SET : " . $frows['set_date'] . " | END : " . $frows['end_date'] .'"); </script>';
        $update_query = mysqli_query($conn, "Update tbl_branch_goods_receive set item_price = '" . $frows['deducted_price'] . "' where item_barcode = '" . $frows['item_barcode'] . "' and branch_name = '" . $frows['branch'] . "'")or die('<script type="text/javascript"> alert("'. mysqli_error($conn) .'") </script>');
        $update_reg_promo = mysqli_query($conn, "Update tbl_promotional_sales_reg set active_status = '" . "ON" . "' where entry_num = '" . $frows['entry_num'] . "'");
        if($update_query === true){
          // echo '<script type="text/javascript"> alert("Applied Successfully"); </script>';
        }
      }
    }
    if($frows['end_date'] <= $fulldate  && $frows['end_date'] >= $frows['set_date']){
      if($frows['end_time'] <= $time){
        $update_query = mysqli_query($conn, "Update tbl_promotional_sales set status = '" . "EXPIRED" . "' where  uid = '" . $frows['uid'] . "'");
        $update_price = mysqli_query($conn, "Update tbl_branch_goods_receive set item_price = '" . $frows['original_price'] . "' where item_barcode = '" . $frows['item_barcode'] . "' and branch_name = '" . $frows['branch'] . "'")or die('<script type="text/javascript"> alert("'. mysqli_error($conn) .'") </script>');
        $update_reg = mysqli_query($conn, "Update tbl_promotional_sales_reg set status = '" . "EXPIRED" . "' where entry_num = '" . $frows['entry_num'] . "'");
        if($update_price === true){
          // Message if ever
          // echo '<script type="text/javascript"> alert("Applied Successfully"); </script>';
        }
      }
    }
  }
}
?>
<!-- END -->
<!-- Page Loader -->

<div class="page-loader-wrapper">
  <div class="loader">
    <div class="preloader">
      <div class="spinner-layer pl-red">
        <div class="circle-clipper left">
          <div class="circle"></div>
        </div>
        <div class="circle-clipper right">
          <div class="circle"></div>
        </div>
      </div>
    </div>
    <p>Please wait...</p>
  </div>
</div>


<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- Search Bar -->
<div class="search-bar">
  <div class="search-icon">
    <i class="material-icons">search</i>
  </div>
  <input type="text" placeholder="START TYPING...">
  <div class="close-search">
    <i class="material-icons">close</i>
  </div>
</div>
<!-- #END# Search Bar -->
<!-- Top Bar -->
<nav class="navbar">
  <div class="container-fluid">

    <div class="navbar-header">
      <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
      <a href="javascript:void(0);" class="bars"></a>
      <a class="navbar-brand" href="#"> <img src="Icons/swLogowWarehouse.png" style="height:56px;margin-top:-20px;"></a>
    </div>
    <div class="collapse navbar-collapse" id="navbar-collapse">
      <ul class="nav navbar-nav navbar-right">

        <!-- Notifications -->
        <li class="dropdown">
          <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
            <i class="material-icons">notifications</i>



          </a>
          <ul class="dropdown-menu">
            <li class="header">NOTIFICATIONS</li>
            <li class="body">
              <ul class="menu">

                <?php
                if($_SESSION['b_code'] == "SWHO"){
                  echo var_dump($_SESSION['b_code']);
                  ?>

                  <li>
                    <?php
                    $i_query = "Select * from tbl_branch_transfer_series where transfer_status = '" . "PENDING" . "'";
                    $i_result = mysqli_query($conn, $i_query);
                    while($i_rows = mysqli_fetch_array($i_result)){
                      ?>
                      <a href="approval_page_data.php?icode=<?php echo $i_rows['transaction_number']; ?>">
                        <div class="menu-info">
                          <h4><?php echo "TS : ". $i_rows['transaction_number']; ?></h4>
                          <label><?php echo "Item From : " . $i_rows['branch_code']; ?></label>
                          <label> <small> Approval </small> </label>
                        </div>
                      </a>
                      <?php
                    }
                    ?>
                  </li>

                  <?php
                }else{
                  ?>

                  <li>
                    <?php
                    $i_query = "Select * from tbl_transaction_series where branch_name = '" . $_SESSION['b_code'] . "' and transfer_status = '" . "PENDING" . "'";
                    $i_result = mysqli_query($conn, $i_query);
                    while($i_rows = mysqli_fetch_array($i_result)){
                      ?>
                      <a href="branch_receiving_commit.php?trans_num=<?php echo $i_rows['transfer_number']; ?>" style="cursor:pointer;">
                        <div class="menu-info">
                          <h4><?php echo "TS : ". $i_rows['transfer_number']; ?></h4>
                          <label><?php echo "Item From : SWHO    "; ?></label><br/>
                          <label> <small> Goods Receive </small> </label>
                        </div>
                      </a>

                      <?php
                    }
                    ?>
                  </li>
                  <?php
                }
                ?>



              </ul>
            </li>
            <li class="footer">
              <a <?php echo ($_SESSION['b_code'] == "SWHO") ? 'href="approval_page.php"' : 'href="branch_receiving_page.php"'; ?>>View All Notifications</a>
            </li>
          </ul>
        </li>
        <!-- #END# Notifications -->


      </ul>
    </div>
  </div>
</nav>
<!-- #Top Bar -->
<section>
  <!-- Left Sidebar -->
  <aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
      <div class="image">
        <div style="background-color:#fff;border-radius:100px;height:50px;width:50px;padding-top:6px;padding-left:7px;">
          <img src="Icons/SWLogoIcon.png" width="35" height="35" alt="User" />
        </div>
      </div>
      <?php
      /*   $query = "Select * from tbl_users where b_staff_code = '" . $_SESSION['b_staff_code'] . "' and b_password = '" . $_SESSION['b_password'] . "'";
      $result = mysqli_query($conn, $query);
      $rows = mysqli_fetch_array($result);
      $_SESSION['b_code'] = $rows['b_code'];
      $_SESSION['usertype'] = $rows['b_user_type'];
      $_SESSION['fullname'] = $rows['b_name'] . " " . $rows['b_lastname'];

      */
      ?>
      <div class="info-container" style="margin-top:-18px">
        <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['fullname']; ?></div>
        <div class="email"><?php echo $_SESSION['email']; ?></div>
        <div class="email"> Branch : <label> <?php echo $_SESSION['b_code']; ?> </label> </div>
        <div class="btn-group user-helper-dropdown">
          <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
          <ul class="dropdown-menu pull-right">

            <li role="seperator" class="divider"></li>
            <?php
            if($_SESSION['b_code'] != "SWHO"){
              ?>
              <li><a href="sales_profile.php"><i class="material-icons">person</i>Profile</a></li>
              <li role="seperator" class="divider"></li>

              <li role="seperator" class="divider"></li>
              <?php
            }
            ?>


            <li><a href="logout_destroy.php"><i class="material-icons">input</i>Sign Out</a></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- #User Info -->
