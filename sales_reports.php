<?php session_start(); require_once('Connection.php'); ?>
<?php 
date_default_timezone_set('Asia/Manila');
$day = date('d');
$month = date('m');
$year = date('Y');
$fullDate = $month . "/" . $day . "/" . $year;
     if(isset($_POST['btn_csv_export'])){
                                  if(empty($_POST['bh_branch'])){
                                         echo '<script type="text/javascript"> alert("Please select branch first"); </script>';
                                  }else{
                                    ob_end_clean();
                                    $output = fopen('php://output', 'w');
                                    header('Content-Type: text/csv; charset=utf-8');
                                    header('Content-Disposition: attachment; filename='. mysqli_real_escape_string($conn, $_POST['bh_branch']) .'_Sales_Record.csv'); 
                                    fputcsv($output, array('Header'=>'Overall Sales of Branch ' . mysqli_real_escape_string($conn, $_POST['bh_branch'])));
                                    fputcsv($output, array("Transaction Number", "Invoice Number", "Barcode", "Description", "Quantity", "Total", "Price", "Staff Code", "Staff Name", "Branch Code", "Transaction Date"));
                                    $sales_inf_query = mysqli_query($conn, "Select * from tbl_sales where branch = '" . mysqli_real_escape_string($conn, $_POST['bh_branch']) . "'");
                                    $sales_array = array();
                                    while($sales_inf_rows = mysqli_fetch_array($sales_inf_query)){
                                      fputcsv($output, array(
                                      'Transaction Number'=>$sales_inf_rows['transaction_number'],
                                      'Invoice Number'=>$sales_inf_rows['invoice_number'],
                                      'Item Barcode'=>$sales_inf_rows['item_barcode'],
                                      'Description'=>$sales_inf_rows['item_name'],
                                      'Quantity'=>$sales_inf_rows['quant'],
                                      'Total'=>$sales_inf_rows['total'],
                                      'Price'=>$sales_inf_rows['price'],
                                      'Staff Code'=>$sales_inf_rows['staff_code'],
                                      'Staff Name'=>$sales_inf_rows['staff_name'],
                                      'Branch Code'=>$sales_inf_rows['branch'],
                                      'Transaction Date'=>$sales_inf_rows['date_transaction']));
                                      $sales_array[] = $sales_inf_rows['price'];
                                    }
                                     exit();
                                  }
                        }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title> Sales Report</title>
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
      <!-- DataTable Buttons -->
       <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"> </script>
       <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"> </script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"> </script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"> </script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"> </script>
       <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"> </script>
       <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"> </script>
      <!-- End  of DataTables -->   

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
                                 <i class="material-icons"> attach_money </i>  Sales Report 
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
                                <style type="text/css">
                         .vl{
                           
                             height:200px;
                             border-left: 4px solid gray;
                             opacity:0.7;
                         }
                       </style>
                    <form method="post" name="test" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                   
                        <div class="container">  
                           <div class="col-md-5 col-lg-5 col-sm-10 col-xs-10">      
                            <div class="col-md-12 col-lg-12 col-xs-10 col-sm-10">
                              <?php 
                                     $branch_query = "Select * from tbl_branches where status = '" . "ACTIVE" . "'";
                                     $branch_result = mysqli_query($conn, $branch_query);
                                   ?>
                                    <label> Select Branch </label>
                                     <select class="form-control" id="s_branch" name="s_branch">
                                           <option disabled="disabled" selected="selected"> -- Select -- </option>
                                           <?php 
                                              while($branch_rows = mysqli_fetch_array($branch_result)){
                                                    if($branch_rows['branch_code'] != "SWHO"){
                                                  ?>
                                                     <option value="<?php echo $branch_rows['branch_code']; ?>"><?php echo $branch_rows['branch_code']; ?></option>
                                                <?php
                                                }
                                              }
                                           ?>
                                        </select>
                                         
                               </div>
                         
                      
                         
                 
                             <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12"><label style="padding-top:0;"><i class="material-icons">date_range</i>  Date Range </label> </div>
                             
                               <div class="col-md-5 col-lg-5 col-sm-10 col-xs-10">
                               
                               <label> From</label>
                                    <div class="form-group">
                                           <div class="form-line">
                                                  <input type="date" id="from_date" class="form-control">
                                                  <input type="hidden" id="from_date_value" name="from_date_value">
                                              </div>
                                       </div>
                                </div>
                               
                            <div class="col-md-5 col-lg-5 col-sm-10 col-xs-10">
                               <label> To </label>
                                    <div class="form-group">
                                           <div class="form-line">
                                                  <input type="date" id="to_date" class="form-control">
                                                  <input type="hidden" id="to_date_value" name="to_date_value">
                                              </div>
                                       </div>
                                </div>
                            <div class="col-md-2 col-lg-2 col-sm-2 col-xs-2">
                                <button type="submit" class="btn btn-primary" name="btn_search" style="height:30px;width:30px;padding:0;padding-top:2px;margin-top:20px;"><i class="material-icons"> search </i> </button>
                             </div>
                             <!-- Hidden Parameter for Overall Sales -->
                             <input type="hidden" value="<?php echo mysqli_real_escape_string($conn, $_POST['s_branch']);  ?>" name="bh_branch">
                       </div>
                       <!-- Border Line Separator -->
                       <div class="col-md-1 col-lg-1 col-sm-1 col-xs-1 vl"> </div>
                       <!-- END Line Separator -->
                       <!-- Queries -->
                      
               
                       <div class="col-md-5 col-lg-5 col-xs-10 col-sm-10" > 
                           
                              <div class="col-md-5 col-lg-5 col-sm-10 col-xs-10">
                                    <label> Branch Name :  </label>
                                </div>
                                 <div class="col-md-4 col-lg-4 col-sm-10 col-xs-10">
                                    <label > <?php echo (isset($_POST['s_branch'])) ? $_POST['s_branch'] : '----' ?>  </label>
                                </div>
                              <div class="col-md-5 col-lg-5 col-sm-10 col-xs-10">
                                    <label> Total Sales :  </label>
                                </div>
                                 <div class="col-md-4 col-lg-4 col-sm-10 col-xs-10">
                      <?php 
                             if(isset($_POST['btn_search'])){
                               if(isset($_POST['s_branch']) && empty($_POST['from_date_value']) && empty($_POST['to_date_value'])){
                                  $branch = mysqli_real_escape_string($conn, $_POST['s_branch']);
                                  $sales_query = "Select Sum(total) as branch_total from tbl_sales where branch = '" .  $branch . "'";
                                  $sales_result = mysqli_query($conn, $sales_query);
                                  $sales_rows = mysqli_fetch_array($sales_result);
                                  ?>
                                     <label style="color:#e60000;"> <small><?php echo "P". $sales_rows['branch_total']; ?> </small> </label>
                                  <?php                       
                                }else if(!empty($_POST['s_branch']) && !empty($_POST['from_date_value']) && !empty($_POST['to_date_value'])){
                                    $date_range_query = "Select Sum(total) as branch_total from tbl_sales where date_transaction >= '" . $_POST['from_date_value'] . "' and date_transaction <= '" . $_POST['to_date_value'] . "'";
                                    $date_range_query .= " and branch = '" . $_POST['s_branch'] . "'";
                                    $date_range_result = mysqli_query($conn, $date_range_query)or die('<script type="text/javascript"> alert("'. mysqli_error($conn) .'"); </script>');
                                    $date_range_rows = mysqli_fetch_array($date_range_result);
                                    ?>
                                     <label style="color:#e60000;"> <small><?php echo "P" . $date_range_rows['branch_total']; ?> </small> </label>
                                    <?php
                                }
                            }else{
                                    ?>
                                    <label> ---- </label>
                                    <?php
                                }
                              ?>
                                </div>

                                <div class="col-md-5 col-lg-5 col-sm-10 col-xs-10">
                                    <label> No. of items :  </label>
                                </div>
                                 <div class="col-md-4 col-lg-4 col-sm-10 col-xs-10">
                                   <?php 
                                   if(isset($_POST['btn_search'])){
                                      if(isset($_POST['s_branch']) && empty($_POST['from_date_value']) && empty($_POST['to_date_value'])){
                                           $branch = mysqli_real_escape_string($conn, $_POST['s_branch']);
                                           $sales_query = "Select * from tbl_sales where branch = '" .  $branch . "'";
                                           $sales_result = mysqli_query($conn, $sales_query);
                                           $sales_count = mysqli_num_rows($sales_result);
                                           ?>
                                            <label> <?php echo $sales_count; ?>  </label>
                                           <?php
                                      }else if(isset($_POST['s_branch']) && !empty($_POST['from_date_value']) && !empty($_POST['to_date_value'])){
                                           $date_range_query = "Select * from tbl_sales where date_transaction >= '" . $_POST['from_date_value'] . "' and date_transaction <= '" . $_POST['to_date_value'] . "'";
                                           $date_range_query .= " and branch = '" . $_POST['s_branch'] . "'";
                                           $date_range_result = mysqli_query($conn, $date_range_query)or die('<script type="text/javascript"> alert("'. mysqli_error($conn) .'"); </script>');
                                           $date_range_count = mysqli_num_rows($date_range_result);
                                           ?>
                                             <label> <?php echo $date_range_count; ?>  </label>
                                           <?php
                                      }
                                    }else{
                                        ?>
                                        <label> ---- </label>
                                        <?php 
                                    }
                                   ?>
                                   
                                </div>
                       </div>

                               <!-- END Queries -->
                    
                     </div> <!-- End of Container -->
                   
                       
                       
                  
                  
                        
                            <script type="text/javascript">
                                    $('#from_date').change(function(){
                                         var d = new Date(document.getElementById("from_date").value);
                                         var month = d.getMonth();
                                         month++;
                                         var days = d.getDate();
                                         var year = d.getFullYear();
                                         if(month < 10){
                                             month = "0" + month;
                                         }
                                         if(days < 10){
                                             days = "0" + days;
                                         }
                                         document.getElementById("from_date_value").value = month + "/" + days + "/" + year;
                                    });
                                     $('#to_date').change(function(){
                                         var d = new Date(document.getElementById("to_date").value);
                                         var month = d.getMonth();
                                         month++;
                                         var days = d.getDate();
                                         var year = d.getFullYear();
                                         if(month < 10){
                                             month = "0" + month;
                                         }
                                         if(days < 10){
                                             days = "0" + days;
                                         }
                                         document.getElementById("to_date_value").value = month + "/" + days + "/" + year;
                                    });
                              </script>
                               
                          
                                <div class="col-md-4 col-lg-4 col-xs-10 col-sm-10">
                               
                                      <div id="content_div"> </div>    
                               </div>
                            
                                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"> </div>
                                  <button type="submit" class="btn btn-success" name="btn_csv_export" style="height:30px;padding-top:0;margin-top:-40px;"><i class="material-icons"> grid_on </i> Overall Sales (CSV)</button>
                                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#selected_items" id="selected_button" style="height:30px;padding-top:0;margin-top:-40px;"><i class="material-icons"> remove_red_eye </i> View Selected TS </button> 
                                     <table class="table table-bordered table-striped" id="r_items">
                                             <thead>
                                                   <tr>
                                                         <th> <input type="checkbox" id="main_checkbox"><label for="main_checkbox"> </label> </th>
                                                         <th> Transaction Number </th>
                                                         <th> Staff Code </th>
                                                         <th> Staff Name  </th>
                                                         <th> Branch Name  </th>
                                                         <th> Invoice </th>
                                                         <th> Transaction Date </th>
                                                         <th> Option </th>
                                                      </tr>
                                                </thead>
                                                <tbody>
                                                     <?php 
                                                     if(isset($_POST['btn_search'])){
                                                         if(isset($_POST['s_branch']) && empty($_POST['from_date_value']) && empty($_POST['to_date_value'])){
                                                                $branch = mysqli_real_escape_string($conn, $_POST['s_branch']);
                                                                $sales_query = "Select * from tbl_sales_series where branch = '" .  $branch . "'";
                                                                $sales_result = mysqli_query($conn, $sales_query);
                                                                while($sales_rows = mysqli_fetch_array($sales_result)){
                                                                     ?>
                                                                    <tr>
                                                                       <td><input type="checkbox" class="checkbox" id="<?php echo $sales_rows['transaction_number'] ?>" name="id[]"><label for="<?php echo $sales_rows['transaction_number']; ?>"> </label></td>
                                                                       <td><?php echo $sales_rows['transaction_number']; ?></td>
                                                                       <td><?php echo $sales_rows['staff_code']; ?></td>
                                                                       <td><?php echo $sales_rows['staff_name']; ?></td>
                                                                       <td><?php echo $sales_rows['branch']; ?></td>
                                                                       <td><?php echo $sales_rows['invoice_number']; ?></td>
                                                                       <td><?php echo $sales_rows['transaction_date']; ?></td>
                                                                       <td><a href="sales_report_data.php?scode=<?php echo $sales_rows['transaction_number']; ?>&amp;bcode=<?php echo $sales_rows['branch']; ?>" class="btn btn-info" style="height:30px;width:30px;padding-top:0;"><i class="material-icons" style="margin-left:-7px;margin-top:2px;"> remove_red_eye </a> </a></td>
                                                                      </tr>
                                                                    <?php
                                                                }
                                                         }
                                                         if(isset($_POST['s_branch']) && !empty($_POST['from_date_value']) && !empty($_POST['to_date_value'])){
                                                              $date_range_query = "Select * from tbl_sales_series where transaction_date >= '" . $_POST['from_date_value'] . "' and transaction_date <= '" . $_POST['to_date_value'] . "'";
                                                              $date_range_query .= " and branch = '" . $_POST['s_branch'] . "'";
                                                              $date_range_result = mysqli_query($conn, $date_range_query)or die('<script type="text/javascript"> alert("'. mysqli_error($conn) .'"); </script>');
                                                              while($date_range_rows = mysqli_fetch_array($date_range_result)){
                                                                  ?>
                                                                  <tr>
                                                                       <td><input type="checkbox" class="checkbox" id="<?php echo $date_range_rows['transaction_number'] ?>" name="id[]"><label for="<?php echo $date_range_rows['transaction_number']; ?>"> </label></td>
                                                                       <td><?php echo $date_range_rows['transaction_number']; ?></td>
                                                                       <td><?php echo $date_range_rows['staff_code']; ?></td>
                                                                       <td><?php echo $date_range_rows['staff_name']; ?></td>
                                                                       <td><?php echo $date_range_rows['branch']; ?></td>
                                                                       <td><?php echo $date_range_rows['invoice_number']; ?></td>
                                                                       <td><?php echo $date_range_rows['transaction_date']; ?></td>
                                                                       <td><a href="sales_report_data.php?scode=<?php echo $date_range_rows['transaction_number']; ?>&amp;bcode=<?php echo $date_range_rows['branch']; ?>" class="btn btn-info" style="height:30px;width:30px;padding-top:0;"><i class="material-icons" style="margin-left:-7px;margin-top:2px;"> remove_red_eye </a> </a></td>
                                                                        
                                                                      </tr>
                                                                <?php 
                                                              }
                                                         }
                                                     }
                                                     ?>
                                                   
                                                   </tbody>
                                        </table>
                                         <style type="text/css">
                                                 .buttons-csv{
                                                        width:30px;
                                                        height:30px;
                                                        padding-top:0;
                                                 }
                                                 .buttons-copy{
                                                        width:30px;
                                                        height:30px;
                                                        padding-top:0;
                                                    
                                                 }
                                                 .buttons-print{
                                                        width:30px;
                                                        height:30px;
                                                        padding-top:0;
                                                    
                                                 }
                                                 .buttons-pdf{
                                                        width:30px;
                                                        height:30px;
                                                        padding-top:0;
                                                    
                                                 }
                                             </style>
                                    <script type="text/javascript">
                                            $(document).ready(function(){
                                                  $('#main_checkbox').click(function(){
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
                                                  $('#selected_button').click(function(){
                                                          var arrayList = new Array();
                                                          if($('input:checkbox:checked').length > 0){
                                                               $('input:checkbox:checked').each(function(){
                                                                     arrayList.push($(this).attr("id"));
                                                                     console.log(arrayList);
                                                                     $.ajax({
                                                                          type         :        "POST",
                                                                          url          :        "sales_report_selected_query.php",
                                                                          data         :        {'data':arrayList},
                                                                          success      :        function(result){
                                                                                              document.getElementById("selected_content").innerHTML = result;
                                                                                              $('#selected_table').DataTable({
                                                                                                 dom:'Bfrtip',
                                                                                                 buttons:[
                                                                                                     
                                                                                                                    {
                                                                                                                       text:'<i class="material-icons" style="margin-left:-10px;margin-top:2px;">developer_board</i>',
                                                                                                                       extend:'copy',
                                                                                                                       className:'btn btn-default',
                                                                                                                       extension:'.copy'
                                                                                                                   },
                                                                                                                   {
                                                                                                                       text:'<i class="material-icons" style="margin-left:-10px;margin-top:2px;"> grid_on </i>',
                                                                                                                       extend:'csv',
                                                                                                                       className:'btn btn-success',
                                                                                                                       extension:'.csv'
                                                                                                                   },
                                                                                                                  {
                                                                                                                       text:'<i class="material-icons" style="margin-left:-10px;margin-top:2px;">local_printshop</i>',
                                                                                                                       extend:'print',
                                                                                                                       className:'btn btn-warning',
                                                                                                                       extension:'.print'
                                                                                                                   },
                                                                                                                   {
                                                                                                                       text:'<i class="material-icons" style="margin-left:-10px;margin-top:2px;">picture_as_pdf</i>',
                                                                                                                       extend:'pdf',
                                                                                                                       className:'btn btn-danger',
                                                                                                                       extension:'.pdf'
                                                                                                                   }
                                                                                                              
                                                                                                 ],
                                                                                                 responsive:true
                                                                                              });
                                                                          },
                                                                          error        :        function(errorResult){
                                                                                              alert(errorResult);
                                                                          }
                                                                     });
                                                               });
                                                          }else{
                                                               alert("No Item Selected");
                                                          }
                                                  });
                                            });
                                      </script>
                               </div> <!-- End of Row Division -->     
                             </div>
                       
                             
                      
                            </div>
                            
                           </div>
                         
                        </div>
                        
                    </div>
                </div>
            </div>
         </form>
       <script>
    document.onkeydown=function(evt){
        var keyCode = evt ? (evt.which ? evt.which : evt.keyCode) : event.keyCode;
        if(keyCode == 13)
        {
            //your function call here
            document.test.submit();
        }
    }
</script>
     </div>
    </section>
    <style type="text/css">
         .buttons-copy{
                 height:30px;
                 width:30px;
                 padding-top:0;
             }
             .buttons-pdf{
                 height:30px;
                 width:30px;
                 padding-top:0;
             }
              .buttons-csv{
                 height:30px;
                 width:30px;
                 padding-top:0;
             }
             .buttons-print{
                 height:30px;
                 width:30px;
                 padding-top:0;
             }
           </style>  
        <script>
        $(document).ready(function(){
            $('#r_items').DataTable({
                responsive:true,
                dom:"Bfrtip",
                buttons:[
                 {
                     text:'<i class="material-icons" title="Copy Clipboard" style="margin-left:-10px;margin-top:2px;">developer_board</i>',
                     extend:'copy',
                     className:'btn btn-default',
                     extension:'.copy'
                    },
                     {
                    text:'<i class="material-icons" title="Print Preview" style="margin-left:-10px;margin-top:2px;"> local_printshop </i>',
                    extend:'print',
                    className:'btn btn-warning',
                   // extension:''
                },
                {
                    text:'<i class="material-icons" title="Export as CSV" style="margin-left:-10px;margin-top:2px;"> grid_on </i>',
                    extend:'csv',
                    className:'btn btn-success',
                    extension:'.csv'
              
                },
                {
                    text:'<i class="material-icons" title="Export as PDF" style="margin-left:-10px;margin-top:2px;"> picture_as_pdf </i>',
                    extend:'pdf',
                    className:'btn btn-danger',
                    extension:'.pdf' 
                }
                ]
            });
        });
            
          </script>

                     
                             </div> <!-- End of Button DIV -->
           <!-- MODAL BOX 1 -->


<div class="modal fade" id="selected_items" tabindex="-1" role="dialog" aria-labelledby="modifyModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document" style="width:73%;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modifyModalLabel"><i class="material-icons">attach_money</i> Sales Report </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
              <div class="container-fluid">

                  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"> <!-- Main Margin -->
                        <div class="row">
                           <div id="selected_content"> </div>
                                   
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