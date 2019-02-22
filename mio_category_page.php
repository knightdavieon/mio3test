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
    <title> Manage Categories </title>
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
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <i class="material-icons"> layers </i> Manage Categories
                                <small><i> " Add, Modify, Remove categories which are existing in the system "</i> </small>
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
                              <div class="col-md-3 col-lg-3 col-sm-2 col-xs-2 col-md-offset-9">
                                <button type="button" id="btn_add" data-toggle="modal" data-target="#add_category" class="btn btn-success" style="margin-left:10px;"><i class="material-icons">note_add</i> Add Category </button>
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
                                                 <th> Category Id </th> 
                                                 <th> List of Category </th>
                                                 <th> Option </th>
                                                 </tr>
                                              </thead>
                                              <tbody>
                                                   <?php 
                                                       $cat_query = "Select * from tbl_categories";
                                                       $cat_result = mysqli_query($conn, $cat_query)or die("Error : " . mysqli_error($conn));
                                                       while($cat_rows = mysqli_fetch_array($cat_result)){
                                                        ?>
                                                        <tr>
                                                             <td class="idd"><?php echo $cat_rows['_id']; ?></td>
                                                             <td><?php echo $cat_rows['cat_1']; ?></td>
                                                             <td><button type="button" data-toggle="modal" data-target="#edit_category" class="btn btn-primary btn_edit" style="height:30px;width:30px;padding-top:0;"><i class="material-icons" style="margin-left:-6px;margin-top:2px;">mode_edit</i></button>&nbsp;<button type="submit" name="btn_remove" style="height:30px;width:30px;padding-top:0;" class="btn btn-danger" onclick="return confirm('Are you sure you want to remove this one ?');" value="<?php echo $cat_rows['_id']; ?>"><i class="material-icons" style="margin-top:2px;margin-left:-6px;">delete</i></button></td>
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
                         
                        </div>
                        
                    </div>
                </div>
            </div>
         
     </div>
    </section>

     <!-- MODAL BOX 1 -->


<div class="modal fade" id="add_category" tabindex="-1" role="dialog" aria-labelledby="modifyModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modifyModalLabel"><i class="material-icons">note_add</i> Add Category </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              <div class="container-fluid">

                  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"> <!-- Main Margin -->
                        <div class="row">
                        
                             <div class="col-md-10 col-lg-10 col-xs-12 col-sm-12">
                                 <label> Category Name </label>
                                 <div class="form-group">
                                     <div class="form-line">
                                     <input type="text" class="form-control" id="txt_category" >
                                     </div>
                                   </div>
                               </div>           
                               
                          </div>
                    </div> <!-- #END# Main Margin -->
                  
               </div>
      </div>
      <div class="modal-footer">    
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btn_submit" >Submit</button>
      </div>
    </div>
  </div>
</div>

   <!-- #END# OF MODAL BOX 1 -->

   <!-- MODAL BOX 2 -->


<div class="modal fade" id="edit_category" tabindex="-1" role="dialog" aria-labelledby="modifyModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modifyModalLabel"><i class="material-icons">mode_edit</i> Edit Category </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              <div class="container-fluid">

                  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"> <!-- Main Margin -->
                        <div class="row">
                          <div class="col-md-10 col-lg-10 col-xs-12 col-sm-12">
                                 <label> Category Id </label>
                                 <div class="form-group">
                                     <div class="form-line">
                                     <input type="text" class="form-control" id="e_txt_id" disabled="disabled">
                                     </div>
                                   </div>
                               </div>
                             <div class="col-md-10 col-lg-10 col-xs-12 col-sm-12">
                                
                                 <label> Category Name </label>
                                 <div class="form-group">
                                     <div class="form-line">
                                     <input type="text" class="form-control" id="e_txt_category" >
                                     </div>
                                   </div>
                               </div>           
                               
                          </div>
                    </div> <!-- #END# Main Margin -->
                  
               </div>
      </div>
      <div class="modal-footer">    
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btn_edit" >Submit</button>
      </div>
    </div>
  </div>
</div>

   <!-- #END# OF MODAL BOX 2 -->

        <script>
        $('#btn_submit').click(function(){
              var txt_category = $('#txt_category').val();
              if(document.getElementById("txt_category").value == ""){
                      alert("Please add value first");
              }else{
                  $.ajax({
                 type:"POST",
                 url:"category_query.php",
                 data:{txt_category:txt_category},
                 success:function(result){
                     if(result == "Exist"){
                          alert("This Category is already exist");
                     }else{
                             alert("Successfully Added");
                             document.getElementById("r_items").innerHTML = result;
                     }
                 }
              });
              }
        });
        $('#btn_edit').click(function(){
               var category_id = $('#e_txt_id').val();
               var category_name = $('#e_txt_category').val();
              if(document.getElementById("e_txt_category").value == ""){
                    alert("Please add value first");
              }else{
                    $.ajax({
                   type:"POST",
                   url:"category_query_edit.php",
                   data:{e_txt_id:category_id, e_txt_category:category_name},
                   success:function(result){
                        if(result == "Exist"){
                             alert("This category is  already exist");
                        }else{
                                alert("Successfully Modified")
                                document.getElementById("r_items").innerHTML = result;
                        }
                   }
               });
            }
        });
        $(document).ready(function(){
            $('#r_items').DataTable(function(){
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
</form>            
                       
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