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
<!-- <link rel="stylesheet" href="http://localhost/obli_admin/website_assets/css/business_style.css" type="text/css" media="all"> -->

 <style type="text/css">

 #b10_scr_checkbox1,#b10_scr_checkbox2,#b10_scr_checkbox3,#b10_scr_checkbox4,#b10_scr_checkbox5{
    display: none;
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
/*** business_9_scr start ***/
.first_button-bus{
    background: rgba(95, 97, 172, 0.05);
    border: 1px solid rgba(50, 52, 116, 0.5);
    border-radius: 30px;
    height: 50px;
    padding: 13px;
    text-align: center;
    height: 60px;
    cursor: pointer;
    width: 328px;
    /*width: 371px;*/
    margin: 0 auto;
    font-size: 17px;
    line-height: 29px;
}
@media only screen and (max-width:375px) and (min-width: 320px){
.first_button-bus{
    width: 100%;
}
}  
@media only screen and (max-width:767px) and (min-width: 320px){
.first_button-bus{
   margin-top: 5px;
   font-size: 15px;
}
.first_button-bus1{
     margin-top: -10px;
}
}
.business10_rescheck{
    top: -23px !important;
}
/*** business_9_scr end ***/   

.first_button-new {
     background: rgba(95, 97, 172, 0.05);
     border: 1px solid rgba(50, 52, 116, 0.5);
     border-radius: 30px;
     height: 50px;
     padding: 13px;
     text-align: center;
     height: 60px;
     cursor: pointer;
     /*width: 328px;*/
}     
</style>

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
            

             <form method="post" enctype="multipart/form-data" id="myform" name="validate_form" action="<?php echo site_url('businessFourth6'); ?>" novalidate="" >
            <!-- screen 4/5 -->
            <div id="business_7_scr" class="gform_body form_height" style="margin-top: 30px;">
                    
                            <div class="" style="float: right; margin-left:15px; margin-top:-25px;">
                            <img src="<?php echo base_url() ?>website_assets/img/progress06.png" class="img-responsive">
                           
                           </div>
                             <div class="main_text">
                    <p class="rtl main_text_heading" style="text-align:right;font-weight: bold;">מידע על החברה  </p>
                    <p class="rtl" style="text-align:right; margin-top: -8px;">השלב הבא: העברת פיקדון  </p>
                          </div>
                    
                    <br>

                    <ul class="gform_fields top_label ">

                        <li class="gfield gfield_html gfield_no_follows_desc" style="margin-top: 0px;">
                            <p class="contact-text_application rtl" style="text-align:right;">כדי להשלים את התהליך ולקבל את הערבות נזדקק למסמכים הבאים:  </p>
                            
                         </li>

                    </ul>


                    <div class="row" style="margin-top:50px;">
                        <div class="col-md-6 col-sm-6">
                           
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

                            <input type="file" name="b10_first_file" id="b10_first_file" class="inputfile inputfile-2" accept="image/gif,image/png,image/jpeg,image/jpg,application/pdf" style="display: none;" onchange="f1()">

                            <label for="b10_first_file" id="b10_label1" style="margin-top: 8px;padding: 13.5px;">
                               
                                <span style="font-weight: 200; font-size: 22px; margin-left:0px; padding-top: 6px;">תקנון החברה </span>
                            </label>

                        </div>

                       <!--  <div class="col-md-2 col-sm-2"></div> -->
                        <div class="col-md-6 col-sm-6">  
                            <!-- <p class="first_button-bus">תעודת התאגדות  </p> -->

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

                            <input type="file" name="b10_second_file" id="b10_second_file" class="inputfile inputfile-2" accept="image/gif,image/png,image/jpeg,image/jpg,application/pdf" style="display: none;" onchange="f()">

                            <label for="b10_second_file" id="b10_label" style="margin-top: 8px;padding: 13.5px;">
                               
                                <span style="font-weight: 200; font-size: 22px; margin-left:0px; padding-top: 6px;">תעודת התאגדות </span>
                            </label>



                        </div>

                    </div>

                    <div class="row" style="margin-top:15px;">

                        <div class="col-md-6 col-sm-6">

                            <div  id="selected-file3" style="padding-top:40px; display: none;">
                                 
                                 <div class="row">
                                    <div class="col-md-2">
                                      <span onclick="removeFile3()" class="file-close-icon">
                                        <!-- <i style="font-size:24px;" class="fa fa-close"></i> -->
                                        <img src="<?php echo base_url() ?>website_assets/img/close.png" class="img-responsive" style="float: left;">
                                    </div>
                                   
                                    <div class="col-md-8">
                                      <label class="for_file_name" id="file-name-label3"></label>
                                    </div>
                                     <div class="col-md-2">
                                      <span><i class="fa fa-file-text-o for_file_icon"></i></span>
                                    </div>
                                 </div>

                             </div>
                

                            <input type="file" name="b10_third_file" id="b10_third_file" class="inputfile inputfile-2" accept="image/gif,image/png,image/jpeg,image/jpg,application/pdf" style="display: none;" onchange="f3()">

                            <label for="b10_third_file" id="b10_label3" style="margin-top: 8px;padding: 13.5px;">
                               
                                <span style="font-weight: 200; font-size: 22px; margin-left:0px; padding-top: 6px;">אישור פטור מניכוי מס במקור </span>
                            </label>

                        </div>

                      <!--   <div class="col-md-2 col-sm-2"></div> -->
                        <div class="col-md-6 col-sm-6">
                         <div  id="selected-file4" style="padding-top:40px; display: none;">
                                 
                                 <div class="row">
                                    <div class="col-md-2">
                                      <span onclick="removeFile4()" class="file-close-icon">
                                        <!-- <i style="font-size:24px;" class="fa fa-close"></i> -->
                                        <img src="<?php echo base_url() ?>website_assets/img/close.png" class="img-responsive" style="float: left;">
                                    </div>
                                   
                                    <div class="col-md-8">
                                      <label class="for_file_name" id="file-name-label4"></label>
                                    </div>
                                     <div class="col-md-2">
                                      <span><i class="fa fa-file-text-o for_file_icon"></i></span>
                                    </div>
                                 </div>

                             </div>

                            <input type="file" name="b10_fourth_file" id="b10_fourth_file" class="inputfile inputfile-2" accept="image/gif,image/png,image/jpeg,image/jpg,application/pdf" style="display: none;" onchange="f4()">

                            <!-- <label for="b10_fourth_file" style="margin-top: 8px;padding: 13.5px;">
                               
                                <span style="font-weight: 200; font-size: 22px; margin-left:0px; padding-top: 6px;">אישור ניהול ספרים </span>
                            </label> -->

                             <label for="b10_fourth_file"  id="b10_label4" style="margin-top: 8px;padding: 13.5px;">
                               
                                <span style="font-weight: 200; font-size: 22px; margin-left:0px; padding-top: 6px;">תאישור ניהול ספרים </span>
                            </label>

                        </div>
                         

                    </div>

                    <div class="row" style="margin-top:15px;">
                       <div class="col-md-6 col-sm-6">
                           <div  id="selected-file5" style="padding-top:40px; display: none;">
                                 
                                 <div class="row">
                                    <div class="col-md-2">
                                      <span onclick="removeFile5()" class="file-close-icon">
                                        <!-- <i style="font-size:24px;" class="fa fa-close"></i> -->
                                        <img src="<?php echo base_url() ?>website_assets/img/close.png" class="img-responsive" style="float: left;">
                                    </div>
                                   
                                    <div class="col-md-8">
                                      <label class="for_file_name" id="file-name-label5"></label>
                                    </div>
                                     <div class="col-md-2">
                                      <span><i class="fa fa-file-text-o for_file_icon"></i></span>
                                    </div>
                                 </div>

                             </div>

                             <input type="file" name="b10_fifth_file" id="b10_fifth_file" class="inputfile inputfile-2" accept="image/gif,image/png,image/jpeg,image/jpg,application/pdf" style="display: none;" onchange="f5()">

                            <label for="b10_fifth_file" id="b10_label5" style="margin-top: 8px;padding: 13.5px;">
                               
                                <span style="font-weight: 200; font-size: 22px; margin-left:0px; padding-top: 6px;">הרשאה לחיוב חשבון </span>
                            </label>


                        </div>
                       <!--  <div class="col-md-2 col-sm-2"></div> -->
                        <div class="col-md-6 col-sm-6">
                            <div  id="selected-file6" style="padding-top:40px; display: none;">
                                 
                                 <div class="row">
                                    <div class="col-md-2">
                                      <span onclick="removeFile6()" class="file-close-icon">
                                        <!-- <i style="font-size:24px;" class="fa fa-close"></i> -->
                                        <img src="<?php echo base_url() ?>website_assets/img/close.png" class="img-responsive" style="float: left;">
                                    </div>
                                   
                                    <div class="col-md-8">
                                      <label class="for_file_name" id="file-name-label6"></label>
                                    </div>
                                     <div class="col-md-2">
                                      <span><i class="fa fa-file-text-o for_file_icon"></i></span>
                                    </div>
                                 </div>

                             </div>

                           <input type="file" name="b10_sixth_file" id="b10_sixth_file" class="inputfile inputfile-2" accept="image/gif,image/png,image/jpeg,image/jpg,application/pdf" style="display: none;" onchange="f6()">

                            <!-- <label for="b10_fifth_file" style="margin-top: 8px;padding: 13.5px;"> -->
                                 <label for="b10_sixth_file" id="b10_label6" style="margin-top: 8px; white-space: unset; padding-right: 45px; border-radius: 35px;">
                               
                                <span style="font-weight: 200; font-size: 22px; margin-left:0px; padding-top: 6px;">פרוטוקול חברה בנוסח אובלי חתום ע"י עו"ד </span>
                            </label>

                         

                        </div>

                    </div>

                      <!-- fa fa-download button and text start -->

                      <!--    <p class="contact-text_application rtl" style="text-align:right; margin-top: 40px;">*** נא צרף קובץ הרשאה לחיוב חשבון חתום ע”י הבנק או לחלופין צילום מסך או  </p>

                         <p class="contact-text_application rtl" style="text-align:right; margin-top: -15px;">אסמכתא להקמת הרשאה לחיוב חשבון באתר הבנק. </p>

                         <p class="rtl" style="text-align:right;font-weight: bold;font-size: 22px; margin-top: 20px;">הורדת מסמכים לחתימה  </p> 

                         <div class="row" style="margin-top:30px;">
                        <div class="col-md-6 col-sm-6"></div>
                        <div class="col-md-6 col-sm-6">
                        
                             
                            <p class="first_button-new">מסמך הרשאה לחיוב חשבון   <i class="fa fa-download" aria-hidden="true" style="padding-left: 10px;"></i> </p>
                           
                        </div>
                        
                    </div> -->

                    <!-- fa fa-download button and text end -->
                   
                   <div class="row" style="margin-top:40px;">
                        <div class="col-md-3 col-sm-3"></div>
                        <div class="col-md-6 col-sm-6">
                        
                            <input type="hidden" name="test10" value="1"/>
                            <button type="submit" class="button gform_button first_main_button" id="businessFouth_6_form" style="height: 60px; width: 328px;">המשך  </button>
                        </div>
                        <div class="col-md-3 col-sm-3"></div>
                    </div>

                </div>

            </form>        
  
        </div>

        </div>
    
    </div>
                      
