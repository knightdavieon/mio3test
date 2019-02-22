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
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="dashboard.php">
                            <i class="material-icons">home</i>
                            <span>Dashboard</span>
                        </a>
                    </li>

            <!-- Manage Items -->
                    <?php 
                        if($_SESSION['b_code'] == "SWHO"){
                            ?>
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
                                        <a href="#">Edit Items</a>
                                    </li>
                                 
                                </ul>
                    </li>

                    <?php
                        }
                    ?>

                    <!-- #END# of Manage Items -->
            <!-- Inventory -->  
                <?php 
                     if($_SESSION['b_code'] == "SWHO"){
                         ?>
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
                    <?php
                     }else{
                          // For Branches
                         ?>
                         <li>
                        <a href="#" class="menu-toggle">
                            <i class="material-icons">done_all</i>
                            <span>Inventory</span>
                        </a>
                        <ul class="ml-menu">
                                  
                                        <li>
                                        <a href="branch_inventory_page.php">Goods Receive</a>
                                        </li>
                                </ul>
                        </li>

                    <?php
                     }
                ?>
                <!-- #END# of Inventory -->
                 <!-- For Approval and Receiving -->
                  <?php 
                     if($_SESSION['b_code'] == "SWHO"){
                         ?>
                    <li>
                        <a href="#">
                            <i class="material-icons">assignment</i>
                            <span>Approval </span>
                        </a>
                    </li>
                    <?php
                     }else{
                         ?>
                          <li>
                        <a href="branch_receiving_items.php">
                            <i class="material-icons">assignment</i>
                            <span>Receiving </span>
                        </a>
                    </li>
                 
                    <?php
                     }
                  ?>
                  <!--  #END#  of for approval and receiving -->
                   
               <!-- Lookup -->    

               <?php 
                   if($_SESSION['b_code'] == "SWHO"){
                    ?>
                      <li>
                            <a href="swho_transfer_items_page.php">
                             
                               <i class="material-icons">find_in_page</i>
                                    <span>Lookup</span>
                             </a>
                      
                          
                       </li>
                <?php
                   }else{
                       ?>
                            <li class="active" style="display:none;"> </i>
                           <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">find_in_page</i>
                                    <span>Lookup</span>
                                </a>    
                                <ul class="ml-menu">
                                  
                                        <li>
                                        <a href=" branch_transfer_history_page.php">Transfer Stocks</a>
                                        </li>
                                    <li>
                                        <a href="branch_goods_receive_history.php">Goods Receive</a>
                                    </li>
                                     <li>
                                        <a href="branch_sales_report_page.php">Sales Report</a>
                                    </li>
                                  
                                </ul>
                            </li>
                
                <?php
                   }
               ?>
               <!-- #END# of lookup -->

               <!-- Transfer Stocks -->
                 <?php 
                    if($_SESSION['b_code'] == "SWHO"){
                        ?>
                <li>
                            <a href="transfer_page.php">
                             
                               <i class="material-icons">repeat</i>
                                    <span>Transfer Stocks</span>
                             </a>
                      
                          
                       </li>
                
                <?php
                    }else{
                        ?>
                        <li>
                            <a href="#">
                             
                               <i class="material-icons">repeat</i>
                                    <span>Transfer Stocks</span>
                             </a>
                      
                          
                       </li>
                    <?php
                    }
                 ?>
                <!-- #END# of transfer stocks -->         
                 <!-- Reports --> 
                 <?php 
                    if($_SESSION['b_code'] == "SWHO"){
                       ?>
                         <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">work</i>
                                    <span>Reports</span>
                                </a>
                                <ul class="ml-menu">
                                  
                                        <li>
                                        <a href="#">Transfer Stocks</a>
                                        </li>
                                    <li>
                                        <a href="#">Goods Receive</a>
                                    </li>
                                  <li>
                                        <a href="#">Reference</a>
                                    </li>
                                     <li>
                                        <a href="#">Goods Receive</a>
                                    </li>
                                     <li>
                                        <a href="#">Items</a>
                                    </li>
                                     <li>
                                        <a href="#">Modified Reference</a>
                                    </li>
                                     <li>
                                        <a href="#">Approval</a>
                                    </li>
                                </ul>
                            </li>
                <?php
                    }
                 ?>
                 <!-- #END# of reports -->
                          
                          <!-- Settings -->
                             <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">perm_data_setting</i>
                                    <span>Settings</span>
                                </a>
                                <ul class="ml-menu">
                                  
                                        <li>
                                        <?php 
                                           if($_SESSION['b_code'] == "SWHO"){
                                               ?>
                                        <a href="new_user_page.php">New User</a>
                                        <a href="#">New Shopfront</a>
                                        <a href="#">Manage Staffs</a>
                                        <a href="mio_category_page.php">Manage Categories</a>
                                        <a href="#">Registered Users</a>
                                        <?php
                                           }else{
                                           ?>
                                           <a href="#">Manage Staffs</a>
                                        <?php
                                           }
                                        ?>
                                     
                                        </li>
                                </ul>
                            </li>
                          <!-- #END# of Settings -->
                        
                           <!-- Import -->  
                           <?php 
                             if($_SESSION['b_code'] == "SWHO"){
                                 ?>

                                   <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                 <i class="material-icons">assignment</i>
                                    <span>Import &amp; Export</span>
                                </a>
                                <ul class="ml-menu">
                                    
                                    <li>
                                        <a href="#"> Import of items </a>
                                        <a href="#"> Export Database </a>
                                    </li>
                                </ul>
                            </li>

                                <?php
                             }
                           ?>                      
                          
                            <!-- #END# of Import -->
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
              <!-- First Form -->
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="card" style="height:389px;">
                        <div class="header">
                            <h2>
                               <i class="material-icons"> account_circle </i>   Sales Profile
                            
                                <small> <i> " Account information of <?php echo $_SESSION['fullname']; ?> " </i> </small>
                            </h2>
                         
                        </div>
                        
                         <div class="body">
                            <h2 class="card-inside-title"></h2>
                            <div class="row clearfix">
                           <div class="col-md-12 col-sm-10 col-xs-10">
                                   <?php 
                                      // Staff query
                                      $staff_query = "Select * from tbl_users where b_staff_code = '" . $_SESSION['b_staff_code'] . "'";
                                      $staff_result = mysqli_query($conn, $staff_query)or die('<script type="text/javascript"> alert("'.mysqli_error($conn).'") </script>');
                                      $staff_rows = mysqli_fetch_array($staff_result);
                                      // End
                                      // Item Sold
                                      $item_sold = "Select * from tbl_sales where staff_code = '" . $_SESSION['b_staff_code'] . "'";
                                      $item_result = mysqli_query($conn, $item_sold)or die('<script type="text/javascript"> alert("'.mysqli_error($conn).'") </script>');
                                      $item_rows = mysqli_fetch_array($item_result);
                                      $item_count = mysqli_num_rows($item_result);
                                      //END
                                      $total_query = "Select Sum(total)as total_sales from tbl_sales where staff_code = '" . $_SESSION['b_staff_code'] . "'";
                                      $total_result = mysqli_query($conn, $total_query)or die('<script type="text/javascript"> alert("'.mysqli_error($conn).'") </script>');
                                      $total_rows = mysqli_fetch_array($total_result);
                                      
                                   ?>
                                     <div class="col-md-5 col-lg-5 col-xs-5 col-sm-5">
                                        <label> Staff Code : </label>
                                      </div>
                                      <div class="col-md-5 col-lg-5 col-xs-5 col-sm-5">
                                        <label> <?php echo $staff_rows['b_staff_code']; ?>  </label>
                                      </div>
                                       <div class="col-md-5 col-lg-5 col-xs-5 col-sm-5">
                                        <label> Staff Name : </label>
                                      </div>
                                      <div class="col-md-7 col-lg-7 col-xs-5 col-sm-5">
                                        <label> <?php echo $staff_rows['b_name'] . " " . $staff_rows['b_lastname']; ?>  </label>
                                      </div>
                                       <div class="col-md-5 col-lg-5 col-xs-5 col-sm-5">
                                        <label> Branch : </label>
                                      </div>
                                      <div class="col-md-7 col-lg-7 col-xs-5 col-sm-5">
                                        <label> <?php echo $_SESSION['b_code']; ?>  </label>
                                      </div>
                                       <div class="col-md-5 col-lg-5 col-xs-5 col-sm-5">
                                        <label> Sold Items : </label>
                                      </div>
                                      <div class="col-md-5 col-lg-5 col-xs-5 col-sm-5">
                                        <label> <?php echo $item_count; ?></label>
                                      </div>
                                       <div class="col-md-5 col-lg-5 col-xs-5 col-sm-5">
                                        <label> Total Sales : </label>
                                      </div>
                                      <div class="col-md-5 col-lg-5 col-xs-5 col-sm-5">
                                        <label style="color:#ff0000;"><small><?php echo "P" . $total_rows['total_sales']; ?></small></label>
                                      </div>
                               </div> <!-- End of Row Division -->     
                             </div>
                       
                             
                      
                            </div>
                            
                           </div>
         
                  </div>
                  <!--#END# First Form -->

                        <!-- Second Form  -->
                              <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                 <i class="material-icons"> verified_user </i> Sales Table
                              <small> <i> " List of items which has been sold by <?php echo $_SESSION['fullname']; ?> " </i> </small>
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
                                                        <th> Transaction Date </th>
                                                        <th> Customer Name </th>
                                                        <th> Payment Method </th>
                                                        <th> Branch </th>
                                                        <th> Option </th>
                                                    </tr>
                                                 </thead>
                                                 <tbody>
                                                      <?php 
                                                         $info_query = "Select * from tbl_sales_series where staff_code = '" . $_SESSION['b_staff_code'] . "'";
                                                         $info_result = mysqli_query($conn, $info_query);
                                                         while($info_rows = mysqli_fetch_array($info_result)){
                                                             ?>
                                                            <tr>
                                                                <td><?php echo $info_rows['transaction_number']; ?></td>
                                                                <td><?php echo $info_rows['transaction_date']; ?></td>
                                                                <td><?php echo (!empty($info_rows['customer_name'])) ? $info_rows['customer_name'] : '--'; ?></td>
                                                                <td><?php echo $info_rows['payment_method']; ?></td>
                                                                <td><?php echo $info_rows['branch']; ?></td>
                                                                <td> <a href="sales_profile_data.php?icode=<?php echo $info_rows['transaction_number']; ?>" class="btn btn-info" style="height:30px;width:30px;padding-top:0;"><i class="material-icons" style="margin-left:-7px;margin-top:2px;">remove_red_eye</i> </a> </td>
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
                           <!-- #END# Second Form -->
                    

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