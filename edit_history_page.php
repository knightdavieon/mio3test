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
    <title> Mio || Inventory Adjustment</title>
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
             <a href="edit_items_page.php?icode=<?php echo stripslashes($_GET['icode']); ?>" class="btn btn-warning" style="height:30px;padding-top:0px;margin-top:-10px;"><i class="material-icons" style="margin-top:2px;"> arrow_back </i> Back </a>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                   <i class="material-icons"> mode_edit </i> Edit History
                            
                                <small> <i> " List of items which has been modified " </i> </small>
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
                                                   <th> Item Barcode </th>
                                                   <th> Item Name </th>
                                                   <th> Category </th>
                                                   <th> Sub Category </th>
                                                   <th> Update By </th>
                                                   <th> Date Updated </th>
                                                 </tr>
                                             </thead>
                                             <tbody>
                                                   <?php 
                                                      $history_query = "Select * from tbl_item_update_history order by date_updated";
                                                      $history_result = mysqli_query($conn, $history_query);
                                                      while($history_rows = mysqli_fetch_array($history_result)){
                                                      ?>
                                                      <tr>
                                                          <td><?php echo $history_rows['item_barcode']; ?></td>
                                                          <td><?php echo $history_rows['item_name']; ?></td>
                                                          <td><?php echo $history_rows['cat']; ?></td>
                                                          <td><?php echo $history_rows['sub_cat']; ?></td>
                                                          <td><?php echo $history_rows['staff_update']; ?></td>
                                                          <td><?php echo $history_rows['date_updated']; ?></td>
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
         <!-- Second Form -->

     
     <!-- #END# of second form -->
     <!-- Third Form -->
         <!-- #END# of Third form -->
          <a href="edit_items_page.php?icode=<?php echo stripslashes($_GET['icode']); ?>" class="btn btn-warning" style="height:30px;padding-top:0px;margin-top:-10px;"><i class="material-icons" style="margin-top:2px;"> arrow_back </i> Back </a>
                        </div>
                        

                    

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