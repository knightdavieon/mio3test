<?php 
require_once('Connection.php'); ?>
<?php 
date_default_timezone_set('Asia/Manila');
$day = date('d');
$month = date('m');
$year = date('Y');
$fullDate = $month . "/" . $day . "/" . $year;
   if(isset($_POST['btn_remove_shop'])){
        $delete_value = mysqli_real_escape_string($conn, $_POST['btn_reg_click']);
        $delete_query = "Delete from tbl_branches where _id = '" . $delete_value  . "'";
        $delete_result = mysqli_query($conn, $delete_query)or die("Error : " . mysqli_error($conn));
        if($delete_result === true){
              echo '<script type="text/javascript"> alert("One Recod has been removed");window.location="user_registration.php"; </script>';
        }else{
             echo "Failed";
        }
   }

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title> Mio || Item Registration</title>
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
     <link rel="stylesheet" href=" https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
      <!-- End of Font Awesome <-->
      <style type="text/css">
           .capital_letter{
            text-transform:uppercase; 
           }
        </style>

</head>

<body class="theme-black">
         <?php include("top_header.php"); ?>
           <!-- Menu -->
           <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="dashboard.php">
                            <i class="material-icons">home</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="inventory_items.php">
                            <i class="material-icons">dashboard</i>
                            <span>Inventory</span>
                        </a>
                    </li>
                    <?php 
                       if($_SESSION['b_code'] == "SWHO"){
                           ?>
                             <li>
                        <a href="approval_page.php">
                            <i class="material-icons">done_all</i>
                            <span>Approval</span>
                        </a>
                    </li>
                    <?php
                       }else{
                           ?>
                    <li>
                        <a href="Receiving_page.php">
                            <i class="material-icons">assignment</i>
                            <span>Receiving </span>
                        </a>
                    </li>
                           <?php
                       }
                    ?>
                  
                  <li>
                      <?php 
                           if($_SESSION['b_code'] == "SWHO"){
                               ?>
                                 
                                 <a href="Branch_Sales.php">
                              <i class="material-icons">accessibility </i>
                                <span> Manage Staffs </span>
                             </a>
                         <?php
                           }else{
                            ?>
                             <a href="staff_record.php">
                              <i class="material-icons">accessibility </i>
                                <span> Staffs </span>
                             </a>
                         <?php
                           }
                        ?>
                         
                       </li>
                  
                  <?php 
                            if($_SESSION['b_code'] == "SWHO"){
                                          ?>
                    <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">work</i>
                                    <span>Manage Data</span>
                                </a>
                                <ul class="ml-menu">
                                  
                                        <li>
                                        <a href="Create_item_page.php">Create Item</a>
                                        </li>
                                        
                               
                                    <li>
                                        <a href="edit_items_table.php">Edit Items</a>
                                    </li>
                                 
                                </ul>
                            </li>
                            <?php
                          }
                                   ?>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">assignment_returned</i>
                                    <span>Manage Returns</span>
                                </a>
                                <ul class="ml-menu">
                                    
                                    <li>
                                        <a href="Return_table.php"> Items Ready To Return</a>
                                    </li>
                                </ul>
                            </li>
                       <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">widgets</i>
                            <span>Reports </span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="#">
                                    <span>Sales Report </span>
                                </a>
                              
                            </li>
                            <li>
                                <a href="#">
                                    <span>Staff Report</span>
                                </a>
                                
                            </li>
                        </ul>
                    </li>
                    <?php 
                   if($_SESSION['b_code'] == "SWHO"){
                     ?>
                    <li class="active">
                        <a href="user_registration.php">
                            <i class="material-icons">swap_calls</i>
                            <span>Configuration</span>
                        </a>
                     
                    </li>
                    <?php
                   }
                ?>
                <?php 
                   if($_SESSION['b_code'] == "SWHO"){
                     ?>
                    <li>
                        <a href="import_items.php">
                            <i class="material-icons">assignment</i>
                            <span>Import &amp; Export</span>
                        </a>
                      
                    </li>
                
                
                <?php
                   }
                ?>
                
                       
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2018 <a href="javascript:void(0);">Silverworks.com</a>.
                </div>
                <div class="version">
                    <b>Developed by: </b> John Alfonso Gamboa
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
           <!-- Rigth Side Bar -->
                
        <!-- #END# of Right Side Bar -->
    </section>

    <section class="content">
