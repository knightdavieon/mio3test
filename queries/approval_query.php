<?php require_once("Connection.php"); ?>
<?php 
    if(isset($_REQUEST['r_id'])){
     $return_id = mysqli_real_escape_string($conn, $_REQUEST['r_id']);
     $query = "Update tbl_temp_returns set transfer_approval = '" . "APPROVED" . "' where r_id = '" . $return_id . "'";
     $result = mysqli_query($conn, $query);
     if($result === true){
        echo "True";
     }else{
        echo "False";
     }
    }
?>