<?php require_once("Connection.php"); ?>
<?php 
       if(isset($_GET['b_code'])){
            $query = mysqli_query($conn, "Select * from tbl_branches where branch_code = '" . stripslashes($_GET['b_code']) . "'");
            $rows = mysqli_fetch_array($query);
            ?>
            <div class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
                                 <label> Branch Number </label>
                                 <div class="form-group">
                                     <div class="form-line">
                                     <input type="text" class="form-control" name="b_curr_num" value="<?php echo $rows['_id']; ?>">
                                     </div>
                                   </div>
                               </div>     
                                 <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                                 <label> Branch Current Code </label>
                                 <div class="form-group">
                                     <div class="form-line">
                                     <input type="text" class="form-control" name="b_curr_code" value="<?php echo $rows['branch_code']; ?>">
                                     </div>
                                   </div>
                               </div>  
                                 <div class="col-md-5 col-lg-5 col-xs-12 col-sm-12">
                                 <label> Branch Current Name </label>
                                 <div class="form-group">
                                     <div class="form-line">
                                     <input type="text" class="form-control" name="b_curr_name" value="<?php echo $rows['branch_name']; ?>">
                                     </div>
                                   </div>
                               </div>  
                              </div> 
                              
        <?php
       }
?>