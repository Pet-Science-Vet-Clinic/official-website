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
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<!-- <link rel="stylesheet" href="css/raleway_font.css"> -->
<!-- Date time Bootstrap Start-->
<!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" /> -->

<!-- Date time Bootstrap End -->


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
    
                <!-- <div class="panel-footer">
                    <div align="right">
                      <button class="btn btn-primary" id="" value="" name="MODULE_YES"> Button Here</button>
                    </div>
                </div> -->
    
    
            </div>
        </div>
      </div>
      <!--About Us Modal End-->

       <!--Make Appointment Modal Start-->
    <div id="make_appointment_modal"  class="modal">
        <div class=" animate_top" style="width: 55%; margin:auto;">
            <div class="panel panel-primary">
                <div class="panel-heading"><span> Set Appointment</span>
                  <button type="button" style="float:right;" id="close_btn_make_appointment" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="panel-body">
                  <!-- <button type="button" style="float:right;" id="close_btn_make_appointment" class="close" data-dismiss="modal">&times;</button> -->


                  <div style="padding-left: 20px; padding-right: 20px;" id="make_appointment_modal_Entries">
                    <div class="header-text httal htvam">
                      <!-- <h2 id="header_22" class="form-header" data-component="header">
                        Set an Appointment
                      </h2> -->
                      <h3 id="" class="">
                        Please fill out all the fields below.
                      </h3>
                      
                    </div>
                    
                    <hr>

                    
                    <div style="width: 100%; float:left">
                      <div style="width: 50%; float:left;">
                        <label></h5> Appointment Date <span style="color:red;">*</span></label>
                        <input type="date" class="" id="appointment_modal_Date" name=""  >
                      </div>

                      <div style="width: 50%; display: inline-block; padding-left: 15px;">
                        <label>Time Block <span style="color:red;">*</span></label>
                        <select id="appointment_modal_TimeBlock" style="margin-top: 6px;">
                          <option value=""></option>
                          <option value="Block_A">Block A (8am-9am)</option>
                          <option value="Block_B">Block B (9am-10am)</option>
                          <option value="Block_C">Block C (10am-11pm)</option>
                          <option value="Block_D">Block D (11am-12am)</option>
                          <option value="Block_E">Block E (1pm-2pm)</option>
                          <option value="Block_F">Block F (2pm-3pm)</option>
                          <option value="Block_G">Block G (3pm-4pm)</option>
                        </select>
                      </div>
                    </div>



                      <div style="width: 100%; float: left;">
                        <div style="width: 33%; float:left;">
                          <label> Fullname <span style="color:red;">*</span></label>
                          <input type="text" class="" id="appointment_modal_Fullname" name=""   maxlength="45" >
                        </div>
  
                        <div style="width: 33; display: inline-block; padding-left: 15px;">
                          <label> Cellular Number <span style="color:red;">*</span></label>
                          <input type="text" class="" id="appointment_modal_CellNumber" name="" maxlength="11"  >
                        </div>
  
                        <div style="width: 33%; display:inline-block; padding-left: 15px;">
                          <label> Email </label>
                          <input type="text" class="" id="appointment_modal_Email" name=""   maxlength="40" >
                        </div>
                      </div>

                      <div style="width: 100%; float:left;">
                          <div>
                            <label> Reason for Appointment <span style="color:red;">*</span></label>
                              <div style="padding-left:20px; padding-right: 20px;">
                                <div style="width: 33%; float: left;">
                                    <label><input type="checkbox" id="appointment_modal_Check_Consultation" name="" value=""> <span>Consultation</span></label>
                                    <label><input type="checkbox" id="appointment_modal_Check_Vaccination" name="" value=""> <span>Vaccination</span></label>
                                    <label><input type="checkbox" id="appointment_modal_Check_Treatment" name="" value=""> <span>Treatment</span></label>
                                </div>
  
                                <div style="width: 33%; display: inline-block;">
                                    <label><input type="checkbox" id="appointment_modal_Check_Surgery" name="" value=""> <span>Surgery</span></label>
                                    <label><input type="checkbox" id="appointment_modal_Check_Deworming" name="" value=""> <span>Deworming</span></label>
                                    <label><input type="checkbox" id="appointment_modal_Check_Boarding" name="" value=""> <span>Boarding</span></label>
                                </div>
  
                                <div style="width: 33%; display: inline-block;">
                                    <label><input type="checkbox" id="appointment_modal_Check_Confinement" name="" value=""> <span>Confinement</span></label>
                                    <label><input type="checkbox" id="appointment_modal_Check_Grooming" name="" value=""> <span>Grooming</span></label>
                                    <label><input type="checkbox" id="appointment_modal_Check_Other" name="" value=""> <span>Other</span></label>
                                </div>
                               </div>
                            </div>

                      </div>

                      <div style="width: 100%; float:left; padding-top: 15px;">
                          <h5>Clinic only caters appointment between chuchuchu</h5>
                      </div>
                     
                  
                  
                  </div>

                

                    <!-- <form class="jotform-form" action="https://submit.jotform.me/submit/92303437440450/" method="post" name="form_92303437440450" id="92303437440450" accept-charset="utf-8">
                      <input type="hidden" name="formID" value="92303437440450" />
                      <div role="main" class="form-all">
                        <ul class="form-section page-section">
                          <li id="cid_22" class="form-input-wide" data-type="control_head">
                            <div class="form-header-group ">
                             
                            </div>
                          </li>
                          <li class="form-line jf-required allowTime" data-type="control_datetime" id="id_26">
                            <label class="form-label form-label-left form-label-auto" id="label_26" for="month_26">
                              Appointment Date
                              <span class="form-required">
                                *
                              </span>
                            </label>
                                <label for="start">Date: <input type="date" id="start" name="trip-start" value="2018-07-22" min="2018-01-01" max="2099-12-31">
                                Time: 
                                <select>
                                  <option value="Block_A">Block A (8am-9am)</option>
                                  <option value="Block_B">Block B (9am-10am)</option>
                                  <option value="Block_C">Block C (10am-11pm)</option>
                                  <option value="Block_D">Block D (11am-12am)</option>
                                  <option value="Block_E">Block E (1pm-2pm)</option>
                                  <option value="Block_F">Block F (2pm-3pm)</option>
                                  <option value="Block_G">Block G (3pm-4pm)</option>
                                </select></label>
                            
                          <li class="form-line jf-required" data-type="control_fullname" id="id_16">
                            <label class="form-label form-label-left form-label-auto" id="label_16" for="first_16">
                              Name
                              <span class="form-required">
                                *
                              </span>
                            </label>
                            <div id="cid_16" class="form-input jf-required">
                              <div data-wrapper-react="true">
                                <span class="form-sub-label-container" style="vertical-align:top">
                                  <input type="text" id="first_16" name="q16_yourName[first]" class="form-textbox validate[required]" size="35" value="" data-component="first" aria-labelledby="label_16 sublabel_16_first" required="" />
                                  <label class="form-sub-label" for="first_16" id="sublabel_16_first" style="min-height:13px"> Fullname </label>
                                </span>
                              
                              </div>
                            </div>
                          </li>
                          <li class="form-line jf-required" data-type="control_email" id="id_17">
                            <label class="form-label form-label-left form-label-auto" id="label_17" for="input_17">
                              E-mail
                              <span class="form-required">
                                *
                              </span>
                            </label>
                            <div id="cid_17" class="form-input jf-required">
                              <input type="email" id="input_17" name="q17_yourEmail" class="form-textbox validate[required, Email]" size="27" value="" maxLength="50" placeholder="ex: myname@example.com" data-component="email" aria-labelledby="label_17" required="" />
                            </div>
                          </li>
                          <li class="form-line jf-required" data-type="control_phone" id="id_25">
                            <label class="form-label form-label-left form-label-auto" id="label_25" for="input_25_area">
                              Phone Number
                              <span class="form-required">
                                *
                              </span>
                            </label>
                            <div id="cid_25" class="form-input jf-required">
                              <div data-wrapper-react="true">
                                <span class="form-sub-label-container" style="vertical-align:top">
                                  
                                <span class="form-sub-label-container" style="vertical-align:top">
                                  <input type="tel" id="input_25_phone" name="q25_phoneNumber[phone]" class="form-textbox validate[required]" size="12" value="" data-component="phone" aria-labelledby="label_25 sublabel_25_phone" required="" />
                                  <label class="form-sub-label" for="input_25_phone" id="sublabel_25_phone" style="min-height:13px"> Phone Number </label>
                                </span>
                              </div>
                            </div>
                          </li>
                          <li class="form-line jf-required" data-type="control_checkbox" id="id_20">
                            <label class="form-label form-label-left form-label-auto" id="label_20" for="input_20_0">
                              Reason of Appointment
                              <span class="form-required">  *</span>
                            </label>
                            <div id="cid_20" class="form-input jf-required">
                              <div class="form-single-column" data-component="checkbox">
                               <span class="form-checkbox-item" style="clear:left">
                                  <input type="checkbox" class="form-checkbox validate[required]" id="input_20_0" name="q20_reasonOf[]" value="Consultation" required="" />
                                  <label id="label_input_20_0" for="input_20_0"> Consultation </label>
                                </span>
                                <span class="form-checkbox-item" style="clear:left">
                                  <input type="checkbox" class="form-checkbox validate[required]" id="input_20_1" name="q20_reasonOf[]" value="Vaccination" required="" />
                                  <label id="label_input_20_1" for="input_20_1"> Vaccination </label>
                                </span>
                                <span class="form-checkbox-item" style="clear:left">
                                  <input type="checkbox" class="form-checkbox validate[required]" id="input_20_2" name="q20_reasonOf[]" value="Treatment" required="" />
                                  <label id="label_input_20_2" for="input_20_2"> Treatment </label>
                                </span>
                                <span class="form-checkbox-item" style="clear:left">
                                  <input type="checkbox" class="form-checkbox validate[required]" id="input_20_3" name="q20_reasonOf[]" value="Surgery" required="" />
                                  <label id="label_input_20_3" for="input_20_3"> Surgery </label>
                                </span>
                                <span class="form-checkbox-item" style="clear:left">
                                  <input type="checkbox" class="form-checkbox validate[required]" id="input_20_4" name="q20_reasonOf[]" value="Deworming" required="" />
                                  <label id="label_input_20_4" for="input_20_4"> Deworming </label>
                                </span>
                                <span class="form-checkbox-item" style="clear:left">
                                  <input type="checkbox" class="form-checkbox validate[required]" id="input_20_5" name="q20_reasonOf[]" value="Boarding" required="" />
                                  <label id="label_input_20_5" for="input_20_5"> Boarding </label>
                                </span>
                                <span class="form-checkbox-item" style="clear:left">
                                  <input type="checkbox" class="form-checkbox validate[required]" id="input_20_6" name="q20_reasonOf[]" value="Confinement" required="" />
                                  <label id="label_input_20_6" for="input_20_6"> Confinement </label>
                                </span>
                                <span class="form-checkbox-item" style="clear:left">
                                  <input type="checkbox" class="form-checkbox validate[required]" id="input_20_7" name="q20_reasonOf[]" value="Grooming" required="" />
                                  <label id="label_input_20_7" for="input_20_7"> Grooming </label>
                                </span>
                                <span class="form-checkbox-item" style="clear:left">
                                  <input type="checkbox" class="form-checkbox validate[required]" id="input_20_8" name="q20_reasonOf[]" value="Other" required="" />
                                  <label id="label_input_20_8" for="input_20_8"> Other </label>
                                </span>
                              </div>
                            </div>
                          </li>
                         
                          
                          <li class="form-line" data-type="control_button" id="id_2">
                            <div id="cid_2" class="form-input-wide">
                              <div style="margin-left:156px" class="form-buttons-wrapper ">
                                
                              </div>
                            </div>
                          </li>
                          <li style="display:none">
                            Should be Empty:
                            <input type="text" name="website" value="" />
                          </li>
                        </ul>
                      </div>
                      <script>
                      JotForm.showJotFormPowered = "new_footer";
                      </script>
                      <input type="hidden" id="simple_spc" name="simple_spc" value="92303437440450" />
                      <script type="text/javascript">
                      document.getElementById("si" + "mple" + "_spc").value = "92303437440450-92303437440450";
                      </script>
                    </form> -->



                </div>
    
                <div class="panel-footer">
                    <div align="right">
                      <button class="btn btn-primary" id="make_appointment_modal_SubmitAppointment" value="" name="MODULE_YES"> Submit Appointment</button>
                    </div>
                </div>
    
    
            </div>
        </div>
      </div>
      <!--Make Appointment Modal End-->

