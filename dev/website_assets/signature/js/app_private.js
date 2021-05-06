var wrapper1 = document.getElementById("signature-pad-1");
var clearButton = wrapper1.querySelector("[data-action=clear]");
var changeColorButton = wrapper1.querySelector("[data-action=change-color]");
var undoButton = wrapper1.querySelector("[data-action=undo]");
var savePNGButton = wrapper1.querySelector("[data-action=save-png]");
// var saveJPGButton = wrapper.querySelector("[data-action=save-jpg]");
// var saveSVGButton = wrapper.querySelector("[data-action=save-svg]");


var canvas1 = wrapper1.querySelector("canvas");
var signaturePad1 = new SignaturePad(canvas1, {
  // It's Necessary to use an opaque color when saving image as JPEG;
  // this option can be omitted if only saving as PNG or SVG
  backgroundColor: 'rgb(255, 255, 255)'
});


// second signature pad
var wrapper2 = document.getElementById("signature-pad-2");
var clearButtonCanvas2 = wrapper2.querySelector("[data-action=clear2]");
var canvas2 = wrapper2.querySelector("canvas");
var signaturePad2 = new SignaturePad(canvas2, {
  // It's Necessary to use an opaque color when saving image as JPEG;
  // this option can be omitted if only saving as PNG or SVG
  backgroundColor: 'rgb(255, 255, 255)'
});


  


// Adjust canvas coordinate space taking into account pixel ratio,
// to make it look crisp on mobile devices.
// This also causes canvas to be cleared.
function resizeCanvas(canvas) {
  // When zoomed out to less than 100%, for some very strange reason,
  // some browsers report devicePixelRatio as less than 1
  // and only part of the canvas is cleared then.
  var ratio =  Math.max(window.devicePixelRatio || 1, 1);

  // This part causes the canvas to be cleared
  canvas.width = canvas.offsetWidth * ratio;
  canvas.height = canvas.offsetHeight * ratio;
  canvas.getContext("2d").scale(ratio, ratio);

  // This library does not listen for canvas changes, so after the canvas is automatically
  // cleared by the browser, SignaturePad#isEmpty might still return false, even though the
  // canvas looks empty, because the internal data of this library wasn't cleared. To make sure
  // that the state of this library is consistent with visual state of the canvas, you
  // have to clear it manually.
  signaturePad1.clear();
  signaturePad2.clear();
}

// On mobile devices it might make more sense to listen to orientation change,
// rather than window resize events.

window.resize = resizeCanvas;
resizeCanvas(canvas1);
resizeCanvas(canvas2);

// resizeCanvas(canvas1);
// signaturePad1 = new SignaturePad(canvas1);

// resizeCanvas(canvas2);
// signaturePad2 = new SignaturePad(canvas2);

function download(dataURL, filename) {
  if (navigator.userAgent.indexOf("Safari") > -1 && navigator.userAgent.indexOf("Chrome") === -1) {
    window.open(dataURL);
  } else {
    var blob = dataURLToBlob(dataURL);
    var url = window.URL.createObjectURL(blob);

    var a = document.createElement("a");
    a.style = "display: none";
    a.href = url;
    a.download = filename;

    document.body.appendChild(a);
    a.click();

    window.URL.revokeObjectURL(url);
  }
}

// One could simply use Canvas#toBlob method instead, but it's just to show
// that it can be done using result of SignaturePad#toDataURL.
function dataURLToBlob(dataURL) {
  // Code taken from https://github.com/ebidel/filer.js
  var parts = dataURL.split(';base64,');
  var contentType = parts[0].split(":")[1];
  var raw = window.atob(parts[1]);
  var rawLength = raw.length;
  var uInt8Array = new Uint8Array(rawLength);

  for (var i = 0; i < rawLength; ++i) {
    uInt8Array[i] = raw.charCodeAt(i);
  }

  return new Blob([uInt8Array], { type: contentType });
}

