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

            <?php if(!empty($app_link_detail)) echo 'Edit'; else echo 'Add'; ?> Application Link

        </div>

    </div>

        

    <div class="panel-body">

        <form action="<?php if(!empty($app_link_detail)) echo site_url('index.php/admin/edit_app_url'); else echo site_url('index.php/admin/add_app_url'); ?>" role="form" id="form1" method="post" enctype="multipart/form-data" class="validate">


            <div class="form-group">

                <label class="control-label">First Application Link</label>

                <input type="text" name="first_app_url" placeholder="" class="form-control" data-validate="required" value="<?php if(!empty($app_link_detail)){ echo $app_link_detail[0]->first_app_url; }else{ if(isset($_POST['first_app_url'])){ echo $_POST['first_app_url']; } }?>" autocomplete="off" /><br>

            </div>

            <div class="form-group">

                <label class="control-label">Second Application Link</label>

                <input type="text" name="second_app_url" placeholder="" class="form-control" data-validate="required" value="<?php if(!empty($app_link_detail)){ echo $app_link_detail[0]->second_app_url; }else{ if(isset($_POST['second_app_url'])){ echo $_POST['second_app_url']; } }?>" autocomplete="off" /><br>

            </div>

            
            <div class="form-group">
                <?php if(!empty($app_link_detail)){ ?>

                <input type="hidden" name="app_link_id" value="<?php echo $app_link_detail[0]->id; ?>">

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







