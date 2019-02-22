<?php 

require_once('Connection.php'); ?>


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
     <link rel="stylesheet" href=" https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
     <!-- End of Font Awesome -->
</head>

<body class="theme-black">
         <?php include("top_header.php"); ?>

<?php 
   if(isset($_POST['btn_export_csv'])){
    ob_end_clean();
    $output = fopen('php://output', 'w');
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=format.csv'); 
    $csv_query = "Select * from tbl_sales where branch = '" . $_SESSION['b_code'] . "'";
    $csv_result = mysqli_query($conn, $csv_query);
    $csv_array = array();
    fputcsv($output, array("Docket Number", "Employee Code", "Staff Name", "Customer Name", "Invoice Number", "Barcode", "Item Name", "Stocks", "Sell", "Item Quantity", "Total", "Transaction Date"));
    while($csv_rows =mysqli_fetch_array($csv_result)){
       $csv_array[]  = $csv_rows;
    }
    foreach($csv_array as $csv_frows){
         $csv_frows = array_map("utf8_encode", $csv_frows);
         fputcsv($output, array(
             "Docket Number"=>$csv_frows['s_number'],
             "Employee Code"=>$csv_frows['employee_code'],
             "Staff Name"=>$csv_frows['staff_name'],
             "Customer Name"=>$csv_frows['customer_name'],
             "Invoice Number"=>$csv_frows['invoice_number'],
             "Barcode"=>$csv_frows['barcode'],
             "Item Name"=>$csv_frows['item_name'],
             "Stocks"=>$csv_frows['stocks'],
             "Sell"=>$csv_frows['sell'],
             "Item Quantity"=>$csv_frows['item_quantity'],
             "Total"=>$csv_frows['item_total'],
             "Transaction Date"=>$csv_frows['transaction_date']
           ));
    }
   // fputcsv($output, array("Inventory Code", "Item Name", "Description", "Item Stocks", "Item Price"));
    exit();
   }
?>

<?php 
date_default_timezone_set('Asia/Manila');
$day = date('d');
$month = date('m');
$year = date('Y');
$fullDate = $month . "/" . $day . "/" . $year;
    if(isset($_POST['btn_commit'])){
        $s_id = mysqli_real_escape_string($conn, $_POST['s_id']);
        $total_sales = mysqli_real_escape_string($conn, $_POST['total_sales']);
        $s_id += 1;
        $check_query = "Select * from tbl_sales_breakdown where date_of_sales = '" . $fullDate . "' and branch_name = '" . $_SESSION['b_code'] . "'";
        $check_result = mysqli_query($conn, $check_query);
        $check_rows = mysqli_num_rows($check_result);
        if($check_rows > 0){
            echo '<script type="text/javascript"> alert("You already commited this transaction"); window.location="total_sales.php"; </script>';
        }else{
        $commit_query = "Insert into tbl_sales_breakdown(s_id, total_sales, date_of_sales, branch_name)values('"
        . $s_id . "','" . $total_sales . "','" . $fullDate . "','" . $_SESSION['b_code'] . "')";
        $commit_result = mysqli_query($conn, $commit_query);
        if($commit_result === true){
             $update_query = "Update tbl_sales_breakdown_id set s_id = '" . $s_id . "'";
             $update_result = mysqli_query($conn, $update_query);
             echo '<script type="text/javascript"> alert("Successfully Commited the data");window.location="total_sales.php"; </script>';
        }else{
             echo '<script type="text/javascript"> alert("Failed"); </script>';
        }
     }   
}
?>
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active"> </li>
                    <li>
                        <a href="dashboard.php">
                            <i class="material-icons">home</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="inventory_items.php">
                            <i class="material-icons">dashboard</i>
                            <span>Inventory</span>
                        </a>
                    </li>
                    <?php 
                       if($_SESSION['b_code'] == "SWHO"){
                           ?>
                             <li>
                        <a href="approval_page.php">
                            <i class="material-icons">done_all</i>
                            <span>Approval</span>
                        </a>
                    </li>
                    <?php
                       }else{
                           ?>
                    <li>
                        <a href="Receiving_page.php">
                            <i class="material-icons">assignment</i>
                            <span>Receiving </span>
                        </a>
                    </li>
                           <?php
                       }
                    ?>
                  
                  <li>
                        <?php 
                           if($_SESSION['b_code'] == "SWHO"){
                               ?>
                                 
                                 <a href="Branch_Sales.php">
                              <i class="material-icons">accessibility </i>
                                <span> Manage Staffs </span>
                             </a>
                         <?php
                           }else{
                            ?>
                                <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">accessibility</i>
                                    <span>Staffs</span>
                                </a>
                                <ul class="ml-menu">
                                  
                                        <li>
                                        <a href="sales_page.php"> Sales </a>
                                        </li>
                                        
                               
                                    <li>
                                        <a href="staff_record.php"> Sales History </a>
                                    </li>
                                 
                                </ul>
                         <?php
                           }
                        ?>
                         
                         
                       </li>
                  
                  <?php 
                            if($_SESSION['b_code'] == "SWHO"){
                                          ?>
                    <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">work</i>
                                    <span>Manage Data</span>
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
                            <?php
                          }
                                   ?>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">assignment_returned</i>
                                    <span>Manage Returns</span>
                                </a>
                                <ul class="ml-menu">
                                    
                                    <li>
                                        <a href="Return_table.php"> Items Ready To Return</a>
                                    </li>
                                </ul>
                            </li>
                       <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">widgets</i>
                            <span>Reports </span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="#">
                                    <span>Sales Report </span>
                                </a>
                              
                            </li>
                            <li>
                                <a href="#">
                                    <span>Staff Report</span>
                                </a>
                                
                            </li>
                        </ul>
                    </li>
                    <?php 
                   if($_SESSION['b_code'] == "SWHO"){
                     ?>
                    <li>
                        <a href="user_registration.php">
                            <i class="material-icons">swap_calls</i>
                            <span>Configuration</span>
                        </a>
                     
                    </li>
                    <?php
                   }
                ?>
                <?php 
                   if($_SESSION['b_code'] == "SWHO"){
                     ?>
                    <li>
                        <a href="import_items.php">
                            <i class="material-icons">assignment</i>
                            <span>Import &amp; Export</span>
                        </a>
                      
                    </li>
                
                
                <?php
                   }
                ?>
                
                       
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
    <?php 
      if(isset($_POST['btn_remove'])){
            $remove_query = "Delete from tbl_sales_breakdown where s_id = '" . mysqli_real_escape_string($conn, $_POST['btn_remove']) . "'";
            $remove_result = mysqli_query($conn, $remove_query);
            if($remove_result === true){
                echo '<script type="text/javascript"> alert("Successfully removed the record from the list"); window.location="total_sales.php"; </script>';
            }else{
                echo '<script type="text/javascript"> alert("Failed to remove data");  window.location="total_sales.php"; </script>';
            }
      }
    ?>
