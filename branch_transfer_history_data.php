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
    <title> Transfer History </title>
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
                    &copy; <a href="javascript:void(0);">Silverworks.com</a> 2018
                </div>
                <div class="version">
                   <!-- <b>Developed by: </b> John Alfonso Gamboa -->
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
               <!-- Item Information Form -->
                <a href="branch_transfer_history_page.php" style="height:30px;width:70px;padding-top:0px;" class="btn btn-warning"><i class="material-icons" style="margin-left:-2px;"> arrow_back </i> Back </a>
                   <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                                <h2><i class="material-icons"> info </i> Information </h2>
                           </div>
                        
                         <div class="body">
                            <h2 class="card-inside-title"></h2>
                            <div class="row clearfix">
                           <div class="col-md-12 col-sm-10 col-xs-10">
                                   <?php 
                                        $info_query = "Select * from tbl_branch_transfer_history where transaction_number = '" . stripslashes($_GET['icode']) . "'";
                                        $info_result = mysqli_query($conn, $info_query)or die('<script type="text/javascript"> alert("'. mysqli_error($conn) .'") </script>');
                                        $info_rows = mysqli_fetch_array($info_result);

                                        $sum_query = "Select * from tbl_branch_transfer_history where transaction_number = '" . stripslashes($_GET['icode']) . "'";
                                        $sum_result = mysqli_query($conn, $sum_query);
                                        $array_quant = array();
                                        $array_sum = array();
                                        while($sum_rows = mysqli_fetch_array($sum_result)){
                                            $array_quant[] = $sum_rows;
                                        }
                                        foreach($array_quant as $array_frows){
                                             $array_sum[] = $array_frows['quant'] * $array_frows['price'];
                                        }
                                        $history_status = mysqli_query($conn, "Select * from tbl_branch_transfer_series where transaction_number = '" . stripslashes($_GET['icode']) . "'");
                                        $history_rows = mysqli_fetch_array($history_status);
                                        if($history_rows['receiving_status'] != "DONE"){
                                            ?>
                                              <button type="button" class="btn btn-info" data-target="#list_items" data-toggle="modal" style="height:30px;padding-top:3px;"><i class="material-icons"> remove_red_eye </i> Inspect </button>
                                              <div class="alert alert-warning" style="margin-top:15px;"> 
                                                <p> <strong> Notice ..  </strong> waiting to receive of the branch <strong><?php echo $history_rows['transfer_to']; ?></strong>  </p>
                                              </div>
                                       <?php
                                        }else{
                                   ?>
                                      <div class="col-md-4 col-lg-5 col-sm-5 col-xs-5">
                                            <label> Transaction Number : </label>
                                         </div>
                                          <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                                            <label> <?php echo $info_rows['transaction_number']; ?> </label>
                                         </div>
                                          <div class="col-md-4 col-lg-5 col-sm-5 col-xs-5">
                                            <label> Branch : </label>
                                         </div>
                                          <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                                            <label> <?php echo $info_rows['item_from']; ?> </label>
                                         </div>
                                          <div class="col-md-4 col-lg-5 col-sm-5 col-xs-5">
                                            <label> Staff Code : </label>
                                         </div>
                                          <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                                            <label> <?php echo $info_rows['employee_code']; ?> </label>
                                         </div>
                                         <div class="col-md-4 col-lg-5 col-sm-5 col-xs-5">
                                            <label> Staff Name : </label>
                                         </div>
                                          <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                                            <label>  <?php echo $info_rows['staff_name']; ?>  </label>
                                         </div>
                                          <div class="col-md-4 col-lg-5 col-sm-5 col-xs-5">
                                            <label> Total : </label>
                                         </div>
                                          <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                                            <label style="color:#cc0000;"><small> P <?php echo array_sum($array_sum); ?> </small></label>
                                         </div>
                                     <?php } ?>
                               </div> <!-- End of Row Division -->     
                             </div>
                       
                             
                      
                            </div>
                            
                           </div>
                         
                        </div>
                        
                    </div>
            <!-- #END#  Item information -->
            <!-- Transfered Items Form -->
                
            <!-- #END# of transfered items -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                  <i class="material-icons"> transfer_within_a_station </i> Transfered Items
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
                                     <table class="table table-bordered table-striped" id="r_items">
                                             <thead>
                                                   <tr>
                                                         <th> Transaction Number </th>
                                                         <th> Item Barcode </th>
                                                         <th> Item Name </th>
                                                         <th> Category </th>
                                                         <th> Sub Category </th>
                                                         <th> Quantity </th>
                                                         <th> Price </th>
                                                         <th> Remarks </th>
                                                     
                                                      </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                       $branch_query = "Select * from tbl_branch_transfer_history where transaction_number = '" . stripslashes($_GET['icode']) . "'";
                                                       $branch_result = mysqli_query($conn, $branch_query)or die('<script type="text/javascript"> alert("'. mysqli_error($conn) .'") </script>');
                                                       while($branch_rows = mysqli_fetch_array($branch_result)){
                                                           ?>
                                                              <tr>
                                                                   <td><?php echo $branch_rows['transaction_number']; ?></td>
                                                                   <td><?php echo $branch_rows['item_barcode']; ?></td>
                                                                   <td><?php echo $branch_rows['item_name']; ?></td>
                                                                   <td><?php echo $branch_rows['cat']; ?></td>
                                                                   <td><?php echo $branch_rows['sub_cat']; ?></td>
                                                                   <td><?php echo $branch_rows['quant']; ?></td>
                                                                   <td><?php echo $branch_rows['price']; ?></td>
                                                                   <td><?php echo $branch_rows['remarks']; ?></td>
                                                                  
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
                          <a href="branch_transfer_history_page.php" style="height:30px;width:70px;padding-top:0px;" class="btn btn-warning"><i class="material-icons" style="margin-left:-2px;"> arrow_back </i> Back </a>
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
            $('#cmodal_table').DataTable({
                responsive:true 
            })
        });
            
          </script>

                     
                             </div> <!-- End of Button DIV -->
                       
                       
                       <!-- MODAL BOX 1 -->


