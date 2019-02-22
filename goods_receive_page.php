<?php require_once('Connection.php'); ?>
<?php 
   if(isset($_POST['btn_download'])){
        
            ob_end_clean();
            $output = fopen('php://output', 'w');
            header('Content-Type: text/csv; charset=utf-8');
            header('Content-Disposition: attachment; filename=GOODS_RECEIVE.csv'); 
            fputcsv($output, array("Item Barcode", "Description", "Category", "Sub Category", "Quantity", "Price", "Additional Description"));
            exit();
        
     }
?>
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
    <title> Goods Receives </title>
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
       
        if(isset($_POST['btn_import'])){
         $import_message = false;
      //   $import_success = false;
         $import_failed = false;
         $docket_number = mysqli_real_escape_string($conn, $_POST['docket_number']);
         $curr_d_value = mysqli_real_escape_string($conn, $_POST['curr_d_value']);
         if(!empty($curr_d_value)){
                 echo '<script type="text/javascript"> alert("Please commit the first transaction first"); </script>';
         }else{

        
         $check_duplicate_query = "Select * from tbl_goods_receive_temp where docket_number = '" . $_POST['docket_number'] . "'";
         $check_duplicate_result = mysqli_query($conn, $check_duplicate_query);
         $check_duplicate_count = mysqli_num_rows($check_duplicate_result);
         if($check_duplicate_count > 0){
             echo '<script type="text/javascript"> alert("This docket number is already used"); window.location="goods_receive_page.php"; </script>';
         }else{
        
         $file_name = $_FILES['csv_file']['tmp_name'];
         if(!file_exists($file_name)){
                 echo '<script type="text/javascript"> alert("Please Attach File First"); window.location="goods_receive_page.php"; </script>';
         }else{
         $fhandler = fopen($file_name, "r");
         
         fgetcsv($fhandler);
         while(($frows = fgetcsv($fhandler, 1000, ",")) !== false){
              $frows = array_map("utf8_encode", $frows);
              $checking_query = "Select * from tbl_swho_items where item_barcode IN ('" . $frows[0] . "')";
              $checking_result = mysqli_query($conn, $checking_query)or die('<script type="text/javascript"> alert("'. mysqli_error($conn) .'") </script>');
              $checking_rows = mysqli_fetch_array($checking_result);
              if($checking_rows > 0){
                    $csv_query = "Insert into tbl_goods_receive_temp(docket_number, employee_code, item_barcode, item_name, cat, sub_category, item_quantity, item_price, item_description, person_received, item_status, date_received)values('"
               . $docket_number . "','" . $_SESSION['b_staff_code'] . "','" . $frows[0] . "','" . $frows[1] . "','" . $frows[2] . "','" . $frows[3] . "','" . $frows[4] . "','" . $frows[5] . "','" . $frows[6] . "','" .  $_SESSION['fullname'] . "','" . "ACTIVE" . "','" . $fullDate . "')";
                 $csv_result = mysqli_query($conn, $csv_query)or die("Error : " . mysqli_error($conn));
               if($csv_result === true){
                  $import_message = true;
               }
              }else{
                 $import_failed = true;
              }
             
         }
         if($import_message){
              echo '<script type="text/javascript"> alert("Successfully added"); window.location="goods_receive_page.php"; </script>';
              $d_query = "Update tbl_goods_docket set docket_number = '" . $docket_number . "'";
              $d_result = mysqli_query($conn, $d_query)or die('<script type="text/javascript"> alert("'. mysqli_error($conn) .'") </script>');
         }
         if($import_failed){
              echo '<script type="text/javascript"> alert("There is an item which is not existing to your inventory"); window.location="goods_receive_page.php"; </script>';
         }
       }
     }

    }    
   }
     if(isset($_POST['btn_clear'])){
            $clear_query = "Delete from tbl_goods_receive_temp where employee_code = '" . $_SESSION['b_staff_code'] . "'";
            $clear_result = mysqli_query($conn, $clear_query)or die("Error : " . mysqli_error($conn));
            if($clear_result === true){
                  echo '<script type="text/javascript"> alert("List has been cleared"); window.location="goods_receive_page.php"; </script>';
            }
     }
   
     
   
      
           
     ?>
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
                                 <i class="material-icons"> markunread_mailbox </i> Goods Receive
                                <small> <i>  " Items which are ready to receive by specific person " </i> </small>
                            </h2>
                   
                        </div>
       
        
                         <div class="body">
                            <h2 class="card-inside-title"></h2>
                            <div class="row clearfix">
                           <div class="col-md-12 col-sm-10 col-xs-10">
                                    <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3">
                                          <div class="form-group">
                                               <div class="form-line">
                                                <label> Employee Code </label>
                                                <input type="text" class="form-control" id="employee_code" value="<?php echo $_SESSION['b_staff_code']; ?>">
                                                </div>
                                            </div>
                                       </div>
                                        <div class="col-md-4 col-lg-4 col-xs-3 col-sm-3">
                                          <div class="form-group">
                                               <div class="form-line">
                                                <label> Name </label>
                                                <input type="text" class="form-control" id="employee_name" value="<?php echo $_SESSION['fullname']; ?>">
                                                </div>
                                            </div>
                                       </div>
                                   <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12"> </div>
                                       <div class="col-md-2 col-lg-2 col-xs-10 col-sm-10">
                                          <label> Docket Number </label>
                                              <div class="form-group">  
                                                 <div class="form-line">
                                                      <?php 
                                                         $docket_query = "Select * from tbl_goods_docket";
                                                         $docket_result = mysqli_query($conn, $docket_query)or die("Error : " . mysqli_error($conn));
                                                         $docket_rows = mysqli_fetch_array($docket_result);
                                                      ?>
                                                       <input type="text" class="form-control" id="docket_number" value="<?php echo $docket_rows['docket_number'] + 1; ?>">
                                                  </div>
                                               </div>
                                          </div>
                                          <div class="col-md-2 col-lg-2 col-xs-10 col-sm-10">
                                          <label> Barcode </label>
                                              <div class="form-group">  
                                                 <div class="form-line">
                                                       <input type="text" class="form-control" id="item_barcode" onchange="key_up_function();">
                                                  </div>
                                               </div>
                                          </div>
                                           <div class="col-md-1 col-lg-1 col-xs-1 col-sm-1" style="margin-top:25px;">
                                                 <button class="btn btn-default" data-toggle="modal" data-target="#item_list" style="height:30px;width:30px;padding-top:0;"><i class="material-icons" style="margin-left:-6px;margin-top:2px;"> list </i> </button>
                                          </div>
                                          <script type="text/javascript">
                                               function key_up_function(){
                                                 if(document.getElementById("item_barcode").value == ""){
                                                       alert("Please add value");
                                                 }else{
                                                  var xmlhttp = new XMLHttpRequest();
                                                  xmlhttp.open("GET", "goods_receive_query.php?item_barcode=" + document.getElementById("item_barcode").value, false);
                                                  xmlhttp.send(null);
                                                  if(xmlhttp.responseText == "Not Found"){
                                                      var confirm_message = confirm("Item not found would you like to register this item ?");
                                                      if(confirm_message){
                                                            window.location="Create_item_page.php";
                                                      }
                                                      return confirm_message;
                                                  }else{
                                                     document.getElementById("existing_div").innerHTML = xmlhttp.responseText;
                                                  }
                                                 }
                                                }
                                             </script> 
                                      <div id="existing_div">
                                             <div class="col-md-3 col-lg-3 col-xs-10 col-sm-10">
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
                                               <div class="col-md-6 col-lg-6 col-xs-10 col-sm-10">
                                          <label> Additional Description </label>
                                              <div class="form-group">  
                                                 <div class="form-line">
                                                       <input type="text" class="form-control" disabled="disabled">
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
                    
                                <button type="button" class="btn btn-primary" id="add_item" style="height:30px;padding-top:0;"><i class="material-icons">library_add</i> Add Item </button>
                          
                            </div>
                            
                           </div>
                        <script type="text/javascript">
                                 $('#add_item').click(function(){
                                       var employee_code = $('#employee_code').val();
                                       var employee_name = $('#employee_name').val();
                                       var docket_number = $('#docket_number').val();
                                       var item_barcode = $('#item_barcode').val();
                                       var item_name = $('#item_name').val();
                                       var cat = $('#cat').val();
                                       var sub_category = $('#sub_category').val();
                                       var item_quant = $('#item_quant').val();
                                       var item_price = $('#item_price').val();
                                       var item_description = $('#item_description').val();
                                       var reg_date = $('#reg_date').val();
                                       var curr_d_value = $('#curr_d_value').val();
                                       if(document.getElementById("item_barcode").value == ""){
                                           alert("Please add value first");
                                       }else if(document.getElementById("item_quant").value == ""){
                                            alert("Please add value first");
                                       }else{
                                            $.ajax({
                                            type:"POST",
                                            url:"goods_receive_commit.php",
                                            data:{employee_code:employee_code, employee_name:employee_name, docket_number:docket_number, item_barcode:item_barcode, item_name:item_name, cat:cat, sub_category:sub_category, item_quant:item_quant, item_price:item_price, item_description:item_description, reg_date:reg_date, curr_d_value:curr_d_value},
                                            success:function(result){
                                                if(result == "Docket not exists"){
                                                    alert("This docket number is already been used, Please refresh the page");
                                                }else if(result == "Docket Used"){
                                                    alert("Docket Used");
                                                }else if(result == "Commit"){
                                                    alert("Please Commit the first transaction");
                                                }else{
                                                      alert("Item has been added");
                                                      document.getElementById("r_items").innerHTML = result;
                                                      $('#item_name').val("");
                                                      $('#item_barcode').val("");
                                                      $('#cat').val("");
                                                      $('#sub_category').val("");
                                                      $('#item_name').val("");  
                                                      $('#item_quant').val("");
                                                      $('#item_price').val("");
                                                      $('#item_description').val("");
                                                }
                                              $('#t_items').DataTable({
                                              responsive:true
                                              });  
                                            }
                                       });
                                       }
                                   
                                 });
                           </script>

                        <div class="col-md-10 col-lg-10 col-xs-10 col-sm-10">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#get_csv" style="height:30px;padding-top:0;"><i class="material-icons">attach_file</i> Get From CSV </button>
                            <button type="button" id="btn_clear" class="btn btn-warning" style="height:30px;padding-top:0;"><i class="material-icons">delete</i> Clear my list</button>
                             <script type="text/javascript"> 
                                 $('#btn_clear').click(function(){
                                     var xmlhttp = new XMLHttpRequest();
                                     xmlhttp.open("GET", "goods_receive_clear_list.php", false);
                                     xmlhttp.send(null);
                                     if(xmlhttp.responseText == "cleared"){
                                          alert("Table data successfully removed");
                                          window.location="goods_receive_page.php";
                                     }
                                 });
                              </script>
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
            if(empty($_POST['docket_num'])){
                echo '<script type="text/javascript"> alert("No item found"); window.location="goods_receive_page.php"; </script>';
            }else{

            
             $insert_message = false;
             $update_message = false;
             foreach($_POST['docket_num'] as $key => $value){
                 
                     $docket_number = mysqli_real_escape_string($conn, $_POST['docket_num'][$key]);
                     $employee_code = mysqli_real_escape_string($conn, $_POST['employee_code'][$key]);
                     $item_barcode = mysqli_real_escape_string($conn, $_POST['item_barcode'][$key]);
                     $item_name = mysqli_real_escape_string($conn, $_POST['item_name'][$key]);
                     $cat = mysqli_real_escape_string($conn, $_POST['cat'][$key]);
                     $sub_category = mysqli_real_escape_string($conn, $_POST['sub_category'][$key]);
                     $item_quantity = mysqli_real_escape_string($conn, $_POST['item_quantity'][$key]);
                     $item_price = mysqli_real_escape_string($conn, $_POST['item_price'][$key]);
                     $item_description = mysqli_real_escape_string($conn, $_POST['item_description'][$key]);
                     $date_received = mysqli_real_escape_string($conn, $_POST['date_received'][$key]);
                     $person_received = mysqli_real_escape_string($conn, $_POST['person_received'][$key]);
                     $unique_id = mysqli_real_escape_string($conn, $_POST['unique_id'][$key]);
                     $duplicate_query = "Select * from tbl_goods_receive where item_barcode IN ('" . $item_barcode . "')";
                     $duplicate_result = mysqli_query($conn, $duplicate_query)or die("Error : " . mysqli_error($conn));
                     $duplicate_rows = mysqli_fetch_array($duplicate_result);
                     $total_quant = $duplicate_rows['item_quantity'] + $item_quantity;
                     $duplicate_count = mysqli_num_rows($duplicate_result);
                     if($duplicate_count > 0){
                           $update_query = "Update tbl_goods_receive set item_quantity = '" . $total_quant . "' where item_barcode = '" . $item_barcode . "'";
                           $update_result = mysqli_query($conn, $update_query)or die("Error : " . mysqli_error($conn));
                           if($update_result === true){
                                   $update_message = true;
                                    $history_query = "Insert into tbl_goods_receive_history(docket_number, employee_code, item_barcode, item_name, cat, sub_category, item_quantity, item_price, person_received, item_status, date_received)values('" 
                     . $docket_number . "','" . $employee_code . "','" . $item_barcode . "','" . $item_name . "','" . $cat . "','" . $sub_category . "','" . $item_quantity . "','" . $item_price . "','"  . $person_received . "','" . "ACTIVE" . "','" . $date_received . "')";
                                   $history_result = mysqli_query($conn, $history_query);
                                   $delete_query = "Delete from tbl_goods_receive_temp where unique_id = '" . $unique_id . "'";
                                   $delete_result = mysqli_query($conn, $delete_query);
                             } 
                     }else{
                     
                      $insert_query = "Insert into tbl_goods_receive(item_barcode, item_name, cat, sub_category, item_quantity, item_price, person_received, item_status, date_received)values('" 
                     .  $item_barcode . "','" . $item_name . "','" . $cat . "','" . $sub_category . "','" . $item_quantity . "','" . $item_price . "','"  . $person_received . "','" . "ACTIVE" . "','" . $date_received . "')";
                     $insert_result = mysqli_query($conn, $insert_query)or die("Error : " . mysqli_error($conn));
                     
                     if($insert_result === true){
                          $insert_message = true;
                          $history_query = "Insert into tbl_goods_receive_history(docket_number, employee_code, item_barcode, item_name, cat, sub_category, item_quantity, item_price, person_received, item_status, date_received)values('" 
                     . $docket_number . "','" . $employee_code . "','" . $item_barcode . "','" . $item_name . "','" . $cat . "','" . $sub_category . "','" . $item_quantity . "','" . $item_price . "','"  . $person_received . "','" . "ACTIVE" . "','" . $date_received . "')";
                          $history_result = mysqli_query($conn, $history_query);
                          $delete_query = "Delete from tbl_goods_receive_temp where unique_id = '" . $unique_id . "'";
                          $delete_result = mysqli_query($conn, $delete_query);
                         
                     }
                      
                     }  
             }
             if($update_message){
                  $c_query = mysqli_query($conn, "Select * from tbl_goods_receive_history_series where docket_number = '" . $docket_rows['docket_number'] . "'");
                  if(mysqli_num_rows($c_query) > 0){
                        // function if ever                      
                  }else{
                  echo '<script type="text/javascript"> window.open("goods_receive_printout.php?r_id='.$docket_rows['docket_number'].'", "GOODS RECEIVE", "height=800, width=700"); </script>';
                   $history_series_query = "Insert into tbl_goods_receive_history_series(name_of_receiver, employee_code, date_received, docket_number)values('" . $_SESSION['fullname'] . "','" . $_SESSION['b_staff_code']
                  . "','" . $fullDate . "','" . $docket_rows['docket_number'] . "')";
                  $history_series_result = mysqli_query($conn, $history_series_query)or die('<script type="text/javascript"> alert("'.mysqli_error($conn).'") </script>');
                 echo '<script type="text/javascript"> alert("Item Successfully Updated"); window.location="goods_receive_page.php"; </script>';
                  }
               
             }
            if($insert_message){
                 $c_query = mysqli_query($conn, "Select * from tbl_goods_receive_history_series where docket_number = '" . $docket_rows['docket_number'] . "'");
                  if(mysqli_num_rows($c_query) > 0){
                        // function if ever                      
                  }else{
                       echo '<script type="text/javascript"> window.open("goods_receive_printout.php?r_id='.$docket_rows['docket_number'].'", "GOODS RECEIVE", "height=800, width=700"); </script>';
                   $history_series_query = "Insert into tbl_goods_receive_history_series(name_of_receiver, employee_code, date_received, docket_number)values('" . $_SESSION['fullname'] . "','" . $_SESSION['b_staff_code']
                  . "','" . $fullDate . "','" . $docket_rows['docket_number'] . "')";
                 
                  $history_series_result = mysqli_query($conn, $history_series_query)or die('<script type="text/javascript"> alert("'.mysqli_error($conn).'") </script>');
                  echo '<script type="text/javascript"> alert("Successfully Received the items"); window.location="goods_receive_page.php"; </script>';
                  }
             }
            
          }
        }
           
        ?>
    
       <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">  
       <!-- Hidden Docket number under of form -->
        <?php 
                                                         $docket_query = "Select * from tbl_goods_docket";
                                                         $docket_result = mysqli_query($conn, $docket_query)or die("Error : " . mysqli_error($conn));
                                                         $docket_rows = mysqli_fetch_array($docket_result);

                                                         $goods_docket_query = "Select * from tbl_goods_receive_temp where employee_code = '" . $_SESSION['b_staff_code'] . "'";
                                                         $goods_docket_result = mysqli_query($conn, $goods_docket_query);
                                                         $goods_docket_rows = mysqli_fetch_array($goods_docket_result);
                                                         
