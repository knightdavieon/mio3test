<?php 
   require_once('Connection.php');
   if(isset($_GET['icode'])){
        $query = "Select * from tbl_promotional_sales where entry_num = '" . stripslashes($_GET['icode']) . "'";
        $result = mysqli_query($conn, $query)or die("Error : " . mysqli_error($conn));
        ?>
       
        <table id="set_promo" class="table table-striped table-bordered" style="width:100%;">
             <thead>
                 <tr>
                    
                       <th> Barcode </th>
                       <th> Set Time </th>
                       <th> End Time </th>
                       <th> Set Date </th>
                       <th> End Date </th>
                       <th> Branch </th>
                       <th> Set By &amp; Employee Code </th>
                 
                   </tr>
              </thead> 
              <tbody>
               <?php 
                  while($rows = mysqli_fetch_array($result)){
               ?>
                  <tr>
                    
                     <td><?php echo $rows['item_barcode']; ?></td>
                     <td><?php echo $rows['set_time']; ?></td>
                     <td><?php echo $rows['end_time']; ?></td>
                     <td><?php echo $rows['set_date']; ?></td>
                     <td><?php echo $rows['end_date']; ?></td>
                     <td><?php echo $rows['branch']; ?></td>
                     <td><?php echo $rows['employee_name'] . " & " . $rows['employee_code']; ?></td>
                  
                   </tr>
                   <?php } ?>
               </tbody>
         </table>
    <?php 
   }
?>