<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

<!-- calendar start -->

 <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" /> 
<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" /> -->


<script type="text/javascript" src="<?php echo base_url();?>website_assets/js/jquery.validate.min.js"></script>

<script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
<link rel="stylesheet" href="<?php echo base_url() ?>website_assets/css/business_style.css" type="text/css" media="all">

<!-- date of birth picker -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!-- // <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<style type="text/css">
.sonar-wrapper{
  display: none;
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
    /*width: 100%;*/
    height: 60px;
    cursor: pointer;
    width: 328px;

}

#sec_scr_checkbox1, #sec_scr_checkbox2, #sec_scr_checkbox3{
    display: none;
}

.checkbox label::before{
    background-color: #4EB5D7;
    border: none !important;
} 
.checkbox-primary input[type="checkbox"]:checked + label::before{
    background-color: #4EB5D7;
    border: none !important;
} 
        
</style>

<style type="text/css">
.daterangepicker td.active, .daterangepicker td.active:hover{
    background-image: linear-gradient(to top, #31739b, #53c2e4);
}    
.applyBtn{
     background-image: linear-gradient(to top, #31739b, #53c2e4);
     border:none;
}
.daterangepicker .calendar-time{
    display: none;
}

/*new text button size */
.text_size{
    font-weight: bold;
    font-size: 22px;
    /*line-height: 29px;*/
}
.checkbox label::after{
    padding-left: 5px;
}  
.span_text{
    font-size: 20px;
}
</style>
<!-- calendar end -->

<script type="text/javascript">
    

    $(function() {

        var date = new Date();

        date.setMonth(date.getMonth() + 19);

        date.setDate(date.getDate() - 1);

        var enddate = new Date();

        enddate.setMonth(enddate.getMonth() + 13);

        enddate.setDate(enddate.getDate() - 1);

      $('input[name="gur_period_month"]').daterangepicker({
          // autoUpdateInput: false,
          // locale: {
          //     cancelLabel: 'Clear'
          // }

          endDate: enddate.getMonth()+'/'+enddate.getDate()+'/'+enddate.getFullYear(),
          
          minDate: new Date(),

          maxDate: date.getMonth()+'/'+date.getDate()+'/'+date.getFullYear(),
          
          linkedCalendars : false,
             "locale": {
                "format": "MM/DD/YYYY",
                "separator": " - ",
                "applyLabel": "להגיש מועמדות ",
                "cancelLabel": "לבטל ",
                "fromLabel": "מ ",
                "toLabel": "ל ",
                "customRangeLabel": "Custom",
                "daysOfWeek": [
                "ראשון",
                "שני",
                "שלישי",
                "רביעי",
                "חמישי",
                "שישי",
                "שבת"
                ],
                "monthNames": [
                "ינו",
                "פבר",
                "מרץ",
                "אפר",
                "מאי",
                "יוני",
        "יולי",
        "אוג",
        "ספט",
        "אוק",
        "נוב",
        "דצמ"
        ],
                "firstDay": 1
            }
      });

      $('input[name="gur_period_month"]').on('apply.daterangepicker', function(ev, picker) {

          $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));

          var startDate = picker.startDate.format('YYYY-MM-DD');
          var endDate = picker.endDate.format('YYYY-MM-DD');
          // alert(startDate); alert(endDate);

          $('#startDate').val(startDate);
          $('#endDate').val(endDate);
          // alert($("#gur_period_month").val());

            // check only button disabled
            if($("#businessFourth_requested_gur_amount").val() != '' && $("#gur_period_month").val() != ''){
                // alert(1);
                    $("#businessFouth_3_form").css("opacity","1"); // button opacity change
                    $("#businessFouth_3_form").css("cursor","pointer");
                    $("#businessFouth_3_form").prop("disabled", false);
                
            }else{ 
                // alert(2);
                $("#businessFouth_3_form").css("opacity","0.5"); // button opacity change
                $("#businessFouth_3_form").css("cursor","auto");
                $("#businessFouth_3_form").prop("disabled", true);
            }
      });

      $('input[name="gur_period_month"]').on('cancel.daterangepicker', function(ev, picker) {
          $(this).val('');
      });

      

      

      
    });
</script>

