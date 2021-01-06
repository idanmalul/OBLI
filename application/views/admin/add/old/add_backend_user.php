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
<div class="CourseErrors"></div>
<div class="CourseSuccess"></div>
<div class="row">

            <div class="col-md-12">

            <div class="row">

                <div class="col-md-12">

                    <div class="panel panel-default">

    <div class="panel-heading">

        <div class="panel-title">

            <?php if(!empty($admin_detail)) echo 'Edit'; else echo 'Add'; ?> Backend User

        </div>

    </div>
    <div class="panel-body">

        <form action="<?php if(!empty($admin_detail)) echo site_url('admin/edit_backend_user/'.$admin_detail->admin_id); else echo site_url('admin/add_backend_user'); ?>" role="form" id="form1" method="post" enctype="multipart/form-data" class="validate">

            <div class="form-group">

                <label class="control-label">Name</label>

                <input type="text" name="admin_name" placeholder="Name" class="form-control" data-validate="required" value="<?php if(!empty($admin_detail)){ echo $admin_detail->admin_name; }else{ if(isset($_POST['admin_name'])){ echo $_POST['admin_name']; } }?>" />
            </div>

                 <div class="form-group">

                <label class="control-label">Email</label>

                <input type="email" name="admin_email" placeholder="Email" class="form-control" data-validate="required" value="<?php if(!empty($admin_detail)){ echo $admin_detail->admin_email; }else{ if(isset($_POST['admin_email'])){ echo $_POST['admin_email']; } }?>" />
            </div>    

                 <div class="form-group">

                <label class="control-label">Password</label>

                <input type="password" name="admin_password" placeholder="Password" class="form-control"  <?php if(empty($admin_detail)){ echo ' data-validate="required" '; } ?> value="" />
            </div>  
                 <div class="form-group">

                <label class="control-label">Role</label>

                 <select class="form-control" name="admin_type">
				  <option value='1' <?php if(!empty($admin_detail) && $admin_detail->admin_type==1){ echo 'selected="selected"'; }else{ if(isset($_POST['admin_email']) && $_POST['admin_type']==1){ echo 'selected="selected"'; } }?>>Admin</option>
				  <option value='2' <?php if(!empty($admin_detail) && $admin_detail->admin_type==2){ echo 'selected="selected"'; }else{ if(isset($_POST['admin_email']) && $_POST['admin_type']==2){ echo 'selected="selected"'; } }?>>Manager</option>
				  <option value='3' <?php if(!empty($admin_detail) && $admin_detail->admin_type==3){ echo 'selected="selected"'; }else{ if(isset($_POST['admin_email']) && $_POST['admin_type']==3){ echo 'selected="selected"'; } }?>>Message Admin</option>
				  <option value='4' <?php if(!empty($admin_detail) && $admin_detail->admin_type==4){ echo 'selected="selected"'; }else{ if(isset($_POST['admin_email']) && $_POST['admin_type']==4){ echo 'selected="selected"'; } }?>>Teacher</option>
				 </select>
            </div> 
         

            <div class="form-group">

                <?php if(!empty($admin_detail)){ ?>

                <input type="hidden" name="admin_id" value="<?php echo $admin_detail->admin_id; ?>">

                <input type="submit" name="save" value="Edit User" class="btn btn-success float_right ck_textarea_on">


                <?php } else { ?>

<!--                <a href="<?php echo site_url("admin/question");?>" class="btn btn-success float_left">Attach Test</a>-->
               
                <input type="submit" name="save" value="Add User" class="btn btn-success float_right ck_textarea_on">


<!--                <a href="<?php echo site_url("admin/subject");?>" class="btn btn-success float_center">Submit & Create Subject</a>-->
                
                <?php } ?>

            </div>

        </form>

    </div>

 </div>

        </div>

  <!--   </div> -->







            </div> 

            </div> 



</div>





