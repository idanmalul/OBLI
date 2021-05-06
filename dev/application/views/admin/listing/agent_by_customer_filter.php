<!-- date picker -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-title">
            Filter of Status
        </div>
         <div class="panel-options">
            <!-- <a href="<?php echo site_url('admin/add_agent'); ?>" class="btn btn-turquoise fa-plus-circle" style="color: #fff;">
                Add Agent
            </a> --> 
        </div> 
    </div>

<form method="post" action="<?php echo site_url('agent_filter'); ?>">  

        <div class="col-sm-6 form-group">

                <label class="control-label">Type of Loan </label>

                <select class="form-control input-dark" name="loan_type" data-validate="required">

                    <option selected="" disabled="" hidden="">--Select type of loan--</option>
                    
                    <option value="PL" <?php if(!empty($customer_loan_detail)){ if(!empty($customer_loan_detail[0]->type_of_loan)){ if($customer_loan_detail[0]->type_of_loan == "PL"){ echo "selected='selected'"; } } }else{ if(!empty($type_selected['loan_selected'])){ if(isset($_POST['loan_type'])=="PL" && $type_selected['loan_selected'] == "PL"){ echo 'selected="selected"'; } } } ?>  >Personal Loan</option>

                    <option value="HL" <?php if(!empty($customer_loan_detail)){ if(!empty($customer_loan_detail[0]->type_of_loan)){ if($customer_loan_detail[0]->type_of_loan == "HL"){ echo "selected='selected'"; } } }else{ if(!empty($type_selected['loan_selected'])){ if(isset($_POST['loan_type'])=="HL" && $type_selected['loan_selected'] == "HL"){ echo 'selected="selected"'; } } } ?> >Home Loan</option>

                    <option value="LAP" <?php if(!empty($customer_loan_detail)){ if(!empty($customer_loan_detail[0]->type_of_loan)){ if($customer_loan_detail[0]->type_of_loan == "LAP"){ echo "selected='selected'"; } } }else{ if(!empty($type_selected['loan_selected'])){ if(isset($_POST['loan_type'])=="LAP" && $type_selected['loan_selected'] == "LAP"){ echo 'selected="selected"'; } } } ?> >Loan Against Property</option>

                    <option value="BL" <?php if(!empty($customer_loan_detail)){ if(!empty($customer_loan_detail[0]->type_of_loan)){ if($customer_loan_detail[0]->type_of_loan == "BL"){ echo "selected='selected'"; } } }else{ if(!empty($type_selected['loan_selected'])){ if(isset($_POST['loan_type'])=="BL" && $type_selected['loan_selected'] == "BL"){ echo 'selected="selected"'; } } } ?> >Business Loan</option>

                    <!-- <option value="CC" >CC</option> -->

                </select>

        </div>

        <div class="col-sm-6 form-group">

                <label class="control-label">Select Status</label>

                <select class="form-control input-dark" name="status_type" data-validate="required">

                    <option selected="" disabled="" hidden="">--Select Status--</option>
                    
                    <option value="4" <?php if(!empty($customer_loan_detail)){ if(!empty($customer_loan_detail[0]->status)){ if($customer_loan_detail[0]->status == 4){ echo "selected='selected'"; } } }else{ if(!empty($type_selected['status_selected'])){ if(isset($_POST['status_type'])==4 && $type_selected['status_selected'] == 4){ echo 'selected="selected"'; } } } ?> >Disbursed</option>

                    <option value="1" <?php if(!empty($customer_loan_detail)){ if(!empty($customer_loan_detail[0]->status)){ if($customer_loan_detail[0]->status == 1){ echo "selected='selected'"; } } }else{ if(!empty($type_selected['status_selected'])){ if(isset($_POST['status_type'])==1 && $type_selected['status_selected'] == 1){ echo 'selected="selected"'; } } } ?> >Approved</option>

                    <option value="2" <?php if(!empty($customer_loan_detail)){ if(!empty($customer_loan_detail[0]->status)){ if($customer_loan_detail[0]->status == 2){ echo "selected='selected'"; } } }else{ if(!empty($type_selected['status_selected'])){ if(isset($_POST['status_type'])==2 && $type_selected['status_selected'] == 2){ echo 'selected="selected"'; } } } ?> >Pending</option>

                    <option value="3" <?php if(!empty($customer_loan_detail)){ if(!empty($customer_loan_detail[0]->status)){ if($customer_loan_detail[0]->status == 3){ echo "selected='selected'"; } } }else{ if(!empty($type_selected['status_selected'])){ if(isset($_POST['status_type'])==3 && $type_selected['status_selected'] == 3){ echo 'selected="selected"'; } } } ?> >Rejected</option>

                    <!-- <option value="CC" >CC</option> -->

                </select>

        </div>

	    <div class="form-group">
            <div class="control-label">
                <label class="" >Custom Date Range</label>
            </div>
            
            <div class="col-sm-6 form-group">
                <input type="text" class="form-control" name="start_date"  placeholder="Start date" id="from" data-format="d-m-yyyy" value="<?php if(isset($_POST['start_date'])){ echo $_POST['start_date']; } ?>" autocomplete="off">
            </div>

            <div class="col-sm-6 form-group">
                <input type="text" class="form-control" name="end_date" placeholder="End date" id="to" data-format="d-m-yyyy" value="<?php if(isset($_POST['end_date'])){ echo $_POST['end_date']; } ?>" autocomplete="off">
            </div>
            
    
            <!-- <input type="text" id="field-1" name="date_range" class="form-control daterange" data-format="D-M-YY" placeholder="select date" autocomplete="off" /> -->
                
        </div>

        <div class="form-group">
               
            <input type="submit" name="submit" value="Search" class="btn btn-success float_right ck_textarea_on">

        </div>

       
    </form>

