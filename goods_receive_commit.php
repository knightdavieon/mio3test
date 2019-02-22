<?php session_start(); require_once("Connection.php"); ?>
<?php 
   if(isset($_REQUEST['employee_code'])){
        $employee_code = mysqli_real_escape_string($conn, $_REQUEST['employee_code']);
        $employee_name = mysqli_real_escape_string($conn, $_REQUEST['employee_name']);
        $docket_number = mysqli_real_escape_string($conn, $_REQUEST['docket_number']);
        $item_barcode = mysqli_real_escape_string($conn, $_REQUEST['item_barcode']);
        $item_name = mysqli_real_escape_string($conn, $_REQUEST['item_name']);
        $cat = mysqli_real_escape_string($conn, $_REQUEST['cat']);
        $sub_category = mysqli_real_escape_string($conn, $_REQUEST['sub_category']);
        $item_quant = mysqli_real_escape_string($conn, $_REQUEST['item_quant']);
        $item_price = mysqli_real_escape_string($conn, $_REQUEST['item_price']);
        $item_description = mysqli_real_escape_string($conn, $_REQUEST['item_description']);
        $reg_date = mysqli_real_escape_string($conn, $_REQUEST['reg_date']);
        $curr_d_value = mysqli_real_escape_string($conn, $_REQUEST['curr_d_value']);
      
        $check_docket_query = "Select * from tbl_goods_receive_temp where docket_number = '" . $docket_number . "' and employee_code = '" . $employee_code . "'";
        $check_docket_result = mysqli_query($conn, $check_docket_query)or die("Error : " . mysqli_error($conn));
        $check_docket_count = mysqli_num_rows($check_docket_result); 
        if(!empty($curr_d_value)){
              echo "Commit";
        }else{

      

        if($check_docket_count > 0){
                   $query = "Insert into tbl_goods_receive_temp(docket_number, employee_code, item_barcode, item_name, cat, sub_category, item_quantity, item_price, item_description, person_received, item_status, date_received)values('"
         . $docket_number . "','" . $employee_code . "','" . $item_barcode . "','" . $item_name . "','" . $cat . "','" . $sub_category . "','" . $item_quant . "','" . $item_price . "','" . $item_description . "','" . $employee_name . "','" . 
        "ACTIVE" . "','".  $reg_date . "')";
         $result = mysqli_query($conn, $query)or die ("Error : " . mysqli_error($conn));
         if($result === true){
              
               
               echo '<thead>';
                  echo '<tr>';
                        echo '<th> Docket Number </th>';
                        echo '<th> Employee Code </th>';
                        echo '<th> Item Barcode </th>';
                        echo '<th> Item Name </th>';
                        echo '<th> Category </th>';
                        echo '<th> Sub Category </th>';
                        echo '<th> Quantity </th>';
                        echo '<th> Price </th>';
                        echo '<th> Description </th>';
                        echo '<th> Date </th>';
                     echo '</tr>';
                echo '</thead>';
               echo '<tbody>';
                  $select_query = "Select * from tbl_goods_receive_temp where employee_code = '" . $_SESSION['b_staff_code'] . "'";
                  $selectL_query .= " limit 0, 50";
                  $select_result = mysqli_query($conn, $select_query)or die("Error : " . mysqli_erro($conn));
                    while($select_rows = mysqli_fetch_array($select_result)){
                          echo '<tr>';
                            echo '<td>  
                                                                <input type="hidden" name="unique_id[]" value="'. $select_rows['unique_id'] .'">
                                                                <input type="hidden" name="docket_num[]" value="'.$select_rows['docket_number'].'">
                                                                <input type="hidden" name="employee_code[]" value="'. $select_rows['employee_code'] . '">
                                                                <input type="hidden" name="person_received[]" value="'. $select_rows['person_received'] .'">
                                                                <input type="hidden" name="item_barcode[]" value="'. $select_rows['item_barcode'] .'">
                                                                <input type="hidden" name="item_name[]" value="'. $select_rows['item_name'] .'">
                                                                <input type="hidden" name="cat[]" value="' . $select_rows['cat'] . '">
                                                                <input type="hidden" name="sub_category[]" value="'. $select_rows['sub_category'] .'">
                                                                <input type="hidden" name="item_quantity[]" value="'. $select_rows['item_quantity'] .'">
                                                                <input type="hidden" name="item_price[]" value="' . $select_rows['item_price'] . '">
                                                                <input type="hidden" name="item_description[]" value="'. $select_rows['item_description'] .'">
                                                                <input type="hidden" name="date_received[]" value="'. $select_rows['date_received'] .'">
                                                                
                            ' . $select_rows['docket_number'] . '</td>';
                            echo '<td>' . $select_rows['employee_code'] . '</td>';
                            echo '<td>' . $select_rows['item_barcode'] . '</td>';
                            echo '<td>' . $select_rows['item_name'] . '</td>';
                            echo '<td>' . $select_rows['cat'] . '</td>';
                            echo '<td>' . $select_rows['sub_category'] . '</td>';
                            echo '<td>' . $select_rows['item_quantity'] . '</td>';
                            echo '<td>' . $select_rows['item_price'] . '</td>';
                            echo '<td>' . $select_rows['item_description'] . '</td>';
                            echo '<td>' . $select_rows['date_received'] . '</td>';
                        echo '</tr>';
                    }
                   
                echo '</tbody>';
         }

       
        }else{
             $docket_check_query = "Select * from tbl_goods_receive_temp where docket_number = '" . $docket_number . "'";
             $docket_check_result = mysqli_query($conn, $docket_check_query)or die("Error : " . mysqli_error($conn));
             $docket_check_count = mysqli_num_rows($docket_check_result);
             if($docket_check_count >  0){
                  echo "Docket Used";
             }else{
                     $update_docket_query = "Update tbl_goods_docket set docket_number = '" . $docket_number . "'";
              $update_docket_result = mysqli_query($conn, $update_docket_query)or die("Error : " . mysqli_error($conn));
              
               $query = "Insert into tbl_goods_receive_temp(docket_number, employee_code, item_barcode, item_name, cat, sub_category, item_quantity, item_price, item_description, person_received, item_status, date_received)values('"
         . $docket_number . "','" . $employee_code . "','" . $item_barcode . "','" . $item_name . "','" . $cat . "','" . $sub_category . "','" . $item_quant . "','" . $item_price . "','" . $item_description . "','" . $employee_name . "','" . 
        "ACTIVE" . "','".  $reg_date . "')";
         $result = mysqli_query($conn, $query)or die ("Error : " . mysqli_error($conn));
         if($result === true){
              
               
               echo '<thead>';
                  echo '<tr>';
                        echo '<th> Docket Number </th>';
                        echo '<th> Employee Code </th>';
                        echo '<th> Item Barcode </th>';
                        echo '<th> Item Name </th>';
                        echo '<th> Category </th>';
                        echo '<th> Sub Category </th>';
                        echo '<th> Quantity </th>';
                        echo '<th> Price </th>';
                        echo '<th> Description </th>';
                        echo '<th> Date </th>';
                     echo '</tr>';
                echo '</thead>';
               echo '<tbody>';
                  $select_query = "Select * from tbl_goods_receive_temp where employee_code = '" . $_SESSION['b_staff_code'] . "'";
                  $select_result = mysqli_query($conn, $select_query)or die("Error : " . mysqli_erro($conn));
                    while($select_rows = mysqli_fetch_array($select_result)){
                          echo '<tr>';
                            echo '<td>  
                                                                <input type="hidden" name="unique_id[]" value="'. $select_rows['unique_id'] .'">
                                                                <input type="hidden" name="docket_num[]" value="'.$select_rows['docket_number'].'">
                                                                <input type="hidden" name="employee_code[]" value="'. $select_rows['employee_code'] . '">
                                                                <input type="hidden" name="person_received[]" value="'. $select_rows['person_received'] .'">
                                                                <input type="hidden" name="item_barcode[]" value="'. $select_rows['item_barcode'] .'">
                                                                <input type="hidden" name="item_name[]" value="'. $select_rows['item_name'] .'">
                                                                <input type="hidden" name="cat[]" value="' . $select_rows['cat'] . '">
                                                                <input type="hidden" name="sub_category[]" value="'. $select_rows['sub_category'] .'">
                                                                <input type="hidden" name="item_quantity[]" value="'. $select_rows['item_quantity'] .'">
                                                                <input type="hidden" name="item_price[]" value="' . $select_rows['item_price'] . '">
                                                                <input type="hidden" name="item_description[]" value="'. $select_rows['item_description'] .'">
                                                                <input type="hidden" name="date_received[]" value="'. $select_rows['date_received'] .'">
                                                            
                            ' . $select_rows['docket_number'] . '</td>';
                            echo '<td>' . $select_rows['employee_code'] . '</td>';
                            echo '<td>' . $select_rows['item_barcode'] . '</td>';
                            echo '<td>' . $select_rows['item_name'] . '</td>';
                            echo '<td>' . $select_rows['cat'] . '</td>';
                            echo '<td>' . $select_rows['sub_category'] . '</td>';
                            echo '<td>' . $select_rows['item_quantity'] . '</td>';
                            echo '<td>' . $select_rows['item_price'] . '</td>';
                            echo '<td>' . $select_rows['item_description'] . '</td>';
                            echo '<td>' . $select_rows['date_received'] . '</td>';
                        echo '</tr>';
                    }
                   
                echo '</tbody>';
         }

             }

           
        } // End of else
             
     } 

   }
?>