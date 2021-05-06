<?php // echo "<pre>"; print_r(json_decode($data['api_url'])); die();
//  echo "<pre>"; print_r($data); echo "<br>"; echo $data['api_url'];  die();
if(!empty($data['api_url'])){

$fieldErrors = $data['api_url'];
// print_r($fieldErrors->link); die();
  $status = "";
  $errorMessage = "";
  $errorCode = "";
  $timestamp = "";
  if(!empty($fieldErrors)){
      $str = "";
      
      if(!empty($fieldErrors->status)){
          $status = $fieldErrors->status;
      }
      else{
          $status = "";
      }
      
      if(!empty($fieldErrors->message)){
          $errorMessage = $fieldErrors->message;
      }
      else{
          $errorMessage = "NULL";
      }
      
      if(!empty($fieldErrors->errorCode)){
          $errorCode = $fieldErrors->errorCode;
      }
      else{
          $errorCode = "";
      }
      
      if(!empty($fieldErrors->timestamp)){
          $timestamp = $fieldErrors->timestamp;
      }
      else{
          $timestamp = "";
      }
      
      if(!empty($fieldErrors->link)){
          $link = $fieldErrors->link;
      }
      else{
          $link = "";
      }
       
          
          
          
          $str .= "status : ".$status.", message : ".$errorMessage.", errorCode: ".$errorCode.", timestamp: ".$timestamp."\n";
      // foreach ($fieldErrors as $key => $value) {
      //     $status = $value->status;
      //     echo $status; die();
      //     $errorMessage = $value->message;
      //     $errorCode = $value->errorCode;
      //     $timestamp = $value->timestamp;
      //     $str .= "field : ".$status.", and message : ".$errorMessage.", errorCode: ".$errorCode.", timestamp: ".$timestamp."\n";
      // }
      $string = "\nTarya API Error: \n".$str;

      // print_r($string); die();
  }
}else{
  $status = "";
  $errorMessage = "";
  $errorCode = "";
  $timestamp = "";
}
?>

 <script type="text/javascript">
     <?php if(!empty($status) && !empty($errorMessage) && !empty($errorCode) && !empty($timestamp) ){ ?>
  var status = '<?php echo $status; ?>';
  var message = '<?php echo $errorMessage; ?>';
  var errorCode = '<?php echo $errorCode; ?>';
  var timestamp = '<?php echo $timestamp; ?>';

  var api = '{status : '+ status +', message : '+message+', errorCode: '+errorCode+', timestamp: '+timestamp+'}';

  // jQuery.parseJSON(paymentApi);
  console.log(api);
     <?php }elseif(!empty($link)) { ?>
        // alert(222);
        var link = '<?php echo $link; ?>';
        var api = '{link : '+ link +'}';
        
        console.log(api);
     <?php } ?>

 </script>
<?php // echo "<pre>"; print_r(json_decode($data['api_url'])); die();
 // echo "<pre>"; print_r($data); die();
 ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

<!-- calendar start -->

<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->

