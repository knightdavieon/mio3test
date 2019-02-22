<?php require_once("Connection.php"); ?>
<?php 
   if(isset($_REQUEST['inventory_code'])){
        $active_query = "Update tbl_swho_items set item_status = '" . "ACTIVE" . "' where inventory_code = '" . mysqli_real_escape_string($conn, $_REQUEST['inventory_code']) . "'";
        $active_result = mysqli_query($conn, $active_query);
        if($active_result === true){
            echo "true";
            $univ_query = "Update tbl_temp_returns set item_status = '" . "ACTIVE" . "' where inventory_code = '" . mysqli_real_escape_string($conn, $_REQUEST['inventory_code']) . "'";
            $univ_result = mysqli_query($conn, $univ_query);
            $tran_query = "Update tbl_transfer_history set item_status = '" . "ACTIVE" . "' where inventory_code = '" . mysqli_real_escape_string($conn, $_REQUEST['inventory_code']) . "'";
            $tran_result = mysqli_query($conn, $tran_query);
             $items_query = "Update tbl_items set item_status = '" . "ACTIVE" . "' where inventory_code = '" . mysqli_real_escape_string($conn, $_REQUEST['inventory_code']) . "'";
            $items_result = mysqli_query($conn, $items_query);
        }else{
            echo "false";  
        }        
   }
?>