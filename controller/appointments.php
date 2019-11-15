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
    $appointment_setDate = isset($_POST['appDate']) ? $_POST['appDate'] : "";
	$appoinment_time = isset($_POST['timepicked']) ? $_POST['timepicked'] : "";
    $appointment_fullname = isset($_POST['verifiedCustomerName']) ? $_POST['verifiedCustomerName'] : "";
    $appointment_reason = isset($_POST['reason_for_appointment']) ? $_POST['reason_for_appointment'] : "";
    $appointment_phone = isset($_POST['appNumb']) ? $_POST['appNumb'] : "";
    $appointment_Date2Words = isset($_POST['date2words']) ? $_POST['date2words'] : "";
    $appointment_PetChosen = isset($_POST['choosenPet']) ? $_POST['choosenPet'] : "";
    $appointment_dateEnd = isset($_POST['appointment_date_end']) ? $_POST['appointment_date_end'] : "";
    $appointment_dateEnd_2 = isset($_POST['endDate']) ? $_POST['endDate'] : "";
    $appointment_2ndService = isset($_POST['appService']) ? $_POST['appService'] : "";
    
      

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

    $queryOwner = "SELECT * FROM tb_customer_information WHERE customer_Cell='$appointment_phone'";
    $resultsOwner = mysqli_query($db, $queryOwner);

    while($rowsFetch = mysqli_fetch_array($resultsOwner)):; 
    $customerData = $rowsFetch['customer_SystemID'];
    endwhile;

    $queryPet = "SELECT * FROM tb_pet_information WHERE pet_Name='$appointment_PetChosen' AND pet_IDReference_Customer ='$customerData'";
    $resultsPet = mysqli_query($db, $queryPet);
    
    while($rowsFetchPet = mysqli_fetch_array($resultsPet)):; 
    $petData = $rowsFetchPet['pet_SystemID'];
    endwhile;

    // if($appointment_2ndService == "Confinement")
    // {
        
    //         $querySelectConfinement = "SELECT * FROM tb_pet_record_confinement";
    //         $resultConfinement = mysqli_query($db, $querySelectConfinement);

    //         $queryConfinementCheck = "SELECT * FROM tb_pet_record_confinement WHERE confinement_Start_Date='$appointment_date'";
    //         $resultConfinementCheck = mysqli_query($db, $queryConfinementCheck);
            
    //         $queryConfinementPet = "SELECT * FROM tb_pet_record_confinement WHERE confinement_Start_Date='$appointment_date' AND confinement_IDReference_Pet ='$appointment_PetChosen'";
    //         $resultPetEntry = mysqli_query($db, $queryConfinementPet);
           
            
    //        if ($appointment_2ndService == "Confinement")
    //         {
    //             if(mysqli_num_rows($resultConfinement) >2)
    //             {
    //                 $status = "confinementFull";
    //                 $status_header = "Slots Full";
    //                 $status_message = "Slots for Confinement services are currently full";
    //             }
    //         }
    //     else
    //     {
    //         $sqlConfinement = "INSERT INTO tb_appointment_list (confinement_IDReference_User,confinement_IDReference_Pet, confinement_Start_Date,confinement_Start_Date_2,confinement_End_Date,confinement_End_Date_2) VALUES ('$customerData', '$petData', '$appointment_date', '$appointment_Date2Words', '$appointment_dateEnd','$appointment_dateEnd_2')";
    //         $queryInsertConfinement=$conn->query($sqlConfinement);

    //         if($queryInsertConfinement)
    //         {
    //             $status = "success";
    //             $status_header = "Appointment Set";
    //             $status_message = "Thank you! Your appointment is set. We will remind you through SMS.";
    //         }
    //         else
    //         {
    //             $status = "failed2";
    //             $status_header = "Appointment Failed";
    //             $status_message = "Confinement or Boarding failed";
    //         }


    //     }

    // }
    // else if ($appointment_2ndService=="Boarding")
    // {
    //     $querySelectBoarding = "SELECT * FROM tb_pet_record_confinement";
    //         $resultBoarding = mysqli_query($db, $querySelectBoarding);

    //         $queryBoardingCheck = "SELECT * FROM tb_pet_record_confinement WHERE confinement_Start_Date='$appointment_date'";
    //         $resultBoardingCheck = mysqli_query($db, $queryBoardingCheck);
            
    //         $queryBoardingPet = "SELECT * FROM tb_pet_record_confinement WHERE confinement_Start_Date='$appointment_date' AND confinement_IDReference_Pet ='$appointment_PetChosen'";
    //         $resultPetSlot = mysqli_query($db, $queryBoardingPet);

    //     if($appointment_2ndService == "Boarding")
    //     {
    //         if(mysqli_num_rows($resultBoarding) >5)
    //         {
    //             $status = "boardingFull";
    //             $status_header = "Slots Full";
    //             $status_message = "Slots for Boarding services are currently full";
    //         }
    //     }
    //     else
    //     {
    //         $sqlBoarding = "INSERT INTO tb_pet_record_boarding (boarding_IDReference_User,boarding_IDReference_Pet, boarding_Start_Date,boarding_Start_Date_2,boarding_End_Date,boarding_End_Date_2) VALUES ('$customerData', '$petData', '$appointment_date', '$appointment_Date2Words', '$appointment_dateEnd','$appointment_dateEnd_2')";
    //         $queryInsertBoarding=$conn->query($sqlBoarding);

    //         if($queryInsertBoarding)
    //         {
    //             $status = "success";
    //             $status_header = "Appointment Set";
    //             $status_message = "Thank you! Your appointment is set. We will remind you through SMS.";
    //         }
    //         else
    //         {
    //             $status = "failed2";
    //             $status_header = "Appointment Failed";
    //             $status_message = "Confinement or Boarding failed";
    //         }

    //     }
    // }
 
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
                    if($hourval <= $timeNowHour && $dateNow==$appointment_date)
                    {
                        $status = "late";
                        $status_header = "Selected time already passed";
                        $status_message = "Your selected time has already passed. Please select another time.";
                    }
                    else
                    {
                        
                        $sqlInsert = "INSERT INTO tb_appointment_list (appointment_TimeSlot,appointment_Date, appointment_Customer_Name,appointment_ReasonForAppointment,appointment_Status,appointment_IDReference_Customer,appointment_Contact,appointment_Date2,appointment_IDReference_Pet) VALUES ('$appoinment_time', '$appointment_setDate', '$appointment_fullname', '$appointment_reason', '$statuszero','$appointment_phone','$appointment_phone','$appointment_Date2Words','$petData')";
                        $queryInsert=$conn->query($sqlInsert);
                        
                                 if($queryInsert)
                                    {
                                        $status = "success";
                                        $status_header = "Appointment Set";
                                        $status_message = "Thank you! Your appointment is set. We will remind you through SMS.";
                                    }
                                else
                                {
                                        $status = "wla";
                                }
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
        'appointment_PetChosen' => $appointment_PetChosen,
        'appointment_Date2Words' => $appointment_Date2Words,
        'appointment_setDate' => $appointment_setDate
        
        
        

        
        
        
        
	);

	echo json_encode($data);
?>

