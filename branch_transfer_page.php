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
    <title> Branch Transfer </title>
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
    <?php
     if(isset($_POST['btn_download'])){
            ob_end_clean();
            $output = fopen('php://output', 'w');
            header('Content-Type: text/csv; charset=utf-8');
            header('Content-Disposition: attachment; filename=transaction_format.csv'); 
            fputcsv($output, array("ITEM BARCODE", "DESCRIPTION", "CATEGORY", "SUB CATEGORY", "QUANTITY", "PRICE",  "REMARKS"));
            exit();
     }
?>
             <!-- Menu -->
             <?php include("navigation_bar.php"); ?>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; <a href="javascript:void(0);">Silverworks.com</a> <label> 2018 </label>
                </div>
                <div class="version">
                   <!-- <b>Developed by: </b> John Alfonso Gamboa -->
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
                                 <i class="material-icons">compare_arrows </i> Transfer Items
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
                                                       <input type="text" class="form-control" value="<?php echo $_SESSION['b_staff_code'] ?>" disabled="disabled" id="employee_code">
                                                       
                                                  </div>
                                               </div>
                                          </div>
                                          <div class="col-md-4 col-lg-4 col-xs-10 col-sm-10">
                                          <label> Staff Name </label>
                                              <div class="form-group">  
                                                 <div class="form-line">
                                                       <input type="text" class="form-control" value="<?php echo $_SESSION['fullname']; ?>" onchange="search_function();" disabled="disabled" id="staff_name">
                                                       
                                                  </div>
                                               </div>
                                          </div>
                                          <div class="col-md-4 col-lg-4 col-xs-10 col-sm-10">
                                          <label> Transfer To </label>
                                              <div class="form-group">  
                                                 <div class="form-line">
                                                          <select class="form-control" id="t_branch" name="transfer_box" onchange="change_value();">
                                                                    <option selected="selected" disabled="disabled" value="select_branch"> SELECT BRANCH </option>
                                                                   <?php 
                                                                      $branch_query = "Select * from tbl_branches";
                                                                      $branch_result = mysqli_query($conn, $branch_query);
                                                                      while($branch_rows = mysqli_fetch_array($branch_result)){
                                                                          if($branch_rows['status'] == "ACTIVE"){
                                                                        ?>
                                                                         <option value="<?php echo $branch_rows['branch_code']; ?>"><?php echo $branch_rows['branch_name']; ?></option>
                                                                    <?php
                                                                       }
                                                                      }
                                                                   ?>
                                                             </select>
                                                   
                                                  </div>
                                               </div>
                                          </div>
                                          <script type="text/javascript">
                                                function change_value(){
                                                        document.getElementById("trans_value").value = document.getElementById("t_branch").value;
                                                }
                                             </script>
                                          
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"> </div>
                                 <div class="col-md-3 col-lg-3 col-xs-10 col-sm-10">
                                   
                                          <label> Transaction Number </label>
                                              <div class="form-group">  
                                                 <div class="form-line">
                                                     <?php 
                                                        $trans_number_query = "Select  * from tbl_branch_transfer_number";
                                                        $trans_number_result = mysqli_query($conn, $trans_number_query)or die("Error : " . mysqli_error($conn));
                                                        $trans_number_rows = mysqli_fetch_array($trans_number_result);
                                                     ?>
                                                       <input type="text" class="form-control" disabled="disabled" id="trans_number" value="<?php echo $trans_number_rows['trans_number'] + 1; ?>">
                                                      
                                                      
                                                  </div>
                                               </div>
                                          </div>
                                         
                                         
                                          <div class="col-md-2 col-lg-2 col-xs-10 col-sm-10">
                                          <label> Barcode </label>
                                              <div class="form-group">  
                                                 <div class="form-line">
                                                       <input type="text" class="form-control" id="item_barcode" onchange="search_function();">
                                                       <input type="hidden" id="branch_name" value="<?php echo $_SESSION['b_code']; ?>">
                                                  </div>
                                               </div>
                                          </div>
                                            <div class="col-md-1 col-lg-1 col-xs-1 col-sm-1" style="margin-top:25px;">
                                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#item_list" style="height:30px;width:30px;padding-top:0;"><i class="material-icons" style="margin-left:-6px;margin-top:2px;">list</i></button>
                                             </div>
                                          <script>
                                                function search_function(){
                                                     var item_barcode = $('#item_barcode').val();
                                                     var branch_name = $('#branch_name').val();
                                                     $.ajax({
                                                        type:"POST",
                                                        url:"branch_transfer_page_search.php",
                                                        data:{item_barcode:item_barcode, branch_name:branch_name},
                                                        success:function(result){
                                                          if(result == "Not Found"){
                                                                alert("No item found in Inventory");
                                                          }else{
                                                                document.getElementById("existing_div").innerHTML = result;
                                                          }
                                                           
                                                        }  
                                                     });
                                                }
                                             </script>
                                         
                                         
                                      <div id="existing_div">
                                       <div class="col-md-2 col-lg-2 col-xs-10 col-sm-10">
                                          <label> Description </label>
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
                                                       <input type="text" class="form-control"  disabled="disabled">
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
                                                       <input type="text" class="form-control"  disabled="disabled">
                                                  </div>
                                               </div>
                                          </div>
                                               <div class="col-md-4 col-lg-4 col-xs-10 col-sm-10">
                                          <label> Remarks </label>
                                              <div class="form-group">  
                                                 <div class="form-line">
                                                       <input type="text" class="form-control"  disabled="disabled">
                                                  </div>
                                               </div>
                                          </div>
                                     <!--     <div class="col-md-2 col-lg-2 col-xs-10 col-sm-10">
                                          <label> TS Type </label>
                                              <div class="form-group">  
                                                 <div class="form-line">
                                                         <select class="form-control" id="ts_type">
                                                              <option disabled="disabled" selected="selected" value="no_selected">  SELECT TYPE </option>
                                                              <option> Auto DR </option>
                                                              <option> Branch Transfer </option>
                                                              <option> Change Code </option>
                                                              <option> Request </option>
                                                            </select>
                                                  </div>
                                               </div>
                                          </div> -->
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
                                        document.getElementById("t_branch").disabled = true;
                                         var employee_code = $('#employee_code').val();
                                         var staff_name = $('#staff_name').val();
                                         var t_branch = $('#t_branch').val();
                                         var trans_number = $('#trans_number').val();
                                         var item_barcode = $('#item_barcode').val();
                                         var item_name = $('#item_name').val();
                                         var category = $('#category').val();
                                         var sub_category = $('#sub_category').val();
                                         var quantity = $('#quantity').val();
                                         var price = $('#price').val();
                                         var remarks = $('#remarks').val();
                                       //  var ts_type = $('#ts_type').val();
                                         var c_trans_num = $('#c_trans_num').val();
                                         var trans_current_num = $('#trans_current_num').val();
                                         var rem_quant = $('#rem_quant').val();
                                        if(document.getElementById("t_branch").value == "select_branch"){
                                            alert("No Branch Selected");
                                        }else{
                                              $.ajax({
                                              type:"POST",
                                              url:"branch_transfer_page_query_add.php",
                                              data:{employee_code:employee_code, staff_name:staff_name, t_branch:t_branch, trans_number:trans_number, item_barcode:item_barcode, item_name:item_name, category:category, sub_category:sub_category, quantity:quantity, price:price, remarks:remarks, c_trans_num:c_trans_num, trans_current_num:trans_current_num, rem_quant:rem_quant},
                                              success:function(result){
                                                    if(result == "Item Not Exists"){
                                                          alert("No Item Found");
                                                    }else if(result == "current branch"){
                                                          alert("This is the current branch for this item");
                                                    }else if(result == "FT First"){
                                                          alert("Please Commit the first transaction");
                                                    }else if(result == "Inssuffcient"){
                                                          alert("Inssufficient amount of stocks");
                                                    }else{
                                                        alert(result);
                                                        $.ajax({
                                                        type    :  "POST",
                                                        url     :  "branch_transfer_data_table.php",
                                                        data    :  {trans_number:trans_number},
                                                        success :  function(result){
                                                            document.getElementById("r_items").innerHTML = result;
                                                            $('#item_barcode').val("");
                                                            $('#item_name').val("");
                                                            $('#category').val("");
                                                            $('#sub_category').val("");
                                                            $('#price').val("");
                                                            $('#remarks').val("");
                                                        },
                                                        error   :  function(errorResult){
                                                            alert(errorResult);
                                                        }
                                                    });
                                                }
                                                  
                                              }
                                         });
                                      }
                                  });
                                </script>
                            </div>
                            
                           </div>
                       

                        <div class="col-md-10 col-lg-10 col-xs-10 col-sm-10">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#get_csv" style="height:30px;padding-top:0;"><i class="material-icons">attach_file</i> Get From CSV </button>
                            <a href="branch_transfer_history_page.php" class="btn btn-info" style="height:30px;padding-top:0;"><i class="material-icons">list</i> Transaction List</a>
                         
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
          <?php 
         if(isset($_POST['btn_commit'])){
    //       $transaction_number = mysqli_real_escape_string($conn, $_POST['transaction_number']);
           $trans_to = mysqli_real_escape_string($conn, $_POST['trans_to']);
           $message_update = false;
           if(empty($_POST['trans_to'])){
                  echo '<script type="text/javascript"> alert("Please Select branch first"); </script>';
           }else{

           
           foreach($_POST['transaction_number'] as $key=> $value){
                 $transaction_number = mysqli_real_escape_string($conn, $_POST['transaction_number'][$key]);
                 $item_barcode = mysqli_real_escape_string($conn, $_POST['item_barcode'][$key]);
                 $item_quant = mysqli_real_escape_string($conn, $_POST['quant'][$key]);
                 $trans_to = mysqli_real_escape_string($conn, $_POST['trans_to']);
                 
               
                  $quant_query = "Select * from tbl_branch_goods_receive where item_barcode IN ('" . $item_barcode . "')";
                  $quant_query .= " and branch_name IN ('" . $_SESSION['b_code'] . "')";
                  $quant_result = mysqli_query($conn, $quant_query);
                  $quant_rows = mysqli_fetch_array($quant_result);
                  $total_quantity = 0;
                  $total_quantity = $quant_rows['item_quantity'] - $item_quant;
                      $update_query = "Update tbl_branch_transfer_item_temp  set receiving_status = '" . "FR" .  "', transfer_to = '" . $trans_to . "' where transaction_number = '" . $transaction_number . "' and item_barcode = '" . $item_barcode . "'";
                      $update_result = mysqli_query($conn, $update_query)or die('<script type="text/javascript"> alert("'. mysqli_error($conn) .'") </script>');
                      $update_quantity_query = "Update tbl_branch_goods_receive set item_quantity = '" . $total_quantity . "' where item_barcode = '" . $item_barcode . "' and branch_name = '" . $_SESSION['b_code'] . "'";
                      $update_quantity_result = mysqli_query($conn, $update_quantity_query);
                      
                     if($update_result === true){
                          $message_update = true;
                     }  
                 
            }
            if($message_update){
                 echo '<script type="text/javascript"> alert("Successfully Updated"); </script>';
                 $branch_series_query = "Insert into tbl_branch_transfer_series(transaction_number, staff_name, staff_code, transaction_date, branch_code, transfer_to, transfer_status)values('" . $transaction_number . "','" 
                 . $_SESSION['fullname'] . "','" . $_SESSION['b_staff_code'] . "','" . $fullDate . "','" . $_SESSION['b_code'] . "','" . $trans_to . "','" . "PENDING" . "')";
                 $branch_series_result = mysqli_query($conn, $branch_series_query)or die('<script type="text/javascript"> alert("'. mysqli_error($conn) .'") </script>');

            }
         } 
         
    }
      ?>
      
     <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">  
      
                 <!-- Hidden Fields -->
                  <input type="hidden" name="transaction_number" value="<?php echo $trans_number_rows['trans_number']; ?>">
                  <input type="hidden" name="curr_trans" value="<?php echo $trans_number_rows['trans_number'] + 1; ?>">
                 <input type="hidden" name="trans_to" id="trans_value">
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
          
                <!-- #END# of hidden fields -->
                         <div class="body">
                            <h2 class="card-inside-title"></h2>
                            <div class="row clearfix">
                           <div class="col-md-12 col-sm-10 col-xs-10">
                      
                                 <?php 
                                  $current_trans_number_query = "Select * from tbl_branch_transfer_item_temp where employee_code = '" . $_SESSION['b_staff_code'] . "' and receiving_status = '" . "FT" . "'";
                                  $current_trans_number_result = mysqli_query($conn, $current_trans_number_query);
                                  $current_trans_number_rows = mysqli_fetch_array($current_trans_number_result);
                                  if($current_trans_number_rows['receiving_status'] == "FT"){
                                   ?>
                                    <input type="hidden" id="trans_current_num" value="<?php echo $current_trans_number_rows['transaction_number']; ?>">
                                   <?php 
                                   }else{
                                       ?>
                                       <input type="hidden" id="trans_current_num">
                                    <?php
                                   }
                                 ?>
                                            
                                   <style type="text/css">
                                            table.dataTable thead tr{
                                                background-color:gray;
                                                color:#fff;
                                                opacity:0.7;
                                            }
