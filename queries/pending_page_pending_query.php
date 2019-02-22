<?php require_once("Connection.php"); ?>
<?php 
    if(isset($_REQUEST['uis'])){
         $uis = mysqli_real_escape_string($conn, $_REQUEST['uis']);
         $inventory_number = mysqli_real_escape_string($conn, $_REQUEST['inventory_number']);
         $item_name = mysqli_real_escape_string($conn, $_REQUEST['item_name']);
         $item_description = mysqli_real_escape_string($conn, $_REQUEST['item_description']);
         $item_stocks = mysqli_real_escape_string($conn, $_REQUEST['item_stocks']);
         $item_price = mysqli_real_escape_string($conn, $_REQUEST['item_price']);
         $item_branch = mysqli_real_escape_string($conn, $_REQUEST['item_branch']);
         $item_date = mysqli_real_escape_string($conn, $_REQUEST['item_date']);
         $query = "Insert into tbl_items(uis, inventory_code, item_name, item_stocks, item_description, item_price, item_branch, item_status, item_date)values('"
         . $uis . "','" . $inventory_number . "','" . $item_name . "','" . $item_stocks . "','" . $item_description . "','" . $item_price . "','" . $item_branch . "','" . "ACTIVE" .  "','" . $item_date . "')";
         $result = mysqli_query($conn, $query)or die("Error : " . mysqli_error($conn));
         if($result === true){
            echo "True";
         }else{
            echo "False";
         }
    
    }
?>