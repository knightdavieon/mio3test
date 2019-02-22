<?php require_once("Connection.php"); ?>
<?php 
 date_default_timezone_set('Asia/Manila');
$day = date('d');
$month = date('m');
$year = date('Y');
$fullDate = $month . "/" . $day . "/" . $year;
  
?>
<?php 
    if(isset($_GET['barcode'])){
         $trans_query = "Select * from tbl_goods_receive where item_barcode = '" . mysqli_real_escape_string($conn, $_GET['barcode']) . "'";
         $trans_result = mysqli_query($conn, $trans_query)or die("Error : " . mysqli_error($conn));
         $trans_rows = mysqli_fetch_array($trans_result);
         $trans_count = mysqli_num_rows($trans_result);
         if($trans_count > 0){
            
        
         echo '<div class="col-md-2 col-lg-2 col-xs-10 col-sm-10">
                                          <label> Description </label>
                                              <div class="form-group">  
                                                 <div class="form-line">
                                                       <input type="text" class="form-control" disabled="disabled" id="item_name" value="'. $trans_rows['item_name'] .'">
                                                  </div>
                                               </div>
                                          </div>';
        echo ' <div class="col-md-2 col-lg-2 col-xs-10 col-sm-10">
                                          <label> Category </label>
                                              <div class="form-group">  
                                                 <div class="form-line">
                                                       <input type="text" class="form-control" disabled="disabled" id="cat" value="' . $trans_rows['cat'] . '">
                                                  </div>
                                               </div>
                                          </div>';
        echo '    <div class="col-md-2 col-lg-2 col-xs-10 col-sm-10">
                                          <label> Sub Category </label>
                                              <div class="form-group">  
                                                 <div class="form-line">
                                                       <input type="text" class="form-control" disabled="disabled" id="sub_category" value="' . $trans_rows['sub_category'] . '">
                                                  </div>
                                               </div>
                                          </div>';
        echo '<div class="col-md-2 col-lg-2 col-xs-10 col-sm-10">
                                          <label> Quantity </label>
                                              <div class="form-group">  
                                                 <div class="form-line">
                                                       <input type="text" class="form-control" id="item_quantity">
                                                  </div>
                                               </div>
                                          </div>';
        echo '   <div class="col-md-2 col-lg-2 col-xs-10 col-sm-10">
                                          <label> Price </label>
                                              <div class="form-group">  
                                                 <div class="form-line">
                                                       <input type="text" class="form-control" disabled="disabled" id="price" value="'. $trans_rows['item_price'] .'">
                                                  </div>
                                               </div>
                                          </div>';
     /**   echo ' <div class="col-md-4 col-lg-4 col-xs-10 col-sm-10">
                                          <label> Remarks </label>
                                              <div class="form-group">  
                                                 <div class="form-line">
                                                       <input type="text" class="form-control"  id="remarks">
                                                  </div>
                                               </div>
                                          </div>'; */
        echo '  <div class="col-md-2 col-lg-2 col-xs-10 col-sm-10">
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
                                          </div>';
        echo ' <div class="col-md-2 col-lg-2 col-xs-10 col-sm-10">
                                          <label> Date </label>
                                              <div class="form-group">  
                                                 <div class="form-line">
                                                       <input type="text" class="form-control" id="date_received" value="' . $fullDate . '" disabled="disabled">
                                                  </div>
                                               </div>
                                          </div>';
         }else{
              echo 'Item not found';
         }                                
}
?>