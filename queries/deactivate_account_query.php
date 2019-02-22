<?php require_once("Connection.php"); ?>
<?php 
   if(isset($_REQUEST['u_ecode'])){
        $ecode = mysqli_real_escape_string($conn, $_REQUEST['u_ecode']);
        $query = "Update tbl_users set b_status = '" . "DEACTIVE" . "' where b_staff_code = '" . $ecode . "'";
        $result = mysqli_query($conn, $query)or die("Error : " . mysqli_error($conn));
        if($result === true){
            echo "True";
        }else{
            echo "False";
        }
   } 
?>