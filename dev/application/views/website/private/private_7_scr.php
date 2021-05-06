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

<script src="https://www.utilities-online.info/assets/js/xmltojson.js"></script>


<style type="text/css">

.sonar-wrapper{
  display: none;
}

.first_button-new{
    background: rgba(95, 97, 172, 0.05);
    border: 1px solid rgba(50, 52, 116, 0.5);
    border-radius: 30px;
    height: 50px;
    padding: 13px;
    text-align: center;
    height: 60px;
    cursor: pointer;
    width: 328px;

}
.first_button-new{
    margin-top: -15px;
}

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

<script type="text/javascript">
   
    $(document).ready(function(){

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
             
             <div class='bdireport' style='display:none;'> <?php echo $bdireport;?> </div>
            
             <form method="post" enctype="multipart/form-data" id="myform" name="validate_form" action="<?php echo site_url('private7'); ?>" novalidate="" > 

                
                <!-- Request gurantee screen -->

                 <div id="scr_eight_form" class="gform_body form_height" style="margin-top: 0px;">
               
                    <div class="" style="float: right; margin-left:15px; margin-top:-25px;">
                        <img src="<?php echo base_url() ?>website_assets/img/progress4.png" class="img-responsive">

                   </div>

                    <div class="main_text">
                    <p class="rtl main_text_heading" style="text-align:right;font-weight: bold;">בקשת ערבות  </p>
                    <!-- <p class="rtl" style="text-align:right;">השלב הבא: פרטי תשלום </p> -->
                     <p class="rtl" style="text-align:right;">השלב הבא: תשלום </p>
                 </div>

                    
                    <br>
<?php $private3 = $this->session->userdata('private3'); if(!empty($private3['private1_requested_gurantee_amt'])){ $private_requested_amt = str_replace(',', '', $private3['private1_requested_gurantee_amt']); }else{ $private_requested_amt = str_replace(',', '', $private3['private2_requested_gurantee_amt']); } $req_amt = $private_requested_amt; 
 
    if($private3['guarenty_duration'] > 12){
        $tax = 0.09; $annual_fee = 6;
    }else{
        $tax = 0.065; $annual_fee = 6;
    }
    
    $tax = 0.065;  $annual_fee = 6.5;
    
   // $first_value = $req_amt*$tax;
    //$second_value = $first_value/12; 
    
    
   $private3['endDate'] =  str_replace('/', '-',$private3['endDate']);
   
   $private3['startDate'] =  str_replace('/', '-',$private3['startDate']);
    
    $number_of_days_str = strtotime($private3['endDate']) - strtotime($private3['startDate']);
            
    $number_of_days = round($number_of_days_str / (60 * 60 * 24)); 
    
    $number_of_days = $number_of_days + 1;
    
    $first_value = $req_amt*$tax*$number_of_days/365;
    
    $second_value = $first_value; 
    
 ?>
                    
                    <ul class="gform_fields top_label ">

                        <li class="gfield gfield_html gfield_no_follows_desc " style="margin-top: 0px;">
                           
                            <p class="contact-text_application rtl" style="text-align:center; font-weight: 600;">בחרת בערבות ללא פיקדון</p>

<!--                            <p class="contact-text_application rtl" style="text-align:center; margin-top: -8px">התשלום החודשי יעמוד על <?php // if(!empty($first_value)) echo $first_value; ?> ש”ח</p>-->
                            
                         </li>

                    </ul>


                    <div class="modal-dialog_box">
                        <div class="modal-content_box">
                            <div class="modal-header_box">
                               
                                <h3 class="modal-title_box" id="myModalLabel"> ניתן לשלם עד 12 תשלומים </h3>
                            </div>
                            <div class="modal-body_box">
                                <!-- <p class="rtl" style="text-align:center;font-weight: bold;font-size: 22px;">בקשת ערבות  </p> -->
                                 <br>
                                <p class="rtl" style="text-align:center;font-weight: bold;font-size: 52px;"><?php if(!empty($second_value)) echo number_format($second_value,2); ?> ₪ </p>
                                
                               <!-- <p class="contact-text_application rtl" style="text-align:center;">עמלת הערבות השנתית הינה 6.5%</p>-->
                                <!--<p class="contact-text_application rtl" style="text-align:center; margin-top: -18px;">ותעמוד על <?php if(!empty($first_value)) echo $first_value; ?> ₪ בשנה.</p>
                              
                             -->

                            </div>
                           
                        </div>
                    </div>
                    <div class="row" style="margin-top:120px;">
                        <div class="col-md-3 col-sm-3"></div>
                        <div class="col-md-6 col-sm-6">
                        
                             
                            <a class="button gform_button" id="myBtn3"> <p class="first_button-new " style="color: #323474 !important; font-weight: normal;">הצהרות הלקוח  </p></a>

                             <div class="checkbox" style="float: right; margin-top: 7px;">
                                    <input id="checkbox" type="checkbox">
                                    <label for="checkbox">
                                        
                                    </label>
                                </div>
                         <p class="rtl" style="text-align:center; margin-top: 3px; margin-bottom:20px;"> קראתי ואני מסכים ל    
                         <a href="<?php echo site_url('terms'); ?>" target="_blank"><u style="color: #4EB5D7;">תנאי השימוש  </u></a>באתר  </p>
                            <input type="hidden" name="test8" value="1"/>
                            <button type="button" class="button gform_button first_main_button" id="businessSec_5_form" style="height: 60px; width: 328px; opacity: 0.5;" disabled="true" onclick='callparetiixapi()'>המשך </button>
                        </div>
                        <div class="col-md-3 col-sm-3"></div>
                    </div>

                   <!-- <div class="row" style="margin-top:100px;">
                        <div class="col-md-3 col-sm-3"></div>
                        <div class="col-md-6 col-sm-6">
                        
                                <div class="checkbox" style="float: right;">
                                    <input id="checkbox" type="checkbox">
                                    <label for="checkbox">
                                        
                                    </label>
                                </div>
                         <p class="rtl" style="text-align:center; margin-top: 3px; margin-bottom:20px;"> קראתי ואני מסכים ל    
                         <a href="<?php echo site_url('terms'); ?>"><u style="color: #4EB5D7;">תנאי השימוש  </u></a>באתר  </p>
                        
                            
                            
                            <input type="hidden" name="private7" >

                            <button type="submit" class="button gform_button first_main_button" id="private_7_form" >המשך </button> 
                        </div>
                        <div class="col-md-3 col-sm-3"></div>
                    </div> -->

                </div>
                
            <!-- first loader obli gif -->
            <div class="sonar-wrapper">
                <div class="sonar-emitter">
                    <img src="<?php echo base_url() ?>website_assets/img/loader.png" style="margin-top: 15px; position: relative; left: 30px;">

                    <div id="sonar_text">
                        <p class="rtl" style="font-weight: bold;font-size: 22px;">עוד כמה רגעים </p>
                        <p class="rtl" >אנחנו בודקים את בקשתך לערבות ומיד נעדכן. </p>
                    </div>
                <div class="sonar-wave"></div>
                </div>
            </div>
    
    </form>
    
     <script type="text/javascript">
                $(".sonar-wave").on("webkitAnimationIteration oanimationiteration animationiteration", function(){
                  $(this).css("background-color", colorize());
                })

                function colorize() {
                  var hue = Math.random() * 360;
                  return "HSL(" + hue + ",100%,50%)";
                }
            </script>     
        </div>

    </div>
             
    </div>
        
</div>

<!-- First Modal -->
              <!-- First Modal -->
                <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <!-- <h4 class="modal-title" id="myModalLabel"><b>הסכמה למסירת נתוני אשראי  </b></h4> -->
                                 <h4 class="modal-title" id="myModalLabel"><b>הצהרות הלקוח </b></h4>
                                
                            </div>
                            <div class="modal-body">
                                
                             <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10 rtl" style="text-align: right;">
                                    
                                    
                             <input id="checkbox3" type="checkbox" value="one" class="number" style="display:none;" checked='true'>
                                     
                                    <div class="checkbox checkbox-info check_box_popup00">
                                         <input id="accept-terms" type="checkbox" value="two" class="number" style="z-index:900;">
                                        <label for="checkbox4" style="padding-left: 0px;">
                                           
                                        </label>
                                    </div>

                                   <p class="check_box_para" style="text-align: justify;"> 
                                   
                                   
                                   אני מתחייב להודיע לאובלי בכתב בהקדם האפשרי על כל שינוי בפרטים שמסרתי לעיל.
ידוע לי כי מסירת מידע כוזב, לרבות אי-מסירת עדכון של פרט החייב בדיווח, במטרה שלא יהיה דיווח או כדי לגרום לדיווח בלתי נכון לפי סעיף 7 לחוק איסור הלבנת הון - התש"ס, מהווה עבירה פלילית. 
                                                                     
                                    </p>

                                </div>

                                <div class="gform_footer" style="margin: 0 auto;"> 
                                   <!--  <a class="button gform_button" id="btnCloseModalPopup1" > <p class="first_modal_button continue_button scr_first_modal">סיים </p></a> -->
                                   <button type="submit" class="button gform_button first_main_button" id="business_8_form" onclick="closemodel()" style="height: 60px; width: 328px;">סיים </button>
                                
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

<script>
    
    $("#myBtn3").click(function(){

       $('#myModal2').modal('show');
       
    });
    
    $("#accept-terms").change(function(){
        if($(this).is(":checked") == true && $("#checkbox").is(":checked") == true)
        {
            $("#businessSec_5_form").prop("disabled",false);
            
            $("#businessSec_5_form").css("opacity","1");
        }else{
            $("#businessSec_5_form").prop("disabled",true);
            
            $("#businessSec_5_form").css("opacity","0.5");
        }
    });
    
    
    function closemodel(){
    
       $('#myModal2').modal('hide');
    
    }
    
    $("#checkbox").change(function(){ console.log('changed');
        if($(this).is(":checked") == true && $("#accept-terms").is(":checked") == true)
        {
            $("#businessSec_5_form").prop("disabled",false);
            
            $("#businessSec_5_form").css("opacity","1");
        }else{
            $("#businessSec_5_form").prop("disabled",true);
            
            $("#businessSec_5_form").css("opacity","0.5");
        }
    });
    
</script>

<script>

function callparetiixapi(){
    
    $(".sonar-wrapper").show('fast');
    
    $("#scr_eight_form").hide('fast');


        var s = $('.bdireport').text();
        var t;
       var msg='Invalid XML entered.';
       
       console.log(s);
       
       if(s.trim()!="") {
          try { 
           t=xmlToJson(s); console.log('coverted hjson - '+t);
           if(t!="null" && t!="undefined"){
               
               
               console.log(t);
               
               $.ajax({
                url: "<?php echo site_url('BusinessThird/callparetix'); ?>",
                type: "POST",
                data: {"bdidata":t},
//                contentType: false,
//                cache: false,
//                processData: false,
                success: function (result) {
                    
                    $(".sonar-wrapper").hide('fast');
                    
                    $('#myform').submit();
                    
                },
                error: function () {
                    
                     $(".sonar-wrapper").hide('fast');
                     $('#myform').submit();
                }
            });
               
           }
           
           }catch (e) {
               $("#sonar_text").show('fast');
                $('#myform').submit();
           }
           if(!t || t=="null") {  $(".sonar-wrapper").hide('fast'); $('#myform').submit();
       }
    
    
    
       }


} 

    
</script>