<!-- w3-content defines a container for fixed size centered content, 
and is wrapped around the whole page content, except for the footer in this example -->
<div class="w3-content" style="max-width:100%">

  <div class="w3-top" >
    <div class="w3-bar w3-white w3-card header_div" id="myNavbar">


      <a href="#home" class=""><img src="img/rippleeffect.png" style="width: 80px; height: 50px;"></a>
      <!-- <a class="">Pet Science Veterinary Clinic</a> -->



      <!-- Right-sided navbar links -->
      <div class="w3-right w3-hide-small" id="TopMenu_Items">
        <a class="w3-button"><span class="header_titles">Home</span></a>
        <a id="make_appointment" class="w3-button"><span class="header_titles">Make an Appointment</span> </a>
        <a class="w3-button"><span class="header_titles">About us</span></a>
        <a href="FAQ.html" class="w3-button"><span class="header_titles">FAQ</span></a>

      </div>
      <!-- Hide right-floated links on small screens and replace them with a menu icon -->
  
      <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
        <i class="fa fa-bars"></i>
      </a>
    </div>
  </div>



<!-- Header  Start-->
<header class="w3-center "> 
        

    <div class="FontPage_Images mySlides w3-animate-opacity w3-grayscale-min" style="background-image: url('img/slide-one.jpg'); "></div>
    <div class="FontPage_Images mySlides w3-animate-opacity w3-grayscale-min" style="background-image: url('img/slide-two.jpg');  "></div>
    <div class="FontPage_Images mySlides w3-animate-opacity w3-grayscale-min" style="background-image: url('img/slide-three.jpg');"></div>
    <div class="FontPage_Images mySlides w3-animate-opacity w3-grayscale-min" style="background-image: url('img/slide-four.jpg'); "></div>
   
    
    <!-- <div class="w3-display-left w3-text-white" style="padding: 450px 0px 0px 100px" style="overflow: hidden;">
        <span class="w3-jumbo w3-hide-small">What are you waiting for?</span><br>
        <span class="w3-large"><h2>Make an appointment today!</h2></span>
        <p><a href="#about" class="w3-button w3-white w3-padding-large w3-large w3-margin-top w3-opacity w3-hover-opacity-off">Click here!</a></p>
      </div>  -->

    <!-- <img class="mySlides login100-more" src="img/slide-one.jpg" style='width: 1320px; height: 650px'>
    <img class="mySlides login100-more" src="img/slide-two.jpg" style='width: 1320px; height: 650px'>
    <img class="mySlides login100-more" src="img/slide-three.jpg" style='width: 1320px; height: 650px'>
    <img class="mySlides login100-more" src="img/slide-four.jpg" style='width: 1320px; height: 650px'> -->
