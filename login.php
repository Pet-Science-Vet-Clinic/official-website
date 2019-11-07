<?php
include('conn.php');
session_start();
if(isset($_POST['btnLogin']))
{
	// echo "nisulod ";
$postUsername = $_POST['username'];


// Set session variables
$_SESSION['username'] = $postUsername;
	// connect to database
$db = mysqli_connect($servername,$username,$password,$DatabaseName);

 $username=$_POST['username'];
 $pass=$_POST['pass2'];
 $query = "SELECT * FROM tb_users WHERE user_Username='$username' AND user_Password='$pass' LIMIT 1";
 $results = mysqli_query($db, $query);
 if(mysqli_num_rows($results)==1)
 {
	$logged_in_user = mysqli_fetch_assoc($results);
  $_SESSION['username']=$logged_in_user;
  $_SESSION['success']  = "You are now logged in";
  header("location: viewtable.php");
 }
 else
 {
	echo '<script>
	alert("Username and password does not match any registered user credentials. Please log in again!");
			</script>';
	unset($_SESSION['username']);
	header("Refresh:0");
 }
 exit();
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
	<link href="css/style.css" rel='stylesheet' type='text/css' media="all">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link href="css/toastr.css" rel="stylesheet" type="text/css" media="all" />
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/login/util.css">
	<link rel="stylesheet" type="text/css" href="css/login/main.css">
	<link rel="shortcut icon" href="img/officiallogo.ico">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
				<a href="index.php" ><img src="img/officiallogo.jpg" alt="IMG"></a>
				</div>

				<form id="formed" name="formed"class="login100-form validate-form" method="post">
					<span class="login100-form-title">
						Staff Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input id="Username_2_1" class="input100" type="text" name="username" placeholder="Username" maxlength="20">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-id-badge" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input id="Password_1" class="input100" type="password" name="pass" placeholder="Password" maxlength="20">
						<input id="Password_2" class="input100" type="hidden" name="pass2" placeholder="Password" maxlength="60">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="btnLogin" id="btnLogins">
							Login
					
					
					<div class="text-center p-t-12">
						
					</div>

					<div class="text-center p-t-136">
					
					</div>
					</form>
			</div>
		</div>
	</div>

	<div class="modal about-modal fade" style="display:none;" id="AppointmentCancelAlert" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h5 class="modal-title">Attention</h5>
					</div>
					<div class="modal-body text-center">
						<h5>Are you sure you want to cancel this appointment?</h5>
					</div>
					<div class="modal-footer text-center">
						<button data-dismiss="modal" id="">Ok</button>
					</div>
					
				</div>
			</div>
	</div>
	
	<script type='text/javascript' src='js/jquery-2.2.3.min.js'></script>
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/tilt/tilt.jquery.min.js"></script>

	<script src="js/toastr.js"></script>
	<script src="js/login.js"></script>

</body>
</html>