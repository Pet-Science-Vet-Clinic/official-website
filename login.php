<?php
include('functions.php');
if (isLoggedOut()) {
	// $_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Pet Science Vet Clinic Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/login/util.css">
	<link rel="stylesheet" type="text/css" href="css/login/main.css">
	<link rel="shortcut icon" href="img/officiallogo.ico">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		
		<div class="container-login100">
		<a href="index.php" ><button class="btn"><i class="fa fa-home"></i> Home</button></a>
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="img/rippleeffect.png" alt="IMG">
				</div>
				

				<form id ="formed" name="formed"class="login100-form validate-form" method="post" action="viewtable.php">
					<span class="login100-form-title">
						Staff Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100" type="text" name="username" placeholder="Username" maxlength="20" onkeypress="return blockSpecialChar(event)">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-id-badge" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password" maxlength="20" onkeypress="return blockSpecialChar(event)">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="login_btn">
							Login
						</button>
						
					</div>
					
					
					<div class="text-center p-t-12">
						
					</div>

					<div class="text-center p-t-136">
					
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script src="js/Login/main.js"></script>

</body>
</html>