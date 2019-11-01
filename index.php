<?php
include('functions.php');

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Pet Science Veterinary Clinic</title>

	<!--meta tags -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="Lovely-pets Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--//meta tags ends here-->

	<!--booststrap-->

	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
	<!--//booststrap end-->

	<!-- font-awesome icons -->
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- //font-awesome icons -->
	<!--stylesheets-->
	<link href="css/style.css" rel='stylesheet' type='text/css' media="all">
	<!--//stylesheets-->
	<link rel='stylesheet' type='text/css' href='css/jquery.easy-gallery.css' />
	<!-- For-gallery-CSS -->
	<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/toastr.css" rel="stylesheet" type="text/css" media="all" />
	<!-- //pop-ups-->
	<link href="//fonts.googleapis.com/css?family=Montserrat:300,400,500" rel="stylesheet">
	<link rel="shortcut icon" href="img/officiallogo.ico">
</head>

<body>
	<div class="header-outs">
		<div class="header-w3layouts">
			<!-- Navigation -->

			<div class="header-bar">
				<nav class="navbar navbar-default">
					<div class="navbar-header navbar-left">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<img src="img/rippleeffect.png" style="width: 290px;">
						<!-- <h1><a class="navbar-brand" href="index.html">L<span class="fa fa-paw" aria-hidden="true"></span>vely-Pets</a></h1> -->
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
						<nav>
							<ul class="nav navbar-nav">
								<li class="active"><a href="index.html">Home</a></li>
								<li><a href="#about" class="scroll">About</a></li>
								<li><a href="#services" class="scroll">Services</a></li>
								<li class="active" style="border: 2px solid #20c7b3;">
									<a href="#" data-toggle="modal" id="buttontick" >Make an Appointment</a>
								</li>
								<li><a href="#" class="scroll" id="btnAppStatus">App. Status</a></li>
								<li><a href="#contact" class="scroll">Contact Us</a></li>
								<li><a href="#faq" class="scroll">FAQ</a></li>
							</ul>
						</nav>
					</div>
				</nav>
			</div>

			<div class="clearfix"> </div>

		</div>

		<!-- Slideshow 4 -->
		<div class="slider">
			<div class="callbacks_container">
				<ul class="rslides" id="slider4">
					<li>
						<div class="slider-img">
							<div class="container">
								<div class="slider-info">
									<h4> <span class="home-banner">M</span><span class="home-bannerx">ake </span><span class="home-banner">A</span><span class="home-bannerx">n </span><span class="home-banner">A</span><span class="home-bannerx">ppointment</span> <span class="home-banner">N</span><span class="home-bannerx">ow!</span>
										<span
										    class="fa fa-paw paw-banner" aria-hidden="true"></span><span class="fa fa-paw paw-banner" aria-hidden="true"></span></h4>
									<p>Make appointments with us online by clicking button below</p>
									<div class="outs_more-buttn">
									<a href="#" data-toggle="modal" data-target="#registration-modal">Click Here!</a>
									</div>
								</div>
							</div>
						</div>
					</li>
					<li>
						<div class="slider-img ">
							<div class="container">
								<div class="slider-info">
									<h4><span class="home-banner">N</span><span class="home-bannerx">ew </span><span class="home-banner">H</span><span class="home-bannerx">ere?</span>
										<span
										    class="fa fa-paw paw-banner" aria-hidden="true"></span><span class="fa fa-paw paw-banner" aria-hidden="true"></span> </h4>
									<p>Click the button below to register and make an appointment today.</p>
									<div class="outs_more-buttn">
										<a href="#" data-toggle="modal" id="buttonticks" data-target="#makeAppointment-modal" onclick="ticker2();">Register Now!</a>
									</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
		<!-- This is here just to demonstrate the callbacks -->
		<!-- <ul class="events">
      <li>Example 4 callback events</li>
    </ul>-->
		<!-- //banner -->
		<!-- modal -->
		
	<!-- //modal -->

	<!-- Registration information Modal -->
	<div class="modal about-modal fade" id="registration-modal" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" id="buttonclosemodal" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h6 class="modal-title">We need to verify your personal information first before making an appointment.</h6><p><br><h6 class="modal-textdesc">Already verified?  <button id="btnMakeAppointment" class="btnn">Make appointment now!</button></p></h6>
					</div>
					<div class="modal-body">
						<div class="out-info">
							<div class="letter-w3ls">

								<form id="registrationModalForm">
									<div class="form-header">Your Personal Information<br><br></div>
									<div class="main">
									<div class="form-left-to-w3l">

									<input type="text" id="customer_RegistrationFullname" style="display:block" name="customer_RegistrationFullname"   maxlength="45" placeholder="FullName" required>
											<div class="clear"></div>
										</div>

										 <div class="form-right-to-w3ls">
										 <input type="text" id="customer_RegistrationAddress" style="display:block" name="customer_RegistrationAddress"   maxlength="45" placeholder="Address" required>
										
											<div class="clear"></div>
										</div>

										</div>

									<div class="main">
										<div class="form-left-to-w3l">

										<input type="email" id="customer_RegistrationEmail" style="display:block" name="customer_RegistrationEmail"   maxlength="45" placeholder="Email Address" required>
											<div class="clear"></div>
										</div>

										<div class="form-right-to-w3ls">
										
													<input type="text" id="customer_RegistrationCellphone" name="customer_RegistrationCellphone"   maxlength="11" placeholder="Cellphone Number" required>
											
													<div class="clear"></div>
												</div>
											
									</div>
									<div class="main">

										<div class="form-left-to-w3l">
										<input type="text" id="customer_RegistrationTelephone" style="display:block" name="customer_RegistrationTelephone"   maxlength="45" placeholder="Telephone Number" required>
										
										</div>
										<div class="form-right-to-w3ls">
										<input type="text" id="customer_RegistrationOptional" style="display:block" name="customer_RegistrationOptional"   maxlength="11" placeholder="Cellphone (Optional)">
											<div class="clear"></div>
										</div>
									</div>

									<div class="divider"></div>

								
									<div class="btnn">
										<button id="make_appointment_modal_SubmitAppointment" value="" name="make_appointment_modal_SubmitAppointment" type="submit">Submit</button><br>
									</div>

								</form>
							</div>
						</div>
						<!--//register form-->

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- //Register information Modal -->


	<!-- Make appointment Modal start -->

	<div class="modal about-modal fade" id="makeAppointment-modal" tabindex="-2" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" id="btnCloseModal" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h6 class="modal-title">Make Appointment</h6><br><p><h6 class="modal-textdesc"> Not yet Registered? <button id="btnRegistration" class="btnn">Register now!</button></p></h6>
					</div>
					<div class="modal-body">
						<div class="out-info">
							<div class="letter-w3ls">

								<form id="appointmentModalForm">
									<div class="form-header">Please enter your cellphone number.<br><br></div>

									<div class="main">
									<div class="form-left-to-w3l">

									<input type="text" id="appointment_customer_phone" style="display:block" name="appointment_customer_phone"   maxlength="12" placeholder="Cellphone Number" required>
											<div class="clear"></div>
										</div>

										 <div class="form-right-to-w3ls">
										 <button id="btnVerify" class="btnnVerify">Verify</button>
										 <button id="btnVerifying" style="display:none;" class="btnnVerify" disabled><i class="fa fa-spinner fa-spin" aria-hidden="true"></i>Verifying</button>
										 <h4 id="statusVerified" style="display:none;">
										 <button class="verified"><span class="fa fa-check" aria-hidden="true" disabled></span>Verified</button>
										</h4>
								
										<div class="clear"></div>
									</div>
									</div>
								</form>
								
									<div class="divider mb-20"></div>
								
									<form id="appointmentDetailsForm">
										<div style="display:none;" id="appointmentForm">
										<div class="main">
											<div class="form-left-to-w3l">
										
											<input type="text" id="verifiedFullname" name="verifiedCustomerName" readonly="true">
												
												<div class="clear"></div>
											</div>

											<div class="form-right-to-w3ls">
											
											<input type="date" class="" id="appointment_modal_Date" name="datepicked" data-provide="datepicker">
												
											</h4>

												<div class="clear"></div>
											</div>
											</div>
										
											<div class="main">

											<div class="form-left-to-w3l">
											<select id="appointment_modal_TimeBlock" class="form-control" name = "timepicked">
											<option value="" name = "timepicked">Choose a Time Block</option>
											<option value="10am - 11am" name = "timepicked">10am - 11am</option>
											<option value="11am - 12pm" name = "timepicked">11am - 12pm</option>
											<option value="12pm - 1pm" name = "timepicked">12pm - 1pm</option>
											<option value="1pm - 2pm" name = "timepicked">1pm - 2pm</option>
											<option value="2pm - 3pm" name = "timepicked">2pm - 3pm</option>
											<option value="3pm - 4pm" name = "timepicked">3pm - 4pm</option>
											<option value="4pm - 5pm" name = "timepicked">4pm - 5pm</option>
												</select>
												
												<div class="clear"></div>
											</div>

											<div class="form-right-to-w3ls">
											
											<select id="appointment_modal_AppointmentType" class="form-control" name = "reason_for_appointment">
												<option value="" name = "reason_for_appointment">Appointment type</option>
												<option value="Consultation" name = "reason_for_appointment">Consultation</option>
												<option value="Vaccination" name = "reason_for_appointment">Vaccination</option>
												<option value="Treatment" name = "reason_for_appointment">Treatment</option>
												<option value="Deworming" name = "reason_for_appointment">Deworming</option>
												<option value="Boarding" name = "reason_for_appointment">Boarding</option>
												<option value="Confinement" name = "reason_for_appointment">Confinement</option>
												<option value="Grooming" name = "reason_for_appointment">Grooming</option>
												</select>
												
											</h4>

											
											
												<div class="clear"></div>
												
											</div>										
											</div>

											<div class="btnn">
												<button id="btnSubmitAppointment" name="btnSubmitAppointment" type="submit">Submit</button><br>
												<button id="btnSubmittingAppointment" style="display:none;" disabled><i class="fa fa-spinner fa-spin" aria-hidden="true"></i>Submitting</button>
											</div>
									</form>
							</div>
						</div>
						<!--//register form-->

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Make appointment Modal End -->

	<!-- Appointment status Modal Start -->

	<div class="modal about-modal fade" id="appStatusModal" tabindex="-3" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" id="btnCloseModalAppStatus" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h6 class="modal-title">Check your appointment status here.</h6>
					</div>
					<div class="modal-body">
						<div class="out-info">
							<div class="letter-w3ls">

								<form id="appStatusVerify">
									<div class="form-header">Please enter your cellphone number.<br><br></div>

									<div class="main">
									<div class="form-left-to-w3l">

									<input type="text" id="appointmentStatus_customer_phone" style="display:block" name="appointmentStatus_customer_phone"   maxlength="12" placeholder="Cellphone Number" required>
											<div class="clear"></div>
										</div>

										 <div class="form-right-to-w3ls">
										 <button id="btnVerifyStatus" class="btnnVerify">Verify</button>
										 <button id="btnVerifyingStatus" style="display:none;" class="btnnVerify" disabled><i class="fa fa-spinner fa-spin" aria-hidden="true"></i>Verifying</button>
										 <h4 id="statusVerified" style="display:none;">
										 	<button class="verified"><span class="fa fa-check" aria-hidden="true" disabled></span>Verified</button>
										</h4>
								
										<div class="clear"></div>
									</div>
									</div>
								</form>
								
										<div class="divider mb-20"></div>
										<div style="display:none;" id="appointmentStat">
											<div class="main">

												<div class="container-table100">
													<table class="table" id="appStatTable">
															<thead class="thead-gray">
																	<tr>
																		<th class="col column1" data-column="column1">ID</th>
																		<th class="col column2" data-column="column2">Scheduled Date</th>
																		<th class="col column3" data-column="column3">Time Slot</th>
																		<th class="col column4" data-column="column4">App Reason</th>
																		<th class="col column5" data-column="column5">Action</th>
																		
																	</tr>
																</thead>
															<tbody id="displayStatsHere">
																		
														</tbody>
												</table>
											</div>
											
										</div>
										<div class="modal-footers">
											<input type="hidden" id="appIDTextView" name="appIDTextView">
											<button id="btnCloseStatModal" class="btnnDone">Done</button>
										</div>
										
							
									
									
							</div>
						</div>
						<!--//register form-->

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Appointment status Modal End -->



	<!--About-->
	<div class="about" id="about">
		<div class="container">
			<div class="about-top-grids">
				<div class="col-md-7 about-top-grid">
					<h2>About Us </h2>
					<div class="arrow">
					<span class="fa fa-paw dog-arrow" aria-hidden="true"></span>Pet Science Veterinary Clinic is owned and operated by Dr. Zandro Perez. The clinic was established on November 18, 2006.The origin of 
                        the clinic’s name comes from the association of Pet Lovers in Southwestern University PHINMA.The clinic was created out of passion and 
                        love for pets. The clinic accommodates as many pets as theycan work on in a day. It is their will and a heart of passion to save and help
                         every pet that needs remedy. The clinic is open from Sunday to Saturday and this includes services they could offer such as grooming,
                          vaccination, surgery, boarding, check-up, confinement, consultation, treatment, deworming.The clinic accepts
                           walk-in clients and appointment schedules for pets. Pet Science Veterinary Clinic stores information that includes vaccination history,
                            consultation, and the meditation of pets.Unfortunately, because of the limited source of vaccine, they only accept feline and canine
                             pets.
					</div>
					<div class="about-para">
						
					</div>
				</div>
				<div class="col-md-5 pope banner-agileits-btm" id="video">
					<div class="button">

						<a href="#small-dialog1" class="play-icon popup-with-zoom-anim"><span class="fa fa-play-circle" aria-hidden="true"></span></a>
					</div>
					<div id="small-dialog1" class="mfp-hide w3ls_small_dialog wthree_pop">
						<div class="agileits_modal_body">
							<iframe src="https://player.vimeo.com/video/72859932?"></iframe>

						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--//About-->
	<!--services-->
	<div class="services" id="services">
		<div class="container">
			<h3 class="title clr">Services</h3>

			<div class="banner-bottom-girds ">
				<div class="col-md-4  col-sm-6 col-xs-6  its-banner-grid">
					<div class=" left-icon-grid">
						<span class="fa fa-scissors banner-icon" aria-hidden="true"></span>
					</div>
					<div class=" white-shadow">
						<h4>Grooming</h4>
						<!-- <p>
							tur aut.maiores alias consequatur .</p> -->
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-4  col-sm-6 col-xs-6  its-banner-grid">
					<div class=" left-icon-grid">
						<span class="fa fa-plus-square  banner-icon" aria-hidden="true"></span>
					</div>
					<div class=" white-shadow">
						<h4>Vaccination</h4>
						<!-- <p>
							tur aut.maiores alias consequatur .</p> -->
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-4  col-sm-6 col-xs-6  its-banner-grid">
					<div class=" left-icon-grid">
						<span class="fa fa-heartbeat banner-icon" aria-hidden="true"></span>
					</div>
					<div class=" white-shadow">
						<h4>Surgery</h4>
						<!-- <p>
							tur aut.maiores alias consequatur .</p> -->
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-4 col-sm-6 col-xs-6  its-banner-grid">
					<div class=" left-icon-grid">
						<span class="fa fa-h-square banner-icon" aria-hidden="true"></span>
					</div>
					<div class="white-shadow">
						<h4>Boarding</h4>
						<!-- <p>tur aut.maiores alias consequatur </p> -->
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="col-md-4  col-sm-6 col-xs-6  its-banner-grid">
					<div class="left-icon-grid">
						<span class="fa fa-stethoscope banner-icon" aria-hidden="true"></span>
					</div>
					<div class=" white-shadow">
						<h4>Check-up</h4>
						<!-- <p>tur aut.maiores alias consequatur .</p> -->
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-4 col-sm-6 col-xs-6  its-banner-grid">
					<div class=" left-icon-grid">
						<span class="fa fa-hospital-o banner-icon" aria-hidden="true"></span>
					</div>
					<div class=" white-shadow">
						<h4>Confinement</h4>
						<!-- <p>tur aut.maiores alias consequatur
						</p> -->
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="col-md-4 col-sm-6 col-xs-6  its-banner-grid">
					<div class=" left-icon-grid">
						<span class="fa fa-user-md banner-icon" aria-hidden="true"></span>
					</div>
					<div class=" white-shadow">
						<h4>Consultation</h4>
						<!-- <p>tur aut.maiores alias consequatur
						</p> -->
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="col-md-4 col-sm-6 col-xs-6  its-banner-grid">
					<div class=" left-icon-grid">
						<span class="fa fa-medkit banner-icon" aria-hidden="true"></span>
					</div>
					<div class=" white-shadow">
						<h4>Treatment</h4>
						<!-- <p>tur aut.maiores alias consequatur
						</p> -->
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="col-md-4 col-sm-6 col-xs-6  its-banner-grid">
					<div class=" left-icon-grid">
						<span class="fa fa-times-circle banner-icon" aria-hidden="true"></span>
					</div>
					<div class=" white-shadow">
						<h4>Deworming</h4>
						<!-- <p>tur aut.maiores alias consequatur
						</p> -->
					</div>
					<div class="clearfix"> </div>
				</div>
				<!-- <div class="col-md-12 col-sm-6 col-xs-6  its-banner-grid">
					<div class=" left-icon-grid">
						<span class="fa fa-volume-control-phone banner-icon" aria-hidden="true"></span>
					</div>
					<div class=" white-shadow">
						<h4>House Call Services</h4>
						<p>tur aut.maiores alias consequatur
						</p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div> -->
		</div>
	</div>
	<!--//services-->

	<!-- Gallery Start -->

	<!-- //Gallery End -->

	
	

	<!-- feedback modal alert start-->
	<div class="modal about-modal fade" id="contactUsAlertModal" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Successfully sent!</h4>
					</div>
					<div class="modal-body text-center">
						<h5>Thank you <span id="span_fname"></span>! We will respond to your email as soon as possible.</h5>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- // feedback modal alert end -->

		<!-- Registration success modal alert start -->
		<div class="modal about-modal fade" id="RegistrationAlertModal" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Thank you!</h4>
					</div>
					<div class="modal-body text-center">
						<h5 id="appointmentStatusMessage"></h5>
					</div>
					<button type="button" class="close" id="btnRegistrationOk" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">OK</span></button>
				</div>
			</div>
		</div>
	</div>
	<!-- Registration success modal alert end -->

	<!-- Appointment cancel modal alert start -->
	<div class="modal about-modal fade" id="AppointmentCancelAlert" tabindex="-4" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h5 class="modal-title">Attention</h5>
					</div>
					<div class="modal-body text-center">
						<h5>Are you sure you want to cancel this appointment?</h5>
					</div>
					<div class="modal-footer text-center">
						<button id="btnCancelThisAppointmentYes" style="padding: 3">Yes</button><button id="btnCancelThisAppointmentNo">No</button>
					</div>
					
				</div>
			</div>
	</div>
	<!-- Appointment cancel modal alert end -->



	<!--contact-->
	<div class="contact" id="contact">
		<div class="container">
			<h3 class="title clr">Contact</h3>
			<div class=" col-md-8 col-sm-8 col-xs-7 contact-map">
				<div class="map-grid">
					<iframe src="https://maps.google.com/maps?q=Pet%20Science%20Veterinary%20Clinic&t=&z=15&ie=UTF8&iwloc=&output=embed"></iframe>

				</div>
			</div>

			<div class=" col-md-4 col-sm-4 col-xs-5 contact-icons">
				<div class="footer_grid_left">
					<h5>Address</h5>
					<p>Talamban,<span> Cebu, 6000</span></p>
				</div>
				<div class="footer_grid_left">
					<h5> Contact Us</h5>
					<p>(032) 414 8754 <span>(63) 912 345 6789</span></p>
				</div>
				<div class="footer_grid_left">
					<h5>Email Us</h5>
					<p><a href="mailto:info@petsciencevet.com">info@petsciencevet.com</a>
				</div>
				<div class="footer_grid_left">
					<h5>Times</h5>
					<p>Mon-Fri:8AM to 7PM
					<span>Sat:8AM to 6PM</span>
					<span>Sun:9AM to 3PM</span></p>
				</div>
			</div>
			<div class="clearfix"> </div>

