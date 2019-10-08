<?php
//include('functions.php');

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
									<a href="#" data-toggle="modal" data-target="#makeAppointment-modal">Make an Appointment</a>
								</li>
								<li><a href="#gallery" class="scroll">Gallery</a></li>
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
										<a href="#" data-toggle="modal" data-target="#myModal">Click Here!</a>
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
										<a href="#" data-toggle="modal" data-target="#myModal">Register Now!</a>
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
		<div class="modal about-modal fade" id="myModal" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">New Customer</h4>
					</div>
					<div class="modal-body">
						<div class="out-info">
							<div class="letter-w3ls">

								<form action="#" method="post">
									<div class="form-header">Owners' Information<br><br></div>
										<div class="form-left-to-w3l add">

											<input type="text" id="appointment_modal_Fullname" name="customer_fullname_new"  maxlength="45" placeholder="FullName" required="">
											<div class="clear"></div>
										</div>

										<!-- <div class="form-right-to-w3ls">

											<input type="text" name="last name" placeholder="Last Name" required="">
											<div class="clear"></div>
										</div> -->

									

									<div class="main">
										<div class="form-left-to-w3l">

											<input type="email" id="appointment_modal_Email" name="customer_email_new" placeholder="Email" required="">
											<div class="clear"></div>
										</div>
										<div class="form-right-to-w3ls">

											<input type="text" id="appointment_modal_CellNumber" name="customer_cellnum_new" maxlength="11" placeholder="Cellphone Number" required="">
											<div class="clear"></div>
										</div>
									</div>
									<div class="main">

										<div class="form-left-to-w3l">
											<select class="form-control" id="pet_gender" name="customer_gender">
					<option value="" name="customer_gender">Gender</option>
						<option value="Male" name="customer_gender">Male</option>
						<option value="Female" name="customer_gender">Female</option>
					</select>
										</div>
										<div class="form-right-to-w3ls">
										<input type="text" id="appointment_modal_TelNumber" name="customer_telephone_new" maxlength="11" placeholder="Phone Number" required="">
											<div class="clear"></div>
										</div>
									</div>


									<div class="form-add-to-w3ls add">

										<input type="text" id="appointment_modal_Address" name="customer_address_new" placeholder="Home Address" required="">
										<div class="clear"></div>
									</div>
									<div class="divider"></div>
									<div class="form-header"><br>Pets' Information<br><br></div>
									<div class="form-left-to-w3l add">

									<input type="text"  id="appointment_modal_petname" name="pet_fullname_new" placeholder="Pets' Name" required="">
									<div class="clear"></div>
									</div>
									<div class="main">

										<div class="form-left-to-w3l">
											<select class="form-control" id="pet_gender" name="pet_gender">
											<option value="" name="pet_gender">Gender</option>
											<option value="Male" name="pet_gender">Male</option>
											<option value="Female" name="pet_gender">Female</option>
											</select>
										</div>
										<div class="form-right-to-w3ls">
										<select class="form-control" name="pet_species">
											<option value="" name="pet_species">Species</option>
											<option value="Canine" name="pet_species">Canine</option>
											<option value="Feline" name="pet_species">Feline</option>
											</select>
											<div class="clear"></div>
										</div>
									</div>
									<div class="main">

										<div class="form-left-to-w3l">
										<input type="text" id="appointment_modal_Email" name="pet_breed_new" placeholder="Breed" required="">
										</div>
										<div class="form-right-to-w3ls">
										<input type="date" class="" id="appointment_modal_Date" name="pet_DOB_new"  >
											<div class="clear"></div>
										</div>
									</div>
									<!-- <div class="main">
										<div class="form-left-to-w3l">

											<input type="text" name="city" placeholder="City" required="">
											<div class="clear"></div>
										</div>
										<div class="form-right-to-w3ls">
											<input type="text" name="state" placeholder="State" required="">
											<div class="clear"></div>
										</div>

									</div> -->
									<!-- <div class="main">
										<div class="form-left-to-w3l">
											<input type="text" name="Pin code" placeholder="Pin code" required="">
											<div class="clear"></div>
										</div>
										<div class="form-right-to-w3ls">
											<select class="form-control buttom">
												<option value="">
												Select Country</option>
													<option value="category2">Oman</option>
													<option value="category1">Australia</option>
													<option value="category3">America</option>
													<option value="category3">London</option>
													<option value="category3">Goa</option>
													<option value="category3">Canada</option>
													<option value="category3">Srilanka</option>
												</select>

											<div class="clear"></div>
										</div>

									</div> -->

									<div class="btnn">
										<button id="new_customer_modal_SubmitRegistration" value="" name="new_customer_modal_SubmitRegistration" type="submit">Submit</button><br>
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
	<!-- //modal -->

	<!-- Make Appointment Modal -->
	<div class="modal about-modal fade" id="makeAppointment-modal" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Make an Appointment</h4>
					</div>
					<div class="modal-body">
						<div class="out-info">
							<div class="letter-w3ls">

								<form action="#" method="post">
									<div class="form-header">Appointment Information<br><br></div>
									<div class="main">
									<div class="form-left-to-w3l">

										<input type="date" class="" id="appointment_modal_Date" name="datepicked"  >
											<div class="clear"></div>
										</div>

										 <div class="form-right-to-w3ls">

										 <select id="appointment_modal_TimeBlock" class="form-control" name = "timepicked">
										 <option value="" name = "timepicked">Choose a Time Block</option>
										 <option value="Block A (8am-9am)" name = "timepicked">Block A (8am-9am)</option>
                          				<option value="Block B (9am-10am)" name = "timepicked">Block B (9am-10am)</option>
                          				<option value="Block C (10am-11pm)" name = "timepicked">Block C (10am-11pm)</option>
                         				<option value="Block D (11am-12am)" name = "timepicked">Block D (11am-12am)</option>
                          				<option value="Block E (1pm-2pm)" name = "timepicked">Block E (1pm-2pm)</option>
                         				<option value="Block F (2pm-3pm)" name = "timepicked">Block F (2pm-3pm)</option>
                         				<option value="Block G (3pm-4pm)" name = "timepicked">Block G (3pm-4pm)</option>
											</select>
											<div class="clear"></div>
										</div>

										</div>

									<div class="main">
										<div class="form-left-to-w3l">

											<input type="email" id="appointment_modal_Fullname" name="customer_fullname"   maxlength="45" placeholder="Customers' Name" required="">
											<div class="clear"></div>
										</div>
										<div class="form-right-to-w3ls">

											<input type="text" id="appointment_modal_CellNumber" name="customer_cellnum" maxlength="11" placeholder="Phone Number" required="">
											<div class="clear"></div>
										</div>
									</div>
									<div class="main">

										<div class="form-left-to-w3l">
										<select id="appointment_modal_petsname" class="form-control" name = "pets_name">
											<option value="">List of pets</option>
											<option value="Canine">Lyka</option>
											<option value="Feline">Berry</option>
											</select>
										</div>
										<div class="form-right-to-w3ls">
										<select id="appointment_modal_TimeBlock" class="form-control" name = "reason_for_appointment">
											<option value="" name = "reason_for_appointment">Reason for Appointment</option>
											<option value="Consultation" name = "reason_for_appointment">Consultation</option>
											<option value="Vaccination" name = "reason_for_appointment">Vaccination</option>
											<option value="Treatment" name = "reason_for_appointment">Treatment</option>
											<option value="Surgery" name = "reason_for_appointment">Surgery</option>
											<option value="Deworming" name = "reason_for_appointment">Deworming</option>
											<option value="Boarding" name = "reason_for_appointment">Boarding</option>
											<option value="Confinement" name = "reason_for_appointment">Confinement</option>
											<option value="Grooming" name = "reason_for_appointment">Grooming</option>
											<option value="Other" name = "reason_for_appointment">Other</option>
											</select>
											<div class="clear"></div>
										</div>
									</div>


									<div class="form-add-to-w3ls add">
									<label><input class="checkboxchecked" type="checkbox" id="toggle-show" name="newuser" value="Consultation" onclick="showFunction()"> <span>New User?</span></label>
										
										<div class="clear"></div>
									</div>

									<!-- DAPAT HIDDEN DRI -->
									<!-- <div class="hidden" for="toggle-show"> -->
									<!-- DAPAT HIDDEN DRI -->
									<div class="divider"></div>

									<div id="hidden-header" style="display:none" class="form-header">Owners' Information<br><br></div>
										<div class="form-left-to-w3l add">

											<input id="hidden-fullname" name="hidden_customers_name" style="display:none" type="text"placeholder="FullName" required="">
											<div class="clear"></div>
										</div>

										<!-- <div class="form-right-to-w3ls">

											<input type="text" name="last name" placeholder="Last Name" required="">
											<div class="clear"></div>
										</div> -->

									

									<div class="main">
										<div class="form-left-to-w3l">

											<input id="hidden-email" name="hidden_customers_email" style="display:none" type="email" name="email" placeholder="Email" required="">
											<div class="clear"></div>
										</div>
										<div class="form-right-to-w3ls">

											<input id="hidden-celnum" name="hidden_customers_celnum" style="display:none" type="text" name="phone number" placeholder="Cellphone Number" required="">
											<div class="clear"></div>
										</div>
									</div>
									<div class="main">

										<div class="form-left-to-w3l">
											<select id="hidden-cusgender" name="hidden_customers_gender" style="display:none" class="form-control">
					<option value="" name="hidden_customers_gender">Gender</option>
						<option value="Male" name="hidden_customers_gender">Male</option>
						<option value="Female" name="hidden_customers_gender">Female</option>
					</select>
										</div>
										<div class="form-right-to-w3ls">
										<input id="hidden-phonenum" name="hidden_customers_phonenum" style="display:none" type="text" name="phone number" placeholder="Phone Number" required="">
											<div class="clear"></div>
										</div>
									</div>


									<div class="form-add-to-w3ls add">

										<input id="hidden-address" name="hidden_customers_address" style="display:none" type="text" name="address" placeholder="Home Address" required="">
										<div class="clear"></div>
									</div>
									</div>

									<div class="divider"></div>
									<div id="hidden-title" style="display:none" class="form-header"><br>Pets' Information<br><br></div>
									<div class="form-left-to-w3l add">

									<input id="hidden-pets-name"  name="hidden_pets_name" style="display:none" type="text" name="name" placeholder="Pets' Name" required="">
									
									<div class="clear"></div>
									</div>
									<div class="main">

										<div class="form-left-to-w3l">
											<select id="hidden-gender" name="hidden_pets_gender" style="display:none" class="form-control">
											<option value="" name="hidden_pets_gender">Gender</option>
											<option value="Male" name="hidden_pets_gender">Male</option>
											<option value="Female" name="hidden_pets_gender">Female</option>
											</select>
										</div>
										<div class="form-right-to-w3ls">
										<select id="hidden-species" name="hidden_pets_species" style="display:none" class="form-control">
											<option value="" name="hidden_pets_species">Species</option>
											<option value="Canine" name="hidden_pets_species">Canine</option>
											<option value="Feline" name="hidden_pets_species">Feline</option>
											</select>
											<div class="clear"></div>
										</div>
									</div>
									<div class="main">

										<div class="form-left-to-w3l">
										<input id="hidden-breed" name="hidden_pets_breed" style="display:none" type="text" name="name" placeholder="Breed" required="">
										</div>
										<div class="form-right-to-w3ls">
										<input id="hidden=DOB" name="hidden_pets_DOB" style="display:none" type="date" class="" id="appointment_modal_Date" name="pet_DOB_new"  >
											<div class="clear"></div>
										</div>
									</div>

									<!-- hIDDEN ENDS HERE -->
									<!-- </div> -->
									<!-- hIDDEN ENDS HERE -->


									<!-- <div class="main">
										<div class="form-left-to-w3l">

											<input type="text" name="city" placeholder="City" required="">
											<div class="clear"></div>
										</div>
										<div class="form-right-to-w3ls">
											<input type="text" name="state" placeholder="State" required="">
											<div class="clear"></div>
										</div>

									</div> -->
									<!-- <div class="main">
										<div class="form-left-to-w3l">
											<input type="text" name="Pin code" placeholder="Pin code" required="">
											<div class="clear"></div>
										</div>
										<div class="form-right-to-w3ls">
											<select class="form-control buttom">
												<option value="">
												Select Country</option>
													<option value="category2">Oman</option>
													<option value="category1">Australia</option>
													<option value="category3">America</option>
													<option value="category3">London</option>
													<option value="category3">Goa</option>
													<option value="category3">Canada</option>
													<option value="category3">Srilanka</option>
												</select>

											<div class="clear"></div>
										</div>

									</div> -->

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
	<!-- //Make Appointment Modal -->
	<!--About-->
	<div class="about" id="about">
		<div class="container">
			<div class="about-top-grids">
				<div class="col-md-7 about-top-grid">
					<h2>About Us </h2>
					<div class="arrow">
						<ul>
							<li><span class="fa fa-paw dog-arrow" aria-hidden="true"></span>
								<p>Vivamus elementum semper </p>
							</li>
							<li><span class="fa fa-paw dog-arrow" aria-hidden="true"></span>
								<p>Bibendum sodales, augue </p>
							</li>
							<li><span class="fa fa-paw dog-arrow" aria-hidden="true"></span>
								<p>Vivamus elementum semper </p>
							</li>
							<li><span class="fa fa-paw dog-arrow" aria-hidden="true"></span>
								<p>Vivamus elementum semper </p>
							</li>
						</ul>
					</div>
					<div class="about-para">
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis
							natoque penatibus et magnis dis parturient montes, Aenean commodo ligula eget dolor. Aenean massa. Aenean commodo
							ligula eget dolor. Aenean massa. nascetur ridiculus mus.</p>
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
						<p>
							tur aut.maiores alias consequatur .</p>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-4  col-sm-6 col-xs-6  its-banner-grid">
					<div class=" left-icon-grid">
						<span class="fa fa-plus-square  banner-icon" aria-hidden="true"></span>
					</div>
					<div class=" white-shadow">
						<h4>Vaccination</h4>
						<p>
							tur aut.maiores alias consequatur .</p>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-4  col-sm-6 col-xs-6  its-banner-grid">
					<div class=" left-icon-grid">
						<span class="fa fa-heartbeat banner-icon" aria-hidden="true"></span>
					</div>
					<div class=" white-shadow">
						<h4>Surgery</h4>
						<p>
							tur aut.maiores alias consequatur .</p>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-4 col-sm-6 col-xs-6  its-banner-grid">
					<div class=" left-icon-grid">
						<span class="fa fa-h-square banner-icon" aria-hidden="true"></span>
					</div>
					<div class="white-shadow">
						<h4>Boarding</h4>
						<p>tur aut.maiores alias consequatur </p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="col-md-4  col-sm-6 col-xs-6  its-banner-grid">
					<div class="left-icon-grid">
						<span class="fa fa-stethoscope banner-icon" aria-hidden="true"></span>
					</div>
					<div class=" white-shadow">
						<h4>Check-up</h4>
						<p>tur aut.maiores alias consequatur .</p>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-4 col-sm-6 col-xs-6  its-banner-grid">
					<div class=" left-icon-grid">
						<span class="fa fa-hospital-o banner-icon" aria-hidden="true"></span>
					</div>
					<div class=" white-shadow">
						<h4>Confinement</h4>
						<p>tur aut.maiores alias consequatur
						</p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="col-md-4 col-sm-6 col-xs-6  its-banner-grid">
					<div class=" left-icon-grid">
						<span class="fa fa-user-md banner-icon" aria-hidden="true"></span>
					</div>
					<div class=" white-shadow">
						<h4>Consultation</h4>
						<p>tur aut.maiores alias consequatur
						</p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="col-md-4 col-sm-6 col-xs-6  its-banner-grid">
					<div class=" left-icon-grid">
						<span class="fa fa-medkit banner-icon" aria-hidden="true"></span>
					</div>
					<div class=" white-shadow">
						<h4>Treatment</h4>
						<p>tur aut.maiores alias consequatur
						</p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="col-md-4 col-sm-6 col-xs-6  its-banner-grid">
					<div class=" left-icon-grid">
						<span class="fa fa-times-circle banner-icon" aria-hidden="true"></span>
					</div>
					<div class=" white-shadow">
						<h4>Deworming</h4>
						<p>tur aut.maiores alias consequatur
						</p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="col-md-12 col-sm-6 col-xs-6  its-banner-grid">
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
			</div>
		</div>
	</div>
	<!--//services-->
	<div class="portfolio" id="gallery">

		<h3 class="title">Our Gallery</h3>

		<div class="sap_tabs">
			<div id="horizontalTab">
				<ul class="resp-tabs-list">
					<li class="resp-tab-item"><span>All</span></li>
					<li class="resp-tab-item"><span>Pets 1</span></li>
					<li class="resp-tab-item"><span>Pets 2</span></li>
					<li class="resp-tab-item"><span>Pets 3</span></li>
				</ul>
				<div class="clearfix"> </div>
				<div class="resp-tabs-container">
					<div class="tab-1 resp-tab-content">
						<div class="col-md-3 col-sm-3 col-xs-6 portfolio-grids">
							<div class="gallery-grid">
								<img src='images/g1.jpg' data-big-src='images/g1.jpg' class="img-responsive" alt=" " />
								<p style='opacity:0;display:none'>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-6 portfolio-grids">
							<div class="gallery-grid">
								<img src='images/g2.jpg' data-big-src='images/g2.jpg' class="img-responsive" alt=" " />
								<p style='opacity:0;display:none'>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-6 portfolio-grids">
							<div class="gallery-grid">
								<img src='images/g10.jpg' data-big-src='images/g10.jpg' class="img-responsive" alt=" " />
								<p style='opacity:0;display:none'>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-6 portfolio-grids">
							<div class="gallery-grid">
								<img src='images/g4.jpg' data-big-src='images/g4.jpg' class="img-responsive" alt=" " />
								<p style='opacity:0;display:none'>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-6  portfolio-grids">
							<div class="gallery-grid">
								<img src='images/g5.jpg' data-big-src='images/g5.jpg' class="img-responsive" alt=" " />
								<p style='opacity:0;display:none'>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							</div>
						</div>

						<div class="col-md-3 col-sm-3 col-xs-6 portfolio-grids">
							<div class="gallery-grid">
								<img src='images/g6.jpg' data-big-src='images/g6.jpg' class="img-responsive" alt=" " />
								<p style='opacity:0;display:none'>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-6 portfolio-grids">
							<div class="gallery-grid">
								<img src='images/g8.jpg' data-big-src='images/g8.jpg' class="img-responsive" alt=" " />
								<p style='opacity:0;display:none'>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-6 portfolio-grids">
							<div class="gallery-grid">
								<img src='images/g11.jpg' data-big-src='images/g11.jpg' class="img-responsive" alt=" " />
								<p style='opacity:0;display:none'>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="tab-1 resp-tab-content">
						<div class="col-md-3 col-sm-3 col-xs-6 portfolio-grids">
							<div class="gallery-grid">
								<img src='images/g1.jpg' data-big-src='images/g1.jpg' class="img-responsive" alt=" " />
								<p style='opacity:0;display:none'>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-6 portfolio-grids">
							<div class="gallery-grid">
								<img src='images/g10.jpg' data-big-src='images/g10.jpg' class="img-responsive" alt=" " />
								<p style='opacity:0;display:none'>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-6 portfolio-grids">
							<div class="gallery-grid">
								<img src='images/g8.jpg' data-big-src='images/g8.jpg' class="img-responsive" alt=" " />
								<p style='opacity:0;display:none'>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-6 portfolio-grids">
							<div class="gallery-grid">
								<img src='images/g11.jpg' data-big-src='images/g11.jpg' class="img-responsive" alt=" " />
								<p style='opacity:0;display:none'>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>

					<div class="tab-1 resp-tab-content">
						<div class="col-md-3 col-sm-3 col-xs-6 portfolio-grids">
							<div class="gallery-grid">
								<img src='images/g5.jpg' data-big-src='images/g5.jpg' class="img-responsive" alt=" " />
								<p style='opacity:0;display:none'>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-6 portfolio-grids">
							<div class="gallery-grid">
								<img src='images/g7.jpg' data-big-src='images/g7.jpg' class="img-responsive" alt=" " />
								<p style='opacity:0;display:none'>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							</div>
						</div>

						<div class="col-md-3 col-sm-3 col-xs-6 portfolio-grids">
							<div class="gallery-grid">
								<img src='images/g6.jpg' data-big-src='images/g6.jpg' class="img-responsive" alt=" " />
								<p style='opacity:0;display:none'>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-6 portfolio-grids">
							<div class="gallery-grid">
								<img src='images/g7.jpg' data-big-src='images/g7.jpg' class="img-responsive" alt=" " />
								<p style='opacity:0;display:none'>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="tab-1 resp-tab-content">
						<div class="col-md-3 col-sm-3 col-xs-6 portfolio-grids">
							<div class="gallery-grid">
								<img src='images/g2.jpg' data-big-src='images/g2.jpg' class="img-responsive" alt=" " />
								<p style='opacity:0;display:none'>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-6 portfolio-grids">
							<div class="gallery-grid">
								<img src='images/g6.jpg' data-big-src='images/g6.jpg' class="img-responsive" alt=" " />
								<p style='opacity:0;display:none'>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-6 portfolio-grids">
							<div class="gallery-grid">
								<img src='images/g4.jpg' data-big-src='images/g4.jpg' class="img-responsive" alt=" " />
								<p style='opacity:0;display:none'>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-6 portfolio-grids">
							<div class="gallery-grid">
								<img src='images/g7.jpg' data-big-src='images/g7.jpg' class="img-responsive" alt=" " />
								<p style='opacity:0;display:none'>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							</div>
						</div>

						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- //portfolio -->
	<!--price table-->
	<div class="price-table" id="price">
		<div class="container">
			<h3 class="title clr ">Price-Table</h3>

			<div class="agileits-banner-grids text-center">

				<div class="col-md-4  col-sm-4  col-xs-4 clr1 agileits-banner-grid">

					<h4>Lorem ipsum</h4>
					<div class="table_cost">
						<span class="cost clr-price"> 260$</span>
					</div>
					<div class="list-price">
						<ul>
							<li>Bengal cat</li>
							<li>Russian Cat</li>
							<li>Maine Cat</li>
							<li>Perian Cat</li>
						</ul>
					</div>
					<a class="w3_play_icon1" href="#" data-toggle="modal" data-target="#myModal"> Buy Now</a>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-4  clr2 agileits-banner-grid">

					<h4>Dolor ipsum</h4>
					<div class="table_cost">
						<span class="cost"> 150$</span>
					</div>
					<div class="list-price">
						<ul>
							<li>Bengal cat</li>
							<li>Russian Cat</li>
							<li>Maine Cat</li>
							<li>Perian Cat</li>
						</ul>
					</div>
					<a class="w3_play_icon1" href="#" data-toggle="modal" data-target="#myModal"> Buy Now</a>
				</div>
				<div class=" col-md-4 col-sm-4 col-xs-4 clr3 agileits-banner-grid">

					<h4>Lorem ipsum</h4>
					<div class="table_cost">
						<span class="cost clr-price "> 90$</span>
					</div>
					<div class="list-price">
						<ul>
							<li>Bengal cat</li>
							<li>Russian Cat</li>
							<li>Maine Cat</li>
							<li>Perian Cat</li>
						</ul>
					</div>
					<a class="w3_play_icon1" href="#" data-toggle="modal" data-target="#myModal"> Buy Now</a>
				</div>
				<div class="clearfix"></div>

			</div>

		</div>
	</div>
	<!--//price table-->
	<!-- testimonials -->
	<div class="testimonials" id="testimonials">
		<div class="container">

			<h3 class="title">Our Clients</h3>

			<div class="carousel slide" data-ride="carousel" id="quote-carousel">
				<!-- Bottom Carousel Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#quote-carousel" data-slide-to="0" class="active"><img class="img-responsive " src="images/t1.jpg" alt="">
					</li>
					<li data-target="#quote-carousel" data-slide-to="1"><img class="img-responsive" src="images/t2.jpg" alt="">
					</li>
					<li data-target="#quote-carousel" data-slide-to="2"><img class="img-responsive" src="images/t3.jpg" alt="">
					</li>
				</ol>

				<!-- Carousel Slides / Quotes -->
				<div class="carousel-inner text-center">

					<!-- Quote 1 -->
					<div class="item active">
						<blockquote>
							<div class="row">
								<div class=" left-matter">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
										aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo!</p>
									<h5>--kelly ove</h5>
								</div>


							</div>
						</blockquote>
					</div>
					<!-- Quote 2 -->
					<div class="item">
						<blockquote>
							<div class="row">
								<div class=" left-matter">

									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
										aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo </p>
									<h5>--Kennedy</h5>
								</div>
							</div>
						</blockquote>
					</div>
					<!-- Quote 3 -->
					<div class="item">
						<blockquote>
							<div class="row">
								<div class=" left-matter">

									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
										aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo </p>
									<h5>--Rosey</h5>
								</div>
							</div>
						</blockquote>
					</div>
				</div>

				<!-- Carousel Buttons Next/Prev 
					<a data-slide="prev" href="#quote-carousel" class="left carousel-control"><span class="fa fa-chevron-left"></span></a>
					<a data-slide="next" href="#quote-carousel" class="right carousel-control"><span class="fa fa-chevron-right"></span></a> -->
			</div>
		</div>
	</div>
	<!-- testimonials -->

	<!-- modal -->
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
	<!-- //modal -->
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
					<p>Lorem ipsum dolor sit amet,dolor sit amet,iste natus error sit voluptatem</p>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>

	</div>
	<footer>
		<p>&copy; 2018 Lovely-Pets. All Rights Reserved | Design by <a href="http://w3layouts.com/" target="_blank"> W3layouts </a></p>
	</footer>

	<!--js working-->
	<script type='text/javascript' src='js/jquery-2.2.3.min.js'></script>
	<script src="js/bootstrap.js"></script>
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