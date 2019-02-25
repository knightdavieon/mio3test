<?php require_once('Connection.php'); ?>

<?php
date_default_timezone_set('Asia/Manila');
$day = date('d');
$month = date('m');
$year = date('Y');
$fullDate = $month . "/" . $day . "/" . $year;
 session_start();
?>
      <?php
                       if(isset($_POST['btn_export'])){
                              ob_end_clean();
                              $output = fopen('php://output', 'w');
                              header('Content-Type: text/csv; charset=utf-8');
                              header('Content-Disposition: attachment; filename=inventory.csv');
                              fputcsv($output, array("Item Barcode", "Description", "Category", "Sub Category ", "Quantity","Price"));
                              $query = "Select * from tbl_branch_goods_receive where branch_name = '" . $_SESSION['b_code'] . "'";
                              $result = mysqli_query($conn, $query);
                              while($rows = mysqli_fetch_array($result)){
                                fputcsv($output, array(
                                    "Item Barcode"=>$rows['item_barcode'],
                                    "Description"=>$rows['item_name'],
                                    "Category"=>$rows['cat'],
                                    "Sub Category"=>$rows['sub_category'],
                                    "Quantity"=>$rows['item_quantity'],
                                    "Price"=>$rows['item_price']
                                 ));
                              }

                              exit();
                       }
                    ?>
                    <?php
                      if(isset($_POST['btn_exp_csv'])){
                         $item_bcode = mysqli_real_escape_string($conn, $_POST['item_bcode']);
                         $tbl_branch_goods_receive_history = mysqli_query($conn, "Select Sum(item_quant) as quant_total from tbl_branch_goods_receive_history where item_barcode = '" . $item_bcode . "' and branch = '" . $_SESSION['b_code'] . "'");
                         $tbl_branch_goods_receive_history_rows = mysqli_fetch_array($tbl_branch_goods_receive_history);
                         $tbl_branch_transfer_history = mysqli_query($conn, "Select Sum(quant) as quant_total from tbl_branch_transfer_history where item_barcode = '" . $item_bcode . "' and item_from = '" . $_SESSION['b_code'] . "'");
                         $tbl_branch_transfer_history_rows = mysqli_fetch_array($tbl_branch_transfer_history);
                         $tbl_branch_transfer_history_received = mysqli_query($conn, "Select Sum(quant) as quant_total from tbl_branch_transfer_history where item_barcode = '" . $item_bcode . "' and transfer_to = '" . $_SESSION['b_code'] . "'");
                         $tbl_branch_transfer_history_received_rows = mysqli_fetch_array($tbl_branch_transfer_history_received);
                         $tbl_sales = mysqli_query($conn, "Select Sum(quant) as quant_total from tbl_sales where item_barcode = '" . $item_bcode . "' and branch = '" . $_SESSION['b_code'] . "'");
                         $tbl_sales_rows = mysqli_fetch_array($tbl_sales);
                         $total_count = $tbl_branch_goods_receive_history_rows['quant_total'] +  $tbl_branch_transfer_history_received_rows['quant_total'] - ($tbl_branch_transfer_history_rows['quant_total'] + $tbl_sales_rows['quant_total']);
                              ob_end_clean();
                              $output = fopen('php://output', 'w');
                              header('Content-Type: text/csv; charset=utf-8');
                              header('Content-Disposition: attachment; filename=inv_per_item.csv');
                              fputcsv($output, array("Item Received(HO)", "Item Received (Branch)", "Transfered Quantity", "Sales", "Total"));

                                fputcsv($output, array(
                                  "ITRH"=> $tbl_branch_goods_receive_history_rows['quant_total'],
                                  "ITRB"=> $tbl_branch_transfer_history_received_rows['quant_total'],
                                  "Transfer"=>$tbl_branch_transfer_history_rows['quant_total'],
                                  "Sales"=>$tbl_sales_rows['quant_total'],
                                  "Total"=>$total_count
                                 ));


                              exit();
                      }
                    ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title> Mio || Inventory Page </title>
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
                    &copy;  <a href="javascript:void(0);">Silverworks.com</a> <label> 2018 </label>.
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
                    <div class="card" style="margin-top:-50px;">
                        <div class="header">
                            <h2>
                                  <i class="material-icons"> storage  </i> Inventory
                                <small> <i> " List of items in your store " </i> </small>
                            </h2>

                        </div>

                         <div class="body">
                            <h2 class="card-inside-title"></h2>
                            <div class="row clearfix">

                    <form method="post" action="<?php echo  $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">

                              <button type="submit" class="btn btn-success" name="btn_export" style="height:30px;padding-top:0px;margin-left:20px;"><i class="material-icons" style="padding-top:0;"> grid_on </i> Export as (CSV) </button>
                           <div class="col-md-12 col-sm-10 col-xs-10" style="margin-top:20px;">

                                   <style type="text/css">
                                            table.dataTable thead th{
                                                   background-color:gray;
                                                   color:#fff;
                                                   opacity:0.7;
                                            }
                                      </style>


                                    <table id="r_items" class="table table-bordered table-striped">
                                           <thead>
                                                 <th> Barcode  </th>
                                                 <th> Description </th>
                                                 <th> Category  </th>
                                                 <th> Sub Category  </th>
                                                 <th> Quantity  </th>
                                              </thead>
                                              <tbody>
                                                    <?php
                                                        $item_query = "Select * from tbl_branch_goods_receive where branch_name = '" . $_SESSION['b_code'] . "'";
                                                        $item_result = mysqli_query($conn, $item_query);
                                                        while($item_rows = mysqli_fetch_array($item_result)){
                                                          ?>
                                                             <tr>
                                                                 <td class="nr"><a href="#" data-toggle="modal" data-target="#mymodal" class="click_me"><?php echo $item_rows['item_barcode']; ?></a></td>
                                                                 <td><?php echo $item_rows['item_name']; ?></td>
                                                                 <td><?php echo $item_rows['cat']; ?></td>
                                                                 <td><?php echo $item_rows['sub_category']; ?></td>
                                                                 <td><label><small><?php echo $item_rows['item_quantity']; ?></small></label></td>
                                                               </tr>
                                                        <?php
                                                         }
                                                    ?>
                                                    <script type="text/javascript">
                                                           $('.click_me').click(function(){
                                                                 var row = $(this).closest("tr");
                                                                 var text = row.find(".nr").text();
                                                                 document.getElementById("item_barcode").value = text;
                                                                 var b_code = $('#b_code').val();
                                                                 var item_barcode = $('#item_barcode').val();
                                                                 $.ajax({
                                                                    type:"POST",
                                                                    url:"branch_inventory_page_query.php",
                                                                    data:{item_barcode:item_barcode, b_code:b_code},
                                                                    success:function(result){
                                                                        document.getElementById("content_info_div").innerHTML = result;
                                                                        $('#goods_table').DataTable({
                                                                              responsive:true
                                                                        });
                                                                        $('#transfer_table').DataTable({
                                                                               responsive:true
                                                                        });
                                                                        $('#sales_table').DataTable({
                                                                            responsive:true
                                                                        });
                                                                        $('#branch_goods_table').DataTable({
                                                                            responsive:true
                                                                        });
                                                                    }
                                                                 });
                                                           });


                                                       </script>
                                                 </tbody>
                                       </table>
                               </div> <!-- End of Row Division -->
                             </div>



                            </div>

                           </div>
                </form>
         <!-- Second Form -->


     <!-- #END# of second form -->
     <!-- Third Form -->
         <!-- #END# of Third form -->


         <!-- MODAL BOX 1 -->


<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="modifyModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="width:55%;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modifyModalLabel"><i class="material-icons">info_outline</i> Item Information </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
              <div class="container-fluid">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"> <!-- Main Margin -->
                        <div class="row">

                                <?php
                                //echo $_SERVER['PHP_SELF'];
                                 //  $item_info_query = "Select * from tbl_branch_goods_receive where item_barcode = '"
                                ?>
                                         <input type="hidden" id="item_barcode" name="item_bcode">
                                         <input type="hidden" id="b_code" value="<?php echo $_SESSION['b_code']; ?>">

                               <div id="content_info_div"> </div>
                          </div>
                    </div> <!-- #END# Main Margin -->

               </div>
               </form>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>
 </form>
   <!-- #END# OF MODAL BOX 1 -->
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
