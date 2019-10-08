<?php 
	include('conn.php');
	
	// $default_email = 'info@petsciencevet.com';
    // $fasfg = 'infopassword';
    $db = mysqli_connect($servername,$username,$password,$DatabaseName);
    
	$appointment_date = isset($_POST['datepicked']) ? $_POST['datepicked'] : null;
	$appoinment_time = isset($_POST['timepicked']) ? $_POST['timepicked'] : null;
	$appointment_fullname = isset($_POST['customer_fullname']) ? $_POST['customer_fullname'] : null;
	$appointment_cellnum = isset($_POST['customer_cellnum']) ? $_POST['customer_cellnum'] : null;
    $appointment_reason = isset($_POST['reason_for_appointment']) ? $_POST['reason_for_appointment'] : null;

    $register_fullname = isset($_POST['hidden_customers_name']) ? $_POST['hidden_customers_name'] : null;
	$register_email = isset($_POST['hidden_customers_email']) ? $_POST['hidden_customers_email'] : null;
	$register_cellnum = isset($_POST['hidden_customers_celnum']) ? $_POST['hidden_customers_celnum'] : null;
	$register_notifycellnum = isset($_POST['hidden_customers_celnum2']) ? $_POST['hidden_customers_celnum2'] : null;
    $register_optioncellnum = isset($_POST['hidden_customers_celnum3']) ? $_POST['hidden_customers_celnum3'] : null;
    $register_homenum = isset($_POST['hidden_customers_phonenum']) ? $_POST['hidden_customers_phonenum'] : null;
	$register_faxnum = isset($_POST['hidden_customers_faxnum']) ? $_POST['hidden_customers_faxnum'] : null;
    $register_address = isset($_POST['hidden_customers_address']) ? $_POST['hidden_customers_address'] : null;
    // $appointment_cellnumtrap = Number_RemoveFirstCharacter($appointment_cellnum);
    
    $checked = isset($_POST['newuser']) ? $_POST['newuser'] : null;

    $query = "SELECT * FROM tb_appointment_list WHERE appointment_TimeSlot='$appoinment_time' AND appointment_Date ='$appointment_date'";
    $results = mysqli_query($db, $query);
    
    $status = "";
    $status_message ="";



    if (mysqli_num_rows($results) <3) 
    { 
		
		
        $statuszero = "0";
        $statusone = "1";


        
        
        
        if($checked)
        {
            $sql = "INSERT INTO tb_appointment_list (appointment_TimeSlot,appointment_Date, appointment_Customer_Name, appointment_Contact,appointment_ReasonForAppointment,appointment_Status) VALUES ('$appoinment_time', '$appointment_date', '$register_fullname', '$register_cellnum', '$appointment_reason', '$statuszero')";
        $query=$conn->query($sql);

            $sql = "INSERT INTO tb_customer_information (customer_Name,customer_Address, customer_Phone, customer_Cell, customer_Email,customer_Mobile_Notification,customer_Mobile_Add_On,customer_Fax,customer_Home) VALUES ('$register_fullname', '$register_address', '$register_homenum', '$register_cellnum', '$register_email', '$register_notifycellnum', '$register_optioncellnum', '$register_faxnum', '$register_homenum')";
            $queryx=$conn->query($sql);
            
                if($queryx)  {
            $status = "success";
            $status_message = "Appointment Set and Registration Complete! We will respond to your appointment as soon as possible.";
                             }
                             else
                             {
                                $status = "error";
                                $status_message = "Appointment Set and Registration not set! We will respond to your appointment as soon as possible.";
                             }
        }
             else
             {

            $sql = "INSERT INTO tb_appointment_list (appointment_TimeSlot,appointment_Date, appointment_Customer_Name, appointment_Contact,appointment_ReasonForAppointment,appointment_Status) VALUES ('$appoinment_time', '$appointment_date', '$appointment_fullname', '$appointment_cellnum', '$appointment_reason', '$statuszero')";
            $query=$conn->query($sql);
            if($query)  
                 {
            $status = "success";
            $status_message = "Appointment Set! We will respond to your appointment as soon as possible.";
                 }
                    else
                         {
        
                             $status = "error";
                             $status_message = "Appointment Not Set!";
                        }
            
             }
        
        
        
        
        
		
		
	}
	else if (mysqli_num_rows($results) >2) {

        $status = "full";
        $status_message = "Time block full.Please select another time block.";
		// array_push($errors, "Wrong username/password combination");
		// header("Refresh:0");
    }
    

	
	$data = array(
		'appdate' => $appointment_date, 
		'apptime' => $appoinment_time,
		'appfname' => $appointment_fullname,
		'appcnum' => $appointment_cellnum,
        'appreason' => $appointment_reason,
        'status' => $status,
        'status_message' => $status_message
	);

	echo json_encode($data);
?>

