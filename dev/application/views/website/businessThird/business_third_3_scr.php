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

<script type="text/javascript" src="https://www.jqueryscript.net/demo/Auto-Format-Currency-With-jQuery/simple.money.format.js"></script>


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

span {
    font-size: 20px;
}

#sec_scr_checkbox1, #sec_scr_checkbox2, #new_sec_scr_checkbox3{
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

     /* $('input[name="gur_period_month"]').daterangepicker({
          // autoUpdateInput: false,
          // locale: {
          //     cancelLabel: 'Clear'
          // }

          endDate: enddate.getMonth()+'/'+enddate.getDate()+'/'+enddate.getFullYear(),
          
          //minDate: new Date(),

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
      });*/
      
      $( function() {

      
      var todayDate = new Date();
      
      var tomorrow = new Date(todayDate);
      tomorrow.setDate(tomorrow.getDate() + 1);
      
      $('input[name="startDate"]').datepicker({
      changeMonth: true,
      changeYear: true,
      minDate: tomorrow,
      
       onSelect: function() {
           $('#endDate').val('');
           
           
           $('input[name="endDate"]').datepicker('destroy');
           
            var startdate = $('#gur_period_month').val();
            
           startdate =  startdate.split('/');
           
           var newmonth = parseInt(startdate[1]) - 1;
           
            var selecteddate = new Date(startdate[2], newmonth, startdate[0]);
            
      var todayDate = new Date();
      
      var tomorrow = new Date(selecteddate);
      tomorrow.setDate(tomorrow.getDate() + 1);
      
      var enddate = new Date(selecteddate);
      enddate.setDate(tomorrow.getDate() + 547);
      
      setTimeout(function(){ 
      
      $('input[name="endDate"]').datepicker({
      changeMonth: true,
      changeYear: true,
      minDate: tomorrow,
      maxDate: enddate,
      onSelect: function() {
           
           
            if($("#busineesThird_requested_gurantee_amt").val() != '' && $("#gur_period_month").val() != '' && $("#endDate").val() != '' && $("#first_bae64_sign").val() != '' && $("#second_bae64_sign").val() != '' && $("#third_bae64_sign").val() != '' ){
                // alert(1);
                
                var documentcontent = $("#document_content").html();
         
         var basesisryfourhtml = btoa(unescape(encodeURIComponent(documentcontent)));
         
         $('#documenthtml').val(basesisryfourhtml);
         
                    $("#businessThird_3_form").css("opacity","1"); // button opacity change
                    $("#businessThird_3_form").css("cursor","pointer");
                    $("#businessThird_3_form").prop("disabled", false);
                
            }else{ 
                // alert(2);
                $("#businessThird_3_form").css("opacity","0.5"); // button opacity change
                $("#businessThird_3_form").css("cursor","auto");
                $("#businessThird_3_form").prop("disabled", true);
            }
           
       }

    });
    
      }, 500);
       }

    });
    
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
            if($("#busineesThird_requested_gurantee_amt").val() != '' && $("#gur_period_month").val() != '' && $("#first_bae64_sign").val() != '' && $("#second_bae64_sign").val() != '' && $("#third_bae64_sign").val() != '' ){
                // alert(1);
                
                var documentcontent = $("#document_content").html();
         
         var basesisryfourhtml = btoa(unescape(encodeURIComponent(documentcontent)));
         
         $('#documenthtml').val(basesisryfourhtml);
         
                    $("#businessThird_3_form").css("opacity","1"); // button opacity change
                    $("#businessThird_3_form").css("cursor","pointer");
                    $("#businessThird_3_form").prop("disabled", false);
                
            }else{ 
                // alert(2);
                $("#businessThird_3_form").css("opacity","0.5"); // button opacity change
                $("#businessThird_3_form").css("cursor","auto");
                $("#businessThird_3_form").prop("disabled", true);
            }
      });

      $('input[name="gur_period_month"]').on('cancel.daterangepicker', function(ev, picker) {
          $(this).val('');
      });

      

      

      
    });
</script>

