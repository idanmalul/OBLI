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
/*** business_7_scr start ***/
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
@media only screen and (max-width:3000px) and (min-width: 1200px){
.modal-dialog_box{
     margin: 30px 150px;
}
}
/*** business_7_scr end ***/
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
            

             <form method="post" enctype="multipart/form-data" id="myform" name="validate_form" action="<?php echo site_url('businessFourth5'); ?>" novalidate="" >
            <!-- screen 4/5 -->
            <div id="business_7_scr" class="gform_body form_height" style="margin-top: 30px;">
                    
                            <div class="" style="float: right; margin-left:15px; margin-top:-25px;">
                            <img src="<?php echo base_url() ?>website_assets/img/progress05.png" class="img-responsive">
                           
                           </div>
                             <div class="main_text">
                    <p class="rtl main_text_heading" style="text-align:right;font-weight: bold;">בקשת ערבות  </p>
                    <p class="rtl" style="text-align:right; margin-top: -8px;">השלב הבא: מידע על החברה  </p>
                            </div>
                    
                    <br>

<?php $businessFourth3 = $this->session->userdata('businessFourth3'); if(!empty($businessFourth3)){ $req_amt = str_replace(',', '', $businessFourth3['businessFourth_requested_gur_amount']); $first_value = $req_amt*0.06; $second_value = $first_value/12; } ?>

                    <ul class="gform_fields top_label ">

                        <li class="gfield gfield_html gfield_no_follows_desc " style="margin-top: 30px;">
                           
                            <p class="contact-text_application rtl" style="text-align:center; font-weight: 600;">בחרת בערבות ללא עמלה, בהשוואה  </p>
                            <p class="contact-text_application rtl" style="text-align:center; font-weight: 600; margin-top: -14px;">לעמלה המקובלת בבנקים </p>

                           <!--  <p class="contact-text_application rtl" style="text-align:center;">תשלום החודשי יעמוד על <?php if(!empty($first_value)) echo $first_value; ?> ש”ח  </p>
                             -->
                         </li>

                    </ul>


                    <div class="modal-dialog_box" >
                        <div class="modal-content_box">
                            <div class="modal-header_box">
                               
                                <h3 class="modal-title_box rtl" id="myModalLabel">חיסכון שנתי כ-  </h3>
                            </div>
                            <div class="modal-body_box">
                                <!-- <p class="rtl" style="text-align:center;font-weight: bold;font-size: 22px;">בקשת ערבות  </p> -->

                                <p class="rtl" style="text-align:center;font-weight: bold;font-size: 52px; margin-top: 25px;"><?php if(!empty($second_value)) echo $second_value; ?> ₪  </p>
                                <!--  <p class="contact-text_application rtl" style="text-align:center; width: 92%;margin: 0 auto;">עמלת הערבות השנתית הינה 6% ותעמוד על <?php // if(!empty($first_value)) echo $first_value; ?> ₪ בשנה.  </p> -->
                              
                             

                            </div>
                           
                        </div>
                    </div>

                    <div class="row" style="margin-top:120px;" id="myBtn3">
                        <div class="col-md-3 col-sm-3"></div>
                        <div class="col-md-6 col-sm-6">
                        
                             
                            <p class="first_button-new">הצהרות הלקוח  </p>
                        </div>
                        <div class="col-md-3 col-sm-3"></div>
                    </div>

                   <div class="row" style="margin-top:10px;">
                        <div class="col-md-3 col-sm-3"></div>
                        <div class="col-md-6 col-sm-6">
                              <div class="checkbox" style="float: right;">
                                    <input id="checkbox" type="checkbox">
                                    <label for="checkbox">
                                        
                                    </label>
                                </div>
                         <p class="rtl" style="text-align:center; margin-top: 3px; margin-bottom:20px;"> קראתי ואני מסכים ל    
                         <a href="<?php echo site_url('terms'); ?>" target="_blank"><u style="color: #4EB5D7;">תנאי השימוש  </u></a>באתר  </p>
                             
                            <!--<a class="button gform_button"> <p class="first_main_button">לתשלום  </p></a>-->
                            <input type="hidden" name="test8" value="1"/>
                            <button type="submit" class="button gform_button first_main_button" id="businessFouth_5_form" style="height: 60px; width: 328px;">המשך </button>
                        </div>
                        <div class="col-md-3 col-sm-3"></div>
                    </div>

                </div>

            </form>        
  
            
            </div>

            </div>
    
    

    </div>
       
</div>
   
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
                                        <input id="checkbox4" type="checkbox" value="two" class="number">
                                        <label for="checkbox4">
                                           
                                        </label>
                                    </div>

                                    <p class="check_box_para" style="text-align: justify;"> 
                                   
                                    אני מתחייב להודיע לאובלי בכתב בהקדם האפשרי על כל שינוי בפרטים שמסרתי לעיל; ידוע לי כי מסירת מידע כוזב, לרבות אי-מסירת עדכון של פרט החייב בדיווח, במטרה שלא יהיה דיווח או כדי לגרום לדיווח בלתי נכון לפי סעיף 7 לחוק איסור הלבנת הון, התש"ס-, מהווה עבירה פלילית.
                                                                           
                                    </p>

                                </div>

                                <div class="gform_footer" style="margin: 0 auto;"> 
                                   <!--  <a class="button gform_button" id="btnCloseModalPopup1" > <p class="first_modal_button continue_button scr_first_modal">סיים </p></a> -->
                                   <button type="submit" class="button gform_button first_main_button" id="business_8_form" style="height: 60px; width: 328px;">סיים </button>
                                
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
    
</script>