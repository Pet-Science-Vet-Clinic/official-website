


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
        return str = `63${str}`;
    }else{
        if(str.charAt(0) == "6" && str.charAt(1) == "3"){
            str = str.substr(0);
            str = str.substr(1);
            return str = `6${str}`;
        }else{
            return str;
        }
    }
}

function getMonthInWords(MonthInput){
    var month = new Array();
        month[0] = "January";
        month[1] = "February";
        month[2] = "March";
        month[3] = "April";
        month[4] = "May";
        month[5] = "June";
        month[6] = "July";
        month[7] = "August";
        month[8] = "September";
        month[9] = "October";
        month[10] = "November";
        month[11] = "December";
        return month[MonthInput];
}

function ConvertDate_Words(ProperDate){
        var callbackDate = ""; 
        var newDate = new Date(ProperDate); day = newDate.getDate(); month = newDate.getMonth() + 1; year = newDate.getFullYear();
    
        callbackDate = getMonthInWords(newDate.getMonth())+" "+newDate.getDate()+", "+newDate.getFullYear();
    
        return callbackDate;
  }


function ticker(){
    $('#buttontick').checkboxMaster('input[name=showhiddenfields]');
  }
$.fn.checkboxMaster = function(list) {

    return this.on('click', function() {
        $(list).prop('checked', $(this).prop('checked'));
    });

}

console.log(ValidateDate_LessThanToday_2("2019-12-12"));


function ValidateDate_LessThanToday_2(dateString){
    var todayDate = new Date();
    dateString_2 = new Date(dateString);

    var date_Converted = dateString_2.getFullYear() + '-' + ('0' + (dateString_2.getMonth() + 1)).slice(-2) + '-' + ('0' + dateString_2.getDate()).slice(-2);
    var Today_Converted = todayDate.getFullYear() + '-' + ('0' + (todayDate.getMonth() + 1)).slice(-2) + '-' + ('0' + todayDate.getDate()).slice(-2);

    if(date_Converted == Today_Converted){
        return false;
    }else{

         var difference = dateString_2.getFullYear() - todayDate.getFullYear();
        //  alert(difference);

        if(dateString_2 < todayDate){
            return true;
        }else if(difference >= 5){
            return true;
        }else{
            return false;
        }
        
    }

}





$('#appointment_modal_Date').change(function()
{
    if(ValidateDate_LessThanToday_2($('#appointment_modal_Date').val()))
    {
        $('#btnSubmitAppointment').attr('disabled','disabled');
        toastr.options.closeButton = true;
        toastr.options.preventDuplicates= true;
        toastr.warning("The time you selected is not valid. Please do not select previous days.","Invalid Date");

    }
    else if($('#appointment_modal_Date').val() == "")
    {
        $('#btnSubmitAppointment').attr('disabled','disabled');
        toastr.options.closeButton = true;
        toastr.options.preventDuplicates= true;
        toastr.warning("The time you selected is not valid. Please select a day.","No date selected");

    }
    else
    {
        toastr.options.closeButton = true;
        toastr.options.preventDuplicates= true;
        toastr.success("Available!","Selected Day available.");
        $('#btnSubmitAppointment').removeAttr('disabled');
    }



});

$('#btnSubmitAppointment').click(function(){
    var bool = new Boolean(false);
    if(ValidateDate_LessThanToday_2($('#appointment_modal_Date').val()))
    {
        toastr.options.closeButton = true;
        toastr.options.preventDuplicates= true;
        toastr.warning("The time you selected is not valid. Please do not select previous days.","Invalid Date");
    }
    // else
    // {
    
    //     toastr.options.closeButton = true;
    //     toastr.options.preventDuplicates= true;
    //     toastr.success("Available!","Selected Day available.");
        
    // }



});


//====== AJAX START====//

$("#btnVerify").click(function()
   {

    $('#appointment_customer_phone').val(Repelace_63Number($('#appointment_customer_phone').val()));
    
   });
   
  
   $("#customer_RegistrationCellphone").focusout(function()
    {
    $('#customer_RegistrationCellphone').val(Repelace_63Number($('#customer_RegistrationCellphone').val()));
    // alert(CheckNumber_valid_($('#CRF_Cell').val()));
   });

  

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

$("#btnVerify").click(function()
   {

    $('#appointment_customer_phone').val(Repelace_63Number($('#appointment_customer_phone').val()));
    
   });

