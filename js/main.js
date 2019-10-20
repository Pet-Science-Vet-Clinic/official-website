

function CheckNumber_valid_(str){
    if(str.charAt(0) != "0" || str.charAt(1) != "9"  || str.length < 11 ){
        return true;
    }else{
        return false;
    }
}

function Repelace_63Number(str){
    if(!CheckNumber_valid_(str)){
        str = str.substr(1);
        return str = `+63${str}`;
    }else{
        if(str.charAt(0) == "+" && str.charAt(1) == "6" && str.charAt(2) == "3"){
            str = str.substr(0);
            str = str.substr(1);
            str = str.substr(2);
            return str = `0${str}`;
        }else{
            return str;
        }
    }
}



function ticker(){
    $('#buttontick').checkboxMaster('input[name=showhiddenfields]');
  }
$.fn.checkboxMaster = function(list) {

    return this.on('click', function() {
        $(list).prop('checked', $(this).prop('checked'));
    });

}
// $(function() {
//     $("#buttontick").on("click",function() {
//       $("input[value='showhiddenfields']").prop("checked",true);
//     });
//   });
//   $(function() {
//     $("#buttonclosemodal").on("click",function() {
//       $("input[value='showhiddenfields']").prop("checked",false);
//     });
//   });
  
function CheckNumber_valid_(str){
    if(str.charAt(0) != "0" || str.charAt(1) != "9"  || str.length < 11 ){
        return true;
    }else{
        return false;
    }
}

function Repelace_63Number(str){
    if(!CheckNumber_valid_(str)){
        str = str.substr(1);
        return str = `+63${str}`;
    }else{
        if(str.charAt(0) == "+" && str.charAt(1) == "6" && str.charAt(2) == "3"){
            str = str.substr(0);
            str = str.substr(1);
            str = str.substr(2);
            return str = `0${str}`;
        }else{
            return str;
        }
    }
}


//====== AJAX START====//



// Contact Us Send Email
// Variable to hold request
var request;
// Bind to the submit event of our form
$("#contactUsFormSubmit").submit(function(event){
     // Prevent default posting of form - put here to work in case of errors
     event.preventDefault();

     // Abort any pending request
     if (request) {
         request.abort();
     }
     // setup some local variables
     var $form = $(this);
 
     // Let's select and cache all the fields
     var $inputs = $form.find("input, select, button, textarea");
     
     // Serialize the data in the form
     var serializedData = $form.serialize();
 
     // Let's disable the inputs for the duration of the Ajax request.
     // Note: we disable elements AFTER the form data has been serialized.
     // Disabled form elements will not be serialized.
     $inputs.prop("disabled", true);
 
     // Fire off the request to /form.php
     request = $.ajax({
         url: "controller/contactus.php",
         type: "post",
         data: serializedData
     });
 
     // Callback handler that will be called on success
     request.done(function (response, textStatus, jqXHR){
         // Log a message to the console
         var json_data = JSON.parse(response);
         console.log("Hooray, it worked!");
         console.log(json_data);
         
         $('#contactUsAlertModal').modal('show');
         $('#contact_fname').val("");
         $('#span_fname').html(json_data.fname);
         $('#contact_lname').val("");
         $('#contact_email').val("");
         $('#contact_phone').val("");
         $('#contact_message').val("");
     });
 
     // Callback handler that will be called on failure
     request.fail(function (jqXHR, textStatus, errorThrown){
         // Log the error to the console
         console.error(
             "The following error occurred: "+
             textStatus, errorThrown
         );
     });
 
     // Callback handler that will be called regardless
     // if the request failed or succeeded
     request.always(function () {
         // Reenable the inputs
         $inputs.prop("disabled", false);
     });
});

//=== AJAX END ===//



//=== Appointment modal AJAX ===//