<div class="modal fade" id="list_items" tabindex="-1" role="dialog" aria-labelledby="modifyModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document"  style="width:70%;">
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
                                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="margin-top:-20px;">
                                <label style="padding:10px;"><i class="material-icons"> info </i> Item Information </label>
                                </div>
                                <?php 
                                $modal_query = mysqli_query($conn, "Select * from tbl_branch_transfer_series where transaction_number = '" . stripslashes($_GET['icode']) . "'");
                                $modal_rows = mysqli_fetch_array($modal_query);
                                ?>
                                <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                                     <label> Staff Code : </label>
                                 </div>     
                                 <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                                     <label> <?php echo $modal_rows['staff_code']; ?> </label>
                                 </div>   
                                  <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                                     <label> Transfered By : </label>
                                 </div>     
                                 <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                                     <label> <?php echo $modal_rows['staff_name']; ?> </label>
                                 </div>   
                                  <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                                     <label> Branch : </label>
                                 </div>     
                                 <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                                     <label> <?php echo $modal_rows['branch_code']; ?> </label>
                                 </div>                    
                                  <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                                     <label> Transfer To : </label>
                                 </div>     
                                 <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                                     <label> <?php echo $modal_rows['transfer_to']; ?> </label>
                                 </div>   
                                  <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                                     <label> Transaction Date : </label>
                                 </div>     
                                 <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                                     <label> <?php echo $modal_rows['transaction_date']; ?> </label>
                                 </div>  
                                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"> <hr style="border:1px solid #000;opacity:0.5;"> </div>
                                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                    <table border="1" class="table table-striped table-bordered" id="cmodal_table">
                                           <thead>
                                              <tr>
                                                  <th> Transation Number </th>
                                                  <th>  Barcode </th>
                                                  <th>  Description </th>
                                                  <th>  Category </th>
                                                  <th>  Sub Category </th>
                                                  <th>  Quantity </th>
                                                  <th>  Remarks </th>
                                                  <th>  Price </th>
                                                  
                                               </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                   $minfo_query = mysqli_query($conn, "Select * from tbl_branch_transfer_item_temp where transaction_number = '" . stripslashes($_GET['icode']) . "'");
                                                   while($minfo_rows = mysqli_fetch_array($minfo_query)){
                                                     ?>
                                                      <tr>
                                                         <td><?php echo $minfo_rows['transaction_number']; ?></td>
                                                         <td><?php echo $minfo_rows['item_barcode']; ?></td>
                                                         <td><?php echo $minfo_rows['item_name']; ?></td>
                                                         <td><?php echo $minfo_rows['cat']; ?></td>
                                                         <td><?php echo $minfo_rows['sub_cat']; ?></td>
                                                         <td><?php echo $minfo_rows['quant']; ?></td>
                                                         <td><?php echo $minfo_rows['remarks']; ?></td>
                                                         <td><?php echo $minfo_rows['price']; ?></td>
                                                       </tr>
                                                <?php
                                                   }
                                                ?>
                                             </tbody>
                                     </table>
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