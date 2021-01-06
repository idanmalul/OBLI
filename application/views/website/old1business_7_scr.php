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

<style type="text/css">
#ant_unique_id_error,#ant_client_phone_error,#ant_req_gur_amt_error,#ant_client_email_error,.sonar-wrapper{
  display: none;
}

/*eroor form message*/
#ant_unique_id_error,#ant_client_phone_error,#ant_req_gur_amt_error,#ant_client_email_error{
    color: #EC0D0D;
    direction: rtl;
    font-size: 12.5px;
    float: right;
} 

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
.checkbox label::after{
    padding-left: 5px;
}  
</style>
<!-- calendar end -->

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

          // 50k > screen
          if($("#ant_first_name").val() != '' && $("#ant_last_name").val() != '' && $("#ant_unique_id").val() != '' && $("#ant_client_add").val() != '' && $("#ant_client_phone").val() != '' && $("#ant_client_email").val() != '' && $("#datepicker").val() != '' && $("#file-2").val() != ''  && $("#ant_req_gur_amt").val() != '' && $("#ant_gur_period_month").val() != '' ){

              $("#business_6_form").css("opacity","1"); // button opacity change
              $("#business_6_form").css("cursor","pointer");
              $("#business_6_form").prop("disabled", false);

          }
          else{
              $("#business_6_form").css("opacity","0.5"); // button opacity change
              $("#business_6_form").css("cursor","auto");
              $("#business_6_form").prop("disabled", true);
          }
      });

      $('input[name="ant_gur_period_month"]').on('cancel.daterangepicker', function(ev, picker) {
          $(this).val('');
      });

    });
</script>

<script>
  $( function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
      // yearRange: "-80:+0"
      yearRange: "1930:+0"

    });
  });


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


<script type="text/javascript">

// file uploading part

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
        // $("#property_phone").inputmask('9999-999-999');
        $("#ant_client_phone").inputmask('9999-999-999');
        $.validator.addMethod('customphone', function (value, element) {
            return this.optional(element) || /^\d{4}-\d{3}-\d{3}$/.test(value);
        }, "מספר הטלפון מוכרח להיות 10 תווים");

        // email validate
            $.validator.addMethod('customemail', function (value, element) {
                return this.optional(element) || /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/.test(value);
            }, 'אנא הזן כתובת דוא"ל תקנית');
        // end

        // 50k > section of button
        $("#business_6_form").css("opacity","0.5"); 
        $("#business_6_form").css("cursor","auto");
        $("#business_6_form").prop("disabled", true);

        // 50k < section of button
        // $("#five_next_form").css("opacity","0.5"); 
        // $("#five_next_form").css("cursor","auto");
        // $("#five_next_form").prop("disabled", true);

        

        // apartment_add sec_date_of_birth landlord landlord_id property_phone sec_email file-2

        // seven form validation start
        // ant_first_name ant_last_name ant_unique_id file-2 ant_client_add ant_client_phone ant_client_email ant_client_gender sec_date_of_birth ant_req_gur_amt ant_gur_period_month

        $('#ant_first_name,#ant_last_name,#ant_unique_id,#ant_client_add,#ant_client_phone,#ant_client_email,#ant_req_gur_amt').on('keyup', function() {

            if($("#ant_first_name").val() != '' && $("#ant_last_name").val() != '' && $("#ant_unique_id").val() != '' && $("#ant_client_add").val() != '' && $("#ant_client_phone").val() != '' && $("#ant_client_email").val() != '' && $("#datepicker").val() != '' && $("#file-2").val() != ''  && $("#ant_req_gur_amt").val() != '' && $("#ant_gur_period_month").val() != '' ){

                $("#business_6_form").css("opacity","1"); // button opacity change
                $("#business_6_form").css("cursor","pointer");
                $("#business_6_form").prop("disabled", false);

            }
            else{
                $("#business_6_form").css("opacity","0.5"); // button opacity change
                $("#business_6_form").css("cursor","auto");
                $("#business_6_form").prop("disabled", true);
            }

          
        });

        $('#file-2,#datepicker').on('change', function() {

            if($("#ant_first_name").val() != '' && $("#ant_last_name").val() != '' && $("#ant_unique_id").val() != '' && $("#ant_client_add").val() != '' && $("#ant_client_phone").val() != '' && $("#ant_client_email").val() != '' && $("#datepicker").val() != '' && $("#file-2").val() != ''  && $("#ant_req_gur_amt").val() != '' && $("#ant_gur_period_month").val() != '' ){

                    $("#business_6_form").css("opacity","1"); // button opacity change
                    $("#business_6_form").css("cursor","pointer");
                    $("#business_6_form").prop("disabled", false);
                
            }else{
                $("#business_6_form").css("opacity","0.5"); // button opacity change
                $("#business_6_form").css("cursor","auto");
                $("#business_6_form").prop("disabled", true);
            }

          
        });


        // $('#business_6_form').on('click', function() {
        $("#business_6_form").click(function(){
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
                            minlength: 3,
                        },
                        ant_last_name: {
                            required: true,
                            minlength: 3,
                        },
                        ant_client_add: {
                            required: true,
                            minlength: 3,
                        },
                        ant_gur_period_month: {
                            required: true,
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
                            number: true
                        },
                        ant_client_phone: {
                            customphone: true
                        },
                        ant_client_email: {
                            required: true,
                            customemail: true
                        },
                        datepicker: {
                            required: true,
                        }
                        
                    },
                    messages: {
                        ant_first_name: {
                            required: "שדה חובה",
                        },
                        ant_last_name: {
                            required: "שדה חובה",
                        },
                        ant_client_add: {
                            required: "שדה חובה",
                        },
                        ant_gur_period_month: {
                            required: "שדה חובה",
                        },
                        // client_photo: {
                        //     required: "שדה חובה",
                        // },
                        ant_unique_id: {
                            required: "שדה חובה",
                            number: "אנא הזן את המספר"
                        },
                        ant_req_gur_amt: {
                            required: "שדה חובה",
                            number: "אנא הזן את המספר"
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

                    $("#business_6_form").css("opacity","1"); // button opacity change
                    $("#business_6_form").css("cursor","pointer");
                    $("#business_6_form").prop("disabled", false);
                
            }else{
                $("#business_6_form").css("opacity","0.5"); // button opacity change
                $("#business_6_form").css("cursor","auto");
                $("#business_6_form").prop("disabled", true);
            }

        });
    
    });      

