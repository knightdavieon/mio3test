<?php require_once("Connection.php"); ?>
<?php 
    if(isset($_POST['btn_submit'])){
         $bool_message = false;
         foreach($_POST['employee_code'] as $key => $value){
             $ecode = mysqli_real_escape_string($conn, $_POST['employee_code'][$key]);
             $staff_name = mysqli_real_escape_string($conn, $_POST['staff_name'][$key]);
             $uid = mysqli_real_escape_string($conn, $_POST['uid'][$key]);
            $update_query = "Update tbl_sales set staff_name = '" . $staff_name . "', employee_code = '" . $ecode . "' where uid = '" .$uid . "'";
            $update_result = mysqli_query($conn, $update_query)or die("Error : " . mysqli_error($conn));
            if($update_result === true){
                 $bool_message = true;
            }    
         }
         if($bool_message){
               echo '<script type="text/javascript"> alert("Working"); </script>';
         }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
      <head>
          <title> </title>
         </head>
         <body>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
           <button type="submit" name="btn_submit"> Add Values </button>
                <table border="1">
                       
                        <thead>
                              <tr>
                                     <th> Employee Code </th>
                                     <th> Staff Name </th>
                                     <th> Customer Name </th>
                                     <th> Invoice Number </th>
                               </tr>
                           </thead>
                           <tbody>
                           <?php 
                               $query = "Select * from tbl_sales";
                               $result = mysqli_query($conn, $query);
                               while($rows = mysqli_fetch_array($result)){
                                   ?>
                                    <tr>
                                   <td><?php echo $rows['employee_code']; ?> <input type="text" name="uid[]" value="<?php echo $rows['uid'] ?>"> <input type="text" name="employee_code[]" value="<?php echo $rows['employee_code'] ?>"> <input type="text" name="staff_name[]" value="<?php echo $rows['staff_name']; ?>"></td>
                                   <td><?php echo $rows['staff_name']; ?></td>
                                   <td><?php echo $rows['customer_name']; ?></td>
                                   <td><?php echo $rows['invoice_number']; ?></td>
                                 </tr>
                                   <?php
                               }
                           ?>
                               
                             </tbody>
                       
                   </table>
              </form>
            </body>
   </html>