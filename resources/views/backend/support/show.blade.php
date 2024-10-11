@extends('backend.layouts.main')
@section('title', 'Ticket Show')
@section('content')

    @push('css')
        {{-- Text editor  --}}
        <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

        {{-- multiple select  --}}
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">

        <style>
            @media (max-width: 768px) {
                .ticketSubject {
                    display: none;
                }

                .ticket_submitter_info{
                    border: none!important;
                }
            }

            @media (max-width: 767px) {
                .col-md-auto {
                    width: 100% !important;
                }
            }
        </style>

        <style>
            .image-container {
                position: relative;
                display: inline-block;
            }

            .image-container img {
                display: block;
            }

            .delete-button {
                position: absolute;
                top: 5px;
                right: 5px;
                background-color: red;
                color: white;
                border: none;
                border-radius: 50%;
                width: 30px;
                height: 30px;
                font-size: 20px;
                line-height: 20px;
                text-align: center;
                cursor: pointer;
            }

            .delete-button:hover {
                background-color: darkred;
            }
        </style>
    @endpush


    {{-- Ticket convert to task modal start --}}
    <form action="{{ route('support.task_store_from_support') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col">
            <div class="modal fade" id="convertToTask" tabindex="-1" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add new task</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">                        
                            <div class="d-flex justify-content-between">
                                <div>
                                    <div class="d-flex">
                                        <div class="me-2">
                                            <input type="checkbox" id="is_public" name="is_public">
                                            <label for="is_public">Public</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" id="billable" name="billable" checked>
                                            <label for="billable">Billable</label>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <a href="#" class="btn" onclick="toggleAttachments();">Attach Files</a>
                                </div>
                            </div>
                            <div class="form-group" id="new-task-attachments" style="display: none">
                                <hr>
                                <label for="attachment" class="form-label">Attachment</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" name="file_name[]" id="attachment" multiple>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <hr>
                                <label for="name" class="form-label">
                                    <small class="text-danger">* </small>Subject</label>
                                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', '#'.$ticket->id.' - '.$ticket->subject) }}">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="hourly_rate" class="form-label">Hourly Rate</label>
                                <input type="number" id="hourly_rate" name="hourly_rate" class="form-control" value="{{ old('hourly_rate', 0) }}">
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="startdate" class="form-label">
                                            <small class="text-danger">*</small> Start Date</label>
                                        <input type="date" id="startdate" name="startdate" class="form-control datepicker @error('startdate') is-invalid @enderror" value="{{ old('startdate') }}">
                                        @error('startdate')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="duedate" class="form-label">Due Date</label>
                                        <input type="date" id="duedate" name="duedate" class="form-control datepicker" value="{{ old('duedate') }}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="priority" class="form-label">Priority</label>
                                        <select name="priority" class="form-select">
                                            <option value="" disabled {{ old('priority') ? '' : 'selected' }}>Select priority</option>
                                            @foreach ($ticketPriorities as $ticketPriority)
                                                <option value="{{ $ticketPriority->id }}" {{ old('priority', $ticket->priorityId) == $ticketPriority->id ? 'selected' : '' }}>{{ $ticketPriority->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="repeat_every" class="form-label">Repeat every</label>
                                        <select name="repeat_every" id="repeat_every" class="form-select" onchange="toggleCustomDiv()">
                                            <option value=""></option>
                                            <option value="1-week">Week</option>
                                            <option value="2-week">2 Weeks</option>
                                            <option value="1-month">1 Month</option>
                                            <option value="2-month">2 Months</option>
                                            <option value="3-month">3 Months</option>
                                            <option value="6-month">6 Months</option>
                                            <option value="1-year">1 Year</option>
                                            <option value="custom">Custom</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="customDiv123" class="col-md-12 mb-3" style="display: none;">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <input type="number" name="repeat_every_custom" class="form-control" min="1" value="1">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <select class="form-select" name="repeat_type_custom" id="repeat_type_custom">
                                                <option value="">Select plan</option>
                                                <option value="day">Day(s)</option>
                                                <option value="week">Week(s)</option>
                                                <option value="month">Month(s)</option>
                                                <option value="year">Year(s)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <div class="form-group recurring-cycles">
                                        <label for="cycles" class="form-label">Total Cycles</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="cycles" id="cycles" value="{{ old('cycles', 0) }}" disabled>
                                            <div class="input-group-append btn btn-outline-secondary">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="unlimited_cycles" checked onchange="toggleCyclesInput()">
                                                    <label class="form-check-label" for="unlimited_cycles">Infinity</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label for="rel_type" class="form-label">Related To</label>
                                                <select name="rel_type" id="rel_type" class="form-select">
                                                    <option value="ticket" selected>Ticket</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label for="rel_id" class="form-label">Ticket</label>
                                                <select name="rel_id" id="rel_id" class="form-select @error('rel_id') is-invalid @enderror">
                                                    @foreach ($tickets as $item)
                                                        <option value="{{ $item->id }}" {{ old('rel_id', $ticket->id) == $item->id ? 'selected' : '' }}>{{ $item->id }}# {{ $item->subject }}</option>
                                                    @endforeach
                                                </select>
                                                @error('rel_id')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" id="modalMultipleSelect">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="assignees" class="form-label">Assignees</label><br>
                                            <select id="assignees" name="assignees[]" class="form-select" multiple="multiple">
                                                @foreach ($users as $item)
                                                    <option value="{{ $item->id }}" {{ in_array($item->id, old('assignees', [$ticket->assigned])) ? 'selected' : '' }}>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="followers" class="form-label">Followers</label><br>
                                            <select id="followers" name="followers[]" class="form-select" multiple="multiple">
                                                @foreach ($users as $item)
                                                    <option value="{{ $item->id }}" {{ in_array($item->id, old('followers', [])) ? 'selected' : '' }}>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="tags" class="form-label">Tags</label><br>
                                            <select id="modalTags" name="tags[]" class="form-select" multiple="multiple">
                                                @foreach ($tagslist as $tag)
                                                    <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', [])) ? 'selected' : '' }}>{{ $tag->tags }}</option>
                                                @endforeach
                                                <option value="option1">Option 1</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Task Description</label>
                                    <textarea id="description" name="description" class="form-control">{{ old('description', $ticket->message) }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    {{-- Ticket convert to task modal end --}}


    {{-- Ticket message edit modal start  --}}
    <form action="{{ route('support.updateMessage', $ticket->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="col">
            <div class="modal fade" id="messageEdit" tabindex="-1" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="col-md-12 mb-2">	
                                <textarea id="message" name="message">{!! $ticket->message !!}</textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    {{-- Ticket message edit modal end  --}}


    {{-- Ticket Delete modal start --}}
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                
                <div class="text-end">
                    <button type="button" class="btn-close m-3" data-bs-dismiss="modal" aria-label="Close" wire:click="closeModal"></button>
                </div>

                <div class="modal-body text-center">
                    <h2>Are you sure?</h2>
                    <p>Delete this data</p>
                </div>

                <div class="text-center my-4">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="{{ route('support.delete_ticket',$ticket->id) }}" class="btn btn-danger">Confirm</a>
                </div>
            </div>
        </div>
    </div>
    {{-- Ticket Delete modal start --}}

    
    {{-- New Task modal start  --}}
    <form action="{{ route('support.task_store_from_support') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col">
            <div class="modal fade" id="newTask" tabindex="-1" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title">Add new task</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">

                            <div class="d-flex justify-content-between">
                                <div class="">
                                    <div class="d-flex">
                                        <div class="me-2">
                                            <input type="checkbox" id="new_task_is_public" name="is_public">
                                            <label for="new_task_is_public">Public</label>
                                        </div>
                                        <div class="">
                                            <input type="checkbox" id="new_task_billable" name="billable" checked="">
                                            <label for="new_task_billable">Billable</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <a href="#" class="btn" onclick="toggleAttachments3();">Attach Files</a>
                                </div>
                            </div>

                            <div class="form-group" id="new-task-attachments3" style="display: none">
                                <hr>
                                <label for="attachment" class="form-label">Attachment</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" name="file_name[]" id="attachment">
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <hr>
                                <label for="name" class="form-label">
                                <small class="text-danger">* </small>Subject</label>
                                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="hourly_rate" class="form-label">Hourly Rate</label>
                                <input type="number" id="hourly_rate" name="hourly_rate" class="form-control" value="0">
                            </div>                        

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="startdate" class="form-label"> <small class="text-danger">*</small> Start Date</label>
                                        <input type="date" id="startdate" name="startdate" class="form-control datepicker" value="">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="duedate" class="form-label">Due Date</label>
                                        <input type="date" id="duedate" name="duedate" class="form-control datepicker" value="">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="priority" class="form-label">Priority</label>
                                        <select name="priority" class="form-select">
                                            <option value="" disabled selected>Select priority</option>
                                            @if (!empty($ticketPriorities))
                                                @foreach ($ticketPriorities as $ticketPriority)
                                                    <option value="{{ $ticketPriority->id }}">{{ $ticketPriority->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="repeat_every2" class="form-label">Repeat every</label>
                                        <select name="repeat_every" id="repeat_every2" class="form-select" onchange="toggleCustomDiv2()">
                                            <option value="">Select option</option>
                                            <option value="1-week">Week</option>
                                            <option value="2-week">2 Weeks</option>
                                            <option value="1-month">1 Month</option>
                                            <option value="2-month">2 Months</option>
                                            <option value="3-month">3 Months</option>
                                            <option value="6-month">6 Months</option>
                                            <option value="1-year">1 Year</option>
                                            <option value="custom">Custom</option>
                                        </select>
                                    </div>
                                </div>

                                <div id="customDiv2" class="col-md-12 mb-3" style="display: none;">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <input type="number" name="repeat_every_custom" class="form-control" min="1" value="1">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <select class="form-select" name="repeat_type_custom" id="repeat_type_custom"
                                                data-placeholder="Choose one thing">
                                                <option value="">Select plan</option>
                                                <option value="day">Day(s)</option>
                                                <option value="week">Week(s)</option>
                                                <option value="month">Month(s)</option>
                                                <option value="year">Year(s)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <div class="form-group recurring-cycles">
                                        <label for="cycles" class="form-label">Total Cycles</label>
                                        <div class="input-group ">
                                            <input type="number" class="form-control" disabled name="cycles" id="cycles3" value="0">
                                            <div class="input-group-append btn btn-outline-secondary">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" checked id="unlimited_cycles3" onchange="toggleCyclesInput3()">
                                                    <label class="form-check-label" for="unlimited_cycles">Infinity</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="row">

                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label for="rel_type" class="form-label">Related To</label>
                                                <select name="rel_type" id="rel_type" class="form-select">
                                                    <option value="ticket" selected>Ticket</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label for="rel_id" class="form-label">Ticket</label>
                                                <select name="rel_id" id="rel_id" class="form-select">
                                                    @if (!empty($tickets))
                                                        @foreach ($tickets as $item)
                                                            <option value="{{ $item ->id }}" {{ $ticket->id == $item->id ? 'selected' : '' }}>{{ $item ->id }}# {{ $item ->subject }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-12" id="newTaskModalMultipleSelect">
                                    <div class="row">

                                        <div class="col-md-6 mb-3">
                                            <label for="newTaskAssignees" class="form-label">Assignees</label><br>
                                            <select id="newTaskAssignees" name="assignees[]" class="form-select" multiple="multiple">
                                                @if (!empty($users))
                                                    @foreach ($users as $item)
                                                        <option value="{{ $item ->id }}">{{ $item ->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        
                                        <div class="col-md-6 mb-3">
                                            <label for="newTaskFollowers" class="form-label">Followers</label><br>
                                            <select id="newTaskFollowers" name="followers[]" class="form-select" multiple="multiple">
                                                @if (!empty($users))
                                                    @foreach ($users as $item)
                                                        <option value="{{ $item ->id }}">{{ $item ->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="newTaskModalTags" class="form-label">Tags</label><br>
                                            <select id="newTaskModalTags" name="tags[]" class="form-select" multiple="multiple">
                                                @if (!empty($tagslist))
                                                    @foreach ($tagslist as $tag)
                                                        <option value="{{ $tag->id }}">{{ $tag->tags }}</option>
                                                    @endforeach
                                                @endif
                                                <option value="option1">Option 1</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Task Description</label>								
                                    <textarea id="newTaskDescription" name="description"></textarea>
                                </div>

                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    {{-- New Task modal start  --}}


    {{-- Topbar start  --}}
    <div class="d-flex justify-content-between mb-1">
        <div class="me-2 d-flex">
            <div class="me-2">
                <div class="chip bg-secondary text-white">
                    <span style="border: 1px solid rgb(248, 245, 245); border-radius: 50%; padding:2px 5px 2px 5px;">{{ $ticket->id }}</span>
                    <strong class="ticketSubject">{{ $ticket->subject }}</strong>
                </div>
            </div>
            @if (!empty($ticketStatuses))
                <div class="dropdown me-2">
                    <div class="chip">
                        @foreach ($ticketStatuses as $status)
                            @if ($ticket->statusId == $status->id)
                                {{ $status->name }} 
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
        <div class="">
            <select class="form-select" name="statusId" id="update-ticket-status" data-placeholder="Choose one thing">
                <option disabled selected>Select Status</option>
                @if (!empty($ticketStatuses))
                    @foreach ($ticketStatuses as $status)
                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>
    {{-- Topbar end  --}}


    {{-- Buttons start  --}}
    <div class="card card-body pb-0">
        <ul class="nav nav-pills mb-3" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" data-bs-toggle="pill" href="#add-replay" role="tab" aria-selected="true">
                    <div class="d-flex align-items-center">
                        <div class="tab-icon"><i class="bx bx-message-add font-18 me-1"></i></div>
                        <div class="tab-title">Add Replay</div>
                    </div>
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" data-bs-toggle="pill" href="#add-note" role="tab" aria-selected="false" tabindex="-1">
                    <div class="d-flex align-items-center">
                        <div class="tab-icon"><i class="bx bx-note font-18 me-1"></i></div>
                        <div class="tab-title">Add Note</div>
                    </div>
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" data-bs-toggle="pill" href="#reminders" role="tab" aria-selected="false" tabindex="-1">
                    <div class="d-flex align-items-center">
                        <div class="tab-icon"><i class="bx bx-bell font-18 me-1"></i></div>
                        <div class="tab-title">Reminders</div>
                    </div>
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" data-bs-toggle="pill" href="#other-tickets" role="tab" aria-selected="false" tabindex="-1">
                    <div class="d-flex align-items-center">
                        <div class="tab-icon"><i class="bx bx-receipt font-18 me-1"></i></div>
                        <div class="tab-title">Other Tickets</div>
                    </div>
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" data-bs-toggle="pill" href="#tasks" role="tab" aria-selected="false" tabindex="-1">
                    <div class="d-flex align-items-center">
                        <div class="tab-icon"><i class="bx bx-task font-18 me-1"></i></div>
                        <div class="tab-title">Tasks</div>
                    </div>
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" data-bs-toggle="pill" href="#settings" role="tab" aria-selected="false" tabindex="-1">
                    <div class="d-flex align-items-center">
                        <div class="tab-icon"><i class="bx bx-cog font-18 me-1"></i></div>
                        <div class="tab-title">Settings</div>
                    </div>
                </a>
            </li>
        </ul>
    </div>
    {{-- Buttons end  --}}


    {{-- Button body start  --}}
    <div class="card">
        <div class="card-body">

            <div class="tab-content" id="pills-tabContent">

                {{-- Add Replay start  --}}
                    <div class="tab-pane fade show active" id="add-replay" role="tabpanel">
                        <form action="{{ route('support.add_replay',$ticket->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="row">

                                <div class="col-md-12 mb-3">
                                    @if (!empty($ticket->tags))
                                        <p><i class="fa fa-tag" aria-hidden="true"></i> Tags:</p>
                                        @php
                                            $tagIds = explode(',', $ticket->tags);
                                        @endphp
                                        @foreach ($tagIds as $tagId)
                                            @php $tag = DB::table('tags')->where('id', $tagId)->first(); @endphp
                                            @if ($tag)
                                                <span class="chip">
                                                    {{ $tag->tags }}
                                                </span>
                                            @endif
                                        @endforeach
                                    @endif
                                    <hr>
                                </div>

                                @if (!empty($notes))
                                <div class="col-md-12 mb-3">
                                    <h4 class="">Private Staff Notes</h4>
                                    @foreach ($notes as $note)
                                        <div class="card-body">
                                            <div class="d-flex align-items-center">
                                                <img src="assets/images/avatars/avatar-1.png" class="rounded-circle p-1 border" width="60" height="60" alt="...">
                                                <div class="flex-grow-1 ms-3">
                                                    <strong class="mt-0">
                                                        Ticket note by {{ $note->created_by }}
                                                    </strong>
                                                    <p class="mb-0">
                                                        <strong>Note added: </strong>{{ $note->created_at }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <hr>
                                </div>
                                @endif

                                <div class="col-md-12 my-3">
                                    <div class="row">
                                        <!-- Delete Button -->
                                        <div class="col-md-auto mb-3">
                                            <a href="#" class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#delete">
                                                <span class="bx bx-trash text-danger fs-5"></span>
                                            </a>
                                        </div>
                                        <!-- Priority -->
                                        <div class="col-md-auto mb-3"> 
                                            <a class="btn btn-secondary">
                                                <strong class="text-light">Priority: </strong>
                                                @php
                                                    $priorities = DB::table('priorities')->where('id', $ticket->priorityId)->get();
                                                @endphp
                                                @if ($priorities->isNotEmpty())
                                                    @foreach ($priorities as $priority)
                                                        <span class="text-light">{{ $priority->name }}</span>
                                                    @endforeach
                                                @endif
                                            </a>
                                        </div>
                                        <!-- Service -->
                                        <div class="col-md-auto mb-3"> <!-- Added inline style -->
                                            <a class="btn btn-secondary">
                                                <strong class="text-light">Service: </strong>
                                                @php
                                                    $services = DB::table('services')->where('id', $ticket->serviceId)->get();
                                                @endphp
                                                @if ($services->isNotEmpty())
                                                    @foreach ($services as $service)
                                                        <span class="text-light">{{ $service->name }}</span>
                                                    @endforeach
                                                @endif
                                            </a>
                                        </div>
                                        <!-- Department -->
                                        <div class="col-md-auto mb-3"> <!-- Added inline style -->
                                            <a class="btn btn-secondary">
                                                <strong class="text-light">Department: </strong>
                                                @php
                                                    $departments = DB::table('departments')->where('id', $ticket->departmentid)->get();
                                                @endphp
                                                @if ($departments->isNotEmpty())
                                                    @foreach ($departments as $department)
                                                        <span class="text-light">{{ $department->name }}</span>
                                                    @endforeach
                                                @endif
                                            </a>
                                        </div>
                                        <!-- Assigned Staff -->
                                        <div class="col-md-auto mb-3"> 
                                            <a class="btn btn-secondary">
                                                <strong class="text-light">Assigned: </strong>
                                                @php
                                                    $staffs = DB::table('staff')->where('id', $ticket->assigned)->get();
                                                @endphp
                                                @if ($staffs->isNotEmpty())
                                                    @foreach ($staffs as $staff)
                                                        <span class="text-light">{{ $staff->firstname.' '.$staff->lastname }}</span>
                                                    @endforeach
                                                @endif
                                            </a>
                                        </div>

                                        <!-- View Public Form -->
                                        <div class="col-md-auto mb-3"> 
                                            <a href="{{ route('support.view_public_form', $ticket->id) }}" class="text-white btn btn-secondary"> 
                                                <span class="text-white">View Public Form</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <select class="form-select" id="predefinedReplay" name="" onchange="updateDescription(); toggleTextArea();">
                                                @if ($predefinedReplies->isNotEmpty())
                                                    <option selected disabled value="">Insert predefined reply</option>
                                                    @foreach ($predefinedReplies as $predefinedReply)
                                                        <option value="{{ $predefinedReply->id }}">{{ $predefinedReply->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            {{-- Hidden input for "Insert predefined reply"--}}
                                            <input type="hidden" id="selectedOptionIndex" name="selectedOptionIndex">
                                        </div>

                                        <div class="col-md-6">
                                            <select class="form-select" id="knowledgeBaseLink" name="knowledgeBase" onchange="updateDescription(); toggleTextArea();">
                                                <option selected disabled value="">Insert knowledge base link</option>
                                                @if ($knowledgeBaseLinks->isNotEmpty())
                                                    @foreach ($knowledgeBaseLinks as $knowledgeBaseLink)
                                                        <option value="{{ $knowledgeBaseLink->id }}">{{ $knowledgeBaseLink->subject }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            {{-- Hidden input for "Insert knowledge base link" --}}
                                            <input type="hidden" id="selectedKnowledgeBaseIndex" name="selectedKnowledgeBaseIndex">
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">Description for pre-define replay</label>
                                            <div style="display:block;" id="textEditorDiv">
                                                <textarea class="descriptionContainer" id="editor1" name="message1"></textarea><br>
                                            </div>
                                            <div style="display:none;" id="normalTextAreaDiv">
                                                <textarea name="message2" id="messageContainer" class="form-control" cols="50" rows="10"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="single-select-clear-field" class="form-label">Change Status</label>
                                    <select class="form-select" id="single-select-clear-field" data-placeholder="Choose one thing">
                                        <option disabled selected>Select status</option>
                                        @if ($ticketStatuses->isNotEmpty())
                                            @foreach ($ticketStatuses as $ticketStatus)
                                                <option value="{{ $ticketStatus->value }}" {{ ($ticket->statusId == $ticketStatus->id) ? 'selected' : '' }}>
                                                    {{ $ticketStatus->name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="cc" class="form-label">CC</label>
                                    <input type="text" id="cc" name="cc" class="form-control" value="{{ $ticket->cc }}">
                                </div>

                                <div class="">
                                    <hr>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="file_name" class="form-label">Attachment</label>
                                    <input type="file" name="file_name[]" class="form-control" id="file_name" multiple>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Add Replay</button>
                                </div>
                            </div>
                        </form>
                    </div>
                {{-- Add Replay end  --}}


                {{-- Add note start  --}}
                <div class="tab-pane fade" id="add-note" role="tabpanel">
                    <form action="{{ route('support.add_note', $ticket->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <label for="note" class="form-label">Note</label>
                            <textarea class="form-control mb-3" id="note" name="description" placeholder="Add note ..." rows="3" required=""></textarea>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Add Note</button>
                        </div>
                    </form>
                </div>
                {{-- Add note end  --}}


                {{-- Reminder start  --}}
                <div class="tab-pane fade" id="reminders" role="tabpanel">
                    <livewire:backend.support.reminders :ticketId="$ticket->id"/>
                </div>
                {{-- Reminder end  --}}


                {{-- Other tickets start  --}}
                <div class="tab-pane fade" id="other-tickets" role="tabpanel">
                    <livewire:backend.support.other-tickets :ticketId="$ticket->id"/>
                </div>
                {{-- Other tickets end  --}}


                {{-- Task start  --}}
                <div class="tab-pane fade" id="tasks" role="tabpanel">
                    <livewire:backend.support.support-tasks :ticketId="$ticket->id"/>
                </div>
                {{-- Task end  --}}


                {{-- Setting start  --}}
                <div class="tab-pane fade" id="settings" role="tabpanel">
                    <form action="{{ route('support.update_ticket',$ticket->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="subject" class="form-label">Subject</label>
                                        <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror" id="subject" value="{{ $ticket->subject }}">
                                        @error('subject')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="contactid" class="form-label">Contact</label>
                                        <select class="form-select @error('contactid') is-invalid @enderror" name="contactid" id="contactid">
                                            @if ($allContact->isNotEmpty())
                                                @foreach ($allContact as $contact)
                                                    <option value="{{ $contact->id }}" {{ $contact->id == $ticket->contactid ? 'selected' : '' }}>
                                                        {{ $contact->firstname . ' ' . $contact->lastname }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('contactid')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ $ticket->name }}" disabled>
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="email" class="form-label">Email address</label>
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp" value="{{ $ticket->email }}" disabled>
                                        <span id="emailHelp" class="form-text">We'll never share your email with anyone else.</span>
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="departmentid" class="form-label">Department</label>
                                        <select class="form-select @error('departmentid') is-invalid @enderror" name="departmentid" id="departmentid">
                                            @if ($allDepartment->isNotEmpty())
                                                @foreach ($allDepartment as $department)
                                                    <option value="{{ $department->id}}" {{ $department->id == $ticket->departmentid ? 'selected' : ''}}>{{ $department->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('departmentid')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="tags" class="form-label"><i class='bx bx-purchase-tag-alt'></i> Tags</label><br>
                                        <select id="settingTag" class="form-select" multiple="multiple" name="tags[]">
                                            @if (!empty($tagNames))
                                                @php $tagIds = explode(',', $ticket->tags); @endphp
                                                @foreach ($tagNames as $tag)
                                                    @if (!empty($tagIds))
                                                        @foreach ($tagIds as $tagId)
                                                            <option value="{{ $tag->id }}" {{ ($tag->id == $tagId) ? 'selected' : ''}}>{{ $tag->tags  }}</option>
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="assigned" class="form-label">Assign ticket (default is current user)</label>
                                        <select class="form-select" id="assigned" name="assigned">
                                            @if ($allStaff->isNotEmpty())
                                                @php $staffIds = $ticket->assigned; @endphp
                                                @foreach ($allStaff as $staff)
                                                    <option value="{{ $staff->id }}" {{ ($staff->id == $staffIds) ? 'selected' : '' }}>{{ $staff->firstname . ' ' . $staff->lastname }}</option>
                                                @endforeach
                                            @else
                                                <option value="" selected>No users available</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="priorityId" class="form-label">Priority</label>
                                        <select class="form-control @error('priorityId') is-invalid @enderror" id="priorityId" name="priorityId">
                                            @if ($allPriority->isNotEmpty())
                                                @foreach ($allPriority as $priority)
                                                    <option value="{{ $priority->id}}" {{ ($priority->id == $ticket->priorityId) ? 'selected' : '' }}>{{ $priority->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('priorityId')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="serviceId" class="form-label">Service</label>
                                        <select class="form-control @error('serviceId') is-invalid @enderror" id="serviceId" name="serviceId">
                                            @if ($allService->isNotEmpty())
                                                @foreach ($allService as $service)
                                                    <option value="{{ $service->id}}" {{ ($service->id == $ticket->serviceId) ? 'selected' : '' }}>{{ $service->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('serviceId')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="projectId" class="form-label">Project</label>
                                        <div class="">
                                            <select name="projectId" id="projectId" class="form-select">
                                                @if (!empty($allProject))
                                                    @foreach ($allProject as $project)
                                                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="merge_ticket_ids" class="form-label">Merge Ticket #</label>
                                        <input type="text" id="merge_ticket_ids" name="merge_ticket_ids" class="form-control" placeholder="example: 5 or 5,6" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- Setting end  --}}

            </div>
        </div>
    </div>
    {{-- Button body end  --}}


    {{-- Show ticket message start  --}}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <p><a href="{{ route('admin_profile', 1) }}">{{$ticket->created_by}}</a></p>
                    <p class="text-muted">Staff</p>
                    <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#convertToTask">Convert to task</button>
                </div>
                <div class="col-md-8 ticket_submitter_info" style="border-left: 1px solid gray;">
                    <div class="text-end mb-3">
                        <a href="{{route('support.print_message',$ticket->id)}}" class="font-22 text-primary">	<i class="lni lni-printer"></i></a>
                        <a href="#" class="font-22 text-primary" data-bs-toggle="modal" data-bs-target="#messageEdit">
                            <i class="fadeIn animated bx bx-edit"></i>
                        </a>
                    </div>
                    <div class="mb-3">{!! $ticket->message !!}</div>
                    <div class="mb-3">
                        @if (!empty($ticket->id))
                            @php
                                $attachment = DB::table('ticket_attachments')->where('ticketid',$ticket->id)->first();
                            @endphp
                            @if (!empty($attachment))
                                <div class="image-container">
                                    @if (!empty($attachment->file_name))
                                        <img src="{{ asset('uploads/' . $attachment->file_name) }}" alt="Image" height="160" width="240">
                                        <a href="{{ route('support.delete_attachment',$ticket->id) }}" class="delete-button" style="padding-top: 3px;">&times;</a>
                                    @endif
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Show ticket message end  --}}


    {{-- Show added replay start  --}}
    @if (count($ticketReplies) > 0)
        @foreach ($ticketReplies as $ticketReply)
            @if ($ticketReply->ticketid == $ticket->id)

                {{-- Replay Delete modal start --}}
                <div class="modal fade" id="deleteReplay{{ $ticketReply->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{ $ticketReply->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="text-end">
                                <button type="button" class="btn-close m-3" data-bs-dismiss="modal" aria-label="Close" wire:click="closeModal"></button>
                            </div>
                            <div class="modal-body text-center">
                                <h5>Are you sure want to delete Replay?</h5>
                            </div>
                            <form wire:submit.prevent="destroy">
                                <div class="text-center my-4">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <a href="{{ route('support.delete_replay',$ticketReply->id) }}" class="btn btn-danger">Confirm</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- Replay Delete modal end --}}

                {{-- Replay message edit modal start  --}}
                <form action="{{ route('support.updateReplayMessage',$ticketReply->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="col">
                        <div class="modal fade" id="ReplayMessageEdit{{ $ticketReply->id }}" tabindex="-1" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col-md-12 mb-2">    
                                            <textarea id="replayMessage{{ $ticketReply->id }}" name="message">{!! $ticketReply->message !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                {{-- Replay message edit modal end  --}}

                {{-- Replay convert to task modal start  --}}
                <form action="{{ route('support.task_store_from_support_replay') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col">
                        <div class="modal fade" id="replayConvertToTask{{ $ticketReply->id }}" tabindex="-1" aria-hidden="true" @if(session('openModal') == 'replayConvertToTask' . $ticketReply->id) style="display: block;" @endif>
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Add new task</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="d-flex justify-content-between">
                                            <div class="">
                                                <div class="d-flex">
                                                    <div class="me-2">
                                                        <input type="checkbox" id="is_public2" name="is_public">
                                                        <label for="is_public2">Public</label>
                                                    </div>
                                                    <div class="">
                                                        <input type="checkbox" id="billable2" name="billable" checked="">
                                                        <label for="billable2">Billable</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="">
                                                <a href="#" class="btn" onclick="toggleAttachments2();">Attach Files</a>
                                            </div>
                                        </div>

                                        <div class="form-group" id="new-task-attachments2" style="display: none">
                                            <hr>
                                            <label for="attachment" class="form-label">Attachment</label>
                                            <div class="input-group">
                                                <input type="file" class="form-control" name="file_name[]" id="attachment">
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <hr>
                                            <label for="name" class="form-label">
                                                <small class="text-danger">* </small>Subject</label>
                                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', '#'.$ticket->id.' - '.$ticket->subject) }}">
                                            @error('name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="hourly_rate" class="form-label">Hourly Rate</label>
                                            <input type="number" id="hourly_rate" name="hourly_rate" class="form-control" value="{{ old('hourly_rate', 0) }}">
                                        </div>                        

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label for="startdate" class="form-label"> <small class="text-danger">*</small> Start Date</label>
                                                    <input type="date" id="startdate" name="startdate" class="form-control datepicker @error('startdate') is-invalid @enderror" value="{{ old('startdate') }}">
                                                </div>
                                                @error('startdate')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label for="duedate" class="form-label">Due Date</label>
                                                    <input type="date" id="duedate" name="duedate" class="form-control datepicker" value="{{ old('duedate') }}">
                                                </div>
                                                @error('duedate')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label for="priority" class="form-label">Priority</label>
                                                    <select name="priority" class="form-select">
                                                        <option value="" disabled selected>Select priority</option>
                                                        @if (!@empty($ticketPriorities))
                                                            @foreach ($ticketPriorities as $ticketPriority)
                                                                <option value="{{ $ticketPriority->id }}" {{ old('priority', $ticket->priorityId) == $ticketPriority->id ? 'selected' : '' }}>{{ $ticketPriority->name }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                                @error('priority')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <div class="form-group">
                                                    <label for="repeat_every3" class="form-label">Repeat every</label>
                                                    <select name="repeat_every" id="repeat_every3" class="form-select" onchange="toggleCustomDiv3()">
                                                        <option value=""></option>
                                                        <option value="1-week" {{ old('repeat_every') == '1-week' ? 'selected' : '' }}>Week</option>
                                                        <option value="2-week" {{ old('repeat_every') == '2-week' ? 'selected' : '' }}>2 Weeks</option>
                                                        <option value="1-month" {{ old('repeat_every') == '1-month' ? 'selected' : '' }}>1 Month</option>
                                                        <option value="2-month" {{ old('repeat_every') == '2-month' ? 'selected' : '' }}>2 Months</option>
                                                        <option value="3-month" {{ old('repeat_every') == '3-month' ? 'selected' : '' }}>3 Months</option>
                                                        <option value="6-month" {{ old('repeat_every') == '6-month' ? 'selected' : '' }}>6 Months</option>
                                                        <option value="1-year" {{ old('repeat_every') == '1-year' ? 'selected' : '' }}>1 Year</option>
                                                        <option value="custom" {{ old('repeat_every') == 'custom' ? 'selected' : '' }}>Custom</option>
                                                    </select>
                                                </div>
                                                @error('repeat_every')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div id="customDiv3" class="col-md-12 mb-3" style="display: {{ old('repeat_every') == 'custom' ? 'block' : 'none' }};">
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <div class="form-group">
                                                            <input type="number" name="repeat_every_custom" class="form-control" min="1" value="{{ old('repeat_every_custom', 1) }}">
                                                        </div>
                                                        @error('repeat_every_custom')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <select class="form-select" name="repeat_type_custom" id="repeat_type_custom" data-placeholder="Choose one thing">
                                                            <option value="">Select plan</option>
                                                            <option value="day" {{ old('repeat_type_custom') == 'day' ? 'selected' : '' }}>Day(s)</option>
                                                            <option value="week" {{ old('repeat_type_custom') == 'week' ? 'selected' : '' }}>Week(s)</option>
                                                            <option value="month" {{ old('repeat_type_custom') == 'month' ? 'selected' : '' }}>Month(s)</option>
                                                            <option value="year" {{ old('repeat_type_custom') == 'year' ? 'selected' : '' }}>Year(s)</option>
                                                        </select>
                                                    </div>
                                                    @error('repeat_type_custom')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <div class="form-group recurring-cycles">
                                                    <label for="cycles" class="form-label">Total Cycles</label>
                                                    <div class="input-group ">
                                                        <input type="number" class="form-control" name="cycles" id="cycles2" value="{{ old('cycles', 0) }}" {{ old('unlimited_cycles') ? 'disabled' : '' }}>
                                                        <div class="input-group-append btn btn-outline-secondary">
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="unlimited_cycles2" onchange="toggleCyclesInput2()" {{ old('unlimited_cycles', true) ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="unlimited_cycles2">Infinity</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @error('cycles')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <div class="form-group">
                                                            <label for="rel_type" class="form-label">Related To</label>
                                                            <select name="rel_type" id="rel_type" class="form-select">
                                                                <option value="ticket" selected>Ticket</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-6 mb-3">
                                                        <div class="form-group">
                                                            <label for="rel_id" class="form-label">Ticket</label>
                                                            <select name="rel_id" id="rel_id" class="form-select">
                                                                @if (!empty($tickets))
                                                                    @foreach ($tickets as $item)
                                                                        <option value="{{ $item->id }}" {{ old('rel_id', $ticket->id) == $item->id ? 'selected' : '' }}>{{ $item->id }}# {{ $item->subject }}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                        @error('rel_id')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12" id="modalMultipleSelect{{ $ticketReply->id }}">
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="assignees2" class="form-label">Assignees</label><br>
                                                        <select id="assignees2_{{ $ticketReply->id }}" name="assignees[]" class="form-select" multiple="multiple">
                                                            @if (!empty($users))
                                                                @foreach ($users as $item)
                                                                    <option value="{{ $item->id }}" {{ collect(old('assignees', [$ticket->assigned]))->contains($item->id) ? 'selected' : '' }}>{{ $item->name }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="followers" class="form-label">Followers</label><br>
                                                        <select id="followers2_{{ $ticketReply->id }}" name="followers[]" class="form-select" multiple="multiple">
                                                            @if (!empty($users))
                                                                @foreach ($users as $item)
                                                                    <option value="{{ $item->id }}" {{ collect(old('followers'))->contains($item->id) ? 'selected' : '' }}>{{ $item->name }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label for="tags" class="form-label">Tags</label><br>
                                                        <select id="modalTags2_{{ $ticketReply->id }}" name="tags[]" class="form-select" multiple="multiple">
                                                            @if (!empty($tagslist))
                                                                @foreach ($tagslist as $tag)
                                                                    <option value="{{ $tag->id }}" {{ collect(old('tags'))->contains($tag->id) ? 'selected' : '' }}>{{ $tag->tags }}</option>
                                                                @endforeach
                                                            @endif
                                                            <option value="option1">Option 1</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Task Description</label>								
                                                <textarea id="convert_to_task_replayMessage{{ $ticketReply->id }}" name="description">{!! old('description', $ticketReply->message) !!}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                {{-- Replay convert to task modal start  --}}

                <div class="card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-4 mb-3">
                                <p><a href="{{ route('admin_profile', 1) }}">{{ $ticketReply->created_by }}</a></p>
                                <p class="text-muted">Staff</p>

                                <hr>
                                <a class="btn btn-sm btn-danger me-2" data-bs-toggle="modal" data-bs-target="#deleteReplay{{ $ticketReply->id }}">Delete</a>
                                <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#replayConvertToTask{{ $ticketReply->id }}">Convert to task</button>
                            </div>

                            <div class="col-md-8 ticket_submitter_info" style="border-left: 1px solid gray;">

                                <div class="text-end mb-3">
                                    <a href="{{ route('support.print_replay_message', $ticketReply->id) }}" class="font-22 text-primary">
                                        <i class="lni lni-printer"></i>
                                    </a>
                                    <a href="#" class="font-22 text-primary" data-bs-toggle="modal" data-bs-target="#ReplayMessageEdit{{ $ticketReply->id }}">
                                        <i class="fadeIn animated bx bx-edit"></i>
                                    </a>
                                </div>


                                <div class="mb-3">{!! $ticketReply->message !!}</div>

                                <div class="mb-3">
                                    @php
                                        $ticket_attachments = DB::table('ticket_attachments')->where('ticketid', $ticketReply->ticketid)->get();
                                    @endphp
                                    @if (count($ticket_attachments) > 0)
                                        <div class="image-container">
                                            @foreach ($ticket_attachments as $attachment)
                                                @if ($attachment->replyid == $ticketReply->id)
                                                    @if (!empty($attachment->file_name))
                                                        <img src="{{ asset('uploads/' . $attachment->file_name) }}" alt="Image" height="160" width="240">
                                                        <a href="{{ route('support.delete_replay_attachment', $attachment->id) }}" class="delete-button" style="padding-top: 3px;">&times;</a>                                                    
                                                    @endif
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            @endif
        @endforeach
    @endif
    {{-- Show added replay end  --}}

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

	<script>
    	ClassicEditor
        .create(document.querySelector('#editor2'))
        .catch(error => {
            console.error(error);
        });
	</script>



    {{-- For predefne replay  --}}
    <script>
        function updateDescription() {

            // Select 'Select tag'
            var select = document.getElementById('predefinedReplay');

            // Take Select Option Index Value
            var takeSelectOptionIndexValue = select.selectedIndex;

            // Set the value of the hidden input field
            document.getElementById('selectedOptionIndex').value = takeSelectOptionIndexValue;

            // Get the input value and assign it to a new variable
            var inputValue = document.getElementById('selectedOptionIndex').value;


            // Store the id in session
            var id = inputValue;
            $.ajax({
                url: '{{ route("store_predefinedReplayId_in_session") }}',
                type: 'POST',
                dataType: 'json',
                data: { id: id, '_token': '{{ csrf_token() }}' },
            });
        }
    </script>



    {{-- For knowledge base link  --}}
    <script>
        function updateDescriptionForLink() {
            // Select 'Select tag'
            var select = document.getElementById('knowledgeBaseLink');

            // Take Select Option Index Value
            var takeSelectOptionIndexValue = select.selectedIndex;

            // Set the value of the hidden input field
            document.getElementById('selectedKnowledgeBaseIndex').value = takeSelectOptionIndexValue;

            // Get the input value and assign it to a new variable
            var inputValue = document.getElementById('selectedKnowledgeBaseIndex').value;

            // Store the id in session
            var id = inputValue;
            $.ajax({
                url: '{{ route("store_knowledgeBaseLinkId_in_session") }}',
                type: 'POST',
                dataType: 'json',
                data: { id: id, '_token': '{{ csrf_token() }}' },
            });

        }

    </script>



    {{-- Normal Text Field  --}}
    <script>
        function updateDescription() {

            var id1 = $('#predefinedReplay').val();
            var id2 = $('#knowledgeBaseLink').val();

            // Initialize variables to hold the values
            var message1 = '';
            var message2 = '';

            // Check if both select boxes have values selected
            if (id1 && id2) {

                // If both select boxes have values selected
                $.ajax({
                    url: '{{ route("get_predefined_reply_message") }}',
                    type: 'GET',
                    dataType: 'json',
                    data: { id: id1, '_token': '{{ csrf_token() }}' },
                    success: function(response) {
                        message1 = response.message.message;
                        updateTextarea();
                    },
                });

                $.ajax({
                    url: '{{ route("get_knowledge_base_link") }}',
                    type: 'GET',
                    dataType: 'json',
                    data: { id: id2, '_token': '{{ csrf_token() }}' },
                    success: function(response) {
                        message2 = response.message.description;
                        updateTextarea();
                    },
                });

            } else {
                // If only one select box has a value selected, update the textarea accordingly
                if (id1) {
                    $.ajax({
                        url: '{{ route("get_predefined_reply_message") }}',
                        type: 'GET',
                        dataType: 'json',
                        data: { id: id1, '_token': '{{ csrf_token() }}' },
                        success: function(response) {
                            message1 = response.message.message;
                            updateTextarea();
                        },
                    });
                }

                if (id2) {
                    $.ajax({
                        url: '{{ route("get_knowledge_base_link") }}',
                        type: 'GET',
                        dataType: 'json',
                        data: { id: id2, '_token': '{{ csrf_token() }}' },
                        success: function(response) {
                            message2 = response.message.description;
                            updateTextarea();
                        },
                    });
                }
            }

            // Function to update the textarea with concatenated values
            function updateTextarea() {
                $('#messageContainer').val(message1 + '\n' + message2);
            }
        }
    </script>


    <script>
        function toggleTextArea() {
            const textEditorDiv = document.getElementById('textEditorDiv');
            const normalTextAreaDiv = document.getElementById('normalTextAreaDiv');

            const predefinedReplaySelectedOption = document.getElementById('predefinedReplay').value;
            const knowledgeBaseLinkSelectedOption = document.getElementById('knowledgeBaseLink').value;

            if (predefinedReplaySelectedOption || knowledgeBaseLinkSelectedOption) {
                textEditorDiv.style.display = 'none';
                normalTextAreaDiv.style.display = 'block';
            } else {
                textEditorDiv.style.display = 'block';
                normalTextAreaDiv.style.display = 'none';
            }
        }
    </script>

	{{-- text editor  --}}
	<script>
    	ClassicEditor
        .create(document.querySelector('#message'))
        .catch(error => {
            console.error(error);
        });
	</script>

    {{-- for convert to task  --}}
    <script>
        function toggleAttachments() {
            var attachmentsDiv = document.getElementById('new-task-attachments');
            if (attachmentsDiv.style.display === 'none') {
                attachmentsDiv.style.display = 'block';
            } else {
                attachmentsDiv.style.display = 'none';
            }
        }
    </script>

    <script>
        function toggleAttachments2() {
            var attachmentsDiv = document.getElementById('new-task-attachments2');
            if (attachmentsDiv.style.display === 'none') {
                attachmentsDiv.style.display = 'block';
            } else {
                attachmentsDiv.style.display = 'none';
            }
        }
    </script>


    <script>
        function toggleAttachments3() {
            var attachmentsDiv = document.getElementById('new-task-attachments3');
            if (attachmentsDiv.style.display === 'none') {
                attachmentsDiv.style.display = 'block';
            } else {
                attachmentsDiv.style.display = 'none';
            }
        }
    </script>

    {{-- for convert to task  --}}
    <script>
        function toggleCustomDiv() {
            var selectBox = document.getElementById("repeat_every");
            var customDiv = document.getElementById("customDiv");
            
            if (selectBox.value === "custom") {
                customDiv.style.display = "block";
            } else {
                customDiv.style.display = "none";
            }
        }
    </script>

    <script>
        function toggleCustomDiv2() {
            var selectBox = document.getElementById("repeat_every2");
            var customDiv2 = document.getElementById("customDiv2");
            
            if (selectBox.value === "custom") {
                customDiv2.style.display = "block";
            } else {
                customDiv2.style.display = "none";
            }
        }
    </script>

    <script>
        function toggleCustomDiv3() {
            var selectBox = document.getElementById("repeat_every3");
            var customDiv3 = document.getElementById("customDiv3");
            
            if (selectBox.value === "custom") {
                customDiv3.style.display = "block";
            } else {
                customDiv3.style.display = "none";
            }
        }
    </script>

    {{-- for convert to task  --}}
    <script>
        function toggleCyclesInput() {
            var cyclesInput = document.getElementById("cycles");
            var infinityCheckbox = document.getElementById("unlimited_cycles");

            if (infinityCheckbox.checked) {
                cyclesInput.disabled = true;
                cyclesInput.value = 0; 
            } else {
                cyclesInput.disabled = false;
            }
        }
    </script>

    <script>
        function toggleCyclesInput2() {
            var cyclesInput = document.getElementById("cycles2");
            var infinityCheckbox = document.getElementById("unlimited_cycles2");

            if (infinityCheckbox.checked) {
                cyclesInput.disabled = true;
                cyclesInput.value = 0; 
            } else {
                cyclesInput.disabled = false;
            }
        }
    </script>


    <script>
        function toggleCyclesInput3() {
            var cyclesInput = document.getElementById("cycles3");
            var infinityCheckbox = document.getElementById("unlimited_cycles3");

            if (infinityCheckbox.checked) {
                cyclesInput.disabled = true;
                cyclesInput.value = 0; 
            } else {
                cyclesInput.disabled = false;
            }
        }
    </script>


    {{-- multiple select  --}}
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script>
        $(document).ready(function() {
            $('#assignees').select2({
                placeholder: 'Select an option',
                width: '100%',
                dropdownParent: $('#modalMultipleSelect')
            });
        });
	</script>

	<script>
        $(document).ready(function() {
            $('#followers').select2({
                placeholder: 'Select an option',
                width: '100%',
                dropdownParent: $('#modalMultipleSelect')
            });
        });
	</script>

	<script>
        $(document).ready(function() {
            $('#newTaskFollowers').select2({
                placeholder: 'Select an option',
                width: '100%',
                dropdownParent: $('#newTaskModalMultipleSelect')
            });
        });
	</script>

    <script>
        $(document).ready(function() {
            $('#modalTags').select2({
                placeholder: 'Select an option',
                width: '100%',
                dropdownParent: $('#modalMultipleSelect')
            });
        });
	</script>

    <script>
        $(document).ready(function() {
            $('#settingTag').select2({
                placeholder: 'Select an option',
                width: '100%',
            });
        });
	</script>

    <script>
        $(document).ready(function() {
            $('#newTaskModalTags').select2({
                placeholder: 'Select an option',
                width: '100%',
                dropdownParent: $('#newTaskModalMultipleSelect')
            });
        });
	</script>


	<script>
        $(document).ready(function() {
            $('#newTaskAssignees').select2({
                placeholder: 'Select an option',
                width: '100%',
                dropdownParent: $('#newTaskModalMultipleSelect')
            });
        });
	</script>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @foreach($ticketReplies as $ticketReply)

                $('#assignees2_{{ $ticketReply->id }}').select2({
                    placeholder: 'Select an option',
                    width: '100%',
                    dropdownParent: $('#modalMultipleSelect{{ $ticketReply->id }}')
                });

                $('#followers2_{{ $ticketReply->id }}').select2({
                    placeholder: 'Select an option',
                    width: '100%',
                    dropdownParent: $('#modalMultipleSelect{{ $ticketReply->id }}')
                });
                
                $('#modalTags2_{{ $ticketReply->id }}').select2({
                    placeholder: 'Select an option',
                    width: '100%',
                    dropdownParent: $('#modalMultipleSelect{{ $ticketReply->id }}')
                });
            @endforeach
        });
    </script>


    {{-- text editor  --}}
	<script>
    	ClassicEditor
        .create(document.querySelector('#description'))
        .catch(error => {
            console.error(error);
        });
	</script>
    
    
    {{-- text editor  --}}
	<script>
    	ClassicEditor
        .create(document.querySelector('#newTaskDescription'))
        .catch(error => {
            console.error(error);
        });
	</script>

    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @foreach($ticketReplies as $ticketReply)
                ClassicEditor
                    .create(document.querySelector('#replayMessage{{ $ticketReply->id }}'))
                    .catch(error => {
                        console.error(error);
                    });
            @endforeach
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @foreach($ticketReplies as $ticketReply)
                ClassicEditor
                    .create(document.querySelector('#convert_to_task_replayMessage{{ $ticketReply->id }}'))
                    .catch(error => {
                        console.error(error);
                    });
            @endforeach
        });
    </script>


    {{-- update project status  --}}
    <script>
        document.getElementById('update-ticket-status').addEventListener('change', function(event) {
            event.preventDefault();

            var selectedStatusId = this.value;
            var xhr = new XMLHttpRequest();
            var url = '{{ route('support.updateTicketStatus', $ticket->id) }}';

            xhr.open('POST', url, true);
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        if (confirm('Status updated successfully. Click OK to reload the page.')) {
                            location.reload();
                        }
                    } else {
                        alert('An error occurred: ' + xhr.responseText);
                    }
                }
            };

            var data = JSON.stringify({ status_id: selectedStatusId });
            xhr.send(data);
        });
    </script>


    {{-- This is create new task --}}
    <script>
        function toggleAttachments() {
            var attachments = document.getElementById("new-task-attachments");
            attachments.style.display = attachments.style.display === "none" ? "block" : "none";
        }

        function toggleCustomDiv() {
            var repeat_every = document.getElementById("repeat_every").value;
            var customDiv = document.getElementById("customDiv");
            customDiv.style.display = repeat_every === "custom" ? "block" : "none";
        }

        function toggleCyclesInput() {
            var cyclesInput = document.getElementById("cycles");
            var unlimitedCycles = document.getElementById("unlimited_cycles").checked;
            cyclesInput.disabled = unlimitedCycles;
        }
    </script>

    {{-- Ticket convert to task --}}
    <script>
        function toggleAttachments() {
            var attachmentsDiv = document.getElementById('new-task-attachments');
            attachmentsDiv.style.display = attachmentsDiv.style.display === 'none' ? 'block' : 'none';
        }

        function toggleCustomDiv() {
            var repeatEvery = document.getElementById('repeat_every').value;
            var customDiv123 = document.getElementById('customDiv123');
            customDiv123.style.display = repeatEvery === 'custom' ? 'block' : 'none';
        }

        function toggleCyclesInput() {
            var cyclesInput = document.getElementById('cycles');
            cyclesInput.disabled = !cyclesInput.disabled;
        }
    </script>
    
@endpush

