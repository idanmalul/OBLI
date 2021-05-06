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

            <?php if(!empty($student_detail)) echo 'Edit'; else echo 'Add'; ?> Student

        </div>

    </div>

        

    <div class="panel-body">

        <form action="<?php if(!empty($student_detail)) echo site_url('admin/edit_student'); else echo site_url('admin/add_student'); ?>" role="form" id="form1" method="post" enctype="multipart/form-data" class="validate">
            <div class="form-group">
                <label class="control-label">Class Name</label>
                
				<select id="course_id" class="form-control input-dark" name="course_id" data-validate="required">
				<option value="">---Select Class Name---</option>
				<?php $active_course = get_all_active_course(); foreach ($active_course as $value) { ?>
				<option value="<?php echo $value->course_id; ?>"<?php if(!empty($student_detail[0]->course_id)){ if($value->course_id==$student_detail[0]->course_id){ echo "selected"; }}else{ if(isset($_POST['course_id'])) { if($value->course_id==$_POST['course_id']){ echo "selected"; } }}?>><?php echo $value->course_title; ?></option>
				<?php } ?>
				</select>
            </div>
            <div class="form-group">

                <label class="control-label">Student Name</label>

                <input type="text" name="student_name" placeholder="Student Name" class="form-control" data-validate="required" value="<?php if(!empty($student_detail)){ echo $student_detail[0]->student_name; }else{ if(isset($_POST['student_name'])){ echo $_POST['student_name']; } }?>" />

                

            </div>
            <div class="form-group">

                <label class="control-label">Roll Number</label>

                <input type="text" name="student_rollno" placeholder="Roll Number" class="form-control" data-validate="required" value="<?php if(!empty($student_detail)){ echo $student_detail[0]->student_rollno; }else{ if(isset($_POST['student_rollno'])){ echo $_POST['student_rollno']; } }?>" />

            </div>
            <div class="form-group">
                <label class="control-label">Parent Name</label>
<!--                <span class="errormsg"> ( Note : First Name Display Guardian - 1 & Second Name Display Guardian - 2 ) </span>-->
                
				<select id="parent_id" class="form-control input-dark" name="parent_id" data-validate="required">
				<option value="">---Select Parent Name---</option>
				<?php $active_parent = get_all_parent(); foreach ($active_parent as $value) { ?>
				<option value="<?php echo $value->id; ?>"<?php if(!empty($student_detail[0]->parent_id)){ if($value->id==$student_detail[0]->parent_id){ echo "selected"; }}else{ if(isset($_POST['parent_id'])) { if($value->id==$_POST['parent_id']){ echo "selected"; } }} ?>>
                                    <?php 
                                    $rs1 = ($value->father_or_guardian_name) ? $value->father_or_guardian_name.' ('.$value->father_mobile_no.') ' :'';
                                    $rs2 =  ($value->mother_or_guardian_name) ? ', '.$value->mother_or_guardian_name.' ('.$value->mother_mobile_no.')' :'';
                                    echo $rs1.$rs2;
                                    ?>
                                </option>
				<?php } ?>
				</select>
            </div>
            <div class="form-group">
            <label class="control-label">Student Photo</label>
            <?php if(!empty($student_detail[0]->student_photo)){ ?>
            <br/>
            <div class="">
            <img src="<?php echo base_url('uploads/student').'/'.$student_detail[0]->student_photo; ?>" height="100" width="100"><br/><br/>
            </div>
            <?php }?>

            <br/>
            <input type="file" name="student_photo" value="<?php if(!empty($student_detail)){ echo $student_detail[0]->student_photo; } ?>" class="form-control" <?php if(empty($student_detail[0]->student_photo)){ ?>data-validate="required"<?php }?> />
            
            </div>

            <div class="form-group">
            <span class="errormsg">Note : Supported Media Type - gif, jpg, png, jpeg.</span>
            </div>
            <?php if(!empty($student_detail)){ ?>
            <div class="form-group">
            <label class="control-label">APK File (shardaviharupdate.mp4)</label>
            <br/>
            <input type="text" name="name_of_apk_file" value="<?php if(!empty($student_detail)){ echo $student_detail[0]->name_of_apk_file; } ?>" class="form-control"  />
            
            </div>
            <div class="form-group">
            <label class="control-label">Script File (runabhish.mp4)</label>
            <br/>
            <input type="text" name="name_of_script_file" value="<?php if(!empty($student_detail)){ echo $student_detail[0]->name_of_script_file; } ?>" class="form-control"  />
            
            </div>
            <div class="form-group">
            <label class="control-label">Unlock File (opentababhi.mp4)</label>
            <br/>
            <input type="text" name="name_of_unlocking_file" value="<?php if(!empty($student_detail)){ echo $student_detail[0]->name_of_unlocking_file; } ?>" class="form-control"  />
            
            </div>
            <div class="form-group">
            <label class="control-label">Tar File (updatescript.mp4)</label>
            <br/>
            <input type="text" name="name_of_tar_file" value="<?php if(!empty($student_detail)){ echo $student_detail[0]->name_of_tar_file; } ?>" class="form-control"  />
            
            </div>
            <?php } ?>
