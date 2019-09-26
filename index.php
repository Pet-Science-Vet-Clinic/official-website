<?php
// include('conn.php');
include('functions.php');

// if(isset($_POST['login_btn'])){
// 	$uname=$_POST['username'];
// 	$psw =$_POST['pass'];
	
// 	$sql1="SELECT * FROM tb_users WHERE user_Username='$uname' AND user_Password='$psw'";
// 	$wewe=$conn->query($sql1);
	
// 	if(mysqli_num_rows($wewe) > 0){
// 	  echo'<script>
// 	alert("Access Granted");
// 	</script>';
// 	header ("location: ViewTable.php");
// 	header("Refresh:0");
// 	}
// 	else{
// 		echo'<script>
// 	alert("Access Denied");
// 	</script>';
// 	header("Refresh:0");
// 	}
// 	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>
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
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="img/rippleeffect.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="post" action="index.php">
					<span class="login100-form-title">
						Staff Login Deployment
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
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

	<!-- <script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script> -->

	<!-- <script src="vendor/select2/select2.min.js"></script> -->

	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<!-- <script >
		$('.js-tilt').tilt({
			scale: 1.1
		 })
	</script> -->

	 <!-- <script src="js/main.js"></script> -->

</body>
</html>