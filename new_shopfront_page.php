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
    <title> New Shopfront </title>
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
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                    <div class="card">
                        <div class="header">
                              <h2>
                               <i class="material-icons"> shop </i> New Shopfront
                                 <small><i>" Add additional Shopfront to access the system "</i></small>
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
                     <?php 
                       if(isset($_POST['btn_submit'])){
                              $branch_code = mysqli_real_escape_string($conn, $_POST['branch_code']);
                              $branch_name = mysqli_real_escape_string($conn, $_POST['branch_name']);
                              $duplicate_query = "Select branch_code from tbl_branches where branch_code = '" . $branch_code . "'";
                              $duplicate_result = mysqli_query($conn, $duplicate_query) or die('<script type="text/javascript"> alert("'.mysqli_error($conn).'"); </script>');
                              $duplicate_count = mysqli_num_rows($duplicate_result);
                              if($duplicate_count > 0){
                                   echo '<script type="text/javascript"> alert("This Code is already exists"); </script>';
                              }else{
                             $branch_query = "Insert into tbl_branches(branch_code, branch_name, status)values('" . $branch_code . "','" . $branch_name . "','" . "ACTIVE" . "')";
                              $branch_result = mysqli_query($conn, $branch_query)or die("Error : " . mysqli_error($conn));
                              if($branch_result === true){
                                   echo '<script type="text/javascript"> alert("Successfully Added"); window.location="new_shopfront_page.php"; </script>';
                              }else{
                                   echo '<script type="text/javascript"> alert("Failed"); </script>';
                              }
                            }
                       }
                     ?>
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                         <div class="body">
                            <h2 class="card-inside-title"></h2>
                            <div class="row clearfix">
                           <div class="col-md-12 col-sm-10 col-xs-10">
                                       <div class="col-md-3 col-lg-3 col-sm-5 col-xs-5">
                                              <label>Branch Code : </label>
                                         </div>
                                     <div class="col-md-6 col-lg-6 col-sm-5 col-xs-5">
                                           <div class="form-group">
                                              <div class="form-line">
                                               <input type="text" class="form-control" name="branch_code">
                                                 </div>
                                             </div>
                                        </div> 
                                        <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12"> </div>
                                      <div class="col-md-3 col-lg-3 col-sm-5 col-xs-5">
                                              <label>Branch Name : </label>
                                         </div>
                                     <div class="col-md-6 col-lg-6 col-sm-5 col-xs-5">
                                           <div class="form-group">
                                              <div class="form-line">
                                               <input type="text" class="form-control" name="branch_name">
                                                 </div>
                                             </div>
                                        </div> 
                               </div> <!-- End of Row Division -->     
                             </div>
                       
                      
                      
                            </div>
                            
                           </div>
                          <button type="submit" class="btn btn-success" name="btn_submit" ><i class="material-icons"> done_all </i> Submit </button>
                         
                           </form>
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