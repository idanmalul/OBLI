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
          
          //minDate: new Date(),

          //maxDate: date.getMonth()+'/'+date.getDate()+'/'+date.getFullYear(),


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
           
           
           if($("#private2_requested_gurantee_amt").val() != '' && $("#gur_period_month").val() != '' && $("#endDate").val() != '' && $("#endDate").val() != '' && $('#checkbox4').is(":checked") != '' && $("#first_bae64_sign").val() != '' && $("#second_bae64_sign").val() != '' ){

                $("#private2_3_form").css("opacity","1"); // button opacity change
                $("#private2_3_form").css("cursor","pointer");
                $("#private2_3_form").prop("disabled", false);
    
            }else{
    
                $("#private2_3_form").css("opacity","0.5"); // button opacity change
                $("#private2_3_form").css("cursor","auto");
                $("#private2_3_form").prop("disabled", true);
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
          
          // Months between years.
          
          var date1 = new Date(startDate);
          
          var date2 = new Date(endDate);
          
            var monthsdiff = (date2.getFullYear() - date1.getFullYear()) * 12;
            
            // Months between... months.
            monthsdiff += date2.getMonth() - date1.getMonth();
            
            $('#monthsdifrence').val(monthsdiff);

        $('#startDate').val(startDate);
        $('#endDate').val(endDate);
          
        if($("#private2_requested_gurantee_amt").val() != '' && $("#gur_period_month").val() != '' && $("#endDate").val() != '' && $("#endDate").val() != '' && $("#endDate").val() != '' && $('#checkbox4').is(":checked") != '' && $("#first_bae64_sign").val() != '' && $("#second_bae64_sign").val() != '' ){

            $("#private2_3_form").css("opacity","1"); // button opacity change
            $("#private2_3_form").css("cursor","pointer");
            $("#private2_3_form").prop("disabled", false);

        }else{

            $("#private2_3_form").css("opacity","0.5"); // button opacity change
            $("#private2_3_form").css("cursor","auto");
            $("#private2_3_form").prop("disabled", true);
        }
          
    });

      $('input[name="gur_period_month"]').on('cancel.daterangepicker', function(ev, picker) {
          $(this).val('');
      });

      // $('input[name="client_date_of_birth"]').daterangepicker({
      //   singleDatePicker: true,
      //   showDropdowns: true,
      //   minYear: 1901,
      //   maxYear: parseInt(moment().format('YYYY'),10)
      // }, function(start, end, label) {
      //   // var years = moment().diff(start, 'years');
      //   // alert("You are " + years + " years old!");
      // });


    });
</script>

<!-- date of birth picker -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!-- // <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<!-- end picker -->

<style type="text/css">

#sec_scr_checkbox1, #sec_scr_checkbox2, #sec_scr_checkbox3{
    display: none;
}    

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
</style>
<!-- calendar end -->

<style type="text/css">
     
.screen2-box1{
    height: 289px;
}

