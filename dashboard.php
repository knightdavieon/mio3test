<?php require_once('Connection.php');
date_default_timezone_set('Asia/Manila');
$day = date('d');
$month = date('m');
$year = date('Y');
$fullDate = $month . "/" . $day . "/" . $year;
//echo '<script type="text/javascript"> alert("'.$fullDate.'"); </script>';
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <title> Mio-mio || Dashboard</title>
  <!-- Favicon-->
  <link rel="icon" href="favicon.ico" type="image/x-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

  <!-- Bootstrap Core Css -->
  <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

  <!-- Waves Effect Css -->
  <link href="plugins/node-waves/waves.css" rel="stylesheet" />

  <!-- Animation Css -->
  <link href="plugins/animate-css/animate.css" rel="stylesheet" />

  <!-- Morris Chart Css-->
  <link href="plugins/morrisjs/morris.css" rel="stylesheet" />

  <!-- Custom Css -->
  <link href="css/style.css" rel="stylesheet">

  <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
  <link href="css/themes/all-themes.css" rel="stylesheet" />
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
</head>

<body class="theme-black">
  <?php include('top_header.php');  ?>
  <!-- Menu -->
  <?php include("navigation_bar.php"); ?>
  <!-- #Menu -->
  <!-- Footer -->
  <div class="legal">
    <div class="copyright">
      &copy;  <a href="javascript:void(0);">Silverworks.com</a> <label> 2018 </label> <br/>
      <!-- <label> Developed by :  </label> John Alfonso Gamboa -->
    </div>

  </div>
  <!-- #Footer -->
</aside>
<!-- #END# Left Sidebar -->
<?php include("skins.php"); ?>
</section>

<section class="content" style="margin-top:4%;">
  <div class="container-fluid">
    <div class="block-header">
      <h2>DASHBOARD</h2>
    </div>

    <!-- Widgets -->

    <div class="col-lg-3 col-md-3 col-sm-
    6 col-xs-12">
    <div class="info-box bg-pink hover-expand-effect">
      <div class="icon">
        <i class="material-icons">playlist_add_check</i>
      </div>
      <div class="content">
        <div class="text">Today's Sales</div>

        <!-- <div class="number count-to" data-from="0" data-to="0" data-speed="15" data-fresh-interval="20"></div> -->
        <?php
        $swho_total_query = "Select Sum(total)as f_total from tbl_sales where date_transaction= '" . $fullDate . "'";
        $swho_total_result = mysqli_query($conn, $swho_total_query)or die('<script type="text/javascript"> alert("'.mysqli_error($conn).'") </script>');
        $swho_total_rows = mysqli_fetch_array($swho_total_result);
        $branch_total_query = "Select Sum(total)as b_total from tbl_sales where branch = '" . $_SESSION['b_code'] . "' and date_transaction = '" . $fullDate . "'";
        $branch_total_result = mysqli_query($conn, $branch_total_query)or die('<script type="text/javascript"> alert("'.mysqli_error($conn).'") </script>');
        $branch_total_rows = mysqli_fetch_array($branch_total_result);
        ?>
        <div class="number count-to" <?php echo ($_SESSION['b_code'] == "SWHO") ? 'data-to="'. $swho_total_rows['f_total'] .'"' : 'data-to="' . $branch_total_rows['b_total'] . '"';  ?> data-from="0" data-speed="15" data-fresh-interval="20"></div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-cyan hover-expand-effect">
      <div class="icon">
        <i class="material-icons">favorite</i>
      </div>
      <div class="content">
        <div class="text">Users</div>
        <?php
        if($_SESSION['b_code'] == "SWHO"){
          $data_query = "Select * from tbl_users";
          $data_result = mysqli_query($conn, $data_query)or die('<script type="text/javascript"> alert("'.mysqli_error($conn).'") </script>');
          $data_count = mysqli_num_rows($data_result);
          ?>
          <div class="number count-to" data-from="0" data-to="<?php echo $data_count ?>" data-speed="1000" data-fresh-interval="20"></div>
          <?php
        }else{
          $data_query = "Select * from tbl_users where b_code = '" . $_SESSION['b_code'] . "'";
          $data_result = mysqli_query($conn, $data_query)or die('<script type="text/javascript"> alert("'.mysqli_error($conn).'") </script>');
          $data_count = mysqli_num_rows($data_result);
          ?>
          <div class="number count-to" data-from="0" data-to="<?php echo $data_count ?>" data-speed="1000" data-fresh-interval="20"></div>
          <?php
        }
        ?>

      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-light-green hover-expand-effect">
      <div class="icon">
        <i class="material-icons">forum</i>
      </div>
      <div class="content">
        <?php
        if($_SESSION['b_code'] == "SWHO"){
          $approval_query = "Select * from tbl_branch_transfer_series where transfer_status = '" . "PENDING" . "'";
          $approval_result = mysqli_query($conn, $approval_query);
          $approval_count = mysqli_num_rows($approval_result);
          ?>
          <div class="text">Approvals</div>
          <div class="number count-to" data-from="0" data-to="<?php echo $approval_count; ?>" data-speed="1000" data-fresh-interval="20"></div>

          <?php
        }else{
          $approval_query = "Select * from tbl_transaction_series where transfer_status = '" . "PENDING" . "' and branch_name = '" . $_SESSION['b_code'] . "'";
          $approval_result = mysqli_query($conn, $approval_query);
          $approval_count = mysqli_num_rows($approval_result);
          $for_branch_query = "Select * from tbl_branch_transfer_series where transfer_status = '" . "PENDING" . "' and transfer_to = '" . $_SESSION['b_code'] . "'";
          $for_branch_result = mysqli_query($conn, $for_branch_query);
          $for_branch_count = mysqli_num_rows($for_branch_result);
          $total_fr = $approval_count + $for_branch_count;
          ?>
          <div class="text">Receiving</div>
          <div class="number count-to" data-from="0" data-to="<?php echo $total_fr; ?>" data-speed="1000" data-fresh-interval="20"></div>

          <?php
        }
        ?>
      </div>
    </div>
  </div>
  <?php
  if($_SESSION['b_code'] == "SWHO"){
    $branches_query = "Select * from tbl_branches";
    $branches_result = mysqli_query($conn, $branches_query);
    $branches_count = mysqli_num_rows($branches_result);
    ?>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
      <div class="info-box bg-orange hover-expand-effect">
        <div class="icon">
          <i class="material-icons">person_add</i>
        </div>
        <div class="content">
          <div class="text">Branches</div>
          <div class="number count-to" data-from="0" data-to="<?php echo $branches_count; ?>" data-speed="1000" data-fresh-interval="20"></div>
        </div>
      </div>
    </div>
    <?php
  }
  ?>

