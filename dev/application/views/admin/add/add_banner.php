
<script type="text/javascript" src="https://obli.co.il/assets/js/nic_editor/nicEdit-latest.js"></script>
<script type="text/javascript">bkLib.onDomLoaded(function() { nicEditors.allTextAreas() 

new nicEditor({fullPanel : true}).panelInstance('text_area',{hasPanel : true});
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

            <?php if(!empty($banner_detail)) echo 'Edit'; else echo 'Add'; ?> Banner Detail

        </div>

    </div>

        

    <div class="panel-body">

        <form action="<?php if(!empty($banner_detail)) echo site_url('index.php/admin/edit_banner'); else echo site_url('index.php/admin/add_banner'); ?>" role="form" id="form1" method="post" enctype="multipart/form-data" class="validate">


            <div class="form-group">

                <label class="control-label">Title Text</label>

                <input type="text" name="title" placeholder="" class="form-control" data-validate="required" value="<?php if(!empty($banner_detail)){ echo $banner_detail[0]->title; }else{ if(isset($_POST['title'])){ echo $_POST['title']; } }?>" autocomplete="off" /><br>

            </div>
            

             <div class="form-group">

                <label class="control-label">Sub Title Text</label>

                <textarea name="new_title" id="text_area" class="form-control ckeditor ck_textarea_visible" placeholder="" rows="5" ><?php if(!empty($banner_detail)){ echo trim($banner_detail[0]->sub_title); }else{ if(isset($_POST['sub_title'])){ echo trim($_POST['sub_title']); } }?></textarea>

            </div>

            <div class="form-group">

                <label class="control-label">First Button Text</label>

                <input type="text" name="first_button_text" placeholder="" class="form-control" data-validate="required" value="<?php if(!empty($banner_detail)){ echo $banner_detail[0]->first_button_text; }else{ if(isset($_POST['first_button_text'])){ echo $_POST['first_button_text']; } }?>" autocomplete="off" /><br>

            </div>

            <div class="form-group">

                <label class="control-label">First Button Url</label>

                <input type="text" name="first_button_url" placeholder="" class="form-control" data-validate="required" value="<?php if(!empty($banner_detail)){ echo $banner_detail[0]->first_button_url; }else{ if(isset($_POST['first_button_url'])){ echo $_POST['first_button_url']; } }?>" autocomplete="off" /><br>

            </div>

            <div class="form-group">

                <label class="control-label">Second Button Text</label>

                <input type="text" name="second_button_text" placeholder="" class="form-control" data-validate="required" value="<?php if(!empty($banner_detail)){ echo $banner_detail[0]->second_button_text; }else{ if(isset($_POST['second_button_text'])){ echo $_POST['second_button_text']; } }?>" autocomplete="off" /><br>

            </div>

            <div class="form-group">

                <label class="control-label">Second Button Url</label>

                <input type="text" name="second_button_url" placeholder="" class="form-control" data-validate="required" value="<?php if(!empty($banner_detail)){ echo $banner_detail[0]->second_button_url; }else{ if(isset($_POST['second_button_url'])){ echo $_POST['second_button_url']; } }?>" autocomplete="off" /><br>

            </div>

            <div class="form-group">

                <label class="control-label">Logo</label>

                <?php  if(!empty($logo_detail)) { ?>

                <div class="row col-md-12" style="background-color: #373b84;">
    
                <?php $i = 1; foreach ($logo_detail as $key => $data) { 
                ?>

                <div class="col-md-4">
                    <span class="imagelocation<?php echo $data->id ?>" style="cursor:pointer; color: red; margin-left: 118px;" onclick="javascript:deleteimage(<?php echo $data->id ?>)">X</span>
                <a href="<?php echo base_url(); ?>uploads/logo_images/<?php echo $data->image; ?>"> <img class="imagelocation<?php echo $data->id ?>" src="<?php echo base_url(); ?>uploads/logo_images/<?php echo $data->image; ?>"  width="120" height="100" style="border: 1px solid indianred;"></a>
                
                </div>

                <?php if($i%3 == 0){ ?>
                    <div class="clearfix"></div><br><br>
                <?php } $i++; } ?>

                </div>

                <?php } ?>



            <br/>
            <input type="file" name="userfile[]" multiple="multiple" class="form-control" accept=".jpg, .jpeg, .png, .gif, .pdf, .doc" data-msg-accept="Please select .jpg, .jpeg, .png, .gif, .pdf, .doc image files" />
            
            </div>

            <div class="form-group">
            <span class="errormsg">Note : Supported Media Type - gif, jpg, png, jpeg.</span>
            </div>

            <div class="form-group">
                <?php if(!empty($banner_detail)){ ?>

                <input type="hidden" name="banner_id" value="<?php echo $banner_detail[0]->id; ?>">

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


<script type="text/javascript">
//<![CDATA[
//    document.getElementById('Noite');
//  bkLib.onDomLoaded(function() {
        //new nicEditor({fullPanel : true}).panelInstance('text_area',{hasPanel : true});
        //new nicEditor({fullPanel : true,maxHeight : 200}).panelInstance('text_area2');
//  });
  //]]>
  </script>
  
  
  <script type="text/javascript">
function deleteimage(image_id)
{
var answer = confirm ("Are you sure, you want to delete this logo?");
if (answer)
{
        $.ajax({
                type: "POST",
                url: "<?php echo site_url('admin/delete_logo');?>",
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










