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
    <title> New User </title>
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
            <!-- END of menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2018 <a href="javascript:void(0);">Silverworks.com</a>.
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
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                    <div class="card">
                        <div class="header">
                              <h2>
                                 <i class="material-icons"> perm_contact_calendar </i> New User
                                 <small><i>" Add additional user to access the system "</i></small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Check Registered Users</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        
                         <div class="body">
                            <h2 class="card-inside-title"></h2>
                            <div class="row clearfix">
                           <div class="col-md-12 col-sm-10 col-xs-10">
                                       <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                                              <label> Employee Code : </label>
                                         </div>
                                      <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                                         <input type="text" class="form-control" id="employee_code">
                                         </div> 
                                       <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                                              <label> Firstname : </label>
                                         </div>
                                      <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                                         <input type="text" class="form-control" id="firstname">
                                         </div> 
                                     <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                                              <label> Lastname : </label>
                                         </div>
                                      <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                                         <input type="text" class="form-control" id="lastname">
                                         </div> 
                                          <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                                              <label> Email : </label>
                                         </div>
                                      <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                                         <input type="text" class="form-control" id="email">
                                         </div>
                                          <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                                              <label> Branch Designation : </label>
                                         </div>
                                      <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                                            <select class="form-control" id="branch_designation">
                                                  <option disabled="disabled" selected="selected" value="content"> SELECT BRANCH </option>
                                                  <?php 
                                                     $branch_designation_query = "Select * from tbl_branches";
                                                     $branch_designation_result = mysqli_query($conn, $branch_designation_query);
                                                     while($branch_designation_rows = mysqli_fetch_array($branch_designation_result)){
                                                         ?>
                                                            <option value="<?php echo $branch_designation_rows['branch_code']; ?>"><?php echo $branch_designation_rows['branch_name']; ?></option>
                                                        <?php
                                                     }
                                                  ?>
                                               </select>
                                         </div>  
                                     <div class="col-md-5 col-lg-5 col-sm-10 col-xs-10">
                                              <label> User Type : </label>
                                         </div>
                                      <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                                             <select class="form-control" id="user_type">
                                                       <option disabled="disabled" selected="selected" value="content"> SELECT USER TYPE </option>
                                                       <option value="ADMIN"> ADMINISTRATOR </option>
                                                       <option value="ENCODER"> ENCODER </option>
                                             
                                                </select>
                                         </div> 
                                           <?php
                if($_SESSION['super_admin'] == "SUPER"){
             ?>
            <div class="col-md-5 col-lg-5 col-xs-10 col-sm-10">
                  <label>  Super Priviledge : </label>
               </div>
              <div class="col-md-5 col-lg-5 col-xs-10 col-sm-10">
                   <div class="form-group">
                          <div class="form-line">
                               
                                 <select class="form-control" style="cursor:pointer;" id="super_cat">
                                     <option disabled="disabled" selected="selected"> -- Select -- </option> 
                                     <option value="SUPER"> YES </option>
                                     <option value="NONE"> NO </option>
                                </select>
                             </div>
                      </div>
               </div>
               <div class="col-md-5 col-lg-5 col-xs-10 col-sm-10">
                  <label>  Admin Priviledge : </label>
               </div>
              <div class="col-md-5 col-lg-5 col-xs-10 col-sm-10">
                   <div class="form-group">
                          <div class="form-line">
                               
                                 <select class="form-control" style="cursor:pointer;" id="admin_cat">
                                     <option disabled="disabled" selected="selected"> -- Select -- </option> 
                                     <option value="B_ADMIN"> YES </option>
                                     <option value="NONE"> NO </option>
                                </select>
                             </div>
                      </div>
               </div>
               <?php 
                } ?>
                                        <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                                              <label> Password : </label>
                                         </div>
                                      <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                                                <input type="password" class="form-control" id="password">
                                         </div> 
                                             <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                                              <label> Confirm Password : </label>
                                         </div>
                                      <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                                            <input type="password" class="form-control" id="confirm_password">
                                         </div> 
                               </div> <!-- End of Row Division -->     
                             </div>
                       
                             
                      
                            </div>
                            
                           </div>
                          <button type="button" class="btn btn-primary" onclick="register_function();"><i class="material-icons"> done_all </i> Submit </button>
                             <script type="text/javascript">
                                     function register_function(){
                                        var employee_code = $('#employee_code').val();
                                        var firstname = $('#firstname').val();
                                        var lastname = $('#lastname').val();
                                        var user_type = $('#user_type').val();
                                        var email = $('#email').val();
                                        var password = $('#password').val();
                                        var confirm_password = $('#confirm_password').val();
                                        var branch_designation = $('#branch_designation').val();
                                        var super_cat = $('#super_cat').val();
                                        var admin_cat = $('#admin_cat').val();
                                    if(document.getElementById("user_type").value == "content"){
                                         alert("Please add user type");
                                    }else if(document.getElementById("employee_code").value == ""){
                                        alert("Complete the following fields first");
                                    }else if(document.getElementById("firstname").value == ""){
                                        alert("Complete the following fields first");
                                    }else if(document.getElementById("lastname").value == ""){
                                        alert("Complete the following fields first");
                                    }else if(document.getElementById("email").value == ""){
                                        alert("Complete the following fields first");
                                    }else if(document.getElementById("password").value == ""){
                                        alert("Complete the following fields first");
                                    }else if(document.getElementById("branch_designation").value == "content"){
                                        alert("Please add branch");
                                    }else if(document.getElementById("confirm_password").value == ""){
                                        alert("Please confirm your password");
                                    }else{
                                          $.ajax({
                                           type:"POST",
                                           url:"new_user_page_query.php",
                                           data:{employee_code:employee_code, firstname:firstname, lastname:lastname, branch_designation:branch_designation, user_type:user_type, email:email, password:password , confirm_password:confirm_password, super_cat:super_cat, admin_cat:admin_cat},
                                           success:function(result){
                                                 if(result == "Exists"){
                                                       alert("This code is already registered");
                                                 }else{
                                                      alert(result);
                                                      window.location = "new_user_page.php";
                                                 }
                                           }
                                        });
                                    }
                                       
                            }
                                </script>
                          <div style="margin-top:5px;"> </div>
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