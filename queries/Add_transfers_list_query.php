<?php 
session_start();
date_default_timezone_set('Asia/Manila');
$day = date('d');
$month = date('m');
$year = date('Y');
$fullDate = $month . "/" . $day . "/" . $year;
?>
<?php require_once("Connection.php"); ?>
<?php 

   if(isset($_REQUEST['return_number'])){
       // HeadOffice Query
     if($_SESSION['b_code'] == "SWHO"){
        $return_number = mysqli_real_escape_string($conn, $_REQUEST['return_number']);
        $barcode = mysqli_real_escape_string($conn, $_REQUEST['barcode']);
        $item_name = mysqli_real_escape_string($conn, $_REQUEST['item_name']);
        $item_price = mysqli_real_escape_string($conn, $_REQUEST['item_price']);
        $item_description = mysqli_real_escape_string($conn, $_REQUEST['item_description']);
        $branches = mysqli_real_escape_string($conn, $_REQUEST['branches']);
        $r_stocks_v = mysqli_real_escape_string($conn, $_REQUEST['r_stocks_v']);
        $employee_code = mysqli_real_escape_string($conn, $_REQUEST['employee_code']);
        $t_quantity = mysqli_real_escape_string($conn, $_REQUEST['t_quantity']); 
        $current_branch = mysqli_real_escape_string($conn, $_REQUEST['current_branch']); 
        $item_stocks = mysqli_real_escape_string($conn, $_REQUEST['item_stocks']);
        $return_type = mysqli_real_escape_string($conn, $_REQUEST['return_type']);
     if($item_stocks < $t_quantity){
          echo "Inssuficient stocks";
     }else{ 
      $query = "Insert into tbl_temp_returns(r_id, inventory_code, employee_code, item_name, item_stocks, item_price, item_description, item_b_code, return_date, item_status, item_prev_holder, transfer_status, transfer_quantity, return_type)values('"
       . $return_number . "','" . $barcode . "','" . $employee_code . "','" . $item_name . "','" . $r_stocks_v . "','" .  $item_price . "','" . $item_description . "','"  . $branches . "','" . $fullDate . "','" . "ACTIVE" . "','" . $current_branch ."','" . "PENDING" . "','" . $t_quantity . "','" . $return_type . "')";
       $result = mysqli_query($conn, $query)or die("Error : " . mysqli_error($conn));
       if($result === true){
            echo "True";
            $update_query = "Update tbl_return_number set r_id = '" . $return_number . "'";
            $update_result = mysqli_query($conn, $update_query);
            $stocks_update = "Update tbl_swho_items set item_stocks = '" . $r_stocks_v . "' where inventory_code = '" . $barcode . "'";
            $stocks_result = mysqli_query($conn, $stocks_update);
            $transfer_query = "Insert into tbl_transfer_history(r_id, inventory_code, item_name, item_description, item_stocks, item_price, item_status, item_date, item_branch, transfered_from, return_type)values('"
            . $return_number . "','" . $barcode . "','" . $item_name . "','" . $item_description . "','" . $t_quantity . "','" . $item_price . "','" . "ACTIVE" . "','" . $fullDate . "','" . $branches . "','" 
            . $current_branch . "','" . $return_type . "')";
            $transfer_result = mysqli_query($conn, $transfer_query)or die("Error : " . mysqli_error($conn));
       }else{
           echo "False";
       }
     } 
    }else{
        //Branch Query
        $return_number = mysqli_real_escape_string($conn, $_REQUEST['return_number']);
        $barcode = mysqli_real_escape_string($conn, $_REQUEST['barcode']);
        $item_name = mysqli_real_escape_string($conn, $_REQUEST['item_name']);
        $item_price = mysqli_real_escape_string($conn, $_REQUEST['item_price']);
        $item_description = mysqli_real_escape_string($conn, $_REQUEST['item_description']);
        $branches = mysqli_real_escape_string($conn, $_REQUEST['branches']);
        $r_stocks_v = mysqli_real_escape_string($conn, $_REQUEST['r_stocks_v']);
        $employee_code = mysqli_real_escape_string($conn, $_REQUEST['employee_code']);
        $t_quantity = mysqli_real_escape_string($conn, $_REQUEST['t_quantity']); 
        $current_branch = mysqli_real_escape_string($conn, $_REQUEST['current_branch']); 
        $item_stocks = mysqli_real_escape_string($conn, $_REQUEST['item_stocks']);
    
       if($item_stocks < $t_quantity){
            echo "Inssuficient Stocks";
       }else{
       $query = "Insert into tbl_temp_returns(r_id, inventory_code, employee_code, item_name, item_stocks, item_price, item_description, item_b_code, return_date, item_status, item_prev_holder, transfer_status, transfer_quantity, transfer_approval)values('"
       . $return_number . "','" . $barcode . "','" . $employee_code . "','" . $item_name . "','" . $r_stocks_v . "','" .  $item_price . "','" . $item_description . "','"  . $branches . "','" . $fullDate . "','" . "ACTIVE" . "','" . $current_branch ."','" . "PENDING" . "','" . $t_quantity . "','" . "APPROVAL" . "')";
       $result = mysqli_query($conn, $query)or die("Error : " . mysqli_error($conn));
       if($result === true){
            echo "True";
            $update_query = "Update tbl_return_number set r_id = '" . $return_number . "'";
            $update_result = mysqli_query($conn, $update_query);
            $stocks_update = "Update tbl_items set item_stocks = '" . $r_stocks_v . "' where inventory_code = '" . $barcode . "'";
            $stocks_result = mysqli_query($conn, $stocks_update);
            
       }else{
           echo "False";
       }
    }
  }
}
?>