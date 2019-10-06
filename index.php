<?php
include('functions.php');

?>
<!DOCTYPE html>
<html>
<title>Pet Science Veterinary Clinic</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/Main/template.css">
<link rel="stylesheet" href="css/Main/Bootsrap.css">
<link rel="stylesheet" href="css/Main/Main.css">
<link rel="stylesheet" href="css/Main/appointment.css">
<link rel="stylesheet" href="css/Main/appointment2.css">
<link rel="stylesheet" href="css/Main/appointment3.css">
<link rel="stylesheet" href="css/Main/template2.css">
<link rel="shortcut icon" href="img/officiallogo.ico">
<script src="js/Main/jquery1.9.1.js"></script>





<body class="w3-light-grey">

    <!--About Us Modal Start-->
    <div id="about_us_modal"  class="modal">
        <div class=" animate_top" style="width: 80%; margin:auto;">
            <div class="panel panel-primary">
                <div class="panel-heading"><span>About Us</span>
                  <button type="button" style="float:right;" id="close_btn_about_us" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="panel-body">
                  <div class="modal_picture">
                    <img src="img/slide-two.jpg" style='width: 1048px; height: 400px'>
                  </div>
                    <h3>History of the clinic</h3>
                    <p>Pet Science Veterinary Clinic is owned and operated by Dr. Zandro Perez. The clinic was established on November 18, 2006.The origin of 
                        the clinic’s name comes from the association of Pet Lovers in Southwestern University PHINMA.The clinic was created out of passion and 
                        love for pets. The clinic accommodates as many pets as theycan work on in a day. It is their will and a heart of passion to save and help
                         every pet that needs remedy. The clinic is open from Sunday to Saturday and this includes services they could offer such asgrooming,
                          vaccination, surgery, boarding, check-up, confinement, consultation, treatment, deworming and house calls service.The clinic accepts
                           walk-in clients and appointment schedules for pets. Pet Science Veterinary Clinic stores information that includes vaccination history,
                            consultation, and the meditation of pets.Unfortunately, because of the limited source of vaccine, they only accept feline and canine
                             pets.</p>
                  
                </div>
    
    
            </div>
        </div>
      </div>
      <!--About Us Modal End-->

       <!--Make Appointment Modal Start-->
	   <form method = "POST">
    <div id="make_appointment_modal"  class="modal">
        <div class=" animate_top" style="width: 75%; margin:auto;">
            <div class="panel panel-primary">
                <div class="panel-heading sansserif"><button type="button" style="float:right;" id="close_btn_make_appointment" class="close" data-dismiss="modal">&times;</button><span> <h4 class="leftspace">Schedule Appointment</h4> </span>
                  
                </div>
                <div class="panel-body">
                  <!-- <button type="button" style="float:right;" id="close_btn_make_appointment" class="close" data-dismiss="modal">&times;</button> -->


                  <div style="padding-left: 20px; padding-right: 20px;" id="make_appointment_modal_Entries">
                    <div class="header-text httal htvam">
                      
                      <h4 id="" class="sansserif">
                      This is only a form to request an appointment, not to book an appointment. A member of out staff will contact you to confirm your pet’s scheduled appointment. If there is an urgent health concern, do not request an appointment online and call our practice at 414-8754 / 0912-345-6789.
                      </h4>
                      
                    </div>
                    
                    <hr>

                    
                    <div style="width: 100%; float:left">
                      <div style="width: 50%; float:left;">
                        <label></h5> Appointment Date <span style="color:red;">*</span></label>
                        <input type="date" class="" id="appointment_modal_Date" name="datepicked"  >
                      </div>

                      <div style="width: 50%; display: inline-block; padding-left: 15px;">
                        <label>Time Block <span style="color:red;">*</span></label>
                        <select id="appointment_modal_TimeBlock" style="margin-top: 6px;" name="timepicked">
                          <option value=""></option>
                          <option value="Block A (8am-9am)" name = "timepicked">Block A (8am-9am)</option>
                          <option value="Block B (9am-10am)" name = "timepicked">Block B (9am-10am)</option>
                          <option value="Block C (10am-11pm)" name = "timepicked">Block C (10am-11pm)</option>
                          <option value="Block D (11am-12am)" name = "timepicked">Block D (11am-12am)</option>
                          <option value="Block E (1pm-2pm)" name = "timepicked">Block E (1pm-2pm)</option>
                          <option value="Block F (2pm-3pm)" name = "timepicked">Block F (2pm-3pm)</option>
                          <option value="Block G (3pm-4pm)" name = "timepicked">Block G (3pm-4pm)</option>
                        </select>
                      </div>
                    </div>



                      <div style="width: 100%; float: left;">
                        <div style="width: 33%; float:left; padding-right: 10px">
                          <label> Fullname <span style="color:red;">*</span></label>
                          <input type="text" class="" id="appointment_modal_Fullname" name="customer_fullname"   maxlength="45" > 
                        </div>
                        <div style="width: 33; display: inline-block; padding-left: 0px;">
                          <label> Cellular Number <span style="color:red;">*</span></label>
                          <input type="text" class="" id="appointment_modal_CellNumber" name="customer_cellnum" maxlength="11"  >
                        </div>
  
                        <div style="width: 33%; display:inline-block; padding-left: 15px;">
                          <label> Email </label>
                          <input type="text" class="" id="appointment_modal_Email" name="customer_email"   maxlength="40" >
                        </div>
                      </div>

                      <div style="width: 100%; float:left;">
                          <div>
                            <label> Reason for Appointment <span style="color:red;">*</span></label>
                              <div style="padding-left:20px; padding-right: 20px;">
                                <div style="width: 33%; float: left;">
                                    <label><input type="checkbox" id="appointment_modal_Check_Consultation" name="reason_for_appointment" value="Consultation"> <span>Consultation</span></label>
                                    <label><input type="checkbox" id="appointment_modal_Check_Vaccination" name="reason_for_appointment" value="Vaccination"> <span>Vaccination</span></label>
                                    <label><input type="checkbox" id="appointment_modal_Check_Treatment" name="reason_for_appointment" value="Treatment"> <span>Treatment</span></label>
                                </div>
  
                                <div style="width: 33%; display: inline-block;">
                                    <label><input  type="checkbox" id="appointment_modal_Check_Surgery" name="reason_for_appointment" value="Surgery"> <span>Surgery</span></label>
                                    <label><input type="checkbox" id="appointment_modal_Check_Deworming" name="reason_for_appointment" value="Deworming"> <span>Deworming</span></label>
                                    <label><input type="checkbox" id="appointment_modal_Check_Boarding" name="reason_for_appointment" value="Boarding"> <span>Boarding</span></label>
                                </div>
  
                                <div style="width: 33%; display: inline-block;">
                                    <label><input type="checkbox" id="appointment_modal_Check_Confinement" name="reason_for_appointment" value="Confinement"> <span>Confinement</span></label>
                                    <label><input type="checkbox" id="appointment_modal_Check_Grooming" name="reason_for_appointment" value="Grooming"> <span>Grooming</span></label>
                                    <label><input type="checkbox" id="appointment_modal_Check_Other" name="reason_for_appointment" value="Other"> <span>Other</span></label>
                                </div>
                               </div>
                            </div>

                      </div>

                      <div style="width: 100%; float:left; padding-top: 15px;">
                         
                      </div>
                     
                  
                  
                  </div>

                

                </div>
    
                <div class="panel-footer">
                    <div align="right">
                      <button class="btn btn-primary" id="make_appointment_modal_SubmitAppointment" value="" name="make_appointment_modal_SubmitAppointment" onclick="myFunction()"> Submit Appointment</button>
                    </div>
                </div>
    
    
            </div>
        </div>
      </div>
    </form>
      <!--Make Appointment Modal End-->

