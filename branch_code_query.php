<?php require_once("Connection.php"); ?>
<?php 
    if(isset($_REQUEST['branches'])){
        $query = "Select * from tbl_branches where branch_name = '" . mysqli_real_escape_string($conn, $_REQUEST['branches']) . "'";
        $result = mysqli_query($conn, $query);
        if($rows = mysqli_fetch_array($result)){
              echo '<label> Branch Code </label><div class="form-group"><div class="form-line"> <input type="text" class="form-control" id=" branch_code" name="branch_code" disabled="disabled" value="'. $rows[1] .'"> </div></div> <label> Quantity </label><div class="form-group"><div class="form-line"> <input type="text" class="form-control" id="t_quant" name="branch_code" onkeyup="computation_function();"> </div></div>';
        }
    }
?>