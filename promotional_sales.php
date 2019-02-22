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
    <title> Promotional Sales</title>
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
<!-- JQuery Datepicker API -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <!-- End -->
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
                                 <i class="material-icons"> speaker_notes  </i>  Promotional Sales
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
                                <style type="text/css">
                         .vl{
                           
                             height:200px;
                             border-left: 4px solid gray;
                             opacity:0.7;
                         }
                       </style>
                    <form method="post" name="test" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                                 
                               
                              <a href="promotional_set_page.php" class="btn btn-primary"> List Of Set Promos </a>
                                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"> </div>
                             
                                     <table class="table table-bordered table-striped" id="r_items">
                                             <thead>
                                          <tr>
                                             <th> Barcode (SKU) </th>
                                             <th> Item Name </th>
                                              <th> Item Stocks </th>
                                               <th> Item Price </th>
                                               <th> Action </th>
                                          </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                   
                                            $branch_items_query = "Select * from tbl_goods_receive";
                                            $branch_items_result = mysqli_query($conn, $branch_items_query)or die('<script type="text/javascript"> alert("'. mysqli_error($conn) .'") </script>');
                                            while($branch_items_rows = mysqli_fetch_array($branch_items_result)){
                                                ?>
                                                <tr>
                                                    
                                                    <td class="icode"><?php echo $branch_items_rows['item_barcode']; ?></td>
                                                    <td><?php echo $branch_items_rows['item_name']; ?></td>
                                                    <td><label><small><?php echo $branch_items_rows['item_quantity']; ?></small></label></td>
                                                    <td><label><small><?php echo $branch_items_rows['item_price']; ?></small></label></td>
                                                    <td><a href="#" class="btn btn-primary click_me" data-toggle="modal" data-target="#item_modal">SET</a></td>
                                                 </tr> 
                                            <?php
                                            }
                                           ?>
                                         </tbody>
                                        </table>
                                          <script type="text/javascript">
                                       
                                         $('.click_me').click(function(){
                                               var row = $(this).closest("tr");
                                               var text = row.find(".icode").text();
                                               var xmlhttp = new XMLHttpRequest();
                                               xmlhttp.open("GET", "promotional_sales_query.php?icode=" + text, false);
                                               xmlhttp.send(null);
                                               document.getElementById("content_division").innerHTML = xmlhttp.responseText;
                                                    
                                                    $('#table_branches').DataTable({
                                                     responsive:true 
                                                     });
                                                /* Disable Datepicker previous dates */   
                                                     var minDate = new Date();
                                                     $('#from_date').datepicker({
                                                         showAnim:'drop',
                                                         numberOfMonth:1,
                                                         minDate:minDate,
                                                         dateFormat:'dd/mm/yy'
                                                     });
                                                     $('#to_date').datepicker({
                                                         showAnim:'drop',
                                                         numberOfMonths:1,
                                                         minDate:minDate,
                                                         dateFormat:'dd/mm/yy'
                                                     })
                                                /* END */
                                         });
                                         function deduc_price(){
                                             /* Price Deduction */
                                             $total_price = Number(document.getElementById("total_price").value);
                                             $discount_value = Number(document.getElementById("discount_value").value);
                                             $total = $total_price - $discount_value;
                                             if($total <= 0){
                                                alert("Deduction is higher than price");
                                                document.getElementById("final_total").value = 0;
                                             }else{
                                             document.getElementById("final_total").value = $total;
                                             } 
                                               /* End Of Price Deduction */
                                         }
                                         function isNumber(evt) {
                                            evt = (evt) ? evt : window.event;
                                            var charCode = (evt.which) ? evt.which : evt.keyCode;
                                            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                                              return false;
                                            }
                                         return true;
                                         }
                       
                                   </script>
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
                                    
                               </div> <!-- End of Row Division -->     
                             </div>
                       
                             
                      
                            </div>
                            
                           </div>
                         
                        </div>
                        
                    </div>
                </div>
            </div>
         </form>
       <script>
    document.onkeydown=function(evt){
        var keyCode = evt ? (evt.which ? evt.which : evt.keyCode) : event.keyCode;
        if(keyCode == 13)
        {
            //your function call here
            document.test.submit();
        }
    }
