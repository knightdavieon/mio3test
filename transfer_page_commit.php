<?php session_start(); require_once("Connection.php"); ?>
<?php
if(isset($_REQUEST['transaction_number'])){
  $transaction_number = mysqli_real_escape_string($conn, $_REQUEST['transaction_number']);
  $item_barcode = mysqli_real_escape_string($conn, $_REQUEST['item_barcode']);
  $item_name = mysqli_real_escape_string($conn, $_REQUEST['item_name']);
  $category = mysqli_real_escape_string($conn, $_REQUEST['cat']);
  $sub_category = mysqli_real_escape_string($conn, $_REQUEST['sub_category']);
  $item_quantity = mysqli_real_escape_string($conn, $_REQUEST['item_quantity']);
  $price = mysqli_real_escape_string($conn, $_REQUEST['price']);
  // $remarks = mysqli_real_escape_string($conn, $_REQUEST['remarks']);
  $ts_type = mysqli_real_escape_string($conn, $_REQUEST['ts_type']);
  $date_received = mysqli_real_escape_string($conn, $_REQUEST['date_received']);
  $branch = mysqli_real_escape_string($conn, $_REQUEST['t_branch_value']);
  $current_docket = mysqli_real_escape_string($conn, $_REQUEST['current_docket']);
  $t_fa = mysqli_real_escape_string($conn, $_REQUEST['t_fa']);
  if($current_docket < $transaction_number){
    echo "Please commit the first transaction";
  }else{


    $trans_check_query = "Select * from tbl_transfer_temp where transaction_number = '" . $transaction_number . "' and employee_code = '" . $_SESSION['b_staff_code'] . "'";
    $trans_check_result = mysqli_query($conn, $trans_check_query);
    $trans_check_count = mysqli_num_rows($trans_check_result);
    if($trans_check_count > 0){
      $check_quant_query = "Select * from tbl_goods_receive where item_barcode = '" . $item_barcode . "'";
      $check_quant_result = mysqli_query($conn, $check_quant_query)or die("Error : " . mysqli_error($conn));
      $check_quant_rows = mysqli_fetch_array($check_quant_result);

      if($check_quant_rows['item_quantity'] < $item_quantity){
        echo 'inssufficient';
      }else{
        $query = "Insert into tbl_transfer_temp(transaction_number, item_barcode, item_name, cat, sub_category, item_quant, item_price, item_status, date_received, person_transfered, employee_code, ts_type, branch, transfer_status)values('"
        . $transaction_number . "','" . $item_barcode . "','" . $item_name . "','" . $category . "','" . $sub_category . "','" . $item_quantity . "','" . $price .  "','" . "ACTIVE" .  "','" . $date_received . "','" . $_SESSION['fullname'] . "','" . $_SESSION['b_staff_code'] . "','" . $ts_type . "','" . $branch . "','" . "FA" . "')";
        $result = mysqli_query($conn, $query)or die("Error : " . mysqli_error($conn));
        if($result === true){
          echo '<thead>';
          echo  '<tr>';
          ?>
          <th><input type="checkbox" id="main_check"><label for="main_check"> </label></th>
          <?php
          echo '<th> Transaction Number </th>';
          echo '<th> Employee Code </th>';
          echo '<th> Item Barcode </th>';
          echo '<th> Item Name </th>';
          echo '<th> Category </th>';
          echo '<th> Quantity </th>';
          echo '<th> TS Type </th>';
          echo '<th> Date </th>';
          echo '</tr>';
          echo '</thead>';
          echo '<tbody>';
          $transfered_query = "Select * from tbl_transfer_temp where employee_code = '" . $_SESSION['b_staff_code'] . "' and transaction_number = '" . $transaction_number . "'";
          $transfered_result = mysqli_query($conn, $transfered_query)or die("Error : " . mysqli_error($conn));
          while($transfered_rows = mysqli_fetch_array($transfered_result)){
            echo '<tr>';
            ?>
            <td><input type="checkbox" class="checkbox" id="<?php echo $transfered_rows['unique_id']; ?>"><label for="<?php echo $transfered_rows['unique_id']; ?>"> </label> </td>
            <?php
            echo '<td>' .
            '<!-- Hidden Fields -->
            <input type="hidden" name="h_ts_number[]" value="' .$transfered_rows['transaction_number'] . '">
            <input type="hidden" name="h_employee_code[]" value="'. $transfered_rows['employee_code'] .'">
            <input type="hidden" name="h_item_barcode[]" value="' . $transfered_rows['item_barcode'] . '">
            <input type="hidden" name="h_item_name[]" value="' . $transfered_rows['item_name'] . '">
            <input type="hidden" name="h_cat[]" value="' . $transfered_rows['cat'] . '">
            <input type="hidden" name="h_sub_category[]" value="' . $transfered_rows['sub_category'] .'">
            <input type="hidden" name="h_item_quant[]" value="' . $transfered_rows['item_quant'] . '">
            <input type="hidden" name="h_item_price[]" value="' . $transfered_rows['item_price'] .'">
            <input type="hidden" name="h_ts_type[]" value="' . $transfered_rows['ts_type'] . '">

            <input type="hidden" name="h_date_received[]" value="' . $transfered_rows['date_received'] . '">

            <!-- #END# of Hidden Fields -->'
            . $transfered_rows['transaction_number'] .
            '</td>';
            echo '<td>' . $transfered_rows['employee_code'] . '</td>';
            echo '<td>' . $transfered_rows['item_barcode'] . '</td>';
            echo '<td>' . $transfered_rows['item_name'] . '</td>';
            echo '<td>' . $transfered_rows['cat'] . '</td>';
            echo '<td>' . $transfered_rows['item_quant'] . '</td>';
            echo '<td>' . $transfered_rows['ts_type'] . '</td>';
            echo '<td>' . $transfered_rows['date_received'] . '</td>';
            echo '</tr>';
          }

          echo '</tbody>';
        }
      } // Else Parse End
    }else{
      $transfer_number_check = "Select * from tbl_transfer_temp where transaction_number = '" . $transaction_number . "'";
      $transfer_number_result = mysqli_query($conn, $transfer_number_check)or die("Error : " . mysqli_error($conn));
      $transfer_number_count = mysqli_num_rows($transfer_number_result);
      if($transfer_number_count >  0){
        echo "Transaction Exists, Please Refresh the page to get new code";
      }else{


        $update_trans_query = "Update tbl_transfer_number set transfer_number = '" . $transaction_number . "'";
        $update_trans_result = mysqli_query($conn, $update_trans_query)or die("Error : " . mysqli_error($conn));
        $check_quant_query = "Select * from tbl_goods_receive where item_barcode = '" . $item_barcode . "'";
        $check_quant_result = mysqli_query($conn, $check_quant_query)or die("Error : " . mysqli_error($conn));
        $check_quant_rows = mysqli_fetch_array($check_quant_result);

        if($check_quant_rows['item_quantity'] < $item_quantity){
          echo 'inssufficient';
        }else{
          $query = "Insert into tbl_transfer_temp(transaction_number, item_barcode, item_name, cat, sub_category, item_quant, item_price, item_status, date_received, person_transfered, employee_code, ts_type, branch, transfer_status)values('"
          . $transaction_number . "','" . $item_barcode . "','" . $item_name . "','" . $category . "','" . $sub_category . "','" . $item_quantity . "','" . $price .  "','" . "ACTIVE" .  "','" . $date_received . "','" . $_SESSION['fullname'] . "','" . $_SESSION['b_staff_code'] . "','" . $ts_type . "','" . $branch . "','" . "FA" . "')";
          $result = mysqli_query($conn, $query)or die("Error : " . mysqli_error($conn));
          if($result === true){
            echo '<thead>';
            echo  '<tr>';
            ?>
            <th><input type="checkbox" id="main_check"><label for="main_check"> </label></th>
            <?php
            echo '<th> Transaction Number </th>';
            echo '<th> Employee Code </th>';
            echo '<th> Item Barcode </th>';
            echo '<th> Item Name </th>';
            echo '<th> Category </th>';
            echo '<th> Quantity </th>';
            echo '<th> TS Type </th>';
            echo '<th> Date </th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            $transfered_query = "Select * from tbl_transfer_temp where employee_code = '" . $_SESSION['b_staff_code'] . "' and transaction_number = '" . $transaction_number . "'";
            $transfered_result = mysqli_query($conn, $transfered_query)or die("Error : " . mysqli_error($conn));
            while($transfered_rows = mysqli_fetch_array($transfered_result)){
              echo '<tr>';
              ?>

              <td><input type="checkbox" class="checkbox" id="<?php echo $transfered_rows['unique_id']; ?>"><label for="<?php echo $transfered_rows['unique_id']; ?>"> </label> </td>
              <?php
              echo '<td>' .
              '<!-- Hidden Fields -->
              <input type="hidden" name="h_ts_number[]" value="' .$transfered_rows['transaction_number'] . '">
              <input type="hidden" name="h_employee_code[]" value="'. $transfered_rows['employee_code'] .'">
              <input type="hidden" name="h_item_barcode[]" value="' . $transfered_rows['item_barcode'] . '">
              <input type="hidden" name="h_item_name[]" value="' . $transfered_rows['item_name'] . '">
              <input type="hidden" name="h_cat[]" value="' . $transfered_rows['cat'] . '">
              <input type="hidden" name="h_sub_category[]" value="' . $transfered_rows['sub_category'] .'">
              <input type="hidden" name="h_item_quant[]" value="' . $transfered_rows['item_quant'] . '">
              <input type="hidden" name="h_item_price[]" value="' . $transfered_rows['item_price'] .'">
              <input type="hidden" name="h_ts_type[]" value="' . $transfered_rows['ts_type'] . '">

              <input type="hidden" name="h_date_received[]" value="' . $transfered_rows['date_received'] . '">

              <!-- #END# of Hidden Fields -->'
              . $transfered_rows['transaction_number'] .
              '</td>';
              echo '<td>' . $transfered_rows['employee_code'] . '</td>';
              echo '<td>' . $transfered_rows['item_barcode'] . '</td>';
              echo '<td>' . $transfered_rows['item_name'] . '</td>';
              echo '<td>' . $transfered_rows['cat'] . '</td>';
              echo '<td>' . $transfered_rows['item_quant'] . '</td>';
              echo '<td>' . $transfered_rows['ts_type'] . '</td>';
              echo '<td>' . $transfered_rows['date_received'] . '</td>';
              echo '</tr>';
            }

            echo '</tbody>';
          }
        }
      } // Else Parse End
    }


  }


}
?>
