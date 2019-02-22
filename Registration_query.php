<?php require_once('Connection.php'); ?>
<?php 
 if(isset($_REQUEST['item_barcode'])){
    $item_barcode = mysqli_real_escape_string($conn, $_REQUEST['item_barcode']);
    $item_name = mysqli_real_escape_string($conn, $_REQUEST['item_name']);
    $quantity = mysqli_real_escape_string($conn, $_REQUEST['quantity']);
    $branch = mysqli_real_escape_string($conn, $_REQUEST['branch']);
    $item_price = mysqli_real_escape_string($conn, $_REQUEST['item_price']);
    $description = mysqli_real_escape_string($conn, $_REQUEST['description']);
    $fullDate = mysqli_real_escape_string($conn, $_REQUEST['fullDate']);
    $uis = mysqli_real_escape_string($conn, $_REQUEST['uis']);
    $uis += 1;
    $duplicate_query = "Select * from tbl_items where inventory_code = '" . $item_barcode . "'";
    $duplicate_result = mysqli_query($conn, $duplicate_query);
    $duplicate_count = mysqli_num_rows($duplicate_result);
    
    if($duplicate_count > 0){
        echo "Duplicate";
    }else{
        $query = "Insert into tbl_items(uis, inventory_code, item_name, item_stocks, item_description, item_price, item_b_code, item_status, item_date)values('" . $uis . "','" .
        $item_barcode . "','" . $item_name . "','" . $quantity . "','" . $description . "','" . $item_price . "','"  . $branch . "','" .  "ACTIVE" . "','" . $fullDate . "')";
        $result = mysqli_query($conn, $query)or die("Error : " . mysqli_error($conn));
        if($result === true){
            echo "Working";
            $uis_query = "Update tbl_uis_sequence set uis = '" . $uis . "'";
            $uis_result = mysqli_query($conn, $uis_query)or die("Error : " . mysqli_error($conn));
        }else{
            echo "Failed";
        }
    }
   
 }
?>