<?php require_once("Connection.php"); ?>
<?php 
  if(isset($_POST['data'])){
        $dataArr = $_POST['data'];
       foreach($dataArr as $frows){
              $delete_query = "Delete from tbl_branch_transfer_item_temp where uid = '" . $frows . "'";
              $delete_result = mysqli_query($conn, $delete_query);
              if($delete_result === true){
                   echo "Selected data successfully removed";
              }
       }
  }
?>