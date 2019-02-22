<?php session_start(); require_once('Connection.php'); ?>
<?php 
    if(isset($_REQUEST['item_barcode'])){
        //content_info_div
           $item_barcode = mysqli_real_escape_string($conn, $_REQUEST['item_barcode']);
           $b_code = mysqli_real_escape_string($conn, $_REQUEST['b_code']);
           $fetch_query = "Select * from tbl_branch_goods_receive where item_barcode = '" . $item_barcode . "' and branch_name = '" . $b_code . "'";
           $fetch_result = mysqli_query($conn, $fetch_query)or die("Error : " . mysqli_error($conn));
           $fetch_rows = mysqli_fetch_array($fetch_result);
           echo '<div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">';
                  echo '<label> Item Barcode : </label>';
             echo '</div>';
           echo '<div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">';
                  echo '<p> '. $fetch_rows['item_barcode'] .' </p>';
             echo '</div>';
           echo '<div class="col-md-12  col-lg-12 col-sm-12 col-xs-12"> </div>';
            echo '<div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">';
                  echo '<label> Item Name : </label>';
             echo '</div>';
           echo '<div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">';
                  echo '<p> '. $fetch_rows['item_name'] .' </p>';
             echo '</div>';
             echo '<div class="col-md-12  col-lg-12 col-sm-12 col-xs-12"> </div>';
               echo '<div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">';
                  echo '<label> Category : </label>';
             echo '</div>';
           echo '<div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">';
                  echo '<p> '. $fetch_rows['cat'] .' </p>';
             echo '</div>';
             echo '<div class="col-md-12  col-lg-12 col-sm-12 col-xs-12"> </div>';
                 echo '<div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">';
                  echo '<label> Sub Category : </label>';
             echo '</div>';
           echo '<div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">';
                  echo '<p> '. $fetch_rows['sub_category'] .' </p>';
             echo '</div>';
              echo '<div class="col-md-12  col-lg-12 col-sm-12 col-xs-12"> </div>';
               echo '<div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">';
                  echo '<label> Quantity : </label>';
             echo '</div>';
           echo '<div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">';
                  echo '<label> <small>'. $fetch_rows['item_quantity'] .' </small></label>';
             echo '</div>';
              echo '<div class="col-md-12  col-lg-12 col-sm-12 col-xs-12"> </div>';
                echo '<div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">';
                  echo '<label> Price : </label>';
             echo '</div>';
           echo '<div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">';
                  echo '<label style="color:#cc0000;"><small> P'. $fetch_rows['item_price'] .'</small></label>';
             echo '</div>';
              echo '<div class="col-md-12  col-lg-12 col-sm-12 col-xs-12"> </div>';
                   echo '<div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">';
                  echo '<label> Date Received : </label>';
             echo '</div>';
           echo '<div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">';
                  echo '<p> '. $fetch_rows['date_received'] .' </p>';
             echo '</div>';
     ?>
     <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"></div>
                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> <hr> </div>
         <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:-25px;">
                         <h3> Audit </h3>

                         <button type="submit" title="Export as CSV" name="btn_exp_csv" class="btn btn-success" style="width:30px;height:30px;padding-top:0;"><i class="material-icons" style="margin-left:-6px;margin-top:2px;"> grid_on </i> </button>
                                    <!-- Nav tabs --><div class="card">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Item Received HO</a></li>
                                        <li role="presentation"><a href="#i_received" aria-controls="i_received" role="tab" data-toggle="tab"> Item Received Branch </a></li>
                                        <!--<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Sales</a></li>-->
                                        <li role="presentation"><a href="#registered" aria-controls="registered" role="tab" data-toggle="tab">Transfer</a></li>
                                        <li role="presentation"><a href="#sales" aria-controls="sales" role="tab" data-toggle="tab">Sales</a></li>
                                        
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="home">
                                            <div class="container-fluid">
                                                 <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                                                      <table id="goods_table" class="table table-striped table-bordered">
                                                             <thead>
                                                                   <tr>
                                                                          <th> Docket Number </th>
                                                                          <th> Barcode </th>
                                                                          <th> Description </th>
                                                                          <th> Quantity  </th>
                                                                          
                                                                      </tr>
                                                                </thead>
                                                                <tbody>
                                                                       <?php 
                                                                           $goods_query = "Select * from tbl_branch_goods_receive_history where branch = '" . $_SESSION['b_code'] . "' and item_barcode = '" . $_REQUEST['item_barcode'] . "'";
                                                                           $goods_result = mysqli_query($conn, $goods_query);
                                                                           while($goods_rows = mysqli_fetch_array($goods_result)){
                                                                            ?>
                                                                               <tr>
                                                                                   <td><a href="branch_goods_receive_history_data.php?icode=<?php echo $goods_rows['transaction_number']; ?>"><?php echo $goods_rows['transaction_number']; ?></a></td>
                                                                                   <td><?php echo $goods_rows['item_barcode']; ?></td>
                                                                                   <td><?php echo $goods_rows['item_name']; ?></td>
                                                                                   <td><?php echo $goods_rows['item_quant']; ?></td>
                                                                                   
                                                                                </tr>
                                                                            <?php
                                                                           }
                                                                       ?>
                                                                 </tbody>
                                                         </table>
                                                    </div>
                                            </div>
                                        </div>
                                     
                                        <div role="tabpanel" class="tab-pane" id="registered">
                                          <div class="container-fluid">
                                                 <table id="transfer_table" class="table table-striped table-bordered">
                                                 <thead>
                                                       <tr>
                                                           <th> Transaction Number </th>
                                                           <th> Barcode </th>
                                                           <th> Description </th>
                                                           <th> Quantity </th>
                                                           <th> Date </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                         <?php 
                                                            $t_query = "Select * from tbl_branch_transfer_history where item_barcode = '" . $_REQUEST['item_barcode'] . "' and item_from = '" . $_SESSION['b_code'] . "'";
                                                            $t_result = mysqli_query($conn, $t_query);
                                                            while($t_rows = mysqli_fetch_array($t_result)){
                                                                ?>
                                                                 <tr>
                                                                      <td><a href="branch_transfer_history_data.php?icode=<?php echo $t_rows['transaction_number']; ?>"><?php echo $t_rows['transaction_number']; ?></a></td>
                                                                      <td><?php echo $t_rows['item_barcode']; ?></td>
                                                                      <td><?php echo $t_rows['item_name']; ?></td>
                                                                      <td><?php echo $t_rows['quant']; ?></td>
                                                                      <td><?php echo $t_rows['transfer_date']; ?></td>
                                                                   </tr>
                                                            <?php
                                                            }
                                                         ?>
                                                      </tbody>
                                                   </table>
                                         </div>
                                       </div>
                                         <div role="tabpanel" class="tab-pane" id="sales">
                                          <div class="container-fluid">
                                                  <table id="sales_table" class="table table-striped table-bordered">
                                                 <thead>
                                                       <tr>
                                                           <th> Transaction Number </th>
                                                           <th> Transaction Date </th>
                                                           <th> Barcode </th>
                                                           <th> Description </th>
                                                           <th> Quantity </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                           <?php 
                                                              $sales_query = "Select * from tbl_sales where branch = '" . $_SESSION['b_code'] . "' and item_barcode = '" . $_REQUEST['item_barcode'] . "'";
                                                              $sales_result = mysqli_query($conn, $sales_query)or die("Error :" . mysqli_error($conn));
                                                              while($sales_rows = mysqli_fetch_array($sales_result)){
                                                                  ?>
                                                                    <tr>
                                                                         <td><a href="branch_sales_report_data.php?scode=<?php echo $sales_rows['transaction_number']; ?>&amp;bcode=<?php echo $b_code; ?>"><?php echo $sales_rows['transaction_number']; ?></a></td>
                                                                        <td><?php echo $sales_rows['date_transaction']; ?></td>
                                                                        <td><?php echo $sales_rows['item_barcode']; ?></td>
                                                                        <td><?php echo $sales_rows['item_name']; ?></td>
                                                                        <td><?php echo $sales_rows['quant']; ?></td>
                                                                      </tr>
                                                                <?php
                                                              }
                                                           ?>
                                                      </tbody>
                                                   </table>
                                         </div>
                                       </div>
                                       <div role="tabpanel" class="tab-pane" id="i_received">
                                          <div class="container-fluid">
                                                     <table class="table table-striped table-bordered" id="branch_goods_table">
                                                           <thead> 
                                                                <tr>
                                                                     <th> Transaction Number  </th>
                                                                     <th> Barcode  </th>
                                                                     <th> Description  </th>
                                                                     <th> Quantity  </th>
                                                                 
                                                                  </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php 
                                                                    $branch_goods_query = "Select * from tbl_branch_transfer_history where item_barcode = '" . $_REQUEST['item_barcode'] . "' and transfer_to = '" . $_SESSION['b_code'] . "'";
                                                                    $branch_goods_result = mysqli_query($conn, $branch_goods_query)or die("Error : " . mysqli_error($conn));
                                                                    while($branch_goods_rows = mysqli_fetch_array($branch_goods_result)){
                                                                        ?>
                                                                        <tr>
                                                                              <td><a href="item_receive_branch_data.php?icode=<?php echo $branch_goods_rows['transaction_number']; ?>&amp;bcode=<?php echo $_SESSION['bcode'] ?>"><?php echo $branch_goods_rows['transaction_number']; ?></a></td>
                                                                              <td><?php echo $branch_goods_rows['item_barcode']; ?></td>
                                                                              <td><?php echo $branch_goods_rows['item_name']; ?></td>
                                                                              <td><?php echo $branch_goods_rows['quant']; ?></td>
                                                                           </tr>
                                                                    <?php
                                                                    }
                                                                ?>
                                                               </tbody>
                                                      </table>
                                         </div>
                                       </div>
                                    </div>
<?php
    }
?>