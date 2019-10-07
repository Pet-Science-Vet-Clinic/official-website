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
		
	global $db, $username, $errors;
// grap form values
$blockpicked = e($_POST['timepicked']);
$datepicked = e($_POST['datepicked']);
$checked = e($_POST['newuser']);


if (count($errors) == 0) {

if(isset($_POST['newuser'])) {

	$query = "SELECT * FROM tb_appointment_list WHERE appointment_TimeSlot='$blockpicked' AND appointment_Date ='$datepicked'";
	$results = mysqli_query($db, $query);

	if (mysqli_num_rows($results) <3) { 
		
	$appointment_date = $_POST['datepicked'];
	$time_slot = $_POST['timepicked'];
	// $customer_name = $_POST['hidden_customer_fullname'];
	// $cellular_number = $_POST['hidden_customer_cellnum'];
	// $email_address = $_POST['hidden_customer_email'];
	$reason_for_appointment = $_POST['reason_for_appointment'];

//==CUSTOMER DETAILS==//
$customer_fullname = $_POST['hidden_customers_name'];
	$customer_email = $_POST['hidden_customers_email'];
	$customer_cellnum = $_POST['hidden_customers_celnum'];
	$customer_gender = $_POST['hidden_customers_gender'];
	$customer_telephone = $_POST['hidden_customers_phonenum'];
	$customer_address = $_POST['hidden_customers_address'];
//===Pet Details===//
$pet_fullname = $_POST['hidden_pets_name'];
	$pet_gender = $_POST['hidden_pets_gender'];
	$pet_species = $_POST['hidden_pets_species'];
	$pet_breed = $_POST['hidden_pets_breed'];
	$pet_DOB = $_POST['hidden_pets_DOB'];

	$valuehere = "0";
	$statusvalue = "1";


	$sql = "INSERT INTO tb_appointment_list (appointment_TimeSlot,appointment_Date, appointment_Customer_Name, appointment_Customer_Email, appointment_Contact,appointment_ReasonForAppointment,appointment_Status,appointment_notification_status)
VALUES ('$time_slot', '$appointment_date', '$customer_fullname', '$customer_email', '$customer_cellnum', '$reason_for_appointment','$statusvalue','$valuehere')";
$query=$conn->query($sql);

$sql = "INSERT INTO tb_web_customer_registration (customer_fullname,customer_address, customer_cell, customer_email, customer_gender,customer_telephone)
VALUES ('$customer_fullname', '$customer_address', '$customer_cellnum', '$customer_email', '$customer_gender', '$customer_telephone')";
$queryx=$conn->query($sql);

// $sql = "INSERT INTO tb_web_customer_registration (customer_fullname,customer_address, customer_cell, customer_email, customer_gender,customer_telephone)
// VALUES ('$customer_fullname', '$customer_address', '$customer_cellnum', '$customer_email', '$customer_gender', '$customer_telephone')";
// $queryv=$conn->query($sql);

$sql = "INSERT INTO tb_web_pet_registration (pet_name,pet_species, pet_sex, pet_breed, pet_dob)
VALUES ('$pet_fullname', '$pet_species', '$pet_gender', '$pet_breed', '$pet_DOB')";
$queryz=$conn->query($sql);

	if($queryx)  
	{
		
	  echo '<script>
alert("Registration and Appointment Set!");
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
else
{
// attempt login if no errors on form
$query = "SELECT * FROM tb_appointment_list WHERE appointment_TimeSlot='$blockpicked' AND appointment_Date ='$datepicked'";
$results = mysqli_query($db, $query);

if (mysqli_num_rows($results) <3) { 
	
$appointment_date = $_POST['datepicked'];
$time_slot = $_POST['timepicked'];
$customer_name = $_POST['customer_fullname'];
$cellular_number = $_POST['customer_cellnum'];
// $email_address = $_POST['hidden_customer_email'];
$reason_for_appointment = $_POST['reason_for_appointment'];


$valuehere = "0";
$statusvalue = "1";


$sql = "INSERT INTO tb_appointment_list (appointment_TimeSlot,appointment_Date, appointment_Customer_Name, appointment_Contact,appointment_ReasonForAppointment,appointment_Status,appointment_notification_status)
VALUES ('$time_slot', '$appointment_date', '$customer_name', '$cellular_number', '$reason_for_appointment','$statusvalue','$valuehere')";
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




  }
 
  //---New client register--//
	if(isset($_POST['new_customer_modal_SubmitRegistration'])){

		$query = "SELECT * FROM tb_web_customer_registration";
		$results = mysqli_query($db, $query);
	
		if (mysqli_num_rows($results) <3) { 
			


		$cus_name = $_POST['customer_fullname_new'];
		$cus_address = $_POST['customer_address_new'];
		$cus_cell = $_POST['customer_cellnum_new'];
		$cus_email = $_POST['customer_email_new'];

		$pets_name = $_POST['pet_fullname_new'];
		$pets_species = $_POST['pet_species'];
		$pets_sex = $_POST['pet_gender'];
		$pets_breed = $_POST['pet_breed_new'];
		$pets_dob = $_POST['pet_DOB_new'];
		
	
		$sql = "INSERT INTO tb_web_customer_registration (customer_fullname,customer_address, customer_cell, customer_email)
	VALUES ('$cus_name', '$cus_address', '$cus_cell', '$cus_email')";
	$query=$conn->query($sql);

	$sql = "INSERT INTO tb_web_pet_registration (pet_name,pet_species,pet_sex,pet_breed,pet_dob)
	VALUES ('$pets_name', '$pets_species', '$pets_sex', '$pets_breed', '$pets_dob')";
	$querys=$conn->query($sql);

		if($query)  
		{
			
		  echo '<script>
	alert("Registration complete!");
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
	}
	//---New client register end---//
  
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