<!-- New customer register modal -->
<form method = "POST">
    <div id="register_new_customer"  class="modal">
        <div class="animate_top" style="width: 75%; margin:auto;">
            <div class="panel panel-primary">
                <div class="panel-heading sansserif"><button type="button" style="float:right;" id="close_btn_new_customer" class="close" data-dismiss="modal">&times;</button><span> <h4 class="leftspace">New Client Form</h4> </span>
                  
                </div>
                <div class="panel-body">
                  <!-- <button type="button" style="float:right;" id="close_btn_make_appointment" class="close" data-dismiss="modal">&times;</button> -->


                  <div style="padding-left: 20px; padding-right: 20px;" id="make_appointment_modal_Entries">
                    <div class="header-text httal htvam">
                      
                      <h4 id="" class="sansserif">
                     Hi welcome to our Pet Science Veterinary Clinic. Please take your time on filling out the necessary data needed to be saved as your personal information in our clinic.
                      </h4>
                      
                    </div>
                    
                    <hr>

                      <div style="width: 100%; float: left;">
                        <div style="width: 50%; float:left; padding-right: 10px">
                          <label> Fullname <span style="color:red;">*</span></label>
                          <input type="text" class="" id="appointment_modal_Fullname" name="customer_fullname_new"  maxlength="45" > 
                        </div>
                        <div style="width: 50%; float:left; padding-right: 10px">
                          <label> Address <span style="color:red;">*</span></label>
                          <input type="text" class="" id="appointment_modal_Address" name="customer_address_new"  maxlength="60" > 
                        </div>
                        
                        </div>
                        <div style="width: 100%; float: left;">
                        <div style="width: 47%; display: inline-block; padding-left: 0px;">
                          <label> Cellular Number <span style="color:red;">*</span></label>
                          <input type="text" class="" id="appointment_modal_CellNumber" name="customer_cellnum_new" maxlength="11"  >
                        </div>
                        <div style="width: 47%; display:inline-block; padding-left: 10px;">
                          <label> Email <span style="color:red;">*</span></label>
                          <input type="text" class="" id="appointment_modal_Email" name="customer_email_new"  maxlength="40" >
                        </div>
                        
                      </div>
                      

                      <div style="width: 100%; float:left;">
                          <div>
                            <label> Pet Information </label>
                            <div style="width: 50%; float:left; padding-right: 10px">
                          <label> Pets' Name <span style="color:red;">*</span></label>
                          <input type="text" class="" id="appointment_modal_Fullname" name="pet_fullname_new"  maxlength="25" > 
                        </div>
                        <div style="width: 15%; float:left; padding-top: 5px; padding-right:1%">
                        <label> Species <span style="color:red;">*</span></label><select name="pet_species">
                        <option value="None"> ---- </option> 
                        <option value="Canine">Canine</option>
                        <option value="Feline">Feline</option>
                        </select> </div>

                        <div style="width: 10%; float:left; padding-top: 5px; padding-right:1%">
                        <label> Sex <span style="color:red;">*</span></label><select id="pet_gender" name="pet_gender">
                        <option value=""> ---- </option> 
                        <option value="Male">Male</option>
                        <option value="Female ">Female</option>
                        </select> 
                        </div>
                        <div style="width: 20%; display:inline-block; padding-right:1%">
                          <label> Breed <span style="color:red;">*</span></label>
                          <input type="text" class="" id="appointment_modal_Email" name="pet_breed_new"  maxlength="25" >
                        </div>
                        <div style="width: 20%; float:left; padding-right:1%">
                        <label></h5> DOB(Date of Birth) <span style="color:red;">*</span></label>
                        <input type="date" class="" id="appointment_modal_Date" name="pet_DOB_new"  >
                      </div>
                        
                      </div>

                      <div style="width: 100%; float:left; padding-top: 15px;">
                         
                      </div>
                      </div>
                  
                  
                  </div>

                

                </div>
    
                <div class="panel-footer">
                    <div align="right">
                      <button class="btn btn-primary" id="new_customer_modal_SubmitRegistration" value="" name="new_customer_modal_SubmitRegistration" onclick="myFunction()"> Submit </button>
                    </div>
                </div>
    
    
            </div>
        </div>
      </div>
	  </form>
