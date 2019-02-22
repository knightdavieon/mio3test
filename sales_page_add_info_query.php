<?php require_once("Connection.php"); ?>
<?php 
     if(isset($_GET['enum'])){
           $query = mysqli_query($conn, "Select * from tbl_sales where _id = '" . stripslashes(trim($_GET['enum'])) . "'");
           $frows = mysqli_fetch_array($query);
          ?>
          <!-- Hidden Fields -->
                           <input type="hidden" value="<?php echo $frows['invoice_number']; ?>" name="inv_num">
                           <input type="hidden" value="<?php echo $frows['item_barcode']; ?>" name="s_code">
                           <input type="hidden" value="<?php echo $frows['quant']; ?>" name="s_quant">
                           <input type="hidden" value="<?php echo $frows['total']; ?>" name="s_total" id="total_crr_deduc">
                           <input type="hidden" value="<?php echo $frows['branch']; ?>" name="b_code">
                           <input type="hidden" value="<?php echo $frows['price']; ?>" id="price_value">
                           <input type="hidden" value="<?php echo $frows['total']; ?>" id="total_prc_deduc" name="deduc_prc_quant">
                           <input type="hidden" value="<?php echo $frows['date_transaction']; ?>" name="s_d_trans">
                        <!-- END -->    
        <?php 
     }
?>