</script>

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
            

            <form method="post" enctype="multipart/form-data" id="myform" name="validate_form" action="<?php echo site_url('business6'); ?>" novalidate >

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

           <!-- screen 6 (greater than 50k) -->
                <div id="business_6_scr" class="gform_body form_height" style="margin-top: 30px;">
                        
                    <div class="" style="float: right; margin-left:15px; margin-top:-25px;">
                        <img src="<?php echo base_url() ?>website_assets/img/progress04.png" class="img-responsive">
                       
                    </div>
                    <p class="rtl" style="text-align:right;font-weight: bold;font-size: 22px;">פרטי הספק  </p>

                    <p class="rtl" style="text-align:right;margin-top: -8px;"> השלב הבא: בקשת ערבות </p>

                    
                    <br>

                    <ul class="gform_fields top_label ">

                        <li class="gfield gfield_html gfield_no_follows_desc "> 
                                
                            <p class="contact-text_application rtl">היי דני, עוד כמה פרטים ומתקדמים, ממליצים להכין מראש את פרטי החברה </p>
                        </li>

                        <li class="gfield gf_left_third text-field1_application form-group">
                            
                           <div class="styled-input wide">
                               <!-- <input type="text" name="first_name" id="first_name" value="" class="form-control left_lbl1_4" required=""> -->
                               <select name="company_name" id="company_name" value="" class="form-control left_lbl1_4 selector_obli" required="">
                                    <option value="" id="selectHide" selected="" disabled="" hidden="">שם החברה </option>
                                        
                            <?php $company_data = get_active_company(); if(!empty($company_data)){ foreach ($company_data as $cmp){ ?>
                                        
                                    <option value="<?php echo $cmp->name.'_'.$cmp->type; ?>" onclick="companyType('<?php echo $cmp->type; ?>')" ><?php echo $cmp->name; ?></option>
                                        
                            <?php } } ?>
                                        <!--<option value="פרטנר">פרטנר</option>-->
                                        <option value="אחר">אחר</option>
                                        
                                </select>
                                <label class="gfield_label control-label gform_wrapper gfield_label" for="company_name">
                                    <!-- <img src="<?php echo base_url() ?>website_assets/img/dropdown_icon.png" class="img-responsive cal_reponsive1" style="position: relative; left: -345px; top: 6px;"> -->

                                </label>
                                <img src="<?php echo base_url() ?>website_assets/img/dropdown_icon.png" class="img-responsive cal_reponsive1" style="position: relative; left: -266px; top: -22px;">
                            </div> 
                        </li>

                       

                        <li class="gf_left_third gfield text-field2_application form-group" style="margin-top: 5px;">
                            
                          
                            <label class="for_file_label" id="for_file_label" for="client_add">צירוף חוזה שכירות  </label>
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
                            <label for="file-2" id="label-for-file2" style="margin-top: 32px;">

                               <i style="font-size:22px; margin-left: 40px;" class="fa">&#xf030;</i>
                                <span style="font-weight: 200; font-size: 22px; margin-left:20px; padding-top: 6px;" >צירוף חוזה שכירות  </span>
                            </label>
 
                            
                        </li>
                        
                        <!-- screen business_5 start-->
                        <div class="company_hide אחר" id="אחר" style="display:none;">
                        
                        <li class="gfield gf_left_third text-field1_application form-group" style="margin-top: 4px;">

                             <div class="styled-input wide">
                             
                               <textarea class="textarea large form-control company_address_left" name="company_address" rows="5" cols="50" id="company_address" required="" style="max-height: 56px;" ></textarea>
                                <label class="gfield_label control-label gform_wrapper gfield_label" for="company_address">כתובת החברה
                            </label>
                            </div>
                           
                        </li>

                        <li class="gfield gf_left_third text-field2_application form-group">
                              <div class="styled-input wide">
                               <input type="text" name="company_id" id="company_id" value="" class="form-control hp_left" required="">
                                <label class="gfield_label control-label gform_wrapper gfield_label" for="landlord">ח.פ
                            </label>
                            </div>

                            
                        </li>

                        <li class="gf_left_third gfield text-field1_application form-group">
                          

                            <div class="styled-input wide">
                               <input type="text" name="company_telephone" id="company_telephone" value="" class="form-control street_text_4" required="">
                                <label class="gfield_label control-label gform_wrapper gfield_label" for="company_telephone"> טלפון החברה
                            </label>
                            </div> 
                        </li>

                        <li class="gf_middle_third gfield text-field2_application form-group" >
                          

                            <div class="styled-input wide">
                              <input type="text" name="company_email" id="company_email" value="" class="form-control No_Home_text_4" required="">
                                <label class="gfield_label control-label gform_wrapper gfield_label" for="company_email">מייל החברה
                            </label>
                            </div> 
                        </li>

                        </div>

                         <!-- screen business_5 end-->

                         <!-- screen business_6 start-->

                        <div class="company_hide פרטנר" id="פרטנר" style="display:none;">

                        <li class="gfield gf_left_third text-field1_application form-group" style="margin-top: 4px;">

                            <div class="styled-input wide">
                               <input type="text" name="agent_id" id="agent_id" value="" class="form-control third_text" required="">
                                <label class="gfield_label control-label gform_wrapper gfield_label" for="agent_id">ת.ז הסוכן
                            </label>
                            </div> 
                            
                        </li>

                        </div>

                         <!-- screen business_6 end-->

                  
                    </ul>

                    <div class="gform_footer "> 
                        <!-- <a class="button gform_button" ><p class="first_next_button scr_first_submit" id="seven_next_form" style="margin-right: -25px; margin-top: 30px;">המשך</p> </a> -->

                        <button type="submit" class="first_next_button scr_first_submit" id="business_6_form" style="margin-right: -25px; margin-top: 30px;">המשך</button>
                    </div>

                </div>

            
              </div>

            </div>
    
    </form>

    </div>
                      
         
        </div>
    </div>
