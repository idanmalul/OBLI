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

            <?php if(!empty($user_detail)) echo 'Edit'; else echo 'Add'; ?> User

        </div>

    </div>

        

    <div class="panel-body">

        <form action="<?php if(!empty($user_detail)) echo site_url('admin/edit_user'); else echo site_url('admin/add_user'); ?>" role="form" id="form1" method="post" enctype="multipart/form-data" class="validate">

            <div class="form-group">

                <label class="control-label">Name</label>
<!--data-validate="required"-->
                <input type="text" name="name" placeholder="Name" class="form-control"  value="<?php if(!empty($user_detail)){ echo $user_detail[0]->name; }else{ if(isset($_POST['name'])){ echo $_POST['name']; } }?>" />

                

            </div>
            <div class="form-group">

                <label class="control-label">Ph no.</label>

                <input type="text" name="mobile_no" placeholder="Ph no." class="form-control" value="<?php if(!empty($user_detail)){ echo $user_detail[0]->mobile_no; }else{ if(isset($_POST['mobile_no'])){ echo $_POST['mobile_no']; } }?>" data-validate="number,maxlength[10]"/>

                

            </div>
            <div class="form-group">

                <label class="control-label">SAP CODE</label>

                <input type="text" name="sap_code" placeholder="SAP CODE" class="form-control" data-validate="required,number,minlength[7],maxlength[7]" value="<?php if(!empty($user_detail)){ echo $user_detail[0]->sap_code; }else{ if(isset($_POST['sap_code'])){ echo $_POST['sap_code']; } }?>" />

                

            </div>
            <div class="form-group">

                <label class="control-label">Email</label>

                <input type="email" name="email" placeholder="Email" class="form-control" data-validate="required" value="<?php if(!empty($user_detail[0])){ echo $user_detail[0]->email; }else{ if(isset($_POST['email'])){ echo $_POST['email']; } }?>" />
            </div>
            <div class="form-group">

                <label class="control-label">No of device permission</label>

                <input type="text" name="no_of_permission" placeholder="No of device permission" class="form-control" data-validate="required,number" value="<?php if(!empty($user_detail)){ echo $user_detail[0]->no_of_permission; }else{ if(isset($_POST['no_of_permission'])){ echo $_POST['no_of_permission']; } }?>" />

                

            </div>
            <div class="form-group">

                <label class="control-label">Brand Name</label>

                <input type="text" name="brand_name" placeholder="Brand Name" class="form-control" data-validate="required" value="<?php if(!empty($user_detail)){ echo $user_detail[0]->brand_name; }else{ if(isset($_POST['brand_name'])){ echo $_POST['brand_name']; } }?>" />

                

            </div>
            <div class="form-group">

                <label class="control-label">Centre Name</label>

                <input type="text" name="center_name" placeholder="Centre Name" class="form-control" data-validate="required" value="<?php if(!empty($user_detail)){ echo $user_detail[0]->center_name; }else{ if(isset($_POST['center_name'])){ echo $_POST['center_name']; } }?>" />

                

            </div>
<div class="form-group">

                <label class="control-label">City</label>

                <input type="text" name="city" placeholder="City" class="form-control" data-validate="required" value="<?php if(!empty($user_detail)){ echo $user_detail[0]->city; }else{ if(isset($_POST['city'])){ echo $_POST['city']; } }?>" />

                

            </div>
           <div class="form-group">

                <label class="control-label">Zone</label>

                <input type="text" name="zone" placeholder="Zone" class="form-control" data-validate="required" value="<?php if(!empty($user_detail)){ echo $user_detail[0]->zone; }else{ if(isset($_POST['zone'])){ echo $_POST['zone']; } }?>" />

                

            </div>
<div class="form-group">

                <label class="control-label">Country</label>

                <input type="text" name="country" placeholder="Country" class="form-control" data-validate="required" value="<?php if(!empty($user_detail)){ echo $user_detail[0]->country; }else{ if(isset($_POST['country'])){ echo $_POST['country']; } }?>" />

                

            </div>

            <div class="form-group">
                <?php if(!empty($user_detail)){ ?>

                <input type="hidden" name="user_id" value="<?php echo $user_detail[0]->id; ?>">

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



<!--<div class="col-md-4">
<?php //$this->view('admin/right_sidebar'); ?>
</div>-->

</div>




