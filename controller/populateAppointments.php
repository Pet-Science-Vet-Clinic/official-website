<?php 
	include('conn.php');
	
	// $default_email = 'info@petsciencevet.com';
    // $fasfg = 'infopassword';
    $db = mysqli_connect($servername,$username,$password,$DatabaseName);
    date_default_timezone_set('Asia/Singapore');
    // $dateNow = date('Y-m-d');
    $active="2";
    $query = "SELECT * FROM tb_appointment_list WHERE appointment_Date >= date_sub(now(), interval 1 day) ORDER BY appointment_Date2";
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
            $status_header = "Table Loaded";
            $status_message = "Table has been populated.";
        }
        else
         {

        $status = "failed";
        $status_header = "Table data fetch failed";
        $status_message = "Table data fetching failed.";
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

