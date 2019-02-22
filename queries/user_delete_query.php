<?php require_once("Connection.php"); ?>
<?php 
     if(isset($_REQUEST['txt_current_code'])){
        $current_code = mysqli_real_escape_string($conn, $_REQUEST['txt_current_code']);
        $delete_query = "Delete from tbl_branches where _id = '" . $current_code . "'";
        $delete_result = mysqli_query($conn, $delete_query)or die("Error :" . mysqli_error($conn));
        if($delete_result === true){
               echo "True";
        }else{
              echo "False";
        }
     }
?>