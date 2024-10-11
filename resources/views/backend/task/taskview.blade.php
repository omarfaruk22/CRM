@extends('backend.layouts.main')
@section('title', 'Task Show')
@section('content')
    @push('css')
        <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
        <style>
            .checkitem1 {
                border-radius: 5px;
            }

            .checkitem1:hover {
                background-color: #f8fafc;
                ;

            }

            .card-contex {
                display: none;
            }
        </style>
    @endpush

    <div class="container">
        <div class="d-flex justify-content-between mb-3">
            <div class="me-2 d-flex">
                <div class="me-2">
                    <div>

                        <strong class="taskSubject">{{ $tasks->name ?? '' }}</strong>

                    </div>

                </div>

                <div class="dropdown me-2">
                    @if (!empty($tasks) && $tasks->recurring == 1)
                        <span class="badge bg-info">Reccuring Task</span>
                    @endif


                    @if (!empty($tasks) && $tasks->status == 0)
                        <span id="statusBadge" class="badge rounded-pill bg-info"> In Progress
                        </span>
                    @elseif(!empty($tasks) && $tasks->status == 1)
                        <span id="statusBadge" class="badge rounded-pill bg-secondary">Not
                            Started</span>
                    @elseif(!empty($tasks) && $tasks->status == 2)
                        <span id="statusBadge" class="badge rounded-pill bg-info">
                            Testing</span>
                    @elseif(!empty($tasks) && $tasks->status == 3)
                        <span id="statusBadge" class="badge rounded-pill bg-success">
                            Awaiting Feedback</span>
                    @elseif(!empty($tasks) && $tasks->status == 4)
                        <span id="statusBadge" class="badge rounded-pill bg-success">
                            Completed</span>
                    @else
                        <span id="statusBadge" class="badge rounded-pill bg-danger">
                            Error</span>
                    @endif


                </div>

            </div>

        </div>
        <div class="col-md-12 make-public-div">
            @if (!empty($tasks) && $tasks->is_public == 0)
                <p>Private Task - <a href="" class="make-public-btn" data-task-id="{{ $tasks->id }}">Make
                        Public</a></p>
            @endif

        </div>


        <div class="card">
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 ps-0">
                            <div class="releted">
                                @if (!empty($tasks) && $tasks->rel_type == 'project')
                                    <strong>Related:&nbsp;</strong><a href="{{ route('projects.show', $tasks->rel_id) }}"
                                        target="_blank"><span>{{ $tasks->projects->name ?? '' }}</span></a>
                                @endif
                                @if (!empty($tasks) && $tasks->rel_type == 'invoices')
                                    <strong>Related:&nbsp;</strong><a href="#"
                                        target="_blank"><span>{{ $tasks->invoices->name ?? '' }}</span></a>
                                @endif
                                @if (!empty($tasks) && $tasks->rel_type == 'customer')
                                    <strong>Related:&nbsp;</strong><a
                                        href="{{ route('customers.profile', $tasks->rel_id) }}"
                                        target="_blank"><span>{{ $tasks->customers->company ?? '' }}</span></a>
                                @endif
                                @if (!empty($tasks) && $tasks->rel_type == 'estimate')
                                    <strong>Related:&nbsp;</strong><a href="#"
                                        target="_blank"><span>{{ $tasks->estimates->name ?? '' }}</span></a>
                                @endif
                                @if (!empty($tasks) && $tasks->rel_type == 'contract')
                                    <strong>Related:&nbsp;</strong><a href="#"
                                        target="_blank"><span>{{ $tasks->contracts->name ?? '' }}</span></a>
                                @endif
                                @if (!empty($tasks) && $tasks->rel_type == 'ticket')
                                    <strong>Related:&nbsp;</strong><a href="{{ route('support.show', $tasks->rel_id) }}"
                                        target="_blank"><span>{{ $tasks->tickets->name ?? '' }}</span></a>
                                @endif
                                @if (!empty($tasks) && $tasks->rel_type == 'expense')
                                    <strong>Related:&nbsp;</strong><a href="#"
                                        target="_blank"><span>{{ $tasks->expenses->name ?? '' }}</span></a>
                                @endif
                                @if (!empty($tasks) && $tasks->rel_type == 'leads')
                                    <strong>Related:&nbsp;</strong><a href="{{ route('leads.inedx', $tasks->rel_id) }}"
                                        target="_blank"><span>{{ $tasks->leads->name ?? '' }}</span></a>
                                @endif
                                @if (!empty($tasks) && $tasks->rel_type == 'proposal')
                                    <strong>Related:&nbsp;</strong><a
                                        href="{{ route('sales.proposals.show', $tasks->rel_id) }}"
                                        target="_blank"><span>{{ $tasks->proposals->subject ?? '' }}</span></a>
                                @endif
                            </div>
                            <div class="task_button py-2">
                                @if ($tasks->status == 4)
                                    <a href="javascript:void(0);" class="btn btn-secondary" id="statusbutton"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-original-title="Mark as complete"><span><i
                                                class='bx bx-check'></i></span></a>
                                @else
                                    <a href="javascript:void(0);" class="btn btn-primary" id="statusbutton1"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-original-title="Mark as complete"><span><i
                                                class='bx bx-check'></i></span></a>
                                @endif

                                <a href="" class="btn btn-light"data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-original-title="Statistics"><span><i class='bx bx-line-chart'></i></span></a>
                                <a href="#" class="btn btn-light" id="collapseButton" data-bs-toggle="tooltip"
                                    data-bs-placement="top" data-bs-original-title="Timesheets"
                                    data-bs-target="#flush-tasktimer" aria-expanded="false"
                                    aria-controls="flush-tasktimer "><span><i class='bx bx-spreadsheet'></i></span></a>
                                @if ($assignees->contains('id', Auth::user()->id))

                                    @if ($tasktimes)
                                        <a href="javascript:void(0);" class="btn btn-danger" data-bs-target='#timernote'
                                            data-bs-toggle="modal"><span><i class='bx bx-time'></i></span>Stop
                                            Timer</a>
                                    @else
                                        @if ($tasks->status == 4)
                                            <a href="javascript:void(0);" class="btn btn-light" disabled><span><i
                                                        class='bx bx-time'></i></span>Start
                                                Timer</a>
                                        @else
                                            <a href="javascript:void(0);" class="btn btn-success"
                                                id="starttimerbtn"><span><i class='bx bx-time'></i></span>Start
                                                Timer</a>
                                        @endif
                                    @endif
                                @else
                                    <a href="javascript:void(0);" class="btn btn-light" disabled><span><i
                                                class='bx bx-time'></i></span>Start
                                        Timer</a>
                                @endif
                                <div class="modal fade" id="timernote" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    Note
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <textarea class="form-control" id="tasktimernotes" rows="3"></textarea>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-sm btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-primary"
                                                    id="endtimerbtn">Save</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <hr>


                            <div class="p-2">

                                <div id="flush-tasktimer"
                                    class="accordion-collapse collapse  @if ($errors->any()) show @endif"
                                    aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">

                                        <div class="col-md-12  table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Member</th>
                                                        <th>Start Time</th>
                                                        <th>End Time</th>
                                                        <th>Time Spent</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $totalTime = 0;
                                                    @endphp

                                                    @foreach ($tasktimers as $tasktimer)
                                                        <tr>
                                                            @php
                                                                $times = number_format(
                                                                    \Carbon\Carbon::parse(
                                                                        $tasktimer->end_time,
                                                                    )->floatDiffInHours($tasktimer->start_time),
                                                                    2,
                                                                );

                                                                $totalTime += $times;
                                                                $formattedTime = \Carbon\CarbonInterval::hours(
                                                                    floor($times),
                                                                )
                                                                    ->minutes(($times - floor($times)) * 60)
                                                                    ->format('%H:%I');
                                                            @endphp
                                                            <td>
                                                                @if ($tasktimer->note)
                                                                    <span data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        data-bs-original-title="{{ $tasktimer->note }}"><i
                                                                            class='bx bxs-comment'></i></span>
                                                                @endif
                                                                {{ $tasktimer->timerstaff->name }}
                                                            </td>
                                                            <td>{{ $tasktimer->start_time }}</td>
                                                            <td>
                                                                @if ($tasktimer->end_time == null)
                                                                    <span href="javascript:void(0);" class="text-danger"
                                                                        data-bs-target='#timernote'
                                                                        data-bs-toggle="modal"><span><i
                                                                                class='bx bx-time'></i></span>Stop
                                                                        Timer</span>
                                                                @endif
                                                                {{ $tasktimer->end_time }}

                                                            </td>
                                                            <td>Time (h):
                                                                {{ $formattedTime }}
                                                                Time (decimal):{{ $times }}</td>
                                                            <td>
                                                                <a href="#" class="timeredit"
                                                                    data-bs-toggle="collapse"
                                                                    data-id="{{ $tasktimer->id }}"
                                                                    data-bs-target="#flush-tasktimeedit{{ $tasktimer->id }}"
                                                                    aria-expanded="false"
                                                                    aria-controls="flush-tasktimeedit{{ $tasktimer->id }}"><span
                                                                        style="font-size:18px;"><i
                                                                            class="bx bxs-edit"></i></span></a>

                                                                <a href="javascript:void(0)"
                                                                    data-bs-target='#timerdelete{{ $tasktimer->id }}'
                                                                    data-bs-toggle="modal"><span class="text-danger"
                                                                        style="font-size:18px;"><i
                                                                            class="bx bx-x"></i></span></a>
                                                                <!-- delete Modal -->
                                                                <div class="modal fade"
                                                                    id="timerdelete{{ $tasktimer->id }}" tabindex="-1"
                                                                    role="dialog" aria-labelledby="exampleModalLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="exampleModalLabel">
                                                                                    Confirmation Message
                                                                                </h5>
                                                                                <button type="button" class="btn-close"
                                                                                    data-bs-dismiss="modal"
                                                                                    aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                Are you sure want to delete this Timer?
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-bs-dismiss="modal">Close</button>
                                                                                <a href="{{ route('tasks.tasktimerdelete', $tasktimer->id) }}"
                                                                                    class="btn btn-danger">Confirm</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </td>
                                                        <tr>
                                                            <td class="task-modal-edit-timesheet " colspan="5">
                                                                <div id="flush-tasktimeedit{{ $tasktimer->id }}"
                                                                    class="accordion-collapse collapse edittimmer "
                                                                    aria-labelledby="flush-headingOne{{ $tasktimer->id }}"
                                                                    data-bs-parent="#accordionFlushExample">
                                                                    <div class="accordion-body">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <h6>Edit timesheet</h6>
                                                                                <hr>
                                                                            </div>
                                                                            <form
                                                                                action="{{ route('tasks.tasktimerUpdate', $tasktimer->id) }}"
                                                                                method="post">
                                                                                @csrf
                                                                                @method('PATCH')
                                                                                <div class="row">
                                                                                    <input type="hidden" name="task_id"
                                                                                        value="{{ $tasks->id }}">

                                                                                    <div class="col-md-6 mb-3">
                                                                                        <label for="start_time"
                                                                                            class="form-label">Start Time
                                                                                        </label>
                                                                                        <input type="datetime-local"
                                                                                            class="form-control @error('start_time') is-invalid @enderror"
                                                                                            name="start_time"
                                                                                            id="start_time"
                                                                                            value="{{ $tasktimer->start_time }}">
                                                                                        @error('start_time')
                                                                                            <small
                                                                                                class="text-danger">{{ $message }}</small>
                                                                                        @enderror
                                                                                    </div>

                                                                                    <div class="col-md-6 mb-3">
                                                                                        <label for="end_time"
                                                                                            class="form-label">End Time
                                                                                        </label>
                                                                                        <input type="datetime-local"
                                                                                            class="form-control @error('end_time') is-invalid @enderror"
                                                                                            name="end_time" id="end_time"
                                                                                            value="{{ $tasktimer->end_time }}">
                                                                                        @error('end_time')
                                                                                            <small
                                                                                                class="text-danger">{{ $message }}</small>
                                                                                        @enderror
                                                                                    </div>

                                                                                    <div class="col-md-12 mb-3">
                                                                                        <label for="staff_id"
                                                                                            class="form-label">Member
                                                                                        </label>
                                                                                        <select name="staff_id"
                                                                                            class="form-control select2"
                                                                                            id="staff_id"
                                                                                            data-placeholder="Sealect a Staff">
                                                                                            @if (!empty($assignees))
                                                                                                @foreach ($assignees as $assign)
                                                                                                    <option
                                                                                                        value="{{ $assign->id }}"{{ $assign->id == $tasktimer->staff_id ? 'selected' : '' }}>
                                                                                                        {{ $assign->name }}
                                                                                                    </option>
                                                                                                @endforeach
                                                                                            @endif

                                                                                        </select>
                                                                                    </div>

                                                                                    <div class="col-md-12 mb-3">
                                                                                        <label for="note"
                                                                                            class="form-label">Note
                                                                                        </label>
                                                                                        <textarea name="note" class="form-control" id="input11" placeholder="Note Description." rows="4">
                                                                                            {{ $tasktimer->note }}
                                                                                        </textarea>
                                                                                    </div>

                                                                                    <div class="col-md-12 mb-3 text-end">
                                                                                        <button class="btn btn-primary"
                                                                                            type="submit">Save
                                                                                        </button>
                                                                                    </div>
                                                                                </div>

                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                        @if (count($assignees) > 0)
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h6>Add timesheet</h6>
                                                    <hr>
                                                </div>
                                                <form action="{{ route('tasks.tasktimerstore') }}" method="post">
                                                    @csrf
                                                    @method('POST')
                                                    <div class="row">
                                                        <input type="hidden" name="task_id"
                                                            value="{{ $tasks->id }}">

                                                        <div class="col-md-6 mb-3">
                                                            <label for="start_time" class="form-label">Start Time
                                                            </label>
                                                            <input type="datetime-local"
                                                                class="form-control @error('start_time') is-invalid @enderror"
                                                                name="start_time" id="start_time">
                                                            @error('start_time')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>

                                                        <div class="col-md-6 mb-3">
                                                            <label for="end_time" class="form-label">End Time
                                                            </label>
                                                            <input type="datetime-local"
                                                                class="form-control @error('end_time') is-invalid @enderror"
                                                                name="end_time" id="end_time">
                                                            @error('end_time')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>

                                                        <div class="col-md-12 mb-3">
                                                            <label for="staff_id" class="form-label">Member
                                                            </label>
                                                            <select name="staff_id" class="select2" id="staff_id"
                                                                data-placeholder="Sealect a Staff">
                                                                @if (!empty($assignees))
                                                                    @foreach ($assignees as $assign)
                                                                        <option value="{{ $assign->id }}">
                                                                            {{ $assign->name }}</option>
                                                                    @endforeach
                                                                @endif

                                                            </select>
                                                        </div>

                                                        <div class="col-md-12 mb-3">
                                                            <label for="note" class="form-label">Note
                                                            </label>
                                                            <textarea name="note" class="form-control" id="input11" placeholder="Note Description." rows="4"></textarea>
                                                        </div>

                                                        <div class="col-md-12 mb-3">
                                                            @if ($tasktimes)
                                                                <span class="text-danger">Stop current started timer for
                                                                    this task to be able to add new timer manually.</span>
                                                                <div class="col-md-12 mb-3 text-end">
                                                                    <button class="btn btn-primary" disabled
                                                                        type="submit">Create
                                                                        Timer</button>
                                                                </div>
                                                            @else
                                                                <button class="btn btn-primary float-end"
                                                                    type="submit">Create
                                                                    Timer</button>
                                                            @endif
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                        @endif


                                    </div>
                                </div>
                            </div>

                            <div class="d-flex align-items-center py-2">
                                <h6>Description&nbsp;</h6>
                                <a class="mb-2" href="javascript:void(0);" id="editdes"><span><i
                                            class='bx bx-edit'></i></span></a>
                            </div>
                            <div class="message">
                                <div class="edittext">
                                    <p>{!! $tasks->description !!}</p>
                                </div>
                                <div class="d-none" id="editdestext">
                                    <textarea class="form-control editor" id="taskdescription">{!! $tasks->description !!}</textarea>
                                </div>
                            </div>
                            <hr>

                            <div class="checklist my-2">
                                <div class="template mb-3">
                                    <a href="" id="addChecklistItemButton"><span><i
                                                class='bx bxs-plus-circle'></i></span>&nbsp;Checklist
                                        Item</a>
                                    <select class="form-control select2 mt-2" name="" id=""
                                        data-placeholder="Insert Checklist Templates">
                                        <option value=""></option>
                                        <option value="1">1</option>
                                        <option value="1">1</option>
                                    </select>
                                </div>
                                <div class="d-flex justify-content-between mb-3">
                                    <p>Checklist Items</p>
                                    <a href="" class="btn btn-light">show completed items(6)</a>
                                </div>

                                <div class="progress mb-3">
                                    <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25"
                                        aria-valuemin="0" aria-valuemax="100">25%</div>
                                </div>
                                {{-- <div class="check-input mb-3">
                                    <div class="card-body checkitem1">
                                        <div class="input-group mb-3">
                                            <div class="input-group-text">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    aria-label="Checkbox for following text input">
                                            </div>
                                            <input type="text" class="form-control"
                                                aria-label="Text input with checkbox" id="checkdescription">
                                            <div class="input-group-text">
                                                <a href=""><span><i class='bx bx-user'></i></span></a>
                                            </div>
                                            <div class="input-group-text">
                                                <a href=""><span><i class='bx bx-note'></i></span></a>
                                            </div>
                                            <div class="input-group-text">
                                                <a href="" class="removeItem"><span><i
                                                            class='bx bx-x'></i></span></a>
                                            </div>
                                        </div>
                                        <div class="">
                                            <p>Completed By Dylan Hope - assingned to HOPE</p>
                                        </div>
                                    </div>
                                    <div id="checklistContainer">
                                    </div>
                                </div> --}}
                                <div id="checklistContainer">
                                </div>

                            </div>
                            <hr>
                            <div class="attechmentscomment">
                                <strong class="py-3">Attachments</strong>
                                <div class="filecard my-3 d-flex">
                                    <div class="row" id="card-row">
                                        @if (!empty($files))
                                            @foreach ($files as $file)
                                                @php
                                                    $fileNames = explode(',', $file->file_name);

                                                @endphp
                                                @foreach ($fileNames as $fileName)
                                                    <div class="col-md-6 card-contex ">
                                                        <div class="card" style="width: 17rem;">
                                                            <div class="card-body">
                                                                <div
                                                                    class="d-flex justify-content-between align-items-center">
                                                                    <div class="col-auto d-flex">
                                                                        <h6>{{ $file->created_by }}</h6>
                                                                        <p>&nbsp;-&nbsp;{{ \Carbon\Carbon::parse($file->created_at)->diffForHumans() }}
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        <a href="javascript:void(0)"
                                                                            data-bs-target='#filedelete{{ $file->id }}'
                                                                            data-bs-toggle="modal"><span
                                                                                style="font-size:20px;"><i
                                                                                    class='bx bx-x'></i></span></a>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                @php
                                                                    $fileExtension = pathinfo(
                                                                        $fileName,
                                                                        PATHINFO_EXTENSION,
                                                                    );
                                                                @endphp
                                                                @if ($fileExtension == 'pdf')
                                                                    <a href="{{ asset('upload/task/' . trim($fileName)) }}"
                                                                        target="_blank">
                                                                        <img src="{{ asset('backend/assets/pdf.png') }}"
                                                                            class="card-img-top" style="height:180px;"
                                                                            alt="...">
                                                                    </a>
                                                                @else
                                                                    <a href="{{ asset('upload/task/' . trim($fileName)) }}"
                                                                        download>
                                                                        <img src="{{ asset('upload/task/' . trim($fileName)) }} "
                                                                            class="card-img-top" style="height:180px;"
                                                                            alt="...">
                                                                    </a>
                                                                @endif

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- delete Modal -->
                                                    <div class="modal fade" id="filedelete{{ $file->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        Confirmation Message
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Are you sure want to delete this File?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <a href="{{ route('tasks.filedelete', $file->id) }}"
                                                                        class="btn btn-danger">Confirm</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <a href="#" id="show-more">Show more</a>
                                <a href="#" id="show-less" class="show-less" style="display: none;">Show
                                    less</a>
                                <hr>
                                <div class="zip">
                                    <a href="#" class="d-flex justify-content-center align-items-center">Download
                                        All(.zip)</a>
                                </div>
                                <hr>
                            </div>
                            <div class="commentsection ">
                                <a href="#"data-bs-toggle="collapse" data-bs-target="#flush-commentadd"
                                    aria-expanded="false" aria-controls="flush-commentadd"><strong>Comments</strong></a>

                                <div id="flush-commentadd" class="accordion-collapse collapse"
                                    aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">

                                        <form action="{{ route('tasks.commentstore') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden"name="taskid" value="{{ $tasks->id }}">
                                            <div class="mb-3">
                                                <label for="file_names" class="form-label">Attachments
                                                </label>
                                                <input type="file" class="form-control" name="file_names[]"
                                                    id="file_names" multiple>
                                            </div>

                                            <div class="mb-3">
                                                <label for="content" class="form-label">Comment
                                                </label>
                                                <textarea name="content" class="form-control" id="content" placeholder="Comment" rows="4"></textarea>
                                            </div>

                                            <div class="mb-3 text-end">
                                                <button class="btn btn-primary">Add Comment</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                                @foreach ($commentss as $comments)
                                    <div class="commentsat my-3" style="background: #edfaff; border-radius:5px;">
                                        <div class="row">
                                            <div class="col-md-8 py-2 d-flex">
                                                <div class="comm_img ms-3">
                                                    <img src="https://plus.unsplash.com/premium_photo-1678373454600-9af754a3c1a1?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                                        width="35" height="35" class="rounded-circle ml-2"
                                                        alt="">
                                                </div>
                                                <div class="commenttime">
                                                    <p class="m-2" style="border-bottom: 1px dashed black;">
                                                        {{ \Carbon\Carbon::parse($comments->created_at)->diffForHumans() }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="p-2 d-flex justify-content-end">
                                                    <div class="col-auto me-2">
                                                        <a href="" data-bs-toggle="collapse"
                                                            data-bs-target="#flush-commentedit" aria-expanded="false"
                                                            aria-controls="flush-commentedit"><span
                                                                style="font-size: 20px;"><i
                                                                    class='bx bxs-edit'></i></span></a>
                                                    </div>
                                                    <div class="col-auto">
                                                        <a href="javascript:void(0)"
                                                            data-bs-target='#commentdelete{{ $comments->id }}'
                                                            data-bs-toggle="modal"><span style="font-size: 20px;"><i
                                                                    class='bx bx-trash'></i></span></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="flush-commentedit" class="accordion-collapse collapse"
                                                aria-labelledby="flush-headingOne"
                                                data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body">
                                                    <div class="col p-3">
                                                        <form action="{{ route('tasks.commentupdate', $comments->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('PATCH')

                                                            <div class="mb-3">
                                                                <label for="content" class="form-label">Comment
                                                                </label>
                                                                <textarea name="content" class="form-control" id="content" rows="4">{{ $comments->content }}</textarea>
                                                            </div>

                                                            <div class="mb-3 text-end">
                                                                <button type="submit"
                                                                    class="btn btn-primary">Save</button>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <a href="#"
                                                    class="ms-3"><strong>{{ $comments->created_by }}</strong></a>
                                            </div>
                                            <div class="col-md-12">
                                                <p class="ms-3">{{ $comments->content }}</p>
                                            </div>
                                            @php
                                                $commentfiles = \App\Models\File::where(
                                                    'id',
                                                    $comments->file_id,
                                                )->first();
                                                $commentfileNames = $commentfiles
                                                    ? explode(',', $commentfiles->file_name)
                                                    : [];
                                            @endphp
                                            @if (isset($commentfileNames) && is_array($commentfileNames))
                                                @foreach ($commentfileNames as $file)
                                                    <div class="col-md-6 ps-0">
                                                        <div class="ms-2" style="width: 17rem;">
                                                            <div class="card-body">
                                                                @php
                                                                    $fileExtension = pathinfo(
                                                                        $file,
                                                                        PATHINFO_EXTENSION,
                                                                    );
                                                                @endphp
                                                                @if ($fileExtension == 'pdf')
                                                                    <a href="{{ asset('upload/task/' . trim($file)) }}"
                                                                        target="_blank">
                                                                        <img src="{{ asset('backend/assets/pdf.png') }}"
                                                                            class="card-img-top" style="height:180px;"
                                                                            alt="...">
                                                                    </a>
                                                                @else
                                                                    <a href="{{ asset('upload/task/' . trim($file)) }}"
                                                                        download>
                                                                        <img src="{{ asset('upload/task/' . trim($file)) }} "
                                                                            class="card-img-top" style="height:180px;"
                                                                            alt="...">
                                                                    </a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif

                                        </div>
                                        <hr>
                                        @if ($commentfileNames)
                                            <div class="zip mb-3">
                                                <a href="#"
                                                    class="d-flex justify-content-center align-items-center">Download
                                                    All(.zip)</a>
                                            </div>
                                        @endif
                                        <hr>
                                    </div>
                                    <!-- delete Modal -->
                                    <div class="modal fade" id="commentdelete{{ $comments->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                        Confirmation Message
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure want to delete this comment?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <a href="{{ route('tasks.commentdelete', $comments->id) }}"
                                                        class="btn btn-danger">Confirm</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                        <div class="col-md-4" style="background-color:#f8fafc;">
                            <div class="row">
                                <div class="col-md-9 py-2">
                                    <h6>Task Info</h6>
                                    <p>Created By: {{ $tasks->created_by }}<span data-bs-toggle="tooltip"
                                            data-bs-placement="top"
                                            data-bs-original-title="Created At {{ $tasks->created_at }}"> <i
                                                class='bx bx-time'></i></span></p>

                                </div>
                                <div class="col-md-3 d-flex justify-content-end p-2">
                                    <div class="dropdown">
                                        <a type="button" class=" dropdown-bs-toggle" data-bs-toggle="dropdown">
                                            <span class=""style="font-size:30px;">
                                                <i class='bx bx-dots-horizontal-rounded'></i></span>
                                        </a>
                                        <ul class="dropdown-menu">

                                            <li class="ms-2">Actions</li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="#">Edit</a></li>
                                            <li><a class="dropdown-item" href="#">Copy</a></li>
                                            <li><a class="dropdown-item" href="#">Delete</a></li>

                                        </ul>
                                    </div>

                                </div>
                            </div>
                            <hr>
                            <div class="abc d-flex">
                                <p class="me-2"><span><i class='bx bx-star'></i></span>&nbsp;Status:</p>
                                <div class="dropdown">
                                    <a class="dropdown-bs-toggle" type="button" id="dropdownMenu2"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        @if ($tasks->status == 0)
                                            <span id="statusBadge" class="badge rounded-pill bg-info"> In Progress
                                            </span>
                                        @elseif($tasks->status == 1)
                                            <span id="statusBadge" class="badge rounded-pill bg-secondary">Not
                                                Started</span>
                                        @elseif($tasks->status == 2)
                                            <span id="statusBadge" class="badge rounded-pill bg-info">
                                                Testing</span>
                                        @elseif($tasks->status == 3)
                                            <span id="statusBadge" class="badge rounded-pill bg-success">
                                                Awaiting Feedback</span>
                                        @elseif($tasks->status == 4)
                                            <span id="statusBadge" class="badge rounded-pill bg-success">
                                                Completed</span>
                                        @else
                                            <span id="statusBadge" class="badge rounded-pill bg-danger">
                                                Error</span>
                                        @endif

                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                                        <li><a class="dropdown-item" href="#"
                                                onclick="task_mark_as(0, {{ $tasks->id }}); return false;">Mark
                                                as In Progress</a></li>
                                        <li><a class="dropdown-item" href="#"
                                                onclick="task_mark_as(1, {{ $tasks->id }}); return false;">Mark
                                                as Not Start</a></li>
                                        <li><a class="dropdown-item" href="#"
                                                onclick="task_mark_as(2, {{ $tasks->id }}); return false;">Mark
                                                as Testing</a></li>
                                        <li><a class="dropdown-item" href="#"
                                                onclick="task_mark_as(3, {{ $tasks->id }}); return false;">Mark
                                                as Awaiting Feedback</a></li>
                                        <li><a class="dropdown-item" href="#"
                                                onclick="task_mark_as(4, {{ $tasks->id }}); return false;">Mark
                                                as Complete</a></li>
                                    </ul>
                                </div>
                            </div>
                            @php
                                use Carbon\Carbon;
                                $dateFinished = Carbon::parse($tasks->datefinished);

                            @endphp
                            @if (!empty($tasks) && $tasks->status == 4)
                                <div class="col my-2">
                                    <lavel class="form-lavel"><i class='bx bx-check'></i>&nbsp;Finished:&nbsp;<span
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-original-title="{{ $dateFinished }}">{{ $dateFinished->diffForHumans() }}</span>
                                    </lavel>
                                </div>
                            @endif

                            <div class="col my-2">
                                <lavel class="form-lavel"><i class='bx bx-calendar'></i>&nbsp;Start Date:</lavel>
                                @if (!empty($tasks) && $tasks->status == 4)
                                    <input type="text" class="form-control" value="{{ $tasks->startdate }}" disabled
                                        style="border: none;">
                                @else
                                    <input type="date" id="startdate" value="{{ $tasks->startdate }}"
                                        class="form-control" style="border: none;">
                                @endif
                                <input type="hidden" id="taskId" value="{{ $tasks->id }}">
                            </div>
                            <div class="col my-2">
                                <lavel class="form-lavel"><i class='bx bx-calendar-alt'></i>&nbsp;Due Date:</lavel>
                                @if (!empty($tasks) && $tasks->status == 4)
                                    <input type="text" class="form-control" value="{{ $tasks->duedate }}" disabled
                                        style="border: none;">
                                @else
                                    <input type="date" id="duedate" value="{{ $tasks->duedate }}"
                                        class="form-control" style="border: none;">
                                @endif
                            </div>
                            <div class="col my-2 d-flex">
                                <p class="me-2"><span><i class='bx bxs-zap'></i></span>&nbsp;Priority:</p>
                                @if (!empty($tasks) && $tasks->status == 4)
                                    <span id="priorityBadge" class=""> Low
                                    </span>
                                @else
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" type="button" id="dropdownMenu2"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            {{-- <span id="statusBadge"
                                                                class="badge rounded-pill bg-primary"></span> --}}
                                            @if ($tasks->priority == 1)
                                                <span id="statusBadge" class="badge rounded-pill bg-secondary"> Low
                                                </span>
                                            @elseif($tasks->priority == 2)
                                                <span id="statusBadge" class="badge rounded-pill bg-info">Medium</span>
                                            @elseif($tasks->priority == 3)
                                                <span id="statusBadge" class="badge rounded-pill bg-warning">
                                                    High</span>
                                            @elseif($tasks->priority == 4)
                                                <span id="statusBadge" class="badge rounded-pill bg-danger">
                                                    Urgent</span>
                                            @else
                                                <span id="statusBadge" class="badge rounded-pill bg-danger">
                                                    Error</span>
                                            @endif
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                                            <li><a class="dropdown-item" href="#"
                                                    onclick="task_priority_as(1, {{ $tasks->id }}); return false;">Low</a>
                                            </li>
                                            <li><a class="dropdown-item" href="#"
                                                    onclick="task_priority_as(2, {{ $tasks->id }}); return false;">Medium</a>
                                            </li>
                                            <li><a class="dropdown-item" href="#"
                                                    onclick="task_priority_as(3, {{ $tasks->id }}); return false;">High</a>
                                            </li>
                                            <li><a class="dropdown-item" href="#"
                                                    onclick="task_priority_as(4, {{ $tasks->id }}); return false;">Urgent</a>
                                            </li>
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            <div class="col my-2">
                                <lavel><i class='bx bx-time'></i>&nbsp;Hourly Rate: {{ $tasks->hourly_rate }}</lavel>
                            </div>
                            <div class="col my-2">
                                <lavel><i class='bx bxs-credit-card'></i>&nbsp;Billable: @if (!empty($tasks) && $tasks->billable == 0)
                                        <span>Not Billable</span>
                                    @else
                                        <span> Billable (not billed)</span>
                                    @endif
                                </lavel>
                            </div>
                            @php
                                $billableamt = round($totalTime * $tasks->hourly_rate) ?? 0.0;
                            @endphp
                            <div class="col my-2">
                                <lavel><i class='bx bxs-notepad'></i>&nbsp;Billable Amount:
                                    <span>{{ $billableamt }}</span>

                                </lavel>
                            </div>
                            {{-- <div class="col my-2">
                                <p><i class='bx bxs-virus'></i>&nbsp;Your logged time:<span
                                        class="text-success">&nbsp;00.00</span>
                                </p>
                            </div> --}}
                            <div class="col my-2">
                                <p><i class='bx bx-time'></i>&nbsp;Your logged time:<span
                                        class="text-success">&nbsp;{{ $totalTime }}</span></p>
                            </div>
                            <div class="col my-3">

                                <select class="form-control select2" id="taggs" data-placeholder="Tag" multiple>
                                    <option></option>
                                    @if ($tags->isNotEmpty())
                                        @foreach ($tags as $tag)
                                            <option value="{{ $tag->id }}"
                                                {{ in_array($tag->id, $taggs) ? 'selected' : '' }}>
                                                {{ $tag->tags }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                                {{-- {{ $tag->id == $tagg ? 'selected' : '' }} --}}
                            </div>
                            <hr>
                            <div class="col my-2">
                                <span><i class='bx bxs-bell-ring'></i></i>&nbsp;Reminders:</span>
                            </div>
                            {{-- acordien  --}}
                            <div class="col my-2">
                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingOne">
                                            <button class="btn btn-link collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                                aria-expanded="false" aria-controls="flush-collapseOne"
                                                style="background-image: none; padding-right: 1.25rem;">
                                                Create Reminders
                                            </button>
                                        </h2>
                                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                <form action="{{ route('tasks.reminderStore') }}" method="post">
                                                    @csrf
                                                    @method('POST')

                                                    <div class="mb-3">
                                                        <input type="hidden" name="rel_id"
                                                            value="{{ $tasks->id }}">

                                                        <label for="date" class="form-label">Date to be
                                                            notified
                                                        </label>
                                                        <input type="date" name="date" id="date"
                                                            class="form-control">
                                                        @error('date')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="staff" class="form-label">Set reminder to
                                                        </label>
                                                        <select name="staff" class="select2" id="">
                                                            <option></option>
                                                            @if ($staffs->isNotEmpty())
                                                                @foreach ($staffs as $staff)
                                                                    <option
                                                                        value="{{ $staff->id }}"{{ $staff->id == Auth::user()->id ? 'selected' : '' }}>
                                                                        {{ $staff->name }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        @error('staff')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="description" class="form-label">
                                                            Description</label>
                                                        <textarea name="description" class="form-control" id="description" placeholder=" Description." rows="4"></textarea>
                                                        @error('description')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-2">
                                                        <input class="form-check-input" name="notify_by_email"
                                                            type="checkbox" value="1" id="notify_by_email">
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            Send also an email for this reminder
                                                        </label>
                                                    </div>

                                                    <div class="mb-3 text-end">
                                                        <button class="btn btn-primary" type="submit">Create
                                                            Reminder</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        @if ($reminders->isNotEmpty())
                                            @foreach ($reminders as $reminder)
                                                <div class="p-1">

                                                    <p class="ms-1 mb-0">Reminder for {{ $reminder->users->name }} on
                                                        {{ $reminder->date }}
                                                        <a class="mb-2" type="button" data-bs-toggle="collapse"
                                                            data-bs-target="#flush-collapsetwo{{ $reminder->id }}"
                                                            aria-expanded="false"
                                                            aria-controls="flush-collapsetwo{{ $reminder->id }}"><span
                                                                style="font-size:16px"><i
                                                                    class='bx bx-edit'></i></span></a>
                                                        <a class="mb-2" href="javascript:void(0)"
                                                            data-bs-target='#delete{{ $reminder->id }}'
                                                            data-bs-toggle="modal"><span class="text-danger"
                                                                style="font-size:18px"><i class='bx bx-x'></i></span>
                                                        </a>
                                                    </p>
                                                    <p class="ms-1 ">{{ $reminder->description }}</p>
                                                    <!-- delete Modal -->
                                                    <div class="modal fade" id="delete{{ $reminder->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        Confirmation Message
                                                                    </h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Are you sure want to delete this Reminder?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <a href="{{ route('tasks.reminderdelete', $reminder->id) }}"
                                                                        class="btn btn-danger">Confirm</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div id="flush-collapsetwo{{ $reminder->id }}"
                                                    class="accordion-collapse collapse"
                                                    aria-labelledby="flush-headingOne{{ $reminder->id }}"
                                                    data-bs-parent="#accordionFlushExample">
                                                    <div class="accordion-body">
                                                        <form action="{{ route('tasks.reminderUpdate', $reminder->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('PATCH')

                                                            <div class="mb-3">
                                                                <label for="date" class="form-label">Date to
                                                                    be
                                                                    notified
                                                                </label>
                                                                <input type="date" class="form-control" name="date"
                                                                    value="{{ \Carbon\Carbon::parse($reminder->date)->format('Y-m-d') }}">
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="staff" class="form-label">Set
                                                                    reminder to
                                                                </label>
                                                                <select name="staff" class="select2" id="">
                                                                    <option></option>
                                                                    @if ($staffs->isNotEmpty())
                                                                        @foreach ($staffs as $staff)
                                                                            <option
                                                                                value="{{ $staff->id }}"{{ $staff->id == Auth::user()->id || $reminder->staff ? 'selected' : '' }}>
                                                                                {{ $staff->name }}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                                @error('staff')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="description" class="form-label">Note
                                                                    Description</label>
                                                                <textarea name="description" class="form-control" id="description1" placeholder="Description" rows="4">{{ $reminder->description }}</textarea>
                                                                @error('description')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>

                                                            <div class="mb-2">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="notify_by_email" value="1"
                                                                    id="notify_by_email1"{{ $reminder->notify_by_email == 1 ? 'chacked' : '' }}>
                                                                <label class="form-check-label" for="notify_by_email1">
                                                                    Send also an email for this reminder
                                                                </label>
                                                            </div>

                                                            <div class="mb-3 text-end">
                                                                <button class="btn btn-primary"
                                                                    type="submit">Save</button>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            @endforeach

                                        @endif
                                    </div>
                                </div>
                            </div>
                            {{-- acordien  --}}

                            <div class="col my-2">
                                <lavel class="form-lavel"><i class='bx bx-user'></i>&nbsp;<strong>Assignees</strong>
                                </lavel>
                                <select class="form-control select2 mt-3" id="assigneeid" multiple
                                    data-placeholder="Assign task to">
                                    @if (!empty($staffs))
                                        <option></option>
                                        @foreach ($staffs as $staff)
                                            <option
                                                value="{{ $staff->id }}"{{ in_array($staff->id, $assignee) ? 'selected' : '' }}>
                                                {{ $staff->name }}</option>
                                        @endforeach

                                    @endif
                                </select>

                                @if (!empty($assignees))
                                    @foreach ($assignees as $assigne)
                                        <div class="chat-user-online my-2"
                                            style="position: relative; display: inline-block;">
                                            <img src="assets/images/avatars/avatar-3.png" width="42" height="42"
                                                class="rounded-circle" style="position: relative;" alt=""
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                data-bs-original-title="{{ $assigne->name }}">
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                            <div class="col my-2">
                                <lavel class="form-lavel"><i class='bx bx-user'></i>&nbsp;<strong>Followers</strong>
                                </lavel>
                                <select class="form-control select2 " id="followersid" multiple
                                    data-placeholder="Add Followers">
                                    @if ($staffs->isNotEmpty())
                                        @foreach ($staffs as $staff)
                                            <option></option>
                                            <option
                                                value="{{ $staff->id }}"{{ in_array($staff->id, $follower) ? 'selected' : '' }}>
                                                {{ $staff->name }}</option>
                                        @endforeach

                                    @endif

                                </select>
                                @if (!empty($followers))
                                    @foreach ($followers as $follower)
                                        <div class="chat-user-online my-2"
                                            style="position: relative; display: inline-block;">
                                            <img src="assets/images/avatars/avatar-3.png" width="42" height="42"
                                                class="rounded-circle" style="position: relative;" alt=""
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                data-bs-original-title="{{ $follower->name }}">

                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="col my-2">
                                <span><i class='bx bx-file'></i>&nbsp;<strong>Attechments</strong></span>
                                <input type="file" class="form-control" multiple>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection
@push('js')
    {{-- text editor  --}}
    <script>
        ClassicEditor
            .create(document.querySelector('#commentedit'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('.editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                theme: 'default',
                width: '100%',
            });


        });
    </script>
    <script>
        $(document).ready(function() {
            $('#card-row .col-md-6:lt(2)').show();
            $('#show-more').click(function(event) {
                event.preventDefault();
                $('.card-contex').show();
                $('.show-less').show();
                $(this).hide();
            });
            $('#show-less').click(function(event) {
                event.preventDefault();
                $('#card-row .col-md-6:gt(1)').hide();
                $('#show-more').show();
                $(this).hide();
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // Handle timesheets collapse
            $('#collapseButton').on('click', function(e) {
                e.preventDefault();
                $('#flush-tasktimer').collapse('toggle');
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
            var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
                return new bootstrap.Popover(popoverTriggerEl)
            })
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.make-public-btn').on('click', function(e) {
                e.preventDefault();

                var taskId = $(this).data('task-id');
                $.ajax({
                    url: '{{ route('tasks.updatepublic') }}',
                    type: 'POST',
                    data: {
                        task_id: taskId,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.is_public == 'success') {
                            $('.make-public-div').hide();
                        } else {
                            console.log('Failed to update task status.');
                        }
                    },
                    error: function() {
                        alert('An error occurred.');
                    }
                });
            });
        });
    </script>
    {{-- this is status code  --}}
    <script>
        function task_mark_as(status, task_id) {
            $.ajax({
                url: '{{ route('tasks.status.update') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    status: status,
                    task_id: task_id
                },
                success: function(response) {
                    if (response.success) {
                        location.reload();

                    } else {
                        console.error('Failed to update status');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        }
    </script>
    <script>
        function task_priority_as(priority, task_id) {
            $.ajax({
                url: '{{ route('tasks.priority.update') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    priority: priority,
                    task_id: task_id
                },
                success: function(response) {
                    if (response.success) {

                        location.reload();

                    } else {
                        console.error('Failed to update status');
                    }
                },
                error: function(xhr, priority, error) {
                    console.error('Error:', error);
                }
            });
        }
    </script>
    <script>
        // this is startdate update 
        $(document).ready(function() {
            $('#startdate').change(function() {
                var selectedDate = $(this).val();
                var taskId = $('#taskId').val();

                $.ajax({
                    url: '{{ route('tasks.updateStartDate') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        date: selectedDate,
                        task_id: taskId
                    },
                    success: function(response) {

                    },
                    error: function(xhr) {
                        consile.log('An error occurred: ' + xhr.responseText);
                    }
                });
            });

            // this is duedate update 
            $('#duedate').change(function() {
                var selectedDate = $(this).val();
                var taskId = $('#taskId').val();

                $.ajax({
                    url: '{{ route('tasks.updateDueDate') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        date: selectedDate,
                        task_id: taskId
                    },
                    success: function(response) {

                    },
                    error: function(xhr) {
                        console.log('An error occurred: ' + xhr.responseText);
                    }
                });
            });
            // this is tag update 
            $('#taggs').change(function() {
                var selectedDate = $(this).val();
                var taskId = $('#taskId').val();

                $.ajax({
                    url: '{{ route('tasks.updatetaggs') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        tag: selectedDate,
                        task_id: taskId
                    },
                    success: function(response) {

                    },
                    error: function(xhr) {
                        console.log('An error occurred: ' + xhr.responseText);
                    }
                });
            });

        });
    </script>
    <script>
        $(document).ready(function() {

            var taskId = $('#taskId').val();

            $('#statusbutton').click(function() {
                status = 0;

                $.ajax({
                    url: '{{ route('tasks.updatetickstatus') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        status: status,
                        task_id: taskId,
                    },
                    success: function(response) {
                        location.reload();
                        console.log('Status updated successfully');
                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        console.error('Error updating status:', error);
                    }
                });
            });
            $('#statusbutton1').click(function() {

                status = 4;
                $.ajax({
                    url: '{{ route('tasks.updatetickstatus') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        status: status,
                        task_id: taskId,
                    },
                    success: function(response) {
                        location.reload();
                        console.log('Status updated successfully');
                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        console.error('Error updating status:', error);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#assigneeid').change(function() {
                var selectedval = $(this).val();
                var taskId = $('#taskId').val();
                $.ajax({
                    url: '{{ route('tasks.updateassignee') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        staff_id: selectedval,
                        task_id: taskId
                    },
                    success: function(response) {

                        location.reload();
                    },
                    error: function(xhr) {
                        consile.log('An error occurred: ' + xhr.responseText);
                    }
                });
            });

            // for followersid 
            $('#followersid').change(function() {
                var selectedval = $(this).val();
                var taskId = $('#taskId').val();
                $.ajax({
                    url: '{{ route('tasks.updatefollowers') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        staff_id: selectedval,
                        task_id: taskId
                    },
                    success: function(response) {

                        location.reload();
                    },
                    error: function(xhr) {
                        consile.log('An error occurred: ' + xhr.responseText);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.timeredit').on('click', function(event) {
                event.preventDefault();

                var targetCollapse = $(this).data('bs-target');
                $('.edittimmer').not(targetCollapse).collapse('hide');
                $(targetCollapse).collapse('toggle');

            });

        });
    </script>

    <script>
        $(document).ready(function() {
            $('#starttimerbtn').click(function() {
                var taskId = $('#taskId').val();
                $.ajax({
                    url: '{{ route('tasks.tasktimerstorebtn') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        task_id: taskId,
                    },
                    success: function(response) {

                        location.reload();
                        console.log(response);
                    },
                    error: function(xhr) {
                        consile.log('An error occurred: ' + xhr.responseText);
                    }
                });
            });
            // foer end time 
            $('#endtimerbtn').click(function() {
                var taskId = $('#taskId').val();
                var timernotes = $('#tasktimernotes').val();
                $.ajax({
                    url: '{{ route('tasks.tasktimerstopbtn') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        task_id: taskId,
                        timer_note: timernotes,
                    },
                    success: function(response) {

                        location.reload();
                        console.log(response);
                    },
                    error: function(xhr) {
                        consile.log('An error occurred: ' + xhr.responseText);
                    }
                });
            });


        });
    </script>


    <script>
        $(document).ready(function() {

            $('#editdes').click(function() {
                $("#editdestext").toggleClass("d-none");
                if ($("#editdestext").hasClass("d-none")) {
                    $(".edittext").css("display", "block");
                } else {
                    $(".edittext").css("display", "none");
                }
            });

            $('#taskdescription').change(function() {
                console.log('sss');
                var selectedval = $(this).val();

            });

        });
    </script>
    <script>
        $(document).ready(function() {
            // Function to add a new checklist item
            function addChecklistItem() {
                const newItem = ` <div class="check-input mb-3">
                <div class="card-body checkitem1">
                <div class="input-group mb-3">
                    <div class="input-group-text">
                        <input class="form-check-input" type="checkbox" value="" aria-label="Checkbox for following text input">
                    </div>
                    <input type="text" class="form-control checkdescription" id="checkdescription" aria-label="Text input with checkbox">
                       <div class="input-group-text">
                                                
                                            <div class="dropdown">
                                                <a class="dropdown-bs-toggle" type="button" id="dropdownMenu2"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                <span><i class='bx bx-user'></i></span>

                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                                                    @foreach ($staffs as $staff)
                                                        <li><a class="dropdown-item" href="#"
                                                            onclick="assigned({{ $staff->id }}); return false;">{{ $staff->name }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            </div>
                                            <div class="input-group-text">
                                                <a href=""><span><i class='bx bx-note'></i></span></a>
                                            </div>
                    <div class="input-group-text">
                        <a href="#" class="removeItem"><span><i class='bx bx-x'></i></span></a>
                    </div>
                </div>
                <div class="">
                    <p>Completed By Dylan Hope - assigned to HOPE</p>
                </div>
            </div> 
            </div>
            `;

                $('#checklistContainer').append(newItem);
            }

            // Add checklist item when button is clicked
            $('#addChecklistItemButton').on('click', function(event) {
                event.preventDefault();
                addChecklistItem();
            });

            // Remove checklist item when cross button is clicked
            $('#checklistContainer').on('click', '.removeItem', function(event) {
                event.preventDefault();
                $(this).closest('.card-body').remove();
            });
        });
    </script>
    {{-- this is check Items  --}}
    <script>
        $(document).ready(function() {
            $('#checklistContainer').on('change', '.checkdescription', function() {
                var value = $(this).val();
                var taskId = $('#taskId').val();

                $.ajax({
                    url: '{{ route('tasks.checklistsstore') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        input_value: value,
                        task_id: taskId
                    },
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(xhr) {
                        consile.log('An error occurred: ' + xhr.responseText);
                    }
                });
            });
            // show check 
            showData();

            function showData() {
                var taskId = $('#taskId').val();
                $.ajax({
                    url: '{{ route('tasks.checklistshow') }}',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        _token: '{{ csrf_token() }}',
                        task_id: taskId
                    },
                    success: function(result) {
                        $("#checklistContainer").html('');

                        $.each(result.success, function(key, item) {
                            console.log(item);
                            $("#checklistContainer").append(` <div class="check-input mb-3">
                            <div class="card-body checkitem1">
                            <div class="input-group mb-3">
                                <div class="input-group-text">
                                    <input class="form-check-input" type="checkbox" value="" aria-label="Checkbox for following text input">
                                </div>
                                <input type="text" class="form-control checkdescription" id="checkdescription"  value="${item.description}"  aria-label="Text input with checkbox">
                                <div class="input-group-text">
                                                            
                                                        <div class="dropdown">
                                                            <a class="dropdown-bs-toggle" type="button" id="dropdownMenu2"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                            <span><i class='bx bx-user'></i></span>

                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                                                                @foreach ($staffs as $staff)
                                                                    <li><a class="dropdown-item" href="#"
                                                                        onclick="assigned({{ $staff->id }}); return false;">{{ $staff->name }}</a></li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        </div>
                                                        <div class="input-group-text">
                                                            <a href=""><span><i class='bx bx-note'></i></span></a>
                                                        </div>
                                <div class="input-group-text">
                                    <a href="#" class="removeItem"><span><i class='bx bx-x'></i></span></a>
                                </div>
                            </div>
                            <div class="">
                                <p>Completed By Dylan Hope - assigned to HOPE</p>
                            </div>
                        </div> 
                        </div>
                    `);

                        });
                    }
                });
            }

        });
    </script>
@endpush
