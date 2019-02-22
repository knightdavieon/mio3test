<?php require_once("Connection.php");
date_default_timezone_set('Asia/Manila');
$day = date('d');
$month = date('m');
$year = date('Y');
$fullDate = $month . "/" . $day . "/" . $year; ?>
<?php 
     if(isset($_GET['icode'])){
           $query = "Select * from tbl_swho_items where item_barcode = '" . stripslashes(trim($_GET['icode'])) . "'";
           $result = mysqli_query($conn, $query)or die("Error : " . mysqli_error($conn));
           $rows = mysqli_fetch_array($result);
          ?>
      
                                             <div class="col-md-3 col-lg-3 col-xs-10 col-sm-10">
                                          <label> Description </label>
                                              <div class="form-group">  
                                                 <div class="form-line">
                                                       <input type="text" class="form-control" value="<?php echo $rows['item_name']; ?>" id="item_name" disabled="disabled">
                                                  </div>
                                               </div>
                                          </div>
                                              <div class="col-md-2 col-lg-2 col-xs-10 col-sm-10">
                                          <label> Category </label>
                                              <div class="form-group">  
                                                 <div class="form-line">
                                                       <input type="text" class="form-control" value="<?php echo $rows['cat']; ?>"  id="cat" disabled="disabled">
                                                  </div>
                                               </div>
                                          </div>
                                              <div class="col-md-2 col-lg-2 col-xs-10 col-sm-10">
                                          <label> Sub Category </label>
                                              <div class="form-group">  
                                                 <div class="form-line">
                                                       <input type="text" class="form-control" id="sub_category" value="<?php echo $rows['sub_cat']; ?>"  disabled="disabled">
                                                  </div>
                                               </div>
                                          </div>
                                        <div class="col-md-2 col-lg-2 col-xs-10 col-sm-10">
                                          <label> Quantity </label>
                                              <div class="form-group">  
                                                 <div class="form-line">
                                                       <input type="text" class="form-control" id="item_quant">
                                                  </div>
                                               </div>
                                          </div>
                                               <div class="col-md-2 col-lg-2 col-xs-10 col-sm-10">
                                          <label> Price </label>
                                              <div class="form-group">  
                                                 <div class="form-line">
                                                       <input type="text" class="form-control" id="item_price" disabled="disabled" value="<?php echo $rows['item_price']; ?>" >
                                                  </div>
                                               </div>
                                          </div>
                                               <div class="col-md-6 col-lg-6 col-xs-10 col-sm-10">
                                          <label> Additional Description </label>
                                              <div class="form-group">  
                                                 <div class="form-line">
                                                       <input type="text" class="form-control" id="item_description" disabled="disabled" value="<?php echo $rows['item_description']; ?>" >
                                                  </div>
                                               </div>
                                          </div>
                                      <div class="col-md-2 col-lg-2 col-xs-10 col-sm-10">
                                          <label> Date </label>
                                              <div class="form-group">  
                                                 <div class="form-line">
                                                       <input type="text" class="form-control" value="<?php echo $fullDate; ?>" id="reg_date" disabled="disabled" value="<?php echo $fullDate; ?>" >
                                                  </div>
                                               </div>
                                          </div>
                                     
    
<?php
     } 
?>