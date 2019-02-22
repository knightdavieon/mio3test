<?php require_once("Connection.php"); ?>
<?php 
    if(isset($_GET['icode'])){
           $query = "Select * from tbl_goods_receive where item_barcode = '" . stripslashes($_GET['icode']) . "'";
           $result = mysqli_query($conn, $query)or die('Error : ' . mysqli_error($conn));
           $rows = mysqli_fetch_array($result);
           ?>
                  <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                     <label> Item Barcode : </label>
                  </div>
                  <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                     <label> <?php echo $rows['item_barcode']; ?> </label>
                  </div>
                  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"></div>
                  <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                     <label> Item Name : </label>
                  </div>
                  <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                     <label> <?php echo $rows['item_name']; ?> </label>
                  </div>
                 <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"></div>
                  <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                     <label> Category : </label>
                  </div>
                  <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                     <label> <?php echo $rows['cat']; ?> </label>
                  </div>
                 <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"></div>
                  <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                     <label> Sub Category : </label>
                  </div>
                  <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                     <label> <?php echo $rows['sub_category']; ?> </label>
                  </div>
                 <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"></div>
                  <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                     <label> Quantity : </label>
                  </div>
                  <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                     <label> <?php echo $rows['item_quantity']; ?> </label>
                  </div>
                 <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"></div>
                  <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                     <label> Price : </label>
                  </div>
                  <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
                     <label style="color:#ff0000;"><small> <?php echo "P" . $rows['item_price']; ?> </small> </label>
                  </div>
                 <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"></div>
                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  <hr></div>
                  <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:-25px;">
                         <h3> Audit </h3>
                                    <!-- Nav tabs --><div class="card">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Goods Receive</a></li>
                                        <!--<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Sales</a></li>-->
                                        <li role="presentation"><a href="#registered" aria-controls="registered" role="tab" data-toggle="tab">Transfer</a></li>
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
                                                                          <th>  Barcode </th>
                                                                          <th> Description </th>
                                                                          <th> Quantity  </th>
                                                                      </tr>
                                                                </thead>
                                                                <tbody>
                                                                     <?php 
                                                                        $goods_query = "Select * from tbl_goods_receive_history where item_barcode = '" . stripslashes($_GET['icode']) . "'";
                                                                        $goods_result = mysqli_query($conn, $goods_query);
                                                                        while($goods_rows = mysqli_fetch_array($goods_result)){
                                                                        ?>
                                                                          <tr>
                                                                               <td><a href="goods_receive_reports_page.php?dcode=<?php echo $goods_rows['docket_number']; ?>"><?php echo $goods_rows['docket_number']; ?></a></td>
                                                                               <td><?php echo $goods_rows['item_barcode']; ?></td>
                                                                               <td><?php echo $goods_rows['item_name']; ?></td>
                                                                               <td><?php echo $goods_rows['item_quantity']; ?></td>
                                                                               
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
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                         <?php 
                                                            $t_query = "Select * from tbl_transfer_history where item_barcode = '" . stripslashes($_GET['icode']) . "'";
                                                            $t_result = mysqli_query($conn, $t_query);
                                                            while($t_rows = mysqli_fetch_array($t_result)){
                                                                ?>
                                                                 <tr>
                                                                     <td><a href="transfer_stocks_report_page.php?r_id=<?php echo $t_rows['transaction_number']; ?>"><?php echo $t_rows['transaction_number']; ?></a></td>
                                                                     <td><?php echo $t_rows['item_barcode']; ?></td>
                                                                     <td><?php echo $t_rows['item_name']; ?></td>
                                                                     <td><?php echo $t_rows['item_quant']; ?></td>
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


