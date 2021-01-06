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


<?php

 $business1 = $this->session->userdata('business1');
 
 ?>


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
            

            <form method="post" enctype="multipart/form-data" id="myform" name="validate_form" action="<?php echo site_url('business2'); ?>" >

             
                <!-- screen 01 -->
                <div id="business_1_scr" class="gform_body">  

                   <p class="" style="text-align:center;font-weight: bold; font-size: 44px;">:בחרו את המסלול המועדף עליכם</p>

                    <div class="tabs">
                        <div class="">
                            <div class="row">
                                <div class="col-xl-2 section light-bg" style="margin-top:50px;">
                                    <ul class="nav nav-pills nav-stacked flex-column">

                                        <?php if(!empty($business1) && $business1['guarantee_type'] == "ערבות לשכר דירה") { ?>

                                        <li class="box-border frb frb-default check-box-1 screen2-box1 mobile_box1 flex screen02_box-res1 coming_soon1" style="float: left; width: 48%; text-align: center; border: 1.33333px solid rgb(58, 48, 120); box-shadow: rgba(24, 33, 112, 0.2) 0px 10px 30px 0px; background: #F7F7F7;">
                                            <a  href="#tab_a" data-toggle="pill">
                                          <!--  <img src="http://oblidev.malul.xyz/website_assets/img/oblia1.png" class="img-responsive tab_image-obli" style="height: 209px;">
                                           מסלול ללא עמלה</a> -->
                                           <img src="<?php echo base_url() ?>website_assets/img/oblia1.svg" class="img-responsive tab_image-obli" style="height: 209px;width: 110px;">
                                           <span style="position: relative;top: -30px;font-size: 21.3333px;">
                                           מסלול ללא עמלה</span>
                                            </a>

                                            <div class="coming_soon">בקרוב  </div>

                                           <!--  <label for="radio-button-0" class="radio" >
                                             
                                                <input type="radio" name="preferred_route" id="box-1" class="check-box-3" value="מסלול ללא עמלה">
                                            </label> -->
                                        </li>
                                        
                                         <?php }else{ ?>
                                        
                                        <li class="box-border frb frb-default check-box-1 screen2-box1 mobile_box1 flex screen02_box-res1" style="float: left; width: 48%; text-align: center; border: 1.33333px solid rgb(58, 48, 120); box-shadow: rgba(24, 33, 112, 0.2) 0px 10px 30px 0px; background: #F7F7F7;">
                                            <a  href="#tab_a" data-toggle="pill">
                                          <!--  <img src="http://oblidev.malul.xyz/website_assets/img/oblia1.png" class="img-responsive tab_image-obli" style="height: 209px;">
                                           מסלול ללא עמלה</a> -->
                                           <img src="<?php echo base_url() ?>website_assets/img/oblia1.svg" class="img-responsive tab_image-obli" style="height: 209px;width: 110px;">
                                           <span style="position: relative;top: -30px;font-size: 21.3333px;">
                                           מסלול ללא עמלה</span>
                                            </a>

                                             <div class="coming_soon">בקרוב  </div>

                                            <label for="radio-button-0" class="radio" >
                                             
                                                <!--<input type="radio" name="preferred_route" id="box-1" class="check-box-3" value="מסלול ללא עמלה">-->
                                            </label>
                                        </li>
                                        
                                         <?php } ?>
                         
                          
                                        <li class="box-border frb frb-default check-box-2 mobile_box2 flex screen02_box-res2" style="float: right; width: 48%; text-align: center; border: 1.33333px solid rgb(58, 48, 120); box-shadow: rgba(24, 33, 112, 0.2) 0px 10px 30px 0px;background: #F7F7F7;" >
                                            <a href="#tab_b" data-toggle="pill"> 
                                           <!-- <img src="http://oblidev.malul.xyz/website_assets/img/oblib1.png" class="img-responsive tab_image-obli">מסלול ללא פיקדון</a> -->
                                           <img src="<?php echo base_url() ?>website_assets/img/oblib1.svg" class="img-responsive tab_image-obli">
                                           <span style="position: relative;top: -30px;font-size: 21.3333px;">מסלול ללא פיקדון</span>
                                           </a>

                                            <label for="radio-button-1" class="radio">
                                             
                                             <input type="radio" name="preferred_route" id="box-2" checked="checked" class="check-box-4" value="מסלול ללא פיקדון">
                                              
                                            </label>
                                        </li>


                                    </ul>
                                </div>
                                <div class="col-xl-6">
                                    
                                    <div class="tab-content">
                                        <div class="tab-pane rtl" id="tab_a" style="margin-top: 50px;">
                                        <p style="text-align: center; font-weight: bold;">לא רוצים לשלם עמלה?</p>     

                                        <p style="text-align: center;  margin-top: -10px;">נשמח להעניק לכם ערבות עם פקדון אך ללא עמלה.</p>
                                         <!-- <p style="text-align: center;">נשמח לספק לך הפקדה ללא פיקדון. </p> -->
                                        </div>

                                        <div class="tab-pane active rtl" id="tab_b" style="padding: 20px; margin-top: 30px;"> 
                                             <p style="text-align: center; font-weight: bold;">מתקשים לגייס את סכום הערבות?  </p>       
                                           
                                             <!-- <p style="text-align: center; margin-top: -10px;">נשמח להעניק לכם ערבות ללא פיקדון תמורת עמלה של 6%</p> -->
                                             <p style="text-align: center;  margin-top: -10px;">נשמח להעניק לכם ערבות ללא פיקדון תמורת עמלה של 6%. </p>


                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                  <div class="gform_footer top_label"> 
                        
                        <!-- <a class="button gform_button next"> <p class="first_next_button screen-button-obli screen-button2-obli screen-button3-obli screen_2_buttons padding_screen02 text_size" style="margin: 0px 180px;">המשך </p></a> -->

                        <button type="submit" class="button gform_button next first_next_button screen-button-obli screen-button2-obli screen-button3-obli screen_2_buttons padding_screen02 text_size" style="margin: 0px 180px;">המשך</button>
                    </div>

                </div>

              </div>

            </div>
    
    </form>

    </div>
                      
         
        </div>
    </div>
</div>
