

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
            Icons List
        </div>
         <div class="panel-options">
            <a href="<?php echo site_url('admin/add_icon'); ?>" class="btn btn-turquoise fa-plus-circle" style="color: #fff;">
                Add New Icon
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
                    <th>Icon Image</th>
                    <th>Icon Order</th>
                    <th>Created Date</th>
                    <th>Action</th>

                </tr>

            </thead>

            <tbody>
                <?php if (!empty($icon_detail)) {
                    $n = 1;
                    foreach ($icon_detail as $value) {
                        ?>

                        <tr>
                            <td><?php echo $n; ?></td>
                           <td><img src="<?php echo base_url('uploads/icons_images').'/'.$value->icons_image; ?>" height="30" width="50" ></td>
                            <td><?php echo "<h3 style='color:#27b6f2;    text-align: center;'>".$value->set_order."</h3>"; ?></td>
                            <td><?php $date = date("d M Y h:i A", strtotime($value->created_at)); echo $date; ?></td>
                            
                            <td width="30%">
                                
                                <?php $status = $value->status; ?>

                                <?php if ($status == 1) { ?>
                                <a href="<?php echo site_url('admin/change_status') . '/id/' . $value->id; ?>/icons_section/status/2/icon_list" class="btn btn-secondary btn-sm btn-icon icon-left" data-toggle="tooltip" data-placement="right" title="Click to Deactive!"><i class="fa fa-check"></i></a>
                                <?php } elseif ($status == 2) { ?>

                                <a href="<?php echo site_url('admin/change_status') . '/id/' . $value->id; ?>/icons_section/status/1/icon_list" class="btn btn-warning btn-sm btn-icon icon-left" data-toggle="tooltip" data-placement="right" title="Click to Active!"><i class="fa fa-exclamation"></i></a>
                                <?php } ?>

                                
                                <a href="<?php echo site_url('admin/edit_icon') . '/' . $value->id; ?>" class="btn btn-blue btn-sm btn-icon icon-left" data-toggle="tooltip" data-placement="right" title="Edit"><i class="fa fa-pencil"></i></a>
                                

                                <a onClick="if(!confirm('Are you sure, You want to delete this icon?')){return false;}" href="<?php echo site_url('admin/delete') . '/delete_icons/icons_section/id/' . $value->id; ?>" class="btn btn-danger btn-sm btn-icon icon-left" data-toggle="tooltip" data-placement="right" title="Delete"><i class="fa fa-trash"></i></a><br><br>

                            </td>
                        </tr>

                <?php $n = $n + 1; } } ?>

            </tbody>

        </table>

    </div>
</div>