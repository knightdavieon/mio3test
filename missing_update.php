<?php require_once("Connection.php"); ?>
<?php 
   if(mysqli_query($conn, "Update tbl_branch_goods_receive_history set branch = '" . "BODY MANI" . "' where transaction_number = '" . "11" . "'") === true){
          echo '<script type="text/javascript"> alert("Working"); </script>';
   }
?>  