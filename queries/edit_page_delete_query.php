<?php require_once('Connection.php'); ?>
<?php
    if(isset($_REQUEST['inventory_code'])){
         $inv_code = mysqli_real_escape_string($conn, $_REQUEST['inventory_code']);
         $delete_query = "Delete from tbl_swho_items where inventory_code = '" . $inv_code . "'";
         $delete_result = mysqli_query($conn, $delete_query)or die("Error : " .  mysqli_error($conn));
        if($delete_result === true){
            echo 'true';
            $accnt_query = "Delete from tbl_items where inventory_code = '" . $inv_code . "'";
            $accnt_result = mysqli_query($conn, $accnt_query);
            $temp_returns = "Delete from tbl_temp_returns from inventory_code = '" . $inv_code . "'";
            $temp_result = mysqli_query($conn, $temp_returns);
        }else{
            echo 'false';
        }
    }
?>