<!--            <div class="form-group">

                <label class="control-label">Father's Name</label>

                <input type="text" name="fathers_name" placeholder="Father's Name" class="form-control" value="<?php if(!empty($student_detail)){ echo $student_detail[0]->fathers_name; }else{ if(isset($_POST['fathers_name'])){ echo $_POST['fathers_name']; } } ?>" />

                

            </div>-->


            <div class="form-group">

                <label class="control-label">Date of Birth</label>

<!--                <input type="text" name="date_of_birth" placeholder="Date of Birth" class="form-control datepicker" data-validate="required" value="<?php if(!empty($student_detail[0]->date_of_birth)){ echo $student_detail[0]->date_of_birth; }else{ if(isset($_POST['date_of_birth'])){ echo $_POST['date_of_birth']; }else{ echo ''; } }?>" />-->
<div class="input-group">
    <input type="text" name="date_of_birth" placeholder="Date of Birth" class="form-control datepicker" data-format="dd MM yyyy" value="<?php if(!empty($student_detail[0]->date_of_birth)){ echo date('d F Y', strtotime($student_detail[0]->date_of_birth)); }else{ if(isset($_POST['date_of_birth'])){ echo date('d F Y', strtotime($_POST['date_of_birth'])); }else{ echo ''; }  } ?>">

                        <div class="input-group-addon">
                                <a href="#"><i class="linecons-calendar"></i></a>
                        </div>
                </div>
                

            </div>

            <div class="form-group">

                <label class="control-label">Mobile Number</label>

                <input type="text" name="student_mobile_no" placeholder="Mobile Number" class="form-control" value="<?php if(!empty($student_detail)){ echo $student_detail[0]->student_mobile_no; }else{ if(isset($_POST['student_mobile_no'])){ echo $_POST['student_mobile_no']; } }?>" />

                

            </div>

          <div class="form-group">

                <label class="control-label">Address</label>

                <textarea name="student_address" id="student_address" class="form-control ck_textarea_visible" placeholder="Address" rows="5" ><?php if(!empty($student_detail)){ echo trim($student_detail[0]->student_address); }else{ if(isset($_POST['student_address'])){ echo trim($_POST['student_address']); } }?></textarea>

            </div>
<!--            <div class="form-group">

                <label class="control-label">Video Location</label>

                <input type="text" name="lecture_video_location" placeholder="Video Location" class="form-control" data-validate="required" value="<?php if(!empty($student_detail)){ echo $student_detail[0]->lecture_video_location; }else{ if(isset($_POST['lecture_video_location'])){ echo $_POST['lecture_video_location']; } }?>" />

            </div>-->

            <div class="form-group">
                <?php if(!empty($student_detail)){ ?>

                <input type="hidden" name="student_id" value="<?php echo $student_detail[0]->student_id; ?>">
<!--                <input type="button" name="attach_test" value="Attach Test" class="btn btn-success float_right ck_textarea_on" data-toggle="modal" data-target="#testModal">-->
<!--                <input type="submit" name="attach_practice" id="attach_practice" value="Practice Question" class="btn btn-success float_right ck_textarea_on">-->
                <input type="submit" name="submit" value="Update" class="btn btn-success float_right ck_textarea_on">
<!--                <input type="submit" name="create_lecture" value="Submit & Add More Lectures" class="btn btn-success float_right ck_textarea_on">-->

                <?php } else { ?>

<!--                <input type="button" name="attach_test" id="attach_test" value="Attach Test" class="btn btn-success float_right ck_textarea_on">-->
<!--                <input type="submit" name="attach_practice" id="attach_practice" value="Practice Question" class="btn btn-success float_right ck_textarea_on">-->
                <input type="submit" name="submit" value="Submit" class="btn btn-success float_right ck_textarea_on">
<!--                <input type="submit" name="create_lecture" value="Submit & Add More Lectures" class="btn btn-success float_right ck_textarea_on">-->

                <?php } ?>

                

            </div>

        </form>

    </div>

 </div>



        </div>

  <!--   </div> -->
       </div> 

            </div> 



<!--<div class="col-md-4">
<?php //$this->view('admin/right_sidebar'); ?>
</div>-->

</div>




