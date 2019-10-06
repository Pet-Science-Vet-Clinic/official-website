var myIndex = 0;
carousel();
function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}
    x[myIndex-1].style.display = "block";
    setTimeout(carousel, 4000);
}



// necessary trapping functions
function ReplaceMultipleWhitespace(str){
    return str.replace(/  +/g, ' ');
}
function toTitleCase(str) {
    return str.replace(/\b\S */g, function(txt){
        return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
    });
}
function CheckCharacters_Name(Name){
    var allowed_Letters = /^[a-z A-Z .-]*$/;
    if(!Name.match(allowed_Letters)){
        return true;
    }else{
        return false;
    }
}
function CheckifAllWhitespace(input){
    if(input.length > 0 && $.trim(input) == '' || input == ""){
        return true;
    }else{
        return false;
    }
}
function ValidateDate_isValidDate_Date(dateString) {
    var regEx = /^\d{4}-\d{2}-\d{2}$/;
    if(!dateString.match(regEx)) return false;  // Invalid format
    var d = new Date(dateString);
    var dNum = d.getTime();
    if(!dNum && dNum !== 0) return false; // NaN value, Invalid date
    return d.toISOString().slice(0,10) === dateString;
  }

  function ConvertDate_Words(ProperDate){
    try{
        
        var callbackDate = ""; 
        var newDate = new Date(ProperDate); day = newDate.getDate(); month = newDate.getMonth() + 1; year = newDate.getFullYear();
    
        callbackDate = getMonthInWords(newDate.getMonth())+" "+newDate.getDate()+", "+newDate.getFullYear();
    
   
        return callbackDate;
    }catch(err){
       return "";
    }
    
  }

  



function ClearAppointmentModalEntries(){
  $('#make_appointment_modal_Entries').find('input:text,input[type=date], select').val('');
  $('#make_appointment_modal_Entries').find('input:text,input[type=date], select').css("borderColor", "#ccc");
  $('#make_appointment_modal_Entries').find('input:checkbox').prop('checked', false); 
}   

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



// CLICK FUNCTIONS HERE ===========================================================================

$(document).on('click','#about_us_btn',()=>{
 $('#about_us_modal').css('display','block');
});

$(document).on('click','#close_btn_about_us',()=>{
    $('#about_us_modal').css('display','none');
});

$(document).on('click','#make_appointment',()=>{
    $('#make_appointment_modal').css('display','block');
});

$(document).on('click','#close_btn_make_appointment',()=>{
    ClearAppointmentModalEntries();
    $('#make_appointment_modal').css('display','none');
});

$(document).on('click','#available_timeBlockA',()=>{
    $('#make_appointment_modal').css('display','block');
});

$(document).on('click','#register_modal',()=>{
    $('#register_new_customer').css('display','block');
});

$(document).on('click','#close_btn_new_customer',()=>{
    ClearAppointmentModalEntries();
    $('#register_new_customer').css('display','none');
});


// keypress functions =========================================================================================
$("#appointment_modal_Fullname").keypress((e)=> {
    var allowed_Letters = /^[a-z A-Z .-]*$/;
    if (e.which !== 0) {
      if( !String.fromCharCode(e.which).match(allowed_Letters)){
        return false;
      }
    }
   });

$("#appointment_modal_CellNumber").keypress((e)=> {
    var allowed_Letters = /^[0-9+]*$/;
    if (e.which !== 0) {
      if( !String.fromCharCode(e.which).match(allowed_Letters)){
        return false;
      }
    }
   });


// keyup FUNCTIONS ============================================================================================
$('#appointment_modal_Fullname').keyup(function(){
    $('#appointment_modal_Fullname').val(toTitleCase($('#appointment_modal_Fullname').val()));
     $('#appointment_modal_Fullname').val(ReplaceMultipleWhitespace($('#appointment_modal_Fullname').val()));
  });


// Checkbox limit ==================================
// var limit = 3;
// $('input.single-checkbox').on('change', function(evt) {
//    if($(this).siblings(':checked').length >= limit) {
//        this.checked = false;
//    }
// });

$('input[type=checkbox]').on('change', function (e) {
    if ($('input[type=checkbox]:checked').length > 3) {
        $(this).prop('checked', false);
        alert("Maximum of 3 services only");
    }
});


//CP Trap===============================================================

   $("#appointment_modal_CellNumber").focusout(function() {
    $('#appointment_modal_CellNumber').val(Repelace_63Number($('#appointment_modal_CellNumber').val()));
    // alert(CheckNumber_valid_($('#CRF_Cell').val()));
   });
  

   var prevScrollpos = window.pageYOffset;
   window.onscroll = function() {
   var currentScrollPos = window.pageYOffset;
     if (prevScrollpos > currentScrollPos) {
       document.getElementById("navbar").style.top = "0";
     } else {
       document.getElementById("navbar").style.top = "-130px";
     }
     prevScrollpos = currentScrollPos;
   }


   