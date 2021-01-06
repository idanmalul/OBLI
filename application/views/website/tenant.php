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

<style type="text/css">

.first_next_button{
    font-family: 'Rubik', sans-serif !important;
    font-weight: normal !important;
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
        #PropertyForm,
        #company_information,#scr_fourth_form,#scr_third_form,#scr_seven_form,#scr_eight_form, #sec_scr_checkbox1, #sec_scr_checkbox2, #sec_scr_checkbox3, #greaterThan2500Scr, #modal2Div, #modal3Div, .sonar-wrapper, #scr_seven_form_new,#req_gur_amt-error, #span_br {
            display:none;
            /*visibility: hidden;*/
        }

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


            var ratio =  Math.max(window.devicePixelRatio || 1, 1);

            // This part causes the canvas to be cleared
            canvas1.width = '416';
            canvas1.height = '147';

            canvas2.width = '416';
            canvas2.height = '147';


            $(".next").click(function(){ 
                
                // if($('#company_information').is(":visible")){
                //     current_fs = $('#company_information');
                //     next_fs = $('#PropertyForm');
                // }
                if($('#scr_first_form').is(":visible")){
                    // $("#scr_second_form").animate({height: "1400px"});
                    $("#scr_second_form").animate({height: "300px"});
                   
                    current_fs = $('#scr_first_form');
                    next_fs = $('#scr_second_form');

                }else if($('#scr_second_form').is(":visible")){
                    $("#scr_third_form").animate({height: "300px"});
                    current_fs = $('#scr_second_form');
                    next_fs = $('#scr_third_form');

                    $("#third_form_next").css("opacity","0.5"); // button opacity change
                    $("#third_form_next").css("cursor","auto");
                    $("#req_gur_amt_error").hide('fast');
                }
                // else if($('#scr_third_form').is(":visible")){
                //     current_fs = $('#scr_third_form');
                //     next_fs = $('#account_information');
                //     $(".fourth_form_next").css("opacity","0.5"); // button opacity change
                //     $(".fourth_form_next").css("cursor","auto");
                // }else if($('#PropertyForm').is(":visible")){
                //     current_fs = $('#PropertyForm');
                //     next_fs = $('#scr_seven_form');
                // }else if($('#scr_seven_form').is(":visible")){
                //     current_fs = $('#scr_seven_form');
                //     next_fs = $('#scr_eight_form');
                // }
                
                next_fs.show(); 
                current_fs.hide();
                
            });

            $('#first_name,#last_name,#unique_id,#hometown,#street,#home_no,#client_phone,#client_email').on('keyup', function() {

                if($("#first_name").val() != '' && $("#last_name").val() != '' && $("#unique_id").val() != '' && $("#hometown").val() != ''  && $("#street").val() != '' && $("#home_no").val() != '' && $("#client_phone").val() != '' && $("#client_email").val() != '' && $("#datepicker").val() != '' && $("#file-2").val() != '' ){

                    $("#third_form_next").css("opacity","1"); // button opacity change
                    $("#third_form_next").css("cursor","pointer");

                }
                else{
                    $("#third_form_next").css("opacity","0.5"); // button opacity change
                    $("#third_form_next").css("cursor","auto");
                }

              
            });

            $('#file-2,#datepicker').on('change', function() {

                if($("#first_name").val() != '' && $("#last_name").val() != '' && $("#unique_id").val() != '' && $("#hometown").val() != ''  && $("#street").val() != '' && $("#home_no").val() != '' && $("#client_phone").val() != '' && $("#client_email").val() != '' && $("#datepicker").val() != '' && $("#file-2").val() != '' ){

                        $("#third_form_next").css("opacity","1"); // button opacity change
                        $("#third_form_next").css("cursor","pointer");
                    
                }else{
                    $("#third_form_next").css("opacity","0.5"); // button opacity change
                    $("#third_form_next").css("cursor","auto");
                }

              
            });


            $("#third_form_next").click(function(){

                if($("#first_name").val() != '' && $("#last_name").val() != '' && $("#unique_id").val() != '' && $("#hometown").val() != ''  && $("#street").val() != '' && $("#home_no").val() != '' && $("#client_phone").val() != '' && $("#client_email").val() != '' && $("#datepicker").val() != '' && $("#file-2").val() != '' ){

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

                        if($('#scr_third_form').is(":visible")){
                            $("#scr_fourth_form").animate({height: "300px"});
                            current_fs = $('#scr_third_form');
                            next_fs = $('#scr_fourth_form');
                            $(".fourth_form_next").css("opacity","0.5"); // button opacity change
                            $(".fourth_form_next").css("cursor","auto");
                            $(".fourth_form_next").prop("disabled", true);
                        }
                        
                        next_fs.show(); 
                        current_fs.hide();
                        
                    }
                    else{
                        // $('.submit').css('opacity', '0.5');
                    }
                }
            });


            // second form  
            $('#req_gur_amt').on('keyup', function() {

                if($("#req_gur_amt").val() != '' && $("#gur_period_month").val() != '' && $('#checkbox3').is(":checked") && $('#checkbox4').is(":checked") != '' && $('#checkbox5').is(":checked") && $('#checkbox6').is(":checked") && $("#first_bae64_sign").val() != '' && $("#second_bae64_sign").val() != '' ){

                    $(".fourth_form_next").css("opacity","1"); // button opacity change
                    $(".fourth_form_next").css("cursor","pointer");
                    $(".fourth_form_next").prop("disabled", false);

                }
                else{
                    $(".fourth_form_next").css("opacity","0.5"); // button opacity change
                    $(".fourth_form_next").css("cursor","auto");
                    $(".fourth_form_next").prop("disabled", true);
                }

              
            });

            $('#gur_period_month').on('click', function() { 

                if($("#req_gur_amt").val() != '' && $("#gur_period_month").val() != '' && $('#checkbox3').is(":checked") && $('#checkbox4').is(":checked") != '' && $('#checkbox5').is(":checked") && $('#checkbox6').is(":checked") && $("#first_bae64_sign").val() != '' && $("#second_bae64_sign").val() != '' ){

                        $(".fourth_form_next").css("opacity","1"); // button opacity change
                        $(".fourth_form_next").css("cursor","pointer");
                        $(".fourth_form_next").prop("disabled", false);
                    
                }else{
                    $(".fourth_form_next").css("opacity","0.5"); // button opacity change
                    $(".fourth_form_next").css("cursor","auto");
                    $(".fourth_form_next").prop("disabled", true);
                }

              
            });
            
            // for first modal
            if ($('#checkbox3').is(":checked") && $('#checkbox4').is(":checked") )
            {
              $(".scr_first_modal").css("opacity","1");
              $(".scr_first_modal").css("cursor","pointer");

              $("#sec_scr_checkbox1").show();
              $("#checkbox1").prop("checked", true);
            }
            else{
                $(".scr_first_modal").css("opacity","0.5");
                $(".scr_first_modal").css("cursor","auto");

                $("#sec_scr_checkbox1").hide();
                $("#checkbox1").prop("checked", false);
            }
            // end
                

            $('#checkbox3,#checkbox4,#checkbox5,#checkbox6').on('click', function() {

                if($("#req_gur_amt").val() != '' && $("#gur_period_month").val() != '' && $('#checkbox3').is(":checked") && $('#checkbox4').is(":checked") != '' && $('#checkbox5').is(":checked") && $('#checkbox6').is(":checked") && $("#first_bae64_sign").val() != '' && $("#second_bae64_sign").val() != '' ){

                        $(".fourth_form_next").css("opacity","1"); // button opacity change
                        $(".fourth_form_next").css("cursor","pointer");
                        $(".fourth_form_next").prop("disabled", false);
                        
                        if ($('#checkbox3').is(":checked") && $('#checkbox4').is(":checked") )
                        {
                          $(".scr_first_modal").css("opacity","1");
                          $(".scr_first_modal").css("cursor","pointer");

                          $("#sec_scr_checkbox1").show();
                          $("#checkbox1").prop("checked", true);
                        }
                        else{
                            $(".scr_first_modal").css("opacity","0.5");
                            $(".scr_first_modal").css("cursor","auto");

                            $("#sec_scr_checkbox1").hide();
                            $("#checkbox1").prop("checked", false);
                        }
                    
                }else{

                    // for first modal
                    if ($('#checkbox3').is(":checked") && $('#checkbox4').is(":checked") )
                    {

                      $(".scr_first_modal").css("opacity","1");
                      $(".scr_first_modal").css("cursor","pointer");

                      $("#sec_scr_checkbox1").show();
                      $("#checkbox1").prop("checked", true);

                      // close modal first
                      $("#btnCloseModalPopup1").click(function () {
                          $("#myModal1").modal("hide");
                          $("#myBtn1").css("cursor","pointer");
                      });

                        if($("#req_gur_amt").val() != '' && $("#gur_period_month").val() != '' && $('#checkbox3').is(":checked") && $('#checkbox4').is(":checked") != '' && $('#checkbox5').is(":checked") && $('#checkbox6').is(":checked") && $("#first_bae64_sign").val() != '' && $("#second_bae64_sign").val() != '' ){

                            $(".fourth_form_next").css("opacity","1"); // button opacity change
                            $(".fourth_form_next").css("cursor","pointer");
                            $(".fourth_form_next").prop("disabled", false);

                        }else{

                            $(".fourth_form_next").css("opacity","0.5"); // button opacity change
                            $(".fourth_form_next").css("cursor","auto");
                            $(".fourth_form_next").prop("disabled", true);
                        }

                    }
                    else
                    {
                        $(".scr_first_modal").css("opacity","0.5");
                        $(".scr_first_modal").css("cursor","auto");

                        $("#sec_scr_checkbox1").hide();
                        $("#checkbox1").prop("checked", false);

                    }

                    // for second modal
                    if ($('#checkbox5').is(":checked") && $('#checkbox6').is(":checked") && $("#first_bae64_sign").val() != '')
                    { 
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

                            $(".fourth_form_next").css("opacity","1"); // button opacity change
                            $(".fourth_form_next").css("cursor","pointer");
                            $(".fourth_form_next").prop("disabled", false);

                        }else{

                            $(".fourth_form_next").css("opacity","0.5"); // button opacity change
                            $(".fourth_form_next").css("cursor","auto");
                            $(".fourth_form_next").prop("disabled", true);
                        }

                    }
                    else
                    {
                        // alert($("#first_bae64_sign").val());
                        $(".scr_sec_modal").css("opacity","0.5");
                        $(".scr_sec_modal").css("cursor","auto");

                        $("#sec_scr_checkbox2").hide();
                        $("#checkbox2").prop("checked", false);
                    }

                    

                    // $('#save_png').on('click', function() {
                    //     if($("#bae64_sign").val() != '' && $('#checkbox5').is(":checked") && $('#checkbox6').is(":checked") ){

                    //         $(".scr_sec_modal").css("opacity","1");
                    //         $(".scr_sec_modal").css("cursor","pointer");

                    //         $("#sec_scr_checkbox2").show();
                    //         $("#checkbox2").prop("checked", true);

                    //         // close modal second
                    //         $("#btnCloseModalPopup2").click(function () {
                    //             $("#myModal2").modal("hide");
                    //             $("#myBtn2").css("cursor","pointer");
                    //         });


                    //         if($("#req_gur_amt").val() != '' && $("#gur_period_month").val() != '' && $('#checkbox3').is(":checked") && $('#checkbox4').is(":checked") != '' && $('#checkbox5').is(":checked") && $('#checkbox6').is(":checked") && $("#bae64_sign").val() != '' ){

                    //             $(".fourth_form_next").css("opacity","1"); // button opacity change
                    //             $(".fourth_form_next").css("cursor","pointer");
                    //             $(".fourth_form_next").prop("disabled", false);

                    //         }else{

                    //             $(".fourth_form_next").css("opacity","0.5"); // button opacity change
                    //             $(".fourth_form_next").css("cursor","auto");
                    //             $(".fourth_form_next").prop("disabled", true);
                    //         }

                    //     }else{

                    //         $(".scr_sec_modal").css("opacity","0.5");
                    //         $(".scr_sec_modal").css("cursor","auto");

                    //         $("#sec_scr_checkbox2").hide();
                    //         $("#checkbox2").prop("checked", false);
                    //     }
                    // });


                    $(".fourth_form_next").css("opacity","0.5"); // button opacity change
                    $(".fourth_form_next").css("cursor","auto");
                    $(".fourth_form_next").prop("disabled", true);
                }

            });

            
            $(".fourth_form_next").click(function(){ 
                // alert(4555);

                var request_gurantee_amt = $("#req_gur_amt").val();  
                // alert(request_gurantee_amt);
                // var password=document.myform.password.value;  
                  
                // if (request_gurantee_amt==null || request_gurantee_amt=="" || request_gurantee_amt=="123"){  
                //   alert("Name can't be blank");  
                //   return false;  
                // }

                var numbers = /^[0-9]+$/;
                if(request_gurantee_amt.match(numbers))
                {
                    // alert(11);
                    $("#req_gur_amt_error").hide('fast');
                    return true;
                }
                else
                {
                    // alert(22);
                    $("#span_br").show('fast');
                    $("#req_gur_amt_error").show('fast');
                    return false;  

                }

            
            });


            // $(".fourth_form_next").click(function(){ alert(232);

            //     if($("#req_gur_amt").val() != '' && $("#gur_period_month").val() != '' && $("#checkbox3").val() != '' && $("#checkbox4").val() != '' && $('#checkbox5').is(":checked") && $('#checkbox6').is(":checked") && $("#bae64_sign").val() != '' ){

            //         var form = $("#myform");
            //         form.validate({
            //             errorElement: 'span',
            //             errorClass: 'help-block',
            //             highlight: function(element, errorClass, validClass) { 
            //                 $(element).closest('.form-group').addClass("has-error");
            //             },
            //             unhighlight: function(element, errorClass, validClass) { 
            //                 $(element).closest('.form-group').removeClass("has-error");
            //             },
            //             rules: {
                            
            //                 req_gur_amt: {
            //                     required: true,
            //                     number: true
            //                 },
                            
                            
            //             },
            //             messages: {
                            
            //                 req_gur_amt: {
            //                     required: "שדה חובה",
            //                     number: "אנא הזן את המספר"
            //                 },
                            
            //             }
                        
            //         });

            //         if (form.valid() === true){ alert(789);

            //             if($('#fourth_form_next').is(":visible")){
            //                 current_fs = $('#scr_third_form');
            //                 next_fs = $('#scr_fourth_form');
            //                 // $(".fourth_form_next").css("opacity","0.5"); // button opacity change
            //                 // $(".fourth_form_next").css("cursor","auto");
            //             }
                        
            //             next_fs.show(); 
            //             current_fs.hide();
                        
            //         }
            //         else{ alert(567);
            //             // $('.submit').css('opacity', '0.5');
            //         }
            //     }
            // });
            
            

            

            // $('#previous').click(function(){
            //     if($('#company_information').is(":visible")){
            //         current_fs = $('#company_information');
            //         next_fs = $('#account_information');
            //     }else if ($('#PropertyForm').is(":visible")){
            //         current_fs = $('#PropertyForm');
            //         next_fs = $('#account_information');
            //     }
            //     next_fs.show(); 
            //     current_fs.hide();
            // });

            // $('#property_previous').click(function(){
            //     if($('#PropertyForm').is(":visible")){
            //         current_fs = $('#PropertyForm');

            //         gurant_amm_pre = $("#req_gur_amt").val();

            //         if(gurant_amm_pre > 25000){
            //             next_fs = $('#company_information');
            //         }else{
            //             next_fs = $('#account_information');
            //         }

            //         // next_fs = $('#account_information');
            //     }
            //     next_fs.show(); 
            //     current_fs.hide();
            // });

            // $('#first_name,#last_name,#unique_id,#client_add,#client_phone,#client_email').on('keyup', function() {
            //     // alert("yes");
            //     // $(".scr_first_submit").css("opacity","0.5");
            //     if ($("#first_name,#last_name,#unique_id,#client_add,#client_phone,#client_email").valid()) {
            //         // alert("1");
            //         // $('#next_option').prop('disabled', false);  
            //         $(".scr_first_submit").css("opacity","1");
            //         // $(".fourth_form_next").css("opacity","1");
            //     } else {
            //         // alert("2");
            //         // $('#next_option').prop('disabled', 'disabled');
            //         $(".scr_first_submit").css("opacity","0.5");
            //         // $(".fourth_form_next").css("opacity","0.5");

            //     }
            // });

            


            // $('#gur_period_month,#req_gur_amt').on('keyup', function() {
            //     // alert("yes");
            //     // $(".scr_first_submit").css("opacity","0.5");
            //     if ($("#gur_period_month,#req_gur_amt").valid()) {

            //         var countChecked = function() {
            //           var n = $( "input:checked" ).length;
            //           // $( "#div11" ).text( n + (n === 1 ? " is" : " are") + " checked!" );
            //           var vv = n + (n === 1);

            //           if(vv == 8){ 
            //             // alert(11);
            //             $(".fourth_form_next").css("opacity","1");
            //             $(".fourth_form_next").css("cursor","pointer");
            //             $( "#div11" ).css("display", "none" );
            //           }
            //           else{ 
            //             // alert(22);
            //             $(".fourth_form_next").css("opacity","0.5");
            //             $(".fourth_form_next").css("cursor","auto");
            //             $( "#div11" ).text("שדה חובה" );

            //           }
            //           // alert(dd);

            //         };
            //         countChecked();
                     
            //         $( "input[type=checkbox]" ).on( "click", countChecked );
                    
            //     } else {
            //         // alert("2");
            //         $(".fourth_form_next").css("opacity","0.5");
            //         $(".fourth_form_next").css("cursor","auto");

            //     }
            // });

            // // second button for loader
            // $(".fourth_form_next").click(function(){ 
            //     $('#account_information').hide('fast');
            //     // alert(555);

            //     $('.sonar-wrapper').show('fast');

            //         // Counter Function
            //         var counter = 3;
            //         setInterval(function() {
            //         counter--;
            //         if (counter >= 0) {
            //           // span = document.getElementById("count");
            //           // span.innerHTML = counter;
            //         }
            //         // Display 'counter' wherever you want to display it.
            //         if (counter === 0) { 
            //         //    alert('this is where it happens');
            //             clearInterval(counter);
            //             $('#account_information').hide('fast');
            //             $('.sonar-wrapper').hide('fast');
            //             $('#scr_seven_form').show('fast');
            //             $(".scr_fourth_submit").css("opacity","0.5");
            //             $(".scr_fourth_submit").css("cursor","auto");
                        
            //         }

            //       }, 1000);
            // });

            // $('#sec_date_of_birth').on('click', function() {
            //     // alert("yes");
            //     // $(".scr_first_submit").css("opacity","0.5");
            //     if ($("#sec_date_of_birth").valid()) {
            //         // alert("1");
            //         // $('#next_option').prop('disabled', false);  
            //         $(".scr_first_submit").css("opacity","1");
            //         $(".fourth_form_next").css("opacity","1");
            //     } else {
            //         // alert("2");
            //         // $('#next_option').prop('disabled', 'disabled');
            //         $(".scr_first_submit").css("opacity","0.5");
            //         $(".fourth_form_next").css("opacity","0.5");
            //     }
            // });

            // $(".previous_scr").click(function(){
            //     if($('#scr_second_form').is(":visible")){
            //         current_fs = $('#scr_second_form');
            //         next_fs = $('#scr_first_form');
            //     }else if ($('#scr_third_form').is(":visible")){
            //         current_fs = $('#scr_third_form');
            //         next_fs = $('#scr_second_form');
            //     }
            //     // else if ($('#account_information').is(":visible")){
            //     //     current_fs = $('#account_information');
            //     //     next_fs = $('#scr_third_form');
            //     // }
            //     else if ($('#scr_seven_form').is(":visible")){
            //         current_fs = $('#scr_seven_form');
            //         next_fs = $('#PropertyForm');
            //     }else if ($('#scr_eight_form').is(":visible")){
            //         current_fs = $('#scr_eight_form');
            //         next_fs = $('#scr_seven_form');
            //     }
            //     next_fs.show(); 
            //     current_fs.hide();
            // });


            $(".check-box-1").click(function(){ 
                $("#box-1").prop("checked", true);
                $("#tab_a").show();
                $("#tab_b").hide();
                $(".check-box-1").css("opacity","1");
                $(".check-box-2").css("opacity","0.5");
            });
            $(".check-box-2").click(function(){ 
                $("#box-2").prop("checked", true);
                $("#tab_a").hide();
                $("#tab_b").show();
                $(".check-box-2").css("opacity","1");
                $(".check-box-1").css("opacity","0.5");
            });
            $(".check-box-1").css("opacity","0.5");


            // first modal
            $("#myBtn1").click(function(){

                 // show Modal
                 $('#myModal1').modal('show');
                 // $(".scr_first_modal").css("opacity","0.5");                 
            });

            


            

            // second modal
            $("#myBtn2").click(function(){

                 // show Modal
                $('#myModal2').modal('show');
                $('#modal2Div').show('fast');
                $('#signature-pad-2').hide('fast');
                $('#btnCloseModalPopup3').hide('fast');
                $('#btnCloseModalPopup2').show('fast');
                $('#signature-pad-1').show('fast');
                $('#modal3Div').hide('fast');

                // popup dynamic js 
                var firstName = $('#first_name').val();
                var lastName = $('#last_name').val();
                var client_id = $('#unique_id').val();
                $('#fullName').html(firstName+' '+lastName);
                $('#clientId').html(client_id);
                $('#nextfullName').html(firstName+' '+lastName);
                

                 // if ($('#account_information').is(":visible")){

                 //            // second part
                 //            var gurant_amm = $("#req_gur_amt").val();
                 //            // alert(gurant_amm); 

                 //            if(gurant_amm > 25000 ){
                                
                                
                 //            }else{

                 //                // SECOND MODAL POPUP
                 //                $('#myModal2').modal('show');
                 //                $('#modal2Div').show('fast');
                 //                $('#modal3Div').hide('fast');
                                
                 //                // current_fs = $('#account_information');
                 //                // next_fs = $('#PropertyForm');
                 //            }
                   
                 //    }

                 //    next_fs.show(); 
                 //    current_fs.hide();
            });

            // Third button for modal
            $("#myBtn3").click(function(){

                $('#myModal2').modal('show');
                $('#modal2Div').hide('fast');
                $('#modal3Div').show('fast');
                $('#signature-pad-1').hide('fast');
                $('#btnCloseModalPopup2').hide('fast');
                $('#btnCloseModalPopup3').show('fast');
                $('#signature-pad-2').show('fast');
                $(".scr_sec_modal").css("opacity","1");
                $(".scr_sec_modal").css("cursor","pointer");

                
                // popup dynamic js  
                var firstName = $('#first_name').val();
                var lastName = $('#last_name').val();
                var clientAdd = $('#client_add').val();
                var cAmount = $('#req_gur_amt').val();
                $('#next1fullName').html(firstName+' '+lastName);
                $('#clientAmount').html(cAmount);
                $('#address').html(clientAdd);

            });

            


            

            // if ($("input[type=checkbox]").is(":checked")) { 
            //     alert("Check box in Checked"); 
            // } else { 
            //     alert("Check box is Unchecked"); 
            // } 

   
    });


  
