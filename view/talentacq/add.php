<style>
    .btn-file {
        position: relative;
        overflow: hidden;
    }
    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }
</style>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-list"></i> Add New Record</h6>
    </div>
    <div class="card-body">
    <?php $form = new \REJ\Libs\Form($this->getret); ?>
            
            <form method="post" action="">
                <div><?php $this->getHeaderError(); ?></div>
                <h4 class="text-primary">Applicant Information</h4><br/>
                <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <?php
                            $form->field(array(
                                'type'=>'text',
                                'name'=>'applicant_code',
                                'label'=>'Applicant\'s Code',
                                'placeholder'=>'Applicant\'s Code',
                                'require'=>1,
                                'value'=>$this->saveData('applicant_code'),
                            ));

                            $form->field(array(
                                'type'=>'text',
                                'name'=>'date_applied',
                                'label'=>'<i class="fa fa-calendar"></i> Date Applied',
                                'require'=>1,
                                'value'=>$this->saveData('date_applied')
                            ));

                            $form->field(array(
                                'type'=>'text',
                                'name'=>'first_name',
                                'label'=>'First Name',
                                'placeholder'=>'First Name',
                                'require'=>1,
                                'value'=>$this->saveData('first_name')
                            ));
                        
                            $form->field(array(
                                'type'=>'text',
                                'name'=>'middle_name',
                                'label'=>'Middle Name',
                                'placeholder'=>'Middle Name',
                                'require'=>0,
                                'value'=>$this->saveData('middle_name')
                            ));
                        
                            $form->field(array(
                                'type'=>'text',
                                'name'=>'last_name',
                                'label'=>'Last Name',
                                'placeholder'=>'Last Name',
                                'require'=>1,
                                'value'=>$this->saveData('last_name')
                            ));

                            $form->field(array(
                                'type'=>'select',
                                'name'=>'gender',
                                'label'=>'Gender',
                                'require'=>1,
                                'option'=>$this->getGenderList($this->getret['data']['civil_status'] ?? "")
                            ));

                            $form->field(array(
                                'type'=>'select',
                                'name'=>'civil_status',
                                'label'=>'Civil Status',
                                'require'=>1,
                                'option'=>$this->getCivilStatusList($this->getret['data']['civil_status'] ?? "")
                            ));

                            $form->field(array(
                                'type'=>'text',
                                'name'=>'birthdate',
                                'label'=>'<i class="fa fa-calendar"></i> Birthdate',
                                'require'=>1,
                                'value'=>$this->saveData('birthdate')
                            ));

                            $form->field(array(
                                'type'=>'text',
                                'name'=>'age',
                                'label'=>'Age',
                                'placeholder'=>'Age',
                                'require'=>1,
                                'value'=>$this->saveData('age')
                            ));
                            
                            $form->field(array(
                                'type'=>'text',
                                'name'=>'mobile_number',
                                'label'=>'Mobile Number',
                                'placeholder'=>'Mobile Number',
                                'require'=>1,
                                'value'=>$this->saveData('mobile_number'),
                            ));

                        ?>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <?php 
                           $form->field(array(
                            'type'=>'text',
                            'name'=>'landline',
                            'label'=>'Landline',
                            'placeholder'=>'Mobile Number',
                            'require'=>1,
                            'value'=>$this->saveData('landline'),
                        ));

                        $form->field(array(
                            'type'=>'text',
                            'name'=>'email_address',
                            'label'=>'Email Address',
                            'placeholder'=>'Email Address',
                            'require'=>0,
                            'value'=>$this->saveData('email_address')
                        ));

                           $form->field(array(
                                'type'=>'text',
                                'name'=>'emergency_person',
                                'label'=>'Person to contact in case of emergency',
                                'placeholder'=>'Name',
                                'require'=>1,
                                'value'=>$this->saveData('emergency_person')
                            ));

                            $form->field(array(
                                'type'=>'text',
                                'name'=>'emergency_relationship',
                                'label'=>'Contact person relationship',
                                'placeholder'=>'Name',
                                'require'=>1,
                                'value'=>$this->saveData('emergency_relationship')
                            ));

                            $form->field(array(
                                'type'=>'text',
                                'name'=>'emergency_contact',
                                'label'=>'Contact person number',
                                'placeholder'=>'Mobile number ',
                                'require'=>1,
                                'value'=>$this->saveData('emergency_contact')
                            ));

                            $form->field(array(
                                'type'=>'text',
                                'name'=>'emergency_email',
                                'label'=>'Contact person email',
                                'placeholder'=>'Email Address ',
                                'require'=>1,
                                'value'=>$this->saveData('emergency_contact')
                            ));

                            $form->field(array(
                                'type'=>'textarea',
                                'name'=>'current_address',
                                'label'=>'Current Address',
                                'placeholder'=>'Current Address',
                                'attr'=>'style="resize: none;"',
                                'require'=>1,
                                'cols'=>30,
                                'rows'=>3,
                                'value'=>$this->saveData('current_address'),
                            ));

                            $form->field(array(
                                'type'=>'textarea',
                                'name'=>'permanent_address',
                                'label'=>'Permanent Address',
                                'placeholder'=>'Permanent Address',
                                'attr'=>'style="resize: none;"',
                                'require'=>1,
                                'cols'=>30,
                                'rows'=>3,
                                'value'=>$this->saveData('permanent_address'),
                            ));
                        
                        ?>
                    </div>
                </div>
                <hr/>
                <h4>Recruitment Online Exam Results</h4><br/>
                <div class="row">
                <div class="col-sm-6 col-md-6">
                        <h5 class="text-primary">Online Exam Results</h5><br/>
                        <?php
                            $form->field(array(
                                'type'=>'text',
                                'name'=>'csu_username',
                                'label'=>'CSU Username',
                                'placeholder'=>'CSU Username',
                                'require'=>1,
                                'value'=>$this->saveData('csu_username'),
                            ));

                            $form->field(array(
                                'type'=>'text',
                                'name'=>'exam_grammar',
                                'label'=>'Grammar',
                                'placeholder'=>'Grammar',
                                'require'=>1,
                                'value'=>$this->saveData('grammar')
                            ));
                        
                            $form->field(array(
                                'type'=>'text',
                                'name'=>'exam_math',
                                'label'=>'Math',
                                'placeholder'=>'Math',
                                'require'=>0,
                                'value'=>$this->saveData('exam_math')
                            ));
                        
                            $form->field(array(
                                'type'=>'text',
                                'name'=>'exam_spelling',
                                'label'=>'Spelling',
                                'placeholder'=>'Spelling',
                                'require'=>1,
                                'value'=>$this->saveData('exam_spelling')
                            ));
                        ?>
                    </div>
                    <div class="col-sm-6 col-md-6 pt-5">
                        <?php
                             $form->field(array(
                                'type'=>'text',
                                'name'=>'exam_computer',
                                'label'=>'Computer',
                                'placeholder'=>'Computer',
                                'require'=>1,
                                'value'=>$this->saveData('exam_computer')
                            ));

                            $form->field(array(
                                'type'=>'text',
                                'name'=>'exam_call',
                                'label'=>'Call',
                                'placeholder'=>'Call',
                                'require'=>1,
                                'value'=>$this->saveData('exam_call')
                            ));

                            $form->field(array(
                                'type'=>'text',
                                'name'=>'exam_personality_assessment',
                                'label'=>'Personality Assessment',
                                'placeholder'=>'Personality Assessment',
                                'require'=>1,
                                'value'=>$this->saveData('exam_personality_assessment')
                            ));

                            $form->field(array(
                                'type'=>'text',
                                'name'=>'exam_average',
                                'label'=>'Average',
                                'placeholder'=>'Average',
                                'require'=>1,
                                'value'=>$this->saveData('exam_average')
                            ));
                        ?>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-sm-6 col-md-6">
                    <h5 class="text-primary">Typing Exam Result</h5><br/>
                        <?php
                            $form->field(array(
                                'type'=>'text',
                                'name'=>'csu_username',
                                'label'=>'CSU Username',
                                'placeholder'=>'CSU Username',
                                'require'=>1,
                                'value'=>$this->saveData('csu_username'),
                            ));

                            $form->field(array(
                                'type'=>'text',
                                'name'=>'exam_grammar',
                                'label'=>'Grammar',
                                'placeholder'=>'Grammar',
                                'require'=>1,
                                'value'=>$this->saveData('grammar')
                            ));
                        
                            $form->field(array(
                                'type'=>'text',
                                'name'=>'exam_math',
                                'label'=>'Math',
                                'placeholder'=>'Math',
                                'require'=>0,
                                'value'=>$this->saveData('exam_math')
                            ));
                        
                            $form->field(array(
                                'type'=>'text',
                                'name'=>'exam_spelling',
                                'label'=>'Spelling',
                                'placeholder'=>'Spelling',
                                'require'=>1,
                                'value'=>$this->saveData('exam_spelling')
                            ));
                        ?>
                    </div>
                    <div class="col-sm-6 col-md-6 pt-5">
                        <?php
                            $form->field(array(
                                'type'=>'text',
                                'name'=>'ms_proficiency_test',
                                'label'=>'MS Proficiency Test',
                                'placeholder'=>'Proficiency',
                                'require'=>1,
                                'value'=>$this->saveData('csu_username'),
                            ));

                            $form->field(array(
                                'type'=>'select',
                                'name'=>'other_skill_test',
                                'label'=>'Other Skill-Based Test',
                                'require'=>1,
                                'option'=>$this->getOtherSkillBasedTestList($this->getret['data']['other_skill_test'] ?? "")
                            ));

                            $form->field(array(
                                'type'=>'text',
                                'name'=>'exam_encoded_by',
                                'label'=>'Encoded By',
                                'placeholder'=>'Encoder',
                                'require'=>1,
                                'value'=>$this->saveData('exam_encoded_by'),
                            ));
                        ?>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-sm-6 col-md-6">
                    <h5 class="text-primary">Applicant Interviews</h5><br/>
                        <?php
                            $form->field(array(
                                'type'=>'text',
                                'name'=>'hr_interviewer',
                                'label'=>'HR Interviewer',
                                'placeholder'=>'HR Interviewer',
                                'require'=>1,
                                'value'=>$this->saveData('hr_interviewer'),
                            ));

                            $form->field(array(
                                'type'=>'text',
                                'name'=>'hr_interview_result',
                                'label'=>'HR Interview Result',
                                'placeholder'=>'Result',
                                'require'=>1,
                                'value'=>$this->saveData('hr_interview_result')
                            ));
                        
                            $form->field(array(
                                'type'=>'text',
                                'name'=>'ops_interviewer',
                                'label'=>'Operations Interviewer',
                                'placeholder'=>'Ops Interviewer',
                                'require'=>0,
                                'value'=>$this->saveData('ops_interviewer')
                            ));
                        
                            $form->field(array(
                                'type'=>'text',
                                'name'=>'ops_interview_result',
                                'label'=>'Operations Interview Result',
                                'placeholder'=>'Result',
                                'require'=>1,
                                'value'=>$this->saveData('ops_interview_result')
                            ));

                            $form->field(array(
                                'type'=>'text',
                                'name'=>'ops_special_instruction',
                                'label'=>'Ops Special Instruction',
                                'placeholder'=>'Instruction',
                                'require'=>1,
                                'value'=>$this->saveData('ops_special_instruction')
                            ));

                            $form->field(array(
                                'type'=>'text',
                                'name'=>'final_interviewer',
                                'label'=>'Final Interviewer',
                                'placeholder'=>'Interviewer',
                                'require'=>1,
                                'value'=>$this->saveData('final_interviewer')
                            ));

                            $form->field(array(
                                'type'=>'text',
                                'name'=>'final_interview_result',
                                'label'=>'Final Interview Result',
                                'placeholder'=>'Result',
                                'require'=>1,
                                'value'=>$this->saveData('final_interview_result')
                            ));

                            $form->field(array(
                                'type'=>'text',
                                'name'=>'final_special_instruction',
                                'label'=>'Final Special Instruction',
                                'placeholder'=>'Instruction',
                                'require'=>1,
                                'value'=>$this->saveData('final_special_instruction')
                            ));
                        ?>
                    </div>
                    <div class="col-sm-6 col-md-6 pt-5">
                        <?php
                            $form->field(array(
                                'type'=>'text',
                                'name'=>'profiled_position',
                                'label'=>'Profiled Position',
                                'placeholder'=>'Position',
                                'require'=>1,
                                'value'=>$this->saveData('profiled_position'),
                            ));

                            $form->field(array(
                                'type'=>'select',
                                'name'=>'campaign_assigned',
                                'label'=>'Campaign Assigned',
                                'require'=>1,
                                'option'=>$this->getCampaignAssignedList($this->getret['data']['campaign_assigned'] ?? "")
                            ));

                            $form->field(array(
                                'type'=>'text',
                                'name'=>'training_start',
                                'label'=>'<i class="fa fa-calendar"></i> Training Start',
                                'require'=>1,
                                'value'=>$this->saveData('training_start')
                            ));

                            $form->field(array(
                                'type'=>'text',
                                'name'=>'trainee_id',
                                'label'=>'Trainee ID',
                                'placeholder'=>'ID',
                                'require'=>1,
                                'value'=>$this->saveData('trainee_id'),
                            ));
                        ?>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-sm-6 col-md-6">
                    <h5 class="text-primary">Training Agreement</h5><br/>
                        <?php
                            $form->field(array(
                                'type'=>'text',
                                'name'=>'training_conducted_by',
                                'label'=>'Conducted By',
                                'placeholder'=>'Conducted By',
                                'require'=>1,
                                'value'=>$this->saveData('training_conducted_by'),
                            ));

                            $form->field(array(
                                'type'=>'text',
                                'name'=>'training_date',
                                'label'=>'<i class="fa fa-calendar"></i> Date',
                                'require'=>1,
                                'value'=>$this->saveData('training_date')
                            ));
                        ?>
                    </div>
                    <div class="col-sm-6 col-md-6">
                    <h5 class="text-primary">Job Offer</h5><br/>
                        <?php
                           $form->field(array(
                                'type'=>'text',
                                'name'=>'job_offer_conducted_by',
                                'label'=>'Conducted By',
                                'placeholder'=>'Conducted By',
                                'require'=>1,
                                'value'=>$this->saveData('job_offer_conducted_by'),
                            ));

                            $form->field(array(
                                'type'=>'text',
                                'name'=>'job_offer_date',
                                'label'=>'<i class="fa fa-calendar"></i> Date',
                                'require'=>1,
                                'value'=>$this->saveData('job_offer_date')
                            ));
                        ?>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-sm-6 col-md-6">
                    <h5 class="text-primary">Applicant Requirements</h5><br/>
                        <?php
                            $form->field(array(
                                'type'=>'text',
                                'name'=>'req_birthcert',
                                'label'=>'Birth Certificate',
                                'placeholder'=>'Birth Certificate',
                                'require'=>1,
                                'value'=>$this->saveData('req_birthcert'),
                            ));

                            $form->field(array(
                                'type'=>'text',
                                'name'=>'req_nbi',
                                'label'=>'NBI',
                                'placeholder'=>'NBI',
                                'require'=>1,
                                'value'=>$this->saveData('req_nbi'),
                            ));    

                            $form->field(array(
                                'type'=>'text',
                                'name'=>'req_sss',
                                'label'=>'SSS',
                                'placeholder'=>'SSS',
                                'require'=>1,
                                'value'=>$this->saveData('req_sss'),
                            ));

                            $form->field(array(
                                'type'=>'text',
                                'name'=>'req_pagibig',
                                'label'=>'Pag-ibig',
                                'placeholder'=>'Pag-ibig',
                                'require'=>1,
                                'value'=>$this->saveData('req_pagibig'),
                            ));

                            $form->field(array(
                                'type'=>'text',
                                'name'=>'req_philhealth',
                                'label'=>'Philhealth',
                                'placeholder'=>'Philhealth',
                                'require'=>1,
                                'value'=>$this->saveData('req_philhealth'),
                            ));

                            $form->field(array(
                                'type'=>'text',
                                'name'=>'req_tin',
                                'label'=>'TIN',
                                'placeholder'=>'TIN',
                                'require'=>1,
                                'value'=>$this->saveData('req_tin'),
                            ));

                            $form->field(array(
                                'type'=>'text',
                                'name'=>'req_occ_permit',
                                'label'=>'OCC Permit',
                                'placeholder'=>'OCC Permit',
                                'require'=>1,
                                'value'=>$this->saveData('req_occ_permit'),
                            ));

                            $form->field(array(
                                'type'=>'text',
                                'name'=>'req_med_health_alert',
                                'label'=>'Medical (Health Alert)',
                                'placeholder'=>'Medical',
                                'require'=>1,
                                'value'=>$this->saveData('req_med_health_alert'),
                            ));

                        ?>
                    </div>
                    <div class="col-sm-6 col-md-6 pt-4">
                        <div class="form-group mt-5">
                            <label for="package-file-select" class="bg-gray-200 p-1 rounded"><p class="text-center mb-0 font-weight-bold">Applicant Photo</p><img id="output" width="120" height="120" class="bg-gray-300"/></label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <span class="btn btn-primary btn-file">
                                        Browse Image <input type="file" name="req_picture" onchange="loadFile(event)" name="file">
                                    </span>
                                </span>
                            </div>
                        </div><hr/>
                        <?php
                           $form->field(array(
                                'type'=>'text',
                                'name'=>'req_coe',
                                'label'=>'COE',
                                'placeholder'=>'COE',
                                'require'=>1,
                                'value'=>$this->saveData('req_coe'),
                            ));

                            $form->field(array(
                                'type'=>'text',
                                'name'=>'req_tor',
                                'label'=>'TOR',
                                'placeholder'=>'TOR',
                                'require'=>1,
                                'value'=>$this->saveData('req_tor'),
                            ));

                            $form->field(array(
                                'type'=>'text',
                                'name'=>'req_diploma',
                                'label'=>'Diploma',
                                'placeholder'=>'Diploma',
                                'require'=>1,
                                'value'=>$this->saveData('req_diploma'),
                            ));

                            $form->field(array(
                                'type'=>'text',
                                'name'=>'req_dependent_birthcert',
                                'label'=>'Dependent\'s Birthcert',
                                'placeholder'=>'Birthcert',
                                'require'=>1,
                                'value'=>$this->saveData('req_dependent_birthcert'),
                            ));

                            $form->field(array(
                                'type'=>'text',
                                'name'=>'is_scanned',
                                'label'=>'Is Scanned?',
                                'placeholder'=>'',
                                'require'=>1,
                                'value'=>$this->saveData('is_scanned'),
                            ));
                        ?>
                    </div>
                </div>
                <hr/>

                <?php
                    $form->button(array(
                        'type'=>'submit',
                        'name'=>'submit',
                        'btn_class'=>'success',
                        'class'=>'float-right mt-4',
                        'label'=>'Save Information'
                    ));
                
                    $form->anchor(array(
                        'href'=>$this->getUrl().'/users',
                        'name'=>'submit',
                        'btn_class'=>'secondary',
                        'class'=>'float-right mt-4 mr-2',
                        'label'=>'Back'
                    ));
                ?>
            </form>
    </div>
</div>