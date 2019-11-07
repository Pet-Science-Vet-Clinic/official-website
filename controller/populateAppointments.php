<?php 
	include('conn.php');
	
	// $default_email = 'info@petsciencevet.com';
    // $fasfg = 'infopassword';
    $db = mysqli_connect($servername,$username,$password,$DatabaseName);

    $active="2";
    $query = "SELECT * FROM tb_appointment_list";
    $query2 = "SELECT * FROM tb_appointment_list ORDER BY appointment_Flag";
    $results = mysqli_query($db, $query);
//     while($row = mysqli_fetch_assoc($results)){
//         $stringTest = $row['appointment_Status'];
//         echo $stringTest; 
//   }
//   die();
    $appointments_data = array();
    while($rowx = mysqli_fetch_assoc($results))
    {
       $appointments_data[] = $rowx;
    }
    
    $status = "";
    $status_message ="";
    $status_header="";

    
    

    if (mysqli_num_rows($results) >=1) 
      {     
          	
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
        'appointments_data' => $appointments_data
	);

	echo json_encode($data);
?>

