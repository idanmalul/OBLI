<style>
 
 .btnspace
 {
    margin-left: 10px;

 }
 .activationfont
 {

    font-family: monospace;
    font-size: 18px;
 }

 .setbtn
 {

    background-color: #de564d;
    margin-left: 196px;
    width: 10%;
    border: none;
    color: #fff;
    padding: 6px 0px 6px 0px;
 }
 .table.table-bordered > thead > tr > td, .table.table-bordered > tbody > tr > td, .table.table-bordered > tfood > tr > td, .table.table-bordered > thead > tr > th, .table.table-bordered > tbody > tr > th, .table.table-bordered > tfood > tr > th {
	border-color: #eee;
	font-size: 14px;
        padding: 5px 15px;
}
#mail_type-error {
	color: red;
	/* top: 40px; */
	margin-top: 29px !important;
	float: left;
	margin-right: -138px;
}
</style>
<?php if($this->session->flashdata('error') || !empty($error)){ ?>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong><?php if($this->session->flashdata('error')){ echo $this->session->flashdata('error'); }else{ echo $error; }  ?></strong>
                </div>
            </div>
        </div>
<?php } ?>



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

<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-title">
            User Device List
        </div>
        <br/><br/>
<!--        <a id="inactive_user" class="btn btn-secondary" >
              Inactive User   
            </a>-->
        <!--<div class="panel-options" style="margin-left: 5px;">
<a class="btn btn-turquoise fa-upload" style="color: #fff;" data-toggle="modal" data-target="#myModal1">&nbsp; Import Users</a>
</div>-->
<!--         <div class="panel-options">
            <a href="<?php echo site_url('admin/add_user'); ?>" class="btn btn-turquoise fa-plus-circle" style="color: #fff;">
                Add User
            </a> 
        </div> -->


    </div>


<div id="filter_user">
    <div id="slider_images_list" class="panel-body question_list_scrol_bar">

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
                    <th>SAP CODE</th>
                    <th>Android ID</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>

            </thead>

            <tbody>
                <?php if (!empty($user_device_list)) {
                    $n = 1;
                    $currentdatetime = date('Y-m-d');
                    foreach ($user_device_list as $value) { ?>
                        <?php $status = $value->status;
                        $block_status = $value->block_status;
                        ?>
                        <tr>
                            <td ><?php echo $n; ?></td>
                            <td width="20%"><?php echo $value->sap_code; ?></td> 
                            <td width="20%"><?php echo $value->device_id; ?></td>                                                   <td ><?php if ($status == 1 && $block_status != 1){ echo 'Activated'; } elseif ($status == 2 && $block_status != 1) { echo 'Reset'; } elseif($block_status == 1) {  echo 'Blocked'; } ?></td>
                            <td width="25%">
                                <?php if ($status == 1 && $block_status != 1) { ?>
                                <a href="<?php echo site_url('admin/device_status/2/').$value->id; ?>" class="btn btn-secondary btn-sm btn-icon icon-left" data-toggle="tooltip" data-placement="right" title="Click to Reset!"><i class="fa fa-check"></i></a>
                                <a onClick="if(!confirm('Are you sure, You want to  permanently block this Device?\n\nAfter clicking ok modification can not be done on this device.\n\n')){return false;}" href="<?php echo site_url('admin/device_block/'). $value->id; ?>" class="btn btn-danger btn-sm btn-icon icon-left" data-toggle="tooltip" data-placement="right" title="Block"><i class="fas fa-ban"></i></a>
                                <?php } elseif ($status == 2 && $block_status != 1) { ?>
                                <a href="<?php echo site_url('admin/device_status/1/').$value->id; ?>" class="btn btn-warning btn-sm btn-icon icon-left" data-toggle="tooltip" data-placement="right" title="Click to Active!"><i class="fa fa-exclamation"></i></a>
                                <a onClick="if(!confirm('Are you sure, You want delete this Device?')){return false;}" href="<?php echo site_url('admin/device_block/'). $value->id; ?>" class="btn btn-danger btn-sm btn-icon icon-left" data-toggle="tooltip" data-placement="right" title="Block"><i class="fas fa-ban"></i></a>
                                <?php } elseif($block_status == 1) {  echo 'None'; } ?>
                                

                            </td>
                        </tr>

                <?php $n = $n + 1; } } ?>

            </tbody>

        </table>
        <!-- Modal -->

    </div>
</div>
</div>


