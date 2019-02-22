<?php require_once("Connection.php"); ?>
<?php 
   if(isset($_GET['ecode'])){
          $remove_query = "Delete from tbl_users where b_staff_code = '" . stripslashes($_GET['ecode']) . "'";
          $remove_result = mysqli_query($conn, $remove_query);
          if($remove_result === true){
                echo "Removed";
          }
   }
?>