<?php session_start(); require_once("Connection.php"); ?>
<?php 
      $total_query = "Select Sum(total) as total_value from tbl_sales_temp where staff_code = '" . $_SESSION['b_staff_code'] . "'";
      $total_result = mysqli_query($conn, $total_query);
      $total_rows = mysqli_fetch_array($total_result);
?>
 <div class="col-md-3 col-lg-3 col-sm-5 col-xs-5">
                                         <div class="form-group">
                                            <div class="form-line">
                                                <label> Total </label>
                                                   <input type="text" class="form-control" name="txt_total" value="<?php echo $total_rows['total_value']; ?>" id="txt_total">
                                                  
                                               </div>
                                           </div>
                                      </div>
    