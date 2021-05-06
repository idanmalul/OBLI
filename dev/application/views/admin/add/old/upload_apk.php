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
            <?php //if(!empty($apk_detail)) echo 'Edit'; else echo 'Add'; ?> Upload APK
        </div>
    </div>
        
    <div class="panel-body">
        <form action="<?php if(!empty($apk_detail)) echo site_url('admin/apk'); else echo site_url('admin/apk'); ?>" role="form" id="form1" method="post" enctype="multipart/form-data" class="validate">
            
            
            <div class="form-group">
                <label class="control-label">APK</label>
                <?php if(!empty($apk_detail[0]->apk_path)){ ?>
                <br/><br/>
                <div><h4><?php echo $apk_detail[0]->apk_path; ?> With version : <?php echo $apk_detail[0]->apk_version; ?></h4></div><br/><br/>
<!--                <br/>
                <img src="<?php echo base_url('uploads/apk_paths').'/'.$apk_detail[0]->apk_path; ?>" height="100" width="100"><br/>-->
                <?php } ?>
<!--                <input type="file" name="apk_path" value="<?php if(!empty($apk_detail)){ echo $apk_detail[0]->apk_path; } ?>" class="form-control" <?php if(empty($apk_detail[0]->apk_path)){ ?>data-validate="required"<?php }?> placeholder="Image" />-->
                <input type="file" name="apk_path" value="" class="form-control" data-validate="required" placeholder="" />
                
            </div>
            <div class="form-group">
                    <span class="errormsg">Note : Supported type - .apk.</span>
          </div>
          
           <div class="form-group">

                <label class="control-label">APK Version</label>

                <input type="text" name="apk_version" placeholder="APK Version" class="form-control" data-validate="required" value="<?php if(!empty($apk_detail)){ echo $apk_detail[0]->apk_version; }else{ if(isset($_POST['apk_version'])){ echo $_POST['apk_version']; } }?>" />

                

            </div>
            <div class="form-group">
                <?php if(!empty($apk_detail)){ ?>
                <input type="hidden" name="id" value="<?php echo $apk_detail[0]->id; ?>">
                <input type="submit" name="submit" value="Update" class="btn btn-success float_right ck_textarea_on">
                <a onClick="if(!confirm('Are you sure, You want to delete this APK?')){return false;}" href="<?php echo site_url('admin/delete') . '/delete_apk/apk_info/id/' . $apk_detail[0]->id; ?>" class="btn btn-danger btn-sm btn-icon icon-left" data-toggle="tooltip" data-placement="right" title="Delete"><i class="fa fa-trash"></i></a>
                <?php } else { ?>
                <input type="submit" name="submit" value="Add" class="btn btn-success float_right ck_textarea_on">
                <?php } ?>
                
            </div>
        </form>
    </div>
</div>
