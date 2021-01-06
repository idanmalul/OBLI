

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
            Company List
        </div>
         <div class="panel-options">
            <a href="<?php echo site_url('admin/add_company'); ?>" class="btn btn-turquoise fa-plus-circle" style="color: #fff;">
                Add Company
            </a> 
        </div> 
    </div>
    <div id="slider_images_list" class="panel-body table-responsive">

        <script type="text/javascript">

            jQuery(document).ready(function ($)

            {

                $("#example-1").dataTable({

                    aLengthMenu: [

                        [5, 10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]

                    ]

                });

                

            });

        </script>
        <table id="example-1" class="table table-striped table-bordered" cellspacing="0" width="100%">

            <thead>

                <tr>

                    <th>S.No.</th>
                    <th>Company Name</th>
                    <th>Contact Id</th>
                    <th>Type</th>
                    <th>Created Date</th>
                    <th>Action</th>

                </tr>

            </thead>

            <tbody>
                <?php if (!empty($company_details)) {
                    $n = 1;
                    foreach ($company_details as $value) {
                        ?>

                        <tr>
                            <td><?php echo $n; ?></td>
                            <td><?php echo $value->name; ?></td>
                            <td><?php echo $value->company_id; ?></td>
                            <td><?php if($value->type == 1){ echo "Partner"; }else{ echo "Company"; } ?></td>
                            <td><?php $date = date("d M Y h:i A", strtotime($value->created_at)); echo $date; ?></td>
                            
                            <td width="25%">
                                
                                <?php $status = $value->status; ?>

                                <?php if ($status == 1) { ?>
                                <a href="<?php echo site_url('admin/change_status') . '/id/' . $value->id; ?>/company_forms/status/2/company_list" class="btn btn-secondary btn-sm btn-icon icon-left" data-toggle="tooltip" data-placement="right" title="Click to Deactive!"><i class="fa fa-check"></i></a>
                                <?php } elseif ($status == 2) { ?>

                                <a href="<?php echo site_url('admin/change_status') . '/id/' . $value->id; ?>/company_forms/status/1/company_list" class="btn btn-warning btn-sm btn-icon icon-left" data-toggle="tooltip" data-placement="right" title="Click to Active!"><i class="fa fa-exclamation"></i></a>
                                <?php } ?>

                                
                                <a href="<?php echo site_url('admin/edit_company') . '/' . $value->id; ?>" class="btn btn-blue btn-sm btn-icon icon-left" data-toggle="tooltip" data-placement="right" title="Edit"><i class="fa fa-pencil"></i></a>
                                

                                <a onClick="if(!confirm('Are you sure, You want to delete this company?')){return false;}" href="<?php echo site_url('admin/delete') . '/delete_company/company_forms/id/' . $value->id; ?>" class="btn btn-danger btn-sm btn-icon icon-left" data-toggle="tooltip" data-placement="right" title="Delete"><i class="fa fa-trash"></i></a><br><br>

                            </td>
                        </tr>

                <?php $n = $n + 1; } } ?>

            </tbody>

        </table>

    </div>
</div>