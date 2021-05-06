

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
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-title">
            Customer List
        </div>
         <div class="panel-options">
            <!-- <a href="<?php echo site_url('index.php/admin/add_agent'); ?>" class="btn btn-turquoise fa-plus-circle" style="color: #fff;">
                Add Agent
            </a> --> 
        </div> 
    </div>
    <div id="slider_images_list" class="panel-body table-responsive">

        <script type="text/javascript">

            jQuery(document).ready(function ($)

            {

                $("#example-1").dataTable({

                    aLengthMenu: [

                        [5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"]

                    ]

                });

                

            });

        </script>
        <table id="example-1" class="table table-striped table-bordered " cellspacing="0" width="100%">

            <thead>

                <tr>

                    <th>S.No.</th>
                <?php $admin_type = $this->session->userdata('admin_type'); if(!empty($admin_type == 1)){ ?>
                    <th>Agent Name</th>
                <?php } ?>
                    
                    <th>Customer Name</th>
                    <th>Type of Loan</th>
                    <th>Loan Amount</th>
                    <th>Email</th>
                    <th>Mobile number</th>
                    <!-- <th>Aadhaar Card Number</th> -->
                    <th>Status</th>
                    <th>Joining Date</th>
                    <th>Action</th>

                </tr>

            </thead>

            <tbody>
                <?php if (!empty($log_list)) {
                    $n = 1;
                    foreach ($log_list as $value) {
                        $agent_detail = all_agent($value->created_by);
                        // echo "<pre>"; print_r($agent_detail); die();
                        ?>

                        <tr>
                            <td><?php echo $n; ?></td>
                            
                        <?php $admin_type = $this->session->userdata('admin_type'); if(!empty($admin_type == 1)){ ?>
                            <td><?php if(!empty($agent_detail)){ echo $agent_detail[0]->admin_name; }  ?></td>
                        <?php } ?>

                            <td><?php echo $value->name_of_the_applicant; ?></td>
                            <td><?php if(!empty($value->type_of_loan)){ if($value->type_of_loan == "PL"){ echo "Personal Loan"; }elseif($value->type_of_loan == "HL"){ echo "Home Loan"; }elseif($value->type_of_loan == "BL"){ echo "Business Loan"; }elseif($value->type_of_loan == "LAP"){ echo "Loan Against Property"; } } ?></td>
                            <td><?php echo $value->requested_loan_ammount; ?></td>
                            <td><?php echo $value->email_id; ?></td>
                            <td><?php echo $value->mobile_no; ?></td>
                            <!-- <td><?php echo $value->aadhar_card_no; ?></td> -->
                            <td><?php if(!empty($value->status)){ if($value->status == 1){ echo "Approved"; }elseif($value->status == 2){ echo "Pending"; }elseif($value->status == 3){ echo "Rejected"; }elseif($value->status == 4){ echo "Disbursed"; } } ?></td>
                            <td><?php $date = date("d M Y h:i A", strtotime($value->created_at)); echo $date; ?></td>
                            
                            <td width="30%">
                                
                                <!-- <?php $status = $value->status; ?>

                                <?php if ($status == 1) { ?>
                                <a href="<?php echo site_url('index.php/admin/change_status') . '/id/' . $value->id; ?>/new_login/status/2/new_login_list" class="btn btn-secondary btn-sm btn-icon icon-left" data-toggle="tooltip" data-placement="right" title="Click to Deactive!"><i class="fa fa-check"></i></a><br><br>
                                <?php } elseif ($status == 2) { ?>

                                <a href="<?php echo site_url('index.php/admin/change_status') . '/id/' . $value->id; ?>/new_login/status/1/new_login_list" class="btn btn-warning btn-sm btn-icon icon-left" data-toggle="tooltip" data-placement="right" title="Click to Active!"><i class="fa fa-exclamation"></i></a><br><br>
                                <?php } ?> -->

                                
                                <a href="<?php echo site_url('index.php/admin/edit_new_login') . '/' . $value->id; ?>" class="btn btn-blue btn-sm btn-icon icon-left" data-toggle="tooltip" data-placement="right" title="Edit"><i class="fa fa-pencil"></i></a><br><br>
                                

                                <a onClick="if(!confirm('Are you sure, You want to delete this customer?')){return false;}" href="<?php echo site_url('index.php/admin/delete') . '/delete_customer/new_login/id/' . $value->id; ?>" class="btn btn-danger btn-sm btn-icon icon-left" data-toggle="tooltip" data-placement="right" title="Delete"><i class="fa fa-trash"></i></a><br><br>

                            </td>
                        </tr>

                <?php $n = $n + 1; } } ?>

            </tbody>

        </table>

    </div>
</div>