<?php 
	include('conn.php');
    
    
	// $default_email = 'info@petsciencevet.com';
    // $fasfg = 'infopassword';
    $db = mysqli_connect($servername,$username,$password,$DatabaseName);
    // date_default_timezone_set('Asia/Singapore');
    // $dateNow = date('Y-m-d');
    // $time_data = array();

    // $timeNowHour = date("h");
    // $timeNowMinute= date("i");
    // $timeNowEx = date("A");

<<<<<<< HEAD
<<<<<<< HEAD
	$login_username = isset($_POST['username']) ? $_POST['username'] : "";
	// $login_password = isset($_POST['Password_1']) ? $_POST['Password_1'] : "";
    $login_password2 = isset($_POST['pass']) ? $_POST['pass'] : "";
    
    
    // echo $login_password2; die();
=======
=======
>>>>>>> login-changeTo-Ajax
	$login_username = isset($_POST['Username_2_1']) ? $_POST['Username_2_1'] : "";
	// $login_password = isset($_POST['Password_1']) ? $_POST['Password_1'] : "";
    $login_password2 = isset($_POST['Password_2']) ? $_POST['Password_2'] : "";
    
    
    // echo $appointment_phone; die();
<<<<<<< HEAD
>>>>>>> login-changeTo-Ajax
=======
>>>>>>> login-changeTo-Ajax
    
    // $checked = isset($_POST['newuser']) ? $_POST['newuser'] : "";

    $query = "SELECT * FROM tb_users WHERE user_Username='$login_username' AND user_Password ='$login_password2' LIMIT 1";
    $results = mysqli_query($db, $query);
    
    $status = "";
    $status_message ="";
    $status_header="";

  
        if (mysqli_num_rows($results) ==1 ) 
        { 
                $status = "found";
                            
        }
        else
         {

            $status = "notfound";
            $status_header = "No match found";
            $status_message = "The user credentials you entered did not match any accounts.";
        }
    
	
	$data = array(
        'status' => $status,
		'login_username' => $login_username, 
		'login_password2' => $login_password2,
        'status_message' => $status_message,
        'status_header' => $status_header
	);

	echo json_encode($data);
?>