<form method="post" action="user_registration.php" enctype="multipart/form-data"> 
  <div class="container-fluid">
     <div class="block-header">
        <h2> Account Settings </h2>
      </div>
	<div class="row">
    
		                        <div class="col-md-10 col-sm-10 col-xs-10">
                                    <!-- Nav tabs --><div class="card">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Register new user</a></li>
                                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">New Shopfront</a></li>
                                        <li role="presentation"><a href="#registered" aria-controls="registered" role="tab" data-toggle="tab">Registered Users</a></li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="home">
                                            <div class="container-fluid">
                                             <label> Employee Code </label>
                                             <input type="text" class="form-control" style="width:50%;" id="employee_code" autocomplete="off"><br/>
                                             <label> Firstname </label>
                                             <input type="text" class="form-control" style="width:50%;" id="firstname" autocomplete="off"><br/>
                                             <label> Lastname </label>
                                             <input type="text" class="form-control" style="width:50%;" id="lastname" autocomplete="off"><br/>
                                             <label> Email </label>
                                             <input type="text" class="form-control" style="width:50%;" id="email" autocomplete="off"><br/>
                                             <label> User Type</label><br/>
                                             <select id="user_type">
                                                  <option disabled="disabled" selected="selected" value="select_val"> ---- SELECT USER TYPE ---- </option>
                                                  <option value="ADMIN"> ADMINISTRATOR </option>
                                                  <option value="ENCODER"> ENCODER </option>
                                              </select><br/><br/>
                                            <label>  Branch Designation </label><br/>
                                             <select id="branch_designation">
                                                 <option disabled="disabled" selected="selected" value="select_val"> ---- SELECT BRANCH ---- </option>
                                                 <?php 
                                                     $branch_query = "Select * from tbl_branches";
                                                     $branch_result = mysqli_query($conn, $branch_query);
                                                     while($branch_rows = mysqli_fetch_array($branch_result)){
                                                         ?>
                                                        <option value="<?php echo $branch_rows['branch_code']; ?>"><?php echo $branch_rows['branch_name'] ?></option>
                                                    <?php
                                                     }
                                                 ?>
                                             </select><br/><br/>
                                            
                                            
                                             <label> Password</label>
                                             <input type="password" class="form-control" style="width:50%;" id="user_password">
                                             <br/>
                                             <label> Confirm Password</label>
                                             <input type="password" class="form-control" style="width:50%;" id="confirm_password">
                                             <br/><br/>
                                             <button type="button" onclick="create_function();" class="btn btn-primary"> Create Staff</button>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="profile">
                                           <div class="container-fluid">
                                              <label> Shopfront Name </label>
                                              <input type="text" id="shopfront_name" class="form-control" style="width:50%;text-transform:uppercase;"> 
                                              <label> Shopfront  Code </label>
                                              <input type="text" id="shopfront_code" class="form-control" style="width:50%;text-transform:uppercase;"> <br/>
                                              <button class="btn btn-primary" onclick="branch_function();" id="btn_continue"> Continue </button><br/>
  
                                              <table id="shopfront_table" class="table table-bordered table-striped">
                                                     <thead>
                                                           <tr>
                                                               <th> Shopfront ID </th>
                                                                <th> Shopfront Name </th>
                                                                <th> Shopfront Code </th>
                                                                <th> Options </th>
                                                              </tr>
                                                       </thead>
                                                       <tbody>
                                                           <?php 
                                                            $shop_query = "Select * from tbl_branches";
                                                            $shop_result = mysqli_query($conn, $shop_query);
                                                            $shop_array = array();
                                                            while($shop_rows = mysqli_fetch_array($shop_result)){
                                                                 $shop_array[] = $shop_rows;
                                                            }
                                                            foreach($shop_array as $shop_frows){
                                                                ?>
                                                            <tr>
                                                                    <td class="nr"><?php echo $shop_frows['_id']; ?></td>
                                                                    <td><?php echo $shop_frows['branch_code']; ?></td>
                                                                    <td><?php echo $shop_frows['branch_name']; ?></td>
                                                                    <td>
                                                                   <!-- Button trigger modal -->
                                                                     <button type="button" class="btn btn-primary click_me" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-pencil-square-o"> </i>  </button>
                                                                     <button type="button" class="btn btn-danger btn_remove_shop"  value="<?php echo $shop_frows['_id'] ?>" ><i class="fa fa-trash"></i></button>
                                                                    </td>
                                                                </tr>
                                                        <?php
                                                            }
                                                           ?>
                                                         </tbody>
                                                </table>
                                            </div>
                                         </div>
                                        <div role="tabpanel" class="tab-pane" id="registered">
                                          <div class="container-fluid">
                                               <table id="users_table" class="table table-bordered table-striped">
                                                     <thead>
                                                          <tr>
                                                               <th> Staff Code </th>
                                                               <th> Name </th>
                                                               <th> Branch Code </th>
                                                               <th> Email </th>
                                                               <th> Options </th>
                                                            </tr>
                                                       </thead>
                                                       <tbody>
                                                             <?php 
                                                               $users_query = "Select * from tbl_users";
                                                               $user_result = mysqli_query($conn, $users_query);
                                                               while($user_rows = mysqli_fetch_array($user_result)){
                                                               ?>
                                                                 <tr>   
                                                                  <td class="data_class"><?php echo $user_rows['b_staff_code']; ?></td>
                                                                  <td><?php echo $user_rows['b_name'] . "  " . $user_rows['b_lastname']; ?></td>
                                                                  <td><?php echo $user_rows['b_code']; ?></td>
                                                                  <td><?php echo $user_rows['b_email']; ?></td>
                                                                  <td> <button type="button" class="btn btn-primary btn_update_staff" data-toggle="modal" data-target="#modifyModal" ><i class="fa fa-pencil-square-o"></i> </button>  </td>
                                                                  </tr> 
                                                             <?php
                                                               } 
                                                             ?>
                                                          </tbody>
                                                  </table>
                                         </div>
                                       </div>
                                    </div>
                                   
                          </div>
                     </div>
	</div>