</style>

    <button type="button" id="btn_delete" class="btn btn-danger" style="height:30px;padding-top:0;"><i class="material-icons"> delete  </i> Delete Selected </button>
                                      <table id="r_items" class="table table-striped table-bordered">
                                              <thead>
                                                   <tr>
                                                      <th> <input type="checkbox" id="main_check"><label for="main_check"></label> </th>
                                                      <th> Transaction Number </th>
                                                      <th> Employee Code </th>
                                                      <th> Item Barcode </th>
                                                      <th> Category </th>
                                                      <th> Quantity </th>
                                                      <th> Remarks </th>
                                                     
                                        
                                                   
                                                      </tr>
                                                 </thead>
                                                 <tbody>
                                                     <?php 
                                           $remaining_data_query = "Select * from tbl_branch_transfer_item_temp where employee_code = '" . $_SESSION['b_staff_code'] . "'";
                                           $remaining_data_result = mysqli_query($conn, $remaining_data_query)or die("Error : " . mysqli_error($conn));
                                                         while($remaining_data_rows = mysqli_fetch_array($remaining_data_result)){
                                                           if($remaining_data_rows['receiving_status'] != "FR" && $remaining_data_rows['receiving_status'] != "RTR"){
                                                               ?>
                                                                <tr>
                                                                <td>
                                                                  <input type="checkbox" class="chkbox" id="<?php echo $remaining_data_rows['uid']; ?>" name="id[]">
                                                                  <label for="<?php echo $remaining_data_rows['uid']; ?>">
                                                                </td>
                                                                 <td>
                                        
                                        <input type="hidden" id="c_trans_num" name="transaction_number[]" value="<?php echo $remaining_data_rows['transaction_number'] ?>">
                                        <input type="hidden" name="employee_code[]" value="<?php echo $remaining_data_rows['employee_code'] ?>">
                                        <input type="hidden" name="item_barcode[]" value="<?php echo $remaining_data_rows['item_barcode'] ?>">
                                        <input type="hidden" name="item_name[]" value="<?php echo $remaining_data_rows['item_name'] ?>">
                                        <input type="hidden" name="cat[]" value="<?php echo $remaining_data_rows['cat'] ?>">
                                        <input type="hidden" name="sub_cat[]" value="<?php echo $remaining_data_rows['sub_cat'] ?>">
                                        <input type="hidden" name="quant[]" value="<?php echo $remaining_data_rows['quant'] ?>">
                                        <input type="hidden" name="price[]" value="<?php echo $remaining_data_rows['price'] ?>">
                                        <!--<input type="hidden" name="ts_type[]" value="<?php// echo $remaining_data_rows['ts_type'] ?>"> -->
                                        <input type="hidden" name="remarks[]" value="<?php echo $remaining_data_rows['remarks'] ?>">
                                      <!--  <input type="hidden" name="transfer_to[]" value="<?php// echo $remaining_data_rows['transfer_to'] ?>"> --> 
                                        <input type="hidden" name="transfer_date[]" value="<?php echo $remaining_data_rows['transfer_date'] ?>">
                                                                 <?php echo $remaining_data_rows['transaction_number']; ?></td>
                                                                 <td><?php echo $remaining_data_rows['employee_code']; ?></td>
                                                                 <td class="uid"><?php echo $remaining_data_rows['item_barcode']; ?></td>
                                                                 <td><?php echo $remaining_data_rows['cat']; ?></td>
                                                                 <td><?php echo $remaining_data_rows['quant']; ?></td>
                                                               <!--  <td><?php //echo $remaining_data_rows['ts_type']; ?></td> -->
                                                                 <td><?php echo $remaining_data_rows['remarks']; ?></td>
                                                               <!--  <td><?php// echo $remaining_data_rows['transfer_to']; ?></td> -->
                                                              
                                                                
                                                               </tr>    
                                        <?php
                                                           }
                                                   }
                                                      
                                             
                                            ?>
                                         
                                                   </tbody>
                                            
                                         </table>
                               </div> <!-- End of Row Division -->     
                             </div>
                       
                             
                         <script type="text/javascript">
                                             
                                              $(document).ready(function(){
                                                      $('#main_check').click(function(){
                                                            if(this.checked){
                                                                 $('.chkbox').each(function(){
                                                                     this.checked = true;
                                                                 });
                                                            }else{
                                                                  $('.chkbox').each(function(){
                                                                     this.checked = false;
                                                                  });
                                                            }
                                                      });
                                                       $('#btn_delete').click(function(){
                                                            var dataArr = new Array();
                                                            if($('input:checkbox:checked').length > 0){
                                                               $('input:checkbox:checked').each(function(){
                                                                    dataArr.push($(this).attr('id'));
                                                                    console.log(dataArr);
                                                                    $(this).closest("tr").remove();
                                                                    $.ajax({
                                                                        type:"POST",
                                                                        url:"branch_transfer_delete_query.php",
                                                                        data:{'data':dataArr},
                                                                        success:function(result){
                                                                            
                                                                        },
                                                                        error:function(result){
                                                                            alert(result);
                                                                        }
                                                                    });
                                                               });
                                                            }else{
                                                                 alert("No items selected");
                                                            }
                                                       }); 
                                                     

                                              });
                                                  
                                                           
                                                 </script>
                            </div>
                            
                           </div>
                         <button type="submit" class="btn btn-primary" name="btn_commit" style="margin-top:-20px;" onclick="return confirm('Are you sure you want to commit this ? ')"><i class="material-icons">done</i> Commit </button>
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