@media screen and (min-width: 320px) and (max-width: 377px){
 .screen2-box1{
    height: 319px;
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
    /*width: 100%;*/
    height: 60px;
    cursor: pointer;
    width: 328px;

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
#private2_requested_gurantee_amt_error,#gur_period_month-error{
    color: #EC0D0D;
    direction: rtl;
    font-size: 12.5px;
}



/** floating css start **/
input:focus ~ label, textarea:focus ~ label, input:valid ~ label, textarea:valid ~ label {
    font-size: 0.75em !important;
    /*color: #999;*/
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


/*uploading file part*/
.file-close-icon i:hover{
     cursor: pointer;
}
/*end*/

#private2_requested_gurantee_amt:focus ~ span{
    width: 30% !important;
}

.span_text{
    font-size: 20px;
}

/*gif*/
.sonar-wrapper{
  display: none;
}
/*end gif*/
        
</style>



 

<script type="text/javascript">

        $(document).ready(function(){


            $("#private2_3_form").css("opacity","0.5");
            $("#private2_3_form").css("cursor","auto");
            $("#private2_3_form").prop("disabled", true);

            var ratio =  Math.max(window.devicePixelRatio || 1, 1);

            // This part causes the canvas to be cleared
            canvas1.width = '416';
            canvas1.height = '147';

            canvas2.width = '416';
            canvas2.height = '147';

            $("#private2_3_form").click(function(){

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
                        private2_requested_gurantee_amt: {
                            required: true,
                            money: true,
                            min: 100,
                            max: 25000
                        },
                        gur_period_month: {
                            required: true,
                            maxmonths: true,
                        }
                    },
                    messages: {
                        private2_requested_gurantee_amt: {
                            required: "שדה חובה",
                            money: "אנא הזן את המספר",
                            min: "אנא הכנס את ערך הסכום 100 עד 25000",
                            max: "אנא הזן ערך נמוך מ 25,000"

                        },
                        gur_period_month: {
                            required: "שדה חובה",
                            maxmonths: "Max 18 months you can choose!"
                        }
                    }
                    
                });

                if (form.valid() === true){

//                    gurant_amm = $("#private2_requested_gurantee_amt").val();
////                        alert(11111);
//                    if(gurant_amm > 50000){
//                        $('#messageModal').modal('show');
//                        return false;
//                    }
//                    else{
//                        closeMessageModal();
//                    }
                      closeMessageModal();

                  
                    
                }
                else{
                    // $('.submit').css('opacity', '0.5');
                }

                if($("#private2_requested_gurantee_amt").val() != '' && $("#gur_period_month").val() != '' && $("#endDate").val() != '' && $('#checkbox4').is(":checked") != '' && $("#first_bae64_sign").val() != '' && $("#second_bae64_sign").val() != '' ){

                    $("#private2_3_form").css("opacity","1");
                    $("#private2_3_form").css("cursor","pointer");
                    $("#private2_3_form").prop("disabled", false);

                }else{

                    $("#private2_3_form").css("opacity","0.5");
                    $("#private2_3_form").css("cursor","auto");
                    $("#private2_3_form").prop("disabled", true);
                }
            });


            // second form  
            $('#private2_requested_gurantee_amt').on('keyup', function() {

                if($("#private2_requested_gurantee_amt").val() != '' && $("#gur_period_month").val() != '' && $("#endDate").val() != '' && $('#checkbox4').is(":checked") != '' && $("#first_bae64_sign").val() != '' && $("#second_bae64_sign").val() != '' ){

                    $("#private2_3_form").css("opacity","1"); // button opacity change
                    $("#private2_3_form").css("cursor","pointer");
                    $("#private2_3_form").prop("disabled", false);

                }
                else{
                    $("#private2_3_form").css("opacity","0.5"); // button opacity change
                    $("#private2_3_form").css("cursor","auto");
                    $("#private2_3_form").prop("disabled", true);
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
            
            // popup buttons chcked status
            $('#checkbox1').on('click', function() {
               $("#checkbox1").prop("checked", true);
            });
            
            $('#checkbox2').on('click', function() {
               $("#checkbox2").prop("checked", true);
            });
            
            $('#btn3_checkbox').on('click', function() {
               $("#btn3_checkbox").prop("checked", true);
            });
            // end
            
                

            $('#checkbox3,#checkbox4,#checkbox5').on('click', function() {

                if($("#private2_requested_gurantee_amt").val() != '' && $("#gur_period_month").val() != '' && $("#endDate").val() != '' && $('#checkbox4').is(":checked") != '' && $("#first_bae64_sign").val() != '' && $("#second_bae64_sign").val() != '' ){

                        $("#private2_3_form").css("opacity","1"); // button opacity change
                        $("#private2_3_form").css("cursor","pointer");
                        $("#private2_3_form").prop("disabled", false);
                        
                        if ($('#checkbox3').is(":checked") && $('#checkbox4').is(":checked") && $('#checkbox5').is(":checked") )
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
                    
                }else{

                    // for first modal
                    if ($('#checkbox3').is(":checked") && $('#checkbox4').is(":checked") && $('#checkbox5').is(":checked"))
                    {

                      $(".scr_first_modal").css("opacity","1");
                      $(".scr_first_modal").css("cursor","pointer");

                      $("#sec_scr_checkbox1").show();
                      $("#checkbox1").prop("checked", true);

                      // close modal first
                      $("#btnCloseModalPopup1").click(function () {
                          $("#myModal1").modal("hide");
                          $("#myBtn1").css("cursor","pointer");
                      });

                        if($("#private2_requested_gurantee_amt").val() != '' && $("#gur_period_month").val() != '' && $("#endDate").val() != ''&& $('#checkbox4').is(":checked") != '' && $("#first_bae64_sign").val() != '' && $("#second_bae64_sign").val() != '' ){

                            $("#private2_3_form").css("opacity","1"); // button opacity change
                            $("#private2_3_form").css("cursor","pointer");
                            $("#private2_3_form").prop("disabled", false);

                        }else{

                            $("#private2_3_form").css("opacity","0.5"); // button opacity change
                            $("#private2_3_form").css("cursor","auto");
                            $("#private2_3_form").prop("disabled", true);
                        }

                    }
                    else
                    {
                        $(".scr_first_modal").css("opacity","0.5");
                        $(".scr_first_modal").css("cursor","auto");

                        $("#sec_scr_checkbox1").hide();
                        $("#checkbox1").prop("checked", false);

                    }

                    // for second modal
//                    if ($('#checkbox5').is(":checked") && $('#checkbox6').is(":checked") && $("#first_bae64_sign").val() != '')
//                    {
//                        $(".scr_sec_modal").css("opacity","1");
//                        $(".scr_sec_modal").css("cursor","pointer");
//
//                        $("#sec_scr_checkbox2").show();
//                        $("#checkbox2").prop("checked", true);
//
//                        // close modal second
//                        $("#btnCloseModalPopup2").click(function () {
//                            $("#myModal2").modal("hide");
//                            $("#myBtn2").css("cursor","pointer");
//                        });
//
//
//                        if($("#private2_requested_gurantee_amt").val() != '' && $("#gur_period_month").val() != '' && $('#checkbox3').is(":checked") && $('#checkbox4').is(":checked") != '' && $("#first_bae64_sign").val() != '' && $("#second_bae64_sign").val() != '' ){
//
//                            $("#private2_3_form").css("opacity","1"); // button opacity change
//                            $("#private2_3_form").css("cursor","pointer");
//                            $("#private2_3_form").prop("disabled", false);
//
//                        }else{
//
//                            $("#private2_3_form").css("opacity","0.5"); // button opacity change
//                            $("#private2_3_form").css("cursor","auto");
//                            $("#private2_3_form").prop("disabled", true);
//                        }
//
//                    }
//                    else
//                    {
//                        // alert($("#first_bae64_sign").val());
//                        $(".scr_sec_modal").css("opacity","0.5");
//                        $(".scr_sec_modal").css("cursor","auto");
//
//                        $("#sec_scr_checkbox2").hide();
//                        $("#checkbox2").prop("checked", false);
//                    }

                    $("#private2_3_form").css("opacity","0.5"); // button opacity change
                    $("#private2_3_form").css("cursor","auto");
                    $("#private2_3_form").prop("disabled", true);
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
                $('#myModalnew').modal('show');
                $('#myModalLabel2').show('fast');
                $('#modal2Div').show('fast');
                $('#signature-pad-2').hide('fast');
                $('#btnCloseModalPopup3').hide('fast');
                $('#btnCloseModalPopup2').show('fast');
                $('#signature-pad-1').show('fast');
                $('#modal3Div').hide('fast');
                $('#myModalLabel3').hide('fast');

                // popup dynamic js 
                var firstName = '<?php if(!empty($this->session->userdata("private2"))){ $private2 = $this->session->userdata("private2");  echo $private2["first_name"]; } ?>';
                var lastName = '<?php if(!empty($this->session->userdata("private2"))){ $private2 = $this->session->userdata("private2");  echo $private2["last_name"]; } ?>';
                var client_id = '<?php if(!empty($this->session->userdata("private2"))){ $private2 = $this->session->userdata("private2");  echo $private2["unique_id"]; } ?>';
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
                $('#signature-pad-1').hide('fast');
                $('#btnCloseModalPopup2').hide('fast');
                $('#btnCloseModalPopup3').show('fast');
                $('#signature-pad-2').show('fast');
                // $(".scr_sec_modal").css("opacity","1");
                // $(".scr_sec_modal").css("cursor","pointer");

                
                // popup dynamic js  
                var firstName = '<?php if(!empty($this->session->userdata("private2"))){ $private2 = $this->session->userdata("private2");  echo $private2["first_name"]; } ?>';
                var lastName = '<?php if(!empty($this->session->userdata("private2"))){ $private2 = $this->session->userdata("private2");  echo $private2["last_name"]; } ?>';
                var clientAdd = '<?php if(!empty($this->session->userdata("private2"))){ $private2 = $this->session->userdata("private2");  echo $private2["street"].", ".$private2["home_no"].", ".$private2["hometown"]; } ?>';
                
                var orderIdNumber = '<?php if(!empty($this->session->userdata("order_id_number"))){ $order_id_number = $this->session->userdata("order_id_number");  echo $order_id_number; } ?>';                
                var cAmount = $('#private2_requested_gurantee_amt').val();
                $('#next1fullName').html(firstName+' '+lastName);
                $('#clientAmount').html(cAmount);
                $('#address').html(clientAdd);
                $('#orderIdNumber').html(orderIdNumber);

            });
    });


  function cloasemodal(){
                console.log('here');
                $("#myModal1").modal("hide");
                          $("#myBtn1").css("cursor","pointer");
            
            }
</script>


<script>
    $(document).ready(function(){
        jQuery.validator.addMethod("maxmonths", function(date, element) {
            
            var monthsdifrence = $('#monthsdifrence').val();
            
          return this.optional(element) || monthsdifrence < 18 ;
        
}, "Duration is over 18 months!");
        
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
             

             <form method="post" enctype="multipart/form-data" id="myform" name="validate_form" novalidate="" > 
                <!-- action="<?php //  echo site_url('website/tenant_payment_api'); ?>" -->


                    <input type='hidden' name='expiry_date' value='' class='expiry_date'>
                    
                    <input type='hidden' name='expiry_date2' value='' class='expiry_date2'>
                    
                <!-- First Modal -->
                <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <!-- <h4 class="modal-title" id="myModalLabel"><b>הסכמה למסירת נתוני אשראי  </b></h4> -->
                                 <h4 class="modal-title" id="myModalLabel"><b> הסכמה למסירת נתוני אשראי </b></h4>
                                
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
                                <!--     לצורך בדיקת הבקשה, אנחנו מתכוונים לפנות ללשכת אשראי על מנת לקבל חיווי אשראי. מובהר בזאת שלצורך קבלת החיווי לשכת האשראי תגיש בקשה לבנק ישראל לקבלת נתוני אשראי לגביך הכלולים במאגר.
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
                                    <a class="button gform_button" id="btnCloseModalPopup1" onclick="cloasemodal()"> <p class="first_modal_button continue_button scr_first_modal">המשך למסמך הבא  </p></a>
                                
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
                
                
                
                <?php
            
            
            $date = date('Y-m-d'); 
            
            
            
          $expdate = '
                             <br/> <img src="https://obli.co.il/website_assets/img/calendar_icon.png" class="img-responsive cal_reponsive" style="display: inline; top:0px; right:0px !important; float:none;"> <input style="width:100px !important; display: inline; height:100%;" type="text" name="busineesThird_document_expdate" id="datepicker" data-format="DD/MM/YYYY" class="form-control sixth_text" required="" autocomplete="off" onchange="datechanged()">
                               
                                
                            ';
                            
                            
                             $expdate2 = '
                              <img src="https://obli.co.il/website_assets/img/calendar_icon.png" class="img-responsive cal_reponsive" style="display: inline; top:0px; right:0px !important; float:none;"> <input style="width:100px !important; display: inline; height:100%;" type="text" name="busineesThird_document_expdate2" id="datepicker2" data-format="DD/MM/YYYY" class="form-control sixth_text" required="" autocomplete="off" onchange="datechanged2()">
                               
                                
                            ';
            
            if(!empty($this->session->userdata("private2"))){
                $businessThird1 = $this->session->userdata("private2");
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
                <div class="modal fade" id="myModalnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                               <div class="col-md-6" style='text-align:left; vertcal-align:center;'> <?php echo $date;?> :<b class="rtl">תאריך  </b>
                                               
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
                                                    
                                                </div>
                                                
                                            </div>
                                
                                </div>
                                
                                </div>

                                <div class="gform_footer" style="margin: 0 auto;"> 
                                    <a class="button gform_button" id="btnCloseModalPopupnew" > <p class="first_modal_button continue_button scr_first_modalnew">המשך למסמך הבא  </p></a>
                                
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
                 <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <!-- <h4 class="modal-title" id="myModalLabel"><b>הלוואה למימון עמלת ערבות   </b></h4> -->
                               <!--  <h4 class="modal-title" id="myModalLabel"><b>הסכם שיפוי  </b></h4> -->
                                <h4 class="modal-title" id="myModalLabel2"><b>הלוואה למימון עמלת ערבות </b></h4>
                                <h4 class="modal-title" id="myModalLabel3"><b>הסכם שיפוי</b></h4>
                            </div>
                            <div class="modal-body">
                                
                             <div class="row">
                                <div class="col-md-1"></div>

                                <!-- modal 2 -->
                                <div class="col-md-10 rtl" id="modal2Div" style="text-align: right;">
                                    
                                  
                                    
                                    <p style="margin: 10px 0px 0px 0px;">אני, החתום מטה, <span id="fullName" class="span_text"></span> בעל ת.ז. מס' <span id="clientId" class="span_text"></span>, מאשר ומצהיר כמפורט להלן:   <br>1.    ידוע לי  כי תשלום העמלה לגולדנרוד פיננסים בע"מ, ח.פ. 513578674 (להלן: "גולדנרוד") בגין העמדת  הערבות (להלן: "העמלה") באמצעות הלוואה זו ומימון העמלה בדרך של קבלת הלוואה באמצעות טריא פי2פי   בע"מ )ח.פ. 515024131 )  או טריא קהילה פיננסית בע"מ (ח.פ. 515928034) (שתי החברות יקראו להלן: "טריא") הן עסקאות נפרדות. <br>

                                     2. אני מצהיר ומאשר שסכום ההלוואה יועבר במישרין  לגולדנרוד ובחתימתי על נספח זה אני מסכים לכל תנאי  ההלוואה וכן לכל תנאי האתר שבאמצעותו אקבל את ההלוואה ואני מורה לטריא להעביר את סכום ההלוואה  כאמור. 

                                     <br>

                                     3.  אני מאשר שידוע לי שטריא אינה שותפה או ערבה בצורה כלשהי לעסקי גולדנרוד, ואינה צד לעסקה זו, ולפיכך טענות הנוגעות לעמלה או טענות אחרות שעלולות להיות לי כלפי, לרבות בקשר עם העמלה, לא יהוו   עילה לאי תשלום ההלוואה ולא יפטרו אותי מתשלום החזרי ההלוואה לטריא. 

                                    </p>

                                    <!--<br>-->

<!--                                    <p>
                                        <div class="checkbox checkbox-success check_box_popup01">
                                            <input id="checkbox5" name="checkbox5" type="checkbox" value="three" class="number1">
                                            <label for="checkbox5">
                                                
                                            </label>
                                        </div>
                                    
                                    </p>-->
                                     
<!--                                    <p style="margin: -38px 40px 0px 0px;"> 

                                       <b>אני מבין כי טריא אינה מאפשרת לקחת הלוואה עבור אחרים ואני מצהיר בזה כי אני מבקש   לקבל הלוואה בעבור עצמי בלבד.</b>
                                    </p>-->

                                    

<!--                                    <br>

                                    <p class="check_box_para">אני מתחייב להודיע לטריא בכתב בהקדם האפשרי על כל שינוי בפרטים שמסרתי לעיל; ידוע לי כי מסירת  מידע כוזב, לרבות אי-מסירת עדכון של פרט החייב בדיווח, במטרה שלא יהיה דיווח או כדי לגרום לדיווח  בלתי נכון לפי סעיף 7 לחוק איסור הלבנת הון, התש"ס-, מהווה עבירה פלילית. 

                                    </p>-->
                                   
                                    <p>
<!--                                        <div class="checkbox check_box_popup02">
                                            <input id="checkbox6" name="checkbox6" type="checkbox" value="four" class="number1">
                                            <label for="checkbox6">
                                               
                                            </label>
                                        </div>-->

<!--                                    <p class="check_box_para"> צורך בדיקת הבקשה, אנחנו מתכוונים לפנות ללשכת אשראי על מנת לקבל חיווי אשראי. מובהר בזאת   שלצורך קבלת החיווי לשכת האשראי תגיש בקשה לבנק ישראל לקבלת נתוני אשראי לגביך הכלולים  במאגר. הפנייה ללשכת אשראי לצורך קבלת חיווי הינה בכל מקרה של בקשה לקבלת הלוואה באמצעות טריא. </p>-->

                                      <!--<br>-->

                                      <p style="margin: 30px 40px 0px 0px;text-align: center;">

                                      <b>שם הלקוח: </b><span id="nextfullName" class="span_text"></span> <b>חתימה דיגיטלית:  </b>



                                      </p>

                                      
                                

                                </div>
                                
                                <?php
                                
                                $months = array("Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر");
                                
                                
                                $your_date = date( 'y-m-d', $time ); // The Date calculated from the $time variable
                                    $en_month = date("M", $time );
                                    foreach ($months as $en => $ar) {
                                        if ($en == $en_month) { $ar_month = $ar; }
                                    }
                                    
                                     $ar_month = date("M");
                                     
                                     $private6 = $this->session->userdata('private6');
                    
                    $another_first_name = $private6['landlord'];
                                     
                                  $privatedata['property_owner_name'] = $another_first_name;
                                ?>

                                <!-- modal 3 -->
                                <div class="col-md-10 rtl" id="modal3Div" style="text-align: right;">
                                    
                                      <div id='document_content'>
                                   
                                    <p style="margin: 10px 0px 0px 0px; text-align: center;">
                                    שנערך ונחתם ביום 20<?php echo date('y'); ?> <?php echo date('M'); ?> <?php echo date('d'); ?>
                                   
                                   </p>
                                   
                                      <br>
                                   
                                 <b><p style="text-align:right !important;">  <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">	גולדנרוד  בע"מ ח.פ. 513578674 (להלן: "החברה") 
 </div> <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> בין  </div></p></b> <br>

                                
                                     
									
                                  <p class="dct" style='text-align:right !important;'>	<div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> מרחוב יד חרוצים 12, תל אביב  </div>  <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"></div> </p><br>
								  
								  
								   <p class="dct" style="text-align:right !important;">
                                    
                                    <b>
                                    
                             <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">   <span id="clientId" class="span_text"></span>  ת.ז    <span id="next1fullName" class="span_text"></span> (להלן: "הלקוח")  </div>
                                    <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">      לבין&emsp;&emsp; </div>	
                                    </b>
                                 </p> <br>
								 
								 
								 <p class="dct" style="text-align:right !important;">           
                                 <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">   <span id="address" class="span_text"></span>    מרח'   <?php if(!empty($businessThird2)){ echo $businessThird2['company_address']; }?>
                          
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
   
   (להלן: "כתב הערבות"), לטובת  <b><span id="vendorname" class="span_text"><?php echo $privatedata['property_owner_name'];?></span></b> (להלן: "המוטב"), על סך  <b><span id="clientAmount" class="span_text"></span></b> ₪
   
  (להלן: "סכום הערבות"),המצורף בזאת  <b>כנספח א' </b>להסכם זה;

    </div>

    <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> <b>הואיל</b></div>
   
       
</p><br>							
									 

<p class="dct" style="text-align:right !important;"> 

<div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">
והוסכם בין הלקוח לבין החברה כי במקרה של מימוש כתב הערבות על ידי המוטב, יפצה הלקוח את החברה, כמפורט בהסכם זה להלן;
</div>

<div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> <b> הואיל </b></div>
</p> <br>



<p class="dct" style="text-align:right !important;"> 

<div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">
וברצון הצדדים להגדיר ולהסדיר את התחייבויות השיפוי של הלקוח במקרה של  חילוט כתב הערבות ע"י המוטב.
</div>

<div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> <b> הואיל </b></div>
</p> <br>


<p class="dct" style="text-align:center !important;">  
                  <div class="col-md-12" style="text-align:center !important;"> 
                 <b> לפיכך הוסכם, הוצהר והותנה בין הצדדים כדלקמן:</b>
                   </div>
                   </p><br>
				   
<p style="text-align:right !important;"> <div class="col-md-9" style="text-align:right !important;"> </div> <div class="col-md-3" style="text-align:right !important;"> 1. &emsp;  <u>מבוא ונספחים </u> &emsp; </div> </p>   

  <p class="dct" style="text-align:right !important;"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> המבוא להסכם זה וכן  הנספחים המצורפים אליו מהווים חלק בלתי נפרד הימנו </div>
	  <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">     &emsp;   1.1. &emsp;   </div>
	 </p><br>
	 
	 
 <p class="dct" style="text-align:right !important;"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> כותרות הסעיפים נועדו לצורך הנוחיות בלבד ואין לפרש תנאי מתנאי ההסכם לפיהן. </div>
	  <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">     &emsp;   1.2. &emsp;   </div>
	 </p><br>
	 
	 
	  <p class="dct" style="text-align:right !important;"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> הצדדים מצהירים כי אין עליהם כל הגבלה, בין בהסכם, בין על פי דין ובין בכל אופן אחר, המונעת מכל אחד מהם או מגבילה אותו מלהתקשר בהסכם זה ו/או למלא את הוראותיו. </div>
	  <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">     &emsp;   1.3. &emsp;   </div>
	 </p><br>
	 
	 
	 
	<p style="text-align:right !important;"> <div class="col-md-9" style="text-align:right !important;"> </div> <div class="col-md-3" style="text-align:right !important;"> 2. &emsp;  <u>ההתקשרות </u> &emsp; </div> </p>     


<p class="dct" style="text-align:right !important;"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">במסגרת ההתקשרות הכללית בין הצדדים, החברה הנפיקה לבקשת הלקוח את כתב ערבות, אשר פרטיו מפורטים במבוא להסכם זה, לטובתו של  המוטב, ובו התחייבה להעביר לידי  המוטב את סכום הערבות במקרה שבו יבקש המוטב לממש את כתב הערבות. </div>
	  <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">     &emsp;   2.1. &emsp;   </div>
	 </p><br>
	 

<p class="dct" style="text-align:right !important;"> 

    <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> במקרה של מימוש כתב הערבות ע"י  המוטב, מכל סיבה שהיא, הלקוח ישלם לחברה  כל סכום אותו תידרש החברה לשלם למוטב  וזאת תוך 7 ימים ממועד דרישתה הראשונה. כל סכום שלא ישולם לחברה במועד כאמור לעיל ישא ריבית פיגורים בשיעור שנתי של 6.5% החל מתום 7 הימים כאמור ועד למועד תשלומו לחברה בפועל וריבית כנ"ל שתתרבה במשך כל חודש או במשך כל תקופה אחרת כפי שיהיה נהוג אצל החברה מפעם לפעם תישא אף היא ריבית בשיעור כאמור, וזאת מבלי לפגוע בזכויות החברה לנקוט בכל הסעדים המוקנים לה בהתאם להוראות כל דין.  </div>
    <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">   &emsp;   2.2. &emsp;   </div>
</p><br>	 


<p class="dct" style="text-align:right !important;"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">במקרה של מימוש כתב הערבות ע"י  המוטב, יוכל החייב, על פי שיקול דעתו, להשתמש בהפניית החברה לחברת טריא לצורך קבלת הלוואה בריבית שנתית קבועה של 9% לתקופה של 18 חודשים וזאת לשם פירעון הסכומים שהוא חייב לחברה על פי הסכם זה, או לפרוע את חובו לחברה בכל דרך אחרת שהיא. בכל מקרה, מוסכם כי חברת טריא אינה מחוייבת להעמדת הלוואה ללקוח והעמדת ההלוואה כפופה לשיקול דעתה הבלעדי של טריא, בהתאם לנהליה ולעקרונות החיתום שלה. למנוע ספק, אי העמדת הלוואה על ידי טריא כאמור לעיל לא יפגע בהתחייבויות הלקוח לפרוע לחברה את הסכומים בהם הוא מחוייב על פי הסכם זה במלואם ובמועד שנקבע לתשלומם.</div>
	  <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">     &emsp;   2.3. &emsp;   </div>
	 </p><br>
	 
	 

<p style="text-align:right !important;"> <div class="col-md-9" style="text-align:right !important;"> </div> <div class="col-md-3" style="text-align:right !important;"> 3. &emsp;  <u>מצגי הלקוח</u> &emsp; </div> </p>    



<p class="dct" style="text-align:right !important;"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">העמדת סכום הערבות על פי כתב הערבות הינה בהתבסס על הצהרותיו של הלקוח כאמור בסעיף זה להלן וכן בהתבסס על התחייבויותיו של הלקוח בסעיף ‏4 להלן:</div>
	  <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">       </div>
	 </p><br> 	 
	 
	 
<p class="dct" style="text-align:right !important;"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">כל התחייבויותיו של הלקוח בהסכם זה הינן חוקיות, תקפות, וניתנות לאכיפה כנגד הלקוח על פי תנאי הסכם זה. </div>
	  <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">     &emsp;   3.1. &emsp;   </div>
	 </p><br> 	 
	 
	 
<p class="dct" style="text-align:right !important;"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">הוא בעל האמצעים הכלכליים לעמוד בהתחייבויותיו לשיפוי החברה  כאמור בהסכם זה.  </div>
	  <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">     &emsp;   3.2. &emsp;   </div>
	 </p><br> 	
	 
	 
<p class="dct" style="text-align:right !important;"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">כי לא תלויה ועומדת נגדו תובענה כל שהיא בערכאה משפטית כל שהיא, כי אין הוא מעורב בהליך משפטי כל שהוא בין כתובע או כנתבע או בצורה אחרת כל שהיא הקשורה ו/או בעלת השלכה לגבי הסכם זה.  </div>
	  <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">     &emsp;   3.3. &emsp;   </div>
	 </p><br> 
	 
	 
	 
<p class="dct" style="text-align:right !important;"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> לא נפתחו ולא מתקיימים לגביו הליכי חדלות פירעון כמשמעותם בסעיף 2 לחוק חדלות פירעון ושיקום כלכלי, תשע"ח-2018 .  </div>
	  <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">     &emsp;   3.4. &emsp;   </div>
	 </p><br> 
	 
	 
<p class="dct" style="text-align:right !important;"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> הוא אינו מוכר כחייב מוגבל באמצעים, כמשמעותו בסעיף 69ג לחוק ההוצאה לפועל, תשכ"ז-1967 (להלן: "חוק ההוצאה לפועל") ו/או חייב המשתמט מתשלום חובו כמשמעותו בסעיף 66 א' לחוק ההוצאה לפועל ואינו כלול במרשם החייבים המשתמטים נשוא סעיף 66 ו' לחוק ההוצאה לפועל.    </div>
	  <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">     &emsp;   3.5. &emsp;   </div>
	 </p><br> 
	 
	 
<p class="dct" style="text-align:right !important;"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> הוא אינו מוכר כלקוח מוגבל או לקוח אשר חשבונו הוגבל  עפ"י סעיף 2 לחוק חוק שיקים ללא כיסוי, תשמ"א-1981 (להלן: "חוק שיקים ללא כיסוי") ו/או אינו מוגדר כלקוח מוגבל חמור בהתאם לסעיף 3  לחוק שיקים ללא כיסוי.      </div>
	  <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">     &emsp;   3.6. &emsp;   </div>
	 </p><br> 
	 
	 
<p style="text-align:right !important;"> <div class="col-md-9" style="text-align:right !important;"> </div> <div class="col-md-3" style="text-align:right !important;"> 4. &emsp;  <u>התחייבויות הלקוח</u> &emsp; </div> </p>   
	 
	 
<p class="dct" style="text-align:right !important;"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">  הלקוח יידע את החברה ללא דיחוי במקרה בו אחד מהמצגים המנויים בהסכם זה יחדול מלהתקיים.    </div>
	  <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">     &emsp;   4.1. &emsp;   </div>
	 </p><br> 
	 
	 
	 
<p class="dct" style="text-align:right !important;"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">  הלקוח ימציא לחברה, מיד לפי דרישתה הראשונה, כל רישיון, אישור, תעודה, קבלה או כל מסמך אחר, שלדעת החברה יהיו דרושים או רצויים לשם הוכחת קיום התחייבויותיו של הלקוח על פי הסכם זה.     </div>
	  <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">     &emsp;   4.2. &emsp;   </div>
	 </p><br> 
	 
	 
	 
<p class="dct" style="text-align:right !important;"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> הלקוח ישלם לחברה את מלוא הסכומים שהוא חייב בהם על פי הסכם זה ובמועדים כאמור בסעיף ‎2.2 לעיל.  </div>
	  <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">     &emsp;   4.3. &emsp;   </div>
	 </p><br> 

<p class="dct" style="text-align:right !important;"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">  מבלי לפגוע באמור בסעיף ‎4.3 לעיל, הלקוח יפצה וישפה את החברה, לפי דרישתה הראשונה, בגין כל סכום ו/או הוצאה ו/או תשלום מכל סוג שהוא לרבות שכ"ט עו"ד שיהיו לחברה, במישרין ובעקיפין, בקשר עם גביית הסכומים שהלקוח חייב בהם על פי הסכם זה. כל סכום שלא ישולם לחברה כאמור לעיל ישא ריבית והפרשי הצמדה על פי חוק החל ממועד הוצאתו על ידי החברה ועד למועד השבתו לחברה בפועל.   </div>
	  <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">     &emsp;   4.4. &emsp;   </div>
	 </p><br> 


<p style="text-align:right !important;"> <div class="col-md-9" style="text-align:right !important;"> </div> <div class="col-md-3" style="text-align:right !important;"> 5. &emsp;  <u> כללי</u> &emsp; </div> </p>  


<p class="dct" style="text-align:right !important;"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> ספרי החברה ישמשו כראייה קבילה כלפי הלקוח.
  </div>
	  <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">     &emsp;   5.1. &emsp;   </div>
	 </p><br> 


<p class="dct" style="text-align:right !important;"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> כל שינוי ו/או תיקון להסכם זה ייעשה בכתב בלבד וייחתם על ידי כל הצדדים להסכם.
  </div>
	  <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">     &emsp;   5.2. &emsp;   </div>
	 </p><br> 
	 
	 
	 
<p class="dct" style="text-align:right !important;"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> זכויות הלקוח על פי הסכם זה ו/או זכויות המוטב על פי כתב הערבות אינן ניתנות להעברה ו/או להסבה לצד שלישי ללא קבלת הסכמת החברה בכתב ומראש. כל העברה ו/או הסבה כאמור ללא הסכמת החברה מראש ובכתב תהא חסרת תוקף
  </div>
	  <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">     &emsp;   5.3. &emsp;   </div>
	 </p><br> 
	 
	 
<p class="dct" style="text-align:right !important;"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> זכויות ו/או התחייבויות החברה ניתנות להעברה ו/או להסבה לטובת גורם אחר המוסמך על פי החוק להעמיד ערבויות והלקוח נותן בזאת את הסכמתו מראש לכך ומוותר בזאת על הצורך במתן הודעה של החברה בדבר העברה ו/או הסבה כאמור לעיל.
  </div>
	  <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">     &emsp;   5.4. &emsp;   </div>
	 </p><br> 
	 
	 
	 <p class="dct" style="text-align:right !important;"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> בהסדר זה לשון רבים גם לשון יחיד במשמע ולהיפך ושימוש בלשון זכר או נקבה, יכלול את שני המינים, בהתאם.
  </div>
	  <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">     &emsp;   5.5. &emsp;   </div>
	 </p><br> 
	 
	 
	 
	 <p class="dct" style="text-align:right !important;"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> נקיטתו של סעד כזה או אחר ע"י החברה או אי הפעלת זכות או סעד המוקנים לה על פי הסכם זה, לא תיחשב כויתור על שימוש בסעד אחר או כמחילה על כל הפרה מצד הלקוח בקשר לאיזו מהתחייבויותיו. וויתור או מחילה על הפרה בעת כלשהי, לא תיחשב כויתור או מחילה על הפרה שתיעשה בעתיד.
  </div>
	  <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">     &emsp;   5.6. &emsp;   </div>
	 </p><br> 
	 
	 
	 <p class="dct" style="text-align:right !important;"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> הדין הישראלי יחול באופן בלעדי על הסכם זה, וסמכות השיפוט הבלעדית בכל הקשור להסכם זה תהיה מסורה לבתי המשפט המוסמכים בתל אביב - יפו.
  </div>
	  <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">     &emsp;   5.7. &emsp;   </div>
	 </p><br> 
	 
	 
	 <p class="dct" style="text-align:right !important;"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> אם ייקבע ע"י ערכאה מוסמכת כי הוראה מהוראות הסכם זה אינה ניתנת לאכיפה ו/או הינה חסרת תוקף מטעם כלשהו, לא יהא בכך כדי לפגום ו/או לבטל את תוקפן של יתר הוראות ההסכם.
  </div>
	  <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">     &emsp;   5.8. &emsp;   </div>
	 </p><br> 
	 
	 <p class="dct" style="text-align:right !important;"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> בהתאם לחוק הגנת הפרטיות התשמ"א1981- כל הפרטים שהלקוח מסר ו/או ימסור לחברה ישמשו אותה כמקובל בעבודתה השוטפת לפי שיקול דעתה; וכי כל הפרטים שהלקוח מסר ו/או ימסור לחברה ייאגרו על פי צרכי החברה במאגרי המידע של החברה ו/או של מי שקשור לחברה מעת לעת בשרותי מחשב, עיבוד נתונים ומאגרי מידע.
  </div>
	  <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">     &emsp;   5.8. &emsp;   </div>
	 </p><br> 
	 
	 
	 <p class="dct" style="text-align:right !important;"> <div class="col-md-10" style="text-align:right !important; width: 83.33333%; float: left; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;"> הודעה שתישלח על פי כתובות הצדדים במבוא להסכם זה או כל מען אחר בישראל עליו יודיע מי מהצדדים למשנהו בכתב כעל כתובתו לצורך הסכם זה בדואר רשום, תיחשב כאילו הגיעה לצד שכנגד ולידיעתו תוך 3 ימים מיום שיגורה בדואר רשום מבית דואר בישראל ואם נמסרה ביד – בעת מסירתה, ואם שוגרה בפקס או בדוא"ל – תוך 24 שעות ממועד שיגורה.
  </div>
	  <div class="col-md-2" style="text-align:right !important; width: 16.66666%; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px;">     &emsp;   5.8. &emsp;   </div>
	 </p><br> 
	 
	 
	 
	 <p class="dct" style="width:100%; text-align:center;"> 
                                   <div class="col-md-12" style="width:100%; text-align:center;">
                                  <b>
                               ולראיה באו הצדדים על החתום:

                                 </b>
                                </div>
                                    </p>
<br>

		
		<!-- signature css -->
                                <link rel="stylesheet" href="<?php echo base_url() ?>website_assets/signature/css/signature-pad.css">
                                
    
                                
                                <!-- end -->
		
	
		
	</div>
		<div class="row">
		
		
			<div class="col-md-12">
		
				<p style="margin: 20px 0px -40px 0px;text-align: center;"> <b>החברה </b></p>
				<br>
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-8" style="text-align:center"> <img src="<?php echo base_url() ?>website_assets/img/sign1.png">  </div>
					<div class="col-md-2"></div>
				</div>
				
			</div>
			
			<br>
			
			<div class="col-md-12">
			
			<p style="margin: 20px 0px -40px 0px;text-align: center;"> <b>הלקוח </b></p>
				<br> <br> <br>
			
			 <div id="signature-pad-2" class="signature-pad" style="border: 1px solid rgba(50, 52, 116, 0.5) !important;box-sizing: border-box !important;border-radius: 30px !important;height: 200px; overflow: hidden;" >
                                    <span>
                                        <i class="fa fa-refresh" aria-hidden="true" style="font-size: 14px; padding:5px;" data-action="clear2"></i>
                                    </span>
                                            
                                    <div class="signature-pad--body">
                                      <canvas></canvas>
                                    </div>
                                            
                                        </div>
										
										
			</div>
				
		</div>
									
									
                                 

                                


                                <!-- signature js -->
                                <script src="<?php echo base_url() ?>website_assets/signature/js/signature_pad.umd.js"></script>
                                <script src="<?php echo base_url() ?>website_assets/signature/js/app_private.js"></script>

                                    <!-- end -->

                                <input type="hidden" id="first_bae64_sign" name="first_base64_signature" value="" >

                                <input type="hidden" id="second_bae64_sign" name="second_base64_signature" value="" >

                        <!-- SIGNATURE END -->

                                <div class="gform_footer" style="margin: 0 auto;"> 
                                    <!-- first signature button -->
                                    <a class="button gform_button next" id="btnCloseModalPopup2" > <p class="first_modal_button continue_button scr_sec_modal">המשך למסמך הבא</p></a>

                                    <!-- second signature button -->
                                    <a class="button gform_button next" id="btnCloseModalPopup3" > <p class="first_modal_button continue_button scr_third_modal">סיים</p></a>
                                
                                </div>

                                <div class="col-md-1"></div>
                            </div>

                            </div>
                            
                        </div>
                    </div>
                </div>
				
	</div>
                
                <!-- third Modal -->
                <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel"><b>הלוואה למימון עמלת ערבות </b></h4>
                            </div>
                            <div class="modal-body">
                                
                             <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10 rtl" style="text-align: right;">
                                   
                                    <p>2019 תנש רבמטפס שדוחל 25 םויב ______ב םתחנו ךרענש ("ברעה" :ןלהל) 513578674 .פ.ח מ"עב דורנדלוג ןיב ביבא לת ,12 םיצורח די 'חרמ בודיוד סירוב ןיבל ביבא לת ,51 אבכוכ רב 'חרמ םיתוריש לע חוקיפה קוחב ותרדגהכ יארשא ןתמל ןוישיר תלעב הניהו יארשא יתוריש ןתמב תקסוע ברעהו ליאוה ;2016-ו"עשתה ,(םיידסומ םייסנניפ םיתוריש) םייסנניפ תבוטל ,("תוברעה בתכ" :ןלהל) 1125469877 ורפסמש תוברע בתכ ,ותשקבל ,חוקלל הקיפנה ברעהו ליאוהו ;הז םכסהל 'א חפסנכ תאזב ףרוצמה ,("תוברעה םוכס" :ןלהל) ₪ 24,000 ךס לע ,בטומה י"ע תוברעה בתכ טוליח םע רשקב םהילע ולוחי רשא תובוחה תא רידסהלו רידגהל םידדצה ןוצרבו ליאוהו .בטומה :ןמקלדכ םידדצה ןיב הנתוהו רהצוה ,םכסוה ךכיפל םיחפסנו אובמ .1 .ונמיה דרפנ יתלב קלח םיווהמ םכסהל םיפרוצמה םיחפסנה לכ ןכו םכסהל אובמה .1.1 .ןהיפל םכסהה יאנתמ יאנת שרפל ןיאו דבלב תויחונה ךרוצל ודעונ םיפיעסה תורתוכ .2.1 דחא לכמ תענומה ,רחא ןפוא לכב ןיבו ןיד יפ לע ןיב ,םכסהב ןיב ,הלבגה לכ םהילע ןיא יכ םיריהצמ םידדצה .3.1 .ויתוארוה תא אלמלו הז םכסהב רשקתהלמ םתוא הליבגמ וא םהמ תורשקתהה .2 םיטרופמ ויטרפ רשא ,תוברע בתכ חוקלל הקיפנה ברעה ,םידדצה ןיב תיללכה תורשקתהה תרגסמב .1.2 שקבי ובש הרקמב תוברעה םוכס תא בטומה ידיל ריבעהל הבייחתה וב ,בטומה לש ותבוטל ,הז םכסהל אובמב .תוברעה בתכ תא שממל בטומה שרדית ותוא םוכס לכ הרבחל םלשי בייחה ,איהש הביס לכמ ,בטומה י"ע תוברעה בתכ שומימ לש הרקמב .2.2 לש הבוגב תיתנש תיביר בייחה םלשי ,הרבחל תוברעה םוכס םולשתב רוחיא םוי לכ רובע .בטומל םלשל ברעה .תוברעה םוכסמ % 6 ברעה תיינפהב שמתשהל ,ותעד לוקיש יפ לע ,בייחה לכוי ,בטומה י"ע תוברעה בתכ שומימ לש הרקמב .3.2 .םישדוח 18 לש הפוקתל דומעת האוולהה .%9 לש העובק תיתנש תיבירב אירט תרבח ךרד האוולה תלבקל .אירטב חוקלה םותיח רושיאל הפופכ האוולהה תקנעה תא ברעה ידיל ריבעהל ביוחי םהמ דחא לכ ,תוברעה רטש דגנכ םימותחה בייחל םיברע ינש לש הרקמב .4.2 וא/ו האוולה תלבקל היינפה לבקל םיבייחה ולכוי אל הז הרקמב תאזו ,2.2 ףיעסב טרופמכ תוברעה םוכס אולמ .אירט עצבת התוא חוקלה תקידבב ודמעי אל םכסהה תפוקת .3 :ןיבמ םדקומב םייתסיו ליעל רומאה םוימ לחה ופקותב דומעי הז םכסה .1.3 ;תוברעה תכראה וא/ו שודיח לש הפוקת םג תללוכה ,תוברעה תפוקת םויס דעומ (א) .תוברעה טוליח תרגסמב ברעה י"ע בטומל רבעוה רשא תוברעה םוכס אולמ תלבק דעומ (ב) םיגצמ .4 :ןמקלדכ ,תאזב ריהצמ חוקלה םיכרעושמה ויכרעב דדמ דומצ אוהשכ תוברעה םוכס לכב ברעה יופישל םיילכלכה םיעצמאה לעב אוה .1.4 וא/ו חתפנ אל ,לגר תטישפל השונ תשקב וא/ו בייח תשקב וניינעב השגוה אלו לגר טשופכ רכומ וניא אוה .2.4 .-ם"שת ,]שדח חסונ[ לגרה תטישפ תדוקפב התועמשמכ ,לגר תטישפ לש והשלכ ךילה ודגנ דמוע וא/ו .-ז"כשת ,לעופל האצוהה קוחל ג69 ףיעסב ותועמשמכ ,םיעצמאב לבגומ בייחכ רכומ וניא אוה .3.4 םיטמתשמה םיבייחה םשרמב לולכ וניאו... קוחל.... 'א 66 ףיעסב ותועמשמכ ובוח םולשתמ טמתשמה בייח ...קוחל 'ו 66 ףיעס אושנ ...-א"משת ,יוסיכ אלל םיקיש קוח קוחל 2 ףיעס י"פע....... לבגוה ונובשח רשא בייחכ רכומ וניא אוה .4.4 ... 3 ףיעסל םאתהב.רומח לבגומ חוקלכ רדגוה וניא וא/ו .הרבחל ובוח םוכסל הייארכ ושמשי ברעה ירפס .5.4 חוקלה תויובייחתה .5 .םכסהה תפוקת ךלהמב םייקתהלמ לודחי הלעמ םייונמה םיגצמהמ דחא םא ברעה תא עדיי חוקלה .1.5 7 ךות תאזו ,בטומל הריבעה ותוא תוברעה םוכס אולמ תא ,הנושארה התשירד יפל ,הרבחל םלשי חוקלה .2.5 .בטומל תוברעה םוכס תרבעה דעוממ םימי היהתש אוהש גוס לכמ האצוה וא/ו םוכס לכ ןיגב ,הנושארה התשירד יפל ,ברעה תא הפשי וא/ו הצפי חוקלה .3.5 .חוקלהמ תוברעה םוכס תייבג םע רשקב ,ןיפיקעבו ןירשימב ,הרבחל יללכ .6 היהת הז םכסהל רושקה לכב תידעלבה טופישה תוכמסו ,הז םכסה לע ידעלב ןפואב לוחי ילארשיה ןידה .1.6 .ביבא לתב םיכמסומה טפשמה יתבל הרוסמ ףקות תרסח הניה וא/ו הפיכאל תנתינ הניא הז םכסה תוארוהמ הארוה יכ תמיוסמ האכרע י"ע עבקיי םא .2.6 .םכסהה תוארוה רתי לש ןפקות תא לטבל וא/ו םוגפל ידכ ךכב אהי אל ,והשלכ םעטמ דגנכש דצל העיגה וליאכ בשחית ,םושר ראודב הז םכסהל אובמב םידדצה תובותכ יפ לע חלשיתש העדוה .3.6 םאו ,התריסמ תעב – דיב הרסמנ םאו לארשיב ראוד תיבמ םושר ראודב הרוגיש םוימ םימי 3 ךות ותעידילו .הרוגיש דעוממ תועש 24 ךות – ל"אודב וא סקפב הרגוש</p>

                                </div>

                        

                                <div class="gform_footer" style="margin: 0 auto;"> 
                              
                                    <a class="button gform_button next"> <p class="first_button-new continue_button">םייס </p></a>
                                </div>
                                <div class="col-md-1"></div>
                            </div>

                            </div>
                            
                        </div>
                    </div>
                </div>
                
                <!--screen 03-->
                <div id="private_3_2__scr" class="gform_body form_height" style="margin-top: 30px;">
                     
                    <ul class="gform_fields top_label ">

                        <li class="gfield gfield_html gfield_no_follows_desc text_resp">
                        
                           <div class="" style="float: right; margin-left:15px; margin-top:-25px;">
                            <img src="website_assets/img/progress2.png" class="img-responsive">
                           
                           </div>
                            <div class="main_text">
                            <!-- <p class="contact-text_application"style="font-weight: bold;">סכום הערבות </p> -->
                            <p class="contact-text_application main_text_heading"style="font-weight: bold;">סכום הערבות והסכמים </p>
                           
                             <p class="contact-text_application" style="margin-top: -20px;">השלב הבא: פרטים על הנכס  </p>
                         </div>
                         </li>

                    

                    </ul>

                    <div class="row" style="margin-top: 70px;">

                        <li class="gf_middle_third gfield text-field1_application form-group">
                      
                            <div class="styled-input wide" >
                               <input type="text" name="private2_requested_gurantee_amt" id="private2_requested_gurantee_amt" value="" class="form-control fouth_text" autocomplete="off" required="" maxlength='7'>

                                <label class="gfield_label control-label gform_wrapper gfield_label" for="private2_requested_gurantee_amt">סכום הערבות והסכמים  
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
                         <div class="row cale_opn cala_margin1" style="    display: inline-block;">
                            
                            <div class="col-md-6">
                              <li class="gfield gf_left_third form-group">
                            <div class="first_button_new-text2" id="myBtn2"> 
                       
                                <a class=""> 
                                    <p class="first_button-new first_button_responsive p1_res" style="margin-top:25px;  margin-left:70px; "> הסכמה למסירת נתוני אשראי </p>
                                </a>
                       
                               <div class="checkbox checkbox-warning primary-box chk2_res" id="sec_scr_checkbox2" style="margin-right:-34px;">
                                    <input id="checkbox2" name="checkbox2" type="checkbox" value="" >
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
                                    <p class="first_button-new first_button_responsive p2_res" style="margin-top:25px;"> זכות הלקוח לקבלת דו"ח נתוני האשראי </p>
                                </a>    
                               <div class="checkbox checkbox-primary primary-box chk1_res" id="sec_scr_checkbox1">
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
                                    <p class="first_button-new first_button_responsive p3_res" style="margin-left: 21px; margin-top: -8px;"> הסכם שיפוי </p>
                                </a>  
                                  
                               <div class="checkbox checkbox-primary primary-box chk3_res" id="sec_scr_checkbox3">
                                    <input id="btn3_checkbox" name="btn3_checkbox" type="checkbox" value="">
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
                            <input type="hidden" name="flowCheck" value="2">
                            <button type="button" class="gform_button button first_button-new continue_button first_next_button lowerbutton1" id="private2_3_form" style="height: 60px; width: 328px;">המשך</button>

                        
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
    
                $("#private_3_2__scr").hide();
                $(".sonar-wrapper").show();
				
				// only for test
				gurant_amm = $("#private2_requested_gurantee_amt").val();
				gurant_amm = gurant_amm.replace(",","");
				gurant_amm = parseInt(gurant_amm);

				// if(gurant_amm > 25000){
					
					// location.href = "<?php echo site_url('private7'); ?>";
				// }
				// else{
					// location.href = "<?php echo site_url('private7'); ?>";
				// }
				// end test
				
				// for testing purpose hide payment api by idan
                // payment_api();
				// end payment api
				
				form_api();
}

function form_api(){
    
        var form = $('#myform').serialize();
//        console.log(form); 
//        return false;
        $.ajax({
                url: "<?php echo site_url('PrivateFlow/private_payment_api'); ?>",
                type: "POST",
                data: form,
//                contentType: false,
//                cache: false,
//                processData: false,
                success: function (result) {
                    
                    console.log('posting data');
                    
                    var documentcontent = $("#document_content").html();
                    
                     $.ajax({
                        type: "POST",
                        url: "<?php echo site_url('PrivateFlow/createdocument'); ?>",
                        dataType:'text',
                        data: {datatext:btoa(unescape(encodeURIComponent(documentcontent)))},
                        success: function (result) {
                            
                            
                            
                        },
                        error: function(error){
                            
                        }
                      });
                      
                      
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

                       location.href = "<?php echo site_url('private7'); ?>";
                        
                       /* var status = getdata.status;
                        
                        if (status == 'true') {
							
                            gurant_amm = $("#private2_requested_gurantee_amt").val();
                            
                            gurant_amm = gurant_amm.replace(",","");
                    
                            gurant_amm = parseInt(gurant_amm);
     
                            if(gurant_amm > 25000){
                               
                                location.href = "<?php echo site_url('private7'); ?>";
                            }
                            else{
                                location.href = "<?php echo site_url('private7'); ?>";
                            }
                               
                        }*/
                        
                    }
                    else{
                        alert('Eroor!');
                        location.href = "<?php echo site_url('private1'); ?>";
                    }
                   
                    return false;
                    
                },
                error: function () {
                }
            });
}

// this function change date 31/12/2020 by idan
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
                url: "<?php echo site_url('PrivateFlow/private_payment_api'); ?>",
                type: "POST",
                data: form,
//                contentType: false,
//                cache: false,
//                processData: false,
                success: function (result) {
                    
                    var documentcontent = $("#document_content").html();
                    
                     $.ajax({
                        type: "POST",
                        url: "<?php echo site_url('PrivateFlow/createdocument'); ?>",
                        dataType:'text',
                        data: {datatext:btoa(unescape(encodeURIComponent(documentcontent)))},
                        success: function (result) {
                            
                            
                            
                        },
                        error: function(error){
                            
                        }
                      });
                    
                    
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
                        
                   //      location.href = "<?php echo site_url('private7'); ?>";
                         
//                        alert(url_iframe);
//                        var status = getdata.status;
//                        alert(1);
                        if (status == 'true') {
//                            alert(2);
                            
//                            if($("#value_check").val() == 1){
//                                location.href = "<?php // echo site_url('businessThird4'); ?>";
//                            }if($("#value_check").val() == 2){
//                                location.href = "<?php // echo site_url('businessThird5'); ?>";
//                            }
                            gurant_amm = $("#private2_requested_gurantee_amt").val();
                            
                            gurant_amm = gurant_amm.replace(",","");
                    
                            gurant_amm = parseInt(gurant_amm);
     
                            if(gurant_amm > 25000){
                                //location.href = "<?php //echo site_url('private42'); ?>";
                           //     
                            //    location.href = "<?php echo site_url('private7'); ?>";
                            }
                            else{
                            //    location.href = "<?php echo site_url('private7'); ?>";
                            }
                               
                        }
                        else
                        {
                           location.href = "<?php echo site_url('privateBadResponse'); ?>";
                        }
                    }
                    else{
                        alert('Eroor!');
                        location.href = "<?php echo site_url('private1'); ?>";
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
                url: "<?php echo site_url('PrivateFlow/business_without_payment_api'); ?>",
                type: "POST",
                data: form,
//                contentType: false,
//                cache: false,
//                processData: false,
                success: function (result) {
                    
                     var documentcontent = $("#document_content").html();
                    
                     $.ajax({
                        type: "POST",
                        url: "<?php echo site_url('PrivateFlow/createdocument'); ?>",
                        dataType:'text',
                        data: {datatext:btoa(unescape(encodeURIComponent(documentcontent)))},
                        success: function (result) {
                            
                            
                            
                        },
                        error: function(error){
                            
                        }
                      });
                      
//                    alert(222);
                    console.log(result);
//                    alert(result);
                    $(".sonar-wrapper").hide('fast');
                    $("#sonar_text").hide('fast');
                    if($("#value_check").val() == 1){
                     //   location.href = "<?php echo site_url('businessThird4'); ?>";
                    }if($("#value_check").val() == 2){
                     //   location.href = "<?php echo site_url('businessThird5'); ?>";
                    }
                    
                    return false;
                    
                },
                error: function () {
                }
            });
}


var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
var element = document.getElementById('text');

if (isMobile) {

    $(".first_modal_button").css("opacity","1");
    $(".first_modal_button").css("cursor","pointer");
    
//    first signature
    $("#btnCloseModalPopupnew").click(function () {
        
        console.log('i am here');
    
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
        
        if($("#private2_requested_gurantee_amt").val() != '' && $("#gur_period_month").val() != '' && $("#endDate").val() != '' && $('#checkbox4').is(":checked") != '' && $("#first_bae64_sign").val() != '' && $("#second_bae64_sign").val() != '' ){

            $("#private2_3_form").css("opacity","1"); // button opacity change
            $("#private2_3_form").css("cursor","pointer");
            $("#private2_3_form").prop("disabled", false);

        }
        else{
            $("#private2_3_form").css("opacity","0.5"); // button opacity change
            $("#private2_3_form").css("cursor","auto");
            $("#private2_3_form").prop("disabled", true);
        }
          
    });
    
    //    second signature
    $("#btnCloseModalPopup3").click(function () {
    
        if( signaturePad2.isEmpty()){
          console.log('signature2 is empty');
          alert('please fill signature first.');
          return false;            
        }

        var data2 = signaturePad2.toDataURL('image/png');
        $('#second_bae64_sign').val(data2);
        
        $("#sec_scr_checkbox3").show();
        $("#btn3_checkbox").prop("checked", true);
        
        $("#myModal2").modal("hide");
        console.log("mobile base64 image value => "+$('#second_bae64_sign').val());
        
        if($("#private2_requested_gurantee_amt").val() != '' && $("#gur_period_month").val() != '' && $("#endDate").val() != '' && $('#checkbox4').is(":checked") != '' && $("#first_bae64_sign").val() != '' && $("#second_bae64_sign").val() != '' ){

            $("#private2_3_form").css("opacity","1"); // button opacity change
            $("#private2_3_form").css("cursor","pointer");
            $("#private2_3_form").prop("disabled", false);
            

        }
        else{
            $("#private2_3_form").css("opacity","0.5"); // button opacity change
            $("#private2_3_form").css("cursor","auto");
            $("#private2_3_form").prop("disabled", true);
        }
          
    });
//    $('#first_bae64_sign').val();

}

</script>

<script>
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



$("#btnCloseModalPopupnew").click(function () {
    
     console.log($("#private2_requested_gurantee_amt").val() + ' &&& '  + $("#gur_period_month").val() + ' && ' + $("#endDate").val() + ' && '+ $("#first_bae64_sign").val() + '&& '+ $("#second_bae64_sign").val());
        

            
                          $("#myModalnew").modal("hide");
                          $("#myModalnew").css("cursor","pointer");
                      

                        if($("#private2_requested_gurantee_amt").val() != '' && $("#gur_period_month").val() != '' && $("#endDate").val() != '' && $("#first_bae64_sign").val() != '' && $("#second_bae64_sign").val() != '' ){

                            $("#private2_3_form").css("opacity","1"); // button opacity change
                            $("#private2_3_form").css("cursor","pointer");
                            $("#private2_3_form").prop("disabled", false);

                        }else{

                            $("#private2_3_form").css("opacity","0.5"); // button opacity change
                            $("#private2_3_form").css("cursor","auto");
                            $("#private2_3_form").prop("disabled", true);
                        }
                        
});

</script>

<script type="text/javascript" src="https://www.jqueryscript.net/demo/Auto-Format-Currency-With-jQuery/simple.money.format.js"></script>

<script type="text/javascript">
	$('#private2_requested_gurantee_amt').simpleMoneyFormat();
</script>