<script type="text/javascript">

        $(document).ready(function(){


            $("#businessThird_3_form").css("opacity","0.5");
            $("#businessThird_3_form").css("cursor","auto");
            $("#businessThird_3_form").prop("disabled", true);

            var ratio =  Math.max(window.devicePixelRatio || 1, 1);

            // This part causes the canvas to be cleared
            canvas1.width = '416';
            canvas1.height = '147';

            canvas2.width = '416';
            canvas2.height = '147';

            canvas3.width = '416';
            canvas3.height = '147';

            $("#businessThird_3_form").click(function(){

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
                        busineesThird_requested_gurantee_amt: {
                            required: true,
                            money: true,
                            min: 100,
                            max: 46700
                        },
                        gur_period_month: {
                            required: true,
                        }
                    },
                    messages: {
                        busineesThird_requested_gurantee_amt: {
                            required: "שדה חובה",
                            money: "אנא הזן את המספר",
                            min: "אנא הכנס את ערך הסכום 100 עד 46,700",
                            max: " אנא הזן ערך הנמוך מ 46,700",

                        },
                        gur_period_month: {
                            required: "שדה חובה",
                        }
                    }
                    
                });

                if (form.valid() === true){

                    gurant_amm = $("#busineesThird_requested_gurantee_amt").val();
                    
                    gurant_amm = gurant_amm.replace(",","");
                    
                    gurant_amm = parseInt(gurant_amm);
                    
                    //  alert(11111);
                    if(gurant_amm > 50000){
                        $('#messageModal').modal('show');
                        return false;
                    }
                    else{
                        closeMessageModal();
                    }

                  
                    
                }
                else{
                    // $('.submit').css('opacity', '0.5');
                }

                if($("#busineesThird_requested_gurantee_amt").val() != '' && $("#gur_period_month").val() != '' && $("#endDate").val() != '' && $("#first_bae64_sign").val() != '' && $("#second_bae64_sign").val() != '' && $("#third_bae64_sign").val() != '' ){


var documentcontent = $("#document_content").html();
         
         var basesisryfourhtml = btoa(unescape(encodeURIComponent(documentcontent)));
         
         $('#documenthtml').val(basesisryfourhtml);
         
                    $("#businessThird_3_form").css("opacity","1"); // button opacity change
                    $("#businessThird_3_form").css("cursor","pointer");
                    $("#businessThird_3_form").prop("disabled", false);

                }else{

                    $("#businessThird_3_form").css("opacity","0.5"); // button opacity change
                    $("#businessThird_3_form").css("cursor","auto");
                    $("#businessThird_3_form").prop("disabled", true);
                }
            });


            // second form  
            $('#busineesThird_requested_gurantee_amt').on('keyup', function() {

                if($("#busineesThird_requested_gurantee_amt").val() != '' && $("#gur_period_month").val() != '' && $("#endDate").val() != '' && $("#first_bae64_sign").val() != '' && $("#second_bae64_sign").val() != '' && $("#third_bae64_sign").val() != '' ){

var documentcontent = $("#document_content").html();
         
         var basesisryfourhtml = btoa(unescape(encodeURIComponent(documentcontent)));
         
         $('#documenthtml').val(basesisryfourhtml);
         
         
                    $("#businessThird_3_form").css("opacity","1"); // button opacity change
                    $("#businessThird_3_form").css("cursor","pointer");
                    $("#businessThird_3_form").prop("disabled", false);

                }
                else{
                    $("#businessThird_3_form").css("opacity","0.5"); // button opacity change
                    $("#businessThird_3_form").css("cursor","auto");
                    $("#businessThird_3_form").prop("disabled", true);
                }

              
            });
            
            // for first modal
            if ($('#checkbox3').is(":checked") && $('#checkbox4').is(":checked") )
            {
              $(".scr_first_modal").css("opacity","1");
              $(".scr_first_modal").css("cursor","pointer");

              $("#sec_scr_checkbox1").show();
              $("#checkbox1").prop("checked", true);
            }
            else{
                $(".scr_first_modal").css("opacity","0.5");
                $(".scr_first_modal").css("cursor","auto");

                $("#sec_scr_checkbox1").hide();
                $("#checkbox1").prop("checked", false);
            }
            // end

            $('#checkbox3,#checkbox4,#checkbox5').on('click', function() {

                if($("#busineesThird_requested_gurantee_amt").val() != '' && $("#gur_period_month").val() != '' && $("#endDate").val() != '' && $("#first_bae64_sign").val() != '' && $("#second_bae64_sign").val() != '' && $("#third_bae64_sign").val() != '' ){

var documentcontent = $("#document_content").html();
         
         var basesisryfourhtml = btoa(unescape(encodeURIComponent(documentcontent)));
         
         $('#documenthtml').val(basesisryfourhtml);
                    $("#businessThird_3_form").css("opacity","1");
                    $("#businessThird_3_form").css("cursor","pointer");
                    $("#businessThird_3_form").prop("disabled", false);

                    if ($('#checkbox3').is(":checked") && $('#checkbox4').is(":checked") && $('#checkbox5').is(":checked") )
                    {
                      $(".scr_fifth_modal").css("opacity","1");
                      $(".scr_fifth_modal").css("cursor","pointer");

                      $("#sec_scr_checkbox1").show();
                      $("#checkbox1").prop("checked", true);
                      
                      $("#btnCloseModalPopup1").click(function () {
                          $("#myModal1").modal("hide");
                          $("#myBtn1").css("cursor","pointer");
                      });
                      
                    }
                    else{
                        $(".scr_fifth_modal").css("opacity","0.5");
                        $(".scr_fifth_modal").css("cursor","auto");

                        $("#sec_scr_checkbox1").hide();
                        $("#checkbox1").prop("checked", false);
                    }
                    
                }else{

                    // for first modal
                    if ($('#checkbox3').is(":checked") && $('#checkbox4').is(":checked") && $('#checkbox5').is(":checked")  )
                    {

                      $(".scr_fifth_modal").css("opacity","1");
                      $(".scr_fifth_modal").css("cursor","pointer");

                      $("#sec_scr_checkbox1").show();
                      $("#checkbox1").prop("checked", true);

                      // close modal first
                      $("#btnCloseModalPopup1").click(function () {
                          $("#myModal1").modal("hide");
                          $("#myBtn1").css("cursor","pointer");
                      });

                        if($("#busineesThird_requested_gurantee_amt").val() != '' && $("#gur_period_month").val() != '' && $("#endDate").val() != '' && $("#first_bae64_sign").val() != '' && $("#second_bae64_sign").val() != '' && $("#third_bae64_sign").val() != '' ){

var documentcontent = $("#document_content").html();
         
         var basesisryfourhtml = btoa(unescape(encodeURIComponent(documentcontent)));
         
         $('#documenthtml').val(basesisryfourhtml);
         
                            $("#businessThird_3_form").css("opacity","1");
                            $("#businessThird_3_form").css("cursor","pointer");
                            $("#businessThird_3_form").prop("disabled", false);

                        }else{

                            $("#businessThird_3_form").css("opacity","0.5");
                            $("#businessThird_3_form").css("cursor","auto");
                            $("#businessThird_3_form").prop("disabled", true);
                        }

                    }
                    else
                    {
                        $(".scr_first_modal").css("opacity","0.5");
                        $(".scr_first_modal").css("cursor","auto");

                        $("#sec_scr_checkbox1").hide();
                        $("#checkbox1").prop("checked", false);

                    }

                    $("#businessThird_3_form").css("opacity","0.5"); // button opacity change
                    $("#businessThird_3_form").css("cursor","auto");
                    $("#businessThird_3_form").prop("disabled", true);
                }

            });


            // first modal
            $("#myBtn1").click(function(){

                 // show Modal
                 $('#myModal5').modal('show');
                 // $(".scr_first_modal").css("opacity","0.5");                 
            });


            // second modal
            $("#myBtn2").click(function(){

                 // show Modal
                $('#myModal1').modal('show');
                $('#myModalLabel2').show('fast');
                $('#modal2Div').show('fast');
                $('#signature-pad-2').hide('fast');
                $('#btnCloseModalPopup3').hide('fast');
                $('#btnCloseModalPopup2').show('fast');
                $('#signature-pad-1').show('fast');
                $('#modal3Div').hide('fast');
                $('#myModalLabel3').hide('fast');
                $('#newModal3signature').hide('fast');

                // popup dynamic js 
                var firstName = '<?php if(!empty($this->session->userdata("businessThird1"))){ $businessThird1 = $this->session->userdata("businessThird1");  echo $businessThird1["first_name"]; } ?>';
                var lastName = '<?php if(!empty($this->session->userdata("businessThird1"))){ $businessThird1 = $this->session->userdata("businessThird1");  echo $businessThird1["last_name"]; } ?>';
                var client_id = '<?php if(!empty($this->session->userdata("businessThird1"))){ $businessThird1 = $this->session->userdata("businessThird1");  echo $businessThird1["unique_id"]; } ?>';
                $('#fullName').html(firstName+' '+lastName);
                $('#clientId').html(client_id);
                $('#nextfullName').html(firstName+' '+lastName);

            });

            // Third button for modal
            $("#myBtn3").click(function(){

                $('#myModal2').modal('show');
                $('#modal2Div').hide('fast');
                $('#myModalLabel2').hide('fast');
                $('#modal3Div').show('fast');
                $('#myModalLabel3').show('fast');
                //$('#signature-pad-1').hide('fast');
                $('#btnCloseModalPopup2').hide('fast');
                $('#btnCloseModalPopup3').show('fast');
                $('#signature-pad-2').show('fast');
                $('#newModal3signature').show('fast');
                // $(".scr_sec_modal").css("opacity","1");
                // $(".scr_sec_modal").css("cursor","pointer");

                
                // popup dynamic js  
                var firstName = '<?php if(!empty($this->session->userdata("businessThird1"))){ $businessThird1 = $this->session->userdata("businessThird1");  echo $businessThird1["first_name"]; } ?>';
                var lastName = '<?php if(!empty($this->session->userdata("businessThird1"))){ $businessThird1 = $this->session->userdata("businessThird1");  echo $businessThird1["last_name"]; } ?>';
                var clientAdd = '<?php if(!empty($this->session->userdata("businessThird1"))){ $businessThird1 = $this->session->userdata("businessThird1");  echo $businessThird1["home_no"].", ".$businessThird1["hometown"].", ".$businessThird1["street"]; } ?>';
                
                var orderIdNumber = '<?php if(!empty($this->session->userdata("order_id_number"))){ $order_id_number = $this->session->userdata("order_id_number");  echo $order_id_number; } ?>';
                var cAmount = $('#busineesThird_requested_gurantee_amt').val();
                
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

<?php

$businessThird1 = $this->session->userdata('businessThird1');

$businessThird2 = $this->session->userdata('businessThird2');

?>

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
            

            <form method="post" enctype="multipart/form-data" id="myform" name="validate_form" novalidate action='<?php echo site_url("businessThird3");?>' >
                
                <input type='hidden' name='expiry_date' value='' class='expiry_date'>
                
                 <input type='hidden' name='expiry_date2' value='' class='expiry_date2'>
                
                
                <input type='hidden' name='documenthtml' value='' id='documenthtml'>
                
                
                
                <!-- First Modal -->
                <div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <!-- <h4 class="modal-title" id="myModalLabel"><b>הסכמה למסירת נתוני אשראי  </b></h4> -->
                                 <h4 class="modal-title" id="myModalLabel"><b> זכות הלקוח לקבל את נתוני האשראי </b></h4>
                                
                            </div>
                            <div class="modal-body">
                                
                             <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10 rtl" style="text-align: right;">
                                    
                                    
                             <input id="checkbox3" type="checkbox" value="one" class="number" style="display:none;" checked='true'>
                                   
                                   <!-- <p>

                                        <div class="checkbox checkbox-danger check_box_popup0">
                                            <input id="checkbox3" type="checkbox" value="one" class="number">
                                            <label for="checkbox3">
                                                
                                            </label>
                                        </div>
                                        
                                     <!--  <input class="check_box_popup1" type="checkbox">  -->
                                    
                                <!--      </p>
                                    
                                    <p class="check_box_para">

                                        <b>אני מבין כי טריא אינה מאפשרת לקחת הלוואה עבור אחרים ואני מצהיר בזה כי אני מבקש

                                            לקבל הלוואה בעבור עצמי בלבד.  </b>

                                            <br> <br>

                                             אני מתחייב להודיע לטריא בכתב בהקדם האפשרי על כל שינוי בפרטים שמסרתי לעיל; ידוע לי כי מסירת  מידע כוזב, לרבות אי-מסירת עדכון של פרט החייב בדיווח, במטרה שלא יהיה דיווח או כדי לגרום לדיווח  בלתי נכון לפי סעיף 7 לחוק איסור הלבנת הון, התש"ס-, מהווה עבירה פלילית.

                                   

                                    <p> -->
                                        
                                    <div class="checkbox checkbox-info check_box_popup00">
                                        <input id="checkbox5" type="checkbox" value="three" class="number" checked>
                                        <label for="checkbox5" style='display:none;'>
                                           
                                        </label>
                                    </div>

                                    <!-- <p class="check_box_para">לצורך בדיקת הבקשה, אנחנו מתכוונים לפנות ללשכת אשראי על מנת לקבל חיווי אשראי. מובהר בזאת  שלצורך קבלת החיווי לשכת האשראי תגיש בקשה לבנק ישראל לקבלת נתוני אשראי לגביך הכלולים  במאגר.
                                       <br>
                                        הפנייה ללשכת אשראי לצורך קבלת חיווי הינה בכל מקרה של בקשה לקבלת הלוואה באמצעות טריא.
                                    </p> -->

                                    <p class="check_box_para">
                              <!--       לצורך בדיקת הבקשה, אנחנו מתכוונים לפנות ללשכת אשראי על מנת לקבל חיווי אשראי. מובהר בזאת שלצורך קבלת החיווי לשכת האשראי תגיש בקשה לבנק ישראל לקבלת נתוני אשראי לגביך הכלולים במאגר.
                                    הפנייה ללשכת אשראי לצורך קבלת חיווי הינה לשם התקשרות בעסקת אשראי או להבטחת קיום העסקה.

   -->
                                    </p>
                                    
                        <!--- New Checkbox and Text Added -->            
                                    
                                    
                                     <div class="checkbox checkbox-info check_box_popup00">
                                        <input id="checkbox4" type="checkbox" value="two" class="number">
                                        <label for="checkbox4">
                                           
                                        </label>
                                    </div>
                                    
                                    
                                    <p class="check_box_para">
                                     ידוע לי כי באפשרותי לבקש את דו"ח נתוני האשראי שהתקבל לגבי מטעם חברת BDI עד תום תקופת הערבות או עד חצי שנה ממועד קבלת הדו"ח (הקצר מביניהם), ושבאפשרותי לבקשו דרך שירות הלקוחות של "אובלי" בטלפון או במייל
   
                                    </p>

                             
                                </div>

                                <div class="gform_footer" style="margin: 0 auto;">  <!--btnCloseModalPopup1-->
                                    <a class="button gform_button" id="btnCloseModalPopup5" > <p class="first_modal_button continue_button scr_fifth_modal">המשך למסמך הבא  </p></a>
                                
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

                                שים לב! סכום הערבות שהזנת חורג מן המותר. ניתן להגיש בקשה לערבות עד גובה 25,000 ש"ח \50,000 ש"ח" (פרטי\עסקי - בהתאם למסלול). נעדכן שנית את הנוסח כאשר הליך הערב הנוסף יושלם.
                             
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
            
            
           <?php
            
            
            $date = date('Y-m-d'); 
            
            
            
            $expdate = '
                             <br/> <img src="https://obli.co.il/website_assets/img/calendar_icon.png" class="img-responsive cal_reponsive" style="display: inline; top:0px; right:0px !important; float:none;"> <input style="width:100px !important; display: inline; height:100%;" type="text" name="busineesThird_document_expdate" id="datepicker" data-format="DD/MM/YYYY" class="form-control sixth_text" required="" autocomplete="off" onchange="datechanged()">
                               
                                
                            ';
                            
                            
                             $expdate2 = '
                              <img src="https://obli.co.il/website_assets/img/calendar_icon.png" class="img-responsive cal_reponsive" style="display: inline; top:0px; right:0px !important; float:none;"> <input style="width:100px !important; display: inline; height:100%;" type="text" name="busineesThird_document_expdate2" id="datepicker2" data-format="DD/MM/YYYY" class="form-control sixth_text" required="" autocomplete="off" onchange="datechanged2()">
                               
                                
                            ';
            
            if(!empty($this->session->userdata("businessThird1"))){
                $businessThird1 = $this->session->userdata("businessThird1");
                    $clientAdd = $businessThird1["home_no"].", ".$businessThird1["hometown"].", ".$businessThird1["street"];
                    $name = $businessThird1["first_name"]. $businessThird1["last_name"];
                
                    $client_id = $businessThird1["unique_id"];
                
            }else{
                 $clientAdd = '';
                    $name = '';
                
                    $client_id = '';
            }
            ?>
            
            

                <!-- First Modal -->
                <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <!-- <h4 class="modal-title" id="myModalLabel"><b>הסכמה למסירת נתוני אשראי  </b></h4> -->
                                 <h4 class="modal-title" id="myModalLabel"><b>הסכמה למסירת נתוני אשראי </b></h4>
                            </div>
                            <div class="modal-body">
                                
                             <div class="row">
                                <div class="col-md-1"></div>

                                <!-- modal 2 -->
                                <div class="col-md-10" id="modal9Div" style="text-align: right;">
                                    
                                     <div class="row">
                                        <div class="col-md-1"></div>
        
                                            
                                            <div class="col-md-10 rtl" id="modal9Div" style="text-align: right;">
                                                
                                                <p class="rtl" style="margin: 10px 0px 0px 0px;"> 
                                                
                                                (תקנה 5)	
<br/>
                                                טופס 1	
<br/> <br/>

טופס הסכמת לקוח למסירת נתוני אשראי לגביו לנותן האשראי לפי תקנה 5 לתקנות נתוני אשראי, התשע"ח-2017 :
                             <br/> <br/>
                             פרטי הלקוח:

<br/><br/>
                                                    
                                                   
                                                     שם :<?php echo $name;?>  כתובת : <?php echo $clientAdd;?>  מס' זהות: <?php echo $client_id;?><br/><br/>
                                                    
                                                    <p class="rtl">
                                                        
                                                        
                                                        מצהיר בזה כי אני נותן בזה את הסכמתי לכך שנתוני האשראי לגבי הכלולים במאגר יימסרו ללשכת אשראי לשם עריכת דוח אשראי שיימסר ל " גולדנרוד פיננסים בע"מ", לשם התקשרות בעסקת אשראי או לשם הבטחת קיום העסקה, כמפורט להלן:   
                                                    
                                                 
                                                         <br/>  <br/>  
                                                    עסקת אשראי חדשה – ערבות.
                                               
                                                    <br/> <br/>
                                                    הסכמתי זו תעמוד בתוקפה עד תאריך  <?php echo $expdate;?> ואם העסקה תצא לפועל  עד <?php echo $expdate2;?> ולא יאוחר ממועד סיום עסקת האשראי.

<br/>  <br/>
ידוע לי שנתוני האשראי הכלולים לגביי במאגר כוללים, בין השאר, נתונים לגבי עסקאות אשראי שביצעתי וכן נתונים שונים מכונס הנכסים הרשמי, הוצאה לפועל ובנק ישראל.
                                
                                <br/>  <br/>
                                
                                <b>שים לב:</b> </p></br/>
                                                    
                                                    נתוני האשראי האמורים יוכלו לשמש את לשכת האשראי גם למתן שירותים לנותן האשראי, לרבות דירוג אשראי או ייעוץ לתקופה שהוסכמה לעיל, והכל בכפוף לחוק.
                                                    <br/>
                                                    מסירת המידע תלויה בהסכמתך, ואין אתה חייב לתת את הסכמתך.

                                                    
                                                   <br/><br/> 
                                                   
                                            <div class="row">
                                               <div class="col-md-6" style='text-align:left; vertcal-align:center;'> <?php echo $date;?> :<b>תאריך  </b>
                                               
                                               </div>
                                               <div class="col-md-6">
                                                
                                                   <b class="rtl">:חתימת הלקוח</b><br/>
                                                     
                                                            
                                            </div>
                                            
                                            <div class='row'>
                                                
                                                <div class='col-md-12' style='text-align:center; margin-top:10px;'>
                                                    
                                            <div id="signature-pad-1" class="signature-pad" style="border: 1px solid rgba(50, 52, 116, 0.5) !important;box-sizing: border-box !important;border-radius: 30px !important;height: 200px; overflow: hidden;" >
                                                <span>
                                                    <i class="fa fa-refresh" aria-hidden="true" style="font-size: 14px; padding:5px;" data-action="clear"></i>
                                                </span>
                                                        
                                                      <div class="signature-pad--body">
                                                        <canvas></canvas>
                                                      </div>
                                                        
            
                                                      
                                                    </div>
                                                                                                                
                                                            </p>
                                                            
                                                        </div></div>
                                
                                </div>
                                
                                </div>

                                <div class="gform_footer" style="margin: 0 auto;"> 
                                    <a class="button gform_button" id="btnCloseModalPopup1" > <p class="first_modal_button continue_button scr_first_modal">המשך למסמך הבא  </p></a>
                                
                                </div>

                                <div class="col-md-1"></div>
                                
                                </div>
                                
                                </div>
                                
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
                                <h4 class="modal-title" id="myModalLabel2"><b>הלוואה למימון עמלת ערבות </b></h4>
                                <h4 class="modal-title" id="myModalLabel3"><b> הסכם שיפוי </b></h4>
                            </div>
                            <div class="modal-body">
                                
                             <div class="row">
                                <div class="col-md-1"></div>
                                
                                 <?php
                                
                                $months = array("Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر");
                                
                                
                                $your_date = date( 'y-m-d', $time ); // The Date calculated from the $time variable
                                    $en_month = date("M", $time );
                                    foreach ($months as $en => $ar) {
                                        if ($en == $en_month) { $ar_month = $ar; }
                                    }
                                    
                                     $ar_month = date("M");
                                ?>

                                <!-- modal 2 -->
                                <div class="col-md-10 rtl" id="modal2Div" style="text-align: right;">
                                    
                                     <?php $businessThird2 = $this->session->userdata('businessThird2');
                                     
                                     $businessThird5 = $this->session->userdata('businessThird5');
                                     
                                     $business_type = '';
            
            if(!empty($businessThird2)){
                $business_type = $businessThird2['business_type'];
                
            }
                
        /********* If company limiited ***********/
        
                if($business_type == 'חברה בע”מ'){ ?>
                                    
                                    <p style="margin: 10px 0px 0px 0px;">אני, החתום מטה, <span id="fullName" class="span_text"></span> בעל ת.ז. מס' <span id="clientId" class="span_text"></span>, מאשר ומצהיר כמפורט להלן:  <br>1.    ידוע לי  כי תשלום העמלה לגולדנרוד פיננסים בע"מ, ח.פ. 513578674 (להלן: "גולדנרוד") בגין העמדת  הערבות (להלן: "העמלה") באמצעות הלוואה זו ומימון העמלה בדרך של קבלת הלוואה באמצעות טריא פי2פי   בע"מ (ח.פ. 515024131 )  או טריא קהילה פיננסית בע"מ (ח.פ. 515928034) (שתי החברות יקראו להלן: "טריא") הן עסקאות נפרדות. <br>

                                     2. אני מצהיר ומאשר שסכום ההלוואה יועבר במישרין  לגולדנרוד ובחתימתי על נספח זה אני מסכים לכל תנאי  ההלוואה וכן לכל תנאי האתר שבאמצעותו אקבל את ההלוואה ואני מורה לטריא להעביר את סכום ההלוואה  כאמור. 

                                     <br>

                                     3.  אני מאשר שידוע לי שטריא אינה שותפה או ערבה בצורה כלשהי לעסקי גולדנרוד, ואינה צד לעסקה זו, ולפיכך טענות הנוגעות לעמלה או טענות אחרות שעלולות להיות לי כלפי, לרבות בקשר עם העמלה, לא יהוו   עילה לאי תשלום ההלוואה ולא יפטרו אותי מתשלום החזרי ההלוואה לטריא. 

                                    </p>

                                      <p style="margin: 30px 40px 0px 0px;text-align: center;">

                                        <!--<b>שם החברה: </b><span id="nextfullName" class="span_text"></span> <b>חתימה דיגיטלית:  </b>-->
                                          
                                          <b>שם החברה: </b> <?php if(!empty($businessThird2)){ echo $businessThird2['company_name']; } ?> <b>שם החותם: </b> <?php if(!empty($businessThird1)){ echo $businessThird1['first_name'].' '.$businessThird1['last_name']; } ?> <b>חתימה דיגיטלית:</b>
                                      </p>
                                </div>

                                <!-- modal 3 -->
                                <div class="col-md-10 rtl" id="modal3Div" style="text-align: center;">
                                    <div id='document_content'>
                                   <p style="margin: 10px 0px 0px 0px; text-align: center;">
                                    שנערך ונחתם ביום 20<?php echo date('y'); ?> <?php echo date('M'); ?> <?php echo date('d'); ?>
                                   
                                   </p>
                                   
                                   
                                   <br>

                                
                              <b><p style="text-align:right !important;">  <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">	גולדנרוד  בע"מ ח.פ. 513578674 (להלן: "החברה") 
 </div> <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> בין  </div></p></b> <br>

                                  
                                  <p class="dct" style='text-align:right !important;'>	<div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> מרח' יד חרוצים 12 , תל אביב  </div>  <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"></div> </p><br>

                                <p class="dct" style="text-align:right !important;">
                                    
                                    <b>
                                    
                             <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">    <?php if(!empty($businessThird2)){ echo $businessThird2['company_name']; }?>	    ח.פ    <?php if(!empty($businessThird2)){ echo $businessThird2['company_id']; }?>  (להלן: "הלקוח")  </div>
                                    <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">      לבין&emsp;&emsp; </div>	
                                    </b>
                                 </p> <br>
                                   
                          <p class="dct" style="text-align:right !important;">           
                                 <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">       כתובת החברה <?php if(!empty($businessThird2)){ echo $businessThird2['company_address']; }?>
                          
                                 </div>
                                 
                                 <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"></div>
                          
                          </p>
                                   <br>
                                   
<p class="dct" style="text-align:right !important;"> 

<div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">

והחברה עוסקת במתן שירותי אשראי והינה בעלת רישיון למתן אשראי כהגדרתו בחוק הפיקוח על שירותים פיננסיים (שירותים פיננסיים מוסדיים), התשע"ו-2016;
</div>

<div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> <b> הואיל </b></div>
</p> <br>

<p class="dct"  style="text-align:right !important;">
    
    
    <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">והחברה הנפיקה ללקוח, לבקשתו, כתב ערבות שמספרו  <b><span id="orderIdNumber" class="span_text"></span></b>
   
   (להלן: "כתב הערבות"), לטובת  <b><span id="vendorname" class="span_text"><?php echo $businessThird5['property_owner_name'];?></span></b> (להלן: "המוטב"), על סך  <b><span id="clientAmount" class="span_text"></span></b> ₪
   
  (להלן: "סכום הערבות"),המצורף בזאת  <b>כנספח א' </b>להסכם זה;

    </div>

    <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> <b>הואיל</b></div>
   

    
                              <!--    והערב הנפיקה ללקוח, לבקשתו, כתב ערבות שמספרו <b><span id="orderIdNumber" class="span_text"></span></b> (להלן: "כתב הערבות"), לטובת   

                                    <b>המוטב</b>, על סך <b><span id="clientAmount" class="span_text"></span></b> ₪ (להלן: "סכום הערבות"), המצורף בזאת כנספח א' להסכם זה;  <br><b>והואיל </b>

                                     וברצון הצדדים להגדיר ולהסדיר את החובות אשר יחולו עליהם בקשר עם חילוט כתב הערבות ע"י  

                                     המוטב. <br> -->
</p><br>
                    <p class="dct" style="text-align:right !important;"> 
                    
                    <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">
                    והוסכם בין הלקוח לבין החברה כי במקרה של חילוט (מימוש)  כתב הערבות על ידי המוטב, ישפה (יפצה ) הלקוח את החברה, כמפורט בהסכם זה להלן;
                    
                    </div>
                    
                    <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> <b>הואיל </b></div>
                    </p><br>  
                    
                    
                    <p class="dct" style="text-align:right !important;"> 
                    
                    <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">
                    וברצון הצדדים להגדיר ולהסדיר את התחייבויות השיפוי של הלקוח במקרה של  חילוט כתב הערבות ע"י המוטב.
                    </div>
                    <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> <b>הואיל </b></div>
                    
                    </p><br>  

                   <p class="dct" style="text-align:center !important;">  
                  <div class="col-md-12" style="text-align:center !important;"> 
                 <b> לפיכך הוסכם, הוצהר והותנה בין הצדדים כדלקמן:</b>
                   </div>
                   </p><br>
                                    

                              <p style="text-align:right !important;"> <div class="col-md-9" style="text-align:right !important;"> </div> <div class="col-md-3" style="text-align:right !important;"> 1. &emsp;  <u>מבוא ונספחים</u> &emsp; </div> </p>   

                                  <p class="dct" style="text-align:right !important;"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> המבוא להסכם זה וכן הנספחים המצורפים אליו מהווים חלק בלתי נפרד הימנו . </div>
                                      <div class="col-md-1" style="text-align:right !important;">     &emsp;   1.1. &emsp;   </div>
                                     </p><br>

                              <p class="dct" style="text-align:right !important;">    <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> כותרות הסעיפים נועדו לצורך הנוחיות בלבד ואין לפרש תנאי מתנאי ההסכם לפיהן.</div>
                                     
                                     
                                     
                                <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">     &emsp;   1.2. &emsp;   </div>
                                     
                                     </p><br>
                                   
                                     <p class="dct" style="text-align:right !important;"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">
                                    
                                       הצדדים מצהירים כי אין עליהם כל הגבלה, בין בהסכם, בין על פי דין ובין בכל אופן אחר,
המונעת מכל אחד מהם או מגבילה אותו מלהתקשר בהסכם זה ו/או למלא את הוראותיו.

                                    </div>

                                    <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">     &emsp;   1.3. &emsp;   </div>

                                    </p> <br>

                                    <p style="text-align:right !important;">
                                        
                                        
                                         <div class="col-md-9" style="text-align:right !important;"> </div> <div class="col-md-3" style="text-align:right !important;"> 2. &emsp;  <u>   ההתקשרות  </u> &emsp; </div> </p


<p class="dct" style="text-align:right !important;"> 

    <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">   במסגרת ההתקשרות הכללית בין הצדדים, החברה הנפיקה לבקשת הלקוח את כתב
ערבות, אשר פרטיו מפורטים במבוא להסכם זה, לטובתו של המוטב, ובו התחייבה
להעביר לידי המוטב את סכום הערבות במקרה שבו יבקש המוטב לממש את כתב
הערבות. </div>
    <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">     &emsp;   2.1. &emsp;   </div>
</p><br>


<p class="dct" style="text-align:right !important;"> 

    <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">   במקרה של מימוש כתב הערבות ע&קוות;י המוטב, מכל סיבה שהיא, הלקוח ישלם לחברה כל
סכום אותו תידרש החברה לשלם למוטב וזאת תוך 7 ימים ממועד דרישתה הראשונה. כל
סכום שלא ישולם לחברה במועד כאמור לעיל ישא ריבית פיגורים בשיעור שנתי של % 6.5
החל מתום 7 הימים כאמור ועד למועד תשלומו לחברה בפועל וריבית כנ&קוות;ל שתתרבה
במשך כל חודש או במשך כל תקופה אחרת כפי שיהיה נהוג אצל החברה מפעם לפעם
תישא אף היא ריבית בשיעור כאמור, וזאת מבלי לפגוע בזכויות החברה לנקוט בכל
הסעדים המוקנים לה בהתאם להוראות כל דין </div>
    <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">     &emsp;   2.2. &emsp;   </div>
</p><br>

<br>
<p class="dct" style="text-align:right !important;"> 

    <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">  במקרה של מימוש כתב הערבות ע"י  המוטב, יוכל החייב, על פי שיקול דעתו, להשתמש בהפניית החברה לחברת טריא לצורך קבלת הלוואה בריבית שנתית קבועה של 9% לתקופה של 18 חודשים וזאת לשם פירעון הסכומים שהוא חייב לחברה על פי הסכם זה. או לפרוע את חובו לחברה בכל דרך אחרת שהיא. בכל מקרה, מוסכם כי חברת טריא אינה מחוייבת להעמדת הלוואה ללקוח והעמדת ההלוואה כפופה לשיקול דעתה הבלעדי של טריא בהתאם לנהליה ולעקרונות החיתום שלה. למנוע ספק, אי העמדת הלוואה על ידי טריא כאמור לעיל לא יפגע בהתחייבויות הלקוח לפרוע לחברה את הסכומים בהם הוא מחוייב על פי הסכם זה במלואם ובמועד שנקבע לתשלומם. </div>
    <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">     &emsp;   2.3. &emsp;   </div>
</p><br>

<br>
<p class="dct" style="text-align:right !important;"> 

    <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">  להבטחת קיום מלוא התחייבויות הלקוח לשיפוי החברה על פי הסכם זה תימסר לחברה ערבותם של הערב/ים כמפורט בנספח ב' להסכם (להלן: "הערבים"). </div>
    <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">    &emsp;   2.4. &emsp;   </div>
</p><br>
<br>
                                     
  <p class="dct" style="text-align:right !important;"> 

    <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">  
    נחתם נספח ב' על ידי שני ערבים או יותר, יהיו כל הערבים החתומים עליו  ערבים ביחד ולחוד לכל התחייבויות הלקוח על פי הסכם זה באופן שבו כל אחד מהם יחויב להעביר לידי החברה את מלוא סכום הערבות כמפורט בסעיף 2.2, וזאת במקרה בו הלקוח לא יפרע לחברה את מלוא הסכומים שהוא  חייב בהם על פי הסכם זה, לרבות במקרה בו הלקוח לא יוכל לקבל הפנייה לקבלת הלוואה ו/או הלוואתו לא תאושר על ידי חברת טריא
    </div>
    <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">     &emsp;   2.5. &emsp;   </div>
</p><br>                                  
                                   
                                     
                                    <p style="text-align:right !important;"> 
                                    
                                    
                                    <div class="col-md-9" style="text-align:right !important;"> </div>
                                    
                                    <div class="col-md-3" style="text-align:right !important;"> 3. &emsp;  <u>   מצגי הלקוח  </u> &emsp; </div>

                                    </p>
<!-- Below code iis need to update -->
                                   
                                   
                                <p class="dct"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">   העמדת סכום הערבות על פי כתב הערבות הינה בהתבסס על הצהרותיו של הלקוח כאמור
בסעיף זה להלן וכן בהתבסס על התחייבויותיו של הלקוח בסעיף ‏4 להלן:
</div>

<div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">  </div>
</p><br>

                                    <p class="dct"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> היא חברה פרטית אשר נתאגדה ונרשמה כדין במדינת ישראל והיא פעילה וקיימת.
                                         </div>
                                         
                                         <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> &emsp; 3.1. &emsp;</div>
                                      </p><br>
                                      
                                      
                                         <p class="dct"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">
                                               התקבלו ההחלטות הנדרשות באורגנים המוסמכים של הלקוח לצורך חתימתו על הסכם זה וחתימת הלקוח על הסכם זה אינה עומדת בניגוד למסמכי ההתאגדות של הלקוח.
                                            </div>
                                            
                                            <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">&emsp; 3.2. &emsp;</div>

                                      </p><br>
                                      
                                        <p class="dct"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">  כל התחייבויותיו של הלקוח בהסכם זה הינן חוקיות, תקפות, וניתנות לאכיפה כנגד הלקוח
על פי תנאי הסכם זה.
                                        </div>
                                        
                                        <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">&emsp; 3.3. &emsp;</div>
                                     </p><br> 
                                     
                                     <p class="dct"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> 
                                     הוא בעל האמצעים הכלכליים לעמוד בהתחייבויותיו לשיפוי החברה  כאמור בהסכם זה.
                                        </div>
                                        
                                        <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">&emsp; 3.4. &emsp;</div>
                                     </p><br> 
                                      
                                      
                                       <p class="dct"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> 
                                          כי לא תלויה ועומדת נגדו תובענה כל שהיא בערכאה משפטית כל שהיא, כי אין הוא מעורב
בהליך משפטי כל שהוא בין כתובע או כנתבע או בצורה אחרת כל שהיא הקשורה ו/או
בעלת השלכה לגבי הסכם זה.
                                        </div>
                                        
                                        <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">&emsp; 3.5. &emsp;</div>
                                     </p><br> 
                                     
                                     
                                     <p class="dct"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> 
                                          לא נפתחו ולא מתקיימים לגביו הליכי חדלות פירעון כמשמעותם בסעיף 2 לחוק חדלות פירעון ושיקום כלכלי, תשע"ח-2018 . 
                                        </div>
                                        
                                        <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">&emsp; 3.6. &emsp;</div>
                                     </p><br> 
                                     
                                     
                                     <p class="dct"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> 
                                          הוא אינו מוכר כחייב מוגבל באמצעים, כמשמעותו בסעיף 69ג לחוק ההוצאה לפועל, תשכ"ז-1967 (להלן: "חוק ההוצאה לפועל") ו/או חייב המשתמט מתשלום חובו כמשמעותו בסעיף 66 א' לחוק ההוצאה לפועל ואינו כלול במרשם החייבים המשתמטים נשוא סעיף 66 ו' לחוק ההוצאה לפועל.   
                                        </div>
                                        
                                        <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">&emsp; 3.7. &emsp;</div>
                                     </p><br> 
                                      
                                      
                                      <p class="dct"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> 
                                          הוא אינו מוכר כלקוח מוגבל או לקוח אשר חשבונו הוגבל  עפ"י סעיף 2 לחוק חוק שיקים ללא כיסוי, תשמ"א-1981 (להלן: "חוק שיקים ללא כיסוי") ו/או אינו מוגדר כלקוח מוגבל חמור בהתאם לסעיף 3  לחוק שיקים ללא כיסוי.   
                                        </div>
                                        
                                        <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">&emsp; 3.8. &emsp;</div>
                                     </p><br> 
                                      
                             <p style="text-align:right !important;"> 
                                    
                                    
                                    <div class="col-md-8" style="text-align:right !important;"> </div>
                                    
                                    <div class="col-md-4" style="text-align:right !important;"> 4. &emsp;  <u>   חייבויות הלקוח  </u> &emsp; </div>

                                    </p>

                                  <p class="dct"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> 
                                             הלקוח יידע את החברה ללא דיחוי במקרה בו אחד מהמצגים המנויים בהסכם זה יחדול
מלהתקיים 
                                        </div>
                                        
                                        <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">&emsp; 4.1. &emsp;</div>
                                     </p><br> 
                                     
                                     
                                <p class="dct"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> 
                                             הלקוח ימציא לחברה, מיד לפי דרישתה הראשונה, כל רישיון, אישור, תעודה, קבלה או כל מסמך אחר, שלדעת החברה יהיו דרושים או רצויים לשם הוכחת קיום התחייבויותיו של הלקוח על פי הסכם זה.  
                                        </div>
                                        
                                        <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">&emsp; 4.2. &emsp;</div>
                                     </p><br> 
                                     
                                     
                                      <p class="dct"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> 
                                           הלקוח ישלם לחברה את מלוא הסכומים שהוא חייב בהם על פי הסכם זה ובמועדים כאמור בסעיף ‎2.2 לעיל.
                                        </div>
                                        
                                        <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">&emsp; 4.3. &emsp;</div>
                                     </p><br> 

                                    <p class="dct"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> 
                                         מבלי לפגוע באמור בסעיף ‎4.3 לעיל, הלקוח יפצה וישפה את החברה, לפי דרישתה הראשונה, בגין כל סכום ו/או הוצאה ו/או תשלום מכל סוג שהוא לרבות שכ"ט עו"ד שיהיו לחברה, במישרין ובעקיפין, בקשר עם גביית הסכומים שהלקוח חייב בהם על פי הסכם זה, לרבות בגין הליכים שהחברה תידרש לנקוט כנגד הערבים, ככל שקיימים. כל סכום שלא ישולם לחברה כאמור לעיל ישא ריבית והפרשי הצמדה על פי חוק החל ממועד הוצאתו על ידי החברה ועד למועד השבתו לחברה בפועל. 
                                        </div>
                                        
                                        <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">&emsp; 4.3. &emsp;</div>
                                     </p><br> 
                                     
                                     
                                   <p style="text-align:right !important;"> 
                                    
                                    
                                    <div class="col-md-9" style="text-align:right !important;"> </div>
                                    
                                    <div class="col-md-3" style="text-align:right !important;"> 5. &emsp;  <u>   כללי  </u> &emsp; </div>

                                    </p>   
                                     

                                <p class="dct"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> 
                                        ספרי החברה ישמשו כראייה קבילה כלפי הלקוח.

                                  </div>
                                        
                                        <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">&emsp; 5.1. &emsp;</div>
                                     </p><br>     

                                   
                                   <p class="dct"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> 
                                       כל שינוי ו/או תיקון להסכם זה ייעשה בכתב בלבד וייחתם על ידי כל הצדדים להסכם.


                                  </div>
                                        
                                        <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">&emsp; 5.2. &emsp;</div>
                                     </p><br>     
                                   
                                   
                                   <p class="dct"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> 
                                     
                                     זכויות הלקוח על פי הסכם זה ו/או זכויות המוטב על פי כתב הערבות אינן ניתנות להעברה ו/או להסבה לצד שלישי ללא קבלת הסכמת החברה בכתב ומראש. כל העברה ו/או הסבה כאמור ללא הסכמת החברה מראש ובכתב תהא חסרת תוקף.

                                  </div>
                                        
                                        <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">&emsp; 5.3. &emsp;</div>
                                     </p><br>  
                                  
                                    
                                    
                                    <p class="dct"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> 
                                      זכויות ו/או התחייבויות החברה ניתנות להעברה ו/או להסבה לטובת גורם אחר המוסמך על פי החוק להעמיד ערבויות והלקוח נותן בזאת את הסכמתו מראש לכך ומוותר בזאת על הצורך במתן הודעה של החברה בדבר העברה ו/או הסבה כאמור לעיל.
                                  </div>
                                        
                                        <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">&emsp; 5.4. &emsp;</div>
                                     </p><br>    
                                    
                                    
                                    <p class="dct"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> 
                                     בהסדר זה לשון רבים גם לשון יחיד במשמע ולהיפך ושימוש בלשון זכר או נקבה, יכלול את שני המינים, בהתאם.
                                  </div>
                                        
                                        <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">&emsp; 5.5. &emsp;</div>
                                     </p><br>    
                                     
                                     
                                      <p class="dct"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> 
                                            נקיטתו של סעד כזה או אחר ע"י החברה או אי הפעלת זכות או סעד המוקנים לה על פי הסכם זה, לא תיחשב כויתור על שימוש בסעד אחר או כמחילה על כל הפרה מצד הלקוח בקשר לאיזו מהתחייבויותיו. וויתור או מחילה על הפרה בעת כלשהי, לא תיחשב כויתור או מחילה על הפרה שתיעשה בעתיד.
                                  </div>
                                        
                                        <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">&emsp; 5.6. &emsp;</div>
                                     </p><br>    
                                     
                                     
                                      <p class="dct"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> 
                                        הדין הישראלי יחול באופן בלעדי על הסכם זה, וסמכות השיפוט הבלעדית בכל הקשור להסכם זה תהיה מסורה לבתי המשפט המוסמכים בתל אביב - יפו.
                                  </div>
                                        
                                        <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">&emsp; 5.7. &emsp;</div>
                                     </p><br>    
                                     
                                     
                                       <p class="dct"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> 
                                        אם ייקבע ע"י ערכאה מוסמכת כי הוראה מהוראות הסכם זה אינה ניתנת לאכיפה ו/או הינה חסרת תוקף מטעם כלשהו, לא יהא בכך כדי לפגום ו/או לבטל את תוקפן של יתר הוראות ההסכם.
                                  </div>
                                        
                                        <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">&emsp; 5.8. &emsp;</div>
                                     </p><br>    

  
 
                         <p class="dct"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> 
                                        בהתאם לחוק הגנת הפרטיות התשמ"א1981- כל הפרטים שהלקוח מסר ו/או ימסור לחברה ישמשו אותה כמקובל בעבודתה השוטפת לפי שיקול דעתה; וכי כל הפרטים שהלקוח מסר ו/או ימסור לחברה ייאגרו על פי צרכי החברה במאגרי המידע של החברה ו/או של מי שקשור לחברה מעת לעת בשרותי מחשב, עיבוד נתונים ומאגרי מידע.
                                  </div>
                                        
                                        <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">&emsp; 5.9. &emsp;</div>
                                     </p><br>   <br>    

                        <p class="dct"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> 
                        
                        הודעה שתישלח על פי כתובות הצדדים במבוא להסכם זה או כל מען אחר בישראל עליו יודיע מי מהצדדים למשנהו בכתב כעל כתובתו לצורך הסכם זה בדואר רשום, תיחשב כאילו הגיעה לצד שכנגד ולידיעתו תוך 3 ימים מיום שיגורה בדואר רשום מבית דואר בישראל ואם נמסרה ביד – בעת מסירתה, ואם שוגרה בפקס או בדוא"ל – תוך 24 שעות ממועד שיגורה
                        
                          </div>
                                        
                                        <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">&emsp; 5.10. &emsp;</div>
                                     </p>   
  
<br>
                                 <p class="dct" style="width:100%; text-align:center;"> 
                                   <div class="col-md-12" style="width:100%; text-align:center;">
                                  <b>
                                 ולראיה באו הצדדים על החתום:
                                 </b>
                                </div>
                                    </p>
<br>
</div>
                                 <p class="dct">
                                     
                                      <div class="col-md-12" style="text-align: center; margin-top:10px;"> <b> הלקוח</b> </div>
                                     
                                      <div class="col-md-12" style="text-align:right !important;">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4"> <img src="<?php echo base_url() ?>website_assets/img/sign1.png" class="img-responsive" style="margin: 0 auto;">  </div>
                                        <div class="col-md-4"></div>
                                    </div>
                                    
                                    <p class="dct"> <div class="col-md-12" style="text-align: center;"> <b> החברה</b> </div> </p>

                                   </p>

                                    <br>

                                    <p>

                                </div>
                                
                    <?php }else{ ?>
                    
                    <!------- Company not LTD ------------>
                    
                      <p style="margin: 10px 0px 0px 0px;">אני, החתום מטה, <span id="fullName" class="span_text"></span> בעל ת.ז. מס' <span id="clientId" class="span_text"></span>, מאשר ומצהיר כמפורט להלן:  <br>1.    ידוע לי  כי תשלום העמלה לגולדנרוד פיננסים בע"מ, ח.פ. 513578674 (להלן: "גולדנרוד") בגין העמדת  הערבות (להלן: "העמלה") באמצעות הלוואה זו ומימון העמלה בדרך של קבלת הלוואה באמצעות טריא פי2פי   בע"מ (ח.פ. 515024131 )  או טריא קהילה פיננסית בע"מ (ח.פ. 515928034) (שתי החברות יקראו להלן: "טריא") הן עסקאות נפרדות. <br>

                                     2. אני מצהיר ומאשר שסכום ההלוואה יועבר במישרין  לגולדנרוד ובחתימתי על נספח זה אני מסכים לכל תנאי  ההלוואה וכן לכל תנאי האתר שבאמצעותו אקבל את ההלוואה ואני מורה לטריא להעביר את סכום ההלוואה  כאמור. 

                                     <br>

                                     3.  אני מאשר שידוע לי שטריא אינה שותפה או ערבה בצורה כלשהי לעסקי גולדנרוד, ואינה צד לעסקה זו, ולפיכך טענות הנוגעות לעמלה או טענות אחרות שעלולות להיות לי כלפי, לרבות בקשר עם העמלה, לא יהוו   עילה לאי תשלום ההלוואה ולא יפטרו אותי מתשלום החזרי ההלוואה לטריא. 

                                    </p>

                                      <p style="margin: 30px 40px 0px 0px;text-align: center;">

                                        <!--<b>שם החברה: </b><span id="nextfullName" class="span_text"></span> <b>חתימה דיגיטלית:  </b>-->
                                          
                                          <b>שם החברה: </b> <?php if(!empty($businessThird2)){ echo $businessThird2['company_name']; } ?> <b>שם החותם: </b> <?php if(!empty($businessThird1)){ echo $businessThird1['first_name'].' '.$businessThird1['last_name']; } ?> <b>חתימה דיגיטלית:</b>
                                      </p>
                                </div>

                                <!-- modal 3 -->
                                <div class="col-md-10 rtl" id="modal3Div" style="text-align: center;">
                                    <div id='document_content'>
                                   <p style="margin: 10px 0px 0px 0px; text-align: center;">
                                    שנערך ונחתם ביום 20<?php echo date('y'); ?> <?php echo date('M'); ?> <?php echo date('d'); ?>
                                   
                                   </p>
                                   
                                   
                                   <br>

                                
                              <b><p style="text-align:right !important;">  <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">	גולדנרוד  בע"מ ח.פ. 513578674 (להלן: "החברה") 
 </div> <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> בין  </div></p></b> <br>

                                  
                                  <p class="dct" style='text-align:right !important;'>	<div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> מרח' יד חרוצים 12 , תל אביב  </div>  <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"></div> </p><br>

                                <p class="dct" style="text-align:right !important;">
                                    
                                    <b>
                                    
                             <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">    <?php if(!empty($businessThird2)){ echo $businessThird2['company_name']; }?>	  מספר עוסק       <?php if(!empty($businessThird2)){ echo $businessThird2['company_id']; }?>  (להלן: "הלקוח")  </div>
                                    <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">      לבין&emsp;&emsp; </div>	
                                    </b>
                                 </p> <br>
                                   
                          <p class="dct" style="text-align:right !important;">           
                                 <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">   מרח' <?php if(!empty($businessThird2)){ echo $businessThird2['company_address']; }?>
                          
                                 </div>
                                 
                                 <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"></div>
                          
                          </p>
                                   <br>
                                   
<p class="dct" style="text-align:right !important;"> 

<div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">
    והחברה עוסקת במתן שירותי אשראי והינה בעלת רישיון למתן אשראי כהגדרתו בחוק הפיקוח על שירותים פיננסיים (שירותים פיננסיים מוסדיים), התשע"ו-2016;
</div>

<div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> <b> הואיל </b></div>
</p> <br>

<p class="dct"  style="text-align:right !important;">
    
    
    <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">והחברה הנפיקה ללקוח, לבקשתו, כתב ערבות שמספרו  <b><span id="orderIdNumber" class="span_text"></span></b>
   
   (להלן: "כתב הערבות"), לטובת  <b><span id="vendorname" class="span_text"><?php echo $businessThird5['property_owner_name'];?></span></b> (להלן: "המוטב"), על סך  <b><span id="clientAmount" class="span_text"></span></b> ₪
   
  (להלן: "סכום הערבות"),המצורף בזאת  <b>כנספח א' </b>להסכם זה;

    </div>

    <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> <b>הואיל</b></div>
   

    
                              <!--    והערב הנפיקה ללקוח, לבקשתו, כתב ערבות שמספרו <b><span id="orderIdNumber" class="span_text"></span></b> (להלן: "כתב הערבות"), לטובת   

                                    <b>המוטב</b>, על סך <b><span id="clientAmount" class="span_text"></span></b> ₪ (להלן: "סכום הערבות"), המצורף בזאת כנספח א' להסכם זה;  <br><b>והואיל </b>

                                     וברצון הצדדים להגדיר ולהסדיר את החובות אשר יחולו עליהם בקשר עם חילוט כתב הערבות ע"י  

                                     המוטב. <br> -->
</p><br>
                    <p class="dct" style="text-align:right !important;"> 
                    
                    <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">

                        והוסכם בין הלקוח לבין החברה כי במקרה של מימוש  כתב הערבות על ידי המוטב, יפצה הלקוח את החברה, כמפורט בהסכם זה להלן;
                    
                    </div>
                    
                    <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> <b>הואיל </b></div>
                    </p><br>  
                    
                    
                    <p class="dct" style="text-align:right !important;"> 
                    
                    <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">
                        וברצון הצדדים להגדיר ולהסדיר את התחייבויות השיפוי של הלקוח במקרה של  חילוט כתב הערבות ע"י המוטב.
                    </div>
                    <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> <b>הואיל </b></div>
                    
                    </p><br>  

                   <p class="dct" style="text-align:center !important;">  
                  <div class="col-md-12" style="text-align:center !important;"> 
                 <b> לפיכך הוסכם, הוצהר והותנה בין הצדדים כדלקמן: </b>
                   </div>
                   </p><br>
                                    

                              <p style="text-align:right !important;"> <div class="col-md-9" style="text-align:right !important;"> </div> <div class="col-md-3" style="text-align:right !important;"> 1. &emsp;  <u>מבוא ונספחים</u> &emsp; </div> </p>   

                                  <p class="dct" style="text-align:right !important;"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> המבוא להסכם זה וכן  הנספחים המצורפים אליו מהווים חלק בלתי נפרד הימנו . </div>
                                      <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">     &emsp;   1.1. &emsp;   </div>
                                     </p><br>

                              <p class="dct" style="text-align:right !important;">    <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> כותרות הסעיפים נועדו לצורך הנוחיות בלבד ואין לפרש תנאי מתנאי ההסכם לפיהן.</div>
                                     
                                     
                                     
                               <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">    &emsp;   1.2. &emsp;   </div>
                                     
                                     </p><br>
                                   
                                     <p class="dct" style="text-align:right !important;"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">
                                    
                                       הצדדים מצהירים כי אין עליהם כל הגבלה, בין בהסכם, בין על פי דין ובין בכל אופן אחר, המונעת מכל אחד מהם או מגבילה אותו מלהתקשר בהסכם זה ו/או למלא את הוראותיו.


                                    </div>

                                    <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">     &emsp;   1.3. &emsp;   </div>

                                    </p> <br>

                                    <p style="text-align:right !important;">
                                        
                                        
                                         <div class="col-md-9" style="text-align:right !important;"> </div> <div class="col-md-3" style="text-align:right !important;"> 2. &emsp;  <u>   ההתקשרות  </u> &emsp; </div> </p


<p class="dct" style="text-align:right !important;"> 

    <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">   במסגרת ההתקשרות הכללית בין הצדדים, החברה הנפיקה לבקשת הלקוח את כתב ערבות, אשר פרטיו מפורטים במבוא להסכם זה, לטובתו של  המוטב, ובו התחייבה להעביר לידי  המוטב את סכום הערבות במקרה שבו יבקש המוטב לממש את כתב הערבות. </div>
   <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">    &emsp;   2.1. &emsp;   </div>
</p><br>


<p class="dct" style="text-align:right !important;"> 

    <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">  במקרה של מימוש כתב הערבות ע"י  המוטב, מכל סיבה שהיא, הלקוח ישלם לחברה  כל סכום אותו תידרש החברה לשלם למוטב  וזאת תוך 7 ימים ממועד דרישתה הראשונה. כל סכום שלא ישולם לחברה במועד כאמור לעיל ישא ריבית פיגורים בשיעור שנתי של 12% החל מתום 7 הימים כאמור ועד למועד תשלומו לחברה בפועל וריבית כנ"ל שתתרבה במשך כל חודש או במשך כל תקופה אחרת כפי שיהיה נהוג אצל החברה מפעם לפעם תישא אף היא ריבית בשיעור כאמור,  </div>
    <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">    &emsp;   2.2. &emsp;   </div>
</p><br>

<br>
<p class="dct" style="text-align:right !important;"> 

    <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">  במקרה של מימוש כתב הערבות ע"י  המוטב, יוכל החייב, על פי שיקול דעתו, להשתמש בהפניית החברה לחברת טריא לצורך קבלת הלוואה בריבית שנתית קבועה של 9% לתקופה של 18 חודשים וזאת לשם פירעון הסכומים שהוא חייב לחברה על פי הסכם זה, או לפרוע את חובו לחברה בכל דרך אחרת שהיא. בכל מקרה, מוסכם כי חברת טריא אינה מחוייבת להעמדת הלוואה ללקוח והעמדת ההלוואה כפופה לשיקול דעתה הבלעדי של טריא, בהתאם לנהליה ולעקרונות החיתום שלה. למנוע ספק, אי העמדת הלוואה על ידי טריא כאמור לעיל לא יפגע בהתחייבויות הלקוח לפרוע לחברה את הסכומים בהם הוא מחוייב על פי הסכם זה במלואם ובמועד שנקבע לתשלומם. </div>
    <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">     &emsp;   2.3. &emsp;   </div>
</p><br>

<br>

                                     
                                  
                                   
                                     
                                    <p style="text-align:right !important;"> 
                                    
                                    
                                    <div class="col-md-9" style="text-align:right !important;"> </div>
                                    
                                    <div class="col-md-3" style="text-align:right !important;"> 3. &emsp;  <u>  מצגי הלקוח  </u> &emsp; </div>

                                    </p>
<!-- Below code iis need to update -->
                                   
                                   
                                <p class="dct"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">
								
								העמדת סכום הערבות על פי כתב הערבות הינה בהתבסס על הצהרותיו של הלקוח כאמור בסעיף זה להלן וכן בהתבסס על התחייבויותיו של הלקוח בסעיף ‏4 להלן:
</div>

<div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">  </div>
</p><br>

                                    <p class="dct"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> כי הינו עוסק מורשה  אשר נרשם כעוסק מורשה לפי חוק מס ערך מוסף, תשל"ו-1975 והינו פעיל וקיים. 
                                         </div>
                                         
                                         <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> &emsp; 3.1. &emsp;</div>
                                      </p><br>
                                      
                                      
                                         <p class="dct"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">
                                               כל התחייבויותיו של הלקוח בהסכם זה הינן חוקיות, תקפות, וניתנות לאכיפה כנגד הלקוח על פי תנאי הסכם זה. 
                                            </div>
                                            
                                            <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">&emsp; 3.2. &emsp;</div>

                                      </p><br>
                                      
                                        <p class="dct"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">  
הוא בעל האמצעים הכלכליים לעמוד בהתחייבויותיו לשיפוי החברה  כאמור בהסכם זה. 										
                                        </div>
                                        
                                        <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">&emsp; 3.3. &emsp;</div>
                                     </p><br> 
                                     
                                     <p class="dct"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> 
                                    כי לא תלויה ועומדת נגדו תובענה כל שהיא בערכאה משפטית כל שהיא, כי אין הוא מעורב בהליך משפטי כל שהוא בין כתובע או כנתבע או בצורה אחרת כל שהיא הקשורה ו/או בעלת השלכה לגבי הסכם זה.
                                        </div>
                                        
                                        <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">&emsp; 3.4. &emsp;</div>
                                     </p><br> 
                                      
                                      
                                       <p class="dct"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> 
                                         לא נפתחו ולא מתקיימים לגביו הליכי חדלות פירעון כמשמעותם בסעיף 2 לחוק חדלות פירעון ושיקום כלכלי, תשע"ח-2018 . 
                                        </div>
                                        
                                        <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">&emsp; 3.5. &emsp;</div>
                                     </p><br> 
                                     
                                     
                                     <p class="dct"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> 
                                           הוא אינו מוכר כחייב מוגבל באמצעים, כמשמעותו בסעיף 69ג לחוק ההוצאה לפועל, תשכ"ז-1967 (להלן: "חוק ההוצאה לפועל") ו/או חייב המשתמט מתשלום חובו כמשמעותו בסעיף 66 א' לחוק ההוצאה לפועל ואינו כלול במרשם החייבים המשתמטים נשוא סעיף 66 ו' לחוק ההוצאה לפועל.   
                                        </div>
                                        
                                        <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">&emsp; 3.6. &emsp;</div>
                                     </p><br> 
                                     
                                     
                                     <p class="dct"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> 
                                         הוא אינו מוכר כלקוח מוגבל או לקוח אשר חשבונו הוגבל  עפ"י סעיף 2 לחוק חוק שיקים ללא כיסוי, תשמ"א-1981 (להלן: "חוק שיקים ללא כיסוי") ו/או אינו מוגדר כלקוח מוגבל חמור בהתאם לסעיף 3  לחוק שיקים ללא כיסוי.     
                                        </div>
                                        
                                        <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">&emsp; 3.7. &emsp;</div>
                                     </p><br> 
                                      
                                      
                                      
                                      
                             <p style="text-align:right !important;"> 
                                    
                                    
                                    <div class="col-md-8" style="text-align:right !important;"> </div>
                                    
                                    <div class="col-md-4" style="text-align:right !important;"> 4. &emsp;  <u>  התחייבויות הלקוח  </u> &emsp; </div>

                                    </p>

                                  <p class="dct"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> 
                                            הלקוח יידע את החברה ללא דיחוי במקרה בו אחד מהמצגים המנויים בהסכם זה יחדול מלהתקיים.
                                        </div>
                                        
                                        <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">&emsp; 4.1. &emsp;</div>
                                     </p><br> 
                                     
                                     
                                <p class="dct"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> 
                                             הלקוח ימציא לחברה, מיד לפי דרישתה הראשונה, כל רישיון, אישור, תעודה, קבלה או כל מסמך אחר, שלדעת החברה יהיו דרושים או רצויים לשם הוכחת קיום התחייבויותיו של הלקוח על פי הסכם זה.    
                                        </div>
                                        
                                        <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">&emsp; 4.2. &emsp;</div>
                                     </p><br> 
                                     
                                     
                                      <p class="dct"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> 
                                            הלקוח ישלם לחברה את מלוא הסכומים שהוא חייב בהם על פי הסכם זה ובמועדים כאמור בסעיף ‎2.2 לעיל.
                                        </div>
                                        
                                        <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">&emsp; 4.3. &emsp;</div>
                                     </p><br> 

                                    <p class="dct"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> 
                                         מבלי לפגוע באמור בסעיף ‎4.3 לעיל, הלקוח יפצה וישפה את החברה, לפי דרישתה הראשונה, בגין כל סכום ו/או הוצאה ו/או תשלום מכל סוג שהוא לרבות שכ"ט עו"ד שיהיו לחברה, במישרין ובעקיפין, בקשר עם גביית הסכומים שהלקוח חייב בהם על פי הסכם זה. כל סכום שלא ישולם לחברה כאמור לעיל ישא ריבית והפרשי הצמדה על פי חוק החל ממועד הוצאתו על ידי החברה ועד למועד השבתו לחברה בפועל.  
                                        </div>
                                        
                                        <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">&emsp; 4.3. &emsp;</div>
                                     </p><br> 
                                     
                                     
                                   <p style="text-align:right !important;"> 
                                    
                                    
                                    <div class="col-md-9" style="text-align:right !important;"> </div>
                                    
                                    <div class="col-md-3" style="text-align:right !important;"> 5. &emsp;  <u>   כללי  </u> &emsp; </div>

                                    </p>   
                                     

                                <p class="dct"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> 
                                     ספרי החברה ישמשו כראייה קבילה כלפי הלקוח.

                                  </div>
                                        
                                        <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">&emsp; 5.1. &emsp;</div>
                                     </p><br>     

                                   
                                   <p class="dct"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> 
                                      כל שינוי ו/או תיקון להסכם זה ייעשה בכתב בלבד וייחתם על ידי כל הצדדים להסכם.



                                  </div>
                                        
                                        <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">&emsp; 5.2. &emsp;</div>
                                     </p><br>     
                                   
                                   
                                   <p class="dct"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> 
                                     
                                     זכויות הלקוח על פי הסכם זה ו/או זכויות המוטב על פי כתב הערבות אינן ניתנות להעברה ו/או להסבה לצד שלישי ללא קבלת הסכמת החברה בכתב ומראש. כל העברה ו/או הסבה כאמור ללא הסכמת החברה מראש ובכתב תהא חסרת תוקף.

                                  </div>
                                        
                                        <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">&emsp; 5.3. &emsp;</div>
                                     </p><br>  
                                  
                                    
                                    
                                    <p class="dct"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> 
                                     זכויות ו/או התחייבויות החברה ניתנות להעברה ו/או להסבה לטובת גורם אחר המוסמך על פי החוק להעמיד ערבויות והלקוח נותן בזאת את הסכמתו מראש לכך ומוותר בזאת על הצורך במתן הודעה של החברה בדבר העברה ו/או הסבה כאמור לעיל.
                                  </div>
                                        
                                        <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">&emsp; 5.4. &emsp;</div>
                                     </p><br>    
                                    
                                    
                                    <p class="dct"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> 
                                     בהסדר זה לשון רבים גם לשון יחיד במשמע ולהיפך ושימוש בלשון זכר או נקבה, יכלול את שני המינים, בהתאם.
                                  </div>
                                        
                                        <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">&emsp; 5.5. &emsp;</div>
                                     </p><br>    
                                     
                                     
                                      <p class="dct"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> 
                                            נקיטתו של סעד כזה או אחר ע"י החברה או אי הפעלת זכות או סעד המוקנים לה על פי הסכם זה, לא תיחשב כויתור על שימוש בסעד אחר או כמחילה על כל הפרה מצד הלקוח בקשר לאיזו מהתחייבויותיו. וויתור או מחילה על הפרה בעת כלשהי, לא תיחשב כויתור או מחילה על הפרה שתיעשה בעתיד.
                                  </div>
                                        
                                        <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">&emsp; 5.6. &emsp;</div>
                                     </p><br>    
                                     
                                     
                                      <p class="dct"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> 
                                       הדין הישראלי יחול באופן בלעדי על הסכם זה, וסמכות השיפוט הבלעדית בכל הקשור להסכם זה תהיה מסורה לבתי המשפט המוסמכים בתל אביב - יפו.
                                  </div>
                                        
                                        <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">&emsp; 5.7. &emsp;</div>
                                     </p><br>    
                                     
                                     
                                       <p class="dct"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> 
                                        אם ייקבע ע"י ערכאה מוסמכת כי הוראה מהוראות הסכם זה אינה ניתנת לאכיפה ו/או הינה חסרת תוקף מטעם כלשהו, לא יהא בכך כדי לפגום ו/או לבטל את תוקפן של יתר הוראות ההסכם.
                                  </div>
                                        
                                        <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">&emsp; 5.8. &emsp;</div>
                                     </p><br>    

  
 
                         <p class="dct"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> 
                                        בהתאם לחוק הגנת הפרטיות התשמ"א1981- כל הפרטים שהלקוח מסר ו/או ימסור לחברה ישמשו אותה כמקובל בעבודתה השוטפת לפי שיקול דעתה; וכי כל הפרטים שהלקוח מסר ו/או ימסור לחברה ייאגרו על פי צרכי החברה במאגרי המידע של החברה ו/או של מי שקשור לחברה מעת לעת בשרותי מחשב, עיבוד נתונים ומאגרי מידע
                                  </div>
                                        
                                        <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">&emsp; 5.9. &emsp;</div>
                                     </p><br>   <br>    

                        <p class="dct"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> 
                       
					   הודעה שתישלח על פי כתובות הצדדים במבוא להסכם זה או כל מען אחר בישראל עליו יודיע מי מהצדדים למשנהו בכתב כעל כתובתו לצורך הסכם זה בדואר רשום, תיחשב כאילו הגיעה לצד שכנגד ולידיעתו תוך 3 ימים מיום שיגורה בדואר רשום מבית דואר בישראל ואם נמסרה ביד – בעת מסירתה, ואם שוגרה בפקס או בדוא"ל – תוך 24 שעות ממועד שיגורה.
                        
                          </div>
                                        
                                        <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">&emsp; 5.10. &emsp;</div>
                                     </p>   
  
<br>
                                 <p class="dct" style="width:100%; text-align:center;"> 
                                   <div class="col-md-12" style="width:100%; text-align:center;">
                                  <b>
                                 ולראיה באו הצדדים על החתום:
                                 </b>
                                </div>
                                    </p>
<br>
</div>
                                 <p class="dct">
                                     
                                      <div class="col-md-12" style="text-align: center; margin-top:10px;"> <b> הלקוח</b> </div>
                                     
                                      <div class="col-md-12" style="text-align:right !important;">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4"> <img src="<?php echo base_url() ?>website_assets/img/sign1.png" class="img-responsive" style="margin: 0 auto;">  </div>
                                        <div class="col-md-4"></div>
                                    </div>
                                    
                                    <p class="dct"> <div class="col-md-12" style="text-align: center;"> <b> החברה</b> </div> </p>

                                   </p>

                                    <br>

                                    <p>

                                </div>
                    
                    
                    <?php } ?>

                                <!-- signature css -->
                                <link rel="stylesheet" href="<?php echo base_url() ?>website_assets/signature/css/signature-pad.css">
                                
                                <!-- end -->

                                <div class="row">
                                   <div class="col-md-3"></div>
                                   <div class="col-md-6">
                                    <li class="gf_left_third gfield text-field1_application form-group" style="width: 100% !important; margin-top: 25px;">
                                    <!-- <label class="gfield_label control-label" for="client_sign">(חתום כאן בחתימה דיגיטלית (צריך טקסט</label> -->
                                    
                                    <!--<div class="">-->
                                       
                                      <!--  <div id="signature-pad-1" class="signature-pad" style="border: 1px solid rgba(50, 52, 116, 0.5) !important;box-sizing: border-box !important;border-radius: 30px !important;height: 200px; overflow: hidden;" >
                                    <span>
                                        <i class="fa fa-refresh" aria-hidden="true" style="font-size: 14px; padding:5px;" data-action="clear"></i>
                                    </span>
                                            
                                          <div class="signature-pad--body">
                                            <canvas></canvas>
                                          </div>
                                            

                                          <div>
                                             <!--
                                            <button type="button" class="button" data-action="change-color">Change color</button>
                                            <button type="button" class="button" data-action="undo">Undo</button>
                                            
                                            <button type="button" id="save_png" class="button save" data-action="save-png">Save Signature</button> -->

                                          <!--</div>
                                        </div>-->

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
                                      
                                    <!--</div>-->
                                </li>
                                </div>

                                   <div class="col-md-3"></div>
                                </div>
                                
                                  <!-- advance start_new -->

                               <!-- <div class="row" id="newModal3signature">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-10 rtl" style="text-align: right;">
                                   
                                    <p style="margin: 40px 10px 0px 10px;">
                                    <b>נספח ב'</b><br>    
                                    <b>שטר ערבות אישית בהתאם לסעיף 2 להסכם  </b><br>
                                    אני הח"מ, מר/גברת: <?php if(!empty($businessThird1)){ echo $businessThird1['first_name'].' '.$businessThird1['last_name']; }?> ת.ז. <?php if(!empty($businessThird1)){ echo $businessThird1['unique_id']; }?> , <?php if(!empty($businessThird1)){ echo $businessThird1['street'].''.$businessThird1['home_no']; }?> , <?php if(!empty($businessThird1)){ echo $businessThird1['hometown']; }?>, (להלן: " לקוח" או
                                    "הח"מ") ערב/ה באופן אישי ובלתי חוזר ומאשר/ת בזה, כדלקמן:
                                    <br>

                                    
                                    <b>1.</b> ביום <?php echo date('d/m/Y');?> נכרת הסכם שיפוי (להלן: "ההסכם") בין <?php if(!empty($businessThird2)){ echo $businessThird2['company_name']; }?>, ח.פ <?php if(!empty($businessThird2)){ echo $businessThird2['company_id']; }?> (להלן: \12\ 1. ביום 01
                                    "הלקוח") לבין גולדנרוד בע"מ (להלן: "החברה"), במסגרתו התחייבה הלקוחה בסעיף 2, לשלם לחברה
                                    סכומים הנקובים בהסכם (להלן: "תשלום"), במקרה של מימוש כתב הערבות על ידי המוטב (כמוגדר בהסכם),
                                    ב
                                    התאם לתנאים המפורטים בסעיף 2 כאמור.
                                   <br>
                                    <b>2.</b> ככל שהלקוחה לא תקיים את התחייבותה כאמור בסעיף 2 להסכם, הערב/ה ללקוחה מתחייב/ת באופן אישי
                                    ובלתי חוזר, לשלם במקום הלקוחה, כל תשלום שהלקוחה תידרש לשלם לחברה בהתאם למוסכם בין הצדדים
                                    ת
                                    חת ההסכם.
                                   <br>
                                    <b>3.</b> הערב/ה ללקוחה מתחייב/ת לשלם לחברה את התשלום כאמור, מיד עם דרישתה הראשונה של החברה
                                    ו
                                    ללא כל תנאי.
                                   <br>
                                    <b>4.</b> פירעון התשלום ייעשה מיד עם דרישת החברה בכתב ולא יאוחר משבעה ( 7) ימים מיום פניית המוטב
                                    ה
                                    חוקללו/או לחברה בדרישה לתשלום.
                                   <br>
                                    <b>5.</b> אני הח"מ מאשר/ת כי כל הרישומים בספרי הנהלת החשבונות של החברה לגבי התשלום לחברה, יחשבו
                                    נ
                                    כונים וישמשו הוכחה מכרעת כלפי וכלפי הלקוח.
                                   <br>
                                    <b>6.</b> אני מתחייב/ת, כי אני בעל/ת עניין בלקוח (כמוגדר בחוק [ניירות ערך, תשכ"ח 1968- ]) ולא יראו בי ערב/ה
                                    מוגן/ת, ולא תחול עלי כל הגנה שהיא המפורטת בחוק הערבות, תשכ"ז 1967- או על פי כל דין וכי אני מוותר/ת
                                    ע
                                    ל כל תביעה ו/או טענה כלפי החברה.
                                   <br>
                                    <b>7.</b> ידוע לי כי החברה תהא רשאית לצרף ערב/ים נוספים להתחייבות הלקוחה, אולם צירוף ערב/ים נוסף/ים לא
                                    י
                                    גרעו מתוקף התחייבויותיי כלפי הלקוחה.
                                   <br>

                                    <p style="margin: 20px 0px -40px 0px;text-align: center;"> <b>חתימת גולדנרוד (הערבה) </b></p>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4"> <img src="<?php echo base_url() ?>website_assets/img/sign_1.png" class="img-responsive" style="margin: 0 auto;">  </div>
                                        <div class="col-md-4"></div>
                                    </div>
                                    
                                    <p style="margin: 20px 0px 0px 0px;text-align: center;"> <b>חתימה דיגיטלית: </b></p>

                                    </p>
                            
                                 </div>
                                    <div class="col-md-1"></div>
                                

                               

                                   <div class="row">
                                   <div class="col-md-3"></div>
                                   <div class="col-md-6">
                                    <li class="gf_left_third gfield text-field1_application form-group" style="width: 100% !important; margin-top: 25px;">
                        
                                
                                    <div class="">
                                       
                                      <div id="signature-pad-3" class="signature-pad" style="border: 1px solid rgba(50, 52, 116, 0.5) !important;box-sizing: border-box !important;border-radius: 30px !important;height: 200px; overflow: hidden;" >
                                    <span>
                                        <i class="fa fa-refresh" aria-hidden="true" style="font-size: 14px; padding:5px;" data-action="clear3"></i>
                                    </span>
                                            
                                          <div class="signature-pad--body">
                                            <canvas></canvas>
                                          </div>

                                        </div>
                                 </div>
                                 
                                 
                                </li>
                                </div>

                                   <div class="col-md-3"></div>
                                </div>

                                
                            </div>-->
                            
                            
                            <div class="">
                                       
                                      <div id="signature-pad-3" class="signature-pad" style="border: 1px solid rgba(50, 52, 116, 0.5) !important;box-sizing: border-box !important;border-radius: 30px !important;height: 200px; display: none;" >
                                    <span>
                                        <i class="fa fa-refresh" aria-hidden="true" style="font-size: 14px; padding:5px;" data-action="clear3"></i>
                                    </span>
                                            
                                          <div class="signature-pad--body">
                                            <canvas></canvas>
                                          </div>

                                        </div>
                                 </div>

                                <!-- signature js -->
                                <script src="<?php echo base_url() ?>website_assets/signature/js/signature_pad.umd.js"></script>
                                <script src="<?php echo base_url() ?>website_assets/signature/js/app.js"></script>

                                    <!-- end -->

                                <input type="hidden" id="first_bae64_sign" name="first_base64_signature" value="" >

                                <input type="hidden" id="second_bae64_sign" name="second_base64_signature" value="" >
                                <input type="hidden" id="third_bae64_sign" name="third_base64_signature" value="NA" >

                        <!-- SIGNATURE END -->

                                <div class="gform_footer" style="margin: 0 auto;"> 
                                    <!-- first signature button -->
                                    <a class="button gform_button next" id="btnCloseModalPopup2" > <p class="first_modal_button continue_button scr_sec_modal">המשך למסמך הבא </p></a>

                                    <!-- second signature button -->
                                    <a class="button gform_button next" id="btnCloseModalPopup3" > <p class="first_modal_button continue_button new_scr_third_modal">סיים  </p></a>
                                
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
                            <p class="contact-text_application main_text_heading"style="font-weight: bold;">סכום הערבות והסכמים </p>
                           
                             <p class="contact-text_application" style="margin-top: -20px;">השלב הבא: פרטי הנכס  </p>
                         </div>
                         </li>

                    

                    </ul>

                    <div class="row" >

                        <li class="gf_middle_third gfield text-field1_application form-group">
                          
                            <div class="styled-input wide" >
                               <input type="text" name="busineesThird_requested_gurantee_amt" id="busineesThird_requested_gurantee_amt" value="" class="form-control fouth_text" autocomplete="off" required="">

                           <!--     <span id="busineesThird_requested_gurantee_amt_error" style="float: right;" ><font style="vertical-align: inherit;">אנא הזן את המספר </font></span> -->

                                <label class="gfield_label control-label gform_wrapper gfield_label" for="busineesThird_requested_gurantee_amt">סכום הערבות והסכמים  
                            </label>
                            </div> 
                        </li>

                        <li class="gfield gf_left_third text-field2_application form-group">
                       
                            <div class="styled-input wide">
                               <input type="text" name="startDate" id="gur_period_month" value="" class="form-control daterange seventh_text" data-format="MM/DD/YYYY" autocomplete="off" required="">

                              

                                <label class="gfield_label control-label gform_wrapper gfield_label" for="gur_period_month"> תאריך התחלה  
                                     <!-- <i class="fa fa-calendar cal_reponsive2" aria-hidden="true" style="position: relative; left: -318px;"></i> -->
                                    <!--  <img src="<?php echo base_url() ?>website_assets/img/calendar_icon.png" class="img-responsive cal_reponsive2" style="position: relative;left: -150px;top: -28px;"> -->
                            </label>
                                <img src="<?php echo base_url() ?>website_assets/img/calendar_icon.png" class="img-responsive cal_reponsive" >
                            </div> 
                        </li>
                        
                        
                        <li class="gfield gf_left_third text-field1_application form-group">
                       
                            <div class="styled-input wide">
                               <input type="text" name="endDate" id="endDate" value="" class="form-control daterange seventh_text" data-format="MM/DD/YYYY" autocomplete="off" required="">

                                <label class="gfield_label control-label gform_wrapper gfield_label" for="gur_period_month"> תאריך סיום  
                                     <!-- <i class="fa fa-calendar cal_reponsive2" aria-hidden="true" style="position: relative; left: -318px;"></i> -->
                                    <!--  <img src="<?php echo base_url() ?>website_assets/img/calendar_icon.png" class="img-responsive cal_reponsive2" style="position: relative;left: -150px;top: -28px;"> -->
                            </label>
                                <img src="<?php echo base_url() ?>website_assets/img/calendar_icon.png" class="img-responsive cal_reponsive" >
                            </div> 
                        </li>
                        
                        
                        <!-- <span id="span_br"> <br></span> --><br><br><br>
                         <div class="row cale_opn cala_margin1" style='    display: inline-block;'>
                            
                            <div class="col-md-6">
                              <li class="gfield gf_left_third form-group">
                            <div class="first_button_new-text2" id="myBtn2"> 
                       
                                <a class=""> 
                                    <p class="first_button-new first_button_responsive p1_res p3_new" style="margin-top:25px;  margin-left:70px; "> הסכמה למסירת נתוני אשראי </p>
                                </a>
                       
                                <div class="checkbox checkbox-warning primary-box chk2_res p4_new" id="sec_scr_checkbox2" style="margin-right: -34px;float: right;">
                                    <input id="checkbox2" name="checkbox2" type="checkbox" value="">
                                    <label for="checkbox2">
                                       
                                    </label>
                                </div>
                            </div>
                        </li>
                            </div>
                            <div class="col-md-6">
                                <li class="gf_left_third gfield">
                            <div class="first_button_new-text1" id="myBtn1" style="margin-top:0px;"> 
                       
                               <!-- <a>
                                    <p class="first_button-new first_button_responsive p2_res p3_new" style="margin-top:25px; margin-left:20px;"> זכות הלקוח לקבלת דו"ח נתוני האשראי </p>
                                </a>    
                                <div class="checkbox checkbox-primary primary-box chk1_res p4_new" id="sec_scr_checkbox1" style="float: right; margin-right:16px;">
                                    <input id="checkbox1" name="checkbox1" type="checkbox" value="">
                                    <label for="checkbox1">
                                    </label>
                                </div>-->
                                
                                <input id="checkbox1" name="checkbox1" type="checkbox" value="" checked='true' style='display:none;'>
                            </div>
                      

                        </li>

                            </div>
                        
                       
                            <div class="col-md-6"></div>
                            <div class="col-md-6">
                                <li class="gfield gf_left_third form-group">
                            <div class="gform_footer first_button_new-text1" id="myBtn3"> 
                       
                                <a>
                                    <p class="first_button-new first_button_responsive p3_res p3_new" style="margin-left: 21px; margin-top: -8px;"> הסכם שיפוי </p>
                                </a>  
                                  
                                <div class="checkbox checkbox-primary primary-box chk3_res p4_new" id="new_sec_scr_checkbox3" style="float: right;margin-right: 16px;">
                                    <input id="new_btn3_checkbox" name="btn3_checkbox" type="checkbox" value="">
                                    <label for="btn3_checkbox">
                                    </label>
                                </div>
                            </div>
                      

                        </li>
                    </div>
                            
                            
                            </div>
                            
                        </div>
                       

                        <div id="div11" style="color:red;  font-size:17px;"></div>



                       

                        <div class="gform_footer"> 
                      
                            <input type="hidden" id="value_check" name="value_check" value="">
                        <button type="button" class="button gform_button first_button-new continue_button first_next_button lowerbutton1" id="businessThird_3_form" style="height: 60px; width: 328px;">המשך</button>
                        
                        </div>
                        
                         </div>
              </div>
                 
            <!-- first loader obli gif -->
            <div class="sonar-wrapper">
                <div class="sonar-emitter">
                    <img src="<?php echo base_url() ?>website_assets/img/loader.png" style="margin-top: 15px; position: relative; left: -33px;">

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
  

<!-- only for date renge picker -->
<link rel="stylesheet" href="<?php echo base_url() ?>website_assets/date/daterangepicker-bs3.css">
<script src="<?php echo base_url() ?>website_assets/date/moment.min.js"></script>
<script src="<?php echo base_url() ?>website_assets/date/daterangepicker.js"></script>
<!-- // end -->


<script type="text/javascript">
    
    $("#first_bae64_sign").val('NA');

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
    
    var gurant_amm = $("#busineesThird_requested_gurantee_amt").val();
    
    gurant_amm = gurant_amm.replace(",","");
                    
    gurant_amm = parseInt(gurant_amm);
    
    if(gurant_amm > 50000){
        
        //        direct 6 screeen
        $("#value_check").val(1);
        $("#business_5_scr").hide();
        $(".sonar-wrapper").show();
        
        <?php $businessThird2 = $this->session->userdata('businessThird2');
            
            if(!empty($businessThird2)){
                $business_type = $businessThird2['business_type'];
                
                if($business_type == 'חברה בע”מ'){ ?>
//                    location.href = "<?php // echo site_url('business6'); ?>";
                        without_payment_api();
                       // payment_api(); mankant
                    <?php
                }
                else{
                    ?>
                    without_payment_api();
                       // payment_api(); mankant
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
        
        <?php $businessThird2 = $this->session->userdata('businessThird2');
            
            if(!empty($businessThird2)){
                $business_type = $businessThird2['business_type'];
                
                if($business_type == 'חברה בע”מ'){ ?>
//                    location.href = "<?php // echo site_url('business7'); ?>";
                       // without_payment_api();
                       
                        without_payment_api();
                       // payment_api(); mankant
                    <?php
                }
                else{
                    ?>
                     without_payment_api();
                       // payment_api(); mankant
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
                url: "<?php echo site_url('BusinessThird/business_payment_api'); ?>",
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
//                            alert(2);
                            
                            if($("#value_check").val() == 1){
                                $('#myform').submit();
                            }if($("#value_check").val() == 2){
                                $('#myform').submit();
                            }
                                
                        }
                        else
                        {
                           location.href = "<?php echo site_url('businessThirdBadResponse'); ?>";
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
                url: "<?php echo site_url('BusinessThird/business_without_payment_api'); ?>",
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
                    if($("#value_check").val() == 1){
                        $('#myform').submit();
                    }if($("#value_check").val() == 2){
                        $('#myform').submit();
                    }
                    
                    return false;
                    
                },
                error: function () {
                }
            });
}

$("#btnCloseModalPopup5").click(function () {
    $("#myModal5").modal("hide");
});



 $("#btnCloseModalPopup1").click(function () {
    
        if( signaturePad1.isEmpty()){
            $("#first_bae64_sign").val('');
          console.log('signature1 is empty');
          alert('please fill signature first.');
          return false;
        }
        
       
        var data2 = signaturePad1.toDataURL('image/png');
        $('#first_bae64_sign').val(data2);
        
        
        
        
        
        if($("#first_bae64_sign").val() != '')
        {
           
            $("#myModal1").modal("hide");
        }
        
        
        if($("#busineesThird_requested_gurantee_amt").val() != '' && $("#gur_period_month").val() != '' && $("#endDate").val() != '' && $("#first_bae64_sign").val() != '' && $("#second_bae64_sign").val() != '' && $("#third_bae64_sign").val() != '' ){


var documentcontent = $("#document_content").html();
         
         var basesisryfourhtml = btoa(unescape(encodeURIComponent(documentcontent)));
         
         $('#documenthtml').val(basesisryfourhtml);

            $("#businessThird_3_form").css("opacity","1");
            $("#businessThird_3_form").css("cursor","pointer");
            $("#businessThird_3_form").prop("disabled", false);

        }else{

            $("#businessThird_3_form").css("opacity","0.5");
            $("#businessThird_3_form").css("cursor","auto");
            $("#businessThird_3_form").prop("disabled", true);
        }
          
    });


var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
var element = document.getElementById('text');

if (isMobile) {
    
    $(".first_modal_button").css("opacity","1");
    $(".first_modal_button").css("cursor","pointer");
    
//    first signature
    $("#btnCloseModalPopup2").click(function () {
    
        if( signaturePad1.isEmpty()){
          console.log('signature1 is empty');
          alert('please fill signature first.');
          return false;            
        }

        var data = signaturePad1.toDataURL('image/png');
        $('#first_bae64_sign').val(data);
        
        $("#sec_scr_checkbox2").show();
        $("#checkbox2").prop("checked", true);
        
        $("#myModal2").modal("hide");
        console.log("mobile base64 image value => "+$('#first_bae64_sign').val());
        
        if($("#busineesThird_requested_gurantee_amt").val() != '' && $("#gur_period_month").val() != '' && $("#endDate").val() != '' && $("#first_bae64_sign").val() != '' && $("#second_bae64_sign").val() != '' && $("#third_bae64_sign").val() != '' ){

var documentcontent = $("#document_content").html();
         
         var basesisryfourhtml = btoa(unescape(encodeURIComponent(documentcontent)));
         
         $('#documenthtml').val(basesisryfourhtml);
         
            $("#businessThird_3_form").css("opacity","1");
            $("#businessThird_3_form").css("cursor","pointer");
            $("#businessThird_3_form").prop("disabled", false);

        }else{

            $("#businessThird_3_form").css("opacity","0.5");
            $("#businessThird_3_form").css("cursor","auto");
            $("#businessThird_3_form").prop("disabled", true);
        }
          
    });
    
    //    second signature
    $("#btnCloseModalPopup3").click(function () {
        
         var documentcontent = $("#document_content").html();
         
         var basesisryfourhtml = btoa(unescape(encodeURIComponent(documentcontent)));
         
         $('#documenthtml').val(basesisryfourhtml);
    
        if( signaturePad2.isEmpty()){
            $("#second_bae64_sign").val('');
          console.log('signature2 is empty');
          alert('please fill signature first.');
          return false;
        }
        
        /*if( signaturePad3.isEmpty()){
            $("#third_bae64_sign").val('');
          console.log('signature3 is empty');
          alert('please fill signature first .');
          return false;
        }*/

        var data2 = signaturePad2.toDataURL('image/png');
        $('#second_bae64_sign').val(data2);
        
        var data3 = signaturePad3.toDataURL('image/png');
        $('#third_bae64_sign').val(data3);
        
        $("#new_sec_scr_checkbox3").show();
        $("#new_btn3_checkbox").prop("checked", true);
        
        if($("#second_bae64_sign").val() != '' && $("#third_bae64_sign").val() != '')
        {
            $("#new_sec_scr_checkbox3").show();
            $("#new_btn3_checkbox").prop("checked", true);
            
            $("#myModal2").modal("hide");
        }
        
        console.log("mobile base64 second image value => "+$('#second_bae64_sign').val());
        console.log("mobile base64 third image value => "+$('#third_bae64_sign').val());
        
        if($("#busineesThird_requested_gurantee_amt").val() != '' && $("#gur_period_month").val() != '' && $("#endDate").val() != '' && $("#first_bae64_sign").val() != '' && $("#second_bae64_sign").val() != '' && $("#third_bae64_sign").val() != '' ){

var documentcontent = $("#document_content").html();
         
         var basesisryfourhtml = btoa(unescape(encodeURIComponent(documentcontent)));
         
         $('#documenthtml').val(basesisryfourhtml);
         
            $("#businessThird_3_form").css("opacity","1");
            $("#businessThird_3_form").css("cursor","pointer");
            $("#businessThird_3_form").prop("disabled", false);

        }else{

            $("#businessThird_3_form").css("opacity","0.5");
            $("#businessThird_3_form").css("cursor","auto");
            $("#businessThird_3_form").prop("disabled", true);
        }
          
    });
//    $('#first_bae64_sign').val();



//    second signature
   

}


$( function() {

var maxBirthdayDate = new Date();
maxBirthdayDate.setFullYear( maxBirthdayDate.getFullYear(),maxBirthdayDate.getMonth(),maxBirthdayDate.getDate()+1);

    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
      minDate: maxBirthdayDate,
      yearRange: "1930:+0"

    });
    
     // $("#datepicker").datepicker();

  } );
  
  
  
  ( function( factory ) {
if ( typeof define === "function" && define.amd ) {

// AMD. Register as an anonymous module.
define( [ "../widgets/datepicker" ], factory );
} else {

// Browser globals
factory( jQuery.datepicker );
}
}( function( datepicker ) {

datepicker.regional.he = {
closeText: "סגור",
prevText: "&#x3C;הקודם",
nextText: "הבא&#x3E;",
currentText: "היום",
monthNames: [ "ינואר","פברואר","מרץ","אפריל","מאי","יוני",
"יולי","אוגוסט","ספטמבר","אוקטובר","נובמבר","דצמבר" ],
monthNamesShort: [ "ינו","פבר","מרץ","אפר","מאי","יוני",
"יולי","אוג","ספט","אוק","נוב","דצמ" ],
dayNames: [ "ראשון","שני","שלישי","רביעי","חמישי","שישי","שבת" ],
dayNamesShort: [ "א'","ב'","ג'","ד'","ה'","ו'","שבת" ],
dayNamesMin: [ "א'","ב'","ג'","ד'","ה'","ו'","שבת" ],
weekHeader: "Wk",
dateFormat: "dd/mm/yy",
firstDay: 0,
isRTL: true,
showMonthAfterYear: false,
yearSuffix: "" };
datepicker.setDefaults( datepicker.regional.he );

return datepicker.regional.he;

}));


$( function() {

var maxBirthdayDate = new Date();

    $( "#datepicker2" ).datepicker({
      changeMonth: true,
      changeYear: true,
      minDate: maxBirthdayDate,
      yearRange: "1930:+0"

    });
    
     // $("#datepicker").datepicker();

  } );
  
  
  
  ( function( factory ) {
if ( typeof define === "function" && define.amd ) {

// AMD. Register as an anonymous module.
define( [ "../widgets/datepicker" ], factory );
} else {

// Browser globals
factory( jQuery.datepicker );
}
}( function( datepicker ) {

datepicker.regional.he = {
closeText: "סגור",
prevText: "&#x3C;הקודם",
nextText: "הבא&#x3E;",
currentText: "היום",
monthNames: [ "ינואר","פברואר","מרץ","אפריל","מאי","יוני",
"יולי","אוגוסט","ספטמבר","אוקטובר","נובמבר","דצמבר" ],
monthNamesShort: [ "ינו","פבר","מרץ","אפר","מאי","יוני",
"יולי","אוג","ספט","אוק","נוב","דצמ" ],
dayNames: [ "ראשון","שני","שלישי","רביעי","חמישי","שישי","שבת" ],
dayNamesShort: [ "א'","ב'","ג'","ד'","ה'","ו'","שבת" ],
dayNamesMin: [ "א'","ב'","ג'","ד'","ה'","ו'","שבת" ],
weekHeader: "Wk",
dateFormat: "dd/mm/yy",
firstDay: 0,
isRTL: true,
showMonthAfterYear: false,
yearSuffix: "" };
datepicker.setDefaults( datepicker.regional.he );

return datepicker.regional.he;

}));


function datechanged(){
    
    var val = $("#datepicker").val();
    
    $('.expiry_date').val(val);
}

function datechanged2(){
    
    var val = $("#datepicker2").val();
    
    $('.expiry_date2').val(val);
}


</script>

<script type="text/javascript">
	$('#busineesThird_requested_gurantee_amt').simpleMoneyFormat();
</script>