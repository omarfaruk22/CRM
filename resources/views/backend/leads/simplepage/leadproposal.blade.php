<div class="row">
    <div class="col my-3">

        <button class="btn btn-primary">New Proposal</button>
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
                                <th>Actions</th>
                                <th>Select</th>
                                <th>Proposal #</th>
                                <th>Subject</th>
                                <th>Total</th>
                                <th>Date</th>
                                <th>Open Till</th>
                                <th>Tags</th>
                                <th>Date Created</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <!-- Actions buttons -->
                                    <button>Edit</button>
                                    <button>Delete</button>
                                </td>
                                <td><input type="checkbox"></td>
                                <td>1</td>
                                <td>Project Alpha</td>
                                <td>$1000</td>
                                <td>2024-06-01</td>
                                <td>2024-06-15</td>
                                <td>Development, Design</td>
                                <td>2024-05-20</td>
                                <td>Pending</td>
                            </tr>
                            <tr>
                                <td>
                                    <!-- Actions buttons -->
                                    <button>Edit</button>
                                    <button>Delete</button>
                                </td>
                                <td><input type="checkbox"></td>
                                <td>2</td>
                                <td>Project Beta</td>
                                <td>$1500</td>
                                <td>2024-06-03</td>
                                <td>2024-06-18</td>
                                <td>Marketing</td>
                                <td>2024-05-25</td>
                                <td>Approved</td>
                            </tr>
                            <!-- Add more rows as needed -->
                        </tbody>


                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