</div>
    

<script type="text/javascript">

    // function b10_first_file () {
    //     alert(123);
    // }

    // file uploading part

    // start 1
function f(){
    var val = document.getElementById('b10_second_file').value;
    var selectedFile = document.getElementById('b10_second_file').files[0];
    // document.getElementById('client_file').value = selectedFile;
    var val = val.substring(val.lastIndexOf('\\')+1,val.length);
    if(val != ""){
        document.getElementById('b10_label').style.display = "none"
        document.getElementById('file-name-label').innerText = val;
       document.getElementById('selected-file').style.display = "block"
//       document.getElementById('for_file_label').style.display = "block"
       
    }
 
}

function removeFile (){ 
//    alert($("#b10_second_file").val());
 
    document.getElementById('b10_second_file').value = '';
    document.getElementById('b10_label').style.display = "block";
    document.getElementById('selected-file').style.display = "none";
//    document.getElementById('for_file_label').style.display = "none";
    
    if($("#b10_first_file").val() != '' && $("#b10_second_file").val() != '' && $("#b10_third_file").val() != '' && $("#b10_fourth_file").val() != '' && $("#b10_fifth_file").val() != '' && $("#b10_sixth_file").val() != '' ){
//        alert(1);
//        alert($("#b10_second_file").val());
            
            $("#businessFouth_6_form").css("opacity","1");
            $("#businessFouth_6_form").css("cursor","pointer");
            $("#businessFouth_6_form").prop("disabled", false);

    }else{
//        alert(2);
//        alert($("#b10_second_file").val());
        $("#businessFouth_6_form").css("opacity","0.5");
        $("#businessFouth_6_form").css("cursor","auto");
        $("#businessFouth_6_form").prop("disabled", true);
    }
}
// end