<!-- New customer register modal end -->

      <div class="modal fade" id="thankyouModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Thank you for making an appointment</h4>
            </div>
            <div class="modal-body">
                <p>Appointment made!</p>                     
            </div>    
        </div>
    </div>
</div>


<!-- w3-content defines a container for fixed size centered content, 
and is wrapped around the whole page content, except for the footer in this example -->
<div class="w3-content" style="max-width:100%">

  <div class="w3-top" >
  <div id="navbar">
  <div class="w3-bar w3-white w3-card header_div" id="myNavbar">


<img src="img/rippleeffect.png" style="width: 65%; height: 95px;">
<!-- <a class="">Pet Science Veterinary Clinic</a> -->



<!-- Right-sided navbar links -->
<div class="w3-right w3-hide-small" id="TopMenu_Items">
  <a  href ="#" class="w3-button"><span class="header_titles">Home</span></a>
  <a id="make_appointment" class="w3-button"><span class="header_titles">Make an Appointment</span> </a>
  <!-- <a class="w3-button"><span class="header_titles">About us</span></a> -->
  <a href="faq.php" class="w3-button"><span class="header_titles">FAQ</span></a>

</div>
<!-- Hide right-floated links on small screens and replace them with a menu icon -->

<a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
  <i class="fa fa-bars"></i>
