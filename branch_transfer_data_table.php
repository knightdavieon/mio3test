<?php session_start(); require_once("Connection.php"); ?>
<?php 
        if(isset($_REQUEST['trans_number'])){
            $trans_number = mysqli_real_escape_string($conn, $_REQUEST['trans_number']);
           
            $validate_query = "Select * from tbl_branch_transfer_item_temp where transaction_number = '" . $trans_number . "'";
            $validate_result = mysqli_query($conn, $validate_query);
            $validate_count = mysqli_num_rows($validate_result);
            if($validate_count > 0){
            $trans_query = "Select * from tbl_branch_transfer_item_temp where transaction_number = '" . $trans_number . "'";
            $trans_result = mysqli_query($conn, $trans_query)or die("Error : " . mysqli_error($conn));
           
                    echo '<thead>';
                         echo '
                            <tr>
                                                      <th> <input type="checkbox" id="main_check"><label for="main_check"></label> </th>
                                                      <th> Transaction Number </th>
                                                      <th> Employee Code </th>
                                                      <th> Item Barcode </th>
                                                      <th> Category </th>
                                                      <th> Quantity </th>
                                                      <th> Remarks </th>
                                                      <th> Transfer To </th>
                               </tr>
                         ';
                    echo '</thead>';

               while($trans_rows = mysqli_fetch_array($trans_result)){
                    echo '<tbody>';
                             if($trans_rows['receiving_status'] != "FR" && $trans_rows['receiving_status'] != "RTR"){
                                        echo '<tr>
                                        <td>
                                                                  <input type="checkbox" class="chkbox" id="' . $trans_rows['uid']. '" name="id[]">
                                                                  <label for="' . $trans_rows['uid'] .'">
                                                                </td>
                                        <td> 
                                        <input type="hidden" id="c_trans_num" name="transaction_number[]" value="'. $trans_rows['transaction_number'] .'">
                                        <input type="hidden" name="employee_code[]" value="'. $trans_rows['employee_code'] .'">
                                        <input type="hidden" name="item_barcode[]" value="'. $trans_rows['item_barcode'] .'">
                                        <input type="hidden" name="item_name[]" value="'. $trans_rows['item_name'] .'">
                                        <input type="hidden" name="cat[]" value="'. $trans_rows['cat'] .'">
                                        <input type="hidden" name="sub_cat[]" value="'. $trans_rows['sub_cat'] .'">
                                        <input type="hidden" name="quant[]" value="'. $trans_rows['quant'] .'">
                                        <input type="hidden" name="price[]" value="'. $trans_rows['price'] .'">
                                        <input type="hidden" name="remarks[]" value="'. $trans_rows['remarks'] .'">
                                        <input type="hidden" name="transfer_to[]" value="'. $trans_rows['transfer_to'] .'">
                                        <input type="hidden" name="transfer_date[]" value="'. $trans_rows['transfer_date'] .'">
                                        
                                        ' . $trans_rows['transaction_number'] . ' </td>
                                        <td> ' . $trans_rows['employee_code'] . ' </td>
                                        <td> ' . $trans_rows['item_barcode'] . ' </td>
                                        <td> ' . $trans_rows['cat'] . ' </td>
                                        <td> ' . $trans_rows['quant'] . ' </td>
                                        <td> ' . $trans_rows['remarks'] . ' </td>
                                        <td> ' . $trans_rows['transfer_to'] . ' </td>
                                       
                                 </tr>'; 
                             }
                          
                      echo '</tbody>';
            }
            }else{
                echo "Please refresh the page to get a new transaction number";
            }
           
        
}
?>