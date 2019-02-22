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
    <title> Inventory Adjustment</title>
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
         <?php include("navigation_bar.php"); ?>
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2018 <a href="javascript:void(0);">Silverworks.com</a>.
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
            <?php 
                  if(isset($_POST['btn_update'])){
                           $uid = mysqli_real_escape_string($conn, $_POST['idd']);
                           $item_barcode = mysqli_real_escape_string($conn, $_POST['item_barcode']);
                           $cat = mysqli_real_escape_string($conn, $_POST['cat']);
                           $sub_cat = mysqli_real_escape_string($conn, $_POST['sub_cat']);
                           $item_name = mysqli_real_escape_string($conn, $_POST['item_name']);
                           $cat = mysqli_real_escape_string($conn, $_POST['cat']); 
                           $item_price = mysqli_real_escape_string($conn, $_POST['item_price']);
                           $item_quant = mysqli_real_escape_string($conn, $_POST['item_quant']);
                           $curr_quant = mysqli_real_escape_string($conn, $_POST['curr_quant']);
                           
                           if(mysqli_query($conn, "Update tbl_goods_receive set item_quantity = '" . $item_quant . "' where unique_id = '" . $uid . "'") === true){
                                echo '<script type="text/javascript"> alert("Successfully Updated"); window.location="inventory_adjustment_page.php?icode='. stripslashes(trim($_GET['icode'])) .'"; </script>';
                                mysqli_query($conn, "Insert into tbl_goods_edit_history(_idd, item_barcode, cat, sub_cat, description, quant, prev_quant, price, eic, ecode, edit_date)values('" .
                                $uid . "','" . $item_barcode . "','" . $cat . "','" . $sub_cat . "','" . $item_name . "','" . $item_quant . "','" . $curr_quant . "','" . $item_price . "','" . $_SESSION['fullname'] . "','" . $_SESSION['b_staff_code'] . "','" . $fullDate . "')")or die('<script type="text/javascript"> alert("'.mysqli_error($conn).'"); </script>');
                           }

                  }
            ?>
           <form method="post" action="inventory_adjustment_page.php?icode=<?php echo stripslashes($_GET['icode']); ?>" enctype="multipart/form-data">
            <div class="row clearfix">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                   <i class="material-icons"> adjust </i> Inventory Adjustment
                            
                                <small> <i> " Note that only quantity can be able to modified in this page " </i> </small>
                            </h2>
                         
                        </div>
                    
                         <div class="body">
                            <h2 class="card-inside-title"></h2>
                            <div class="row clearfix">
                           <div class="col-md-12 col-sm-12 col-xs-12">
                                <?php 
                               
                                $search_query = "Select * from tbl_goods_receive where item_barcode = '" . stripslashes($_GET['icode']) . "'";
                                $search_result = mysqli_query($conn, $search_query);
                                $search_rows = mysqli_fetch_array($search_result);
                                ?>
                                   <div class="col-lg-offset-9 col-md-offset-9 col-sm-offset-9 col-xs-offset-9">
                                          
                                     </div>
                                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
                                       <label> Date Received : </label> <label> <small><i> " <?php echo $search_rows['date_received']; ?> " </i> </small></label>
                                    </div>
                                    <div class="col-md-4 col-lg-4 col-sm-10 col-xs-10">
                                    <label> Item ID </label>
                                     <div class="form-group">
                                           <div class="form-line">
                                                 <input type="text" disabled="disabled" class="form-control" value="<?php echo $search_rows['unique_id']; ?>">
                                                 <input type="hidden" class="form-control" name="idd" value="<?php echo $search_rows['unique_id']; ?>">
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
                                                         <option value="PCS" <?php echo ($search_rows['sub_category'] == "PCS") ? 'selected="selected"' : ''; ?>> PCS </option>
                                                         <option value="PRS" <?php echo ($search_rows['sub_category'] == "PRS") ? 'selected="selected"' : ''; ?>> PRS </option>
                                                         <option value="SET" <?php echo ($search_rows['sub_category'] == "SET") ? 'selected="selected"' : ''; ?>> SET </option>
                                                        </select>
                                              </div>
                                        </div>
                                    </div>
                                      <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                                    <label> Description </label>
                                     <div class="form-group">
                                           <div class="form-line">
                                                    <input type="text" class="form-control" id="item_name" name="item_name" value="<?php echo $search_rows['item_name']; ?>">
                                              </div>
                                        </div>
                                    </div>
                                   <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
                                    <label> Quantity </label>
                                     <div class="form-group">
                                           <div class="form-line">
                                                    <input  type="text" class="form-control" name="item_quant" value="<?php echo $search_rows['item_quantity']; ?>">
                                                    <input type="hidden" name="curr_quant" value="<?php echo $search_rows['item_quantity']; ?>">
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
         
         <a href="inventory_adjustment_table.php" class="btn btn-warning" style="height:30px;padding-top:0px;margin-top:-10px;"><i class="material-icons" style="margin-top:2px;"> arrow_back </i> Back </a>
         <button type="submit" name="btn_update" class="btn btn-primary" style="height:30px;padding-top:0px;margin-top:-10px;"><i class="material-icons" style="margin-top:2px;">update</i>  Update </button>
        <a href="inventory_adjustment_history.php?icode=<?php echo stripslashes($_GET['icode']); ?>" class="btn btn-info" style="height:30px;width:120px;padding-top:0px;margin-top:-10px;"><i class="material-icons"> history </i> Edit History </a>
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