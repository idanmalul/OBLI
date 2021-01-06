<!-- date picker -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
<?php $admin_type = $this->session->userdata('admin_type'); ?>
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

<form method="post" action="<?php echo site_url('filter'); ?>">


    <?php if(!empty($admin_type)){ if($admin_type == 1){ ?> 
        <div class="col-sm-3 form-group">
    <?php } elseif($admin_type == 2){ ?>
        <div class="col-sm-6 form-group">
    <?php } } ?>        
                <label class="control-label">Type of Loan </label>

                <select class="form-control input-dark" name="loan_type" data-validate="required">

                    <option selected="" disabled="" hidden="">--Select type of loan--</option>
                    
                    <option value="PL" <?php if(!empty($loan_detail)){ if(!empty($loan_detail[0]->type_of_loan)){ if($loan_detail[0]->type_of_loan == "PL"){ echo "selected='selected'"; } } }elseif(!empty($customer_loan_detail)){ if(!empty($customer_loan_detail[0]->type_of_loan)){ if($customer_loan_detail[0]->type_of_loan == "PL"){ echo "selected='selected'"; } } }else{ if(!empty($type_selected['loan_selected'])){ if(isset($_POST['loan_type'])=="PL" && $type_selected['loan_selected'] == "PL"){ echo 'selected="selected"'; } } } ?>  >Personal Loan</option>

                    <option value="HL" <?php if(!empty($loan_detail)){ if(!empty($loan_detail[0]->type_of_loan)){ if($loan_detail[0]->type_of_loan == "HL"){ echo "selected='selected'"; } } }elseif(!empty($customer_loan_detail)){ if(!empty($customer_loan_detail[0]->type_of_loan)){ if($customer_loan_detail[0]->type_of_loan == "HL"){ echo "selected='selected'"; } } }else{ if(!empty($type_selected['loan_selected'])){ if(isset($_POST['loan_type'])=="HL" && $type_selected['loan_selected'] == "HL"){ echo 'selected="selected"'; } } } ?> >Home Loan</option>

                    <option value="LAP" <?php if(!empty($loan_detail)){ if(!empty($loan_detail[0]->type_of_loan)){ if($loan_detail[0]->type_of_loan == "LAP"){ echo "selected='selected'"; } } }elseif(!empty($customer_loan_detail)){ if(!empty($customer_loan_detail[0]->type_of_loan)){ if($customer_loan_detail[0]->type_of_loan == "LAP"){ echo "selected='selected'"; } } }else{ if(!empty($type_selected['loan_selected'])){ if(isset($_POST['loan_type'])=="LAP" && $type_selected['loan_selected'] == "LAP"){ echo 'selected="selected"'; } } } ?> >Loan Against Property</option>

                    <option value="BL" <?php if(!empty($loan_detail)){ if(!empty($loan_detail[0]->type_of_loan)){ if($loan_detail[0]->type_of_loan == "BL"){ echo "selected='selected'"; } } }elseif(!empty($customer_loan_detail)){ if(!empty($customer_loan_detail[0]->type_of_loan)){ if($customer_loan_detail[0]->type_of_loan == "BL"){ echo "selected='selected'"; } } }else{ if(!empty($type_selected['loan_selected'])){ if(isset($_POST['loan_type'])=="BL" && $type_selected['loan_selected'] == "BL"){ echo 'selected="selected"'; } } } ?> >Business Loan</option>

                    <!-- <option value="CC" >CC</option> -->

                </select>

        </div>


    <?php if(!empty($admin_type)){ if($admin_type == 1){ ?>


        <div class="col-sm-3 form-group">

                <label class="control-label">Select Business Partner</label>

                <select class="form-control input-dark" name="partner_name" data-validate="required">

                    <option selected="" disabled="" hidden="">--Select Business Partner--</option>

                    <?php $partner = get_all_partner(); if(!empty($partner)){ foreach($partner as $p){ ?>

                     <option value="<?php echo $p->id; ?>" <?php if(!empty($customer_loan_detail)){ if(!empty($customer_loan_detail[0]->partner_id)){ if($customer_loan_detail[0]->partner_id == $p->id){ echo "selected='selected'"; } } }else{ if(!empty($type_selected['partner_selected'])){ if($p->id == $type_selected['partner_selected']){ echo 'selected="selected"'; } } } ?>   ><?php if(!empty($partner)){ echo $p->name; }  ?></option>

                    <?php }  } ?>
                    
                </select>

        </div>  

        <div class="col-sm-3 form-group">

                <label class="control-label">Select Agent </label>

                <select class="form-control input-dark" name="agent" data-validate="required">

                    <option selected="" disabled="" hidden="">--Select Agent--</option>

                    <?php $active_agent = active_all_agent(); if(!empty($active_agent)){ foreach($active_agent as $value){ ?>

                     <option value="<?php echo $value->admin_id; ?>" <?php if(!empty($customer_loan_detail)){ if(!empty($customer_loan_detail[0]->created_by)){ if($customer_loan_detail[0]->created_by == $value->admin_id){ echo "selected='selected'"; } } }else{ if(!empty($type_selected['agent_selected'])){ if($value->admin_id == $type_selected['agent_selected']){ echo 'selected="selected"'; } } } ?>   ><?php if(!empty($active_agent)){ echo $value->admin_name; }  ?></option>

                    <?php }  } ?>
                    
                </select>

        </div>

    <?php  } } ?>

    <?php if(!empty($admin_type)){ if($admin_type == 1){ ?> 
        <div class="col-sm-3 form-group">
    <?php } elseif($admin_type == 2){ ?>
        <div class="col-sm-6 form-group">
    <?php } } ?>

                <label class="control-label">Select Status </label>

                <select class="form-control input-dark" name="status_type" data-validate="required">

                    <option selected="" disabled="" hidden="">--Select Status--</option>
                    
                    <option value="4" <?php if(!empty($customer_loan_detail)){ if(!empty($customer_loan_detail[0]->status)){ if($customer_loan_detail[0]->status == 4){ echo "selected='selected'"; } } }else{ if(!empty($type_selected['status_selected'])){ if(isset($_POST['status_type'])==4 && $type_selected['status_selected'] == 4){ echo 'selected="selected"'; } } } ?> >Disbursed</option>

                    <option value="1" <?php if(!empty($customer_loan_detail)){ if(!empty($customer_loan_detail[0]->status)){ if($customer_loan_detail[0]->status == 1){ echo "selected='selected'"; } } }else{ if(!empty($type_selected['status_selected'])){ if(isset($_POST['status_type'])==1 && $type_selected['status_selected'] == 1){ echo 'selected="selected"'; } } } ?> >Approved</option>

                    <option value="2" <?php if(!empty($customer_loan_detail)){ if(!empty($customer_loan_detail[0]->status)){ if($customer_loan_detail[0]->status == 2){ echo "selected='selected'"; } } }else{ if(!empty($type_selected['status_selected'])){ if(isset($_POST['status_type'])==2 && $type_selected['status_selected'] == 2){ echo 'selected="selected"'; } } } ?> >Pending</option>

                    <option value="3" <?php if(!empty($customer_loan_detail)){ if(!empty($customer_loan_detail[0]->status)){ if($customer_loan_detail[0]->status == 3){ echo "selected='selected'"; } } }else{ if(!empty($type_selected['status_selected'])){ if(isset($_POST['status_type'])==3 && $type_selected['status_selected'] == 3){ echo 'selected="selected"'; } } } ?> >Rejected</option>

                    <!-- <option value="CC" >CC</option> -->

                </select>

        </div>