</script>



<!-- jQuery library -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
            

            <form method="post" enctype="multipart/form-data" id="myform" name="validate_form" action="<?php echo site_url('website/tenant_payment_api'); ?>" > 
                <!-- action="<?php echo site_url('website/tenant_payment_api'); ?>" -->


                <!-- First Modal -->
                <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel"><b>הסכמה למסירת נתוני אשראי  </b></h4>
                            </div>
                            <div class="modal-body">
                                
                             <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10 rtl" style="text-align: right;">
                                   
                                    <p>

                                        <div class="checkbox checkbox-danger check_box_popup0">
                                            <input id="checkbox3" type="checkbox" value="one" class="number">
                                            <label for="checkbox3">
                                                
                                            </label>
                                        </div>
                                        
                                     <!--  <input class="check_box_popup1" type="checkbox">  -->
                                    
                                      </p>
                                    
                                    <p class="check_box_para">

                                        <b>אני מבין כי טריא אינה מאפשרת לקחת הלוואה עבור אחרים ואני מצהיר בזה כי אני מבקש

                                            לקבל הלוואה בעבור עצמי בלבד.  </b>

                                            <br> <br>

                                             אני מתחייב להודיע לטריא בכתב בהקדם האפשרי על כל שינוי בפרטים שמסרתי לעיל; ידוע לי כי מסירת  מידע כוזב, לרבות אי-מסירת עדכון של פרט החייב בדיווח, במטרה שלא יהיה דיווח או כדי לגרום לדיווח  בלתי נכון לפי סעיף 7 לחוק איסור הלבנת הון, התש"ס-, מהווה עבירה פלילית.

                                   

                                    <p>
                                        
                                    <div class="checkbox checkbox-info check_box_popup00">
                                        <input id="checkbox4" type="checkbox" value="two" class="number">
                                        <label for="checkbox4">
                                           
                                        </label>
                                    </div>

                                    <p class="check_box_para">לצורך בדיקת הבקשה, אנחנו מתכוונים לפנות ללשכת אשראי על מנת לקבל חיווי אשראי. מובהר בזאת  שלצורך קבלת החיווי לשכת האשראי תגיש בקשה לבנק ישראל לקבלת נתוני אשראי לגביך הכלולים  במאגר.

                                        הפנייה ללשכת אשראי לצורך קבלת חיווי הינה בכל מקרה של בקשה לקבלת הלוואה באמצעות טריא.
                                    </p>

                                </p>

                                </div>

                                <div class="gform_footer" style="margin: 0 auto;"> 
                                    <a class="button gform_button" id="btnCloseModalPopup1" > <p class="first_modal_button continue_button scr_first_modal">המשך למסמך הבא  </p></a>
                                
                                </div>

                                <div class="col-md-1"></div>
                            </div>

                            </div>
                            <!-- <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div> -->
                        </div>
                    </div>
                </div>

                <!-- Second Modal -->
                <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel"><b>הלוואה למימון עמלת ערבות   </b></h4>
                            </div>
                            <div class="modal-body">
                                
                             <div class="row">
                                <div class="col-md-1"></div>

                                <!-- modal 2 -->
                                <div class="col-md-10 rtl" id="modal2Div" style="text-align: right;">
                                    
                                    <p style="margin: 10px 0px 0px 0px;">אני, החתום מטה, <span id="fullName" class="span_text"></span> בעל ת.ז. מס' <span id="clientId" class="span_text"></span> מאשר ומצהיר כמפורט להלן:   <br>1.    ידוע לי  כי תשלום העמלה לגולדנרוד פיננסים בע"מ, ח.פ. 513578674 (להלן: "גולדנרוד") בגין העמדת  הערבות (להלן: "העמלה") באמצעות הלוואה זו ומימון העמלה בדרך של קבלת הלוואה באמצעות טריא פי2פי   בע"מ )ח.פ. 515024131 )  או טריא קהילה פיננסית בע"מ (ח.פ. 515928034) (שתי החברות יקראו להלן: "טריא") הן עסקאות נפרדות. <br>

                                     2. אני מצהיר ומאשר שסכום ההלוואה יועבר במישרין  לגולדנרוד ובחתימתי על נספח זה אני מסכים לכל תנאי  ההלוואה וכן לכל תנאי האתר שבאמצעותו אקבל את ההלוואה ואני מורה לטריא להעביר את סכום ההלוואה  כאמור. 

                                     <br>

                                     3.  אני מאשר שידוע לי שטריא אינה שותפה או ערבה בצורה כלשהי לעסקי גולדנרוד, ואינה צד לעסקה זו, ולפיכך טענות הנוגעות לעמלה או טענות אחרות שעלולות להיות לי כלפי, לרבות בקשר עם העמלה, לא יהוו   עילה לאי תשלום ההלוואה ולא יפטרו אותי מתשלום החזרי ההלוואה לטריא. 

                                    </p>

                                    <br>

                                    <p>
                                        <!-- <input class="check_box_popup" type="checkbox">  -->
                                        <div class="checkbox checkbox-success check_box_popup01">
                                            <input id="checkbox5" name="checkbox5" type="checkbox" value="three" class="number1">
                                            <label for="checkbox5">
                                                
                                            </label>
                                        </div>
                                     
                                    <p style="margin: -38px 40px 0px 0px;"> 

                                       <b>אני מבין כי טריא אינה מאפשרת לקחת הלוואה עבור אחרים ואני מצהיר בזה כי אני מבקש   לקבל הלוואה בעבור עצמי בלבד.</b>
                                    </p>

                                    </p>

                                    <br>

                                    <p class="check_box_para">אני מתחייב להודיע לטריא בכתב בהקדם האפשרי על כל שינוי בפרטים שמסרתי לעיל; ידוע לי כי מסירת  מידע כוזב, לרבות אי-מסירת עדכון של פרט החייב בדיווח, במטרה שלא יהיה דיווח או כדי לגרום לדיווח  בלתי נכון לפי סעיף 7 לחוק איסור הלבנת הון, התש"ס-, מהווה עבירה פלילית. 

                                    </p>
                                   
                                    <p>
                                        <div class="checkbox check_box_popup02">
                                            <input id="checkbox6" name="checkbox6" type="checkbox" value="four" class="number1">
                                            <label for="checkbox6">
                                               
                                            </label>
                                        </div>

                                    <p class="check_box_para"> צורך בדיקת הבקשה, אנחנו מתכוונים לפנות ללשכת אשראי על מנת לקבל חיווי אשראי. מובהר בזאת   שלצורך קבלת החיווי לשכת האשראי תגיש בקשה לבנק ישראל לקבלת נתוני אשראי לגביך הכלולים  במאגר. הפנייה ללשכת אשראי לצורך קבלת חיווי הינה בכל מקרה של בקשה לקבלת הלוואה באמצעות טריא.

                                      <br>

                                      <p style="margin: 30px 40px 0px 0px;text-align: center;">

                                      <b>שם הלקוח:  </b><span id="nextfullName" class="span_text"></span> <b>חתימה דיגיטלית:  </b>



                                      </p>

                                      </p>
                                

                                </div>

                                <!-- modal 3 -->
                                <div class="col-md-10 rtl" id="modal3Div" style="text-align: right;">
                                   
                                    <p style="margin: 10px 0px 0px 0px;">

                                   שנערך ונחתם <?php echo date('F d, Y'); ?>

                                   <br>

                                   <br>

                                   בין      גולדנרוד  בע"מ ח.פ. 513578674 (להלן: "הערב")

                                   <br>

                                   מרח' יד חרוצים 12, תל אביב  <br>

                                   לבין  <span id="next1fullName" class="span_text"></span> <br>

                                   <span id="address" class="span_text"></span>  <br>

                                   <br>

                                  הואיל והערב עוסקת במתן שירותי אשראי והינה בעלת רישיון למתן אשראי כהגדרתו בחוק הפיקוח על שירותים  <br>

                                  פיננסיים (שירותים פיננסיים מוסדיים), התשע"ו2016-;  <br>

                                   והואיל   והערב הנפיקה ללקוח, לבקשתו, כתב ערבות שמספרו <b>1125469877</b> (להלן: "כתב הערבות"), לטובת   <br>

                                    <b>המוטב</b>, על סך <b><span id="clientAmount" class="span_text"></span></b> ₪ (להלן: "סכום הערבות"), המצורף בזאת כנספח א' להסכם זה;  <br>

                                     והואיל וברצון הצדדים להגדיר ולהסדיר את החובות אשר יחולו עליהם בקשר עם חילוט כתב הערבות ע"י  <br>

                                     המוטב. <br>

                                     <br>

                                     לפיכך הוסכם, הוצהר והותנה בין הצדדים כדלקמן: <br>

                                    <b> 1. מבוא ונספחים  </b><br>

                                     1.1.   המבוא להסכם וכן כל הנספחים המצורפים להסכם מהווים חלק בלתי נפרד הימנו.  <br>

                                     2.1.   כותרות הסעיפים נועדו לצורך הנוחיות בלבד ואין לפרש תנאי מתנאי ההסכם לפיהן. <br>

                                     3.1.   הצדדים מצהירים כי אין עליהם כל הגבלה, בין בהסכם, בין על פי דין ובין בכל אופן אחר, המונעת מכל אחד  <br>

                                    מהם או מגבילה אותם מלהתקשר בהסכם זה ולמלא את הוראותיו. <br>

                                    <b> 2.  ההתקשרות  </b><br>

                                     1.2.   במסגרת ההתקשרות הכללית בין הצדדים, הערב הנפיקה ללקוח כתב ערבות, אשר פרטיו מפורטים  <br> 

                                   במבוא להסכם זה, לטובתו של  המוטב, בו התחייבה להעביר לידי  המוטב את סכום הערבות במקרה שבו יבקש   <br>

                                   המוטב לממש את כתב הערבות. <br>

                                    2.2. במקרה של מימוש כתב הערבות ע"י  המוטב, מכל סיבה שהיא, החייב ישלם לחברה כל סכום אותו תידרש  <br>

                                   הערב לשלם למוטב. עבור כל יום איחור בתשלום סכום הערבות לחברה, ישלם החייב ריבית שנתית בגובה של  <br>

                                    <b>6</b> % מסכום הערבות.  <br>

                                    3.2.   במקרה של מימוש כתב הערבות ע"י  המוטב, יוכל החייב, על פי שיקול דעתו, להשתמש בהפניית הערב   <br>

                                   לקבלת הלוואה דרך חברת טריא בריבית שנתית קבועה של 9%. ההלוואה תעמוד לתקופה של 18 חודשים. <br>

                                   הענקת ההלוואה כפופה לאישור חיתום   הלקוח בטריא.  <br>

                                    4.2.    במקרה של שני ערבים לחייב החתומים כנגד שטר הערבות, כל אחד מהם יחויב להעביר לידי הערב את  <br>

                                   מלוא סכום הערבות כמפורט בסעיף 2.2, וזאת במקרה זה לא יוכלו החייבים לקבל הפנייה לקבלת הלוואה ו/או  <br>

                                   לא יעמדו בבדיקת הלקוח אותה תבצע טריא.   <br>

                                   <br>

                                   <b> 3.   תקופת ההסכם  </b><br>

                                    1.3.    הסכם זה יעמוד בתוקפו החל מיום האמור לעיל ויסתיים במוקדם מבין:  <br>

                                    (א) מועד סיום תקופת הערבות, הכוללת גם תקופה של חידוש ו/או הארכת הערבות;  <br>

                                    (ב) מועד קבלת מלוא סכום הערבות אשר הועבר למוטב ע"י הערב במסגרת חילוט הערבות.  <br>

                                   <b> 4.  מצגים  </b><br>

                                   הלקוח מצהיר בזאת, כדלקמן: <br>

                                    1.4. הוא בעל האמצעים הכלכליים לשיפוי הערב בכל סכום הערבות כשהוא צמוד מדד בערכיו המשוערכים  <br>

                                    2.4.   הוא אינו מוכר כפושט רגל ולא הוגשה בעניינו בקשת חייב ו/או בקשת נושה לפשיטת רגל, לא נפתח ו/או  <br>

                                   עומד נגדו הליך כלשהו של פשיטת רגל, כמשמעותה בפקודת פשיטת הרגל [נוסח חדש], תש"ם.-  <br>

                                    3.4. הוא אינו מוכר כחייב מוגבל באמצעים, כמשמעותו בסעיף 69ג לחוק ההוצאה לפועל, תשכ"ז.- ו/או  <br>

                                   חייב המשתמט מתשלום חובו כמשמעותו בסעיף 66 א' ....לחוק ...ואינו כלול במרשם החייבים המשתמטים   <br>

                                    נשוא סעיף 66 ו' לחוק...  <br>

                                    4.4.    הוא אינו מוכר כחייב אשר חשבונו הוגבל .......עפ"י סעיף 2 לחוק חוק שיקים ללא כיסוי, תשמ"א...- <br>

                                    ו/או אינו הוגדר כלקוח מוגבל חמור.בהתאם לסעיף 3 ...   <br>

                                    5.4.    ספרי הערב ישמשו כראייה לסכום חובו לחברה. <br>

                                   <b> 5.  התחייבויות הלקוח  </b><br>

                                    1.5.    הלקוח יידע את הערב אם אחד מהמצגים המנויים מעלה יחדול מלהתקיים במהלך תקופת ההסכם.  <br>

                                    2.5.   הלקוח ישלם לחברה, לפי דרישתה הראשונה, את מלוא סכום הערבות אותו העבירה למוטב, וזאת תוך 7 <br>

                                    ימים ממועד העברת סכום הערבות למוטב. <br>

                                    3.5.    הלקוח יפצה ו/או ישפה את הערב, לפי דרישתה הראשונה, בגין כל סכום ו/או הוצאה מכל סוג שהוא שתהיה  <br> 

                                   לחברה, במישרין ובעקיפין, בקשר עם גביית סכום הערבות מהלקוח.  <br>

                                   <b> 6.   כללי  </b><br>

                                    1.6.    הדין הישראלי יחול באופן בלעדי על הסכם זה, וסמכות השיפוט הבלעדית בכל הקשור להסכם זה תהיה   <br>

                                   מסורה לבתי המשפט המוסמכים בתל אביב. <br>

                                    2.6.    אם ייקבע ע"י ערכאה מסוימת כי הוראה מהוראות הסכם זה אינה ניתנת לאכיפה ו/או הינה חסרת תוקף  <br>

                                   מטעם כלשהו, לא יהא בכך כדי לפגום ו/או לבטל את תוקפן של יתר הוראות ההסכם.  <br>

                                    3.6.   הודעה שתישלח על פי כתובות הצדדים במבוא להסכם זה בדואר רשום, תיחשב כאילו הגיעה לצד שכנגד  <br> 

                                    ולידיעתו תוך 3 ימים מיום שיגורה בדואר רשום מבית דואר בישראל ואם נמסרה ביד – בעת מסירתה, ואם  <br>

                                   שוגרה בפקס או בדוא"ל – תוך 24 שעות ממועד שיגורה.  <br>
                                    <p style="margin: 10px 40px -40px 0px;text-align: center;"> <b>חתימה דיגיטלית: </b></p>

                                   </p>

                                    <br>

                                    <p>

                                </div>

                                <!-- signature css -->
                                <link rel="stylesheet" href="<?php echo base_url() ?>website_assets/signature/css/signature-pad.css">
                                
                                <!-- end -->

                                <div class="row">
                                   <div class="col-md-3"></div>
                                   <div class="col-md-6">
                                    <li class="gf_left_third gfield text-field1_application form-group" style="width: 100% !important; margin-top: 25px;">
                                    <!-- <label class="gfield_label control-label" for="client_sign">(חתום כאן בחתימה דיגיטלית (צריך טקסט</label> -->
                                    
                                    <div class="">
                                       
                                        <div id="signature-pad-1" class="signature-pad" style="border: 1px solid rgba(50, 52, 116, 0.5) !important;box-sizing: border-box !important;border-radius: 30px !important;height: 200px;" >
                                    <span>
                                        <i class="fa fa-refresh" aria-hidden="true" style="font-size: 14px; padding:5px;" data-action="clear"></i>
                                    </span>
                                            
                                          <div class="signature-pad--body">
                                            <canvas></canvas>
                                          </div>

                                          <div>
                                            <!-- <button type="button" class="button clear" data-action="clear">Clear</button>
                                            <button type="button" class="button" data-action="change-color">Change color</button>
                                            <button type="button" class="button" data-action="undo">Undo</button>
                                            
                                            <button type="button" id="save_png" class="button save" data-action="save-png">Save Signature</button> -->

                                          </div>
                                        </div>

                                    <!-- second signature pad -->
                                        <div id="signature-pad-2" class="signature-pad" style="border: 1px solid rgba(50, 52, 116, 0.5) !important;box-sizing: border-box !important;border-radius: 30px !important;height: 200px;" >
                                    <span>
                                        <i class="fa fa-refresh" aria-hidden="true" style="font-size: 14px; padding:5px;" data-action="clear2"></i>
                                    </span>
                                            
                                          <div class="signature-pad--body">
                                            <canvas></canvas>
                                          </div>
                                        </div>
                                    <!-- end -->
                                      
                                    </div>
                                </li>
                                </div>

                                   <div class="col-md-3"></div>
                                </div>

                                <!-- signature js -->
                                <script src="<?php echo base_url() ?>website_assets/signature/js/signature_pad.umd.js"></script>
                                <script src="<?php echo base_url() ?>website_assets/signature/js/app.js"></script>

                                    <!-- end -->

                                <input type="hidden" id="first_bae64_sign" name="first_base64_signature" value="" >

                                <input type="hidden" id="second_bae64_sign" name="second_base64_signature" value="" >

                        <!-- SIGNATURE END -->

                                <div class="gform_footer" style="margin: 0 auto;"> 
                                    <!-- first signature button -->
                                    <a class="button gform_button next" id="btnCloseModalPopup2" > <p class="first_modal_button continue_button scr_sec_modal">סיים  </p></a>

                                    <!-- second signature button -->
                                    <a class="button gform_button next" id="btnCloseModalPopup3" > <p class="first_modal_button continue_button scr_third_modal">סיים  </p></a>
                                
                                </div>

                                <div class="col-md-1"></div>
                            </div>

                            </div>
                            
                        </div>
                    </div>
                </div>

                <!-- third Modal -->
                <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel"><b>הלוואה למימון עמלת ערבות </b></h4>
                            </div>
                            <div class="modal-body">
                                
                             <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10 rtl" style="text-align: right;">
                                   
                                    <p>2019 תנש רבמטפס שדוחל 25 םויב ______ב םתחנו ךרענש ("ברעה" :ןלהל) 513578674 .פ.ח מ"עב דורנדלוג ןיב ביבא לת ,12 םיצורח די 'חרמ בודיוד סירוב ןיבל ביבא לת ,51 אבכוכ רב 'חרמ םיתוריש לע חוקיפה קוחב ותרדגהכ יארשא ןתמל ןוישיר תלעב הניהו יארשא יתוריש ןתמב תקסוע ברעהו ליאוה ;2016-ו"עשתה ,(םיידסומ םייסנניפ םיתוריש) םייסנניפ תבוטל ,("תוברעה בתכ" :ןלהל) 1125469877 ורפסמש תוברע בתכ ,ותשקבל ,חוקלל הקיפנה ברעהו ליאוהו ;הז םכסהל 'א חפסנכ תאזב ףרוצמה ,("תוברעה םוכס" :ןלהל) ₪ 24,000 ךס לע ,בטומה י"ע תוברעה בתכ טוליח םע רשקב םהילע ולוחי רשא תובוחה תא רידסהלו רידגהל םידדצה ןוצרבו ליאוהו .בטומה :ןמקלדכ םידדצה ןיב הנתוהו רהצוה ,םכסוה ךכיפל םיחפסנו אובמ .1 .ונמיה דרפנ יתלב קלח םיווהמ םכסהל םיפרוצמה םיחפסנה לכ ןכו םכסהל אובמה .1.1 .ןהיפל םכסהה יאנתמ יאנת שרפל ןיאו דבלב תויחונה ךרוצל ודעונ םיפיעסה תורתוכ .2.1 דחא לכמ תענומה ,רחא ןפוא לכב ןיבו ןיד יפ לע ןיב ,םכסהב ןיב ,הלבגה לכ םהילע ןיא יכ םיריהצמ םידדצה .3.1 .ויתוארוה תא אלמלו הז םכסהב רשקתהלמ םתוא הליבגמ וא םהמ תורשקתהה .2 םיטרופמ ויטרפ רשא ,תוברע בתכ חוקלל הקיפנה ברעה ,םידדצה ןיב תיללכה תורשקתהה תרגסמב .1.2 שקבי ובש הרקמב תוברעה םוכס תא בטומה ידיל ריבעהל הבייחתה וב ,בטומה לש ותבוטל ,הז םכסהל אובמב .תוברעה בתכ תא שממל בטומה שרדית ותוא םוכס לכ הרבחל םלשי בייחה ,איהש הביס לכמ ,בטומה י"ע תוברעה בתכ שומימ לש הרקמב .2.2 לש הבוגב תיתנש תיביר בייחה םלשי ,הרבחל תוברעה םוכס םולשתב רוחיא םוי לכ רובע .בטומל םלשל ברעה .תוברעה םוכסמ % 6 ברעה תיינפהב שמתשהל ,ותעד לוקיש יפ לע ,בייחה לכוי ,בטומה י"ע תוברעה בתכ שומימ לש הרקמב .3.2 .םישדוח 18 לש הפוקתל דומעת האוולהה .%9 לש העובק תיתנש תיבירב אירט תרבח ךרד האוולה תלבקל .אירטב חוקלה םותיח רושיאל הפופכ האוולהה תקנעה תא ברעה ידיל ריבעהל ביוחי םהמ דחא לכ ,תוברעה רטש דגנכ םימותחה בייחל םיברע ינש לש הרקמב .4.2 וא/ו האוולה תלבקל היינפה לבקל םיבייחה ולכוי אל הז הרקמב תאזו ,2.2 ףיעסב טרופמכ תוברעה םוכס אולמ .אירט עצבת התוא חוקלה תקידבב ודמעי אל םכסהה תפוקת .3 :ןיבמ םדקומב םייתסיו ליעל רומאה םוימ לחה ופקותב דומעי הז םכסה .1.3 ;תוברעה תכראה וא/ו שודיח לש הפוקת םג תללוכה ,תוברעה תפוקת םויס דעומ (א) .תוברעה טוליח תרגסמב ברעה י"ע בטומל רבעוה רשא תוברעה םוכס אולמ תלבק דעומ (ב) םיגצמ .4 :ןמקלדכ ,תאזב ריהצמ חוקלה םיכרעושמה ויכרעב דדמ דומצ אוהשכ תוברעה םוכס לכב ברעה יופישל םיילכלכה םיעצמאה לעב אוה .1.4 וא/ו חתפנ אל ,לגר תטישפל השונ תשקב וא/ו בייח תשקב וניינעב השגוה אלו לגר טשופכ רכומ וניא אוה .2.4 .-ם"שת ,]שדח חסונ[ לגרה תטישפ תדוקפב התועמשמכ ,לגר תטישפ לש והשלכ ךילה ודגנ דמוע וא/ו .-ז"כשת ,לעופל האצוהה קוחל ג69 ףיעסב ותועמשמכ ,םיעצמאב לבגומ בייחכ רכומ וניא אוה .3.4 םיטמתשמה םיבייחה םשרמב לולכ וניאו... קוחל.... 'א 66 ףיעסב ותועמשמכ ובוח םולשתמ טמתשמה בייח ...קוחל 'ו 66 ףיעס אושנ ...-א"משת ,יוסיכ אלל םיקיש קוח קוחל 2 ףיעס י"פע....... לבגוה ונובשח רשא בייחכ רכומ וניא אוה .4.4 ... 3 ףיעסל םאתהב.רומח לבגומ חוקלכ רדגוה וניא וא/ו .הרבחל ובוח םוכסל הייארכ ושמשי ברעה ירפס .5.4 חוקלה תויובייחתה .5 .םכסהה תפוקת ךלהמב םייקתהלמ לודחי הלעמ םייונמה םיגצמהמ דחא םא ברעה תא עדיי חוקלה .1.5 7 ךות תאזו ,בטומל הריבעה ותוא תוברעה םוכס אולמ תא ,הנושארה התשירד יפל ,הרבחל םלשי חוקלה .2.5 .בטומל תוברעה םוכס תרבעה דעוממ םימי היהתש אוהש גוס לכמ האצוה וא/ו םוכס לכ ןיגב ,הנושארה התשירד יפל ,ברעה תא הפשי וא/ו הצפי חוקלה .3.5 .חוקלהמ תוברעה םוכס תייבג םע רשקב ,ןיפיקעבו ןירשימב ,הרבחל יללכ .6 היהת הז םכסהל רושקה לכב תידעלבה טופישה תוכמסו ,הז םכסה לע ידעלב ןפואב לוחי ילארשיה ןידה .1.6 .ביבא לתב םיכמסומה טפשמה יתבל הרוסמ ףקות תרסח הניה וא/ו הפיכאל תנתינ הניא הז םכסה תוארוהמ הארוה יכ תמיוסמ האכרע י"ע עבקיי םא .2.6 .םכסהה תוארוה רתי לש ןפקות תא לטבל וא/ו םוגפל ידכ ךכב אהי אל ,והשלכ םעטמ דגנכש דצל העיגה וליאכ בשחית ,םושר ראודב הז םכסהל אובמב םידדצה תובותכ יפ לע חלשיתש העדוה .3.6 םאו ,התריסמ תעב – דיב הרסמנ םאו לארשיב ראוד תיבמ םושר ראודב הרוגיש םוימ םימי 3 ךות ותעידילו .הרוגיש דעוממ תועש 24 ךות – ל"אודב וא סקפב הרגוש</p>

                                </div>

                        

                                <div class="gform_footer" style="margin: 0 auto;"> 
                              
                                    <a class="button gform_button next"> <p class="first_button-new continue_button">םייס </p></a>
                                </div>
                                <div class="col-md-1"></div>
                            </div>

                            </div>
                            
                        </div>
                    </div>
                </div>



                <!-- screen 01 -->
<!--                <div id="scr_first_form" class="gform_body">
                    <p class="" style="text-align:center;font-weight: bold;"> OBLI היי, אנחנו  </p> 

                     <p class="rtl" style="text-align:center;">ואנחנו כאן כדי לפתוח בפניכם אפשרות  <br>חדשה לקבלת ערבות לשכירות. </p><br>

                
                     <p class="rtl" style="text-align:center;"> ערבות דיגיטלית מתקדמת בלי כסף <br>שכלוא בבנק, בלי בירוקרטיה ובלי <br>בנק בכלל!</p>

                  
                    <br>

                    <div class="row">
                        <div class="col-md-3 col-sm-3"></div>
                        <div class="col-md-6 col-sm-6">
                            <a class="button gform_button next"> <p class="first_main_button text_size" >לקוח פרטי</p></a>
                             
                            <a class="button gform_button next"> <p class="first_main_button text_size" > לקוח עסקי</p></a>
                        </div>
                        <div class="col-md-3 col-sm-3"></div>
                    </div>
                    <br><br><br><br><br><br><br>

                </div>-->
               


                <!-- screen 02 -->
                <div id="scr_second_form" class="gform_body">  

                   <p class="" style="text-align:center;font-weight: bold; font-size: 44px;">:בחרו את המסלול המועדף עליכם</p>

                    <div class="tabs">
                        <div class="">
                            <div class="row">
                                <div class="col-xl-2 section light-bg" style="margin-top:50px;">
                                    <ul class="nav nav-pills nav-stacked flex-column">


                                        <li class="box-border frb frb-default check-box-1 screen2-box1 mobile_box1 flex screen02_box-res1" style="float: left; width: 48%; text-align: center;border: 1.33333px solid rgb(58, 48, 120); box-shadow: rgba(24, 33, 112, 0.2) 0px 10px 30px 0px; background: #F7F7F7; margin-top: 2px;">
                                            <a  href="#tab_a" data-toggle="pill">
                                          <!--  <img src="http://oblidev.malul.xyz/website_assets/img/oblia1.png" class="img-responsive tab_image-obli" style="height: 209px;">
                                           מסלול ללא עמלה</a> -->
                                           <img src="http://oblidev.malul.xyz/website_assets/img/oblia1.png" class="img-responsive tab_image-obli" style="height: 209px;">
                                           <span style="position: relative;top: -30px;font-size: 21.3333px;">
                                           מסלול ללא עמלה</span>
                                            </a>

                                            <label for="radio-button-0" class="radio" >
                                             
                                             <input type="radio" name="radio-box" id="box-1" class="check-box-3" >
                                            </label>
                                        </li>
                         
                          
                                        <li class="box-border frb frb-default check-box-2 mobile_box2 flex screen02_box-res2" style="float: right; width: 48%; text-align: center; border: 1.33333px solid rgb(58, 48, 120); box-shadow: rgba(24, 33, 112, 0.2) 0px 10px 30px 0px; background: #F7F7F7;">
                                            <a href="#tab_b" data-toggle="pill"> 
                                           <!-- <img src="http://oblidev.malul.xyz/website_assets/img/oblib1.png" class="img-responsive tab_image-obli">מסלול ללא פיקדון</a> -->
                                           <img src="http://oblidev.malul.xyz/website_assets/img/oblib1.png" class="img-responsive tab_image-obli">
                                           <span style="position: relative;top: -30px;font-size: 21.3333px;">מסלול ללא פיקדון</span>
                                           </a>

                                            <label for="radio-button-1" class="radio">
                                             
                                             <input type="radio" name="radio-box" id="box-2" checked="checked" class="check-box-4" >
                                              
                                            </label>
                                        </li>

                                        <!-- <div class="flex">
                                          <input type="radio" name="radio" id="radio1" />
                                          <label for="radio1">RadioButton1</label>
                                        </div>
                                        <div class="flex">
                                          <input type="radio" name="radio" id="radio2" />
                                          <label for="radio2">RadioButton2</label>
                                        </div> -->

                                    </ul>
                                </div>
                                <div class="col-xl-6">
                                    
                                    <div class="tab-content">
                                        <div class="tab-pane" id="tab_a" style="margin-top: 70px;">
                                        <p style="text-align: center; font-weight: bold;">לא רוצים לשלם עמלה? </p>       
                                        <p class="rtl" style="text-align: center; margin-top: -10px;">נשמח להעניק לכם ערבות עם פקדון אך ללא עמלה. </p>
                                         <!-- <p style="text-align: center;">נשמח לספק לך הפקדה ללא פיקדון. </p> -->
                                        </div>

                                        <div class="tab-pane active rtl" id="tab_b" style="padding: 20px; margin-top: 50px;"> 
                                             <p style="text-align: center; font-weight: bold;">מתקשים לגייס את סכום הערבות?  </p>       
                                            <!--  <p style="text-align: center;">להעניק לכם ערבות ללא פיקדון <br>נשמח<br> תמורת עמלה של 6%.</p> -->

                                             <p style="text-align: center;  margin-top: -10px;">שמח להעניק לכם ערבות ללא פיקדון תמורת עמלה של 6%.</p>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                  <div class="gform_footer top_label"> 
                        <!-- <a class="button gform_button previous_scr"> <p class="first_next_button screen_2_buttons">הקודם</p></a> -->
                        <!-- אז איך אפשר לעזור לכם? -->
                        <a class="button gform_button next"> <p class="first_next_button screen-button-obli screen-button2-obli screen-button3-obli screen_2_buttons padding_screen02 text_size" style="margin: 0px 180px;">המשך </p></a>
                    </div>

                </div>



                <!-- screen 03 -->
                <div id="scr_third_form" class="gform_body form_height" style="margin-top: 30px;">

                        <div class="" style="float: right; margin-left:15px; margin-top:-25px;">
                            <img src="<?php echo base_url() ?>website_assets/img/progress1.png" class="img-responsive">
                           
                        </div>
                    <p class="rtl" style="text-align:right;font-weight: bold;font-size: 22px;">פרטים אישיים </p>

                    <p class="rtl" style="text-align:right; margin-top: -8px;">השלב הבא: סכום הערבות</p>

                    
                    <br>

                    <ul class="gform_fields top_label ">

                        <li class="gfield gfield_html gfield_no_follows_desc "> 
                           <!--  <h1 class="page-subtitle page-subtitle_application">צור קשר</h1> -->
                           
                            <p class="contact-text_application">נשמח להציע לכם ערבות לשכר הדירה, וגם להכיר אתכם  </p>
                         </li>

                        <li class="gfield gf_left_third text-field1_application form-group">
                            <!-- <label class="gfield_label control-label" for="first_name"> שם פרטי
                            </label>

                            <div class="">
                               <input type="text" name="first_name" id="first_name" value="" class="form-control">
                            </div> -->

                            <div class="styled-input wide">
                               <input type="text" name="first_name" id="first_name" value="" class="form-control left_lbl1" required="">
                                <label class="gfield_label control-label gform_wrapper gfield_label" for="first_name"> שם פרטי
                            </label>
                            </div> 
                        </li>

                        <li class="gf_middle_third gfield text-field2_application form-group">
                            <!-- <label class="gfield_label control-label" for="last_name">שם משפחה </label>
                            
                            <div class="">
                               <input type="text" name="last_name" id="last_name" value="" class=" form-control">
                            </div> -->


                            <div class="styled-input wide">
                               <input type="text" name="last_name" id="last_name" value="" class="form-control second_text" required="">
                                <label class="gfield_label control-label gform_wrapper gfield_label" for="last_name">שם משפחה
                            </label>
                            </div>
                        </li>   

                        <li class="gf_left_third gfield text-field1_application form-group">
                           <!--  <label class="gfield_label control-label" for="unique_id">ת.ז</label>
                            
                            <div class="">
                               <input type="text" name="unique_id" id="unique_id" value="" class="form-control">
                            </div> -->

                            <div class="styled-input wide">
                               <input type="text" name="unique_id" id="unique_id" value="" class="form-control third_text" required="">
                                <label class="gfield_label control-label gform_wrapper gfield_label" for="unique_id">ת.ז  
                            </label>
                            </div> 
                        </li>

                        <li class="gf_left_third gfield text-field2_application form-group">
                            
                            <!-- <label class="gfield_label control-label" for="client_photo"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">צילום ת.ז
                            </font></font></label>

                            <div class="">
                               <input type="file" name="client_photo" id="client_photo" class="input_application form-control" value="" >
                            </div> -->

                           <!--  <div id="selected-file" style="padding-top:40px; display: none;">
                                 <span><i style="font-size:24px; margin-left: 0px; float:right;" class="fa">&#xf15c;</i></span>
                                 <label style="margin-left:94px; font-size:15px; max-width: 52%;" id="file-name-label"></label>
                                 <span onclick="removeFile()" class="file-close-icon"><i style="font-size:24px; margin-left:0px;" class="fa">&#xf00d;</i></span>
                            </div> -->
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

                                 
                                 
                                 
                                 <!-- <i class="fa fa-file-text-o"></i></span> -->
                               
                             </div>

                           <input type="file" name="file-2" id="file-2" class="inputfile inputfile-2" accept="image/gif,image/png,image/jpeg,image/jpg,application/pdf" style="display: none;" onchange="f()">

                            <label for="file-2" id="label-for-file2" style="margin-top: 8px;padding: 13.5px;">

                               <i style="font-size:22px; margin-left: 60px;" class="fa">&#xf030;</i>
                                <span style="font-weight: 200; font-size: 22px; margin-left:70px; padding-top: 6px;">צילום ת.ז </span>
                            </label>

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
                               <!-- <textarea class="input_application textarea large form-control" name="No_Home" rows="5" cols="50" id="No_Home" style="max-height: 56px;" class="form-control" required=""></textarea> -->
                               <input type="text" name="home_no" id="home_no" value="" class="form-control No_Home_text" required="">

                               <label class="gfield_label control-label gform_wrapper gfield_label" for="No_Home">מס’ בית
                            </label>
                            </div> 
                        </li>

                        <!-- <li class="gf_left_third gfield text-field1_application form-group">
                          
                             <div class="styled-input wide">
                               <textarea class="input_application textarea large form-control" name="client_add" rows="5" cols="50" id="client_add" style="max-height: 56px;" class="form-control" required=""></textarea>
                                <label class="gfield_label control-label gform_wrapper gfield_label fouth_text1" for="client_add">כתובת מגורים נוכחית  
                            </label>
                            </div> 
                        </li> -->
                       
                        <li class="gfield gf_left_third text-field2_application form-group">
                            <!-- <label class="gfield_label control-label" for="client_phone"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">טלפון נייד
                          </font></font></label>

                            <div class="">
                               <input type="text" name="client_phone" id="client_phone" value="" class="form-control">
                            </div> -->

                            <div class="styled-input wide">
                               <input type="text" name="client_phone" id="client_phone" value="" class="form-control client_phone_text"  required="" >
                                <label class="gfield_label control-label gform_wrapper gfield_label" for="client_phone">טלפון נייד
                            </label>
                            </div> 
                        </li>

                        <li class="gfield gf_left_third text-field1_application form-group">
                            <!-- <label class="gfield_label control-label" for="client_email"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">דוא”ל
                          </font></font></label>

                            <div class="">
                               <input type="email" name="client_email" id="client_email" value="" class=" form-control">
                            </div> -->

                            <div class="styled-input wide">
                               <input type="text" name="client_email" id="client_email" value="" class="form-control fifth_text" required="">
                                <label class="gfield_label control-label gform_wrapper gfield_label" for="client_email">דוא”ל
                            </label>
                            </div> 
                        </li>
                        
                         <li class="gfield gf_left_third text-field2_application form-group">
                            <label class="gfield_label control-label" for="current_residence"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">מין
                          </font></font>
                      <div class=""style="float: left; margin-right: 15px;">
                                <br>
                              <label for="radio-button-1" class="radio gfield_label control-label">
                             
                           <!--   <input type="radio" name="radio-box" id="box-2" checked="checked">רכז -->
                             <input type="radio" name="client_gender" value="זכר" id="box-2" checked="checked" value="30" style="left: 55px; top: -6px;">זכר
                              
                            </label>
                           
                              <label for="radio-button-0" class="radio gfield_label control-label" style="top: -30px;right: 105px;">
                             
                             <input type="radio" name="client_gender" value="נקבה" id="box-1" style="left: 69px;top: -6px;">נקבה
                            </label>
                            </div>
                        </label>

                            
                        </li>

                        <li class="gfield gf_left_third text-field1_application form-group">
                            <!-- <label class="gfield_label control-label" for="client_date_of_birth"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">תאריך לידה
                          </font></font></label>
                          <i class="fa fa-calendar" aria-hidden="true"></i>

                            <div class="">
                               <input class="form-control" type="text" name="client_date_of_birth" id="client_date" value="23/10/2019" data-format="DD/MM/YYYY"   />
                            </div> -->

                            <div class="styled-input wide">
                               <input type="text" name="client_date_of_birth" id="datepicker" data-format="DD/MM/YYYY" class="form-control sixth_text" required="" autocomplete="off">
                               <!-- <i class="fa fa-calendar" aria-hidden="true"></i> -->
                                <label class="gfield_label control-label gform_wrapper gfield_label" for="client_date">תאריך לידה
                                     <!-- <i class="fa fa-calendar cal_reponsive1" aria-hidden="true" style="position: relative; left: -165px;"></i> -->
                                     <img src="<?php echo base_url() ?>website_assets/img/calendar_icon.png" class="img-responsive cal_reponsive1" style="position: relative; left: -180px; top: -5px;">
                            </label>
                            </div>
                        </li>

                        



                    </ul>

                    <!-- <div class="gform_footer top_label"> 
                       <input type="submit" id="gform_submit_button_5" class="gform_button button next" value="שהמשך " tabindex="54"> 
                    </div> -->
                
                    <div class="gform_footer "> 
                       <!--  <a class="button gform_button previous_scr"> <p class="first_next_button">הקודם</p></a> -->
                        <a class="button gform_button" ><p class="first_next_button scr_first_submit" id="third_form_next" style="font-weight: bold; font-size: 22px;">המשך</p> </a>
                    </div>
                   <!--  <div class="row">
                        <div class="col-md-3 col-sm-3"></div>
                        <div class="col-md-6 col-sm-6">
                            <a class="button gform_button next"> <p class="first_main2_button" >ערבות לשכר דירה</p></a>
                            <br>
                             
                            <a class="button gform_button next"> <p class="first_main2_button screen-button-obli" >בקרוב הבטחת צ'קים לשכר דירה</p></a>
                            <br>
                            <a class="button gform_button previous_scr"> <p class="first_main2_button">הקודם</p></a>
                        </div>
                        <div class="col-md-3 col-sm-3"></div>
                    </div> -->

                   <!--  <li class="gfield gf_left_third text-field1_application form-group">
                        <img src="<?php echo base_url() ?>website_assets/img/L3.png">
                    </li>

                    <li class="gfield gf_left_third text-field1_application form-group">
                        <img src="<?php echo base_url() ?>website_assets/img/L4.png">
                    </li> -->

                </div>




            <!-- screen 04  -->
                <div id="scr_fourth_form" class="gform_body form_height" style="margin-top: 30px;">
                     
                    <ul class="gform_fields top_label ">

                        <li class="gfield gfield_html gfield_no_follows_desc text_resp">
                           <!-- <div class="progress-circle p33" style="float: right; margin-left:15px; margin-top:-25px;">
                            <span style="direction: ltr;">2 / 5</span>
                           <div class="left-half-clipper">
                              <div class="first50-bar"></div>
                              <div class="value-bar"></div>
                           </div>
                           </div> -->
                           <div class="" style="float: right; margin-left:15px; margin-top:-25px;">
                            <img src="website_assets/img/progress2.png" class="img-responsive">
                           
                           </div>
                            <p class="contact-text_application"style="font-weight: bold;">סכום הערבות והסכמים</p>
                           
                             <p class="contact-text_application" style="margin-top: -20px;">השלב הבא: פרטים על הנכס  </p>
                         </li>

                    

                    </ul>

                    <div class="row" style="margin-top: 70px;">

                        <li class="gf_middle_third gfield text-field1_application form-group">
                           <!--  <label class="gfield_label control-label" for="req_gur_amt" style="margin-top:28px;">סכום הערבות המבוקש  </label>
                            
                            <div class="">
                               <input type="text" name="req_gur_amt" id="req_gur_amt" value="" class=" form-control" autocomplete="off">

                               <span id="req_gur_amt_error" style="float: right;" ><font style="vertical-align: inherit;">אנא הזן את המספר </font></span>
                            </div> -->
                            <div class="styled-input wide" >
                               <input type="text" name="req_gur_amt" id="req_gur_amt" value="" class="form-control fouth_text" autocomplete="off" required="">

                               <span id="req_gur_amt_error" style="float: right;" ><font style="vertical-align: inherit;">אנא הזן את המספר </font></span>

                                <label class="gfield_label control-label gform_wrapper gfield_label" for="req_gur_amt">סכום הערבות המבוקש  
                            </label>
                            </div> 
                        </li>

                        <li class="gfield gf_left_third text-field2_application form-group">
                           <!--  <label class="gfield_label control-label" for="gur_period_month">תקופת הערבות בחודשים
                            </label>
                            <i class="fa fa-calendar" aria-hidden="true"></i>

                            <div class="">
                               
                               <input type="text" name="gur_period_month" id="gur_period_month" class="form-control daterange" data-time-picker="true" data-time-picker-increment="5" data-format="DD/MM/YYYY" autocomplete="off">

                               

                            </div> -->
                            <div class="styled-input wide">
                               <input type="text" name="gur_period_month" id="field-5" value="" class="form-control daterange seventh_text" data-format="MM/DD/YYYY" autocomplete="off" required="">

                               <input type="hidden" name="startDate" id="startDate" >
                               <input type="hidden" name="endDate" id="endDate" >

                                <label class="gfield_label control-label gform_wrapper gfield_label" for="gur_period_month">תקופת הערבות בחודשים 
                                     <!-- <i class="fa fa-calendar cal_reponsive2" aria-hidden="true" style="position: relative; left: -318px;"></i> -->
                                     <img src="<?php echo base_url() ?>website_assets/img/calendar_icon.png" class="img-responsive cal_reponsive2" style="position: relative;left: -150px;top: -28px;">
                            </label>
                            </div> 
                        </li>
                        <!-- <span id="span_br"> <br></span> --><br><br><br>
                        <div class="row cale_opn">
                            
                            <div class="col-md-6">
                              <li class="gfield gf_left_third form-group">
                            <div class="gform_footer first_button_new-text2" id="myBtn2"> 
                       
                                <a class="" > 
                                    <p class="first_button-new first_button_responsive p1_res" style="margin-top:-10px; margin-left:70px;" >בקשה לפריסת עמלת הערבות </p>
                                </a>
                       
                                <div class="checkbox checkbox-warning primary-box chk2_res" id="sec_scr_checkbox2" style="margin-right:-34px;">
                                    <input id="checkbox2" name="checkbox2" type="checkbox" value="" >
                                    <label for="checkbox2">
                                       
                                    </label>
                                </div>
                            </div>
                        </li>
                            </div>
                            <div class="col-md-6">
                                <li class="gfield gf_left_third form-group">
                            <div class="gform_footer first_button_new-text1" id="myBtn1" style="margin-top:0px;"> 
                       
                                <a>
                                    <p class="first_button-new first_button_responsive p2_res" style="margin-top:10px; margin-left:20px;">הסכמה למסירת נתוני אשראי </p>
                                </a>    
                                <!-- <input type="checkbox" style="float: right; margin-right: 15px;"> -->
                                <div class="checkbox checkbox-primary primary-box chk1_res" id="sec_scr_checkbox1">
                                    <input id="checkbox1" name="checkbox1" type="checkbox" value="">
                                    <label for="checkbox1">
                                    </label>
                                </div>
                            </div>
                      

                        </li>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <li class="gfield gf_left_third form-group">
                            <div class="gform_footer first_button_new-text1" id="myBtn3"> 
                       
                                <a >
                                    <p class="first_button-new first_button_responsive p3_res" style="margin-left: 20px; margin-top: -30px;">בהסכם שיפוי</p>
                                </a>    
                                <!-- <input type="checkbox" style="float: right; margin-right: 15px;"> -->
                                <div class="checkbox checkbox-primary primary-box chk3_res" id="sec_scr_checkbox3">
                                    <input id="btn3_checkbox" name="btn3_checkbox" type="checkbox" value="">
                                    <label for="btn3_checkbox">
                                    </label>
                                </div>
                            </div>
                      

                        </li>
                    </div>
                            
                        </div>
                        <!-- <li class="gfield gf_left_third text-field1_application form-group">
                            <div class="gform_footer first_button_new-text1" id="myBtn1"> 
                       
                                <a>
                                    <p class="first_button-new first_button_responsive">הסכמה למסירת נתוני אשראי </p>
                                </a>    
                               
                                <div class="checkbox checkbox-primary primary-box" id="sec_scr_checkbox1">
                                    <input id="checkbox1" name="checkbox1" type="checkbox" value="">
                                    <label for="checkbox1">
                                    </label>
                                </div>
                            </div>
                      

                        </li> -->
                        <!-- <span id="span_br1"> <br></span> -->

                        <!-- <li class="gfield gf_left_third text-field1_application form-group">
                            <div class="gform_footer first_button_new-text2" id="myBtn2"> 
                       
                                <a class="" > 
                                    <p class="first_button-new first_button_responsive" style="margin-left:-6px;">בקשה לפריסת עמלת הערבות </p>
                                </a>
                       
                                <div class="checkbox checkbox-warning primary-box" id="sec_scr_checkbox2">
                                    <input id="checkbox2" name="checkbox2" type="checkbox" value="" >
                                    <label for="checkbox2">
                                       
                                    </label>
                                </div>
                            </div>
                        </li> -->

                        <!-- <li class="gfield gf_left_third text-field2_application form-group" style="float: right;">
                            <div class="gform_footer first_button_new-text1" id="myBtn3"> 
                       
                                <a >
                                    <p class="first_button-new first_button_responsive">בקשה לפריסת עמלת הערבות </p>
                                </a>    
                                
                                <div class="checkbox checkbox-primary primary-box" id="sec_scr_checkbox1">
                                    <input id="btn3_checkbox" name="btn3_checkbox" type="checkbox" value="">
                                    <label for="btn3_checkbox">
                                    </label>
                                </div>
                            </div>
                      

                        </li> -->

                        <div id="div11" style="color:red;  font-size:17px;"></div>



                        </div>

                        <div class="gform_footer"> 
                      
                        <!-- <a class="button gform_button next" id="" > <p class="first_button-new continue_button fourth_form_next">המשך  </p></a> -->

                        <input type="submit" class="gform_button button first_button-new continue_button fourth_form_next first_next_button next lowerbutton1" value="המשך " tabindex="54" style="height: 60px; width: 328px;" > 
                        
                        </div>
              </div>

                </div>

            </div>

            
                  
                
                   <!-- screen 4/5 -->
                    <div id="greaterThan2500Scr" class="gform_body form_height" style="margin-top: 30px;">
                    <!--  <div class="progress-circle over50 p66" style="float: right; margin-left:15px; margin-top:-25px;">
                        
                            <span style="direction: ltr;">4 / 5</span>
                           <div class="left-half-clipper">
                              <div class="first50-bar"></div>
                              <div class="value-bar"></div>
                           </div>
                           </div> -->
                            <div class="" style="float: right; margin-left:15px; margin-top:-25px;">
                            <img src="<?php echo base_url() ?>website_assets/img/progress4.png" class="img-responsive">
                           
                           </div>
                     <p class="rtl" style="text-align:right;font-weight: bold;font-size: 22px;">קבלת ערבות  </p>

                    <p class="rtl" style="text-align:right; margin-top: -8px;">זהו, שלב אחרון  </p>

                     <p class="rtl" style="text-align:center; margin-top: 50px;">כדי להשלים את התהליך ולקבל את הערבות נזדקק לפרטים הבאים: </p>

                     <img src="http://oblidev.malul.xyz/website_assets/img/obliz.png" class="img-responsive tab_image-obli">
    
                    <p class="rtl" style="text-align:center;font-weight: bold;">הגעת לשלב האחרון! </p>

                

                    <br>
                    <div class="row">
                        <div class="col-md-3 col-sm-3"></div>
                        <div class="col-md-6 col-sm-6">
                            <a class="button gform_button " id="myBtn3"> <p class="first_button-new" >הסכם שיפוי  </p></a>
                             
                            <a class="button gform_button next"> <p class="first_main_button scr_third_submit" >סיים  </p></a>
                        </div>
                        <div class="col-md-3 col-sm-3"></div>
                    </div>
                    <br><br><br>

                   <!--  <div class="row">
                        <div class="col-md-2 col-sm-2"></div>
                        <div class="col-md-8 col-sm-8">
                             <div class="col-md-6 col-sm-6"><div class="box-button1"><p> סכום לא אושר  </p></div></div>
                             <div class="col-md-6 col-sm-6"> <div class="box-button2"><p> גרסא 1 </p></div></div>
                            
                        </div>
                        <div class="col-md-2 col-sm-2"></div>
                    </div> -->

                </div>


                   
                

           <!-- screen X -->
                 <div id="PropertyForm" class="gform_body form_height" style="margin-top: 30px;">
                     <!-- <div class="progress-circle over50 p66" style="float: right; margin-left:15px; margin-top:-25px;">
                           <span>
                            <i class="fa fa-close" style="font-size:40px; margin-left:-6px;"></i>
                            </span>
                           <div class="left-half-clipper">
                              <div class="first50-bar"></div>
                              <div class="value-bar"></div>
                           </div>
                           </div> -->
                           <div class="" style="float: right; margin-left:15px; margin-top:-25px;">
                            <img src="<?php echo base_url() ?>website_assets/img/progressX.png" class="img-responsive">
                           
                           </div>
                     <p class="rtl" style="text-align:right;font-weight: bold;font-size: 22px;"> ערבות לא אושרה  </p>

                    <p class="rtl" style="text-align:right;"> בחר באחד משני המסלולים  </p>

                     <p class="rtl" style="text-align:center;font-weight: bold; margin-top: 50px;">היי דני, לצערנו הרב, הבקשה שלך ערבות ללא פיקדון לא אושרה. </p>

                     <img src="http://oblidev.malul.xyz/website_assets/img/obliz.png" class="img-responsive tab_image-obli">
    
                   <!--  <p class="rtl" style="text-align:center;font-weight: bold;"> היי דני, סכום הערבות המבוקש גבוה מ000-,25 ₪. </p> -->

                    <p class="rtl" style="text-align:center;">  כדי לקבל את הערבות המבוקשת ,<br>באפשרותך לבחור באחד משני המסלולים:</p>

                    <br>
                    <div class="row">
                        <div class="col-md-3 col-sm-3"></div>
                        <div class="col-md-6 col-sm-6">
                            <a class="button gform_button next"> <p class="first_main_button" >ערבות עם ערב נוסף </p></a>
                             
                            <a class="button gform_button"> <p class="first_main_button" > ערבות עם פיקדון </p></a>
                        </div>
                        <div class="col-md-3 col-sm-3"></div>
                    </div>
                    <br><br><br>

                  <!--   <div class="row">
                        <div class="col-md-2 col-sm-2"></div>
                        <div class="col-md-8 col-sm-8">
                             <div class="col-md-6 col-sm-6"><div class="box-button1"><p> סכום לא אושר  </p></div></div>
                             <div class="col-md-6 col-sm-6"> <div class="box-button2"><p> גרסא 1 </p></div></div>
                            
                        </div>
                        <div class="col-md-2 col-sm-2"></div>
                    </div> -->

                </div>


                <!-- screen 7 -->
               <!--  <div id="scr_seven_form" class="gform_body">
                    <p class="" style="text-align:center;">בקשת ערבות </p><br>

                    <p class="" style="text-align:center;"> סופסוף הגענו לעיקר - הפיקדון. ניתן לבחור בין שני מסלולי ערבות  </p>

                  
                    <div class="section light-bg" style="margin-top:50px;">
                        <div class="">
                           
                            <ul class="nav nav-tabs nav-justified" role="tablist">
                                <li class="nav-item" style="background-color: #eee;">
                                <a class="nav-link" data-toggle="tab" href="#first-tab"><br>בקרוב <br> ערבות <br>עם פקדון </a>
                                </li>
                                <li class="nav-item active">
                                <a class="nav-link" data-toggle="tab" href="#second-tab"><br>ערבות <br> ללא פיקדון</a>
                                </li>
                               
                            </ul>
                            <div class="tab-content tab-obli">
                               
                                <div class="tab-pane fade active in tab-direction-obli" id="second-tab">
                                    <div class="d-flex flex-column flex-lg-row">
                                        <div>
                                            <p class="lead">סכום ההפקדה: 0 ₪ 5% עמלה </p>
                                           
                                           
                                        </div>
                                    </div>
                                </div>
                                
                               
                            </div>
                        </div>
                    </div>

                     <br>
                    <div class="gform_footer top_label"> 
                        <a class="button gform_button previous_scr"> <p class="first_next_button">הקודם</p></a>
                        <a class="button gform_button next"> <p class="first_next_button">לבחירה </p></a>
                    </div>
                     
                      <br>
                    <div class="row">
                        <div class="col-md-3 col-sm-3"></div>
                        
                        <div class="col-md-3 col-sm-3"></div>
                    </div>

                </div> -->

                <!-- screen 8 -->
                <div id="scr_eight_form" class="gform_body">
                    <p class="" style="text-align:center;">בקשת ערבות </p><br>

                    <p class="" style="text-align:center;"> בחרת בערבות עם פיקדון. </p>
                    <p class="" style="text-align:center;"> בהשוואה לעמלה הממוצעת המקובלת בבנקים, חסכת: </p>
                    <p class="" style="text-align:center;"> <b>500 ₪ </b></p>
                    <p class="" style="text-align:center;"> בנוסף, תרוויח תשואה שנתית בגובה: </p>
                    <p class="" style="text-align:center;"> <b>100 ₪ </b></p>
            
                   <div class="">
                  <!--  <h2>Panel Heading</h2> -->
                      <div class="panel panel-default" style="padding: 0px; display: block;text-align: center;">
                        <div class="panel-heading">סה"כ תרוויח בשנה:</div>
                        <div class="panel-body"><b>600 ₪ </b></div>
                        <div class="panel-body">(שלא לדבר על זמן הנסיעה לבנק, חיפוש החניה, ההמתנה וכל כאב הראש)</div>
                      </div>
                    </div>
                  
                   

                     <br>
                    <div class="gform_footer top_label"> 
                        <a class="button gform_button previous_scr"> <p class="first_next_button">הקודם</p></a>
                        <!-- <a class="button gform_button next"> <p class="first_next_button"> המשך </p></a> -->
                        <input type="" class="gform_button button" value="המשך " tabindex="54">
                    </div>
                     
                      <br>
                    <div class="row">
                        <div class="col-md-3 col-sm-3"></div>
                        <!-- <div class="col-md-6 col-sm-6">
                              <div class="col-6 col-sm-6">
                                    <li>
                                     <img src="http://oblidev.malul.xyz/website_assets/img/L3.png">
                                    </li>
                              </div>
                              <div class="col-6 col-sm-6">
                                    <li>
                                      <img src="http://oblidev.malul.xyz/website_assets/img/L4.png">
                                    </li>
                            </div>
                        </div> -->
                        <div class="col-md-3 col-sm-3"></div>
                    </div>

                </div>

              
                
    </form>
    </div>
                      
         
        </div>
    </div>
</div>

<link rel="stylesheet" href="<?php echo base_url() ?>website_assets/date/daterangepicker-bs3.css">
<script src="<?php echo base_url() ?>website_assets/date/moment.min.js"></script>
<script src="<?php echo base_url() ?>website_assets/date/daterangepicker.js"></script>
