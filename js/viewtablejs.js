
var request;
// Bind to the submit event of our form


$("#btnLoadTable").click(function(event){
     // Prevent default posting of form - put here to work in case of errors
     event.preventDefault();
     $('#btnFetching').show();
     $('#btnLoadTable').hide();
     // Abort any pending request
     if (request) {
         request.abort();
     }
     
     // setup some local variables
     var $form = $("#TableView");
 
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
         url: "controller/populateAppointments.php",
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
            $('#btnFetching').hide();
            $('#btnLoadTable').show();
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear();
            var Hour = today.getHours();
            today = yyyy + '-' + mm + '-' + dd;
             
                     $valuesz=1;
                    for(var i = 0; i < json_data.appointments_data.length; i++) 
                    {
                        $Appointment_Time_Slot =json_data.appointments_data[i].appointment_TimeSlot;
                        $Appointment_Date_Now =json_data.appointments_data[i].appointment_Date;
                        $Appointment_Flag =json_data.appointments_data[i].appointment_Flag;
                        $blockTime ="";
                        if ($Appointment_Time_Slot == "8am - 9am"){ $blockTime = "8"; }
                        else if	($Appointment_Time_Slot == "9am - 10am"){ $blockTime = "9"; }
                        else if	($Appointment_Time_Slot == "10am - 11am"){ $blockTime = "10"; }
                        else if	($Appointment_Time_Slot == "11am - 12pm"){ $blockTime = "11"; }
                        else if	($Appointment_Time_Slot == "12pm - 1pm"){ $blockTime = "12"; }
                        else if	($Appointment_Time_Slot == "1pm - 2pm"){ $blockTime = "13"; }
                        else if	($Appointment_Time_Slot == "2pm - 3pm"){ $blockTime = "14"; }
                        else if	($Appointment_Time_Slot == "3pm - 4pm"){ $blockTime = "15"; }
                        else if	($Appointment_Time_Slot == "4pm - 5pm"){ $blockTime = "16"; }
                        else if	($Appointment_Time_Slot == "5pm - 6pm"){ $blockTime = "17"; }
                        else if	($Appointment_Time_Slot == "6pm - 7pm"){ $blockTime = "18"; }
                        else if	($Appointment_Time_Slot == "7pm - 8pm"){ $blockTime = "19"; }
                        else {
                            $blockTime =  "Empty";
                        }
                        
                        if($blockTime==Hour && today==$Appointment_Date_Now && $Appointment_Flag==2)
                        {
                            var table_R = $('<tr class="lblShowUp"></tr>');
                        }
                        else if($Appointment_Flag == 4)
                        {
                            var table_R = $('<tr class="lblDone"></tr>');
                        }
                        else if($Appointment_Flag == 1)
                        {
                            var table_R = $('<tr class="lblCancel"></tr>');
                        }
                        else
                        {
                            var table_R = $('<tr class="lblUpcoming"></tr>');
                        }
                        var table_1=$('<td></td>').html(json_data.appointments_data[i].appointment_SystemID);
                        var table_2=$('<td></td>').html(json_data.appointments_data[i].appointment_TimeSlot);
                        var table_3=$('<td></td>').html(json_data.appointments_data[i].appointment_Date);
                        var table_4=$('<td></td>').html(json_data.appointments_data[i].appointment_Customer_Name);
                        var table_5=$('<td></td>').html(json_data.appointments_data[i].appointment_Customer_Email);
                        var table_6=$('<td></td>').html(json_data.appointments_data[i].appointment_Contact);
                        var table_7=$('<td></td>').html(json_data.appointments_data[i].appointment_ReasonForAppointment);
                        if($blockTime==Hour && today==$Appointment_Date_Now && $Appointment_Flag==2)
                        {
                            var table_Buttons=$('<td style="text-align: center;"><button value="'+json_data.appointments_data[i].appointment_SystemID+'" class="btnnShowUp" id="btnShowUp" type="button" data-toggle="modal" data-target="#ConfirmShowUpModal">Show Up</button> </td>');
                        
                        }
                        else if($Appointment_Flag==1)
                        {
                            var table_Buttons=$('<td style="text-align: center;"><button value="" class="btnnCancel" id="" type="text" disabled>Cancelled</button> </td>');
                        }
                        else if($Appointment_Flag=="4")
                        {
                            var table_Buttons=$('<td style="text-align: center;"><button value="" class="btnnAppDone" id="" type="text" disabled>Done</button> </td>');
                        }
                        else
                        {
                            var table_Buttons=$('<td style="text-align: center;"><button value="" class="btnnUpcoming" id="" type="text" disabled>Upcoming</button> </td>');
                        }
                        table_R.append(table_1,table_2,table_3,table_4,table_5,table_6,table_7,table_Buttons);
                        $('#populateHere').append(table_R);
                     }
                
            $('#TableView').show();
            $('#btnLoadTable').hide();
         }
         else if(json_data.status == "failed")
         {
            
            toastr.options.closeButton = true;
            toastr.warning(json_data.status_message, json_data.status);
         }
         else
         {
           
            toastr.options.closeButton = true;
            toastr.warning("Error Here", "An error has occured. Please contact the developer for assistance.");
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



///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$(document).on('click','#btnShowUp', function(){
    var IDNumber = $(this).attr('value');
    // alert("this is ID number of clicked button"+ IDNumber);
    $('#AppIDTableVal').val(IDNumber);
    
});
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$(document).on('click','#btnShowUpYes', function(){

    var appID = $("#AppIDTableVal").val();
     // Serialize the data in the form
     var serializedData = "appID="+appID;
 
     // Let's disable the inputs for the duration of the Ajax request.
     // Note: we disable elements AFTER the form data has been serialized.
     // Disabled form elements will not be serialized.
   
 
     // Fire off the request to /form.php
     request = $.ajax({
         url: "controller/appointmentShowUp.php",
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
            var Table = document.getElementById("populateHere");
            Table.innerHTML = "";
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear();
            var Hour = today.getHours();
            today = yyyy + '-' + mm + '-' + dd;
             
                     $valuesz=1;
                    for(var i = 0; i < json_data.appointments_data.length; i++) 
                    {
                        $Appointment_Time_Slot =json_data.appointments_data[i].appointment_TimeSlot;
                        $Appointment_Date_Now =json_data.appointments_data[i].appointment_Date;
                        $Appointment_Flag =json_data.appointments_data[i].appointment_Flag;
                        $blockTime ="";
                        if ($Appointment_Time_Slot == "8am - 9am"){ $blockTime = "8"; }
                        else if	($Appointment_Time_Slot == "9am - 10am"){ $blockTime = "9"; }
                        else if	($Appointment_Time_Slot == "10am - 11am"){ $blockTime = "10"; }
                        else if	($Appointment_Time_Slot == "11am - 12pm"){ $blockTime = "11"; }
                        else if	($Appointment_Time_Slot == "12pm - 1pm"){ $blockTime = "12"; }
                        else if	($Appointment_Time_Slot == "1pm - 2pm"){ $blockTime = "13"; }
                        else if	($Appointment_Time_Slot == "2pm - 3pm"){ $blockTime = "14"; }
                        else if	($Appointment_Time_Slot == "3pm - 4pm"){ $blockTime = "15"; }
                        else if	($Appointment_Time_Slot == "4pm - 5pm"){ $blockTime = "16"; }
                        else if	($Appointment_Time_Slot == "5pm - 6pm"){ $blockTime = "17"; }
                        else if	($Appointment_Time_Slot == "6pm - 7pm"){ $blockTime = "18"; }
                        else if	($Appointment_Time_Slot == "7pm - 8pm"){ $blockTime = "19"; }
                        else {
                            $blockTime =  "Empty";
                        }
                        var table_R = $('<tr></tr>');
                        var table_1=$('<td></td>').html(json_data.appointments_data[i].appointment_SystemID);
                        var table_2=$('<td></td>').html(json_data.appointments_data[i].appointment_TimeSlot);
                        var table_3=$('<td></td>').html(json_data.appointments_data[i].appointment_Date);
                        var table_4=$('<td></td>').html(json_data.appointments_data[i].appointment_Customer_Name);
                        var table_5=$('<td></td>').html(json_data.appointments_data[i].appointment_Customer_Email);
                        var table_6=$('<td></td>').html(json_data.appointments_data[i].appointment_Contact);
                        var table_7=$('<td></td>').html(json_data.appointments_data[i].appointment_ReasonForAppointment);
                        if($blockTime==Hour && today==$Appointment_Date_Now && $Appointment_Flag==2)
                        {
                            var table_Buttons=$('<td style="text-align: center;"><button value="'+json_data.appointments_data[i].appointment_SystemID+'" class="btnnShowUp" id="btnShowUp" type="button" data-toggle="modal" data-target="#ConfirmShowUpModal">Show Up</button> </td>');
                        
                        }
                        else if($Appointment_Flag==1)
                        {
                            var table_Buttons=$('<td style="text-align: center;"><button value="" class="btnnCancel" id="" type="text" disabled>Cancelled</button> </td>');
                        }
                        else if($Appointment_Flag=="4")
                        {
                            var table_Buttons=$('<td style="text-align: center;"><button value="" class="btnnAppDone" id="" type="text" disabled>Done</button> </td>');
                        }
                        else
                        {
                            var table_Buttons=$('<td style="text-align: center;"><button value="" class="btnnUpcoming" id="" type="text" disabled>Upcoming</button> </td>');
                        }
                        table_R.append(table_1,table_2,table_3,table_4,table_5,table_6,table_7,table_Buttons);
                        $('#populateHere').append(table_R);
                     }
                     $('#ConfirmShowUpModal').modal('hide');
         }
         else if(json_data.status == "failed")
         {
            $("#btnVerifyStatus").show();
            $("#btnVerifyingStatus").hide();
            toastr.options.closeButton = true;
            toastr.warning(json_data.status_message, json_data.status);
         }
         else 
         {
            $("#btnVerifyStatus").show();
            $("#btnVerifyingStatus").hide();
            toastr.options.closeButton = true;
            toastr.warning("An error has occured", "Unknown error! Please contact developer now.");
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