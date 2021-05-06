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
        <h3 class="panel-title">User List</h3>


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
                    <th>Phone No.</th>
                    <th>Address</th>
                    <th>Profession</th>
                    <th>Gender</th>
                </tr>
            </thead>

            <tbody>
                <?php if(!empty($users)){
                    foreach ($users as $key => $value) { ?>
                <tr>
                    <td><?php echo $key + 1; ?></td>
                    <td><?php echo $value->u_fullname; ?></td>
                    <td><?php echo $value->u_email; ?></td>
                    <td><?php echo $value->u_phone_no; ?></td>
                    <td><?php echo $value->u_addr; ?></td>
                    <td><?php echo $value->u_profession; ?></td>
                    <td><?php if($value->u_gender==1) echo 'Male'; else 'Female'; ?></td>
                </tr>
                    <?php }
                } ?>
                
            </tbody>
        </table>
    </div>
</div>