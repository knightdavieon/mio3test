<?php require_once("Connection.php"); ?>
<?php 
$day = date('d');
$month = date('m');
$year = date('Y');
$fullDate = $month . "/" . $day . "/" . $year;

if(isset($_REQUEST['item_barcode'])){
        $item_barcode = mysqli_real_escape_string($conn, $_REQUEST['item_barcode']);
        $item_name = mysqli_real_escape_string($conn, $_REQUEST['item_name']);
        $category = mysqli_real_escape_string($conn, $_REQUEST['category']);
        $sub_category = mysqli_real_escape_string($conn, $_REQUEST['sub_category']);
        $item_price = mysqli_real_escape_string($conn, $_REQUEST['item_price']);
        $description = mysqli_real_escape_string($conn, $_REQUEST['description']);
        $duplicate_query = "Select * from tbl_swho_items where item_barcode = '" . $item_barcode . "'";
        $duplicate_result = mysqli_query($conn, $duplicate_query);
        $duplicate_count = mysqli_num_rows($duplicate_result);
        if($duplicate_count > 0){
             echo "Exists";
        }else{
        $existing_query = "Select * from tbl_swho_items_temp where item_barcode = '" . $item_barcode . "'";
        $existing_result = mysqli_query($conn, $existing_query);
        $existing_count = mysqli_num_rows($existing_result);
        if($existing_count > 0){
             echo "Table Exists";
        }else{

        
         $item_query = " Insert into tbl_swho_items_temp(item_barcode, item_name, cat, sub_category, item_price, Description, item_status, date_created)values('" . $item_barcode . 
        "','" . $item_name . "','" . $category . "','" . $sub_category . "','" . $item_price . "','" . $description . "','" . "ACTIVE" . "','" . $fullDate . "')";
        $item_result = mysqli_query($conn, $item_query);
        if($item_result === true){
            echo '<thead>';
                    echo '<tr>';
                        echo '<th>' . "Item Barcode" . '</th>';
                        echo '<th>' . "Item Name" . '</th>';
                        echo '<th>' . "Category" . '</th>';
                        echo '<th>' . "Sub Category" . '</th>';
                        echo '<th>' . "Price" . '</th>';
                        echo '<th>' . "Description" . '</th>';
                      echo '</tr>';
              echo '</thead>';
              echo '<tbody>';
                     $select_query = "Select * from tbl_swho_items_temp limit 0, 150";
                     $select_result = mysqli_query($conn, $select_query);
                     while($select_rows = mysqli_fetch_array($select_result)){
                         echo '<tr>';
                             ?>
                               <td>
                               <input type="hidden" name="item_barcode[]" value="<?php echo $select_rows['item_barcode']; ?>">
                               <input type="hidden" name="item_name[]" value="<?php echo $select_rows['item_name']; ?>">
                               <input type="hidden" name="cat[]" value="<?php echo $select_rows['cat']; ?>">
                               <input type="hidden" name="sub_category[]" value="<?php echo $select_rows['sub_category']; ?>">
                               <input type="hidden" name="item_price[]" value="<?php echo $select_rows['item_price']; ?>">
                               <input type="hidden" name="description[]" value="<?php echo $select_rows['Description']; ?>">
                                <?php echo $select_rows['item_barcode'] ?></td>
                             <?php
                        
                             echo '<td>' . $select_rows['item_name'] . '</td>';
                             echo '<td>' . $select_rows['cat'] . '</td>';
                             echo '<td>' . $select_rows['sub_category'] . '</td>';
                             echo '<td>' . $select_rows['item_price'] . '</td>';
                             echo '<td>' . $select_rows['Description'] . '</td>';
                                
                          echo '</tr>';
                     }
               echo '</tbody>';
        
        }
    }
}
}
?>