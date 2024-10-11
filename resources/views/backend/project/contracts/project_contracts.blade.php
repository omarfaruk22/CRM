@extends('backend.project.project_view')
@section('project_content')
    <div class="row">

        <div class="d-flex justify-content-between mb-3">

            <div class="">

                {{-- <a href="#" class="btn btn-outline-dark ">
                    <i class='bx bx-grid'></i>
                </a> --}}
            </div>

            <div class="">

                <a href="" class="btn btn-outline-dark ">
                    <i class='bx bx-filter-alt m-0'></i>
                </a>
            </div>
        </div>

    </div>

    {{-- table Start --}}
    <div>
        {{-- Delete  modal start --}}
        @include('livewire.modal')
        {{-- Delete  modal end --}}
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class=" card-body">
                        <div class=" expensetable">
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
                                        data-bs-placement="top" title="Reload"><i class="bx bx-reset"></i></button>
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
                                            <th scope="col">Subject</th>
                                            <th scope="col">Customer</th>
                                            <th scope="col">Contract Type</th>
                                            <th scope="col">Contract Value</th>
                                            <th scope="col">Start Date</th>
                                            <th scope="col">End Date</th>
                                            <th scope="col">Signature</th>
                                            <th scope="col">Actions</th> <!-- Added action column header -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>wefgh</td>
                                            <td>wefgh</td>
                                            <td>wefgh</td>
                                            <td>wefgh</td>
                                            <td>wefgh</td>
                                            <td>wefgh</td>
                                            <td>wefgh</td>
                                            <td>
                                                <a href="javascript:void(0);" data-bs-toggle="modal"
                                                    data-bs-target="#editProjecttimesheet">
                                                    <span class="bx bx-edit fs-5"></span>
                                                </a>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#delete">
                                                    <span class="bx bx-trash text-danger fs-5"></span>
                                                </a>
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
    </div>
@endsection
