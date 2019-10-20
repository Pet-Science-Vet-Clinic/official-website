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
	if (isset($_POST['login_btn'])) {
		login();
		
	}


	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['users']);
		header("location: login.php");
	}

//make new appointment

	
	
	

	function block_checker()
	{
		
		
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

