<?php 
  session_start();
  require_once("Connection.php");
  date_default_timezone_set('Asia/Manila');
  $fulldate = date('d') . '/' . date('m') .'/'. date('Y');
  if(isset($_REQUEST['i_bcode'])){
        $i_bcode = mysqli_real_escape_string($conn, $_REQUEST['i_bcode']);
        $from_date = mysqli_real_escape_string($conn, $_REQUEST['from_date']);
        $to_date = mysqli_real_escape_string($conn, $_REQUEST['to_date']);
        $set_time = mysqli_real_escape_string($conn, $_REQUEST['set_time']);
        $set_end_time = mysqli_real_escape_string($conn, $_REQUEST['set_end_time']);
        $discount_value = mysqli_real_escape_string($conn, $_REQUEST['discount_value']);
        $final_total = mysqli_real_escape_string($conn, $_REQUEST['final_total']);
        $total_price = mysqli_real_escape_string($conn, $_REQUEST['total_price']);
        $entry_num = mysqli_real_escape_string($conn, $_REQUEST['entry_num']);
        $query = mysqli_query($conn, "Insert into tbl_promotional_sales_reg(barcode, set_time, end_time, set_date, end_date, set_by, employee_code, created_date, status, entry_num)values('"
        . $i_bcode . "','" . $set_time . "','" . $set_end_time . "','" . $from_date . "','" . $to_date . "','" . $_SESSION['fullname'] . "','" . $_SESSION['b_staff_code'] . "','" . $fulldate . "','" . "ACTIVE" . "','" . $entry_num . "')");
       
  }
?>