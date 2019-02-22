<?php require_once('Connection.php'); ?>
<?php 
date_default_timezone_set('Asia/Manila');
$day = date('d');
$month = date('m');
$year = date('Y');
$fullDate = $month . "/" . $day . "/" . $year;
$picker = $year . "-" . $month . "-" . $day;
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title> Sales </title>
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
           
            <div class="row clearfix">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="card" style="height:375px;">
                        <div class="header">
                            <h2>
                                <i class="material-icons"> account_circle </i> Account Information
                            </h2>
                         
                        </div>
                        
                         <div class="body">
                            <h2 class="card-inside-title"></h2>
                            <div class="row clearfix">
                           <div class="col-md-12 col-sm-10 col-xs-10">
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                     <label> Staff Code :  </label>
                                     </div>
                                     <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                     <label> <?php echo $_SESSION['b_staff_code']; ?> </label>
                                     </div>
                                       <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                     <label> Staff Name :  </label>
                                     </div>
                                     <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                     <label> <?php echo $_SESSION['fullname']; ?> </label>
                                     </div>
                                     <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                     <label> Branch :  </label>
                                     </div>
                                     <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                     <label> <?php echo $_SESSION['b_code']; ?> </label>
                                     </div>
                                      <div class="col-lg-3 col-md-3 col-sm-5 col-xs-5">
                                     <label> Date :  </label>
                                     </div>
                                     <div class="col-lg-9 col-md-9 col-sm-5 col-xs-5">
                                       <div class="form-group">
                                            <div class="form-line">
                                                 <input type="date" class="form-control" id="date_pick"  value="<?php echo $picker; ?>">
                                                 
                                                 <script type="text/javascript">
                                                        $('#date_pick').change(function(){
                                                               var d = new Date(document.getElementById("date_pick").value);
                                                                var day = d.getDate();
                                                                var month = d.getMonth();
                                                                month++;
                                                                var year = d.getFullYear();
                                                                if(day < 10){
                                                                     day = "0" + day;
                                                                }
                                                                if(month < 10){
                                                                     month = "0" + month;
                                                                }
                                                                var fdate = month + "/" + day + "/" + year;
                                                               document.getElementById("date_val").value = fdate;
                                                        });
                                                    </script>
                                              </div>
                                        </div>
                                     </div>
                                  
                               </div> <!-- End of Row Division -->     
                             </div>
                       
                             
                      
                            </div>
                            
                           </div>
                     </div>
                        
 <!-- Second Form -->

      
            <div class="row clearfix">
                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                            <i class="material-icons">info </i>  Item Information
                            </h2>
                         
                        </div>
                        
                         <div class="body">
                            <h2 class="card-inside-title"></h2>
                            <div class="row clearfix">
                           <div class="col-md-12 col-lg-12 col-sm-10 col-xs-10">
                                 <div id="invoice_content_div">
                                  <div class="col-md-4 col-lg-4 col-sm-10 col-xs-10">
                                    <input type="hidden" id="bbranch_code" value="<?php echo $_SESSION['b_code']; ?>">
                                              <label> Transaction Number </label>
                                              <div class="form-group">
                                                      <div class="form-line">
                                                          <?php 
                                                            $sales_num_query = "Select * from tbl_sales_number";
                                                            $sales_num_result = mysqli_query($conn, $sales_num_query);
                                                            $sales_num_rows = mysqli_fetch_array($sales_num_result);
                                                            $sales_value = (int)$sales_num_rows['idd'] + 1;
                                                          ?>
                                                             <input type="text" disabled="disabled" class="form-control" value="<?php echo $sales_num_rows['idd'] + 1; ?>">
                                                             <input type="hidden" id="trans_number" name="transaction_number" value="<?php echo $sales_value; ?>">
                                                         </div>
                                                 </div>
                                       </div>
                                     </div>
                                        <div class="col-md-7 col-lg-7 col-sm-10 col-xs-10">
                                    
                                              <label> Invoice Number </label>
                                              <div class="form-group">
                                                      <div class="form-line">
                                                             <input type="text" class="form-control" id="invoice_number">
                                                             <script type="text/javascript">
                                                                       $('#invoice_number').change(function(){
                                                                             var xmlhttp = new XMLHttpRequest();
                                                                             xmlhttp.open("GET", "sales_invoice_searching_query.php?icode=" +document.getElementById("invoice_number").value + "&branch=" + document.getElementById("bbranch_code").value, false);
                                                                             xmlhttp.send(null);
                                                                             document.getElementById("invoice_content_div").innerHTML = xmlhttp.responseText;
                                                                       });
                                                                </script>
                                                         </div>
                                                 </div>
                                       </div>
                                    <div class="col-md-12 col-lg-10 col-sm-10 col-xs-10"> </div> 
                      
                                    <div class="col-md-4 col-lg-4 col-sm-10 col-xs-10">
                                    
                                              <label> Item Barcode </label>
                                              <div class="form-group">
                                                      <div class="form-line">
                                                             <input type="text" class="form-control" id="item_barcode">
                                                         </div>
                                                 </div>
                                       </div>
                                       <div class="col-md-1 col-lg-1 col-sm-1 col-xs-1">
                                              <a href="#" class="btn btn-default" data-toggle="modal" data-target="#list_items" style="height:30px;width:30px;padding-top:0;margin-top:20px;margin-left:-20px;"><i class="material-icons" style="margin-left:-6px;margin-top:2px;"> list </i> </a>
                                       </div>
                                <div id="content_div">
                                       
                                         <div class="col-md-6 col-lg-6 col-sm-10 col-xs-10">
                                              <label> Description </label>
                                              <div class="form-group">
                                                      <div class="form-line">
                                                             <input type="text" class="form-control">
                                                         </div>
                                                 </div>
                                       </div>
                                         <div class="col-md-3 col-lg-3 col-sm-10 col-xs-10">
                                              <label> Price </label>
                                              <div class="form-group">
                                                      <div class="form-line">
                                                             <input type="text" class="form-control">
                                                         </div>
                                                 </div>
                                       </div>
                                     
                                       
                                   </div> <!-- End of content division -->
                                     <div class="col-md-2 col-lg-2 col-sm-10 col-xs-10">
                                                        <label> Disc. Opt </label>
                                                           <select class="form-control" id="disc_opt">
                                                              <option value="perce"> % </option>
                                                              <option value="php_pesos"> P </option>
                                                             
                                                          </select>
                                             </div>
                                      <div class="col-md-2 col-lg-2 col-sm-10 col-xs-10" id="discount_div">
                                       <style type="text/css">
                                            #peso_div{
                                                display:none;
                                            }
                                        </style>
                                         <div id="peso_div">
                                              <label> PHP </label>
                                              <div class="form-group">
                                                           <div class="form-line">
                                                            <span id="percent-sign">₱</span>
                                                            <input type="text" min="0" max="100" accuracy="2" onkeypress="return isNumber(event);" class="form-control" value="0" id="peso_deduc">
                                                            </div> 
                                                 </div>
                                            </div>
                                           <div id="percentage_div">
                                              <label> % </label>
                                              <div class="form-group">
                                                           <div class="form-line">
                                                            <span id="percent-sign">%</span>
                                                            <input type="number" min="0" max="100" accuracy="2" onkeypress="return isNumber(event);" class="form-control" value="0" id="item_disc">
                                                            </div> 
                                                 </div>
                                            </div>
                                           <script type="text/javascript">
                                              $('#disc_opt').change(function(){
                                                    if(document.getElementById("disc_opt").value == "php_pesos"){
                                                     document.getElementById("percentage_div").style.display = "none";
                                                     document.getElementById("peso_div").style.display = "block";
                                                    }else if(document.getElementById("disc_opt").value == "perce"){
                                                     document.getElementById("percentage_div").style.display = "block";
                                                     document.getElementById("peso_div").style.display = "none";
                                                    }

                                               }); 
                                            </script>
                                       </div>  
                                     <div class="col-md-2 col-lg-2 col-sm-10 col-xs-10">
                                              <label> Quantity </label>
                                              <div class="form-group">
                                                      <div class="form-line">
                                                             <input type="text" class="form-control" id="item_quantity" onkeypress="return isNumber(event);">
                                                         </div>
                                                 </div>
                                       </div>
                                    <div class="col-md-3 col-lg-3 col-sm-10 col-xs-10">
                                              <label> Total </label>
                                              <div class="form-group">
                                                      <div class="form-line">
                                                             <input type="text" class="form-control" id="item_total">
                                                         </div>
                                                 </div>
                                       </div>
                                    <style type="text/css">
                                      #percent-sign {
                                       top: 8px;
                                       left: 45px;
                                       color: #555;
                                       position: absolute;
                                       z-index: 1;
                                       font-size:18px;
                                       font-weight:bold;
                                      }
                                      </style>
                                  
                                       
                               </div> <!-- End of Row Division -->  
                                   
                           
                             </div>
                       
                       <button type="button" class="btn btn-primary" id="btn_add" style="margin-top:-30px;margin-left:10px;height:30px;padding-top:0;"><i class="material-icons"> library_add</i> Add </button>   
                       <button type="button" class="btn btn-success" id="btn_return" data-toggle="modal" data-target="#return_goods" style="margin-top:-30px;margin-left:10px;height:30px;padding-top:0;"><i class="material-icons"> transfer_within_a_station</i> Sales Return </button>
                        
                            </div>
                            <script type="text/javascript">
                                 
                              function isNumber(evt) {
                                            evt = (evt) ? evt : window.event;
                                            var charCode = (evt.which) ? evt.which : evt.keyCode;
                                            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                                              return false;
                                            }
                                         return true;
                                  }
                               $(document).ready(function(){
                                  
                                  $('#item_quantity').keyup(function(){
                                    if(document.getElementById("disc_opt").value == "perce"){
                                      var item_price = Number(document.getElementById("item_price").value);
                                      var item_discount = Number(document.getElementById("item_disc").value);
                                      var discount = item_price-(item_price*(item_discount/100));
                                      var item_quantity = Number(document.getElementById("item_quantity").value);
                                      var total = item_quantity * discount;
                                      document.getElementById("item_total").value = total;
                                    }else if(document.getElementById("disc_opt").value == "php_pesos"){
                                      var item_price = Number(document.getElementById("item_price").value);
                                      var item_quantity = Number(document.getElementById("item_quantity").value);
                                      var peso_deduc = Number(document.getElementById("peso_deduc").value);
                                      var sub_total = item_price * item_quantity;
                                      var total = sub_total - peso_deduc;
                                      if(total <= 0){
                                         document.getElementById("item_total").value = "0";
                                      }else{
                                         document.getElementById("item_total").value = total;
                                      }
                                    }
                                      /*
                                        if(document.getElementById("item_quantity").value == ""){
                                             document.getElementById("item_total").value = 0;
                                        }else{
                                            var item_price = parseInt(document.getElementById("item_price").value);
                                            var item_quantity = parseInt(document.getElementById("item_quantity").value);
                                            var total = item_quantity * item_price;
                                            document.getElementById("item_total").value = total;
                                        }
                                         */
                                  });
                                  $('#item_barcode').change(function(){
                                         var xmlhttp = new XMLHttpRequest();
                                         xmlhttp.open("GET", "sales_page_searching_query.php?icode=" + $('#item_barcode').val(), false);
                                         xmlhttp.send(null);
                                         if(xmlhttp.responseText == "NE"){
                                               alert("Item Does not exists in your inventory");
                                         }else{
                                              document.getElementById("content_div").innerHTML = xmlhttp.responseText;
                                         }
                                  });
                                  $('#btn_add').click(function(){
                                        var item_barcode = $('#item_barcode').val();
                                        var item_name = $('#item_name').val();
                                        var item_price = $('#item_price').val();
                                        var item_quantity = $('#item_quantity').val();
                                        var item_total = $('#item_total').val();
                                        var trans_num = Number(document.getElementById("trans_number").value);
                                        var invoice_number = $('#invoice_number').val();
                                        var trans_value = $('#trans_value').val();
                                        if(document.getElementById("item_barcode").value == "" || document.getElementById("item_name").value == "" || document.getElementById("item_price").value == "" || document.getElementById("item_quantity").value == "" || document.getElementById("item_total").value == "" || document.getElementById("invoice_number").value == ""){
                                            alert("Oh Snap .. You need to add value first");
                                        }else{

                                       
                                        $.ajax({
                                              type      :       "POST",
                                              url       :       "sales_page_add_query.php",
                                              data      :       {item_barcode:item_barcode, item_name:item_name, item_price:item_price, item_quantity:item_quantity, item_total:item_total,trans_number:trans_num, invoice_number:invoice_number, trans_value:trans_value},
                                              success   :       function(result){
                                                                   alert(result);
                                                                   $('#item_barcode').val("");
                                                                   $('#item_name').val("");
                                                                   $('#item_price').val("");
                                                                   $('#item_quantity').val(""); 
                                                                   $('#item_total').val("");
                                                                   $('#peso_deduc').val("");
                                                                   $('#item_disc').val("");
                                                                   document.getElementById("invoice_number").disabled = true;
                                                                    var xmlhttp = new XMLHttpRequest();
                                      xmlhttp.open("GET",  "sales_page_table_query.php", false);
                                      xmlhttp.send(null);
                                      document.getElementById("c_items").innerHTML = xmlhttp.responseText;
                                      
                                      var totalhttp = new XMLHttpRequest();
                                      totalhttp.open("GET", "sales_page_total_query.php", false);
                                      totalhttp.send(null);
                                      document.getElementById("total_div").innerHTML = totalhttp.responseText;
                                              },
                                              error     :       function(errorResult){
                                                                   alert(errorResult);
                                              }
                                        });
                                
                                     
                                    }      
                                
                                  });
                                     
                                      
                           });
                          </script>
                             
                           </div>
     <!-- #END# of second form -->
                    

                    </div>
                    
                </div>
                
            </div>
           
