<?php require_once('Connection.php'); ?>
<?php 
 
    if(isset($_REQUEST['inventory_code'])){
        $inventory_code = mysqli_real_escape_string($conn, $_REQUEST['inventory_code']);

        $update_query = "Update tbl_swho_items set item_status = '" . "DEACTIVE" . "' where inventory_code = '" . $inventory_code . "'";
        $update_result = mysqli_query($conn, $update_query);
        if($update_result === true){
             echo "true";
            $univ_query = "Update tbl_temp_returns set item_status = '" . "DEACTIVE" . "' where inventory_code = '" . $inventory_code . "'";
            $univ_result = mysqli_query($conn, $univ_query);
            $tran_query = "Update tbl_transfer_history set item_status = '" . "DEACTIVE" . "' where inventory_code = '" . $inventory_code . "'";
            $tran_result = mysqli_query($conn, $tran_query);
            $items_query = "Update tbl_items set item_status = '" . "DEACTIVE" . "' where inventory_code = '" . $inventory_code . "'";
            $items_result = mysqli_query($conn, $items_query);
        }else{
            echo "false";
        }
    }
   
?>