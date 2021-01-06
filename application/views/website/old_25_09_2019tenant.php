<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

<style type="text/css">
        #PropertyForm,
        #company_information,#account_information,#scr_second_form,#scr_third_form,#scr_seven_form,#scr_eight_form {
            display:none;
        }

        .first_next_button{
            font-family: Raleway;
            font-weight: 600;
            text-align: center;
            background-color: #33c9ff;
            cursor: pointer;
            /*transition: background .3s;*/
            height: 45px;
            padding: 10px 60px 10px 75px;
            border-radius: 29.5px;
            box-shadow: 0px 10px 30px 0 rgba(24, 33, 112, 0.3);
            background-image: linear-gradient(to top, #31739b, #53c2e4);
            color: #fff !important;
            border: 0px solid #df262608;
            direction: rtl;
            margin: 0 16px 0 0;
            /*width: 34%;*/
            float: right;
        }

        .first_main_button{
            font-family: Raleway;
            font-weight: 600;
            text-align: center;
            background-color: #33c9ff;
            cursor: pointer;
            /*transition: background .3s;*/
            height: 45px;
            /*padding: 10px 60px 10px 75px;*/
            padding-top: 5px;
            border-radius: 29.5px;
            box-shadow: 0px 10px 30px 0 rgba(24, 33, 112, 0.3);
            background-image: linear-gradient(to top, #31739b, #53c2e4);
            color: #fff !important;
            border: 0px solid #df262608;
            direction: rtl;
            /*margin: 0 16px 0 0;*/
            /*width: 195px;*/
            margin: 15px 16px 0px 45px;
            width: 70%;
            /*float: right;*/
        }
        .first_main2_button{
            font-family: Raleway;
            font-weight: 600;
            text-align: center;
            background-color: #33c9ff;
            cursor: pointer;
            /* transition: background .3s; */
            height: 60px;
            padding: 15px 25px 0px 23px;
            /* padding-top: 5px; */
            border-radius: 29.5px;
            box-shadow: 0px 10px 30px 0 rgba(24, 33, 112, 0.3);
            background-image: linear-gradient(to top, #31739b, #53c2e4);
            color: #fff !important;
            border: 0px solid #df262608;
            direction: rtl;
            /* margin: 0 16px 0 0; */
            /* width: 195px; */
            /*margin: 15px 16px 0px 45px;*/
            width: 100%;
            /* float: right; */
        }
        .obli-desktop{
            margin-top: 50px;
        }
        @media screen and (min-width: 320px) and (max-width: 767px){
            .obli-desktop{
                margin-top: 0px;
            }
        }
        .tab-obli{
            border-width: 0px 2px 2px 2px;
            border-style: solid;
            border-color: #eee;
            padding: 15px;
        }
        .tab-direction-obli{
            text-align: right;
            direction: rtl;
        }
        @media screen and (min-width: 150px) and (max-width: 322px){
         .screen-button-obli{
            padding: 0px 25px 0px 23px;
         }
        }
        @media screen and (min-width: 150px) and (max-width: 582px){
         .screen-button2-obli{
            margin-top: 10px;
         }
         @media screen and (min-width: 150px) and (max-width: 381px){
         .screen-button3-obli{
            padding: 0px 25px 0px 23px;
         }
         }
        }


        /*/*** tab css start ****/

         .nav-pills>li.active>a, .nav-pills>li.active>a:focus, .nav-pills>li.active>a:hover{
                background-color: #ffffff;
                color: #4a4646;
        }
        .box-border{
            border: 2px solid #c9c9d3;
            border-radius: 12px;
        }
        .nav-pills>li>a{
            border-radius: 12px;
        }
        .nav>li>a:focus, .nav>li>a:hover{
            /*height: 260px;*/
        }

        .tab_image-obli{
          margin: 0 auto;
          padding: 5px;
        }
        .radio input[type=radio]{
            top: -32px;
            width: 22px;
        }
        .checkbox, .radio{
            display: inline-block;
        }
        .nav>li>a:focus, .nav>li>a:hover{
            background-color: #fff;
        }
       /* .box-border .tab-pane input[type="radio"] ~ label:focus,
        .box-border .tab-pane  input[type="radio"] ~ label:hover,
        .box-border .tab-pane  input[type="checkbox"] ~ label:focus,
        .box-border .tab-pane  input[type="checkbox"] ~ label:hover {
            box-shadow: 0px 0px 3px #333;
        }
        .box-border .tab-pane input[type="radio"]:checked ~ label,
        .box-border .tab-pane input[type="checkbox"]:checked ~ label {
         color: #fafafa;
         }*/
        input[type='radio']:after {
       width: 16px;
        height: 17px;
        border-radius: 15px;
        top: 17px;
        left: -4px;
        position: relative;
        /*background-color: #824edc;*/
        content: '';
        display: inline-block;
        visibility: visible;
        border: 0px solid white;
    }

       input[type='radio']:checked:after {
        width: 16px;
        height: 17px;
        border-radius: 15px;
        top: 17px;
        left: -4px;
        position: relative;
        background-color: #824edc;
        content: '';
        display: inline-block;
        visibility: visible;
        border: 0px solid white;
    }


    .frb-group {
    margin: 15px 0;
}

.frb ~ .frb {
    /*margin-top: 15px;*/
}

.frb input[type="radio"]:empty,
.frb input[type="checkbox"]:empty {
    display: none;
}

.frb input[type="radio"] ~ label:before,
.frb input[type="checkbox"] ~ label:before {
    font-family: FontAwesome;
    content: '\f096';
    position: absolute;
    top: 50%;
    margin-top: -11px;
    left: 15px;
    font-size: 22px;
}

.frb input[type="radio"]:checked ~ label:before,
.frb input[type="checkbox"]:checked ~ label:before {
    content: '\f046';
}

.frb input[type="radio"] ~ label,
.frb input[type="checkbox"] ~ label {
    position: relative;
    cursor: pointer;
    width: 100%;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f2f2f2;
}

.frb input[type="radio"] ~ label:focus,
.frb input[type="radio"] ~ label:hover,
.frb input[type="checkbox"] ~ label:focus,
.frb input[type="checkbox"] ~ label:hover {
    box-shadow: 0px 0px 3px #333;
}

.frb input[type="radio"]:checked ~ label,
.frb input[type="checkbox"]:checked ~ label {
    color: #fafafa;
}

.frb input[type="radio"]:checked ~ label,
.frb input[type="checkbox"]:checked ~ label {
    background-color: #f2f2f2;
}

.frb.frb-default input[type="radio"]:checked ~ label,
.frb.frb-default input[type="checkbox"]:checked ~ label {
    color: #333;
}

.frb.frb-primary input[type="radio"]:checked ~ label,
.frb.frb-primary input[type="checkbox"]:checked ~ label {
    background-color: #337ab7;
}

.frb.frb-success input[type="radio"]:checked ~ label,
.frb.frb-success input[type="checkbox"]:checked ~ label {
    background-color: #5cb85c;
}

.frb.frb-info input[type="radio"]:checked ~ label,
.frb.frb-info input[type="checkbox"]:checked ~ label {
    background-color: #5bc0de;
}

.frb.frb-warning input[type="radio"]:checked ~ label,
.frb.frb-warning input[type="checkbox"]:checked ~ label {
    background-color: #f0ad4e;
}

.frb.frb-danger input[type="radio"]:checked ~ label,
.frb.frb-danger input[type="checkbox"]:checked ~ label {
    background-color: #d9534f;
}

.frb input[type="radio"]:empty ~ label span,
.frb input[type="checkbox"]:empty ~ label span {
    display: inline-block;
}

.frb input[type="radio"]:empty ~ label span.frb-title,
.frb input[type="checkbox"]:empty ~ label span.frb-title {
    font-size: 16px;
    font-weight: 700;
    margin: 5px 5px 5px 50px;
}

.frb input[type="radio"]:empty ~ label span.frb-description,
.frb input[type="checkbox"]:empty ~ label span.frb-description {
    font-weight: normal;
    font-style: italic;
    color: #999;
    margin: 5px 5px 5px 50px;
}

.frb input[type="radio"]:empty:checked ~ label span.frb-description,
.frb input[type="checkbox"]:empty:checked ~ label span.frb-description {
    color: #fafafa;
}

.frb.frb-default input[type="radio"]:empty:checked ~ label span.frb-description,
.frb.frb-default input[type="checkbox"]:empty:checked ~ label span.frb-description {
    color: #999;
}
.frb input[type="radio"]:empty, .frb input[type="checkbox"]:empty{
    display: block;
}

        /*.radio input[type=radio]{
            position: relative;
            top:-60px;
        }*/

         /*/*** tab css end ****/
    </style>

 

    <script type="text/javascript">
        
        
        $(document).ready(function(){

            // Custom method to validate username
            // $.validator.addMethod("usernameRegex", function(value, element) {
            //     return this.optional(element) || /^[a-zA-Z0-9]*$/i.test(value);
            // }, "Username must contain only letters, numbers");

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
                        fullname: {
                            required: true,
                            // usernameRegex: true,
                            minlength: 3,
                        },
                        photo_id: {
                            required: true,
                        },
                        unique_id: {
                            required: true,
                            number: true
                        },
                        current_residence: {
                            required: true,
                        },
                        phone_number: {
                            required: true,
                            number: true
                        },
                        email: {
                            required: true,
                            email: true
                        },
                        guarantee_amount: {
                            required: true,
                            number: true
                        },
                        to_fullname: {
                            required: true,
                        },
                        to_photo_id: {
                            required: true,
                        },
                        to_unique_id: {
                            required: true,
                            number: true
                        },
                        to_current_residence: {
                            required: true,
                        },
                        to_phone_number: {
                            required: true,
                            number: true
                        },
                        to_email: {
                            required: true,
                            email: true
                        },
                        to_guarantee_amount: {
                            required: true,
                            number: true
                        },
                        apartment_add: {
                            required: true,
                        },
                        lease_period: {
                            required: true,
                            number: true
                        },
                        landlord: {
                            required: true,
                        },
                        landlord_id: {
                            required: true,
                            number: true
                        },
                        property_phone: {
                            required: true,
                            number: true
                        },
                        landlord_email: {
                            required: true,
                            email: true
                        },
                        landlord_photo_id: {
                            required: true,
                        },
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
                        fullname: {
                            required: "שדה חובה",
                        },
                        photo_id: {
                            required: "שדה חובה",
                        },
                        unique_id: {
                            required: "שדה חובה",
                            number: "אנא הזן את המספר"
                        },
                        current_residence: {
                            required: "שדה חובה",
                        },
                        phone_number: {
                            required: "שדה חובה",
                            number: "אנא הזן את המספר"
                        },
                        email: {
                            required: "שדה חובה",
                            email: 'אנא הזן כתובת דוא"ל תקנית.'
                        },
                        guarantee_amount: {
                            required: "שדה חובה",
                            number: "אנא הזן את המספר"
                        },
                        to_fullname: {
                            required: "שדה חובה",
                        },
                        to_photo_id: {
                            required: "שדה חובה",
                        },
                        to_unique_id: {
                            required: "שדה חובה",
                            number: "אנא הזן את המספר"
                        },
                        to_current_residence: {
                            required: "שדה חובה",
                        },
                        to_phone_number: {
                            required: "שדה חובה",
                            number: "אנא הזן את המספר"
                        },
                        to_email: {
                            required: "שדה חובה",
                            email: 'אנא הזן כתובת דוא"ל תקנית.'
                        },
                        to_guarantee_amount: {
                            required: "שדה חובה",
                            number: "אנא הזן את המספר"
                        },
                        apartment_add: {
                            required: "שדה חובה",
                        },
                        lease_period: {
                            required: "שדה חובה",
                            number: "אנא הזן את המספר"
                        },
                        landlord: {
                            required: "שדה חובה",
                        },
                        landlord_id: {
                            required: "שדה חובה",
                            number: "אנא הזן את המספר"
                        },
                        property_phone: {
                            required: "שדה חובה",
                            number: "אנא הזן את המספר"
                        },
                        landlord_email: {
                            required: "שדה חובה",
                            email: 'אנא הזן כתובת דוא"ל תקנית.'
                        },
                        landlord_photo_id: {
                            required: "שדה חובה",
                            
                        },
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

// 
        // $(".check-box-1").click(function(){
        //     $("#box-1").prop("checked", true);
        // });
        $(".check-box-2").click(function(){
            $("#box-2").prop("checked", true);
        });

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

                <!-- screen 1 -->
                <div id="scr_first_form" class="gform_body">
                    <p class="" style="text-align:center;"> ערבות בהתחייבות </p>

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
                             
                            <a class="button gform_button next"> <p class="first_main_button" >לקוח עסקי</p></a>
                        </div>
                        <div class="col-md-3 col-sm-3"></div>
                    </div>
                    <br><br><br><br><br><br><br>

                </div>
               

                <!-- screen 2 -->
                <div id="scr_second_form" class="gform_body">
                    <p class="rtl" style="text-align:center;"> היי! אנחנו OBLI ואנחנו כאן כדי לסייע לכם בקבלת ערבות בטוחה, כדאית ומהירה מבית חברת הביטוח מנורה מבטחים וטריא.  </p><br>

                    <p class="rtl" style="text-align:center;"> מה תצטרכו לעשות כדי לקבל את הערבות? לא יותר מדי! אפילו לא צריך להגיע לבנק – חיסכון בזמן ובעיקר בכסף  </p>

                  

    <div class="tabs">
        <div class="">
            <div class="row">
                <div class="col-xl-2 section light-bg" style="margin-top:50px;">
                    <ul class="nav nav-pills nav-stacked flex-column">


                        <li class="box-border frb frb-default check-box-1" style="float: left; width: 48%; text-align: center;">
                            <a >
                           <img src="http://oblidev.malul.xyz/website_assets/img/tab_a2.png" class="img-responsive tab_image-obli">
                         בקרוב <br> מסלול <br> ללא עמלה </a>
                            <label for="radio-button-0" class="radio" >
                             
                             <input type="radio" name="radio-box" id="box-1">
                            </label>
                        </li>
         
          
                        <li class="box-border frb frb-default check-box-2" style="float: right; width: 48%; text-align: center;">
                            <a href="#tab_b" data-toggle="pill"> 
                           <img src="http://oblidev.malul.xyz/website_assets/img/tab_b2.png" class="img-responsive tab_image-obli">
                            <br>מסלול <br> ללא פיקדון </a>
                            <label for="radio-button-1" class="radio">
                             
                             <input type="radio" name="radio-box" id="box-2" checked="checked">
                              
                            </label>
                        </li>

                    </ul>
                </div>
                <div class="col-xl-6">
                    <div class="tab-content">
                        <div class="tab-pane" id="tab_a">
                          <!--   <p>American Builders Inc. is your full service general contractor. We have been helping 
                                clients throughout Eastern North Carolina with their construction needs since 1996.
                                We take pride in understanding our clients' needs, making their construction experience 
                                as worry free as possible and only delivering a finished product that will withstand the
                            test of time. </p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod 
                            bibendum laoreet.</p> -->
                        </div>
                        <div class="tab-pane active rtl" id="tab_b" style="padding: 20px;">
                            <p>מתקשים לגייס את סכום הערבות? נשמח להעניק לכם ערבות ללא פיקדון תמורת עמלה של 5%.</p>
                        </div>
                        <!-- <div class="tab-pane" id="tab_c">
                            <h3>Third tab with soft transitioning effect.</h3>
                            <p>Thank you for taking the time to consider American Builders Inc. as your general
                                contractor for any and all of your commercial, residential, insurance restoration and metal 
                                building needs. Please feel free to explore our website, and be sure to click on the
                            Facebook link at the bottom of this page and like us on Facebook.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod 
                            bibendum laoreet.</p>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

     <div class="gform_footer top_label"> 
                        <a class="button gform_button previous_scr"> <p class="first_next_button">הקודם</p></a>
                        <a class="button gform_button next"> <p class="first_next_button screen-button-obli screen-button2-obli screen-button3-obli">אז, איך אפשר לעזור לכם?</p></a>
                    </div>

                </div>

                 <!-- screen 3 -->

                  <div id="scr_third_form" class="gform_body">
                    <p class="rtl" style="text-align:center;"> ערבות לשכר דירה </p><br>

                    <p class="rtl" style="text-align:center;"> אז מה אתם צריכים? </p>

                    
                    <br>
                    <div class="row">
                        <div class="col-md-3 col-sm-3"></div>
                        <div class="col-md-6 col-sm-6">
                            <a class="button gform_button next"> <p class="first_main2_button" >ערבות לשכר דירה</p></a>
                            <br>
                             
                            <a class="button gform_button next"> <p class="first_main2_button screen-button-obli" >בקרוב הבטחת צ'קים לשכר דירה</p></a>
                            <br>
                            <a class="button gform_button previous_scr"> <p class="first_main2_button">הקודם</p></a>
                        </div>
                        <div class="col-md-3 col-sm-3"></div>
                    </div>

                   <!--  <li class="gfield gf_left_third text-field1_application form-group">
                        <img src="<?php echo base_url() ?>website_assets/img/L3.png">
                    </li>

                    <li class="gfield gf_left_third text-field1_application form-group">
                        <img src="<?php echo base_url() ?>website_assets/img/L4.png">
                    </li> -->

                </div>

                <!-- screen 7 -->
                <div id="scr_seven_form" class="gform_body">
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
                                <!-- <div class="tab-pane fade" id="first-tab">
                                    <div class="d-flex flex-column flex-lg-row">
                                        <div>
                                         
                                        </div>
                                    </div>
                                </div> -->
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
                <div id="account_information" class="gform_body">

                    <ul class="gform_fields top_label ">

                        <li class="gfield gfield_html gfield_no_follows_desc ">
                           <!--  <h1 class="page-subtitle page-subtitle_application">צור קשר</h1> -->
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

                    <!-- <div class="gform_footer top_label"> 
                       <input type="submit" id="gform_submit_button_5" class="gform_button button next" value="שהמשך " tabindex="54"> 
                    </div> -->
                
                    <div class="gform_footer top_label"> 
                        <a class="button gform_button previous_scr"> <p class="first_next_button">הקודם</p></a>
                        <a class="button gform_button next"> <p class="first_next_button">המשך</p></a>
                    </div>
                </div>


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

                        <li class="gf_left_third gfield text-field1_application form-group">
                            <label class="gfield_label control-label" for="to_guarantee_amount">סכום הערבות המבוקש </label>

                            <div class="">
                               <input type="number" name="to_guarantee_amount" id="to_guarantee_amount" required="" value="" min="1" class="form-control">
                            </div>
                        </li>

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
                <div id="PropertyForm" class="gform_body">
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
                        <!-- <input type="submit" id="gform_submit_button_5" class="gform_button button" value="שהמשך " tabindex="54"> -->
                    </div>

                    </div>
                    </div>
                </div>

               

            <!-- <div class="gform_footer top_label"> 
                <p><a class="gform_button next">שהמשך </a></p>
               <input type="submit" id="gform_submit_button_5" class="gform_button button next" value="שהמשך " tabindex="54"> 
             
            </div> -->
    </form>
    </div>
                      
         
        </div>
    </div>
</div>