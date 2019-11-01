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

	$appointment_date = isset($_POST['datepicked']) ? $_POST['datepicked'] : "";
	$appoinment_time = isset($_POST['timepicked']) ? $_POST['timepicked'] : "";
    $appointment_fullname = isset($_POST['verifiedCustomerName']) ? $_POST['verifiedCustomerName'] : "";
    $appointment_reason = isset($_POST['reason_for_appointment']) ? $_POST['reason_for_appointment'] : "";
    $appointment_phone = isset($_POST['appNumb']) ? $_POST['appNumb'] : "";
    
    
    // echo $appointment_phone; die();
    $cancel = "1";

    //$register_cellnumtrap = Number_RemoveFirstCharacter($register_cellnum);
    
    // $checked = isset($_POST['newuser']) ? $_POST['newuser'] : "";

    $query = "SELECT * FROM tb_appointment_list WHERE appointment_TimeSlot='$appoinment_time' AND appointment_Date ='$appointment_date' AND appointment_Flag !='$cancel'";
    $results = mysqli_query($db, $query);
    
    $status = "";
    $status_message ="";
    $status_header="";


    $statuszero = "0";
    $statusone = "1";

    $query2 = "SELECT * FROM tb_block_dates WHERE block_Date='$appointment_date'";
    $results2 = mysqli_query($db, $query2);
    if(mysqli_num_rows($results2) >=1)
    {
        $status = "block";
        $status_header = "Date is Unavailable.";
        $status_message = "The clinic is closed on this day.";
    }
    else
    {
        if (mysqli_num_rows($results) <3) 
        { 
        
                $sql = "INSERT INTO tb_appointment_list (appointment_TimeSlot,appointment_Date, appointment_Customer_Name,appointment_ReasonForAppointment,appointment_Status,appointment_IDReference_Customer,appointment_Contact) VALUES ('$appoinment_time', '$appointment_date', '$appointment_fullname', '$appointment_reason', '$statuszero','$appointment_phone','$appointment_phone')";
            $query=$conn->query($sql);

                $status = "success";
                $status_header = "Appointment Set";
                $status_message = "Thank you! Your appointment is set. We will remind you through SMS.";
                            
        }
        else if (mysqli_num_rows($results) >2) {

            $status = "full";
            $status_header = "No vacancy";
            $status_message = "Time block full.Please select another time block.";
            
        }
    }

	
	$data = array(
        'status' => $status,
		'appdate' => $appointment_date, 
		'apptime' => $appoinment_time,
		'appfname' => $appointment_fullname,
        'appreason' => $appointment_reason,
        'status_message' => $status_message,
        'status_header' => $status_header,
        'appointment_phone' => $appointment_phone,
        'ID_reference' => $appointment_phone
	);

	echo json_encode($data);
?>

