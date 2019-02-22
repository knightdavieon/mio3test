<?php require_once('../Connection.php'); ?>
<?php 
  if($conn){
        echo "Connected";
  }else{
      echo "Failed to connect to the server";
  }
?>