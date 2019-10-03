<?php
include('functions.php');
include('conn.php');

if (isLoggedIn()) {
	header('location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Table V03</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/Table/util.css">
	<link rel="stylesheet" type="text/css" href="css/Table/main.css">
	<link rel="stylesheet" type="text/css" href="css/Table/main2.css">
	<link rel="stylesheet" type="text/css" href="css/Table/w3.css">
<!--===============================================================================================-->
</head>
<body>
<div class="w3-content" style="max-width:1500px">

<!-- Header -->
<header class="w3-panel w3-center w3-opacity" style="padding:50px 16px">
  <h1 class="w3-xlarge">Pet Science Veterinary Clinic</h1>
  <h1>Talamban Cebu</h1>
  
  <div class="w3-padding-32">
    <div class="w3-bar w3-border">
      <a href="login.php?logout='1'" class="w3-bar-item w3-button">Log out</a>
</header>


	<?php
    
  	$query = "SELECT * FROM tb_appointment_list";
  	$Result = mysqli_query($conn,$query);
  
  ?>
 
		<div class="container-table100">
			<div class="table100 ver5 m-b-110">
			
			
				<table data-vertable="ver5">
					<thead>
						<tr class="row100 head">
							<th class="column100 column2" data-column="column2">Time Slot</th>
							<th class="column100 column3" data-column="column3">Scheduled Date</th>
							<th class="column100 column4" data-column="column4">Customer Name</th>
							<th class="column100 column5" data-column="column5">Customer Email</th>
							<th class="column100 column6" data-column="column6">Customer Contact No.</th>
							<th class="column100 column7" data-column="column7">Reason for Appointment</th>
						
							
						</tr>
					</thead>
					<tbody>


						 <?php
		    	while($rows = mysqli_fetch_array($Result)):; 
				$Appointment_Time_Slot = $rows['appointment_TimeSlot'];
				$Appoiment_Date = $rows['appointment_Date'];
				$Customer_Name = $rows['appointment_Customer_Name'];
				$Customer_Email = $rows['appointment_Customer_Email'];
				$Customer_Contact = $rows['appointment_Contact'];
				$Appointment_Reason = $rows['appointment_ReasonForAppointment'];
		    ?>
		    <div id="TableItems">

		     <tr class="row100">
		    
		    <td class="column100 column1" data-column="column1"><?php echo $Appointment_Time_Slot;?></td>
		    <td class="column100 column1" data-column="column1"><?php echo $Appoiment_Date;?></td>
		    <td class="column100 column1" data-column="column1"><?php echo $Customer_Name;?></td>
		    <td class="column100 column1" data-column="column1"><?php echo $Customer_Email;?></td>
		    <td class="column100 column1" data-column="column1"><?php echo $Customer_Contact;?></td>
		    <td class="column100 column1" data-column="column1"><?php echo $Appointment_Reason;?></td>
</tr>
</div>
<?php endwhile; ?>
						
					</tbody>
				</table>
			</div>
		</div>
	</div>

	

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>




</body>
</html>



