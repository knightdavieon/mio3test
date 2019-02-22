<?php require_once("Connection.php");
date_default_timezone_set('Asia/Manila');
$day = date('d');
$month = date('m');
$year = date('Y');
$fullDate = $month . "/" . $day . "/" . $year;
 ?>
<?php 
     if(isset($_GET['icode'])){
          $query = "Select * from tbl_goods_receive where item_barcode = '" . stripslashes($_GET['icode']) . "'";
          $result = mysqli_query($conn, $query)or die("Error : " . mysqli_error($conn));
          $rows = mysqli_fetch_array($result);
          ?>
           
                                      <div class="col-md-2 col-lg-2 col-xs-10 col-sm-10">
                                          <label> Description </label>
                                              <div class="form-group">  
                                                 <div class="form-line">
                                                       <input type="text" class="form-control" id="item_name" value="<?php echo $rows['item_name']; ?>" disabled="disabled">
                                                  </div>
                                               </div>
                                          </div>
                                         <div class="col-md-2 col-lg-2 col-xs-10 col-sm-10">
                                          <label> Category </label>
                                              <div class="form-group">  
                                                 <div class="form-line">
                                                       <input type="text" class="form-control" id="cat" value="<?php echo $rows['cat']; ?>" disabled="disabled">
                                                  </div>
                                               </div>
                                          </div>
                                              <div class="col-md-2 col-lg-2 col-xs-10 col-sm-10">
                                          <label> Sub Category </label>
                                              <div class="form-group">  
                                                 <div class="form-line">
                                                       <input type="text" class="form-control" id="sub_category" value="<?php echo $rows['sub_category']; ?>" disabled="disabled">
                                                  </div>
                                               </div>
                                          </div>
                                        <div class="col-md-2 col-lg-2 col-xs-10 col-sm-10">
                                          <label> Quantity </label>
                                              <div class="form-group">  
                                                 <div class="form-line">
                                                       <input type="text" class="form-control" id="item_quantity">
                                                  </div>
                                               </div>
                                          </div>
                                               <div class="col-md-2 col-lg-2 col-xs-10 col-sm-10">
                                          <label> Price </label>
                                              <div class="form-group">  
                                                 <div class="form-line">
                                                       <input type="text" class="form-control" id="price" value="<?php echo $rows['item_price'] ?>" disabled="disabled">
                                                  </div>
                                               </div>
                                          </div>
                                           <!--    <div class="col-md-4 col-lg-4 col-xs-10 col-sm-10">
                                          <label> Remarks </label>
                                              <div class="form-group">  
                                                 <div class="form-line">
                                                       <input type="text" class="form-control" id="remarks">
                                                  </div>
                                               </div>
                                          </div> -->
                                          <div class="col-md-2 col-lg-2 col-xs-10 col-sm-10">
                                          <label> TS Type </label>
                                              <div class="form-group">  
                                                 <div class="form-line">
                                                         <select class="form-control" id="ts_type">
                                                              <option disabled="disabled" selected="selected" value="no_selected">  SELECT TYPE </option>
                                                              <option> Auto DR </option>
                                                              <option> Branch Transfer </option>
                                                              <option> Change Code </option>
                                                              <option> Request </option>
                                                            </select>
                                                  </div>
                                               </div>
                                          </div>
                                      <div class="col-md-2 col-lg-2 col-xs-10 col-sm-10">
                                          <label> Date </label>
                                              <div class="form-group">  
                                                 <div class="form-line">
                                                       <input type="text" class="form-control" id="date_received" value="<?php echo $fullDate; ?>" disabled="disabled">
                                                  </div>
                                               </div>
                                          </div>
                                
        <?php
     }
?>