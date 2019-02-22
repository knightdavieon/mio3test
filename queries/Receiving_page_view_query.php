<?php session_start(); require_once("Connection.php"); ?>
<?php 
date_default_timezone_set('Asia/Manila');
$day = date('d');
$month = date('m');
$year = date('Y');
$fullDate = $month . "/" . $day . "/" . $year;
    if(isset($_REQUEST['r_id'])){
        $r_id = mysqli_real_escape_string($conn, $_REQUEST['r_id']);
        $barcode = mysqli_real_escape_string($conn, $_REQUEST['barcode']);
        $employee_code = mysqli_real_escape_string($conn, $_REQUEST['employee_code']);
        $item_name = mysqli_real_escape_string($conn, $_REQUEST['item_name']);
        $item_stocks = mysqli_real_escape_string($conn, $_REQUEST['item_stocks']);
        $transfered_to = mysqli_real_escape_string($conn, $_REQUEST['item_b_code']);
        $item_from = mysqli_real_escape_string($conn, $_REQUEST['item_prev_holder']);
        $item_quantity = mysqli_real_escape_string($conn, $_REQUEST['item_quantity']);
        $description = mysqli_real_escape_string($conn, $_REQUEST['description']);
        $item_price = mysqli_real_escape_string($conn, $_REQUEST['item_price']);
        $duplicate_query = "Select * from tbl_items where r_id = '" . $r_id . "'";
        $duplicate_result = mysqli_query($conn, $duplicate_query)or die("Error : " . mysqli_error($conn));
        $duplicate_count = mysqli_num_rows($duplicate_result);
        $existing_query = "Select * from tbl_items where inventory_code = '" . $barcode . "' and item_b_code = '" . $_SESSION['b_code'] . "'";
        $existing_result = mysqli_query($conn, $existing_query)or die("Error :" . mysqli_error($conn));
        $existing_rows = mysqli_fetch_array($existing_result);
        $existing_count = mysqli_num_rows($existing_result);
        $item_s_value = $existing_rows['item_stocks'] + $item_quantity;
        if($existing_count > 0){
            $count_value = "Update tbl_items set item_stocks = '" . $item_s_value . "' where inventory_code = '" . $barcode . "' and item_b_code = '" . $_SESSION['b_code'] . "'";
            $count_result = mysqli_query($conn, $count_value)or die("Error : " . mysqli_error($conn));
            if($count_result === true){
                  echo "True";
                  $update_query = "Update tbl_temp_returns set transfer_status ='" . "DONE" . "' where r_id = '" . $r_id . "'";
                  $update_result = mysqli_query($conn, $update_query)or die("Error : " . mysqli_error($conn));
                  $history_query = "Insert into tbl_transfer_history(r_id, inventory_code, item_name, item_description, item_stocks, item_price, item_status, item_date, item_branch, transfered_from)values('"
                  . $r_id ."','" . $barcode . "','" . $item_name . "','" . $description . "','" . $item_quantity . "','" . $item_price . "','" . "ACTIVE" . "','" . $fullDate . "','" . $item_from . "','" . $transfered_to . "')";
                  $history_result = mysqli_query($conn, $history_query)or die("Error : " . mysqli_error($conn));
            }else{
                
                 echo "Failed";
            }  
        }else{
            if($duplicate_count > 0){
                echo "This Item is already transfered to your inventory";
            }else{
                $query = "Insert into tbl_items(r_id, inventory_code, item_name, employee_code, item_stocks, item_description, item_price, item_status, item_date, item_b_code)values('".   $r_id . "','" . $barcode . "','" . $item_name . "','" . $employee_code . "','" . $item_quantity . "','" . $description . "','" . $item_price . "','" . "ACTIVE" . "','" . $fullDate . "','" . $transfered_to . "')";
                $result = mysqli_query($conn, $query);
                if($result === true){
                     echo "True";
                     $update_query = "Update tbl_temp_returns set transfer_status ='" . "DONE" . "' where r_id = '" . $r_id . "'";
                     $update_result = mysqli_query($conn, $update_query)or die("Error : " . mysqli_error($conn));
                     $history_query = "Insert into tbl_transfer_history(r_id, inventory_code, item_name, item_description, item_stocks, item_price, item_status, item_date, item_branch, transfered_from)values('"
                     . $r_id ."','" . $barcode . "','" . $item_name . "','" . $description . "','" . $item_quantity . "','" . $item_price . "','" . "ACTIVE" . "','" . $fullDate . "','" . $item_from . "','" . $transfered_to . "')";
                     $history_result = mysqli_query($conn, $history_query)or die("Error : " . mysqli_error($conn));
                }else{
                    echo "False";
                }
            }
        }
        
      
    }
?>