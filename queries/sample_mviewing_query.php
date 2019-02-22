<?php require_once("Connection.php"); ?>
<?php 
   if(isset($_POST['data'])){
       $arrayList = $_POST['data'];
    ?>
    <table border="1" cellpadding="0" cellspacing="0">
    <thead>
         <tr>
               <th> Transaction Number </th>
               <th> Employee Code </th>
               <th> Staff Name </th>
               <th> Transfer To </th>
            </tr>
      </thead>
    <tbody>
    <?php
    foreach($arrayList as $frows){
       $query = "Select * from tbl_branch_transfer_history where transaction_number IN ('" . $frows . "')";
       $result = mysqli_query($conn, $query)or die("Error : " . mysqli_error($conn));
       while($rows = mysqli_fetch_array($result)){
        ?>
          <tr>
              <td><?php echo $rows['transaction_number']; ?></td>
              <td><?php echo $rows['employee_code']; ?></td>
              <td><?php echo $rows['staff_name']; ?></td>
              <td><?php echo $rows['transfer_to']; ?></td>
           </tr>
        <?php
       }
    }
    ?>
    </tbody>
    </table>
<?php
   }
?>
