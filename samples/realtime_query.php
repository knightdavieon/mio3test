<?php require_once("Connection.php"); ?>
<?php 
     if(isset($_REQUEST['ecode'])){
        $ecode = mysqli_real_escape_string($conn, $_REQUEST['ecode']);
        $name = mysqli_real_escape_string($conn, $_REQUEST['name']);
        $inventory_code = mysqli_real_escape_string($conn, $_REQUEST['inventory_code']);
        $item_name = mysqli_real_escape_string($conn, $_REQUEST['item_name']);
        $item_sold = mysqli_real_escape_string($conn, $_REQUEST['item_sold']);
        $query = "Insert into tbl_sales_record(employee_code, full_name, inventory_code, item_name, item_sold)values('"
        . $ecode . "','" . $name . "','" . $inventory_code . "','" . $item_name . "','" . $item_sold . "')";
        $result = mysqli_query($conn, $query)or die("Error : " . mysqli_error($conn));
        if($result === true){
          echo '<thead>';
            echo '<tr>';
                echo '<th> Employee Code </th>'; 
                echo '<th> Full Name </th>'; 
                echo '<th> Inventory Code </th>'; 
                echo '<th> Item Name </th>'; 
                echo '<th> Item Sold </th>'; 
             echo '</tr>';
          echo '</thead>';
             $fetch_query = "Select * from tbl_sales_record";
             $fetch_result = mysqli_query($conn, $fetch_query);
              while($fetch_rows = mysqli_fetch_array($fetch_result)){
          echo '<tbody>';
             echo '<tr>';
                echo '<td>' . $fetch_rows['employee_code'] . '</td>';
                echo '<td>' . $fetch_rows['full_name'] . '</td>';
                echo '<td>' . $fetch_rows['inventory_code'] . '</td>';
                echo '<td>' . $fetch_rows['item_name'] . '</td>';
                echo '<td>' . $fetch_rows['item_sold'] . '</td>';
             echo '<tr>';
         echo '</tbody>';
          }
        }else{
              echo "False";
        }
     }

?>