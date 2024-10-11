@extends('backend.project.project_view')
@section('project_content')
    <div class="row">

        <div class="d-flex justify-content-between">

            <div class="">
                <a href="{{ route('mainexpense.add.record') }}" class="btn btn-primary me-2 mb-3">
                    <i class="bx bx-plus"></i>
                    Record Expenses
                </a>
                <a href="{{ route('mainexpense.import.record') }}" class="btn btn-primary me-2 mb-3">
                    <i class='bx bx-upload'></i>
                    Import Expenses
                </a>

            </div>

            <div class="">
                <button id="expenseOpen" class="btn btn-outline-dark btn-sm">
                    <i class='bx bx-down-arrow-alt'></i>
                </button>
                <a href="" class="btn btn-outline-dark btn-sm">
                    <i class='bx bx-shape-square'></i>
                </a>
            </div>

        </div>

    </div>



    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-success">Total</p>
                    <p class="card-text text-primary fw-bold">$56</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-primary">Billable</p>
                    <p class="card-text text-primary fw-bold">$20</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-success">Non Billable</p>
                    <p class="card-text text-primary fw-bold">$20</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-primary">Not Invoiced</p>
                    <p class="card-text text-primary fw-bold">$30</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-success">Billed</p>
                    <p class="card-text text-primary fw-bold">$40</p>
                </div>
            </div>
        </div>
    </div>
    {{-- Top four card end  --}}

    <div class="row">
        <div class="col">
            <div class="card">
                <div class=" card-body">
                    <div class="expensetable">
                        <div class="d-flex justify-content-between mb-4">
                            <div class="me-2 d-flex">
                                <style>
                                    .selected {
                                        background-color: #c9d5dfd7;
                                        color: rgb(0, 0, 0)
                                    }
                                </style>
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
                                        data-bs-toggle="dropdown" aria-expanded=false>Export</button>
                                    <ul class='dropdown-menu'>
                                        <li><a class='dropdown-item' href='#'>Pdf</a></li>
                                        <li><a class='dropdown-item' href='#'>Excel</a></li>
                                    </ul>
                                </div>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-secondary me-2" data-bs-toggle="modal"
                                    data-bs-target="#expensebulkActionsModal">
                                    Bulk Actions
                                </button>
                                <!-- Adding Reset button -->
                                <button class='btn btn-outline-secondary' type='button' data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Reload"><i class='bx bx-reset'></i></button>
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
                            <table class="table mb-0 table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">Select</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Receipt</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Project</th>
                                        <th scope="col">Customer</th>
                                        <th scope="col">Invoice</th>
                                        <th scope="col">Reference#</th>
                                        <th scope="col">Payment Method</th>
                                        <th scope="col">Actions</th> <!-- Added action column header -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="checkbox" id="selectCheckbox" name="select"></td>
                                        <td><a href="" class="togglechart">Hello</a></td>
                                        <td>ew</td>
                                        <td>we</td>
                                        <td>wewe</td>
                                        <td>wew</td>
                                        <td>we</td>
                                        <td>wer</td>
                                        <td>wer</td>
                                        <td>werwer</td>
                                        <td>werwer</td>
                                        <td> <!-- Added action icons -->
                                            <a href="#" class="btn btn-primary btn-sm" title="View"><i
                                                    class='bx bx-show'></i></a>
                                            <a href="#" class="btn btn-warning btn-sm" title="Edit"><i
                                                    class='bx bx-edit'></i></a>
                                            <a href="#" class="btn btn-danger btn-sm" title="Delete"><i
                                                    class='bx bx-trash'></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
