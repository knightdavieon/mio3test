<?php  
require_once("Connection.php");
date_default_timezone_set("Asia/Manila");
    $date = date('m') . "/" . date('d') . "/" . date('Y');
    $time = date("H");
   
    $query = mysqli_query($conn, "Select * from tbl_promotional_sales");
    $rows = mysqli_fetch_array($query);
    if($rows['end_time'] >= $time && $rows['end_date'] >= $date){
         echo $rows['end_time'];    
    }

?>