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
            Advertisement List
        </div>
        <div class="panel-options">
            <a href="<?php echo site_url('admin/add_banner'); ?>" class="btn btn-turquoise fa-plus-circle" style="color: #fff;">
                Add Advertisement
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
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>



            <tbody>
                <?php if (!empty($banner_list)) {
                    $n = 1;
                    foreach ($banner_list as $value) {
                        ?>
                        <tr>
                            <td><?php echo $n; ?></td>
                            <td>
                            <?php if(!empty($value->banner_image)){ ?>
                            <img src="<?php echo base_url('uploads/banner_images').'/'.$value->banner_image; ?>" style="max-height: 100px; max-width: 100px;">
                            <?php } ?>
                            </td>
                            <td>

                           <!-- <a href="<?php // echo site_url('admin/edit_activity') . '/' . $value->id; ?>" class="btn btn-blue btn-sm btn-icon icon-left">Edit</a> -->

                                <?php $status = $value->banner_status; ?>
                                <?php if ($status == 1) { ?>
                                <a href="<?php echo site_url('admin/change_status') . '/id/' . $value->id; ?>/banner/banner_status/2/banner_list" class="btn btn-secondary btn-sm btn-icon icon-left">&nbsp;Active&nbsp;</a>

                                <?php } elseif ($status == 2) { ?>
                                <a href="<?php echo site_url('admin/change_status') . '/id/' . $value->id; ?>/banner/banner_status/1/banner_list" class="btn btn-warning btn-sm btn-icon icon-left">Inactive</a>

                                <?php } ?> 

                                <a onClick="if(!confirm('Are you sure, You want to delete this advertisement image?')){return false;}" href="<?php echo site_url('admin/delete') . '/delete_banner_image/banner/id/' . $value->id; ?>" class="btn btn-danger btn-sm btn-icon icon-left">Delete</a>
                            </td>
                        </tr>
                <?php $n = $n + 1; } } ?>
            </tbody>
        </table>

    </div>

</div>