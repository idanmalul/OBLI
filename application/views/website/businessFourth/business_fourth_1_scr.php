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
<link rel="stylesheet" href="<?php echo base_url() ?>website_assets/css/business_style.css" type="text/css" media="all">

 
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

            $("#businessFouth_1_form").css("opacity","0.5"); 
            $("#businessFouth_1_form").css("cursor","auto");
            $('#businessFouth_1_form').prop('disabled', true);
            // $('#businessFouth_1_form').prop('disabled', false);

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

                    $("#businessFouth_1_form").css("opacity","1"); // button opacity change
                    $("#businessFouth_1_form").css("cursor","pointer");
                    $('#businessFouth_1_form').prop('disabled', false);

                }
                else{
                    $("#businessFouth_1_form").css("opacity","0.5"); 
                    $("#businessFouth_1_form").css("cursor","auto");
                    $('#businessFouth_1_form').prop('disabled', true);
                }

              
            });

            $('#file-2,#datepicker').on('change', function() {

                if($("#first_name").val() != '' && $("#last_name").val() != '' && $("#unique_id").val() != '' && $("#hometown").val() != ''  && $("#street").val() != '' && $("#home_no").val() != '' && $("#client_phone").val() != '' && $("#client_email").val() != '' && $("#datepicker").val() != '' && $("#file-2").val() != '' ){

                        $("#businessFouth_1_form").css("opacity","1"); // button opacity change
                        $("#businessFouth_1_form").css("cursor","pointer");
                        $('#businessFouth_1_form').prop('disabled', false);
                    
                }else{
                    $("#businessFouth_1_form").css("opacity","0.5"); 
                    $("#businessFouth_1_form").css("cursor","auto");
                    $('#businessFouth_1_form').prop('disabled', true);
                }

              
            });


            $("#businessFouth_1_form").click(function(){

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
                                required: true
                            },
                            unique_id: {
                                required: true,
                                number: true
                            },
                            hometown: {
                                required: true
                            },
                            street: {
                                required: true
                            },
                            home_no: {
                                required: true,
                                number: true
                            },
                            client_phone: {
                                customphone: true
                                // number: true
                                // min: 9,
                                // max: 10
                            },
                            client_email: {
                                required: true,
                                customemail: true
                            },
                            client_gender: {
                                required: true
                            },
                            client_date_of_birth:{
                                required: true
                            }
                            
                        },
                        messages: {
                            first_name: {
                                required: "שדה חובה"
                            },
                            last_name: {
                                required: "שדה חובה"
                            },
                            client_photo: {
                                required: "שדה חובה"
                            },
                            unique_id: {
                                required: "שדה חובה",
                                number: "אנא הזן את המספר"
                            },
                            hometown: {
                                required: "שדה חובה"
                            },
                            street: {
                                required: "שדה חובה"
                            },
                            home_no: {
                                required: "שדה חובה",
                                number: "אנא הזן את המספר"
                            },
                            client_phone: {
                                required: "שדה חובה"
                                // number: "אנא הזן את המספר"
                                // min: "מספר הטלפון מוכרח להיות 10 תווים",
                                // max: "מספר הטלפון מוכרח להיות 10 תווים"
                            },
                            client_email: {
                                required: "שדה חובה",
                                customemail: 'אנא הזן כתובת דוא"ל תקנית.'
                            },
                            client_gender: {
                                required: "שדה חובה"
                            },
                            client_date_of_birth: {
                                required: "שדה חובה"
                            }
                            
                        }
                        
                    });

                    if (form.valid() === true){

                        $("#businessFouth_1_form").css("opacity","1"); 
                        $("#businessFouth_1_form").css("cursor","pointer");
                        $('#businessFouth_1_form').prop('disabled', false);
                    }
                    else{
                        $("#businessFouth_1_form").css("opacity","0.5"); 
                        $("#businessFouth_1_form").css("cursor","auto");
                        $('#businessFouth_1_form').prop('disabled', true);
                    }

                if($("#first_name").val() != '' && $("#last_name").val() != '' && $("#unique_id").val() != '' && $("#hometown").val() != ''  && $("#street").val() != '' && $("#home_no").val() != '' && $("#client_phone").val() != '' && $("#client_email").val() != '' && $("#datepicker").val() != '' && $("#file-2").val() != '' ){

                    $("#businessFouth_1_form").css("opacity","1"); 
                    $("#businessFouth_1_form").css("cursor","pointer");
                    $('#businessFouth_1_form').prop('disabled', false);
                    
                }
                else{
                    $("#businessFouth_1_form").css("opacity","0.5"); 
                    $("#businessFouth_1_form").css("cursor","auto");
                    $('#businessFouth_1_form').prop('disabled', true);
                }
            });

});

