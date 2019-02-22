<?php require_once("Connection.php"); ?>
<?php 
date_default_timezone_set("Asia/Manila");
$day = date('d');
$month = date('m');
$year = date('Y');
$fulldate = $month . "/" . $day . "/" . $year; 
     if(isset($_REQUEST['item_barcode'])){
          $item_barcode = mysqli_real_escape_string($conn, $_REQUEST['item_barcode']);
          $branch_name  = mysqli_real_escape_string($conn, $_REQUEST['branch_name']);
          $branch_query = "Select * from tbl_branch_goods_receive where item_barcode = '" . $item_barcode . "' and branch_name = '" . $branch_name . "'";
          $branch_result = mysqli_query($conn, $branch_query)or die("Error : " . mysqli_error($conn));
          $branch_count = mysqli_num_rows($branch_result);
          if($branch_count > 0){
                $branch_search_query = "Select * from tbl_branch_goods_receive where item_barcode = '" . $item_barcode . "' and branch_name = '" . $branch_name . "'";
                $branch_search_result = mysqli_query($conn, $branch_query)or die("Error : " . mysqli_error($conn));
                $branch_search_rows = mysqli_fetch_array($branch_search_result);
                echo '
                    <div class="col-md-2 col-lg-2 col-xs-10 col-sm-10">
                                          <label> Description </label>
                                              <div class="form-group">  
                                                 <div class="form-line">
                                                       <input type="text" class="form-control" value="'. $branch_search_rows['item_name'] .'" disabled="disabled" id="item_name">
                                                  </div>
                                               </div>
                                         </div>
                    <div class="col-md-2 col-lg-2 col-xs-10 col-sm-10">
                                          <label> Category </label>
                                              <div class="form-group">  
                                                 <div class="form-line">
                                                       <input type="text" class="form-control" value="'. $branch_search_rows['cat'] .'" disabled="disabled" id="category">
                                                  </div>
                                               </div>
                                          </div>
                          <div class="col-md-2 col-lg-2 col-xs-10 col-sm-10">
                                          <label> Sub Category </label>
                                              <div class="form-group">  
                                                 <div class="form-line">
                                                       <input type="text" class="form-control" value="'. $branch_search_rows['sub_category'] .'" disabled="disabled" id="sub_category">
                                                  </div>
                                               </div>
                                          </div>
                        <div class="col-md-2 col-lg-2 col-xs-10 col-sm-10">
                                          <label> Quantity </label>
                                              <div class="form-group">  
                                                 <div class="form-line">
                                                       <input type="text" class="form-control" id="quantity"> <input type="hidden" id="rem_quant" value="'.$branch_search_rows['item_quantity'].'">
                                                  </div>
                                               </div>
                                          </div>
                           <div class="col-md-2 col-lg-2 col-xs-10 col-sm-10">
                                          <label> Price </label>
                                              <div class="form-group">  
                                                 <div class="form-line">
                                                       <input type="text" class="form-control" value="'. $branch_search_rows['item_price'] .'" disabled="disabled" id="price">
                                                  </div>
                                               </div>
                                          </div>
                             <div class="col-md-4 col-lg-4 col-xs-10 col-sm-10">
                                          <label> Remarks </label>
                                              <div class="form-group">  
                                                 <div class="form-line">
                                                       <input type="text" class="form-control" id="remarks">
                                                  </div>
                                               </div>
                                          </div>
                           
                                <div class="col-md-2 col-lg-2 col-xs-10 col-sm-10">
                                          <label> Date </label>
                                              <div class="form-group">  
                                                 <div class="form-line">
                                                       <input type="text" class="form-control" value="'. $fulldate .'" disabled="disabled">
                                                  </div>
                                               </div>
                                          </div>
                    
                ';
          }else{
              echo "Not Found";
          }
     }
?>