<?php 
   if(isset($_POST['btn_commit'])){
          $trans_number = mysqli_real_escape_string($conn, $_POST['transaction_n']);
          $cust_name = mysqli_real_escape_string($conn, $_POST['customer_name']);
          $txt_cash = mysqli_real_escape_string($conn, $_POST['txt_cash']);
          $rem_balance = mysqli_real_escape_string($conn, $_POST['rem_balance']);
          $payment_method = mysqli_real_escape_string($conn, $_POST['btn_radio']);
          $txt_total = mysqli_real_escape_string($conn, $_POST['txt_total']);
          $invoice_num = mysqli_real_escape_string($conn, $_POST['invoice_num']);
          $card_number = mysqli_real_escape_string($conn, $_POST['card_number']);
          $c_expiration = mysqli_real_escape_string($conn, $_POST['c_expiration']);
          $c_cw = mysqli_real_escape_string($conn, $_POST['c_cw']);
          $date_val = $_POST['date_val'];
          $ins_message = false;
          $duplicate_query = mysqli_query($conn, "Select * from tbl_sales_series where invoice_number = '" . $invoice_num . "' and branch = '" . $_SESSION['b_code'] . "'");
          $duplicate_count = mysqli_num_rows($duplicate_query);
          if($duplicate_count > 0){
              /* Existing Invoice Add */
              if($payment_method == "cash"){ // Cash Function
                $invoice_existing_query = mysqli_query($conn, "Select * from tbl_sales_series where invoice_number = '" . $invoice_num . "' and branch = '" . $_SESSION['b_code'] . "'");
               $invoice_existing_rows = mysqli_fetch_array($invoice_existing_query);
               $invoice_existing_count = mysqli_num_rows($invoice_existing_query);
           if($invoice_existing_count > 0){
                     /* Function */
           if(empty($txt_cash) || empty($payment_method)){
               echo '<script type="text/javascript"> alert("Oh snap .. You need to add value first"); window.location="sales_page.php"; </script>';
           }else{
            if($txt_cash < $txt_total){
                   echo '<script type="text/javascript"> alert("Inssufficient amount of cash"); window.location="sales_page.php"; </script>';
            }else{   
            foreach($_POST['item_barcode'] as $key => $value){
                   $transaction_number = mysqli_real_escape_string($conn, $_POST['trans_number'][$key]);
                   $invoice_number = mysqli_real_escape_string($conn, $_POST['invoice_number'][$key]);
                   $item_barcode = mysqli_real_escape_string($conn, $_POST['item_barcode'][$key]);
                   $item_name = mysqli_real_escape_string($conn, $_POST['item_name'][$key]);
                   $item_quantity = mysqli_real_escape_string($conn, $_POST['item_quantity'][$key]);
                   $price = mysqli_real_escape_string($conn, $_POST['price'][$key]);
                   $total = mysqli_real_escape_string($conn, $_POST['total'][$key]);
                 
                   $rem_quant_query = "Select * from tbl_branch_goods_receive where item_barcode IN ('" . $item_barcode . "')";
                   $rem_quant_query .= " and branch_name IN ('" . $_SESSION['b_code'] . "')";
                   $rem_quant_result = mysqli_query($conn, $rem_quant_query)or die('<script type="text/javascript"> alert("'.mysqli_error($conn).'"); </script>');
                   $rem_quant_rows = mysqli_fetch_array($rem_quant_result);
                   $total_quant = 0;
                   $total_quant = $rem_quant_rows['item_quantity'] - $item_quantity;
                  
                   $update_quantity = "Update tbl_branch_goods_receive set item_quantity = '" . $total_quant . "' where item_barcode = '" . $item_barcode . "' and branch_name = '" . $_SESSION['b_code'] . "'";
                   $update_result = mysqli_query($conn, $update_quantity)or die('<script type="text/javascript"> alert("'.mysqli_error($conn).'") </script>');
                   $ins_sales_query = "Insert into tbl_sales(transaction_number, invoice_number, staff_code, staff_name, branch, item_barcode, item_name, quant, total, price, date_transaction)values('"
                   . $transaction_number . "','" . $invoice_number . "','" . $_SESSION['b_staff_code'] . "','" . $_SESSION['fullname'] . "','" . $_SESSION['b_code'] . "','" . $item_barcode . "','" . $item_name . "','" . 
                   $item_quantity . "','" . $total . "','" . $price . "','" . $date_val . "')";
                   $ins_sales_result = mysqli_query($conn, $ins_sales_query)or die('<script type="text/javascript"> alert("'.mysqli_error($conn).'"); </script>');
                   if($ins_sales_result === true){
                           $ins_message = true;
                   }
                 
          }  
          if($ins_message){
                       $total_c_cash = $txt_cash + $invoice_existing_rows['customer_cash'];
                       $total_c_change = $rem_balance + $invoice_existing_rows['customer_change'];
                       $invoice_existing_update = mysqli_query($conn, "Update tbl_sales_series set customer_cash = '" . $total_c_cash . "', customer_change = '" . $total_c_change .
                        "' where invoice_number = '" . $invoice_number . "' and branch = '" . $_SESSION['b_code'] . "'");
                       $delete_query = "Delete from tbl_sales_temp where staff_code = '" . $_SESSION['b_staff_code'] . "'";
                       $delete_result = mysqli_query($conn, $delete_query);
                       echo '<script type="text/javascript"> alert("Well Done !! Transaction Complete"); </script>';
                  
          }
        }
     
     }
                     /* Function */
               }else{
                    echo '<script type="text/javascript"> alert("Invoice Number Already Exists, Please Re-encode the ts again");window.location="sales_page.php"; </script>';
               }
              }else{ // END OF CASH // Credit Card Function
               $invoice_existing_query = mysqli_query($conn, "Select * from tbl_sales_series where invoice_number = '" . $invoice_num . "' and branch = '" . $_SESSION['b_code'] . "'");
               $invoice_existing_rows = mysqli_fetch_array($invoice_existing_query);
               $invoice_existing_count = mysqli_num_rows($invoice_existing_query);
           if($invoice_existing_count > 0){
                     /* Function */
           
            foreach($_POST['item_barcode'] as $key => $value){
                   $transaction_number = mysqli_real_escape_string($conn, $_POST['trans_number'][$key]);
                   $invoice_number = mysqli_real_escape_string($conn, $_POST['invoice_number'][$key]);
                   $item_barcode = mysqli_real_escape_string($conn, $_POST['item_barcode'][$key]);
                   $item_name = mysqli_real_escape_string($conn, $_POST['item_name'][$key]);
                   $item_quantity = mysqli_real_escape_string($conn, $_POST['item_quantity'][$key]);
                   $price = mysqli_real_escape_string($conn, $_POST['price'][$key]);
                   $total = mysqli_real_escape_string($conn, $_POST['total'][$key]);
                 
                   $rem_quant_query = "Select * from tbl_branch_goods_receive where item_barcode IN ('" . $item_barcode . "')";
                   $rem_quant_query .= " and branch_name IN ('" . $_SESSION['b_code'] . "')";
                   $rem_quant_result = mysqli_query($conn, $rem_quant_query)or die('<script type="text/javascript"> alert("'.mysqli_error($conn).'"); </script>');
                   $rem_quant_rows = mysqli_fetch_array($rem_quant_result);
                   $total_quant = 0;
                   $total_quant = $rem_quant_rows['item_quantity'] - $item_quantity;
                  
                   $update_quantity = "Update tbl_branch_goods_receive set item_quantity = '" . $total_quant . "' where item_barcode = '" . $item_barcode . "' and branch_name = '" . $_SESSION['b_code'] . "'";
                   $update_result = mysqli_query($conn, $update_quantity)or die('<script type="text/javascript"> alert("'.mysqli_error($conn).'") </script>');
                   $ins_sales_query = "Insert into tbl_sales(transaction_number, invoice_number, staff_code, staff_name, branch, item_barcode, item_name, quant, total, price, date_transaction)values('"
                   . $transaction_number . "','" . $invoice_number . "','" . $_SESSION['b_staff_code'] . "','" . $_SESSION['fullname'] . "','" . $_SESSION['b_code'] . "','" . $item_barcode . "','" . $item_name . "','" . 
                   $item_quantity . "','" . $total . "','" . $price . "','" . $date_val . "')";
                   $ins_sales_result = mysqli_query($conn, $ins_sales_query)or die('<script type="text/javascript"> alert("'.mysqli_error($conn).'"); </script>');
                   if($ins_sales_result === true){
                           $ins_message = true;
                   }
                 
          }  
          if($ins_message){
                     
                       $invoice_existing_update = mysqli_query($conn, "Update tbl_sales_series set card_number = '" . $card_number . "', c_expiration = '" . $c_expiration .
                       "', c_cw = '" . $c_cw . "' where invoice_number = '" . $invoice_number . "' and branch = '" . $_SESSION['b_code'] . "'");
                       $credit_query = mysqli_query($conn, "Insert into tbl_credit_record(invoice_number, credit_num, c_cw, exp_date, date_transaction, branch)values('"
                       . $invoice_num . "','" . $card_number . "','" . $c_cw . "','" . $c_expiration . "','" . $fullDate . "','" . $_SESSION['b_code'] . "')");
                       $delete_query = "Delete from tbl_sales_temp where staff_code = '" . $_SESSION['b_staff_code'] . "'";
                       $delete_result = mysqli_query($conn, $delete_query);
                       echo '<script type="text/javascript"> alert("Well Done !! Transaction Complete"); </script>';
                  
          }
      
     
    
                     /* Function */
               }else{
                    echo '<script type="text/javascript"> alert("Invoice Number Already Exists, Please Re-encode the ts again");window.location="sales_page.php"; </script>';
               }
              } 
                /* Existing Invoice Add */
          }else{
              if($payment_method == "cash"){
                  if($txt_cash < $txt_total){  // CASH  FUNCTION
                 echo '<script type="text/javascript"> alert("Inssufficient amount of cash"); </script>';
          }else{
              /* 2nd Transaction Parse */
              
          
          if(empty($txt_cash) || empty($payment_method)){
               echo '<script type="text/javascript"> alert("Oh snap .. You need to add value first"); window.location="sales_page.php"; </script>';
          }else{ 
            foreach($_POST['item_barcode'] as $key => $value){
                   $transaction_number = mysqli_real_escape_string($conn, $_POST['trans_number'][$key]);
                   $invoice_number = mysqli_real_escape_string($conn, $_POST['invoice_number'][$key]);
                   $item_barcode = mysqli_real_escape_string($conn, $_POST['item_barcode'][$key]);
                   $item_name = mysqli_real_escape_string($conn, $_POST['item_name'][$key]);
                   $item_quantity = mysqli_real_escape_string($conn, $_POST['item_quantity'][$key]);
                   $price = mysqli_real_escape_string($conn, $_POST['price'][$key]);
                   $total = mysqli_real_escape_string($conn, $_POST['total'][$key]);
                 
                   $rem_quant_query = "Select * from tbl_branch_goods_receive where item_barcode IN ('" . $item_barcode . "')";
                   $rem_quant_query .= " and branch_name IN ('" . $_SESSION['b_code'] . "')";
                   $rem_quant_result = mysqli_query($conn, $rem_quant_query)or die('<script type="text/javascript"> alert("'.mysqli_error($conn).'"); </script>');
                   $rem_quant_rows = mysqli_fetch_array($rem_quant_result);
                   $total_quant = 0;
                   $total_quant = $rem_quant_rows['item_quantity'] - $item_quantity;
                  
                   $update_quantity = "Update tbl_branch_goods_receive set item_quantity = '" . $total_quant . "' where item_barcode = '" . $item_barcode . "' and branch_name = '" . $_SESSION['b_code'] . "'";
                   $update_result = mysqli_query($conn, $update_quantity)or die('<script type="text/javascript"> alert("'.mysqli_error($conn).'") </script>');
                   $ins_sales_query = "Insert into tbl_sales(transaction_number, invoice_number, staff_code, staff_name, branch, item_barcode, item_name, quant, total, price, date_transaction)values('"
                   . $transaction_number . "','" . $invoice_number . "','" . $_SESSION['b_staff_code'] . "','" . $_SESSION['fullname'] . "','" . $_SESSION['b_code'] . "','" . $item_barcode . "','" . $item_name . "','" . 
                   $item_quantity . "','" . $total . "','" . $price . "','" . $date_val . "')";
                   $ins_sales_result = mysqli_query($conn, $ins_sales_query)or die('<script type="text/javascript"> alert("'.mysqli_error($conn).'"); </script>');
                   if($ins_sales_result === true){
                           $ins_message = true;
                   }
                 
          }  
          if($ins_message){
                 if($payment_method == "cash"){ // Cash
                  $ins_series_query = "Insert into tbl_sales_series(transaction_number, customer_name, staff_name, staff_code, customer_cash, customer_change, transaction_date, branch, payment_method, invoice_number)values('"
                  . $trans_number . "','" . $cust_name . "','" . $_SESSION['fullname'] . "','" . $_SESSION['b_staff_code'] . "','" . $txt_cash . "','" . $rem_balance . "','" . $date_val . "','" . $_SESSION['b_code'] . "','" . $payment_method . "','" . $invoice_num . "')";
                  $ins_series_result = mysqli_query($conn, $ins_series_query)or die('<script type="text/javascript"> alert("'.mysqli_error($conn).'"); </script>');
                  if($ins_series_result === true){
                       $delete_query = "Delete from tbl_sales_temp where staff_code = '" . $_SESSION['b_staff_code'] . "'";
                       $delete_result = mysqli_query($conn, $delete_query);
                       echo '<script type="text/javascript"> alert("Well Done !! Transaction Complete"); </script>';
                  }
                }
          }
       }
    }   // CASH  FUNCTION
  /* 2nd Transaction Parse */
              }else{ // CREDIT CARD FUNCTION
                     /*  if($txt_cash < $txt_total){
                 echo '<script type="text/javascript"> alert("Inssufficient amount of cash"); </script>';
          }else{*/ 
              /* 2nd Transaction Parse */
              
          
        /*  if(empty($txt_cash) || empty($payment_method)){
               echo '<script type="text/javascript"> alert("Oh snap .. You need to add value first"); window.location="sales_page.php"; </script>';
          }else{ */
            foreach($_POST['item_barcode'] as $key => $value){
                   $transaction_number = mysqli_real_escape_string($conn, $_POST['trans_number'][$key]);
                   $invoice_number = mysqli_real_escape_string($conn, $_POST['invoice_number'][$key]);
                   $item_barcode = mysqli_real_escape_string($conn, $_POST['item_barcode'][$key]);
                   $item_name = mysqli_real_escape_string($conn, $_POST['item_name'][$key]);
                   $item_quantity = mysqli_real_escape_string($conn, $_POST['item_quantity'][$key]);
                   $price = mysqli_real_escape_string($conn, $_POST['price'][$key]);
                   $total = mysqli_real_escape_string($conn, $_POST['total'][$key]);
                 
                   $rem_quant_query = "Select * from tbl_branch_goods_receive where item_barcode IN ('" . $item_barcode . "')";
                   $rem_quant_query .= " and branch_name IN ('" . $_SESSION['b_code'] . "')";
                   $rem_quant_result = mysqli_query($conn, $rem_quant_query)or die('<script type="text/javascript"> alert("'.mysqli_error($conn).'"); </script>');
                   $rem_quant_rows = mysqli_fetch_array($rem_quant_result);
                   $total_quant = 0;
                   $total_quant = $rem_quant_rows['item_quantity'] - $item_quantity;
                  
                   $update_quantity = "Update tbl_branch_goods_receive set item_quantity = '" . $total_quant . "' where item_barcode = '" . $item_barcode . "' and branch_name = '" . $_SESSION['b_code'] . "'";
                   $update_result = mysqli_query($conn, $update_quantity)or die('<script type="text/javascript"> alert("'.mysqli_error($conn).'") </script>');
                   $ins_sales_query = "Insert into tbl_sales(transaction_number, invoice_number, staff_code, staff_name, branch, item_barcode, item_name, quant, total, price, date_transaction)values('"
                   . $transaction_number . "','" . $invoice_number . "','" . $_SESSION['b_staff_code'] . "','" . $_SESSION['fullname'] . "','" . $_SESSION['b_code'] . "','" . $item_barcode . "','" . $item_name . "','" . 
                   $item_quantity . "','" . $total . "','" . $price . "','" . $date_val . "')";
                   $ins_sales_result = mysqli_query($conn, $ins_sales_query)or die('<script type="text/javascript"> alert("'.mysqli_error($conn).'"); </script>');
                   if($ins_sales_result === true){
                           $ins_message = true;
                   }
                 
          }  
          if($ins_message){
                
                    $ins_series_query = "Insert into tbl_sales_series(transaction_number, customer_name, staff_name, staff_code, transaction_date, branch, payment_method, invoice_number, card_number, c_expiration, c_cw)values('"
                  . $trans_number . "','" . $cust_name . "','" . $_SESSION['fullname'] . "','" . $_SESSION['b_staff_code'] . "','"  . $date_val . "','" . $_SESSION['b_code'] . "','" . $payment_method . "','" . $invoice_num . "','" . $card_number . "','" . $c_expiration . "','" . $c_cw . "')";
                  $ins_series_result = mysqli_query($conn, $ins_series_query)or die('<script type="text/javascript"> alert("'.mysqli_error($conn).'"); </script>');
                  if($ins_series_result === true){
                       $delete_query = "Delete from tbl_sales_temp where staff_code = '" . $_SESSION['b_staff_code'] . "'";
                       $delete_result = mysqli_query($conn, $delete_query);
                       echo '<script type="text/javascript"> alert("Well Done !! Transaction Complete"); </script>';
                  }
              
          }
     //}
  // }
  /* 2nd Transaction Parse */
              } // CREDIT CARD FUNCTION
        
 }                
}
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data ">
                <!-- table Form -->
         <!-- Hidden Transaction Number -->
            <?php 
               $item_ver_query = "Select * from tbl_sales_temp where staff_code = '" . $_SESSION['b_staff_code'] . "'";
               $item_ver_result = mysqli_query($conn, $item_ver_query);
               $item_ver_rows = mysqli_fetch_array($item_ver_result);
               $inv_query = mysqli_query($conn, "Select * from tbl_sales_temp where staff_code = '" . $_SESSION['b_staff_code'] . "' and branch_name = '" . $_SESSION['b_code'] . "'");
               $inv_rows = mysqli_fetch_array($inv_query);
            ?>
            
         
            <input type="hidden" name="my_number" id="my_number">
            <input type="hidden" id="trans_value" value="<?php echo $item_ver_rows['transaction_number']; ?>">
            <input type="hidden" id="date_val" name="date_val" value="<?php echo $fullDate; ?>"> 
            <input type="hidden" name="invoice_num" id="invoice_num" value="<?php echo $inv_rows['invoice_number']; ?>">
        
            <script type="text/javascript">
                $('#invoice_number').keyup(function(){
                      document.getElementById("invoice_num").value = document.getElementById("invoice_number").value
                });
                document.getElementById("my_number").value = document.getElementById("trans_number").value;
             </script>
            <!-- #END# Transaction Number -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" style="width:93%;">
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
                                    <button type="button" class="btn btn-danger" id="btn_delete" style="height:30px;padding-top:0;"><i class="material-icons"> delete </i> Delete Selected </button>
                                     <table id="c_items" class="table table-striped table-bordered">
                                           <thead>
                                                <tr>
                                                     <th> <input type="checkbox" id="main_check"><label for="main_check"> </label></th>
                                                     <th> Transaction Number </th>
                                                     <th> Item Barcode </th>
                                                     <th> Description </th>
                                                     <th> Quantity </th>
                                                     <th> Price </th>
                                                     <th> Total </th>
                                               </tr>
                                             </thead>
                                             <tbody>
                                                  <?php
                                                   $items_query = "Select * from tbl_sales_temp where staff_code = '" . $_SESSION['b_staff_code'] . "'";
                                                   $items_result = mysqli_query($conn, $items_query);
                                                   while($items_rows = mysqli_fetch_array($items_result)){
                                                    ?>
                                                       <tr>
                                                            <td><input type="checkbox" class="checkbox" id="<?php echo $items_rows['_id'] ?>" name="id"><label for="<?php echo $items_rows['_id'] ?>"> </label></td>
                                                            <td><?php echo $items_rows['transaction_number']; ?></td>
                                                            <td>
                                                            <!-- Hidden Fields -->
                                                            <input type="hidden" name="transaction_n" value="<?php echo $items_rows['transaction_number']; ?>">
                                                            <input type="hidden" name="trans_number[]" value="<?php echo $items_rows['transaction_number']; ?>">
                                                            <input type="hidden" name="invoice_number[]" value="<?php echo $items_rows['invoice_number']; ?>">
                                                            <input type="hidden" name="item_barcode[]" value="<?php echo $items_rows['item_barcode']; ?>">
                                                            <input type="hidden" name="item_name[]" value="<?php echo $items_rows['item_name']; ?>">
                                                            <input type="hidden" name="item_quantity[]" value="<?php echo $items_rows['item_quantity']; ?>">
                                                            <input type="hidden" name="price[]" value="<?php echo $items_rows['price']; ?>">
                                                            <input type="hidden" name="total[]" value="<?php echo $items_rows['total']; ?>">
                                                            <!-- END -->
                                                            
                                                            <?php echo $items_rows['item_barcode']; ?></td>
                                                            <td><?php echo $items_rows['item_name']; ?></td>
                                                            <td><?php echo $items_rows['item_quantity']; ?></td>
                                                            <td><?php echo $items_rows['price']; ?></td>
                                                            <td><?php echo $items_rows['total']; ?></td>
                                                         </tr>
                                                    <?php
                                                   } 
                                                   ?>
                                               </tbody>
                                       </table>
                                       <script type="text/javascript">
                                                 $(document).ready(function(){
                                                        $('#main_check').click(function(){
                                                               if(this.checked){
                                                                     $('.checkbox').each(function(){
                                                                        this.checked = true;
                                                                     });
                                                               }else{
                                                                     $('.checkbox').each(function(){
                                                                        this.checked = false;
                                                                     });
                                                               }
                                                        });
                                                        $('#btn_delete').click(function(){
                                                             var arrayList = new Array();
                                                             if($('input:checkbox:checked').length > 0){
                                                                    $('input:checkbox:checked').each(function(){
                                                                         arrayList.push($(this).attr('id'));
                                                                         $(this).closest("tr").remove();
                                                                         $.ajax({
                                                                              type    :      "POST",
                                                                              url     :      "sales_page_delete_query.php",
                                                                              data    :      {'data':arrayList},
                                                                              success :      function(result){
                                                                                            alert(result);
                                                                                            window.location="sales_page.php";
                                                                              },
                                                                              error   :      function(errorResult){
                                                                                             alert(errorResult);
                                                                              }
                                                                         });
                                                                    });
                                                             }else{
                                                                    alert("No items has been selected");
                                                             }
                                                        });
                                                 });
                                          </script>
                               </div> <!-- End of Row Division -->     
                             </div>
                       </div>
            </div>
     <!-- #END# of table form -->
          <!-- Thrid Form -->

      
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <i class="material-icons"> account_balance_wallet </i> Customer Details
                            </h2>
                         
                        </div>
                        
                         <div class="body">
                            <h2 class="card-inside-title"></h2>
                            <div class="row clearfix">
                           <div class="col-md-12 col-sm-10 col-xs-10">
                                   <div class="col-md-4 col-lg-5 col-sm-10 col-xs-10">
                                         <div class="form-group">
                                            <div class="form-line">
                                                <label> Customer Name </label>
                                                 <input type="text" class="form-control" name="customer_name">
                                               </div>
                                           </div>
                                      </div>
                                      
                                       <div class="col-md-3 col-lg-3 col-sm-10 col-xs-10">
                                         <div class="form-group">
                                            <div class="form-line">
                                                <label> Cash </label>
                                                 <input type="text" class="form-control" id="txt_cash" onkeypress="return isNumber(event);" name="txt_cash">
                                               </div>
                                           </div>
                                      </div>
                                    <div id="total_div">
                                        <div class="col-md-3 col-lg-3 col-sm-10 col-xs-10">
                                         <div class="form-group">
                                            <div class="form-line">
                                                <label> Total </label>
                                                  <?php 
                                                     $total_query = "Select Sum(total) as total_sales from tbl_sales_temp where staff_code = '" . $_SESSION['b_staff_code'] . "'";
                                                     $total_result = mysqli_query($conn, $total_query);
                                                     $total_rows = mysqli_fetch_array($total_result);
                                                  ?>
                                                   <input type="text" class="form-control" name="txt_total" id="txt_total" value="<?php echo $total_rows['total_sales']; ?>">
                                                  
                                               </div>
                                           </div>
                                      </div>
                                    </div>
                                       <div class="col-md-5 col-lg-5 col-sm-10 col-xs-10">
                                         <div class="form-group">
                                            <div class="form-line">
                                                <label> Customer Changed </label>
                                                 <input type="text" class="form-control" id="rem_balance" name="rem_balance">
                                               </div>
                                           </div>
                                      </div>
                                    
                                   <script type="text/javascript">
                                            $('#txt_cash').keyup(function(){
                                                  var total = Number(document.getElementById("txt_cash").value) - Number(document.getElementById("txt_total").value);
                                                   
                                                  if(total < 0) {
                                                        document.getElementById("rem_balance").value = "Inssuficient";
                                                  }else{
                                                       document.getElementById("rem_balance").value = total;
                                                  }
                                            });
                                            function isNumber(evt) {
                                            evt = (evt) ? evt : window.event;
                                            var charCode = (evt.which) ? evt.which : evt.keyCode;
                                            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                                              return false;
                                            }
                                            return true;
                                           }
                                      </script>
                                      
                               </div> <!-- End of Row Division -->     
                             </div>
                       
                             
                      
                            </div>
                            
                           </div>
     <!-- #END# of third form -->
     
     </div>
      <!-- Fourth Form -->

      
            <div class="row clearfix">
                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="card" style="height:355px;">
                        <div class="header">
                            <h2>
                                <i class="material-icons"> compare_arrows </i> Payment Method
                            </h2>
                         
                        </div>
                        
                         <div class="body">
                            <h2 class="card-inside-title"></h2>
                            <div class="row clearfix">
                           <div class="col-md-12 col-sm-10 col-xs-10">
                                       <div class="col-md-2 col-lg-2 colsm-2 col-xs-2">
                                            <input type="radio" id="radio1" value="cash" name="btn_radio"><label for="radio1"> Cash </label>
                                       </div> 
                                      <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12" style="margin-top:-30px;">
                                             <hr>
                                         </div>  
                                        <div class="col-md-2 col-lg-2 colsm-2 col-xs-2" style="margin-top:-20px;">
                                            <input type="radio" id="radio2" value="card" name="btn_radio"><label for="radio2"> Card </label>
                                       </div>
                                       <script type="text/javascript">
                                            $('#radio2').click(function(){
                                                $('#credit_div').toggle('slow');
                                                 document.getElementById('credit_div').style.display = "block";
                                                 document.getElementById('credit_div').style.backgroundColor = "gray";
                                                 
                                            });
                                            $('#radio1').click(function(){
                                                  $('#credit_div').toggle('slow');
                                                  document.getElementById('credit_div').style.display = "none";
                                            });
                                        </script> 
                                        <!-- Hidden Division -->
                                        <div style="display:none;" id="credit_div">
                                              <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                               
                                                        <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12" style="margin-top:10px;">
                                                            <label> Card Number : </label>
                                                         </div>
                                                        <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12" style="margin-top:-5px;">
                                                          <div class="form-group">
                                                              <div class="form-line">
                                                                 <input type="text" class="form-control" name="card_number">
                                                              </div>
                                                           </div>
                                                         </div>
                                                        <!--
                                                          <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12" style="margin-top:-20px;">
                                                            <label> Expiration : </label>
                                                         </div>
                                                        <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12" style="margin-top:-38px;">
                                                          <div class="form-group">
                                                              <div class="form-line">
                                                                 <input type="text" class="form-control" name="c_expiration">
                                                              </div>
                                                           </div>
                                                         </div>
                                                          <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12" style="margin-top:-20px;">
                                                            <label> CW : </label>
                                                         </div>
                                                        <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12" style="margin-top:-38px;">
                                                          <div class="form-group">
                                                              <div class="form-line">
                                                                 <input type="text" class="form-control" name="c_cw">
                                                              </div>
                                                           </div>
                                                         </div>
                                                     -->
                                               </div>
                                         </div>
                                          <!-- END Hidden Division -->
                               </div> <!-- End of Row Division -->     
                             </div>
                       
                             
                      
                            </div>
                            
                           </div>

                   </div>

                   
             </div>
                
                <button type="submit" class="btn btn-success" style="margin-left:15px;height:30px;padding-top:0;" name="btn_commit" onclick="return confirm('Are you sure you want commit this ? ');window.location='sales_page.php'; " ><i class="material-icons">done_all</i> Commit </button>
               
     <!-- #END# of Fourth form -->
     
     
    </section>
       

                     
                             </div> <!-- End of Button DIV -->

                     <!-- MODAL BOX 1 -->


