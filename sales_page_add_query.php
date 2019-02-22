<?php session_start(); require_once("Connection.php"); ?>
<?php 
     if(isset($_REQUEST['item_barcode'])){
            $transaction_number = mysqli_real_escape_string($conn, $_REQUEST['trans_number']);
            $conv_trans = (int)$transaction_number;
            $trans_value = mysqli_real_escape_string($conn, $_REQUEST['trans_value']);
            $invoice_number = mysqli_real_escape_string($conn, $_REQUEST['invoice_number']);
            $item_barcode = mysqli_real_escape_string($conn, $_REQUEST['item_barcode']);
            $item_name = mysqli_real_escape_string($conn, $_REQUEST['item_name']);
            $item_price = mysqli_real_escape_string($conn, $_REQUEST['item_price']);
            $item_quantity = mysqli_real_escape_string($conn, $_REQUEST['item_quantity']);
            $item_total = mysqli_real_escape_string($conn, $_REQUEST['item_total']);
           
            if(!empty($trans_value)){
                    echo "Please Commit the first transaction first";
            }else{

            
            $checking_query = "Select * from tbl_sales_temp where transaction_number = '" . $transaction_number . "' and staff_code = '" . $_SESSION['b_staff_code'] . "'";
            $checking_result = mysqli_query($conn, $checking_query)or die("Error : " . mysqli_error($conn));
            $checking_count = mysqli_num_rows($checking_result);
            if($checking_count > 0){
                   $query = "Insert into tbl_sales_temp(transaction_number, invoice_number, item_barcode, item_name, price, item_quantity, total, branch_name, staff_code)values('"
                   . $transaction_number . "','" . $invoice_number . "','" . $item_barcode . "','" . $item_name . "','" . $item_price . "','" . $item_quantity . "','" . $item_total . "','" . $_SESSION['b_code'] . "','" . $_SESSION['b_staff_code'] . "')";
                   $result = mysqli_query($conn, $query)or die("Error : " . mysqli_error($conn));
                  if($result === true){
                       echo "Added";
                  }
            }else{
                 
                  $check_query = "Select * from tbl_sales_number where idd > '" . $conv_trans . "'";   
                  $check_result = mysqli_query($conn, $check_query);
                  $check_count = mysqli_num_rows($check_result);
                  if($check_count > 0){
                          $existing_query = mysqli_query($conn, "Select * from tbl_sales_series where transaction_number = '" . $transaction_number . "' and branch = '" . $_SESSION['b_code'] . "'");
                          $existing_count = mysqli_num_rows($existing_query);
                          if($existing_count > 0){
                                   if(mysqli_query($conn, "Insert into tbl_sales_temp(transaction_number, invoice_number, item_barcode, item_name, price, item_quantity, total, branch_name, staff_code)values('"
                                   . $transaction_number . "','" . $invoice_number . "','" . $item_barcode . "','" . $item_name . "','" . $item_price . "','" . $item_quantity . "','" . $item_total . "','" . $_SESSION['b_code'] . "','" . $_SESSION['b_staff_code'] . "')") === true){
                                        echo "Item added to this existing invoice";                       
                                   }
                                   
                          }else{
                               echo "Please refresh the page this transaction number is already been used";
                          }

                  }else{
                   $query = "Insert into tbl_sales_temp(transaction_number, invoice_number, item_barcode, item_name, price, item_quantity, total, branch_name, staff_code)values('"
                   . $transaction_number . "','" . $invoice_number . "','" . $item_barcode . "','" . $item_name . "','" . $item_price . "','" . $item_quantity . "','" . $item_total . "','" . $_SESSION['b_code'] . "','" . $_SESSION['b_staff_code'] . "')";
                   $result = mysqli_query($conn, $query)or die("Error : " . mysqli_error($conn));
                  if($result === true){
                       echo "Added";
                       if($transaction_number < 10){
                         $update_query = "Update tbl_sales_number set idd = '" . "0" . $transaction_number . "'";
                         $update_result = mysqli_query($conn, $update_query);        
                       }else{
                        $update_query = "Update tbl_sales_number set idd = '" . $transaction_number . "'";
                        $update_result = mysqli_query($conn, $update_query);
                       }
                       
                  }   
               }         
          } 
     }
}
?>