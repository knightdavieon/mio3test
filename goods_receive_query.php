<?php require_once("Connection.php"); ?>
<?php
date_default_timezone_set('Asia/Manila');
$day = date('d');
$month = date('m');
$year = date('Y');
$fullDate = $month . "/" . $day . "/" . $year;
?>
<?php 
     if(isset($_GET['item_barcode'])){
            $find_query = "Select * from tbl_swho_items where item_barcode = '" . mysqli_real_escape_string($conn, $_GET['item_barcode']) . "'";
            $find_result = mysqli_query($conn, $find_query)or die("Error : " . mysqli_error($conn));
            $find_rows = mysqli_fetch_array($find_result);
            $find_count = mysqli_num_rows($find_result);
            if($find_count > 0){
                    echo '<div class="col-md-3 col-lg-3 col-xs-10 col-sm-10">';
                   echo '<label> Description </label>';
                    echo '<div class="form-group">';
                         echo '<div class="form-line">';
                               echo '<input type="text" class="form-control" disabled="disabled" value="'.$find_rows['item_name'].'" id="item_name">';
                           echo '</div>';
                      echo '</div>';
             echo '</div>';
            echo '<div class="col-md-2 col-lg-2 col-xs-10 col-sm-10">';
                   echo '<label> Category </label>';
                    echo '<div class="form-group">';
                         echo '<div class="form-line">';
                               echo '<input type="text" class="form-control" disabled="disabled" value="'.$find_rows['cat'].'" id="cat">';
                           echo '</div>';
                      echo '</div>';
             echo '</div>';
               echo '<div class="col-md-2 col-lg-2 col-xs-10 col-sm-10">';
                   echo '<label> Sub Category </label>';
                    echo '<div class="form-group">';
                         echo '<div class="form-line">';
                               echo '<input type="text" class="form-control" disabled="disabled" value="'.$find_rows['sub_cat'].'" id="sub_category">';
                           echo '</div>';
                      echo '</div>';
             echo '</div>';
               echo '<div class="col-md-2 col-lg-2 col-xs-10 col-sm-10">';
                   echo '<label> Quantity </label>';
                    echo '<div class="form-group">';
                         echo '<div class="form-line">';
                               echo '<input type="text" class="form-control" id="item_quant">';
                           echo '</div>';
                      echo '</div>';
             echo '</div>';
               echo '<div class="col-md-2 col-lg-2 col-xs-10 col-sm-10">';
                   echo '<label> Price </label>';
                    echo '<div class="form-group">';
                         echo '<div class="form-line">';
                               echo '<input type="text" class="form-control" disabled="disabled" value="'.$find_rows['item_price'].'" id="item_price">';
                           echo '</div>';
                      echo '</div>';
             echo '</div>';
               echo '<div class="col-md-6 col-lg-6 col-xs-10 col-sm-10">';
                   echo '<label> Additional Description </label>';
                    echo '<div class="form-group">';
                         echo '<div class="form-line">';
                               echo '<input type="text" class="form-control" disabled="disabled" value="'.$find_rows['item_description'].'" id="item_description">';
                           echo '</div>';
                      echo '</div>';
             echo '</div>';
               echo '<div class="col-md-2 col-lg-2 col-xs-10 col-sm-10">';
                   echo '<label> Date </label>';
                    echo '<div class="form-group">';
                         echo '<div class="form-line">';
                               echo '<input type="text" class="form-control" disabled="disabled" value="'.$fullDate.'" id="reg_date">';
                           echo '</div>';
                      echo '</div>';
             echo '</div>';
            }else{
                 echo "Not Found";
            }
          
     }
?>