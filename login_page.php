<!DOCTYPE html>
<html lang="en">
<head>
	<title>Miomio || Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login_css/util.css">
	<link rel="stylesheet" type="text/css" href="login_css/main.css">
	<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Sign In
					</span>
				</div>

				<form class="login100-form validate-form">
					<input type="hidden" id="b_code" value="<?php echo $_GET['b_code']; ?>">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Employee Code</span>
						<input class="input100" type="text" name="username" id="staff_code" placeholder="Enter Employee Code">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">User Type</span>
						<select class="form-control" id="staff_user_type" style="cursor:pointer;">
							<option disabled="disabled" selected ="selected"> ---- SELECT USER TYPE ---- </option>
							<option value="ADMIN"> ADMINISTRATOR </option>
							<option value="ENCODER"> ENCODER </option>

						</select>
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass" id="staff_password" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>

					<!--	<div class="flex-sb-m w-full p-b-30">
					<div class="contact100-form-checkbox">
					<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
					<label class="label-checkbox100" for="ckb1">
					Remember me
				</label>
			</div>

			<div>
			<a href="#" class="txt1">
			Forgot Password?
		</a>
	</div>
</div> -->

<div class="container-login100-form-btn" style="margin-top:50px;">
	<button type="button" id="login_btn" class="login100-form-btn">
		Login
	</button>
	<a href="index.php" class="login100-form-btn" style="background-color:#ff6600;margin-left:10px;"> Back </a>


</div>
</form>
</div>
</div>
</div>

<script>
$('#login_btn').click(function(){
	var b_code = $('#b_code').val();
	var staff_code = $('#staff_code').val();
	var staff_user_type = $('#staff_user_type').val();
	var staff_password = $('#staff_password').val();
	$.ajax({
		type      :  "POST",
		url       :  "queries/login_query.php",
		data      :  {b_code:b_code, staff_code:staff_code, staff_user_type:staff_user_type, staff_password:staff_password},
		success   :  function(result){
			if(result == "Login"){
				window.location = "dashboard.php";
			}else{
				alert(result);
			}
		},
		error    :    function(errorResult){
			alert(errorResult);
		}
	});
});
</script>
<!--===============================================================================================-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="login_js/main.js"></script>

</body>
</html>