<!--
        <div class="form-group">
            <div class="control-label">
		<label class="" >Select Details for Date</label>

                <select class="form-control input-dark" name="loan_type" data-validate="required">

                    <option selected="" disabled="" hidden="">--Select Type of Loan--</option>
	    
	    <option value="L7D" <?php if(!empty($loan_detail)){ if(!empty($loan_detail[0]->type_of_loan)){ if($loan_detail[0]->type_of_loan == "PL"){ echo "selected='selected'"; } } }elseif(!empty($customer_loan_detail)){ if(!empty($customer_loan_detail[0]->type_of_loan)){ if($customer_loan_detail[0]->type_of_loan == "PL"){ echo "selected='selected'"; } } } ?>  >Last 7 Days</option> 

                    <option value="TM" <?php if(!empty($loan_detail)){ if(!empty($loan_detail[0]->type_of_loan)){ if($loan_detail[0]->type_of_loan == "PL"){ echo "selected='selected'"; } } }elseif(!empty($customer_loan_detail)){ if(!empty($customer_loan_detail[0]->type_of_loan)){ if($customer_loan_detail[0]->type_of_loan == "PL"){ echo "selected='selected'"; } } } ?>  >This Month </option>
                    <option value="TM" <?php if(!empty($loan_detail)){ if(!empty($loan_detail[0]->type_of_loan)){ if($loan_detail[0]->type_of_loan == "PL"){ echo "selected='selected'"; } } }elseif(!empty($customer_loan_detail)){ if(!empty($customer_loan_detail[0]->type_of_loan)){ if($customer_loan_detail[0]->type_of_loan == "PL"){ echo "selected='selected'"; } } } ?>  >Custom Date Range </option>


                </select>


	    </div>

	</div>
