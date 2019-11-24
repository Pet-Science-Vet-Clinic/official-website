

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
function ValidateDate_GreaterThanToday_2(dateString){
    var todayDate = new Date();
    dateString_2 = new Date(dateString);

    var date_Converted = dateString_2.getFullYear() + '-' + ('0' + (dateString_2.getMonth() + 1)).slice(-2) + '-' + ('0' + dateString_2.getDate()).slice(-2);
    var Today_Converted = todayDate.getFullYear() + '-' + ('0' + (todayDate.getMonth() + 1)).slice(-2) + '-' + ('0' + todayDate.getDate()).slice(-2);

    if(date_Converted == Today_Converted){
        return false;
    }else{

         var difference = dateString_2.getFullYear() + todayDate.getFullYear();
        //  alert(difference);

        if(dateString_2 > todayDate){
            return true;
        }else if(difference <= 20){
            return true;
        }else{
            return false;
        }
        
    }

}



$('#appointment_modal_Date').focusout(function()
{
    if(ValidateDate_LessThanToday_2($('#appointment_modal_Date').val()))
    {
        $('#btnSubmitAppointment').attr('disabled','disabled');
        toastr.options.closeButton = true;
        toastr.options.preventDuplicates= true;
        toastr.warning("The time you selected is not valid. Please do not select previous days.","Invalid Date");
        $("#btnSubmitAppointment").css("background","red");
        $(".btnSubmitting").on("mouseout",function(){$(".btnSubmitting").css("background","red")});
    }
    else
    {
        $('#btnSubmitAppointment').removeAttr('disabled');
        $("#btnSubmitAppointment").css("background","black");
        $(".btnSubmitting").on("mouseover",function(){$(".btnSubmitting").css("background","white")});
        $(".btnSubmitting").on("mouseout",function(){$(".btnSubmitting").css("background","black")});
    }
});