</div>
<!-- #END# Widgets -->


<!-- Browser Usage -->
<div class="row ">
  <div class="col-md-6">
    <div class="card" style="height:280px;">
      <div class="header">
        <h2>
          <i class="material-icons"> attach_money</i> Today's Sales
        </h2>

      </div>

      <div class="body">
        <h2 class="card-inside-title"></h2>
        <div class="row ">
          <div class="col-md-12 col-sm-12 col-xs-12">


            <table class="table table-hover dashboard-task-infos">
              <thead>
                <tr>
                  <th>All Branches Sales</th>
                  <th> Total Sales </th>
                </tr>
              </thead>
              <tbody>
                <?php
                if($_SESSION['b_code'] == "SWHO"){

                  $total_sales_query = "Select Sum(total)as ts_sales from tbl_sales where date_transaction = '" . $fullDate . "'";
                  $total_sales_result = mysqli_query($conn, $total_sales_query);
                  $total_sales_rows = mysqli_fetch_array($total_sales_result);
                  ?>
                  <tr>
                    <td> Sum up sales </td>
                    <td><label style="color:#ff0000;"><small><?php echo (!empty($total_sales_rows['ts_sales'])) ? "₱ " . $total_sales_rows['ts_sales'] : '₱ 0'; ?></small> </label></td>
                  </tr>
                  <?php
                }else{
                  $total_sales_query = "Select Sum(total)as ts_sales from tbl_sales where branch = '" . $_SESSION['b_code'] . "' and date_transaction = '" . $fullDate . "'";
                  $total_sales_result = mysqli_query($conn, $total_sales_query);
                  $total_sales_rows = mysqli_fetch_array($total_sales_result);
                  ?>
                  <tr>
                    <td> Sum up sales </td>
                    <td><label style="color:#ff0000;"><small><?php echo (!empty($total_sales_rows['ts_sales'])) ? "₱ " . $total_sales_rows['ts_sales'] : '₱ 0'; ?></small> </label></td>
                  </tr>

                  <?php
                }
                ?>
              </tbody>
            </table>

          </div> <!-- End of Row Division -->

        </div>
        <a <?php echo ($_SESSION['b_code'] == "SWHO") ? 'href="sales_reports.php"' : 'href="branch_sales_report_page.php"'; ?> class="btn btn-info" style="height:30px;padding-top:0;"> <i class="material-icons"> remove_red_eye </i> View Transactions </a>
      </div>

    </div>



  </div>

  <!-- Task Info -->

    <div class="col-md-6">
      <div class="card">
        <div class="header">
          <h2>
            <i class="material-icons">info_outline </i> Information
          </h2>
        </div>

        <div class="body">
          <h2 class="card-inside-title"></h2>
          <div class="row ">
            <div class="col-md-12 col-sm-10 col-xs-10">
              <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <label> Having a trouble in using this website ? </label>
                <p> We got you back, To use this website we prepared a documentation for the new users of this system. So that it would not be a trouble for familiarizing the system. Just click <a href="#"> here </a> to see the documentation we've provided just for you. </p>
              </div>
            </div> <!-- End of Row Division -->
          </div>



        </div>

      </div>

    </div>

  </div>


