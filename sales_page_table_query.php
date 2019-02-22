<?php session_start(); require_once("Connection.php"); ?>
 <table id="c_items" class="table table-striped table-bordered">
    <thead>
           <tr>
                  <th> <input type="checkbox" id="main_check"><label for="main_check"> </label></th>
                  <th> Transaction Number </th>
                  <th> Item Barcode </th>
                  <th> Description </th>
                  <th> Quantity </th>
                  <th> Price </th>
                  <th> Total </th>
              </tr>
       </thead>
<tbody>
<?php
 
        $query = "Select * from tbl_sales_temp where staff_code = '" .  $_SESSION['b_staff_code'] . "'";
        $result = mysqli_query($conn, $query);
        while($rows = mysqli_fetch_array($result)){
        ?>
           <tr>
               <td>  <input type="checkbox" class="checkbox" id="<?php echo $rows['_id'] ?>" name="id"><label for="<?php echo $rows['_id'] ?>"> </label></td>
                 <td> <?php echo $rows['transaction_number']; ?> </td>
                 <td> 
             <!-- Hidden Fields -->  
                                                            <input type="hidden" name="transaction_n" value="<?php echo $rows['transaction_number']; ?>">
                                                            <input type="hidden" name="trans_number[]" value="<?php echo $rows['transaction_number']; ?>">
                                                            <input type="hidden" name="invoice_number[]" value="<?php echo $rows['invoice_number']; ?>">
                                                            <input type="hidden" name="item_barcode[]" value="<?php echo $rows['item_barcode']; ?>">
                                                            <input type="hidden" name="item_name[]" value="<?php echo $rows['item_name']; ?>">
                                                            <input type="hidden" name="item_quantity[]" value="<?php echo $rows['item_quantity']; ?>">
                                                            <input type="hidden" name="price[]" value="<?php echo $rows['price']; ?>">
                                                            <input type="hidden" name="total[]" value="<?php echo $rows['total']; ?>">
                                                            <!-- END -->
                 <?php echo $rows['item_barcode']; ?> </td>
                 <td> <?php echo $rows['item_name']; ?> </td>
                 <td> <?php echo $rows['item_quantity']; ?> </td>
                 <td> <?php echo $rows['price']; ?> </td>
                 <td> <?php echo $rows['total']; ?> </td>
             </tr>
        <?php
        }
     
?>
</tbody>


</table>         
 <script>
        $(document).ready(function(){
            $('#r_items').DataTable({
                responsive:true
            });
              $('#c_items').DataTable({
                responsive:true
            });
        });
            
          </script>     