<?php require_once("Connection.php"); ?>
<?php 
    if(isset($_GET['check_barcode'])){
       $check_query = "Select * from tbl_swho_items where item_barcode = '" . mysqli_real_escape_string($conn, $_GET['check_barcode']) . "'";
       $check_result = mysqli_query($conn, $check_query)or die("Error : " . mysqli_error($conn));
       $check_count = mysqli_num_rows($check_result);
       if($check_count > 0){
            echo '<div class="alert alert-danger"><label>'. 'Item ' . mysqli_real_escape_string($conn, $_GET['check_barcode']) .' is already exists</label></div>';
       }
    }
?>