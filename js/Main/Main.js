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



function ClearAppointmentModalEntries(){
  $('#make_appointment_modal_Entries').find('input:text,input[type=date], select').val('');
  $('#make_appointment_modal_Entries').find('input:text,input[type=date], select').css("borderColor", "#ccc");
  $('#make_appointment_modal_Entries').find('input:checkbox').prop('checked', false); 
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

$(document).on('click','#make_appointment_modal_SubmitAppointment',()=>{
    alert("Submit here");
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