<?php 
	include('conn.php');
	
	// $default_email = 'info@petsciencevet.com';
    // $fasfg = 'infopassword';
    $db = mysqli_connect($servername,$username,$password,$DatabaseName);

    $tableArr = stripcslashes($_POST['tableArr']);
    $tableArr = json_decode($tableArr,TRUE);

    $registration_fullname = isset($_POST['customer_RegistrationFullname']) ? $_POST['customer_RegistrationFullname'] : "";
	$registration_address = isset($_POST['customer_RegistrationAddress']) ? $_POST['customer_RegistrationAddress'] : "";
	$registration_email = isset($_POST['customer_RegistrationEmail']) ? $_POST['customer_RegistrationEmail'] : "";
	$registration_cellphone = isset($_POST['customer_RegistrationCellphone']) ? $_POST['customer_RegistrationCellphone'] : "";
    $registration_telephone = isset($_POST['customerRegistrationTelephone']) ? $_POST['customerRegistrationTelephone'] : "";
    $registration_optionalphone = isset($_POST['customer_RegistrationOptional']) ? $_POST['customer_RegistrationOptional'] : "";

    $registration_petName = isset($_POST['pet_Name']) ? $_POST['pet_Name'] : "";
	$registration_petSpecie = isset($_POST['pet_Species']) ? $_POST['pet_Species'] : "";
	$registration_petBreed = isset($_POST['pet_Breed']) ? $_POST['pet_Breed'] : "";
    $registration_petBirth = isset($_POST['pet_Birthdate']) ? $_POST['pet_Birthdate'] : "";
    $registration_petBirth2 = isset($_POST['date2words']) ? $_POST['date2words'] : "";
    // $tableArr = isset($_POST['tableArr']) ? $_POST['tableArr'] : "";
    $row1Value = "No val";
    $row2Value = "No val";
    $row3Value = "No val";
    $row4Value = "No val";
    $row5Value = "No val";




    $tableCount = isset($_POST['tableCount']) ? $_POST['tableCount'] : "";

    $status = "";
    $status_message ="";
    $status_header = "";

    $querycheck = "SELECT * FROM tb_customer_information WHERE customer_Name='$registration_fullname' AND customer_Cell ='$registration_cellphone'";
    $resultcheck = mysqli_query($db, $querycheck);

    while($rows = mysqli_fetch_array($resultcheck)):; 
    $customer_sysID = $rows['customer_SystemID'];
    endwhile;

    $querycheck2 = "SELECT * FROM tb_customer_information WHERE customer_Name='$registration_fullname'";
    $resultcheck2 = mysqli_query($db, $querycheck2);

    $querycheck3 = "SELECT * FROM tb_customer_information WHERE customer_Cell ='$registration_cellphone'";
    $resultcheck3 = mysqli_query($db, $querycheck3);

    $querycheck4 = "SELECT * FROM tb_pet_information";
    $resultcheck4 = mysqli_query($db, $querycheck4);


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

                 $querycheckzx = "SELECT * FROM tb_customer_information WHERE customer_Name='$registration_fullname' AND customer_Cell ='$registration_cellphone'";
                $resultcheckzx = mysqli_query($db, $querycheckzx);
                $customer_sysID= "";
                while($rows = mysqli_fetch_array($resultcheckzx)):; 
                $customer_sysID = $rows['customer_SystemID'];
                endwhile;
            
                // echo $customer_sysID; die();
                if($sqlinsert) 
                 {
                    // $status = "success";
                    // $status_header = "Registration submitted.";
                    // $status_message = "Thank you for providing us your information, please wait for a text message or SMS if your personal information is verified, inorder to proceed on making an appointment.";

                    if($tableCount > 0)
                             {
                               
                                for ($i= 0;$i<count($tableArr);$i++)
                                 { 
                                    $row1Value = $tableArr[$i]["Pet_Name"];
                                    $row2Value = $tableArr[$i]["Specie"];
                                    $row3Value = $tableArr[$i]["Gender"];
                                    $row4Value = $tableArr[$i]["Breed"];
                                    $row5Value = $tableArr[$i]["Birthday"];
                                    $row6Value = $tableArr[$i]["Birthday2Words"];

                                    $sqlinsert2 = "INSERT INTO tb_pet_information (pet_IDReference_Customer,pet_Name, pet_Specie,pet_Sex, pet_Breed, pet_DOB,pet_DOB2) VALUES
                                    ('$customer_sysID', '$row1Value', '$row2Value', '$row3Value', '$row4Value', '$row5Value', '$row6Value')";
                                   $querycheck4=$conn->query($sqlinsert2);

                                    // echo $row1Value . " /// " . $row2Value. " /// ".
                                    // $row3Value . " /// " . $row4Value . " /// " .
                                    // $row5Value;
                                }
                                $status = "success";
                    $status_header = "Registration submitted.";
                    $status_message = "Thank you for providing us your information, please wait for a text message or SMS if your personal information is verified, inorder to proceed on making an appointment.";

                            }
                             
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
		// 'appfname' => $registration_fullname,
		// 'appcnum' => $registration_cellphone,
        'status' => $status,
        'status_header' => $status_header,
        'status_message' => $status_message
        // 'customer_sysID' => $customer_sysID,
        // 'registration_petName' => $registration_petName,
        // 'registration_petSpecie' => $registration_petSpecie,
        // 'registration_petBreed' => $registration_petBreed,
        // 'registration_petBirth' => $registration_petBirth,
        // 'registration_petBirth2' => $registration_petBirth2,
        // 'tableCount' => $tableCount,
        // 'row1Value' => $row1Value,
        // 'row2Value' => $row2Value,
        // 'row3Value' => $row3Value,
        // 'row4Value' => $row4Value
        
	);

	echo json_encode($data);
?>

