<?php require_once("Connection.php"); ?>
<?php 
    if(isset($_REQUEST['cat_name'])){
         
         $cat_name = mysqli_real_escape_string($conn, $_REQUEST['cat_name']);
         $duplicate_check_query = "Select * from tbl_categories where cat_1 = '" . $cat_name . "'";
         $duplicate_check_result = mysqli_query($conn, $duplicate_check_query);
         $duplicate_check_count = mysqli_num_rows($duplicate_check_result);
         if($duplicate_check_count > 0){
             echo "Exists";
         }else{
         $cat_query = "Insert into tbl_categories(cat_1)values('" . $cat_name . "')";
         $cat_result = mysqli_query($conn, $cat_query)or die("Error : " . mysqli_error($conn));
         if($cat_result === true){
 
          echo '<label> Category </label>';
           echo '<div class="form-group">'; 
             echo '<div class="form-line">';
            echo '<select class="form-control" id="category" style="cursor:pointer;">';
             echo '<option disabled="disabled" selected="selected"> ---- Select Category ---- </option>'; 
             $select_query = "Select * from tbl_categories";  
             $select_result = mysqli_query($conn, $select_query)or die("Error : " . mysqli_error($conn));
             while($select_rows = mysqli_fetch_array($select_result)){
                  echo '<option value="'.$select_rows['cat_1'].'">' . $select_rows['cat_1'] . '</option>';
             }
          echo '<select>';
            echo '</div>';
           echo '</div>'; 
       
         }else{
             echo "Failed";
         }
         }
        
    }
?>