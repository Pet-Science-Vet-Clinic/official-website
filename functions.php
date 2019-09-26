<?php 
	session_start();
include('conn.php');

	$servername= "localhost";
    $username= "root";
    $password= "123123";
	$DatabaseName  = "petscience_db";
	
	// connect to database
	$db = mysqli_connect($servername,$username,$password,$DatabaseName);

	// variable declaration
	$username = "";
	$email    = "";
	$errors   = array(); 


	// call the login() function if register_btn is clicked
	if (isset($_POST['login_btn'])) {
		login();
		
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['user']);
		header("location: index.php");
	}


	// LOGIN USER
	function login(){
		global $db, $username, $errors;

		// grap form values
		$username = e($_POST['username']);
		$password = e($_POST['pass']);

		// make sure form is filled properly
		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		// attempt login if no errors on form
		if (count($errors) == 0) {
			

			$query = "SELECT * FROM tb_users WHERE user_Username='$username' AND user_Password='$password' LIMIT 1";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) { // user found
				// check if user is admin or user
				$logged_in_user = mysqli_fetch_assoc($results);
				
					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";
					header('location: ViewTable.php');		  
				}
			else {
				?>
				<?php echo '<script> alert("NO LOGIN FOR YOU"); </script>'; ?>
				<?php
				array_push($errors, "Wrong username/password combination");
				header("Refresh:0");
			}
		}
	}


	function isLoggedIn()
	{
		if (isset($_SESSION['user'])) {
			return true;
		}else{
			return false;
		}
	}

	

	// escape string
	function e($val){
		global $db;
		return mysqli_real_escape_string($db, trim($val));
	}

	function display_error() {
		global $errors;

		if (count($errors) > 0){
			echo '<div class="error">';
				foreach ($errors as $error){
					echo $error .'<br>';
				}
			echo '</div>';
		}
	}

?>