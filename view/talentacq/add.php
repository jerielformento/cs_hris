<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-list"></i> Add New Record</h6>
    </div>
    <div class="card-body">
    <?php $form = new \REJ\Libs\Form($this->getret); ?>
            
            <form method="post" action="">
                <div><?php $this->getHeaderError(); ?></div>
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
                                'option'=>$this->getGenderList( $this->getret['data']['gender'])
                            ));

                            $form->field(array(
                                'type'=>'select',
                                'name'=>'civil_status',
                                'label'=>'Civil Status',
                                'require'=>1,
                                'option'=>$this->getCivilStatusList( $this->getret['data']['civil_status'])
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
                            
                        ?>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <?php 
                           
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
                    </div>
                </div>
            </form>
    </div>
</div>