<form method="post" action="dashboard.php" enctype="multipart/form-data">

  <!-- Sales History Form -->
  <div class="row ">
    <div class="col-lg-12 col-md-12 col-sm-11 col-xs-12">
      <div class="card">
        <div class="header">
          <h2>
            <i class="material-icons"> show_chart </i> Sales Graph
          </h2>

        </div>

        <div class="body">
          <h2 class="card-inside-title"></h2>
          <div class="row clearfix">
            <div class="col-md-4 col-lg-4 col-xs-5 col-sm-5">
              <?php
              if($_SESSION['b_code'] == "SWHO"){
                ?>

              </div>


              <div class="col-md-12 col-sm-10 col-xs-10">
                <div id="sales_chart"> </div>


                <script type="text/javascript">

                google.load("visualization", "1", {packages:["corechart"]});
                google.setOnLoadCallback(drawChart);
                function drawChart(){
                  var data = new google.visualization.DataTable();
                  var data = google.visualization.arrayToDataTable([
                    ['Branch Code', 'Total Sales'],
                    <?php
                    $b_query = "Select * from tbl_sales where date_transaction = '" . $fullDate . "'";
                    $b_result = mysqli_query($conn, $b_query);
                    while($b_rows = mysqli_fetch_array($b_result)){
                      echo "['" . $b_rows['branch'] . "'," . $b_rows['total'] . "],";
                    }

                    ?>
                  ]);
                  var options = {
                    title: 'Branch Sales'
                  };
                  var chart = new google.visualization.LineChart(document.getElementById('sales_chart'));
                  chart.draw(data, options);
                }
              </script>
              <?php

            }else{
              ?>
              <!-- Time Script -->
              <script type="text/javascript">
              function change_function(){
                var d = new Date(document.getElementById("search_date").value);
                var dd = d.getDate();
                var mn = d.getMonth();
                var year = d.getFullYear();
                mn++;
                if(dd < 10){
                  dd = "0"+ dd;
                }
                if(mn < 10){
                  mn = "0" + mn;
                }
                var fdate = mn + "/" + dd + "/" + year;
                document.getElementById("date_value").value = fdate;
              }
              </script>
              <!-- #END# Time Script -->


              <div class="col-md-12 col-lg-12 col-sm-10 col-xs-10">
                <div id="sales_chart" style="width:800px"> </div>
                <script type="text/javascript">

                google.load("visualization", "1", {packages:["corechart"]});
                google.setOnLoadCallback(drawChart);
                function drawChart(){
                  var data = new google.visualization.DataTable();
                  var data = google.visualization.arrayToDataTable([
                    ['Branch Code', 'Total Sales'],
                    <?php

                    $e_ts_querys = "Select * from tbl_sales where date_transaction = '" . $fullDate . "' and branch = '" . $_SESSION['b_code'] . "'";
                    $e_ts_result = mysqli_query($conn, $e_ts_querys);
                    while($e_ts_rows = mysqli_fetch_array($e_ts_result)){
                      echo "['" . $e_ts_rows['staff_name'] . "'," . $e_ts_rows['total'] . "],";
                    }
                    ?>
                  ]);
                  var options = {
                    title: 'Branch Sales'
                  };
                  var chart = new google.visualization.LineChart(document.getElementById('sales_chart'));
                  chart.draw(data, options);
                }
              </script>

            </div>

          <?php  } ?>
          <input type="hidden" id="date_value" name="date_value">
        </div> <!-- End of Row Division -->
      </div>



    </div>

  </div>

</div>

</div>
</div>
</form>
<!-- #END# Sales History-->

<!-- #END# Task Info -->
</div>
</div>
<!-- #END# Browser Usage -->

</div>

</section>

<!-- Jquery Core Js -->
<script src="plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="plugins/node-waves/waves.js"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="plugins/jquery-countto/jquery.countTo.js"></script>

<!-- Morris Plugin Js -->
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/morrisjs/morris.js"></script>

<!-- ChartJs -->
<script src="plugins/chartjs/Chart.bundle.js"></script>

<!-- Flot Charts Plugin Js -->
<script src="plugins/flot-charts/jquery.flot.js"></script>
<script src="plugins/flot-charts/jquery.flot.resize.js"></script>
<script src="plugins/flot-charts/jquery.flot.pie.js"></script>
<script src="plugins/flot-charts/jquery.flot.categories.js"></script>
<script src="plugins/flot-charts/jquery.flot.time.js"></script>

<!-- Sparkline Chart Plugin Js -->
<script src="plugins/jquery-sparkline/jquery.sparkline.js"></script>

<!-- Custom Js -->
<script src="js/admin.js"></script>
<script src="js/pages/index.js"></script>

<!-- Demo Js -->
<script src="js/demo.js"></script>
</body>

</html>
