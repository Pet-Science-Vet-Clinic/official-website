<?php 
	include('conn.php');
	
	// $default_email = 'info@petsciencevet.com';
    // $fasfg = 'infopassword';
    $db = mysqli_connect($servername,$username,$password,$DatabaseName);
    
	$verify_phone = isset($_POST['appointment_customer_phone']) ? $_POST['appointment_customer_phone'] : null;

    // $register_cellnumtrap = Number_RemoveFirstCharacter($register_cellnum);
    
    // $checked = isset($_POST['newuser']) ? $_POST['newuser'] : null;

    $query = "SELECT * FROM tb_customer_information WHERE customer_Cell='$verify_phone'";
    $results = mysqli_query($db, $query);
    $resultsz = mysqli_query($db, $query);

    while($rowsz = mysqli_fetch_array($resultsz)):; 
    $customerID = $rowsz['customer_SystemID'];
    endwhile;

    $queryx = "SELECT * FROM tb_pet_information WHERE pet_IDReference_Customer='$customerID'";
    $resultsx = mysqli_query($db, $queryx);

    $numberofpets = array();
    while($rowx = mysqli_fetch_assoc($resultsx))
    {
       $numberofpets[] = $rowx;
    }
    
    $customer_name = "";
    $customer_status = 0;

    while($rows = mysqli_fetch_array($results)):; 
    $customer_name = $rows['customer_Name'];
    $customer_status = $rows['customer_Status'];
    endwhile;


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
		'verifyphone' => $verify_phone,
        'status' => $status,
        'status_message' => $status_message,
        'status_header' => $status_header,
        'customer_name' => $customer_name,
        'numberofpets' => $numberofpets
        
	);

	echo json_encode($data);
?>

