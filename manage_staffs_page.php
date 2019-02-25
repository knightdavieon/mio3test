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
  <title> Manage Staffs</title>
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
      &copy;  <a href="javascript:void(0);">Silverworks.com</a> <label> 2018 </label>
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
              <i class="material-icons" style="padding-top:0;"> person_pin </i>  Manage Staffs

              <small> <i> <?php echo ($_SESSION['b_code'] == "SWHO" && $_SESSION['usertype'] == "ADMIN") ? '" Check &amp; Edit the data of registered users or staffs in your system "' : '" Check the data of registered users or staffs in your system "' ?> </i> </small>
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
                <table class="table table-striped table-bordered" id="r_items">
                  <thead>
                    <tr>
                      <th> Staff Code </th>
                      <th> Staff Name </th>
                      <th> Email </th>
                      <th> User Type </th>
                      <th> Status </th>
                      <?php
                      if($_SESSION['b_code'] == "SWHO" && $_SESSION['usertype'] == "ADMIN"){
                        ?>
                        <th> Option </th>
                      <?php } ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if($_SESSION['b_code'] == "SWHO" && $_SESSION['usertype'] == "ADMIN"){
                      $staff_query = "Select * from tbl_users";
                      $staff_result = mysqli_query($conn, $staff_query)or die('<script type="text/javascript"> alert("'.mysqli_error($conn).'") </script>');
                      while($staff_rows = mysqli_fetch_array($staff_result)){
                        ?>
                        <tr>
                          <td class="s_code"><?php echo $staff_rows['b_staff_code']; ?></td>
                          <td><?php echo $staff_rows['b_name'] . " " . $staff_rows['b_lastname']; ?></td>
                          <td><?php echo $staff_rows['b_email']; ?></td>
                          <td><?php echo $staff_rows['b_user_type']; ?></td>
                          <td><label <?php echo ($staff_rows['b_status'] == "ACTIVE") ? 'style="color:#009900;"' : 'style="color:#cc0000;"'; ?>><small><?php echo $staff_rows['b_status'] ?></small></label></td>

                          <td><button type="button" class="btn btn-primary btn_edit" data-toggle="modal" data-target="#edit_staffs" style="height:30px;width:30px;padding-top:0px;"><i class="material-icons" style="margin-left:-6px;margin-top:2px;">mode_edit </i></button> <button value="<?php echo $staff_rows['b_staff_code'] ?>" class="btn btn-danger btn_remove" style="height:30px;width:30px;padding-top:0px;"><i class="material-icons" style="margin-left:-6px;margin-top:2px;">delete </i></button></td>

                        </tr>
                        <?php
                      }
                    }else{
                      $staff_query = "Select * from tbl_users where b_code = '" . $_SESSION['b_code'] . "'";
                      $staff_result = mysqli_query($conn, $staff_query)or die('<script type="text/javascript"> alert("'.mysqli_error($conn).'") </script>');
                      while($staff_rows = mysqli_fetch_array($staff_result)){
                        ?>
                        <tr>
                          <td class="s_code"><?php echo $staff_rows['b_staff_code']; ?></td>
                          <td><?php echo $staff_rows['b_name'] . " " . $staff_rows['b_lastname']; ?></td>
                          <td><?php echo $staff_rows['b_email']; ?></td>
                          <td><?php echo $staff_rows['b_user_type']; ?></td>
                          <td><label <?php echo ($staff_rows['b_status'] == "ACTIVE") ? 'style="color:#009900;"' : 'style="color:#cc0000;"'; ?>><small><?php echo $staff_rows['b_status'] ?></small></label></td>
                        </tr>
                        <?php
                      }
                    }
                    ?>
                  </tbody>
                  <script type="text/javascript">
                  $('.btn_remove').click(function(){
                    var confirm_message = confirm("Are you sure you want to remove this account ? ");
                    if(confirm_message){
                      var rows = $(this).closest("tr");
                      var text = rows.find(".s_code").text();
                      var xmlhttp = new XMLHttpRequest();
                      xmlhttp.open("GET", "manage_staffs_page_delete.php?ecode="+text, false);
                      xmlhttp.send(null);
                      if(xmlhttp.responseText == "Removed"){
                        alert("Successfully Removed, Please Refresh the page to apply changes");
                        window.location="manage_staffs_page.php";
                      }else{
                        alert(xmlhttp.responseText);
                      }
                    }

                  });
                  </script>
                </table>
                <script type="text/javascript">
                $('.btn_edit').click(function(){
                  var row = $(this).closest("tr");
                  var text = row.find(".s_code").text();
                  document.getElementById("employee_code").value = text;
                  var xmlhttp = new XMLHttpRequest();
                  xmlhttp.open("GET", "manage_staffs_page_query.php?ecode=" + document.getElementById("employee_code").value, false);
                  xmlhttp.send(null);
                  document.getElementById("division_data").innerHTML = xmlhttp.responseText;


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

<!-- MODAL BOX 2 -->


<div class="modal fade" id="edit_staffs" tabindex="-1" role="dialog" aria-labelledby="modifyModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modifyModalLabel"><i class="material-icons">mode_edit</i> Edit Staff </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <?php
          if(isset($_POST['btn_edit'])){
            $employee_code = mysqli_real_escape_string($conn, $_POST['employee_code']);
            $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
            $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
            $branch_code = mysqli_real_escape_string($conn, $_POST['branch_code']);
            $user_type = mysqli_real_escape_string($conn, $_POST['user_type']);
            $b_email = mysqli_real_escape_string($conn, $_POST['b_email']);
            $b_password = mysqli_real_escape_string($conn, $_POST['b_password']);
            $admin_priv = mysqli_real_escape_string($conn, $_POST['admin_priv']);
            //  echo '<script type="text/javascript"> alert("'.$employee_code.'"); </script>';
            $update_query = "Update tbl_users set b_name = '" . $firstname . "', b_lastname = '" . $lastname . "', b_code ='" . $branch_code .
            "', b_user_type = '" . $user_type . "', b_email = '" . $b_email . "', b_password = '" . $b_password . "', b_admin_priv = '" . $admin_priv . "' where b_staff_code = '" . $employee_code . "'";
            $update_result = mysqli_query($conn, $update_query)or die('<script type="text/javascript"> '.mysqli_error($conn).' </script>');
            if($update_result === true){
              echo '<script type="text/javascript"> alert("Successfully Updated"); window.location="manage_staffs_page.php"; </script>';
            }else{
              echo '<script type="text/javascript"> alert("Failed to update request"); </script>';
            }
          }
          if(isset($_POST['btn_deactivate'])){
            $employee_code = mysqli_real_escape_string($conn, $_POST['employee_code']);
            //echo '<script type="text/javascript"> alert("'.$employee_code.'"); </script>';
            $update_query = "Update tbl_users set b_status = '" . "DEACTIVE" . "' where b_staff_code = '" . $employee_code . "'";
            $update_result = mysqli_query($conn, $update_query);
            if($update_result === true){
              echo '<script type="text/javascript"> alert("Account Deactivated"); window.location="manage_staffs_page.php"; </script>';
            }
          }
          if(isset($_POST['btn_activate'])){
            $employee_code = mysqli_real_escape_string($conn, $_POST['employee_code']);
            //echo '<script type="text/javascript"> alert("'.$employee_code.'"); </script>';
            $update_query = "Update tbl_users set b_status = '" . "ACTIVE" . "' where b_staff_code = '" . $employee_code . "'";
            $update_result = mysqli_query($conn, $update_query);
            if($update_result === true){
              echo '<script type="text/javascript"> alert("Account Activated"); window.location="manage_staffs_page.php"; </script>';
            }
          }
          ?>
          <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"> <!-- Main Margin -->
              <div class="row">
                <div class="col-md-10 col-lg-10 col-xs-10 col-sm-10">
                  <div class="form-group">
                    <div class="form-line">
                      <label> Employee Code </label>
                      <input type="text" id="employee_code" name="employee_code" class="form-control">
                    </div >
                  </div>
                </div>
                <div id="division_data"> </div>
                <script type="text/javascript">
                function clone_me(){
                  document.getElementById("pass_value").value = document.getElementById("pass_clone").value;
                }

                </script>

              </div>
            </div> <!-- #END# Main Margin -->

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="btn_edit" >Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- #END# OF MODAL BOX 2 -->
</section>
<script>
$(document).ready(function(){
  $('#r_items').DataTable({
    responsive:true
  });
});

</script>
<script type="text/javascript">
$(function () {
        $("#ig_checkbox").click(function () {
            if ($(this).is(":checked")) {
                $("#autoUpdate").show();
            } else {
                $("#autoUpdate").hide();
            }
        });
    });
</script>

</div> <!-- End of Button DIV -->


<!-- Jquery Core Js -->
<!-- <script src="Jquery/jquery-2.2.3.min.js"></script> -->

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
