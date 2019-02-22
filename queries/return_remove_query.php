<?php require_once("Connection.php"); ?>
<?php 
   if(isset($_REQUEST['r_id_del'])){

     $r_id_del = mysqli_real_escape_string($conn, $_REQUEST['r_id_del']);
     $btn_query = "Delete from tbl_temp_returns where r_id = '" . $r_id_del . "'";
     $btn_result = mysqli_query($conn, $btn_query);
     if($btn_result === true){
          echo "Deleted";
     }else{
        echo "Failed";
     }
   }
?>