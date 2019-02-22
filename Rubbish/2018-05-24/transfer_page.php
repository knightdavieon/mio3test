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

<body class="theme-red">
         <?php include("top_header.php"); ?>
    <?php
     if(isset($_POST['btn_download'])){
            ob_end_clean();
            $output = fopen('php://output', 'w');
            header('Content-Type: text/csv; charset=utf-8');
            header('Content-Disposition: attachment; filename=transaction_format.csv'); 
            fputcsv($output, array("ITEM BARCODE", "ITEM NAME", "CATEGORY", "SUB CATEGORY", "QUANTITY", "PRICE",  "REMARKS", "TS TYPE"));
            exit();
     }
     if(isset($_POST['btn_import'])){
               $response_message = false;
               $transaction_message = false;
               $transaction_number = mysqli_real_escape_string($conn, $_POST['transaction_number']);
               $file_name = $_FILES['csv_file']['tmp_name'];
               if(!file_exists($file_name)){
                      echo '<script type="text/javascript"> alert("File does not exists"); </script>';
               }else{
                    $fhandler = fopen($file_name,"r");
               fgetcsv($fhandler);
               while(($frows = fgetcsv($fhandler, 1000, ",")) !== false){
                    $frows = array_map('utf8_encode', $frows);
                    $trans_check_query = "Select * from tbl_transfer_temp where transaction_number = '" . $transaction_number . "' and employee_code = '" . $_SESSION['b_staff_code'] . "'";
                    $trans_check_result = mysqli_query($conn, $trans_check_query)or die('<script type="text/javascript"> alert("Error '.mysqli_error($conn).'") </script>');
                    $trans_check_rows = mysqli_num_rows($trans_check_result);
                    if($trans_check_rows > 0){
                             $check_query = "Select * from tbl_goods_receive where item_barcode IN ('" . $frows[0] . "')";
                    $check_result = mysqli_query($conn, $check_query);
                    $check_count = mysqli_num_rows($check_result);
                    if($check_count > 0){
                         $csv_query = "Insert into tbl_transfer_temp(transaction_number, item_barcode, item_name, cat, sub_category, item_quant, item_price, item_status, remarks, date_received, person_transfered, employee_code, ts_type)values('"
                    . $transaction_number . "','" . $frows[0] . "','" . $frows[1] . "','" . $frows[2] . "','" . $frows[3] . "','" . $frows[4] . "','" . $frows[5] . "','" . "ACTIVE" . "','" . $frows[6] . "','" . $fullDate . "','" . $_SESSION['fullname'] . "','" . $_SESSION['b_staff_code'] . "','" . $frows[7] . "')";
                    $csv_result = mysqli_query($conn, $csv_query)or die('<script type="text/javascript">'  . 'alert("'. mysqli_error($conn) .'")'  . '</script>');
                    if($csv_result === true){
                        $response_message = true;
                    } 
                  }
                    }else{
                           $transfer_n_query = "Select * from tbl_transfer_temp where transaction_number = '" . $transaction_number . "'";
                           $transfer_n_result = mysqli_query($conn, $transfer_n_query)or die('<script type="text/javascript"> alert("Error : '. mysqli_error($conn) .'") </script>');
                           $transfer_n_count = mysqli_num_rows($transfer_n_result);
                           if($transfer_n_count > 0){
                                 $transaction_message = true;
                           }else{
                                   $check_query = "Select * from tbl_goods_receive where item_barcode IN ('" . $frows[0] . "')";
                    $check_result = mysqli_query($conn, $check_query);
                    $check_count = mysqli_num_rows($check_result);
                    if($check_count > 0){
                         $csv_query = "Insert into tbl_transfer_temp(transaction_number, item_barcode, item_name, cat, sub_category, item_quant, item_price, item_status, remarks, date_received, person_transfered, employee_code, ts_type)values('"
                    . $transaction_number . "','" . $frows[0] . "','" . $frows[1] . "','" . $frows[2] . "','" . $frows[3] . "','" . $frows[4] . "','" . $frows[5] . "','" . "ACTIVE" . "','" . $frows[6] . "','" . $fullDate . "','" . $_SESSION['fullname'] . "','" . $_SESSION['b_staff_code'] . "','" . $frows[7] . "')";
                    $csv_result = mysqli_query($conn, $csv_query)or die('<script type="text/javascript">'  . 'alert("'. mysqli_error($conn) .'")'  . '</script>');
                    if($csv_result === true){
                        $response_message = true;
                    } 
                  }
                           }
                    }
            }
               if($response_message){
                      $update_transaction_number = "Update tbl_transfer_number set transfer_number = '" . $transaction_number . "'";
                      $update_transaction_result = mysqli_query($conn, $update_transaction_number)or die('<script type="text/javascript"> alert("Error : '.mysqli_error($conn).'") </script>');
                      echo '<script type="text/javascript"> alert("Successfully Stored the data");window.location="transfer_page.php"; </script>';
               }
               if($transaction_message){
                      echo '<script type="text/javascript"> alert("This transaction number is already exists, please refresh the page to generate  new transaction number");window.location="transfer_page.php"; </script>';
               }
         }
              
     }
     if(isset($_POST['btn_commit'])){
       
        if($_POST['t_branch'] == ""){
             echo '<script type=text/javascript"> aelrt("Please select branch first"); window.location="transfer_page.php"; </script>';
        }else{

       
          $quant_message = false;
          $inssufficient_message = false;
          $duplicate_message = false;
          $current_docket = mysqli_real_escape_string($conn, $_POST['current_docket']);     
          $ts_branch = mysqli_real_escape_string($conn, $_POST['t_branch']);
          foreach($_POST['h_ts_number'] as $key => $value){
                 $ts_number = mysqli_real_escape_string($conn, $_POST['h_ts_number'][$key]);
                 $employee_code = mysqli_real_escape_string($conn, $_POST['h_employee_code'][$key]);
                 $item_barcode = mysqli_real_escape_string($conn, $_POST['h_item_barcode'][$key]);
                 $item_name = mysqli_real_escape_string($conn, $_POST['h_item_name'][$key]);
                 $cat = mysqli_real_escape_string($conn, $_POST['h_cat'][$key]);
                 $sub_category = mysqli_real_escape_string($conn, $_POST['h_sub_category'][$key]);
                 $item_quant = mysqli_real_escape_string($conn, $_POST['h_item_quant'][$key]);
                 $item_price  = mysqli_real_escape_string($conn, $_POST['h_item_price'][$key]);
                 $ts_type = mysqli_real_escape_string($conn, $_POST['h_ts_type'][$key]);
                 $remarks = mysqli_real_escape_string($conn, $_POST['h_remarks'][$key]);
                 $date_received = mysqli_real_escape_string($conn, $_POST['h_date_received'][$key]);
                 $branch = mysqli_real_escape_string($conn, $_POST['t_branch']);
                 $current_docket = mysqli_real_escape_string($conn, $_POST['current_docket']);
                /* $transfer_number_query = "Select * from tbl_transfer_temp where transaction_number = '" . $ts_number . "'";
                 $transfer_number_result = mysqli_query($conn, $transfer_number_query)or die("Error : " . mysqli_error($conn));
                 $transfer_number_count = mysqli_num_rows($transfer_number_result);
                 if($transfer_number_count > 0){
                      $duplicate_message = true;
                 }else{ */
                 $check_query = "Select * from tbl_goods_receive where item_barcode IN ('" . $item_barcode . "')";
                 $check_result = mysqli_query($conn, $check_query);
                 $check_rows = mysqli_fetch_array($check_result);
                // $check_count = mysqli_num_rows($check_result);
                 
               //  if($check_count > 0){
                              // $quant_message = true;
                               $total_quant = $check_rows['item_quantity'] - $item_quant;
                               $update_quant = "Update tbl_goods_receive set item_quantity = '" . $total_quant . "' where item_barcode = '" . $item_barcode . "'";
                               $update_result = mysqli_query($conn, $update_quant);
                               if($update_result === true){
                                   $quant_message = true;
                               }
               //  }
             /*}*/ 
                
          }
          if($duplicate_message){
                 echo '<sript type="text/javascript"> alert("Code already exists please refresh the page to generate new code"); </script>';
          }
          if($quant_message){
               echo '<script type="text/javascript"> alert("Successfully Commited"); </script>';
                $history_query = "Insert into tbl_transfer_history(transaction_number, item_barcode, item_name, cat, sub_category, item_quant, item_price, item_status, remarks, date_received, person_transfered, employee_code, ts_type, branch, transfer_status) Select transaction_number, item_barcode, item_name, cat, sub_category, item_quant, item_price, item_status, remarks, date_received, person_transfered, employee_code, ts_type, branch, transfer_status from tbl_transfer_temp where employee_code ='" . $_SESSION['b_staff_code'] . "'";
                $history_result = mysqli_query($conn, $history_query)or die('<script type="text/javascript"> alert("Error : ' . mysqli_error($conn) . '") </script>');
                 $commit_query = "Insert into tbl_transfers_list(transaction_number, item_barcode, item_name, cat, sub_category, item_quant, item_price, item_status, remarks, date_received, person_transfered, employee_code, ts_type, branch, transfer_status) Select transaction_number, item_barcode, item_name, cat, sub_category, item_quant, item_price, item_status, remarks, date_received, person_transfered, employee_code, ts_type, branch, transfer_status from tbl_transfer_temp where employee_code ='" . $_SESSION['b_staff_code'] . "'";
                               $commit_result = mysqli_query($conn, $commit_query)or die('<script type="text/javascript"> alert("Error : ' . mysqli_error($conn) . '") </script>');
                $insert_query = "Insert into tbl_transaction_series(transfer_number, branch_name, date_received, employee_code, employee_name, transfer_status)values('" . $current_docket . "','" . 
                $ts_branch . "','" . $fullDate . "','" . $_SESSION['b_staff_code'] . "','" . $_SESSION['fullname'] . "','" . "PENDING" . "')"; 
                $insert_result = mysqli_query($conn, $insert_query);
                $remove_query = "Delete from tbl_transfer_temp where employee_code = '" . $_SESSION['b_staff_code'] . "'";
                $remove_result = mysqli_query($conn, $remove_query);
               
          }
          if($inssufficient_message){
              echo '<script type="text/javascript"> alert("Inssufficient QTY"); window.location="transfer_page.php"; </script>';
          }
      }
}
   
      
           
     ?>
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="dashboard.php">
                            <i class="material-icons">home</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="menu-toggle">
                            <i class="material-icons">dashboard</i>
                            <span>Manage Items</span>
                        </a>
                         <ul class="ml-menu">
                                  
                                        <li>
                                        <a href="Create_item_page.php">Create Item</a>
                                        </li>
                                        
                               
                                    <li>
                                        <a href="edit_items_table.php">Edit Items</a>
                                    </li>
                                 
                                </ul>
                    </li>
                   
                             <li>
                        <a href="#" class="menu-toggle">
                            <i class="material-icons">done_all</i>
                            <span>Inventory</span>
                        </a>
                        <ul class="ml-menu">
                                  
                                        <li>
                                        <a href="goods_receive_page.php">Goods Receive</a>
                                        </li>
                                </ul>
                    </li>
                  
                    <li>
                        <a href="Receiving_page.php">
                            <i class="material-icons">assignment</i>
                            <span>Approval </span>
                        </a>
                    </li>
                 

               
                  
                   <li>
                            <a href="swho_transfer_items_page.php">
                             
                               <i class="material-icons">find_in_page</i>
                                    <span>Lookup</span>
                             </a>
                      
                          
                       </li>
                         <li>
                            <a href="transfer_page.php">
                             
                               <i class="material-icons">repeat</i>
                                    <span>Transfer Stocks</span>
                             </a>
                      
                          
                       </li>
                  
                 
                           <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">work</i>
                                    <span>Reports</span>
                                </a>
                                <ul class="ml-menu">
                                  
                                        <li>
                                        <a href="Create_item_page.php">Transfer Stocks</a>
                                        </li>
                                    <li>
                                        <a href="edit_items_table.php">Goods Receive</a>
                                    </li>
                                  <li>
                                        <a href="edit_items_table.php">Reference</a>
                                    </li>
                                     <li>
                                        <a href="edit_items_table.php">Goods Receive</a>
                                    </li>
                                     <li>
                                        <a href="edit_items_table.php">Items</a>
                                    </li>
                                     <li>
                                        <a href="edit_items_table.php">Modified Reference</a>
                                    </li>
                                     <li>
                                        <a href="edit_items_table.php">Approval</a>
                                    </li>
                                </ul>
                            </li>
                             <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">perm_data_setting</i>
                                    <span>Settings</span>
                                </a>
                                <ul class="ml-menu">
                                  
                                        <li>
                                        <a href="#">New User</a>
                                        <a href="#">New Shopfront</a>
                                        <a href="#">Manage Staffs</a>
                                        <a href="#">Registered Users</a>
                                        </li>
                                </ul>
                            </li>
                                <li>
                    
                      
                    </li>
                   
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                 <i class="material-icons">assignment</i>
                                    <span>Import &amp; Export</span>
                                </a>
                                <ul class="ml-menu">
                                    
                                    <li>
                                        <a href="Return_table.php"> Import of items </a>
                                        <a href="Return_table.php"> Export Database </a>
                                    </li>
                                </ul>
                            </li>
                     
                 
            
                  
              
                
                
                
              
                
                       
                </ul>
            </div>
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
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                 Transfer Items
                                <small> <i>  " Items available to transfer across the branches " </i> </small>
                            </h2>
                   
                        </div>
       
        
                         <div class="body">
                            <h2 class="card-inside-title"></h2>
                            <div class="row clearfix">
                           <div class="col-md-12 col-sm-10 col-xs-10">
                                 
                                   <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12"> </div>
                                   <div class="col-md-2 col-lg-2 col-xs-10 col-sm-10">
                                          <label> Employee Code </label>
                                              <div class="form-group">  
                                                 <div class="form-line">
                                                       <input type="text" class="form-control" value="<?php echo $_SESSION['b_staff_code']; ?>" onchange="search_function();">
                                                  </div>
                                               </div>
                                          </div>
                                          <div class="col-md-4 col-lg-4 col-xs-10 col-sm-10">
                                          <label> Staff Name </label>
                                              <div class="form-group">  
                                                 <div class="form-line">
                                                       <input type="text" class="form-control" value="<?php echo $_SESSION['fullname']; ?>" onchange="search_function();">
                                                  </div>
                                               </div>
                                          </div>
                                          <div class="col-md-4 col-lg-4 col-xs-10 col-sm-10">
                                          <label> Transfer To </label>
                                              <div class="form-group">  
                                                 <div class="form-line">
                                                          <select class="form-control" id="t_branch" onchange="t_branch_function();">
                                                                    <option selected="selected" disabled="disabled" value="select_branch"> SELECT BRANCH </option>
                                                                   <?php 
                                                                      $branch_query = "Select * from tbl_branches";
                                                                      $branch_result = mysqli_query($conn, $branch_query);
                                                                      while($branch_rows = mysqli_fetch_array($branch_result)){
                                                                        ?>
                                                                         <option value="<?php echo $branch_rows['branch_code']; ?>"><?php echo $branch_rows['branch_name']; ?></option>
                                                                    <?php
                                                                      }
                                                                   ?>
                                                             </select>
                                                       <script type="text/javascript">
                                                               function t_branch_function(){
                                                                    document.getElementById("t_branch_value").value = document.getElementById("t_branch").value;
                                                               }
                                                          </script>
                                                  </div>
                                               </div>
                                          </div>
                                          
                                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"> </div>
                                 <div class="col-md-3 col-lg-3 col-xs-10 col-sm-10">
                                     <?php 
                                                    $transfer_number_query = "Select * from tbl_transfer_number";
                                                    $transfer_number_result = mysqli_query($conn, $transfer_number_query);
                                                    $transfer_number_rows = mysqli_fetch_array($transfer_number_result);
                                                 ?>
                                          <label> Transaction Number </label>
                                              <div class="form-group">  
                                                 <div class="form-line">
                                                 
                                                       <input type="text" class="form-control" disabled="disabled" id="transaction_number" value="<?php echo $transfer_number_rows['transfer_number'] + 1; ?>" onchange="key_up_function();">
                                                  </div>
                                               </div>
                                          </div>
                                         
                                         
                                          <div class="col-md-2 col-lg-2 col-xs-10 col-sm-10">
                                          <label> Item Barcode </label>
                                              <div class="form-group">  
                                                 <div class="form-line">
                                                       <input type="text" class="form-control" id="item_barcode" onchange="search_function();">
                                                  </div>
                                               </div>
                                          </div>
                                           <script type="text/javascript">
                                                 function search_function(){
                                                        var xmlhttp = new XMLHttpRequest();
                                                        xmlhttp.open("GET", "transaction_page_query.php?barcode=" + document.getElementById("item_barcode").value, false);
                                                        xmlhttp.send(null);
                                                        if(xmlhttp.responseText == "Item not found"){
                                                            var confirm_message = confirm("Item not exist would you like to register this item ? ");
                                                            if(confirm_message){
                                                                 window.location= "Create_item_page.php";
                                                            }
                                                        }else{
                                                           document.getElementById("existing_div").innerHTML = xmlhttp.responseText;
                                                        }
                                                        
                                                 }
                                             </script>
                                         
                                      <div id="existing_div">
                                             <div class="col-md-3 col-lg-3 col-xs-10 col-sm-10">
                                          <label> Item Name </label>
                                              <div class="form-group">  
                                                 <div class="form-line">
                                                       <input type="text" class="form-control" disabled="disabled">
                                                  </div>
                                               </div>
                                          </div>
                                         <div class="col-md-2 col-lg-2 col-xs-10 col-sm-10">
                                          <label> Category </label>
                                              <div class="form-group">  
                                                 <div class="form-line">
                                                       <input type="text" class="form-control" disabled="disabled">
                                                  </div>
                                               </div>
                                          </div>
                                              <div class="col-md-2 col-lg-2 col-xs-10 col-sm-10">
                                          <label> Sub Category </label>
                                              <div class="form-group">  
                                                 <div class="form-line">
                                                       <input type="text" class="form-control" disabled="disabled">
                                                  </div>
                                               </div>
                                          </div>
                                        <div class="col-md-2 col-lg-2 col-xs-10 col-sm-10">
                                          <label> Quantity </label>
                                              <div class="form-group">  
                                                 <div class="form-line">
                                                       <input type="text" class="form-control" disabled="disabled">
                                                  </div>
                                               </div>
                                          </div>
                                               <div class="col-md-2 col-lg-2 col-xs-10 col-sm-10">
                                          <label> Price </label>
                                              <div class="form-group">  
                                                 <div class="form-line">
                                                       <input type="text" class="form-control" disabled="disabled">
                                                  </div>
                                               </div>
                                          </div>
                                               <div class="col-md-4 col-lg-4 col-xs-10 col-sm-10">
                                          <label> Remarks </label>
                                              <div class="form-group">  
                                                 <div class="form-line">
                                                       <input type="text" class="form-control" disabled="disabled">
                                                  </div>
                                               </div>
                                          </div>
                                          <div class="col-md-2 col-lg-2 col-xs-10 col-sm-10">
                                          <label> TS Type </label>
                                              <div class="form-group">  
                                                 <div class="form-line">
                                                         <select class="form-control">
                                                              <option disabled="disabled" selected="selected" value="no_selected">  SELECT TYPE </option>
                                                              <option> Auto DR </option>
                                                              <option> Branch Transfer </option>
                                                              <option> Change Code </option>
                                                              <option> Request </option>
                                                            </select>
                                                  </div>
                                               </div>
                                          </div>
                                      <div class="col-md-2 col-lg-2 col-xs-10 col-sm-10">
                                          <label> Date </label>
                                              <div class="form-group">  
                                                 <div class="form-line">
                                                       <input type="text" class="form-control" value="<?php echo $fullDate; ?>" disabled="disabled">
                                                  </div>
                                               </div>
                                          </div>
                                    </div>     
                               </div> <!-- End of Row Division --> 
                                   
                             </div>
                    
                                <button type="button" class="btn btn-primary" id="add_item"><i class="material-icons">library_add</i> Add Item </button>
                                <script>
                                    $('#add_item').click(function(){
                                         if(document.getElementById("ts_type").value == "no_selected"){
                                                  alert("No TS Type selected");
                                            }else if(document.getElementById("item_quantity").value == ""){
                                                  alert("Please add quantity");
                                            }else if(document.getElementById("remarks").value == ""){
                                                  alert("Please add remarks");
                                            }else if(document.getElementById("t_branch").value == "select_branch"){
                                                  alert("Please add branch to transfer");
                                            }else{
                                            var transaction_number = $('#transaction_number').val();
                                            var item_barcode = $('#item_barcode').val();
                                            var item_name = $('#item_name').val();
                                            var category = $('#cat').val();
                                            var sub_category = $('#sub_category').val();
                                            var item_quantity = $('#item_quantity').val();
                                            var price = $('#price').val();   
                                            var remarks = $('#remarks').val(); 
                                            var ts_type = $('#ts_type').val();  
                                            var date_received = $('#date_received').val();
                                            var t_branch = $('#t_branch_value').val();
                                            var current_docket = $('#current_docket').val();
                                            var t_fa = $('#t_fa').val();
                                              $.ajax({
                                                 type:"POST",
                                                 url:"transfer_page_commit.php",
                                                 data:{transaction_number:transaction_number, item_barcode:item_barcode, item_name:item_name, cat:category, sub_category:sub_category, item_quantity:item_quantity, price:price, remarks:remarks, ts_type:ts_type, date_received:date_received, t_branch_value:t_branch, current_docket:current_docket, t_fa:t_fa},
                                                 success:function(result){
                                                    if(result == "inssufficient"){
                                                        alert("Inssufficient Stocks");
                                                    }else if(result == "Transaction Exists"){
                                                        alert("This transaction number is already used");
                                                    }else{
                                                   
                                                        document.getElementById("r_items").innerHTML = result;
                                                    }
                                                      
                                                 }
                                            });  
                                            }
                                           
                                    });
                                 </script> 
                            </div>
                            
                           </div>
                       

                        <div class="col-md-10 col-lg-10 col-xs-10 col-sm-10">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#get_csv"><i class="material-icons">attach_file</i> Get From CSV </button>
                            <button type="button" id="btn_clear" class="btn btn-warning"><i class="material-icons">delete</i> Clear my list</button>
                            <a href="my_transaction_page.php" class="btn btn-info"><i class="material-icons">list</i> Transaction List</a>
                         
                           </div>
                         <!-- Table Form Section -->
                <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:10px;">
                    <div class="card">
                    <!--
                        <div class="header">
                            <h2>
                                 Goods Receive
                                <small> <i>  " Items which are ready to receive by specific person " </i> </small>
                            </h2>
                   
                        </div> -->
      
       <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">  
                 <!-- Hidden Fields -->
                 <?php 
                     $current_docket_query = "Select * from tbl_transfer_temp where employee_code = '" . $_SESSION['b_staff_code'] . "'";
                     $current_docket_result = mysqli_query($conn, $current_docket_query);
                     $current_docket_rows = mysqli_fetch_array($current_docket_result);
                 ?>
                 <?php 
                    if(empty($current_docket_rows['transaction_number'])){
                        ?>
                        <input type="hidden" name="current_docket" id="current_docket" value="<?php echo $transfer_number_rows['transfer_number'] + 1; ?>">
                <?php
                    }else{
                        ?>
                        <input type="hidden" name="current_docket" id="current_docket" value="<?php echo $current_docket_rows['transaction_number']; ?>">
                   <?php }
                 ?>
                 <input type="hidden" id="t_fa" value="<?php echo $current_docket_rows['transfer_status']; ?>">
                 <input type="hidden" name="t_branch" id="t_branch_value">
                 <input type="hidden" name="transaction_number" value="<?php echo $transfer_number_rows['transfer_number'] +1; ?>">
                <!-- #END# of hidden fields -->
                         <div class="body">
                            <h2 class="card-inside-title"></h2>
                            <div class="row clearfix">
                           <div class="col-md-12 col-sm-10 col-xs-10">

                                 
                                      <table id="r_items" class="table table-striped table-bordered">
                                              <thead>
                                                   <tr>
                                                      <th> Transaction Number </th>
                                                      <th> Employee Code </th>
                                                      <th> Item Barcode </th>
                                                      <th> Item Name </th>
                                                      <th> Category </th>
                                                      <th> Sub Category </th>
                                                      <th> Quantity </th>
                                                      <th> Price </th>
                                                      <th> TS Type </th>
                                                      <th> Remarks </th>
                                                      <th> Date </th>
                                                      </tr>
                                                 </thead>
                                                 <tbody>
                                                        <?php 
                                                            $returned_query = "Select * from tbl_transfer_temp where employee_code = '" . $_SESSION['b_staff_code'] . "'";
                                                            $returned_result = mysqli_query($conn, $returned_query);
                                                            while($returned_rows = mysqli_fetch_array($returned_result)){
                                                               
                                                            ?>
                                                            <tr>
                                                              <td>
                                                              <!-- Hidden Fields -->
                                                                <input type="hidden" name="h_ts_number[]" value="<?php echo $returned_rows['transaction_number'] + 1; ?>">
                                                                <input type="hidden" name="h_employee_code[]" value="<?php echo $returned_rows['employee_code']; ?>">
                                                                <input type="hidden" name="h_item_barcode[]" value="<?php echo $returned_rows['item_barcode']; ?>">
                                                                <input type="hidden" name="h_item_name[]" value="<?php echo $returned_rows['item_name']; ?>">
                                                                <input type="hidden" name="h_cat[]" value="<?php echo $returned_rows['cat']; ?>">
                                                                <input type="hidden" name="h_sub_category[]" value="<?php echo $returned_rows['sub_category'] ?>">
                                                                <input type="hidden" name="h_item_quant[]" value="<?php echo $returned_rows['item_quant']; ?>">
                                                                <input type="hidden" name="h_item_price[]" value="<?php echo $returned_rows['item_price']; ?>">
                                                                <input type="hidden" name="h_ts_type[]" value="<?php echo $returned_rows['ts_type']; ?>">
                                                                <input type="hidden" name="h_remarks[]" value="<?php echo $returned_rows['remarks']; ?>">
                                                                <input type="hidden" name="h_date_received[]" value="<?php echo $returned_rows['date_received']; ?>">
                                                                
                                                              <!-- #END# of Hidden Fields -->
                                                              <?php echo $returned_rows['transaction_number']; ?>
                                                              </td>
                                                              <td><?php echo $returned_rows['employee_code']; ?></td>
                                                              <td><?php echo $returned_rows['item_barcode']; ?></td>
                                                              <td><?php echo $returned_rows['item_name']; ?></td>
                                                              <td><?php echo $returned_rows['cat']; ?></td>
                                                              <td><?php echo $returned_rows['sub_category']; ?></td>
                                                              <td><?php echo $returned_rows['item_quant']; ?></td>
                                                              <td><?php echo $returned_rows['item_price']; ?></td>
                                                              <td><?php echo $returned_rows['ts_type']; ?></td>
                                                              <td><?php echo $returned_rows['remarks']; ?></td>
                                                              <td><?php echo $returned_rows['date_received']; ?></td>
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
                         <button type="submit" class="btn btn-primary" name="btn_commit" style="margin-top:-20px;"><i class="material-icons">done</i> Commit </button>
                          <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="margin-top:5px;"> </div>
                        </div>
                        
                    </div>
                         <!-- #END# of Table form Section -->
                        </div>
                        
                    </div>
                </div>
            </div>
         
     </div>
    </section>



 <!-- MODAL BOX 1 -->


<div class="modal fade" id="get_csv" tabindex="-1" role="dialog" aria-labelledby="modifyModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modifyModalLabel"><i class="material-icons">attach_file</i> Attach CSV File </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
              <div class="container-fluid">

                  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"> <!-- Main Margin -->
                        <div class="row">
                              <div class="col-md-5 col-lg-5 col-xs-2 col-sm-2">
                                <input type="file" name="csv_file">          
                                </div>
                               <div class="col-md-3 col-lg-3 col-xs-2 col-sm-2">
                                     <button type="submit" class="btn btn-primary" name="btn_import"><i class="material-icons">attach_file</i> Import </button>         
                                </div>
                                <div class="col-md-2 col-lg-2 col-xs-2 col-sm-2">
                                     <button type="submit" class="btn btn-warning" style="margin-left:-25px;" name="btn_download"><i class="material-icons">insert_drive_file</i> Download File Format </button>         
                                </div>  
                              <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12" style="margin-top:10px;">
                                <label> Reminders </label>
                                   <ul>
                                     <li> Only .CSV File can be uploaded </li>
                                     <li> Check the following Requ ired Fields you should contain with it with content </li>
                                     <li> Duplicate items will automatically rejected by the system </li> 
                                     <li> Check the content of your CSV file before uploading </li>
                                      </ul>
                                </div>
                          </div>
                    </div> <!-- #END# Main Margin -->
                  
               </div>
      </div>
      <div class="modal-footer">    
        
      </div>
    </div>
  </div>
</div>
 </form>
   <!-- #END# OF MODAL BOX 1 -->


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