
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

            <?php if(!empty($manager_detail)) echo 'Edit'; else echo 'Add'; ?> Manager

        </div>

    </div>

        

    <div class="panel-body">

        <form action="<?php if(!empty($manager_detail)) echo site_url('admin/edit_manager'); else echo site_url('admin/add_manager'); ?>" role="form" id="form1" method="post" enctype="multipart/form-data" class="validate">


            <div class="form-group">

                <label class="control-label">Name</label>

                <input type="text" name="admin_name" placeholder="" class="form-control" data-validate="required" value="<?php if(!empty($manager_detail)){ echo $manager_detail[0]->admin_name; }else{ if(isset($_POST['admin_name'])){ echo $_POST['admin_name']; } }?>" />

            </div>

            <?php $admin_type = $this->session->userdata('admin_type'); if(!empty($admin_type)){ if($admin_type == 1){ ?> 

            <div class="form-group">

                <label class="control-label">Dealer Name</label>

                <?php if(!empty($manager_detail[0]->dealer_code)){ ?>

                    <select name="dealer_code" class="form-control input-dark" data-validate="" readonly="readonly"  >

                        <option value="<?php echo $manager_detail[0]->dealer_code; ?>"><?php if(!empty($manager_detail[0]->dealer_code)){ $dealer_c = $manager_detail[0]->dealer_code; $where = array('dealer_code' => $dealer_c, 'admin_type' => 2, 'admin_status' => 1, 'block_status' => 0); $c_details = $this->project_model->get_records_where('admin', $where); if(!empty($c_details)){ echo $c_details[0]->admin_name; } } ?></option>

                    </select>

                
            <?php }else{ ?>

                <select name="dealer_code" class="form-control input-dark" data-validate=""  >
                    <option value="">--- Select Dealer Name ---</option>

                    <?php $active_dealer = active_all_dealer(); if(!empty($active_dealer)){ foreach($active_dealer as $value) { ?>

                        <option value="<?php echo $value->dealer_code; ?>" <?php if(!empty($manager_detail[0]->dealer_code)){ if($manager_detail[0]->dealer_code == $value->dealer_code){ echo "selected='selected'"; } }else{ if(isset($_POST['dealer_code'])) { if($value->dealer_code==$_POST['dealer_code']){ echo "selected"; } }} ?> /><?php if(empty($manager_detail[0]->dealer_code)){ if(!empty($active_dealer)){ echo $value->admin_name; } } ?></option>

                    <?php } } ?>

                </select>

             <?php } ?>


            </div>

            <?php } } ?>

            <div class="form-group">

                <label class="control-label">Email</label>

                <input type="email" name="admin_email" placeholder="" autocomplete="off" class="form-control" data-validate="required" value="<?php if(!empty($manager_detail)){ echo $manager_detail[0]->admin_email; }else{ if(isset($_POST['admin_email'])){ echo $_POST['admin_email']; } }?>" />

            </div>

            <div class="form-group">

                <label class="control-label">Mobile Number</label>

                <input type="text" name="mobile_no" placeholder="" class="form-control" value="<?php if(!empty($manager_detail)){ echo $manager_detail[0]->mobile_no; }else{ if(isset($_POST['mobile_no'])){ echo $_POST['mobile_no']; } }?>" data-validate="required,number,minlength[10],maxlength[10]" />

            </div>

            <?php if(empty($manager_detail)){ ?>

            <div class="form-group">

                <label class="control-label">Password</label>

                <input type="Password" name="admin_password" autocomplete="off" placeholder="" class="form-control" data-validate="required"   />

            </div>

            <?php } ?>

            <!-- <div class="form-group">

                <label class="control-label">Password</label>

                <input type="Password" name="admin_password" autocomplete="off" placeholder="" class="form-control" <?php // if(!empty($manager_detail)){ if(!empty($manager_detail[0]->admin_password)){ echo 'data-validate=""'; } }else{echo 'data-validate="required"';}?>   />

            </div> -->

            <div class="form-group">

                <label class="control-label">City</label>

                <input type="text" name="city" placeholder="" data-validate="required" class="form-control" value="<?php if(!empty($manager_detail)){ echo $manager_detail[0]->city; }else{ if(isset($_POST['city'])){ echo $_POST['city']; } }?>" />

            </div>

            <div class="form-group">

                <label class="control-label">Address</label>

                <textarea name="address" id="address" class="form-control ck_textarea_visible" placeholder="" rows="5" ><?php if(!empty($manager_detail)){ echo trim($manager_detail[0]->address); }else{ if(isset($_POST['address'])){ echo trim($_POST['address']); } }?></textarea>

            </div>

            <div class="form-group">

                <label class="control-label">Profile Image</label>
            <?php if(!empty($manager_detail[0]->image)){ ?>
            <br/>
            <div class="">
            <img src="<?php echo base_url('uploads/manager_images').'/'.$manager_detail[0]->image; ?>" height="100" width="100"><br/><br/>
            </div>

            <?php }?>

            <br/>
            <input type="file" name="image" value="<?php if(!empty($manager_detail)){ echo $manager_detail[0]->image; } ?>" class="form-control" <?php if(empty($manager_detail[0]->image)){ ?><?php }?> />
            
            </div>

            <div class="form-group">
            <span class="errormsg">Note : Supported Media Type - gif, jpg, png, jpeg.</span>
            </div>


            <div class="form-group">
                <?php if(!empty($manager_detail)){ ?>

                <input type="hidden" name="manager_id" value="<?php echo $manager_detail[0]->admin_id; ?>">

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




