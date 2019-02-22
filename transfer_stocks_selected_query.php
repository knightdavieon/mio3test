<?php require_once("Connection.php"); ?>
<?php 
   if(isset($_POST['data'])){
       $arrayList = $_POST['data'];
       ?>
    <table class="table table-striped table-bordered" id="selected_table">
    <thead>
         <tr>
              <th> TS Number </th>
              <th> Barcode </th>
              <th> Description </th>
              <th> Category </th>
              <th> Sub Category </th>
              <th> Quantity </th>
              <th> Price </th>
              <th> TS Type </th>
              <th> Transfered to </th>
              <th> TS Date </th>
            </tr>
     </thead>
     <tbody>
    <?php
       foreach($arrayList as $frows){
            $query = "Select * from tbl_transfer_history where transaction_number IN ('" . $frows . "')";
            $result = mysqli_query($conn, $query)or die("Error : " . mysqli_error($conn));
            while($rows = mysqli_fetch_array($result)){
                  ?>
                  <tr>
                       <td><?php echo $rows['transaction_number']; ?></td>
                       <td><?php echo $rows['item_barcode']; ?></td>
                       <td><?php echo $rows['item_name']; ?></td>
                       <td><?php echo $rows['cat']; ?></td>
                       <td><?php echo $rows['sub_category']; ?></td>
                       <td><?php echo $rows['item_quant']; ?></td>
                       <td><?php echo $rows['item_price']; ?></td>
                       <td><?php echo $rows['ts_type']; ?></td>
                       <td><?php echo $rows['branch']; ?></td>
                       <td><?php echo $rows['date_received']; ?></td>
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