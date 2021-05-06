<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<style>
    .obli-desktop {
    margin-top: 0px;
}
</style>
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

<script type="text/javascript">
   
    $(document).ready(function(){

        $(".check-box-1").click(function(){ 
            $("#box-1").prop("checked", true);
            $("#tab_a").show();
            $("#tab_b").hide();
            $(".check-box-1").css("opacity","1");
            $(".check-box-2").css("opacity","0.5");
            
            $(".gform_button").css("opacity","0.5");
        
        $(".gform_button").prop("disabled", true);
        });
        $(".check-box-2").click(function(){ 
            $("#box-2").prop("checked", true);
            $("#tab_a").hide();
            $("#tab_b").show();
            $(".check-box-2").css("opacity","1");
            $(".check-box-1").css("opacity","0.5");
            
            $(".gform_button").css("opacity","1");
        
        $(".gform_button").prop("disabled", false);
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
            

            <form method="post" enctype="multipart/form-data" id="myform" name="validate_form" action="<?php echo site_url('PrivateFlow/private_Form1'); ?>" > 

                <!-- screen 01 -->
                <div id="scr_second_form" class="gform_body">  

                   <p class="" style="text-align:center;font-weight: bold; font-size: 30px; margin:0px;">:בחרו את המסלול המועדף עליכם</p>

                    <div class="tabs">
                        <div class="">
                            <div class="row">
                                <div class="col-xl-2 section light-bg" style="margin-top:35px;">
                                    <ul class="nav nav-pills nav-stacked flex-column">


                                        <li class="box-border frb frb-default check-box-1 screen2-box1 mobile_box1 flex screen02_box-res1 coming_soon1" style="float: left; width: 48%; text-align: center;border: 1.33333px solid rgb(58, 48, 120); box-shadow: rgba(24, 33, 112, 0.2) 0px 10px 30px 0px; background: #F7F7F7; margin-top: 2px;">
                                        <a  href="#tab_a" data-toggle="pill">
                                         
                                           <img src="/website_assets/img/oblia1.svg" class="img-responsive tab_image-obli" style="height: 209px;">
                                           <span style="position: relative;top: -30px;font-size: 21.3333px;">מסלול ללא עמלה</span>

                                        </a>
                                         <div class="coming_soon">בקרוב  </div>
                                         
                                           <!--  <label for="radio-button-0" class="radio" >
                                             
                                                <input type="radio" name="radio-box" id="box-1" class="check-box-3" value="מסלול ללא עמלה" >
                                            </label> -->
                                        </li>
                         
                          
                                        <li class="box-border frb frb-default check-box-2 mobile_box2 flex screen02_box-res2" style="float: right; width: 48%; text-align: center; border: 1.33333px solid rgb(58, 48, 120); box-shadow: rgba(24, 33, 112, 0.2) 0px 10px 30px 0px; background: #F7F7F7;">
                                            <a href="#tab_b" data-toggle="pill"> 
                                           <!-- <img src="http://oblidev.malul.xyz/website_assets/img/oblib1.png" class="img-responsive tab_image-obli">מסלול ללא פיקדון</a> -->
                                           <img src="/website_assets/img/oblib1.png" class="img-responsive tab_image-obli">
                                           <span style="position: relative;top: -30px;font-size: 21.3333px;">מסלול ללא פיקדון</span>
                                           </a>

                                            <label for="radio-button-1" class="radio">
                                             
                                                <input type="radio" name="radio-box" id="box-2" checked="checked" value="מסלול ללא פיקדון" class="check-box-4" >
                                              
                                            </label>
                                        </li>


                                    </ul>
                                </div>
                                <div class="col-xl-6">
                                    
                                    <div class="tab-content">
                                        <div class="tab-pane" id="tab_a" style="margin-top: 70px;">
                                        <p style="text-align: center; font-weight: bold;direction: rtl; ">לא רוצים לשלם עמלה? </p>       
                                        <p class="rtl" style="text-align: center; margin-top: -10px;">נשמח להעניק לכם ערבות עם פקדון אך ללא עמלה. </p>
                                         <!-- <p style="text-align: center;">נשמח לספק לך הפקדה ללא פיקדון. </p> -->
                                        </div>

                                        <div class="tab-pane active rtl" id="tab_b" style="padding: 5px;
    margin-top: 27px;"> 
                                             <p style="text-align: center; font-weight: bold;"> לא רוצים להפקיד את סכום הערבות?
 </p>       
                         

	                                         <!-- <p style="text-align: center;  margin-top: -10px;">להעניק לכם ערבות ללא פיקדון נשמח תמורת עמלה של 6%.</p> -->
	                                         <p style="text-align: center;  margin-top: -10px;">נשמח להעניק לכם ערבות ללא פיקדון תמורת עמלה של 6.5%. </p>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                  <div class="gform_footer top_label" style='padding:0px; margin:0px;'> 
                        <button type="submit" class="button gform_button first_next_button screen-button-obli screen-button2-obli screen-button3-obli screen_2_buttons padding_screen02 text_size" style="margin: 0px 180px;" >המשך</button>
                    </div>

                </div>

                </div>

            </div>
                
    </form>
             
    </div>
                      
         
</div>
