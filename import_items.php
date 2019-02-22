<?php require_once('Connection.php'); ?>
<?php 
date_default_timezone_set('Asia/Manila');
$day = date('d');
$month = date('m');
$year = date('Y');
$fullDate = $month . "/" . $day . "/" . $year;
if(isset($_POST['csv_file'])){
       echo '<script type="text/javascript"> alert("Working"); </script>';
}
if(isset($_POST['btn_download'])){
    ob_end_clean();
    $output = fopen('php://output', 'w');
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=format.csv'); 
    fputcsv($output, array("Inventory Code", "Item Name", "Description", "Item Stocks", "Item Price"));
    exit();
}
if(isset($_POST['btn_import'])){
    $file_name = mysqli_real_escape_string($conn, $_FILES['file_name']['tmp_name']);
    $fhandler = fopen($file_name, "r");
    fgetcsv($fhandler);
    $uis_query = "Select * from tbl_swho_uis";
    $uis_result = mysqli_query($conn, $uis_query)or die("Error : " . mysqli_error($conn));
    $message = false;
    $uis_total = 0;
    if(empty(fgetcsv($_FILES['file_name']['tmp_name']))){
           echo '<script type="text/javascript"> alert("No File Found");window.location="import_items.php"; </script>';
    }else{
        while($uis_rows = mysqli_fetch_array($uis_result)){
            $uis_total = $uis_rows['swho_uis'];
             while(($frows = fgetcsv($fhandler, 1000, ",")) !== false){
                $uis_total += 1;
                $frows = array_map("utf8_encode", $frows);
                 $import_query = "Insert into tbl_swho_items(uis, inventory_code, item_name, item_description, item_stocks, item_price, item_status, item_date)values('" .
                  $uis_total . "','" . $frows[0] . "','" . $frows[1] . "','" . $frows[2] . "','" . $frows[3] . "','" . $frows[4] . "','" . "ACTIVE" . "','" . $fullDate . "')";
                 $import_result = mysqli_query($conn, $import_query)or die("Error : " . mysqli_error($conn));
                 if($import_result === true){
                      $message = true;
                 }else{
                     $message = false;
                 }     
              }
     }
   
   }
   if($message){
         echo '<script type="text/javascript"> alert("Successfully Imported"); window.location="import_items.php"; </script>';
   }else{
    echo '<script type="text/javascript"> alert("Successfully Imported"); </script>';
   }
}
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


   <!-- Light Gallery Plugin Css -->
   <link href="plugins/light-gallery/css/lightgallery.css" rel="stylesheet">


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
     <link rel="stylesheet" href="Dashboard/dist/css/lightbox.min.css">
    
       <style type="text/css">
            .radio_style{
                 -webkit-apperance:none;
            }
         </style>
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
                    <li class="active">
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
                <h2> Import Items </h2>
            </div>
            <!-- Input -->
            <form method="post" action="import_items.php" enctype="multipart/form-data">
            <div class="row clearfix">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                        <img src="Icons/shuttershock.png" height="60px" width="60px" style="margin-top:-20px;position:absolute;magin-left:-10px;"> 
                           <h2 style="margin-left:55px;">
                              Import Items
                            </h2>
                            <ul class="header-dropdown m-r-5">
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
                                 
                                   
                                    <div class="col-md-7 col-lg-7 col-xs-12 col-sm-12">
                                            <input type="file" name="file_name" class="btn btn-primary">
                                           
                                       </div>
                                       <div class="col-md-2 col-lg-2 col-xs-12 col-sm-12">
                                       <button type="submit" name="btn_import" class="btn btn-primary"><i class="material-icons">file_upload </i> Import </button>
                                       </div>
                                       <div class="col-md-2 col-lg-2 col-xs-12 col-sm-12">
                                            <button type="submit" name="btn_download" class="btn btn-warning"><i class="material-icons">file_download</i> Download </button>
                                       </div>
                                       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                              <label> Reminders : </label>
                                                   <ul>
                                                         <li> Only .CSV File can be uploaded </li>
                                                         <li> Check the following Required Fields you should contain with it with content </li>
                                                         <li> Duplicate items will automatically rejected by the system </li>
                                                         <li> Check the content of your CSV file before uploading </li>
                                                         <li> The Format of cells should be in General Format <a href="Icons/CSV.png" data-lightbox="example-1"> Click here </a> to view sample output </li>
                                                      </ul>
                                         </div>
                               </div> <!-- End of Row Division -->     
                             </div>
                       
                             
                      
                            </div>
                            
                           </div>
                         
                        </div>


  <!-- Second Division Form -->
  <div class="row clearfix">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                        <img src="Icons/export-flat.png" height="30px" width="30px" style="margin-top:-5px;position:absolute;magin-left:15px;"> 
                           <h2 style="margin-left:55px;">
                                 Export Items
                            </h2>
                            <ul class="header-dropdown m-r-5">
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
                                  
                                   <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3 col-md-offset-3">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="material-icons">file_download</i> Export </button>
                                      </div>
                                      
                                    
                               </div> <!-- End of Row Division -->     
                             </div>
                       
                             
                      
                            </div>
                            
                           </div>
                         
                        </div>
                        
                    </div>
                </div>
            </div>
             <!-- #END# Of  Second Division Form -->

                        
                    </div>

                       
                        
                </div>
                
                   

            </div>
         
      </div>
    
      <!-- MODAL BOX 1 -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="material-icons">file_download</i> Export </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              <div class="container-fluid">

                  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"> <!-- Main Margin -->
                  <div class="row">
                        <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12">
                           <label> Export Category </label>
                           <select class="form-control" name="export_category">
                                    <option disabled="disabled" selected="selected"> ---- SELECT CATEGORY ---- </option>
                                    <option> Items </option>
                               </select>
                         </div>
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"></div>
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5" style="margin-top:20px;">
                            
                            
                           <div class="radio_style">
                                  <button type="submit" name="csv_file"> CSV File </button>
                                  <button type="submit" name="pdf_file"> PDF File </button> 
                           </div> 
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:10px;">
                                              <label> Guide : </label>
                                                   <ul>
                                                         <li> Click the export button</li>
                                                         <li> There would be a box will pop-up with two options </li>
                                                         <li> Export as CSV or PDF </li>
                                                         <li> Choose a file type by selecting in button</li>
                                                      </ul>
                                         </div>
                    </div> <!-- #END# Main Margin -->
                  
               </div>
      </div>
      <div class="modal-footer">    
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
   <!-- #END# OF MODAL BOX 1 -->
        
       

      </form>
    </section>


        <script>
        var modal = document.getElementById("myModal");
        $(document).ready(function(){
            $('#r_items').DataTable({
                responsive:true
            });
        });
    
            
          </script>

                     
         </div> <!-- End of Button DIV -->
 <div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>      
                       
    <!-- Jquery Core Js -->
   
    <script src="Dashboard/dist/js/lightbox-plus-jquery.min.js"></script>
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
    <!-- Light Gallery Plugin Js -->
     <script src="plugins/light-gallery/js/lightgallery-all.js"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/forms/basic-form-elements.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
</body>
</html>