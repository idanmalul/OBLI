

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
            Manager List
        </div>
         <div class="panel-options">
            <a href="<?php echo site_url('admin/add_manager'); ?>" class="btn btn-turquoise fa-plus-circle" style="color: #fff;">
                Add Manager
            </a> 
        </div> 
    </div>
    <div id="slider_images_list" class="panel-body table-responsive">

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
        <table id="example-1" class="table table-striped table-bordered" cellspacing="0" width="100%">

            <thead>

                <tr>

                    <th>S.No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile number</th>
                    <th>City</th>
                    <th>Created Date</th>
                    <th>Action</th>

                </tr>

            </thead>

            <tbody>
                <?php if (!empty($manager_list)) {
                    $n = 1;
                    foreach ($manager_list as $value) {
                        ?>

                        <tr>
                            <td><?php echo $n; ?></td>
                            <td><?php echo $value->admin_name; ?></td>
                            <td><?php echo $value->admin_email; ?></td>
                            <td><?php echo $value->mobile_no; ?></td>
                            <td><?php echo $value->city; ?></td>
                            <td><?php $date = date("d M Y h:i A", strtotime($value->created_at)); echo $date; ?></td>
                            
                            <td width="30%">
                                
                                <?php $status = $value->admin_status; ?>

                                <?php $block = $value->block_status; ?>

                                <?php if ($block == 0) { if ($status == 1) { ?>
                                <a href="<?php echo site_url('admin/change_status') . '/admin_id/' . $value->admin_id; ?>/admin/admin_status/2/manager_list" class="btn btn-secondary btn-sm btn-icon icon-left" data-toggle="tooltip" data-placement="right" title="Click to Deactive!"><i class="fa fa-check"></i></a><br><br>
                                <?php } elseif ($status == 2) { ?>

                                <a href="<?php echo site_url('admin/change_status') . '/admin_id/' . $value->admin_id; ?>/admin/admin_status/1/manager_list" class="btn btn-warning btn-sm btn-icon icon-left" data-toggle="tooltip" data-placement="right" title="Click to Active!"><i class="fa fa-exclamation"></i></a><br><br>
                                <?php } } ?>

                                

                                <?php if ($block == 0) { ?>
                                <a href="<?php echo site_url('admin/edit_manager') . '/' . $value->admin_id; ?>" class="btn btn-blue btn-sm btn-icon icon-left" data-toggle="tooltip" data-placement="right" title="Edit"><i class="fa fa-pencil"></i></a><br><br>
                                <?php } ?>

                                <a onClick="if(!confirm('Are you sure, You want to delete this manager?')){return false;}" href="<?php echo site_url('admin/delete') . '/delete_manager/admin/admin_id/' . $value->admin_id; ?>" class="btn btn-danger btn-sm btn-icon icon-left" data-toggle="tooltip" data-placement="right" title="Delete"><i class="fa fa-trash"></i></a><br><br>

                                <?php if ($block == 0) { ?>
                                <a onClick="if(!confirm('Are you sure, You want to block this manager?')){return false;}" href="<?php echo site_url('admin/change_block') . '/admin_id/' . $value->admin_id; ?>/admin/block_status/1/manager_list" class="btn btn-danger btn-sm btn-icon icon-left" data-toggle="tooltip" data-placement="right" title="Click to Block!"><i class="fa fa-ban"></i></a><br><br>
                                <?php } elseif ($block == 1) { ?>

                                Blocked
                                <?php } ?>

                            </td>
                        </tr>

                <?php $n = $n + 1; } } ?>

            </tbody>

        </table>

    </div>
</div>