<script type="text/javascript">

        $(document).ready(function(){

            $("#businessFouth_3_form").css("opacity","0.5");
            $("#businessFouth_3_form").css("cursor","auto");
            $("#businessFouth_3_form").prop("disabled", true);

            var ratio =  Math.max(window.devicePixelRatio || 1, 1);

            // This part causes the canvas to be cleared
            canvas1.width = '416';
            canvas1.height = '147';

            canvas2.width = '416';
            canvas2.height = '147';

            $("#businessFouth_3_form").click(function(){

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
                        businessFourth_requested_gur_amount: {
                            required: true,
                            money: true,
                            min: 100,
                            max: 100000
                        },
                        gur_period_month: {
                            required: true,
                        }
                    },
                    messages: {
                        businessFourth_requested_gur_amount: {
                            required: "שדה חובה",
                            money: "אנא הזן את המספר",
                            min: "אנא הכנס את ערך הסכום 100 עד 100000",
                            max: "אנא הכנס את ערך הסכום 100 עד 100000"

                        },
                        gur_period_month: {
                            required: "שדה חובה",
                        }
                    }
                    
                });

                if (form.valid() === true){

//                    gurant_amm = $("#businessFourth_requested_gur_amount").val();
//
//                        $('#messageModal').modal('show');
//                        return false;

                  closeMessageModal();
                    
                }
                else{
                    // $('.submit').css('opacity', '0.5');
                }

                if($("#businessFourth_requested_gur_amount").val() != '' && $("#gur_period_month").val() != ''){

                    $("#businessFouth_3_form").css("opacity","1");
                    $("#businessFouth_3_form").css("cursor","pointer");
                    $("#businessFouth_3_form").prop("disabled", false);

                }else{

                    $("#businessFouth_3_form").css("opacity","0.5");
                    $("#businessFouth_3_form").css("cursor","auto");
                    $("#businessFouth_3_form").prop("disabled", true);
                }
            });


            // second form  
            $('#businessFourth_requested_gur_amount').on('keyup', function() {

                if($("#businessFourth_requested_gur_amount").val() != '' && $("#gur_period_month").val() != '' ){

                    $("#businessFouth_3_form").css("opacity","1");
                    $("#businessFouth_3_form").css("cursor","pointer");
                    $("#businessFouth_3_form").prop("disabled", false);

                }
                else{
                    $("#businessFouth_3_form").css("opacity","0.5");
                    $("#businessFouth_3_form").css("cursor","auto");
                    $("#businessFouth_3_form").prop("disabled", true);
                }

              
            });


            // first modal
            $("#myBtn1").click(function(){

                 // show Modal
                 $('#myModal1').modal('show');
                 // $(".scr_first_modal").css("opacity","0.5");                 
            });


            // second modal
            $("#myBtn2").click(function(){

                 // show Modal
                $('#myModal2').modal('show');
                $('#modal2Div').show('fast');
                $('#signature-pad-2').hide('fast');
                $('#btnCloseModalPopup3').hide('fast');
                $('#btnCloseModalPopup2').show('fast');
                $('#signature-pad-1').show('fast');
                $('#modal3Div').hide('fast');

                // popup dynamic js 
                var firstName = '<?php if(!empty($this->session->userdata("businessFouth1"))){ $businessFouth1 = $this->session->userdata("businessFouth1");  echo $businessFouth1["first_name"]; } ?>';
                var lastName = '<?php if(!empty($this->session->userdata("businessFouth1"))){ $businessFouth1 = $this->session->userdata("businessFouth1");  echo $businessFouth1["last_name"]; } ?>';
                var client_id = '<?php if(!empty($this->session->userdata("businessFouth1"))){ $businessFouth1 = $this->session->userdata("businessFouth1");  echo $businessFouth1["unique_id"]; } ?>';
                $('#fullName').html(firstName+' '+lastName);
                $('#clientId').html(client_id);
                $('#nextfullName').html(firstName+' '+lastName);

            });

            // Third button for modal
            $("#myBtn3").click(function(){

                $('#myModal2').modal('show');
                $('#modal2Div').hide('fast');
                $('#modal3Div').show('fast');
                $('#signature-pad-1').hide('fast');
                $('#btnCloseModalPopup2').hide('fast');
                $('#btnCloseModalPopup3').show('fast');
                $('#signature-pad-2').show('fast');
                // $(".scr_sec_modal").css("opacity","1");
                // $(".scr_sec_modal").css("cursor","pointer");

                
                // popup dynamic js  
                var firstName = '<?php if(!empty($this->session->userdata("businessFourth1"))){ $businessFourth1 = $this->session->userdata("businessFourth1");  echo $businessFourth1["first_name"]; } ?>';
                var lastName = '<?php if(!empty($this->session->userdata("businessFourth1"))){ $businessFourth1 = $this->session->userdata("businessFourth1");  echo $businessFourth1["last_name"]; } ?>';
                var clientAdd = '<?php if(!empty($this->session->userdata("businessFourth1"))){ $businessFourth1 = $this->session->userdata("businessFourth1");  echo $businessFourth1["home_no"].", ".$businessFourth1["hometown"].", ".$businessFourth1["street"]; } ?>';
                
                var orderIdNumber = '<?php if(!empty($this->session->userdata("order_id_number"))){ $order_id_number = $this->session->userdata("order_id_number");  echo $order_id_number; } ?>';
                
                var cAmount = $('#businessFourth_requested_gur_amount').val();
                
                $('#next1fullName').html(firstName+' '+lastName);
                $('#clientAmount').html(cAmount);
                $('#address').html(clientAdd);
                $('#orderIdNumber').html(orderIdNumber);

            });
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
            

            <form method="post" enctype="multipart/form-data" id="myform" name="validate_form" action="<?php echo site_url('businessFourth3'); ?>" novalidate >

            <!-- message modal -->
            <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel"><b> נדרש ערב נוסף  </b></h4>
                    </div>
                    <div class="modal-body">
                        
                     <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10 rtl" style="text-align: right;">
                           
                           <p class="check_box_para" style="margin-top: 30px;">

                               שים לב! ערבות בין הסכומים 50,001  ש”ח עד 100,000 ש”ח דורשת ערב נוסף
                           </p><p>

                        </p></div>

                        <div class="gform_footer" style="margin: 0 auto;"> 
                            <a class="button gform_button" onclick="closeMessageModal()"> <p class="first_modal_button continue_button scr_first_modal">המשך </p></a>
                        
                        </div>

                        <div class="col-md-1"></div>
                    </div>

                    </div>
                   
                </div>
                </div>
            </div>
            <!-- end message modal -->

                <!-- First Modal -->
                <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel"><b>הסכמה למסירת נתוני אשראי  </b></h4>
                            </div>
                            <div class="modal-body">
                                
                             <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10 rtl" style="text-align: right;">
                                   
                                    <p>

                                        <div class="checkbox checkbox-danger check_box_popup0">
                                            <input id="checkbox3" type="checkbox" value="one" class="number">
                                            <label for="checkbox3">
                                                
                                            </label>
                                        </div>
                                        
                                     <!--  <input class="check_box_popup1" type="checkbox">  -->
                                    
                                      </p>
                                    
                                    <p class="check_box_para">

                                        <b>אני מבין כי טריא אינה מאפשרת לקחת הלוואה עבור אחרים ואני מצהיר בזה כי אני מבקש

                                            לקבל הלוואה בעבור עצמי בלבד.  </b>

                                            <br> <br>

                                             אני מתחייב להודיע לטריא בכתב בהקדם האפשרי על כל שינוי בפרטים שמסרתי לעיל; ידוע לי כי מסירת  מידע כוזב, לרבות אי-מסירת עדכון של פרט החייב בדיווח, במטרה שלא יהיה דיווח או כדי לגרום לדיווח  בלתי נכון לפי סעיף 7 לחוק איסור הלבנת הון, התש"ס-, מהווה עבירה פלילית.

                                   

                                    <p>
                                        
                                    <div class="checkbox checkbox-info check_box_popup00">
                                        <input id="checkbox4" type="checkbox" value="two" class="number">
                                        <label for="checkbox4">
                                           
                                        </label>
                                    </div>

                                    <p class="check_box_para">לצורך בדיקת הבקשה, אנחנו מתכוונים לפנות ללשכת אשראי על מנת לקבל חיווי אשראי. מובהר בזאת  שלצורך קבלת החיווי לשכת האשראי תגיש בקשה לבנק ישראל לקבלת נתוני אשראי לגביך הכלולים  במאגר.

                                        הפנייה ללשכת אשראי לצורך קבלת חיווי הינה בכל מקרה של בקשה לקבלת הלוואה באמצעות טריא.
                                    </p>

                                </p>

                                </div>

                                <div class="gform_footer" style="margin: 0 auto;"> 
                                    <a class="button gform_button" id="btnCloseModalPopup1" > <p class="first_modal_button continue_button scr_first_modal">המשך למסמך הבא  </p></a>
                                
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

                <!-- Second Modal -->
                <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel"><b>הסכם שיפוי חברה  </b></h4>
                            </div>
                            <div class="modal-body">
                                
                             <div class="row">
                                <div class="col-md-1"></div>

                                <!-- modal 2 -->
                                <div class="col-md-10 rtl" id="modal2Div" style="text-align: right;">
                                    
                                    <p style="margin: 10px 0px 0px 0px;">אני, החתום מטה, <span id="fullName" class="span_text"></span> בעל ת.ז. מס' <span id="clientId" class="span_text"></span>, חברה אובלי,  מאשר ומצהיר כמפורט להלן:   <br>1.    ידוע לי  כי תשלום העמלה לגולדנרוד פיננסים בע"מ, ח.פ. 513578674 (להלן: "גולדנרוד") בגין העמדת  הערבות (להלן: "העמלה") באמצעות הלוואה זו ומימון העמלה בדרך של קבלת הלוואה באמצעות טריא פי2פי   בע"מ (ח.פ. 515024131 )  או טריא קהילה פיננסית בע"מ (ח.פ. 515928034) (שתי החברות יקראו להלן: "טריא") הן עסקאות נפרדות. <br>

                                     2. אני מצהיר ומאשר שסכום ההלוואה יועבר במישרין  לגולדנרוד ובחתימתי על נספח זה אני מסכים לכל תנאי  ההלוואה וכן לכל תנאי האתר שבאמצעותו אקבל את ההלוואה ואני מורה לטריא להעביר את סכום ההלוואה  כאמור. 

                                     <br>

                                     3.  אני מאשר שידוע לי שטריא אינה שותפה או ערבה בצורה כלשהי לעסקי גולדנרוד, ואינה צד לעסקה זו, ולפיכך טענות הנוגעות לעמלה או טענות אחרות שעלולות להיות לי כלפי, לרבות בקשר עם העמלה, לא יהוו   עילה לאי תשלום ההלוואה ולא יפטרו אותי מתשלום החזרי ההלוואה לטריא. 

                                    </p>

                                      <p style="margin: 30px 40px 0px 0px;text-align: center;">

                                        <b>שם החברה:  </b><span id="nextfullName" class="span_text"></span> <b>חתימה דיגיטלית:  </b>
                                      </p>
                                </div>

                                <!-- modal 3 -->


                                 <div class="col-md-10 rtl" id="modal3Div" style="text-align: right;">
                                   
                                 <p style="margin: 10px 0px 0px 0px;">
                                 
                                    שנערך ונחתם ב <?php echo date('F d, Y'); ?>
                                 
                                   <br>

                                   <br>

                                
                                   בין      גולדנרוד  בע"מ ח.פ. 513578674 (להלן: "הערב")

                                   <br>
                                     

                                   מרח' יד חרוצים 12 , תל אביב <br>
                            
                                     לבין <span id="next1fullName" class="span_text"></span>
                                    <br>
                                   
                                   
                                   <span id="address" class="span_text"></span>
                                     <br>
                                   <br><b>הואיל </b>

                                  ה והערב עוסקת במתן שירותי אשראי והינה בעלת רישיון למתן אשראי כהגדרתו בחוק הפיקוח על שירותים  

                                  פיננסיים (שירותים פיננסיים מוסדיים), התשע"ו-2016;  <br><b>והואיל </b>

                                  והערב הנפיקה ללקוח, לבקשתו, כתב ערבות שמספרו <b><span id="orderIdNumber" class="span_text"></span></b> (להלן: "כתב הערבות"), לטובת   

                                    <b>המוטב</b>, על סך <b><span id="clientAmount" class="span_text"></span></b> ₪ (להלן: "סכום הערבות"), המצורף בזאת כנספח א' להסכם זה;  <br><b>והואיל </b>

                                     וברצון הצדדים להגדיר ולהסדיר את החובות אשר יחולו עליהם בקשר עם חילוט כתב הערבות ע"י  

                                     המוטב. <br>

                                     <br>

                                     לפיכך הוסכם, הוצהר והותנה בין הצדדים כדלקמן: <br>

                                    <b> 1. מבוא ונספחים  </b><br>

                                     1.1.   המבוא להסכם וכן כל הנספחים המצורפים להסכם מהווים חלק בלתי נפרד הימנו (להלן: "ההסכם").  <br>

                                     1.2.   כותרות הסעיפים נועדו לצורך הנוחיות בלבד ואין לפרש תנאי מתנאי ההסכם לפיהן. <br>

                                     1.3.   הצדדים מצהירים כי אין עליהם כל הגבלה, בין בהסכם, בין על פי דין ובין בכל אופן אחר, המונעת מכל אחד  

                                    מהם או מגבילה אותם מלהתקשר בהסכם זה ולמלא את הוראותיו. <br>

                                    <b> 2.  ההתקשרות  </b><br>

                                     2.1.   במסגרת ההתקשרות הכללית בין הצדדים, הערב הנפיקה ללקוח כתב ערבות, אשר פרטיו מפורטים   

                                   במבוא להסכם זה, לטובתו של  המוטב, בו התחייבה להעביר לידי  המוטב את סכום הערבות במקרה שבו יבקש   

                                   המוטב לממש את כתב הערבות. <br>

                                    2.2. במקרה של מימוש כתב הערבות ע"י  המוטב, מכל סיבה שהיא, החייב ישלם לחברה כל סכום אותו תידרש  

                                   הערב לשלם למוטב. עבור כל יום איחור בתשלום סכום הערבות לחברה, ישלם החייב ריבית שנתית בגובה של  

                                    <b>6</b>% מסכום הערבות.  <br>

                                    2.3.   במקרה של מימוש כתב הערבות ע"י  המוטב, יוכל החייב, על פי שיקול דעתו, להשתמש בהפניית הערב   

                                   לקבלת הלוואה דרך חברת טריא בריבית שנתית קבועה של 6%. ההלוואה תעמוד לתקופה של 18 חודשים. 

                                   הענקת ההלוואה כפופה לאישור חיתום   הלקוח בטריא.  <br>

                                    2.4.    במקרה של אי קיום התחייבויות הלקוחה מצדה כאמור בהסכם, הערב/ה ללקוחה (כמוגדר בנספח ב'
                                    להסכם) מתחייב/ת באופן אישי ובלתי חוזר, לשלם במקום החייבת, כל תשלום לו יידרש, בהתאם למוסכם תחת
                                    ס
                                    עיף זה.  <br>

                                      2.5     במקרה של שני ערבים לחייב החתומים כנגד שטר הערבות, כל אחד מהם יחויב להעביר לידי הערב את
                                    מלוא סכום הערבות כמפורט בסעיף 2.2 , וזאת במקרה זה לא יוכלו החייבים לקבל הפנייה לקבלת הלוואה ו/או
                                    ל
                                    א יעמדו בבדיקת הלקוח אותה תבצע טריא.  <br>


                                   

                                   <b> 3.   תקופת ההסכם  </b><br>

                                    3.1.    הסכם זה יעמוד בתוקפו החל מיום האמור לעיל ויסתיים במוקדם מבין:  <br>

                                    (א) מועד סיום תקופת הערבות, הכוללת גם תקופה של חידוש ו/או הארכת הערבות;  <br>

                                    (ב) מועד קבלת מלוא סכום הערבות אשר הועבר למוטב ע"י הערב במסגרת חילוט הערבות.  <br>

                                   <b> 4.  מצגים  </b><br>

                                   הלקוח מצהיר בזאת, כדלקמן: <br>

                                    4.1. הוא בעל האמצעים הכלכליים לשיפוי הערב בכל סכום הערבות כשהוא צמוד מדד בערכיו המשוערכים  <br>

                                    4.2.   לא התקבלה החלטה על פירוקה מרצון ו/או לא התחיל הליך פירוק החברה מרצון, כמשמעותם בחוק
                                        ה
                                        חברות, תשנ"ט 1999- [נוסח מלא ומעודכן].  <br>

                                    4.3. לא מתקיימים לגביה הליכי חדלות פירעון כמשמעותם בסעיף 2 לחוק חדלות פירעון ושיקום כלכלי,
                                    ת
                                    שע"ח 2018- [נוסח מלא ומעודכן].  <br>

                                    <!-- 4.4.    הוא אינו מוכר כחייב אשר חשבונו הוגבל .......עפ"י סעיף 2 לחוק חוק שיקים ללא כיסוי, תשמ"א...- 

                                    ו/או אינו הוגדר כלקוח מוגבל חמור.בהתאם לסעיף 3 ...   <br> -->

                                    4.4.    ספרי הערב ישמשו כראייה לסכום חובו לחברה. <br>

                                   <b> 5.  התחייבויות הלקוח  </b><br>

                                    5.1.    הלקוח יידע את הערב אם אחד מהמצגים המנויים מעלה יחדול מלהתקיים במהלך תקופת ההסכם.  <br>

                                    5.2.   הלקוח ישלם לחברה, לפי דרישתה הראשונה, את מלוא סכום הערבות אותו העבירה למוטב, וזאת תוך 7 

                                    ימים ממועד העברת סכום הערבות למוטב. <br>

                                    5.3.    הלקוח יפצה ו/או ישפה את הערב, לפי דרישתה הראשונה, בגין כל סכום ו/או הוצאה מכל סוג שהוא שתהיה   

                                   לחברה, במישרין ובעקיפין, בקשר עם גביית סכום הערבות מהלקוח.  <br>

                                     5.4.    במקרה של אי קיום התחייבויות הלקוחה כאמור לעיל, הערב/ה ללקוחה מתחייב/ת באופן אישי ובלתי
                                    ח
                                    וזר, לשלם במקום החייבת, כל תשלום לו יידרש, בהתאם לתנאים המוסכמים תחת סעיף זה.


                                   <b> 6.   כללי  </b><br>

                                    6.1.    הדין הישראלי יחול באופן בלעדי על הסכם זה, וסמכות השיפוט הבלעדית בכל הקשור להסכם זה תהיה   

                                   מסורה לבתי המשפט המוסמכים בתל אביב. <br>

                                    6.2.    אם ייקבע ע"י ערכאה מסוימת כי הוראה מהוראות הסכם זה אינה ניתנת לאכיפה ו/או הינה חסרת תוקף  

                                   מטעם כלשהו, לא יהא בכך כדי לפגום ו/או לבטל את תוקפן של יתר הוראות ההסכם.  <br>

                                    6.3.   הודעה שתישלח על פי כתובות הצדדים במבוא להסכם זה בדואר רשום, תיחשב כאילו הגיעה לצד שכנגד   

                                    ולידיעתו תוך 3 ימים מיום שיגורה בדואר רשום מבית דואר בישראל ואם נמסרה ביד – בעת מסירתה, ואם  

                                   שוגרה בפקס או בדוא"ל – תוך 24 שעות ממועד שיגורה.  <br>
                                    <p style="margin: 10px 40px -40px 0px;text-align: center;"> <b>חתימה דיגיטלית: </b></p>

                                   </p>

                                    <br>

                                    <p>

                                </div>

                              

                               <!--  <div class="col-md-10 rtl" id="modal3Div" style="text-align: right;">
                                   
                                    <p style="margin: 10px 0px 0px 0px;">


                                   שנערך ונחתם <?php echo date('F d, Y'); ?>

                                   <br>

                                   <br>

                                   בין      גולדנרוד  בע"מ ח.פ. 513578674 (להלן: "הערב")

                                   <br>

                                   מרח' יד חרוצים 12, תל אביב  <br>

                                   לבין  <span id="next1fullName" class="span_text"></span> <br>

                                   <span id="address" class="span_text"></span>  <br>

                                   <br>

                                  הואיל והערב עוסקת במתן שירותי אשראי והינה בעלת רישיון למתן אשראי כהגדרתו בחוק הפיקוח על שירותים  <br>

                                  פיננסיים (שירותים פיננסיים מוסדיים), התשע"ו2016-;  <br>

                                   והואיל   והערב הנפיקה ללקוח, לבקשתו, כתב ערבות שמספרו <b>1125469877</b> (להלן: "כתב הערבות"), לטובת   <br>

                                    <b>המוטב</b>, על סך <b><span id="clientAmount" class="span_text"></span></b> ₪ (להלן: "סכום הערבות"), המצורף בזאת כנספח א' להסכם זה;  <br>

                                     והואיל וברצון הצדדים להגדיר ולהסדיר את החובות אשר יחולו עליהם בקשר עם חילוט כתב הערבות ע"י  <br>

                                     המוטב. <br>

                                     <br>

                                     לפיכך הוסכם, הוצהר והותנה בין הצדדים כדלקמן: <br>

                                    <b> 1. מבוא ונספחים  </b><br>

                                     1.1.   המבוא להסכם וכן כל הנספחים המצורפים להסכם מהווים חלק בלתי נפרד הימנו.  <br>

                                     2.1.   כותרות הסעיפים נועדו לצורך הנוחיות בלבד ואין לפרש תנאי מתנאי ההסכם לפיהן. <br>

                                     3.1.   הצדדים מצהירים כי אין עליהם כל הגבלה, בין בהסכם, בין על פי דין ובין בכל אופן אחר, המונעת מכל אחד  <br>

                                    מהם או מגבילה אותם מלהתקשר בהסכם זה ולמלא את הוראותיו. <br>

                                    <b> 2.  ההתקשרות  </b><br>

                                     1.2.   במסגרת ההתקשרות הכללית בין הצדדים, הערב הנפיקה ללקוח כתב ערבות, אשר פרטיו מפורטים  <br> 

                                   במבוא להסכם זה, לטובתו של  המוטב, בו התחייבה להעביר לידי  המוטב את סכום הערבות במקרה שבו יבקש   <br>

                                   המוטב לממש את כתב הערבות. <br>

                                    2.2. במקרה של מימוש כתב הערבות ע"י  המוטב, מכל סיבה שהיא, החייב ישלם לחברה כל סכום אותו תידרש  <br>

                                   הערב לשלם למוטב. עבור כל יום איחור בתשלום סכום הערבות לחברה, ישלם החייב ריבית שנתית בגובה של  <br>

                                    <b>6</b> % מסכום הערבות.  <br>

                                    3.2.   במקרה של מימוש כתב הערבות ע"י  המוטב, יוכל החייב, על פי שיקול דעתו, להשתמש בהפניית הערב   <br>

                                   לקבלת הלוואה דרך חברת טריא בריבית שנתית קבועה של 9%. ההלוואה תעמוד לתקופה של 18 חודשים. <br>

                                   הענקת ההלוואה כפופה לאישור חיתום   הלקוח בטריא.  <br>

                                    4.2.    במקרה של שני ערבים לחייב החתומים כנגד שטר הערבות, כל אחד מהם יחויב להעביר לידי הערב את  <br>

                                   מלוא סכום הערבות כמפורט בסעיף 2.2, וזאת במקרה זה לא יוכלו החייבים לקבל הפנייה לקבלת הלוואה ו/או  <br>

                                   לא יעמדו בבדיקת הלקוח אותה תבצע טריא.   <br>

                                   <br>

                                   <b> 3.   תקופת ההסכם  </b><br>

                                    1.3.    הסכם זה יעמוד בתוקפו החל מיום האמור לעיל ויסתיים במוקדם מבין:  <br>

                                    (א) מועד סיום תקופת הערבות, הכוללת גם תקופה של חידוש ו/או הארכת הערבות;  <br>

                                    (ב) מועד קבלת מלוא סכום הערבות אשר הועבר למוטב ע"י הערב במסגרת חילוט הערבות.  <br>

                                   <b> 4.  מצגים  </b><br>

                                   הלקוח מצהיר בזאת, כדלקמן: <br>

                                    1.4. הוא בעל האמצעים הכלכליים לשיפוי הערב בכל סכום הערבות כשהוא צמוד מדד בערכיו המשוערכים  <br>

                                    2.4.   הוא אינו מוכר כפושט רגל ולא הוגשה בעניינו בקשת חייב ו/או בקשת נושה לפשיטת רגל, לא נפתח ו/או  <br>

                                   עומד נגדו הליך כלשהו של פשיטת רגל, כמשמעותה בפקודת פשיטת הרגל [נוסח חדש], תש"ם.-  <br>

                                    3.4. הוא אינו מוכר כחייב מוגבל באמצעים, כמשמעותו בסעיף 69ג לחוק ההוצאה לפועל, תשכ"ז.- ו/או  <br>

                                   חייב המשתמט מתשלום חובו כמשמעותו בסעיף 66 א' ....לחוק ...ואינו כלול במרשם החייבים המשתמטים   <br>

                                    נשוא סעיף 66 ו' לחוק...  <br>

                                    4.4.    הוא אינו מוכר כחייב אשר חשבונו הוגבל .......עפ"י סעיף 2 לחוק חוק שיקים ללא כיסוי, תשמ"א...- <br>

                                    ו/או אינו הוגדר כלקוח מוגבל חמור.בהתאם לסעיף 3 ...   <br>

                                    5.4.    ספרי הערב ישמשו כראייה לסכום חובו לחברה. <br>

                                   <b> 5.  התחייבויות הלקוח  </b><br>

                                    1.5.    הלקוח יידע את הערב אם אחד מהמצגים המנויים מעלה יחדול מלהתקיים במהלך תקופת ההסכם.  <br>

                                    2.5.   הלקוח ישלם לחברה, לפי דרישתה הראשונה, את מלוא סכום הערבות אותו העבירה למוטב, וזאת תוך 7 <br>

                                    ימים ממועד העברת סכום הערבות למוטב. <br>

                                    3.5.    הלקוח יפצה ו/או ישפה את הערב, לפי דרישתה הראשונה, בגין כל סכום ו/או הוצאה מכל סוג שהוא שתהיה  <br> 

                                   לחברה, במישרין ובעקיפין, בקשר עם גביית סכום הערבות מהלקוח.  <br>

                                   <b> 6.   כללי  </b><br>

                                    1.6.    הדין הישראלי יחול באופן בלעדי על הסכם זה, וסמכות השיפוט הבלעדית בכל הקשור להסכם זה תהיה   <br>

                                   מסורה לבתי המשפט המוסמכים בתל אביב. <br>

                                    2.6.    אם ייקבע ע"י ערכאה מסוימת כי הוראה מהוראות הסכם זה אינה ניתנת לאכיפה ו/או הינה חסרת תוקף  <br>

                                   מטעם כלשהו, לא יהא בכך כדי לפגום ו/או לבטל את תוקפן של יתר הוראות ההסכם.  <br>

                                    3.6.   הודעה שתישלח על פי כתובות הצדדים במבוא להסכם זה בדואר רשום, תיחשב כאילו הגיעה לצד שכנגד  <br> 

                                    ולידיעתו תוך 3 ימים מיום שיגורה בדואר רשום מבית דואר בישראל ואם נמסרה ביד – בעת מסירתה, ואם  <br>

                                   שוגרה בפקס או בדוא"ל – תוך 24 שעות ממועד שיגורה.  <br>
                                    <p style="margin: 10px 40px -40px 0px;text-align: center;"> <b>חתימה דיגיטלית: </b></p>

                                   </p>

                                    <br>

                                    <p>

                                </div> -->

                                <!-- signature css -->
                                <link rel="stylesheet" href="<?php echo base_url() ?>website_assets/signature/css/signature-pad.css">
                                
                                <!-- end -->

                                <div class="row">
                                   <div class="col-md-3"></div>
                                   <div class="col-md-6">
                                    <li class="gf_left_third gfield text-field1_application form-group" style="width: 100% !important; margin-top: 25px;">
                                    <!-- <label class="gfield_label control-label" for="client_sign">(חתום כאן בחתימה דיגיטלית (צריך טקסט</label> -->
                                    
                                    <div class="">
                                       
                                        <div id="signature-pad-1" class="signature-pad" style="border: 1px solid rgba(50, 52, 116, 0.5) !important;box-sizing: border-box !important;border-radius: 30px !important;height: 200px; overflow: hidden;" >
                                    <span>
                                        <i class="fa fa-refresh" aria-hidden="true" style="font-size: 14px; padding:5px;" data-action="clear"></i>
                                    </span>
                                            
                                          <div class="signature-pad--body">
                                            <canvas></canvas>
                                          </div>

                                          <div>
                                            <!-- <button type="button" class="button clear" data-action="clear">Clear</button>
                                            <button type="button" class="button" data-action="change-color">Change color</button>
                                            <button type="button" class="button" data-action="undo">Undo</button>
                                            
                                            <button type="button" id="save_png" class="button save" data-action="save-png">Save Signature</button> -->

                                          </div>
                                        </div>

                                    <!-- second signature pad -->
                                        <div id="signature-pad-2" class="signature-pad" style="border: 1px solid rgba(50, 52, 116, 0.5) !important;box-sizing: border-box !important;border-radius: 30px !important;height: 200px; overflow: hidden;" >
                                    <span>
                                        <i class="fa fa-refresh" aria-hidden="true" style="font-size: 14px; padding:5px;" data-action="clear2"></i>
                                    </span>
                                            
                                          <div class="signature-pad--body">
                                            <canvas></canvas>
                                          </div>
                                        </div>
                                    <!-- end -->
                                      
                                    </div>
                                </li>
                                </div>

                                   <div class="col-md-3"></div>
                                </div>

                                <!-- signature js -->
                                <script src="<?php echo base_url() ?>website_assets/signature/js/signature_pad.umd.js"></script>
                                <script src="<?php echo base_url() ?>website_assets/signature/js/app.js"></script>

                                    <!-- end -->

                                <!--<input type="hidden" id="first_bae64_sign" name="first_base64_signature" value="" >-->

                                <input type="hidden" id="second_bae64_sign" name="second_base64_signature" value="" >

                        <!-- SIGNATURE END -->

                                <div class="gform_footer" style="margin: 0 auto;"> 
                                    <!-- first signature button -->
                                    <a class="button gform_button next" id="btnCloseModalPopup2" > <p class="first_modal_button continue_button scr_sec_modal">המשך למסמך הבא </p></a>

                                    <!-- second signature button -->
                                    <a class="button gform_button next" id="btnCloseModalPopup3" > <p class="first_modal_button continue_button scr_third_modal">סיים  </p></a>
                                
                                </div>

                                <div class="col-md-1"></div>
                            </div>

                            </div>
                            
                        </div>
                    </div>
                </div>

                  
                 <!-- screen 05  -->
                <div id="business_5_scr" class="gform_body form_height" style="margin-top: 30px; ">
                     
                    <ul class="gform_fields top_label ">

                        <li class="gfield gfield_html gfield_no_follows_desc text_resp">
                        
                           <div class="" style="float: right; margin-left:15px; margin-top:-25px;">
                            <img src="<?php echo base_url() ?>website_assets/img/progress03.png" class="img-responsive">
                           
                           </div>
                             <div class="main_text">
                            <p class="contact-text_application main_text_heading"style="font-weight: bold;">סכום הערבות </p>
                           
                             <p class="contact-text_application" style="margin-top: -20px;">השלב הבא: פרטי הנכס </p>
                         </div>
                         </li>

                    

                    </ul>

                    <div class="row" >

                        <li class="gf_middle_third gfield text-field1_application form-group">
                          
                            <div class="styled-input wide" >
                               <input type="text" name="businessFourth_requested_gur_amount" id="businessFourth_requested_gur_amount" value="" class="form-control fouth_text" autocomplete="off" required="">

                        
                                <label class="gfield_label control-label gform_wrapper gfield_label" for="businessFourth_requested_gur_amount">סכום הערבות והסכמים  
                            </label>
                            </div> 
                        </li>

                        <li class="gfield gf_left_third text-field2_application form-group">
                       
                            <div class="styled-input wide">
                               <input type="text" name="gur_period_month" id="gur_period_month" value="" class="form-control daterange seventh_text" data-format="MM/DD/YYYY" autocomplete="off" required="">

                               <input type="hidden" name="startDate" id="startDate" >
                               <input type="hidden" name="endDate" id="endDate" >

                                <label class="gfield_label control-label gform_wrapper gfield_label" for="gur_period_month">תקופת הערבות בחודשים 
                                     <!-- <i class="fa fa-calendar cal_reponsive2" aria-hidden="true" style="position: relative; left: -318px;"></i> -->
                                     <!-- <img src="<?php echo base_url() ?>website_assets/img/calendar_icon.png" class="img-responsive cal_reponsive2" style="position: relative;left: -150px;top: -28px;"> -->
                            </label>
                                <img src="<?php echo base_url() ?>website_assets/img/calendar_icon.png" class="img-responsive cal_reponsive" >
                            </div> 
                        </li>
                        <br><br><br>
                         <div class="row cale_opn">
                            
                        </div>
                        <!--<div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <li class="gfield gf_left_third form-group">
                            <div class="gform_footer first_button_new-text1" id="myBtn3"> 
                       
                                <a>
                                    <p class="first_button-new first_button_responsive p3_res" style="margin-left: 21px; margin-top: -15px;"> הסכם שיפוי </p>
                                </a>
                                  
                                <div class="checkbox checkbox-primary primary-box chk3_res" id="sec_scr_checkbox3" style="float: right;margin-right: 16px;">
                                    <input id="btn3_checkbox" name="btn3_checkbox" type="checkbox" value="">
                                    <label for="btn3_checkbox">
                                    </label>
                                </div>
                            </div>
                      

                        </li>
                    </div>
                            
                        </div>-->
                       

                        <div id="div11" style="color:red;  font-size:17px;"></div>



                        </div>

                        <div class="gform_footer"> 
                      
                            <input type="hidden" id="value_check" name="value_check" value="">
                        <button type="submit" class="button gform_button first_button-new continue_button first_next_button lowerbutton1" id="businessFouth_3_form" style="height: 60px; width: 328px;">המשך</button>
                        
                        </div>
              </div>
                 
            <!-- first loader obli gif -->
            <div class="sonar-wrapper">
                <div class="sonar-emitter">
                    <img src="<?php echo base_url() ?>website_assets/img/loader.png" style="margin-top: 15px; margin-left: 33px;">

                    <div id="sonar_text">
                        <p class="rtl" style="font-weight: bold;font-size: 22px;">עוד כמה רגעים </p>
                        <p class="rtl" >אנחנו בודקים את בקשתך לערבות ומיד נעדכן. </p>
                    </div>
                <div class="sonar-wave"></div>
                </div>
            </div>

            <script type="text/javascript">
                $(".sonar-wave").on("webkitAnimationIteration oanimationiteration animationiteration", function(){
                  $(this).css("background-color", colorize());
                })

                function colorize() {
                  var hue = Math.random() * 360;
                  return "HSL(" + hue + ",100%,50%)";
                }
            </script>   
            </form>
             
            </div>

        </div>
    </div>
                 
</div>
 

<!-- only for date renge picker -->
<link rel="stylesheet" href="<?php echo base_url() ?>website_assets/date/daterangepicker-bs3.css">
<script src="<?php echo base_url() ?>website_assets/date/moment.min.js"></script>
<script src="<?php echo base_url() ?>website_assets/date/daterangepicker.js"></script>
<!-- // end -->


<script type="text/javascript">

function closeMessageModal(){
    $("#messageModal").hide();
    $(".modal-backdrop").remove();
    
    // loader start
                    $("#sonar_text").hide('fast');

                    var i = 0;
                    var intervalId = setInterval(function(){
                         
                        $(".sonar-wrapper").show('fast');

                        if(i === 1){ 
                          // clearInterval(intervalId);
                          
                            var j = 0;
                            var secondIntervalId = setInterval(function(){ 

                                $("#sonar_text").show('fast');

                                if(j === 2){

                                    
                                    clearInterval(intervalId);
                                    clearInterval(secondIntervalId);

                                   //  if(window.document.drops.isFinished()){
                                       
                                   // }
                                    
                                }

                            j++;
                            }, 16000);

                            // clearInterval(secondIntervalId);
                            clearInterval(intervalId);
                          
                        }

                    i++;
                    },25000);
                    
//                    setInterval(function(){ console.log("delay"); },32000);

                // loader end
    
    var gurant_amm = $("#businessFourth_requested_gur_amount").val();
    
    gurant_amm = gurant_amm.replace(",","");
                    
    gurant_amm = parseInt(gurant_amm);
    
    if(gurant_amm > 50000){
        
        //        direct 6 screeen
        $("#value_check").val(1);
        $("#business_5_scr").hide();
        $(".sonar-wrapper").show();
        
        <?php $businessFourth2 = $this->session->userdata('businessFourth2');
            
            if(!empty($businessFourth2)){
                $business_type = $businessFourth2['business_type'];
                
                if($business_type == 'חברה בע”מ'){ ?>
//                    location.href = "<?php // echo site_url('business6'); ?>";
                        without_payment_api();
                    <?php
                }
                else{
                    ?>
                    payment_api();
                    <?php
                }
            }
            else{
                ?>
                    location.href = "<?php echo site_url('business1'); ?>";
                    <?php
            } ?>
//                payment_api();
        
//        document.getElementById("myform").submit();

    }
    else{
        //        ajax function and loader(call payment api direct 7 screen)
        $("#value_check").val(2);
        $("#business_5_scr").hide();
        $(".sonar-wrapper").show();
        
        <?php $businessFourth2 = $this->session->userdata('businessFourth2');
            
            if(!empty($businessFourth2)){
                $business_type = $businessFourth2['business_type'];
                
                if($business_type == 'חברה בע”מ'){ ?>
//                    location.href = "<?php // echo site_url('business7'); ?>";
                        without_payment_api();
                    <?php
                }
                else{
                    ?>
                    payment_api();
                    <?php
                }
            }
            else{
                ?>
                    location.href = "<?php echo site_url('business1'); ?>";
                    <?php
            } ?>
//        document.getElementById("myform").submit();
    }
}

function payment_api(){
    /*
    $.ajax({
            url: "<?php // echo site_url('website/business_payment_api'); ?>",
            success: function(result) {
                console.log(result);
                $(".sonar-wrapper").hide('fast');
                $("#sonar_text").hide('fast');
//                document.getElementById("myform").submit();
                if (result != 0) {
                    
//                    $("#buzzer_count").val(result);
                } else {
                    //$("#noti_count").html('');
                    //  $("#count_notif").html("0");
                }

            }
        });  */
        var form = $('#myform').serialize();
//        console.log(form); 
//        return false;
        $.ajax({
                url: "<?php echo site_url('BusinessFourth/business_payment_api'); ?>",
                type: "POST",
                data: form,
//                contentType: false,
//                cache: false,
//                processData: false,
                success: function (result) {
//                    alert(111);
//                    console.log(result);
                    var getdata = jQuery.parseJSON(result);
                    console.log(JSON.stringify(getdata));
//                    alert(JSON.stringify(getdata));
                    $(".sonar-wrapper").hide('fast');
                    $("#sonar_text").hide('fast');
//                    alert(status);
                    if (result != '') {
//                        var getdata = jQuery.parseJSON(result);
//                        alert(JSON.stringify(result));
                        var status = getdata.status;
                        var url_iframe = getdata.url_iframe;
                        
//                        alert(url_iframe);
//                        var status = getdata.status;
//                        alert(1);
                        if (status == 'true') {
//                            alert(2);businessSec2
                            
//                            if($("#value_check").val() == 1){
//                                location.href = "<?php // echo site_url('businessThird4'); ?>";
//                            }if($("#value_check").val() == 2){
//                                location.href = "<?php // echo site_url('businessThird5'); ?>";
//                            }

                            location.href = "<?php echo site_url('businessFourth4'); ?>";
                                
                        }
                        else
                        {
                           location.href = "<?php echo site_url('businessFourthBadResponse'); ?>";
                        }
                    }
                    else{
                        alert('Eroor!');
                        location.href = "<?php echo site_url('business1'); ?>";
                    }
                   
                    return false;
                    
                },
                error: function () {
                }
            });
}

//direct function call
function without_payment_api(){
    
        var form = $('#myform').serialize();
//        console.log(form); 
//        return false;
        $.ajax({
                url: "<?php echo site_url('BusinessFourth/business_without_payment_api'); ?>",
                type: "POST",
                data: form,
//                contentType: false,
//                cache: false,
//                processData: false,
                success: function (result) {
//                    alert(222);
                    console.log(result);
//                    alert(result);
                    $(".sonar-wrapper").hide('fast');
                    $("#sonar_text").hide('fast');
//                    if($("#value_check").val() == 1){
//                        location.href = "<?php // echo site_url('businessThird4'); ?>";
//                    }if($("#value_check").val() == 2){
//                        location.href = "<?php // echo site_url('businessThird5'); ?>";
//                    }
                    location.href = "<?php echo site_url('businessFourth4'); ?>";
                    
                    return false;
                    
                },
                error: function () {
                }
            });
}


//var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
//var element = document.getElementById('text');
//
//if (isMobile) {
//
//    $(".first_modal_button").css("opacity","1");
//    $(".first_modal_button").css("cursor","pointer");
//    
////    first signature
//    $("#btnCloseModalPopup2").click(function () {
//    
//        if( signaturePad1.isEmpty()){
//          console.log('signature1 is empty');
//          alert('please fill signature first.');
//          return false;            
//        }
//
//        var data = signaturePad1.toDataURL('image/png');
//        $('#first_bae64_sign').val(data);
//        
//        $("#sec_scr_checkbox2").show();
//        $("#checkbox2").prop("checked", true);
//        
//        $("#myModal2").modal("hide");
//        console.log("mobile base64 image value => "+$('#first_bae64_sign').val());
//          
//    });
//    
//    //    second signature
//    $("#btnCloseModalPopup3").click(function () {
//    
//        if( signaturePad2.isEmpty()){
//          console.log('signature2 is empty');
//          alert('please fill signature first.');
//          return false;            
//        }
//
//        var data2 = signaturePad2.toDataURL('image/png');
//        $('#second_bae64_sign').val(data2);
//        
//        $("#sec_scr_checkbox3").show();
//        $("#btn3_checkbox").prop("checked", true);
//        
//        $("#myModal2").modal("hide");
//        console.log("mobile base64 image value => "+$('#second_bae64_sign').val());
//          
//    });
////    $('#first_bae64_sign').val();
//
//}

</script>

<script type="text/javascript" src="https://www.jqueryscript.net/demo/Auto-Format-Currency-With-jQuery/simple.money.format.js"></script>

<script type="text/javascript">
	$('#businessFourth_requested_gur_amount').simpleMoneyFormat();
</script>