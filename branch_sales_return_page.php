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
    <title>  Sales Return </title>
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
                    &copy; <a href="javascript:void(0);">Silverworks.com</a> <label> 2018 </label>
                </div>
                <div class="version">
                 <!--   <b>Developed by: </b> John Alfonso Gamboa -->
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
                                <i class="material-icons">assignment_return </i> Sales Return Report
                            
                                <small> <i> " History of items received " </i> </small>
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
                                      <table id="r_items" class="table table-bordered table-striped">
                                            <thead>
                                                 <tr>
                                                       <th> Barcode </th>
                                                       <th> Invoice Number </th>
                                                       <th> Quantity </th>
                                                       <th> TS Date </th>
                                                       <th> Returned Date  </th>
                                                       <th> Staff Code  </th>
                                                       <th> Staff Name  </th>
                                                    </tr> 
                                              </thead>
                                              <tbody>
                                                    <?php 
                                                    if($_SESSION['b_code'] == "SWHO"){
                                                       $branch_query = "Select * from tbl_sales_return_goods";
                                                       $branch_result = mysqli_query($conn, $branch_query)or die("Error : " . mysqli_error($conn));
                                                       while($branch_rows = mysqli_fetch_array($branch_result)){
                                                        ?>
                                                           <tr>
                                                              <td><?php echo $branch_rows['barcode'] ?></td>
                                                              <td><?php echo $branch_rows['invoice']; ?></td>
                                                              <td><?php echo $branch_rows['quant']; ?></td>
                                                              <td><label><?php echo $branch_rows['ts_date']; ?></label></td>
                                                              <td><?php echo $branch_rows['r_date']; ?></td>
                                                              <td><?php echo $branch_rows['staff_code']; ?></td>
                                                              <td><?php echo $branch_rows['staff_name']; ?></td>
                                                           </tr>
                                                    <?php
                                                       }
                                                    }else{
                                                       $branch_query = "Select * from tbl_sales_return_goods where branch = '" . $_SESSION['b_code'] . "'";
                                                       $branch_result = mysqli_query($conn, $branch_query)or die("Error : " . mysqli_error($conn));
                                                       while($branch_rows = mysqli_fetch_array($branch_result)){
                                                        ?>
                                                           <tr>
                                                              <td><?php echo $branch_rows['barcode'] ?></td>
                                                              <td><?php echo $branch_rows['invoice']; ?></td>
                                                              <td><?php echo $branch_rows['quant']; ?></td>
                                                              <td><label><?php echo $branch_rows['ts_date']; ?></label></td>
                                                              <td><?php echo $branch_rows['r_date']; ?></td>
                                                              <td><?php echo $branch_rows['staff_code']; ?></td>
                                                              <td><?php echo $branch_rows['staff_name']; ?></td>

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
         <!-- Second Form -->

     
     <!-- #END# of second form -->
     <!-- Third Form -->
         <!-- #END# of Third form -->
                        </div>
                        

                    

                    </div>
                </div>
            </div>
         
     </div>
    </section>
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
        <script>
        $(document).ready(function(){
            $('#r_items').DataTable({
                responsive:true,
                dom:'Bfrtip',
                 buttons: [
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
                                                                                              ]
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