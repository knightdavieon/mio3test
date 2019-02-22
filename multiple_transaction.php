<?php require_once("Connection.php"); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
         <title> </title>
       </head>
       <body>
             <div>
                   <?php 
                      if(isset($_POST['btn_sample'])){
                            $chk_value = $_POST['checkboxid'];
                            $array = array();
                            $array[] = $chk_value;
                            $i_array = array();
                            foreach($array as $chk_val){
                                  $i_rows = implode("','", $chk_val);
                                  $query = "Select * from tbl_swho_items where inventory_code IN ('" . $i_rows . "')";
                                  $result = mysqli_query($conn, $query)or die("Error : " . mysqli_error($conn));
                                  while($rows = mysqli_fetch_array($result)){
                                        $i_array[] = $rows;
                                  } 
                            }    
                      }
                   ?>
                </div>
          </body>
  </html>