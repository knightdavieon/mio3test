<?php require_once("Connection.php"); ?>
<?php 
   if(isset($_REQUEST['r_id'])){
        $r_id = mysqli_real_escape_string($conn, $_REQUEST['r_id']);
        $delete_query = "Delete from tbl_temp_returns where r_id = '" . $r_id  . "'";
        $delete_result = mysqli_query($conn, $delete_query);
        if($delete_result === true){
           echo "True";
        }else{
           echo "False";
        }
   }
?>