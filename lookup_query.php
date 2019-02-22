<?php require_once("Connection.php"); ?>
<?php 
   if(isset($_GET['r_id'])){
        $r_id = mysqli_real_escape_string($conn, $_GET['r_id']);
        $query = "Select * from tbl_transfer_history where r_id = '" . $r_id . "'";
        $result = mysqli_query($conn, $query)or die("Error : " . mysqli_error($conn));
        $rows = mysqli_fetch_array($result);    
          echo '<div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">';      
          echo '<label> Return ID : </label>';
          echo '</div>';
          echo '<div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">';      
          echo '<label> '. $rows['r_id'] .' </label>';
          echo '</div>';
          echo '<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12"> </div>';
          echo '<div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">';      
          echo '<label> Inventory Code : </label>';
          echo '</div>';
          echo '<div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">';      
          echo '<label> '. $rows['inventory_code'] .' </label>';
          echo '</div>';
          echo '<div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">';      
          echo '<label> Item Name : </label>';
          echo '</div>';
          echo '<div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">';      
          echo '<label> '. $rows['item_name'] .' </label>';
          echo '</div>';
          echo '<div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">';      
          echo '<label> Description : </label>';
          echo '</div>';
          echo '<div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">';      
          echo '<label> '. $rows['item_description'] .' </label>';
          echo '</div>';
          echo '<div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">';      
          echo '<label> Item Stocks : </label>';
          echo '</div>';
          echo '<div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">';      
          echo '<label> '. $rows['item_stocks'] .' </label>';
          echo '</div>';
          echo '<div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">';      
          echo '<label> Price : </label>';
          echo '</div>';
          echo '<div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">';      
          echo '<label> '. $rows['item_price'] .' </label>';
          echo '</div>';
          echo '<div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">';      
          echo '<label> Transfered Date : </label>';
          echo '</div>';
          echo '<div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">';      
          echo '<label> '. $rows['item_date'] .' </label>';
          echo '</div>';
          echo '<div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">';      
          echo '<label> Transfered To : </label>';
          echo '</div>';
          echo '<div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">';      
          echo '<label> '. $rows['transfered_from'] .' </label>';
          echo '</div>';
          echo '<div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">';      
          echo '<label> Item From : </label>';
          echo '</div>';
          echo '<div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">';      
          echo '<label> '. $rows['item_branch'] .' </label>';
          echo '</div>';
          echo '<div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">';      
          echo '<label> Item Status : </label>';
          echo '</div>';
          echo '<div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">';
          if($rows['item_status'] == "ACTIVE"){
              echo '<label style="color:#009900"> '. "ACTIVE" .' </label>';
          }else{
              echo '<label style="color:#cc0000"> '. "ACTIVE" .' </label>';
          }
         
          echo '</div>';
         }
   
?>