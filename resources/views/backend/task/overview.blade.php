@extends('backend.layouts.main')
@section('title', 'Tasks')
@section('content')

    <div class="row">
        <div class="d-flex justify-content-between mb-3">
            <div class="col-md-3 d-flex align-items-center">
                <a href="{{ route('tasks.inedx') }}" class="btn btn-primary me-2">
                    <i class="bx bx-plus"></i>
                    Back to task list
                </a>
                <a href="" class="btn btn-outline-dark">
                    <i class="bx bx-grid"></i>
                </a>
            </div>
            <div class="col-md-9">
                <div class="d-flex align-items-center">
                    <select class="form-select me-1" name="staff_member">
                        <option value="staff">Staff</option>
                        <option value="members">Members</option>
                    </select>

                    <select class="form-select me-1" name="month">
                        <option value="january">January</option>
                        <option value="february">February</option>

                    </select>

                    <select class="form-select me-1" name="type">
                        <option value="all">All</option>
                        <option value="member">Member</option>
                        <option value="staff">Staff</option>
                    </select>

                    <select class="form-select me-1" name="year">
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                    </select>

                    <a href="" class="btn btn-primary">
                        Filter
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
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

                                <button type="button" class="btn btn-outline-secondary me-2" data-bs-toggle="modal"
                                    data-bs-target="#expensebulkActionsModal">
                                    Bulk Actions
                                </button>

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
                                        <th scope="col">Name</th>
                                        <th scope="col">Start Date</th>
                                        <th scope="col">Due Date</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Total attachments added</th>
                                        <th scope="col">Total comments</th>
                                        <th scope="col">Checklist Items</th>
                                        <th scope="col">Total Logged Time</th>
                                        <th scope="col">Finished on time?</th>
                                        <th scope="col">Assigned to</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tasks as $task)
                                        <tr>

                                            <td>{{ $task->name }}</td>
                                            <td>2{{ $task->startdate }}</td>
                                            <td>{{ $task->duedate }}</td>
                                            <td>
                                                @if ($task->status == 0)
                                                    <span id="statusBadge" class="badge rounded-pill bg-info"> In Progress
                                                    </span>
                                                @elseif($task->status == 1)
                                                    <span id="statusBadge" class="badge rounded-pill bg-secondary">Not
                                                        Started</span>
                                                @elseif($task->status == 2)
                                                    <span id="statusBadge" class="badge rounded-pill bg-info">
                                                        Testing</span>
                                                @elseif($task->status == 3)
                                                    <span id="statusBadge" class="badge rounded-pill bg-success">
                                                        Awaiting Feedback</span>
                                                @elseif($task->status == 4)
                                                    <span id="statusBadge" class="badge rounded-pill bg-success">
                                                        Completed</span>
                                                @else
                                                    <span id="statusBadge" class="badge rounded-pill bg-danger">
                                                        Error</span>
                                                @endif
                                            </td>
                                            <td>5</td>
                                            <td>12</td>
                                            <td>7/10</td>
                                            <td>25 hours</td>
                                            <td><span class="badge bg-success">Yes</span></td>
                                            <td>Jane Smith</td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
