<?php 
	include('conn.php');
	
	// $default_email = 'info@petsciencevet.com';
    // $fasfg = 'infopassword';
    $db = mysqli_connect($servername,$username,$password,$DatabaseName);
    

    $appCancelID = isset($_POST['appID']) ? $_POST['appID'] : "";
    $appVerifyPhone = isset($_POST['appNumb']) ? $_POST['appNumb'] : "";

    $cancel = "1";
    $two="2";
    // echo $appVerifyPhone; die();
    //$register_cellnumtrap = Number_RemoveFirstCharacter($register_cellnum);
    
    // $checked = isset($_POST['newuser']) ? $_POST['newuser'] : "";

    $query = "SELECT * FROM tb_appointment_list WHERE appointment_SystemID='$appCancelID'";
    $results = mysqli_query($db, $query);
    // $appointID = "";
    $appointments_data = array();
   
    // while($rows = mysqli_fetch_array($results)):; 
    // $appointID = $rows['appointment_SystemID'];
    // endwhile;
    
    
    $status = "";
    $status_message ="";
    $status_header="";


    $statuszero = "0";
    $statusone = "1";
    
    

    if (mysqli_num_rows($results) ==1) 
      { 
	
            $sql = "UPDATE tb_appointment_list SET appointment_Status ='1' WHERE appointment_SystemID='$appCancelID'";
            $resultzx = mysqli_query($db,$sql);

            $query2 = "SELECT * FROM tb_appointment_list WHERE appointment_IDReference_Customer='$appVerifyPhone' AND appointment_Status='$two'";
    $results2 = mysqli_query($db, $query2);
    while($rowx = mysqli_fetch_assoc($results2))
    {
       $appointments_data[] = $rowx;
    }
                
            $status = "success";
            $status_header = "Appointment Cancelled";
            $status_message = "Your appointment is cancelled.";
        }
        else
         {

        $status = "failed";
        $status_header = "Cancellation failed";
        $status_message = "Time cancellation failed.";
        }
    

	
	$data = array(
        'status' => $status,
        'status_message' => $status_message,
        'status_header' => $status_header,
        'appCancelID' => $appCancelID,
        'appointments_data' => $appointments_data,
        'appVerifyPhone' => $appVerifyPhone,
        
	);

	echo json_encode($data);
?>

