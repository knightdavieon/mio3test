<?php require_once("Connection.php"); ?>
<?php 
    if(isset($_POST['btn_submit'])){
         $update_message = false;
            foreach($_POST['uid'] as $key => $value){
                $select_query = "Select * from tbl_goods_receive_temp where unique_id IN ('" . $_POST['uid'][$key] . "')";
                $select_result = mysqli_query($conn, $select_query)or die("Error : " . mysqli_error($conn));
                while($select_rows = mysqli_fetch_array($select_result)){
                     $total_quant = $select_rows['item_quantity'] + $_POST['item_quant'][$key];
                     $update_query = "Update tbl_goods_receive_temp set item_quantity = '" .  $total_quant . "' where unique_id = '" . $_POST['uid'][$key] . "'";
                     $update_result = mysqli_query($conn, $update_query)or die("Error : " . mysqli_error($conn));
                     if($update_result === true){
                          $update_message = true;
                     }
                }
                 /*   $item_barcode = mysqli_real_escape_string($conn, $_POST['item_barcode'][$key]);
                    $uid = mysqli_real_escape_string($conn, $_POST['uid'][$key]);
                    $item_quantity = mysqli_real_escape_string($conn, $_POST['item_quant'][$key]);*/
                    
            }
            if($update_message){
                 echo '<script type="text/javascript"> alert("Working"); </script>';
            }
       ?>
       
<?php
    }
?>
<!DOCTYPE html>
<html lang="en">
      <head>
           <title> </title>
         </head>
            <body>
                  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                        <table border="1">
                           <thead>
                                <tr>
                                   <th> Unique ID </th>
                                   <th> Item Barcode </th>
                                   <th> Item Name </th>
                                   <th> Category </th>
                                   <th> Sub Category </th>
                                   <th> Item Price </th>
                                   <th> Item Quantity </th>
                               </tr>
                             </thead>
                        <tbody>
                          <?php 
                               $select_query = "Select * from tbl_goods_receive_temp";
                               $select_result = mysqli_query($conn, $select_query)or die("Error :" . mysqli_error($conn));
                               while($select_rows = mysqli_fetch_array($select_result)){
                                ?>
                                <tr>
                                    <td><input type="hidden" name="uid[]" value="<?php echo $select_rows['unique_id']; ?>"><?php echo $select_rows['unique_id']; ?></td>
                                    <td><input type="hidden" name="item_barcode[]" value="<?php echo $select_rows['item_barcode']; ?>"><?php echo $select_rows['item_barcode']; ?></td>
                                    <td><?php echo $select_rows['item_name']; ?></td>
                                    <td><?php echo $select_rows['cat']; ?></td>
                                    <td><?php echo $select_rows['sub_category']; ?></td>
                                    <td><?php echo $select_rows['item_price']; ?></td>
                                    <td><input type="hidden" name="item_quant[]" value="<?php echo $select_rows['item_quantity']; ?>"><?php echo $select_rows['item_quantity']; ?></td>
                                 </tr>
                            <?php
                               }
                          ?>
                           </tbody>
                          </table>
                        <button type="submit" name="btn_submit"> Submit </button>
                     </form>
               </body>
   </html>