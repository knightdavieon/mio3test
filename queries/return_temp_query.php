<?php require_once('Connection.php'); ?>
<?php 
     if(isset($_REQUEST['r_id'])){
        $r_id = mysqli_real_escape_string($conn, $_REQUEST['r_id']);
        $uis = mysqli_real_escape_string($conn, $_REQUEST['uis']);
        $inventory_code = mysqli_real_escape_string($conn, $_REQUEST['inventory_code']);
        $employee_code = mysqli_real_escape_string($conn, $_REQUEST['employee_code']);
        $item_name = mysqli_real_escape_string($conn, $_REQUEST['item_name']);
        $item_stocks = mysqli_real_escape_string($conn, $_REQUEST['item_stocks']);
        $item_price = mysqli_real_escape_string($conn, $_REQUEST['item_price']);
        $item_description = mysqli_real_escape_string($conn, $_REQUEST['item_description']);
        $item_b_code = mysqli_real_escape_string($conn, $_REQUEST['hidden_value1']);
        $return_date = mysqli_real_escape_string($conn, $_REQUEST['return_date']);
        $item_status = mysqli_real_escape_string($conn, $_REQUEST['item_status']);
        $remaining_stocks = mysqli_real_escape_string($conn, $_REQUEST['total_value']);
        $item_prev_holder = mysqli_real_escape_string($conn, $_REQUEST['item_prev_holder']);
        $transfer_quantity = mysqli_real_escape_string($conn, $_REQUEST['transfer_quantity']);
        if($item_stocks < $transfer_quantity){
         echo "Inssufficient Stocks";
        }else{
            if($_REQUEST['hidden_value1'] == $_REQUEST['current_branch']){
                echo "This is the current branch of this item";
            }else{
                $return_query = "Insert into tbl_temp_returns(r_id, uis, inventory_code, employee_code, item_name, item_stocks, item_price, item_description, item_b_code, return_date, item_status, item_prev_holder, transfer_status, transfer_quantity)values('" . $r_id . "','" . $uis . "','" . $inventory_code . "','" . $employee_code . "','" . $item_name . "','" . $remaining_stocks . "','"  . $item_price ."','" . $item_description . "','" . $item_b_code . "','"  . $return_date . "','" . $item_status . "','" . $item_prev_holder . "','" . "PENDING" . "','" . $transfer_quantity . "')";
                $return_result = mysqli_query($conn, $return_query)or die("Error : " . mysqli_error($conn));
                if($return_result === true){
                     echo "Working";
                     $r_id_query = "Update tbl_return_number set r_id = '" . $r_id . "'";
                     $r_id_result = mysqli_query($conn, $r_id_query)or die("Error : " . mysqli_error($conn));
                     $remaining_query = "Update tbl_items set item_stocks = '" . $remaining_stocks . "' where uis = '" . $uis . "'";
                     $remaining_result = mysqli_query($conn, $remaining_query);
        
                }else{
                     echo "Not Working";
                }
            }
           
        }
       
     }
?>