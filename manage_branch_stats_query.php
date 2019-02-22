<?php require_once("Connection.php"); ?>
<?php 
  if(isset($_GET['b_code'])){
        $query = mysqli_query($conn, "Select * from tbl_branches where branch_code = '" . stripslashes(trim($_GET['b_code'])) . "'");
        $rows = mysqli_fetch_array($query);
        ?>
        <select class="form-control" style="cursor:pointer;" name="b_status">
                <option disabled="disabled" selected="selected"> SELECT </option>
                <option <?php echo ($rows['status'] == "ACTIVE") ? 'selected="selected" value="ACTIVE"': ''; ?>> ACTIVE </option>
                <option <?php echo ($rows['status'] == "DEACTIVE") ? 'selected="selected" value="DEACTIVE"': ''; ?>> DEACTIVE </option>
           </select>
    <?php
  }

?>