<?php session_start(); require_once("Connection.php"); ?>
<?php 
     if(isset($_GET['icode'])){
            $search_query = "Select * from tbl_branch_goods_receive where item_barcode = '" . stripslashes($_GET['icode']) . "' and branch_name = '" . $_SESSION['b_code'] . "'";
            $search_result = mysqli_query($conn, $search_query);
            $search_rows = mysqli_fetch_array($search_result);
            $search_count = mysqli_num_rows($search_result);
             if($search_count > 0){
             ?>  
                                  <div class="col-md-6 col-lg-6 col-sm-5 col-xs-5">
                                              <label> Description </label>
                                              <div class="form-group">
                                                      <div class="form-line">
                                                             <input type="text" class="form-control" value="<?php echo $search_rows['item_name']; ?>" id="item_name">
                                                         </div>
                                                 </div>
                                       </div>
                                         <div class="col-md-3 col-lg-3 col-sm-5 col-xs-5">
                                              <label> Price </label>
                                              <div class="form-group">
                                                      <div class="form-line">
                                                             <input type="text" class="form-control" disabled="disabled" value="<?php echo $search_rows['item_price']; ?>" id="item_price">
                                                         </div>
                                                 </div>
                                       </div>

<?php
             }else{
                       echo "NE";  
             }
     }
?>