?>
                                                       <input type="hidden" id="curr_d_value" name="curr_d_value" value="<?php echo $goods_docket_rows['docket_number']; ?>">
                                                       <input type="hidden" class="form-control" id="docket_number" name="docket_number" value="<?php echo $docket_rows['docket_number'] + 1; ?>">
                        <!-- #END# Hidden Docket number under of form -->
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
                                                      <th> Docket Number </th>
                                                      <th> Employee Code </th>
                                                      <th> Item Barcode </th>
                                                      <th> Item Name </th>
                                                      <th> Category </th>
                                                      <th> Sub Category </th>
                                                      <th> Quantity </th>
                                                      <th> Price </th>
                                                      <th> Description </th>
                                                      <th> Date </th>
                                                      </tr>
                                                 </thead>
                                                  <tbody>
                                                    <?php 
                                                    $table_query = "Select * from tbl_goods_receive_temp where employee_code = '" . $_SESSION['b_staff_code'] . "'";
                                                    $table_query .= " limit 0, 50";
                                                    $table_result = mysqli_query($conn, $table_query)or die("Error : " . mysqli_error($conn));
                                                    while($table_rows = mysqli_fetch_array($table_result)){
                                                           ?>
                                                         <tr>
                                                             
                                                             <td>
                                                             <!-- Hidden Fields -->
                                                                <input type="hidden" name="unique_id[]" value="<?php echo $table_rows['unique_id']; ?>">
                                                                <input type="hidden" name="docket_num[]" value="<?php echo $table_rows['docket_number']; ?>">
                                                                <input type="hidden" name="employee_code[]" value="<?php echo $table_rows['employee_code']; ?>">
                                                                <input type="hidden" name="person_received[]" value="<?php echo $table_rows['person_received']; ?>">
                                                                <input type="hidden" name="item_barcode[]" value="<?php echo $table_rows['item_barcode']; ?>">
                                                                <input type="hidden" name="item_name[]" value="<?php echo $table_rows['item_name']; ?>">
                                                                <input type="hidden" name="cat[]" value="<?php echo $table_rows['cat']; ?>">
                                                                <input type="hidden" name="sub_category[]" value="<?php echo $table_rows['sub_category']; ?>">
                                                                <input type="hidden" name="item_quantity[]" value="<?php echo $table_rows['item_quantity']; ?>">
                                                                <input type="hidden" name="item_price[]" value="<?php echo $table_rows['item_price']; ?>">
                                                                <input type="hidden" name="item_description[]" value="<?php echo $table_rows['item_description']; ?>">
                                                                <input type="hidden" name="date_received[]" value="<?php echo $table_rows['date_received']; ?>">
                                                             <!-- #END# of Hidden Fields -->
                                                             <?php echo $table_rows['docket_number'] ?>
                                                             </td>
                                                             <td><?php echo $table_rows['employee_code'] ?></td>
                                                             <td><?php echo $table_rows['item_barcode'] ?></td>
                                                             <td><?php echo $table_rows['item_name'] ?></td>
                                                             <td><?php echo $table_rows['cat'] ?></td>
                                                             <td><?php echo $table_rows['sub_category'] ?></td>
                                                             <td><?php echo $table_rows['item_quantity'] ?></td>
                                                             <td><?php echo $table_rows['item_price'] ?></td>
                                                             <td><?php echo $table_rows['item_description']; ?></td>
                                                             <td><?php echo $table_rows['date_received']; ?></td>
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
                         <button type="submit" class="btn btn-primary" name="btn_commit"  style="margin-top:-20px;height:30px;padding-top:0;"><i class="material-icons">done</i> Commit </button>
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
                                     <li> Check the following Required Fields you should contain with it with content </li>
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
  <div class="modal-dialog" role="document" style="width:50%;">
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
                                 <label> List of items </label>
                                 <table id="list_items" class="table table-striped table-bordered">
                                        <thead>
                                             <tr>
                                                  <th> Barcode </th>
                                                  <th> Description </th>
                                                  <th> Category </th>
                                                  <th> Sub Category </th>
                                                 
                                                  <th> Price </th>
                                                </tr>
                                          </thead>
                                          <tbody>
                                             <?php 
                                                $item_query = "Select * from tbl_swho_items";
                                                $item_result = mysqli_query($conn, $item_query);
                                                while($item_rows = mysqli_fetch_array($item_result)){
                                                    ?>
                                                       <tr>
                                                           <td class="nr"><a href="#" data-dismiss="modal" class="bcode_info"><?php echo $item_rows['item_barcode']; ?></a></td>
                                                           <td><?php echo $item_rows['item_name']; ?></td>
                                                           <td><?php echo $item_rows['cat']; ?></td>
                                                           <td><?php echo $item_rows['sub_cat']; ?></td>
                                                           <td><?php echo $item_rows['item_price']; ?></td>
                                                          </tr>
                                                    <?php
                                                }
                                             ?>
                                            </tbody>
                                   </table>
                                   <script type="text/javascript">
                                            $('.bcode_info').click(function(){
                                                     var row = $(this).closest("tr");
                                                     var text = row.find(".nr").text();
                                                     document.getElementById("item_barcode").value = text;
                                                     var xmlhttp = new XMLHttpRequest();
                                                     xmlhttp.open("GET", "goods_receive_page_click.php?icode=" + text, false);
                                                     xmlhttp.send(null);
                                                     document.getElementById("existing_div").innerHTML = xmlhttp.responseText;
                                                  
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
            $('#list_items').DataTable({
                 responsive:true
            })
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