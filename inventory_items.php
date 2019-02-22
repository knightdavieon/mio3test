<?php 
require_once('Connection.php'); ?>
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
    <title> Inventory</title>
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

      <!-- DataTable CDN -->
 
   <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  -->
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
     <link rel="stylesheet" href=" https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
      <!-- End of Font Awesome -->

</head>

<body class="theme-black">
            <?php include('top_header.php'); ?>
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
        <!-- Right Side Bar -->
        <?php include('Skins.php'); ?>
         <!-- End of Right Side Bar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
              
            </div>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <i class="material-icons"> storage </i> Inventory Items
                               
                                <small> " <i> List of items in your inventory </i> "</small>
                            </h2>
                           
                        </div>
                        
                         <div class="body">
                            <h2 class="card-inside-title"></h2>
                            <div class="row clearfix">
                           <?php 
                              if($_SESSION['b_code'] == "SWHO"){
                                  ?>
                                
                              
                                <div class="col-md-4 col-sm-10 col-xs-10">
                                
                                     <label> Filter by category </label>
                                      <select class="form-control" name="s_item_branch">
                                            <option disabled="disabled" selected="selected"> Select Category </option>
                                            <option value="inventory_code"> Inventory Code </option>
                                            <option value="item_name"> Item Name </option>
                                          </select>   
                                  </div>
                                  <div class="col-md-3 col-lg-3 col-sm-10 col-xs-10" style="margin-top:24px;">
                                      <div class="form-group">
                                         <div  class="form-line">
                                          <input type="text" class="form-control" name="txt_value"> 
                                         </div>
                                       </div>   
                                     </div>
                                   
                            <?php
                              } ?>
                            <button type="submit" class="btn btn-primary" style="margin-top:20px;height:30px;padding-top:0;width:30px;" name="btn_search"><i class="fa fa-search" style="margin-left:-6px;margin-top:2px;"></i>  </button> 
                            
                          
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
                                             <th> Barcode (SKU) </th>
                                             <th> Item Name </th>
                                              <th> Item Stocks </th>
                                               <th> Item Price </th>
                                          </tr>
                                         </thead>
                                    <tbody>
                                         <?php 
                                     if(isset($_POST['btn_search'])){
                                         if($_POST['s_item_branch'] == "inventory_code"){
                                                  $branch_items_query = "Select * from tbl_goods_receive where item_barcode = '" . $_POST['txt_value'] . "'";
                                                  $branch_items_result = mysqli_query($conn, $branch_items_query)or die('<script type="text/javascript"> alert("'. mysqli_error($conn) .'") </script>');
                                                  while($branch_items_rows = mysqli_fetch_array($branch_items_result)){
                                        ?>
                                                <tr>
                                                    <td class="icode"><a href="#" data-toggle="modal" data-target="#item_modal" class="click_me"><?php echo $branch_items_rows['item_barcode']; ?></a></td>
                                                    <td><?php echo $branch_items_rows['item_name']; ?></td>
                                                    <td><label><small><?php echo $branch_items_rows['item_quantity']; ?></small></label></td>
                                                    <td><label><small><?php echo $branch_items_rows['item_price']; ?></small></label></td>
                                                 </tr> 
                                          <?php
                                            }
                                         }else if($_POST['s_item_branch'] == "item_name"){
                                             $branch_items_query = "Select * from tbl_goods_receive where item_name = '" . $_POST['txt_value'] . "'";
                                                  $branch_items_result = mysqli_query($conn, $branch_items_query)or die('<script type="text/javascript"> alert("'. mysqli_error($conn) .'") </script>');
                                                  while($branch_items_rows = mysqli_fetch_array($branch_items_result)){
                                        ?>
                                                <tr>
                                                    <td class="icode"><a href="#" data-toggle="modal" data-target="#item_modal" class="click_me"><?php echo $branch_items_rows['item_barcode']; ?></a></td>
                                                    <td><?php echo $branch_items_rows['item_name']; ?></td>
                                                    <td><label><small><?php echo $branch_items_rows['item_quantity']; ?></small></label></td>
                                                    <td><label><small><?php echo $branch_items_rows['item_price']; ?></small></label></td>
                                                 </tr> 
                                          <?php
                                            }
                                         }
                                     }else{
                                            $branch_items_query = "Select * from tbl_goods_receive";
                                            $branch_items_result = mysqli_query($conn, $branch_items_query)or die('<script type="text/javascript"> alert("'. mysqli_error($conn) .'") </script>');
                                            while($branch_items_rows = mysqli_fetch_array($branch_items_result)){
                                                ?>
                                                <tr>
                                                    <td class="icode"><a href="#" data-toggle="modal" data-target="#item_modal" class="click_me"><?php echo $branch_items_rows['item_barcode']; ?></a></td>
                                                    <td><?php echo $branch_items_rows['item_name']; ?></td>
                                                    <td><label><small><?php echo $branch_items_rows['item_quantity']; ?></small></label></td>
                                                    <td><label><small><?php echo $branch_items_rows['item_price']; ?></small></label></td>
                                                 </tr> 
                                            <?php
                                            }
                                         }
                                         ?>
                                      </tbody>
                                    </table>  
                                <script type="text/javascript">
                                         $('.click_me').click(function(){
                                              var row = $(this).closest("tr");
                                              var text = row.find(".icode").text();
                                              var xmlhttp = new XMLHttpRequest();
                                              xmlhttp.open("GET", "inventory_items_search_query.php?icode="+text, false);
                                              xmlhttp.send(null);
                                              document.getElementById("item_content").innerHTML = xmlhttp.responseText;
                                            
                                               //Goods Receives Table
                                                $('#goods_table').DataTable({
                                                  responsive:true
                                                 });
                                                 // End
                                                // Transfer Table
                                                 $('#transfer_table').DataTable({
                                                     responsive:true
                                                 })
                                                 $('#sales_table').DataTable({
                                                     responsive:true
                                                 })
                                                //End
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
     

                     
                             </div> <!-- End of Button DIV -->
                       

 <!-- MODAL BOX 1 -->


<div class="modal fade" id="item_modal" tabindex="-1" role="dialog" aria-labelledby="modifyModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modifyModalLabel"><i class="material-icons">info</i> Item Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
              <div class="container-fluid">

                  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"> <!-- Main Margin -->
                        <div class="row">
                           <!-- Item Information -->
                              <div id="item_content"> </div>
                           <!-- #END# -->
                     
                          
                         
                                   <!-- Tab Content -->
                                            
                        <!-- #END# Tab Content -->
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
                dom: 'Bfrtip',
                buttons: [
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
               
                 ],
                responsive:true
            });
           $('#goods_table').DataTable({
                  responsive:true
           });
     });
            
          </script>               
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