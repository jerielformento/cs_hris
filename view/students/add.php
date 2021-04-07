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
<div class="row">
	<div class="col-xl-12 col-lg-11">
	  <div class="card shadow mb-4">
		<!-- Card Header - Dropdown -->
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		  <h6 class="m-0 font-weight-bold text-gray-600"><span class="fas fa-fw fa-user-graduate fa-lg"></span> Add New Student</h6>
		</div>
		<!-- Card Body -->
		<div class="card-body">
            <?php $form = new \REJ\Libs\Form($this->getret); ?>
            <form method="post" action="" enctype="multipart/form-data">
                <div><?php $this->getHeaderError(); ?></div>
                <div class="row">
                
                    <div class="col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="package-file-select" class="bg-gray-400 p-1"><p class="text-center mb-0 font-weight-bold">Student Photo</p><img id="output" width="120" height="120" class="bg-gray-200"/></label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <span class="btn btn-secondary btn-file">
                                        Browse Image <input type="file" id="package-file-select" onchange="loadFile(event)" name="file">
                                    </span>
                                </span>
                            </div>
                        </div>
                        <?php
                            /*$form->button(array(
                                'type'=>'button',
                                'name'=>'submit',
                                'label'=>'Add Photo',
                                'class'=>'mt-3 mb-3',
                                'btn_class'=>'secondary'
                            ));*/

                            $form->field(array(
                                'type'=>'text',
                                'name'=>'nickname',
                                'label'=>'Nickname',
                                'placeholder'=>'Nickname',
                                'require'=>1,
                                'value'=>$this->saveData('nickname'),
                            ));

                            $form->field(array(
                                'type'=>'text',
                                'name'=>'first_name',
                                'label'=>'First Name',
                                'placeholder'=>'First Name',
                                'require'=>1,
                                'value'=>$this->saveData('first_name'),
                            ));

                            $form->field(array(
                                'type'=>'text',
                                'name'=>'middle_name',
                                'label'=>'Middle Name',
                                'placeholder'=>'Middle Name',
                                'require'=>1,
                                'value'=>$this->saveData('middle_name'),
                            ));

                            $form->field(array(
                                'type'=>'text',
                                'name'=>'last_name',
                                'label'=>'Last Name',
                                'placeholder'=>'Last Name',
                                'require'=>1,
                                'value'=>$this->saveData('last_name'),
                            ));

                            $form->field(array(
                                'type'=>'text',
                                'name'=>'birthdate',
                                'label'=>'<i class="fa fa-calendar"></i> Date of birth',
                                'require'=>1,
                                'value'=>$this->saveData('birthdate')
                            ));

                            $form->field(array(
                                'type'=>'select',
                                'name'=>'school',
                                'label'=>'School Attended',
                                'require'=>1,
                                'option'=>$this->getSchoolList( $this->getret['data']['school'] )
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
                                'name'=>'email_address',
                                'label'=>'Email Address',
                                'placeholder'=>'Email Address',
                                'require'=>1,
                                'value'=>$this->saveData('email_address'),
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
<script>
var loadFile = function(event) {
	var image = document.getElementById('output');
	image.src = URL.createObjectURL(event.target.files[0]);
};

$('input[name=birthdate]').datepicker({
    changeMonth: true, 
    changeYear: true, 
    dateFormat: "mm/dd/yy",
    yearRange: "-90:+00"
});
</script>