<?php 
   if(isset($_POST['btn_import'])){
             $ins_message = false;
             $failed_message = false;
             $validation_query = "Select * from tbl_branch_transfer_item_temp where employee_code = '" . $_SESSION['b_staff_code'] . "' and receiving_status = '" . "FT" . "'";
             $validation_result = mysqli_query($conn, $validation_query);
             $validation_count = mysqli_num_rows($validation_result);
             if($validation_count > 0){
                  echo '<script type="text/javascript"> alert("Please commit the first transaction first"); </script>';
             }else{
             
         
           $trans_num_query = "Select * from tbl_branch_transfer_item_temp where transaction_number = '" . mysqli_real_escape_string($conn, $_POST['curr_trans']) . "'";
             $trans_num_result = mysqli_query($conn, $trans_num_query)or die('<script type="text/javascript"> alert("'.mysqli_error($conn).'") </script>');
             $trans_num_count = mysqli_num_rows($trans_num_result);
            if($trans_num_count > 0){
                 echo '<script type="text/javascript"> alert("This inventory number is already use, please refresh the page to get new one"); </script>';
            }else{

             $check_map = array_map('str_getcsv', file($_FILES['csv_file']['tmp_name']));
             $check_filter = array_filter(array_map('array_filter', $check_map));
             $check_count = count($check_filter);
              
             if($check_count > 51){
                   echo '<script type="text/javascript"> alert("Aplogize .. but you\'ve reached the maximum limit for import of items"); </script>';
             }else{
             $file = $_FILES['csv_file']['tmp_name'];
             $fhandler = fopen($file, "r");
             while(($frows = fgetcsv($fhandler, 1000, ",")) !== false){
               $checking_query = "Select * from tbl_branch_goods_receive where item_barcode = '" . $frows[0] . "' and branch_name ='" . $_SESSION['b_code'] . "'";
               $check_result = mysqli_query($conn, $checking_query) or die('<script type="text/javascript"> alert("'.mysqli_error().'") </script>');
               $checking_count = mysqli_num_rows($check_result);
               if($checking_count > 0){
                    $insert_query = "Insert into tbl_branch_transfer_item_temp(employee_code, staff_name, transfer_to, transaction_number, item_barcode, item_name, cat, sub_cat, quant, remarks, ts_type, transfer_date, price, current_branch, receiving_status)values('"
               . $_SESSION['b_staff_code'] . "','" . $_SESSION['fullname'] . "','" . $frows[6] . "','" .  mysqli_real_escape_string($conn, $_POST['curr_trans']) . "','" . $frows[0] . "','" . $frows[1] . "','" . $frows[2] . "','" . $frows[3] . "','" . $frows[4] . "','" . $frows[7] . "','" . $frows[8] . "','" . $fullDate . "','" . $frows[5] . "','" . $_SESSION['b_code'] . "','" . "FT" . "')";
               $insert_result = mysqli_query($conn, $insert_query)or die('<script type="text/javascript"> alert("'.mysqli_error($conn).'"); </script>');
                if($insert_result === true){
                     $ins_message = true;
                }
               }else{
                  $failed_message = true;
               }
              
              
             } 
            
            }
            
             } //Transaction number else parse
         
          } // Validation else parse
           if($ins_message){
                  echo '<script type="text/javascript"> alert("Successfully Added"); </script>';
            
                  $update_trans_number = "Update tbl_branch_transfer_number set trans_number = '" . $_POST['curr_trans'] . "'";
                  $update_trans_result = mysqli_query($conn, $update_trans_number)or die('<script type="text/javascript"> alert("'.mysqli_error($conn).'") </script>');
                 if($update_trans_result === true){
                      echo '<script type="text/javascript"> window.location="branch_transfer_page.php"; </script>';
                 }
             }
             if($failed_message){
                 echo '<script type="text/javascript"> alert("There were items included to your list which you dont have in your inventory"); </script>';
             }   
   }