//=== Appointment modal AJAX ===//

// Variable to hold request
var request;
// Bind to the submit event of our form
$("#btnSubmitAppointment").click(function(event){
    
     // Prevent default posting of form - put here to work in case of errors
     event.preventDefault();
     var appNumb = $("#appointment_customer_phone").val();
     var date2words = ConvertDate_Words($("#appointment_modal_Date").val());
    $('#btnSubmitAppointment').hide();
    $('#btnSubmittingAppointment').show();
    
     // Abort any pending request
     if (request)
      {
         request.abort();
     }
     if($('#appointment_modal_Date').val()== "")
     {
         $('#btnSubmitAppointment').show();
         $('#btnSubmittingAppointment').hide();
         toastr.options.closeButton = true;
         toastr.options.preventDuplicates= true;
         toastr.warning("No date selected","Please choose a date.");
         return true;
     }
     else if($('#appointment_modal_TimeBlock').val()== "")
        {
            $('#btnSubmitAppointment').show();
            $('#btnSubmittingAppointment').hide();
            toastr.options.closeButton = true;
            toastr.options.preventDuplicates= true;
            toastr.warning("Invalid Time block","Please choose a time block.");
            return true;
        }
     else if($('#appointment_modal_AppointmentType').val()== "")
        {
            $('#btnSubmitAppointment').show();
            $('#btnSubmittingAppointment').hide();
            toastr.options.closeButton = true;
            toastr.options.preventDuplicates= true;
            toastr.warning("Invalid Service type","Please choose what service you want to make with the clinic.");
            return true;
        }
        
        
       
     // setup some local variables
     var $form = $("#appointmentDetailsForm");
 
     // Let's select and cache all the fields
     var $inputs = $form.find("input, select, button, textarea, date, checkbox");
     
     // Serialize the data in the form
     var serializedData = $form.serialize()+"&appNumb="+appNumb+"&date2words="+date2words;
 
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
     request.done(function (response, textStatus, jqXHR)
     {
         // Log a message to the console
         console.log(response);
         var json_data = JSON.parse(response);
         console.log("Hooray, it worked!");
         console.log(json_data);
         
         if(json_data.status == "success"){
            toastr.options.closeButton = true;
            toastr.options.preventDuplicates= true;
            toastr.success(json_data.status_head, json_data.status_message);
            // $('#btnSubmitAppointment').show();
            // $('#btnCloseModal').show();
            
         }
         else if(json_data.status == "error")
         {
            toastr.options.closeButton = true;
            toastr.options.preventDuplicates= true;
            toastr.error(json_data.status_head, json_data.status_message);
         }
         else if(json_data.status == "full")
         {
            toastr.options.closeButton = true;
            toastr.options.preventDuplicates= true;
            toastr.warning(json_data.status_head, json_data.status_message);
         }
         else if(json_data.status == "block")
         {
            toastr.options.closeButton = true;
            toastr.options.preventDuplicates= true;
            toastr.info(json_data.status_head, json_data.status_message);
            // $('#appointmentAlertModal').modal('show');
            // $('#appointmentStatusMessage').html(json_data.status_header,json_data.status_message);
         }
         else if(json_data.status == "max")
         {
            toastr.options.closeButton = true;
            toastr.options.preventDuplicates= true;
            toastr.info(json_data.status_head, json_data.status_message);
            
         }
         else if(json_data.status == "Late")
         {
            toastr.options.closeButton = true;
            toastr.options.preventDuplicates= true;
            toastr.info(json_data.status_head, json_data.status_message);
            // $('#appointmentAlertModal').modal('show');
            // $('#appointmentStatusMessage').html(json_data.status_header,json_data.status_message);
         }
         else
         {
            toastr.options.closeButton = true;
            toastr.options.preventDuplicates= true;
            toastr.info("Thank you!", "Thank you!");
         }
         $('#btnSubmitAppointment').show();
    $('#btnSubmittingAppointment').hide();
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
$("#make_appointment_modal_SubmitAppointment").click(function(event){
     // Prevent default posting of form - put here to work in case of errors
     event.preventDefault();
     var help = $('#customer_RegistrationCellphone').val();
     var n = help.startsWith("639");

     // Abort any pending request
     if (request) {
         request.abort();
     }
     
     if($('#customer_RegistrationFullname').val()== "")
     {
        toastr.options.closeButton = true;
        toastr.options.preventDuplicates= true;
        toastr.warning("Fullname field empty","Please enter your fullname in the textfield provided.");
        return true;
     }
     else if($('#customer_RegistrationAddress').val()== "")
     {
        toastr.options.closeButton = true;
        toastr.options.preventDuplicates= true;
        toastr.warning("Address field empty","Please enter your address in the textfield provided.");
        return true;
     }
     else if($('#customer_RegistrationEmail').val()== "")
     {
        toastr.options.closeButton = true;
        toastr.options.preventDuplicates= true;
        toastr.warning("E-mail field empty","Please enter your E-mail in the textfield provided.");
        return true;
     }
     else if($('#customer_RegistrationCellphone').val()== "")
     {
        toastr.options.closeButton = true;
        toastr.options.preventDuplicates= true;
        toastr.warning("Mobile Number field empty","Please enter your Mobile number in the textfield provided.");
        return true;
     }
     else if(help.length <= 10)
     {
        toastr.options.closeButton = true;
        toastr.options.preventDuplicates= true;
        toastr.warning("Mobile Number incomplete","The mobile number you provided is incomplete.");
        return true;
     }
     else if(n == false)
     {
        toastr.options.closeButton = true;
        toastr.options.preventDuplicates= true;
        toastr.warning("Mobile Number not valid","The mobile number you provided is not a local mobile number.");
        
        return true;
     }
     else if(n == true)
     {
        $("#btnSubmittingAppointments").show();
        $("#make_appointment_modal_SubmitAppointment").hide();
     }
    
     // setup some local variables
     var $form = $("#registrationModalForm");
 
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
     request.done(function (response, textStatus, jqXHR)
     {
         // Log a message to the console
         console.log(response);
         var json_data = JSON.parse(response);
         console.log("Hooray, it worked!");
         console.log(json_data);
         
            if(json_data.status == "success")
            {
                $("#btnSubmittingAppointments").hide();
                $("#make_appointment_modal_SubmitAppointment").show();
                toastr.options.closeButton = true;
                toastr.options.preventDuplicates= true;
                toastr.success(json_data.status_message, json_data.status_header);
                $('#customer_RegistrationFullname').val("");
                $('#customer_RegistrationAddress').val("");
                $('#customer_RegistrationEmail').val("");
                $('#customer_RegistrationCellphone').val("");
                $('#customer_RegistrationTelephone').val("");
                $('#customer_RegistrationOptional').val("");
            }
            else if(json_data.status == "error")
            {
                $('#RegistrationAlertModal').modal('show');
                $('#appointmentStatusMessage').html(json_data.status_message);
                $("#btnSubmittingAppointments").hide();
                $("#make_appointment_modal_SubmitAppointment").show();
            }
            else if(json_data.status == "existing"){
            
                toastr.options.closeButton = true;
                toastr.options.preventDuplicates= true;
                toastr.warning(json_data.status_message, json_data.status_header);
                $("#btnSubmittingAppointments").hide();
                $("#make_appointment_modal_SubmitAppointment").show();
                // $('#RegistrationAlertModal').modal('show');
                // $('#appointmentStatusMessage').html(json_data.status_message);
            }
            else if(json_data.status == "existingName"){
            
                toastr.options.closeButton = true;
                toastr.options.preventDuplicates= true;
                toastr.warning(json_data.status_message, json_data.status_header);
                $("#btnSubmittingAppointments").hide();
                $("#make_appointment_modal_SubmitAppointment").show();
                // $('#RegistrationAlertModal').modal('show');
                // $('#appointmentStatusMessage').html(json_data.status_message);
            }
            else if(json_data.status == "existingPhone"){
            
                toastr.options.closeButton = true;
                toastr.options.preventDuplicates= true;
                toastr.warning(json_data.status_message, json_data.status_header);
                $("#btnSubmittingAppointments").hide();
                $("#make_appointment_modal_SubmitAppointment").show();
                // $('#RegistrationAlertModal').modal('show');
                // $('#appointmentStatusMessage').html(json_data.status_message);
            }
               
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


var request;
// Bind to the submit event of our form

$("#btnMakeAppointment").click(function()
{
    $('#makeAppointment-modal').modal({
        backdrop: "static",
        keyboard: false
    });

});
$("#buttontick").click(function()
{
    $('#registration-modal').modal({
        backdrop: "static",
        keyboard: false
    });

});
$("#btnAppStatus").click(function()
{
    $('#appStatusModal').modal({
        backdrop: "static",
        keyboard: false
    });

});

$("#btnCloseModal").click(function()
{
    $('#makeAppointment-modal').find('input:text, input[type=date]').val('');
});

$("#btnCloseModalMakeApp").click(function()
{
    $('#makeAppointment-modal').find('input:text, input[type=date]').val('');
    $("#appointmentForm").hide();
    $("#statusVerified").hide();
    $("#btnVerify").show();
    
});

$("#btnCloseModalAppStatus").click(function()
{
    $('#appStatusModal').find('input:text').val('');
});
$("#buttonclosemodal").click(function()
{
    $('#registration-modal').find('input:text, input[type=date]').val('');
});


// ===Verify custoner number AJAX===//


var request;
// Bind to the submit event of our form
$("#btnVerify").click(function(event){
     // Prevent default posting of form - put here to work in case of errors
     event.preventDefault();
     if($('#appointment_customer_phone').val()== "")
     {
         toastr.options.closeButton = true;
         toastr.options.preventDuplicates= true;
         toastr.warning("Number field empty","Please enter your phone number in the textfield.");
         return true;
         
     }
     
     $("#btnVerify").hide();
     $("#btnVerifying").show();
     $("#btnCloseModal").hide();
    //  $('#makeAppointment-modal').modal({
    //     backdrop: false
    // });
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
            $("#btnCloseModal").show();
            $('#AppstatusVerified').attr('disabled','disabled');
         }
         else if(json_data.status == "notfound")
         {
            $("#btnVerify").show();
            $("#btnVerifying").hide();
            toastr.options.closeButton = true;
            toastr.options.preventDuplicates= true;
            toastr.warning(json_data.status_message, json_data.status_header);
         }
         else if(json_data.status == "pending")
         {
            $("#btnVerify").show();
            $("#btnVerifying").hide();
            toastr.options.closeButton = true;
            toastr.options.preventDuplicates= true;
            toastr.warning(json_data.status_message, json_data.status_header);
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

// ===Verify customer number AJAX end===//

$(document).on('click','#appIDtoCancel', function(){
    var IDNumber = $(this).attr('value');
    // alert("this is ID number of clicked button"+ IDNumber);
    $('#appIDTextView').val(IDNumber);
    
});

$('#btnCancelThisAppointmentNo').click(function(){
    $('#AppointmentCancelAlert').modal('hide'); 
});




$('#btnCloseStatModal').click(function(){
    $('#appStatusModal').modal('hide');
    var Table = document.getElementById("displayStatsHere");
    Table.innerHTML = "";
    $('#appointmentStat').hide();
    $('#btnVerifyStatus').show();
    $('#btnVerifyStatus').removeAttr('disabled');
    $('#appointmentStatus_customer_phone').removeAttr('disabled');
    $('#appointmentStatus_customer_phone').val("");
    $("#btnCloseModalAppStatus").show();
    $('#AppstatusVerified').hide();
    
    // $("#displayStatsHere").remove();
    // $("displayStatsHere").closest('tr').remove();

});
   
 $(document).on('click','#btnCancelThisAppointmentYes', function(){
    $("#btnCancelling").show();
    $("#btnCancelThisAppointmentYes").hide();
    $("#btnCancelThisAppointmentNo").hide();
    var appID = $("#appIDTextView").val();
    var appNumb = $("#appointmentStatus_customer_phone").val();
     // Serialize the data in the form
     var serializedData = "appID="+appID+"&appNumb="+appNumb;
 
     // Let's disable the inputs for the duration of the Ajax request.
     // Note: we disable elements AFTER the form data has been serialized.
     // Disabled form elements will not be serialized.
   
 
     // Fire off the request to /form.php
     request = $.ajax({
         url: "controller/appointmentcancel.php",
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
            $("#btnCancelling").hide();
            $("#btnCancelThisAppointmentYes").show();
            $("#btnCancelThisAppointmentNo").show();
            var Table = document.getElementById("displayStatsHere");
            Table.innerHTML = "";
            $valuesz=1;
            for(var i = 0; i < json_data.appointments_data.length; i++) 
            {
                var table_R = $('<tr></tr>');
                var table_1=$('<td></td>').html(json_data.appointments_data[i].appointment_SystemID);
                var table_2=$('<td></td>').html(json_data.appointments_data[i].appointment_Date);
                var table_3=$('<td></td>').html(json_data.appointments_data[i].appointment_TimeSlot);
                var table_4=$('<td></td>').html(json_data.appointments_data[i].appointment_ReasonForAppointment);
                var table_Buttons=$('<td style="text-align: center;"><button value="'+json_data.appointments_data[i].appointment_SystemID+'" id="appIDtoCancel" type="button" data-toggle="modal" data-target="#AppointmentCancelAlert">Cancel</button> </td>');

                
                table_R.append(table_1,table_2,table_3,table_4,table_Buttons);
                $('#displayStatsHere').append(table_R);
            }
            $('#AppointmentCancelAlert').modal('hide'); 
            $('#appointmentStatus_customer_phone').attr('disabled','disabled');
         }
         else if(json_data.status == "failed")
         {
            $("#btnVerifyStatus").show();
            $("#btnVerifyingStatus").hide();
            toastr.options.closeButton = true;
            toastr.options.preventDuplicates= true;
            toastr.warning(json_data.status_message, json_data.status);
         }
         else 
         {
            $("#btnVerifyStatus").show();
            $("#btnVerifyingStatus").hide();
            toastr.options.closeButton = true;
            toastr.options.preventDuplicates= true;
            toastr.error("An error has occured", "Unknown error! Please contact developer now.");
         }
         
     });
 
     // Callback handler that will be called on failure
     request.fail(function (jqXHR, textStatus, errorThrown){
         // Log the error to the console
         console.error(
             "The following error occurred: "+
             textStatus, errorThrown
         );
     });
   
});






//=== Appointment status AJAX Start ===//

var request;
// Bind to the submit event of our form
$("#btnVerifyStatus").click(function(event){
     // Prevent default posting of form - put here to work in case of errors
     event.preventDefault();
     $('#appointmentStatus_customer_phone').val(Repelace_63Number($('#appointmentStatus_customer_phone').val()));

     if($('#appointmentStatus_customer_phone').val()== "")
     {
         toastr.options.closeButton = true;
         toastr.options.preventDuplicates= true;
         toastr.warning("Number field empty","Please enter your phone number in the textfield.");
         return true;
     }
     $("#btnVerifyStatus").hide();
     $("#btnVerifyingStatus").show();
     $("#btnCloseModalAppStatus").hide();
    
     // Abort any pending request
     if (request) {
         request.abort();
     }
     
     
     // setup some local variables
     var $form = $("#appStatusVerify");
 
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
         url: "controller/appointmentstatus.php",
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
            $valuesz=1;
                    for(var i = 0; i < json_data.appointments_data.length; i++) 
                    {
                        var table_R = $('<tr></tr>');
                        var table_1=$('<td></td>').html(json_data.appointments_data[i].appointment_SystemID);
                        var table_2=$('<td></td>').html(json_data.appointments_data[i].appointment_Date);
                        var table_3=$('<td></td>').html(json_data.appointments_data[i].appointment_TimeSlot);
                        var table_4=$('<td></td>').html(json_data.appointments_data[i].appointment_ReasonForAppointment);
                        var table_Buttons=$('<td style="text-align: center;"><button value="'+json_data.appointments_data[i].appointment_SystemID+'" id="appIDtoCancel" type="button" data-toggle="modal" data-target="#AppointmentCancelAlert">Cancel</button> </td>');

                        
                        table_R.append(table_1,table_2,table_3,table_4,table_Buttons);
                        $('#displayStatsHere').append(table_R);

                       
                    //    $appDate= json_data.appointments_data[i]["appointment_Date"];
                    //    $appTimeSlot= json_data.appointments_data[i]["appointment_TimeSlot"];
                    //    $appReason= json_data.appointments_data[i]["appointment_ReasonForAppointment"];

                    //     var $row = $('<tr>'+
                    //     '<td>'+$appID+'</td>'+
                    //     '<td>'+$appDate+'</td>'+
                    //     '<td>'+$appTimeSlot+'</td>'+
                    //     '<td>'+$appReason+'</td>'+
                    //     '<td>'+ '<button id="btnAppCancel" value="$appID">Cancel</button>' +'</td>'+
                    //     '</tr>'); 
                    //     $('#displayStatsHere').append($row);
                     }
                
            // console.log(json_data.appointments_data);
            // console.log("Hi!");
            $('#AppstatusVerified').show();
            $('#AppstatusVerified').attr('disabled','disabled');
            $('#btnVerifyStatus').hide();
            $("#btnVerifyingStatus").hide();
            $('#appointmentStat').show();
            $("#btnCloseModalAppStatus").hide();
            
         }
         else if(json_data.status == "notfound")
         {
            $("#btnVerifyStatus").show();
            $("#btnVerifyingStatus").hide();
            toastr.options.closeButton = true;
            toastr.options.preventDuplicates= true;
            toastr.warning(json_data.status_message, json_data.status);
            $("#btnCloseModalAppStatus").show();
         }
         else if(json_data.status == "pending")
         {
            $("#btnVerifyStatus").show();
            $("#btnVerifyingStatus").hide();
            toastr.options.closeButton = true;
            toastr.options.preventDuplicates= true;
            toastr.warning(json_data.status_message, json_data.status);
            $("#btnCloseModalAppStatus").show();
         }
         
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

//== Appointment status AJAX End ===//


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
            toastr.options.closeButton = true;
            toastr.options.preventDuplicates= true;
            toastr.warning(json_data.status_message, json_data.status_header);
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
// jQuery(document).ready(function ($) {
//     $(".scroll").click(function (event) {
//         event.preventDefault();
//         $('html,body').animate({
//             scrollTop: $(this.hash).offset().top
//         }, 1000);
//     });
// });
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
    $('#registration-appointment_customer_phone').val("");
    
});



$("#customer_RegistrationCellphone").keypress(function(e) {
    var allowed_Letters = /^[0-9]*$/;
    if (e.which !== 0) {
      if( !String.fromCharCode(e.which).match(allowed_Letters)){
        return false;
      }
    }
   });

   $('#customer_RegistrationCellphone').focusout(()=>{
    $('#customer_RegistrationCellphone').val(Repelace_63Number($('#customer_RegistrationCellphone').val()));

})

   $("#appointment_customer_phone").keypress(function(e) {
    var allowed_Letters = /^[0-9]*$/;
    if (e.which !== 0) {
      if( !String.fromCharCode(e.which).match(allowed_Letters)){
        return false;
      }
    }
   });
   
   $('#appointment_customer_phone').focusout(()=>{
    $('#appointment_customer_phone').val(Repelace_63Number($('#appointment_customer_phone').val()));

})
$('#customer_RegistrationOptional').focusout(()=>{
    $('#customer_RegistrationOptional').val(Repelace_63Number($('#customer_RegistrationOptional').val()));

})



   $("#appointmentStatus_customer_phone").keypress(function(e) {
    var allowed_Letters = /^[0-9]*$/;
    if (e.which !== 0) {
      if( !String.fromCharCode(e.which).match(allowed_Letters)){
        return false;
      }
    }
   });
   
   $("#customer_RegistrationFullname").keypress(function(e) {
    var allowed_Letters = /^[a-z A-Z .-]*$/;
    if (e.which !== 0) {
      if( !String.fromCharCode(e.which).match(allowed_Letters)){
        return false;
      }
    }
   });

   $("#contact_fname").keypress(function(e) {
    var allowed_Letters = /^[a-z A-Z .-]*$/;
    if (e.which !== 0) {
      if( !String.fromCharCode(e.which).match(allowed_Letters)){
        return false;
      }
    }
   });
   

   $("#customer_RegistrationTelephone").keypress(function(e) {
    var allowed_Letters = /^[0-9]*$/;
    if (e.which !== 0) {
      if( !String.fromCharCode(e.which).match(allowed_Letters)){
        return false;
      }
    }
   });

   $("#customer_RegistrationOptional").keypress(function(e) {
    var allowed_Letters = /^[0-9]*$/;
    if (e.which !== 0) {
      if( !String.fromCharCode(e.which).match(allowed_Letters)){
        return false;
      }
    }
   });

   $("#contact_phone").keypress(function(e) {
    var allowed_Letters = /^[0-9]*$/;
    if (e.which !== 0) {
      if( !String.fromCharCode(e.which).match(allowed_Letters)){
        return false;
      }
    }
   });
   

