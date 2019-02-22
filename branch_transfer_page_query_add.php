<?php require_once("Connection.php"); ?>
<?php 
session_start();
date_default_timezone_set("Asia/Manila");
$day = date('d');
$month = date('m');
$year = date('Y');
$fulldate = $month . "/" . $day . "/" . $year;
     if(isset($_REQUEST['item_name'])){
         $employee_code = mysqli_real_escape_string($conn, $_REQUEST['employee_code']);
        // $c_trans_num = mysqli_real_escape_string($conn, $_REQUEST['c_trans_num']);
         $staff_name = mysqli_real_escape_string($conn, $_REQUEST['staff_name']);
         $t_branch = mysqli_real_escape_string($conn, $_REQUEST['t_branch']);
         $item_barcode = mysqli_real_escape_string($conn, $_REQUEST['item_barcode']);
         $trans_number = mysqli_real_escape_string($conn, $_REQUEST['trans_number']);
         $item_name = mysqli_real_escape_string($conn, $_REQUEST['item_name']);
         $category = mysqli_real_escape_string($conn, $_REQUEST['category']);
         $sub_category = mysqli_real_escape_string($conn, $_REQUEST['sub_category']);
         $quantity = mysqli_real_escape_string($conn, $_REQUEST['quantity']);
         $price = mysqli_real_escape_string($conn, $_REQUEST['price']);
         $remarks = mysqli_real_escape_string($conn, $_REQUEST['remarks']);
    //     $ts_type = mysqli_real_escape_string($conn, $_REQUEST['ts_type']);
         $rem_quant = mysqli_real_escape_string($conn, $_REQUEST['rem_quant']);
       
         if($rem_quant <= 0){
                echo "Inssuffcient";
         }else{
        if($t_branch == $_SESSION['b_code']){
            echo "current branch";
        }else{
       
        if(!empty($_REQUEST['trans_current_num'])){
              echo "FT First";
        }else{
         $validation_query = "Select * from tbl_branch_transfer_item_temp where transaction_number = '" . $trans_number . "' and current_branch = '" . $_SESSION['b_code'] . "'";
         $validation_result = mysqli_query($conn, $validation_query)or die("Error : " . mysqli_error($conn));
         $validation_count = mysqli_num_rows($validation_result);
         if($validation_count > 0){
              $insert_query = "Insert into tbl_branch_transfer_item_temp(employee_code, staff_name, transfer_to, transaction_number, item_barcode, item_name, cat, sub_cat, quant, remarks, transfer_date, price, current_branch, receiving_status)values('"
            . $employee_code . "','" . $staff_name . "','" . $t_branch . "','" . $trans_number . "','" . $item_barcode . "','" . $item_name . "','" . $category . "','" . $sub_category . "','" . $quantity . "','" . $remarks . "','" . $fulldate . "','" . $price . "','" . $_SESSION['b_code'] . "','" . "FT" . "')"; 
              $insert_result = mysqli_query($conn, $insert_query)or die("Error : " . mysqli_error($conn));
              if($insert_result === true){
                    echo "Added";
              }
         }else{
  
         $validation_query = "Select * from tbl_branch_transfer_number where trans_number = '" . $trans_number . "'";
         $validation_result = mysqli_query($conn, $validation_query)or die("Error : " . mysqli_error($conn));
         $validation_count = mysqli_num_rows($validation_result);
            if($validation_count > 0){
               echo "Please refresh the page to get a new code";
            }else{
              $update_tnumber_query = "Update tbl_branch_transfer_number set trans_number = '" . $trans_number . "'";
              $update_tnumber_result = mysqli_query($conn, $update_tnumber_query);
              $insert_existing_query = "Insert into tbl_branch_transfer_item_temp(employee_code, staff_name, transfer_to, transaction_number, item_barcode, item_name, cat, sub_cat, quant, remarks, transfer_date, price, current_branch, receiving_status)values('"
              . $employee_code . "','" . $staff_name . "','" . $t_branch . "','" . $trans_number . "','" . $item_barcode . "','" . $item_name . "','" . $category . "','" . $sub_category . "','" . $quantity . "','" . $remarks . "','" . $fulldate . "','" . $price . "','" . $_SESSION['b_code'] . "','" . "FT" . "')"; 
              $insert_existing_result = mysqli_query($conn, $insert_existing_query)or die("Error : " . mysqli_error($conn));
              if($insert_existing_result === true){
                    echo "Added";
              }
            }
           
         
       }
     }
    
    } // end of else parse
  }     
}
?>