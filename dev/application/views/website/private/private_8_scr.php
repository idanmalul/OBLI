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

/*iframe css*/
@media only screen and (max-width:3000px) and (min-width: 992px){
.map_iframe{
   width: 1050px;
    margin-right: -200px;
 }
.iframe_height{
    height: 500px;
}
}

.spantext{ 
  font-size: 22px;
 }
/*end*/

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
            
             <form method="post" enctype="multipart/form-data" id="myform" name="validate_form" action="<?php echo site_url('private8'); ?>" novalidate="" > 

                
                <!-- Iframe url screen -->

                 <div id="scr_nine_form" class="gform_body form_height1" style="margin-top: 30px;">
                   
                            <div class="" style="float: right; margin-left:15px; margin-top:-25px;">
                            <img src="<?php echo base_url() ?>website_assets/img/progress5.png" class="img-responsive">
                           
                           </div>
                         <div class="main_text">
                                <!-- <p class="rtl" style="text-align:right;font-weight: bold;font-size: 38px;">קבלת ערבות  </p> -->
                                <p class="rtl main_text_heading" style="text-align:right;font-weight: bold;">תשלום  </p>

                                <p class="rtl" style="text-align:right; margin-top: -8px;">השלב האחרון </p>

                         </div>
                          <li class="gfield gfield_html gfield_no_follows_desc " style="">
                          <!--   <p class="contact-text_application" style="text-align:right;">הערבות, נזדקק לפרטים הבאים: מזל טוב דני! בקשתך לערבות ללא פיקדון אושרה! כדי להשלים את התהליך ולקבל את </p> -->
                             <p class="contact-text_application rtl" style="text-align:right;">מזל טוב  <span id="spantext" class="spantext"> </span>! בקשתך לערבות ללא פיקדון אושרה! כדי להשלים את התהליך ולקבל את  הערבות, נזדקק לפרטים הבאים: </p>

                         </li>

                    <!-- <p class="rtl" style="text-align:right; margin-top: 30px;">כאן נבצע את השארת פרטי האשראי  </p> -->
                   
                    <div class="row map_iframe" style="margin-top: 50px;">
                        <div class="col-md-12 col-sm-12">
                          <div class=""><iframe class="iframe_height" width="100%" height="100%"  src="<?php if(!empty($this->session->userdata('private_payment_api_link'))){ echo $this->session->userdata('private_payment_api_link'); } ?>"></iframe></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 col-sm-3"></div>
                        <div class="col-md-6 col-sm-6">
                            <!-- <div class="screen5_box"></div> -->
                            <!-- <div class=""><iframe width="600" height="500"  src="https://tarya.orange.tarya.co.il/app/tarya-pay/loan-amount-and-number-of-payments?token=0c038ccc7ad543b28dffad9c74ef7b48"></iframe></div> -->
                            
                            
                        </div>
                        <div class="col-md-3 col-sm-3"></div>
                    </div>
                    <p class="rtl" style="text-align:center">רצינו שתדע, כי רק לאחר קבלת שטר  </p>
                    <p class="rtl" style="text-align:center; margin-top: -8px;">הערבות יחויב כרטיס האשראי שלך  </p>

                    <br>
                    <div class="row">
                        <div class="col-md-3 col-sm-3"></div>
                        <div class="col-md-6 col-sm-6">
           
<!--                            <a class="button gform_button next">
                            <p class="first_next_button screen-button-obli screen-button2-obli screen-button3-obli padding_screen02 text_size">המשך </p></a>-->
                            
                            <input type="hidden" name="private8" >
                            
<!--                            <button type="submit" class="first_next_button screen-button-obli screen-button2-obli screen-button3-obli padding_screen02 text_size" id="private_8_form" >המשך </button>-->
                            
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
