<?php require_once("Connection.php"); ?>
<?php 
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
?>