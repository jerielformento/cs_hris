<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-list"></i> Record list</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <div id="dataTable_filter" class="dataTables_filter">
                        <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable"></label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div id="dataTable_filter" class="dataTables_filter float-right">
                        <button class="btn btn-success btn-sm">Add New Record</button>
                    </div>
                </div>
            </div>
                
                <div class="row">
                <div class="col-sm-12">
                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 268px;">Applicant's Code</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 401px;">Full Name</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 199px;">Email</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 101px;">Age</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 189px;">Birthdate</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 173px;">Actions</th></tr>
                </thead>
                <tfoot>
                    <tr><th rowspan="1" colspan="1">Applicant's Code</th><th rowspan="1" colspan="1">Full Name</th><th rowspan="1" colspan="1">Email</th><th rowspan="1" colspan="1">Age</th><th rowspan="1" colspan="1">Birthdate</th><th rowspan="1" colspan="1">Actions</th></tr>
                </tfoot>
                <tbody>   
                    <tr role="row" class="odd">
                        <td class="sorting_1">01101120</td>
                        <td>Dela Cruz, Juan</td>
                        <td>juandelacruz@sample.com</td>
                        <td>33</td>
                        <td>1988/03/28</td>
                        <td>
                            <button class="btn btn-info"><i class="fa fa-eye"></i></button>
                            <button class="btn btn-warning"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr role="row" class="odd">
                        <td class="sorting_1">01101121</td>
                        <td>Santos, Emmanuel</td>
                        <td>emmanuel28@sample.com</td>
                        <td>27</td>
                        <td>1994/01/01</td>
                        <td>
                            <button class="btn btn-info"><i class="fa fa-eye"></i></button>
                            <button class="btn btn-warning"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                    <tr role="row" class="odd">
                        <td class="sorting_1">01101122</td>
                        <td>Sample, Sample Name</td>
                        <td>samplename@gmail.com</td>
                        <td>22</td>
                        <td>1999/03/01</td>
                        <td>
                            <button class="btn btn-info"><i class="fa fa-eye"></i></button>
                            <button class="btn btn-warning"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table></div></div>
            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1 to 10 of 3 entries</div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                        <ul class="pagination">
                            <li class="paginate_button page-item previous disabled" id="dataTable_previous">
                                <a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                            </li>
                            <li class="paginate_button page-item active">
                                <a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                            </li>
                            <li class="paginate_button page-item next" id="dataTable_next">
                            <a href="#" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>