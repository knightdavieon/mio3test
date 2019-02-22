<?php require_once("Connection.php"); ?>
<?php 
    if(isset($_POST['data'])){
        $arrayList = $_POST['data'];
        $s_branch = mysqli_real_escape_string($conn, $_REQUEST['s_branch_value']);
        ?>
          <table class="table table-striped table-bordered" id="selected_table">
                 <thead>
                        <tr>
                            <th>  Barcode </th>
                            <th>  Description </th>
                            <th>  Category </th>
                            <th>  Sub Category </th>
                            <th>  Quantity </th>
                            <th>  Price </th>
                            <th>  Transfered By </th>
                            <th>  Staff Code </th>
                          
                         </tr>
                    </thead>
                    <tbody>
                        <?php 
                           foreach($arrayList as $frows){
                               $query = "Select * from tbl_branch_goods_receive_history where item_barcode = '" . $frows . "' and branch = '" . $s_branch . "'";
                               $result = mysqli_query($conn, $query)or die("Error : " . mysqli_error($conn));
                               while($rows = mysqli_fetch_array($result)){
                                ?>
                                  <tr>
                                       <td><?php echo $rows['item_barcode']; ?></td>
                                       <td><?php echo $rows['item_name']; ?></td>
                                       <td><?php echo $rows['cat']; ?></td>
                                       <td><?php echo $rows['sub_category']; ?></td>
                                       <td><?php echo $rows['item_quant']; ?></td>
                                       <td><?php echo $rows['item_price']; ?></td>
                                       <td><?php echo $rows['person_transfered']; ?></td>
                                       <td><?php echo $rows['employee_code']; ?></td>
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