<div class="row">

    <div class="col-md-12">
        <?php if($this->session->flashdata('error_msg')){ ?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">×</span>
                <span class="sr-only">Close</span>
            </button>

            <?php echo $this->session->flashdata('error_msg'); ?>
        </div>
        <?php } ?>
        <?php if($this->session->flashdata('success_msg')){ ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">×</span>
                <span class="sr-only">Close</span>
            </button>

            <?php echo $this->session->flashdata('success_msg'); ?>
        </div>
        <?php } ?>
    </div>

</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">APK List</h3>
        <div class="panel-options">
            <a href="<?php echo site_url('admin/apk'); ?>" class="btn btn-turquoise fa-plus-circle" style="color: #fff;">
                Upload APK
            </a> 
        </div> 

    </div>
    <div class="panel-body">

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
                    <th>S. No.</th>
                    <th>APK Name</th>
                    <th>APK Version</th>
                    <th>Country</th>
                    
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php if(!empty($apk_list)){
                    foreach ($apk_list as $key => $value) { ?>
                <tr>
                    <td><?php echo $key + 1; ?></td>
                    <td><?php echo $value->apk_path; ?></td>
                    <td><?php echo $value->apk_version; ?></td>
                    <td><?php echo $value->country; ?></td>
                    <td width="25%">
                        <a href="<?php echo site_url('admin/apk') . '/' . $value->id; ?>" class="btn btn-success btn-sm btn-icon icon-left" data-toggle="tooltip" data-placement="right" title="Edit"><i class="fa fa-pencil"></i></a>
                    
                    <a onClick="if(!confirm('Are you sure, You want to delete this APK?')){return false;}" href="<?php echo site_url('admin/delete') . '/delete_apk/apk_info/id/' . $value->id; ?>" class="btn btn-danger btn-sm btn-icon icon-left" data-toggle="tooltip" data-placement="right" title="Delete"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                    <?php }
                } ?>
                
            </tbody>
        </table>
    </div>
</div>