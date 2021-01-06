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
<?php if($this->session->flashdata('success')){ ?>
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong><?php echo $this->session->flashdata('success'); ?></strong>
        </div>
    </div>
</div>
<?php } ?>
<div class="row">

            <div class="col-md-12">

            <div class="row">

                <div class="col-md-12">

                    <div class="panel panel-default">

    <div class="panel-heading">

        <div class="panel-title">

            <?php if(!empty($partner_detail)) echo 'Edit'; else echo 'Add'; ?> Partner

        </div>

    </div>

        

    <div class="panel-body">

        <form action="<?php if(!empty($partner_detail)) echo site_url('admin/edit_partner'); else echo site_url('admin/add_partner'); ?>" role="form" id="form1" method="post" enctype="multipart/form-data" class="validate">


            <div class="form-group">

                <label class="control-label">Name of Business Partner</label>

                <input type="text" name="name" placeholder="" class="form-control" data-validate="required" autocomplete="off" value="<?php if(!empty($partner_detail)){ echo $partner_detail[0]->name; }else{ if(isset($_POST['name'])){ echo $_POST['name']; } }?>" />

            </div>

            

            <div class="form-group">
                <?php if(!empty($partner_detail)){ ?>

                <input type="hidden" name="partner_id" value="<?php echo $partner_detail[0]->id; ?>">

                <input type="submit" name="submit" value="Update" class="btn btn-success float_right ck_textarea_on">
         

                <?php } else { ?>

                <input type="submit" name="submit" value="Submit" class="btn btn-success float_right ck_textarea_on">


                <?php } ?>

                

            </div>

        </form>

    </div>

 </div>



        </div>

       </div> 

   </div> 

</div>







