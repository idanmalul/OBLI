
<!-- date picker -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-title">
        <?php $admin_type = $this->session->userdata('admin_type'); if(!empty($admin_type == 1)){ ?>

            Loan Type Wise Agent Report

        <?php }else{?> Loan Report <?php } ?>
        </div>
         <div class="panel-options">
            <!-- <a href="<?php echo site_url('admin/add_agent'); ?>" class="btn btn-turquoise fa-plus-circle" style="color: #fff;">
                Add Agent
            </a> --> 
        </div> 
    </div>

<form method="post" action="<?php echo site_url('current_month'); ?>">  

     
        <div class="form-group">

                <label class="control-label">Type of Loan </label>

                <select class="form-control input-dark" name="loan_type" data-validate="required">

                    <option selected="" disabled="" hidden="">--Select type of loan--</option>
                    
                    <option value="PL" <?php if(!empty($loan_detail)){ if(!empty($loan_detail[0]->type_of_loan)){ if($loan_detail[0]->type_of_loan == "PL"){ echo "selected='selected'"; } } }else{ if(!empty($type_selected['loan_selected'])){ if(isset($_POST['loan_type'])=="PL" && $type_selected['loan_selected'] == "PL"){ echo 'selected="selected"'; } } } ?>  >Personal Loan</option>

                    <option value="HL" <?php if(!empty($loan_detail)){ if(!empty($loan_detail[0]->type_of_loan)){ if($loan_detail[0]->type_of_loan == "HL"){ echo "selected='selected'"; } } }else{ if(!empty($type_selected['loan_selected'])){ if(isset($_POST['loan_type'])=="HL" && $type_selected['loan_selected'] == "HL"){ echo 'selected="selected"'; } } } ?> >Home Loan</option>

                    <option value="LAP" <?php if(!empty($loan_detail)){ if(!empty($loan_detail[0]->type_of_loan)){ if($loan_detail[0]->type_of_loan == "LAP"){ echo "selected='selected'"; } } }else{ if(!empty($type_selected['loan_selected'])){ if(isset($_POST['loan_type'])=="LAP" && $type_selected['loan_selected'] == "LAP"){ echo 'selected="selected"'; } } }  ?> >Loan Against Property</option>

                    <option value="BL" <?php if(!empty($loan_detail)){ if(!empty($loan_detail[0]->type_of_loan)){ if($loan_detail[0]->type_of_loan == "BL"){ echo "selected='selected'"; } } }else{ if(!empty($type_selected['loan_selected'])){ if(isset($_POST['loan_type'])=="BL" && $type_selected['loan_selected'] == "BL"){ echo 'selected="selected"'; } } } ?> >Business Loan</option>

                    <!-- <option value="CC" >CC</option> -->

                </select>

        </div>

        

        <div class="form-group">
            <div class="control-label">
                <label class="" >Date Range</label>
            </div>
            
            <div class="col-sm-6 form-group">
                <input type="text" class="form-control" name="start_date" id="from" placeholder="Start date" data-format="d-m-yyyy" value="<?php if(isset($_POST['start_date'])){ echo $_POST['start_date']; } ?>" autocomplete="off">
            </div>

            <div class="col-sm-6 form-group">
                <input type="text" class="form-control" name="end_date" id="to" placeholder="End date" data-format="d-m-yyyy" value="<?php if(isset($_POST['end_date'])){ echo $_POST['end_date']; } ?>" autocomplete="off">
            </div>
            
    
            <!-- <input type="text" id="field-1" name="date_range" class="form-control daterange" data-format="D-M-YY" placeholder="select date" autocomplete="off" /> -->
                
        </div>

        <div class="form-group">
               
            <input type="submit" name="submit" value="Search" class="btn btn-success float_right ck_textarea_on">

        </div>

       
    </form>

</div>    




<!-- <br><br><br><br><br><br> -->

