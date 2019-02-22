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
    <title> Transaction Approval </title>
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
           <!-- First Form -->
              <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                 <i class="material-icons">verified_user </i> Approval Page
                            
                                <small> <i> " List of pending items transfered branch to branch " </i> </small>
                            </h2>
                         
                        </div>
                        
                         <div class="body">
                            <h2 class="card-inside-title"></h2>
                            <div class="row clearfix">
                           <div class="col-md-12 col-sm-10 col-xs-10">
                                   <?php 
                                      if(isset($_GET['icode'])){
                                          $info_query = "Select * from tbl_branch_transfer_series where transaction_number = '" . stripslashes($_GET['icode']) . "'";
                                          $info_result = mysqli_query($conn, $info_query)or die('<script type="text/javascript"> alert("'. mysqli_error($conn) . '") </script>');
                                          $info_rows = mysqli_fetch_array($info_result);
                                   ?>
                                           <div class="col-md-5 col-lg-5 col-xs-5 col-sm-5">
                                              <label> Transaction Number : </label>
                                            </div>
                                            <div class="col-md-5 col-lg-5 col-xs-5 col-sm-5">
                                              <label> <small><?php echo $info_rows['transaction_number'] ?> </small> </label>
                                            </div>
                                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="margin-top:-25px;"> </div>
                                            <div class="col-md-5 col-lg-5 col-xs-5 col-sm-5" >
                                              <label> Employee Code : </label>
                                            </div>
                                            <div class="col-md-5 col-lg-5 col-xs-5 col-sm-5" style="margin-top:-1px;">
                                                <label> <small><?php echo $info_rows['staff_code'] ?> </small> </label>
                                            </div>
                                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="margin-top:-25px;"> </div>
                                            <div class="col-md-5 col-lg-5 col-xs-5 col-sm-5" >
                                              <label> Staff Name : </label>
                                            </div>
                                            <div class="col-md-5 col-lg-5 col-xs-5 col-sm-5" style="margin-top:-1px;">
                                              <label> <small><?php echo $info_rows['staff_name'] ?> </small> </label>
                                            </div>
                                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="margin-top:-25px;"> </div>
                                            <div class="col-md-5 col-lg-5 col-xs-5 col-sm-5" >
                                              <label> Transfer To : </label>
                                            </div>
                                            <div class="col-md-5 col-lg-5 col-xs-5 col-sm-5" style="margin-top:-1px;">
                                              <label> <small><?php echo $info_rows['transfer_to'] ?> </small> </label>
                                            </div>
                                              <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="margin-top:-25px;"> </div>
                                            <div class="col-md-5 col-lg-5 col-xs-5 col-sm-5" >
                                              <label> Branch Code : </label>
                                            </div>
                                            <div class="col-md-5 col-lg-5 col-xs-5 col-sm-5" style="margin-top:-1px;">
                                              <label> <small><?php echo $info_rows['branch_code'] ?> </small> </label>
                                            </div>
                                              <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="margin-top:-25px;"> </div>
                                            <div class="col-md-5 col-lg-5 col-xs-5 col-sm-5" >
                                              <label> Total Price : </label>
                                            </div>
                                            <div class="col-md-5 col-lg-5 col-xs-5 col-sm-5" style="margin-top:-1px;">
                                           <?php 
                                          $price_query = "Select * from tbl_branch_transfer_item_temp where transaction_number = '" . $_GET['icode'] . "'";
                                          $price_result = mysqli_query($conn, $price_query);
                                          $price_array = array();
                                          $total_array = array();
                                          while($price_rows = mysqli_fetch_array($price_result)){
                                               $price_array[] = $price_rows;
                                          }
                                          foreach($price_array as $price_frows){
                                                 $total = $price_frows['quant'] * $price_frows['price'];
                                                 $total_array[] = $total;
                                          }
                                        

                                        ?>
                                              <label style="color:#e60000;"> <small><?php echo "P".array_sum($total_array); ?> </small> </label>
                                            </div>
                                                 <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="margin-top:-25px;"> </div>
                                            <div class="col-md-5 col-lg-5 col-xs-5 col-sm-5" >
                                              <label> Transfer Status : </label>
                                            </div>
                                            <div class="col-md-5 col-lg-5 col-xs-5 col-sm-5" style="margin-top:-1px;">
                                              <label <?php echo ($info_rows['transfer_status'] == "PENDING") ? 'style="color:#e65c00;"' : 'style="color:#008000;"' ?>> <small><?php echo $info_rows['transfer_status'] ?> </small> </label>
                                            </div>
                                                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="margin-top:-25px;"> </div>
                                            <div class="col-md-5 col-lg-5 col-xs-5 col-sm-5" >
                                              <label> Transfer Date  : </label>
                                            </div>
                                            <div class="col-md-5 col-lg-5 col-xs-5 col-sm-5" style="margin-top:-1px;">
                                              <label><small> <i> " <?php echo $info_rows['transaction_date']; ?> " </i></small>  </label>
                                            </div>
                                <?php } ?>
                               </div> <!-- End of Row Division -->     
                             </div>
                       
                             
                      
                            </div>
                            
                           </div>
           <!-- #END# of first form -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                  <i class="material-icons">verified_user </i>  Approval Page
                            
                                <small> <i> " List of pending items transfered branch to branch " </i> </small>
                            </h2>
                         
                        </div>
                        <?php 
                          if(isset($_POST['btn_approve'])){
                              $transfer_query = "Update tbl_branch_transfer_item_temp set receiving_status = '" . "RTR" . "' where  transaction_number = '" . stripslashes($_GET['icode']) . "'";
                              $transfer_result = mysqli_query($conn, $transfer_query)or die('<script type="text/javascript"> alert("'.mysqli_error($conn).'") </script>');
                              
                              if($transfer_result === true){
                                   echo '<script type="text/javascript"> alert("Successfully Approved"); </script>';
                                   $series_query = "Update tbl_branch_transfer_series set transfer_status = '" . "DONE" . "' where transaction_number = '" . stripslashes($_GET['icode']) . "'";
                                   $series_result = mysqli_query($conn, $series_query);
                                   if($series_result === true){
                                     echo '<script type="text/javascript"> window.location="approval_page.php"; </script>';   
                                   }
                              }else{
                                    echo '<script type="text/javascript"> alert("Failed to approved"); </script>';
                              }
                          }
                        ?>
          <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ."?icode="  . stripslashes($_GET['icode']); ?>" enctype="multipart/form-data">
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
                                                          <th> Transaction Number </th> 
                                                          <th> Item Barcode </th>
                                                          <th> Item Name </th>
                                                          <th> Category </th>
                                                          <th> Sub Category </th>
                                                          <th> Quantity </th>
                                                          <th> Remarks </th>
                                                          <th> Price </th>
                                                         
                                                        
                                                     </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                       $branch_query = "Select * from tbl_branch_transfer_item_temp where transaction_number = '" . stripslashes($_GET['icode']) . "'";
                                                       $branch_result = mysqli_query($conn, $branch_query)or  die('<script type="text/javascript"> alert("'. mysqli_error($conn) .'") </script>');
                                                      while($branch_rows = mysqli_fetch_array($branch_result)){
                                                        ?>
                                                        <tr>
                                                             <td>
                                                             <!-- Hiiden Fields -->
                                                             <input type="hidden" name="transaction_number" value="<?php echo $branch_rows['transaction_number']; ?>">
                                                             <input type="hidden" name="item_barcode" value="<?php echo $branch_rows['item_barcode']; ?>">
                                                             <input type="hidden" name="item_barcode" value="<?php echo $branch_rows['employee_code']; ?>">
                                                             <input type="hidden" name="item_name" value="<?php echo $branch_rows['item_name']; ?>">
                                                             <input type="hidden" name="cat" value="<?php echo $branch_rows['cat']; ?>">
                                                             <input type="hidden" name="sub_cat" value="<?php echo $branch_rows['sub_cat']; ?>">
                                                             <input type="hidden" name="quant" value="<?php echo $branch_rows['quant']; ?>">
                                                             <input type="hidden" name="remarks" value="<?php echo $branch_rows['remarks']; ?>"> 
                                                             <input type="hidden" name="price" value="<?php echo $branch_rows['price']; ?>">
                                                             <!-- #END# Hiiden Fields -->
                                                             <?php echo $branch_rows['transaction_number']; ?></td>
                                                             <td><?php echo $branch_rows['item_barcode']; ?></td>
                                                             <td><?php echo $branch_rows['item_name']; ?></td>
                                                             <td><?php echo $branch_rows['cat']; ?></td>
                                                             <td><?php echo $branch_rows['sub_cat']; ?></td>
                                                             <td><?php echo $branch_rows['quant']; ?></td>
                                                             <td><?php echo $branch_rows['remarks']; ?></td>
                                                             <td><label><small><?php echo "P". $branch_rows['price']; ?></small></label></td>
                                                        
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
                        </div>
                        

           

                    </div>
                    
                </div>
                
            </div>
        <!-- Buttons -->              
           <a href="approval_page.php" class="btn btn-warning" style="height:30px;margin-top:-10px;padding-top:0px;"><i class="material-icons" style="margin-top:2px;">arrow_back</i> Back </a>     
           <button type="submit" name="btn_approve" style="height:30px;margin-top:-10px;padding-top:0px;" class="btn btn-success" onclick="return confirm('Are you sure you want to commit this?')"><i class="material-icons" style="margin-top:2px;">done_all</i> Approve</button>
          <!-- END Buttons -->      
     </div>
     </form>
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