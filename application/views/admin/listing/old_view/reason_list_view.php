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
            Reason List
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
                    <th>SAP Code</th>
                    <th>Phone No.</th>
                    <th>Reason</th>
                    <th>Device ID</th>
                    <th>Created At</th>
					<!--<th>Action</th>-->
                </tr>
            </thead>

            <tbody>
                <?php if(!empty($reason_list)){
                    foreach ($reason_list as $key => $value) { ?>
                <tr>
                    <td><?php echo $key + 1; ?></td>
                    <td><?php echo $value->sap_code; ?></td>
                    <td><?php echo $value->phone_no; ?></td>
                    <td><?php echo $value->reason; ?></td>
                    <td><?php echo $value->device_id; ?></td>
                    <td><?php echo date('d-m-Y', strtotime($value->created_at)); ?></td>
					

                </tr>
                    <?php }
                } ?>
                
            </tbody>
        </table>
    </div>
</div>