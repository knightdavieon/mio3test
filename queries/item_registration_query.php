<?php 
  require_once('Connection.php');
    if(isset($_REQUEST['inventory_code'])){
  
        $inventory_number = mysqli_real_escape_string($conn, $_REQUEST['inventory_code']);
        $item_name = mysqli_real_escape_string($conn, $_REQUEST['item_name']);
        $item_stocks = mysqli_real_escape_string($conn, $_REQUEST['item_stocks']);
        $description = mysqli_real_escape_string($conn, $_REQUEST['description']);
        $item_price = mysqli_real_escape_string($conn, $_REQUEST['item_price']);
        $duplicate_query = "Select * from tbl_items where inventory_code = '" . $inventory_number . "'";
        $duplicate_result = mysqli_query($conn, $duplicate_query);
        $duplicate_count = mysqli_num_rows($duplicate_result);
        if($duplicate_count > 0){
            echo "Duplicate";
        }else{
        $query = "Insert into tbl_items(inventory_code, item_name, item_stocks, item_description, item_price, item_status)values('"
        . $inventory_number . "','" . $item_name . "','" . $item_stocks . "','" . $description . "','" . $item_price . "','" . "ACTIVE" . "')";
        $result = mysqli_query($conn, $query)or die("Error : " . mysqli_error($conn));
        if($result === true){
            echo "true";
        }else{
            echo "false";
        }
    }
}
?>