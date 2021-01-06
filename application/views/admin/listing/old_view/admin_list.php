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
       <div class="panel-title">
            Backend User List
        </div>
         <div class="panel-options">
            <a href="<?php echo site_url('admin/add_backend_user'); ?>" class="btn btn-turquoise fa-plus-circle" style="color: #fff;">
                Add Backend User
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
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Type</th>
					<th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php if(!empty($users)){
                    foreach ($users as $key => $value) { ?>
                <tr>
                    <td><?php echo $key + 1; ?></td>
                    <td><?php echo $value->admin_name; ?></td>
                    <td><?php echo $value->admin_email; ?></td>
                    <td><?php echo get_user_type($value->admin_type); ?></td>
					<td><a href="<?php echo site_url('admin/edit_backend_user') . '/' . $value->admin_id; ?>" class="btn btn-blue btn-sm btn-icon icon-left" data-toggle="tooltip" data-placement="right" title="Edit"><i class="fa fa-pencil"></i></a></td>

                </tr>
                    <?php }
                } ?>
                
            </tbody>
        </table>
    </div>
</div>