// Contact Us Send Email
// Variable to hold request
var request;
// Bind to the submit event of our form
$("#appointmentModalForm").submit(function(event){
     // Prevent default posting of form - put here to work in case of errors
     event.preventDefault();

     // Abort any pending request
     if (request) {
         request.abort();
     }
     // setup some local variables
     var $form = $(this);
 
     // Let's select and cache all the fields
     var $inputs = $form.find("input, select, button, textarea, date, checkbox");
     
     // Serialize the data in the form
     var serializedData = $form.serialize();
 
     // Let's disable the inputs for the duration of the Ajax request.
     // Note: we disable elements AFTER the form data has been serialized.
     // Disabled form elements will not be serialized.
     $inputs.prop("disabled", true);
 
     // Fire off the request to /form.php
     request = $.ajax({
         url: "controller/appointments.php",
         type: "post",
         data: serializedData
     });
 
     // Callback handler that will be called on success
     request.done(function (response, textStatus, jqXHR){
         // Log a message to the console
         console.log(response);
         var json_data = JSON.parse(response);
         console.log("Hooray, it worked!");
         console.log(json_data);
         
         if(json_data.status == "success"){
         $('#appointmentAlertModal').modal('show');
         $('#appointmentStatusMessage').html(json_data.status_message);
         
         }
         else if(json_data.status == "error")
         {
            $('#appointmentAlertModal').modal('show');
            $('#appointmentStatusMessage').html(json_data.status_message);
         }
         else if(json_data.status == "full"){
            $('#appointmentAlertModal').modal('show');
            $('#appointmentStatusMessage').html(json_data.status_message);
         }
         $('#timepicked').val("");
         $('#span_customersname').html(json_data.fname);
         $('#customer_fullname').val("");
         $('#customer_cellnum').val("");
         $('#reason_for_appointment').val("");
     });
 
     // Callback handler that will be called on failure
     request.fail(function (jqXHR, textStatus, errorThrown){
         // Log the error to the console
         console.error(
             "The following error occurred: "+
             textStatus, errorThrown
         );
     });
 
     // Callback handler that will be called regardless
     // if the request failed or succeeded
     request.always(function () {
         // Reenable the inputs
         $inputs.prop("disabled", false);
     });
});

//=== Appointment modal AJAX ===//

//=== Registration modal AJAX ===//

// Contact Us Send Email
// Variable to hold request
var request;
// Bind to the submit event of our form
$("#registrationModalForm").submit(function(event){
     // Prevent default posting of form - put here to work in case of errors
     event.preventDefault();

     // Abort any pending request
     if (request) {
         request.abort();
     }
     // setup some local variables
     var $form = $(this);
 
     // Let's select and cache all the fields
     var $inputs = $form.find("input, select, button, textarea, date, checkbox");
     
     // Serialize the data in the form
     var serializedData = $form.serialize();
 
     // Let's disable the inputs for the duration of the Ajax request.
     // Note: we disable elements AFTER the form data has been serialized.
     // Disabled form elements will not be serialized.
     $inputs.prop("disabled", true);
 
     // Fire off the request to /form.php
     request = $.ajax({
         url: "controller/registration.php",
         type: "post",
         data: serializedData
     });
 
     // Callback handler that will be called on success
     request.done(function (response, textStatus, jqXHR){
         // Log a message to the console
         console.log(response);
         var json_data = JSON.parse(response);
         console.log("Hooray, it worked!");
         console.log(json_data);
         
         if(json_data.status == "success"){
         $('#RegistrationAlertModal').modal('show');
         $('#appointmentStatusMessage').html(json_data.status_message);
         
         }
         else if(json_data.status == "error")
         {
            $('#RegistrationAlertModal').modal('show');
            $('#appointmentStatusMessage').html(json_data.status_message);
         }
         else if(json_data.status == "existing"){
           
            toastr.options.closeButton = true;
            toastr.warning(json_data.status_message, json_data.status);

            // $('#RegistrationAlertModal').modal('show');
            // $('#appointmentStatusMessage').html(json_data.status_message);
         }
         $('#timepicked').val("");
         $('#span_customersname').html(json_data.fname);
         $('#customer_fullname').val("");
         $('#customer_cellnum').val("");
         $('#reason_for_appointment').val("");
     });
 
     // Callback handler that will be called on failure
     request.fail(function (jqXHR, textStatus, errorThrown){
         // Log the error to the console
         console.error(
             "The following error occurred: "+
             textStatus, errorThrown
         );
     });
 
     // Callback handler that will be called regardless
     // if the request failed or succeeded
     request.always(function () {
         // Reenable the inputs
         $inputs.prop("disabled", false);
     });
});