</script>


<!-- jQuery library -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->

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
            

            <form method="post" enctype="multipart/form-data" id="myform" name="validate_form" action="<?php echo site_url('businessFourth1'); ?>" novalidate>

                  <!-- screen 03 -->
                  <div id="business_3_scr" class="gform_body form_height" style="margin-top: 30px;">
                    

                        <div class="" style="float: right; margin-left:15px; margin-top:-25px;">
                            <img src="<?php echo base_url() ?>website_assets/img/progress01.png" class="img-responsive">
                           
                        </div>
                          <div class="main_text">
                    <p class="rtl main_text_heading" style="text-align:right;font-weight: bold;">פרטים אישיים </p>

                    <p class="rtl" style="text-align:right; margin-top: -8px;">השלב הבא: פרטי החברה  </p>

                     </div>
                    <br>

                    <ul class="gform_fields top_label ">

                        <li class="gfield gfield_html gfield_no_follows_desc "> 
                           <!--  <h1 class="page-subtitle page-subtitle_application">צור קשר</h1> -->
                           
                            <p class="contact-text_application">נשמח להציע לכם ערבות לשכר הדירה, וגם להכיר אתכם  </p>
                             <p class="contact-text_application" style="color: #EC0D0D;">* שימו לב! יש למלא את הפרטים האישיים של מורשי החתימה בלבד. </p>
                         </li>

                        <li class="gfield gf_left_third text-field1_application form-group">
                         

                            <div class="styled-input wide">
                               <input type="text" name="first_name" id="first_name" value="" class="form-control left_lbl1" required="">
                                <label class="gfield_label control-label gform_wrapper gfield_label " for="first_name"> שם פרטי
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
                                <label class="gfield_label control-label gform_wrapper gfield_label" for="home_no">מס’ בית
                            </label>
                            </div> 
                        </li>
                       
                        <li class="gfield gf_left_third text-field2_application form-group">
                      

                            <div class="styled-input wide">
                               <input type="text" name="client_phone" id="client_phone" value="" class="form-control client_phone_text"  required="" >
                                <label class="gfield_label control-label gform_wrapper gfield_label" for="client_phone">טלפון נייד
                            </label>
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
                             
                           <!--   <input type="radio" name="radio-box" id="box-2" checked="checked">רכז -->
                             <input type="radio" name="client_gender" value="זכר" id="box-2" checked="checked" value="30" style="left: 55px; top: -6px;">זכר </label>
                           
                              <label for="radio-button-0" class="radio gfield_label control-label" style="top: -30px;right: 105px;">
                             
                             <input type="radio" name="client_gender" value="נקבה" id="box-1" style="left: 69px;top: -6px;">נקבה </label>
                            </div>
                        </label>

                            
                        </li>

                        <li class="gfield gf_left_third text-field1_application form-group" style="margin-top: -5px;">
                        
                            <div class="styled-input wide">
                               <input type="text" name="client_date_of_birth" id="datepicker" data-format="DD/MM/YYYY" class="form-control sixth_text" required="" autocomplete="off">
                               <!-- <i class="fa fa-calendar" aria-hidden="true"></i> -->
                                <label class="gfield_label control-label gform_wrapper gfield_label" for="client_date">תאריך לידה
                                     <!-- <i class="fa fa-calendar cal_reponsive1" aria-hidden="true" style="position: relative; left: -165px;"></i>  -->
                                   <!--   <img src="<?php echo base_url() ?>website_assets/img/calendar_icon.png" class="img-responsive cal_reponsive1" style="position: relative; left: -185px; top: -5px;"> -->

                            </label>
                                <img src="<?php echo base_url() ?>website_assets/img/calendar_icon.png" class="img-responsive cal_reponsive" >
                            </div>
                        </li>

                        



                    </ul>

                

                </div>

                    

                  <div class="gform_footer top_label"> 
                        <button type="submit" class="button gform_button first_next_button screen-button-obli screen-button2-obli screen-button3-obli screen_2_buttons padding_screen02 text_size" id="businessFouth_1_form" style="margin: 0px 180px;">המשך</button>
                    </div>

               
            </form>
              </div>
          
            </div>
    
    

    </div>
                      
         
        </div>
  