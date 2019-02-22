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
    <title> Transfer Stocks Report</title>
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
                    &copy;  <a href="javascript:void(0);">Silverworks.com</a> <label> 2018 </label>
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
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <i class="material-icons"> move_to_inbox </i>  Transfer Stocks Report
                            
                                <small> <i> " List of transactions which has been transfered across the branches " </i> </small>
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
                                <button type="button" id="btn_view"  class="btn btn-primary" data-toggle="modal" data-target="#selected_items" style="margin-left:15px;height:30px;padding-top:0;"><i class="material-icons"> remove_red_eye </i> View Selected Items </button>
                           <div class="col-md-12 col-sm-10 col-xs-10" style="margin-top:20px;">
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
                                                        <th> <input type="checkbox" id="main_check"><label for="main_check"> </label></th>
                                                        <th> TS Number </th>
                                                        <th> Branch Name </th>
                                                        <th> Employee Code  </th>
                                                        <th> Employee Name </th>
                                                        <th> Transfered Date </th>
                                                        <th> Option </th>
                                                     </tr>
                                               </thead>
                                                  <tbody>
                                                       <?php 
                                                    
                                                        $ts_query = "Select * from tbl_transaction_series";
                                                        $ts_result = mysqli_query($conn, $ts_query)or die("Error : " . mysqli_error($conn));
                                                        while($ts_rows = mysqli_fetch_array($ts_result)){
                                                          ?>
                                                           <tr>
                                                                <td><input type="checkbox" class="checkbox" id="<?php echo $ts_rows['transfer_number']; ?>"><label for="<?php echo $ts_rows['transfer_number']; ?>" name="id[]"> </label></td>
                                                                <td><?php echo $ts_rows['transfer_number']; ?></td>
                                                                <td><?php echo $ts_rows['branch_name']; ?></td>
                                                                <td><?php echo $ts_rows['employee_code']; ?></td>
                                                                <td><?php echo $ts_rows['employee_name']; ?></td>
                                                                <td><?php echo $ts_rows['date_received']; ?></td>
                                                                <td><a href="transfer_stocks_report_page.php?r_id=<?php echo $ts_rows['transfer_number']; ?>" class="btn btn-primary" style="height:30px;width:30px;padding-top:0;"><i class="material-icons" style="margin-left:-7px;margin-top:2px;"> remove_red_eye</i> </a></td> 
                                                             </tr>
                                                        <?php
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
                                                       $('#main_check').click(function(){
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
                                                       $('#btn_view').click(function(){
                                                                var arrayList = new Array();
                                                                if($('input:checkbox:checked').length > 0){
                                                                        $('input:checkbox:checked').each(function(){
                                                                                arrayList.push($(this).attr("id"));
                                                                                $.ajax({
                                                                                      type        :      "POST",
                                                                                      url         :      "transfer_stocks_selected_query.php",
                                                                                      data        :      {'data':arrayList},
                                                                                      success     :      function(result){
                                                                                                         document.getElementById("selected_content").innerHTML = result;
                                                                                                         $('#selected_table').DataTable({
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
                                                                                      error       :      function(errorResult){
                                                                                                          alert(errorResult);
                                                                                      }
                                                                                });
                                                                        });
                                                                }else{
                                                                     alert("No item selected");
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
         
     </div>
    </section>
        <script>
        $(document).ready(function(){
            $('#r_items').DataTable();
        });
            
          </script>

                     
                             </div> <!-- End of Button DIV -->
                       
                        <!-- MODAL BOX 1 -->


<div class="modal fade" id="selected_items" tabindex="-1" role="dialog" aria-labelledby="modifyModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document" style="width:83%;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modifyModalLabel"><i class="material-icons"> move_to_inbox </i>  Transfer Stocks Reports</h5>
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