</div>  


<script>
$('.btn_update_staff').click(function(){
   var row = $(this).closest("tr");
   var text = row.find(".data_class").text();
   document.getElementById("u_ecode").value = text;
});
$('.click_me').click(function(){
 var row = $(this).closest("tr");
    var text = row.find(".nr").text();
    document.getElementById("txt_current_code").value = text;
});

   


   function branch_function(){
         var  shopfront_id = $('#shopfront_id').val();
         var shopfront_name = $('#shopfront_name').val();
         var shopfront_code = $('#shopfront_code').val();
        if(document.getElementById("shopfront_name").value == ""){
            alert("Fiil up the following fields first");
        }else  if(document.getElementById("shopfront_code").value == ""){
            alert("Fill up the following fields first");
        }else{
            $.ajax({
           type:"POST",
           url:"queries/shopfront_query.php",
           data:{shopfront_name:shopfront_name, shopfront_code:shopfront_code},
           success:function(result){
                 if(result == "Working"){
                    alert("Successfully Created the branch");
                 }else{
                     alert(result);
                 }
           }
          });
        }
      
    }
   
     function create_function(){
        var employee_code = $('#employee_code').val();
        var firstname = $('#firstname').val();
        var lastname = $('#lastname').val();
        var email = $('#email').val();
        var user_type = $('#user_type').val();
        var user_password = $('#user_password').val();
        var branch_designation = $('#branch_designation').val();
        var confirm_password = $('#confirm_password').val();
        var message = confirm("Confirm Registration of staff");
        if(message){
            if(document.getElementById("employee_code").value == ""){
             alert("Please fill up the following fields");
        }else if(document.getElementById("firstname").value == ""){
            alert("Please fill up the following fields");
        }else if(document.getElementById("lastname").value == ""){
            alert("Please fill up the following fields");
        }else if(document.getElementById("email").value == ""){
            alert("Please fill up the following fields");
        }else if(document.getElementById("user_type").value == ""){
            alert("Please fill up the following fields");
        }else if(document.getElementById("user_password").value == ""){
            alert("Please fill up the following fields");
        }else if(document.getElementById("branch_designation").value == ""){
            alert("Please fill up the following fields");
        }else if(document.getElementById("confirm_password").value == ""){
            alert("Please fill up the following fields");
        }else{
            $.ajax({
            type:"POST",
            url:"queries/user_registration_query.php",
            data:{employee_code:employee_code, firstname:firstname, lastname:lastname, email:email, user_type:user_type, user_password:user_password, branch_designation:branch_designation, confirm_password:confirm_password},
            success:function(result){
                 if(result == "Working"){
                    alert("Successfully Created the staff");
                    $('#employee_code').val("");
                    $('#firstname').val("");
                    $('#lastname').val("");
                    $('#email').val("");
                    $('#user_password').val("");
                    $('#confirm_password').val("");
                 }else{
                    alert(result);
                 }
            }
        });
        }

    }
 }
     function e_save_function(){
         var current_shopfront_code = $('#txt_current_code').val();
         var shopfront_code = $('#txt_shopfront_code').val();
         var shopfront_name = $('#txt_shopfront_name').val();
         if(document.getElementById("txt_shopfront_code").value == ""){
             alert("Empty Field is not valid");
         }else if(document.getElementById("txt_shopfront_name").value == ""){
              alert("Empty Field is not valid");
         }else{

           $.ajax({
             type:"POST",
             url:"queries/user_edit_function_query.php",
             data:{txt_current_code:current_shopfront_code, txt_shopfront_code:shopfront_code, txt_shopfront_name:shopfront_name},
             success:function(result){
                  if(result == "True"){
                     alert("Successfully Modified");
                     window.location="user_registration.php";
                  }else{
                       alert(result);
                    }
             }
             
         });
     
      }
        
     }
     function reg_delete_function(){
         var txt_current_code = $('#txt_current_code').val();

         $.ajax({
            type:"POST",
            url:"queries/user_delete_query.php",
            data:{txt_current_code:txt_current_code,}
         });
        
     }
   </script>


