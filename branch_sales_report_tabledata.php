<?php require_once("Connection.php"); ?>
<?php 
   if(isset($_POST['data'])){
        $arrayList = $_POST['data'];
        ?>
        <table class="table table-bordered table-striped" id="selected_table">
        <thead>
             <tr>
                                                 <th> Transaction Number </th>
                                                 <th> Invoice Number </th>
                                                 <th> Staff Code </th>
                                                 <th> Staff Name </th>
                                                 <th> Barcode </th>
                                                 <th> Description </th>
                                                 <th> Quantity </th>
                                                 <th> Price </th>
                                                 <th> Total </th>
                                                 <th> Date </th>
               </tr>
          </thead>
    <tbody>
    <?php
        foreach($arrayList as $frows){
          
             $query = "Select * from tbl_sales where transaction_number IN ('" . $frows . "')";
             $result = mysqli_query($conn, $query)or die("Error : " . mysqli_error($conn));
             while($rows = mysqli_fetch_array($result)){
               ?>
                 <tr>
                      <td><?php echo $rows['transaction_number']; ?></td>
                      <td><?php echo $rows['invoice_number']; ?></td>
                      <td><?php echo $rows['staff_code']; ?></td>
                      <td><?php echo $rows['staff_name']; ?></td>
                      <td><?php echo $rows['item_barcode']; ?></td>
                      <td><?php echo $rows['item_name']; ?></td>
                      <td><?php echo $rows['quant']; ?></td>
                      <td><?php echo $rows['price']; ?></td>
                      <td><?php echo $rows['total']; ?></td>
                      <td><?php echo $rows['date_transaction']; ?></td>
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