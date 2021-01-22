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


<style type="text/css">
        

.screen2-box1{
    height: 289px;
}

@media screen and (min-width: 320px) and (max-width: 377px){
 .screen2-box1{
    height: 317px;
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
    width: 100%;
    height: 60px;
    cursor: pointer;

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
/*#ant_unique_id_error,#ant_client_phone_error,#ant_req_gur_amt_error,#ant_client_email_error{
    color: #EC0D0D;
    direction: rtl;
    font-size: 12.5px;
    float: right;
} */


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
/** floating css end **/


/*uploading file part*/
.file-close-icon i:hover{
     cursor: pointer;
}

.file-close-icon1 i:hover{
     cursor: pointer;
}
/*end*/
#ant_req_gur_amt:focus ~ span{
    width: 33% !important;
}
#ant_gur_period_month:focus ~ span{
    width: 30% !important;
}
#ant_client_phone:focus ~ span{
    width: 60% !important;
}
#ant_client_email:focus ~ span{
    width: 49% !important;
}
#ant_unique_id:focus ~ span{
    width: 33% !important;
}


.screen5_box{
    height: 240px;
}
.screen5_after_box{
    height: 400px;
}
.screen5_after{
    height: 275px;
}
.screen5_icon{
    float: right;
    line-height: 35px;
    font-size: 24px;
}
.screen_5img{
    margin-top: -25px;
    margin-right: -15px;
}

        
</style>

<script type="text/javascript">
    $(function() {

      var date = new Date();

        date.setMonth(date.getMonth() + 19);

        date.setDate(date.getDate() - 1);

        var enddate = new Date();

        enddate.setMonth(enddate.getMonth() + 13);

        enddate.setDate(enddate.getDate() - 1);

      $('input[name="ant_gur_period_month"]').daterangepicker({
          // autoUpdateInput: false,
          // locale: {
          //     cancelLabel: 'Clear'
          // }

          endDate: enddate.getMonth()+'/'+enddate.getDate()+'/'+enddate.getFullYear(),
          
          minDate: new Date(),

          maxDate: date.getMonth()+'/'+date.getDate()+'/'+date.getFullYear(),

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

      $('input[name="ant_gur_period_month"]').on('apply.daterangepicker', function(ev, picker) {
          $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));

          var startDate = picker.startDate.format('DD/MM/YYYY');
          var endDate = picker.endDate.format('DD/MM/YYYY');
          // alert(startDate); alert(endDate);

          $('#antstartDate').val(startDate);
          $('#antendDate').val(endDate);
          
          if($("#ant_first_name").val() != '' && $("#ant_last_name").val() != '' && $("#ant_unique_id").val() != '' && $("#ant_client_add").val() != '' && $("#ant_client_phone").val() != '' && $("#ant_client_email").val() != '' && $("#datepicker").val() != '' && $("#file-2").val() != ''  && $("#ant_req_gur_amt").val() != '' && $("#ant_gur_period_month").val() != '' ){

                $("#private_5_2_form").css("opacity","1"); // button opacity change
                $("#private_5_2_form").css("cursor","pointer");
                $("#private_5_2_form").prop("disabled", false);

            }
            else{
                $("#private_5_2_form").css("opacity","0.5"); // button opacity change
                $("#private_5_2_form").css("cursor","auto");
                $("#private_5_2_form").prop("disabled", true);
            }
          
      });

      $('input[name="ant_gur_period_month"]').on('cancel.daterangepicker', function(ev, picker) {
          $(this).val('');
      });

     

    });
</script>

