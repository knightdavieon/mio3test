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
            <a href="branch_receiving_page.php" class="btn btn-warning"><i class="material-icons">arrow_back</i> Back </a>
            <div class="row clearfix">
            
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="card">
                        <div class="header">
                             <h2> Receiving of transaction </h2>
                                <small> <i> " Items which has been transfered from you " </i> </small>
                            </h2>
                            
                        </div>
                        
                         <div class="body">
                            <h2 class="card-inside-title"></h2>
                            <div class="row clearfix">
                           <div class="col-md-12 col-sm-10 col-xs-10">
                   
                                    <?php 
                                       $info_query = "Select * from tbl_branch_transfer_series where transaction_number = '" . $_GET['trans_num'] . "'";
                                       $info_result = mysqli_query($conn, $info_query);
                                       $info_rows = mysqli_fetch_array($info_result);
                                    ?>
                                         <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                                             <label>  Staff Code : </label>
                                           </div>
                                           <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                                              <p>  <?php echo $info_rows['staff_code']; ?> </p>
                                           </div>

                                        <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                                             <label>  Trasact By : </label>
                                           </div>
                                           <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                                               <p> <?php echo $info_rows['staff_name']; ?> </p>
                                           </div>
                                         
                                           <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                                            <label>  Transaction Number : </label>
                                           </div>
                                           <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                                              <p> <?php echo $info_rows['transaction_number']; ?> </p>
                                           </div>
                                          
                                           <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                                              <label> Item From  : </label>
                                           </div>
                                           
                                           <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                                              <label><small> <?php echo $info_rows['branch_code']; ?> </small></label>
                                           </div>
                                           
                                           <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                                              <label> Price : </label>
                                           </div>
                                           <?php 
                                          $price_query = "Select * from tbl_branch_transfer_item_temp where transaction_number = '" . $_GET['trans_num'] . "'";
                                          $price_result = mysqli_query($conn, $price_query);
                                          $price_array = array();
                                          $total_array = array();
                                          while($price_rows = mysqli_fetch_array($price_result)){
                                               $price_array[] = $price_rows;
                                          }
                                          foreach($price_array as $price_frows){
                                                 $total = $price_frows['quant'] * $price_frows['price'];
                                                 $total_array[] = $total;
                                          }
                                        

                                        ?>
                                           
                                           <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                                              <label style="color:#cc0000;"> <small><?php   echo "P".array_sum($total_array);?> </small> </label>
                                           </div>
                                           
                                        
                               </div> <!-- End of Row Division -->     
                             </div>
                       
                             
                      
                            </div>
                            
                           </div>
                         
                        </div>
                        
                    </div>
                    <div class="card">
                        <div class="header">
                             <h2> List of items under of transaction <?php echo $_GET['trans_num']; ?></h2>
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
               $ins_message = false;
               $n_existing_message = false;
              $update_quant_message = false;
              $function_action = false;
               foreach($_POST['employee_code'] as  $key => $value){
                    $employee_code = mysqli_real_escape_string($conn, $_POST['employee_code'][$key]);
                    $staff_name = mysqli_real_escape_string($conn, $_POST['staff_name'][$key]);
                    $transfer_to = mysqli_real_escape_string($conn, $_POST['transfer_to'][$key]);
                    $item_barcode = mysqli_real_escape_string($conn, $_POST['item_barcode'][$key]);
                    $item_name = mysqli_real_escape_string($conn, $_POST['item_name'][$key]);
                    $cat = mysqli_real_escape_string($conn, $_POST['cat'][$key]);
                    $sub_category = mysqli_real_escape_string($conn, $_POST['sub_category'][$key]);
                    $quantity = mysqli_real_escape_string($conn, $_POST['quantity'][$key]);
                    $price = mysqli_real_escape_string($conn, $_POST['price'][$key]);
                    $remarks = mysqli_real_escape_string($conn, $_POST['remarks'][$key]);
                    $ts_type = mysqli_real_escape_string($conn, $_POST['ts_type'][$key]);
                    $date_received = mysqli_real_escape_string($conn, $_POST['date_received'][$key]);
                    $current_branch = mysqli_real_escape_string($conn, $_POST['current_branch'][$key]);
                     $total_quant = 0;
                    $received_query = "Insert into tbl_branch_transfer_history(employee_code, staff_name, transfer_to, transaction_number, item_barcode, item_name, cat, sub_cat, quant, price, remarks, ts_type, transfer_date, received_by, item_from)values('"
                   . $employee_code . "','" . $staff_name . "','" . $transfer_to . "','" . stripslashes($_GET['trans_num']) . "','" . $item_barcode . "','" . $item_name . "','" . $cat . "','" . $sub_category . "','" . $quantity . "','" . $price . "','" . $remarks . "','" . $ts_type . "','" . $date_received . "','" . $_SESSION['fullname'] . "','" . $current_branch . "')";
                   $received_result = mysqli_query($conn, $received_query)or die('<script type="text/javascript"> alert("'.mysqli_error($conn).'"); </script>');
                   $quant_query = "Select * from tbl_branch_goods_receive where item_barcode IN  ('" . $item_barcode . "')"; 
                   $quant_query .= " and branch_name IN ('" . $_SESSION['b_code'] . "')";
                   $quant_result = mysqli_query($conn, $quant_query)or die('<script type="text/javascript"> alert("'. mysqli_error($conn) .'"); </script>');
                   $quant_count = mysqli_num_rows($quant_result);
                   if($quant_count > 0){
                          while($quant_rows = mysqli_fetch_array($quant_result)){
                                $total_quant = $quant_rows['item_quantity'] + $quantity;
                          }
                         $update_quant_query = "Update tbl_branch_goods_receive set item_quantity = '" . $total_quant . "' where item_barcode = '" . $item_barcode . "' and branch_name = '" . $_SESSION['b_code'] . "'";
                         $update_quant_result = mysqli_query($conn, $update_quant_query)or die('<script type="text/javascript"> alert("'. mysqli_error($conn) .'"); </script>');
                         if($update_quant_result === true){
                                $ins_message = true;
                                $function_action = true;
                         }
                   }else{
                        $n_existing_query = "Insert into tbl_branch_goods_receive(item_barcode, item_name, cat, sub_category, item_quantity, item_price, item_status, date_received, branch_name)values('"
                        . $item_barcode . "','" . $item_name . "','" . $cat . "','" . $sub_category . "','" . $quantity . "','" . $price . "','" . "ACTIVE" . "','" . $fullDate . "','" . $_SESSION['b_code'] . "')";
                        $n_existing_result = mysqli_query($conn, $n_existing_query)or die('<script type="text/javascript"> alert("'.mysqli_error($conn).'") </script>');
                        if($n_existing_result === true){
                             $n_existing_message = true;
                             $function_action = true;
                        }
                   }
                
               if($received_result === true){
                          $ins_message = true;
                   }
               }
                if($function_action){
                     $update_receiving_query = "Update tbl_branch_transfer_series set receiving_status = '" . "DONE" . "' where transaction_number = '" . stripslashes($_GET['trans_num']) . "'";
                     $update_receiving_result = mysqli_query($conn, $update_receiving_query)or die('<script type="text/javascript"> alert("'.mysqli_error($conn).'") </script>');
                     echo '<script type="text/javascript">alert("Successfully Approved"); window.location="branch_receiving_page.php"; </script>';
                }
                if($n_existing_message){ 
                       echo '<script type="text/javascript"> alert("Successfully Added"); </script>';
                }
                if($ins_message){
                      echo '<script type="text/javascript"> alert("Successfully Approved"); </script>';
                }
              
           }
          
          ?>
           <form method="post" action="<?php echo $_SERVER['PHP_SELF'] . "?trans_num=" . $_GET['trans_num']; ?>" enctype="multipart/form-data">
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
                                                          <th> Remarks </th>
                                                   
                                                          <th> Date Prepared </th>
                                                      </tr>
                                               </thead>
                                             <tbody>
                                                 <?php 
                                                    $query = "Select * from tbl_branch_transfer_item_temp where transaction_number = '" . $_GET['trans_num'] . "'";
                                                    $result = mysqli_query($conn, $query);
                                                    while($rows = mysqli_fetch_array($result)){
                                                        ?>
                                                        <tr>
                                                            <td>
                                                            <input type="hidden" name="employee_code[]" value="<?php echo $rows['employee_code'] ?>">
                                                            <input type="hidden" name="staff_name[]" value="<?php echo $rows['staff_name'] ?>">
                                                            <input type="hidden" name="current_branch[]" value="<?php echo $rows['current_branch'] ?>">
                                                            <input type="hidden" name="transfer_to[]" value="<?php echo $rows['transfer_to'] ?>">
                                                            <input type="hidden" name="item_barcode[]" value="<?php echo $rows['item_barcode'] ?>">
                                                            <input type="hidden" name="item_name[]" value="<?php echo $rows['item_name']; ?>">
                                                            <input type="hidden" name="cat[]" value="<?php echo $rows['cat'] ?>">
                                                            <input type="hidden" name="sub_category[]" value="<?php echo $rows['sub_cat'] ?>">
                                                            <input type="hidden" name="quantity[]" value="<?php echo $rows['quant'] ?>">
                                                            <input type="hidden" name="price[]" value="<?php echo $rows['price'] ?>">
                                                            <input type="hidden" name="remarks[]" value="<?php echo $rows['remarks'] ?>">
                                                            <input type="hidden" name="date_received[]" value="<?php echo $rows['transfer_date']; ?>">
                                                            <?php echo $rows['transaction_number'] ?>
                                                            </td>
                                                            <td><?php echo $rows['item_barcode']; ?></td>
                                                            <td><?php echo $rows['item_name']; ?></td>
                                                            <td><?php echo $rows['cat']; ?></td>
                                                            <td><?php echo $rows['sub_cat']; ?></td>
                                                            <td><?php echo $rows['quant']; ?></td>
                                                            <td><?php echo $rows['price']; ?></td>
                                                            <td><?php echo $rows['remarks']; ?></td>
                                                          
                                                            <td><?php echo $rows['transfer_date']; ?></td>
                                                           
                                                            
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
                          <a href="branch_receiving_page.php" class="btn btn-warning"><i class="material-icons">arrow_back</i> Back </a>
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