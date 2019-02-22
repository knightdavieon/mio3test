<?php require_once('Connection.php'); ?>
<?php 
    if(isset($_REQUEST['r_id'])){
        $uis = mysqli_real_escape_string($conn, $_REQUEST['uis']);
        $r_id = mysqli_real_escape_string($conn, $_REQUEST['r_id']);
        $transfer_quantity = mysqli_real_escape_string($conn, $_REQUEST['transfer_quantity']);
        $item_stocks = mysqli_real_escape_string($conn, $_REQUEST['item_stocks']);
        $total_stocks = $transfer_quantity + $item_stocks;
        $query = "Update tbl_items set item_stocks = '" . $total_stocks . "' where uis = '" . $uis . "'";   
        $result = mysqli_query($conn, $query);
        if($result === true){
              $delete_query = "Delete from tbl_temp_returns where r_id = '" . $r_id . "'";
              $delete_result = mysqli_query($conn, $delete_query);
              echo "true";
        }else{
              echo "false";
        }
    }
?>