</div>    




<!-- <br><br><br><br><br><br> -->



<?php if(!empty($customer_loan_detail)){ if(isset($_SESSION['error'])){
            unset($_SESSION['error']);
        } ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-title">
            Customer Details
        </div>
         <div class="panel-options">

            <b>Total No. Of Cases Logged In: <mark><?php if(!empty($total_login_count)){ echo count($total_login_count); }else{ echo "0"; }  ?></mark></b>

            <!-- <a href="<?php echo site_url('admin/add_agent'); ?>" class="btn btn-turquoise fa-plus-circle" style="color: #fff;">
                Add Agent
            </a> --> 
        </div> 
    </div>
    <div id="slider_images_list" class="panel-body table-responsive">

    <?php if(!empty($customer_loan_detail)){ if(!empty($customer_loan_detail[0]->type_of_loan)){ if($customer_loan_detail[0]->type_of_loan == "BL"){ ?>

        <div class="panel-options">
            <b >Login AMT: <mark><?php if(!empty($total_login_count)){ foreach($total_login_count as $total){ $total_amt[] = $total->requested_loan_ammount; } echo array_sum($total_amt); }else{ echo "0"; }  ?></mark></b><hr>
        </div>

    <?php } } } ?>

        
        <table id="example-1" class="table table-striped table-bordered " cellspacing="0" style="width: 150%; max-width: none;" >

            <thead>

                <tr>

                    <th>S.No.</th>
                    <th>Type of Loan</th>
                    <th>Name of Customer</th>
                    <th>Date of Login</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Comments</th>

                </tr>

            </thead>

            <tbody>
                <?php if (!empty($customer_loan_detail)) {
                    $n = 1;
                    foreach ($customer_loan_detail as $v) {
                        ?>

                        <tr id="row<?php echo $v->id;?>">
                            <td><?php echo $n; ?></td>
                            <td><?php if(!empty($v->c_loan_type)){ if($v->c_loan_type == "PL"){ echo "Personal Loan"; }elseif($v->c_loan_type == "HL"){ echo "Home Loan"; }elseif($v->c_loan_type == "LAP"){ echo "Loan Against Property"; }elseif($v->c_loan_type == "BL"){ echo "Business Loan"; }  } ?></td>
                            <td><?php echo $v->name_of_the_applicant; ?></td>

                            <td><?php $date = date("d M Y h:i A", strtotime($v->created_at)); echo $date; ?></td>

                            <td><?php echo $v->requested_loan_ammount; ?></td>

                            <td><?php if(!empty($v->status)){ if($v->status == 1){ echo "Approved"; }elseif($v->status == 2){ echo "pending"; }elseif($v->status == 3){ echo "Rejected"; }elseif($v->status == 4){ echo "Disbursed"; } }elseif(!empty($v->customer_loan_status)){ if($v->customer_loan_status == 1){ echo "Approved"; }elseif($v->customer_loan_status == 2){ echo "pending"; }elseif($v->customer_loan_status == 3){ echo "Rejected"; }elseif($v->customer_loan_status == 4){ echo "Disbursed"; } }elseif(!empty($v->agent_status)){ if($v->agent_status == 1){ echo "Approved"; }elseif($v->agent_status == 2){ echo "pending"; }elseif($v->agent_status == 3){ echo "Rejected"; }elseif($v->agent_status == 4){ echo "Disbursed"; } }elseif(!empty($v->loan_agent_start_end_status)){ if($v->loan_agent_start_end_status == 1){ echo "Approved"; }elseif($v->loan_agent_start_end_status == 2){ echo "pending"; }elseif($v->loan_agent_start_end_status == 3){ echo "Rejected"; }elseif($v->loan_agent_start_end_status == 4){ echo "Disbursed"; } } ?></td>
                           
                            <td id="comments_val<?php echo $v->id;?>" ><?php echo $v->comments; ?></td>
                            

                        </tr>
                    

                <?php $n = $n + 1; } } ?>

            </tbody>

        </table>

    </div>
</div>



<?php } ?>

<script type="text/javascript">
    $( function() {
    var dateFormat = "mm/dd/yy",
      from = $( "#from" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 1
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#to" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 1
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }
  } );
</script>



<script type="text/javascript">



            jQuery(document).ready(function ($)

            {

                $("#example-1").dataTable({

                    aLengthMenu: [

                        [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]

                    ]

                });
                

            });



</script>

<?php if ($this->session->flashdata('status')) { ?>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong><?php echo $this->session->flashdata('status'); ?></strong>
            </div>
        </div>
    </div>
<?php } ?>
<?php if ($this->session->flashdata('error')) { ?>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong><?php echo $this->session->flashdata('error'); ?></strong>
            </div>
        </div>
    </div>
<?php } ?>
