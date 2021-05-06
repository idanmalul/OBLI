<style>
	span.errormsg {
  color:#CC3F44;
 font-size:12px;
  padding-top:5px;
}
</style>
<?php if($this->session->flashdata('error')){ ?>
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
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-title">
            <?php if(!empty($banner_detail)) echo 'Edit'; else echo 'Add'; ?> Advertisement
        </div>
    </div>
        
    <div class="panel-body">
        <form action="<?php if(!empty($banner_detail)) echo site_url('admin/edit_slider'); else echo site_url('admin/add_banner'); ?>" role="form" id="form1" method="post" enctype="multipart/form-data" class="validate">
            
            
            <div class="form-group">
                <label class="control-label">Advertisement Image</label>
                <?php if(!empty($banner_detail[0]->banner_image)){ ?>
                <br/>
                <img src="<?php echo base_url('uploads/banner_images').'/'.$banner_detail[0]->banner_image; ?>" height="100" width="100"><br/>
                <?php }?>
                <input type="file" name="banner_image" value="<?php if(!empty($banner_detail)){ echo $banner_detail[0]->banner_image; } ?>" class="form-control" <?php if(empty($banner_detail[0]->banner_image)){ ?>data-validate="required"<?php }?> placeholder="Image" />
                <?php echo form_error('banner_image'); ?> 
            </div>
           <!--  <div class="form-group">
                    <span class="errormsg">Note : Image Uploading min-width(1350), max-width(1400) & min-height(578), max-height(600).</span>
          </div> -->
           
            <div class="form-group">
                <?php if(!empty($banner_detail)){ ?>
                <input type="hidden" name="banner_id" value="<?php echo $banner_detail[0]->banner_id; ?>">
                <input type="submit" name="submit" value="Update" class="btn btn-success float_right ck_textarea_on">
                <?php } else { ?>
                <input type="submit" name="submit" value="Add" class="btn btn-success float_right ck_textarea_on">
                <?php } ?>
                
            </div>
        </form>
    </div>
</div>
