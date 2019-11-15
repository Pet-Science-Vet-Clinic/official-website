<?php 
	include('conn.php');
	
	// $default_email = 'info@petsciencevet.com';
    // $fasfg = 'infopassword';
    $db = mysqli_connect($servername,$username,$password,$DatabaseName);
    date_default_timezone_set("Asia/Bangkok");
    $datenow=date("Y-m-d");

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
   
    while($rows = mysqli_fetch_array($results)):; 
    $AppDate = $rows['appointment_Date'];
    endwhile;
    
//     $timestamp = strtotime($AppDate);
//     $oneDay = strtotime("-1 day");
        $dayBehind = date('Y-m-d', strtotime($AppDate . ' -1 day'));
        $dateToday=date_create($AppDate);
        $dateYesterday=date_create("2019-11-17");
    

    
    $status = "";
    $status_message ="";
    $status_header="";


    $statuszero = "0";
    $statusone = "1";
    
    

    if (mysqli_num_rows($results) ==1) 
      { 
                
                if($AppDate==$datenow)
                {
                        $status = "passed";
                        $status_header = "Appointment cannot be cancelled";
                        $status_message = "Appointments can only be cancelled a day before the set date.";
                }
                else if($datenow!=$dayBehind) 
                {
                
                
                        $sql = "UPDATE tb_appointment_list SET appointment_Flag ='1' WHERE appointment_SystemID='$appCancelID'";
                        $resultzx = mysqli_query($db,$sql);

                        $query2 = "SELECT * FROM tb_appointment_list WHERE appointment_IDReference_Customer='$appVerifyPhone' AND appointment_Flag='$two'";
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
                        $status = "passed";
                        $status_header = "Appointment cannot be cancelled";
                        $status_message = "Appointments can only be cancelled a day before the set date.";
                }
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
        'AppDate' => $AppDate,
        'datenow' => $datenow,
        'dayBehind' => $dayBehind,
        'dateToday' => $dateToday
        

        
	);

	echo json_encode($data);
?>

