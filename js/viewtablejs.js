// var intervalID = window.setInterval(fetchData, 30000);

function fetchData(event) {
  console.log("Refreshing table");

   // Prevent default posting of form - put here to work in case of errors
  //  event.preventDefault();
   // Abort any pending request
   if (request) {
       request.abort();
   }
   $('#btnRefreshingTable').show();
   $('#btnRefreshTable').hide();
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
        $('#btnRefreshingTable').hide();
        $('#btnRefreshTable').show();
        console.log("Refresh success");
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
                       $Appointment_Date_Now2 =json_data.appointments_data[i].appointment_Date2;
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
                       
                     
                       var table_R = $('<tr class="lblDefault"></tr>');
                       var table_1=$('<td style="display:none;></td>').html(json_data.appointments_data[i].appointment_SystemID);
                       var table_2=$('<td></td>').html(json_data.appointments_data[i].appointment_TimeSlot);
                       var table_3=$('<td></td>').html(json_data.appointments_data[i].appointment_Date2);
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
                           var table_Buttons=$('<td style="text-align: center;"><button value="" class="btn-danger" id="" type="text" disabled>Cancelled</button> </td>');
                       }
                       else if($Appointment_Flag=="4")
                       {
                           var table_Buttons=$('<td style="text-align: center;"><button value="" class="btn-success" id="" type="text" disabled>Done</button> </td>');
                       }
                       else if($Appointment_Flag=="3")
                       {
                           var table_Buttons=$('<td style="text-align: center;"><button value="" class="btn-warning" id="" type="text" disabled>Ongoing</button> </td>');
                       }
                       else
                       {
                           var table_Buttons=$('<td style="text-align: center;"><button value="" class="btn-primary" id="" type="text" disabled>Upcoming</button> </td>');
                       }
                       table_R.append(table_1,table_2,table_3,table_4,table_5,table_6,table_7,table_Buttons);
                       $('#populateHere').append(table_R);
                    }
               
           $('#TableView').show();
           $('#btnLoadTable').hide();
        }
       else if(json_data.status == "failed")
       {
        $('#btnRefreshingTable').hide();
        $('#btnRefreshTable').show();
          toastr.options.closeButton = true;
          toastr.warning(json_data.status_message, json_data.status);
       }
       else
       {
        $('#btnRefreshingTable').hide();
        $('#btnRefreshTable').show();
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
}



