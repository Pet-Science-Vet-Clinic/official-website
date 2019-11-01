<?php 
	session_start();
	include('conn.php');

	

	// connect to database
	$db = mysqli_connect($servername,$username,$password,$DatabaseName);
	// Check connection
	
	if (!$db) {
		die("Database connection failed: " . mysqli_connect_error());
	}

	// variable declaration
	$username = "";
	$email    = "";
	$errors   = array(); 

	// call the login() function if register_btn is clicked
	// if (isset($_POST['login_btn'])) {
	// 	// login();
	// 	// $username = $_POST['pass_2'];
	// 	// echo $username; die();
	// }


	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['users']);
		header("location: login.php");
	}

//make new appointment

function login(){
	global $db, $username, $errors;
	// grap form values
	$username = e($_POST['username']);
	$password = e($_POST['pass_2']);

	// echo $password; die();

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
				$_SESSION['users'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: viewtable.php');		  
			}
		else {
			?>
			<?php echo '<script> alert("The account you entered was not found in our database. Please try again."); </script>'; ?>
			<?php
			array_push($errors, "Wrong username/password combination");
			header("Refresh:0");
		}
	}
}


	function Number_RemoveFirstCharacter($str){
		$str =substr($str,1);
		return $str;
	}

	function ConvertDatetoWords($ProperDate){
			$Converted = date("F d, Y", strtotime($ProperDate));
			return $Converted;
	}

	function isLoggedIn()
	{
		if (!isset($_SESSION['users'])) {
			return true;
		}else{
			return false;
		}
	}

	function isLoggedOut()
	{
		if (isset($_SESSION['users'])) {
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

