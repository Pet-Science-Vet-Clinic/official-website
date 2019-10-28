<?php 
	include('conn.php');
	
	// $default_email = 'info@petsciencevet.com';
    // $fasfg = 'infopassword';
    $db = mysqli_connect($servername,$username,$password,$DatabaseName);
    
	$appVerifyPhone = isset($_POST['appointmentStatus_customer_phone']) ? $_POST['appointmentStatus_customer_phone'] : "";

    // $register_cellnumtrap = Number_RemoveFirstCharacter($register_cellnum);
    
    // $checked = isset($_POST['newuser']) ? $_POST['newuser'] : null;

    $query = "SELECT * FROM tb_customer_information WHERE customer_Cell='$appVerifyPhone'";
    $results = mysqli_query($db, $query);
    $customer_name = "";
    $customer_status = 0;
    while($rows = mysqli_fetch_array($results)):; 
    $customer_name = $rows['customer_Name'];
    $customer_status = $rows['customer_Status'];
    endwhile;

    $appointments_data = array();

    $appStatusPending = 2;
    $selectedDate = "";
    $selectedTimeBlock = "";
    $selectedAppointmentReason = "";
    

    $query2 = "SELECT * FROM tb_appointment_list WHERE appointment_IDReference_Customer='$appVerifyPhone' AND appointment_Status='$appStatusPending'";
    $results2 = mysqli_query($db, $query2);

    
    while($row = mysqli_fetch_assoc($results2))
    {
       $appointments_data[] = $row;
    }
    // echo json_encode($appointments_data); die();
    // echo $results2; die();

    // while($rows = mysqli_fetch_array($results2)):; 
    // $selectedDate = $rows['appointment_Date'];
    // $selectedTimeBlock = $rows['appointment_TimeSlot'];
    // $selectedAppointmentReason = $rows['appointment_ReasonForAppointment'];
    


    $status = "";
    $status_message ="";
    $status_header="";
  

    if (mysqli_num_rows($results)==1) 
    { 
        $status="found";

		if($customer_status != 1){
            $status = "pending";
            $status_header = "Pending Status";
             $status_message = "Your customer details is still pending for approval.";
        }
        
		
	}
	else if (mysqli_num_rows($results)==0) {

        $status = "notfound";
        $status_header = "Phone number not found.";
        $status_message = "The number you entered was not found in our records.";
    }
    

	
	$data = array(
		'appVerifyPhone' => $appVerifyPhone,
        'status' => $status,
        'status_message' => $status_message,
        'status_header' => $status_header,
        'customer_name' => $customer_name,
        'appointments_data' => $appointments_data
    );

	echo json_encode($data);
?>

