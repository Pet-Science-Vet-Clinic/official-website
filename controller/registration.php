<?php 
	include('conn.php');
	
	// $default_email = 'info@petsciencevet.com';
    // $fasfg = 'infopassword';
    $db = mysqli_connect($servername,$username,$password,$DatabaseName);

    $registration_fullname = isset($_POST['customer_RegistrationFullname']) ? $_POST['customer_RegistrationFullname'] : "";
	$registration_address = isset($_POST['customer_RegistrationAddress']) ? $_POST['customer_RegistrationAddress'] : "";
	$registration_email = isset($_POST['customer_RegistrationEmail']) ? $_POST['customer_RegistrationEmail'] : "";
	$registration_cellphone = isset($_POST['customer_RegistrationCellphone']) ? $_POST['customer_RegistrationCellphone'] : "";
    $registration_telephone = isset($_POST['customerRegistrationTelephone']) ? $_POST['customerRegistrationTelephone'] : "";
    $registration_optionalphone = isset($_POST['customer_RegistrationOptional']) ? $_POST['customer_RegistrationOptional'] : "";
    
    $status = "";
    $status_message ="";
    $status_header = "";

    $querycheck = "SELECT * FROM tb_customer_information WHERE customer_Name='$registration_fullname' AND customer_Cell ='$registration_cellphone'";
    $resultcheck = mysqli_query($db, $querycheck);

    $querycheck2 = "SELECT * FROM tb_customer_information WHERE customer_Name='$registration_fullname'";
    $resultcheck2 = mysqli_query($db, $querycheck2);

    $querycheck3 = "SELECT * FROM tb_customer_information WHERE customer_Cell ='$registration_cellphone'";
    $resultcheck3 = mysqli_query($db, $querycheck3);

    $statuszero = "0";
    $statusone = "1";
    

    if (mysqli_num_rows($resultcheck)==0) 
    { 
        
        if (mysqli_num_rows($resultcheck2)==1)
        {
            $status = "existingName";
            $status_header = "The information you entered is already existing.";
            $status_message = "Your full name is already registered!";
        }
        else if (mysqli_num_rows($resultcheck3)==1)
        {
            $status = "existingPhone";
            $status_header = "The information you entered is already existing.";
            $status_message = "The cellphone number you have entered is already registered!";
        }
        else
        {
        
            $sqlinsert = "INSERT INTO tb_customer_information (customer_Name,customer_Address, customer_Email, customer_Cell, customer_Phone,customer_Mobile_Add_On) VALUES
             ('$registration_fullname', '$registration_address', '$registration_email', '$registration_cellphone', '$registration_telephone', '$registration_optionalphone')";
            $querycheck=$conn->query($sqlinsert);
            
                if($sqlinsert) 
                 {
                    $status = "success";
                    $status_message = "Thank you for providing us your information, please wait for a text message or SMS if your personal information is verified, inorder to proceed on making an appointment.";
                }
                             else
                             {
                                $status = "error";
                                $status_message = "Insertion Error!";
                             }
                             
         }
		
	}
    else if (mysqli_num_rows($resultcheck)==1) 
    {


        $status = "existing";
        $status_header = "The information you entered is already existing.";
        $status_message = "The fullname and cellphone number you have entered is already registered!";
		// array_push($errors, "Wrong username/password combination");
        // header("Refresh:0");
            
    }
    

	
	$data = array(
		'appfname' => $registration_fullname,
		'appcnum' => $registration_cellphone,
        'status' => $status,
        'status_message' => $status_message
	);

	echo json_encode($data);
?>