var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
var element = document.getElementById('text');

if(clearButton){
 clearButton.addEventListener("click", function (event) {
   signaturePad1.clear();
   
   $("#first_bae64_sign").val('');
   
   // private section
    if($("#req_gur_amt").val() != '' && $("#gur_period_month").val() != '' && $('#checkbox3').is(":checked") && $('#checkbox4').is(":checked") != '' && $('#checkbox5').is(":checked") && $('#checkbox6').is(":checked") && $("#first_bae64_sign").val() != '' && $("#second_bae64_sign").val() != '' ){

         $(".fourth_form_next").css("opacity","1");
         $(".fourth_form_next").css("cursor","pointer");
         $(".fourth_form_next").prop("disabled", false);

     }else{

         $(".fourth_form_next").css("opacity","0.5");
         $(".fourth_form_next").css("cursor","auto");
         $(".fourth_form_next").prop("disabled", true);
     }
     // end private

         // private 2 new flow 
         if($("#private2_requested_gurantee_amt").val() != '' && $("#gur_period_month").val() != '' && $('#checkbox3').is(":checked") && $('#checkbox4').is(":checked") != '' && $("#first_bae64_sign").val() != '' && $("#second_bae64_sign").val() != '' ){

             $("#private2_3_form").css("opacity","1");
             $("#private2_3_form").css("cursor","pointer");
             $("#private2_3_form").prop("disabled", false);

         }else{

             $("#private2_3_form").css("opacity","0.5");
             $("#private2_3_form").css("cursor","auto");
             $("#private2_3_form").prop("disabled", true);
         }

     // end modal (Private2 new flow section)

    // (Business first form screen)
     if($("#req_gur_amt").val() != '' && $("#gur_period_month").val() != '' && $('#checkbox3').is(":checked") && $('#checkbox4').is(":checked") != '' && $("#first_bae64_sign").val() != '' && $("#second_bae64_sign").val() != '' ){

         $("#business_5_form").css("opacity","1"); // button opacity change
         $("#business_5_form").css("cursor","pointer");
         $("#business_5_form").prop("disabled", false);

     }else{

         $("#business_5_form").css("opacity","0.5"); // button opacity change
         $("#business_5_form").css("cursor","auto");
         $("#business_5_form").prop("disabled", true);
     }
     // end

    // business third form screen
     if($("#busineesThird_requested_gurantee_amt").val() != '' && $("#gur_period_month").val() != '' && $('#checkbox3').is(":checked") && $('#checkbox4').is(":checked") != '' && $("#first_bae64_sign").val() != '' && $("#second_bae64_sign").val() != '' ){

         $("#businessThird_3_form").css("opacity","1"); // button opacity change
         $("#businessThird_3_form").css("cursor","pointer");
         $("#businessThird_3_form").prop("disabled", false);

     }else{

         $("#businessThird_3_form").css("opacity","0.5"); // button opacity change
         $("#businessThird_3_form").css("cursor","auto");
         $("#businessThird_3_form").prop("disabled", true);
     }
     // end
   
   if(isMobile){
       
   }
   else{
       
         $(".scr_sec_modal").css("opacity","0.5");
         $(".scr_sec_modal").css("cursor","auto");
   }
   

    $("#sec_scr_checkbox2").hide();
    $("#checkbox2").prop("checked", false);
    
 });
}
 