<form method="post" action="total_sales.php" enctype="multipart/form-data">
    <section class="content" style="margin-top:5%;">
        <div class="container-fluid">
            <div class="block-header">
                <h2>  </h2>
            </div>
            
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                 Transaction
                                <small> This will record your total sales to the system </small>
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
                                        $total_query = "Select * from tbl_sales_breakdown_id";
                                        $total_result = mysqli_query($conn, $total_query);
                                        $total_rows = mysqli_fetch_array($total_result);
                                
                                      ?>
                                      <small> <i>Transaction Date : <?php echo $fullDate; ?> </i></small><br/>
                                    <input type="hidden" name="s_id" value="<?php echo $total_rows['s_id']; ?>">
                                      <label> Sales : </label>
                                      <?php 
                                        $ts_query = "Select Sum(item_total)as total_sales from tbl_sales where transaction_date = '" . $fullDate . "' and branch = '" . $_SESSION['b_code'] . "'";
                                        $ts_result = mysqli_query($conn, $ts_query);
                                        $ts_rows = mysqli_fetch_array($ts_result);
                                        ?>
                                        <label style="color:#ff0000;"> <?php echo "₱ " . $ts_rows['total_sales'];  ?> </label>
                                        <input type="hidden" name="total_sales" value="<?php echo $ts_rows['total_sales']; ?>">
                                       
    
                               </div> <!-- End of Row Division -->     
                             </div>
                       
                             
                      
                            </div>
                            
                           </div>
                         

                        </div>

<!-- Third Form -->
           <!-- Input -->
    
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                   Export Record
                                <small> This will export the data which has been filtered in the data table </small>
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
                                       <button type="button" class="btn btn-warning"><i class="material-icons">print</i> Print Preview </button>
                                       <button type="submit" class="btn btn-success" name="btn_export_csv"><i class="material-icons"> grid_on </i> Export as CSV File </button>
                                       <a href="total_sales_pdf_print.php" class="btn btn-danger"><i class="material-icons"> picture_as_pdf </i> Export as PDF File </a>
                                    
                               </div> <!-- End of Row Division -->     
                             </div>
                       
                             
                      
                            </div>
                            
                           </div>
                         

                        </div>  
<!-- #END# of Third Form -->
  </div>

                         <!-- Second Form -->

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Sales Record
                                <small>  All Transaction has been made are registered here </small>
                            </h2>
                         
                        </div>
                        
                         <div class="body">
                            <h2 class="card-inside-title"></h2>
                            <div class="row clearfix">
                           
                           <div class="col-md-12 col-sm-10 col-xs-10">
                                
                                  <table id="r_items" class="table table-striped table-bordered">
                                       <thead>
                                            <tr>
                                                <th> Invoice Number </th>
                                                <th> Employee Code </th>
                                                <th> Staff Name </th>
                                                <th> Total Sales </th>
                                                <th> Date Of Transaction </th>
                                              
                                             </tr>
                                         </thead>
                                         <tbody>
                                            <?php 
                                               $sales_breakdown = "Select * from tbl_sales where branch = '" . $_SESSION['b_code'] . "'";
                                               $sales_b_result = mysqli_query($conn, $sales_breakdown);
                                               while($sales_rows = mysqli_fetch_array($sales_b_result)){
                                                    ?>
                                                    <tr>
                                                         <td><?php echo $sales_rows['invoice_number']; ?></td>
                                                          <td><?php echo $sales_rows['employee_code']; ?></td>
                                                         <td><?php echo $sales_rows['staff_name']; ?></td>
                                                         <td><?php echo $sales_rows['item_total']; ?></td>
                                                         <td><?php echo $sales_rows['transaction_date']; ?></td> 
                                                       
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
                         

                        </div>
  
                    </div>
                </div> 
               
                       <!-- #END#Second Form -->
                </div>
            </div>
         </form>
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