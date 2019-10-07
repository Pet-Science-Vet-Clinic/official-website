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