// start 1
function f1(){
    var val = document.getElementById('b10_first_file').value;
    var selectedFile = document.getElementById('b10_first_file').files[0];
    // document.getElementById('client_file').value = selectedFile;
    var val = val.substring(val.lastIndexOf('\\')+1,val.length);
    if(val != ""){
        document.getElementById('b10_label1').style.display = "none"
        document.getElementById('file-name-label1').innerText = val;
       document.getElementById('selected-file1').style.display = "block"
//       document.getElementById('for_file_label1').style.display = "block"
       
    }
 
}
function removeFile1 (){
 
    document.getElementById('b10_first_file').value = '';
    document.getElementById('b10_label1').style.display = "block"
    document.getElementById('selected-file1').style.display = "none"
//    document.getElementById('for_file_label1').style.display = "none"
    
    if($("#b10_first_file").val() != '' && $("#b10_second_file").val() != '' && $("#b10_third_file").val() != '' && $("#b10_fourth_file").val() != '' && $("#b10_fifth_file").val() != '' && $("#b10_sixth_file").val() != '' ){

            $("#businessFouth_6_form").css("opacity","1"); // button opacity change
            $("#businessFouth_6_form").css("cursor","pointer");
            $("#businessFouth_6_form").prop("disabled", false);

    }else{
        $("#businessFouth_6_form").css("opacity","0.5"); // button opacity change
        $("#businessFouth_6_form").css("cursor","auto");
        $("#businessFouth_6_form").prop("disabled", true);
    }
}
// end

