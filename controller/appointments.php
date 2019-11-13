<?php 
	include('conn.php');
    
    
	// $default_email = 'info@petsciencevet.com';
    // $fasfg = 'infopassword';
    $db = mysqli_connect($servername,$username,$password,$DatabaseName);
    date_default_timezone_set('Asia/Singapore');
    $dateNow = date('Y-m-d');
    $time_data = array();

    $timeNowHour = date("h");
    $timeNowMinute= date("i");
    $timeNowEx = date("A");

    


	$appointment_date = isset($_POST['datepicked']) ? $_POST['datepicked'] : "";
	$appoinment_time = isset($_POST['timepicked']) ? $_POST['timepicked'] : "";
    $appointment_fullname = isset($_POST['verifiedCustomerName']) ? $_POST['verifiedCustomerName'] : "";
    $appointment_reason = isset($_POST['reason_for_appointment']) ? $_POST['reason_for_appointment'] : "";
    $appointment_phone = isset($_POST['appNumb']) ? $_POST['appNumb'] : "";
    $appointment_Date2Words = isset($_POST['date2words']) ? $_POST['date2words'] : "";
    $appointment_PetChosen = isset($_POST['choosenPet']) ? $_POST['choosenPet'] : "";
    

    $hourval ="";

    if($appoinment_time == "10am - 11am")
    {
        $hourval = "10";
    }
    else if($appoinment_time == "11am - 12pm")
    {
        $hourval = "11";
    }
    else if($appoinment_time == "12pm - 1pm")
    {
        $hourval = "12";
    }
    else if($appoinment_time == "1pm - 2pm")
    {
        $hourval = "01";
    }
    else if($appoinment_time == "2pm - 3pm")
    {
        $hourval = "02";
    }
    else if($appoinment_time == "3pm - 4pm")
    {
        $hourval = "03";
    }
    else if($appoinment_time == "4pm - 5pm")
    {
        $hourval = "04";
    }
    else if($appoinment_time == "5am - 6am")
    {
        $hourval = "05";
    }
    
    
    // echo $timeNowHour . $timeNowMinute . $timeNowEx; die();
    $cancel = "1";
    
    // $checked = isset($_POST['newuser']) ? $_POST['newuser'] : "";

    $query = "SELECT * FROM tb_appointment_list WHERE appointment_TimeSlot='$appoinment_time' AND appointment_Date ='$appointment_date' AND appointment_Flag !='$cancel'";
    $results = mysqli_query($db, $query);

    $queryz = "SELECT * FROM tb_appointment_list WHERE appointment_TimeSlot='$appoinment_time' AND appointment_Date ='$appointment_date' AND appointment_Flag !='$cancel' AND appointment_IDReference_Customer ='$appointment_phone'";
    $results3 = mysqli_query($db, $queryz);

 
    $status = "";
    $status_message ="";
    $status_header="";


    $statuszero = "0";
    $statusone = "1";
    $statustwo = "2";

    $query2 = "SELECT * FROM tb_block_dates WHERE block_Date='$appointment_date'";
    $results2 = mysqli_query($db, $query2);

    $queryzxc = "SELECT * FROM tb_appointment_list WHERE appointment_TimeSlot='$appoinment_time' AND appointment_Date ='$appointment_date' AND appointment_Flag !='$cancel' AND appointment_ReasonForAppointment ='$appointment_reason' AND appointment_IDReference_Pet ='$appointment_PetChosen'";
    $resultszxc = mysqli_query($db, $queryzxc);

    if(mysqli_num_rows($results2) >=1)
    {
        $status = "block";
        $status_header = "Date is Unavailable.";
        $status_message = "The clinic is closed on this day.";
    }
    else
    {
        if(mysqli_num_rows($results3) >=2)
        {
            $status = "max";
            $status_header = "Appointment limit reached.";
            $status_message = "Every customer can only make a maximum of 2 appointments per time block to make way for other customers who wants to make appointments in the clinic.";
        }
        else
        {
            if (mysqli_num_rows($results) <3) 
            { 
                if(mysqli_num_rows($resultszxc)>=1)
                {
                    $status = "duplicate";
                    $status_header = "Duplicate appointment with pet";
                    $status_message = "You have already set an appointment with on your selected date,time and service. To prevent duplication, Please select another date,time or service. Thank you.";
                }
                else
                {
                    if($hourval <= $timeNowHour)
                    {
                        $status = "late";
                        $status_header = "Selected time already passed";
                        $status_message = "Your selected time has already passed. Please select another time.";
                    }
                    else
                    {
                        $sql = "INSERT INTO tb_appointment_list (appointment_TimeSlot,appointment_Date, appointment_Customer_Name,appointment_ReasonForAppointment,appointment_Status,appointment_IDReference_Customer,appointment_Contact,appointment_Date2,appointment_IDReference_Pet) VALUES ('$appoinment_time', '$appointment_date', '$appointment_fullname', '$appointment_reason', '$statuszero','$appointment_phone','$appointment_phone','$appointment_Date2Words','$appointment_PetChosen')";
                        
                        $query=$conn->query($sql);

                        $status = "success";
                        $status_header = "Appointment Set";
                        $status_message = "Thank you! Your appointment is set. We will remind you through SMS.";
                    }
                }       
            }
            else if (mysqli_num_rows($results) >2) {

                $status = "full";
                $status_header = "No vacancy";
                $status_message = "Time block full.Please select another time block.";
                
            }
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
        'ID_reference' => $appointment_phone,
        'appointment_PetChosen' => $appointment_PetChosen
        
	);

	echo json_encode($data);
?>

