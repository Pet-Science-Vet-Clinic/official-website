<?php 
	include('conn.php');
	
	// $default_email = 'info@petsciencevet.com';
    // $fasfg = 'infopassword';
    $db = mysqli_connect($servername,$username,$password,$DatabaseName);
    

    $appShowUpID = isset($_POST['appID']) ? $_POST['appID'] : "";

    $cancel = "1";
    $two="2";
    // echo $appShowUpID; die();


    $query = "SELECT * FROM tb_appointment_list WHERE appointment_SystemID='$appShowUpID'";
    $results = mysqli_query($db, $query);
    $appointments_data = array();
   
    
    $status = "";
    $status_message ="";
    $status_header="";


    $statuszero = "0";
    $statusone = "1";

    if (mysqli_num_rows($results) ==1) 
      { 
	
            $sql = "UPDATE tb_appointment_list SET appointment_Flag ='4' WHERE appointment_SystemID='$appShowUpID'";
            $resultzx = mysqli_query($db,$sql);

            $query2 = "SELECT * FROM tb_appointment_list";
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
		// array_push($errors, "Wrong username/password combination");
		// header("Refresh:0");
        }
    

	
	$data = array(
        'status' => $status,
        'status_message' => $status_message,
        'status_header' => $status_header,
        'appShowUpID' => $appShowUpID,
        'appointments_data' => $appointments_data
	);

	echo json_encode($data);
?>

