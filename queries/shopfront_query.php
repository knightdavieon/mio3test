<?php require_once("Connection.php"); ?>
<?php  
   if(isset($_REQUEST['shopfront_name'])){
        $shopfront_name = mysqli_real_escape_string($conn, $_REQUEST['shopfront_name']);
        $shopfront_name  = strtoupper($shopfront_name);
        $shopfront_code = mysqli_real_escape_string($conn, $_REQUEST['shopfront_code']);
        $shopfront_code = strtoupper($shopfront_code);
        $duplicate_query = "Select * from tbl_branches where branch_code = '" . $shopfront_code . "'";
        $duplicate_result = mysqli_query($conn, $duplicate_query);
        $duplicate_count = mysqli_num_rows($duplicate_result);
        if($duplicate_count > 0){
            echo "This branch is already added";
        }else{
            
        }
        $shopfront_query = "Insert into tbl_branches(branch_code, branch_name)values('" . $shopfront_code . "','" .
        $shopfront_name . "')";
        $shopfront_result = mysqli_query($conn, $shopfront_query);
        if($shopfront_result === true){
            echo "Working";
        }else{
            echo "Failed";
        }
   }
?>