<script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
<style type="text/css">
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
@media only screen and (max-width:3000px) and (min-width: 768px){
.form_height1{
    margin-top: -50px !important;
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

      $('input[name="ant_gur_period_month"]').daterangepicker({
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

      $('input[name="ant_gur_period_month"]').on('apply.daterangepicker', function(ev, picker) {
          $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));

          var startDate = picker.startDate.format('DD/MM/YYYY');
          var endDate = picker.endDate.format('DD/MM/YYYY');
          // alert(startDate); alert(endDate);

          $('#antstartDate').val(startDate);
          $('#antendDate').val(endDate);
      });

      $('input[name="ant_gur_period_month"]').on('cancel.daterangepicker', function(ev, picker) {
          $(this).val('');
      });

      // $('input[name="sec_date_of_birth"]').daterangepicker({
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
<script>
   $( function() {
     $( "#datepicker" ).datepicker({
       changeMonth: true,
       changeYear: true,
       // yearRange: "-80:+0"
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
<!-- calendar end -->

<style type="text/css">
        #sec_scr_checkbox1, #sec_scr_checkbox2, #greaterThan2500Scr, #modal2Div, #modal3Div, .sonar-wrapper, #scr_seven_form_new,#scr_seven_form, #ant_unique_id_error,#ant_client_phone_error,#ant_req_gur_amt_error,#ant_client_email_error, .calendar-time, #scr_eight_form, #scr_nine_form, #scr_ten_form, #scr_eleven_form {
            display:none;
        }

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
#ant_unique_id_error,#ant_client_phone_error,#ant_req_gur_amt_error,#ant_client_email_error{
    color: #EC0D0D;
    direction: rtl;
    font-size: 12.5px;
    float: right;
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

// file uploading part
function f1(){
    var val = document.getElementById('file-1').value;
    var selectedFile1 = document.getElementById('file-1').files[0];
    var val = val.substring(val.lastIndexOf('\\')+1,val.length);
    if(val != ""){
        document.getElementById('label-for-file1').style.display = "none"
        document.getElementById('file-name-label1').innerText = val;
       document.getElementById('selected-file1').style.display = "block"
       document.getElementById('for_file_label1').style.display = "block"
    }
 
}

function removeFile1(){
 
    document.getElementById('file-1').value = '';
    document.getElementById('label-for-file1').style.display = "block"
    document.getElementById('selected-file1').style.display = "none"
    document.getElementById('for_file_label1').style.display = "none"
}

function f2(){
    var val = document.getElementById('file-2').value;
    var selectedFile1 = document.getElementById('file-2').files[0];
    var val = val.substring(val.lastIndexOf('\\')+1,val.length);
    if(val != ""){
        document.getElementById('label-for-file2').style.display = "none"
        document.getElementById('file-name-label2').innerText = val;
       document.getElementById('selected-file2').style.display = "block"
       document.getElementById('for_file_label2').style.display = "block"
    }
 
}

function removeFile2(){
 
    document.getElementById('file-2').value = '';
    document.getElementById('label-for-file2').style.display = "block"
    document.getElementById('selected-file2').style.display = "none"
    document.getElementById('for_file_label2').style.display = "none"
}

// end
        
    $(document).ready(function(){

        // phone number validation
        $("#property_phone").inputmask('9999-999-999');
        $("#ant_client_phone").inputmask('9999-999-999');
        $.validator.addMethod('customphone', function (value, element) {
            return this.optional(element) || /^\d{4}-\d{3}-\d{3}$/.test(value);
        }, "מספר הטלפון מוכרח להיות 10 תווים");

        // email validate
        $.validator.addMethod('customemail', function (value, element) {
            return this.optional(element) || /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/.test(value);
        }, 'אנא הזן כתובת דוא"ל תקנית');
        // end

        $("#five_next_form").css("opacity","0.5"); // button opacity change
        $("#five_next_form").css("cursor","auto");
        $("#five_next_form").prop("disabled", true);

        $(".next").click(function(){ 
            current_fs = next_fs = '';
            
            // if($('#scr_five_form').is(":visible")){
            //     current_fs = $('#scr_five_form');
            //     next_fs = $('#scr_second_form');
            // }
            if($('#25000AfterScreen').is(":visible")){
              $("#scr_seven_form").animate({height: "300px"});
                current_fs = $('#25000AfterScreen');
                next_fs = $('#scr_seven_form');
                
                // var formStatus = $("#myform").valid();
                // formStatus = false;
                // alert(formStatus)
                // alert($("#myform").valid());

                $("#seven_next_form").css("opacity","0.5"); // button opacity change
                $("#seven_next_form").css("cursor","auto");
            }
            // else if($('#scr_eight_form').is(":visible")){
            //     current_fs = $('#scr_eight_form');
            //     next_fs = $('#scr_nine_form');
            // }
            else if($('#scr_nine_form').is(":visible")){
//              $("#scr_ten_form").animate({height: "300px"});
                current_fs = $('#scr_nine_form');
                next_fs = $('#scr_ten_form');
            }
            else if($('#scr_ten_form').is(":visible")){
//              $("#scr_eleven_form").animate({height: "300px"});
                current_fs = $('#scr_ten_form');
                next_fs = $('#scr_eleven_form');
            }
            
            
            next_fs.show(); 
            current_fs.hide();
            
        }); 

        // apartment_add sec_date_of_birth landlord landlord_id property_phone sec_email file-2

        $('#apartment_add,#landlord,#landlord_id,#property_phone,#sec_email').on('keyup', function() {

            if($("#apartment_add").val() != '' && $("#landlord").val() != '' && $("#landlord_id").val() != '' && $("#property_phone").val() != '' && $("#sec_email").val() != '' && $("#sec_date_of_birth").val() != '' && $("#file-1").val() != '' ){

                $("#five_next_form").css("opacity","1"); // button opacity change
                $("#five_next_form").css("cursor","pointer");
                $("#five_next_form").prop("disabled", false);

            }
            else{
                $("#five_next_form").css("opacity","0.5"); // button opacity change
                $("#five_next_form").css("cursor","auto");
                $("#five_next_form").prop("disabled", true);
            }

          
        });

        $('#file-1,#sec_date_of_birth').on('change', function() {

            if($("#apartment_add").val() != '' && $("#landlord").val() != '' && $("#landlord_id").val() != '' && $("#property_phone").val() != '' && $("#sec_email").val() != '' && $("#sec_date_of_birth").val() != '' && $("#file-1").val() != '' ){

                    $("#five_next_form").css("opacity","1"); // button opacity change
                    $("#five_next_form").css("cursor","pointer");
                    $("#five_next_form").prop("disabled", false);
                
            }else{
                $("#five_next_form").css("opacity","0.5"); // button opacity change
                $("#five_next_form").css("cursor","auto");
                $("#five_next_form").prop("disabled", true);
            }

          
        });


        // $("#five_next_form").submit(function (e){ 
        $('#five_next_form').on('click', function() {

            if($("#apartment_add").val() != '' && $("#landlord").val() != '' && $("#landlord_id").val() != '' && $("#property_phone").val() != '' && $("#sec_email").val() != '' && $("#sec_date_of_birth").val() != '' && $("#file-1").val() != '' ){

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
                        apartment_add: {
                            required: true,
                            minlength: 3,
                        },
                        landlord: {
                            required: true,
                        },
                        // client_photo: {
                        //     required: true,
                        // },
                        landlord_id: {
                            required: true,
                            number: true
                        },
                        property_phone: {
                            customphone: true
                            // number: true
                            // min: 9,
                            // max: 10
                        },
                        sec_email: {
                            required: true,
                            customemail: true
                        },
                        sec_date_of_birth: {
                            required: true,
                        }
                        
                    },
                    messages: {
                        apartment_add: {
                            required: "שדה חובה",
                        },
                        landlord: {
                            required: "שדה חובה",
                        },
                        // client_photo: {
                        //     required: "שדה חובה",
                        // },
                        landlord_id: {
                            required: "שדה חובה",
                            number: "אנא הזן את המספר"
                        },
                        property_phone: {
                            required: "שדה חובה"
                            // number: "אנא הזן את המספר"
                            // min: "מספר הטלפון מוכרח להיות 10 תווים",
                            // max: "מספר הטלפון מוכרח להיות 10 תווים"
                        },
                        sec_email: {
                            required: "שדה חובה",
                            customemail: 'אנא הזן כתובת דוא"ל תקנית'
                        },
                        sec_date_of_birth: {
                            required: "שדה חובה",
                        }
                        
                    }
                    
                });

                if (form.valid() === true){ 

                     // alert(1);
                     // $.ajax({
                     //        url: '<?php echo site_url("website/submit_form_data"); ?>',
                     //        type: "POST",
                     //        data: $('#myform').serialize(),
                     //        // beforeSend: function () {
                     //        //     // jQuery('select#city-name').find("option:eq(0)").html("Please wait..");
                     //        // },
                     //        // complete: function () {
                     //        //     // code
                     //        // },
                     //        success: function (result) {
                              // console.log(result);
                     //          // alert('form was submitted');
                                
                     //            if (result != '') {
                     //                alert(2);

                     //                var getdata = jQuery.parseJSON(JSON.stringify(result));
                                         
                     //                var status = getdata.status;
                     //                // alert(JSON.stringify(getdata.cable_status));
                     //                console.log(getdata);

                     //                if (status == 'true') { alert(3);

                     //                   // var options = '';
                     //                   //  options +='<option value="">--Please select city--</option>';
                     //                   //  for (var i = 0; i < getdata.cityDetails.length; i++) {
                     //                   //      options += '<option value="' + getdata.cityDetails[i].id + '">' + getdata.cityDetails[i].name + '</option>';
                     //                   //  }
                     //                   //  jQuery("select#city-name").html(options);
                     //                    // jQuery("#city_id").val(options);

                                     
                                      
                     //                }
                     //                else
                     //                { 
                     //                    // $('#loaderTable').modal('false'); 
                     //                }
                     //            }
                     //        },
                     //        error: function () {
                     //        }
                     //    });

                // loader start
                    $("#sonar_text").hide('fast');

                    var i = 0;
                    var intervalId = setInterval(function(){
                        $("#scr_five_form").hide('fast'); 
                         
                        $(".sonar-wrapper").show('fast');

                        if(i === 1){ 
                          // clearInterval(intervalId);
                          
                            var j = 0;
                            var secondIntervalId = setInterval(function(){ 

                                $("#sonar_text").show('fast');

                                if(j === 2){

                                    $(".sonar-wrapper").hide('fast');
                                    $("#sonar_text").hide('fast');
//                                    $("#scr_eight_form").animate({height: "300px"});
                                    $("#scr_eight_form").show('fast'); // next screen 
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
            }
        });
        // five form valiation end


        // seven form validation start
        // ant_first_name ant_last_name ant_unique_id file-2 ant_client_add ant_client_phone ant_client_email ant_client_gender sec_date_of_birth ant_req_gur_amt ant_gur_period_month

        $('#ant_first_name,#ant_last_name,#ant_unique_id,#ant_client_add,#ant_client_phone,#ant_client_email,#ant_req_gur_amt').on('keyup', function() {

            if($("#ant_first_name").val() != '' && $("#ant_last_name").val() != '' && $("#ant_unique_id").val() != '' && $("#ant_client_add").val() != '' && $("#ant_client_phone").val() != '' && $("#ant_client_email").val() != '' && $("#sec_date_of_birth").val() != '' && $("#file-2").val() != ''  && $("#ant_req_gur_amt").val() != '' && $("#ant_gur_period_month").val() != '' ){

                $("#seven_next_form").css("opacity","1"); // button opacity change
                $("#seven_next_form").css("cursor","pointer");

            }
            else{
                $("#seven_next_form").css("opacity","0.5"); // button opacity change
                $("#seven_next_form").css("cursor","auto");
            }

          
        });

        $('#file-2,#sec_date_of_birth,#ant_gur_period_month').on('change', function() {

            if($("#ant_first_name").val() != '' && $("#ant_last_name").val() != '' && $("#ant_unique_id").val() != '' && $("#ant_client_add").val() != '' && $("#ant_client_phone").val() != '' && $("#ant_client_email").val() != '' && $("#sec_date_of_birth").val() != '' && $("#file-2").val() != ''  && $("#ant_req_gur_amt").val() != '' && $("#ant_gur_period_month").val() != '' ){

                    $("#seven_next_form").css("opacity","1"); // button opacity change
                    $("#seven_next_form").css("cursor","pointer");
                
            }else{
                $("#seven_next_form").css("opacity","0.5"); // button opacity change
                $("#seven_next_form").css("cursor","auto");
            }

          
        });


        $("#seven_next_form").click(function(){
            // alert(123);

            if($("#ant_first_name").val() != '' && $("#ant_last_name").val() != '' && $("#ant_unique_id").val() != '' && $("#ant_client_add").val() != '' && $("#ant_client_phone").val() != '' && $("#ant_client_email").val() != '' && $("#sec_date_of_birth").val() != '' && $("#file-2").val() != ''  && $("#ant_req_gur_amt").val() != '' && $("#ant_gur_period_month").val() != '' ){

                var check_unique_id = $("#ant_unique_id").val();
                var check_client_phone = $("#ant_client_phone").val();
                var check_req_gur_amt = $("#ant_req_gur_amt").val();
                var check_client_email = $("#ant_client_email").val();

                var phoneCheck = /^\d{4}-\d{3}-\d{3}$/;
                var numbers = /^[0-9]+$/;
                var email = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

                
                if(!check_unique_id.match(numbers))
                {
                    $("#ant_unique_id_error").show('fast');
                }
                else
                {
                    $("#ant_unique_id_error").hide('fast');
                }

                

                if(!check_req_gur_amt.match(numbers))
                {
                    $("#ant_req_gur_amt_error").show('fast');
                }
                else
                {
                    $("#ant_req_gur_amt_error").hide('fast');
                }

                if(!check_client_phone.match(phoneCheck))
                {
                    $("#ant_client_phone_error").show('fast');
                }
                else
                {
                    $("#ant_client_phone_error").hide('fast');

                }

                if(!check_client_email.match(email))
                {
                    $("#ant_client_email_error").show('fast');
                }
                else
                {
                    $("#ant_client_email_error").hide('fast');

                }

             
                
                // var form = $("#myform");
                // form.validate({
                //     errorElement: 'span',
                //     errorClass: 'help-block',
                //     highlight: function(element, errorClass, validClass) { 
                //         $(element).closest('.form-group').addClass("has-error");
                //     },
                //     unhighlight: function(element, errorClass, validClass) { 
                //         $(element).closest('.form-group').removeClass("has-error");
                //     },
                //     rules: {
                //         ant_first_name: {
                //             required: true,
                //             // usernameRegex: true,
                //             minlength: 3,
                //         },
                //         ant_last_name: {
                //             required: true,
                //             // usernameRegex: true,
                //             minlength: 3,
                //         },
                //         // client_photo: {
                //         //     required: true,
                //         // },
                //         ant_unique_id: {
                //             required: true,
                //             number: true
                //         },
                //         ant_client_add: {
                //             required: true,
                //         },
                //         ant_client_phone: {
                //             required: true,
                //             number: true
                //             // min: 9,
                //             // max: 10
                //         },
                //         ant_client_email: {
                //             required: true,
                //             email: true
                //         },
                //         ant_client_gender: {
                //             required: true,
                //         },
                //         sec_date_of_birth:{
                //             required: true,
                //         },
                //         ant_req_gur_amt: {
                //             required: true,
                //             number: true
                //         },
                //         ant_gur_period_month: {
                //             required: true,
                //         }
                        
                //     },
                //     messages: {
                //         ant_first_name: {
                //             required: "שדה חובה",
                //         },
                //         ant_last_name: {
                //             required: "שדה חובה",
                //         },
                //         // client_photo: {
                //         //     required: "שדה חובה",
                //         // },
                //         ant_unique_id: {
                //             required: "שדה חובה",
                //             number: "אנא הזן את המספר"
                //         },
                //         ant_client_add: {
                //             required: "שדה חובה",
                //         },
                //         ant_client_phone: {
                //             required: "שדה חובה",
                //             number: "אנא הזן את המספר"
                //             // min: "מספר הטלפון מוכרח להיות 10 תווים",
                //             // max: "מספר הטלפון מוכרח להיות 10 תווים"
                //         },
                //         ant_client_email: {
                //             required: "שדה חובה",
                //             email: 'אנא הזן כתובת דוא"ל תקנית.'
                //         },
                //         ant_client_gender: {
                //             required: "שדה חובה",
                //         },
                //         sec_date_of_birth: {
                //             required: "שדה חובה",
                //         },
                //         ant_req_gur_amt: {
                //             required: "שדה חובה",
                //             number: "אנא הזן את המספר"
                //         },
                //         ant_gur_period_month: {
                //             required: "שדה חובה",
                //         }
                        
                //     }
                    
                // });

                if (check_unique_id.match(numbers) && check_req_gur_amt.match(numbers) && check_client_phone.match(phoneCheck) && check_client_email.match(email))
                { 

                    $("#sonar_text").hide('fast');

                    var i = 0;
                    var intervalId = setInterval(function(){ 
                        $("#scr_seven_form").hide('fast'); 
                         
                        $(".sonar-wrapper").show('fast');

                        if(i === 1){ 
                          // clearInterval(intervalId);
                          
                            var j = 0;
                            var secondIntervalId = setInterval(function(){ 

                                $("#sonar_text").show('fast');

                                if(j === 2){

                                    $(".sonar-wrapper").hide('fast');
                                    $("#sonar_text").hide('fast');
//                                    $("#scr_eight_form").animate({height: "300px"});
                                    $("#scr_eight_form").show('fast'); // next screen 
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

                   
                    
                }
                else{
                    // $('.submit').css('opacity', '0.5');
                }
            }
        });
    // end 
    

        

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
            

            <form method="post" enctype="multipart/form-data" id="myform" >
                <!-- action="<?php echo site_url('website/tenant_payment_api'); ?>" -->

            <?php if(!empty($data)){ if($data['status'] == "true"){ ?>

                 <input type="hidden" name="first_file" value="<?php if(!empty($data)){ if(!empty($data['form_detail'])){ echo $data['first_file']; } } ?>" >

                <input type="hidden" name="first_name" value="<?php if(!empty($data)){ if(!empty($data['form_detail'])){ echo $data['form_detail']['first_name']; } } ?>" >

                <input type="hidden" name="last_name" value="<?php if(!empty($data)){ if(!empty($data['form_detail'])){ echo $data['form_detail']['last_name']; } } ?>" >

                <input type="hidden" name="unique_id" value="<?php if(!empty($data)){ if(!empty($data['form_detail'])){ echo $data['form_detail']['unique_id']; } } ?>" >

                <input type="hidden" name="hometown" value="<?php if(!empty($data)){ if(!empty($data['form_detail'])){ echo $data['form_detail']['hometown']; } } ?>" >

                <input type="hidden" name="street" value="<?php if(!empty($data)){ if(!empty($data['form_detail'])){ echo $data['form_detail']['street']; } } ?>" >

                <input type="hidden" name="home_no" value="<?php if(!empty($data)){ if(!empty($data['form_detail'])){ echo $data['form_detail']['home_no']; } } ?>" >

                <input type="hidden" name="client_phone" value="<?php if(!empty($data)){ if(!empty($data['form_detail'])){ echo $data['form_detail']['client_phone']; } } ?>" >

                <input type="hidden" name="client_email" value="<?php if(!empty($data)){ if(!empty($data['form_detail'])){ echo $data['form_detail']['client_email']; } } ?>" >

                <input type="hidden" name="client_gender" value="<?php if(!empty($data)){ if(!empty($data['form_detail'])){ echo $data['form_detail']['client_gender']; } } ?>" >

                <input type="hidden" name="client_date_of_birth" value="<?php if(!empty($data)){ if(!empty($data['form_detail'])){ echo $data['form_detail']['client_date_of_birth']; } } ?>" >

                <input type="hidden" name="req_gur_amt" value="<?php if(!empty($data)){ if(!empty($data['form_detail'])){ echo $data['form_detail']['req_gur_amt']; } } ?>" >

                <input type="hidden" name="gur_period_month" value="<?php if(!empty($data)){ if(!empty($data['form_detail'])){ echo $data['form_detail']['gur_period_month']; } } ?>" >

                <input type="hidden" name="startDate" value="<?php if(!empty($data)){ if(!empty($data['form_detail'])){ echo $data['form_detail']['startDate']; } } ?>" >

                <input type="hidden" name="endDate" value="<?php if(!empty($data)){ if(!empty($data['form_detail'])){ echo $data['form_detail']['endDate']; } } ?>" >

                <input type="hidden" name="first_base64_signature" value="<?php if(!empty($data)){ if(!empty($data['form_detail'])){ echo $data['form_detail']['first_base64_signature']; } } ?>" >

                <input type="hidden" name="second_base64_signature" value="<?php if(!empty($data)){ if(!empty($data['form_detail'])){ echo $data['form_detail']['second_base64_signature']; } } ?>" >

            <?php } } ?>

            <?php if(!empty($data)){ if($data['status'] == "false"){ ?>

                <!-- if getting bad response -->
                <!-- screen X -->
                <div id="bad_screen" class="gform_body form_height" style="margin-top: 30px;">
                    
                    <div class="" style="float: right; margin-left:15px; margin-top:-25px;">
                        <img src="<?php echo base_url() ?>website_assets/img/progressX.png" class="img-responsive">
                   
                    </div>

                    <p class="rtl" style="text-align:right;font-weight: bold;font-size: 22px;"> ערבות לא אושרה  </p>

                    <p class="rtl" style="text-align:right; margin-top: -8px;"> בחר באחד משני המסלולים  </p>

                     <p class="rtl" style="text-align:center;font-weight: bold; margin-top: 50px;">היי דני, לצערנו הרב, הבקשה שלך ערבות ללא פיקדון לא אושרה. </p>

                     <img src="http://oblidev.malul.xyz/website_assets/img/obliz.png" class="img-responsive tab_image-obli">
    
                   <!--  <p class="rtl" style="text-align:center;font-weight: bold;"> היי דני, סכום הערבות המבוקש גבוה מ000-,25 ₪. </p> -->

                    <p class="rtl" style="text-align:center;">  כדי לקבל את הערבות המבוקשת ,<br>באפשרותך לבחור באחד משני המסלולים:</p>

                    <br>
                    <div class="row">
                        <div class="col-md-3 col-sm-3"></div>
                        <div class="col-md-6 col-sm-6">
                            <a class="button gform_button next"> <p class="first_main_button" >ערבות עם ערב נוסף </p></a>
                             
                            <a class="button gform_button" href="<?php echo site_url('tenant'); ?>"> <p class="first_main_button" > ערבות עם פיקדון </p></a>
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


            <?php }elseif($data['status'] == "true"){ if($data['form_detail']['req_gur_amt'] > 25000){ ?>

                <!-- greater than 25000 after screen(scr_six_form) -->

                 <div id="25000AfterScreen" class="gform_body form_height" style="margin-top: 30px;">
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
                     <p class="rtl" style="text-align:right;font-weight: bold;font-size: 22px;"> סכום הערבות גבוה  </p>

                    <p class="rtl" style="text-align:right; margin-top: -8px;"> בחר באחד משני המסלולים </p>

                     <p class="rtl" style="text-align:center;font-weight: bold; margin-top: 50px;"> היי דני, סכום הערבות המבוקש גבוה מ000-,25 ₪. </p>

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

                    <!-- <div class="row">
                        <div class="col-md-2 col-sm-2"></div>
                        <div class="col-md-8 col-sm-8">
                             <div class="col-md-6 col-sm-6"><div class="box-button1"><p> סכום לא אושר  </p></div></div>
                             <div class="col-md-6 col-sm-6"> <div class="box-button2"><p> גרסא 1 </p></div></div>
                            
                        </div>
                        <div class="col-md-2 col-sm-2"></div>
                    </div> -->

                </div>

            <?php } else{ ?>

                <!-- lower than 25000 screen(scr_five_form) -->
                <div id="scr_five_form" class="gform_body form_height" style="margin-top: 30px;">
                
                            <div class="" style="float: right; margin-left:15px; margin-top:-25px;">
                            <img src="<?php echo base_url() ?>website_assets/img/progress3.png" class="img-responsive">
                           
                           </div>
                    <p class="rtl" style="text-align:right;font-weight: bold;font-size: 22px;">פרטים על הנכס </p>
                    <p class="rtl" style="text-align:right; margin-top: -8px;">השלב הבא: בקשת ערבות </p>

                    
                    <br>

                    <ul class="gform_fields top_label ">

                        <li class="gfield gfield_html gfield_no_follows_desc " style="">
                            <p class="contact-text_application" style="text-align:right;">היי דני, עוד כמה פרטים ומתקדמים, ממליצים להכין מראש את פרטי בעל הנכס  </p>
                         </li>

                      
                        <li class="gfield gf_left_third text-field1_application form-group">
                           
                            <div class="styled-input wide">
                               <textarea class="textarea large form-control nine1_left" name="apartment_add" rows="5" cols="50" id="apartment_add" required="" style="max-height: 56px;" ></textarea>
                               <!-- <input type="text" name="first_name" id="first_name" value="" class="form-control" required=""> -->
                                <label class="gfield_label control-label gform_wrapper gfield_label" for="apartment_add">כתובת הדירה
                            </label>
                            </div>
                        </li>

                        <!-- <li class="gfield gf_left_third text-field2_application form-group">
                            
                            <div class="styled-input wide">
                               <input type="text" name="sec_date_of_birth" id="sec_date_of_birth" value="" class="form-control daterange nine2_left" required="" autocomplete="off"> 

                               <input type="hidden" name="sec_dateStartDate" id="sec_dateStartDate" >
                               <input type="hidden" name="sec_dateEndDate" id="sec_dateEndDate" >

                                <label class="gfield_label control-label gform_wrapper gfield_label" for="datepicker">תקופת הערבות
                                     <img src="<?php echo base_url() ?>website_assets/img/calendar_icon.png" class="img-responsive cal_reponsive3" style="position: relative; left: -158px; top: -5px;">
                            </label>
                            </div> 
                        </li> -->

                        <li class="gf_left_third gfield text-field2_application form-group">
                        
                            <div class="styled-input wide">
                               <input type="text" name="landlord" id="landlord" value="" class="form-control nine3_left" required="">
                                <label class="gfield_label control-label gform_wrapper gfield_label" for="landlord">שם בעל הדירה  
                            </label>
                            </div>
                        </li>

                        <li class="gf_middle_third gfield text-field1_application form-group">
                       
                            <div class="styled-input wide">
                               <input type="text" name="landlord_id" id="landlord_id" value="" class="form-control nine3_left" required="">
                                <label class="gfield_label control-label gform_wrapper gfield_label" for="landlord_id">ת.ז בעל הדירה  
                            </label>
                            </div>
                        </li>

                        <li class="gf_left_third gfield text-field2_application form-group">
                         
                            <div class="styled-input wide">
                               <input type="text" name="property_phone" id="property_phone" value="" class="form-control nineth_text" required="">
                                <label class="gfield_label control-label gform_wrapper gfield_label" for="property_phone">טלפון בעל הדירה   
                            </label>
                            </div>
                        </li>

                       
                         <li class="gfield gf_left_third text-field1_application form-group">
                         
                            <div class="styled-input wide">
                               <input type="text" name="sec_email" id="sec_email" value="" class="form-control nineth_text" required="">
                               <label class="gfield_label control-label gform_wrapper gfield_label" for="sec_email">
                               <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">דוא”ל בעל הדירה
                          </font></font></label>
                            </div>
                        </li>

                        <li class="gf_middle_third gfield text-field2_application form-group">
                            

                             <label class="for_file_label" id="for_file_label1" for="client_add">צירוף חוזה שכירות  </label>
                             <div  id="selected-file1" style="padding-top:40px; display: none;">
                                 
                                 <div class="row">
                                    <div class="col-md-2">
                                      <span onclick="removeFile1()" class="file-close-icon">
                                        <!-- <i style="font-size:24px;" class="fa fa-close"></i> -->
                                        <img src="<?php echo base_url() ?>website_assets/img/close.png" class="img-responsive" style="float: left;">
                                    </div>
                                   
                                    <div class="col-md-8">
                                      <label class="for_file_name" id="file-name-label1"></label>
                                    </div>
                                     <div class="col-md-2">
                                      <span><i class="fa fa-file-text-o for_file_icon"></i></span>
                                    </div>
                                 </div>

                              
                             </div>

                            <input type="file" name="file-1" id="file-1" class="inputfile inputfile-2" accept="image/gif,image/png,image/jpeg,image/jpg,application/pdf" style="display: none;" onchange="f1()">
                              <label for="file-1" id="label-for-file1" style="margin-top: 8px;padding: 13.5px;">

                                <span style="font-weight: 200; font-size: 20px; margin-left:40px;">צירוף חוזה שכירות  </span>
                                <i style="font-size:24px; margin-left: 30px;" class="fa">&#xf030;</i>
                              </label>
                        </li>

                    

                    </ul>

                   <div class="row" style="margin-top: 50px;">
                        <div class="col-md-3 col-sm-3"></div>
                        <div class="col-md-6 col-sm-6">
                        
                             
                            <a class="button gform_button"> <p class="first_main_button lowerbutton" id="five_next_form">המשך  </p></a>


                            <!-- <input type="submit" id="five_next_form" class="gform_button button next first_main_button five_next_form" value="המשך" tabindex="54"> --> 
                        </div>
                        <div class="col-md-3 col-sm-3"></div>
                    </div>
                 
                </div>

            <?php } } } ?>
                

                <!-- screen seven -->
                <div id="scr_seven_form" class="gform_body form_height" style="margin-top: 30px;">
                        
                    <div class="" style="float: right; margin-left:15px; margin-top:-25px;">
                        <img src="<?php echo base_url() ?>website_assets/img/progress3.png" class="img-responsive">
                       
                    </div>
                    <p class="rtl" style="text-align:right;font-weight: bold;font-size: 22px;">ףסונ ברע םיישיא םיטרפ </p>

                    <p class="rtl" style="text-align:right; margin-top: -8px;">השלב הבא: סכום הערבות </p>

                    
                    <br>

                    <ul class="gform_fields top_label ">

                        <li class="gfield gfield_html gfield_no_follows_desc "> 
                           <!--  <h1 class="page-subtitle page-subtitle_application">צור קשר</h1> -->
                           
                            <p class="contact-text_application rtl">כאן נזדקק לפרטים של הערב הנוסף (את הפרטים שלך כבר יש לנו)</p>
                        </li>

                        <li class="gfield gf_left_third text-field1_application form-group">
                            <!-- <label class="gfield_label control-label" for="first_name"> שם פרטי
                            </label>

                            <div class="">
                               <input type="text" name="first_name" id="first_name" value="" class="form-control">
                            </div> -->

                            <div class="styled-input wide">
                              <input type="text" name="ant_first_name" id="ant_first_name" value="" class="form-control seven1_left" required="">
                                <label class="gfield_label control-label gform_wrapper gfield_label" for="ant_first_name">שם פרטי   
                            </label>
                            </div> 
                        </li>

                        <li class="gf_middle_third gfield text-field2_application form-group">
                            <!-- <label class="gfield_label control-label" for="last_name">שם משפחה </label>
                            
                            <div class="">
                               <input type="text" name="last_name" id="last_name" value="" class=" form-control">
                            </div> -->


                            <div class="styled-input wide">
                              <input type="text" name="ant_last_name" id="ant_last_name" value="" class="form-control seven2_left" required="">
                                <label class="gfield_label control-label gform_wrapper gfield_label" for="ant_last_name">שם משפחה   
                            </label>
                            </div>
                        </li>   

                        <li class="gf_left_third gfield text-field1_application form-group">
                           <!--  <label class="gfield_label control-label" for="unique_id">ת.ז</label>
                            
                            <div class="">
                               <input type="text" name="unique_id" id="unique_id" value="" class="form-control">
                            </div> -->

                            <div class="styled-input wide">
                               <input type="text" name="ant_unique_id" id="ant_unique_id" value="" class="form-control seven3_left" required="">

                               <span id="ant_unique_id_error" ><font style="vertical-align: inherit;">אנא הזן את המספר </font></span>

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

                                 
                                 
                                 
                                 <!-- <i class="fa fa-file-text-o"></i></span> -->
                               
                             </div>

                            <input type="file" name="file-2" id="file-2" class="inputfile inputfile-2" accept="image/gif,image/png,image/jpeg,image/jpg,application/pdf" style="display: none;" onchange="f2()">
                            <label for="file-2" id="label-for-file2" style="margin-top: 8px;padding: 13.5px;">

                               <!-- <i style="font-size:24px; margin-left: 60px;" class="fa">&#xf030;</i> -->
                                <i style="font-size:24px; margin-left: 60px;" class="fa">&#xf030;</i>
                                <span style="font-weight: 200; font-size: 20px; margin-left:70px;">צילום ת.ז </span>
                             
                            </label>
                        </li>

                        <li class="gf_left_third gfield text-field1_application form-group">
                            <!-- <label class="gfield_label control-label" for="client_add"> כתובת מגורים נוכחית </label>

                            <div class="">
                               <textarea class="input_application textarea large form-control" name="client_add" rows="5" cols="50" id="client_add" style="max-height: 56px;"></textarea>
                            </div> -->

                            <div class="styled-input wide">
                               <textarea class="textarea large form-control seven4_left" name="ant_client_add" rows="5" cols="50" id="ant_client_add" required="" style="max-height: 56px;" ></textarea>
                                <label class="gfield_label control-label gform_wrapper gfield_label" for="ant_client_add">כתובת מגורים נוכחית
                            </label>
                            </div>
                        </li>
                       
                        <li class="gfield gf_left_third text-field2_application form-group">
                            <!-- <label class="gfield_label control-label" for="client_phone"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">טלפון נייד
                          </font></font></label>

                            <div class="">
                               <input type="text" name="client_phone" id="client_phone" value="" class="form-control">
                            </div> -->

                            <div class="styled-input wide">
                               <input type="text" name="ant_client_phone" id="ant_client_phone" value="" class="form-control ant_client_phone_text" required="">

                               <span id="ant_client_phone_error" ><font style="vertical-align: inherit;">מספר הטלפון מוכרח להיות 10 תווים </font></span>
                               
                               <label class="gfield_label control-label gform_wrapper gfield_label" for="ant_client_phone">טלפון נייד   
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
                               <input type="text" name="ant_client_email" id="ant_client_email" value="" class="form-control seven5_left" required="">

                               <span id="ant_client_email_error" ><font style="vertical-align: inherit;">אנא הזן כתובת דוא"ל תקנית. </font></span>
                               
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
                             
                           <!--   <input type="radio" name="radio-box" id="box-2" checked="checked">רכז -->
                             <input type="radio" name="ant_client_gender" value="זכר" id="box-2" checked="checked" value="30" style="left: 55px; top: -6px;">זכר
                              
                            </label>
                           
                              <label for="radio-button-0" class="radio gfield_label control-label" style="top: -30px;right: 105px;">
                             
                            <input type="radio" name="ant_client_gender" value="נקבה" id="box-1" style="left: 69px;top: -6px;">נקבה
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
                               <input type="text" name="antsec_date_of_birth" id="datepicker" value="" class="form-control active seven6_left" required="" autocomplete="off">

                                <label class="gfield_label control-label gform_wrapper gfield_label" for="datepicker">תקופת הערבות
                                 <!-- <i class="fa fa-calendar cal_reponsive3" aria-hidden="true" style="position: relative; left: -147px;"></i> -->
                                <img src="<?php echo base_url() ?>website_assets/img/calendar_icon.png" class="img-responsive cal_reponsive3" style="position: relative;left: -160px;top: -4px;">
                            </label>
                            </div> 
                        </li>

                        <li class="gfield gfield_html gfield_no_follows_desc " style="margin-top: 160px;">
                
                            <p class="contact-text_application" style="text-align:right;font-weight: bold;font-size: 22px;">פרטים על הנכס </p>
                           
                        </li>

                        <li class="gf_middle_third gfield text-field1_application form-group">
                            <!-- <label class="gfield_label control-label" for="ant_req_gur_amt">סכום הערבות המבוקש  </label>
                           
                            <div class="">
                               <input type="text" name="ant_req_gur_amt" id="ant_req_gur_amt" value="" class=" form-control">

                               <span id="ant_req_gur_amt_error" ><font style="vertical-align: inherit;">אנא הזן את המספר </font></span>
                            </div> -->
                            <div class="styled-input wide">
                               <input type="text" name="ant_req_gur_amt" id="ant_req_gur_amt" value="" class="form-control seven7_left" required="">

                               <span id="ant_req_gur_amt_error" ><font style="vertical-align: inherit;">אנא הזן את המספר </font></span>

                                <label class="gfield_label control-label gform_wrapper gfield_label" for="ant_req_gur_amt">סכום הערבות המבוקש  
                            </label>
                            </div> 
                        </li>

                        <li class="gfield gf_left_third text-field2_application form-group">
                            <!-- <label class="gfield_label control-label" for="ant_gur_period_month">
                            </label>
                            <i class="fa fa-calendar" aria-hidden="true" style="float: left;"></i>

                            <div class="">
                            
                                <input type="text" name="ant_gur_period_month" id="field-5" class="form-control daterange active" data-time-picker="true" data-time-picker-increment="5" data-format="MM/DD/YYYY" style="margin-top: 5px;">

                            </div> -->
                            <div class="styled-input wide"> 
                               <input type="text" name="ant_gur_period_month" id="field-5" value="" class="form-control daterange seventh_text" data-time-picker="true" data-format="MM/DD/YYYY" required="" autocomplete="off" style="direction: ltr;" >

                               <input type="hidden" name="antstartDate" id="antstartDate" >
                               <input type="hidden" name="antendDate" id="antendDate" >

                                <label class="gfield_label control-label gform_wrapper gfield_label" for="ant_gur_period_month">

                                <!-- <i class="fa fa-calendar cal_reponsive4" aria-hidden="true" style="position: relative; left: -124px;"></i> -->
                                <img src="<?php echo base_url() ?>website_assets/img/calendar_icon.png" class="img-responsive cal_reponsive4" style="position: relative;left: -263px;top: -5px;">
                            </label>
                            </div>
                        </li>



                    </ul>

                    <div class="gform_footer "> 
                       <!--  <a class="button gform_button previous_scr"> <p class="first_next_button">הקודם</p></a> -->
                        <a class="button gform_button" ><p class="first_next_button scr_first_submit" id="seven_next_form" style="margin-right: -25px; margin-top: 30px;">המשך</p> </a>
                    </div>

                </div>
            <!-- end -->


            </div>

        </div>


            <!-- first loader obli gif -->
            <div class="sonar-wrapper">
                <div class="sonar-emitter">
                    <img src="<?php echo base_url() ?>website_assets/img/loader.png" style="margin-top: 15px; margin-right: 33px;">

                    <div id="sonar_text">
                        <p class="rtl" style="font-weight: bold;font-size: 22px;">עוד כמה רגעים </p>
                        <p class="rtl" >אנחנו בודקים את בקשתך לערבות ומיד נעדכן. </p>
                    </div>
                <div class="sonar-wave"></div>
                </div>
            </div>

            <script type="text/javascript">
                $(".sonar-wave").on("webkitAnimationIteration oanimationiteration animationiteration", function(){
                  $(this).css("background-color", colorize());
                })

                function colorize() {
                  var hue = Math.random() * 360;
                  return "HSL(" + hue + ",100%,50%)";
                }
            </script>  

                  

                <!-- other screen -->
                   <!-- screen 4/5 -->
                    <div id="greaterThan2500Scr" class="gform_body form_height1" style="margin-top: 30px;">
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



           


                  <!-- screen 4/5-box -->
                <div id="scr_eight_form" class="gform_body form_height" style="margin-top: 30px;">
                  <!-- <div class="progress-circle over50 p66" style="float: right; margin-left:15px; margin-top:-25px;">
                           <span>4 / 5</span>
                           <div class="left-half-clipper">
                              <div class="first50-bar"></div>
                              <div class="value-bar"></div>
                           </div>
                           </div> -->
                            <div class="" style="float: right; margin-left:15px; margin-top:-25px;">
                            <img src="<?php echo base_url() ?>website_assets/img/progress4.png" class="img-responsive">
                           
                           </div>
                    <p class="rtl" style="text-align:right;font-weight: bold;font-size: 22px;">בקשת ערבות  </p>
                    <p class="rtl" style="text-align:right;">השלב הבא: פרטי תשלום </p>

                    
                    <br>
<?php if(!empty($data)){ if(!empty($data['form_detail'])){ $req_amt = $data['form_detail']['req_gur_amt']; $first_value = $req_amt*0.06; $second_value = $first_value/12; } } ?>
                    <ul class="gform_fields top_label ">

                        <li class="gfield gfield_html gfield_no_follows_desc " style="margin-top: 30px;">
                           
                            <p class="contact-text_application rtl" style="text-align:center; font-weight: 600;">בחרת בערבות ללא פיקדון</p>

<!--                            <p class="contact-text_application rtl" style="text-align:center; margin-top: -8px">התשלום החודשי יעמוד על <?php // if(!empty($first_value)) echo $first_value; ?> ש”ח</p>-->
                            
                         </li>

                    </ul>


                    <div class="modal-dialog_box">
                        <div class="modal-content_box">
                            <div class="modal-header_box">
                               
                                <h3 class="modal-title_box" id="myModalLabel">חיוב חודשי </h3>
                            </div>
                            <div class="modal-body_box">
                                <!-- <p class="rtl" style="text-align:center;font-weight: bold;font-size: 22px;">בקשת ערבות  </p> -->
                                 <br>
                                <p class="rtl" style="text-align:center;font-weight: bold;font-size: 52px;"><?php if(!empty($second_value)) echo $second_value; ?> ₪ </p>
                                
                                <p class="contact-text_application rtl" style="text-align:center;">עמלת הערבות השנתית הינה 6%</p>
                                <p class="contact-text_application rtl" style="text-align:center; margin-top: -18px;">ותעמוד על <?php if(!empty($first_value)) echo $first_value; ?> ₪ בשנה.</p>
                              
                             

                            </div>
                           
                        </div>
                    </div>

                   <div class="row" style="margin-top:100px;">
                        <div class="col-md-3 col-sm-3"></div>
                        <div class="col-md-6 col-sm-6">
                        
                             
                            <!-- <a class="button gform_button next"> <p class="first_main_button">לתשלום </p></a> -->

                            <button type="submit" class="button gform_button first_main_button" value="submit">לתשלום </button> 
                        </div>
                        <div class="col-md-3 col-sm-3"></div>
                    </div>

                </div>

                <!-- screen 5/5-box -->
             <style type="text/css">
            @media only screen and (max-width:3000px) and (min-width: 992px){
                .map_iframe{
                        width: 1050px;
                        margin-left: -177px;
                    }
                    .iframe_height{
                        height: 500px;
                    }
                }

                             </style>
                <!-- screen 5/5 -->
                 <div id="scr_nine_form" class="gform_body form_height1" style="margin-top: 30px;">
                   
                            <div class="" style="float: right; margin-left:15px; margin-top:-25px;">
                            <img src="<?php echo base_url() ?>website_assets/img/progress5.png" class="img-responsive">
                           
                           </div>
                    <p class="rtl" style="text-align:right;font-weight: bold;font-size: 22px;">קבלת ערבות  </p>

                    <p class="rtl" style="text-align:right; margin-top: -8px;">זה השלב האחרון </p>

                    <!-- <p class="rtl" style="text-align:right; margin-top: 30px;">כאן נבצע את השארת פרטי האשראי  </p> -->
                   
                    <div class="row map_iframe" style="margin-top: 50px;">
                        <div class="col-md-12 col-sm-12">
                          <div class=""><iframe class="iframe_height" width="100%" height="100%"  src="<?php if(!empty($data)){ if(!empty($data['api_url'])){ echo $data['api_url']; } } ?>"></iframe></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 col-sm-3"></div>
                        <div class="col-md-6 col-sm-6">
                            <!-- <div class="screen5_box"></div> -->
                            <!-- <div class=""><iframe width="600" height="500"  src="https://tarya.orange.tarya.co.il/app/tarya-pay/loan-amount-and-number-of-payments?token=0c038ccc7ad543b28dffad9c74ef7b48"></iframe></div> -->
                            
                            
                        </div>
                        <div class="col-md-3 col-sm-3"></div>
                    </div>
                    <p class="rtl" style="text-align:center">רצינו שתדע, כי רק לאחר קבלת שטר  </p>
                    <p class="rtl" style="text-align:center; margin-top: -8px;">הערבות יחויב כרטיס האשראי שלך  </p>

                    <br>
                    <div class="row">
                        <div class="col-md-3 col-sm-3"></div>
                        <div class="col-md-6 col-sm-6">
           
                            <a class="button gform_button next">
                            <p class="first_next_button screen-button-obli screen-button2-obli screen-button3-obli padding_screen02 text_size">המשך </p></a>
                        </div>
                        <div class="col-md-3 col-sm-3"></div>
                    </div>
                    <br><br><br>

                 
                </div>

                <!-- screen 5/5 after -->
                <div id="scr_ten_form" class="gform_body form_height1" style="margin-top: 30px;">
                            <div class="" style="float: right; margin-left:15px; margin-top:-25px;">
                           
                           </div>
                    <p class="rtl" style="text-align:center;font-weight: bold;font-size: 22px;">מזל טוב דני! בקשתך אושרה באופן עקרוני </p>

                    <div class="row">
                        <div class="col-md-3 col-sm-3"></div>
                        <div class="col-md-6 col-sm-6">
                         
                            <div>
                               <img src="<?php echo base_url() ?>website_assets/img/success-obli1.gif" class="img-responsive">
                            </div>
                           
                        </div>
                        <div class="col-md-3 col-sm-3"></div>
                    </div>
                    <p class="rtl" style="text-align:center">נחזור אליך בעוד 2 ימי עסקים לאישור סופי הודעת SMS או במייל. </p>
                    <p class="rtl" style="text-align:center; margin-top: -8px;">תודה שבחרת בOBLI! </p>

               

                    <br>
                    <div class="row">
                        <div class="col-md-3 col-sm-3"></div>
                        <div class="col-md-6 col-sm-6">
           
                         <a class="button gform_button" href="<?php echo site_url('website'); ?>">
                         <p class="first_next_button screen-button-obli screen-button2-obli screen-button3-obli padding_screen02 text_size" style="font-weight: 600;">חזור לדף הבית  </p></a>
                        </div>
                        <div class="col-md-3 col-sm-3"></div>
                    </div>
                    <br><br><br>

                </div>

                <!-- screen 5/5 after1-->
                 <div id="scr_eleven_form" class="gform_body form_height" style="margin-top: 30px;">
                   
                            <div class="" style="float: right; margin-left:15px; margin-top:-25px;">
                            <img src="<?php echo base_url() ?>website_assets/img/progress_lock.png" class="img-responsive">
                           
                           </div>
                    <p class="rtl" style="text-align:right;font-weight: bold;font-size: 22px;">קבלת ערבות  </p>

                    <p class="rtl" style="text-align:right;">זה השלב האחרון </p>

                    <p class="rtl" style="text-align:center; margin-top: 30px; font-weight: bold;">כתב הערבות ולינק לשליחת הערבות לבעל הדירה מצורפים: </p>
                   
                    <div class="row">
                        <div class="col-md-3 col-sm-3"></div>
                        <div class="col-md-6 col-sm-6">
                            <div class="screen5_after">
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3"></div>
                    </div>
                 
                    <br>
                    <div class="row">
                        <div class="col-md-3 col-sm-3"></div>
                        <div class="col-md-6 col-sm-6">
           
                            <a class="button gform_button next"> <p class="first_next_button screen-button-obli screen-button2-obli screen-button3-obli padding_screen02 text_size" style="font-weight: 600;">כתב הערבות   <span>
                                <i class="fa fa-file-text-o screen5_icon"></i></span></p></a>

                            <a class="button gform_button "> <p class="first_next_button screen-button-obli screen-button2-obli screen-button3-obli padding_screen02 text_size" style="margin-top: 30px; margin-bottom: 30px; font-weight: 600;">שליחת כתב הערבות  <span>
                                <img src="<?php echo base_url() ?>website_assets/img/right_arrow.png" class="img-responsive screen_5img"></span></p></a>

                             <p class="rtl" style="text-align:center;font-weight:bold;">לכל שאלה, אל תהסס לפנות אלינו  </p>
                             <p class="rtl" style="text-align:center;color:#4EB5D7;font-weight:bold;">צור קשר  </p>

                        </div>

                        <div class="col-md-3 col-sm-3"></div>
                    </div>
                    <br><br><br>

                 
                </div>

        <!-- end screen -->


                <!-- screen 8 -->
                <div id="scr_seven_form_new" class="gform_body">
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
    

<link rel="stylesheet" href="<?php echo base_url() ?>website_assets/date/daterangepicker-bs3.css">
<script src="<?php echo base_url() ?>website_assets/date/moment.min.js"></script>
<script src="<?php echo base_url() ?>website_assets/date/daterangepicker.js"></script>
<!--  <script src="<?php echo base_url() ?>website_assets/date/xenon-custom.js"></script> -->

<script type="text/javascript">

$("#myform").on("submit", function (e) {
        e.preventDefault();
        if ($(this).valid(e)) { 
           // alert(1);
            $.ajax({
                url: '<?php echo site_url("website/submit_form_data"); ?>',
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (result) {
//alert(result);
                    if (result != '') {
                      // alert(2);
                        // var getdata = jQuery.parseJSON(result);
                        var getdata = jQuery.parseJSON(JSON.stringify(result));
                                         
                        console.log(getdata);
                       
                        var status = getdata.status;
                        // alert(status);
                        if (status == 'true') {

                              if($('#scr_eight_form').is(":visible")){
                                  current_fs = $('#scr_eight_form');
//                                  $("#scr_nine_form").animate({height: "300px"});
                                  next_fs = $('#scr_nine_form');
                              }
                              
                              next_fs.show(); 
                              current_fs.hide();
                        }
                        else
                        {
                            if($('#scr_eight_form').is(":visible")){
                                current_fs = $('#scr_eight_form');
//                                $("#scr_nine_form").animate({height: "300px"});
                                next_fs = $('#scr_nine_form');
                            }
                            
                            next_fs.show(); 
                            current_fs.hide();
                        }
                    }
                },
                error: function () {
                }
            });
        }
    });

</script>