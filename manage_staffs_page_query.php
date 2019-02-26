<?php
session_start();
require_once("Connection.php");
if(isset($_GET['ecode'])){
  $ecode_query = "Select * from tbl_users where b_staff_code = '" . stripslashes($_GET['ecode']) . "'";
  $ecode_result = mysqli_query($conn, $ecode_query)or die("Error : " . mysqli_error($conn));
  $ecode_rows  = mysqli_fetch_array($ecode_result);

  $branch_query = "Select * from tbl_branches";
  $branch_result = mysqli_query($conn, $branch_query);
  $array_each = array();
  ?>
  <div class="col-md-10 col-lg-10 col-xs-10 col-sm-10">
    <div class="form-group">
      <div class="form-line">
        <label> Firstname </label>
        <input type="text" class="form-control" name="firstname" value="<?php echo $ecode_rows['b_name'] ?>">
      </div>
    </div>
  </div>
  <div class="col-md-10 col-lg-10 col-xs-10 col-sm-10">
    <div class="form-group">
      <div class="form-line">
        <label> Lastname </label>
        <input type="text" class="form-control" name="lastname" value="<?php echo $ecode_rows['b_lastname']; ?>">
      </div>
    </div>
  </div>
  <?php
  echo '
  <div class="col-md-10 col-lg-10 col-sm-10 col-xs-10">
  <div class="form-group">
  <div class="form-line">
  <label> Branch Code </label>
  <select class="form-control" style="cursor:pointer;" name="branch_code">
  <option disabled="disabled"> -- Select -- </option> ';
  while($branch_rows = mysqli_fetch_array($branch_result)){
    $array_each[] = $branch_rows;
  }
  foreach($array_each as $frows){
    ?>
    <option <?php echo ($frows['branch_code'] == $ecode_rows['b_code']) ? 'selected="selected"' : ''; ?> value="<?php echo $frows['branch_code']; ?>" > <?php echo $frows['branch_name'] ?> </option>';
    <?php
  }
  echo '            </select>
  </div>
  </div>
  </div>';
  ?>
  <div class="col-md-10 col-lg-10 col-xs-10 col-sm-10">
    <div class="form-group">
      <div class="form-line">
        <label> User Type </label>
        <select class="form-control" style="cursor:pointer;" name="user_type">
          <option disabled="disabled"> -- Select -- </option>
          <option <?php echo ($ecode_rows['b_user_type'] == "ADMIN") ? 'selected="selected" value="ADMIN"' : ''; ?>> ADMIN</option>
          <option <?php echo ($ecode_rows['b_user_type'] == "ENCODER") ? 'selected="selected" value="ENCODER"' : ''; ?>> ENCODER </option>
        </select>
      </div>
    </div>
  </div>
  <div class="col-md-10 col-lg-10 col-xs-10 col-sm-10">
    <div class="form-group">
      <div class="form-line">
        <label> Admin Priviledge </label>
        <select class="form-control" style="cursor:pointer;" name="admin_priv">
          <option disabled="disabled"> -- Select -- </option>
          <option <?php echo ($ecode_rows['b_admin_priv'] == "B_ADMIN") ? 'selected="selected"' : ''; ?> value="B_ADMIN"> YES</option>
          <option <?php echo ($ecode_rows['b_admin_priv'] == "NONE") ? 'selected="selected"' : ''; ?> value="NONE"> NO </option>
        </select>
      </div>
    </div>
  </div>

  <div class="col-md-10 col-lg-10 col-xs-10 col-sm-10">
    <div class="form-group">
      <div class="form-line">
        <label> Email </label>
        <input type="email" class="form-control"  name="b_email" value="<?php echo $ecode_rows['b_email']; ?>">
      </div>
    </div>
  </div>

  <!-- <div class="col-md-10 col-lg-10 col-xs-10 col-sm-10">
    <input type="checkbox" class="filled-in" id="ig_checkbox">
    <label for="ig_checkbox">Change Password</label>

  </div> -->
  <div class="col-md-10 col-lg-10 col-xs-10 col-sm-10">

    <div id="autoUpdate" >
      <div class="form-group">
        <div class="form-line">
          <label> Password </label>
          <input type="password" class="form-control" id="pass_clone" onkeyup="clone_me();">
        </div>
      </div>
      <input type="hidden" name="b_password" value="<?php echo $ecode_rows['b_password']; ?>" id="pass_value"> 
    </div>


  </div>
  <div class="col-md-10 col-lg-10 col-xs-10 col-sm-10">
    <label> Account Status </label> &nbsp;
    <label <?php echo ($ecode_rows['b_status'] ==  "ACTIVE") ? 'style="color:#009900;"': 'style="color:#cc0000;"' ?>><small><?php echo $ecode_rows['b_status']; ?> </small></label><br/>
    <input type="submit" <?php echo ($ecode_rows['b_status'] == "ACTIVE") ? 'value="Deactivate" class="btn btn-danger" name="btn_deactivate"' : 'value="Activate" class="btn btn-primary" name="btn_activate"' ?>>
  </div>

  <?php
}
?>




<script>
$(document).ready(function(){
$('#ig_checkbox<?php //echo $i; ?>').change(function(){
if(this.checked)
$('#ig_checkbox<?php //echo $i; ?>').fadeIn('slow');
else
$('#ig_checkbox<?php //echo $i; ?>').fadeOut('slow');

});
});
</script>
