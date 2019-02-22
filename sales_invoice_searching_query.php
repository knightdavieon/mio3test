<?php session_start(); require_once("Connection.php"); ?>
<?php 
   if(isset($_GET['icode']) && isset($_GET['branch'])){
           $query = mysqli_query($conn, "Select * from tbl_sales_series where invoice_number = '" . stripslashes(trim($_GET['icode'])) . "' and branch = '" . stripslashes(trim($_GET['branch'])) . "'");
           $rows = mysqli_fetch_array($query);
           $count = mysqli_num_rows($query);
           if($count > 0){
          
           ?>
          
           <div class="col-md-4 col-lg-4 col-sm-10 col-xs-10">
                                    <input type="hidden" id="bbranch_code" value="<?php echo $_SESSION['b_code']; ?>">
                                              <label> Transaction Number </label>
                                              <div class="form-group">
                                                      <div class="form-line">
                                                        
                                                             <input type="text" disabled="disabled" class="form-control" value="<?php echo $rows['transaction_number']; ?>">
                                                             <input type="hidden" id="trans_number" name="transaction_number" value="<?php echo $rows['transaction_number']; ?>">
                                                         </div>
                                                 </div>
                                       </div>
        <?php
        }else{
         ?>
                             <div class="col-md-4 col-lg-4 col-sm-10 col-xs-10">
                                    <input type="hidden" id="bbranch_code" value="<?php echo $_SESSION['b_code']; ?>">
                                              <label> Transaction Number </label>
                                              <div class="form-group">
                                                      <div class="form-line">
                                                          <?php 
                                                            $sales_num_query = "Select * from tbl_sales_number";
                                                            $sales_num_result = mysqli_query($conn, $sales_num_query);
                                                            $sales_num_rows = mysqli_fetch_array($sales_num_result);
                                                          ?>
                                                             <input type="text" disabled="disabled" class="form-control" value="<?php echo $sales_num_rows['idd'] + 1; ?>">
                                                             <input type="hidden" id="trans_number" name="transaction_number" value="<?php echo $sales_num_rows['idd'] + 1; ?>">
                                                         </div>
                                                 </div>
                                       </div>
        <?php
        }
   }
?> 