// start 3
function f3(){
    var val = document.getElementById('b10_third_file').value;
    var selectedFile = document.getElementById('b10_third_file').files[0];
    // document.getElementById('client_file').value = selectedFile;
    var val = val.substring(val.lastIndexOf('\\')+1,val.length);
    if(val != ""){
        document.getElementById('b10_label3').style.display = "none"
        document.getElementById('file-name-label3').innerText = val;
       document.getElementById('selected-file3').style.display = "block"
//       document.getElementById('for_file_label3').style.display = "block"
       
    }
 
}
function removeFile3 (){
 
    document.getElementById('b10_third_file').value = '';
    document.getElementById('b10_label3').style.display = "block"
    document.getElementById('selected-file3').style.display = "none"
//    document.getElementById('for_file_label3').style.display = "none"
    
    if($("#b10_first_file").val() != '' && $("#b10_second_file").val() != '' && $("#b10_third_file").val() != '' && $("#b10_fourth_file").val() != '' && $("#b10_fifth_file").val() != '' && $("#b10_sixth_file").val() != '' ){

            $("#businessFouth_6_form").css("opacity","1"); // button opacity change
            $("#businessFouth_6_form").css("cursor","pointer");
            $("#businessFouth_6_form").prop("disabled", false);

    }else{
        $("#businessFouth_6_form").css("opacity","0.5"); // button opacity change
        $("#businessFouth_6_form").css("cursor","auto");
        $("#businessFouth_6_form").prop("disabled", true);
    }
}
// end


