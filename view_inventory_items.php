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
     <link rel="stylesheet" href=" https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
     <!-- End of Font Awesome -->
</head>

<body class="theme-black">
         <?php include("top_header.php"); ?>
        <!-- Menu -->
        <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="dashboard.php">
                            <i class="material-icons">home</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="active">
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
                             <a href="staff_record.php">
                              <i class="material-icons">accessibility </i>
                                <span> Staffs </span>
                             </a>
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

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Item Information  </h2>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                  Item Information
                              
                                <small>  </small>
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
                             if($_SESSION['b_code'] == "SWHO"){
                                
                                $query = "Select * from tbl_swho_items where uis = '" . mysqli_real_escape_string($conn, $_GET['uis']) . "'";
                                $result  = mysqli_query($conn, $query);
                                while($rows = mysqli_fetch_array($result)){
                                ?>
                                 <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                                         <label> Barcode(SKU) </label><hr>
                                         <p><?php echo $rows['inventory_code']; ?></p>
                                      
                                   </div>
                                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                                            <label> Item Name </label><hr>
                                            <p><?php echo $rows['item_name']; ?></p>
                                        
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                                            <label> Item Stocks </label><hr>
                                            <p><?php echo $rows['item_stocks']; ?></p>
                                        
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                                            <label> Item Price </label><hr>
                                            <p><?php echo $rows['item_price']; ?></p>
                                        
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                                            <label> Item Date Encoded </label><hr>
                                            <p><?php echo $rows['item_date']; ?></p>
                                        
                                    </div>

                                    <?php
                                }
                            }else{
                                $query = "Select * from tbl_items where inventory_code = '" . mysqli_real_escape_string($conn, $_GET['i_code']) . "' and item_b_code = '" . mysqli_real_escape_string($conn, $_GET['b_code']) . "'";
                                $result  = mysqli_query($conn, $query);
                                while($rows = mysqli_fetch_array($result)){
                                ?>
                                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                                         <label> Barcode(SKU) </label><hr>
                                         <p><?php echo $rows['inventory_code']; ?></p>
                                      
                                   </div>
                                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                                            <label> Item Name </label><hr>
                                            <p><?php echo $rows['item_name']; ?></p>
                                        
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                                            <label> Item Stocks </label><hr>
                                            <p><?php echo $rows['item_stocks']; ?></p>
                                        
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                                            <label> Item Price </label><hr>
                                            <p><?php echo $rows['item_price']; ?></p>
                                        
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                                            <label> Item Date Encoded </label><hr>
                                            <p><?php echo $rows['item_date']; ?></p>
                                        
                                    </div>
                            <?php
                                }
                            }
                           ?>
                               </div> <!-- #END# of main division -->     
                             </div>
                       
                             
                      
                            </div>
                            
                           </div>
                         
                        </div>
                        
                    </div>
                </div>
            </div>
         
     </div>
    <div class="container-fluid">
      <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                 Item History
                                 
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
                                   <table id="i_history" class="table table-bordered table-striped">
                                          <thead>
                                                <tr>
                                                    <th> Return Number </th>
                                                    <th> Item From </th>
                                                <?php 
                                                if($_SESSION['b_code'] == "SWHO"){
                                                    ?>
                                                   <th> Transfered to </th>
                                                <?php }  ?>
                                                    
                                                    <th> Quantity </th>
                                                    <th> Date of transfer </th>
                                                 </tr>
                                             </thead>
                                             <tbody>
                                                 <?php 
                                                 if($_SESSION['b_code'] == "SWHO"){
                                                     $transfer_query = "Select * from tbl_transfer_history where inventory_code = '" . mysqli_real_escape_string($conn, $_GET['i_code']) . "'";
                                                     $transfer_result = mysqli_query($conn, $transfer_query);
                                                     while($transfer_rows = mysqli_fetch_array($transfer_result)){
                                                         ?>
                                                           <tr>
                                                                <td><?php echo $transfer_rows['r_id']; ?></td>
                                                                <td><?php echo $transfer_rows['item_branch']; ?></td>
                                                                <td><?php echo $transfer_rows['transfered_from']; ?></td>
                                                                <td><?php echo $transfer_rows['item_stocks']; ?></td>
                                                                <td><?php echo $transfer_rows['item_date']; ?></td>
                                                            </tr>
                                                    <?php
                                                     }
                                                 }else{

                                                 
                                                      $transfer_query = "Select * from tbl_transfer_history where transfered_from = '" . $_SESSION['b_code'] . "'";
                                                      $transfer_result = mysqli_query($conn, $transfer_query);
                                                      while($transfer_rows = mysqli_fetch_array($transfer_result)){
                                                           ?>
                                                           <tr>
                                                                <td><?php echo $transfer_rows['r_id']; ?></td>
                                                                <td><?php echo $transfer_rows['item_branch']; ?></td>
                                                                <td><?php echo $transfer_rows['item_stocks']; ?></td>
                                                                <td><?php echo $transfer_rows['item_date']; ?></td>
                                                            </tr>
                                                        <?php
                                                      }
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
            </div> <!-- #END# of INPUT -->
         </div>
 </section>



    <script>
        $(document).ready(function(){
            
            $('#i_history').DataTable({
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