function myFunction() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("appTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[3];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }       
    }
  }


  function sortStatus(n) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("appTable");
    switching = true;
    //Set the sorting direction to ascending:
    dir = "asc"; 
    /*Make a loop that will continue until
    no switching has been done:*/
    while (switching) {
      //start by saying: no switching is done:
      switching = false;
      rows = table.rows;
      /*Loop through all table rows (except the
      first, which contains table headers):*/
      for (i = 1; i < (rows.length - 1); i++) {
        //start by saying there should be no switching:
        shouldSwitch = false;
        /*Get the two elements you want to compare,
        one from current row and one from the next:*/
        x = rows[i].getElementsByTagName("TD")[7];
        y = rows[i + 1].getElementsByTagName("TD")[7];
        /*check if the two rows should switch place,
        based on the direction, asc or desc:*/
        if (dir == "asc") {
          if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
            //if so, mark as a switch and break the loop:
            shouldSwitch= true;
            break;
          }
        } else if (dir == "desc") {
          if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
            //if so, mark as a switch and break the loop:
            shouldSwitch = true;
            break;
          }
        }
      }
      if (shouldSwitch) {
        /*If a switch has been marked, make the switch
        and mark that a switch has been done:*/
        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
        //Each time a switch is done, increase this count by 1:
        switchcount ++;      
      } else {
        /*If no switching has been done AND the direction is "asc",
        set the direction to "desc" and run the while loop again.*/
        if (switchcount == 0 && dir == "asc") {
          dir = "desc";
          switching = true;
        }
      }
    }
  }
  function sortName(n) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("appTable");
    switching = true;
    dir = "asc"; 
    while (switching) {
      switching = false;
      rows = table.rows;
      for (i = 1; i < (rows.length - 1); i++) {
        shouldSwitch = false;
        x = rows[i].getElementsByTagName("TD")[3];
        y = rows[i + 1].getElementsByTagName("TD")[3];
        if (dir == "asc") {
          if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
            shouldSwitch= true;
            break;
          }
        } else if (dir == "desc") {
          if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
            shouldSwitch = true;
            break;
          }
        }
      }
      if (shouldSwitch) {
        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
        switchcount ++;      
      } else {
        if (switchcount == 0 && dir == "asc") {
          dir = "desc";
          switching = true;
        }
      }
    }
  }
  function sortTime(n) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("appTable");
    switching = true;
    dir = "asc"; 
    while (switching) {
      switching = false;
      rows = table.rows;
      for (i = 1; i < (rows.length - 1); i++) {
        shouldSwitch = false;
        x = rows[i].getElementsByTagName("TD")[1];
        y = rows[i + 1].getElementsByTagName("TD")[1];
        if (dir == "asc") {
          if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
            shouldSwitch= true;
            break;
          }
        } else if (dir == "desc") {
          if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
            shouldSwitch = true;
            break;
          }
        }
      }
      if (shouldSwitch) {
        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
        switchcount ++;      
      } else {
        if (switchcount == 0 && dir == "asc") {
          dir = "desc";
          switching = true;
        }
      }
    }
  }
  function sortDate(n) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("appTable");
    switching = true;
    dir = "asc"; 
    while (switching) {
      switching = false;
      rows = table.rows;
      for (i = 1; i < (rows.length - 1); i++) {
        shouldSwitch = false;
        x = rows[i].getElementsByTagName("TD")[2];
        y = rows[i + 1].getElementsByTagName("TD")[2];
        if (dir == "asc") {
          if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
            shouldSwitch= true;
            break;
          }
        } else if (dir == "desc") {
          if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
            shouldSwitch = true;
            break;
          }
        }
      }
      if (shouldSwitch) {
        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
        switchcount ++;      
      } else {
        if (switchcount == 0 && dir == "asc") {
          dir = "desc";
          switching = true;
        }
      }
    }
  }
  function sortAppointment(n) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("appTable");
    switching = true;
    dir = "asc"; 
    while (switching) {
      switching = false;
      rows = table.rows;
      for (i = 1; i < (rows.length - 1); i++) {
        shouldSwitch = false;
        x = rows[i].getElementsByTagName("TD")[6];
        y = rows[i + 1].getElementsByTagName("TD")[6];
        if (dir == "asc") {
          if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
            shouldSwitch= true;
            break;
          }
        } else if (dir == "desc") {
          if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
            shouldSwitch = true;
            break;
          }
        }
      }
      if (shouldSwitch) {
        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
        switchcount ++;      
      } else {
        if (switchcount == 0 && dir == "asc") {
          dir = "desc";
          switching = true;
        }
      }
    }
  }




  


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
                        $Appointment_Date_Now2 =json_data.appointments_data[i].appointment_Date2;
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
                        
                      
                        var table_R = $('<tr class="lblDefault"></tr>');
                        var table_1=$('<td style="display:none;></td>').html(json_data.appointments_data[i].appointment_SystemID);
                        var table_2=$('<td></td>').html(json_data.appointments_data[i].appointment_TimeSlot);
                        var table_3=$('<td></td>').html(json_data.appointments_data[i].appointment_Date2);
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
                            var table_Buttons=$('<td style="text-align: center;"><button value="" class="btn-danger" id="" type="text" disabled>Cancelled</button> </td>');
                        }
                        else if($Appointment_Flag=="4")
                        {
                            var table_Buttons=$('<td style="text-align: center;"><button value="" class="btn-success" id="" type="text" disabled>Done</button> </td>');
                        }
                        else if($Appointment_Flag=="3")
                        {
                            var table_Buttons=$('<td style="text-align: center;"><button value="" class="btn-warning" id="" type="text" disabled>Ongoing</button> </td>');
                        }
                        else
                        {
                            var table_Buttons=$('<td style="text-align: center;"><button value="" class="btn-primary" id="" type="text" disabled>Upcoming</button> </td>');
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
                        var table_1=$('<td style="display:none;></td>').html(json_data.appointments_data[i].appointment_SystemID);
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
                            var table_Buttons=$('<td style="text-align: center;"><button value="" class="btn-danger" id="" type="text" disabled>Cancelled</button> </td>');
                        }
                        else if($Appointment_Flag=="4")
                        {
                            var table_Buttons=$('<td style="text-align: center;"><button value="" class="btn-success" id="" type="text" disabled>Done</button> </td>');
                        }
                        else if($Appointment_Flag=="3")
                        {
                            var table_Buttons=$('<td style="text-align: center;"><button value="" class="btn-warning" id="" type="text" disabled>Ongoing</button> </td>');
                        }
                        else
                        {
                            var table_Buttons=$('<td style="text-align: center;"><button value="" class="btn-primary" id="" type="text" disabled>Upcoming</button> </td>');
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



