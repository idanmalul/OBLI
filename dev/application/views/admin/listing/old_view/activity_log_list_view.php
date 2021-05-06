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
            Activity Log
        </div>
         <!-- <div class="panel-options">
            <a href="<?php // echo site_url('admin/add_dealer'); ?>" class="btn btn-turquoise fa-plus-circle" style="color: #fff;">
                Add Dealer
            </a> 
        </div>  -->
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
                    <th>User Name</th>
                    <th>Log</th>
                    <th>Date Time</th>
                </tr>

            </thead>

            <tbody>
                <?php if (!empty($activity_log_list)) {
                    $n = 1;
                    foreach ($activity_log_list as $value) {

                    $user_detail = get_all_user_detail($value->user_id);
                ?>

                        <tr>
                            <td><?php echo $n; ?></td>
                            <td><?php if(!empty($user_detail)){ echo $user_detail[0]->name; } ?></td>
                            <td style="width: 45%"><?php echo $value->log; ?></td>
                            <td><?php $date = date("d M Y h:i A", strtotime($value->date_time)); echo $date; ?></td>
                            
                        </tr>

                <?php $n = $n + 1; } } ?>

            </tbody>

        </table>

    </div>
</div>