</header>
<!-- Header End-->

<!-- Grid -->
<div class="w3-row">

<!-- About Us Preview Start -->
<div class="w3-col l8 s12 ">
  <!-- Blog entry -->
  <div class="w3-card-4 w3-margin w3-white">
    <div class="card_colorHeader">
        <h3><b>About Us</b></h3>
     </div>

     <div class="w3-container">
       <br>
        <h2>History of the clinic</h2>
        <br>
      </div>

      <div class="w3-container">

      <p>Pet Science Veterinary Clinic is owned and operated by Dr. Zandro Perez. The clinic was established on November 18, 2006. 
            The origin of the clinic’s name comes from the association of Pet Lovers in Southwestern University PHINMA.The clinic
            was created out of passion and love for pets.The clinic accommodates as many pets as they can work on in a day.
        </p>

        <div class="w3-container card_services_padding  21 w3-center card_servicesbg">
            <h1 class="w3-jumbo"><b>Services</b></h1>
            <p>This are the services we offer here in our clinic.</p>
          
            <div class="w3-row" style="margin-top:64px">
              <div class="w3-col s3">
                <i class="w3-text-orange w3-jumbo">
                  <p><img src="img/grooming.png" style="width: 100px; height: 100px;"></p>
                </i>
                <p>Grooming</p>
              </div>

              <div class="w3-col s3">
                <i class=" w3-text-red w3-jumbo">
                    <p><img src="img/vaccination.png" style="width: 100px; height: 100px;"></p>
                </i>
                <p>Vaccination</p>
              </div>

              <div class="w3-col s3">
                <i class="fa fa-camera w3-text-yellow w3-jumbo">
                  <p><img src="img/surgery.png" style="width: 100px; height: 100px;"></p>
                </i>
                <p>Surgery</p>
              </div>

              <div class="w3-col s3">
                <i class="fa fa-battery-full w3-text-green w3-jumbo">
                  <p><img src="img/boarding.png" style="width: 100px; height: 100px;"></p>
                </i>
                <p>Boarding</p>
              </div>
            </div>
          
            <div class="w3-row" style="margin-top:64px">
              <div class="w3-col s3">
                <i class="fa fa-diamond w3-text-white w3-jumbo">
                  <p><img src="img/checkup.png" style="width: 100px; height: 100px;"></p>
                </i>
                <p>Check-up</p>
              </div>

              <div class="w3-col s3">
                <i class="fa fa-cloud w3-text-blue w3-jumbo">
                  <p><img src="img/confinement.png" style="width: 100px; height: 100px;"></p>
                </i>
                <p>Confinement</p>
              </div>

              <div class="w3-col s3">
                <i class="fa fa-globe w3-text-amber w3-jumbo">
                  <p><img src="img/consultation.png" style="width: 100px; height: 100px;"></p>
                </i>
                <p>Consultation</p>
              </div>

              <div class="w3-col s3">
                <i class="fa fa-hdd-o w3-text-cyan w3-jumbo">
                  <p><img src="img/treatment.png" style="width: 100px; height: 100px;"></p>
                </i>
                <p>Treatment</p>
              </div>
            </div>
              <div class="w3-row" style="margin-top:64px">
              <div class="w3-col s3">
                <i class="fa fa-hdd-o w3-text-cyan w3-jumbo">
                  <p><img src="img/deworming.png" style="width: 100px; height: 100px;"></p>
                </i>
                <p>Deworming</p>
              </div>

              <div class="w3-col s3">
                <i class="fa fa-hdd-o w3-text-cyan w3-jumbo">
                  <p><img src="img/house_call_services.png" style="width: 100px; height: 100px;"></p>
                </i>
                <p>House Call Services</p>
              </div>
            </div>
              
            
          </div>
      <div class="w3-row">
        <div class="w3-col m8 s12">
          <p><button class="w3-button w3-padding-large w3-white w3-border" id="about_us_btn"><b>READ MORE »</b></button></p>
        </div>
        <div class="w3-col m4 w3-hide-small">
          <!-- <p><span class="w3-padding-large w3-right"><b>Comments  </b> <span class="w3-tag">0</span></span></p> -->
        </div>
      </div>
    </div>
  </div>