?>
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
     <!-- MODAL BOX 2 -->


<div class="modal fade" id="item_list" tabindex="-1" role="dialog" aria-labelledby="modifyModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="width:68%;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modifyModalLabel"><i class="material-icons">list</i> Item List </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
              <div class="container-fluid">

                  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"> <!-- Main Margin -->
                        <div class="row">
                                 <label> List of items in your inventory </label>
                                  <table class="table table-striped table-bordered" id="list_table">
                                        <thead>
                                             <tr>
                                                  <th> Barcode </th>
                                                  <th> Description </th>
                                                  <th> Category </th>
                                                  <th> Sub Category </th>
                                                  <th> Quantity </th>
                                                  <th> Price </th>
                                               </tr>
                                         </thead>
                                         <tbody>
                                               <?php 
                                                $item_query = "Select * from tbl_branch_goods_receive where branch_name = '" . $_SESSION['b_code'] . "'";
                                                $item_result = mysqli_query($conn, $item_query);
                                                while($item_rows = mysqli_fetch_array($item_result)){
                                                    ?>
                                                       <tr>
                                                           <td class="ibd"><a href="#" data-dismiss="modal" class="info_barcode"><?php echo $item_rows['item_barcode']; ?></a></td>
                                                           <td><?php echo $item_rows['item_name']; ?></td>
                                                           <td><?php echo $item_rows['cat']; ?></td>
                                                           <td><?php echo $item_rows['sub_category']; ?></td>
                                                           <td><?php echo $item_rows['item_quantity']; ?></td>
                                                           <td><?php echo $item_rows['item_price']; ?></td>
                                                          </tr>
                                                    <?php
                                                }
                                             ?>
                                           </tbody>
                                    </table>
                                    <script type="text/javascript">
                                         $('.info_barcode').click(function(){
                                                 var row = $(this).closest("tr");
                                                 var text = row.find(".ibd").text();
                                                 document.getElementById("item_barcode").value = text;
                                                 var xmlhttp = new XMLHttpRequest();
                                                 xmlhttp.open("GET", "branch_transfer_page_click.php?icode="+ text, false);
                                                 xmlhttp.send(null);
                                                 document.getElementById("existing_div").innerHTML =  xmlhttp.responseText;
                                         });
                                      </script>
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
   <!-- #END# OF MODAL BOX 2 -->


        <script>
        $(document).ready(function(){
            $('#r_items').DataTable({
                 responsive:true,
                 paging:false
            });
            $('#list_table').DataTable({
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