</script>
     </div>
    </section>
    <style type="text/css">
         .buttons-copy{
                 height:30px;
                 width:30px;
                 padding-top:0;
             }
             .buttons-pdf{
                 height:30px;
                 width:30px;
                 padding-top:0;
             }
              .buttons-csv{
                 height:30px;
                 width:30px;
                 padding-top:0;
             }
             .buttons-print{
                 height:30px;
                 width:30px;
                 padding-top:0;
             }
           </style>  
        <script>
        $(document).ready(function(){
            $('#r_items').DataTable({
                responsive:true,
                dom:"Bfrtip",
                buttons:[
                 {
                     text:'<i class="material-icons" title="Copy Clipboard" style="margin-left:-10px;margin-top:2px;">developer_board</i>',
                     extend:'copy',
                     className:'btn btn-default',
                     extension:'.copy'
                    },
                     {
                    text:'<i class="material-icons" title="Print Preview" style="margin-left:-10px;margin-top:2px;"> local_printshop </i>',
                    extend:'print',
                    className:'btn btn-warning',
                   // extension:''
                },
                {
                    text:'<i class="material-icons" title="Export as CSV" style="margin-left:-10px;margin-top:2px;"> grid_on </i>',
                    extend:'csv',
                    className:'btn btn-success',
                    extension:'.csv'
              
                },
                {
                    text:'<i class="material-icons" title="Export as PDF" style="margin-left:-10px;margin-top:2px;"> picture_as_pdf </i>',
                    extend:'pdf',
                    className:'btn btn-danger',
                    extension:'.pdf' 
                }
                ]
            });
        });
            
          </script>

                     
                             </div> <!-- End of Button DIV -->
       <!-- MODAL BOX 1 -->


<div class="modal fade" id="item_modal" tabindex="-1" role="dialog" aria-labelledby="modifyModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="width:70%;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modifyModalLabel"><i class="material-icons">settings</i> Setup</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
              <div class="container-fluid">

                  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"> <!-- Main Margin -->
                        <div class="row">
                                  <div id="content_division"> </div>
                               
                         </div>
                    </div> <!-- #END# Main Margin -->
                    
               </div>
      </div>
      <div class="modal-footer">    
             <button type="button" class="btn btn-default" data-dismiss="modal"> Cancel</button>
             <button type="button" class="btn btn-primary" id="btn_submit"> Apply</button>
            <script type="text/javascript">
                   $('#btn_submit').click(function(){
                         var arrayList = new Array();
                         var i_bcode = $('#i_bcode').val();
                         var from_date = $('#from_date').val();
                         var to_date = $('#to_date').val();
                         var set_time = $('#set_time').val();
                         var set_end_time = $('#set_end_time').val();
                         var discount_value = $('#discount_value').val();
                         var final_total = $('#final_total').val();
                         var total_price = $('#total_price').val();
                         var entry_num = $('#entry_num').val();
                         if(document.getElementById("to_date").value == "" || document.getElementById("set_time").value == "" || document.getElementById("set_end_time").value == "" || document.getElementById("discount_value").value == ""){
                                alert("Invalid .. Please make sure the fields have content");
                         }else if($('input:checkbox:checked').length == 0){
                               alert("No branch selected");  
                         }else{
                             /* Single item registration from separate table */
                               $.ajax({
                                    type      :      "POST",
                                    url       :      "promotional_sales_sbmt2_query.php",
                                    data      :      {i_bcode:i_bcode, from_date:from_date, to_date:to_date, set_time:set_time, set_end_time:set_end_time, discount_value:discount_value, final_total:final_total, total_price:total_price, entry_num:entry_num},
                                    success   :      function(result){
                                               //        alert(result);
                                    },
                                    error     :      function(ErrorResult){
                                                       alert(ErrorResult);
                                    }
                               });
                               /* END */
                         if($('input:checkbox:checked').length > 0){
                              
                             $('input:checkbox:checked').each(function(){
                                arrayList.push($(this).val());
                                console.log(arrayList);
                             });
                              $.ajax({
                                    type      :      "POST",
                                    url       :      "promotional_sales_sbmt_query.php",
                                    data      :      {'data':arrayList, i_bcode:i_bcode, from_date:from_date, to_date:to_date, set_time:set_time, set_end_time:set_end_time, discount_value:discount_value, final_total:final_total, total_price:total_price, entry_num:entry_num},
                                    success   :      function(result){
                                                       alert(result);
                                                       window.location = "promotional_sales.php";
                                    },
                                    error     :      function(ErrorResult){
                                                       alert(ErrorResult);
                                    }
                               });
                         }else{
                              alert("No Branch Selected");
                         }
                       }
                   });
              </script>
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