// start 4
function f4(){
    var val = document.getElementById('b10_fourth_file').value;
    var selectedFile = document.getElementById('b10_fourth_file').files[0];
    // document.getElementById('client_file').value = selectedFile;
    var val = val.substring(val.lastIndexOf('\\')+1,val.length);
    if(val != ""){
        document.getElementById('b10_label4').style.display = "none"
        document.getElementById('file-name-label4').innerText = val;
       document.getElementById('selected-file4').style.display = "block"
//       document.getElementById('for_file_label4').style.display = "block"
       
    }
 
}
function removeFile4 (){
 
    document.getElementById('b10_fourth_file').value = '';
    document.getElementById('b10_label4').style.display = "block"
    document.getElementById('selected-file4').style.display = "none"
//    document.getElementById('for_file_label4').style.display = "none"
    
    if($("#b10_first_file").val() != '' && $("#b10_second_file").val() != '' && $("#b10_third_file").val() != '' && $("#b10_fourth_file").val() != '' && $("#b10_fifth_file").val() != '' && $("#b10_sixth_file").val() != '' ){

            $("#businessFouth_6_form").css("opacity","1"); // button opacity change
            $("#businessFouth_6_form").css("cursor","pointer");
            $("#businessFouth_6_form").prop("disabled", false);

    }else{
        $("#businessFouth_6_form").css("opacity","0.5"); // button opacity change
        $("#businessFouth_6_form").css("cursor","auto");
        $("#businessFouth_6_form").prop("disabled", true);
    }
}
// end

// start 5
function f5(){
    var val = document.getElementById('b10_fifth_file').value;
    var selectedFile = document.getElementById('b10_fifth_file').files[0];
    // document.getElementById('client_file').value = selectedFile;
    var val = val.substring(val.lastIndexOf('\\')+1,val.length);
    if(val != ""){
        document.getElementById('b10_label5').style.display = "none"
        document.getElementById('file-name-label5').innerText = val;
       document.getElementById('selected-file5').style.display = "block"
//       document.getElementById('for_file_label5').style.display = "block"
       
    }
 
}
function removeFile5 (){
 
    document.getElementById('b10_fifth_file').value = '';
    document.getElementById('b10_label5').style.display = "block"
    document.getElementById('selected-file5').style.display = "none"
//    document.getElementById('for_file_label5').style.display = "none"
    
    if($("#b10_first_file").val() != '' && $("#b10_second_file").val() != '' && $("#b10_third_file").val() != '' && $("#b10_fourth_file").val() != '' && $("#b10_fifth_file").val() != '' && $("#b10_sixth_file").val() != '' ){

            $("#businessFouth_6_form").css("opacity","1"); // button opacity change
            $("#businessFouth_6_form").css("cursor","pointer");
            $("#businessFouth_6_form").prop("disabled", false);

    }else{
        $("#businessFouth_6_form").css("opacity","0.5"); // button opacity change
        $("#businessFouth_6_form").css("cursor","auto");
        $("#businessFouth_6_form").prop("disabled", true);
    }
}
// end

