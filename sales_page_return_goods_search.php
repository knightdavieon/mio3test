<?php require_once("Connection.php"); ?>
 
<?php 
       if(isset($_GET['inv']) && isset($_GET['bcode'])){
            ?>
               <table class="table table-striped table-bordered" id="return_table" style="width:100%;">
                       <thead>
                              <tr>
                                  <th> Entry Number </th>
                                  <th> Barcode </th>
                                  <th> Quantity </th>
                                  <th> Total </th>
                                  <th> TS Date </th>
                                </tr>
                          </thead>
                        <tbody>
                             <?php 
                                $query = "Select * from tbl_sales where invoice_number = '" . stripslashes(trim($_GET['inv'])) . "' and item_barcode = '" . stripslashes(trim($_GET['bcode'])) . "'";
                                $result = mysqli_query($conn, $query)or die("Error : " . mysqli_error($conn));
                                $count = mysqli_num_rows($result);
                                $array = array();
                              
                                  while($rows = mysqli_fetch_array($result)){
                                    $array[] = $rows;
                                     ?>
                                     <tr>
                                    <td class="nr"><a href="#" class="e_num" onclick="enum_function();"> <?php echo $rows['_id']; ?></a></td>
                                    <td><?php echo $rows['item_barcode']; ?></td>
                                    <td><?php echo $rows['quant']; ?></td>
                                    <td><?php echo $rows['total']; ?></td>
                                    <td><?php echo $rows['date_transaction']; ?></td>
                                    </tr>
                                <?php
                                }
                             
                             ?>
                         </tbody>
                            
                 </table>
                                    
                                 <div class="col-md-4 col-lg-4 col-sm-5 col-xs-5">
                                             <label> Entry Number </label>
                                              <div class="form-group">
                                                     <div class="form-line">
                                                          <input type="text" class="form-control" name="enum" id="enum_value" onkeypress="return isNumber(event);">
                                                       </div>
                                                 </div>
                                          </div> 
                 <div class="col-md-4 col-lg-4 col-sm-5 col-xs-5">
                                             <label> Return Quantity</label>
                                              <div class="form-group">
                                                     <div class="form-line">
                                                          <input type="text" class="form-control" name="r_quant" id="r_quant" onkeypress="return isNumber(event);">
                                                       </div>
                                                 </div>
                                          </div>
                    <!-- Query Can be found in sales_page_add_info_query.php --> 
                      <div id="add_info_div">  </div>
                    <!-- END --> 
            <?php
       }
?>