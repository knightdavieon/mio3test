<?php require_once('Connection.php'); session_start(); ?>
<?php
date_default_timezone_set('Asia/Manila');
$day = date('d');
$month = date('m');
$year = date('Y');
$fullDate = $month . "/" . $day . "/" . $year;


if(isset($_POST['btn_csv_export'])){
  ob_end_clean();
  $output = fopen('php://output', 'w');
  header('Content-Type: text/csv; charset=utf-8');
  header('Content-Disposition: attachment; filename='. $_SESSION['b_code'] .'_Goods_Received_FROM_HO_Record.csv');
  fputcsv($output, array('Header'=>'Overall Sales of Branch ' . $_SESSION['b_code']));
  fputcsv($output, array("Transaction Number", "Item Barcode", "Item Name", "Category", "Sub Category", "Quantity", "Price", "Remarks", "Staff Name", "Staff Code", "TS Type", "Branch", "Transfer Status"));
  $received_inf_query = mysqli_query($conn, "Select * from tbl_branch_goods_receive_history where branch = '" . $_SESSION['b_code'] . "'");
  $received_array = array();
  while($received_inf_rows = mysqli_fetch_array($received_inf_query)){
    fputcsv($output, array(
      'Transaction Number'=>$received_inf_rows['transaction_number'],
      'Item Barcode'=>$received_inf_rows['item_barcode'],
      'Item Name'=>$received_inf_rows['item_name'],
      'Category'=>$received_inf_rows['cat'],
      'Sub Category'=>$received_inf_rows['sub_category'],
      'Quantity'=>$received_inf_rows['item_quant'],
      'Price'=>$received_inf_rows['item_price'],
      'Remarks'=>$received_inf_rows['remarks'],
      'Staff Name'=>$received_inf_rows['person_transfered'],
      'Staff Code'=>$received_inf_rows['employee_code'],
      'TS Type'=>$received_inf_rows['ts_type'],
      'Branch'=>$received_inf_rows['branch'],
      'Transfer Status'=>$received_inf_rows['transfer_status']

    ));

    }
    exit();
  }
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <title> Item Received </title>
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
      &copy; <a href="javascript:void(0);">Silverworks.com</a> <label> 2018 </label>
    </div>
    <div class="version">
      <!--  <b>Developed by: </b> John Alfonso Gamboa -->
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
              <i class="material-icons">history </i> Item Received (HO)

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
                <form method="post" name="test" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
                <button type="submit" class="btn btn-success" name="btn_csv_export" style="height:30px;padding-top:2px;"><i class="material-icons"> grid_on </i> Overall Sales(CSV) </button>
                <button type="button" id="btn_view" class="btn btn-primary" data-toggle="modal" data-target="#selected_items" style="height:30px;padding-top:0;"><i class="material-icons"> remove_red_eye</i>  View Selected Items </button>
                </form>
                <table id="r_items" class="table table-bordered table-striped">

                  <thead>
                    <tr>
                      <th> <input type="checkbox" id="main_check"><label for="main_check"> </label> </th>
                      <th> Transaction Number </th>
                      <th> Staff Code </th>
                      <th> Received By </th>
                      <th> Received Date </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $branch_query = "Select * from tbl_branch_goods_receive_series where branch = '" . $_SESSION['b_code'] . "'";
                    $branch_result = mysqli_query($conn, $branch_query)or die("Error : " . mysqli_error($conn));
                    while($branch_rows = mysqli_fetch_array($branch_result)){
                      ?>
                      <tr>
                        <td> <input type="checkbox" class="checkbox" id="<?php echo $branch_rows['transaction_number']; ?>" name="id[]"><label for="<?php echo $branch_rows['transaction_number']; ?>"> </label> </td>
                        <td><a href="branch_goods_receive_history_data.php?icode=<?php  echo $branch_rows['transaction_number'];  ?>"><?php echo $branch_rows['transaction_number']; ?></a></td>
                        <td><?php echo $branch_rows['receiver_code']; ?></td>
                        <td><?php echo $branch_rows['transact_by']; ?></td>
                        <td><label><i> <small> " <?php echo $branch_rows['received_date']; ?> " </small> </i></label></td>
                      </tr>
                      <?php
                    }
                    ?>
                  </tbody>
                </table>
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
                        console.log(arrayList);
                        $.ajax({
                          type     :     "POST",
                          url      :     "branch_goods_receive_history_tabledata.php",
                          data     :     {'data':arrayList},
                          success  :     function(result){
                            document.getElementById("selected_content").innerHTML = result;
                            $('#selected_table').DataTable({
                              dom: 'Bfrtip',
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
                              ],
                              responsive:true
                            });
                          },
                          error    :     function(errorResult){
                            alert(errorResult);
                          }
                        });
                      });
                    }else{
                      alert("No Items Selected");
                    }
                  });
                });
                </script>


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
<div class="modal fade" id="selected_items" tabindex="-1" role="dialog" aria-labelledby="modifyModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document" style="width:73%;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modifyModalLabel"><i class="material-icons">reorder</i> Branch Goods Received Report </h5>
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
<script>
$(document).ready(function(){
  $('#r_items').DataTable({
    responsive:true
  });
});

</script>
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
