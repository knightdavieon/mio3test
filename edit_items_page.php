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
    <title> Edit Items </title>
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
                    &copy;  <a href="javascript:void(0);">Silverworks.com</a> <label> 2018 </label> <br/>
                   <!-- <label> Developed by :  </label> John Alfonso Gamboa -->
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
            <?php 
             if(isset($_POST['deactivate'])){
                  $btn_deactivate = $_POST['deactivate'];
                  $item_barcode = mysqli_real_escape_string($conn, $_POST['item_barcode']);
                   $item_idd = mysqli_real_escape_string($conn, $_POST['idd']);
                  $btn_deactivate_query = "Update tbl_swho_items set item_status = '" . "DEACTIVE" . "' where uis = '" . $item_idd . "'";
                  $btn_deactivate_result = mysqli_query($conn, $btn_deactivate_query);
                  if($btn_deactivate_result === true){
                         echo '<script type="text/javascript"> alert("Successfully Updated"); </script>';
                         $btn_goods_receive_query = "Update tbl_goods_receive set item_status = '" . "DEACTIVE" . "' where item_barcode = '" . $item_barcode . "'";
                         $btn_goods_receive_result = mysqli_query($conn, $btn_goods_receive_query)or die('<script type="text/javascript"> alert("'. mysqli_error($conn) .'"); </script>');
                         $branch_goods_receive_query = "Update tbl_branch_goods_receive set item_status = '" . "DEACTIVE" . "' where item_barcode = '" . $item_barcode . "'";
                         $branch_goods_receive_result = mysqli_query($conn, $branch_goods_receive_query);
                  }
             }
               if(isset($_POST['activate'])){
                  $btn_deactivate = $_POST['activate'];
                  $item_idd = mysqli_real_escape_string($conn, $_POST['idd']);
                  $item_barcode = mysqli_real_escape_string($conn, $_POST['item_barcode']);
                  $btn_deactivate_query = "Update tbl_swho_items set item_status = '" . "ACTIVE" . "' where uis = '" . $item_idd . "'";
                  $btn_deactivate_result = mysqli_query($conn, $btn_deactivate_query);
                  if($btn_deactivate_result === true){
                         echo '<script type="text/javascript"> alert("Successfully Updated"); </script>';
                           $btn_goods_receive_query = "Update tbl_goods_receive set item_status = '" . "ACTIVE" . "' where item_barcode = '" . $item_barcode . "'";
                           $btn_goods_receive_result = mysqli_query($conn, $btn_goods_receive_query)or die('<script type="text/javascript"> alert("'. mysqli_error($conn) .'"); </script>');
                          $branch_goods_receive_query = "Update tbl_branch_goods_receive set item_status = '" . "ACTIVE" . "' where item_barcode = '" . $item_barcode . "'";
                         $branch_goods_receive_result = mysqli_query($conn, $branch_goods_receive_query);
                  }
             }
             if(isset($_POST['btn_update'])){
                 $item_idd = mysqli_real_escape_string($conn, $_POST['idd']);
                 $item_name = mysqli_real_escape_string($conn, $_POST['item_name']);
                 $item_barcode = mysqli_real_escape_string($conn, $_POST['item_barcode']);
                 $cat = mysqli_real_escape_string($conn, $_POST['cat']);
                 $item_price = mysqli_real_escape_string($conn, $_POST['item_price']);
                 $sub_cat = mysqli_real_escape_string($conn, $_POST['sub_cat']);   
                 $description = mysqli_real_escape_string($conn, $_POST['description']);
           $update_query = "Update tbl_swho_items set item_barcode = '" . $item_barcode . "', item_name = '" . $item_name . "', item_barcode ='" . $item_barcode
           . "', cat='" . $cat . "', sub_cat = '" . $sub_cat . "', item_price = '" . $item_price . "', sub_cat = '" . $sub_cat . "', item_description = '" . $description . 
           "' where uis = '" . $item_idd  . "'";
           $update_result = mysqli_query($conn, $update_query);
           if($update_result === true){
              echo '<script type="text/javascript"> alert("Successfully Updated"); </script>';
              // History Query
              $history_query = "Insert into tbl_item_update_history(uis, item_barcode, item_name, description, cat, sub_cat, staff_update, staff_branch, date_updated)values('"
              . $item_idd . "','" . $item_barcode . "','" . $item_name . "','" . $description . "','" . $cat . "','" . $sub_cat . "','" . $_SESSION['fullname'] . "','" . $_SESSION['b_code'] . "','"  .$fullDate . "')";
              $history_result = mysqli_query($conn, $history_query)or die('<script type="text/javascript"> alert("'. mysqli_error($conn) .'") </script>');
              // End
             // Goods Receive Query
              $update_goods_receive_query = "Update tbl_goods_receive set item_name = '" . $item_name . "', cat = '" . $cat . "', sub_category = '" . $sub_cat . "', item_price = '"
              . $item_price . "' where item_barcode = '" . $item_barcode . "'";
              $update_goods_receive_query = mysqli_query($conn, $update_goods_receive_query)or die('<script type="text/javascript"> alert("'. mysqli_error($conn) .'") </script>');
              // End
              //Branch Goods Receive Query Update
              $update_branch_query = "Update tbl_branch_goods_receive set item_name = '" . $item_name . "', cat = '" . $cat . "', sub_category = '" . $sub_cat . "', item_price = '" . 
              $item_price . "' where item_barcode = '" . $item_barcode . "'";
              $update_branch_result = mysqli_query($conn, $update_branch_query);   
              // End   
                     
           }else{
              echo '<script type="text/javascript"> alert("Failed to update"); </script>';
           }

        }
            ?>
           <form method="post" action="edit_items_page.php?icode=<?php echo stripslashes($_GET['icode']); ?>" enctype="multipart/form-data">
            <div class="row clearfix">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                   <i class="material-icons"> mode_edit </i> Edit Item
                            
                                <small> <i> " List of transactions which has been transfered across the branches " </i> </small>
                            </h2>
                         
                        </div>
                    
                         <div class="body">
                            <h2 class="card-inside-title"></h2>
                            <div class="row clearfix">
                           <div class="col-md-12 col-sm-12 col-xs-12">
                                <?php 
                               
                                $search_query = "Select * from tbl_swho_items where item_barcode = '" . stripslashes($_GET['icode']) . "'";
                                $search_result = mysqli_query($conn, $search_query);
                                $search_rows = mysqli_fetch_array($search_result);
                                ?>
                                   <div class="col-lg-offset-9 col-md-offset-9 col-sm-offset-9 col-xs-offset-9">
                                          
                                     </div>
                                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
                                       <label> Date  Created : </label> <label> <small><i> " <?php echo $search_rows['date_created']; ?> " </i> </small></label>
                                    </div>
                                    <div class="col-md-4 col-lg-4 col-sm-10 col-xs-10">
                                    <label> Item ID </label>
                                     <div class="form-group">
                                           <div class="form-line">
                                                 <input type="text" disabled="disabled" class="form-control" value="<?php echo $search_rows['uis']; ?>">
                                                 <input type="hidden" class="form-control" name="idd" value="<?php echo $search_rows['uis']; ?>">
                                              </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                                    <label> Item Barcode </label>
                                     <div class="form-group">
                                           <div class="form-line">
                                                 <input type="text" disabled="disabled" class="form-control" value="<?php echo $search_rows['item_barcode']; ?>">
                                                 <input type="hidden" class="form-control" id="item_barcode" name="item_barcode" value="<?php echo $search_rows['item_barcode']; ?>">
                                              </div>
                                        </div>
                                    </div>
                                <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                                    <label> Category </label>
                                     <div class="form-group">
                                           <div class="form-line">
                                                     <select class="form-control" id="cat" name="cat">
                                                           <option selected="selected" disabled="disabled">  SELECT CATEGORY </option>
                                                           <?php 
                                                             $cat_query = "Select * from tbl_categories";
                                                             $cat_result = mysqli_query($conn, $cat_query);
                                                             $array = array();
                                                             while($cat_rows = mysqli_fetch_array($cat_result)){
                                                                $array[] = $cat_rows;
                                                                
                                                             }
                                                             foreach($array as $frows){
                                                                    ?>
                                                                            <option value="<?php echo $frows['cat_1'] ?>" <?php echo ($frows['cat_1'] == $search_rows['cat']) ? 'selected="selected"' : ''; ?> ><?php echo $frows['cat_1']; ?></option>
                                                                        <?php
                                                                       
                                                                        ?>
                                                                    <?php
                                                              
                                                             }
                                                           ?>
                                                           
                                                        </select>
                                              </div>
                                        </div>
                                    </div>
                                     <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
                                    <label> Sub Category </label>
                                     <div class="form-group">
                                           <div class="form-line">
                                                     <select class="form-control" id="sub_cat" name="sub_cat">
                                                         <option selected="selected" disabled="disabled">  SELECT SUB </option>
                                                         <option value="PCS" <?php echo ($search_rows['sub_cat'] == "PCS") ? 'selected="selected"' : ''; ?>> PCS </option>
                                                         <option value="PRS" <?php echo ($search_rows['sub_cat'] == "PRS") ? 'selected="selected"' : ''; ?>> PRS </option>
                                                         <option value="SET" <?php echo ($search_rows['sub_cat'] == "SET") ? 'selected="selected"' : ''; ?>> SET </option>
                                                        </select>
                                              </div>
                                        </div>
                                    </div>
                                      <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                                    <label> Item Name </label>
                                     <div class="form-group">
                                           <div class="form-line">
                                                    <input type="text" class="form-control" id="item_name" name="item_name" value="<?php echo $search_rows['item_name']; ?>">
                                              </div>
                                        </div>
                                    </div>
                                        <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
                                    <label> Price </label>
                                     <div class="form-group">
                                           <div class="form-line">
                                                    <input  type="text" class="form-control" name="item_price" value="<?php echo $search_rows['item_price']; ?>">
                                              </div>
                                        </div>
                                    </div>
                                     <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12">
                                    <label> Description </label>
                                     <div class="form-group">
                                           <div class="form-line">
                                                    <input type="text" class="form-control" id="description" name="description" value="<?php echo $search_rows['item_description']; ?>">
                                              </div>
                                        </div>
                                    </div>
                               </div> <!-- End of Row Division -->     
                             </div>
                       
                            </div>
                            
                </div>
     
     <!-- Third Form -->
         <!-- #END# of Third form -->
                        </div>
                            <!-- Second Form -->
   <div class="row clearfix">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                 Item Status
                            
                                <small> <i> </i> </small>
                            </h2>
                         
                        </div>
                        
                         <div class="body">
                            <h2 class="card-inside-title"></h2>
                            <div class="row clearfix">
                           <div class="col-md-12 col-sm-12 col-xs-12">
                                      <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                             <label> Current Status : </label> 
                                            
                                             <label <?php echo ($search_rows['item_status'] == "ACTIVE") ? 'style="color:#009933;"' : 'style="color:#cc0000;"' ?>> <small> <?php echo $search_rows['item_status']; ?> </small> </label>
                                      </div>    
                                    <div class="col-md-offset-4 col-lg-offset-4">
                                       <input type="submit" <?php echo ($search_rows['item_status'] == "ACTIVE") ? 'name="deactivate" class="btn btn-danger" value="DEACTIVE"' : 'name="activate" class="btn btn-primary" value="ACTIVE"' ?>>  
                                      </div>
                               </div> <!-- End of Row Division -->     
                             </div>
                       
                            </div>
                            
                </div>
       
     <!-- #END# of second form -->

                    

                    </div>
                </div>
            </div>
         
         <a href="edit_items_table.php" class="btn btn-warning" style="height:30px;padding-top:0px;margin-top:-10px;"><i class="material-icons" style="margin-top:2px;"> arrow_back </i> Back </a>
         <button type="submit" name="btn_update" class="btn btn-primary" style="height:30px;padding-top:0px;margin-top:-10px;"><i class="material-icons" style="margin-top:2px;">update</i>  Update </button>
        <a href="edit_history_page.php?icode=<?php echo stripslashes($_GET['icode']); ?>" class="btn btn-info" style="height:30px;width:120px;padding-top:0px;margin-top:-10px;"><i class="material-icons"> history </i> Edit History </a>
     </div>
    </section>
    </form>
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