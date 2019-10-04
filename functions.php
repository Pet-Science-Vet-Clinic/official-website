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
		unset($_SESSION['users']);
		header("location: login.php");
	}

//make new appointment

	if(isset($_POST['make_appointment_modal_SubmitAppointment'])){
		$email_a = $_POST['customer_email'];
		$email_b = 'bogus';
		$fullname = !empty( $_POST[ 'customer_fullname' ] ) ? trim( $_POST[ 'customer_fullname' ] ) : '';
		// $fullname = e($_POST['customer_fullname']);
		$cellnum = e($_POST['customer_cellnum']);

		// make sure form is filled properly
		if (empty($fullname) || empty($cellnum)) {
			?>
			<?php echo'<script> alert("Please fill in the textboxes below"); </script>';  ?>
			<?php
		}
		if(!isset($_POST['reason_for_appointment']))
{
	?>
	<?php echo'<script> alert("Please check atleast one service"); </script>';  ?>
	<?php
}


if (filter_var($email_a, FILTER_VALIDATE_EMAIL)) {
	
	global $db, $username, $errors;
// grap form values
$blockpicked = e($_POST['timepicked']);
$datepicked = e($_POST['datepicked']);

// make sure form is filled properly
if (empty($blockpicked)) {
	array_push($errors, "Please choose a time block");
}


// attempt login if no errors on form
if (count($errors) == 0) {
	

	$query = "SELECT * FROM tb_appointment_list WHERE appointment_TimeSlot='$blockpicked' AND appointment_Date ='$datepicked'";
	$results = mysqli_query($db, $query);

	if (mysqli_num_rows($results) <3) { 
		
		$appointment_date = $_POST['datepicked'];
	$time_slot = $_POST['timepicked'];
	$customer_name = $_POST['customer_fullname'];
	$cellular_number = $_POST['customer_cellnum'];
	$email_address = $_POST['customer_email'];
	$reason_for_appointment = $_POST['reason_for_appointment'];
	$valuehere = " ";
	$statusvalue = "1";


	$sql = "INSERT INTO tb_appointment_list (appointment_TimeSlot,appointment_Date, appointment_Customer_Name, appointment_Customer_Email, appointment_Contact,appointment_ReasonForAppointment,appointment_Status)
VALUES ('$time_slot', '$appointment_date', '$customer_name', '$email_address', '$cellular_number', '$reason_for_appointment','$statusvalue')";
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
		// echo "Error: " . $sql . "<br>" . $conn->error;
	  echo '<script>
alert("Appointment Not Set!");
	  </script>';
	   header("Refresh:0");
	}
		
		
		}
	else if (mysqli_num_rows($results) >2) {
		?>
		<?php echo '<script> alert("Time block full.Please select another time block."); </script>'; ?>
		<?php
		
		// array_push($errors, "Wrong username/password combination");
		// header("Refresh:0");
	}
}
	

}

else {
	?>
	<?php echo'<script> alert("Email Invalid"); </script>';  ?>
	<?php
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
					$_SESSION['users'] = $logged_in_user;
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
	

	function block_checker()
	{
		
		
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