if(clearButtonCanvas2){
 clearButtonCanvas2.addEventListener("click", function (event) {
   signaturePad2.clear();
   
   $("#second_bae64_sign").val('');
   
   // private section
    if($("#req_gur_amt").val() != '' && $("#gur_period_month").val() != '' && $('#checkbox3').is(":checked") && $('#checkbox4').is(":checked") != '' && $('#checkbox5').is(":checked") && $('#checkbox6').is(":checked") && $("#first_bae64_sign").val() != '' && $("#second_bae64_sign").val() != '' ){

         $(".fourth_form_next").css("opacity","1"); // button opacity change
         $(".fourth_form_next").css("cursor","pointer");
         $(".fourth_form_next").prop("disabled", false);

     }else{

         $(".fourth_form_next").css("opacity","0.5"); // button opacity change
         $(".fourth_form_next").css("cursor","auto");
         $(".fourth_form_next").prop("disabled", true);
     }
     // end private

     // private 1 new flow 
         if($("#private1_requested_gurantee_amt").val() != '' && $("#gur_period_month").val() != '' && $("#second_bae64_sign").val() != '' ){

             $("#private1_3_form").css("opacity","1");
             $("#private1_3_form").css("cursor","pointer");
             $("#private1_3_form").prop("disabled", false);

         }else{

             $("#private1_3_form").css("opacity","0.5");
             $("#private1_3_form").css("cursor","auto");
             $("#private1_3_form").prop("disabled", true);
         }

     // end modal (Private1 new flow section)

     // private 2 new flow 
     if($("#private2_requested_gurantee_amt").val() != '' && $("#gur_period_month").val() != '' && $('#checkbox3').is(":checked") && $('#checkbox4').is(":checked") != '' && $("#first_bae64_sign").val() != '' && $("#second_bae64_sign").val() != '' ){

         $("#private2_3_form").css("opacity","1");
         $("#private2_3_form").css("cursor","pointer");
         $("#private2_3_form").prop("disabled", false);

     }else{

         $("#private2_3_form").css("opacity","0.5");
         $("#private2_3_form").css("cursor","auto");
         $("#private2_3_form").prop("disabled", true);
     }

     // end modal (Private2 new flow section)

    // (Business first form screen)
     if($("#req_gur_amt").val() != '' && $("#gur_period_month").val() != '' && $('#checkbox3').is(":checked") && $('#checkbox4').is(":checked") != '' && $("#first_bae64_sign").val() != '' && $("#second_bae64_sign").val() != '' ){

         $("#business_5_form").css("opacity","1"); // button opacity change
         $("#business_5_form").css("cursor","pointer");
         $("#business_5_form").prop("disabled", false);

     }else{

         $("#business_5_form").css("opacity","0.5"); // button opacity change
         $("#business_5_form").css("cursor","auto");
         $("#business_5_form").prop("disabled", true);
     }
     // end

    // business third form screen
     if($("#busineesThird_requested_gurantee_amt").val() != '' && $("#gur_period_month").val() != '' && $('#checkbox3').is(":checked") && $('#checkbox4').is(":checked") != '' && $("#first_bae64_sign").val() != '' && $("#second_bae64_sign").val() != '' ){

         $("#businessThird_3_form").css("opacity","1"); // button opacity change
         $("#businessThird_3_form").css("cursor","pointer");
         $("#businessThird_3_form").prop("disabled", false);

     }else{

         $("#businessThird_3_form").css("opacity","0.5"); // button opacity change
         $("#businessThird_3_form").css("cursor","auto");
         $("#businessThird_3_form").prop("disabled", true);
     }
     // end

     // (Business Fourth form screen)
     if($("#businessFourth_requested_gur_amount").val() != '' && $("#gur_period_month").val() != ''){

         $("#businessFouth_3_form").css("opacity","1");
         $("#businessFouth_3_form").css("cursor","pointer");
         $("#businessFouth_3_form").prop("disabled", false);

     }else{

         $("#businessFouth_3_form").css("opacity","0.5");
         $("#businessFouth_3_form").css("cursor","auto");
         $("#businessFouth_3_form").prop("disabled", true);
       }
       // end

       // (Business Second form screen)
//     if($("#businessSec_requested_gur_amount").val() != '' && $("#gur_period_month").val() != '' && $("#second_bae64_sign").val() != '' ){
//
//         $("#businessSec_3_form").css("opacity","1");
//         $("#businessSec_3_form").css("cursor","pointer");
//         $("#businessSec_3_form").prop("disabled", false);
//
//     }else{
//
//         $("#businessSec_3_form").css("opacity","0.5");
//         $("#businessSec_3_form").css("cursor","auto");
//         $("#businessSec_3_form").prop("disabled", true);
//       }
       // end
   
   if(isMobile){
       
   }
   else{
        $(".scr_third_modal").css("opacity","0.5");
        $(".scr_third_modal").css("cursor","auto");
   }
   
    $("#sec_scr_checkbox3").hide();
    $("#btn3_checkbox").prop("checked", false);
    
 });
}

