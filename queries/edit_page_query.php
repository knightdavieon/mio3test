<?php require_once('Connection.php'); ?>
<?php 
    if(isset($_REQUEST['uis'])){
        $uis = mysqli_real_escape_string($conn, $_REQUEST['uis']);
        $inventory_code = mysqli_real_escape_string($conn, $_REQUEST['inventory_code']);
        $item_name = mysqli_real_escape_string($conn, $_REQUEST['item_name']);
        $item_stocks = mysqli_real_escape_string($conn, $_REQUEST['item_stocks']);
        $item_branch = mysqli_real_escape_string($conn, $_REQUEST['item_branch']);
        $i_description = mysqli_real_escape_string($conn, $_REQUEST['i_description']);
        $item_price = mysqli_real_escape_string($conn, $_REQUEST['item_price']);
      
       $query = "Update tbl_swho_items set item_name ='" . $item_name . "', item_stocks= '" . $item_stocks . "', item_description = '" . $i_description
        . "', item_price = '" . $item_price . "' where uis = '" . $uis . "'";
        $result = mysqli_query($conn, $query)or die("Error : " . mysqli_error($conn));
        if($result === true){
             echo 'True';
        }else{
             echo 'False';
        }
    }
  
?>