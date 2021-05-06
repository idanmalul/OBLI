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
            <?php if(!empty($terms_condition_detail)) echo 'Edit'; else echo 'Add'; ?> Terms & Conditions
        </div>
    </div>
        
    <div class="panel-body">
        <form action="<?php if(!empty($terms_condition_detail)) echo site_url('admin/edit_terms'); else echo site_url('admin/add_terms'); ?>" role="form" id="form1" method="post" enctype="multipart/form-data" class="validate">

	    <div class="form-group">
                <label class="control-label">Description</label>
                <textarea name="terms_description" class="form-control ckeditor" rows="10" placeholder="Description" data-validate="required">
<?php if(!empty($terms_condition_detail)) echo $terms_condition_detail[0]->terms_description; ?>
                </textarea>
            </div>

            <div class="form-group">
                <?php if(!empty($terms_condition_detail)){ ?>
                <input type="hidden" name="terms_id" value="<?php echo $terms_condition_detail[0]->terms_id; ?>">
                <input type="submit" name="submit" value="Update" class="btn btn-success">
                <?php } else { ?>
                <input type="submit" name="submit" value="Add" class="btn btn-success">
                <?php } ?>
                
            </div>
        </form>
    </div>
</div>