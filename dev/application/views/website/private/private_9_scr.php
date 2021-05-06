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

.spantext{ 
  font-size: 38px;
 }
/*** responsive_doc end =header ***/

</style>

<script type="text/javascript">
   
    $(document).ready(function(){

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
            
             <!--<form method="post" enctype="multipart/form-data" id="myform" name="validate_form" action="<?php // echo site_url('private10/'.base64_encode($this->session->userdata('url_user_document')).'/'. base64_encode('satendra.tectum@gmail.com')); ?>" novalidate="" > -->
             
             
             <form method="post" enctype="multipart/form-data" id="myform" name="validate_form" action="<?php echo site_url('private9'); ?>" novalidate="" > 

                
                <!-- Last screen in private flow -->

                 <div id="scr_ten_form" class="gform_body form_height1" style="margin-top: 30px;">
                         
                 <div class="" style="float: right; margin-left:15px; margin-top:-25px;">
                            <img src="<?php echo base_url() ?>website_assets/img/progress08.png" class="img-responsive">
                           
                           </div>
                    
                    <p class="rtl" style="text-align:right;font-weight: bold;font-size: 38px;">מזל טוב <span id="spantext" class="spantext"> </span>, בקשתך אושרה!</p>
                  
                    <div class="row">
                     <!--   <div class="col-md-3 col-sm-3"></div> -->
                       <div class="col-md-12 col-sm-12">
                        <ul class="gform_fields top_label ">

                        <li class="gfield gfield_html gfield_no_follows_desc " style="margin-top: 30px;">
                           
                            <p class="contact-text_application rtl" style="text-align:center;">לביצוע התשלום, כעת עליך להתקשר ממספר הטלפון הנייד שהזנת במערכת</p>

                            <p class="contact-text_application rtl" style="text-align:center; font-weight: 600;">טלפון: <span style="color: #4eb5d7; font-size: 22px;">072-2214966</span></p>
                            <p class="contact-text_application rtl" style="text-align:center; font-weight: 600; margin-top:-20px;">שלוחה  2</p>

                         </li>

                       </ul>

                            <div style="padding: 40px 70px 0; height: 220px;">
                              <img src="<?php echo base_url() ?>website_assets/img/phone 1.svg" class="img-responsive" style="margin: 0 auto;">
                           
                           </div> 

                            <p class="contact-text_application rtl" style="text-align:center; font-weight: 600;">זהו סיימנו, עם קבלת התשלום תועבר אליך הערבות לדואר האלקטרוני שלך.
                            </p>
                            <p class="contact-text_application rtl" style="text-align:center; font-weight: 600; margin-top:-20px;">
                            שמחים שבחרת בנו!</p>

                             <p class="contact-text_application rtl" style="text-align:center; ">לשאלות, הערות או למחמאות, נשמח לשוחח אתך.</p>
                         
                       </div>
                       <!-- <div class="col-md-3 col-sm-3"></div> -->
                   </div>
                  
                    <br>
                    <div class="row">
                        <div class="col-md-3 col-sm-3"></div>
                        <div class="col-md-6 col-sm-6">
           
                         <!--<a class="button gform_button" href="<?php //echo site_url('private10/'.base64_encode($this->session->userdata('url_user_document')).'/'. base64_encode('satendra.tectum@gmail.com')); ?>">-->
                            
                        <a class="button gform_button" href="<?php echo site_url('website'); ?>">
                         <!-- <p class="first_next_button screen-button-obli screen-button2-obli screen-button3-obli padding_screen02 text_size" style="font-weight: 600;">חזור לדף הבית  </p></a> -->
                          <p class="first_next_button screen-button-obli screen-button2-obli screen-button3-obli padding_screen02 text_size" style="font-weight: 600;"> סיים </p></a>
                         
                         <!--<button type="submit" class="first_next_button screen-button-obli screen-button2-obli screen-button3-obli padding_screen02 text_size" id="private_8_form" >המשך </button>-->
                         
                        </div>
                        <div class="col-md-3 col-sm-3"></div>
                    </div>
                    <br><br><br>

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