<?php if(!empty($loan_detail)){ if(isset($_SESSION['error'])){
            unset($_SESSION['error']);
        } 
    

 //echo "<pre>";
  //print_r($loan_detail);
  //echo count($l);
   //die(); ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-title">
            <?php if(!empty($loan_detail)){ if(!empty($loan_detail[0]->type_of_loan)){ if($loan_detail[0]->type_of_loan == "PL"){ echo "Personal Loan"; } elseif($loan_detail[0]->type_of_loan == "HL"){ echo "Home Loan"; }elseif($loan_detail[0]->type_of_loan == "BL"){ echo "Business Loan"; }elseif($loan_detail[0]->type_of_loan == "LAP"){ echo "Mortgage Loan"; } }else{ echo "Filter By Date Range";  } } ?>
        </div>
         <div class="panel-options">
            <b>Total No. Of Cases Logged In: <mark><?php if(!empty($total_login_count)){ echo count($total_login_count); }else{ echo "0"; }  ?></mark></b>
            
            <!-- <a href="<?php echo site_url('admin/add_agent'); ?>" class="btn btn-turquoise fa-plus-circle" style="color: #fff;">
                Add Agent
            </a> --> 
        </div> 
    </div>
    <div id="slider_images_list" class="panel-body table-responsive">

    <?php if(!empty($loan_detail)){ if(!empty($loan_detail[0]->type_of_loan)){ if($loan_detail[0]->type_of_loan == "BL"){ ?>

        <div class="panel-options">
            <b >Login AMT: <mark><?php if(!empty($total_login_count)){ foreach($total_login_count as $total){ $total_amt[] = $total->requested_loan_ammount; } echo array_sum($total_amt); }else{ echo "0"; }  ?></mark></b><hr>
        </div>

    <?php } } } ?>     

        <table id="example-1" class="table table-striped table-bordered" cellspacing="0" width="100%">

            <thead>

                <tr>
                    <th>S.No.</th>
		<?php $admin_type = $this->session->userdata('admin_type'); if(!empty($admin_type == 1)){  ?>
                    <th>Name Of Agent</th>
		 <?php } ?>
                    <th>No. Of cases Logged In</th>

                <?php if(!empty($loan_detail)){ if(!empty($loan_detail[0]->type_of_loan)){ if($loan_detail[0]->type_of_loan == "BL"){   ?>
                    <th>Total Login AMT</th>
                <?php } } } ?>    
                    
                <?php if(!empty($loan_detail)){ if(!empty($loan_detail[0]->admin_id)){ if(!empty($loan_detail[0]->type_of_loan)){ if($loan_detail[0]->type_of_loan == "PL"){   ?>
                    <th>Disbursed</th>
                    <th>Approved</th>
                    <th>Pending</th>
                    <th>Rejected</th>
                <?php } } } } ?>

                </tr>

            </thead>

            <tbody>
                <?php if (!empty($loan_detail)) {
                    $n = 1;
                    foreach ($loan_detail as $value) {
                        ?>

                        <tr>
			    <td><?php echo $n; ?></td>
        <?php $admin_type = $this->session->userdata('admin_type'); if(!empty($admin_type == 1)){ ?>

                <td><?php echo $value->admin_name; ?></td>

        <?php } ?>

                            <td><?php echo $value->total_count_agent; ?></td>

                        <?php if(!empty($value->type_of_loan)){ if(!empty($loan_detail[0]->type_of_loan)){ if($value->type_of_loan == "BL"){   ?>
                            <td><?php if(!empty($value->total_loan_ammount)){ echo $value->total_loan_ammount; } ?></td>
                        <?php } } } ?>
                            
                        <?php if(!empty($value->type_of_loan)){ if(!empty($value->admin_id)){ if(!empty($loan_detail[0]->type_of_loan)){ if($value->type_of_loan == "PL"){ ?>

                            <td><?php if(!empty($value->admin_id)){ if($value->type_of_loan){ $disbursed = count_all_status($value->admin_id, 4, $value->type_of_loan); if(!empty($disbursed)){ if($disbursed[0]->disbursed){ echo $disbursed[0]->disbursed; }else{ echo ""; }  } } } ?></td>

                            <td><?php if(!empty($value->admin_id)){ if($value->type_of_loan){ $approved = count_all_status($value->admin_id, 1, $value->type_of_loan); if(!empty($approved)){ if($approved[0]->approved){ echo $approved[0]->approved; }else{ echo ""; }  } } } ?></td>

                            <td><?php if(!empty($value->admin_id)){ if($value->type_of_loan){ $pending = count_all_status($value->admin_id, 2, $value->type_of_loan); if(!empty($pending)){ if($pending[0]->pending){ echo $pending[0]->pending; }else{ echo ""; }  } } } ?></td>

                            <td><?php if(!empty($value->admin_id)){ if($value->type_of_loan){ $rejected = count_all_status($value->admin_id, 3, $value->type_of_loan); if(!empty($rejected)){ if($rejected[0]->rejected){ echo $rejected[0]->rejected; }else{ echo ""; }  } } } ?></td>

                        <?php } } } } ?>

                        </tr>

                <?php $n = $n + 1; } } ?>

            </tbody>

        </table>

    </div>
</div>

<?php } ?>


<script type="text/javascript">
//     $(document).ready(function(){ 
//     $("#from").datepicker({alert(1);
//         // numberOfMonths: 2,
//         onSelect: function(selected) {
//           $("#to").datepicker("option","minDate", selected)
//         }
//     });
//     $("#to").datepicker({ 
//         // numberOfMonths: 2,
//         onSelect: function(selected) {
//            $("#from").datepicker("option","maxDate", selected)
//         }
//     });  
// });


$(document).ready(function(){ 
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
