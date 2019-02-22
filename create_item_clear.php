<?php require_once("Connection.php"); ?>
<?php 
    $remove_query = "Delete from tbl_swho_items_temp";
    $remove_result = mysqli_query($conn, $remove_query);
    if($remove_result === true){
         echo 'Working';
    }
?>