<div class="modal fade" id="list_items" tabindex="-1" role="dialog" aria-labelledby="modifyModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
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
                                <table id="r_items" class="table table-striped table-bordered" style="width:100%;">
                                       <thead> 
                                            <tr>
                                                <th> Item Barcode </th>
                                                <th> Description </th>
                                                <th> Quantity </th>
                                              </tr>
                                        </thead>
                                        <tbody>
                                             <?php 
                                                $items_query = "Select * from tbl_branch_goods_receive where branch_name = '" . $_SESSION['b_code'] . "'";
                                                $items_result = mysqli_query($conn, $items_query);
                                                while($items_rows = mysqli_fetch_array($items_result)){
                                                 ?>
                                                   <tr>
                                                         <td class="nr"><a href="#" data-dismiss="modal" class="btn_barcode"><?php echo $items_rows['item_barcode']; ?></a></td>
                                                         <td><?php echo $items_rows['item_name']; ?></td>
                                                         <td><?php echo ($items_rows['item_quantity'] <= 0) ? '<label style="color:#e60000;"> '. $items_rows['item_quantity'] .' </label>' : '<label>'. $items_rows['item_quantity'] .' </label>' ?></td>
                                                     </tr>
                                                <?php
                                                }
                                             ?>
                                          </tbody>
                                   </table>
                                   <script type="text/javascript">
                                            $('.btn_barcode').click(function(){
                                                  var row = $(this).closest("tr");
                                                  var text = row.find(".nr").text();
                                                  document.getElementById("item_barcode").value = text;
                                                  var xmlhttp = new XMLHttpRequest();
                                                  xmlhttp.open("GET", "sales_page_click_query.php?icode="+ text, false);
                                                  xmlhttp.send(null);
                                                  document.getElementById("content_div").innerHTML = xmlhttp.responseText;
                                         
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
   <!-- #END# OF MODAL BOX 1 -->

 <!-- MODAL BOX 2 -->


<div class="modal fade" id="return_goods" tabindex="-1" role="dialog" aria-labelledby="modifyModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modifyModalLabel"><i class="material-icons">transfer_within_a_station</i> Sales Return </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <small> <i> " Please be informed that you must input the invoice number of the product and barcode to see the sold item. " </i> </small>
      </div>

      <div class="modal-body">
                
              <div class="container-fluid">
              <?php 
                if(isset($_POST['btn_return_commit'])){
                         if(empty($_POST['s_invoice']) && empty($_POST['s_barcode'])){
                               echo '<script type="text/javascript"> alert("Oh Snap .. Please dont leave empty values"); </script>';
                         }else if(empty($_POST['r_quant'])){
                               echo '<script type="text/javascript"> alert("Oh Snap .. Please dont leave empty values"); </script>';
                         }else{
                               $inv_num = mysqli_real_escape_string($conn, $_POST['inv_num']);
                               $s_code = mysqli_real_escape_string($conn, $_POST['s_code']);
                               $s_quant = mysqli_real_escape_string($conn, $_POST['s_quant']);
                               $s_total = mysqli_real_escape_string($conn, $_POST['s_total']);
                               $s_d_trans = mysqli_real_escape_string($conn, $_POST['s_d_trans']);
                               $r_quant = mysqli_real_escape_string($conn, $_POST['r_quant']);
                               $enum_value = mysqli_real_escape_string($conn, $_POST['enum']);
                               $b_code = mysqli_real_escape_string($conn, $_POST['b_code']);
                               $deduc_prc_quant = mysqli_real_escape_string($conn, $_POST['deduc_prc_quant']);
                               if($r_quant > $s_quant){
                                      echo '<script type="text/javascript"> alert("Only '. $s_quant .' product encoded here"); </script>';
                               }else{
                               $query = "Select * from tbl_branch_goods_receive where item_barcode = '" . $s_code . "' and branch_name = '" . $b_code . "'";
                               $result = mysqli_query($conn, $query);
                               $d_result = mysqli_query($conn, "Select * from tbl_sales where _id ='" . $enum_value . "'");
                               $d_rows = mysqli_fetch_array($d_result);
                               $rows = mysqli_fetch_array($result);
                               $count = mysqli_num_rows($result);
                               $c_quant = 0;
                               $d_quant = 0;
                               if($count > 0){
                                    $d_quant = $d_rows['quant'] - $r_quant;
                                    $c_quant = $rows['item_quantity'] + $r_quant;
                                    if($d_quant <= 0){ // If Already in 0 QTY item must be remove from the database
                                        if (mysqli_query($conn, "Delete from tbl_sales where _id = '" . $enum_value . "'") === true){
                                            // If Data is empty in table of sales series must remove the invoice number or the transaction
                                            $check_data_query = mysqli_query($conn, "Select * from tbl_sales where invoice_number = '" . $inv_num . "'")or die('<script type="text/javascript"> alert("'.mysqli_error($conn).'"); </script>');
                                            $check_data_count = mysqli_num_rows($check_data_query);
                                            if(empty($check_data_count)){
                                                 mysqli_query($conn, "Delete from tbl_sales_series where invoice_number = '" . $inv_num . "'");
                                            }
                                        }
                                        $sales_retun_query = mysqli_query($conn, "Insert into tbl_sales_return_goods(barcode, invoice, quant, ts_date, r_date, staff_code, staff_name, branch)values('" . $s_code . "','"
                                        . $inv_num . "','" . $r_quant . "','" . $s_d_trans  . "','" .  $fullDate . "','" . $_SESSION['b_staff_code'] . "','" . $_SESSION['fullname'] . "','" . $_SESSION['b_code'] . "')")or die('<script type="text/javascript"> alert("'.mysqli_error($conn).'") </script>');
                                        $u_query = "Update tbl_branch_goods_receive set item_quantity = '" . $c_quant . "' where item_barcode = '" . $s_code . "' and branch_name = '" . $b_code . "'";
                                        $u_result = mysqli_query($conn, $u_query)or die('<script type="text/javascript"> alert("'.mysqli_error($conn).'") </script>');
                                        echo '<script type="text/javascript"> alert("Successfully Updated"); window.location="sales_page.php"; </script>';
                                    }else{  // If item is not 0 QTY from the database must be update
                                        $deduc_query = mysqli_query($conn, "Update tbl_sales set quant = '" . $d_quant . "', total = '" . $deduc_prc_quant . "' where _id = '" . $enum_value . "'")or die('<script type="text/javascript"> alert("'.mysqli_error($conn).'") </script>');
                                        $sales_retun_query = mysqli_query($conn, "Insert into tbl_sales_return_goods(barcode, invoice, quant, ts_date, r_date, staff_code, staff_name, branch)values('" . $s_code . "','"
                                        . $inv_num . "','" . $r_quant . "','" . $s_d_trans  . "','" . $fullDate . "','" . $_SESSION['b_staff_code'] . "','" . $_SESSION['fullname'] . "','" . $_SESSION['b_code'] . "')");
                                        $u_query = "Update tbl_branch_goods_receive set item_quantity = '" . $c_quant . "' where item_barcode = '" . $s_code . "' and branch_name = '" . $b_code . "'";
                                        $u_result = mysqli_query($conn, $u_query)or die('<script type="text/javascript"> alert("'.mysqli_error($conn).'") </script>');
                                        echo '<script type="text/javascript"> alert("Successfully Updated"); window.location="sales_page.php";  </script>';
                                    }
                               }
                         }
                     }
                 }
              ?>
              <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"> <!-- Main Margin -->
                        <div class="row">
                                   <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                     </div>
                                    <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                                             <label>  Invoice Number </label>
                                              <div class="form-group">
                                                     <div class="form-line">
                                                          <input type="text" class="form-control" id="s_invoice" name="s_invoice">
                                                       </div>
                                                 </div>
                                       </div>
                              
                                        <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                                             <label>  Barcode </label>
                                              <div class="form-group">
                                                     <div class="form-line">
                                                           <input type="text" class="form-control" id="s_barcode" name="s_barcode">
                                                       </div>
                                                 </div>
                                       </div> 
                                       <script type="text/javascript">
                                                $('#s_invoice, #s_barcode').change(function(){
                                                       var xmlhttp = new XMLHttpRequest();
                                                       xmlhttp.open("GET", "sales_page_return_goods_search.php?inv=" + document.getElementById("s_invoice").value + "&bcode=" + document.getElementById("s_barcode").value, false);
                                                       xmlhttp.send(null);
                                                       document.getElementById("return_content").innerHTML = xmlhttp.responseText;
                                                       $('#return_table').DataTable({
                                                               responsive:true,
                                                               paging:false
                                                       });
                                                      $('.e_num').click(function(){
                                                            var row = $(this).closest("tr");
                                                            var text = row.find(".nr").text();
                                                            document.getElementById("enum_value").value = text;
                                                            var xmlhttp = new XMLHttpRequest();
                                                            xmlhttp.open("GET", "sales_page_add_info_query.php?enum="+ text, false);
                                                            xmlhttp.send(null);
                                                            document.getElementById("add_info_div").innerHTML = xmlhttp.responseText;
                                                      });
                                                      $('#r_quant').keyup(function(){
                                                           var total = Number(document.getElementById("r_quant").value) * Number(document.getElementById("price_value").value);
                                                           document.getElementById("total_prc_deduc").value = document.getElementById("total_crr_deduc").value - total;
                                                           //var totalrs = Number(document.getElementById(""))
                                                      });
                                                });

                                          </script>
                                        
                                       <div id="return_content" class="col-md-12 col-lg-12 col-xs-12 col-sm-12"> 
                                          <table class="table table-striped table-bordered" id="return_table" style="width:100%;">
                                             <thead>
                                              <tr>
                                                
                                                 <th> Barcode </th>
                                                 <th> Quantity </th>
                                                 <th> Total </th>
                                                 <th> TS Date </th>
                                               </tr>
                                               </thead>
                                           </table>
                                          
                                       </div>
                                      
                                          
                                      
                                     <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12"> 
                                          <button type="submit" name="btn_return_commit" class="btn btn-primary"  style="height:30px;padding-top:0;"><i class="material-icons"> done_all </i> Submit </button>
                                       </div>
                          </div>
                    </div> <!-- #END# Main Margin -->
                  
               </div>
      </div>
      <div class="modal-footer">    
        
      </div>
    </div>
   </form>
  </div>
</div>

   <!-- #END# OF MODAL BOX 2 -->
   
  
    <script>
        $(document).ready(function(){
            $('#r_items').DataTable({
                responsive:true
            });
              $('#c_items').DataTable({
                responsive:true,
                paging:false
            });
            $('#return_table').DataTable({
                     responsive:true,
                     paging:false
                
             });
        });
            
          </script>        
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