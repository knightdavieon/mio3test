<?php require_once('Connection.php'); ?>
<?php 
date_default_timezone_set('Asia/Manila');
$day = date('d');
$month = date('m');
$year = date('Y');
$fullDate = $month . "/" . $day . "/" . $year;
    
  
    if(isset($_POST['btn_download'])){
            ob_end_clean();
            $output = fopen('php://output', 'w');
            header('Content-Type: text/csv; charset=utf-8');
            header('Content-Disposition: attachment; filename=format.csv'); 
            fputcsv($output, array("Item Barcode", "Description", "Category", "Sub Category ", "Price", "Additional Description"));
            exit();
    }
    if(isset($_POST['btn_import'])){
         $fname = $_FILES['csv_file']['tmp_name'];
         $bool_message = false;
         $import_message = false;
         if(!file_exists($_FILES['csv_file']['tmp_name'])){
             echo '<script type="text/javascript"> alert("No File Found") </script>';
         }else{
        
         $fhandler = fopen($fname, "r");
         fgetcsv($fhandler);
         while(($frows = fgetcsv($fhandler, 1000, ",")) !== false){
             $frows = array_map('utf8_encode', $frows);
             $duplicate_query = "Select * from tbl_swho_items_temp where item_barcode = '" . $frows[0] . "'";
             $duplicate_result = mysqli_query($conn, $duplicate_query);
             $duplicate_count = mysqli_num_rows($duplicate_result);
             if($duplicate_count > 0){
                 $bool_message = true;          
             }else{
                $import_query = "Insert into tbl_swho_items_temp(item_barcode, item_name, cat, sub_category, item_price, Description, item_status, date_created)values('" . trim($frows[0]) . "','" . trim($frows[1])
            . "','" . trim($frows[2]) . "','" . trim($frows[3]) . "','" . trim($frows[4]) . "','" . trim($frows[5]) . "','" . "ACTIVE" . "','" . $fullDate . "')";
            $import_result = mysqli_query($conn, $import_query)or die("Error : " . mysqli_error($conn));
                 if($import_result === true){
                      $import_message = true;
                 }
             }
             
         }
           if($import_message){
                echo '<script type="text/javascript"> alert("Successfully Added"); window.location="Create_item_page.php"; </script>';
           }
           if($bool_message ){
                echo '<script type="text/javascript"> alert("Duplicate data found"); window.location="Create_item_page.php"; </script>';
           }
        }
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title> Create Item</title>
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

     <!-- Font Awesome CDN -->
     <link rel="stylesheet" href=" https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
      <!-- End of Font Awesome -->

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
      <!-- DataTable Buttons -->
       <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"> </script>
       <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"> </script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"> </script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"> </script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"> </script>
       <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"> </script>
       <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"> </script>
      <!-- End  of DataTables -->   
       
</head>

<body class="theme-black">
          <?php include('top_header.php'); ?>
            <!-- #Menu -->
            <?php include('navigation_bar.php'); ?>
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
        <!-- Right Sidebar Skins -->
               <?php include('Skins.php') ?>
        <!-- #END# of Right Sidebar Skins -->
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
                                <i class="material-icons"> create </i> Create New Item
                                <small> <i> " Registration of item information " </i> </small>
                            </h2>
                           
                        </div>
                        
                         <div class="body">
                            <h2 class="card-inside-title"></h2>
                            <div class="row clearfix">
                           <div class="col-md-12 col-sm-10 col-xs-10">
                              
                                     <!-- <div id="action_response" style="height:20px;" class="col-md-5 col-lg-5 col-xs-5 col-sm-5"> </div> -->
                               <div id="checking_response"> </div>
                              <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12"> </div>
                           <div class="row">
                            
                             <div class="col-md-2 col-sm-10 col-xs-10">
                                      <div class="form-group">
                                          <div class="form-line">
                                                <label> Barcode </label>
                                                <input type="text" class="form-control" id="item_barcode" onchange="item_checking_function();">
                                                
                                            </div> 
                                       </div>
                                </div>
                                <!-- Checking Query -->
                                    <script>
                                         function item_checking_function(){
                                           var xmlhttp = new XMLHttpRequest();
                                           xmlhttp.open("GET", "Create_item_checking_query.php?check_barcode="+document.getElementById("item_barcode").value, false);
                                           xmlhttp.send(null);
                                           document.getElementById("checking_response").innerHTML = xmlhttp.responseText;  
                                         }
                                          
                                       </script>
                                 <!-- #END# of Checking Query -->
                            
                              <div class="col-md-3 col-sm-10 col-xs-10">
                                     <div class="form-group">
                                           <div class="form-line">
                                                <label> Description </label>
                                                <input type="text" class="form-control" id="item_name">
                                                
                                           </div>
                                     </div>
                               </div>
                               <div class="col-md-3 col-sm-10 col-xs-10" id="category_div">
                                       <label> Category </label>
                                      <div class="form-group">
                                             <div class="form-line">
                                               
                                                <select class="form-control" id="category">
                                                      <option disabled="disabled" selected="selected"> ---- Select Category ---- </option>
                                                      <?php 
                                                        $category_query = "Select * from tbl_categories";
                                                        $category_result = mysqli_query($conn, $category_query);
                                                        while($category_rows = mysqli_fetch_array($category_result)){
                                                            ?>
                                                               <option><?php echo $category_rows['cat_1']; ?></option>
                                                        <?php
                                                        }
                                                      ?>
                                            
                                                   </select>
                                              </div>
                                       </div>
                                 </div>
                                 <div class="col-md-1 col-lg-1 col-sm-1 col-xs-1"> <button type="button" data-toggle="modal" data-target="#add_category" class="btn btn-default" style="margin-top:30px;"> + </button> </div>
                               <div class="col-md-3 col-sm-10 col-xs-10">
                                       <label> Sub Category </label>
                                      <div class="form-group">
                                             <div class="form-line">
                                               
                                                <select class="form-control" id="sub_category">
                                                       <option disabled="disabled" selected="selected"> ---- Select Category ---- </option>
                                                       <option value="PCS"> PCS </option>
                                                       <option value="PRS"> PRS </option>
                                                       <option value="SET"> SET </option>

                                                   </select>
                                              </div>
                                       </div>
                                 </div>
                                
                              <div class="col-md-4 col-sm-10 col-xs-10">
                                     <div class="form-group">
                                           <div class="form-line">
                                                <label> Item Price </label>
                                                <input type="text" class="form-control" id="item_price">
                                           </div>
                                     </div>
                               </div>
                               <div class="col-md-8 col-sm-10 col-xs-10">
                                  <div class="form-group">
                                      <div class="form-line">
                                          <label> Additional Description </label>
                                          <input type="text" class="form-control" id="description" maxlength="100">
                                          <input type="hidden" value="<?php echo $fullDate; ?>" id="fullDate">
                                       </div>
                                   </div>
                                </div>
                            
                              
                                
     
                           </div> <!-- End of Row Division -->     
                          
                             </div>
                            
                       <script>
                                  
                          </script>
                            </div>
                          
                          <button type="button" class="btn btn-primary" id="btn_add" style="height:30px;padding-top:0;"><i class="material-icons">library_add</i> Add Item  </button>
                              
                        </div>
                </div>




                    <div class="col-md-10 col-sm-10 col-xs-10">
                               
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#get_csv" style="margin-left:5px;height:30px;padding-top:0;"><i class="material-icons">attach_file</i> Get From .CSV </button>
                                <button type="button" class="btn btn-warning" id="btn_clear" style="height:30px;padding-top:0;"><i class="material-icons">delete</i> Clear List </a>
                              </div>
                           </div>  

                           <!-- Create Item Multiple Section -->
                                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:10px;">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <i class="material-icons"> list </i> List of Added Items 
                            </h2>
                          
                        </div>
                        <?php 
                            if(isset($_POST['btn_commit'])){
         
     /*    $commit_query = "Insert into tbl_swho_items(item_barcode, item_name, cat, sub_cat, item_price, item_description, item_status, date_created)Select item_barcode, item_name, cat, sub_category, item_price, Description, item_status, date_created from tbl_swho_items_temp";
         $commit_result = mysqli_query($conn, $commit_query)or die("Error : " . mysqli_error($conn));
         if($commit_result === true){
              echo '<script type="text/javascript"> alert("Items Successfully Committed"); window.location="Create_item_page.php"; </script>';
              $remove_list_query = "Delete from tbl_swho_items_temp";
              $remove_list_query = mysqli_query($conn, $remove_list_query)or die("Error : " . mysqli_error($conn));
         } */
        $insert_message = false;
         foreach($_POST['item_barcode'] as $key =>$value){
             $item_barcode = mysqli_real_escape_string($conn, $_POST['item_barcode'][$key]);
             $item_name = mysqli_real_escape_string($conn, $_POST['item_name'][$key]);
             $cat = mysqli_real_escape_string($conn, $_POST['cat'][$key]);
             $sub_category = mysqli_real_escape_string($conn, $_POST['sub_category'][$key]);
             $item_price = mysqli_real_escape_string($conn, $_POST['item_price'][$key]);
             $description = mysqli_real_escape_string($conn, $_POST['description'][$key]);
             $check_query = "Select * from tbl_swho_items where item_barcode IN  ('" . $item_barcode . "')";
             $check_result = mysqli_query($conn, $check_query);
             $check_count = mysqli_num_rows($check_result);
             if($check_count > 0){
                 $update_query = "Update tbl_swho_items set item_name = '" . $item_name . "', cat = '" . $cat . "', sub_cat = '" . $sub_category . "', item_price = '" . $item_price
                 . "', item_description = '" . $description . "', item_status = '" . "ACTIVE" . "', date_created = '" . $fullDate . "' where item_barcode = '" . $item_barcode . "'";
                 $update_result = mysqli_query($conn, $update_query);
                if($update_result === true){
                     $insert_message = true;
                     mysqli_query($conn, "Delete from tbl_swho_items_temp where item_barcode = '" . $item_barcode . "'");
                // Goods Receives Update Query
                 $goods_update_query = "Update tbl_goods_receive set item_name = '" . $item_name . "', cat = '" . $cat . "', sub_category ='" . $sub_category . "', item_price = '" . $item_price .
                 "' where item_barcode = '" . $item_barcode . "'";
                 $goods_update_result = mysqli_query($conn, $goods_update_query)or die('<script type="text/javascript"> alert("'.mysqli_error($conn).'"); </script>');
                 //End
                 }   
             }else{
             $insert_query = "Insert into tbl_swho_items(item_barcode, item_name, cat, sub_cat, item_price, item_description, item_status, date_created)values('"
             . $item_barcode . "','" . $item_name . "','" . $cat . "','" . $sub_category . "','" . $item_price . "','" . $description . "','" . "ACTIVE" . "','" .  $fullDate . "')";
             $insert_result = mysqli_query($conn, $insert_query)or die('<script type="text/javascript"> alert("'. mysqli_error($conn) .'") </script>');
             if($insert_result === true){
                $insert_message = true;
                mysqli_query($conn, "Delete from tbl_swho_items_temp where item_barcode = '" . $item_barcode . "'");
              // Goods Receives Query
                $goods_query = "Insert into tbl_goods_receive(item_barcode, item_name, cat, sub_category, item_quantity, item_price, person_received, item_status, date_received)values('"
                . $item_barcode . "','" . $item_name . "','" . $cat . "','" . $sub_category . "','" . "0" . "','" . $item_price . "','" . $_SESSION['fullname'] . "','" . "ACTIVE" . "','" . $fullDate . "')";
                $goods_result = mysqli_query($conn, $goods_query)or die('<script type="text/javascript"> alert("'.mysqli_error($conn).'"); </script>');
               // END
            }
           }
        }
      if($insert_message){
            
            echo '<script type="text/javascript"> alert("Successfully Added"); window.location="Create_item_page.php"; </script>';
      }
    }
                        ?>
           
                         <div class="body">
                            <h2 class="card-inside-title"></h2>
                            <div class="row clearfix">
                           <div class="col-md-12 col-sm-10 col-xs-10">
                    
                      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">        
                    
                           <div class="row">
                                <div class="col-md-11 col-lg-11 col-xs-11 col-sm-11">
                                       <style type="text/css">
                                                table.dataTable thead th{
                                                     background-color:gray;
                                                     color:#fff;
                                                     opacity:0.7;
                                                }
                                          </style>

                    
                                          <button type="button" class="btn btn-danger" id="btn_remove" style="height:30px;padding-top:0;"><i class="material-icons">delete</i> Delete Selected </button>
                                       <table id="r_items" class="table table-bordered table-striped">
                                            <thead>
                                                  <tr>
                                                        <th> <input type="checkbox" id="main_check"><label for="main_check"> </label> </th> 
                                                        <th> Item Barcode </th>
                                                        <th> Item Name </th>
                                                        <th> Category </th>
                                                        <th> Sub Category </th>
                                                        <th> Price </th>
                                                        <th> Description</th>
                                                     
                                                     </tr>
                                              </thead>
                                             <tbody>
                                                   <?php 
                                                       $list_query = "Select * from tbl_swho_items_temp limit 0, 150";
                                                       $list_result = mysqli_query($conn, $list_query);
                                                       while($list_rows = mysqli_fetch_array($list_result)){
                                                     ?>
                                                     <tr>
                                                        <td><input type="checkbox" class="checkbox" id="<?php echo $list_rows['_id']; ?>" name="id[]"><label for="<?php echo $list_rows['_id']; ?>"></label></td>
                                                        <td>
                                                        <input type="hidden" name="item_barcode[]" value="<?php echo $list_rows['item_barcode']; ?>">
                                                        <input type="hidden" name="item_name[]" value="<?php echo $list_rows['item_name']; ?>">
                                                        <input type="hidden" name="cat[]" value="<?php echo $list_rows['cat']; ?>">
                                                        <input type="hidden" name="sub_category[]" value="<?php echo $list_rows['sub_category']; ?>">
                                                        <input type="hidden" name="item_price[]" value="<?php echo $list_rows['item_price']; ?>">
                                                        <input type="hidden" name="description[]" value="<?php echo $list_rows['Description']; ?>">
                                                      
                                                        <?php echo $list_rows['item_barcode']; ?></td>
                                                        <td><?php echo $list_rows['item_name']; ?></td>
                                                        <td><?php echo $list_rows['cat']; ?></td>
                                                        <td><?php echo $list_rows['sub_category']; ?></td>
                                                        <td><?php echo $list_rows['item_price']; ?></td>
                                                        <td><?php echo $list_rows['Description']; ?></td>  
                                                       
                                                       </tr>
                                                    <?php
                                                       }
                                                   ?>
                                              </tbody>
                                              <script type="text/javascript">
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
                                                     $('#btn_remove').click(function(){
                                                          var arrayList = new Array();
                                                          var message = false;
                                                          if($('input:checkbox:checked').length > 0){
                                                                $('input:checkbox:checked').each(function(){
                                                                    arrayList.push($(this).attr('id'));
                                                                    $(this).closest("tr").remove();
                                                                     $.ajax({
                                                                           type     :    "POST",
                                                                           url      :    "create_item_delete.php",
                                                                           data     :    {'data':arrayList},
                                                                           success  :    function(result){
                                                                                    message = true;
                                                                           },
                                                                           error    :    function(errorResult){
                                                                                      alert(errorResult);
                                                                           }
                                                                     });
                                                                });
                                                                if(message == true){
                                                                    alert("Selected items successfully removed");
                                                                }
                                                          }else{
                                                                alert("No Item selected");
                                                          }
                                                     });
                                                </script>
                                         </table>
                                   </div>                 
                           </div> <!-- End of Row Division -->     
                          
                             </div>
                            
                            </div>
                    
                           <!-- #END#  of Multiple Section-->
                 <script>
                  
                    $('#btn_clear').click(function(){
                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.open("GET", "create_item_clear.php", false);
                        xmlhttp.send(null);
                        if(xmlhttp.responseText == "Working"){
                              alert("Table Successfully Cleared");
                              window.location = "Create_item_page.php";
                        }
                    });
                    $('#btn_add').click(function(){
                        var item_barcode = $('#item_barcode').val();
                        var item_name = $('#item_name').val();
                        var category = $('#category').val();
                        var sub_category = $('#sub_category').val();
                        var item_price = $('#item_price').val();
                        var description = $('#description').val();
                        $.ajax({
                            type:"POST",
                            url:"queries/swho_create_item_query.php",
                            data:{item_barcode:item_barcode, item_name:item_name, category:category, sub_category:sub_category, item_price:item_price, description:description},
                            success:function(result){
                                if(result == "Exists"){
                                     alert("Item Already Exists");
                                }else if(result == "Table Exists"){
                                     alert("Item already exist in your table");
                                }else{
                                      alert("Added");
                                      document.getElementById("r_items").innerHTML = result;
                                      $('#item_barcode').val("");
                                      $('#item_name').val("");
                                      $('#item_price').val("");
                                      $('#category').val("");
                                      $('#sub_category').val("");
                                      $('#description').val("");
                                      $('#r_items').DataTable({
                                          paging:false
                                      });
                                  }
                               }
                        });
                       
                    });
                  </script>


            </div>
         
     </div>


  <button type="submit" name="btn_commit" class="btn btn-primary"  style="margin-top:-10px;"><i class="material-icons">check_circle</i> Commit </button>
     <div style="margin-top:10px;"> </div>
    </section>

 <!-- MODAL BOX 1 -->


<div class="modal fade" id="get_csv" tabindex="-1" role="dialog" aria-labelledby="modifyModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modifyModalLabel"><i class="material-icons">attach_file</i> Attach CSV File </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
              <div class="container-fluid">

                  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"> <!-- Main Margin -->
                        <div class="row">
                              <div class="col-md-5 col-lg-5 col-xs-2 col-sm-2">
                                <input type="file" name="csv_file">          
                                </div>
                               <div class="col-md-3 col-lg-3 col-xs-2 col-sm-2">
                                     <button type="submit" class="btn btn-primary" name="btn_import"><i class="material-icons">attach_file</i> Import </button>         
                                </div>
                                <div class="col-md-2 col-lg-2 col-xs-2 col-sm-2">
                                     <button type="submit" class="btn btn-warning" style="margin-left:-25px;" name="btn_download"><i class="material-icons">insert_drive_file</i> Download File Format </button>         
                                </div>
                              <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12" style="margin-top:10px;">
                                <label> Reminders </label>
                                   <ul>
                                     <li> Only .CSV File can be uploaded </li>
                                     <li> Check the following Required Fields you should contain with it with content </li>
                                     <li> Duplicate items will automatically rejected by the system </li> 
                                     <li> Check the content of your CSV file before uploading </li>
                                      </ul>
                                </div>
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

   <!-- MODAL BOX 2 -->


<div class="modal fade" id="add_category" tabindex="-1" role="dialog" aria-labelledby="modifyModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modifyModalLabel"><i class="material-icons">dehaze</i>  Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
              <div class="container-fluid">

                  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"> <!-- Main Margin -->
                        <div class="row">
                                 <div class="col-md-12 col-lg-12 co-xs-12 col-sm-12">
                                       <label> Category Name </label>
                                        <input type="text" class="form-control" id="cat_name">
                                   </div>
                          </div>
                    </div> <!-- #END# Main Margin -->
                  
               </div>
      </div>
      <div class="modal-footer">    
           <button type="button" class="btn btn-primary" id="btn_cat_save"><i class="material-icons">done</i> Save </button>
      </div>
    </div>
  </div>
</div>
 </form>
   <!-- #END# OF MODAL BOX 2 -->

<script type="text/javascript">
 
         $('#btn_cat_save').click(function(){
            var cat_name = $('#cat_name').val();
            if(document.getElementById("cat_name").value == ""){
                  alert("Please add value first");
            }else{
                 $.ajax({
                  type:"POST",
                  url:"category_add_query.php",
                  data:{cat_name:cat_name},
                  success:function(result){
                       if(result == "Exists"){
                            alert("Category Already Exists");
                       }else{
                            alert("New Category has been added");
                            document.getElementById("category_div").innerHTML = result;
                            $('#cat_name').val("");
                       }
                  }
              });
            }
            
      });
            $('#r_items').DataTable({
                responsive:true,
                paging:false,
                "pageLength":150
            });
   </script>
                     
                             </div> <!-- End of Button DIV -->
           
 
    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

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