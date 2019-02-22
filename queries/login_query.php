<?php require_once('Connection.php'); ?>
<?php 
session_start();
   if(isset($_REQUEST['staff_code'])){
              $mess = false;
              $b_code = mysqli_real_escape_string($conn, $_REQUEST['b_code']);
              $staff_code = mysqli_real_escape_string($conn, $_REQUEST['staff_code']);
              $staff_password = mysqli_real_escape_string($conn, $_REQUEST['staff_password']);
              $staff_user_type = mysqli_real_escape_string($conn, $_REQUEST['staff_user_type']);
                  /*  $_SESSION['b_staff_code'] =  $staff_code;
                     $_SESSION['b_code'] = $b_code;
                     $_SESSION['b_password'] = $staff_password;
                     $_SESSION['staff_user_type'] =  $staff_user_type; */
             $swho_query = "Select * from tbl_users where b_staff_code = '" . $staff_code . "' and b_user_type = '" . $staff_user_type . "'";
             $swho_query .= " and b_password = '" . $staff_password . "'";
             $swho_result = mysqli_query($conn, $swho_query);
             //$swho_count = mysqli_num_rows($swho_result);
             $swho_rows = mysqli_fetch_array($swho_result);
             if($swho_rows['b_status'] != "ACTIVE"){
                    echo "Deactivated";
             }else{
             if($swho_rows['b_code'] == "SWHO" && $swho_rows['b_user_type'] == "ADMIN"){
                      echo "Login";
                      $_SESSION['b_code'] = $b_code;
                      $_SESSION['b_staff_code'] =  $staff_code;
                      $_SESSION['usertype'] = $swho_rows['b_user_type'];
                      $_SESSION['fullname'] = $swho_rows['b_name'] . " " . $swho_rows['b_lastname'];
                      $_SESSION['email'] = $swho_rows['b_email'];
                      $_SESSION['super_admin'] = $swho_rows['b_super_admin'];
                      $_SESSION['admin_priv'] = $swho_rows['b_admin_priv'];
                      $_SESSION['islogged_in'] = true;
             }elseif($swho_rows['b_code'] != "SWHO" && $swho_rows['b_admin_priv'] == "B_ADMIN"){
                $admin_query = "Select * from tbl_users where b_staff_code = '" . $staff_code . "' and b_user_type = '" . $staff_user_type . "'";
                $admin_query .= " and b_password = '" . $staff_password . "'";
                $admin_result = mysqli_query($conn, $admin_query)or die("Error : " . mysqli_error($conn));
                $admin_count = mysqli_num_rows($admin_result);
                if($admin_count > 0){
                     echo "Login";
                         $_SESSION['islogged_in'] = true;
                         $_SESSION['b_code'] = $b_code;
                         $_SESSION['b_staff_code'] =  $staff_code;
                         $_SESSION['usertype'] = $swho_rows['b_user_type'];
                         $_SESSION['fullname'] = $swho_rows['b_name'] . " " . $swho_rows['b_lastname'];
                         $_SESSION['email'] = $swho_rows['b_email'];
                         $_SESSION['admin_priv'] = $swho_rows['b_admin_priv'];
                         $_SESSION['islogged_in'] = true;
                }
             }else{
                  $branch_query = "Select * from tbl_users where b_staff_code = '" . $staff_code . "' and b_user_type = '" . $staff_user_type . "'";
                  $branch_query .= " and b_code = '" . $b_code . "' and b_password = '" . $staff_password . "'";
                  $branch_result = mysqli_query($conn, $branch_query);
                  $branch_count = mysqli_num_rows($branch_result);
                  if($branch_count > 0){
                         echo "Login";
                         $_SESSION['islogged_in'] = true;
                         $_SESSION['b_code'] = $b_code;
                         $_SESSION['b_staff_code'] =  $staff_code;
                         $_SESSION['usertype'] = $swho_rows['b_user_type'];
                         $_SESSION['fullname'] = $swho_rows['b_name'] . " " . $swho_rows['b_lastname'];
                         $_SESSION['email'] = $swho_rows['b_email'];
                         $_SESSION['admin_priv'] = $swho_rows['b_admin_priv'];
                         $_SESSION['islogged_in'] = true;
                  }else{
                         $mess = true;
                  }
             }
           if($mess){
               echo "Account not found";
           }
        }
        
}
?>