<!-- feedback start -->

			<div class="contact">
				<form id="contactUsFormSubmit">
					<div class="col-md-6 col-sm-6 col-xs-6 styled-input">
						<input type="text" id="contact_fname" name="contact_fname" placeholder="First Name" required="">
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6 styled-input">
						<input type="text" id="contact_lname" name="contact_lname" placeholder="Last Name" required="">
					</div>

					<div class="col-md-6 col-sm-6 col-xs-6 styled-input">
						<input type="email" id="contact_email" name="contact_email" placeholder="Email" required="">

					</div>

					<div class="col-md-6 col-sm-6 col-xs-6 styled-input">

						<input type="text" id="contact_phone" name="contact_phone" placeholder="phone" required="">

					</div>
					<div class="clearfix"> </div>
					<div class="styled-input">
						<textarea id="contact_message" name="contact_message" placeholder="Message" required=""></textarea>
					</div>
					<div>
						<div class="click">
							<!-- data-toggle="modal" data-target="#contactUsAlertModal" -->
							<input id="btn-send-email" type="submit" value="SEND">
						</div>
					</div>
				</form>
			</div>
			<!-- feedback end -->


			<div class="clearfix"> </div>

		</div>
	</div>
	<!-- faq -->
	<div class="faq" id="faq">
		<div class="container">
		<div class="col-md-12 about-top-grid">
					<h3 class="title">FAQ</h3>
					
					<div class="arrow">
						<ul>
							<h4>How can I get rid of fleas on my dog?</h4>
							<li class="padding-20"><span class="fa fa-paw dog-arrow" aria-hidden="true"></span>
								<p>This can be a challenging task and requires a three-pronged approach. Fleas need to be eliminated from:</p>
								<ul class="ml-20">
									<li><p>1. your dog<br/></p></li>
									<li><p>2. any other cats and dogs in your household</p></li>
									<li><p>3. your home and yard (environment)</p></li>
									<li class="mt-20"><p>Once your dog’s fleas are under control, continued prevention is essential, since you cannot control some 
									outside sources of fleas, such as other people's pets, wild animals, or other property outside yours. </p></li>
								</ul>	
							</li>

							<h4>What are the standard vaccination protocols for puppies and kittens?</h4>
							<li class="padding-20"><span class="fa fa-paw dog-arrow" aria-hidden="true"></span>
								<p>Puppy</p>
								<ul class="ml-20">
									<li><p>- We use the following protocol for puppy vaccinations</p></li>
									<li><p>- 6 weeks-Parvovirus</p></li>
									<li><p>- 8 weeks-Distemper, Hepatitis, Parvovirus, Parainfluenza, +/-Leptospirosis</p></li>
									<li><p>- 12 weeks-Distemper, Hepatitis, Parvovirus, Parainfluenza, +/-Leptospirosis, Bordetella, +/- lyme</p></li>
									<li><p>- 16 weeks-Distemper, Hepatitis, Parvovirus, Parainfluenza, +/-Leptospirosis, Bordetella, +/- lyme Rabies</p></li>
								</ul>
							</li>
							<li class="padding-20"><span class="fa fa-paw dog-arrow" aria-hidden="true"></span>
								<p>Kitten</p>
								<ul class="ml-20">
									<li><p>- 8 weeks-Calicivirus, Panleukopenia, Chlamydia psittaci, Rhinotracheitis</p></li>
									<li><p>- 12 weeks-Calicivirus, Panleukopenia, Chlamydia psittaci, Rhinotracheitis, Rabies</p></li>
								</ul>
							</li>

							<h4>How should I care for my puppy’s teeth, ears, and nails?</h4>
							<li class="padding-20"><span style="padding-bottom:0px;" class="fa fa-paw dog-arrow" aria-hidden="true"></span>
								<p>It is never too early to begin good dental hygiene. Luckily for us, 
								there are easy ways to provide </p>
								<p>this for our puppies. Daily teeth-brushing is the gold standard,
								and we recommend starting the process gradually to get your puppy used to it. Start with letting 
								your puppy taste the pet-approved toothpaste, work up to using your finger or gauze to wipe a few
								teeth, and eventually try out a toothbrush. Give both of you time to accept the brushing, and be 
								sure to contact us if you have questions or would like a demonstration.</p>
							</li>
						</ul>
					</div>
				</div>
		</div>
	</div>
	<!-- faq -->

	<div class="buttom-w3">
		<div class="container">
			<div class="col-md-6 bottom-head text-center">
			   <img src="img/rippleeffect.png" style="width: 90%">
			</div>
			<div class="col-md-6 copyright text-center">
				<div class="">
					<h4> About Us</h4>
				</div>
				<div class="sub-para">
					<!-- <p>Lorem ipsum dolor sit amet,dolor sit amet,iste natus error sit voluptatem</p> -->
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>

	</div>
	<footer>
		<p>&copy; 2019 Pet Science Vet Clinic. All Rights Reserved | Design by <a href="https://www.facebook.com/Kesterific/" target="_blank">Thesis Team</a></p>
	</footer>


	<!--js working-->
	<script type='text/javascript' src='js/jquery-2.2.3.min.js'></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/toastr.js"></script>
	<!-- //js  working-->

	<script src="js/responsiveslides.min.js"></script>
	
	
	<!--// banner-->
	<!--pop-up-box video-->
	<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
	
	<!-- //pop-up-box video -->

	<!-- script for portfolio -->
	<script type='text/javascript' src='js/jquery.easy-gallery.js'></script>
	<script type='text/javascript'>
		//init Gallery
		
	</script>
	<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
	
	<!-- //script for portfolio -->
	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	
	<script src="js/main.js"></script>
	
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- //for-bottom-to-top smooth scrolling -->

</body>

</html>