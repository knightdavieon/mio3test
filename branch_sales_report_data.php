<?php require_once('Connection.php'); ?>
<?php
date_default_timezone_set('Asia/Manila');
$day = date('d');
$month = date('m');
$year = date('Y');
$fullDate = $month . "/" . $day . "/" . $year;

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title> Mio || Item Registration</title>
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

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- Wait Me Css -->
    <link href="plugins/waitme/waitMe.css" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />

  <!-- <link rel="stylesheet"  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  -->
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
       <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css" />
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/fixedheader/3.1.3/js/dataTables.fixedHeader.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.1/js/responsive.bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />

     <!-- End of DataTable CDN -->

     <!-- Font Awesome CDN -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
     <!-- End of Font Awesome -->
</head>

<body class="theme-black">
         <?php include("top_header.php"); ?>
           <!-- Menu -->
             <?php include("navigation_bar.php"); ?>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2018 <a href="javascript:void(0);">Silverworks.com</a>.
                </div>
                <div class="version">
                    <b>Developed by: </b> John Alfonso Gamboa
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
           <!-- Rigth Side Bar -->

        <!-- #END# of Right Side Bar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">

            </div>
            <!-- Input -->
               <!-- Item Information Form -->
                <a href="branch_sales_report_page.php" style="height:30px;width:70px;padding-top:0px;" class="btn btn-warning"><i class="material-icons" style="margin-left:-2px;"> arrow_back </i> Back </a>
                   <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                                <h2><i class="material-icons"> info</i> Information </h2>
                           </div>

                         <div class="body">
                            <h2 class="card-inside-title"></h2>
                            <div class="row clearfix">
                           <div class="col-md-12 col-sm-10 col-xs-10">
                                   <?php
                                       $info_query = "Select * from tbl_sales_series where transaction_number = '" . mysqli_real_escape_string($conn, $_GET['scode']) .  "' and branch = '" . mysqli_real_escape_string($conn, $_GET['bcode']) . "'";
                                       $info_result = mysqli_query($conn, $info_query);
                                       $info_rows = mysqli_fetch_array($info_result);
                                       $items_query = "Select * from tbl_sales where transaction_number = '" . mysqli_real_escape_string($conn, $_GET['scode']) .  "' and branch = '" . mysqli_real_escape_string($conn, $_GET['bcode']) . "'";
                                       $items_result = mysqli_query($conn, $items_query);
                                       $items_count = mysqli_num_rows($items_result);
                                       $total_query = "Select Sum(total)as t_data from tbl_sales where transaction_number = '" . mysqli_real_escape_string($conn, $_GET['scode']) .  "' and branch = '" . mysqli_real_escape_string($conn, $_GET['bcode']) . "'";
                                       $total_result = mysqli_query($conn, $total_query);
                                       $total_rows = mysqli_fetch_array($total_result);

                                   ?>
                                      <div class="col-md-4 col-lg-5 col-sm-5 col-xs-5">
                                            <label> Staff Code  : </label>
                                         </div>
                                          <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                                            <label> <?php echo $info_rows['staff_code']; ?> </label>
                                         </div>
                                          <div class="col-md-4 col-lg-5 col-sm-5 col-xs-5">
                                            <label> Staff Name : </label>
                                         </div>
                                          <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                                            <label> <?php echo $info_rows['staff_name']; ?> </label>
                                         </div>
                                          <div class="col-md-4 col-lg-5 col-sm-5 col-xs-5">
                                            <label> Branch : </label>
                                         </div>
                                          <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                                            <label> <?php echo $info_rows['branch']; ?> </label>
                                         </div>
                                         <div class="col-md-4 col-lg-5 col-sm-5 col-xs-5">
                                            <label> Invoice Number  : </label>
                                         </div>
                                          <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                                            <label> <?php echo $info_rows['invoice_number']; ?>  </label>
                                         </div>
                                         <div class="col-md-4 col-lg-5 col-sm-5 col-xs-5">
                                            <label> Customer Name  : </label>
                                         </div>
                                          <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                                            <label>  <?php echo (!isset($info_rows['customer_name'])) ? $info_rows['customer_name'] : '--'; ?>  </label>
                                         </div>
                                         <?php
                                         if($info_rows['payment_method'] == "cash"){
                                         ?>
                                          <div class="col-md-4 col-lg-5 col-sm-5 col-xs-5">
                                            <label> Customer Cash : </label>
                                         </div>
                                          <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                                            <label style="color:#e60000;"> <small>  <?php echo "P". $info_rows['customer_cash']; ?> </small></label>
                                         </div>
                                         <?php }else{
                                          ?>
                                           <div class="col-md-4 col-lg-5 col-sm-5 col-xs-5">
                                            <label> Card Number : </label>
                                         </div>
                                          <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                                            <label> <small>  <?php echo $info_rows['card_number']; ?> </small></label>
                                         </div>
                                           <div class="col-md-4 col-lg-5 col-sm-5 col-xs-5">
                                            <label> CW : </label>
                                         </div>
                                          <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                                            <label> <small>  <?php echo $info_rows['c_cw']; ?> </small></label>
                                         </div>
                                           <div class="col-md-4 col-lg-5 col-sm-5 col-xs-5">
                                            <label> Expiration : </label>
                                         </div>
                                          <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                                            <label> <small>  <?php echo $info_rows['c_expiration']; ?> </small></label>
                                         </div>
                                          <?php
                                         } ?>

                                         <div class="col-md-4 col-lg-5 col-sm-5 col-xs-5">
                                            <label> Sold Items : </label>
                                         </div>
                                          <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                                            <label> <small>  <?php echo $items_count; ?> </small></label>
                                         </div>
                                          <div class="col-md-4 col-lg-5 col-sm-5 col-xs-5">
                                            <label> Total : </label>
                                         </div>
                                          <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                                            <label style="color:#ff0000;"> <small>  <?php echo "P". $total_rows['t_data']; ?> </small></label>
                                         </div>
                               </div> <!-- End of Row Division -->
                             </div>



                            </div>

                           </div>

                        </div>

                    </div>
            <!-- #END#  Item information -->
            <!-- Transfered Items Form -->
            <!--
                   <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">


                         <div class="body">
                            <h2 class="card-inside-title"></h2>
                            <div class="row clearfix">
                           <div class="col-md-12 col-sm-10 col-xs-10">
                                    <button type="button" class="btn btn-warning" style="height:30px;padding-top:0px;"><i class="material-icons"> print </i> Print Preview </button>
                                    <button type="button" class="btn btn-success" style="height:30px;padding-top:0px;"><i class="material-icons">grid_on </i> Export as CSV </button>
                                    <button type="button" class="btn btn-danger" style="height:30px;padding-top:0px;"><i class="material-icons">picture_as_pdf </i> Export as PDF </button>
                               </div> <!-- End of Row Division -->
                          <!--   </div>



                            </div>

                           </div>

                        </div>

                    </div> -->
            <!-- #END# of transfered items -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                   <i class="material-icons"> store </i> Sales Record
                            </h2>

                        </div>

                         <div class="body">
                            <h2 class="card-inside-title"></h2>
                            <div class="row clearfix">
                           <div class="col-md-12 col-sm-10 col-xs-10">
                                 <style type="text/css">
                                       table.dataTable thead th{
                                            background-color:gray;
                                            color:#fff;
                                            opacity:0.7;
                                       }
                                    </style>
                                     <table class="table table-bordered table-striped" id="r_items">
                                             <thead>
                                                   <tr>
                                                         <th> Item Barcode </th>
                                                         <th> Item Name </th>
                                                         <th> Quantity </th>
                                                         <th> Price </th>
                                                         <th> Transaction Date </th>

                                                      </tr>
                                                </thead>
                                                <tbody>
                                                     <?php
                                                        $data_query = "Select * from tbl_sales where transaction_number = '" . mysqli_real_escape_string($conn, $_GET['scode']) .  "' and branch = '" . mysqli_real_escape_string($conn, $_GET['bcode']) . "'";
                                                        $data_result = mysqli_query($conn, $data_query);
                                                        while($data_rows = mysqli_fetch_array($data_result)){
                                                             ?>
                                                         <tr>
                                                               <td><?php echo $data_rows['item_barcode']; ?></td>
                                                               <td><?php echo $data_rows['item_name']; ?></td>
                                                               <td><?php echo $data_rows['quant']; ?></td>
                                                               <td><?php echo $data_rows['price']; ?></td>
                                                               <td><?php echo $data_rows['date_transaction']; ?></td>

                                                         </tr>
                                                            <?php
                                                        }
                                                     ?>

                                                   </tbody>
                                        </table>
                               </div> <!-- End of Row Division -->
                             </div>



                            </div>

                           </div>
                          <a href="branch_sales_report_page.php" style="margin-bottom: 25px; height:30px;padding-top:0;" class="btn btn-warning"><i class="material-icons" style="margin-left:-2px;"> arrow_back </i> Back </a>
                        </div>

                    </div>
                </div>
            </div>

     </div>
    </section>
        <script>
        $(document).ready(function(){
            $('#r_items').DataTable({
                responsive:true
            });
        });

          </script>


                             </div> <!-- End of Button DIV -->


    <!-- Jquery Core Js -->


    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Autosize Plugin Js -->
    <script src="plugins/autosize/autosize.js"></script>

    <!-- Moment Plugin Js -->
    <script src="plugins/momentjs/moment.js"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/forms/basic-form-elements.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
</body>
</html>
