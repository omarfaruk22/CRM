@extends('backend.layouts.main')
@section('title', 'Project Details')
@section('content')
    @include('backend.sales.invoice.invoicemodal')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Sales Invoice</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Sales Invoice View</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <button type="button" class="btn btn-primary">Settings</button>
                <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                    data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                        href="javascript:;">Action</a>
                    <a class="dropdown-item" href="javascript:;">Another action</a>
                    <a class="dropdown-item" href="javascript:;">Something else here</a>
                    <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated link</a>
                </div>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->

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



    <div class="row">

        <div class="d-flex justify-content-between">
            <div class="">
                <a href="{{ route('create.invoice') }}" class="btn btn-primary me-2 mb-3">
                    <i class="bx bx-plus"></i> Create New Invoice
                </a>
                <!-- Button to trigger modal -->
                <a href="#" class="btn btn-primary me-2 mb-3" data-bs-toggle="modal"
                    data-bs-target="#batchPaymentModal">
                    <i class='bx bx-spreadsheet'></i> Batch Payment
                </a>
                <a href="{{ route('create.recurringInvoice') }}" class="btn btn-outline-secondary me-2 mb-3">
                    <i class='bx bx-repost'></i> Recurring Invoice
                </a>

            </div>
            <div class="">
                <a href="#" id="supportButton" class="btn btn-outline-dark me-2 mb-3" data-bs-toggle="tooltip"
                    data-bs-placement="bottom" title="Toggle Table">
                    <i class='bx bx-left-arrow-alt'></i>
                </a>

                <a href="#" id="supportButton" class="btn btn-outline-dark me-2 mb-3" data-bs-toggle="tooltip"
                    data-bs-placement="bottom" title="Toggle Table">
                    <i class='bx bx-sidebar'></i>
                </a>

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
        <div class="col">
            <div class="card">
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
                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">Export</button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Pdf</a></li>
                                        <li><a class="dropdown-item" href="#">Excel</a></li>
                                    </ul>
                                </div>


                            </div>
                            <div class="d-flex">
                                <div class="search-box">
                                    <input type="text" wire:model.live="search" class="form-control" id=""
                                        autocomplete="off" placeholder="Search...">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="row">
                    <div class="col">
                        <div class="mx-3 my-3">
                            <div>{{ $leads->links('vendor.livewire.bootstrap') }}</div>
                        </div>
                    </div>
                </div> --}}
                        <div class="table-responsive mb-3">
                            <table class="table  table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Invoice #</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Total Tax</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Customer</th>
                                        <th scope="col">Project</th>
                                        <th scope="col">Tags</th>
                                        <th scope="col">Due Date</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>INV-001</td>
                                        <td>$1000</td>
                                        <td>$50</td>
                                        <td>2024-06-01</td>
                                        <td>John Doe</td>
                                        <td>Project A</td>
                                        <td>Tag1, Tag2</td>
                                        <td>2024-07-01</td>
                                        <td><span class="badge bg-success">Active</span></td>
                                        <td class="">
                                            <a href="{{ route('edit.invoice.sales', ['id' => 1]) }}" class="btn btn-sm">
                                                <span class="text-info mr-2">
                                                    <i class='bx bx-edit-alt fs-5'></i>
                                                </span>
                                            </a>

                                            @php
                                                $invoiceid = 1;
                                            @endphp

                                            <!-- Delete Button -->
                                            <a href="#" class="delete-button" data-id="{{ $invoiceid }}"
                                                data-bs-toggle="modal" data-bs-target="#deletesalesInvoiceModal">
                                                <i class='bx bx-trash text-danger fs-5'></i>
                                            </a>

                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="deletesalesInvoiceModal" tabindex="-1"
                                                aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteModalLabel">Delete Invoice
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row  ">
                                                                <div class="col">
                                                                    <h5 class="text-center ">Are you sure you want to
                                                                        delete
                                                                        this invoice?</h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                            <form action="{{ route('delete.invoice.sales', ['id' => $invoiceid]) }}"
                                                                id="deleteInvoiceForm" method="POST">
                                                                @csrf
                                                                <button type="submit" id="confirmDelete"
                                                                    class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>





                                        </td>
                                    </tr>
                                    <!-- Repeat this <tr> block for each row in the table -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="batchPaymentModal" tabindex="-1" aria-labelledby="batchPaymentModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" style="min-width: 75%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="batchPaymentModalLabel">Batch Payment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body m-0 p-0">
                    <!-- First Row - Select Field -->
                    <div class="row">
                        <div class="col">
                            <div class="card m-0 p-0">
                                <div class="card-body">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="mb-3">
                                                    <label for="companyName" class="form-label">Company Name:</label>
                                                    <select class="form-select" id="companyName">
                                                        <option selected>Select Company</option>
                                                        <!-- Add options dynamically here if needed -->
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Second Row - Form with Table -->
                                        <div class="row">
                                            <div class="col">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Invoice Number #</th>
                                                                <th>Payment Date</th>
                                                                <th>Payment Mode</th>
                                                                <th>Transaction Id</th>
                                                                <th>Amount received</th>
                                                                <th>Invoice Balance Due</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><input type="text" class="form-control"
                                                                        id="invoiceNumber"
                                                                        placeholder="Enter Invoice Number"></td>
                                                                <td><input type="date" class="form-control"
                                                                        id="paymentDate"></td>
                                                                <td>
                                                                    <select class="form-select" id="paymentMode">
                                                                        <option value="bank">Bank</option>
                                                                        <option value="online">Online</option>
                                                                        <option value="cash">Cash</option>
                                                                    </select>
                                                                </td>
                                                                <td><input type="text" class="form-control"
                                                                        id="transactionId"
                                                                        placeholder="Enter Transaction ID"></td>
                                                                <td><input type="text" class="form-control"
                                                                        id="amountReceived"
                                                                        placeholder="Enter Amount Received"></td>
                                                                <td>$<span id="invoiceBalance">xxx</span></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Checkbox -->
                                        <div class="row mt-3">
                                            <div class="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="doNotSendEmail">
                                                    <label class="form-check-label" for="doNotSendEmail">
                                                        Do not send invoice payment recorded email to customer contacts
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col d-flex justify-content-end">
                                                <button type="button" class="btn btn-secondary mx-2"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>


                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Add Article Modal -->

@endsection

@push('js')
    {{-- Text editor  --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor1'))
            .catch(error => {
                console.error(error);
            });
    </script>




    {{-- Tooltips start  --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });

            tooltipTriggerList.forEach(function(tooltipTriggerEl) {
                tooltipTriggerEl.addEventListener('click', function() {
                    var tooltip = bootstrap.Tooltip.getInstance(tooltipTriggerEl);
                    tooltip.dispose();
                });
            });
        });
    </script>

    <script>
        function toggleDiv() {
            var div = document.getElementById('toggleDiv');
            if (div.style.display === 'none') {
                div.style.display = 'block';
            } else {
                div.style.display = 'none';
            }
        }
    </script>
    {{-- Tooltips end  --}}
@endpush
