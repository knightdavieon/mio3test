<?php
session_start(); 
require_once("Connection.php"); 
date_default_timezone_set('Asia/Manila');
$day = date('d');
$month = date('m');
$year = date('Y');
$fullDate = $month . "/" . $day . "/" . $year;

?>
<?php 
    if(isset($_GET['b_code'])){
         $barcode = mysqli_real_escape_string($conn, $_GET['b_code']);
         $query = "Select * from tbl_items where inventory_code = '" . $barcode . "' and item_b_code = '" . $_SESSION['b_code'] . "'";
         $result = mysqli_query($conn, $query)or die("Error : " . mysqli_error($conn));
         while($rows = mysqli_fetch_array($result)){
           echo "<label> Barcode </label>";
           echo "<input type='text' class='form-control' id='barcode' value='". $rows['inventory_code'] ."'>";
           echo "<label> Item Name </label>";
           echo "<input type='text' class='form-control' id='item_name' value='". $rows['item_name'] ."'>";
           echo "<label> Quantity </label>";
           echo "<input type='text' class='form-control' name='quantity' id='item_quant' onkeyup='deduction_quant_function();' autocomplete='off'>";
           echo "<label> Item Stocks </label>";
           echo "<input type='text' class='form-control' name='item_stocks' id='item_stocks' value='". $rows['item_stocks']."'>";
           echo "<label> Price </label>";
           echo "<input type='text' class='form-control' name='item_price' id='item_price' value='". $rows['item_price']."'>";
        }
    }
?>