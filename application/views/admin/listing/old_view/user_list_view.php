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
.panel {

    position: relative;

    background: #fff;

    padding: 20px 30px;

    border: 0;

    margin-bottom: 30px;

    -webkit-box-shadow: none;

    -moz-box-shadow: none;

    box-shadow: none;
    overflow: scroll;

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

<?php if ($this->session->flashdata('brand_name')) { ?>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong><?php echo $this->session->flashdata('brand_name'); ?></strong>
            </div>
        </div>
    </div>
<?php } ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-title">
            User List
        </div>
        <br/><br/>
<!--        <a id="inactive_user" class="btn btn-secondary" >
              Inactive User   
            </a>-->
        <!--<div class="panel-options" style="margin-left: 5px;">
<a class="btn btn-turquoise fa-upload" style="color: #fff;" data-toggle="modal" data-target="#myModal1">&nbsp; Import Users</a>
</div>-->
        
       

         <div class="panel-options">
            <a href="<?php echo site_url('admin/add_user'); ?>" class="btn btn-turquoise fa-plus-circle" style="color: #fff;">
                Add User
            </a> 
        </div>

        
           
<form method="post" action="<?php echo site_url('admin/exportCSV'); ?>">
        
        <input type="text" name="brand" placeholder="Brand Name">
        <button type="submit" >Export to CSV</button>

        <!--  <a href="<?php //echo site_url('admin/exportCSV'); ?>" class="btn btn-turquoise" style="color: #fff;">
                Export to CSV
            </a> --> 
</form>


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
                    <th>Name</th>
                    <th>Ph no.</th> 
                    <th>SAP CODE</th>
                    <th>Email</th>
                    <th>No. of Permission</th>
                    <th>Brand Name</th>
                    <th>Center Name</th>
                    <th>City</th>
<!--                    <th>Zone</th>
                    <th>Country</th>-->
                    <th>Action</th>
                </tr>

            </thead>

            <tbody>
                <?php if (!empty($users)) {
                    $n = 1;
                    $currentdatetime = date('Y-m-d');
                    foreach ($users as $value) { ?>
                        <?php //$status = $value->status; ?>
                        <tr>
                            <td ><?php echo $n; ?></td>
                            <td ><?php echo $value->name; ?></td>
                            <td ><?php echo $value->mobile_no; ?></td>
                            <td width="20%"><?php echo $value->sap_code; ?></td> 
                            <td width="20%"><?php echo $value->email; ?></td> 
                            <td ><?php echo $value->no_of_permission; ?></td>
                            <td ><?php echo $value->brand_name; ?></td>
                            <td ><?php echo $value->center_name; ?></td>
                            <td ><?php echo $value->city; ?></td>
<!--                            <td ><?php //echo $value->zone; ?></td>
                            <td ><?php //echo $value->country; ?></td>-->
                            
                            

                           <td width="25%">
                               <a href="<?php echo site_url('admin/edit_user') . '/' . $value->id; ?>" class="btn btn-blue btn-sm btn-icon icon-left" data-toggle="tooltip" data-placement="right" title="Edit"><i class="fa fa-pencil"></i></a>
                               <br><br>
                               <a href="<?php echo site_url('admin/reset_device/') . $value->id; ?>" class="btn btn-secondary btn-sm btn-icon icon-left" data-toggle="tooltip" data-placement="right" title="Click to Reset!"><i class="fa fa-check"></i></a>
 
                            </td>
                        </tr>

                <?php $n = $n + 1; } } ?>

            </tbody>

        </table>
        <!-- Modal -->

    </div>
</div>
</div>


<script type="text/javascript">
                $(document).ready(function() {
//                    $("#inactive_user").on('click', function(){
//                    $.ajax({
//                        url: "<?php echo site_url('admin/ajax_offline_user_list'); ?>",
//                        success: function(result) {
//                            if (result) {
//                                $("#filter_user").html(result);
//                            } else {
//                                //$("#noti_count").html('');
//                                //  $("#count_notif").html("0");
//                            }
//
//                        }
//                    });
//                    });
                    
                });
//                function mail_function(id){
//                    $("#offlineuserid").val(id);
//                    $("#myModal_"+id).modal('hide');
//                    $("#mailModal").modal('show');
//                
//                }
            </script>