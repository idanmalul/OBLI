
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

            <?php if(!empty($company_details)) echo 'Edit'; else echo 'Add'; ?> Company

        </div>

    </div>

        

    <div class="panel-body">

        <form action="<?php if(!empty($company_details)) echo site_url('admin/edit_company'); else echo site_url('admin/add_company'); ?>" role="form" id="form1" method="post" enctype="multipart/form-data" class="validate">


            <div class="form-group">

                <label class="control-label">Company Name</label>

                <input type="text" name="name" placeholder="" class="form-control" data-validate="required" value="<?php if(!empty($company_details)){ echo $company_details[0]->name; }else{ if(isset($_POST['name'])){ echo $_POST['name']; } }?>" autocomplete="off" /><br>

            </div>
            
            <div class="form-group">

                <label class="control-label">Contact Id</label>

<!--                <input type="number" name="company_id" placeholder="" class="form-control" data-validate="number" min="1" value="<?php // if(!empty($company_details)){ if($company_details[0]->company_id == 0){ echo ""; }else{ echo $company_details[0]->company_id; } }else{ if(isset($_POST['company_id'])){ echo $_POST['company_id']; } }?>" autocomplete="off" />-->
                
                <textarea name="company_id" id="company_id" class="form-control ck_textarea_visible" placeholder="" rows="5" autocomplete="off" ><?php if(!empty($company_details)){ if($company_details[0]->company_id == 0){ echo ""; }else{ echo $company_details[0]->company_id; } }else{ if(isset($_POST['company_id'])){ echo $_POST['company_id']; } }?></textarea>

            </div>

<!--            <div class="form-group">

                <label class="control-label">Set Menu Order</label>

                <input type="number" name="set_order" placeholder="" class="form-control" data-validate="required, number" min="1" value="<?php if(!empty($company_details)){ echo $company_details[0]->set_order; }else{ if(isset($_POST['set_order'])){ echo $_POST['set_order']; } }?>" autocomplete="off" /><br>

            </div>-->

            
            <div class="form-group">
                <?php if(!empty($company_details)){ ?>

                <input type="hidden" name="cmp_id" value="<?php echo $company_details[0]->id; ?>">

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







