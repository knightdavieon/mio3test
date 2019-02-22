<?php require_once('Connection.php'); ?>
<?php 
   if(isset($_REQUEST['r_id'])){
       $item_uis = mysqli_real_escape_string($conn, $_REQUEST['item_uis']);
       $uis = mysqli_real_escape_string($conn, $_REQUEST['uis']);
       $r_id = mysqli_real_escape_string($conn, $_REQUEST['r_id']);
       $inventory_number = mysqli_real_escape_string($conn, $_REQUEST['inventory_number']);
       $employee_code = mysqli_real_escape_string($conn, $_REQUEST['employee_code']);
       $item_name = mysqli_real_escape_string($conn, $_REQUEST['item_name']);
       $item_stocks = mysqli_real_escape_string($conn, $_REQUEST['item_stocks']);
       $transfer_quantity = mysqli_real_escape_string($conn, $_REQUEST['transfer_quantity']);    
       $item_b_code = mysqli_real_escape_string($conn, $_REQUEST['item_b_code']);
       $item_price = mysqli_real_escape_string($conn, $_REQUEST['item_price']);
       $description = mysqli_real_escape_string($conn, $_REQUEST['description']);
       $return_date = mysqli_real_escape_string($conn, $_REQUEST['return_date']);
       $item_prev_holder = mysqli_real_escape_string($conn, $_REQUEST['item_prev_holder']);
       /** Return Table Query */
       $query = "Insert into tbl_returns(r_id, uis, inventory_code, employee_code, item_name, item_stocks, item_price, item_description, item_b_code,  return_date, item_prev_holder, transfer_status)values('"
       . $r_id . "','" . $uis . "','" .  $inventory_number . "','" . $employee_code . "','" . $item_name . "','" . $item_stocks  . "','" .  $item_price
       . "','" . $description . "','" . $item_b_code .  "','" . $return_date . "','". $item_prev_holder . "','" . "DONE" . "')";
       $result = mysqli_query($conn, $query)or die("Error : " . mysqli_error($conn));
       /** #END#  Return Table */
      
      
       if($result === true){
            echo "true";
       /** Items Table Query */
       $items_query = "Insert into tbl_items(uis, inventory_code, item_name, item_stocks, item_description, item_price, item_status, item_date, item_b_code)values('"
        . $item_uis . "','" . $inventory_number . "','" . $item_name . "','" . $transfer_quantity . "','" . $description . "','" . $item_price . "','" . "ACTIVE" . "','" . $return_date . "','" . $item_b_code . "')";
       $items_result = mysqli_query($conn, $items_query)or die("Error : " . mysqli_error($conn));
       $update_query = "Update tbl_uis_sequence set uis = '" . $item_uis . "'";
       $update_result = mysqli_query($conn, $update_query);
       /** #END# Items Table Query */
       /** History Table Query */
       $history_query = "Insert into tbl_transfer_history(r_id, uis, inventory_code, employee_code, item_name, item_stocks, item_price, item_description, item_b_code,  return_date, item_prev_holder, transfer_status)values('"
       . $r_id . "','" . $uis . "','" .  $inventory_number . "','" . $employee_code . "','" . $item_name . "','" . $item_stocks  . "','" .  $item_price
       . "','" . $description . "','" . $item_b_code .  "','" . $return_date . "','". $item_prev_holder . "','" . "DONE" . "')";
       $history_result = mysqli_query($conn, $history_query)or die("Error : " . mysqli_error($conn));
       /** #END# History Table Query */
      /** Return Temp Query */
       $temp_query = "Update tbl_temp_returns set transfer_status = '" . "DONE" . "' where r_id = '" . $r_id . "'";
       $temp_result = mysqli_query($conn, $temp_query);
       /** #END# Return Temp Query */
       }else{
            echo "false";
       }
    }
?>