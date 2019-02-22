<?php require_once("Connection.php"); ?>
<?php 
     if(isset($_POST['data'])){
            $arrayList = $_POST['data'];
            $message_result = false;
            foreach($arrayList as $frows){
                    $delete_query = "Delete from tbl_transfer_temp where unique_id = '" . $frows . "'";
                    $delete_result = mysqli_query($conn, $delete_query);
                    if($delete_result === true){
                          $message_result = true;
                    }
            }
            if($message_result){
                   echo "Items Selected Successfully Removed from the list";
            }
     }
?>