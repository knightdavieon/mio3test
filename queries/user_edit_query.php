<?php require_once("Connection.php"); ?>
<?php 
   if(isset($_REQUEST['u_ecode'])){
     $u_ecode = mysqli_real_escape_string($conn, $_REQUEST['u_ecode']);
     $u_firstname = mysqli_real_escape_string($conn, $_REQUEST['u_firstname']);
     $u_lastname = mysqli_real_escape_string($conn, $_REQUEST['u_lastname']);
     $u_email = mysqli_real_escape_string($conn, $_REQUEST['u_email']);
     $u_usertype = mysqli_real_escape_string($conn, $_REQUEST['u_usertype']);
     $u_branch_designation = mysqli_real_escape_string($conn, $_REQUEST['u_branch_designation']);
     $u_old = mysqli_real_escape_string($conn, $_REQUEST['u_old']);
     $u_new = mysqli_real_escape_string($conn, $_REQUEST['u_new']);
     if(($u_old) != ($u_new)){
         echo "Password not match";
     }else{
      $query = "Update tbl_users set b_name = '" . $u_firstname . "', b_lastname = '" . $u_lastname . "', b_email = '"
      . $u_email . "', b_code = '" . $u_branch_designation . "', b_user_type = '" . $u_usertype . "', b_password = '" . $u_new . "' where b_staff_code = '" . $u_ecode . "'";
      $result = mysqli_query($conn, $query)or die("Error : " . mysqli_error($conn));
      if($result === true){
          echo "True";
     }else{
        echo "False";
     }
   }
   
    
   }
?>