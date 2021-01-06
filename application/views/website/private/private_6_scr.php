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


.spantext{ 
  font-size: 22px;
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

        $("#private_6_form").css("opacity","0.5"); // button opacity change
        $("#private_6_form").css("cursor","auto");
        $("#private_6_form").prop("disabled", true);

        // apartment_add sec_date_of_birth landlord landlord_id property_phone sec_email file-2

        $('#apartment_add,#landlord,#landlord_id,#property_phone,#sec_email').on('keyup', function() {

            if($("#apartment_add").val() != '' && $("#landlord").val() != '' && $("#landlord_id").val() != '' && $("#property_phone").val() != '' && $("#sec_email").val() != '' && $("#sec_date_of_birth").val() != '' && $("#file-1").val() != '' ){

                $("#private_6_form").css("opacity","1"); // button opacity change
                $("#private_6_form").css("cursor","pointer");
                $("#private_6_form").prop("disabled", false);

            }
            else{
                $("#private_6_form").css("opacity","0.5"); // button opacity change
                $("#private_6_form").css("cursor","auto");
                $("#private_6_form").prop("disabled", true);
            }

          
        });

        $('#file-1,#sec_date_of_birth').on('change', function() {

            if($("#apartment_add").val() != '' && $("#landlord").val() != '' && $("#landlord_id").val() != '' && $("#property_phone").val() != '' && $("#sec_email").val() != '' && $("#sec_date_of_birth").val() != '' && $("#file-1").val() != '' ){

                    $("#private_6_form").css("opacity","1"); // button opacity change
                    $("#private_6_form").css("cursor","pointer");
                    $("#private_6_form").prop("disabled", false);
                
            }else{
                $("#private_6_form").css("opacity","0.5"); // button opacity change
                $("#private_6_form").css("cursor","auto");
                $("#private_6_form").prop("disabled", true);
            }

          
        });


        // $("#private_6_form").submit(function (e){ 
        $('#private_6_form').on('click', function() {

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

                }
                else{
                    // $('.submit').css('opacity', '0.5');
                }
                
                if($("#apartment_add").val() != '' && $("#landlord").val() != '' && $("#landlord_id").val() != '' && $("#property_phone").val() != '' && $("#sec_email").val() != '' && $("#sec_date_of_birth").val() != '' && $("#file-1").val() != '' ){

                    $("#private_6_form").css("opacity","1"); // button opacity change
                    $("#private_6_form").css("cursor","pointer");
                    $("#private_6_form").prop("disabled", false);
                
            }else{
                $("#private_6_form").css("opacity","0.5"); // button opacity change
                $("#private_6_form").css("cursor","auto");
                $("#private_6_form").prop("disabled", true);
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
            
             <form method="post" enctype="multipart/form-data" id="myform" name="validate_form" action="<?php echo site_url('private6'); ?>" novalidate="" > 

                
                <!-- greater than 25000 after screen(scr_six_form) -->

                 <div id="scr_five_form" class="gform_body form_height" style="margin-top: 30px;">
                
                            <div class="" style="float: right; margin-left:15px; margin-top:-25px;">
                            <img src="<?php echo base_url() ?>website_assets/img/progress3.png" class="img-responsive">
                           
                           </div>
                            <div class="main_text">
                    <p class="rtl main_text_heading" style="text-align:right;font-weight: bold;">פרטים על הנכס </p>
                    <p class="rtl" style="text-align:right; margin-top: -8px;">השלב הבא: בקשת הערבות </p>
                            </div>
                    
                    <br>

                    <ul class="gform_fields top_label ">

                        <li class="gfield gfield_html gfield_no_follows_desc " style="">
                            <p class="contact-text_application" style="text-align:right;">היי <span id="spantext" class="spantext">דני</span>, עוד כמה פרטים ומתקדמים, ממליצים להכין מראש את פרטי בעל הנכס  </p>
                         </li>

                      
                        <li class="gfield gf_left_third text-field1_application form-group">
                           
                            <div class="styled-input wide">
                               <textarea class="textarea large form-control nine1_left" name="apartment_add" rows="5" cols="50" id="apartment_add" required="" style="max-height: 56px;" ></textarea>
                             
                            <label class="gfield_label control-label gform_wrapper gfield_label" for="apartment_add">כתובת הנכס
                            </label>
                            </div>
                        </li>

                        <li class="gf_left_third gfield text-field2_application form-group">
                        
                            <div class="styled-input wide">
                               <input type="text" name="landlord" id="landlord" value="" class="form-control nine3_left" required="">
                            
                              <label class="gfield_label control-label gform_wrapper gfield_label" for="landlord">שם בעל הנכס
                            </label>
                            </div>
                        </li>

                        <li class="gf_middle_third gfield text-field1_application form-group">
                       
                            <div class="styled-input wide">
                               <input type="text" name="landlord_id" id="landlord_id" value="" class="form-control nine3_left" required="">
                            
                               <label class="gfield_label control-label gform_wrapper gfield_label" for="landlord_id">ת.ז בעל הנכס
                            </label>
                            </div>
                        </li>

                        <li class="gf_left_third gfield text-field2_application form-group">
                         
                            <div class="styled-input wide">
                               <input type="text" name="property_phone" id="property_phone" value="" class="form-control nineth_text" required="">
                             
                              <label class="gfield_label control-label gform_wrapper gfield_label" for="property_phone">טלפון בעל הנכס
                            </label>
                            </div>
                        </li>

                       
                         <li class="gfield gf_left_third text-field1_application form-group">
                         
                            <div class="styled-input wide">
                               <input type="text" name="sec_email" id="sec_email" value="" class="form-control nineth_text" required="">
                             
                           <label class="gfield_label control-label gform_wrapper gfield_label" for="sec_email">
                               <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">מייל בעל הנכס
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
                        
<!--                            <a class="button gform_button"> <p class="first_main_button lowerbutton" id="private_6_form">המשך  </p></a>-->
                            
                            <button type="submit" class="gform_button button first_main_button lowerbutton" id="private_6_form" style="height: 60px; width: 328px;">המשך</button>


                        </div>
                        <div class="col-md-3 col-sm-3"></div>
                    </div>
                 
                </div>
                
                
            </form>
        </div>

    </div>
             
    </div>
        
</div>

<script>

$( document ).ready(function() {

    <?php if(!empty($this->session->userdata['private2'])){ 


      $clientdetails = $this->session->userdata['private2'];

  ?>

        var client_first_name = '<?php echo $clientdetails["first_name"];?>';

        $("#spantext").html(client_first_name);

    <?php } ?>

});

</script>
