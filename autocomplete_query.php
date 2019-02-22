<?php require_once("Connection.php"); ?>
<?php 
       $term = mysqli_real_escape_string($conn, $_GET['term']);
       $query = "Select * from tbl_swho_items where inventory_code like '%" . $term . "%'";
       $result = mysqli_query($conn, $query)or die("Error :" . mysqli_error($conn));
       $array = array();
      while($rows = mysqli_fetch_array($result)){
         $array[] = $rows['inventory_code'];
      }
      echo json_encode($array);
?>