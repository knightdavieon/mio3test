<?php require_once("Connection.php"); ?>
<?php 
   if(isset($_REQUEST['employee_code'])){
       $employee_code = mysqli_real_escape_string($conn, $_REQUEST['employee_code']);
       $firstname = mysqli_real_escape_string($conn, $_REQUEST['firstname']);
       $lastname = mysqli_real_escape_string($conn, $_REQUEST['lastname']);
       $email = mysqli_real_escape_string($conn, $_REQUEST['email']); 
       $user_type = mysqli_real_escape_string($conn, $_REQUEST['user_type']);
       $password = mysqli_real_escape_string($conn, $_REQUEST['user_password']);
       $c_password = mysqli_real_escape_string($conn, $_REQUEST['confirm_password']);
       $branch_designation = mysqli_real_escape_string($conn, $_REQUEST['branch_designation']);
       if(($password) != ($c_password)){
            echo "Password not match";
       }else{
        $duplicate_query = "Select * from tbl_users where b_staff_code = '" . $employee_code . "'"; 
        $duplicate_result = mysqli_query($conn, $duplicate_query);
        $count = mysqli_num_rows($duplicate_result);
        if($count > 0){
            echo "This code is already registered in the system";
        }else{
            $query = "Insert into tbl_users(b_name, b_code, b_status, b_password, b_lastname, b_email, b_staff_code, b_user_type)values('"
        . $firstname . "','" . $branch_designation . "','" . "ACTIVE" . "','" . $password . "','"  . $lastname  . "','" . $email . "','" . $employee_code . "','" . $user_type . "')";
        $result = mysqli_query($conn, $query)or die("Error : " . mysqli_error($conn));
        if($result === true){
          echo "Working";
        }else{
            echo "Failed";
        }
        }
      
       }
      
   }
?>