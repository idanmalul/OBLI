<style type="text/css">
    .popup_text_color{
        color: #505555;
    }
    
</style>

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
            Payment API Request Response Details
        </div>
         <div class="panel-options">
<!--            <a href="<?php // echo site_url('admin/add_company'); ?>" class="btn btn-turquoise fa-plus-circle" style="color: #fff;">
                Add Company
            </a> -->
        </div> 
    </div>
    <div id="slider_images_list" class="panel-body table-responsive">

        <script type="text/javascript">

            jQuery(document).ready(function ($)

            {

                $("#example-1").dataTable({

                    aLengthMenu: [

                        [5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"]

                    ]

                });

                

            });

        </script>
        <table id="example-1" class="table table-striped table-bordered" cellspacing="0" width="100%">

            <thead>

                <tr>

                    <th>S.No.</th>
                    <th>TZ Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <!--<th>Payment URL</th>
                    <th> Request Detail </th>
                    <th> Response Detail </th>
                    <th>Error Details</th>
                    <th>Form Type</th>-->
                    <th>Request Date</th>
                    <th>Action</th>

                </tr>

            </thead>

            <tbody>
                <?php if (!empty($payment_details)) {
                    $n = 1;
                    foreach ($payment_details as $value) {
                        ?>

                        <tr>
                            <td><?php echo $n; ?></td>
                            <td><?php echo $value->tz_id; ?></td>
                            <td><?php echo $value->firstname; ?></td>
                            <td><?php echo $value->lastname; ?></td>
                            <!--<td><?php echo $value->payment_url; ?></td>
                            <td><?php echo $value->request_data; ?></td>
                            <td><?php $str = preg_replace_callback('/\\\\u([0-9a-fA-F]{4})/', function ($match) {
    return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UTF-16BE');
}, $value->response_data); echo $str; ?></td>
                            <td><?php echo $value->error_data; ?></td>
                            <td><?php echo $value->form_text; ?></td>-->
                            
                            <td><?php $date = date("d M Y h:i A", strtotime($value->created_at)); echo $date; ?></td>
                            
                            <td width="5%">
                                
                              <button type="button" class="btn btn-info btn-lg" onclick="showRequestDetail('<?php echo $value->id; ?>')">View</button>
                              
                            </td>
                        </tr>

                <?php $n = $n + 1; } } ?>

            </tbody>

        </table>

    </div>
</div>


<!-- Trigger the modal with a button -->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Request Detail</h4>
      </div>
      <div class="modal-body paymentDetailHtml" style="overflow-wrap:break-word;">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<script>

function showRequestDetail(id)
{
    
    $.ajax({
        url: "<?php echo base_url();?>index.php/admin/viewPaymentAjaxDetail",
        type: "POST",
        data: {paymentid: id},
        success: function (result) {

            $(".paymentDetailHtml").html(result);

            $('#myModal').modal('show');

        },
        error: function(error){

        }

    });
}

</script>