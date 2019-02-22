<?php session_start(); require_once("Connection.php"); ?>
<?php 
    $delete_query = "Delete from tbl_goods_receive_temp where employee_code = '" . $_SESSION['b_staff_code'] . "'";
    $delete_result = mysqli_query($conn, $delete_query)or die("Error : " . mysqli_error($conn));
    if($delete_result === true){
         echo "cleared";
    }
?>