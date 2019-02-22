<?php require_once("Connection.php"); ?>
<?php 
  date_default_timezone_set('Asia/Manila');
    $date = date('d') . "/" . date('m') . "/" . date('Y');
    $time = date('H');
     if(isset($_GET['icode'])){
        ?>
         <div class="col-md-5 col-lg-5 col-xs-12 col-sm-12">
                <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
                    <label> Barcode </label>
                     <div class="form-group">
                           <div class="form-line">
                                <input type="text" class="form-control" value="<?php echo stripslashes(trim($_GET['icode'])); ?>" id="i_bcode">
                                <?php 
                                   $num_query = mysqli_query($conn, "Select * from tbl_promotional_number");
                                   $num_rows = mysqli_fetch_array($num_query);
                                ?>
                                 <input type="hidden" value="<?php echo $num_rows['_idd'] + 1; ?>" id="entry_num">
                             </div> 
                        </div>
                 </div>
                 <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
                      <label for="from_date"> Set Date </label>
                      <input type="text" class="form-control" id="from_date" value="<?php echo $date; ?>">
                  </div>
                 <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                      <label for="to_date"> End Date </label>
                      <input type="text" class="form-control" id="to_date">
                  </div>
        
                  
                  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="margin-top:10px;">
                      <label>(<small> Note : Time is in 24 hour format </small>)</label>
                  </div>
                  <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6" >
                      <label> Set Time </label>
                      <select class="form-control" style="cursor:pointer;" id="set_time">
                          <option disabled="disabled" selected="selected"> Select Time </option>
                          <option value="01"> 1 </option>
                          <option value="02"> 2 </option>
                          <option value="03"> 3 </option>
                          <option value="04"> 4 </option>
                          <option value="05"> 5 </option>
                          <option value="06"> 6 </option>
                          <option value="07"> 7 </option>
                          <option value="08"> 8 </option>
                          <option value="09"> 9 </option>
                          <option value="10"> 10 </option>
                          <option value="11"> 11 </option>
                          <option value="12"> 12 </option>
                          <option value="13"> 13 </option>
                          <option value="14"> 14 </option>
                          <option value="15"> 15 </option>
                          <option value="16"> 16 </option>
                          <option value="17"> 17 </option>
                          <option value="18"> 18 </option>
                          <option value="19"> 19 </option>
                          <option value="20"> 20 </option>
                          <option value="21"> 21 </option>
                          <option value="22"> 22 </option>
                          <option value="23"> 23 </option>
                          <option value="24"> 24 </option>

                       </select>
                  </div>
                 <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                      <label> End Time </label>
                      <select class="form-control" style="cursor:pointer;" id="set_end_time">
                          <option disabled="disabled" selected="selected"> Select End Time </option>
                          <option value="01"> 1 </option>
                          <option value="02"> 2 </option>
                          <option value="03"> 3 </option>
                          <option value="04"> 4 </option>
                          <option value="05"> 5 </option>
                          <option value="06"> 6 </option>
                          <option value="07"> 7 </option>
                          <option value="08"> 8 </option>
                          <option value="09"> 9 </option>
                          <option value="10"> 10 </option>
                          <option value="11"> 11 </option>
                          <option value="12"> 12 </option>
                          <option value="13"> 13 </option>
                          <option value="14"> 14 </option>
                          <option value="15"> 15 </option>
                          <option value="16"> 16 </option>
                          <option value="17"> 17 </option>
                          <option value="18"> 18 </option>
                          <option value="19"> 19 </option>
                          <option value="20"> 20 </option>
                          <option value="21"> 21 </option>
                          <option value="22"> 22 </option>
                          <option value="23"> 23 </option>
                          <option value="24"> 24 </option>

                       </select>
                  </div>
                  <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12" style="margin-top:10px;">
                         <label> Discount Value </label>
                         <div class="form-group">
                             <div class="form-line">
                                  <input type="text" class="form-control" id="discount_value" onkeyup="deduc_price()" onkeypress="return isNumber(event)">
                                 
                              </div>
                              <?php 
                                 $price_query = mysqli_query($conn, "Select item_price from tbl_goods_receive where item_barcode = '" . stripslashes($_GET['icode']) . "'");
                                 $price_rows = mysqli_fetch_array($price_query);
                              ?>
                               <input type="hidden" id="total_price" value="<?php echo $price_rows['item_price']; ?>">
                               <input type="hidden" id="final_total" value="<?php echo $price_rows['item_price']; ?>">
                          </div>
                   </div>
                 
          </div>
        <div class="col-md-1 col-lg-1 col-sm-1 col-xs-1">
                <style type="text/css">
                    .vl{
                             height:350px;
                             border-left: 2px solid gray;
                             opacity:0.7;
                         }
                  </style>
              <div class="col-md-1 col-lg-1 col-sm-12 col-xs-12 vl"> </div>
          </div>
          <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12">
            <table class="table table-striped table-bordered" id="table_branches" style="width:100%;">
                  <thead>
                       <tr>  
                           <th> <input type="checkbox" id="main_check"><label for="main_check"></label></th>
                           <th> List of branches </th>
                         </tr>
                     </thead>
                     <tbody>
                     <?php 
                         $query = "Select * from tbl_branch_goods_receive where item_barcode = '" . stripslashes($_GET['icode']) . "'";
                         $result = mysqli_query($conn, $query);
                         while($rows = mysqli_fetch_array($result)){
                          ?>
                           <tr>
                            <td><input type="checkbox" class="checkbox" id="<?php echo $rows['branch_name'] ?>" value="<?php echo $rows['branch_name']; ?>"><label for="<?php echo $rows['branch_name'] ?>"></label></td>
                            <td><?php echo $rows['branch_name']; ?></td>
                          </tr> 
                          <?php
                         }
                     ?>
                         
                       </tbody>
               </table>
            </div>
        <?php
     }  
?>