


// UTF16 => BASE64 ENCRYPTION
function UTF16_Base64_Encryption(String_Value){
    /* Part 1: Encode `myString` to base64 using native UTF-16 */
    var aUTF16CodeUnits = new Uint16Array(String_Value.length);
    Array.prototype.forEach.call(aUTF16CodeUnits, function (el, idx, arr) { arr[idx] = String_Value.charCodeAt(idx); });
    var sUTF16Base64 = base64EncArr(new Uint8Array(aUTF16CodeUnits.buffer));
    
    /* return output */
 //    alert(sUTF16Base64);
    return sUTF16Base64;
}

function UTF16_Base64_Decryption(EncryptedCode){
 var sDecodedString = String.fromCharCode.apply(null, new Uint16Array(base64DecToArr(EncryptedCode, 2).buffer));

 /* Show output */
 // alert(sDecodedString);  
 return sDecodedString;
}





function b64ToUint6 (nChr) {
 return nChr > 64 && nChr < 91 ? nChr - 65 : nChr > 96 && nChr < 123 ? nChr - 71 : nChr > 47 && nChr < 58 ?  nChr + 4  : nChr === 43 ? 62 : nChr === 47 ? 63 : 0;
}

function base64DecToArr (sBase64, nBlockSize) {

 var
   sB64Enc = sBase64.replace(/[^A-Za-z0-9\+\/]/g, ""), nInLen = sB64Enc.length,
   nOutLen = nBlockSize ? Math.ceil((nInLen * 3 + 1 >>> 2) / nBlockSize) * nBlockSize : nInLen * 3 + 1 >>> 2, aBytes = new Uint8Array(nOutLen);

 for (var nMod3, nMod4, nUint24 = 0, nOutIdx = 0, nInIdx = 0; nInIdx < nInLen; nInIdx++) {
   nMod4 = nInIdx & 3;
   nUint24 |= b64ToUint6(sB64Enc.charCodeAt(nInIdx)) << 18 - 6 * nMod4;
   if (nMod4 === 3 || nInLen - nInIdx === 1) {
     for (nMod3 = 0; nMod3 < 3 && nOutIdx < nOutLen; nMod3++, nOutIdx++) {
       aBytes[nOutIdx] = nUint24 >>> (16 >>> nMod3 & 24) & 255;
     }
     nUint24 = 0;
   }
 }

 return aBytes;
}

/* Base64 string to array encoding */

function uint6ToB64 (nUint6) {
 return nUint6 < 26 ? nUint6 + 65 : nUint6 < 52 ? nUint6 + 71 : nUint6 < 62 ?  nUint6 - 4 : nUint6 === 62 ?  43 : nUint6 === 63 ?  47 : 65;
}

function base64EncArr (aBytes) {
 var eqLen = (3 - (aBytes.length % 3)) % 3, sB64Enc = "";

 for (var nMod3, nLen = aBytes.length, nUint24 = 0, nIdx = 0; nIdx < nLen; nIdx++) {
   nMod3 = nIdx % 3;
   /* Uncomment the following line in order to split the output in lines 76-character long: */
   /*
   if (nIdx > 0 && (nIdx * 4 / 3) % 76 === 0) { sB64Enc += "\r\n"; }
   */
   nUint24 |= aBytes[nIdx] << (16 >>> nMod3 & 24);
   if (nMod3 === 2 || aBytes.length - nIdx === 1) {
     sB64Enc += String.fromCharCode(uint6ToB64(nUint24 >>> 18 & 63), uint6ToB64(nUint24 >>> 12 & 63), uint6ToB64(nUint24 >>> 6 & 63), uint6ToB64(nUint24 & 63));
     nUint24 = 0;
   }
 }

 return  eqLen === 0 ? sB64Enc : sB64Enc.substring(0, sB64Enc.length - eqLen) + (eqLen === 1 ? "=" : "==");
}