<!-- About Us Preview End -->

  <hr>

  <!-- FAQ Preview Start -->
  <div class="w3-card-4 w3-margin w3-white">
    <div class="card_colorHeader">
      <h3><b>Find Us</b></h3></div>
      <div class="w3-container">
      <br>
      <h4>You can use this map in order to find our clinic.</h4>
        </div>

       <div class="w3-container">
        <p>
            <div id="map" style="width:100%;height:400px;"></div>
          </p>
        <div class="w3-row">
        <div class="w3-col m8 s12">
          <hr>
        </div>
       
      </div>
    </div>
  </div>
  <!-- FAQ Preview End -->


  <!-- <div class="w3-third w3-margin-bottom">
      <ul class="w3-ul w3-border w3-center w3-hover-shadow">
        <li class="w3-black w3-xlarge w3-padding-32">Premium</li>
        <li class="w3-padding-16"><b>50GB</b> Storage</li>
        <li class="w3-padding-16"><b>50</b> Emails</li>
        <li class="w3-padding-16"><b>50</b> Domains</li>
        <li class="w3-padding-16"><b>Endless</b> Support</li>
        <li class="w3-padding-16">
          <h2 class="w3-wide">$ 50</h2>
          <span class="w3-opacity">per month</span>
        </li>
        <li class="w3-light-grey w3-padding-24">
          <button class="w3-button w3-green w3-padding-large">Sign Up</button>
        </li>
      </ul>
    </div>
  </div> -->





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
       
            <p><h4><u>Monday-Saturday</u></h4></p>
            <p>10am-4pm</p>
            <p><h4><u>Sunday</u></h4></p>
            <p>10am-3pm</p>
          </div>
    
    
  </div>
  
  <hr>
  <!-- Clinic Hours Panel End -->
  
  <!-- Appointment slots start -->
  <div class="w3-card w3-margin card_topBorder card_bottomBorder">
    <div class="w3-container w3-padding card_colorHeader">
      <h4>Available Appointment Time Today</h4>
    </div>
    <ul class="w3-ul w3-hoverable w3-white card_bottomBorder">
      <!-- <a id="available_timeBlockA" class="card_button"> -->
        <li class="w3-padding-16">
        <span class="w3-large">10am-11am</span><br>
        <span>2 slots</span>
      </li>
    <!-- </a> -->
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
  </div>
  <hr> 
   <!-- Appointment slots End -->



  <!-- Labels / tags -->
  <!-- <div class="w3-card w3-margin">
    <div class="w3-container w3-padding">
      <h4>Tags</h4>
    </div>
    <div class="w3-container w3-white">
    <p><span class="w3-tag w3-black w3-margin-bottom">Travel</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">New York</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">London</span>
      <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">IKEA</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">NORWAY</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">DIY</span>
      <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Ideas</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Baby</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Family</span>
      <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">News</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Clothing</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Shopping</span>
      <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Sports</span> <span class="w3-tag w3-light-grey w3-small w3-margin-bottom">Games</span>
    </p>
    </div>
  </div> -->
  
<!-- END Introduction Menu -->
</div>

<!-- END GRID -->
</div><br>

<!-- END w3-content -->
</div>

<!-- Footer -->
<!-- <footer>
<div class="container">
        <div class="row">
            <div class="col-xs-6 footer-para">
                <p>&copy;Kehzo All right reserved</p>
            </div>
            
        </div>
    </div>
</footer> -->

    <script src="js/Main/Main.js"></script>
    <script src="js/Main/JQuery.js"></script>
    <script src="js/Main/Bootstrap.js"></script>
    <script>
        // Initialize and add the map
        
        function initMap() {
          // The location of Uluru
          var PetSci = {lat: 10.363930, lng: 123.914704};
          // The map, centered at Uluru
          var map = new google.maps.Map(
              document.getElementById('map'), {zoom: 4, center: PetSci});
          // The marker, positioned at Uluru
          var marker = new google.maps.Marker({position: PetSci, map: map});
        }
            </script>
        <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAzf8Z7BvJ3GD9KqkqJRqJRMXkrMivyDQs&callback=initMap">
        </script>
        
</body>
</html>