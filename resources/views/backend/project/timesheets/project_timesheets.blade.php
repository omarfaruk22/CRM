@extends('backend.project.project_view')
@section('project_content')
    {{-- create timiesheet modal  --}}
    <div class="modal fade" id="addProjecttimesheet" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Timesheet</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 py-2">
                            <label for="tags" class="form-label">Tag</label>
                            <select id="tagss" name="tags[]" class="form-select" multiple="multiple">
                                <option value="option1">Option 1</option>
                                <option value="option2">Option 2</option>
                                <option value="option3">Option 3</option>
                            </select>
                        </div>
                        <div class="col-md-12 py-2">
                            <label for="stime" class="form-label">Start Time</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-md-12 py-2">
                            <label for="stime" class="form-label">End Time</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-md-12 py-2">
                            <label for="tags" class="form-label">Task</label>
                            <select id="task" name="tags[]" class="form-select" multiple="multiple">
                                <option value="option1">Option 1</option>
                                <option value="option2">Option 2</option>
                                <option value="option3">Option 3</option>
                            </select>
                        </div>
                        <div class="col-md-12 py-2">
                            <label for="tags" class="form-label">Member</label>
                            <select id="member" name="tags[]" class="form-select" multiple="multiple">
                                <option value="option1">Option 1</option>
                                <option value="option2">Option 2</option>
                                <option value="option3">Option 3</option>
                            </select>
                        </div>
                        <div class="col-md-12 py-2">
                            <label for="note" class="form-label">Note</label>
                            <textarea class="form-control" name="note" id="" cols="10" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
    {{-- end timesheet model  --}}
    {{-- edit timiesheet modal  --}}
    <div class="modal fade" id="editProjecttimesheet" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Timesheet</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 py-2">
                            <label for="tags" class="form-label">Tag</label>
                            <select id="edittagss" name="tags[]" class="form-select" multiple="multiple">
                                <option value="option1">Option 1</option>
                                <option value="option2">Option 2</option>
                                <option value="option3">Option 3</option>
                            </select>
                        </div>
                        <div class="col-md-12 py-2">
                            <label for="stime" class="form-label">Start Time</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-md-12 py-2">
                            <label for="stime" class="form-label">End Time</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-md-12 py-2">
                            <label for="tags" class="form-label">Task</label>
                            <select id="edittask" name="tags[]" class="form-select" multiple="multiple">
                                <option value="option1">Option 1</option>
                                <option value="option2">Option 2</option>
                                <option value="option3">Option 3</option>
                            </select>
                        </div>
                        <div class="col-md-12 py-2">
                            <label for="tags" class="form-label">Member</label>
                            <select id="editmember" name="tags[]" class="form-select" multiple="multiple">
                                <option value="option1">Option 1</option>
                                <option value="option2">Option 2</option>
                                <option value="option3">Option 3</option>
                            </select>
                        </div>
                        <div class="col-md-12 py-2">
                            <label for="note" class="form-label">Note</label>
                            <textarea class="form-control" name="note" id="" cols="10" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
    {{-- end timesheet edit model  --}}
    <div class="row">

        <div class="d-flex justify-content-between mb-3">

            <div class="">
                <a href="javascript:void(0);" class="btn btn-primary " data-bs-toggle="modal"
                    data-bs-target="#addProjecttimesheet">
                    <i class="bx bx-plus"></i>
                    Timesheet
                </a>
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
                                        <input type="text" wire:model.live="search" class="form-control"
                                            id="" autocomplete="off" placeholder="Search...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive mb-3">
                                <table class="table mb-0 table-hover align-middle">
                                    <thead>
                                        <tr>
                                            <th scope="col">Member</th>
                                            <th scope="col">Task</th>
                                            <th scope="col">Timesheet Tags</th>
                                            <th scope="col">Start Date</th>
                                            <th scope="col">End Date</th>
                                            <th scope="col">Note</th>
                                            <th scope="col">Time(h)</th>
                                            <th scope="col">Time(decimal)</th>
                                            <th scope="col">Actions</th> <!-- Added action column header -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>wefgh</td>
                                            <td>wefgh</td>
                                            <td><span class="badge bg-light text-black mb-1"
                                                    style="font-size:15px; font-weight: normal;">abc</span></td>
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
