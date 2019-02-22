<?php require_once('Connection.php'); ?>
<?php 
    if(isset($_REQUEST['inventory_number'])){
        $uis = mysqli_real_escape_string($conn, $_REQUEST['uis']);
        $inventory_number = mysqli_real_escape_string($conn, $_REQUEST['inventory_number']);
        $branch = mysqli_real_escape_string($conn, $_REQUEST['branches']);
        $item_name = mysqli_real_escape_string($conn, $_REQUEST['item_name']);
        //$quantity = mysqli_real_escape_string($conn, $_REQUEST['quantity']);
        $item_price = mysqli_real_escape_string($conn, $_REQUEST['item_price']);
        $description = mysqli_real_escape_string($conn, $_REQUEST['item_description']);
        $transfered_quant = mysqli_real_escape_string($conn, $_REQUEST['t_quant']);
        $item_status = mysqli_real_escape_string($conn, $_REQUEST['item_status']);
        $date_of_transfer = mysqli_real_escape_string($conn, $_REQUEST['date_of_transfer']);
        $t_value = mysqli_real_escape_string($conn, $_REQUEST['t_value']);

        $checked_query = "Select * from tbl_items where item_branch = '" . $branch . "' and inventory_code = '" . $inventory_number . "'";
        $checked_result = mysqli_query($conn, $checked_query)or die("Error : " . mysqli_error($conn));
        $checked_count = mysqli_num_rows($checked_result)
        ;
        if($checked_count > 0){
            echo 'This Branch is already the current branch for this item';
        }else{
             $insert_query = "Insert into tbl_pending(uis, inventory_code, item_name, item_stocks, item_description, item_price, item_branch, item_status, item_date)values('"
            . $uis . "','" .  $inventory_number . "','" . $item_name . "','" . $transfered_quant  . "','" . $description . "','" . $item_price . "','" . $branch . "','" . $item_status . "','"
            . $date_of_transfer . "')";
            $insert_result = mysqli_query($conn, $insert_query)or die("Error : " . mysqli_error($conn));
            if($insert_result === true){
                echo "true";
                $update_query = "Update tbl_items set item_stocks ='" . $t_value . "' where uis = '" . $uis . "'";
                $update_result = mysqli_query($conn, $update_query);
            }else{
                echo "false";
            }
        }
    }
?>