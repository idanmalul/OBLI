<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

<!-- calendar start -->

 <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" /> 
<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" /> -->


<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>

<script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>

<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCdwp91cdIUVBbPw7tTubJYYP8sBLfjWbE&callback=initAutocomplete&libraries=places&v=weekly"
      defer
    ></script>


<style type="text/css">

.first_next_button{
    /*font-family: 'Rubik', sans-serif !important;*/
}
    /*** responsive_doc start ***/

@media only screen and (max-width:3000px) and (min-width: 1200px){
.screen02_box-res1{
    width: 240px !important;
    margin-left: 105px !important;
}
.screen02_box-res2{
    width: 240px !important;
    margin-right: 105px !important;
}
}

@media only screen and (max-width:1199px) and (min-width: 768px){
.screen02_box-res1{
    width: 220px !important;
    margin-left: 105px !important;
}
.screen02_box-res2{
    width: 220px !important;
    margin-right: 105px !important;
}

}
@media only screen and (max-width:3000px) and (min-width: 768px){
.form_height{
    margin-top: 0px !important;
}
}

/*** responsive_doc end ***/

/*** responsive_doc start =header ***/
.header_hr-line{
    width: 100%;
    background: linear-gradient(to right,#2ab2f4,#7b6be7);
    height: 1.03px;
}
@media only screen and (max-width:3000px) and (min-width: 1311px){
.navbar-brand {
    padding: 20px 175px;
}
.logo img {
    width: 63px;
    height: 35px;
}
.navbar-default .navbar-nav>li>a{
    color: #3A3078 !important;
    font-weight: normal;
    font-size: 20.6154px;
    padding: 20px;
    margin-top: -15px;
    padding-left: 40px;
}

.navbar-header{
    min-height: 90px !important;
    box-shadow: 0px 5.15385px 4.12308px rgba(55, 68, 255, 0.05);
}
}
@media only screen and (max-width:1310px) and (min-width: 992px){
.navbar-brand {
    padding: 17px 150px;
}
.logo img {
    width: 63px;
    height: 35px;
}
.navbar-default .navbar-nav>li>a{
    color: #3A3078 !important;
    font-weight: normal;
    font-size: 20.6154px;
    padding: 14px;
    margin-top: -15px;
}
.navbar-header{
    min-height: 75px !important;
    box-shadow: 0px 5.15385px 4.12308px rgba(55, 68, 255, 0.05);
}
}
@media only screen and (max-width:991px) and (min-width: 769px){
.navbar-brand {
    padding: 15px 0px;
}
.logo img {
    width: 63px;
    height: 35px;
}
.navbar-default .navbar-nav>li>a{
    color: #3A3078 !important;
    font-weight: normal;
    font-size: 20.6154px;
    padding: 14px;
    margin-top: -15px;
}
.navbar-center{
    width: 65%;
    left: 46%;
}
.navbar-header{
    min-height: 75px !important;
    box-shadow: 0px 5.15385px 4.12308px rgba(55, 68, 255, 0.05);
}
}
@media only screen and (width:768px) {
.navbar-brand {
    padding: 10px 25px;
}
.logo img {
    width: 63px;
    height: 35px;
}
.navbar-default .navbar-nav>li>a{
    color: #3A3078 !important;
    font-weight: normal;
    font-size: 20.6154px;
    padding: 14px;
    margin-top: 10px;
}
.navbar-center{
    width: 65%;
    left: 46%;
}
.navbar-header{
    min-height: 75px !important;
    box-shadow: 0px 5.15385px 4.12308px rgba(55, 68, 255, 0.05);
}
.header_hr-line{
    margin-top: -250px;
}
}
@media only screen and (max-width:767px) and (min-width: 320px){
.navbar-default .navbar-nav>li>a{
    color: #3A3078 !important;
    font-weight: normal;
    font-size: 20.6154px;
}
}
/*** responsive_doc end =header ***/

</style>

 
<script type="text/javascript">
    
	
	localStorage.setItem('is_varifiied_otp',0);

    $(function() {

      $('input[name="gur_period_month"]').daterangepicker({
          // autoUpdateInput: false,
          // locale: {
          //     cancelLabel: 'Clear'
          // }
          linkedCalendars : false,
             "locale": {
                "format": "MM/DD/YYYY",
                "separator": " - ",
                "applyLabel": "להגיש מועמדות ",
                "cancelLabel": "לבטל ",
                "fromLabel": "מ ",
                "toLabel": "ל ",
                "customRangeLabel": "Custom",
                "daysOfWeek": [
                "ראשון",
                "שני",
                "שלישי",
                "רביעי",
                "חמישי",
                "שישי",
                "שבת"
                ],
                "monthNames": [
                "ינו",
                "פבר",
                "מרץ",
                "אפר",
                "מאי",
                "יוני",
        "יולי",
        "אוג",
        "ספט",
        "אוק",
        "נוב",
        "דצמ"
        ],
                "firstDay": 1
            }
      });

      $('input[name="gur_period_month"]').on('apply.daterangepicker', function(ev, picker) {
          $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));

          var startDate = picker.startDate.format('YYYY-MM-DD');
          var endDate = picker.endDate.format('YYYY-MM-DD');
          // alert(startDate); alert(endDate);

          $('#startDate').val(startDate);
          $('#endDate').val(endDate);
      });

      $('input[name="gur_period_month"]').on('cancel.daterangepicker', function(ev, picker) {
          $(this).val('');
      });

      // $('input[name="client_date_of_birth"]').daterangepicker({
      //   singleDatePicker: true,
      //   showDropdowns: true,
      //   minYear: 1901,
      //   maxYear: parseInt(moment().format('YYYY'),10)
      // }, function(start, end, label) {
      //   // var years = moment().diff(start, 'years');
      //   // alert("You are " + years + " years old!");
      // });


    });
