<?php 
	session_start();
	include('conn.php');

	
	
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
//make new appointment

	if(isset($_POST['make_appointment_modal_SubmitAppointment'])){
		$appointment_date = $_POST['datepicked'];
		$time_slot = $_POST['timepicked'];
		$customer_name = $_POST['customer_fullname'];
		$cellular_number = $_POST['customer_cellnum'];
		$email_address = $_POST['customer_email'];
		$reason_for_appointment = $_POST['reason_for_appointment'];
		$valuehere = " ";
		$statusvalue = "1";
  
		$sql = "INSERT INTO tb_appointment_list (appointment_Date, appointment_TimeSlot, appointment_Customer_Name, appointment_Customer_Email, appointment_Contact,appointment_Type,appointment_Date2,appointment_ReasonForAppointment,appointment_Comment,appointment_Status)
VALUES ('$appointment_date', '$time_slot', '$customer_name', '$email_address', '$cellular_number', '$reason_for_appointment', '$valuehere', '$valuehere', '$valuehere', '$statusvalue')";
$query=$conn->query($sql);
		if($query)  
		{
		  echo '<script>
  alert("Appointment Set!");
		  </script>';
   header("Refresh:0");
		}
		else
		{
			echo "Error: " . $sql . "<br>" . $conn->error;
// 		  echo '<script>
//   alert("Appointment Not Set!");
// 		  </script>';
		   //header("Refresh:0");
		}
		
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
					header('location: viewtable.php');		  
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