<!-- MODAL BOX 1 -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-pencil-square-o"></i> Edit Shopfront </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              <div class="container-fluid">

                  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"> <!-- Main Margin -->
                  <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                      <label> Shopfront ID :  </label>
                     </div>
                     <div class="col-md-7 col-lg-7 col-sm-7 col-xs-7" style="margin-top:-10px;">
                           <input type="text" class="form-control" id="txt_current_code" disabled="disabled">
                       </div>
                       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"></div>
                    
                     <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5" style="margin-top:20px;">
                      <label> Shopfront Code :  </label>
                     </div>
                     <div class="col-md-7 col-lg-7 col-sm-7 col-xs-7" style="margin-top:10px;">
                           <input type="text" class="form-control" id="txt_shopfront_code" style="text-transform:uppercase;">
                       </div>
                      
                       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"></div>

                     <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5" style="margin-top:20px;">
                      <label> Shopfront Name :  </label>
                     </div>
                     <div class="col-md-7 col-lg-7 col-sm-7 col-xs-7" style="margin-top:10px;">
                           <input type="text" class="form-control" id="txt_shopfront_name" style="text-transform:uppercase;">
                       </div>

                   

                     </div>
                    </div> <!-- #END# Main Margin -->
                  
               </div>
      </div>
      <div class="modal-footer">    
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="e_save_changes" onclick="e_save_function();">Save changes</button>
      </div>
    </div>
  </div>
</div>
   <!-- #END# OF MODAL BOX 1 -->

   <!-- MODAL BOX 2 -->


