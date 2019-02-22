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
                    &copy;  <a href="javascript:void(0);">Silverworks.com</a> <label> 2018 </label>
                </div>
                <div class="version">
                   
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
            <a href="transfer_stocks_reports.php" class="btn btn-warning" style="height:30px;padding-top:0;"><i class="material-icons"> arrow_back</i> Back </a>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                 <i class="material-icons"> move_to_inbox </i> Transfer Stocks
                            
                                <small> <i> " List of transactions which has been transfered across the branches " </i> </small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        
                         <div class="body">
                            <h2 class="card-inside-title"></h2>
                            <div class="row clearfix">
                           <div class="col-md-12 col-sm-10 col-xs-10">
                                 <?php 
                                     $ts_info_query = "Select * from tbl_transfer_history where transaction_number = '" . $_GET['r_id'] . "'";
                                     $ts_info_result = mysqli_query($conn, $ts_info_query)or die('<script type="text/javascript"> ' . mysqli_error($conn) . ' </script>');
                                     $ts_info_rows = mysqli_fetch_array($ts_info_result);
                                     $ts_count_price_query = "Select * from tbl_transfer_history where transaction_number = '" . $_GET['r_id'] . "'";
                                     $ts_count_price_result = mysqli_query($conn, $ts_count_price_query);
                                     $array = array();
                                     $total_array = array();
                                     while($ts_count_price_rows = mysqli_fetch_array($ts_count_price_result)){
                                       $array[] = $ts_count_price_rows;
                                     }
                                     foreach($array as $tf_value){
                                         $total_array[] = $tf_value['item_price'];
                                     }
                                 ?>
                                       <div class="col-md-5 col-lg-5 col-xs-5 col-sm-5">
                                               <label> TS Number :  </label> 
                                          </div>
                                          <div class="col-md-5 col-lg-5 col-xs-5 col-sm-5">
                                               <label> <?php echo $_GET['r_id']; ?>  </label> 
                                          </div>
                                          <div class="col-md-5 col-lg-5 col-xs-5 col-sm-5">
                                               <label> Transfered By :  </label> 
                                          </div>
                                          <div class="col-md-5 col-lg-5 col-xs-5 col-sm-5">
                                               <label>  <?php echo $ts_info_rows['person_transfered']; ?> </label> 
                                          </div>
                                          <div class="col-md-5 col-lg-5 col-xs-5 col-sm-5">
                                               <label> Transfer To :  </label> 
                                          </div>
                                          <div class="col-md-5 col-lg-5 col-xs-5 col-sm-5">
                                               <label>  <?php echo $ts_info_rows['branch']; ?> </label> 
                                          </div>
                                          <div class="col-md-5 col-lg-5 col-xs-5 col-sm-5">
                                               <label> Item Status  :  </label> 
                                          </div>
                                          <div class="col-md-5 col-lg-5 col-xs-5 col-sm-5">
                                               <label> <?php 
                                               if($ts_info_rows['item_status'] == "ACTIVE"){
                                                ?>
                                                <label style="color:#008000;"><small> ACTIVE </small> </label>
                                            <?php                                                   
                                               }else{
                                              ?>
                                              <label style="color:#990000;"><small> DEACTIVE </small></label>
                                            <?php
                                               }
                                             ?> 
                                          </div>
                                          <div class="col-md-5 col-lg-5 col-xs-5 col-sm-5">
                                               <label> Total :  </label> 
                                          </div>
                                          <div class="col-md-5 col-lg-5 col-xs-5 col-sm-5">
                                               <label> <?php echo "P".  array_sum($total_array); ?>   </label> 
                                          </div>
                               </div> <!-- End of Row Division -->     
                             </div>
                       
                             
                      
                            </div>
                            
                           </div>
         <!-- Second Form -->

         <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                       
                        
                         <div class="body">
                            <h2 class="card-inside-title"></h2>
                            <div class="row clearfix">
                           <div class="col-md-12 col-sm-10 col-xs-10">
                                    <a href="swho_print_transfer.php?r_id=<?php echo stripslashes($_GET['r_id']); ?>" target="_blank" class="btn btn-warning" style="height:30px;padding-top:0;"><i class="material-icons"> print </i> Print Preview</a> 
                                  <!--  <a href="#" class="btn btn-success"><i class="material-icons">grid_on</i> Export as CSV </a>   --> 
                                    <a href="swho_transfer_pdf.php?r_id=<?php echo stripslashes($_GET['r_id']); ?>" target="_blank" class="btn btn-danger" style="height:30px;padding-top:0;"><i class="material-icons">picture_as_pdf</i> Export as pdf</a>   
                                    
                               </div> <!-- End of Row Division -->     
                             </div>
                       
                             
                      
                            </div>
                            
                           </div>
                         
                        </div>
                        
                    </div>
                </div>
            </div>
     <!-- #END# of second form -->
     <!-- Third Form -->

         <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <i class="material-icons"> move_to_inbox </i>  Items under of transaction number <?php echo $_GET['r_id']; ?>
                            
                                <small> <i> " Here are the list of items under this transaction number " </i> </small>
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
                                     <table id="r_items" class="table table-striped table-bordered">
                                           <thead>
                                                  <tr>
                                                      <th> TS Number </th>
                                                      <th> Item Barcode </th>
                                                      <th> Item Name</th>
                                                      <th> Category </th>
                                                      <th> Sub Category </th>
                                                      <th> Quantity </th>
                                                      <th> Price </th>
                                                      <th> Remarks </th>
                                                      <th> Transfered by </th>
                                                      <th> Employee Code </th>
                                                      <th> TS Type </th>
                                                      <th> Date Transfered </th>
                                                      
                                                    </tr>
                                              </thead>
                                             <tbody>
                                                      <?php 
                                                      $trans_query = "Select * from tbl_transfer_history where transaction_number = '" . $_GET['r_id'] . "'";
                                                      $trans_result = mysqli_query($conn, $trans_query)or die('<script type="text/javascript"> '. mysqli_error($conn) . ' </script>');
                                                      while($trans_rows = mysqli_fetch_array($trans_result)){
                                                      ?>
                                                       <tr>
                                                            <td><?php echo $trans_rows['transaction_number']; ?></td>
                                                            <td><?php echo $trans_rows['item_barcode']; ?></td>
                                                            <td><?php echo $trans_rows['item_name']; ?></td>
                                                            <td><?php echo $trans_rows['cat']; ?></td>
                                                            <td><?php echo $trans_rows['sub_category']; ?></td>
                                                            <td><?php echo $trans_rows['item_quant']; ?></td>
                                                            <td><?php echo $trans_rows['item_price']; ?></td>
                                                            <td><?php echo $trans_rows['remarks']; ?></td>
                                                            <td><?php echo $trans_rows['person_transfered']; ?></td>
                                                            <td><?php echo $trans_rows['employee_code']; ?></td>
                                                            <td><?php echo $trans_rows['ts_type']; ?></td>
                                                            <td><?php echo $trans_rows['date_received']; ?></td>

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
                         
                    <a href="transfer_stocks_reports.php" class="btn btn-warning" style="height:30px;padding-top:0;"><i class="material-icons"> arrow_back </i> Back </a> 
                        </div>
                        
                    </div>
                </div>
            </div>
     <!-- #END# of Third form -->
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