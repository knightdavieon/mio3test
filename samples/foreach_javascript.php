<?php session_start(); require_once("Connection.php"); ?>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  

     <?php 
        $query = "Select * from tbl"
     ?>
     <table border="1">
           <thead>
                 <tr>
                     <th> Employee Code </th>
                     <th> Staff Name </th>
                  </tr>
              </thead>
              <tbody>
                      <?php 
                         $select_query = "Select * from tbl_staff_sales";
                         $select_result = mysqli_query($conn, $select_query);
                         while($select_rows = mysqli_fetch_array($select_result)){
                            ?>
                               <tr>
                                   <td><?php echo $select_rows['employee_code'] ?></td>
                                   <td><?php echo $select_rows['staff_name'] ?></td>
                                  </tr>
                            <?php
                         }
                      ?>
                 </tbody>
        </table>
     