// undoButton.addEventListener("click", function (event) {
//   var data = signaturePad.toData();

//   if (data) {
//     data.pop(); // remove the last dot or line
//     signaturePad.fromData(data);
//   }
// });

// changeColorButton.addEventListener("click", function (event) {
//   var r = Math.round(Math.random() * 255);
//   var g = Math.round(Math.random() * 255);
//   var b = Math.round(Math.random() * 255);
//   var color = "rgb(" + r + "," + g + "," + b +")";

//   signaturePad.penColor = color;
// });

// save as png option
// savePNGButton.addEventListener("click", function (event) {
//   var filename = Math.floor((Math.random() * 123456789*Date.now('getMilliseconds')) + 1);
  
//   // alert(signFile);
//   if (signaturePad.isEmpty()) {
//     alert("Please provide a signature first.");
//   } else {
//     var dataURL = signaturePad.toDataURL();
//     $('#bae64_sign').val(dataURL);
//     // var signFile = filename+".png";
//     localStorage.setItem('signature_file', dataURL);
//     // console.log(dataURL);
//     // download(dataURL, filename+".png");
   
//   }
// });

// on mouse over canvas
// canvas.addEventListener("click", function (event) {
//   var filename = Math.floor((Math.random() * 123456789*Date.now('getMilliseconds')) + 1);
  
//   // alert(signFile);
//   if (signaturePad.isEmpty()) {
//     alert("Please provide a signature first.");
//   } else {
//     var dataURL = signaturePad.toDataURL();
//     $('#bae64_sign').val(dataURL);
//     // var signFile = filename+".png";
//     localStorage.setItem('signature_file', dataURL);
//     // console.log(dataURL);
//     // download(dataURL, filename+".png");
   
//   }
// });

