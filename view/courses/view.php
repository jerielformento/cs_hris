
<div class="row">
	<div class="col-xl-12 col-lg-11">
	  <div class="card shadow mb-4">
		<!-- Card Header - Dropdown -->
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		  <h6 class="m-0 font-weight-bold text-gray-600"><span class="fa fa-fw fa-eye fa-lg"></span> View Course</h6>
		</div>
		<!-- Card Body -->
		<div class="card-body">
            <?php $form = new \REJ\Libs\Form($this->getret); ?>
            
            <form method="post" action="">
                <div><?php $this->getHeaderError(); ?></div>
                <div class="row">
                    <div class="col-sm-4 col-md-4">
                        <?php
                            $form->label(array(
                                'label'=>'Course ID',
                                'text'=>$this->saveData('course_id')
                            ));
                            
                            $form->label(array(
                                'label'=>'Course Type',
                                'text'=>$this->saveData('course_type')
                            ));
                        ?>
                        
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <?php
                            $form->label(array(
                                'label'=>'Date Range',
                                'text'=>$this->saveData('date_range')
                            ));

                            $form->label(array(
                                'label'=>'Time Schedule',
                                'text'=>$this->saveData('time')
                            ));
                        ?>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <?php
                            $form->label(array(
                                'label'=>'Tuition Fee',
                                'text'=>$this->saveData('tuition_fee')
                            ));

                            $form->label(array(
                                'label'=>'Downpayment',
                                'text'=>$this->saveData('downpayment')
                            ));

                            $form->label(array(
                                'label'=>'Handout',
                                'text'=>$this->saveData('handout')
                            ));
                        ?>
                    </div>
                </div>
            </form>
		</div>
	  </div>
	</div>
</div>

<div class="row">
	<div class="col-xl-12 col-lg-11">
	  <div class="card shadow mb-4">
		<!-- Card Header - Dropdown -->
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		  <h6 class="m-0 font-weight-bold text-gray-600"><span class="fa fa-fw fa-eye fa-lg"></span> Students</h6>
		</div>
		<!-- Card Body -->
		<div class="card-body">
        <div class="table-responsive">
                <div class="row p-0 m-0">
                <div class="col-sm-12 col-md-6 p-0">
                    <label>Search Student:<input type="text" id="sr-user" class="form-control form-control-sm" placeholder=""></label>
                </div>
                </div>
                

                <table id="student-list-grid" class="table table-condensed table-bordered m-0" style="font-size:14px !important;">
                <thead>
                    <tr>
                        <th class="active"><span>Student</span></th>	
                        <th class="active"><span>Amount Paid</span></th>	
                        <th class="active"><span>Balance</span></th>	
                    </tr>
                </thead>
                <tbody> 
                </tbody>
                </table>
            </div>
                           
        </div>
	  </div>
	</div>
</div>