</script>

<!-- date of birth picker -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!-- // <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<!-- <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css"> -->

<script>
  $( function() {


    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
      // yearRange: "-80:+0"
      yearRange: "1930:+0"

    });
    
     // $("#datepicker").datepicker();

  } );

/* Hebrew initialisation for the UI Datepicker extension. */
/* Written by Amir Hardon (ahardon at gmail dot com). */
( function( factory ) {
if ( typeof define === "function" && define.amd ) {

// AMD. Register as an anonymous module.
define( [ "../widgets/datepicker" ], factory );
} else {

// Browser globals
factory( jQuery.datepicker );
}
}( function( datepicker ) {

datepicker.regional.he = {
closeText: "סגור",
prevText: "&#x3C;הקודם",
nextText: "הבא&#x3E;",
currentText: "היום",
monthNames: [ "ינואר","פברואר","מרץ","אפריל","מאי","יוני",
"יולי","אוגוסט","ספטמבר","אוקטובר","נובמבר","דצמבר" ],
monthNamesShort: [ "ינו","פבר","מרץ","אפר","מאי","יוני",
"יולי","אוג","ספט","אוק","נוב","דצמ" ],
dayNames: [ "ראשון","שני","שלישי","רביעי","חמישי","שישי","שבת" ],
dayNamesShort: [ "א'","ב'","ג'","ד'","ה'","ו'","שבת" ],
dayNamesMin: [ "א'","ב'","ג'","ד'","ה'","ו'","שבת" ],
weekHeader: "Wk",
dateFormat: "dd/mm/yy",
firstDay: 0,
isRTL: true,
showMonthAfterYear: false,
yearSuffix: "" };
datepicker.setDefaults( datepicker.regional.he );

return datepicker.regional.he;

}));
// end

</script>
<!-- end picker -->

