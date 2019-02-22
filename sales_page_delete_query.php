<?php require_once("Connection.php"); ?>
<?php 
    if(isset($_POST['data'])){
         $arrayList = $_POST['data'];
         $delete_message = false;
         foreach($arrayList as $frows){
                $delete_query = "Delete from tbl_sales_temp where _id = '" . $frows . "'";
                $delete_result = mysqli_query($conn, $delete_query);
                if($delete_result === true){
                     $delete_message = true;
                }
         }
         if($delete_message){
               echo "Selected items successfully removed";
         }
    }
?>