//=== Registration modal AJAX ===//

// ===Verify custoner number AJAX===//

var request;
// Bind to the submit event of our form
$("#btnVerify").click(function(event){
     // Prevent default posting of form - put here to work in case of errors
     event.preventDefault();
     $("#btnVerify").hide();
     $("#btnVerifying").show();
     // Abort any pending request
     if (request) {
         request.abort();
     }
     // setup some local variables
     var $form = $("#appointmentModalForm");
 
     // Let's select and cache all the fields
     var $inputs = $form.find("input, select, button, textarea, date, checkbox");
     
     // Serialize the data in the form
     var serializedData = $form.serialize();
 
     // Let's disable the inputs for the duration of the Ajax request.
     // Note: we disable elements AFTER the form data has been serialized.
     // Disabled form elements will not be serialized.
     $inputs.prop("disabled", true);
 
     // Fire off the request to /form.php
     request = $.ajax({
         url: "controller/verifyCustomer.php",
         type: "post",
         data: serializedData
     });
 
     // Callback handler that will be called on success
     request.done(function (response, textStatus, jqXHR){
         // Log a message to the console
         console.log(response);
         var json_data = JSON.parse(response);
         console.log("Hooray, it worked!");
         console.log(json_data);
         
         if(json_data.status == "found"){
            $('#statusVerified').show();
            $('#btnVerify').hide();
            $("#btnVerifying").hide();
            $('#verifiedFullname').val(json_data.customer_name);
            $('#appointmentForm').show();
            
         }
         else if(json_data.status == "notfound")
         {
            $("#btnVerify").show();
            $("#btnVerifying").hide();
            toastr.options.closeButton = true;
            toastr.warning(json_data.status_message, json_data.status);
         }
         else if(json_data.status == "pending")
         {
            $("#btnVerify").show();
            $("#btnVerifying").hide();
            toastr.options.closeButton = true;
            toastr.warning(json_data.status_message, json_data.status);
         }
         
         $('#timepicked').val("");
         
         $('#customer_fullname').val("");
         $('#customer_cellnum').val("");
         $('#reason_for_appointment').val("");
     });
 
     // Callback handler that will be called on failure
     request.fail(function (jqXHR, textStatus, errorThrown){
         // Log the error to the console
         console.error(
             "The following error occurred: "+
             textStatus, errorThrown
         );
     });
 
     // Callback handler that will be called regardless
     // if the request failed or succeeded
     request.always(function () {
         // Reenable the inputs
         $inputs.prop("disabled", false);
     });
});

// ===Verify custoner number AJAX end===//

// ===Make Appointment AJAX===//