<style type="text/css">
.daterangepicker td.active, .daterangepicker td.active:hover{
    background-image: linear-gradient(to top, #31739b, #53c2e4);
}    
.applyBtn{
     background-image: linear-gradient(to top, #31739b, #53c2e4);
     border:none;
}
.daterangepicker .calendar-time{
    display: none;
}

/*new text button size */
.text_size{
    font-weight: bold;
    font-size: 22px;
    /*line-height: 29px;*/
}
</style>
<!-- calendar end -->

<style type="text/css">
    
.screen2-box1{
    height: 289px;
}

@media screen and (min-width: 320px) and (max-width: 377px){
 .screen2-box1{
    height: 319px;
}   
}

/*modal button css*/
.first_modal_button{

    background: rgba(95, 97, 172, 0.05);
    border: 1px solid rgba(50, 52, 116, 0.5);
    border-radius: 30px;
    height: 50px;
    padding: 13px;
    text-align: center;
    width: 100%;
    height: 60px;
    cursor: auto;
    opacity: 0.5;

}

#checkbox1-error, #checkbox2-error{
    margin-right: 35px;
}

.first_button-new{
    background: rgba(95, 97, 172, 0.05);
    border: 1px solid rgba(50, 52, 116, 0.5);
    /*border: 1px solid rgba(50, 52, 116, 0.5);*/
   /* border:1px solid #4EB5D70px 28px 0px;*/
    border-radius: 30px;
    height: 50px;
    padding: 13px;
    text-align: center;
    /*width: 100%;*/
    height: 60px;
    cursor: pointer;
    width: 328px;

}


.continue_button{
    background-image: linear-gradient(to top, #31739b, #53c2e4);
    color: white;
    border: none;
}
.first_button_new-text1{
   margin-left: 0% !important;
   width: 100% !important;
}
.first_button_new-text2{
   margin-left: -70px !important;
   width: 100% !important;
}
@media screen and (min-width: 320px) and (max-width: 767px){
    .first_button_new-text2{
   margin-left: 0px !important;
   /*width: 100% !important;*/
}
}



/*eroor form message*/
#req_gur_amt_error,#gur_period_month-error{
    color: #EC0D0D;
    direction: rtl;
    font-size: 12.5px;
}



/** floating css start **/
input:focus ~ label, textarea:focus ~ label, input:valid ~ label, textarea:valid ~ label {
    font-size: 0.75em !important;
    /*color: #999;*/
    /*top: -5px;*/
    top: 0px;
    -webkit-transition: all 0.225s ease;
    transition: all 0.225s ease;
}

.styled-input {
    float: left;
    width: 293px;
    margin: 1rem 0;
    position: relative;
    border-radius: 4px;
}

@media only screen and (max-width: 768px){
    .styled-input {
        width:100%;
    }
}
.gform_wrapper .top_label .gfield_label{
    display: flex !important;
}
.styled-input label {
    /*color: #999;*/
    /*padding: 1.3rem 30px 1rem 30px;*/
    padding: 1.3rem 0px 1rem 30px;
    position: absolute;
    /*top: 10px;*/
    top: 40px;
    /*left: 0;*/
    right: 8px;
    -webkit-transition: all 0.25s ease;
    transition: all 0.25s ease;
    pointer-events: none;
}

.styled-input.wide { 
    width: 650px;
    max-width: 100%;
}

input,
textarea {
    padding: 30px;
    border: 0;
    width: 100%;
    font-size: 1rem;
    /*background-color: #2d2d2d;*/
    color: white;
    border-radius: 4px;
}

input:focus,
textarea:focus { outline: 0; }

input:focus ~ span,
textarea:focus ~ span {
    width: 100%;
    -webkit-transition: all 0.075s ease;
    transition: all 0.075s ease;
}

textarea {
    width: 100%;
    /*min-height: 15em;*/
    height: auto;
}

.input-container {
    width: 650px;
    max-width: 100%;
    margin: 20px auto 25px auto;
}

.submit-btn {
    float: right;
    padding: 7px 35px;
    border-radius: 60px;
    display: inline-block;
    background-color: #4b8cfb;
    color: white;
    font-size: 18px;
    cursor: pointer;
    box-shadow: 0 2px 5px 0 rgba(0,0,0,0.06),
              0 2px 10px 0 rgba(0,0,0,0.07);
    -webkit-transition: all 300ms ease;
    transition: all 300ms ease;
}

.submit-btn:hover {
    transform: translateY(1px);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,0.10),
              0 1px 1px 0 rgba(0,0,0,0.09);
}

@media (max-width: 768px) {
    .submit-btn {
        width:100%;
        float: none;
        text-align:center;
    }
}

input[type=checkbox] + label {
  /*color: #ccc;*/
  font-style: italic;
} 

input[type=checkbox]:checked + label {
  color: #f00;
  font-style: normal;
}   

/** floating css end **/


/*uploading file part*/
.file-close-icon i:hover{
     cursor: pointer;
}
/*end*/

#req_gur_amt:focus ~ span{
    width: 30% !important;
}

.span_text{
    font-size: 20px;
}

        
</style>



 

<script type="text/javascript">

