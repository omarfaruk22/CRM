@extends('backend.project.project_view')
@section('project_content')
    <div class="section ">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title text-success">Draft</p>
                        <p class="card-text text-primary fw-bold">$56</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title text-primary">Sent</p>
                        <p class="card-text text-primary fw-bold">$20</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title text-success">Expired</p>
                        <p class="card-text text-primary fw-bold">$20</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title text-primary">Declined</p>
                        <p class="card-text text-primary fw-bold">$30</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title text-success">Accepted</p>
                        <p class="card-text text-primary fw-bold">$40</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title text-success">Draft</p>
                        <p class="card-text text-primary fw-bold">$56</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title text-primary">Sent</p>
                        <p class="card-text text-primary fw-bold">$20</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title text-success">Expired</p>
                        <p class="card-text text-primary fw-bold">0/1 view</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title text-primary">Declined</p>
                        <p class="card-text text-primary fw-bold">0/1 View</p>
                    </div>
                </div>
            </div>
            <div class="col ">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title text-success">Accepted</p>
                        <p class="card-text text-primary fw-bold">0/1 View</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    {{-- Top four card end  --}}



    <div class="row">

        <div class="d-flex justify-content-between">
            <div class="">

            </div>
            <div class="">


                <button type="button" class="btn btn-outline-dark btn-sm mb-3" id="toggleBtn" onclick="toggleDiv()"
                    data-bs-toggle="tooltip" data-bs-placement="bottom" title="Filter By">
                    <i class="bx bx-filter-alt m-0"></i>
                </button>
                <div id="toggleDiv" class="card" style="display: none; z-index: 9999;">
                    <div class="card-body">
                        <div><a href="#">New Filter</a></div>
                        <p class="card-text">No saved filters, get started by creating a new filter.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="expensetable">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-4">
                    <div class="me-2 d-flex">
                        <div class="me-2">
                            <select class="form-select" wire:model.live="size" name="size">
                                <option value="5">5</option>
                                <option selected value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle me-2" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">Export</button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Pdf</a></li>
                                <li><a class="dropdown-item" href="#">Excel</a></li>
                            </ul>
                        </div>

                        <!-- Adding Reset button -->
                        <button class="btn btn-outline-secondary" type="button" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Reload"><i class='bx bx-repost'></i></button>
                    </div>

                    <div class="d-flex">
                        <div class="search-box">
                            <input type="text" wire:model.live="search" class="form-control" id=""
                                autocomplete="off" placeholder="Search...">
                            <i class="ri-search-line search-icon"></i>
                        </div>
                    </div>
                </div>

                <div class="table-responsive mb-3">
                    <table class="table table-bordered table-hover align-middle">
                        <thead>
                            <tr>
                                <th scope="col"># Serial</th>
                                <th scope="col">Estimate #</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Total Tax</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Project</th>
                                <th scope="col">Tags</th>
                                <th scope="col">Date</th>
                                <th scope="col">Expiry Date</th>
                                <th scope="col">Reference #</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>EST-001</td>
                                <td>$1000</td>
                                <td>$50</td>
                                <td>John Doe</td>
                                <td>Project A</td>
                                <td>Tag1, Tag2</td>
                                <td>2024-06-01</td>
                                <td>2024-07-01</td>
                                <td>REF-001</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td class="">
                                    <a>
                                        <span class="text-info mr-2"><i class='bx bx-edit-alt fs-5'></i></span>
                                    </a>
                                    <a>
                                        <i class='bx bx-trash text-danger fs-5'></i>
                                    </a>
                                </td>
                            </tr>
                            <!-- Repeat this <tr> block for each row in the table -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
