
<div class="row">
	<div class="col-xl-12 col-lg-11">
	  <div class="card shadow mb-4">
		<!-- Card Header - Dropdown -->
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		  <h6 class="m-0 font-weight-bold text-gray-600"><span class="fa fa-fw fa-book fa-lg"></span> Add New Course</h6>
		</div>
		<!-- Card Body -->
		<div class="card-body">
            <?php $form = new \REJ\Libs\Form($this->getret); ?>
            
            <form method="post" action="">
                <div><?php $this->getHeaderError(); ?></div>
                <div class="row">
                    <div class="col-sm-5 col-md-5">
                        <?php
                            $form->field(array(
                                'type'=>'text',
                                'name'=>'course_id',
                                'label'=>'Course ID',
                                'placeholder'=>'Course ID',
                                'require'=>1,
                                'value'=>$this->saveData('course_id'),
                            ));
                        
                            $form->field(array(
                                'type'=>'select',
                                'name'=>'course_type',
                                'label'=>'Course Type',
                                'require'=>1,
                                'option'=>$this->getCourseTypesList( $this->getret['data']['course_type'] )
                            ));
                        ?>
                        
                        <div class="row">
                            <div class="col">
                                <?php
                                    $form->field(array(
                                        'type'=>'text',
                                        'name'=>'date_from',
                                        'label'=>'<i class="fa fa-calendar"></i> From',
                                        'require'=>1,
                                        'value'=>$this->saveData('date_from')
                                    ));
                                ?>
                            </div>
                            <div class="col">
                                <?php
                                    $form->field(array(
                                        'type'=>'text',
                                        'name'=>'date_to',
                                        'label'=>'<i class="fa fa-calendar"></i> To',
                                        'require'=>1,
                                        'value'=>$this->saveData('date_to')
                                    ));

                                ?>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col">
                                <?php
                                    $form->field(array(
                                        'type'=>'text',
                                        'name'=>'time_from',
                                        'label'=>'<i class="fa fa-clock"></i> From',
                                        'require'=>1,
                                        'value'=>$this->saveData('time_from')
                                    ));
                                ?>
                            </div>
                            <div class="col">
                                <?php
                                    $form->field(array(
                                        'type'=>'text',
                                        'name'=>'time_to',
                                        'label'=>'<i class="fa fa-clock"></i> To',
                                        'require'=>1,
                                        'value'=>$this->saveData('time_to')
                                    ));

                                ?>
                            </div>
                        </div>
                        
                        <?php
                            $form->field(array(
                                'type'=>'text',
                                'name'=>'tuition_fee',
                                'id'=>'tuition_fee',
                                'label'=>'Tuition Fee',
                                'require'=>1,
                                'value'=>$this->saveData('tuition_fee')
                            ));
                        
                            $form->field(array(
                                'type'=>'text',
                                'name'=>'downpayment',
                                'id'=>'downpayment',
                                'label'=>'Downpayment',
                                'require'=>1,
                                'value'=>$this->saveData('downpayment')
                            ));
                        
                            $form->field(array(
                                'type'=>'text',
                                'name'=>'handout',
                                'id'=>'handout',
                                'label'=>'Handout',
                                'require'=>1,
                                'value'=>$this->saveData('handout')
                            ));
                        
                            $form->button(array(
                                'type'=>'submit',
                                'name'=>'submit',
                                'label'=>'Save Information',
                                'class'=>'mt-3 float-right',
                                'btn_class'=>'success'
                            ));

                        ?>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        
                    </div>
                </div>
            </form>
		</div>
	  </div>
	</div>
</div>
<script type="text/javascript" src="<?php $this->getSiteUrl(); ?>/js/custom/course_form.js"></script>