var handlefocus=function(e){
  if(e.type=='mouseover'){
//  console.log("focus");
  var data = signaturePad1.toDataURL('image/png');
  // console.log(data);
    /* canvas3.focus() */
    return false;
  }else if(e.type=='mouseout'){
  // console.log("blur");
  if( signaturePad1.isEmpty()){
      console.log('signature1 is empty');
      return false;            
  }

  var data = signaturePad1.toDataURL('image/png');
  $('#first_bae64_sign').val(data);
  
  if($("#first_bae64_sign").val() != ''){
      
      $(".scr_first_modalnew").css("opacity","1");
      $(".scr_first_modalnew").css("cursor","pointer");
      
  }
  
  // check for (Private1 new flow section)
//  if ($('#checkbox5').is(":checked") && $('#checkbox6').is(":checked") && $("#first_bae64_sign").val() != ''){
//
//      $(".scr_sec_modal").css("opacity","1");
//      $(".scr_sec_modal").css("cursor","pointer");
//
//      $("#sec_scr_checkbox2").show();
//      $("#checkbox2").prop("checked", true);
//
//      // close modal second
//      $("#btnCloseModalPopup2").click(function () {
//          $("#myModal2").modal("hide");
//          $("#myBtn2").css("cursor","pointer");
//      });
//
      

  // check for second modal (Private section)
  if ($('#checkbox5').is(":checked") && $('#checkbox6').is(":checked") && $("#first_bae64_sign").val() != ''){

      $(".scr_sec_modal").css("opacity","1");
      $(".scr_sec_modal").css("cursor","pointer");

      $("#sec_scr_checkbox2").show();
      $("#checkbox2").prop("checked", true);

      // close modal second
      $("#btnCloseModalPopup2").click(function () {
          $("#myModal2").modal("hide");
          $("#myBtn2").css("cursor","pointer");
      });

      if($("#req_gur_amt").val() != '' && $("#gur_period_month").val() != '' && $('#checkbox3').is(":checked") && $('#checkbox4').is(":checked") != '' && $('#checkbox5').is(":checked") && $('#checkbox6').is(":checked") && $("#first_bae64_sign").val() != '' && $("#second_bae64_sign").val() != '' ){

          $(".fourth_form_next").css("opacity","1");
          $(".fourth_form_next").css("cursor","pointer");
          $(".fourth_form_next").prop("disabled", false);

      }else{

          $(".fourth_form_next").css("opacity","0.5");
          $(".fourth_form_next").css("cursor","auto");
          $(".fourth_form_next").prop("disabled", true);
      }
     
  }
  else{

      $(".scr_sec_modal").css("opacity","0.5");
      $(".scr_sec_modal").css("cursor","auto");

      $("#sec_scr_checkbox2").hide();
      $("#checkbox2").prop("checked", false);

  }
// end modal (Private section)


        // check for second modal (business section)
        if($("#first_bae64_sign").val() != ''){

            $(".scr_sec_modal").css("opacity","1");
            $(".scr_sec_modal").css("cursor","pointer");

            $("#sec_scr_checkbox2").show();
            $("#checkbox2").prop("checked", true);

            // close modal second
            $("#btnCloseModalPopup2").click(function () {
            $("#myModal2").modal("hide");
            $("#myBtn2").css("cursor","pointer");
            });

            if($("#req_gur_amt").val() != '' && $("#gur_period_month").val() != '' && $('#checkbox3').is(":checked") && $('#checkbox4').is(":checked") != '' && $("#first_bae64_sign").val() != '' && $("#second_bae64_sign").val() != '' ){

                $("#business_5_form").css("opacity","1");
                $("#business_5_form").css("cursor","pointer");
                $("#business_5_form").prop("disabled", false);

            }else{

                $("#business_5_form").css("opacity","0.5");
                $("#business_5_form").css("cursor","auto");
                $("#business_5_form").prop("disabled", true);
            }
            
            // private 2 new flow 
            if($("#private2_requested_gurantee_amt").val() != '' && $("#gur_period_month").val() != '' && $('#checkbox3').is(":checked") && $('#checkbox4').is(":checked") != '' && $("#first_bae64_sign").val() != '' && $("#second_bae64_sign").val() != '' ){

                $("#private2_3_form").css("opacity","1");
                $("#private2_3_form").css("cursor","pointer");
                $("#private2_3_form").prop("disabled", false);

            }else{

                $("#private2_3_form").css("opacity","0.5");
                $("#private2_3_form").css("cursor","auto");
                $("#private2_3_form").prop("disabled", true);
            }
          // end modal (Private1 new flow section)
            
            // business third form screen
            if($("#busineesThird_requested_gurantee_amt").val() != '' && $("#gur_period_month").val() != '' && $('#checkbox3').is(":checked") && $('#checkbox4').is(":checked") != '' && $("#first_bae64_sign").val() != '' && $("#second_bae64_sign").val() != '' ){

                $("#businessThird_3_form").css("opacity","1");
                $("#businessThird_3_form").css("cursor","pointer");
                $("#businessThird_3_form").prop("disabled", false);

            }else{

                $("#businessThird_3_form").css("opacity","0.5");
                $("#businessThird_3_form").css("cursor","auto");
                $("#businessThird_3_form").prop("disabled", true);
            }
            // end

        }
        else{

        $(".scr_sec_modal").css("opacity","0.5");
        $(".scr_sec_modal").css("cursor","auto");

        $("#sec_scr_checkbox2").hide();
        $("#checkbox2").prop("checked", false);

        }

                

// end modal (business section)


// check for second modal (business-2 section)
//if($("#first_bae64_sign").val() != ''){
//
//            $(".scr_sec_modal").css("opacity","1");
//            $(".scr_sec_modal").css("cursor","pointer");
//
//            $("#sec_scr_checkbox3").show();
//            $("#btn3_checkbox").prop("checked", true);
//
//            // close modal second
//            $("#btnCloseModalPopup2").click(function () {
//            $("#myModal2").modal("hide");
//            $("#myBtn2").css("cursor","pointer");
//            });
//
//            if($("#req_gur_amt").val() != '' && $("#gur_period_month").val() != '' && $("#first_bae64_sign").val() != '' ){
//
//            $("#business_5_form").css("opacity","1"); // button opacity change
//            $("#business_5_form").css("cursor","pointer");
//            $("#business_5_form").prop("disabled", false);
//
//            }else{
//
//            $("#business_5_form").css("opacity","0.5"); // button opacity change
//            $("#business_5_form").css("cursor","auto");
//            $("#business_5_form").prop("disabled", true);
//            }
//
//            }
//            else{
//
//            $(".scr_sec_modal").css("opacity","0.5");
//            $(".scr_sec_modal").css("cursor","auto");
//
//            $("#sec_scr_checkbox3").hide();
//            $("#btn3_checkbox").prop("checked", false);
//
//            }

                

// end modal (business section)

//  console.log(data);
    /* canvas3.blur() */
    return false;
  }
  return true;
};

