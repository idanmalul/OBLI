<script type="text/javascript" src="https://obli.co.il/assets/js/nic_editor/nicEdit-latest.js"></script>
<script type="text/javascript">bkLib.onDomLoaded(function() { nicEditors.allTextAreas() 

new nicEditor({fullPanel : true}).panelInstance('text_area',{hasPanel : true});
new nicEditor({fullPanel : true}).panelInstance('text_area2',{hasPanel : true});

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

            <?php if(!empty($section_4_detail)) echo 'Edit'; else echo 'Add'; ?> Section 4 Detail- How It Works

        </div>

    </div>

        

    <div class="panel-body">

        <form action="<?php if(!empty($section_4_detail)) echo site_url('admin/edit_section_4'); else echo site_url('admin/add_section_4'); ?>" role="form" id="form1" method="post" enctype="multipart/form-data" class="validate">


            <div class="form-group">

                <label class="control-label">Main Title</label>

                <input type="text" name="main_title" placeholder="" class="form-control" data-validate="required" value="<?php if(!empty($section_4_detail)){ echo $section_4_detail[0]->main_title; }else{ if(isset($_POST['main_title'])){ echo $_POST['main_title']; } }?>" autocomplete="off" /><br>

            </div>

            <div class="form-group">

                <label class="control-label">First Title Text</label>

                <input type="text" name="first_title_text" placeholder="" class="form-control" data-validate="required" value="<?php if(!empty($section_4_detail)){ echo $section_4_detail[0]->first_title_text; }else{ if(isset($_POST['first_title_text'])){ echo $_POST['first_title_text']; } }?>" autocomplete="off" /><br>

            </div>

            <div class="form-group">

                <label class="control-label">Sub Title Text</label>

                <textarea name="first_sub_title_text" id="text_area" class="form-control ckeditor ck_textarea_visible" placeholder="" rows="5" ><?php if(!empty($section_4_detail)){ echo trim($section_4_detail[0]->first_sub_title_text); }else{ if(isset($_POST['first_sub_title_text'])){ echo trim($_POST['first_sub_title_text']); } }?></textarea>

            </div>

            <div class="form-group">

                <label class="control-label">First Button Text</label>

                <input type="text" name="first_button_text" placeholder="" class="form-control" data-validate="required" value="<?php if(!empty($section_4_detail)){ echo $section_4_detail[0]->first_button_text; }else{ if(isset($_POST['first_button_text'])){ echo $_POST['first_button_text']; } }?>" autocomplete="off" /><br>

            </div>

             <div class="form-group">

                <label class="control-label">First Button Url</label>

                <input type="text" name="first_button_url" placeholder="" class="form-control" data-validate="required" value="<?php if(!empty($section_4_detail)){ echo $section_4_detail[0]->first_button_url; }else{ if(isset($_POST['first_button_url'])){ echo $_POST['first_button_url']; } }?>" autocomplete="off" /><br>

            </div>

            <div class="form-group">

                <label class="control-label">Second Title Text</label>

                <input type="text" name="second_title_text" placeholder="" class="form-control" data-validate="required" value="<?php if(!empty($section_4_detail)){ echo $section_4_detail[0]->second_title_text; }else{ if(isset($_POST['second_title_text'])){ echo $_POST['second_title_text']; } }?>" autocomplete="off" /><br>

            </div>

            <div class="form-group">

                <label class="control-label">Second Sub Title Text</label>

                <textarea name="second_sub_title_text" id="text_area2" class="form-control ckeditor ck_textarea_visible" placeholder="" rows="5" ><?php if(!empty($section_4_detail)){ echo trim($section_4_detail[0]->second_sub_title_text); }else{ if(isset($_POST['second_sub_title_text'])){ echo trim($_POST['second_sub_title_text']); } }?></textarea>

            </div>

            <div class="form-group">

                <label class="control-label">Second Button Text</label>

                <input type="text" name="second_button_text" placeholder="" class="form-control" data-validate="required" value="<?php if(!empty($section_4_detail)){ echo $section_4_detail[0]->second_button_text; }else{ if(isset($_POST['second_button_text'])){ echo $_POST['second_button_text']; } }?>" autocomplete="off" /><br>

            </div>

             <div class="form-group">

                <label class="control-label">Second Button Url</label>

                <input type="text" name="second_button_url" placeholder="" class="form-control" data-validate="required" value="<?php if(!empty($section_4_detail)){ echo $section_4_detail[0]->second_button_url; }else{ if(isset($_POST['second_button_url'])){ echo $_POST['second_button_url']; } }?>" autocomplete="off" /><br>

            </div>
            

            <div class="form-group">
                <?php if(!empty($section_4_detail)){ ?>

                <input type="hidden" name="section4_id" value="<?php echo $section_4_detail[0]->id; ?>">

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







