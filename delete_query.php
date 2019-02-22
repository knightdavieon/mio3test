<?php 
   session_start();
   require_once("Connection.php");
?>
<?php 
    if(isset($_GET['uid']) && isset($_GET['barcode']) && isset($_GET['quant'])){
          $select_query = "Select * from tbl_items where inventory_code = '" . mysqli_real_escape_string($conn, $_GET['barcode']) . "' and item_b_code = '" . $_SESSION['b_code'] . "'";
          $select_result = mysqli_query($conn, $select_query);
          $select_rows = mysqli_fetch_array($select_result);
          $total_stocks = $select_rows['item_stocks'] + $_GET['quant'];
          $update_query = "Update tbl_items set item_stocks = '" . $total_stocks . "' where inventory_code = '" . mysqli_real_escape_string($conn, $_GET['barcode']) . "' and item_b_code = '" . $_SESSION['b_code'] . "'";
          $update_result = mysqli_query($conn, $update_query)or die("Error : " . mysqli_error($conn));
          if($update_result === true){
                $delete_query = "Delete from tbl_staff_sales where uid = '" . mysqli_real_escape_string($conn, $_GET['uid']) . "'";
                $delete_result = mysqli_query($conn, $delete_query)or die("Error : " . mysqli_error($conn));
               if($delete_result === true){
                     echo '<script type="text/javascript"> alert("Successfully Removed one record from the list"); window.location="sales_page.php"; </script>';
               }
          }
    }
?>