//var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
//var element = document.getElementById('text');
//
//if (isMobile) {
//
//
//                $(".scr_sec_modal").css("opacity","1");
//                $(".scr_sec_modal").css("cursor","pointer");
//
//                $("#sec_scr_checkbox2").show();
//                $("#checkbox2").prop("checked", true);
//
//                // close modal second
//                $("#btnCloseModalPopup2").click(function () {
//                $("#myModal2").modal("hide");
//                $("#myBtn2").css("cursor","pointer");
//                });
//
//                if($("#req_gur_amt").val() != '' && $("#gur_period_month").val() != '' && $('#checkbox3').is(":checked") && $('#checkbox4').is(":checked") != '' && $("#first_bae64_sign").val() != '' && $("#second_bae64_sign").val() != '' ){
//
//                $("#business_5_form").css("opacity","1"); // button opacity change
//                $("#business_5_form").css("cursor","pointer");
//                $("#business_5_form").prop("disabled", false);
//
//                }else{
//
//                $("#business_5_form").css("opacity","0.5"); // button opacity change
//                $("#business_5_form").css("cursor","auto");
//                $("#business_5_form").prop("disabled", true);
//                }
//
//                
//} else {
//            
//}


// second signature generate
var handlefocus2=function(e){
  if(e.type=='mouseover'){
//  console.log("focus");
  var data2 = signaturePad2.toDataURL('image/png');
  // console.log(data);
    /* canvas3.focus() */
    return false;
  }else if(e.type=='mouseout'){
  // console.log("blur");
  
  if( signaturePad2.isEmpty()){
      console.log('signature2 is empty');
      return false;            
  }

  var data2 = signaturePad2.toDataURL('image/png');
  $('#second_bae64_sign').val(data2);

  // check for second modal (Private section- second part private)
  if ($("#second_bae64_sign").val() != ''){

      $(".scr_third_modal").css("opacity","1");
      $(".scr_third_modal").css("cursor","pointer");

      $("#sec_scr_checkbox3").show();
      $("#btn3_checkbox").prop("checked", true);

      // close modal second
      $("#btnCloseModalPopup3").click(function () {
          $("#myModal2").modal("hide");
          $("#myBtn2").css("cursor","pointer");
      });

        // (Private section)
        if($("#req_gur_amt").val() != '' && $("#gur_period_month").val() != '' && $('#checkbox3').is(":checked") && $('#checkbox4').is(":checked") != '' && $('#checkbox5').is(":checked") && $('#checkbox6').is(":checked") && $("#first_bae64_sign").val() != '' && $("#second_bae64_sign").val() != '' ){

            $(".fourth_form_next").css("opacity","1");
            $(".fourth_form_next").css("cursor","pointer");
            $(".fourth_form_next").prop("disabled", false);

        }else{

            $(".fourth_form_next").css("opacity","0.5");
            $(".fourth_form_next").css("cursor","auto");
            $(".fourth_form_next").prop("disabled", true);
        }
        
        // private 1 new flow 
        if($("#private1_requested_gurantee_amt").val() != '' && $("#gur_period_month").val() != '' && $("#second_bae64_sign").val() != '' ){

            $("#private1_3_form").css("opacity","1");
            $("#private1_3_form").css("cursor","pointer");
            $("#private1_3_form").prop("disabled", false);

        }else{

            $("#private1_3_form").css("opacity","0.5");
            $("#private1_3_form").css("cursor","auto");
            $("#private1_3_form").prop("disabled", true);
        }
  
    // end modal (Private1 new flow section)
        
        // private 2 new flow 
        if($("#private2_requested_gurantee_amt").val() != '' && $("#gur_period_month").val() != '' && $('#checkbox3').is(":checked") && $('#checkbox4').is(":checked") != '' && $("#first_bae64_sign").val() != '' && $("#second_bae64_sign").val() != '' ){

            $("#private2_3_form").css("opacity","1");
            $("#private2_3_form").css("cursor","pointer");
            $("#private2_3_form").prop("disabled", false);

        }else{

            $("#private2_3_form").css("opacity","0.5");
            $("#private2_3_form").css("cursor","auto");
            $("#private2_3_form").prop("disabled", true);
        }
  
    // end modal (Private2 new flow section)
      
      // (Business section)
      if($("#req_gur_amt").val() != '' && $("#gur_period_month").val() != '' && $('#checkbox3').is(":checked") && $('#checkbox4').is(":checked") != '' && $("#first_bae64_sign").val() != '' && $("#second_bae64_sign").val() != '' ){

          $("#business_5_form").css("opacity","1");
          $("#business_5_form").css("cursor","pointer");
          $("#business_5_form").prop("disabled", false);

      }else{

          $("#business_5_form").css("opacity","0.5");
          $("#business_5_form").css("cursor","auto");
          $("#business_5_form").prop("disabled", true);
      }

      // (Private section- First part)
      if($("#requested_gurantee_amt").val() != '' && $("#gur_period_month").val() != '' && $("#second_bae64_sign").val() != '' ){

          $("#private_3_form").css("opacity","1");
          $("#private_3_form").css("cursor","pointer");
          $("#private_3_form").prop("disabled", false);

      }else{

          $("#private_3_form").css("opacity","0.5");
          $("#private_3_form").css("cursor","auto");
          $("#private_3_form").prop("disabled", true);
      }
      
      // (Business Second form screen)
//      if($("#businessSec_requested_gur_amount").val() != '' && $("#gur_period_month").val() != '' && $("#second_bae64_sign").val() != '' ){
//
//          $("#businessSec_3_form").css("opacity","1");
//          $("#businessSec_3_form").css("cursor","pointer");
//          $("#businessSec_3_form").prop("disabled", false);
//
//      }else{
//
//          $("#businessSec_3_form").css("opacity","0.5");
//          $("#businessSec_3_form").css("cursor","auto");
//          $("#businessSec_3_form").prop("disabled", true);
//        }
      // end
      
        // business third form screen
        if($("#busineesThird_requested_gurantee_amt").val() != '' && $("#gur_period_month").val() != '' && $('#checkbox3').is(":checked") && $('#checkbox4').is(":checked") != '' && $("#first_bae64_sign").val() != '' && $("#second_bae64_sign").val() != '' ){

            $("#businessThird_3_form").css("opacity","1");
            $("#businessThird_3_form").css("cursor","pointer");
            $("#businessThird_3_form").prop("disabled", false);

        }else{

            $("#businessThird_3_form").css("opacity","0.5");
            $("#businessThird_3_form").css("cursor","auto");
            $("#businessThird_3_form").prop("disabled", true);
        }
        // end
        
        // (Business Fourth form screen)
      if($("#businessFourth_requested_gur_amount").val() != '' && $("#gur_period_month").val() != ''){

          $("#businessFouth_3_form").css("opacity","1");
          $("#businessFouth_3_form").css("cursor","pointer");
          $("#businessFouth_3_form").prop("disabled", false);

      }else{

          $("#businessFouth_3_form").css("opacity","0.5");
          $("#businessFouth_3_form").css("cursor","auto");
          $("#businessFouth_3_form").prop("disabled", true);
        }
      // end

  }
  else{

      $(".scr_third_modal").css("opacity","0.5");
      $(".scr_third_modal").css("cursor","auto");

      $("#sec_scr_checkbox3").hide();
      $("#btn3_checkbox").prop("checked", false);

  }
// end modal (Private section)

//  console.log("second"+data2);
    /* canvas3.blur() */
    return false;
  }
  return true;
};

