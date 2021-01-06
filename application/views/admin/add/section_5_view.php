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

            <?php if(!empty($section_5_detail)) echo 'Edit'; else echo 'Add'; ?> Section 5 Detail

        </div>

    </div>

        

    <div class="panel-body">

        <form action="<?php if(!empty($section_5_detail)) echo site_url('admin/edit_section_5'); else echo site_url('admin/add_section_5'); ?>" role="form" id="form1" method="post" enctype="multipart/form-data" class="validate">


            <div class="form-group">

                <label class="control-label">Main Title</label>

                <input type="text" name="title" placeholder="" class="form-control" data-validate="required" value="<?php if(!empty($section_5_detail)){ echo $section_5_detail[0]->title; }else{ if(isset($_POST['title'])){ echo $_POST['title']; } }?>" autocomplete="off" /><br>

            </div>

            <div class="form-group">

                <label class="control-label">Sub Title Text</label>

                <textarea name="sub_ttitle" id="text_area" class="form-control ckeditor ck_textarea_visible" placeholder="" rows="5" ><?php if(!empty($section_5_detail)){ echo trim($section_5_detail[0]->sub_ttitle); }else{ if(isset($_POST['sub_ttitle'])){ echo trim($_POST['sub_ttitle']); } }?></textarea>

            </div>

            
            <div class="form-group">
                <?php if(!empty($section_5_detail)){ ?>

                <input type="hidden" name="section5_id" value="<?php echo $section_5_detail[0]->id; ?>">

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