// start 6
function f6(){
    var val = document.getElementById('b10_sixth_file').value;
    var selectedFile = document.getElementById('b10_sixth_file').files[0];
    // document.getElementById('client_file').value = selectedFile;
    var val = val.substring(val.lastIndexOf('\\')+1,val.length);
    if(val != ""){
        document.getElementById('b10_label6').style.display = "none"
        document.getElementById('file-name-label6').innerText = val;
       document.getElementById('selected-file6').style.display = "block"
//       document.getElementById('for_file_label6').style.display = "block"
       
    }
 
}
function removeFile6 (){
 
    document.getElementById('b10_sixth_file').value = '';
    document.getElementById('b10_label6').style.display = "block"
    document.getElementById('selected-file6').style.display = "none"
//    document.getElementById('for_file_label6').style.display = "none"
    
    if($("#b10_first_file").val() != '' && $("#b10_second_file").val() != '' && $("#b10_third_file").val() != '' && $("#b10_fourth_file").val() != '' && $("#b10_fifth_file").val() != '' && $("#b10_sixth_file").val() != '' ){

            $("#businessFouth_6_form").css("opacity","1"); // button opacity change
            $("#businessFouth_6_form").css("cursor","pointer");
            $("#businessFouth_6_form").prop("disabled", false);

    }else{
        $("#businessFouth_6_form").css("opacity","0.5"); // button opacity change
        $("#businessFouth_6_form").css("cursor","auto");
        $("#businessFouth_6_form").prop("disabled", true);
    }
}
// end




    $(document).ready(function(){

        $("#businessFouth_6_form").css("opacity","0.5"); 
        $("#businessFouth_6_form").css("cursor","auto");
        $('#businessFouth_6_form').prop('disabled', true);
        // $('#business_3_form').prop('disabled', false);

        $('#b10_first_file,#b10_second_file,#b10_third_file,#b10_fourth_file,#b10_fifth_file,#b10_sixth_file').on('change', function() {

            // button check 
            if($("#b10_first_file").val() != '' && $("#b10_second_file").val() != '' && $("#b10_third_file").val() != '' && $("#b10_fourth_file").val() != '' && $("#b10_fifth_file").val() != '' && $("#b10_sixth_file").val() != '' ){

                $("#businessFouth_6_form").css("opacity","1");
                $("#businessFouth_6_form").css("cursor","pointer");
                $('#businessFouth_6_form').prop('disabled', false);
            }
            else{

                $("#businessFouth_6_form").css("opacity","0.5"); 
                $("#businessFouth_6_form").css("cursor","auto");
                $('#businessFouth_6_form').prop('disabled', true);

            }

        });
        
        $("#businessFouth_6_form").click(function(){
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
                        b10_first_file: {
                            required: true
                        },
                        b10_second_file: {
                            required: true
                        },
                        b10_third_file: {
                            required: true
                        },
                        b10_fourth_file: {
                            required: true
                        },
                       
                        b10_fifth_file: {
                            required: true
                        },
                        b10_sixth_file: {
                            required: true
                        }
                        
                    },
                    messages: {
                        b10_first_file: {
                            required: "שדה חובה"
                        },
                        b10_second_file: {
                            required: "שדה חובה"
                        },
                        b10_third_file: {
                            required: "שדה חובה"
                        },
                        b10_fourth_file: {
                            required: "שדה חובה"
                        },
                        b10_fifth_file: {
                            required: "שדה חובה"
                        },
                        b10_sixth_file: {
                            required: "שדה חובה"
                        }
                        
                    }
                    
                });

                if (form.valid() === true){

                   
                }
                else{
                    // $('.submit').css('opacity', '0.5');
                }

            if($("#b10_first_file").val() != '' && $("#b10_second_file").val() != '' && $("#b10_third_file").val() != '' && $("#b10_fourth_file").val() != '' && $("#b10_fifth_file").val() != '' && $("#b10_sixth_file").val() != '' ){

                    $("#businessFouth_6_form").css("opacity","1"); // button opacity change
                    $("#businessFouth_6_form").css("cursor","pointer");
                    $("#businessFouth_6_form").prop("disabled", false);
                
            }else{
                $("#businessFouth_6_form").css("opacity","0.5"); // button opacity change
                $("#businessFouth_6_form").css("cursor","auto");
                $("#businessFouth_6_form").prop("disabled", true);
            }

        });

    });

</script>