// file uploading part
function f(){
    var val = document.getElementById('file-2').value;
    var selectedFile = document.getElementById('file-2').files[0];
    // document.getElementById('client_file').value = selectedFile;
    var val = val.substring(val.lastIndexOf('\\')+1,val.length);
    if(val != ""){
        document.getElementById('label-for-file2').style.display = "none"
        document.getElementById('file-name-label').innerText = val;
       document.getElementById('selected-file').style.display = "block"
       document.getElementById('for_file_label').style.display = "block"
       
    }
 
}

function removeFile(){
 
    document.getElementById('file-2').value = '';
    document.getElementById('label-for-file2').style.display = "block"
    document.getElementById('selected-file').style.display = "none"
    document.getElementById('for_file_label').style.display = "none"
}

// end
        
        
        $(document).ready(function(){

            $("#private_2_form").css("opacity","0.5"); 
            $("#private_2_form").css("cursor","auto");
            $('#private_2_form').prop('disabled', true);
            // $('#private_2_form').prop('disabled', false);

            // phone number validation
            $("#client_phone").inputmask('9999-999-999');
            $.validator.addMethod('customphone', function (value, element) {
                return this.optional(element) || /^\d{4}-\d{3}-\d{3}$/.test(value);
            }, "מספר הטלפון מוכרח להיות 10 תווים");

            // email validate
            $.validator.addMethod('customemail', function (value, element) {
                return this.optional(element) || /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/.test(value);
            }, 'אנא הזן כתובת דוא"ל תקנית');
            // end


            $('#first_name,#last_name,#unique_id,#hometown,#street,#home_no,#client_phone,#client_email').on('keyup', function() {

                if($("#first_name").val() != '' && $("#last_name").val() != '' && $("#unique_id").val() != '' && $("#hometown").val() != ''  && $("#street").val() != '' && $("#home_no").val() != '' && $("#client_phone").val() != '' && $("#client_email").val() != '' && $("#datepicker").val() != '' && $("#file-2").val() != '' ){

                    $("#private_2_form").css("opacity","1"); // button opacity change
                    $("#private_2_form").css("cursor","pointer");
                    $('#private_2_form').prop('disabled', false);

                }
                else{
                    $("#private_2_form").css("opacity","0.5"); 
                    $("#private_2_form").css("cursor","auto");
                    $('#private_2_form').prop('disabled', true);
                }

              
            });

            $('#file-2,#datepicker').on('change', function() {

                if($("#first_name").val() != '' && $("#last_name").val() != '' && $("#unique_id").val() != '' && $("#hometown").val() != ''  && $("#street").val() != '' && $("#home_no").val() != '' && $("#client_phone").val() != '' && $("#client_email").val() != '' && $("#datepicker").val() != '' && $("#file-2").val() != '' ){

                        $("#private_2_form").css("opacity","1"); // button opacity change
                        $("#private_2_form").css("cursor","pointer");
                        $('#private_2_form').prop('disabled', false);
                    
                }else{
                    $("#private_2_form").css("opacity","0.5"); 
                    $("#private_2_form").css("cursor","auto");
                    $('#private_2_form').prop('disabled', true);
                }

              
            });


            $("#private_2_form").click(function(){
				
                var form = $("#myform");
                    form.validate({
                        errorElement: 'span',
                        errorClass: 'help-block',
                        highlight: function(element, errorClass, validClass) { 
                            $(element).closest('.form-group').addClass("has-error");
                        },
                        unhighlight: function(element, errorClass, validClass) { 
                            $(element).closest('.form-group').removeClass("has-error");
                        },
                        rules: {
                            first_name: {
                                required: true,
                                // usernameRegex: true,
                                minlength: 3,
                            },
                            last_name: {
                                required: true,
                                // usernameRegex: true,
                                minlength: 3,
                            },
                            client_photo: {
                                required: true,
                            },
                            unique_id: {
                                required: true,
                                number: true
                            },
                            hometown: {
                                required: true,
                            },
                            street: {
                                required: true,
                            },
                            home_no: {
                                required: true,
                                number: true
                            },
                            client_phone: {
                                customphone: true,
                                // number: true
                                // min: 9,
                                // max: 10
                            },
                            client_email: {
                                required: true,
                                customemail: true
                            },
                            client_gender: {
                                required: true,
                            },
                            client_date_of_birth:{
                                required: true,
                            }
                            
                        },
                        messages: {
                            first_name: {
                                required: "שדה חובה",
                            },
                            last_name: {
                                required: "שדה חובה",
                            },
                            client_photo: {
                                required: "שדה חובה",
                            },
                            unique_id: {
                                required: "שדה חובה",
                                number: "אנא הזן את המספר"
                            },
                            hometown: {
                                required: "שדה חובה",
                            },
                            street: {
                                required: "שדה חובה",
                            },
                            home_no: {
                                required: "שדה חובה",
                                number: "אנא הזן את המספר"
                            },
                            client_phone: {
                                required: "שדה חובה",
                                // number: "אנא הזן את המספר"
                                // min: "מספר הטלפון מוכרח להיות 10 תווים",
                                // max: "מספר הטלפון מוכרח להיות 10 תווים"
                            },
                            client_email: {
                                required: "שדה חובה",
                                customemail: 'אנא הזן כתובת דוא"ל תקנית.'
                            },
                            client_gender: {
                                required: "שדה חובה",
                            },
                            client_date_of_birth: {
                                required: "שדה חובה",
                            }
                            
                        }
                        
                    });

                    if (form.valid() === true){
						
						if(localStorage.getItem('is_varifiied_otp') == 0){
							eror = '<span id="client_phone-error" class="help-block" style="color:#EC0D0D; float:right;">אנא אמת את מספר הטלפון שלך</span>';
							
							$('.customerror').html(eror);
							
							$('.customerror').show();
							
							$("#private_2_form").css("opacity","0.5"); 
							$("#private_2_form").css("cursor","auto");
							$('#private_2_form').prop('disabled', true);
							
							return false;
						}

                        $("#private_2_form").css("opacity","1"); 
                        $("#private_2_form").css("cursor","pointer");
                        $('#private_2_form').prop('disabled', false);
                    }
                    else{
						
                        $("#private_2_form").css("opacity","0.5"); 
                        $("#private_2_form").css("cursor","auto");
                        $('#private_2_form').prop('disabled', true);
                    }

                if($("#first_name").val() != '' && $("#last_name").val() != '' && $("#unique_id").val() != '' && $("#hometown").val() != ''  && $("#street").val() != '' && $("#home_no").val() != '' && $("#client_phone").val() != '' && $("#client_email").val() != '' && $("#datepicker").val() != '' && $("#file-2").val() != '' ){
						
                    $("#private_2_form").css("opacity","1"); 
                    $("#private_2_form").css("cursor","pointer");
                    $('#private_2_form').prop('disabled', false);
                    
                }
                else{
					
					
                    $("#private_2_form").css("opacity","0.5"); 
                    $("#private_2_form").css("cursor","auto");
                    $('#private_2_form').prop('disabled', true);
                }
            });

});

  function varify(flag){
	  var regex = new RegExp(/^\+?[0-9(),.-]+$/);
	  if($("#client_phone").val() != '' && ($("#client_phone").val().match(regex)) && $("#client_phone").val().length >= 10){
			$('.verfy_phone_box').html('<i class="fa fa-spinner fa-spin"></i>');
			
			$.ajax({
   
				 type: "POST",
		   
				 url: "<?php echo site_url('PrivateFlow/smsvarification'); ?>",
		   
				 dataType:'text',
		   
				 data: {phone:$("#client_phone").val()},
		   
				 success: function (result) {
		   
					 localStorage.setItem('otp',parseInt(result));
		  
				 },
		   
				 error: function(error){
		   
					 $('.errorotp'),html('Error in sendiing OTP!');
				 }
			});
		   
		   
			   
			   setTimeout(function (){
				   
				   if(flag == 1){
						$('#verificationModel').modal();
				   }
						
						$('.verfy_phone_box').html("<a onclick='varify(1)' style='font-size:12px; color:#add8e6; cursor:pointer;'>אמת את מספר הטלפון</a></span><label class='control-label gform_wrapper'></label>");
				
			   },1000);
			   
		  
		   
	  }
  }
  
  function varifyotp(){
	  
	  var otpinput = $('.otp_value').val();
	  
	  if(otpinput == localStorage.getItem('otp') && otpinput != ''){
		  
		  localStorage.setItem('is_varifiied_otp',1);
		  
		  $('.errorotp').html('מספר הטלפון אומת בהצלחה');
		  
		  $('.errorotp').css('color','green');
		  
		  $('.re-send-otp').prop('disabled',true);
		  
		  
		  if($("#first_name").val() != '' && $("#last_name").val() != '' && $("#unique_id").val() != '' && $("#hometown").val() != ''  && $("#street").val() != '' && $("#home_no").val() != '' && $("#client_phone").val() != '' && $("#client_email").val() != '' && $("#datepicker").val() != '' && $("#file-2").val() != '' ){

                    $("#private_2_form").css("opacity","1"); // button opacity change
                    $("#private_2_form").css("cursor","pointer");
                    $('#private_2_form').prop('disabled', false);

                }
				
	  }else{
		  $('.errorotp').html('קוד שגוי');
		  
		  $('.errorotp').css('color','red');
	  }
	  
  }