var request;
// Bind to the submit event of our form
$("#btnLogin").click(function(event){
    
     // Prevent default posting of form - put here to work in case of errors
     event.preventDefault();
     var username=$("#Username_2_1").val();
     var pass = UTF16_Base64_Encryption($("#Password_1").val());
     if(username== "")
        {
            toastr.options.closeButton = true;
            toastr.options.preventDuplicates= true;
            toastr.warning("Username text field empty","Please do not leave username field empty.");
            return true;
        }
        else if(pass== "")
        {
            toastr.options.closeButton = true;
            toastr.options.preventDuplicates= true;
            toastr.warning("Password text field empty","Please do not leave password field empty.");
            return true;
        }
     // Abort any pending request
     if (request)
      {
         request.abort();
     }
     
     // setup some local variables
     var $form = $("#formed");
 
     // Let's select and cache all the fields
     var $inputs = $form.find("input, select, button, textarea, date, checkbox");
     
     // Serialize the data in the form
     var serializedData = $form.serialize()+"&pass="+pass;
 //+"&username="+username+"&pass="+pass
     // Let's disable the inputs for the duration of the Ajax request.
     // Note: we disable elements AFTER the form data has been serialized.
     // Disabled form elements will not be serialized.
     $inputs.prop("disabled", true);
 
     // Fire off the request to /form.php
     request = $.ajax({
         url: "controller/loginFunction.php",
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
         
         if(json_data.status == "found")
         {
          // window.location.href="viewtable.php";
         }
         else if(json_data.status == "notfound")
         {
            toastr.options.closeButton = true;
            toastr.options.preventDuplicates= true;
            toastr.error(json_data.status_head, json_data.status_message);
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



var request;
// Bind to the submit event of our form
$("#btnSubmitAppointment").click(function(event){
    
     // Prevent default posting of form - put here to work in case of errors
     event.preventDefault();
     var username=$("#Username_2_1").val();
     var pass=$("#Password_1").val();
     var pass2=$("#Password_2").val();
    
     // Abort any pending request
     if (request)
      {
         request.abort();
     }
     if(username== "")
        {
            toastr.options.closeButton = true;
            toastr.options.preventDuplicates= true;
            toastr.warning("Username text field empty","Please do not leave username field empty.");
            return true;
        }
        else if(pass== "")
        {
            toastr.options.closeButton = true;
            toastr.options.preventDuplicates= true;
            toastr.warning("Password text field empty","Please do not leave password field empty.");
            return true;
        }
     // setup some local variables
     var $form = $("#formed");
 
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
         url: "controller/loginFunction.php",
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
         
         if(json_data.status == "found")
         {
          window.location.href="viewtable.php";
         }
         else if(json_data.status == "notfound")
         {
            toastr.options.closeButton = true;
            toastr.options.preventDuplicates= true;
            toastr.error(json_data.status_head, json_data.status_message);
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



var request;
// Bind to the submit event of our form
$("#btnSubmitAppointment").click(function(event){
    
     // Prevent default posting of form - put here to work in case of errors
     event.preventDefault();
     var username=$("#Username_2_1").val();
     var pass=$("#Password_1").val();
     var pass2=$("#Password_2").val();
    
     // Abort any pending request
     if (request)
      {
         request.abort();
     }
     if(username== "")
        {
            toastr.options.closeButton = true;
            toastr.options.preventDuplicates= true;
            toastr.warning("Username text field empty","Please do not leave username field empty.");
            return true;
        }
        else if(pass== "")
        {
            toastr.options.closeButton = true;
            toastr.options.preventDuplicates= true;
            toastr.warning("Password text field empty","Please do not leave password field empty.");
            return true;
        }
     // setup some local variables
     var $form = $("#formed");
 
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
         url: "controller/loginFunction.php",
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
         
         if(json_data.status == "found")
         {
          window.location.href="viewtable.php";
         }
         else if(json_data.status == "notfound")
         {
            toastr.options.closeButton = true;
            toastr.options.preventDuplicates= true;
            toastr.error(json_data.status_head, json_data.status_message);
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


// to encrypt 
// alert(UTF16_Base64_Encryption("adminadmin"));

// to decrypt
// alert(UTF16_Base64_Decryption("YQBkAG0AaQBuAGEAZABtAGkAbgA"));

$('#Password_1').focusout(function(){
  $('#Password_2').val(UTF16_Base64_Encryption($('#Password_1').val()));
});

$('#Password_1').change(function(){
  $('#Password_2').val(UTF16_Base64_Encryption($('#Password_1').val()));
});