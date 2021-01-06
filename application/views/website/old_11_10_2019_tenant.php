<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

<style type="text/css">
        #PropertyForm,
        #company_information,#account_information,#scr_second_form,#scr_third_form,#scr_seven_form,#scr_eight_form {
            display:none;
        }

        
</style>



 

    <script type="text/javascript">
        
        
        $(document).ready(function(){

            // Custom method to validate username
            // $.validator.addMethod("usernameRegex", function(value, element) {
            //     return this.optional(element) || /^[a-zA-Z0-9]*$/i.test(value);
            // }, "Username must contain only letters, numbers");

var ratio =  Math.max(window.devicePixelRatio || 1, 1);

  // This part causes the canvas to be cleared
  canvas.width = '301';
  canvas.height = '147';


            $(".next").click(function(){
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
                        client_add: {
                            required: true,
                        },
                        client_phone: {
                            required: true,
                            number: true
                        },
                        client_email: {
                            required: true,
                            email: true
                        },
                        client_gender: {
                            required: true,
                        },
                        gur_period_month: {
                            required: true,
                            number: true
                        },
                        req_gur_amt: {
                            required: true,
                            number: true
                        },
                        client_sign: {
                            required: true,
                        },
                        sec_first_name: {
                            required: true,
                            // usernameRegex: true,
                            minlength: 3,
                        },
                        sec_last_name: {
                            required: true,
                            // usernameRegex: true,
                            minlength: 3,
                        },
                        sec_photo: {
                            required: true,
                        },
                        sec_unique_id: {
                            required: true,
                            number: true
                        },
                        sec_cur_add: {
                            required: true,
                        },
                        sec_phone: {
                            required: true,
                            number: true
                        },
                        sec_email: {
                            required: true,
                            email: true
                        },
                        sec_gender: {
                            required: true,
                        },
                        sec_date_of_birth: {
                            required: true,
                        },
                        // to_photo_id: {
                        //     required: true,
                        // },
                        // to_unique_id: {
                        //     required: true,
                        //     number: true
                        // },
                        // to_current_residence: {
                        //     required: true,
                        // },
                        // to_phone_number: {
                        //     required: true,
                        //     number: true
                        // },
                        // to_email: {
                        //     required: true,
                        //     email: true
                        // },
                        // to_guarantee_amount: {
                        //     required: true,
                        //     number: true
                        // },
                        // apartment_add: {
                        //     required: true,
                        // },
                        // lease_period: {
                        //     required: true,
                        //     number: true
                        // },
                        // landlord: {
                        //     required: true,
                        // },
                        // landlord_id: {
                        //     required: true,
                        //     number: true
                        // },
                        // property_phone: {
                        //     required: true,
                        //     number: true
                        // },
                        // landlord_email: {
                        //     required: true,
                        //     email: true
                        // },
                        // landlord_photo_id: {
                        //     required: true,
                        // },
                        // password : {
                        //     required: true,
                        // },
                        // conf_password : {
                        //     required: true,
                        //     equalTo: '#password',
                        // },
                        // company:{
                        //     required: true,
                        // },
                        // url:{
                        //     required: true,
                        // },
                        // name: {
                        //     required: true,
                        //     minlength: 3,
                        // },
                        // email: {
                        //     required: true,
                        //     minlength: 3,
                        // },
                        
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
                        client_add: {
                            required: "שדה חובה",
                        },
                        client_phone: {
                            required: "שדה חובה",
                            number: "אנא הזן את המספר"
                        },
                        client_email: {
                            required: "שדה חובה",
                            email: 'אנא הזן כתובת דוא"ל תקנית.'
                        },
                        client_gender: {
                            required: "שדה חובה",
                        },
                        gur_period_month: {
                            required: "שדה חובה",
                            number: "אנא הזן את המספר"
                        },
                        req_gur_amt: {
                            required: "שדה חובה",
                            number: "אנא הזן את המספר"
                        },
                        client_sign: {
                            required: "שדה חובה",
                        },
                        sec_first_name: {
                            required: "שדה חובה",
                        },
                        sec_last_name: {
                            required: "שדה חובה",
                        },
                        sec_photo: {
                            required: "שדה חובה",
                        },
                        sec_unique_id: {
                            required: "שדה חובה",
                            number: "אנא הזן את המספר"
                        },
                        sec_cur_add: {
                            required: "שדה חובה",
                        },
                        sec_phone: {
                            required: "שדה חובה",
                            number: "אנא הזן את המספר"
                        },
                        sec_email: {
                            required: "שדה חובה",
                            email: 'אנא הזן כתובת דוא"ל תקנית.'
                        },
                        sec_gender: {
                            required: "שדה חובה",
                        },
                        sec_date_of_birth: {
                            required: "שדה חובה",
                        },
                        // to_photo_id: {
                        //     required: "שדה חובה",
                        // },
                        // to_unique_id: {
                        //     required: "שדה חובה",
                        //     number: "אנא הזן את המספר"
                        // },
                        // to_current_residence: {
                        //     required: "שדה חובה",
                        // },
                        // to_phone_number: {
                        //     required: "שדה חובה",
                        //     number: "אנא הזן את המספר"
                        // },
                        // to_email: {
                        //     required: "שדה חובה",
                        //     email: 'אנא הזן כתובת דוא"ל תקנית.'
                        // },
                        // to_guarantee_amount: {
                        //     required: "שדה חובה",
                        //     number: "אנא הזן את המספר"
                        // },
                        // apartment_add: {
                        //     required: "שדה חובה",
                        // },
                        // lease_period: {
                        //     required: "שדה חובה",
                        //     number: "אנא הזן את המספר"
                        // },
                        // landlord: {
                        //     required: "שדה חובה",
                        // },
                        // landlord_id: {
                        //     required: "שדה חובה",
                        //     number: "אנא הזן את המספר"
                        // },
                        // property_phone: {
                        //     required: "שדה חובה",
                        //     number: "אנא הזן את המספר"
                        // },
                        // landlord_email: {
                        //     required: "שדה חובה",
                        //     email: 'אנא הזן כתובת דוא"ל תקנית.'
                        // },
                        // landlord_photo_id: {
                        //     required: "שדה חובה",
                            
                        // },
                        // password : {
                        //     required: "Password required",
                        // },
                        // conf_password : {
                        //     required: "Password required",
                        //     equalTo: "Password don't match",
                        // },
                        // name: {
                        //     required: "Name required",
                        // },
                        // email: {
                        //     required: "Email required",
                        // },
                    }
                });
                if (form.valid() === true){
                    if ($('#account_information').is(":visible")){
                        gurant_amm = $("#guarantee_amount").val();

                        if(gurant_amm > 25000 ){
                            // confirm box
                              $.confirm({
                                title: 'Message',
                                content: 'Note that you entering a number is higher than 25k',
                                boxWidth: '500px',
                                useBootstrap: false,
                                draggable: false,
                                buttons: {
                                    OK: function () {
                                        // text: 'OK',
                                        // function next_page()
                                        next_fs = $('#company_information');
                                        next_fs.show(); 
                                        current_fs = $('#account_information');
                                        current_fs.hide();
                                        // $.alert('Confirmed!');
                                    },
                                    CHANGE: function () {
                                        // function prev_page()
                                        // text: 'CHANGE',
                                        // next_fs = $('#account_information');
                                        // next_fs.show(); 
                                        // $.alert('Canceled!');
                                    },
                                    // somethingElse: {
                                    //     text: 'Something else',
                                    //     btnClass: 'btn-blue',
                                    //     keys: ['enter', 'shift'],
                                    //     action: function(){
                                    //         $.alert('Something else?');
                                    //     }
                                    // }
                                }
                            });

                            
                        }else{
                            current_fs = $('#account_information');
                            next_fs = $('#PropertyForm');
                        }

                        // current_fs = $('#account_information');
                        // next_fs = $('#company_information');
                    }else if($('#company_information').is(":visible")){
                        current_fs = $('#company_information');
                        next_fs = $('#PropertyForm');
                    }else if($('#scr_first_form').is(":visible")){
                        current_fs = $('#scr_first_form');
                        next_fs = $('#scr_second_form');
                    }else if($('#scr_second_form').is(":visible")){
                        current_fs = $('#scr_second_form');
                        next_fs = $('#scr_third_form');
                    }else if($('#scr_third_form').is(":visible")){
                        current_fs = $('#scr_third_form');
                        next_fs = $('#account_information');
                    }else if($('#PropertyForm').is(":visible")){
                        current_fs = $('#PropertyForm');
                        next_fs = $('#scr_seven_form');
                    }else if($('#scr_seven_form').is(":visible")){
                        current_fs = $('#scr_seven_form');
                        next_fs = $('#scr_eight_form');
                    }
                    
                    next_fs.show(); 
                    current_fs.hide();
                }
            });

            $('#previous').click(function(){
                if($('#company_information').is(":visible")){
                    current_fs = $('#company_information');
                    next_fs = $('#account_information');
                }else if ($('#PropertyForm').is(":visible")){
                    current_fs = $('#PropertyForm');
                    next_fs = $('#account_information');
                }
                next_fs.show(); 
                current_fs.hide();
            });

            $('#property_previous').click(function(){
                if($('#PropertyForm').is(":visible")){
                    current_fs = $('#PropertyForm');

                    gurant_amm_pre = $("#guarantee_amount").val();

                    if(gurant_amm_pre > 25000){
                        next_fs = $('#company_information');
                    }else{
                        next_fs = $('#account_information');
                    }

                    // next_fs = $('#account_information');
                }
                next_fs.show(); 
                current_fs.hide();
            });
   
        });


    $(document).ready(function(){
        $(".previous_scr").click(function(){
            if($('#scr_second_form').is(":visible")){
                current_fs = $('#scr_second_form');
                next_fs = $('#scr_first_form');
            }else if ($('#scr_third_form').is(":visible")){
                current_fs = $('#scr_third_form');
                next_fs = $('#scr_second_form');
            }else if ($('#account_information').is(":visible")){
                current_fs = $('#account_information');
                next_fs = $('#scr_third_form');
            }else if ($('#scr_seven_form').is(":visible")){
                current_fs = $('#scr_seven_form');
                next_fs = $('#PropertyForm');
            }else if ($('#scr_eight_form').is(":visible")){
                current_fs = $('#scr_eight_form');
                next_fs = $('#scr_seven_form');
            }
            next_fs.show(); 
            current_fs.hide();
        });


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

        

    });

  