$('#btnSubmitAppointment').click(function(){
    if(ValidateDate_LessThanToday_2($('#appointment_modal_Date').val()))
    {
        
        toastr.options.closeButton = true;
        toastr.options.preventDuplicates= true;
        toastr.warning("The time you selected is not valid. Please do not select previous days.","Invalid Date");
        $('#btnSubmitAppointment').removeAttr('disabled');

    }
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

   function addIDval()
    {
    var value = parseInt(document.getElementById('numberzxc').value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('numberzxc').value = value;
    }
    
    function deleteRow(btn)
     {
        var row = btn.parentNode.parentNode;
        row.parentNode.removeChild(row);
      }
$("#make_appointment_add_Pet").click(function(heck)
    {
        if($('#pet_Name').val() == "")
        {
        toastr.options.closeButton = true;
         toastr.options.preventDuplicates= true;
         toastr.warning("You forgot to enter your pets name.");
        }
        else if($('#pet_Species').val() == "")
        {
        toastr.options.closeButton = true;
         toastr.options.preventDuplicates= true;
         toastr.warning("You forgot to select your pets specie.");
        }
        else if($('#pet_Breed').val() == "")
        {
        toastr.options.closeButton = true;
         toastr.options.preventDuplicates= true;
         toastr.warning("You forgot to enter your pets breed.");
        }
        else if($('#pet_Gender').val() == "")
        {
        toastr.options.closeButton = true;
         toastr.options.preventDuplicates= true;
         toastr.warning("You forgot to enter your pets gender.");
        }
        else if($('#pet_Birthdate').val() == "")
        {
        toastr.options.closeButton = true;
         toastr.options.preventDuplicates= true;
         toastr.warning("You forgot to enter your pets birthday.");
        }
        else if(ValidateDate_GreaterThanToday_2($('#pet_Birthdate').val()))
        {
        toastr.options.closeButton = true;
        toastr.options.preventDuplicates= true;
        toastr.warning("The birthdate you enter is invalid. Please do not enter future days.");
        }
        
        else
        {
        var $id = $('#numberzxc').val();
        var $petName = $('#pet_Name').val();
        var $petSpecie = $('#pet_Species').val();
        var $petGender = $('#pet_Gender').val();
        var $petBreed = $('#pet_Breed').val();
        var $petBirthdate = $('#pet_Birthdate').val();
        $("#pet_Entered").append(
            "<tr>" +
            // "<td>"+ $id +"</td>" +
              "<td>"+ $petName +"</td>" +
              "<td>"+ $petSpecie + "</td>" +
              "<td>"+ $petGender + "</td>" +
              "<td>"+ $petBreed + "</td>" +
              "<td>"+ $petBirthdate + "</td>" +
              "<td>"+ "<button onclick=" + "deleteRow(this)" + ">Remove</button>" + "</td>" +
            "</tr>"
        );

        $('#make_appointment_modal_SubmitAppointment').show();
        $("#pet_Species")[0].selectedIndex = 0;
            $("#pet_Gender")[0].selectedIndex = 0;
            $('#pet_Breed').val("");
            $('#pet_Name').val("");
        }
    });

   

//=== Appointment modal AJAX ===//

// Variable to hold request
var request;
// Bind to the submit event of our form
//submit appointment//
$("#btnSubmitAppointment").click(function(event){
    
     // Prevent default posting of form - put here to work in case of errors
     event.preventDefault();
     var appNumb = $("#appointment_customer_phone").val();
     var date2words = ConvertDate_Words($("#appointment_modal_Date").val());
     var choosenPet = $("#petpicked").val();
     var appService = $("#appointment_modal_AppointmentType").val();
     var appDate = $("#appointment_modal_Date").val();
    $('#btnSubmitAppointment').hide();
    $('#btnSubmittingAppointment').show();
    $('#buttonclosemodal').hide();
    $('#make_appointment_add_Pet').hide();
    
    
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
     else if($('#petpicked').val()== "")
        {
            $('#btnSubmitAppointment').show();
            $('#btnSubmittingAppointment').hide();
            toastr.options.closeButton = true;
            toastr.options.preventDuplicates= true;
            toastr.warning("Please select a pet","Please select which pet you want to bring in the clinic.");
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
        else if($('#appointment_modal_TimeBlock').val()== "")
        {
            $('#btnSubmitAppointment').show();
            $('#btnSubmittingAppointment').hide();
            toastr.options.closeButton = true;
            toastr.options.preventDuplicates= true;
            toastr.warning("No time block selected","Please choose a time block.");
            return true;
        }
        
     
        
        
       
     // setup some local variables
     var $form = $("#appointmentDetailsForm");
 
     // Let's select and cache all the fields
     var $inputs = $form.find("input, select, button, textarea, date, checkbox");
     
     // Serialize the data in the form
     var serializedData = $form.serialize()+"&appNumb="+appNumb+"&date2words="+date2words+"&choosenPet="+choosenPet+"&appService="+appService+"&appDate="+appDate;
       
 
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
         
         if(json_data.status == "success")
         {
             toastr.options.closeButton = true;
             toastr.options.preventDuplicates= true;
             toastr.success(json_data.status_message, json_data.status_header);
             $('#btnSubmitAppointment').show();
            $('#btnSubmittingAppointment').hide();
            $('#buttonclosemodal').show();
            $('#make_appointment_add_Pet').hide();
            var Table = document.getElementById("petTableList");
            Table.innerHTML = "";
            $('#appointmentForm').hide();
            $('#appointment_customer_phone').val("");
            $('#statusVerified').hide();
            $('#btnVerify').show();
         }
         else if(json_data.status == "error")
         {
            toastr.options.closeButton = true;
             toastr.options.preventDuplicates= true;
             toastr.success(json_data.status_message, json_data.status_header);
             $('#btnSubmitAppointment').show();
            $('#btnSubmittingAppointment').hide();
            $('#buttonclosemodal').show();
            $('#make_appointment_add_Pet').hide();

         }
         else if(json_data.status == "full")
         {
            
            toastr.options.closeButton = true;
             toastr.options.preventDuplicates= true;
             toastr.warning(json_data.status_message, json_data.status_header);
             $('#btnSubmitAppointment').show();
            $('#btnSubmittingAppointment').hide();
            $('#buttonclosemodal').show();
            $('#make_appointment_add_Pet').hide();
         }
         else if(json_data.status == "block")
         {
            toastr.options.closeButton = true;
             toastr.options.preventDuplicates= true;
             toastr.success(json_data.status_message, json_data.status_header);
             $('#btnSubmitAppointment').show();
            $('#btnSubmittingAppointment').hide();
            $('#buttonclosemodal').show();
            $('#make_appointment_add_Pet').hide();
         }
         else if(json_data.status == "max")
         {
            toastr.options.closeButton = true;
             toastr.options.preventDuplicates= true;
             toastr.warning(json_data.status_message, json_data.status_header);
             $('#btnSubmitAppointment').show();
            $('#btnSubmittingAppointment').hide();
            $('#buttonclosemodal').show();
            $('#make_appointment_add_Pet').hide();
         }
         else if(json_data.status == "late"){
            
            toastr.options.closeButton = true;
            toastr.options.preventDuplicates= true;
            toastr.warning(json_data.status_message, json_data.status_header);
            $('#btnSubmitAppointment').show();
            $('#btnSubmittingAppointment').hide();
            $('#buttonclosemodal').show();
            $('#make_appointment_add_Pet').hide();
        }
        else if(json_data.status == "wla")
         {
            toastr.options.closeButton = true;
            toastr.options.preventDuplicates= true;
            toastr.warning("wla ni sulod sa insert", "Wla nisulot sa insert");
            $('#btnSubmitAppointment').show();
            $('#btnSubmittingAppointment').hide();
            $('#buttonclosemodal').show();
            $('#make_appointment_add_Pet').hide();
         }
         else
         {
            toastr.options.closeButton = true;
            toastr.options.preventDuplicates= true;
            toastr.info("Thank you!", "Thank you!");
            $('#btnSubmitAppointment').show();
            $('#btnSubmittingAppointment').hide();
            $('#buttonclosemodal').show();
            $('#make_appointment_add_Pet').hide();
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
     var date2words = ConvertDate_Words($("#pet_Birthdate").val());
     var tableCount = $('#numberzxc').val();
  
  var TableData = new Array();


    var table = document.getElementById( "PetFollowUp_Table" );
    var tableArr = [];
    for ( var i = 1; i < table.rows.length; i++ ) {
        tableArr.push({
            Pet_Name: table.rows[i].cells[0].innerHTML,
            Specie: table.rows[i].cells[1].innerHTML,
            Gender: table.rows[i].cells[2].innerHTML,
            Breed: table.rows[i].cells[3].innerHTML,
            Birthday: table.rows[i].cells[4].innerHTML,
            Birthday2Words: ConvertDate_Words(table.rows[i].cells[4].innerHTML)
        });
            
    }
    
    
// alert(JSON.stringify(tableArr));

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
    //  if ($('#PetFollowUp_Table').length == 0) 
    //  {
    //     var tableCount = 0;
    // }
    if ($('#PetFollowUp_Table').length != 0)
    {
        
        for (var i = 0; i < $('PetFollowUp_Table').length; i++) {
            var tableCount = i;
         }
    }
    
     // setup some local variables
     var $form = $("#registrationModalForm");
 
     // Let's select and cache all the fields
     var $inputs = $form.find("input, select, button, textarea, date, checkbox");
     
     // Serialize the data in the form
     var serializedData = $form.serialize() +"&tableCount="+tableCount +"&date2words="+date2words+"&tableArr="+JSON.stringify(tableArr);
     
 
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
                var Table = document.getElementById("pet_Entered");
                Table.innerHTML = "";
                $('#pet_Name').val("");
                $('#pet_Breed').val("");
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
    $("#hideUponEntry").show();
    
    
});

$("#btnCloseModalAppStatus").click(function()
{
    $('#appStatusModal').find('input:text').val('');
    $('#appointmentStatus_customer_phone').removeAttr('disabled');

});
$("#buttonclosemodal").click(function()
{
    $('#registration-modal').find('input:text, input[type=date]').val('');
    var Table = document.getElementById("pet_Entered");
    Table.innerHTML = "";
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
            $("#appointment_modal_AppointmentType")[0].selectedIndex = 0;
            $("#appointment_modal_TimeBlock")[0].selectedIndex = 0;
            $("#hideUponEntry").hide();
            $valuesz=1;
            var x = document.getElementById("petpicked");
            while (x.length > 0) {
                x.remove(x.length-1);
            }
            $('#petpicked').append($('<option>', { 
                value: "",
                text : "Choose a pet" 
            }));
            for(var i = 0; i < json_data.numberofpets.length; i++) 
            {
                $pet_Name =json_data.numberofpets[i].pet_Name;
              
                var pet_ID = $pet_Name;
                var pet_Val= $pet_Name;
              
                
                $('#petpicked').append($('<option>', { 
                    value: pet_ID,
                    text : pet_Val 
                }));
             }
            

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
            toastr.warning(json_data.status_message, json_data.status_header);
         }
         else if(json_data.status == "passed")
         {
            $('#AppointmentCancelAlert').modal('hide'); 
            $('#appointmentStatus_customer_phone').attr('disabled','disabled');
            toastr.options.closeButton = true;
            toastr.options.preventDuplicates= true;
            toastr.warning(json_data.status_message, json_data.status_header);
            $("#btnCancelling").hide();
            $("#btnCancelThisAppointmentYes").show();
            $("#btnCancelThisAppointmentNo").show();
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
    
     console.log($('#appointmentStatus_customer_phone').val());
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
     $('#appointmentStatus_customer_phone').attr('disabled','disabled');
     
    
     // Abort any pending request
     if (request) {
         request.abort();
     }
     
     
     // Serialize the data in the form
     var serializedData ="appointmentStatus_customer_phone=" + $('#appointmentStatus_customer_phone').val();
 console.log(serializedData);
     // Let's disable the inputs for the duration of the Ajax request.
     // Note: we disable elements AFTER the form data has been serialized.
     // Disabled form elements will not be serialized.
    //  $inputs.prop("disabled", true);
 
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
            if(json_data.appointments_data.length == 0)
            {
             var tableBody = $("#appStatTable");
            var table_R =  $('<tr style="background-color: #dbd3d3;"></tr>');
            var table_1 = $('<td colspan="5"> No Data Available in table</td>');
  
            table_R.append(table_1);
            tableBody.append(table_R);
            }
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
            toastr.warning(json_data.status_message, json_data.status_header);
            $("#btnCloseModalAppStatus").show();
            $('#btnVerifyStatus').attr('disabled','disabled');
         }
         else if(json_data.status == "pending")
         {
            $("#btnVerifyStatus").show();
            $("#btnVerifyingStatus").hide();
            toastr.options.closeButton = true;
            toastr.options.preventDuplicates= true;
            toastr.warning(json_data.status_message, json_data.status_header);
            $("#btnCloseModalAppStatus").show();
            $('#btnVerifyStatus').attr('disabled','disabled');
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
        //  $inputs.prop("disabled", false);
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

$('#pet_Birthdate').focusout((duplicate)=>{
var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();

today = yyyy + '-' + mm + '-' + dd;
    if($('#registration-pet_Birthdate').val() == today)
    {
        toastr.options.closeButton = true;
        toastr.options.preventDuplicates= true;
        toastr.warning("Your pet must be atleast 1 (one) day old to be registered");
        return true;
    }


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

// $("#appointment_modal_AppointmentType").on("change", function(){
//     var v = $(this).val();
//      if(v=="Boarding")
//     {
//         $("#hiddenDate").show();
//         document.getElementById("appointment_modal_TimeBlock").style.marginTop = "30px";
//     }
//     else
//     {
//         $("#hiddenDate").hide();
//         document.getElementById("appointment_modal_TimeBlock").style.marginTop = "0px";
//         document.getElementById("appointment_modal_AppointmentType").style.marginTop = "0px";
        
//     }
//   });



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
   