var request;
// Bind to the submit event of our form
$("#appointmentDetailsForm").submit(function(event){
     // Prevent default posting of form - put here to work in case of errors
     event.preventDefault();
     // Abort any pending request

     var customer_phone = $("#appointment_customer_phone").val();

     if (request) {
         request.abort();
     }
     // setup some local variables
     var $form = $(this);
 
     // Let's select and cache all the fields
     var $inputs = $form.find("input, select, button, textarea, date, checkbox");
     
     // Serialize the data in the form
     var serializedData = $form.serialize();
     serializedData = serializedData + "&appointment_customer_phone=" + customer_phone;

     // Let's disable the inputs for the duration of the Ajax request.
     // Note: we disable elements AFTER the form data has been serialized.
     // Disabled form elements will not be serialized.
     $inputs.prop("disabled", true);
 
     // Fire off the request to /form.php
     request = $.ajax({
         url: "controller/appointments.php",
         type: "post",
         data: serializedData
     });
 
     // Callback handler that will be called on success
     request.done(function (response, textStatus, jqXHR){
         // Log a message to the console
         console.log(response);
         var json_data = JSON.parse(response);
         console.log("Hooray, it worked!");
         console.log(json_data);
         
         if(json_data.status == "success"){
        $('#RegistrationAlertModal').modal('show');
         $('#appointmentStatusMessage').html(json_data.status_message);
         }
         else if(json_data.status == "full")
         {
            $('#RegistrationAlertModal').modal('show');
            $('#appointmentStatusMessage').html(json_data.status_message);
         }
         
         
         $('#timepicked').val("");
         $('#customer_fullname').val("");
         $('#reason_for_appointment').val("");
     });
 
     // Callback handler that will be called on failure
     request.fail(function (jqXHR, textStatus, errorThrown){
         // Log the error to the console
         console.error(
             "The following error occurred: "+
             textStatus, errorThrown
         );
     });
 
     // Callback handler that will be called regardless
     // if the request failed or succeeded
     request.always(function () {
         // Reenable the inputs
         $inputs.prop("disabled", false);
     });
});

// ===Make Appointment AJAX end===//


$(function () {
    // Slideshow 4
    $("#slider4").responsiveSlides({
        auto: true,
        pager: false,
        nav: true,
        speed: 900,
        namespace: "callbacks",
        before: function () {
            $('.events').append("<li>before event fired.</li>");
        },
        after: function () {
            $('.events').append("<li>after event fired.</li>");
        }
    });

});
$(document).ready(function () {
    $('.popup-with-zoom-anim').magnificPopup({
        type: 'inline',
        fixedContentPos: false,
        fixedBgPos: true,
        overflowY: 'auto',
        closeBtnInside: true,
        preloader: false,
        midClick: true,
        removalDelay: 300,
        mainClass: 'my-mfp-zoom-in'
    });

});
$('.portfolio').easyGallery();
$(document).ready(function () {
    $('#horizontalTab').easyResponsiveTabs({
        type: 'default', //Types: default, vertical, accordion           
        width: 'auto', //auto or any width like 600px
        fit: true // 100% fit in a container
    });
});
jQuery(document).ready(function ($) {
    $(".scroll").click(function (event) {
        event.preventDefault();
        $('html,body').animate({
            scrollTop: $(this.hash).offset().top
        }, 1000);
    });
});
$(document).ready(function () {
    var defaults = {
    containerID: 'toTop', // fading element id
    containerHoverID: 'toTopHover', // fading element hover id
    scrollSpeed: 1200,
    easingType: 'linear' 
    };
    
    $().UItoTop({
        easingType: 'easeOutQuart'
    });
});



$('#appointment_modal_CellNumber').focusout(()=>{
    $('#appointment_modal_CellNumber').val(Repelace_63Number($('#appointment_modal_CellNumber').val()));
    // if(){

    // }
})

$("#appointment_modal_CellNumber").keypress(function(e) {
    var allowed_Letters = /^[0-9]*$/;
    if (e.which !== 0) {
      if( !String.fromCharCode(e.which).match(allowed_Letters)){
        return false;
      }
    }
   });


$('#btnMakeAppointment').click(function(){
    $('#makeAppointment-modal').modal('show');
    $('#registration-modal').modal('hide');
});

$('#btnRegistration').click(function(){
    $('#makeAppointment-modal').modal('hide');
    $('#registration-modal').modal('show');
});



$("#customer_RegistrationCellphone").keypress(function(e) {
    var allowed_Letters = /^[0-9]*$/;
    if (e.which !== 0) {
      if( !String.fromCharCode(e.which).match(allowed_Letters)){
        return false;
      }
    }
   });
  
  
   $("#customer_RegistrationCellphone").focusout(function() {
    $('#customer_RegistrationCellphone').val(Repelace_63Number($('#customer_RegistrationCellphone').val()));
    // alert(CheckNumber_valid_($('#CRF_Cell').val()));
   });