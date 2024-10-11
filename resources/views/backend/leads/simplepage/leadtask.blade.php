<div class="row">
    <div class="col my-3">

        <button class="btn btn-primary"> <i class='bx bx-folder-plus'></i> New Task </button>
    </div>
</div>


<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-4">
                    <div class="me-2 d-flex">
                        <div class="me-2">
                            <select class="form-select" id="recordsPerPage">
                                <option value="5">5</option>
                                <option selected value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">Export</button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">PDF</a></li>
                                <li><a class="dropdown-item" href="#">Excel</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="search-box">
                            <input type="text" id="searchInput" class="form-control" autocomplete="off"
                                placeholder="Search...">
                            <i class="ri-search-line search-icon"></i>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="example" class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Start Date</th>
                                <th>Due Date</th>
                                <th>Assigned to</th>
                                <th>Tags</th>
                                <th>Priority</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Task 1</td>
                                <td><span class="badge bg-primary">In Progress</span></td>
                                <td>2024-06-01</td>
                                <td>2024-06-15</td>
                                <td>John Doe</td>
                                <td>Development, Design</td>
                                <td>High</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Task 2</td>
                                <td><span class="badge bg-success">Completed</span></td>
                                <td>2024-06-03</td>
                                <td>2024-06-18</td>
                                <td>Jane Smith</td>
                                <td>Marketing</td>
                                <td>Medium</td>
                            </tr>
                            <!-- Add more rows as needed -->
                        </tbody>



                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
