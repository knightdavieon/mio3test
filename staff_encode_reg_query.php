<?php 
session_start();
require_once("Connection.php"); 
date_default_timezone_set('Asia/Manila');
$day = date('d');
$month = date('m');
$year = date('Y');
$fullDate = $month . "/" . $day . "/" . $year;
?>
<?php 
   if(isset($_REQUEST['barcode'])){
       $s_id = mysqli_real_escape_string($conn, $_REQUEST['s_id']);    
       $barcode = mysqli_real_escape_string($conn, $_REQUEST['barcode']);
       $staff_code = mysqli_real_escape_string($conn, $_REQUEST['staff_code']);
       $fname = mysqli_real_escape_string($conn, $_REQUEST['fname']);
       $item_name = mysqli_real_escape_string($conn, $_REQUEST['item_name']);
       $item_stocks = mysqli_real_escape_string($conn, $_REQUEST['item_stocks']);
       $item_quantity = mysqli_real_escape_string($conn, $_REQUEST['item_quant']);
       $item_price = mysqli_real_escape_string($conn, $_REQUEST['item_price']);
       $total = mysqli_real_escape_string($conn, $_REQUEST['total_stocks']);
       $branch = mysqli_real_escape_string($conn, $_REQUEST['branch']);
       $current_stocks = mysqli_real_escape_string($conn, $_REQUEST['current_stocks']); 
       $s_id += 1;
       if(empty($_REQUEST['item_stocks'])){
            echo "Inssuficient Stock";
       }else{
      $item_query = "Insert into tbl_sales_record(s_id, employee_code, full_name, inventory_code, item_name, item_sold, item_price, date_of_transaction, i_total, branch)value('"
       . $s_id . "','" . $staff_code . "','" . $fname . "','". $barcode . "','" . $item_name . "','" . $item_quantity . "','" . $item_price . "','" . $fullDate . "','" . $total . "','" . $branch . "')";
       $item_result = mysqli_query($conn, $item_query)or die("Error :" . mysqli_error($conn));
       if($item_result === true){
           $update_query = "Update tbl_items set item_stocks = '" . $current_stocks . "' where inventory_code = '" . $barcode . "' and item_b_code = '" . $_SESSION['b_code'] . "'";
           $update_result = mysqli_query($conn, $update_query);
           $s_code_query = "Update tbl_sales_ticket_number set s_id = '" . $s_id . "'";
           $s_code_result = mysqli_query($conn, $s_code_query);
            echo "True";
       }else{
            echo "False";
       }
    }
}
?>