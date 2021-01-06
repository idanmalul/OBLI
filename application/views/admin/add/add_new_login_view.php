<script type="text/javascript" src="https://obli.co.il/assets/js/nic_editor/nicEdit-latest.js"></script>
<script type="text/javascript">bkLib.onDomLoaded(function() { nicEditors.allTextAreas() 

new nicEditor({fullPanel : true}).panelInstance('text_area',{hasPanel : true});
new nicEditor({fullPanel : true}).panelInstance('text_area1',{hasPanel : true});
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

            <?php if(!empty($login_detail)) echo 'Edit'; else echo 'Add'; ?> Loan Application Form


        </div>

    </div>

        

    <div class="panel-body">

        <form action="<?php if(!empty($login_detail)) echo site_url('admin/edit_new_login'); else echo site_url('admin/add_new_login'); ?>" role="form" id="form1" method="post" enctype="multipart/form-data" class="validate">


            <div class="form-group">

                <label class="control-label">Type of Loan *</label>

                <select class="form-control input-dark" name="type_of_loan" data-validate="required">

                    <option selected="" disabled="" hidden="">--Select type of loan--</option>
                    
                    <option value="PL" <?php if(!empty($login_detail)){ if($login_detail[0]->type_of_loan == "PL"){ echo "selected='selected'"; } }else{if(isset($_POST['PL'])){ echo "selected='selected'"; } } ?> >Personal Loan</option>

                    <option value="HL" <?php if(!empty($login_detail)){ if($login_detail[0]->type_of_loan == "HL"){ echo "selected='selected'"; } }else{ if(isset($_POST['HL'])){ echo "selected='selected'"; } } ?> >Home Loan</option>

                    <option value="LAP" <?php if(!empty($login_detail)){ if($login_detail[0]->type_of_loan == "LAP"){ echo "selected='selected'"; } }else{ if(isset($_POST['LAP'])){ echo "selected='selected'"; } } ?> >Loan Against Property</option>

                    <option value="BL" <?php if(!empty($login_detail)){ if($login_detail[0]->type_of_loan == "BL"){ echo "selected='selected'"; } }else{ if(isset($_POST['BL'])){ echo "selected='selected'"; } } ?> >Business Loan</option>

                    <!-- <option value="CC" <?php if(!empty($login_detail)){ if($login_detail[0]->type_of_loan == "CC"){ echo "selected='selected'"; } }?> >CC</option> -->

                </select>

            </div>

            <div class="form-group">

                <label class="control-label">Name of Applicant *</label>

                <input type="text" name="name_of_the_applicant" placeholder="" class="form-control" data-validate="required" value="<?php if(!empty($login_detail)){ echo $login_detail[0]->name_of_the_applicant; }else{ if(isset($_POST['name_of_the_applicant'])){ echo $_POST['name_of_the_applicant']; } }?>" />

            </div>

            <div class="form-group">

                <label class="control-label">Father's / Spouse's Name</label>

                <input type="text" name="fathers_or_spouses_name" placeholder="" class="form-control" data-validate="" value="<?php if(!empty($login_detail)){ echo $login_detail[0]->fathers_or_spouses_name; }else{ if(isset($_POST['fathers_or_spouses_name'])){ echo $_POST['fathers_or_spouses_name']; } }?>" />

            </div>

            <div class="form-group">

                <label class="control-label">Mother's Name</label>

                <input type="text" name="mothers_name" placeholder="" class="form-control" data-validate="" value="<?php if(!empty($login_detail)){ echo $login_detail[0]->mothers_name; }else{ if(isset($_POST['mothers_name'])){ echo $_POST['mothers_name']; } }?>" />

            </div>

            <div class="form-group">

                <label class="control-label">PAN No.</label>

                <input type="text" name="pan_no" placeholder="" class="form-control" data-validate="" value="<?php if(!empty($login_detail)){ echo $login_detail[0]->pan_no; }else{ if(isset($_POST['pan_no'])){ echo $_POST['pan_no']; } }?>" />

            </div>

            <div class="form-group">

                <label class="control-label">Aadhaar Card No.</label>

                <input type="text" name="aadhar_card_no" placeholder="" class="form-control" data-validate="" value="<?php if(!empty($login_detail)){ echo $login_detail[0]->aadhar_card_no; }else{ if(isset($_POST['aadhar_card_no'])){ echo $_POST['aadhar_card_no']; } }?>" />

            </div>

            <div class="form-group">

                <label class="control-label">Driving License No.</label>

                <input type="text" name="driving_license_no" placeholder="" class="form-control" data-validate="" value="<?php if(!empty($login_detail)){ echo $login_detail[0]->driving_license_no; }else{ if(isset($_POST['driving_license_no'])){ echo $_POST['driving_license_no']; } }?>" />

            </div>

            <div class="form-group">

                <label class="control-label">Driving License Expiry Date</label>

                <input type="text" name="drive_license_exp_date" placeholder="" class="form-control" data-validate="" value="<?php if(!empty($login_detail)){ echo $login_detail[0]->drive_license_exp_date; }else{ if(isset($_POST['drive_license_exp_date'])){ echo $_POST['drive_license_exp_date']; } }?>" />

            </div>

            <div class="form-group">

                <label class="control-label">Passport No.</label>

                <input type="text" name="passport_no" placeholder="" class="form-control" data-validate="" value="<?php if(!empty($login_detail)){ echo $login_detail[0]->passport_no; }else{ if(isset($_POST['passport_no'])){ echo $_POST['passport_no']; } }?>" />

            </div>

            <div class="form-group">

                <label class="control-label">Passport Expiry Date</label>

                <input type="text" name="passport_exp_date" placeholder="" class="form-control" data-validate="" value="<?php if(!empty($login_detail)){ echo $login_detail[0]->passport_exp_date; }else{ if(isset($_POST['passport_exp_date'])){ echo $_POST['passport_exp_date']; } }?>" />

            </div>

            <div class="form-group">

                <label class="control-label">Voter Id No.</label>

                <input type="text" name="voter_id_no" placeholder="" class="form-control" data-validate="" value="<?php if(!empty($login_detail)){ echo $login_detail[0]->voter_id_no; }else{ if(isset($_POST['voter_id_no'])){ echo $_POST['voter_id_no']; } }?>" />

            </div>

            <div class="form-group">

                <label class="control-label">Date of Birth</label>

                <input type="text" name="date_of_birth" placeholder="" class="form-control datepicker" data-validate="" value="<?php if(!empty($login_detail)){ echo $login_detail[0]->date_of_birth; }else{ if(isset($_POST['date_of_birth'])){ echo $_POST['date_of_birth']; } }?>" data-validate="required" autocomplete="off" data-format="dd-M-yyyy" data-start-view="2" />

            </div>

            <div class="form-group">

                <label class="control-label">Gender</label>

                <select class="form-control input-dark" name="gender" data-validate="">

                    <option selected="" disabled="" hidden="">--Select gender--</option>
                    
                    <option value="M" <?php if(!empty($login_detail)){ if($login_detail[0]->gender == "M"){ echo "selected='selected'"; } }?> >Male</option>

                    <option value="F" <?php if(!empty($login_detail)){ if($login_detail[0]->gender == "F"){ echo "selected='selected'"; } }?> >Female</option>
                    
                </select>

            </div>

            <div class="form-group">

                <label class="control-label">Occupation</label>

                <input type="text" name="occupation" placeholder="" class="form-control" data-validate="" value="<?php if(!empty($login_detail)){ echo $login_detail[0]->occupation; }else{ if(isset($_POST['occupation'])){ echo $_POST['occupation']; } }?>" />

            </div>

            <div class="form-group">

                <label class="control-label">Education</label>

                <select class="form-control input-dark" name="education" data-validate="">

                    <option selected="" disabled="" hidden="">--Select education--</option>
                    
                    <option value="UG" <?php if(!empty($login_detail)){ if($login_detail[0]->education == "UG"){ echo "selected='selected'"; } }?> >Under Graduation</option>

                    <option value="GRAD" <?php if(!empty($login_detail)){ if($login_detail[0]->education == "GRAD"){ echo "selected='selected'"; } }?> >Graduation</option>

                    <option value="PG & ABOVE" <?php if(!empty($login_detail)){ if($login_detail[0]->education == "PG & ABOVE"){ echo "selected='selected'"; } }?> >Post Graduation & Above</option>
                    
                </select>

            </div>

            <div class="form-group">

                <label class="control-label">No. of Dependents</label>

                <input type="text" name="no_of_dependents" placeholder="" class="form-control" data-validate="" value="<?php if(!empty($login_detail)){ echo $login_detail[0]->no_of_dependents; }else{ if(isset($_POST['no_of_dependents'])){ echo $_POST['no_of_dependents']; } }?>" />

            </div>

            <div class="form-group">

                <label class="control-label">Marital Status</label>

                <select class="form-control input-dark" name="marital_status" data-validate="">

                    <option selected="" disabled="" hidden="">--Select marital status--</option>
                    
                    <option value="Single" <?php if(!empty($login_detail)){ if($login_detail[0]->marital_status == "Single"){ echo "selected='selected'"; } }?> >Single</option>

                    <option value="Married" <?php if(!empty($login_detail)){ if($login_detail[0]->marital_status == "Married"){ echo "selected='selected'"; } }?> >Married</option>

                    <option value="Other" <?php if(!empty($login_detail)){ if($login_detail[0]->marital_status == "Other"){ echo "selected='selected'"; } }?> >Other</option>
                    
                </select>

            </div>

            <div class="form-group">

                <label class="control-label">Religion</label>

                <input type="text" name="religion" placeholder="" class="form-control"  value="<?php if(!empty($login_detail)){ echo $login_detail[0]->religion; }else{ if(isset($_POST['religion'])){ echo $_POST['religion']; } }?>" />

            </div>

            <div class="form-group">

                <label class="control-label">Mobile Number *</label>

                <input type="text" name="mobile_no" placeholder="" class="form-control" value="<?php if(!empty($login_detail)){ echo $login_detail[0]->mobile_no; }else{ if(isset($_POST['mobile_no'])){ echo $_POST['mobile_no']; } }?>" data-validate="required,number,minlength[10],maxlength[10]" />

            </div>

            <div class="form-group">

                <label class="control-label">Email Id *</label>

                <input type="email" name="email_id" placeholder="" class="form-control" value="<?php if(!empty($login_detail)){ echo $login_detail[0]->email_id; }else{ if(isset($_POST['email_id'])){ echo $_POST['email_id']; } }?>" data-validate="required" />

            </div>

            <div class="form-group">

                <label class="control-label">Residence Type</label>

                <select class="form-control input-dark" name="residence_type" data-validate="">

                    <option selected="" disabled="" hidden="">--Select residence type--</option>
                    
                    <option value="Rented" <?php if(!empty($login_detail)){ if($login_detail[0]->residence_type == "Rented"){ echo "selected='selected'"; } }?> >Rented</option>

                    <option value="owned" <?php if(!empty($login_detail)){ if($login_detail[0]->residence_type == "owned"){ echo "selected='selected'"; } }?> >owned</option>

                    <option value="parental" <?php if(!empty($login_detail)){ if($login_detail[0]->residence_type == "parental"){ echo "selected='selected'"; } }?> >parental</option>

                    <option value="company provided" <?php if(!empty($login_detail)){ if($login_detail[0]->residence_type == "company provided"){ echo "selected='selected'"; } }?> >company provided</option>
                    
                </select>

            </div>

            <div class="form-group">

                <label class="control-label">Residence Address</label>

                <textarea name="residence_address" class="form-control ck_textarea_visible" placeholder="" rows="5" id="text_area"><?php if(!empty($login_detail)){ echo trim($login_detail[0]->residence_address); }else{ if(isset($_POST['residence_address'])){ echo trim($_POST['residence_address']); } }?></textarea>

            </div>

            <div class="form-group">

                <label class="control-label">Years At Current Residence</label>

                <input type="text" name="years_at_current_residence" placeholder="" data-validate="" class="form-control" value="<?php if(!empty($login_detail)){ echo $login_detail[0]->years_at_current_residence; }else{ if(isset($_POST['years_at_current_residence'])){ echo $_POST['years_at_current_residence']; } }?>" />

            </div>

            <div class="form-group">

                <label class="control-label">Office Address</label>

                <textarea name="office_address" class="form-control ck_textarea_visible" placeholder="" rows="5" id="text_area1"><?php if(!empty($login_detail)){ echo trim($login_detail[0]->office_address); }else{ if(isset($_POST['office_address'])){ echo trim($_POST['office_address']); } }?></textarea>

            </div>

            <div class="form-group">

                <label class="control-label">Total Years In Service/ Business</label>

                <input type="number" name="total_years_service_or_business" placeholder="" class="form-control" value="<?php if(!empty($login_detail)){ echo $login_detail[0]->total_years_service_or_business; }else{ if(isset($_POST['total_years_service_or_business'])){ echo $_POST['total_years_service_or_business']; } }?>" />

            </div>

            <div class="form-group">

                <label class="control-label">No of Years In Current Service/ Business</label>

                <input type="number" name="no_of_years_current_jobs" placeholder="" data-validate="" class="form-control" value="<?php if(!empty($login_detail)){ echo $login_detail[0]->no_of_years_current_jobs; }else{ if(isset($_POST['no_of_years_current_jobs'])){ echo $_POST['no_of_years_current_jobs']; } }?>" />

            </div>

            <div class="form-group">

                <label class="control-label">Permanent Residence Address</label>

                <textarea name="permanent_residence_address" class="form-control ck_textarea_visible" placeholder="" rows="5" id="text_area2"><?php if(!empty($login_detail)){ echo trim($login_detail[0]->permanent_residence_address); }else{ if(isset($_POST['permanent_residence_address'])){ echo trim($_POST['permanent_residence_address']); } }?></textarea>

            </div>

            <div class="form-group">

                <label class="control-label">Annual Income</label>

                <input type="number" name="annual_income" placeholder="" data-validate="" class="form-control" value="<?php if(!empty($login_detail)){ echo $login_detail[0]->annual_income; }else{ if(isset($_POST['annual_income'])){ echo $_POST['annual_income']; } }?>" />

            </div>

            <div class="form-group">

                <label class="control-label">Other Income</label>

                <input type="number" name="other_income" placeholder="" data-validate="" class="form-control" value="<?php if(!empty($login_detail)){ echo $login_detail[0]->other_income; }else{ if(isset($_POST['other_income'])){ echo $_POST['other_income']; } }?>" />

            </div>

            <div class="form-group">

                <label class="control-label">Bank Details</label>

                <input type="text" name="bank_details" placeholder="" data-validate="" class="form-control" value="<?php if(!empty($login_detail)){ echo $login_detail[0]->bank_details; }else{ if(isset($_POST['bank_details'])){ echo $_POST['bank_details']; } }?>" />

            </div>

            <div class="form-group">

                <label class="control-label">Name of Bank</label>

                <input type="text" name="name_of_bank" placeholder="" data-validate="" class="form-control" value="<?php if(!empty($login_detail)){ echo $login_detail[0]->name_of_bank; }else{ if(isset($_POST['name_of_bank'])){ echo $_POST['name_of_bank']; } }?>" />

            </div>

            <div class="form-group">

                <label class="control-label">Account No</label>

                <input type="number" name="account_no" placeholder="" data-validate="" class="form-control" value="<?php if(!empty($login_detail)){ echo $login_detail[0]->account_no; }else{ if(isset($_POST['account_no'])){ echo $_POST['account_no']; } }?>" />

            </div>

            <div class="form-group">

                <label class="control-label">Year Opened</label>

                <input type="text" name="year_opened" placeholder="" data-validate="" class="form-control" value="<?php if(!empty($login_detail)){ echo $login_detail[0]->year_opened; }else{ if(isset($_POST['year_opened'])){ echo $_POST['year_opened']; } }?>" />

            </div>



            <div class="form-group">

                <label class="control-label">Customer Id</label>

                <input type="text" name="customer_id" placeholder="" autocomplete="off" class="form-control" data-validate="" value="<?php if(!empty($login_detail)){ echo $login_detail[0]->customer_id; }else{ if(isset($_POST['customer_id'])){ echo $_POST['customer_id']; } }?>" />

            </div>

            <div class="form-group table-responsive">

                <label class="control-label">Existing Loan Details</label>

                <table class="table table-striped table-bordered " cellspacing="0" width="100%">

                    <thead>
                        <th>S.No.</th>
                        <th>Name of Institution</th>
                        <th>Since  MM/YY</th>
                        <th>Loan Type</th>
                        <th>Loan Amount</th>
                    </thead>

                    <tbody>
                        <?php 
                        // echo "<pre>"; 
                        // if(!empty($new_login_existing_detail[0])){ echo $new_login_existing_detail[0]->since_mm_yy."<br>"; } 
                        // print_r($new_login_existing_detail);
                         for($i=1; $i<=5; $i++){ ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                        <?php if(!empty($new_login_existing_detail)){ ?>
                            <input type="hidden" name="exit_table_id[]" value="<?php if(!empty($new_login_existing_detail)){ for($j=0; $j<=$i; $j++){ if($i > $j){ if(!empty($new_login_existing_detail[$j])){ echo $new_login_existing_detail[$j]->id; } } } } ?>">
                        <?php } ?>

                            <td><input type="text" name="name_of_institutions[]" value="<?php if(!empty($new_login_existing_detail)){ for($j=0; $j<=$i; $j++){ if($i > $j){ if(!empty($new_login_existing_detail[$j])){ echo $new_login_existing_detail[$j]->name_of_institutions; } } } }else{ if(!empty($_POST['name_of_institutions'])){ foreach($_POST['name_of_institutions'] as $key => $n){ if($key+1 == $i) echo $n; } } } ?>" ></td>

                            <td><input type="text" name="since_mm_yy[]" value="<?php if(!empty($new_login_existing_detail)){ for($k=0; $k<=$i; $k++){ if($i > $k){ if(!empty($new_login_existing_detail[$k])){ echo $new_login_existing_detail[$k]->since_mm_yy;  } } } }else{ if(!empty($_POST['since_mm_yy'])){ foreach($_POST['since_mm_yy'] as $key => $n){ if($key+1 == $i) echo $n; } } } ?>" ></td>

                            <td><input type="text" name="loan_type[]" value="<?php if(!empty($new_login_existing_detail)){ for($j=0; $j<=$i; $j++){ if($i > $j){ if(!empty($new_login_existing_detail[$j])){ echo $new_login_existing_detail[$j]->loan_type;  } } } }else{ if(!empty($_POST['loan_type'])){ foreach($_POST['loan_type'] as $key => $n){ if($key+1 == $i) echo $n; } } } ?>" ></td>

                            <td><input type="text" name="loan_ammount[]" value="<?php if(!empty($new_login_existing_detail)){ for($j=0; $j<=$i; $j++){ if($i > $j){ if(!empty($new_login_existing_detail[$j])){ echo $new_login_existing_detail[$j]->loan_ammount; $new_login_existing_detail[$j] = ""; } } } }else{ if(!empty($_POST['loan_ammount'])){ foreach($_POST['loan_ammount'] as $key => $n){ if($key+1 == $i) echo $n; } } } ?>" ></td>

                        </tr>
                        <?php } ?>
                    </tbody>
                    
                </table>

                

            </div>

            <div class="form-group">

                <label class="control-label">Requested Loan Amount</label>

                <input type="text" name="requested_loan_ammount" placeholder="" class="form-control" value="<?php if(!empty($login_detail)){ echo $login_detail[0]->requested_loan_ammount; }else{ if(isset($_POST['requested_loan_ammount'])){ echo $_POST['requested_loan_ammount']; } }?>" data-validate="required" />

            </div>

            <div class="form-group">

                <label class="control-label">Tenure(months)</label>

                <input type="text" name="tenure_or_months" placeholder="" class="form-control" value="<?php if(!empty($login_detail)){ echo $login_detail[0]->tenure_or_months; }else{ if(isset($_POST['tenure_or_months'])){ echo $_POST['tenure_or_months']; } }?>" />

            </div>

            <div class="form-group">

                <label class="control-label">End Use</label>

                <input type="text" name="end_use" placeholder="" class="form-control" value="<?php if(!empty($login_detail)){ echo $login_detail[0]->end_use; }else{ if(isset($_POST['end_use'])){ echo $_POST['end_use']; } }?>" />

            </div>

            <div class="form-group table-responsive">

                <label class="control-label">References: </label>

                <table class="table table-striped table-bordered " cellspacing="0" width="100%">

                    <thead>
                        <th>S.No.</th>
                        <th>Name</th>
                        <th>Relationship With Applicant</th>
                        <th>Residential Address</th>
                        <th>Phone No.</th>
                    </thead>

                    <tbody>
                        <?php
                        // echo "<pre>"; 
                        // if(!empty($new_login_references_detail[0])){ echo $new_login_references_detail[0]->name."<br>"; } 
                        // print_r($new_login_references_detail);
                         for($i=1; $i<=2; $i++){ ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                        <?php if(!empty($login_detail)){ ?>
                            <input type="hidden" name="reference_table_id[]" value="<?php if(!empty($new_login_references_detail)){ for($j=0; $j<=$i; $j++){ if($i > $j){ if(!empty($new_login_references_detail[$j])){ echo $new_login_references_detail[$j]->id; } } } } ?>">
                        <?php } ?>

                            <td><input type="text" name="name[]" value="<?php if(!empty($new_login_references_detail)){ for($j=0; $j<=$i; $j++){ if($i > $j){ if(!empty($new_login_references_detail[$j])){ echo $new_login_references_detail[$j]->name;  } } } }else{ if(!empty($_POST['name'])){ foreach($_POST['name'] as $key => $n){ if($key+1 == $i) echo $n; } } } ?>"></td>

                            <td><input type="text" name="relationship_with_applicant[]" value="<?php if(!empty($new_login_references_detail)){ for($j=0; $j<=$i; $j++){ if($i > $j){ if(!empty($new_login_references_detail[$j])){ echo $new_login_references_detail[$j]->relationship_with_applicant;  } } } }else{ if(!empty($_POST['relationship_with_applicant'])){ foreach($_POST['relationship_with_applicant'] as $key => $n){ if($key+1 == $i) echo $n; } } } ?>"></td>

                            <td><textarea name="residential_address[]"><?php if(!empty($new_login_references_detail)){ for($j=0; $j<=$i; $j++){ if($i > $j){ if(!empty($new_login_references_detail[$j])){ echo $new_login_references_detail[$j]->residential_address;  } } } }else{ if(!empty($_POST['residential_address'])){ foreach($_POST['residential_address'] as $key => $n){ if($key+1 == $i) echo $n; } } }  ?></textarea></td>

                            <td><input type="text" name="phone_no[]" value="<?php if(!empty($new_login_references_detail)){ for($j=0; $j<=$i; $j++){ if($i > $j){ if(!empty($new_login_references_detail[$j])){ echo $new_login_references_detail[$j]->phone_no; $new_login_references_detail[$j] = ""; } } } }else{ if(!empty($_POST['phone_no'])){ foreach($_POST['phone_no'] as $key => $n){ if($key+1 == $i) echo $n; } } } ?>"></td>

                        </tr>
                        <?php } ?>
                    </tbody>
                    
                </table>

                <!-- <input type="text" name="admin_email" placeholder="" autocomplete="off" class="form-control" data-validate="" value="<?php if(!empty($login_detail)){ echo $login_detail[0]->admin_email; }else{ if(isset($_POST['admin_email'])){ echo $_POST['admin_email']; } }?>" /> -->

            </div>

            <div class="form-group">

                <label class="control-label">Upload Documents</label>


                <?php  if(!empty($customer_doc_images)) { ?>

                <div class="row col-md-12">
    
                <?php $i = 1; foreach ($customer_doc_images as $key => $data) { 
                ?>

                <div class="col-md-4">
                    <span class="imagelocation<?php echo $data->id ?>" style="cursor:pointer; color: #393637; margin-left: 122px;" onclick="javascript:deleteimage(<?php echo $data->id ?>)">X</span>
                <a href="<?php echo base_url(); ?>uploads/login_images/<?php echo $data->customer_document; ?>"> <img class="imagelocation<?php echo $data->id ?>" src="<?php echo base_url(); ?>uploads/login_images/<?php echo $data->customer_document; ?>"  width="120" height="100"></a>
                
                </div>

                <?php if($i%3 == 0){ ?>
                    <div class="clearfix"></div><br><br>
                <?php } $i++; } ?>

                </div>

                <?php } ?>


<script type="text/javascript">
function deleteimage(image_id)
{
var answer = confirm ("Are you sure, you want to delete this document?");
if (answer)
{
        $.ajax({
                type: "POST",
                url: "<?php echo site_url('admin/delete_customer_document');?>",
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


                <!-- <?php if(!empty($login_detail[0]->upload_documents)){ ?>
                <br/>
                <div class="row col-md-12">
                    <?php $i = 1; $id_proof_images = $login_detail[0]->upload_documents; $userfile = explode(",", $id_proof_images);
                        foreach($userfile as $v){
                     // echo "<pre>"; print_r($userfile); 
                    ?>
                    <div class="col-md-3">
                    
                        <img src="<?php echo base_url('uploads/login_images').'/'.$v; ?>" height="100" width="100">
                    </div>
                        

                    <?php if($i%4 == 0){ ?>
                        <div class="clearfix"></div><br><br>
                    <?php  } $i++; } ?>
                </div>

                <?php }?> -->

            <br/>
            <input type="file" name="userfile[]" multiple="multiple" accept=".jpg, .jpeg, .png, .gif, .pdf, .doc" data-msg-accept="Please select .jpg, .jpeg, .png, .gif, .pdf, .doc image files"  class="form-control" />
            
            </div>


            <div class="form-group">
                <?php if(!empty($login_detail)){ ?>

                <input type="hidden" name="login_id" value="<?php echo $login_detail[0]->id; ?>">

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




