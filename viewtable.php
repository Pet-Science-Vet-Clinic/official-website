<?php
include('functions.php');
session_start();
if (isLoggedIn()) {
	header('location: login.php');
}
if(isset($_POST['btnLogout']))
{
session_destroy();
 unset($_SESSION['username']);
//  echo ("hello");
 header("location: viewtable.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Pet Science Appointment List</title>
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
	<link rel="stylesheet" type="text/css" href="css/Table/mobileviewcss.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/Table/table.css">
	
	<link href="css/font-awesome.css" rel="stylesheet">
	<link rel="shortcut icon" href="img/officiallogo.ico">
	<!--stylesheets-->
	<link href="css/style.css" rel='stylesheet' type='text/css' media="all">
<!--===============================================================================================-->
</head>
<body>
<div class="w3-content headerBackground" style="max-width:1500px">

<!-- Header --><br>
<header class="w3-panel w3-center" style="padding:50px 16px">
<img class="topleft" src="img/officiallogo.png" style="width: 290px;">
  	<br><br><h1 class="w3-xlarge">List of all upcoming Appointment Schedules</h1>
	  <h1>Talamban Cebu</h1>

	  <form id="buttonOnly" method="post">
	  	<h4><button class="w3-bar-item btnCss logout topRight" value="btnLogout" id="btnLogout" name="btnLogout">Logout</button></h4><br><br>
	  </form>

		<div>
			<h1><button class="w3-bar-item btnCss loadTable" id="btnLoadTable">Load table</button></h1>
			<button id="btnFetching" style="display:none;" class="btnCss btnFetching" disabled><i class="fa fa-spinner fa-spin" aria-hidden="true"></i>Fetching Appointments</button>
		</div>
	
</header>
<div class="w3-padding-32">
    <div class="w3-bar w3-border">
 
		<div class="container-table100">
			<div style="display:none;" id="TableView">
			<div>
		<input class="labelUp" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name"><button class="btnnSorting" onclick="sortStatus(0)">Sort by status</button>
		<button class="btnnSorting" onclick="sortName(1)">Sort by Name</button><button class="btnnSorting" onclick="sortTime(2)">Sort by Time</button><button class="btnnSorting" onclick="sortDate(3)">Sort by Date</button><button class="btnnSorting" onclick="sortAppointment(4)">Sort by Appointment</button>
		<button class="btnnRefresh" onclick="fetchData()" id="btnRefreshTable">🔄Refresh</button>
		<button class="btnnRefresh" style="display:none;" id="btnRefreshingTable" disabled><i class="fa fa-spinner fa-spin" aria-hidden="true"></i>Refreshing</button>
	</div>
			<div class="PetFollowUp_Table_Div">
				<table class="PetFollowUp_Table" id="appTable">
					<thead>
						<tr>
							<th class="col column1" style="display:none; data-column="column1">ID</th>
							<th class="col column2" data-column="column2">Time Slot</th>
							<th class="col column3" data-column="column3">Scheduled Date</th>
							<th class="col column4" data-column="column4">Customer Name</th>
							<th class="col column5" data-column="column5">Customer Email</th>
							<th class="col column6" data-column="column6">Customer Contact No.</th>
							<th class="col column7" data-column="column7">Reason for Appointment</th>
							<th class="col column8" data-column="column8">Status</th>
						</tr>
					</thead>
						<tbody id="populateHere">
									
									
						</tbody>
						</table>
			</div>
						<input type="hidden" id="AppIDTableVal" name="AppIDTableVal">
					</div>
				</div>
			</div>
		</div>
		

		<!-- Appointment cancel modal alert start -->
	<div class="modal about-modal fade" id="ConfirmShowUpModal" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h5 class="modal-title">Attention</h5>
					</div>
					<div class="modal-body text-center">
						<h5>Please confirm if the customer has arrived in the clinic.</h5>
					</div>
					<div class="modal-footer text-center">
						<button class="btnnDefault" id="btnShowUpNo">No</button><button class="btnnDefault" id="btnShowUpYes">Yes</button>
					</div>
					
				</div>
			</div>
	</div>
	<!-- Appointment cancel modal alert end -->
	<script type='text/javascript' src='js/jquery-2.2.3.min.js'></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/toastr.js"></script>
	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<!-- <script src="js/main.js"></script> -->
	<script src="js/viewtablejs.js"></script>
	



</body>
</html>