// var handlekeydown=function(e){
//   alert('keycode: '+e.keyCode);
//   var data = signaturePad1.toDataURL('image/png');
//   // console.log(data);
//   return false;
// };


// var handlefocus2=function(e){ console.log('1_test');
//   if(e.type=='mouseover'){
//   console.log("focus");
//   var data2 = signaturePad2.toDataURL('image/png');
//   // console.log(data);
//     /* canvas3.focus() */
//     return false;
//   }else if(e.type=='mouseout'){
//   // console.log("blur");
  
//   if( signaturePad2.isEmpty()){
//       console.log('signature2 is empty');
//       return false;            
//   }

//   var data2 = signaturePad2.toDataURL('image/png');
//   $('#second_bae64_sign').val(data2);


//   console.log("second"+data2);
//     /* canvas3.blur() */
//     return false;
//   }
//   return true;
// };

// canvas.addEventListener('mouseover',handlefocus,false);
canvas1.addEventListener('mouseout',handlefocus,false);
canvas2.addEventListener('mouseout',handlefocus2,false);
 // canvas.addEventListener('keydown',handlekeydown,false);

// $(document).on("pagecreate","#pageone",function(){
//   $("p").on("tap",function(){
//     $(this).hide();
//   });                       
// });

// $(document).on("pagecreate","#pageone",function(){
//   $("p").on("tap",function(){
//     $(this).hide();
//   });                       
// });

// saveJPGButton.addEventListener("click", function (event) {
//   var signFile = Math.floor((Math.random() * 123456789*Date.now('getMilliseconds')) + 1);
//   if (signaturePad.isEmpty()) {
//     alert("Please provide a signature first.");
//   } else {
//     var dataURL = signaturePad.toDataURL("image/jpeg");
//     download(dataURL, signFile+".jpg");
//   }
// });

// saveSVGButton.addEventListener("click", function (event) {
//   var signFile = Math.floor((Math.random() * 123456789*Date.now('getMilliseconds')) + 1);
//   if (signaturePad.isEmpty()) {
//     alert("Please provide a signature first.");
//   } else {
//     var dataURL = signaturePad.toDataURL('image/svg+xml');
//     download(dataURL, signFile+".svg");
//   }
// });

//$(".first_modal_button").css("opacity","1");
//$(".first_modal_button").css("cursor","pointer");
