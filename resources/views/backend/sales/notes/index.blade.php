@extends('backend.layouts.main')
@section('title', 'Project Details')
@section('content')

    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Credit Note </div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Cresit Note View</li>
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

    <div class="row">

        <div class="d-flex justify-content-between">



            <div class="rightclassbtn">
                <a href="{{ route('sales.credit.note.create') }}" class="btn btn-primary me-2 mb-3">
                    <i class="bx bx-plus"></i> New Credit Note
                </a>


            </div>




            <div class="leftclassbtn">
                <a href="#" id="supportButton" class="btn btn-outline-dark me-2 mb-3" data-bs-toggle="tooltip"
                    data-bs-placement="bottom" title="Toggle Table">
                    <i class='bx bx-left-arrow-alt'></i>
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
                        <div class="table-responsive mb-3">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Credit Note #</th>
                                        <th scope="col">Credit Note Date</th>
                                        <th scope="col">Customer</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Project</th>
                                        <th scope="col">Reference #</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Remaining Amount</th>
                                        <th scope="col">Actions</th> <!-- New column for actions -->
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>CN-002</td>
                                        <td>2024-06-09</td>
                                        <td>Jane Smith</td>
                                        <td><span class="badge bg-danger">Closed</span></td>
                                        <td>Project B</td>
                                        <td>REF-002</td>
                                        <td>$150.00</td>
                                        <td>$0.00</td>
                                        <td class="">
                                            <a href="{{ route('sales.credit.note.edit', ['id' => 1]) }}"
                                                class="btn btn-sm">
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
                                                            <h5 class="modal-title" id="deleteModalLabel">Delete Credit
                                                                Invoice
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row  ">
                                                                <div class="col">
                                                                    <h5 class="text-center ">Are you sure you want to
                                                                        delete
                                                                        this credit note ?</h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                            <form
                                                                action="{{ route('delete.credit.note.sales', ['id' => $invoiceid]) }}"
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
                                    <!-- Add more rows as needed with similar structure -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





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
