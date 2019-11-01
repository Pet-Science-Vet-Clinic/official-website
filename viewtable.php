<?php
// include('functions.php');
include('conn.php');
session_start();
if(isset($_POST['btnLogout']))
{
 unset($_SESSION['username']);
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
	<link rel="shortcut icon" href="img/officiallogo.ico">
	<!--stylesheets-->
	<link href="css/style.css" rel='stylesheet' type='text/css' media="all">
<!--===============================================================================================-->
</head>
<body>
<div class="w3-content" style="max-width:1500px">

<!-- Header -->
<header class="w3-panel w3-center w3-opacity" style="padding:50px 16px">
  	<h1 class="w3-xlarge">Pet Science Veterinary Clinic</h1>
	  <h1>Talamban Cebu</h1>
	  <form>
	  <h4><button class="w3-bar-item btnCss logout" value="btnLogout" id="btnLogout" name="btnLogout">Logout</button></h4><br><br>
	</form>
	<div>
	<h1><button class="w3-bar-item btnCss loadTable" id="btnLoadTable">Load table</button></h1>
	<div>
</header>
<div class="w3-padding-32">
    <div class="w3-bar w3-border">
 
		<div class="container-table100">
			<div style="display:none;" id="TableView">
				<table class="table">
					<thead class="thead-gray">
						<tr>
							<th class="col column1" data-column="column1">ID</th>
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



