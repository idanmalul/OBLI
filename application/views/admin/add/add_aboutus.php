<script type="text/javascript" src="https://obli.co.il/assets/js/nic_editor/nicEdit-latest.js"></script>
<script type="text/javascript">bkLib.onDomLoaded(function() { nicEditors.allTextAreas() 

new nicEditor({fullPanel : true}).panelInstance('text_area',{hasPanel : true});
new nicEditor({fullPanel : true}).panelInstance('text_area1',{hasPanel : true});
});</script>
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

            <?php if(!empty($aboutus_detail)) echo 'Edit'; else echo 'Add'; ?> About Us Detail

        </div>

    </div>

        

    <div class="panel-body">

        <form action="<?php if(!empty($aboutus_detail)) echo site_url('admin/edit_aboutus'); else echo site_url('admin/add_aboutus'); ?>" role="form" id="form1" method="post" enctype="multipart/form-data" class="validate">


            <div class="form-group">

                <label class="control-label">Title Text</label>

                <input type="text" name="title" placeholder="" class="form-control" data-validate="required" value="<?php if(!empty($aboutus_detail)){ echo $aboutus_detail[0]->title; }else{ if(isset($_POST['title'])){ echo $_POST['title']; } }?>" autocomplete="off" /><br>

            </div>
            

            <div class="form-group">
               
                <label class="control-label">Sub Title Text</label>

                <textarea name="sub_title" id="text_area" class="form-control ck_textarea_visible" placeholder="" rows="5" ><?php if(!empty($aboutus_detail)){ echo htmlspecialchars(trim($aboutus_detail[0]->sub_title)); }else{ if(isset($_POST['sub_title'])){ echo trim($_POST['sub_title']); } }?></textarea>

            </div>

            <div class="form-group">

                <label class="control-label">About Us Banner Image</label>
            <?php if(!empty($aboutus_detail[0]->banner_image)){ ?>
            <br/>
            <div class="">
            <a href="<?php echo base_url('uploads/aboutus').'/'.$aboutus_detail[0]->banner_image; ?>"> <img src="<?php echo base_url('uploads/aboutus').'/'.$aboutus_detail[0]->banner_image; ?>" height="100" width="100"></a><br/><br/>
            </div>

            <?php }?>

            <br/>
            <input type="file" name="image" value="<?php if(!empty($aboutus_detail)){ echo $aboutus_detail[0]->banner_image; } ?>" class="form-control" <?php if(empty($aboutus_detail)){ echo 'data-validate="required"'; } ?> <?php if(empty($aboutus_detail[0]->banner_image)){ ?><?php }?> />
            
            </div>

            <div class="form-group">
            <span class="errormsg">Please upload this image size (width*height)1918*337.</span>
            </div>

            
            <div class="form-group">

                <label class="control-label">Partner Icons Images</label>

                <?php  if(!empty($partner_icon_detail)) { ?>

                <div class="row col-md-12" style="background-color: #373b84;">
    
                <?php $i = 1; foreach ($partner_icon_detail as $key => $data) { 
                ?>

                <div class="col-md-4">
                    <span class="imagelocation<?php echo $data->id ?>" style="cursor:pointer; color: red; margin-left: 118px;" onclick="javascript:deleteimage(<?php echo $data->id ?>)">X</span>
                <a href="<?php echo base_url(); ?>uploads/aboutus/partner_icons/<?php echo $data->image; ?>"> <img class="imagelocation<?php echo $data->id ?>" src="<?php echo base_url(); ?>uploads/aboutus/partner_icons/<?php echo $data->image; ?>"  width="120" height="100" style="border: 1px solid indianred;"></a>
                
                </div>

                <?php if($i%3 == 0){ ?>
                    <div class="clearfix"></div><br><br>
                <?php } $i++; } ?>

                </div>

                <?php } ?>


            
<script type="text/javascript">
function deleteimage(image_id)
{
var answer = confirm ("Are you sure, you want to delete this partner icon?");
if (answer)
{
        $.ajax({
                type: "POST",
                url: "<?php echo site_url('admin/delete_aboutus_image');?>",
                data: "image_id="+image_id,
                success: function (response) {
                  if (response == 1) {
                    jQuery(".imagelocation"+image_id).remove();
                   window.location.reload();
                  };
                  
                }
            });
      }
      
}
</script>

            <br/>
            <input type="file" name="userfile[]" multiple="multiple" class="form-control" accept=".jpg, .jpeg, .png, .gif, .pdf, .doc" data-msg-accept="Please select .jpg, .jpeg, .png, .gif, .pdf, .doc image files" />
            
            </div>

            <div class="form-group">
            <span class="errormsg">Note : Supported Media Type - gif, jpg, png, jpeg.</span>
            </div>

            <div class="form-group">
                <?php if(!empty($aboutus_detail)){ ?>

                <input type="hidden" name="aboutus_id" value="<?php echo $aboutus_detail[0]->id; ?>">

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










