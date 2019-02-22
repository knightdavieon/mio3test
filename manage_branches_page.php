<?php require_once('Connection.php'); ?>
<?php 
date_default_timezone_set('Asia/Manila');
$day = date('d');
$month = date('m');
$year = date('Y');
$fullDate = $month . "/" . $day . "/" . $year;
   if(isset($_POST['btn_remove'])){
         $id = mysqli_real_escape_string($conn, $_POST['btn_remove']);
         $remove_query = "Delete from tbl_categories where _id = '" . $id . "'";
         $remove_result = mysqli_query($conn, $remove_query);
         if($remove_result === true){
               echo '<script type="text/javascript"> alert("One record has been removed"); window.location="mio_category_page.php"; </script>';
         }
   }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title> Edit History </title>
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
            <div class="row clearfix">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <i class="material-icons"> store </i> Manage Branches
                                <small><i> " Add, Modify, Remove categories which are existing in the system "</i> </small>
                            </h2>
                       
                        </div>
                        
                         <div class="body">
                            <h2 class="card-inside-title"></h2>
                            <div class="row clearfix">
                               <div class="container">
                                <button type="button" class="btn btn-info" data-target="#edit_history" data-toggle="modal" style="height:30px;padding-top:0;"><i class="material-icons"> change_history </i> Edit History </button>
                                 </div>
                              <div class="col-md-3 col-lg-3 col-sm-2 col-xs-2 col-md-offset-9">
                                
                               </div>
                               
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
                                                 <th> Branch Code </th> 
                                                 <th> Branches Name </th>
                                               </tr>
                                              </thead>
                                              <tbody>
                                                    <?php 
                                                        $query = mysqli_query($conn, "Select * from tbl_branches");
                                                        while($rows = mysqli_fetch_array($query)){
                                                           if($rows['branch_code'] != "SWHO"){
                                                        ?>
                                                        <tr>
                                                           
                                                            <td class="nr"><a href="#" data-toggle="modal" data-target="#edit_branch" class="btn_code"><?php echo $rows['branch_code']; ?></a></td>
                                                            <td><?php echo $rows['branch_name']; ?></td>
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
            </div>
         
     </div>
    </section>

     <!-- MODAL BOX 1 -->


<div class="modal fade" id="edit_branch" tabindex="-1" role="dialog" aria-labelledby="modifyModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modifyModalLabel"><i class="material-icons">mode_edit</i> Edit Branch</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              <div class="container-fluid">
      <?php 
         if(isset($_POST['btn_submit'])){
                 $branch_curr_number = mysqli_real_escape_string($conn, trim($_POST['b_curr_num']));
                 $branch_curr_code = mysqli_real_escape_string($conn, trim($_POST['b_curr_code']));
                 $branch_curr_name = mysqli_real_escape_string($conn, trim($_POST['b_curr_name']));
                 $branch_code = mysqli_real_escape_string($conn, trim($_POST['branch_code']));
                 $branch_name = mysqli_real_escape_string($conn, trim($_POST['branch_name']));
                 $b_status = mysqli_real_escape_string($conn, trim($_POST['b_status']));
                 $checking_query = mysqli_query($conn, "Select * from tbl_branches where branch_code = '" . $branch_code . "'");
                 $checking_count = mysqli_num_rows($checking_query);
                if(empty($branch_code) || empty($branch_name)){
                    
                   if(mysqli_query($conn, "Update tbl_branches set status ='" . $b_status . "' where _id = '" . $branch_curr_number . "'")=== true){
                        echo '<script type="text/javascript"> alert("Successfully Modified the status"); window.location="manage_branches_page.php"; </script>';
                   }
                }else{
                 if($checking_count > 0){
                       echo '<script type="text/javascript"> alert("This branch code is already exists"); window.location="manage_branches_page.php"; </script>';
                      
                 }else{
                 if(mysqli_query($conn, "Update tbl_branches set branch_code = '" . $branch_code . "', branch_name = '" . $branch_name . "', status ='" . $b_status . "' where _id = '" . $branch_curr_number . "'") === true){
                        echo '<script type="text/javascript"> alert("Successfully Modified"); window.location="manage_branches_page.php"; </script>';
                        $users_query = mysqli_query($conn, "Update tbl_users set b_code = '" . $branch_code . "' where b_code = '" . $branch_curr_code . "'")or die('<script type="text/javascript"> mysqli_error("'.$conn.'"); </script>');
                        $tbl_branch_goods_receive = mysqli_query($conn, "Update tbl_branch_goods_receive set branch_name = '" . $branch_code . "' where branch_name = '" . $branch_curr_code . "'");
                        $tbl_branch_goods_receive_history = mysqli_query($conn, "Update tbl_branch_goods_receive_history set branch = '" . $branch_code . "' where branch = '" . $branch_curr_code . "'")or die('<script type="text/javascript"> mysqli_error("'.$conn.'"); </script>');
                        $tbl_branch_goods_receive_series = mysqli_query($conn, "Update tbl_branch_goods_receive_series set branch = '" . $branch_code . "' where  branch = '" . $branch_curr_code . "'");
                        $tbl_branch_transfer_history_to  = mysqli_query($conn, "Update tbl_branch_transfer_history set transfer_to = '" . $branch_code . "' where  transfer_to = '" . $branch_curr_code . "'");
                        $tbl_branch_transfer_history_from  = mysqli_query($conn, "Update tbl_branch_transfer_history set item_from = '" . $branch_code . "' where  item_from = '" . $branch_curr_code . "'");
                        $tbl_branch_transfer_item_temp_to  = mysqli_query($conn, "Update tbl_branch_transfer_item_temp set transfer_to = '" . $branch_code . "' where  transfer_to = '" . $branch_curr_code . "'");
                        $tbl_branch_transfer_item_temp_from  = mysqli_query($conn, "Update tbl_branch_transfer_item_temp set current_branch = '" . $branch_code . "' where  current_branch = '" . $branch_curr_code . "'");
                        $tbl_branch_transfer_series_bcode = mysqli_query($conn, "Update tbl_branch_transfer_series set branch_code = '" . $branch_code . "' where branch_code = '" . $branch_curr_code . "'");
                        $tbl_branch_transfer_series_tto  = mysqli_query($conn, "Update tbl_branch_transfer_series set transfer_to = '" . $branch_code . "' where transfer_to = '" . $branch_curr_code . "'");
                        $tbl_sales = mysqli_query($conn, "Update tbl_sales set branch = '" . $branch_code . "' where branch = '" . $branch_curr_code . "'");
                        $tbl_sales_return_goods = mysqli_query($conn, "Update tbl_sales_return_goods set branch = '" . $branch_code . "' where branch = '" . $branch_curr_code . "'");
                        $tbl_sales_series = mysqli_query($conn, "Update tbl_sales_series set branch = '" . $branch_code . "' where branch = '" . $branch_curr_code . "'");
                        $tbl_sales_temp = mysqli_query($conn, "Update tbl_sales_temp set branch_name = '" . $branch_code . "' where branch_name = '" . $branch_curr_code . "'");
                        $tbl_transaction_series = mysqli_query($conn, "Update tbl_transaction_series set branch_name = '" . $branch_code . "' where branch_name = '" . $branch_curr_code . "'");
                        $tbl_transfer_history = mysqli_query($conn, "Update tbl_transfer_history set branch = '" . $branch_code . "' where branch = '" . $branch_curr_code . "'");
                        $tbl_transfer_items = mysqli_query($conn, "Update tbl_transfer_items set branch = '" . $branch_code . "' where branch = '" . $branch_curr_code . "'");
                        $tbl_transfer_temp = mysqli_query($conn, "Update tbl_transfer_temp set branch = '" . $branch_code . "' where branch = '" . $branch_curr_code . "'");
                        $tbl_transfers_list = mysqli_query($conn, "Update tbl_transfers_list set branch = '" . $branch_code . "' where branch = '" . $branch_curr_code . "'");
                        $modified_by = mysqli_query($conn, "Insert into tbl_branches_edit_history(curr_code, curr_name, modified_by, prev_branch_code, prev_branch_name, m_date, ecode)values('" .
                        $branch_code . "','" . $branch_name . "','" . $_SESSION['fullname'] . "','" . $branch_curr_code . "','" . $branch_curr_name . "','" . $fullDate . "','" . $_SESSION['b_staff_code'] . "')");
                 }
             }    
           }
         }
      ?>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"> <!-- Main Margin -->
                        <div class="row">
                           <div id="content_div">
                             <div class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
                                 <label> Branch Number </label>
                                 <div class="form-group">
                                     <div class="form-line">
                                     <input type="text" class="form-control" name="b_curr_num">
                                     </div>
                                   </div>
                               </div>     
                                 <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                 <label> Branch Current Code </label>
                                 <div class="form-group">
                                     <div class="form-line">
                                     <input type="text" class="form-control" name="b_curr_code">
                                     </div>
                                   </div>
                               </div>  
                                 <div class="col-md-5 col-lg-5 col-xs-12 col-sm-12">
                                 <label> Branch Current Name </label>
                                 <div class="form-group">
                                     <div class="form-line">
                                     <input type="text" class="form-control" name="b_curr_name">
                                     </div>
                                   </div>
                               </div>  
                              </div> 
                               <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"> <hr> </div>
                               <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"><label><i class="material-icons">find_replace </i> Replace With </label> </div>
                               <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12" style="margin-top:10px;">
                                    <label> Branch Code </label>
                                    <div class="form-group">
                                         <div class="form-line">
                                               <input type="text" class="form-control" name="branch_code">
                                          </div>
                                      </div>
                                </div>
                               <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12" style="margin-top:10px;">
                                    <label> Branch Name </label>
                                    <div class="form-group">
                                         <div class="form-line">
                                               <input type="text" class="form-control" name="branch_name">
                                          </div>
                                      </div>
                                </div>
                                 <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12" style="margin-top:10px;">
                                    <label> Status </label>
                                         <div id="stats_content"> </div>
                                </div>
                          </div>
                    </div> <!-- #END# Main Margin -->
                   <script type="text/javascript">
                             $('.btn_code').click(function(){
                                   var row = $(this).closest("tr");
                                   var text = row.find(".nr").text();
                                   var xmlhttp = new XMLHttpRequest();
                                   xmlhttp.open("GET", "manage_branches_page_search.php?b_code=" + text, false);
                                   xmlhttp.send(null);
                                   document.getElementById("content_div").innerHTML = xmlhttp.responseText;

                                   var xmlhttpstats = new XMLHttpRequest();
                                   xmlhttpstats.open("GET", "manage_branch_stats_query.php?b_code=" + text, false);
                                   xmlhttpstats.send(null);
                                   document.getElementById("stats_content").innerHTML = xmlhttpstats.responseText;
                             });
                     </script>
               </div>
      </div>
      <div class="modal-footer">    
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="btn_submit" id="btn_submit" >Save Changes</button>
      </div>
    </div>
 </form>  
  </div>
</div>

   <!-- #END# OF MODAL BOX 1 -->

      <!-- MODAL BOX 2 -->


<div class="modal fade" id="edit_history" tabindex="-1" role="dialog" aria-labelledby="modifyModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="width:70%;">
    <div class="modal-content" >
      <div class="modal-header">
        <h5 class="modal-title" id="modifyModalLabel"><i class="material-icons">change_history</i> Edit History</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              <div class="container-fluid">
   
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"> <!-- Main Margin -->
                        <div class="row">
                                 <table class="table table-striped table-bordered" id="e_items">
                                      <thead>
                                           <tr>
                                               <th> Branch Current Code </th>
                                               <th> Branch Current Name </th>
                                               <th> Branch Previous Code </th>
                                               <th> Branch Previous Name </th>
                                               <th> Employee Code </th>
                                               <th> Modified By </th>
                                               <th> Date Modified </th>
                                             </tr>
                                         </thead>
                                        <tbody>
                                             <?php 
                                                $branch_query = mysqli_query($conn, "Select * from tbl_branches_edit_history");
                                                while($branch_rows = mysqli_fetch_array($branch_query)){
                                                 ?>
                                                    <tr>
                                                       <td><?php echo $branch_rows['curr_code']; ?></td>
                                                       <td><?php echo $branch_rows['curr_name']; ?></td>
                                                       <td><?php echo $branch_rows['prev_branch_code']; ?></td>
                                                       <td><?php echo $branch_rows['prev_branch_name']; ?></td>
                                                       <td><?php echo $branch_rows['ecode']; ?></td>
                                                       <td><?php echo $branch_rows['modified_by']; ?></td>
                                                       <td><?php echo $branch_rows['m_date']; ?></td>
                                                      </tr>
                                                 <?php
                                                }
                                             ?>
                                          </tbody>
                                   </table>
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
            $('#r_items').DataTable(function(){
                responsive:true
            });
               $('#e_items').DataTable({
                                                                                                               dom:"Bfrtip",
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
                                                                                                                       extension:'.pri nt'
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
        });
       $('.btn_edit').click(function(){
           var row = $(this).closest("tr");
           var text = row.find(".idd").text();
           document.getElementById("e_txt_id").value = text;
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