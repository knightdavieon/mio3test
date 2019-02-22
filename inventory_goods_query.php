<?php require_once("Connection.php"); ?>
<?php 
   if(isset($_GET['icode'])){
         $query = "Select * from tbl_goods_receive_history where item_barcode = '" . stripslashes($_GET['icode']) . "'";
         $result = mysqli_query($conn, $query);
         while($rows = mysqli_fetch_array($result)){
            ?>
            
        <?php
         }
   }
?>