<div class="modal fade" id="modifyModal" tabindex="-1" role="dialog" aria-labelledby="modifyModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modifyModalLabel"><i class="fa fa-pencil-square-o"></i> Edit Shopfront </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              <div class="container-fluid">

                  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"> <!-- Main Margin -->
                        <div class="row">
                             <div  class="col-lg-6 col-md-6 col-xs-6 col-sm-6" style="margin-top:6px;">
                                     <label> Employee Code : </label>
                              </div>
                              <div  class="col-lg-6 col-md-6 col-xs-6 col-sm-6">
                                     <input type="text" class="form-control" name="u_employee_code" id="u_ecode" required="required" disabled="disabled">
                              </div>
                              <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12"></div>
                              <div  class="col-lg-6 col-md-6 col-xs-6 col-sm-6" style="margin-top:18px;">
                                     <label> Firstname : </label>
                              </div>
                              <div  class="col-lg-6 col-md-6 col-xs-6 col-sm-6" style="margin-top:10px;">
                                     <input type="text" class="form-control" id="u_firstname" required="required">
                              </div>
                              <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12"></div>
                              <div  class="col-lg-6 col-md-6 col-xs-6 col-sm-6" style="margin-top:18px;">
                                     <label> Lastname : </label>
                              </div>
                              <div  class="col-lg-6 col-md-6 col-xs-6 col-sm-6" style="margin-top:10px;">
                                     <input type="text" class="form-control" id="u_lastname" required="required">
                              </div>
                              <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12"></div>
                              <div  class="col-lg-6 col-md-6 col-xs-6 col-sm-6" style="margin-top:18px;">
                                     <label> Email : </label>
                              </div>
                              <div  class="col-lg-6 col-md-6 col-xs-6 col-sm-6" style="margin-top:10px;">
                                     <input type="text" class="form-control" id="u_email" required="required">
                              </div>
                              <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12"></div>
                              <div  class="col-lg-6 col-md-6 col-xs-6 col-sm-6" style="margin-top:18px;">
                                     <label> User Type : </label>
                              </div>
                              <div  class="col-lg-6 col-md-6 col-xs-6 col-sm-6" style="margin-top:10px;">
                                     <select class="form-control" id="u_usertype" required>
                                            <option disabled="disabled" selected="selected"> ---- SELECT USER TYPE ---- </option>
                                            <option value="ADMIN"> ADMINISTRATOR </option>
                                            <option value="ENCODER"> ENCODER </option>
                                        </select>
                              </div>
                              <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12"></div>
                              <div  class="col-lg-6 col-md-6 col-xs-6 col-sm-6" style="margin-top:18px;">
                                     <label> Branch Designation : </label>
                              </div>
                              <div  class="col-lg-6 col-md-6 col-xs-6 col-sm-6" style="margin-top:10px;">
                                     <select class="form-control" id="u_branch_designation" required>
                                            <option disabled="disabled" selected="selected"> ---- SELECT BRANCH ---- </option>
                                            <?php 
                                                $u_branch_query = "Select * from tbl_branches";
                                                $u_branch_result = mysqli_query($conn, $u_branch_query);
                                                while($u_rows = mysqli_fetch_array($u_branch_result)){
                                                    ?>
                                                <option value="<?php echo $u_rows['branch_code']; ?>"><?php echo $u_rows['branch_name']; ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                              </div>
                              <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12"></div>
                              <div  class="col-lg-6 col-md-6 col-xs-6 col-sm-6" style="margin-top:18px;">
                                     <label> Old Password : </label>
                              </div>
                              <div  class="col-lg-6 col-md-6 col-xs-6 col-sm-6" style="margin-top:10px;">
                                       <input type="password" class="form-control" id="u_old" required="required">
                              </div>
                              <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12"></div>
                              <div  class="col-lg-6 col-md-6 col-xs-6 col-sm-6" style="margin-top:18px;">
                                     <label> New Password : </label>
                              </div>
                              <div  class="col-lg-6 col-md-6 col-xs-6 col-sm-6" style="margin-top:10px;">
                                    <input type="password" class="form-control" id="u_new">
                              </div>
                              
                          </div>
                    </div> <!-- #END# Main Margin -->
                  
               </div>
      </div>
      <div class="modal-footer">    
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        <button type="button" class="btn btn-primary" onclick="user_update_function();">Save changes</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">

    function user_update_function(){
        var u_employee_code = $('#u_ecode').val();
         var u_firstname = $('#u_firstname').val();
         var u_lastname = $('#u_lastname').val();
         var u_email = $('#u_email').val();
         var u_usertype = $('#u_usertype').val();
         var u_branch_designation = $('#u_branch_designation').val();
         var u_old = $('#u_old').val();
         var u_new  = $('#u_new ').val();
         $.ajax({
               type:"POST",
               url:"queries/user_edit_query.php",
               data:{u_ecode:u_employee_code, u_firstname:u_firstname, u_lastname:u_lastname, u_email:u_email, u_usertype:u_usertype, u_branch_designation:u_branch_designation, u_old:u_old, u_new:u_new},
               success:function(result){
                     if(result == "True"){
                         alert("Successfully Modified");
                         $('#u_firstname').val("");
                         $('#u_lastname').val("");
                         $('#u_email').val("");
                         $('#u_old').val("");
                         $('#u_new').val("");
                     }else{
                         alert(result);
                     }
               }
         });
    }
 </script>
   <!-- #END# OF MODAL BOX 2 -->

<script type="text/javascript">
    $(document).ready(function(){
    $('#shopfront_table').DataTable({
          responsive:true
     });
     $('#users_table').DataTable({
          responsive:true
     });
   });
   </script>

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