<!-- date of birth picker -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!-- // <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
   $( function() {
       var maxBirthdayDate = new Date();
maxBirthdayDate.setFullYear( maxBirthdayDate.getFullYear() - 21,maxBirthdayDate.getMonth(),maxBirthdayDate.getDate());

     $( "#datepicker" ).datepicker({
       changeMonth: true,
       changeYear: true,
       maxDate: maxBirthdayDate,
       yearRange: "1930:+0"

     });

  //   $('input[name="sec_date_of_birth"]').daterangepicker({
  //         // autoUpdateInput: false,
  //         // locale: {
  //         //     cancelLabel: 'Clear'
  //         // }

  //         linkedCalendars : false,
  //            "locale": {
  //               "format": "MM/DD/YYYY",
  //               "separator": " - ",
  //               "applyLabel": "להגיש מועמדות ",
  //               "cancelLabel": "לבטל ",
  //               "fromLabel": "מ ",
  //               "toLabel": "ל ",
  //               "customRangeLabel": "Custom",
  //               "daysOfWeek": [
  //               "ראשון",
  //               "שני",
  //               "שלישי",
  //               "רביעי",
  //               "חמישי",
  //               "שישי",
  //               "שבת"
  //               ],
  //               "monthNames": [
  //               "ינו",
  //               "פבר",
  //               "מרץ",
  //               "אפר",
  //               "מאי",
  //               "יוני",
  //       "יולי",
  //       "אוג",
  //       "ספט",
  //       "אוק",
  //       "נוב",
  //       "דצמ"
  //       ],
  //               "firstDay": 1
  //           }
  //     });

  //       $('input[name="sec_date_of_birth"]').on('apply.daterangepicker', function(ev, picker) {
  //         $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));

  //         var secDateStartDate = picker.startDate.format('DD/MM/YYYY');
  //         var secDateEndDate = picker.endDate.format('DD/MM/YYYY');
  //         // alert(secDateStartDate); alert(secDateEndDate);

  //         $('#sec_dateStartDate').val(secDateStartDate);
  //         $('#sec_dateEndDate').val(secDateEndDate);
  //     });

  //     $('input[name="sec_date_of_birth"]').on('cancel.daterangepicker', function(ev, picker) {
  //         $(this).val('');
  //     });

   });

// single date picker only for hebrew
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


/*.form-control{
    font-size: inherit;
}*/
</style>

<script type="text/javascript">

// file uploading part

function f2(){
    var val = document.getElementById('file-2').value;
    var selectedFile1 = document.getElementById('file-2').files[0];
    var val = val.substring(val.lastIndexOf('\\')+1,val.length);
    if(val != ""){
        document.getElementById('label-for-file2').style.display = "none";
        document.getElementById('file-name-label2').innerText = val;
       document.getElementById('selected-file2').style.display = "block";
       document.getElementById('for_file_label2').style.display = "block";
    }
 
}

function removeFile2(){
 
    document.getElementById('file-2').value = '';
    document.getElementById('label-for-file2').style.display = "block";
    document.getElementById('selected-file2').style.display = "none";
    document.getElementById('for_file_label2').style.display = "none";
    
    if($("#ant_first_name").val() != '' && $("#ant_last_name").val() != '' && $("#ant_unique_id").val() != '' && $("#ant_client_add").val() != '' && $("#ant_client_phone").val() != '' && $("#ant_client_email").val() != '' && $("#datepicker").val() != '' && $("#file-2").val() != ''  && $("#ant_req_gur_amt").val() != '' && $("#ant_gur_period_month").val() != '' ){

            $("#private_5_2_form").css("opacity","1"); // button opacity change
            $("#private_5_2_form").css("cursor","pointer");
            $("#private_5_2_form").prop("disabled", false);

    }else{
        $("#private_5_2_form").css("opacity","0.5"); // button opacity change
        $("#private_5_2_form").css("cursor","auto");
        $("#private_5_2_form").prop("disabled", true);
    }
}