-->
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



<?php if(!empty($customer_loan_detail)){ if(isset($_SESSION['error'])){
            unset($_SESSION['error']);
        } ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-title">
            Customer Details
        </div>
         <div class="panel-options">
            <!-- <a href="<?php echo site_url('admin/add_agent'); ?>" class="btn btn-turquoise fa-plus-circle" style="color: #fff;">
                Add Agent
            </a> --> 
        </div> 
    </div>
    <div id="slider_images_list" class="panel-body table-responsive">

        
        <table id="example-1" class="table table-striped table-bordered " cellspacing="0" style="width: 150%; max-width: none;" >

            <thead>

                <tr>

                    <th>S.No.</th>

                    <?php if(!empty($admin_type)){ if($admin_type == 1) { ?>
                        <th>Name of Agent</th>
                    <?php } }  ?>

                    <th>Type of Loan</th>
                    <th>Name of Customer</th>
                    <th>Date of Login</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>ROI</th>
                    <th>Proc Fee</th>
                    <th>Comments</th>

                    <?php if(!empty($admin_type)){ if($admin_type == 1) {  ?>
                        <th>Partner Name</th>
                    <?php } }  ?>

                    <th>Action</th>

                </tr>

            </thead>

            <tbody>
                <?php if (!empty($customer_loan_detail)) {
                    $n = 1;
                    foreach ($customer_loan_detail as $v) {
                        ?>

                        <tr id="row<?php echo $v->id;?>">
                            <td><?php echo $n; ?></td>

                        <?php if(!empty($admin_type)){ if($admin_type == 1) {  ?>
                            <td><?php if(!empty($v->agent_id)){ $agent_d = get_agent_detail_by_id($v->agent_id); if(!empty($agent_d)){ echo $agent_d[0]->admin_name; } } ?></td>
                        <?php } }  ?>

                            <td><?php if(!empty($v->c_loan_type)){ if($v->c_loan_type == "PL"){ echo "Personal Loan"; }elseif($v->c_loan_type == "HL"){ echo "Home Loan"; }elseif($v->c_loan_type == "LAP"){ echo "Loan Against Property"; }elseif($v->c_loan_type == "BL"){ echo "Business Loan"; }  } ?></td>

                            <td><?php echo $v->name_of_the_applicant; ?></td>

                            <td><?php $date = date("d M Y h:i A", strtotime($v->created_at)); echo $date; ?></td>

                            <td><?php echo $v->requested_loan_ammount; ?></td>

                            <td id="status_val<?php echo $v->id;?>" ><?php if(!empty($v->status)){ if($v->status == 1){ echo "Approved"; }elseif($v->status == 2){ echo "pending"; }elseif($v->status == 3){ echo "Rejected"; }elseif($v->status == 4){ echo "Disbursed"; } }elseif(!empty($v->agent_loan_status)){ if($v->agent_loan_status == 1){ echo "Approved"; }elseif($v->agent_loan_status == 2){ echo "pending"; }elseif($v->agent_loan_status == 3){ echo "Rejected"; }elseif($v->agent_loan_status == 4){ echo "Disbursed"; } }elseif(!empty($v->agent_status)){ if($v->agent_status == 1){ echo "Approved"; }elseif($v->agent_status == 2){ echo "pending"; }elseif($v->agent_status == 3){ echo "Rejected"; }elseif($v->agent_status == 4){ echo "Disbursed"; } }elseif(!empty($v->loan_agent_start_end_status)){ if($v->loan_agent_start_end_status == 1){ echo "Approved"; }elseif($v->loan_agent_start_end_status == 2){ echo "pending"; }elseif($v->loan_agent_start_end_status == 3){ echo "Rejected"; }elseif($v->loan_agent_start_end_status == 4){ echo "Disbursed"; } } ?></td>

                            <td id="roi_val<?php echo $v->id;?>" ><?php echo $v->roi; ?></td>

                            <td id="proc_fee_val<?php echo $v->id;?>" ><?php echo $v->proc_fee; ?></td>

                            <td id="comments_val<?php echo $v->id;?>" ><?php echo $v->comments; ?></td>

                        <?php if(!empty($admin_type)){ if($admin_type == 1) {  ?>
                            <td id="partner_val<?php echo $v->id;?>" ><?php if(!empty($v->p_id)){ $detail = get_partner_by_id($v->p_id); if(!empty($detail)){ echo $detail[0]->name; } } ?></td>
                        <?php } }  ?>
                            
                            <td width="10%">

                                <!-- <a href="<?php echo site_url('admin/change_status') . '/id/' . $v->id; ?>/new_login/status/1/new_login_list" class="btn btn-secondary btn-sm btn-icon icon-left" data-toggle="tooltip" data-placement="right" title=""><i class="fa fa-check"></i>Approved</a>
                               
                                
                                <a href="<?php echo site_url('admin/change_status') . '/id/' . $v->id; ?>/new_login/status/2/new_login_list" class="btn btn-warning btn-sm btn-icon icon-left" data-toggle="tooltip" data-placement="right" title="" ><i class="fa fa-exclamation"></i> Pending</a><br><br>                                
                                <a href="<?php echo site_url('admin/change_status') . '/id/' . $v->id; ?>/new_login/status/3/new_login_list" class="btn btn-danger" data-toggle="tooltip" data-placement="right" title="" ><i class=""></i> Rejected</a>

                                 
                                
                                <a href="<?php echo site_url('admin/change_status') . '/id/' . $v->id; ?>/new_login/status/4/new_login_list" class="btn btn-info " data-toggle="tooltip" data-placement="right" title="" ><i class=""></i> Disbursed</a><br><br> -->
                                
                                
                                <input type='button' class="edit_button btn btn-blue" id="edit_button<?php echo $v->id;?>" value="edit" onclick="edit_row('<?php echo $v->id;?>');"><br><br>

                                <input type='button' class="save_button btn btn-success " id="save_button<?php echo $v->id;?>" value="save" onclick="save_row('<?php echo $v->id;?>');">
                                
                                <!-- <a href="<?php echo site_url('admin/edit_new_login') . '/' . $v->id; ?>" class="btn btn-blue btn-sm btn-icon icon-left" data-toggle="tooltip" data-placement="right" title="Edit"><i class="fa fa-pencil"></i> Edit</a> -->
                                

                                <!-- <a onClick="if(!confirm('Are you sure, You want to delete this customer?')){return false;}" href="<?php echo site_url('admin/delete') . '/delete_customer/new_login/id/' . $value->id; ?>" class="btn btn-danger btn-sm btn-icon icon-left" data-toggle="tooltip" data-placement="right" title="Delete"><i class="fa fa-trash"></i></a><br><br> -->

                            </td>

                        </tr>
 <script type="text/javascript">
    
    $(document).ready(function(){
        $("#save_button<?php echo $v->id;?>").hide('fast');
    });

</script>                       

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

<?php $part = active_partner(); ?>

<script type="text/javascript">



            jQuery(document).ready(function ($)

            {

                $("#example-1").dataTable({

                    aLengthMenu: [

                        [5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"]

                    ]

                });
                

            });


function edit_row(id)
{
 var status=document.getElementById("status_val"+id).innerHTML;   
 var roi=document.getElementById("roi_val"+id).innerHTML;
 var proc_fee=document.getElementById("proc_fee_val"+id).innerHTML;
 var comments=document.getElementById("comments_val"+id).innerHTML;
 var partner=document.getElementById("partner_val"+id).innerHTML;

document.getElementById("status_val"+id).innerHTML="<select id='status_text"+id+"' value='"+status+"' class='form-control'><option value='1'>Approved</option><option value='2'>Pending</option><option value='3'>Rejected</option><option value='4'>Disbursed</option></select>";

 document.getElementById("roi_val"+id).innerHTML="<input type='text' id='roi_text"+id+"' value='"+roi+"' class='form-control' style='width: 100px;'>";
 document.getElementById("proc_fee_val"+id).innerHTML="<input type='text' id='proc_fee_text"+id+"' value='"+proc_fee+"' class='form-control' style='width: 100px;' >";
 document.getElementById("comments_val"+id).innerHTML="<textarea type='text' id='comments_text"+id+"' value='"+comments+"' class='form-control' rows='8' cols='16' >"+comments+"</textarea>";

 

 document.getElementById("partner_val"+id).innerHTML="<select id='partner_text"+id+"' value='"+partner+"' class='form-control'>"+ "<?php $part = active_partner(); if(!empty($part)){ foreach($part as $v){ ?>" +"<option value='<?php echo $v->id; ?>' > "+"<?php echo $v->name; } } ?>" +"</option></select>";
    
 document.getElementById("edit_button"+id).style.display="none";
 document.getElementById("save_button"+id).style.display="block";
}

function save_row(id)
{
 var status=document.getElementById("status_text"+id).value;   
 var roi=document.getElementById("roi_text"+id).value;
 var proc_fee=document.getElementById("proc_fee_text"+id).value;
 var comments=document.getElementById("comments_text"+id).value;
 var partner=document.getElementById("partner_text"+id).value;

 // confirm("Are you sure you want to update this record");
    
 $.ajax
 ({
  type:'post',
  url:'<?php echo site_url('Admin/update'); ?>',
  data:{
   edit_row:'edit_row',
   row_id:id,
   status_val:status,
   roi_val:roi,
   proc_fee_val:proc_fee,
   comments_val:comments,
   partner_val:partner
  },
  success:function(response) { 
   if(response=="success")
   {

    if(status == 1)
    {
        document.getElementById("status_val"+id).innerHTML="Approved";
    }
    else if(status == 2)
    {
        document.getElementById("status_val"+id).innerHTML="Pending";
    }
    else if(status == 3)
    {
        document.getElementById("status_val"+id).innerHTML="Rejected";
    }
    else if(status == 4)
    {
        document.getElementById("status_val"+id).innerHTML="Disbursed";
    }

    
    document.getElementById("roi_val"+id).innerHTML=roi;
    document.getElementById("proc_fee_val"+id).innerHTML=proc_fee;
    document.getElementById("comments_val"+id).innerHTML=comments;
    document.getElementById("partner_val"+id).innerHTML=partner;
    document.getElementById("edit_button"+id).style.display="block";
    document.getElementById("save_button"+id).style.display="none";
   }
   alert("Updated successfully");
   window.location.reload()
  }
 });
}
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
