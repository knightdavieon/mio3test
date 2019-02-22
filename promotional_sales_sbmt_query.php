<?php session_start(); require_once("Connection.php"); ?>
<?php 
date_default_timezone_set('Asia/Manila');
$date_today = date('d') . "/" . date('m') . "/" . date('Y');
   if(isset($_POST['data'])){
       $i_bcode = mysqli_real_escape_string($conn, $_REQUEST['i_bcode']);
       $set_time = mysqli_real_escape_string($conn, $_REQUEST['set_time']);
       $set_end_time = mysqli_real_escape_string($conn, $_REQUEST['set_end_time']);
       $from_date = mysqli_real_escape_string($conn, $_REQUEST['from_date']);
       $to_date = mysqli_real_escape_string($conn, $_REQUEST['to_date']);
       $final_total = mysqli_real_escape_string($conn, $_REQUEST['final_total']);
       $total_price = mysqli_real_escape_string($conn, $_REQUEST['total_price']);
       $entry_num = mysqli_real_escape_string($conn, $_REQUEST['entry_num']);
       $message = false;
     //  $frows = $_POST['data'];
       $discount_value = $_REQUEST['discount_value'];
             foreach($_POST['data'] as $frows){
               $query = mysqli_query($conn, "Insert into tbl_promotional_sales(item_barcode, set_time, end_time, set_date, end_date, branch, status, employee_code, employee_name, date_implemented, deducted_price, original_price, entry_num)values('"
               . $i_bcode . "','" . $set_time . "','" . $set_end_time . "','" . $from_date . "','" . $to_date . "','" . $frows . "','" . "ACTIVE" . "','" . $_SESSION['b_staff_code'] . "','" . $_SESSION['fullname'] . "','" . $date_today . "','" . $final_total . "','" . $total_price . "','" . $entry_num . "')");
              if($query === true){
                    $message = true;   
              }        
    }
       if($message){
             echo "Well Done !! Applied Successfully";
             $update_num = mysqli_query($conn, "Update tbl_promotional_number set _idd = '" . $entry_num . "'");
       }
   }
?>