</script>
 
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div id="content" class="contact">
   <div class="site-width site-width_apllication obli-desktop">

    <div class="contact-content clearfix">

        <?php if($this->session->flashdata('error') || !empty($error)){ ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong><?php if($this->session->flashdata('error')){ echo $this->session->flashdata('error'); }else{ echo $error; }  ?></strong>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php if($this->session->flashdata('success')){ ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong><?php echo $this->session->flashdata('success'); ?></strong>
                </div>
            </div>
        </div>
        <?php } ?>
            
        <div class="gf_browser_chrome gform_wrapper gform_wrapper_application" id="gform_wrapper_5">
            
            <form method="post" enctype="multipart/form-data" id="myform" name="validate_form" action="<?php echo site_url('PrivateFlow/private_Form2'); ?>" novalidate="" > 

                <!-- screen 02 -->
                <div id="scr_third_form" class="gform_body form_height" style="margin-top: 30px;">

                        <div class="" style="float: right; margin-left:15px; margin-top:-25px;">
                            <img src="<?php echo base_url() ?>website_assets/img/progress1.png" class="img-responsive">
                           
                        </div>
                         <div class="main_text">
                    <p class="rtl main_text_heading" style="text-align:right;font-weight: bold;">פרטים אישיים </p>

                    <p class="rtl" style="text-align:right; margin-top: -8px;">השלב הבא: סכום הערבות</p>
                     </div>

                    
                    <br>

                    <ul class="gform_fields top_label ">

                        <li class="gfield gfield_html gfield_no_follows_desc "> 
                           
                            <p class="contact-text_application">נשמח להציע לכם ערבות לשכר הדירה, וגם להכיר אתכם  </p>
                         </li>

                        <li class="gfield gf_left_third text-field1_application form-group">
                        
                            <div class="styled-input wide">
                               <input type="text" name="first_name" id="first_name" value="" class="form-control left_lbl1" required="">
                                <label class="gfield_label control-label gform_wrapper gfield_label" for="first_name"> שם פרטי
                            </label>
                            </div> 
                        </li>

                        <li class="gf_middle_third gfield text-field2_application form-group">
                         
                            <div class="styled-input wide">
                               <input type="text" name="last_name" id="last_name" value="" class="form-control second_text" required="">
                                <label class="gfield_label control-label gform_wrapper gfield_label" for="last_name">שם משפחה
                            </label>
                            </div>
                        </li>   

                        <li class="gf_left_third gfield text-field1_application form-group">
                        
                            <div class="styled-input wide">
                               <input type="text" name="unique_id" id="unique_id" value="" class="form-control third_text" required="">
                                <label class="gfield_label control-label gform_wrapper gfield_label" for="unique_id">ת.ז  
                            </label>
                            </div> 
                        </li>

                        <li class="gf_left_third gfield text-field2_application form-group">
                           
                            <label class="for_file_label" id="for_file_label" for="client_add">צילום ת.ז </label>
                             <div  id="selected-file" style="padding-top:40px; display: none;">
                                 
                                 <div class="row">
                                    <div class="col-md-2">
                                      <span onclick="removeFile()" class="file-close-icon">
                                        <!-- <i style="font-size:24px;" class="fa fa-close"></i> -->
                                        <img src="<?php echo base_url() ?>website_assets/img/close.png" class="img-responsive" style="float: left;">
                                    </div>
                                   
                                    <div class="col-md-8">
                                      <label class="for_file_name" id="file-name-label"></label>
                                    </div>
                                     <div class="col-md-2">
                                      <span><i class="fa fa-file-text-o for_file_icon"></i></span>
                                    </div>
                                 </div>
                             
                             </div>

                           <input type="file" name="file-2" id="file-2" class="inputfile inputfile-2" accept="image/gif,image/png,image/jpeg,image/jpg,application/pdf" style="display: none;" onchange="f()">

                            <label for="file-2" id="label-for-file2" style="margin-top: 8px;padding: 13.5px;">

                               <i style="font-size:22px; margin-left: 60px;" class="fa">&#xf030;</i>
                                <span style="font-weight: 200; font-size: 22px; margin-left:70px; padding-top: 6px;">צילום ת.ז </span>
                            </label>

                        </li>
                        
                         <li class="gfield gf_left_third text-field1_application form-group">
                           

                            <div class="styled-input wide">
                        
                                <input
                                id="autocomplete"
                                placeholder="Enter your address"
                                onFocus="geolocate()"
                                type="text" class="form-control" required=""
                              />
                              
                            </div> 
                        </li>

                        <li class="gfield gf_left_third text-field1_application form-group">
                           

                            <div class="styled-input wide">
                               <input type="text" name="hometown" id="hometown" value="" class="form-control hometown_text" required="">
                                <label class="gfield_label control-label gform_wrapper gfield_label" for="hometown"> עיר מגורים
                            </label>
                            </div> 
                        </li>
                       
                        <li class="gfield gf_left_third text-field2_application form-group">
                            
                            <div class="styled-input wide">
                               <input type="text" name="street" id="street" value="" class="form-control street_text" required="">
                                <label class="gfield_label control-label gform_wrapper gfield_label" for="street"> רחוב
                            </label>
                            </div>
                        </li>


                        <li class="gf_left_third gfield text-field1_application form-group">
                            

                            <div class="styled-input wide">
                            
                               <input type="text" name="home_no" id="home_no" value="" class="form-control No_Home_text" required="">

                               <label class="gfield_label control-label gform_wrapper gfield_label" for="No_Home">מס’ בית
                            </label>
                            </div> 
                        </li>
                       
                        <li class="gfield gf_left_third text-field2_application form-group">
						
						<div class='row'>
						
						
						<div class='col-md-5'>
						   <div class="styled-input wide">
							<span class='verfy_phone_box' style='font-size:12px; color:#add8e6;'><a onclick='varify(1)' style='font-size:12px; color:#add8e6; cursor:pointer;'>אמת את מספר הטלפון</a></span>
							<label class="control-label gform_wrapper">
                            </label>
							</div>
							
					    </div>
						
						<div class='col-md-7'>
                          
                            <div class="styled-input wide">
                               <input type="text" name="client_phone" id="client_phone" value="" class="form-control client_phone_text"  required="" style='width:70%;'> 
							    <span class='customerror' style='dsplay:none;'></span>
                                <label class="gfield_label control-label gform_wrapper gfield_label" for="client_phone">טלפון נייד
                            </label>
                            </div> 
					    </div>
						
						</div>
                        </li>

                        <li class="gfield gf_left_third text-field1_application form-group">
                           
                            <div class="styled-input wide">
                               <input type="text" name="client_email" id="client_email" value="" class="form-control fifth_text" required="">
                                <label class="gfield_label control-label gform_wrapper gfield_label" for="client_email">מייל
                            </label>
                            </div> 
                        </li>
                        
                         <li class="gfield gf_left_third text-field2_application form-group">
                            <label class="gfield_label control-label" for="current_residence"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">מין
                          </font></font>
                      <div class=""style="float: left; margin-right: 15px;">
                                <br>
                              <label for="radio-button-1" class="radio gfield_label control-label">
                             
                             <input type="radio" name="client_gender" value="זכר" id="box-2" checked="checked" value="30" style="left: 55px; top: -6px;">זכר
                              
                            </label>
                           
                              <label for="radio-button-0" class="radio gfield_label control-label" style="top: -30px;right: 105px;">
                             
                             <input type="radio" name="client_gender" value="נקבה" id="box-1" style="left: 69px;top: -6px;">נקבה
                            </label>
                            </div>
                        </label>

                            
                        </li>

                        <li class="gfield gf_left_third text-field1_application form-group">
                           
                            <div class="styled-input wide">
                               <input type="text" name="client_date_of_birth" id="datepicker" data-format="DD/MM/YYYY" class="form-control sixth_text" required="" autocomplete="off">
                                <label class="gfield_label control-label gform_wrapper gfield_label" for="client_date">תאריך לידה
                                     
                                     <!-- <img src="<?php echo base_url() ?>website_assets/img/calendar_icon.png" class="img-responsive cal_reponsive1" style="position: relative; left: -180px; top: -5px;"> -->
                            </label>
                              <img class="demo_cal" src="<?php echo base_url() ?>website_assets/img/calendar_icon.png" class="img-responsive cal_reponsive" >
                            </div>
                        </li>
                        
                    
                    </ul>

                    <div class="gform_footer "> 
                        <button type="submit" class="button gform_button first_next_button scr_first_submit" id="private_2_form" style="font-weight: bold; font-size: 22px;" >המשך</button>
                    </div>

                </div>
                
            </form>
        </div>

    </div>
                
    </div>                  
         
</div>

<style type="text/css">
	.btn-primary:hover {
		color: #fff;
		background-color: #4eda5c;
		border-color: #4eda5c;
	}
	
	.btn-primary {
		background-color: #4eda5c;
		border-color: #4eda5c;
		border-radius: 30px;
		font-weight: bold;
		font-family: Assistant !important;
		width: 65px;
	}
	
	.btn-info:hover {
		color: #fff;
		background-color: #5bc0de;
		border-color: #5bc0de;
	}
	
	.btn-info {
		
		border-radius: 30px;
		font-weight: bold;
		font-family: Assistant !important;
		width: 145px;
	}
	
	.btn-secondary:hover {
		color: #fff;
		background-color: #e60c11;
		border-color: #e60c11;
	}
	
	.btn-secondary {
		color: #fff;
		background-color: #e60c11;
		border-color: #e60c11;
		border-radius: 30px;
		font-weight: bold;
		font-family: Assistant !important;
		width: 70px;
	}
	
	.padClass{
		padding: 5px 10px 0px !important;
	}
</style>


<div class="modal" id="verificationModel" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
	
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="rtl modal-title" id="myModalLabel"><b>אימות מספר טלפון</b></h4>
      </div>
	  
      <div class="modal-body">
	  <h5 class='errorotp' style='color:red;'></h5>
	  <form>
	  
	  
	  <div class="form-group">
	  
	    <label for="recipient-name" class="rtl col-form-label">אנא הכנס את הקוד שנשלח אליך בהודעת SMS:</label>

        <input type='text' class='form-control otp_value padClass'>
		
	</div></form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick='varifyotp()'>אמת</button>
		
		 <button type="button" class="rtl btn btn-info re-send-otp" onclick='varify(2)'>שלח קוד פעם נוספת</button>
		
        <button type="button" class="btn btn-secondary" data-dismiss="modal">סגור</button>
      </div>
    </div>
  </div>
</div>

 <script>
      // This sample uses the Autocomplete widget to help the user select a
      // place, then it retrieves the address components associated with that
      // place, and then it populates the form fields with those details.
      // This sample requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script
      // src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
      let placeSearch;
      let autocomplete;
      const componentForm = {
        street_number: "short_name",
        route: "long_name",
        locality: "long_name",
        administrative_area_level_1: "short_name",
        country: "long_name",
        postal_code: "short_name",
      };

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search predictions to
        // geographical location types.
        autocomplete = new google.maps.places.Autocomplete(
          document.getElementById("autocomplete"),
          { types: ["geocode"] }
        );
        // Avoid paying for data that you don't need by restricting the set of
        // place fields that are returned to just the address components.
        autocomplete.setFields(["address_component"]);
        // When the user selects an address from the drop-down, populate the
        // address fields in the form.
        autocomplete.addListener("place_changed", fillInAddress);
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        const place = autocomplete.getPlace();

        for (const component in componentForm) {
          document.getElementById(component).value = "";
          document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details,
        // and then fill-in the corresponding field on the form.
        for (const component of place.address_components) {
          const addressType = component.types[0];

          if (componentForm[addressType]) {
            const val = component[componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition((position) => {
            const geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude,
            };
            const circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy,
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
    </script>

