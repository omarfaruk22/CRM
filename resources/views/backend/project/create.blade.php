@extends('backend.layouts.main')
@section('title', 'Project Details')
@section('content')
    @push('css')
        {{-- Text editor  --}}
        <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
        <style>
            .hide {
                display: none;
            }

            .show {
                display: block;
            }
        </style>
    @endpush


    <div class="modal fade" id="customerGroup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Customer Group</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="name" class="form-label"><span style="color: red">*</span>Name</label>
                    <input type="text" name="name" class="form-control" id="name">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="adminAssign" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Assign Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="name" class="form-label"><span style="color: red">*</span>Name</label>
                    <input type="text" name="name" class="form-control" id="name">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mt-3 mb-3">Add new project</h4>
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-pills mb-3" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" data-bs-toggle="pill" href="#project-details" role="tab"
                                        aria-selected="true">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-title">Project</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="pill" href="#billing-shipping" role="tab"
                                        aria-selected="false" tabindex="-1">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-title">Project Settings</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade active show" id="project-details" role="tabpanel">
                                    <form action="{{ route('projects.store') }}" method="post"
                                        class="row g-3 needs-validation" novalidate>
                                        @csrf
                                        @method('POST')
                                        <div class="col-md-12 mb-2">
                                            <label for="name" class="form-label"><span style="color: red">*</span>
                                                Project Name</label>
                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror" id="name"
                                                value="{{ old('name') }}">
                                            @error('name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 mb-2">
                                            <label for="customer_id" class="form-label"><span style="color: red">*</span>
                                                Customer</label>
                                            <select name="customer_id" class="form-select select2" id="customer_id">
                                                @if (!empty($customers))
                                                    <option></option>name
                                                    @foreach ($customers as $customer)
                                                        <option
                                                            value="{{ $customer->id }}"{{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                                                            {{ $customer->company }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @error('customer_id')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 mb-2">
                                            <div class="form-check form-check-success">
                                                <input class="form-check-input" type="checkbox"
                                                    name="progress_from_tasks" value="1" id="progress_from_tasks"
                                                    {{ old('progress_from_tasks') == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="progress_from_tasks">
                                                    Calculate progress through tasks
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-2">
                                            <label for="progress" class="form-label">Progress<p><span
                                                        id="rangeValue">0</span>%</p></label>
                                            <input type="range" class="progress form-range" name="progress"
                                                min="0" max="100" id="customRange2"
                                                value="{{ old('progress', 0) }}">

                                        </div>

                                        <div class="col-md-6 mb-2">
                                            <label for="billing_type" class="form-label"><span
                                                    style="color: red">*</span>Billing Type</label>
                                            <select name="billing_type"
                                                class="form-select select2  @error('billing_type') is-invalid @enderror"
                                                id="billing_type" data-placeholder="Billing Type">
                                                <option></option>
                                                @foreach ($billing_types as $key => $billing_type)
                                                    <option
                                                        value="{{ $key }}"{{ old('billing_type') == $key ? 'selected' : '' }}>
                                                        {{ $billing_type }}</option>
                                                @endforeach
                                            </select>
                                            @error('billing_type')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-2">
                                            <label for="status" class="form-label">Status</label>
                                            <select name="status" class="form-select select2" id="status"
                                                data-placeholder="Status">
                                                <option></option>
                                                @foreach ($statuses as $key => $status)
                                                    <option
                                                        value="{{ $key }}"{{ old('status') == $key ? 'selected' : '' }}>
                                                        {{ $status }}</option>
                                                @endforeach

                                            </select>
                                        </div>

                                        <div class="col-md-12 mb-2 totalrate d-none">
                                            <label for="project_cost" class="form-label">Total Rate</label>
                                            <input type="number" name="project_cost" class="form-control"
                                                id="totalrate" value="">
                                        </div>

                                        <div class="col-md-12 mb-2 rate_per_hour d-none">
                                            <label for="rate_per_hour" class="form-label">Rate Per Hour</label>
                                            <input type="number" name="rate_per_hour" class="form-control"
                                                id="rate_per_hour" value="">
                                        </div>

                                        <div class="col-md-6 mb-2">
                                            <label for="estimated_hours" class="form-label">Estimated Hours</label>
                                            <input type="number" name="estimated_hours" class="form-control"
                                                id="estimated_hours" value="">
                                        </div>

                                        <div class="col-md-6 mb-2">
                                            <label for="project_members" class="form-label">Members</label>
                                            <select name="project_members[]" class="form-select select2"
                                                id="project_members" multiple>
                                                <option></option>
                                                @if (!empty($users))
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="start_date" class="form-label"><span style="color: red">*</span>
                                                Start Date</label>
                                            <input type="date" class="form-control" id="start_date" name="start_date"
                                                value="{{ date('Y-m-d') }}">
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="deadline" class="form-label">Deadline</label>
                                            <input type="date" class="form-control" name="deadline" id="deadline"
                                                placeholder="">
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="tags" class="form-label ">Tags</label><br>
                                            <select id="tags" name="tags[]" class="form-select select2"
                                                multiple="multiple">
                                                <option></option>
                                                @if (!empty($tags))
                                                    @foreach ($tags as $tag)
                                                        <option value="{{ $tag->id }}">{{ $tag->tags }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>

                                        <div class="col-md-12 mb-2">
                                            <label class="form-label"><i class="fa fa-tag"></i>Description</label>
                                            <textarea id="editor" name="description"></textarea>
                                        </div>

                                        <div class="col-md-12 mb-2">
                                            <div class="form-check form-check-secondary">
                                                <input class="form-check-input" type="checkbox" value="1"
                                                    name="send_created_email" id="send_created_email">
                                                <label class="form-check-label" for="send_created_email">
                                                    Send project created email
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-12 text-end">
                                            <button type="submit" class="btn btn-primary px-2">Save</button>
                                        </div>



                                </div>
                                <div class="tab-pane fade" id="billing-shipping" role="tabpanel">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="contact_notification" class="form-label"><span
                                                    style="color: red">*</span> Send contacts notifications</label>
                                            <select name="contact_notification"
                                                class="form-select select2 @error('contact_notification') is-invalid @enderror"
                                                id="contact_notification">
                                                <option></option>
                                                <option value="1">To all contacts with notifications for projects
                                                    enabled</option>
                                                <option value="2">Specific contacts</option>
                                                <option value="0">Do not send notifications</option>

                                            </select>
                                            @error('contact_notification')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 mb-3 notify @error('notify_contacts') show @enderror">
                                            <label for="notify_contacts" class="form-label"><span
                                                    style="color: red">*</span>Select contacts to notify</label>
                                            <select name="notify_contacts[]"
                                                class="form-select select2  @error('notify_contacts') is-invalid @enderror"
                                                id="notify_contacts" multiple disabled>
                                                <option></option>
                                            </select>
                                            @error('notify_contacts')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="available_features" class="form-label">Visible Tabs</label><br>
                                            <select id="available_features" name="available_features[]"
                                                class="form-select select2" multiple="multiple">
                                                @php
                                                    $salesGroupOpen = false;
                                                @endphp

                                                @forelse ($projectvissiabletabs as $key => $projectvissiabletab)
                                                    @if ($key >= 9 && $key <= 14)
                                                        @if (!$salesGroupOpen)
                                                            <optgroup label="Sales">
                                                                @php $salesGroupOpen = true; @endphp
                                                        @endif
                                                        <option value="{{ $projectvissiabletab->value }}">
                                                            {{ $projectvissiabletab->name }}
                                                        </option>
                                                    @else
                                                        @if ($salesGroupOpen)
                                                            </optgroup>
                                                            @php $salesGroupOpen = false; @endphp
                                                        @endif
                                                        <option value="{{ $projectvissiabletab->value }}">
                                                            {{ $projectvissiabletab->name }}
                                                        </option>
                                                    @endif
                                                @empty
                                                    <option value="">No available features</option>
                                                @endforelse

                                                @if ($salesGroupOpen)
                                                    </optgroup>
                                                @endif
                                            </select>

                                        </div>

                                        <div>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item" style="padding-left: 0"></li>

                                                <li class="list-group-item" style="padding-left: 0">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="view_tasks"
                                                            id="view_tasks" value="1">
                                                        <label class="form-check-label" for="view_tasks">Allow customer to
                                                            view tasks</label>
                                                    </div>
                                                </li>

                                                <li class="list-group-item" style="padding-left: 0">
                                                    <div class="form-check">
                                                        <input class="form-check-input check" type="checkbox"
                                                            name="create_tasks" id="create_tasks" value="1">
                                                        <label class="form-check-label" for="create_tasks">Allow customer
                                                            to
                                                            create tasks</label>
                                                    </div>
                                                </li>

                                                <li class="list-group-item" style="padding-left: 0">
                                                    <div class="form-check">
                                                        <input class="form-check-input check" type="checkbox"
                                                            name="edit_tasks" id="edit_tasks" value="1">
                                                        <label class="form-check-label" for="edit_tasks">Allow customer to
                                                            edit tasks (only tasks created from contact)</label>
                                                    </div>
                                                </li>

                                                <li class="list-group-item" style="padding-left: 0">
                                                    <div class="form-check">
                                                        <input class="form-check-input check" type="checkbox"
                                                            name="comment_on_tasks" id="comment_on_tasks" value="1">
                                                        <label class="form-check-label" for="comment_on_tasks">Allow
                                                            customer to
                                                            comment on project tasks</label>
                                                    </div>
                                                </li>

                                                <li class="list-group-item" style="padding-left: 0">
                                                    <div class="form-check">
                                                        <input class="form-check-input check" type="checkbox"
                                                            name="view_task_comments" id="view_task_comments"
                                                            value="1">
                                                        <label class="form-check-label" for="view_task_comments">Allow
                                                            customer to
                                                            view task comments</label>
                                                    </div>
                                                </li>

                                                <li class="list-group-item" style="padding-left: 0">
                                                    <div class="form-check">
                                                        <input class="form-check-input check" type="checkbox"
                                                            name="view_task_attachments" id="view_task_attachments"
                                                            value="1">
                                                        <label class="form-check-label" for="view_task_attachments">Allow
                                                            customer to
                                                            view task attachments</label>
                                                    </div>
                                                </li>

                                                <li class="list-group-item" style="padding-left: 0">
                                                    <div class="form-check">
                                                        <input class="form-check-input check" type="checkbox"
                                                            name="view_task_checklist_items"
                                                            id="view_task_checklist_items" value="1">
                                                        <label class="form-check-label"
                                                            for="view_task_checklist_items">Allow customer to
                                                            view task checklist items</label>
                                                    </div>
                                                </li>

                                                <li class="list-group-item" style="padding-left: 0">
                                                    <div class="form-check">
                                                        <input class="form-check-input check" type="checkbox"
                                                            name="upload_on_tasks" id="upload_on_tasks" value="1">
                                                        <label class="form-check-label" for="upload_on_tasks">Allow
                                                            customer to
                                                            upload attachments on tasks</label>
                                                    </div>
                                                </li>

                                                <li class="list-group-item" style="padding-left: 0">
                                                    <div class="form-check">
                                                        <input class="form-check-input check" type="checkbox"
                                                            name="view_task_total_logged_time"
                                                            id="view_task_total_logged_time" value="1">
                                                        <label class="form-check-label"
                                                            for="view_task_total_logged_time">Allow customer to
                                                            view task total logged time</label>
                                                    </div>
                                                </li>

                                                <li class="list-group-item" style="padding-left: 0">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="view_finance_overview" id="view_finance_overview"
                                                            value="1">
                                                        <label class="form-check-label" for="view_finance_overview">Allow
                                                            customer to
                                                            view finance overview</label>
                                                    </div>
                                                </li>

                                                <li class="list-group-item" style="padding-left: 0">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="upload_files" id="upload_files" value="1">
                                                        <label class="form-check-label" for="upload_files">Allow customer
                                                            to
                                                            upload files</label>
                                                    </div>
                                                </li>

                                                <li class="list-group-item" style="padding-left: 0">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="open_discussions" id="open_discussions" value="1">
                                                        <label class="form-check-label" for="open_discussions">Allow
                                                            customer to
                                                            open discussions</label>
                                                    </div>
                                                </li>

                                                <li class="list-group-item" style="padding-left: 0">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="view_milestones" id="view_milestones" value="1">
                                                        <label class="form-check-label" for="view_milestones">Allow
                                                            customer to
                                                            view milestones</label>
                                                    </div>
                                                </li>

                                                <li class="list-group-item" style="padding-left: 0">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="view_gantt"
                                                            id="view_gantt" value="1">
                                                        <label class="form-check-label" for="view_gantt">Allow customer to
                                                            view Gantt</label>
                                                    </div>
                                                </li>

                                                <li class="list-group-item" style="padding-left: 0">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="view_timesheets" id="view_timesheets" value="1">
                                                        <label class="form-check-label" for="view_timesheets">Allow
                                                            customer to
                                                            view timesheets</label>
                                                    </div>
                                                </li>

                                                <li class="list-group-item" style="padding-left: 0">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="view_activity_log" id="view_activity_log"
                                                            value="1">
                                                        <label class="form-check-label" for="view_activity_log">Allow
                                                            customer to
                                                            view activity log</label>
                                                    </div>
                                                </li>

                                                <li class="list-group-item" style="padding-left: 0">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="view_team_members" id="view_team_members"
                                                            value="1">
                                                        <label class="form-check-label" for="view_team_members">Allow
                                                            customer to
                                                            view team members</label>
                                                    </div>
                                                </li>

                                                <li class="list-group-item" style="padding-left: 0">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            name="hide_tasks_on_main_tasks_table"
                                                            id="hide_tasks_on_main_tasks_table" value="1">
                                                        <label class="form-check-label"
                                                            for="hide_tasks_on_main_tasks_table">Hide project tasks
                                                            on main tasks table (admin area)</label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item"></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-end">
                                        <button type="submit" class="btn btn-primary px-2">Save</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>

@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: 'Select an option',
                width: '100%'
            });
        });
    </script>

    {{-- text editor  --}}
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
    {{-- for progressbar  --}}
    <script>
        const rangeInput = document.getElementById('customRange2');
        const rangeValueDisplay = document.getElementById('rangeValue');
        rangeInput.addEventListener('input', function() {
            rangeValueDisplay.textContent = rangeInput.value;
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#billing_type').change(function() {
                var value = $(this).val();
                if (value == 1) {
                    $('.totalrate').removeClass('d-none').find('input').prop('disabled', false);
                    $('.rate_per_hour').addClass('d-none').find('input').prop('disabled', true);
                } else if (value == 2) {
                    $('.rate_per_hour').removeClass('d-none').find('input').prop('disabled', false);
                    $('.totalrate').addClass('d-none').find('input').prop('disabled', true);
                } else {
                    $('.totalrate').addClass('d-none').find('input').prop('disabled', true);
                    $('.rate_per_hour').addClass('d-none').find('input').prop('disabled', true);
                }
            });
        });
    </script>
    <script>
        // check box 
        $('#progress_from_tasks').change(function() {
            var textInput = $('#customRange2');
            if ($(this).is(':checked')) {
                textInput.prop('disabled', true);
            } else {
                textInput.prop('disabled', false);
            }
        });

        // this is view_tasks checked hide some checkbox 
        $(document).ready(function() {
            $('.check').prop('disabled', true);
            $('#view_tasks').change(function() {
                var textInput = $('.check');
                if ($(this).is(':checked')) {
                    textInput.prop('disabled', false);
                } else {
                    textInput.prop('disabled', true);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            function disabled() {
                $('.notify').addClass('hide');
            }
            disabled();
            $('#contact_notification').change(function() {
                var value = $(this).val();
                if (value == 2) {
                    $('.notify').removeClass('hide');
                } else {
                    $('.notify').addClass('hide');
                }
            });

        });
    </script>
    <script>
        $(document).ready(function() {
            $('#customer_id').change(function() {
                var value = $(this).val();
                if (value) {
                    $('#notify_contacts').prop('disabled', false);
                } else {
                    $('#notify_contacts').prop('disabled', true);
                }
                $.ajax({
                    url: '{{ route('projects.customercontactshow') }}',
                    type: 'GET',
                    data: {
                        _token: '{{ csrf_token() }}',
                        customerid: value,
                    },
                    success: function(response) {
                        $('#notify_contacts').empty();
                        $.each(response.data, function(key, value) {
                            $('#notify_contacts').append('<option value="' + value.id +
                                '">' +
                                value.firstname + ' ' +
                                value.lastname + '</option>');
                        });
                    },
                    error: function(xhr) {
                        consile.log('An error occurred: ' + xhr.responseText);
                    }
                });
            });
        });
    </script>
@endpush
