function showFunction() {
    // Get the checkbox
    var checkBox = document.getElementById("toggle-show");
    // Get the output text
    var element1 = document.getElementById("hidden-title");
    var element1 = document.getElementById("hidden-title");
    var element2 = document.getElementById("hidden-gender");
    var element3 = document.getElementById("hidden-species");
    var element4 = document.getElementById("hidden-breed");
    var element5 = document.getElementById("hidden=DOB");
    var element11 = document.getElementById("hidden-pets-name");
    
    
    var element6 = document.getElementById("hidden-header");
    var element7 = document.getElementById("hidden-fullname");
    var element8 = document.getElementById("hidden-celnum");
    var element9 = document.getElementById("hidden-cusgender");
    var element10 = document.getElementById("hidden-phonenum");
    var element12 = document.getElementById("hidden-email");
    var element13 = document.getElementById("hidden-address");
    // If the checkbox is checked, display the output text
    if (checkBox.checked == true){
      element1.style.display = "block";
      element2.style.display = "block";
      element3.style.display = "block";
      element4.style.display = "block";
      element5.style.display = "block";
      element11.style.display = "block";

      element6.style.display = "block";
      element7.style.display = "block";
      element8.style.display = "block";
      element9.style.display = "block";
      element10.style.display = "block";
      element12.style.display = "block";
      element13.style.display = "block";
    } else {
        element1.style.display = "none";
        element2.style.display = "none";
        element3.style.display = "none";
        element4.style.display = "none";
        element5.style.display = "none";
        element11.style.display = "none";
        
        element6.style.display = "none";
        element7.style.display = "none";
        element8.style.display = "none";
        element9.style.display = "none";
        element10.style.display = "none";
        element12.style.display = "none";
        element13.style.display = "none";
    }
  } 

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
         console.log("Hooray, it worked!");
         console.log(response);
         $('#contactUsAlertModal').modal('show');
         $('#contact_fname').val("");
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

  
  $(document).ready(function(){
    $('#toggle-show').click(function(){
    if (this.checked) {
    
    $("#appointment_modal_Fullname").attr("disabled", true);
    $("#appointment_modal_CellNumber").attr("disabled", true);
    $("#appointment_modal_petsname").attr("disabled", true);
    $("#appointment_modal_petsname").value(" ");
    $("#appointment_modal_CellNumber").value(" ");
    }
    else {
        $('#appointment_modal_Fullname').removeAttr("disabled");
        $('#appointment_modal_CellNumber').removeAttr("disabled");
        $('#appointment_modal_petsname').removeAttr("disabled");
    }
    });
});


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