</div>


<!-- only for date renge picker -->
<link rel="stylesheet" href="<?php echo base_url() ?>website_assets/date/daterangepicker-bs3.css">
<script src="<?php echo base_url() ?>website_assets/date/moment.min.js"></script>
<script src="<?php echo base_url() ?>website_assets/date/daterangepicker.js"></script>
<!-- // end -->

<script type="text/javascript">

    $(function() {
    $('#company_name').change(function(){
//        alert($(this).val());
        
        var str = $(this).val(); 
        var items = str.split('_'); 
//        alert(items[1]);
        if(items[1] == 1){
            $('.company_hide').hide();
            $('#' + 'פרטנר').show();
        }
        else if(items[1] == 2){
            $('.company_hide').hide();
        }
        else{
            $('.company_hide').hide();
            $('#' + 'אחר').show();
        }
        
//        console.log(items[1]);
        
      
//      $('#' + $(this).val()).show();
    });
  });
  
//  function companyType(type){
//      alert(type);
//  }

</script>

<!--<label class="wrapper" for="states">This label is stacked above the select</label>
<div class="button dropdown"> 
  <select id="colorselector">
     <option value="red">Red</option>
     <option value="yellow">Yellow</option>
     <option value="blue">Blue</option>
  </select>
</div>

<div class="output">
  <div id="red" class="colors red">  “Good artists copy, great artists steal” Pablo Picasso</div>
  <div id="yellow" class="colors yellow"> “Art is the lie that enables us to realize the truth” Pablo Picasso</div>
  <div id="blue" class="colors blue"> “If I don't have red, I use blue” Pablo Picasso</div>
</div>-->