</a>
</div>
  </div>
    
  </div>



<!-- Header  Start-->
<header class="w3-center line"> 
        

    <div class="FontPage_Images mySlides w3-animate-opacity w3-grayscale-min" style="background-image: url('img/1.jpg'); "></div>
    <div class="FontPage_Images mySlides w3-animate-opacity w3-grayscale-min" style="background-image: url('img/2.jpg');  "></div>
    <div class="FontPage_Images mySlides w3-animate-opacity w3-grayscale-min" style="background-image: url('img/3.jpg');"></div>
    <div class="FontPage_Images mySlides w3-animate-opacity w3-grayscale-min" style="background-image: url('img/4.jpeg'); "></div>
    <div class="w3-display-bottomleft w3-container textoverimage textoverimage-hover w3-hide-small"
   style="bottom:1%;opacity:0.7;width:70%">
  <h2><b>New client?<br>Register now and book an appointment in our clinic.</b></h2>
  <button class="w3-button w3-black w3-padding-large w3-large w3-margin-top w3-margin-bottom" id="register_modal">Click Here!</button>
</div>
    
   
</header>
<!-- Header End-->

<!-- Grid -->
<div class="w3-row">
  
<!-- About Us Preview Start -->
<div class="container-services row2">
  <!-- Blog entry -->
  <div class="container-services line">
    <div class="container-header">
    <img class="aboutusphoto" src="img/item3.jpg">

        <h3 class="text">About Us</h3>
        
     </div>

     <div class="container-subHeader">
       <br>
        <h2 class="text2">History of the clinic</h2>
        <br>
      </div>

      <div class="container-subHeader">

      <h3 class="text3">Pet Science Veterinary Clinic is owned and operated by Dr. Zandro Perez. The clinic was established on November 18, 2006. 
            The origin of the clinic’s name comes from the association of Pet Lovers in Southwestern University PHINMA.The clinic
            was created out of passion and love for pets.The clinic accommodates as many pets as they can work on in a day.
          </h3>

    </div>
  </div>
</div>
<!-- About Us Preview End -->

  
<div class="container-services row3 line">


  <header class="container-header">
  <h2 class="plaintext">Our Services</h2>
  </header>
  <div class="entry-content mt-5">
    <div class="w3-row" style="margin-top:64px">
      <div class="services-padding">

              <div class="column-pad">
                <i class="w3-text-orange w3-jumbo">
                  <p><img id="grow" src="img/grooming.png" style="width: 80%; height: 80%;"></p>
                </i>
                <p>Grooming</p>
              </div>
              <div class="column-pad">
                <i class=" w3-text-red w3-jumbo">
                    <p><img src="img/vaccination.png" style="width: 80%; height: 80%;"></p>
                </i>
                <p>Vaccination</p>
              </div>
               <div class="column-pad">
                <i class="fa fa-camera w3-text-yellow w3-jumbo">
                  <p><img src="img/surgery.png" style="width: 80%; height: 80%;"></p>
                </i>
                <p>Surgery</p>
              </div>
              <div class="column-pad">
                <i class="fa fa-battery-full w3-text-green w3-jumbo">
                  <p><img src="img/boarding.png" style="width: 80%; height: 80%;"></p>
                </i>
                <p>Boarding</p>
              </div>

              <div class="column-pad">
                <i class="fa fa-diamond w3-text-white w3-jumbo">
                  <p><img src="img/checkup.png" style="width: 80%; height: 80%;"></p>
                </i>
                <p>Check-up</p>
              </div>

              <div class="column-pad">
                <i class="fa fa-cloud w3-text-blue w3-jumbo">
                  <p><img src="img/confinement.png" style="width: 80%; height: 80%;"></p>
                </i>
                <p>Confinement</p>
              </div>

              <div class="column-pad">
                <i class="fa fa-globe w3-text-amber w3-jumbo">
                  <p><img src="img/consultation.png" style="width: 80%; height: 80%;"></p>
                </i>
                <p>Consultation</p>
              </div>

              <div class="column-pad">
                <i class="fa fa-hdd-o w3-text-cyan w3-jumbo">
                  <p><img src="img/treatment.png" style="width: 40%; height: 40%;"></p>
                </i>
                <p>Treatment</p>
              </div>
               
              <div class="column-pad2">
                <i class="fa fa-hdd-o w3-text-cyan w3-jumbo">
                  <p><img src="img/deworming.png" style="width: 80%; height: 80%;"></p>
                </i>
                <p>Deworming</p>
              </div>

              <div class="column-pad2">
                <i class="fa fa-hdd-o w3-text-cyan w3-jumbo">
                  <p><img src="img/house_call_services.png" style="width: 70%; height: 70%;"></p>
                </i>
                <p>House Call Services</p>
              </div>
  
        </div>
        </div>
      </div>
    </div>
