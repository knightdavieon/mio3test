<div class="row">
  <div class="col-md-4 col-lg-5 col-sm-5 col-xs-5">
    <label> Employee Code : </label>
  </div>
  <div class="col-md-8 col-lg-5 col-sm-5 col-xs-5">
    <input type="text" class="form-control" id="employee_code">
  </div>
</div>
<div class="row">
  <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
    <label> Firstname : </label>
  </div>
  <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
    <input type="text" class="form-control" id="firstname">
  </div>
</div>
<div class="row">
  <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
    <label> Lastname : </label>
  </div>
  <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
    <input type="text" class="form-control" id="lastname">
  </div>
</div>
<div class="row">
  <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
    <label> Email : </label>
  </div>
  <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
    <input type="text" class="form-control" id="email">
  </div>
</div>
<div class="div">
  <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
    <label> Branch Designation : </label>
  </div>
  <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
    <select class="form-control" id="branch_designation">
      <option disabled="disabled" selected="selected" value="content"> SELECT BRANCH </option>
      <?php
      $branch_designation_query = "Select * from tbl_branches";
      $branch_designation_result = mysqli_query($conn, $branch_designation_query);
      while($branch_designation_rows = mysqli_fetch_array($branch_designation_result)){
        ?>
        <option value="<?php echo $branch_designation_rows['branch_code']; ?>"><?php echo $branch_designation_rows['branch_name']; ?></option>
        <?php
      }
      ?>
    </select>
  </div>
</div>
<div class="row">
  <div class="col-md-5 col-lg-5 col-sm-10 col-xs-10">
    <label> User Type : </label>
  </div>
  <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
    <select class="form-control" id="user_type">
      <option disabled="disabled" selected="selected" value="content"> SELECT USER TYPE </option>
      <option value="ADMIN"> ADMINISTRATOR </option>
      <option value="ENCODER"> ENCODER </option>

    </select>
  </div>
</div>
<?php
if($_SESSION['super_admin'] == "SUPER"){
  ?>
<div class="row">
  <div class="col-md-5 col-lg-5 col-xs-10 col-sm-10">
    <label>  Super Priviledge : </label>
  </div>
  <div class="col-md-5 col-lg-5 col-xs-10 col-sm-10">
    <div class="form-group">
      <div class="form-line">

        <select class="form-control" style="cursor:pointer;" id="super_cat">
          <option disabled="disabled" selected="selected"> -- Select -- </option>
          <option value="SUPER"> YES </option>
          <option value="NONE"> NO </option>
        </select>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-5 col-lg-5 col-xs-10 col-sm-10">
    <label>  Admin Priviledge : </label>
  </div>
  <div class="col-md-5 col-lg-5 col-xs-10 col-sm-10">
    <div class="form-group">
      <div class="form-line">

        <select class="form-control" style="cursor:pointer;" id="admin_cat">
          <option disabled="disabled" selected="selected"> -- Select -- </option>
          <option value="B_ADMIN"> YES </option>
          <option value="NONE"> NO </option>
        </select>
      </div>
    </div>
  </div>
</div>
<?php
}
?>
<div class="row">
  <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
    <label> Password : </label>
  </div>
  <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
    <input type="password" class="form-control" id="password">
  </div>
</div>
<div class="row">
  <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
    <label> Confirm Password : </label>
  </div>
  <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
    <input type="password" class="form-control" id="confirm_password">
  </div>
</div>
<div class="row">
  <button type="button" class="btn btn-primary" style="margin-left: 30px; margin-bottom: 25px; height:30px;padding-top:0;" onclick="register_function();"><i class="material-icons"> done_all </i> Submit </button>
</div>


<div class="row">
  <div class="col-md-12 col-sm-10 col-xs-10">
    <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
      <label> Employee Code : </label>
    </div>
    <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
      <input type="text" class="form-control" id="employee_code">
    </div>
    <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
      <label> Firstname : </label>
    </div>
    <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
      <input type="text" class="form-control" id="firstname">
    </div>
    <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
      <label> Lastname : </label>
    </div>
    <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
      <input type="text" class="form-control" id="lastname">
    </div>
    <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
      <label> Email : </label>
    </div>
    <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
      <input type="text" class="form-control" id="email">
    </div>
    <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
      <label> Branch Designation : </label>
    </div>
    <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
      <select class="form-control" id="branch_designation">
        <option disabled="disabled" selected="selected" value="content"> SELECT BRANCH </option>
        <?php
        $branch_designation_query = "Select * from tbl_branches";
        $branch_designation_result = mysqli_query($conn, $branch_designation_query);
        while($branch_designation_rows = mysqli_fetch_array($branch_designation_result)){
          ?>
          <option value="<?php echo $branch_designation_rows['branch_code']; ?>"><?php echo $branch_designation_rows['branch_name']; ?></option>
          <?php
        }
        ?>
      </select>
    </div>
    <div class="col-md-5 col-lg-5 col-sm-10 col-xs-10">
      <label> User Type : </label>
    </div>
    <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
      <select class="form-control" id="user_type">
        <option disabled="disabled" selected="selected" value="content"> SELECT USER TYPE </option>
        <option value="ADMIN"> ADMINISTRATOR </option>
        <option value="ENCODER"> ENCODER </option>

      </select>
    </div>
    <?php
    if($_SESSION['super_admin'] == "SUPER"){
      ?>
      <div class="col-md-5 col-lg-5 col-xs-10 col-sm-10">
        <label>  Super Priviledge : </label>
      </div>
      <div class="col-md-5 col-lg-5 col-xs-10 col-sm-10">
        <div class="form-group">
          <div class="form-line">

            <select class="form-control" style="cursor:pointer;" id="super_cat">
              <option disabled="disabled" selected="selected"> -- Select -- </option>
              <option value="SUPER"> YES </option>
              <option value="NONE"> NO </option>
            </select>
          </div>
        </div>
      </div>
      <div class="col-md-5 col-lg-5 col-xs-10 col-sm-10">
        <label>  Admin Priviledge : </label>
      </div>
      <div class="col-md-5 col-lg-5 col-xs-10 col-sm-10">
        <div class="form-group">
          <div class="form-line">

            <select class="form-control" style="cursor:pointer;" id="admin_cat">
              <option disabled="disabled" selected="selected"> -- Select -- </option>
              <option value="B_ADMIN"> YES </option>
              <option value="NONE"> NO </option>
            </select>
          </div>
        </div>
      </div>
      <?php
    } ?>
    <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
      <label> Password : </label>
    </div>
    <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
      <input type="password" class="form-control" id="password">
    </div>
    <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
      <label> Confirm Password : </label>
    </div>
    <div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
      <input type="password" class="form-control" id="confirm_password">
    </div>
  </div> <!-- End of Row Division -->
    <button type="button" class="btn btn-primary" style="margin-left: 30px; margin-bottom: 25px; height:30px;padding-top:0;" onclick="register_function();"><i class="material-icons"> done_all </i> Submit </button>
</div>
