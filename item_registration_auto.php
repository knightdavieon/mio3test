<?php require_once("Connection.php"); ?>
<?php 
      $term = $_GET['term'];
      $term_query = "Select * from tbl_swho_items where inventory_code Like '%" . $term . "%'";
      $term_result = mysqli_query($conn, $term_query)or die("Error :" );
      $array = array();
      while($rows = mysqli_fetch_array($term_result)){
            $array[] = $rows['inventory_code'];
      }
      echo json_encode($array);
?>