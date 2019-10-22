<?php
include('conn.php');
date_default_timezone_set('Asia/Singapore');
$db = mysqli_connect($servername,$username,$password,$DatabaseName);
$dateNow = date('Y-m-d');
$time_data = array();

$timeNowHour = date("h");
$timeNowMinute= date("i");
$timeNowEx = date("A");
$blockTime = "";

            if ($timeNowHour >= "8" && $timeNowMinute <= "59" && $timeNowEx == "AM") 
            {
                
                $blockTime = "Block A (8am-9am)";
            }
            else if ($timeNowHour >= "9" && $timeNowMinute <= "59" && $timeNowEx == "AM") {
            
                $blockTime = "Block B (9am-10am)";
            }
            else if ($timeNowHour >= "10" && $timeNowMinute <= "59" && $timeNowEx == "AM") {
            
                $blockTime = "Block C (10am-11am)";
            }
            else if ($timeNowHour >= "11" && $timeNowMinute <= "59" && $timeNowEx == "AM") {
            
                $blockTime = "Block D (11am-12pm)";
            }
            else if ($timeNowHour >= "1" && $timeNowMinute <= "59" && $timeNowEx == "PM") {
            
                $blockTime = "Block E (1pm-2pm)";
            }
            else if ($timeNowHour >= "2" && $timeNowMinute <= "59" && $timeNowEx == "AM") {
            
                $blockTime = "Block F (2pm-3pm)";
            }
            else if ($timeNowHour >= "3" && $timeNowMinute <= "59" && $timeNowEx == "PM") {
            
                $blockTime = "Block G (3pm-4pm)";
            }
            else if ($timeNowHour >= "4" && $timeNowMinute <= "59" && $timeNowEx == "PM") {
            
                $blockTime = "Block H (4pm-5pm)";
            }
            else if ($timeNowHour >= "5" && $timeNowMinute <= "59" && $timeNowEx == "PM") {
            
                $blockTime = "Block I (5pm-6pm)";
            }
            else if ($timeNowHour >= "6" && $timeNowMinute <= "59" && $timeNowEx == "PM") {
            
                $blockTime = "Block J (6pm-7pm)";
            }
            else {
                $blockTime =  "Empty";
            }



// $query = "SELECT * FROM tb_appointment_list WHERE appointment_Date='$dateNow'";
// $results = mysqli_query($db, $query);
$query = "SELECT * FROM tb_appointment_list WHERE appointment_TimeSlot='$blockTime' AND appointment_Date ='$dateNow'";
$results = mysqli_query($db, $query);

while($row = mysqli_fetch_assoc($results))
    {
       $appointments_data[] = $row;
    //    echo count($appointments_data); 
    }

    // die();


// echo $blockTime . $dateNow; die();
if (mysqli_num_rows($results)>=1) 
{ 
                // echo "found"; die();

                // echo $timeNowHour . ":" . $timeNowMinute; die();
                $one = "1";
                $timeNowPH = date('h:i:s');
                $selectedTime = date('h:i:s');
                $endTime = strtotime("-16 minutes", strtotime($selectedTime));
                $deadlineTime = date('h:i:s', $endTime); 
                    
                // echo $timeNowPH; die();

            if ($timeNowPH > $deadlineTime)
            {
                // echo $blockTime; die();
                $count=sizeof($appointments_data);
                // echo $count; die();
                  for($i=0;$i<$count;$i++)
                  {
                    $data0 =  $one;
                        $sql = "UPDATE tb_appointment_list SET appointment_Flag ='.$data0.' WHERE appointment_TimeSlot='$blockTime' AND appointment_Date ='$dateNow'";
                        $resultzx = mysqli_query($db,$sql);
                        // echo "Success";
                  }
                    if ($resultzx == 1) {
                        // echo "Record updated successfully";
                    }
                else
                //  echo "nothing";
                
            } 
            // else if ($timenowHour >= $AppointmentHour && $timenowMinute <= $AppointmentMinute)
            // {
            
            //     echo "You are On time!";
            // } 
            else 
            {
                echo "Have a good night!";
            }

}
else
{
    
    echo "not found";
}

?>