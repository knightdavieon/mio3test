<?php require_once("Connection.php"); ?>
<?php 
    if(isset($_REQUEST['employee_code'])){
          $employee_code = mysqli_real_escape_string($conn, $_REQUEST['employee_code']);
          $firstname = mysqli_real_escape_string($conn, $_REQUEST['firstname']);
          $lastname = mysqli_real_escape_string($conn, $_REQUEST['lastname']);
          $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
          $branch_designation = mysqli_real_escape_string($conn, $_REQUEST['branch_designation']);
          $user_type = mysqli_real_escape_string($conn, $_REQUEST['user_type']);
          $password = mysqli_real_escape_string($conn, $_REQUEST['password']);
          $cf_password = mysqli_real_escape_string($conn, $_REQUEST['confirm_password']);
          $super_cat = mysqli_real_escape_string($conn, $_REQUEST['super_cat']);
          $admin_cat = mysqli_real_escape_string($conn, $_REQUEST['admin_cat']);
        if(($password) != ($cf_password)){
               echo "Password not match";
        }else{
            $duplicate_query = "Select* from tbl_users where b_staff_code = '" . $employee_code . "'";
            $duplicate_result = mysqli_query($conn, $duplicate_query)or die("Error : " . mysqli_error($conn));
            $duplicate_count = mysqli_num_rows($duplicate_result);
            if($duplicate_count > 0){
                 echo "Exists";
            }else{
                 $query = "Insert into tbl_users(b_name, b_code, b_status, b_password, b_lastname, b_email, b_staff_code, b_user_type, b_super_admin, b_admin_priv)values('"
             . $firstname . "','" . $branch_designation . "','" . "ACTIVE" . "','" . $password . "','" . $lastname . "','" . $email . "','" . 
             $employee_code . "','" . $user_type . "','" . $super_cat . "','" . $admin_cat . "')";
             $result = mysqli_query($conn , $query)or die("Error : " . mysqli_error($conn));
             if($result === true){
                  echo 'Registered';
             }
        }
             
        }
    }
?>