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
            <a href="branch_receiving_items.php" class="btn btn-warning"><i class="material-icons">arrow_back</i> Back </a>
            <div class="row clearfix">
            
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="card">
                        <div class="header">
                             <h2><i class="material-icons"> store</i> Receiving of transaction </h2>
                                <small> <i> " Items which has been transfered from you " </i> </small>
                            </h2>
                            
                        </div>
                        
                         <div class="body">
                            <h2 class="card-inside-title"></h2>
                            <div class="row clearfix">
                           <div class="col-md-12 col-sm-10 col-xs-10">
                   
                                    <?php 
                                       $info_query = "Select * from tbl_transfers_list where transaction_number = '" . $_GET['trans_num'] . "'";
                                       $info_result = mysqli_query($conn, $info_query);
                                       $info_rows = mysqli_fetch_array($info_result);
                                    ?>
                                         <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                                             <label>  Staff Code : </label>
                                           </div>
                                           <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                                              <p>  <?php echo $info_rows['employee_code']; ?> </p>
                                           </div>

                                        <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                                             <label>  Trasact By : </label>
                                           </div>
                                           <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                                               <p> <?php echo $info_rows['person_transfered']; ?> </p>
                                           </div>
                                         
                                           <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                                            <label>  Transaction Number : </label>
                                           </div>
                                           <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                                              <p> <?php echo $info_rows['transaction_number']; ?> </p>
                                           </div>
                                          
                                           <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                                              <label> Branch : </label>
                                           </div>
                                           
                                           <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                                              <p> <?php echo $info_rows['branch']; ?> </p>
                                           </div>
                                           
                                           <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                                              <label> Price : </label>
                                           </div>
                                           <?php 
                                          $price_query = "Select * from tbl_transfers_list where transaction_number = '" . $_GET['trans_num'] . "'";
                                          $price_result = mysqli_query($conn, $price_query);
                                          $price_array = array();
                                          $total_array = array();
                                          while($price_rows = mysqli_fetch_array($price_result)){
                                               $price_array[] = $price_rows;
                                          }
                                          foreach($price_array as $price_frows){
                                                 $total = $price_frows['item_quant'] * $price_frows['item_price'];
                                                 $total_array[] = $total;
                                          }
                                        

                                        ?>
                                           
                                           <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                                                 <label style="color:#e60000;"> <small><?php   echo "P".array_sum($total_array);?> </small></label>
                                           </div>
                                           
                                        
                               </div> <!-- End of Row Division -->     
                             </div>
                       
                             
                      
                            </div>
                            
                           </div>
                         
                        </div>
                        
                    </div>
                    <div class="card">
                        <div class="header">
                             <h2> <i class="material-icons"> verified_user</i>  List of items under of transaction <?php echo $_GET['trans_num']; ?></h2>
                                <small> <i> " Please check carefully the items under of specific transaction number " </i> </small>
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
        
                           <?php
           if(isset($_POST['btn_commit'])){
               $quant_message = false;
                foreach($_POST['item_barcode'] as $key => $value){
                      
                         $item_barcode = mysqli_real_escape_string($conn, $_POST['item_barcode'][$key]);
                         $item_name = mysqli_real_escape_string($conn, $_POST['item_name'][$key]);
                         $cat = mysqli_real_escape_string($conn, $_POST['cat'][$key]);
                         $sub_category = mysqli_real_escape_string($conn, $_POST['sub_category'][$key]);
                         $item_quant = mysqli_real_escape_string($conn, $_POST['quantity'][$key]);
                         $item_price = mysqli_real_escape_string($conn, $_POST['price'][$key]);
                         $remarks = mysqli_real_escape_string($conn, $_POST['remarks'][$key]);
                         $ts_type = mysqli_real_escape_string($conn, $_POST['ts_type'][$key]);
                         $date_received = mysqli_real_escape_string($conn, $_POST['date_received'][$key]);
                         $item_total_quant = 0;
                        $check_query = "Select * from tbl_branch_goods_receive where item_barcode IN ('" . $item_barcode  . "')";
                        $check_query .= " and branch_name IN ('" . $_SESSION['b_code'] . "')";
                        $check_result = mysqli_query($conn, $check_query);
                        $check_count = mysqli_num_rows($check_result);
                        if($check_count > 0){
                              while($check_rows = mysqli_fetch_array($check_result)){
                                  $item_total_quant = $check_rows['item_quantity'] + $item_quant;
                              }
                              $update_quant_query = "Update tbl_branch_goods_receive set item_quantity = '" . $item_total_quant . "' where item_barcode = '" . $item_barcode . "' and branch_name = '" . $_SESSION['b_code'] . "'";
                              $update_quant_result = mysqli_query($conn, $update_quant_query);
                              if($update_quant_result === true){
                                   $quant_message = true;
                              }
                              
                        }else{
                            $insert_query = "Insert into tbl_branch_goods_receive(item_barcode, item_name, cat, sub_category, item_quantity, item_price, item_status, date_received, branch_name)values('" . 
                            $item_barcode . "','" . $item_name . "','" . $cat . "','" . $sub_category . "','" . $item_quant . "','" . $item_price . "','" . "ACTIVE" . "','" . $date_received . "','" . $_SESSION['b_code'] . "')";
                            $insert_result = mysqli_query($conn, $insert_query)or die("Error : " . mysqli_error($conn));
                            if($insert_result === true){
                                 $quant_message = true;
                            }

                        }
                        
                    
                }
                if($quant_message){
                     
                     $insert_series_query =  "Insert into tbl_branch_goods_receive_series(transaction_number, transact_by, received_date, receiver_code, branch)values('" . $_GET['trans_num'] . "','" . $_SESSION['fullname']
                     . "','" . $fullDate . "','" . $_SESSION['b_staff_code'] . "','" . $_SESSION['b_code'] . "')";
                     $insert_series_result = mysqli_query($conn, $insert_series_query);
                     $insert_history_query = "Insert into tbl_branch_goods_receive_history(transaction_number, item_barcode, item_name, cat, sub_category, item_quant, item_price, remarks, person_transfered, employee_code, ts_type, branch, transfer_status)Select transaction_number, item_barcode, item_name, cat, sub_category, item_quant, item_price, remarks, person_transfered, employee_code, ts_type, branch, transfer_status from tbl_transfers_list where transaction_number = '" . $_GET['trans_num'] . "'";
                     $insert_history_result = mysqli_query($conn, $insert_history_query);
                     $update_trans_query = "Update tbl_transaction_series set transfer_status = '" . "DONE" . "' where transfer_number = '" . $_GET['trans_num'] . "'";
                     $update_trans_result = mysqli_query($conn, $update_trans_query);
                     echo '<script type="text/javascript"> alert("Successfully Added"); window.location="branch_receiving_items.php"; </script>';
                     if($update_trans_result === true){
                             
                     }
                    
                }   
           }
          
          ?>
           <form method="post" action="<?php echo $_SERVER['PHP_SELF'] . "?trans_num=" . $_GET['trans_num']; ?>" enctype="multipart/form-data">
                         <div class="body">
                            <h2 class="card-inside-title"></h2>
                            <div class="row clearfix">
                           <div class="col-md-12 col-sm-10 col-xs-10">
                                    <style type="text/css">
                                             table.dataTable thead th {
                                                  background-color:gray;
                                                  color:#fff;
                                                  opacity:0.7;
                                             }
                                       </style>
                                      <table class="table table-striped table-bordered" id="r_items">
                                            <thead>
                                                   <tr>
                                                          <th> Transfer Number </th>
                                                          <th> Item Barcode </th>
                                                          <th> Item Name </th>
                                                          <th> Category </th>
                                                          <th> Sub Category </th>
                                                          <th> Quantity </th>
                                                          <th> Price  </th>
                                                          <th> TS Type </th>
                                                          <th> Date Prepared </th>
                                                      </tr>
                                               </thead>
                                             <tbody>
                                                 <?php 
                                                    $query = "Select * from tbl_transfers_list where transaction_number = '" . $_GET['trans_num'] . "'";
                                                    $result = mysqli_query($conn, $query);
                                                    while($rows = mysqli_fetch_array($result)){
                                                        ?>
                                                        <tr>
                                                            <td>
                                                            <input type="hidden" name="item_barcode[]" value="<?php echo $rows['item_barcode'] ?>">
                                                            <input type="hidden" name="item_name[]" value="<?php echo $rows['item_name']; ?>">
                                                            <input type="hidden" name="cat[]" value="<?php echo $rows['cat'] ?>">
                                                            <input type="hidden" name="sub_category[]" value="<?php echo $rows['sub_category'] ?>">
                                                            <input type="hidden" name="quantity[]" value="<?php echo $rows['item_quant'] ?>">
                                                            <input type="hidden" name="price[]" value="<?php echo $rows['item_price'] ?>">
                                                            <input type="hidden" name="ts_type[]" value="<?php echo $rows['ts_type'] ?>">
                                                            <input type="hidden" name="date_received[]" value="<?php echo $rows['date_received']; ?>">
                                                            <?php echo $rows['transaction_number'] ?>
                                                            </td>
                                                            <td><?php echo $rows['item_barcode'] ?></td>
                                                            <td><?php echo $rows['item_name'] ?></td>
                                                            <td><?php echo $rows['cat'] ?></td>
                                                            <td><?php echo $rows['sub_category'] ?></td>
                                                            <td><?php echo $rows['item_quant'] ?></td>
                                                            <td><?php echo $rows['item_price'] ?></td>
                                                            <td><?php echo $rows['ts_type'] ?></td>
                                                            <td><?php echo $rows['date_received'] ?></td>
                                                           
                                                            
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
                          <a href="branch_receiving_items.php" class="btn btn-warning"><i class="material-icons">arrow_back</i> Back </a>
                          <button type="submit" class="btn btn-success" name="btn_commit"><i class="material-icons">done_all</i> Approve </button>
                        </div>
                        
                    </div>
                </div>
            </div>
         </form>
     </div>
    </section>
        <script>
        $(document).ready(function(){
            $('#r_items').DataTable({
                responsive:true,
                paging:false
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