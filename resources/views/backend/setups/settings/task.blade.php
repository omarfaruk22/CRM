@extends('backend.layouts.main')
@section('title', 'Customer Details')
@section('content')
    <div class="row">

        <div class="col-md-3">
            <h4 class="mt-3 mb-3">Settings</h4>
            @include('backend.partials.settings-sidebar')
        </div>

        <div class="col-md-9">

            <h4 class="mt-3 mb-3">Tasks</h4>

            {{-- successfull message start --}}
            @if (session('group'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Weldone!</strong> {{ session('group') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            {{-- successfull message end --}}

            <div class="card">
                <div class="card-body">
                    {{-- Billing and shipping start  --}}
                    <form action="{{ route('settings.task.update') }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="row">

                            <div class="col-md-12">
                                <label for="tasks_kanban_limit" class="form-label">Limit tasks kanban rows per
                                    status</label>
                                <input type="number" name="tasks_kanban_limit" id="tasks_kanban_limit"
                                    class="form-control mb-3" value="{{ $tasks_kanban_limit->value }}">
                            </div>

                            <div class="col-md-12">
                                <p class="form">Allow all staff to see all tasks related to projects (includes non-staff)
                                </p>
                                <div class="mb-3 col-md-12 d-flex">
                                    <div class="me-2">
                                        <input class="form-check-input" type="radio"
                                            name="show_all_tasks_for_project_member" id="show_all_tasks_for_project_member1"
                                            value="1" @if ($show_all_tasks_for_project_member->value == 1) checked @endif>
                                        <label class="form-check-label" for="show_all_tasks_for_project_member1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="me-2">
                                        <input class="form-check-input" type="radio"
                                            name="show_all_tasks_for_project_member" id="show_all_tasks_for_project_member2"
                                            value="0"@if ($show_all_tasks_for_project_member->value != 1) checked @endif>
                                        <label class="form-check-label" for="show_all_tasks_for_project_member2">
                                            No
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <p class="form">Allow customer/staff to add/edit task comments only in the first hour
                                    (administrators not applied)
                                </p>
                                <div class="mb-3 col-md-12 d-flex">
                                    <div class="me-2">
                                        <input class="form-check-input" type="radio"
                                            name="client_staff_add_edit_delete_task_comments_first_hour"
                                            id="client_staff_add_edit_delete_task_comments_first_hour1" value="1"
                                            @if ($client_staff_add_edit_delete_task_comments_first_hour->value == 1) checked @endif>
                                        <label class="form-check-label"
                                            for="client_staff_add_edit_delete_task_comments_first_hour1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="me-2">
                                        <input class="form-check-input" type="radio"
                                            name="client_staff_add_edit_delete_task_comments_first_hour"
                                            id="client_staff_add_edit_delete_task_comments_first_hour2"
                                            value="0"@if ($client_staff_add_edit_delete_task_comments_first_hour->value != 1) checked @endif>
                                        <label class="form-check-label"
                                            for="client_staff_add_edit_delete_task_comments_first_hour2">
                                            No
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <p class="form">Auto assign task creator when new task is created
                                </p>
                                <div class="mb-3 col-md-12 d-flex">
                                    <div class="me-2">
                                        <input class="form-check-input" type="radio"
                                            name="new_task_auto_assign_current_member"
                                            id="new_task_auto_assign_current_member1" value="1"
                                            @if ($new_task_auto_assign_current_member->value == 1) checked @endif>
                                        <label class="form-check-label" for="new_task_auto_assign_current_member1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="me-2">
                                        <input class="form-check-input" type="radio"
                                            name="new_task_auto_assign_current_member"
                                            id="new_task_auto_assign_current_member2"
                                            value="0"@if ($new_task_auto_assign_current_member->value != 1) checked @endif>
                                        <label class="form-check-label" for="new_task_auto_assign_current_member2">
                                            No
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <p class="form">Auto add task creator as task follower when new task is created
                                </p>
                                <div class="mb-3 col-md-12 d-flex">
                                    <div class="me-2">
                                        <input class="form-check-input" type="radio"
                                            name="new_task_auto_follower_current_member"
                                            id="new_task_auto_follower_current_member1" value="1"
                                            @if ($new_task_auto_follower_current_member->value == 1) checked @endif>
                                        <label class="form-check-label" for="new_task_auto_follower_current_member1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="me-2">
                                        <input class="form-check-input" type="radio"
                                            name="new_task_auto_follower_current_member"
                                            id="new_task_auto_follower_current_member2"
                                            value="0"@if ($new_task_auto_follower_current_member->value != 1) checked @endif>
                                        <label class="form-check-label" for="new_task_auto_follower_current_member2">
                                            No
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <p class="form">Stop all other started timers when starting new timer
                                </p>
                                <div class="mb-3 col-md-12 d-flex">
                                    <div class="me-2">
                                        <input class="form-check-input" type="radio"
                                            name="auto_stop_tasks_timers_on_new_timer"
                                            id="auto_stop_tasks_timers_on_new_timer1" value="1"
                                            @if ($auto_stop_tasks_timers_on_new_timer->value == 1) checked @endif>
                                        <label class="form-check-label" for="auto_stop_tasks_timers_on_new_timer1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="me-2">
                                        <input class="form-check-input" type="radio"
                                            name="auto_stop_tasks_timers_on_new_timer"
                                            id="auto_stop_tasks_timers_on_new_timer2"
                                            value="0"@if ($auto_stop_tasks_timers_on_new_timer->value != 1) checked @endif>
                                        <label class="form-check-label" for="auto_stop_tasks_timers_on_new_timer2">
                                            No
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <p class="form">Billable option is by default checked when new task is created? (only
                                    from
                                    admin area)
                                </p>
                                <div class="mb-3 col-md-12 d-flex">
                                    <div class="me-2">
                                        <input class="form-check-input" type="radio"
                                            name="timer_started_change_status_in_progress"
                                            id="timer_started_change_status_in_progress1" value="1"
                                            @if ($timer_started_change_status_in_progress->value == 1) checked @endif>
                                        <label class="form-check-label" for="timer_started_change_status_in_progress1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="me-2">
                                        <input class="form-check-input" type="radio"
                                            name="timer_started_change_status_in_progress"
                                            id="timer_started_change_status_in_progress2"
                                            value="0"@if ($timer_started_change_status_in_progress->value != 1) checked @endif>
                                        <label class="form-check-label" for="timer_started_change_status_in_progress2">
                                            No
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="col-md-6 mb-3">
                                <label for="Separator" class="form-label">Round off task timer</label>
                                <select class="form-select form-select-sm" name="round_off_task_timer_option"
                                    id="round_off_task_timer_option" aria-label=".form-select-sm example">
                                    <option value="0" @if ($round_off_task_timer_option->value == 0) selected @endif>Don,t round
                                        off</option>
                                    <option value="1" @if ($round_off_task_timer_option->value == 1) selected @endif>Round Up
                                    </option>
                                    <option value="2" @if ($round_off_task_timer_option->value == 2) selected @endif>Round down
                                    </option>
                                    <option value="3" @if ($round_off_task_timer_option->value == 3) selected @endif>Round to
                                        nearest</option>
                                </select>
                            </div>

                            <div class="col-md-4  mb-3">
                                <label for="Separator" class="form-label">multiplies of</label>
                                <select class="form-select form-select-sm" name="round_off_task_timer_time"
                                    id="round_off_task_timer_time" aria-label=".form-select-sm example">
                                    <option value="5" @if ($round_off_task_timer_time->value == 5) selected @endif>5</option>
                                    <option value="10" @if ($round_off_task_timer_time->value == 10) selected @endif>10</option>
                                    <option value="15" @if ($round_off_task_timer_time->value == 15) selected @endif>15</option>
                                    <option value="20" @if ($round_off_task_timer_time->value == 20) selected @endif>20</option>
                                    <option value="25" @if ($round_off_task_timer_time->value == 25) selected @endif>25</option>
                                    <option value="30" @if ($round_off_task_timer_time->value == 30) selected @endif>30</option>
                                    <option value="35" @if ($round_off_task_timer_time->value == 35) selected @endif>35</option>
                                    <option value="40" @if ($round_off_task_timer_time->value == 40) selected @endif>40</option>
                                    <option value="45" @if ($round_off_task_timer_time->value == 45) selected @endif>45</option>

                                </select>
                            </div>

                            <div class="col-md-2">
                                <p class="mt-4 pt-1">minutes</p>
                            </div>
                            <p>Applied to the Timesheets overview report and when invoicing a task/project.</p>
                            <hr>
                            <div class="col-md-6 mb-3">
                                <label for="Separator" class="form-label">Default status when new task is created</label>
                                <select class="form-select form-select-sm" name="default_task_status"
                                    id="default_task_status" aria-label=".form-select-sm example">
                                    <option value="auto" @if ($default_task_status->value == 'auto') selected @endif>Auto
                                    </option>
                                    <option value="1" @if ($default_task_status->value == 1) selected @endif>Not Started
                                    </option>
                                    <option value="4" @if ($default_task_status->value == 4) selected @endif>In Progress
                                    </option>
                                    <option value="3" @if ($default_task_status->value == 3) selected @endif>Testing
                                    </option>
                                    <option value="2" @if ($default_task_status->value == 2) selected @endif>Awaiting
                                        Feedback </option>
                                    <option value="5" @if ($default_task_status->value == 5) selected @endif>Complete
                                    </option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="Separator" class="form-label">Round off task timer</label>
                                <select class="form-select form-select-sm" name="default_task_priority"
                                    id="default_task_priority" aria-label=".form-select-sm example">
                                    <option value="1" @if ($default_task_priority->value == 1) selected @endif>Low</option>
                                    <option value="2" @if ($default_task_priority->value == 2) selected @endif>Medium
                                    </option>
                                    <option value="3" @if ($default_task_priority->value == 3) selected @endif>High
                                    </option>
                                    <option value="4" @if ($default_task_priority->value == 4) selected @endif>Urgent
                                    </option>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label for="task_modal_class" class="form-label">Modal Width Class (modal-lg, modal-xl,
                                    modal-xxl)</label>
                                <input type="text" name="task_modal_class" id="task_modal_class"
                                    class="form-control mb-3" value="{{ $task_modal_class->value }}">
                            </div>

                            <div class="col-md-12 mb-3 text-end">
                                <button type="submit" class="btn btn-primary">Save Settings</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