</div>
              
            
          
            
             
                
             



  <!-- FAQ Preview Start -->
  <div class="container-services row2">
    <div class="container-header">
      <h3><b>Find Us</b></h3></div>
      <div class="w3-container">
      <br>
      <h4>You can use this map in order to find our clinic.</h4>
        </div>

       <div class="w3-container">
        <p>
            <div id="googleMap" style="width:100%;height:400px;"></div>
          </p>
        <div class="w3-row">
        <div class="w3-col m8 s12">
          <hr>
        </div>
       
      </div>
    </div>
  </div>
  <!-- FAQ Preview End -->



</div>
<!-- Grid End -->

<!-- Clinic Hours Panel Start -->
<div class="w3-col l4">
  <!-- About Card -->
  <div class="w3-card w3-margin w3-margin-top card_roundBorder">
    <div class="card_colorHeader">
        <h4><b>Clinic Hours</b></h4>
      </div>
        <div class="w3-container">
       
            <p><h4><u>Monday-Friday</u></h4></p>
            <p>8am-7pm</p>
            <p><h4><u>Saturday</u></h4></p>
            <p>8am-6pm</p>
            <p><h4><u>Sunday</u></h4></p>
            <p>9am-3pm</p>
          </div>
    
    
  </div>
  
  <hr>
  <!-- Clinic Hours Panel End -->
  
  <!-- Appointment slots start -->
  <!-- <div class="w3-card w3-margin card_topBorder card_bottomBorder">
    <div class="w3-container w3-padding card_colorHeader">
      <h4>Available Appointment Time Today</h4>
    </div>
    <ul class="w3-ul w3-hoverable w3-white card_bottomBorder">
        <li class="w3-padding-16">
        <span class="w3-large">10am-11am</span><br>
        <span>2 slots</span>
      </li>
    
      <li class="w3-padding-16">
        <span class="w3-large">11am-12pm</span><br>
        <span>1 slot</span>
      </li> 
      <li class="w3-padding-16">
        <span class="w3-large">1pm-2pm</span><br>
        <span>3 slots</span>
      </li>   
      <li class="w3-padding-16 w3-hide-medium w3-hide-small">
        <span class="w3-large">2pm-3pm</span><br>
        <span>No slot Available</span>
      </li>  
      <li class="w3-padding-16 w3-hide-medium w3-hide-small">
            <span class="w3-large">3pm-4pm</span><br>
            <span>No slot Available</span>
          </li>  
    </ul>
  </div> -->
  <hr> 
   <!-- Appointment slots End -->

  
<!-- END Introduction Menu -->
</div>

<!-- END GRID -->
</div><br>

<!-- END w3-content -->
</div>



    <script src="js/Main/Main.js"></script>
    <script src="js/Main/JQuery.js"></script>
    <script src="js/Main/Bootstrap.js"></script>
    
    <script>
        // Initialize and add the map
        </script>
        
        <script>
function myMap() {
var mapProp= {
  center:new google.maps.LatLng(10.363930,123.914704),
  zoom:5,
};
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAzf8Z7BvJ3GD9KqkqJRqJRMXkrMivyDQs&callback=myMap"></script>




</body>
</html>