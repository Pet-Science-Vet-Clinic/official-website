function showFunction() {
    // Get the checkbox
    var checkBox = document.getElementById("toggle-show");
    // Get the output text
   
    
    var element6 = document.getElementById("hidden-header");
    var element7 = document.getElementById("hidden-fullname");
    var element8 = document.getElementById("hidden-celnum");
    var element9 = document.getElementById("hidden-faxnum");
    var element10 = document.getElementById("hidden-phonenum");
    var element12 = document.getElementById("hidden-email");
    var element13 = document.getElementById("hidden-address");
    var element14 = document.getElementById("hidden-celnum2");
    var element15 = document.getElementById("hidden-celnum3");

    var element16 = document.getElementById("appointment_modal_CellNumber");
    var element17 = document.getElementById("appointment_modal_Fullname");
    // If the checkbox is checked, display the output text
    if (checkBox.checked == true){
     
      element6.style.display = "block";
      element7.style.display = "block";
      element8.style.display = "block";
      element9.style.display = "block";
      element10.style.display = "block";
      element12.style.display = "block";
      element13.style.display = "block";
      element14.style.display = "block";
      element15.style.display = "block";

      element16.style.display ="none"; 
      element17.style.display ="none"; 
    } else {
       
        
        element6.style.display = "none";
        element7.style.display = "none";
        element8.style.display = "none";
        element9.style.display = "none";
        element10.style.display = "none";
        element12.style.display = "none";
        element13.style.display = "none";
        element14.style.display = "none";
        element15.style.display = "none";

        element16.style.display = "block";
        element17.style.display = "block";
        
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