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

            <?php if(!empty($icon_detail)) echo 'Edit'; else echo 'Add'; ?> Icon

        </div>

    </div>

        

    <div class="panel-body">

        <form action="<?php if(!empty($icon_detail)) echo site_url('index.php/admin/edit_icon'); else echo site_url('index.php/admin/add_icon'); ?>" role="form" id="form1" method="post" enctype="multipart/form-data" class="validate">


            <div class="form-group">

                <label class="control-label">Icon Image</label>
            <?php if(!empty($icon_detail[0]->icons_image)){ ?>
            <br/>
            <div class="">
            <a href="<?php echo base_url('uploads/icons_images').'/'.$icon_detail[0]->icons_image; ?>"> <img src="<?php echo base_url('uploads/icons_images').'/'.$icon_detail[0]->icons_image; ?>" height="100" width="100"></a><br/><br/>
            </div>

            <?php }?>

            <br/>
            <input type="file" name="image" value="<?php if(!empty($icon_detail)){ echo $icon_detail[0]->icons_image; } ?>" class="form-control" data-validate="required" accept=".jpg, .jpeg, .png, .gif" data-msg-accept="Please select .jpg, .jpeg, .png, .gif image files" <?php if(empty($icon_detail[0]->icons_image)){ ?><?php }?> />
            
            </div>

            <div class="form-group">

                <label class="control-label">Set Icon Order</label>

                <input type="number" name="set_order" placeholder="" class="form-control" data-validate="required, number" min="1" value="<?php if(!empty($icon_detail)){ echo $icon_detail[0]->set_order; }else{ if(isset($_POST['set_order'])){ echo $_POST['set_order']; } }?>" autocomplete="off" /><br>

            </div>

            
            <div class="form-group">
                <?php if(!empty($icon_detail)){ ?>

                <input type="hidden" name="icon_id" value="<?php echo $icon_detail[0]->id; ?>">

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