// end
        
    $(document).ready(function(){

        // phone number validation
        // $("#property_phone").inputmask('9999-999-999');
        $("#ant_client_phone").inputmask('999-999-9999');
        $.validator.addMethod('customphone', function (value, element) {
            return this.optional(element) || /^\d{3}-\d{3}-\d{4}$/.test(value);
        }, "מספר הטלפון מוכרח להיות 10 תווים");

        // email validate
            $.validator.addMethod('customemail', function (value, element) {
                return this.optional(element) || /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/.test(value);
            }, 'אנא הזן כתובת דוא"ל תקנית');
        // end

        // 50k > section of button
        $("#private_5_2_form").css("opacity","0.5"); 
        $("#private_5_2_form").css("cursor","auto");
        $("#private_5_2_form").prop("disabled", true);

       
        // apartment_add sec_date_of_birth landlord landlord_id property_phone sec_email file-2

        // seven form validation start
        // ant_first_name ant_last_name ant_unique_id file-2 ant_client_add ant_client_phone ant_client_email ant_client_gender sec_date_of_birth ant_req_gur_amt ant_gur_period_month

        $('#ant_first_name,#ant_last_name,#ant_unique_id,#ant_client_add,#ant_client_phone,#ant_client_email,#ant_req_gur_amt').on('keyup', function() {

            if($("#ant_first_name").val() != '' && $("#ant_last_name").val() != '' && $("#ant_unique_id").val() != '' && $("#ant_client_add").val() != '' && $("#ant_client_phone").val() != '' && $("#ant_client_email").val() != '' && $("#datepicker").val() != '' && $("#file-2").val() != ''  && $("#ant_req_gur_amt").val() != '' && $("#ant_gur_period_month").val() != '' ){

                $("#private_5_2_form").css("opacity","1"); // button opacity change
                $("#private_5_2_form").css("cursor","pointer");
                $("#private_5_2_form").prop("disabled", false);

            }
            else{
                $("#private_5_2_form").css("opacity","0.5"); // button opacity change
                $("#private_5_2_form").css("cursor","auto");
                $("#private_5_2_form").prop("disabled", true);
            }

          
        });

        $('#file-2,#datepicker').on('change', function() {

            if($("#ant_first_name").val() != '' && $("#ant_last_name").val() != '' && $("#ant_unique_id").val() != '' && $("#ant_client_add").val() != '' && $("#ant_client_phone").val() != '' && $("#ant_client_email").val() != '' && $("#datepicker").val() != '' && $("#file-2").val() != ''  && $("#ant_req_gur_amt").val() != '' && $("#ant_gur_period_month").val() != '' ){

                    $("#private_5_2_form").css("opacity","1");
                    $("#private_5_2_form").css("cursor","pointer");
                    $("#private_5_2_form").prop("disabled", false);
                
            }else{
                $("#private_5_2_form").css("opacity","0.5");
                $("#private_5_2_form").css("cursor","auto");
                $("#private_5_2_form").prop("disabled", true);
            }

          
        });


        // $('#private_5_2_form').on('click', function() {
        $("#private_5_2_form").click(function(){
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
                        ant_first_name: {
                            required: true,
                            minlength: 3
                        },
                        ant_last_name: {
                            required: true,
                            minlength: 3
                        },
                        ant_client_add: {
                            required: true,
                            minlength: 3
                        },
                        ant_gur_period_month: {
                            required: true
                        },
                        // client_photo: {
                        //     required: true,
                        // },
                        ant_unique_id: {
                            required: true,
                            number: true
                            
                        },
                        ant_req_gur_amt: {
                            required: true,
                            number: true, 
                            min: 100,
                            max: 46500
                        },
                        ant_client_phone: {
                            customphone: true,
                            phoneStartingWith:true
                        },
                        ant_client_email: {
                            required: true,
                            customemail: true
                        },
                        datepicker: {
                            required: true
                        }
                        
                    },
                    messages: {
                        ant_first_name: {
                            required: "שדה חובה"
                        },
                        ant_last_name: {
                            required: "שדה חובה"
                        },
                        ant_client_add: {
                            required: "שדה חובה"
                        },
                        ant_gur_period_month: {
                            required: "שדה חובה"
                        },
                        // client_photo: {
                        //     required: "שדה חובה",
                        // },
                        ant_unique_id: {
                            required: "שדה חובה",
                            phoneStartingWith: 'Phone number must be start wth 05 or 07',
                            number: "אנא הזן את המספ,ר"
                        },
                        ant_req_gur_amt: {
                            required: "שדה חובה",
                            number: "אנא הזן את המספר",
                            min: "אנא הכנס את ערך הסכום 100 עד 46500",
                            max: "אנא הכנס את ערך הסכום 100 עד 46500"

                        },
                        ant_client_phone: {
                            required: "שדה חובה"
                        },
                        ant_client_email: {
                            required: "שדה חובה",
                            customemail: 'אנא הזן כתובת דוא"ל תקנית.'
                        },
                        datepicker: {
                            required: "שדה חובה"
                        }
                        
                    }
                    
                });

                if (form.valid() === true){

                // loader start
                    $("#sonar_text").hide('fast');

                    var i = 0;
                    var intervalId = setInterval(function(){
                        $("#business_6_scr").hide('fast'); 
                         
                        $(".sonar-wrapper").show('fast');

                        if(i === 1){ 
                          // clearInterval(intervalId);
                          
                            var j = 0;
                            var secondIntervalId = setInterval(function(){ 

                                $("#sonar_text").show('fast');

                                if(j === 2){

                                    $(".sonar-wrapper").hide('fast');
                                    $("#sonar_text").hide('fast');
                                    // $("#scr_eight_form").show('fast'); // next screen 
                                    clearInterval(intervalId);
                                    clearInterval(secondIntervalId);

                                   //  if(window.document.drops.isFinished()){
                                       
                                   // }
                                    
                                }

                            j++;
                            }, 1500);

                            // clearInterval(secondIntervalId);
                            clearInterval(intervalId);
                          
                        }

                    i++;
                    },3000);

                // loader end
                   
                }
                else{
                    // $('.submit').css('opacity', '0.5');
                }

            if($("#ant_first_name").val() != '' && $("#ant_last_name").val() != '' && $("#ant_unique_id").val() != '' && $("#ant_client_add").val() != '' && $("#ant_client_phone").val() != '' && $("#ant_client_email").val() != '' && $("#datepicker").val() != '' && $("#file-2").val() != ''  && $("#ant_req_gur_amt").val() != '' && $("#ant_gur_period_month").val() != '' ){

                    $("#private_5_2_form").css("opacity","1"); // button opacity change
                    $("#private_5_2_form").css("cursor","pointer");
                    $("#private_5_2_form").prop("disabled", false);
                
            }else{
                $("#private_5_2_form").css("opacity","0.5"); // button opacity change
                $("#private_5_2_form").css("cursor","auto");
                $("#private_5_2_form").prop("disabled", true);
            }

        });
    
    });      
    
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
            
             <form method="post" enctype="multipart/form-data" id="myform" name="validate_form" action="<?php echo site_url('private52'); ?>" novalidate="" > 

                
                <!-- greater than 25000 after screen(scr_six_form) -->

                <div id="scr_seven_form" class="gform_body form_height" style="margin-top: 30px;">
                        
                    <div class="" style="float: right; margin-left:15px; margin-top:-25px;">
                        <img src="<?php echo base_url() ?>website_assets/img/progress2.png" class="img-responsive">
                       
                    </div>
                     <div class="main_text">
                    <p class="rtl main_text_heading" style="text-align:right;font-weight: bold;">פרטים אישיים ערב נוסף </p>
                    <!-- <p class="rtl" style="text-align:right;font-weight: bold;font-size: 22px;">פרטים על הנכס </p> -->

                    <p class="rtl" style="text-align:right; margin-top: -8px;">השלב הבא: סכום הערבות </p>
                    <!-- <p class="rtl" style="text-align:right; margin-top: -8px;">השלב הבא: בקשת הערבות  </p>  -->

                    </div>
                    <br>

                    <ul class="gform_fields top_label ">

                        <li class="gfield gfield_html gfield_no_follows_desc "> 
                           <!--  <h1 class="page-subtitle page-subtitle_application">צור קשר</h1> -->
                           
                            <p class="contact-text_application rtl">כאן נזדקק לפרטים של הערב הנוסף (את הפרטים שלך כבר יש לנו)</p>
                        </li>

                        <li class="gfield gf_left_third text-field1_application form-group">
                          
                            <div class="styled-input wide">
                              <input type="text" name="ant_first_name" id="ant_first_name" value="" class="form-control seven1_left" required="">
                                <label class="gfield_label control-label gform_wrapper gfield_label" for="ant_first_name">שם פרטי   
                            </label>
                            </div> 
                        </li>

                        <li class="gf_middle_third gfield text-field2_application form-group">

                            <div class="styled-input wide">
                              <input type="text" name="ant_last_name" id="ant_last_name" value="" class="form-control seven2_left" required="">
                                <label class="gfield_label control-label gform_wrapper gfield_label" for="ant_last_name">שם משפחה   
                            </label>
                            </div>
                        </li>   

                        <li class="gf_left_third gfield text-field1_application form-group">

                            <div class="styled-input wide">
                               <input type="text" name="ant_unique_id" id="ant_unique_id" value="" class="form-control seven3_left" required="" maxlength='9'>


                               <label class="gfield_label control-label gform_wrapper gfield_label" for="ant_unique_id">ת.ז   
                               </label>
                            </div> 
                        </li>

                        <li class="gf_left_third gfield text-field2_application form-group">
                            
                           
                             <label class="for_file_label" id="for_file_label2" for="client_add">צילום ת.ז </label>
                             <div  id="selected-file2" style="padding-top:40px; display: none;">
                                 
                                 <div class="row">
                                    <div class="col-md-2">
                                      <span onclick="removeFile2()" class="file-close-icon">
                                        <!-- <i style="font-size:24px;" class="fa fa-close"></i> -->
                                        <img src="<?php echo base_url() ?>website_assets/img/close.png" class="img-responsive" style="float: left;">
                                    </div>
                                   
                                    <div class="col-md-8">
                                      <label class="for_file_name" id="file-name-label2"></label>
                                    </div>
                                     <div class="col-md-2">
                                      <span><i class="fa fa-file-text-o for_file_icon"></i></span>
                                    </div>
                                 </div>

                               
                             </div>

                            <input type="file" name="file-2" id="file-2" class="inputfile inputfile-2" accept="image/gif,image/png,image/jpeg,image/jpg,application/pdf" style="display: none;" onchange="f2()">
                            <label for="file-2" id="label-for-file2" style="margin-top: 8px;padding: 13.5px;">

                                <i style="font-size:24px; margin-left: 60px;" class="fa">&#xf030;</i>
                                <span style="font-weight: 200; font-size: 20px; margin-left:70px;">צילום ת.ז </span>
                             
                            </label>
                        </li>

                        <li class="gf_left_third gfield text-field1_application form-group">
                        
                            <div class="styled-input wide">
                               <textarea class="textarea large form-control seven4_left" name="ant_client_add" rows="5" cols="50" id="ant_client_add" required="" style="max-height: 56px;" ></textarea>
                                <label class="gfield_label control-label gform_wrapper gfield_label" for="ant_client_add">כתובת מגורים נוכחית
                            </label>
                            </div>
                        </li>
                       
                        <li class="gfield gf_left_third text-field2_application form-group">
                           
                            <div class="styled-input wide">
                               <input type="text" name="ant_client_phone" id="ant_client_phone" value="" class="form-control ant_client_phone_text" required="">

                               <label class="gfield_label control-label gform_wrapper gfield_label" for="ant_client_phone">טלפון נייד   
                            </label>
                            </div>
                        </li>

                        <li class="gfield gf_left_third text-field1_application form-group">
                        
                            <div class="styled-input wide">
                               <input type="text" name="ant_client_email" id="ant_client_email" value="" class="form-control seven5_left" required="">
                             
                               <label class="gfield_label control-label gform_wrapper gfield_label" for="ant_client_email">דוא”ל  
                            </label>
                            </div>
                        </li>
                        
                        <li class="gfield gf_left_third text-field2_application form-group">
                            <label class="gfield_label control-label" for="current_residence"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">מין
                            </font></font>
                            <div class=""style="float: left; margin-right: 15px;">
                                <br>
                              <label for="radio-button-1" class="radio gfield_label control-label">
                             
                             <input type="radio" name="ant_client_gender" value="זכר" id="box-2" checked="checked" value="30" style="left: 55px; top: -6px;">זכר
                              
                            </label>
                           
                              <label for="radio-button-0" class="radio gfield_label control-label" style="top: -30px;right: 105px;">
                             
                            <input type="radio" name="ant_client_gender" value="נקבה" id="box-1" style="left: 69px;top: -6px;">נקבה
                            </label>
                            </div>
                            </label>
                        </li>

                       

                        <li class="gfield gf_left_third text-field1_application form-group">
                         
                            <div class="styled-input wide">
                               <input type="text" name="antsec_date_of_birth" id="datepicker" value="" class="form-control active seven6_left" required="" autocomplete="off">

                                <label class="gfield_label control-label gform_wrapper gfield_label" for="datepicker">תקופת הערבות
                               
                                <!-- <img src="<?php echo base_url() ?>website_assets/img/calendar_icon.png" class="img-responsive cal_reponsive3" style="position: relative;left: -160px;top: -4px;"> -->
                            </label>
                            <img src="<?php echo base_url() ?>website_assets/img/calendar_icon.png" class="img-responsive cal_reponsive" >
                            </div> 
                        </li>

                        <li class="gfield gfield_html gfield_no_follows_desc " style="margin-top: 160px;">
                
                            <!-- <p class="contact-text_application" style="text-align:right;font-weight: bold;font-size: 22px;">פרטים על הנכס </p> -->
                            <p class="contact-text_application" style="text-align:right;font-weight: bold;font-size: 22px;">סכום הערבות </p>
                           
                        </li>

                        <li class="gf_middle_third gfield text-field1_application form-group">
                          
                            <div class="styled-input wide">
                               <input type="text" name="ant_req_gur_amt" id="ant_req_gur_amt" value="" class="form-control seven7_left" required=""  maxlength='6'>

                                <label class="gfield_label control-label gform_wrapper gfield_label" for="ant_req_gur_amt">סכום הערבות והסכמים  
                            </label>
                            </div> 
                        </li>

                        <li class="gfield gf_left_third text-field2_application form-group">
                           
                            <div class="styled-input wide"> 
                               <input type="text" name="ant_gur_period_month" id="ant_gur_period_month" value="" class="form-control daterange seventh_text" data-time-picker="true" data-format="MM/DD/YYYY" required="" autocomplete="off" style="direction: ltr;" >

                               <input type="hidden" name="antstartDate" id="antstartDate" >
                               <input type="hidden" name="antendDate" id="antendDate" >

                                <label class="gfield_label control-label gform_wrapper gfield_label" for="ant_gur_period_month">
                                   תקופת הערבות
                              
                               <!--  <img src="<?php echo base_url() ?>website_assets/img/calendar_icon.png" class="img-responsive cal_reponsive2" style="position: relative;left: -156px;top: -5px;"> -->
                            </label>
                            <img src="<?php echo base_url() ?>website_assets/img/calendar_icon.png" class="img-responsive cal_reponsive" >
                            </div>
                        </li>



                    </ul>

                    <div class="gform_footer "> 
                     
                        <!--<a class="button gform_button" ><p class="first_next_button scr_first_submit" id="private_5_2_form" style="margin-right: -25px; margin-top: 30px;">המשך</p> </a>-->
                        
                        <button type="submit" class="button gform_button first_next_button scr_first_submit" id="private_5_2_form" id="private_5_2_form" >לתשלום </button>
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
<script>
    $(document).ready(function(){
        jQuery.validator.addMethod("phoneStartingWith", function(phone_number, element) {
    phone_number = phone_number.replace(/\s+/g, "");
    return this.optional(element) || phone_number.match(/^05|07;/);
}, "Phone number must be start with 05");
        
    });
    </script>