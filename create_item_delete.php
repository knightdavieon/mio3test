<?php require_once("Connection.php"); ?>
<?php 
   if(isset($_POST['data'])){
         $arrayList = $_POST['data'];
        
         foreach($arrayList as $frows){
               $query = "Delete from tbl_swho_items_temp where _id = '" . $frows . "'";
               $result = mysqli_query($conn, $query);
            if($result === true){
                 echo "Selected items removed";
            }
         }
   }
?>