</script>

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
            

            <form method="post" enctype="multipart/form-data" id="myform" action="<?php echo site_url('website/tenant'); ?>">

                <!-- screen 01 -->
                <div id="scr_first_form" class="gform_body">
                    <p class="" style="text-align:center;font-weight: bold;"> OBLI היי, אנחנו  </p> 

                     <p class="rtl" style="text-align:center;">ואנחנו כאן כדי לפתוח בפניכם אפשרות  <br>חדשה לקבלת ערבות לשכירות. </p><br>

                
                     <p class="rtl" style="text-align:center;"> ערבות דיגיטלית מתקדמת בלי כסף <br>שכלוא בבנק, בלי בירוקרטיה ובלי <br>בנק בכלל!</p>

                    <!-- OBLI ונחנא ,ייה  תורשפא םכינפב חותפל ידכ ןאכ ונחנאו .תוריכשל תוברע תלבקל השדח ףסכ ילב תמדקתמ תילטיגיד תוברע ילבו היטרקוריב ילב ,קנבב אולכש !ללכב קנב   -->
                    <!-- <li class="gfield gf_left_third text-field1_application form-group">
                        <img src="<?php echo base_url() ?>website_assets/img/L3.png">
                    </li>

                    <li class="gfield gf_left_third text-field1_application form-group">
                        <img src="<?php echo base_url() ?>website_assets/img/L4.png">
                    </li> -->
                    <br>
                    <div class="row">
                        <div class="col-md-3 col-sm-3"></div>
                        <div class="col-md-6 col-sm-6">
                            <a class="button gform_button next"> <p class="first_main_button" >לקוח פרטי</p></a>
                             
                            <a class="button gform_button next"> <p class="first_main_button" > לקוח עסקי</p></a>
                        </div>
                        <div class="col-md-3 col-sm-3"></div>
                    </div>
                    <br><br><br><br><br><br><br>

                </div>
               

                <!-- screen 02 -->
                <div id="scr_second_form" class="gform_body">  

                   <p class="" style="text-align:center;color: #302861;font-weight: bold;">:בחרו את המסלול המועדף עליכם</p>


                    <div class="tabs">
                        <div class="">
                            <div class="row">
                                <div class="col-xl-2 section light-bg" style="margin-top:50px;">
                                    <ul class="nav nav-pills nav-stacked flex-column">


                                        <li class="box-border frb frb-default check-box-1" style="float: left; width: 48%; text-align: center;">
                                            <a  href="#tab_a" data-toggle="pill">
                                           <img src="http://oblidev.malul.xyz/website_assets/img/oblia1.png" class="img-responsive tab_image-obli">
                                           מסלול ללא עמלה</a>
                                            <label for="radio-button-0" class="radio" >
                                             
                                             <input type="radio" name="radio-box" id="box-1" class="check-box-3">
                                            </label>
                                        </li>
                         
                          
                                        <li class="box-border frb frb-default check-box-2" style="float: right; width: 48%; text-align: center;">
                                            <a href="#tab_b" data-toggle="pill"> 
                                           <img src="http://oblidev.malul.xyz/website_assets/img/oblib1.png" class="img-responsive tab_image-obli">מסלול ללא פיקדון</a>
                                            <label for="radio-button-1" class="radio">
                                             
                                             <input type="radio" name="radio-box" id="box-2" checked="checked" class="check-box-4">
                                              
                                            </label>
                                        </li>

                                    </ul>
                                </div>
                                <div class="col-xl-6">
                                    
                                    <div class="tab-content">
                                        <div class="tab-pane" id="tab_a">
                                        <p style="text-align: center; font-weight: bold;">לא רוצים לשלם עמלה? </p>       
                                        <p style="text-align: center;">נשמח להעניק לכם ערבות עם פקדון <br>אך ללא עמלה. </p>
                                        </div>

                                        <div class="tab-pane active rtl" id="tab_b" style="padding: 20px;"> 
                                             <p style="text-align: center; font-weight: bold;">מתקשים לגייס את סכום הערבות?  </p>       
                                             <p style="text-align: center;">להעניק לכם ערבות ללא פיקדון <br>נשמח<br> תמורת עמלה של 6%.</p>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                  <div class="gform_footer top_label"> 
                        <a class="button gform_button previous_scr"> <p class="first_next_button">הקודם</p></a>
                        <a class="button gform_button next"> <p class="first_next_button screen-button-obli screen-button2-obli screen-button3-obli">אז איך אפשר לעזור לכם? </p></a>
                    </div>

                </div>

                 <!-- screen 03 -->

                  <div id="scr_third_form" class="gform_body" style="margin-top: 30px;">
                        <div class="progress-circle p10" style="float: right; margin-left:15px; margin-top:-15px;">
                           <span>1 / 5</span>
                           <div class="left-half-clipper">
                              <div class="first50-bar"></div>
                              <div class="value-bar"></div>
                           </div>
                        </div>
                    <p class="rtl" style="text-align:right;font-weight: bold;font-size: 22px;">פרטים אישיים </p>

                    <p class="rtl" style="text-align:right;">השלב הבא: סכום הערבות</p>

                    
                    <br>

                    <ul class="gform_fields top_label ">

                        <li class="gfield gfield_html gfield_no_follows_desc ">
                           <!--  <h1 class="page-subtitle page-subtitle_application">צור קשר</h1> -->
                            <p class="contact-text_application" style="text-align:center;"> נשמח להציע לכם ערבות לשכר הדירה, </p>
                            <p class="contact-text_application" style="text-align:center;">וגם להכיר אתכם  </p>
                         </li>

                        <li class="gfield gf_left_third text-field1_application form-group">
                            <label class="gfield_label control-label" for="first_name"> שם פרטי
                            </label>

                            <div class="">
                               <input type="text" name="first_name" id="first_name" value="" class="form-control">
                            </div>
                        </li>

                       
                         <li class="gfield gf_left_third text-field2_application form-group">
                            <label class="gfield_label control-label" for="client_phone"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">טלפון נייד
                          </font></font></label>

                            <div class="">
                               <input type="text" name="client_phone" id="client_phone" value="" class="form-control">
                            </div>
                        </li>

                        <li class="gf_middle_third gfield text-field1_application form-group">
                            <label class="gfield_label control-label" for="last_name">שם משפחה </label>
                            
                            <div class="">
                               <input type="text" name="last_name" id="last_name" value="" class=" form-control">
                            </div>
                        </li> 

                        <li class="gfield gf_left_third text-field2_application form-group">
                            <label class="gfield_label control-label" for="client_email"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">דוא”ל
                          </font></font></label>

                            <div class="">
                               <input type="email" name="client_email" id="client_email" value="" class=" form-control">
                            </div>
                        </li>

                        <li class="gf_left_third gfield text-field1_application form-group">
                            <label class="gfield_label control-label" for="unique_id">ת.ז</label>
                            
                            <div class="">
                               <input type="text" name="unique_id" id="unique_id" value="" class="form-control">
                            </div>
                        </li>

                        <li class="gfield gf_left_third text-field2_application form-group">
                            <label class="gfield_label control-label" for="current_residence"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">מין
                          </font></font>
                      <div class=""style="float: left;">
                                <br>
                              <label for="radio-button-1" class="radio gfield_label control-label">
                             
                           <!--   <input type="radio" name="radio-box" id="box-2" checked="checked">רכז -->
                             <input type="radio" name="client_gender" value="1" id="box-2" checked="checked" value="30" style="left: 55px; top: -13px;">זכר
                              
                            </label>
                            <br>
                            
                              <label for="radio-button-0" class="radio gfield_label control-label">
                             
                             <input type="radio" name="client_gender" value="2" id="box-1" style="left: 69px;top: -13px;">נקבה
                            </label>
                            </div>
                        </label>

                            
                        </li>
                      
                        <li class="gf_left_third gfield text-field1_application form-group">
                            
                            <label class="gfield_label control-label" for="client_photo"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">צילום ת.ז
                            </font></font></label>

                            <div class="">
                               <input type="file" name="client_photo" id="client_photo" class="input_application form-control" value="" >
                            </div>
                        </li>

                        

                         <li class="gf_left_third gfield text-field1_application form-group">
                            <label class="gfield_label control-label" for="client_add"> כתובת מגורים נוכחית </label>

                            <div class="">
                               <!-- <input type="number" name="guarantee_amount" id="guarantee_amount" value="" min="1" class="form-control"> -->
                               <textarea class="input_application textarea large form-control" name="client_add" rows="5" cols="50" id="client_add" style="max-height: 56px;"></textarea>
                            </div>
                        </li>

                    </ul>

                    <!-- <div class="gform_footer top_label"> 
                       <input type="submit" id="gform_submit_button_5" class="gform_button button next" value="שהמשך " tabindex="54"> 
                    </div> -->
                
                    <div class="gform_footer top_label"> 
                       <!--  <a class="button gform_button previous_scr"> <p class="first_next_button">הקודם</p></a> -->
                        <a class="button gform_button next"> <p class="first_next_button">המשך</p></a>
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

        <!-- screen 04 scr_third_form account_information1 -->
                 
                <div id="account_information" class="gform_body" style="margin-top: 30px;">
                     
                    <ul class="gform_fields top_label ">

                        <li class="gfield gfield_html gfield_no_follows_desc ">
                           <div class="progress-circle p33" style="float: right; margin-left:15px; margin-top:-25px;">
                            <span style="direction: ltr;">2 / 5</span>
                           <div class="left-half-clipper">
                              <div class="first50-bar"></div>
                              <div class="value-bar"></div>
                           </div>
                           </div>
                            <p class="contact-text_application"style="font-weight: bold;">סכום הערבות </p>
                            <p class="contact-text_application" style="margin-top: -20px;"> סכנה לע םיטרפ :אבה בלשה  </p>
                         </li>

                    

                    </ul>

                    <div class="row" style="margin-top: 70px;">
                        <div class="col-md-6 col-sm-12">
                        <li class="gfield gf_left_third text-field1_application form-group" style="width: 100% !important;">
                            <label class="gfield_label control-label" for="gur_period_month">תקופת הערבות בחודשים
                            </label>
                            <i class="fa fa-calendar" aria-hidden="true"></i>

                            <div class="">
                               <input type="text" name="gur_period_month" id="gur_period_month" value="" class="form-control">
                            </div>
                        </li>


                        <li class="gf_middle_third gfield text-field1_application form-group" style="width: 100% !important;">
                            <label class="gfield_label control-label" for="req_gur_amt">סכום הערבות המבוקש  </label>
                            
                            <div class="">
                               <input type="text" name="req_gur_amt" id="req_gur_amt" value="" class=" form-control">
                            </div>
                        </li>

                        <!-- signature css -->
                        <link rel="stylesheet" href="<?php echo base_url() ?>website_assets/signature/css/signature-pad.css">
                        <script>
                        // localstorage value clear
                        localStorage.removeItem("signature_file");
                        localStorage.clear();
                        window.localStorage.clear();


                             var _gaq = _gaq || [];
                                _gaq.push(['_setAccount', 'UA-39365077-1']);
                                _gaq.push(['_trackPageview']);

                                (function() {
                                  var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                                  ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                                  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
                                })();

                        </script>
                        <!-- end -->

                        <li class="gf_left_third gfield text-field1_application form-group" style="width: 100% !important;">
                            <label class="gfield_label control-label" for="client_sign">(חתום כאן בחתימה דיגיטלית (צריך טקסט</label>
                            
                            <div class="">
                                <!-- <textarea class="input_application textarea large form-control" name="client_sign" rows="5" cols="50" id="client_sign" style="background: rgba(95, 97, 172, 0.05);border: 1px solid rgba(50, 52, 116, 0.5) !important;box-sizing: border-box !important;border-radius: 30px !important;"></textarea> -->

                                <div id="signature-pad" class="signature-pad" style="border: 1px solid rgba(50, 52, 116, 0.5) !important;box-sizing: border-box !important;border-radius: 30px !important;height: 200px;" >
                                  <div class="signature-pad--body">
                                    <canvas></canvas>
                                  </div>

                                  <div>
                                    <button type="button" class="button clear" data-action="clear">Clear</button>
                                    <button type="button" class="button" data-action="change-color">Change color</button>
                                    <button type="button" class="button" data-action="undo">Undo</button>
                                    
                                    <button type="button" class="button save" data-action="save-png">Save as PNG</button>

                                  </div>
                                </div>

                                

                                <!-- <button id="btnSaveSign">Save as PNG</button> -->
                              
                            </div>
                        </li>
                      </div>
                      <!-- signature js -->
                        <script src="<?php echo base_url() ?>website_assets/signature/js/signature_pad.umd.js"></script>
                        <script src="<?php echo base_url() ?>website_assets/signature/js/app.js"></script>

                        <!-- end -->

                      <input type="hidden" id="bae64_sign" name="base64_signature" value="" >

                       <script type="text/javascript">
                       var tt = localStorage.getItem('signature_file');

                      </script>


                        
                       <!--  <div class="signature-pad-footer">
                          <div class="description">Sign above</div>

                          <div class="signature-pad-actions">
                            <div>
                              <button type="button" class="button clear" data-action="clear">Clear</button>
                              <button type="button" class="button" data-action="change-color">Change color</button>
                              <button type="button" class="button" data-action="undo">Undo</button>

                            </div>
                            <div>
                              <button type="button" class="button save" data-action="save-png">Save as PNG</button>
                              <button type="button" class="button save" data-action="save-jpg">Save as JPG</button>
                              <button type="button" class="button save" data-action="save-svg">Save as SVG</button>
                            </div>
                          </div>
                        </div>
 -->
                         

                        <div class="col-md-6 col-sm-12">

                           <!--    <p class="rtl" style="text-align:right;"> םולשתו , תוברע תלבקל השקבה תקידב יארשא סיטרכב תישדוח הסירפב הלמעה לש ךרדב אירט תועצמאב םיעצובמ . תיביר אלל האוולה לע יארשאה תכשלל אירט הנפת ךכךרוצל .יארשא ינותנ לבקל תנמ שיגת יא  <br><br> רשאה תכשל יכ ,תאזב רהבומ יארשא ינותנ תלבקל לארשי קנבל השקב .רגאמב םילולכה ךיבגל  </p><br>
                                <br><br> -->
                              <p class="rtl" style="text-align:right; line-height: 32px;">
                                בדיקת הבקשה לקבלת ערבות , ותשלום  <br> העמלה בפריסה חודשית בכרטיס אשראי <br> מבוצעים באמצעות טריא בדרך של <br> הלוואה ללא ריבית .<br>לצורךכך תפנה טריא ללשכת האשראי על <br> מנת לקבל נתוני אשראי.<br> 
                                <br>מובהר בזאת, כי לשכת האשראי תגיש   <br>  בקשה לבנק ישראל לקבלת נתוני אשראי
                                <br>.לגביך הכלולים במאגר
                                <p>
                                
                
                        </div>
                    </div>


                    <!-- <div class="gform_footer top_label"> 
                       <input type="submit" id="gform_submit_button_5" class="gform_button button next" value="שהמשך " tabindex="54"> 
                    </div> -->
                
                    <div class="gform_footer top_label"> 
                       <!--  <a class="button gform_button previous_scr"> <p class="first_next_button">הקודם c </p></a> -->
                        <a class="button gform_button next"> <p class="first_next_button">המשך  </p></a>
                        
                    </div>
                </div>


                   
                <!-- screen 05 -->

                 <div id="PropertyForm" class="gform_body" style="margin-top: 30px;">
                     <div class="progress-circle over50 p66" style="float: right; margin-left:15px; margin-top:-25px;">
                           <span>
                            <i class="fa fa-close" style="font-size:40px; margin-left:-6px;"></i>
                            </span>
                           <div class="left-half-clipper">
                              <div class="first50-bar"></div>
                              <div class="value-bar"></div>
                           </div>
                           </div>
                     <p class="rtl" style="text-align:right;font-weight: bold;font-size: 22px;"> סכום הערבות גבוה  </p>

                    <p class="rtl" style="text-align:right;"> בחר באחד משני המסלולים </p>

                     <img src="http://oblidev.malul.xyz/website_assets/img/obliz.png" class="img-responsive tab_image-obli">
    
                    <p class="" style="text-align:center;font-weight: bold;"> , היי דני<br>.₪ סכום הערבות המבוקש גבוה מ000-,25  </p>

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

                    <div class="row">
                        <div class="col-md-2 col-sm-2"></div>
                        <div class="col-md-8 col-sm-8">
                             <div class="col-md-6 col-sm-6"><div class="box-button1"><p> סכום לא אושר  </p></div></div>
                             <div class="col-md-6 col-sm-6"> <div class="box-button2"><p> גרסא 1 </p></div></div>
                            
                        </div>
                        <div class="col-md-2 col-sm-2"></div>
                    </div>

                </div>

 
                <!-- screen 06 -->
                <div id="scr_seven_form" class="gform_body" style="margin-top: 30px;">
                  <div class="progress-circle over50 p66" style="float: right; margin-left:15px; margin-top:-25px;">
                           <span>3 / 5</span>
                           <div class="left-half-clipper">
                              <div class="first50-bar"></div>
                              <div class="value-bar"></div>
                           </div>
                           </div>
                    <p class="rtl" style="text-align:right;font-weight: bold;font-size: 22px;">פרטים על הנכס </p>
                    <p class="rtl" style="text-align:right;">השלב הבא: בקשת ערבות </p>

                    
                    <br>

                    <ul class="gform_fields top_label ">

                        <li class="gfield gfield_html gfield_no_follows_desc " style="margin-top: 30px;">
                           <!--  <h1 class="page-subtitle page-subtitle_application">צור קשר</h1> -->
                            <p class="contact-text_application" style="text-align:right;"> נשמח להציע לכם ערבות לשכר הדירה,</p>
                            <p class="contact-text_application" style="text-align:right; margin-top: -20px;"> וגם להכיר אתכם </p>
                         </li>

                        <li class="gfield gf_left_third text-field1_application form-group">
                            <label class="gfield_label control-label" for="sec_first_name">שם פרטי
                            </label>

                            <div class="">
                               <input type="text" name="sec_first_name" id="sec_first_name" value="" class="form-control">
                            </div>
                        </li>

                       
                         <li class="gfield gf_left_third text-field2_application form-group">
                            <label class="gfield_label control-label" for="sec_email"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">דוא”ל
                          </font></font></label>

                            <div class="">
                               <input type="text" name="sec_email" id="sec_email" value="" class=" form-control">
                            </div>
                        </li>

                        <li class="gf_middle_third gfield text-field1_application form-group">
                            <label class="gfield_label control-label" for="sec_last_name"> שם משפחה  </label>
                            
                            <div class="">
                               <input type="text" name="sec_last_name" id="sec_last_name" value="" class=" form-control">
                            </div>
                        </li>

                         <li class="gfield gf_left_third text-field2_application form-group">
                            <label class="gfield_label control-label" for="current_residence"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">מין
                          </font></font>
                      <div class=""style="float: left;">
                                <br>
                              <label for="radio-button-1" class="radio gfield_label control-label">
                             
                             <input type="radio" name="sec_gender" id="box-2" value="1" style="left: 55px; top: -13px;" checked="checked" >זכר
                              
                            </label>
                            <br>
                            
                              <label for="radio-button-0" class="radio gfield_label control-label" style="margin-right: 90px; margin-top: -36px;">
                             
                             <input type="radio" name="sec_gender" id="box-1" value="2" style="left: 69px;top: -13px;">נקבה
                            </label>
                            </div>
                        </label>

                            
                        </li>

                        <li class="gf_left_third gfield text-field1_application form-group">
                            <label class="gfield_label control-label" for="sec_unique_id">ת.ז</label>
                            
                            <div class="">
                               <input type="text" name="sec_unique_id" id="sec_unique_id" value="" class="form-control">
                            </div>
                        </li>

                        <li class="gfield gf_left_third text-field2_application form-group">
                            <label class="gfield_label control-label" for="sec_date_of_birth"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">תאריך לידה
                          </font></font></label>
                          <i class="fa fa-calendar" aria-hidden="true"></i>

                            <div class="">
                               <input type="date" name="sec_date_of_birth" id="sec_date_of_birth" value="" class="form-control">
                            </div>
                        </li>

                        <li class="gf_left_third gfield text-field1_application form-group">
                            <label class="gfield_label control-label" for="sec_cur_add">כתובת מגורים נוכחית </label>

                            <div class="">
                               <textarea class="input_application textarea large form-control" name="sec_cur_add" rows="5" cols="50" id="sec_cur_add" style="max-height: 56px;"></textarea>
                            </div>
                        </li>

                        <li class="gf_middle_third gfield text-field2_application form-group">
                            <label class="gfield_label control-label" for="sec_photo"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">צילום ת.ז
                            </font></font></label>

                            <div class="">
                               <input type="file" name="sec_photo" id="sec_photo" class="input_application form-control" value="" >
                            </div>
                        </li>

                        <li class="gf_middle_third gfield text-field1_application form-group">
                            <label class="gfield_label control-label" for="sec_phone">טלפון נייד</label>
                            
                            <div class="">
                               <input type="text" name="sec_phone" id="sec_phone" value="" class=" form-control">
                            </div>
                        </li>


                    </ul>

                    <!-- <div class="gform_footer top_label"> 
                       <input type="submit" id="gform_submit_button_5" class="gform_button button next" value="שהמשך " tabindex="54"> 
                    </div> -->
                
                    <div class="gform_footer top_label"> 
                       <!--  <a class="button gform_button previous_scr"> <p class="first_next_button">הקודם</p></a> -->
                        <!-- <a class="button gform_button next"> <p class="first_next_button"></p></a> -->
                        <input type="submit" id="gform_submit_button_5" class="gform_button button next first_main_button" value="המשך" tabindex="54"> 
                    </div>



                  



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
                        <input type="submit" class="gform_button button" value="המשך " tabindex="54">
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

              
                <!-- Screen 4 -->
                <!-- <div id="account_information" class="gform_body">

                    <ul class="gform_fields top_label ">

                        <li class="gfield gfield_html gfield_no_follows_desc ">
                           
                            <p class="contact-text_application"> פרטים אישיים   </p>
                            <p class="contact-text_application"> נשמח להציע לכם ערבות לשכר הדירה, 
    וגם להכיר אתכם:  </p>
                         </li>

                        <li class="gfield gf_left_third text-field1_application form-group">
                            <label class="gfield_label control-label" for="fullname"> שם מלא 
                            </label>

                            <div class="">
                               <input type="text" name="fullname" id="fullname" value="" class="form-control">
                            </div>
                        </li>

                        <li class="gf_middle_third gfield text-field2_application form-group">
                            <label class="gfield_label control-label" for="photo_id"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">צילום ת.ז 
                            </font></font></label>

                            <div class="">
                               <input type="file" name="photo_id" id="photo_id" class="input_application form-control" value="" >
                            </div>
                        </li>

                        <li class="gf_middle_third gfield text-field1_application form-group">
                            <label class="gfield_label control-label" for="unique_id">ת.ז </label>
                            
                            <div class="">
                               <input type="text" name="unique_id" id="unique_id" value="" class=" form-control">
                            </div>
                        </li>

                        <li class="gfield gf_left_third text-field2_application form-group">
                            <label class="gfield_label control-label" for="current_residence"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">כתובת מגורים נוכחית
                            </font></font></label>

                            <div class="">
                               <textarea class="input_application textarea large form-control" name="current_residence" rows="5" cols="50" id="current_residence" style="max-height: 56px;"></textarea>
                            </div>
                        </li>

                        <li class="gf_left_third gfield text-field1_application form-group">
                            <label class="gfield_label control-label" for="phone_number">טלפון נייד   </label>
                            
                            <div class="">
                               <input type="text" name="phone_number" id="phone_number" value="" class="form-control">
                            </div>
                        </li>

                        <li class="gf_middle_third gfield text-field2_application form-group">
                           <label class="gfield_label control-label" for="email">כתובת מייל </label>

                            <div class="">
                               <input type="email" name="email" id="email" value="" class="form-control">
                            </div>
                        </li>

                        <li class="gf_left_third gfield text-field1_application form-group">
                            <label class="gfield_label control-label" for="guarantee_amount">סכום הערבות המבוקש  </label>

                            <div class="">
                               <input type="number" name="guarantee_amount" id="guarantee_amount" value="" min="1" class="form-control">
                            </div>
                        </li>

                    </ul>

                    <div class="gform_footer top_label"> 
                       <input type="submit" id="gform_submit_button_5" class="gform_button button next" value="שהמשך " tabindex="54"> 
                    </div>
                
                    <div class="gform_footer top_label"> 
                        <a class="button gform_button previous_scr"> <p class="first_next_button">הקודם</p></a>
                        <a class="button gform_button next"> <p class="first_next_button">המשך</p></a>
                    </div>
                </div> -->


            <!-- second form grater than 25000 -->
                <div id="company_information" class="gform_body">
                    <div id="field">
                    <div id="field0">

                      <ul class="gform_fields top_label ">

                        <li class="gfield gfield_html gfield_no_follows_desc "> 

                           <!--  <h1 class="page-subtitle page-subtitle_application">צור קשר</h1> -->
                            <p class="contact-text_application"> פרטים אישיים </p>
                            <p class="contact-text_application"> ערב נוסף </p>
                            <p class="contact-text_application">כאן נזדקק לפרטים של הערב הנוסף
(את הפרטים שלך כבר יש לנו)  </p>
                         </li>

                        <li class="gfield gf_left_third text-field1_application form-group">
                            <label class="gfield_label control-label" for="to_fullname">שם מלא של הערב 
                            </label>

                            <div class="">
                               <input type="text" name="to_fullname" id="to_fullname" value="" class="form-control">
                            </div>
                        </li>

                        <li class="gf_middle_third gfield text-field2_application form-group">
                            <label class="gfield_label control-label" for="to_photo_id"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> צילום ת.ז </font></font></label>

                            <div class="">
                               <input type="file" name="to_photo_id" id="to_photo_id" class="input_application form-control" value="" >
                            </div>
                        </li>

                        <li class="gf_middle_third gfield text-field1_application form-group">
                            <label class="gfield_label control-label" for="to_unique_id">ת.ז של הערב </label>
                            
                            <div class="">
                               <input type="text" name="to_unique_id" id="to_unique_id" value="" class=" form-control">
                            </div>
                        </li>

                        <li class="gfield gf_left_third text-field2_application form-group">
                            <label class="gfield_label control-label" for="to_current_residence"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">כתובת מגורים נוכחית
                            </font></font></label>

                            <div class="">
                               <textarea class="input_application textarea large form-control" name="to_current_residence" rows="5" cols="50" id="to_current_residence" style="max-height: 56px;"></textarea>
                            </div>
                        </li>

                        <li class="gf_left_third gfield text-field1_application form-group">
                            <label class="gfield_label control-label" for="to_phone_number">טלפון נייד </label>
                            
                            <div class="">
                               <input type="text" name="to_phone_number" id="to_phone_number" value="" class="form-control">
                            </div>
                        </li>

                        <li class="gf_middle_third gfield text-field2_application form-group">
                           <label class="gfield_label control-label" for="to_email">כתובת מייל </label>

                            <div class="">
                               <input type="email" name="to_email" id="to_email" value="" class="form-control">
                            </div>
                        </li>

                        <!-- <li class="gf_left_third gfield text-field1_application form-group">
                            <label class="gfield_label control-label" for="to_guarantee_amount">סכום הערבות המבוקש </label>

                            <div class="">
                               <input type="number" name="to_guarantee_amount" id="to_guarantee_amount" required="" value="" min="1" class="form-control">
                            </div>
                        </li> -->

                        <li class="gfield gfield_html gfield_no_follows_desc "> 
                            <p class="contact-text_application">ניתן לבקש עד 50,000 ₪ </p>
                         </li>

                    </ul> 
                    
                    <!-- div class="gform_footer top_label">
                        <input type="submit" id="gform_submit_button_5" class="gform_button button previous" value="קודם " tabindex="54"> 
                        <input type="submit" id="gform_submit_button_5" class="gform_button button next" value="שהמשך " tabindex="54"> 
                    </div> -->

                    <div class="gform_footer top_label"> 
                        <a class="button gform_button" id="previous"> <p class="first_next_button">הקודם</p></a>
                        <a class="button gform_button next"> <p class="first_next_button">המשך</p></a>
                    </div>

                    </div><!--end field0-->
                    </div><!--end field-->
                </div>

                <!-- second form less than 25000 -->
               <!--  <div id="PropertyForm" class="gform_body">
                    <div id="field">
                    <div id="field0">

                      <ul class="gform_fields top_label ">

                        <li class="gfield gfield_html gfield_no_follows_desc "> 

                            <p class="contact-text_application"> פרטים על הנכס </p>
                            <p class="contact-text_application">היי דני, עוד כמה פרטים ומתקדמים.
 ממליצים לכם להכין מראש את פרטי בעל הנכס </p>
                        </li>

                        <li class="gfield gf_left_third text-field1_application form-group">
                            <label class="gfield_label control-label" for="apartment_add"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">כתובת הדירה
                            </font></font></label>

                            <div class="">
                               <textarea class="textarea large form-control" name="apartment_add" rows="5" cols="50" id="apartment_add" style="max-height: 56px;"></textarea>
                            </div>
                        </li>


                        <li class="gfield gf_left_third text-field2_application form-group">
                            <label class="gfield_label control-label" for="lease_period">תקופת השכירות 
                            </label>

                            <div class="">
                               <input type="text" name="lease_period" id="lease_period" value="" class="input_application form-control">
                            </div>
                        </li>

                        <li class="gf_left_third gfield text-field1_application form-group">
                            <label class="gfield_label control-label" for="landlord">שם בעל הדירה </label>
                            
                            <div class="">
                               <input type="text" name="landlord" id="landlord" value="" class="form-control">
                            </div>
                        </li>

                        <li class="gf_middle_third gfield text-field2_application form-group">
                            <label class="gfield_label control-label" for="landlord_id">ת.ז בעל הדירה </label>
                            
                            <div class="">
                               <input type="text" name="landlord_id" id="landlord_id" value="" class=" form-control">
                            </div>
                        </li>

                        <li class="gf_left_third gfield text-field1_application form-group">
                            <label class="gfield_label control-label" for="property_phone">טלפון בעל הדירה </label>

                            <div class="">
                               <input type="text" name="property_phone" id="property_phone" value="" min="1" class="form-control">
                            </div>
                        </li>

                        <li class="gf_middle_third gfield text-field2_application form-group">
                           <label class="gfield_label control-label" for="landlord_email">מייל בעל הדירה </label>

                            <div class="">
                               <input type="email" name="landlord_email" id="landlord_email" value="" class="form-control">
                            </div>
                        </li>

                        <li class="gf_middle_third gfield text-field1_application form-group">
                            <label class="gfield_label control-label" for="landlord_photo_id"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> צירוף חוזה שכירות </font></font></label>

                            <div class="">
                               <input type="file" name="landlord_photo_id" id="landlord_photo_id" class="input_application form-control" value="" >
                            </div>
                        </li>

                        
                    </ul> 
                   
                    <div class="gform_footer top_label"> 
                        <a class="button gform_button" id="property_previous"> <p class="first_next_button">הקודם</p></a>
                        <a class="button gform_button next"> <p class="first_next_button">המשך</p></a>
                      
                    </div>

                    </div>
                    </div>
                </div> -->

               

            <!-- <div class="gform_footer top_label"> 
                <p><a class="gform_button next">שהמשך </a></p>
               <input type="submit" id="gform_submit_button_5" class="gform_button button next" value="שהמשך " tabindex="54"> 
             
            </div> -->
    </form>
    </div>
                      
         
        </div>
    </div>
</div>