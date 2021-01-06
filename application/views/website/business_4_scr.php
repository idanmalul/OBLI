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

<style>

    .spantext{ 
  font-size: 20px;
 } 

</style>

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

        $(document).ready(function(){

            $("#business_4_form").css("opacity","0.5"); 
            $("#business_4_form").css("cursor","auto");
            $('#business_4_form').prop('disabled', true);
            // $('#business_4_form').prop('disabled', false);

            // phone number validation
            $("#contact_person_phone").inputmask('9999-999-999');
            $.validator.addMethod('customphone', function (value, element) {
                return this.optional(element) || /^\d{4}-\d{3}-\d{3}$/.test(value);
            }, "מספר הטלפון מוכרח להיות 10 תווים");

            // email validate
            $.validator.addMethod('customemail', function (value, element) {
                return this.optional(element) || /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/.test(value);
            }, 'אנא הזן כתובת דוא"ל תקנית');
            // end

            $('#company_name,#company_id,#company_address,#contact_person_name,#contact_person_email,#contact_person_phone').on('keyup', function() {

                if($("#company_name").val() != '' && $("#company_id").val() != '' && $("#company_address").val() != '' && $("#contact_person_name").val() != ''  && $("#contact_person_email").val() != '' && $("#contact_person_phone").val() != '' ){

                    $("#business_4_form").css("opacity","1"); // button opacity change
                    $("#business_4_form").css("cursor","pointer");
                    $('#business_4_form').prop('disabled', false);

                }
                else{
                    $("#business_4_form").css("opacity","0.5"); 
                    $("#business_4_form").css("cursor","auto");
                    $('#business_4_form').prop('disabled', true);
                }

              
            });

            
            $("#business_4_form").click(function(){

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
                            company_name: {
                                required: true,
                                // usernameRegex: true,
                                minlength: 3,
                            },
                            company_id: {
                                required: true,
                                number: true
                            },
                            company_address: {
                                required: true,
                            },
                            contact_person_name: {
                                required: true,
                            },
                            contact_person_phone: {
                                customphone: true,
                            },
                            contact_person_email: {
                                required: true,
                                customemail: true
                            },                            
                        },
                        messages: {
                            company_name: {
                                required: "שדה חובה",
                            },
                            company_id: {
                                required: "שדה חובה",
                                number: "אנא הזן את המספר"
                            },
                            company_address: {
                                required: "שדה חובה",
                            },
                            contact_person_name: {
                                required: "שדה חובה",
                            },
                            contact_person_phone: {
                                required: "שדה חובה",
                            },
                            contact_person_email: {
                                required: "שדה חובה",
                                customemail: 'אנא הזן כתובת דוא"ל תקנית.'
                            },
                        }
                        
                    });

                    if (form.valid() === true){

                        $("#business_4_form").css("opacity","1"); 
                        $("#business_4_form").css("cursor","pointer");
                        $('#business_4_form').prop('disabled', false);
                    }
                    else{
                        $("#business_4_form").css("opacity","0.5"); 
                        $("#business_4_form").css("cursor","auto");
                        $('#business_4_form').prop('disabled', true);
                    }

                if($("#company_name").val() != '' && $("#company_id").val() != '' && $("#company_address").val() != '' && $("#contact_person_name").val() != ''  && $("#contact_person_email").val() != '' && $("#contact_person_phone").val() != '' ){

                    $("#business_4_form").css("opacity","1"); 
                    $("#business_4_form").css("cursor","pointer");
                    $('#business_4_form').prop('disabled', false);
                    
                }
                else{
                    $("#business_4_form").css("opacity","0.5"); 
                    $("#business_4_form").css("cursor","auto");
                    $('#business_4_form').prop('disabled', true);
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
            

            <form method="post" enctype="multipart/form-data" id="myform" name="validate_form" action="<?php echo site_url('website/business_Form4'); ?>" novalidate>

                  <!-- screen 04  -->
                
                    <div id="business_4_scr" class="gform_body form_height" style="margin-top: 30px;">
                 
                            <div class="" style="float: right; margin-left:15px; margin-top:-25px;">
                            <img src="<?php echo base_url() ?>website_assets/img/progress02.png" class="img-responsive">
                           
                           </div>
                            <div class="main_text">
                    <p class="rtl main_text_heading" style="text-align:right;font-weight: bold;">פרטי החברה‎ </p>
                    <p class="rtl" style="text-align:right; margin-top: -8px;"> סכום הערבות והסכמים </p>
                        </div>
                    
                    <br>

                    <ul class="gform_fields top_label ">

                        <li class="gfield gfield_html gfield_no_follows_desc " style="">
                         
                            <p class="contact-text_application" style="text-align:right;">היי <span id="spantext" class="spantext">דני</span>, וכעת נשמח להכיר את החברה שלכם  <br>חשוב שתדעו כי, כתב הערבות יונפק בפרטים אותם תמלאו בעמוד זה.</p>
                          
                         </li>

                        
                        <li class="gfield gf_left_third text-field1_application form-group">
                            
                            <div class="styled-input wide">
                               <input type="text" class="form-control company_name" name="company_name" id="company_name" required="" >
                             
                                <label class="gfield_label control-label gform_wrapper gfield_label" for="company_name">שם החברה
                            </label>
                            </div>
                            
                        </li>

                       
                        <li class="gfield gf_left_third text-field2_application form-group">
                            <label class="gfield_label control-label" for="current_residence"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">סוג עסק
                          </font></font>
                      <div class=""style="float: left; margin-right: -10px;">
                                <br>
                              <label for="radio-button-1" class="radio gfield_label control-label">
                             
                           <!--   <input type="radio" name="radio-box" id="box-2" checked="checked">רכז -->
                             <input type="radio" name="business_type" value='חברה בע”מ' id="box-2" checked="checked" value="30" style="left: 115px; top: -6px;">חברה בע”מ
                              
                            </label>
                           
                              <label for="radio-button-0" class="radio gfield_label control-label" style="top: -30px;right: 150px;">
                             
                             <input type="radio" name="business_type" value='עוסק פטור' id="box-1" style="left: 109px;top: -6px;">עוסק מורשה
                            </label>
                            </div>
                        </label>

                            
                        </li>


                        <li class="gf_left_third gfield text-field1_application form-group" style="margin-top: -10px;">
                          

                            <div class="styled-input wide">
                               <input type="text" name="company_id" id="company_id" value="" class="form-control hp_left" required="">
                                <label class="gfield_label control-label gform_wrapper gfield_label" for="landlord">ח.פ
                            </label>
                            </div>
                        </li>

                        <li class="gf_middle_third gfield text-field2_application form-group" style="margin-top: -10px;">
                          

                            <div class="styled-input wide">
                               <!-- <textarea type="text" name="company_address" id="company_address" value="" class="textarea large form-control company_address_left" rows="5" cols="50" required=""></textarea> -->
                               <textarea class="textarea large form-control company_address_left" name="company_address" rows="5" cols="50" id="company_address" required="" style="max-height: 56px;" ></textarea>
                                <label class="gfield_label control-label gform_wrapper gfield_label" for="company_address">כתובת החברה
                            </label>
                            </div>
                        </li>

                        <li class="gf_left_third gfield text-field1_application form-group">
                          
                            <div class="styled-input wide">
                               <input type="text" name="contact_person_name" id="contact_person_name" value="" class="form-control confirmed_contact_left" required="">
                                <label class="gfield_label control-label gform_wrapper gfield_label" for="contact_person_name">שם איש קשר
                            </label>
                            </div>
                        </li>

                       
                         <li class="gfield gf_left_third text-field2_application form-group">
                           

                            <div class="styled-input wide">
                               <input type="text" name="contact_person_email" id="contact_person_email" value="" class="form-control mail_contact_left" required="">
                               <label class="gfield_label control-label gform_wrapper gfield_label" for="contact_person_email">
                               <!-- <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">מייל אישר קשר</font> -->
                               <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">מייל איש קשר  </font>

                              </font></label>
                            </div>
                        </li>

                        <li class="gf_left_third gfield text-field1_application form-group">
                          
                            <div class="styled-input wide">
                               <input type="text" name="contact_person_phone" id="contact_person_phone" value="" class="form-control phone_contact_left" required="">
                                <label class="gfield_label control-label gform_wrapper gfield_label" for="contact_person_phone">טלפון איש קשר
                            </label>
                            </div>
                        </li>
                    

                    </ul>



                   <div class="row" style="margin-top: 140px;">
                        <div class="col-md-3 col-sm-3"></div>
                        <div class="col-md-6 col-sm-6">
                        
                             
                            <!-- <a class="button gform_button"> <p class="first_main_button lowerbutton" id="five_next_form">המשך  </p></a> -->

                            <button type="submit" class="button gform_button first_main_button lowerbutton" id="business_4_form">המשך</button>
                       
                        </div>
                        <div class="col-md-3 col-sm-3"></div>
                    </div>
                 
                </div>

            
              </div>

            </div>
    
    </form>

    </div>
                      
         
        </div>
    </div>
</div>

<script>

$( document ).ready(function() {

    <?php if(!empty($this->session->userdata['business3'])){ 


      $clientdetails = $this->session->userdata['business3'];

  ?>

        var client_first_name = '<?php echo $clientdetails["first_name"];?>';

        $("#spantext").html(client_first_name);

    <?php } ?>

});

</script>