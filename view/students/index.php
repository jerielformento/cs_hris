<div class="row">
	<div class="col-xl-12 col-lg-11">
	  <div class="card shadow mb-4">
		<!-- Card Header - Dropdown -->
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		  <h6 class="m-0 font-weight-bold text-gray-600"><span class="fa fa-fw fa-list fa-lg"></span> Record List</h6>
		</div>
		<!-- Card Body -->
		<div class="card-body">
            
            <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <label>Search:<input type="text" id="sr-user" class="form-control form-control-sm" placeholder=""></label>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <a href="students/add" class="btn btn-primary btn-sm float-right"><span class="fas fa-fw fa-user-graduate"></span> Add New Student</a>
                    </div>
            </div>    
            <div class="table-responsive">
                <table id="student-list-grid" class="table table-condensed table-bordered m-0" style="font-size:14px !important;"></table>
            </div>
		</div>
	  </div>
	</div>
</div>
<script type="text/javascript" src="<?php $this->getSiteUrl(); ?>/js/custom/helper.js"></script>
<script type="text/javascript" src="<?php $this->getSiteUrl(); ?>/js/custom/students.js"></script>