<?php require_once("Connection.php"); ?>
<?php 
    if(isset($_REQUEST['txt_current_code'])){
        $txt_current_code = mysqli_real_escape_string($conn, $_REQUEST['txt_current_code']);
        $txt_shopfront_name = mysqli_real_escape_string($conn, $_REQUEST['txt_shopfront_name']);
        $txt_shopfront_name = strtoupper($txt_shopfront_name);
        $txt_shopfront_code = mysqli_real_escape_string($conn, $_REQUEST['txt_shopfront_code']);
        $txt_shopfront_code = strtoupper($txt_shopfront_code);
        $shopfront_c_query = "Select * from tbl_branches where branch_code = '" . $txt_shopfront_code . "' and branch_name = '" . $txt_shopfront_name . "'";
        $shopfront_c_result = mysqli_query($conn, $shopfront_c_query);
        $shopfront_c_count = mysqli_num_rows($shopfront_c_result);
        if($shopfront_c_count > 0){
            echo "This Branch Code /  Name is Already Exists";
        }else{
        $shopfront_query = "Update tbl_branches set  branch_code = '" . $txt_shopfront_code . "', branch_name = '" . $txt_shopfront_name . "' where _id = '" . $txt_current_code . "'";
        $shopfront_result = mysqli_query($conn, $shopfront_query);
        if($shopfront_result === true){
             echo "True";
        }else{
           echo "Failed";
        }
      }
   
    }
?>