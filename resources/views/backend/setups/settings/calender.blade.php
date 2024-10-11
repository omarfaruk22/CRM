@extends('backend.layouts.main')
@section('title', 'Customer Details')
@section('content')
    <div class="row">

        <div class="col-md-3">
            <h4 class="mt-3 mb-3">Settings</h4>
            @include('backend.partials.settings-sidebar')
        </div>

        <div class="col-md-9">

            <h4 class="mt-3 mb-3">Calender</h4>

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
                    <form action="{{ route('settings.calender.update') }}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-pills mb-3 col-md-5" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" data-bs-toggle="pill" href="#primary-pills-general"
                                            role="tab" aria-selected="false" tabindex="-1">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"></div>
                                                <div class="tab-title">General</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item " role="presentation">
                                        <a class="nav-link " data-bs-toggle="pill" href="#primary-pills-styling"
                                            role="tab" aria-selected="true">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"></div>
                                                <div class="tab-title">Styling</div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <hr>
                        <div class="tab-content" id="pills-tabContent">
                            {{-- general start  --}}
                            <div class="tab-pane fade active show" id="primary-pills-general" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12 mb-3 ">
                                        <level for="calendar_events_limit" class="form-lavel">Calendar Events Limit (Month
                                            and Week View)
                                        </level>
                                        <input type="number" name="calendar_events_limit" id="calendar_events_limit"
                                            class="form-control mt-2" value="{{ $calendar_events_limit->value }}">
                                    </div>
                                    <div class="col-md-12 mb-3 ">
                                        <level for="default_view_calendar" class="form-lavel">Default View</level>
                                        <select class="form-select mt-2" name="default_view_calendar"
                                            id="default_view_calendar">
                                            @foreach ($defaultviews as $defaultview)
                                                <option value="{{ $defaultview->value }}"
                                                    {{ $defaultview->value == $default_view_calendar->value ? 'selected' : '' }}>
                                                    {{ $defaultview->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12 mb-3 ">
                                        <level for="calendar_first_day" class="form-lavel">First Day</level>
                                        <select class="form-select mt-2" name="calendar_first_day" id="calendar_first_day">
                                            @foreach ($firstdays as $firstday)
                                                <option
                                                    value="{{ $firstday->value }}"{{ $firstday->value == $calendar_first_day->value ? 'selected' : '' }}>
                                                    {{ $firstday->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <h6>Show on Calendar</h6>
                                    <hr>
                                    <div class="col-md-6">
                                        <p class="form">Hide notified reminders from calendar</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="hide_notified_reminders_from_calendar"
                                                    id="hide_notified_reminders_from_calendar1" value="1"
                                                    @if ($hide_notified_reminders_from_calendar->value == 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="hide_notified_reminders_from_calendar1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="hide_notified_reminders_from_calendar2"
                                                    id="hide_notified_reminders_from_calendar2" value="0"
                                                    @if ($hide_notified_reminders_from_calendar->value != 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="hide_notified_reminders_from_calendar2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <p class="form">Ticket Reminders</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_ticket_reminders_on_calendar"
                                                    id="show_ticket_reminders_on_calendar1" value="1"
                                                    @if ($show_ticket_reminders_on_calendar->value == 1) checked @endif>
                                                <label class="form-check-label" for="show_ticket_reminders_on_calendar1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_ticket_reminders_on_calendar"
                                                    id="show_ticket_reminders_on_calendar2" value="0"
                                                    @if ($show_ticket_reminders_on_calendar->value != 1) checked @endif>
                                                <label class="form-check-label" for="show_ticket_reminders_on_calendar2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <p class="form">Lead Reminders</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_lead_reminders_on_calendar"
                                                    id="show_lead_reminders_on_calendar1" value="1"
                                                    @if ($show_lead_reminders_on_calendar->value == 1) checked @endif>
                                                <label class="form-check-label" for="show_lead_reminders_on_calendar1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_lead_reminders_on_calendar"
                                                    id="show_lead_reminders_on_calendar2" value="0"
                                                    @if ($show_lead_reminders_on_calendar->value != 1) checked @endif>
                                                <label class="form-check-label" for="show_lead_reminders_on_calendar2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <p class="form">Invoice Reminders</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_invoice_reminders_on_calendar"
                                                    id="show_invoice_reminders_on_calendar1" value="1"
                                                    @if ($show_invoice_reminders_on_calendar->value == 1) checked @endif>
                                                <label class="form-check-label" for="show_invoice_reminders_on_calendar1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_invoice_reminders_on_calendar"
                                                    id="show_invoice_reminders_on_calendar2" value="0"
                                                    @if ($show_invoice_reminders_on_calendar->value != 1) checked @endif>
                                                <label class="form-check-label" for="show_invoice_reminders_on_calendar2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <p class="form">Customer Reminders</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_customer_reminders_on_calendar"
                                                    id="show_customer_reminders_on_calendar1" value="1"
                                                    @if ($show_customer_reminders_on_calendar->value == 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="show_customer_reminders_on_calendar1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_customer_reminders_on_calendar"
                                                    id="show_customer_reminders_on_calendar2" value="0"
                                                    @if ($show_customer_reminders_on_calendar->value != 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="show_customer_reminders_on_calendar2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <p class="form">Estimate Reminders</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_estimate_reminders_on_calendar"
                                                    id="show_estimate_reminders_on_calendar1" value="1"
                                                    @if ($show_estimate_reminders_on_calendar->value == 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="show_estimate_reminders_on_calendar1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_estimate_reminders_on_calendar"
                                                    id="show_estimate_reminders_on_calendar2" value="0"
                                                    @if ($show_estimate_reminders_on_calendar->value != 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="show_estimate_reminders_on_calendar2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <p class="form">Proposal Reminders</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_proposal_reminders_on_calendar"
                                                    id="show_proposal_reminders_on_calendar1" value="1"
                                                    @if ($show_proposal_reminders_on_calendar->value == 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="show_proposal_reminders_on_calendar1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_proposal_reminders_on_calendar"
                                                    id="show_proposal_reminders_on_calendar2" value="0"
                                                    @if ($show_proposal_reminders_on_calendar->value != 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="show_proposal_reminders_on_calendar2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <p class="form">Expance Reminders</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_expense_reminders_on_calendar"
                                                    id="show_expense_reminders_on_calendar1" value="1"
                                                    @if ($show_expense_reminders_on_calendar->value == 1) checked @endif>
                                                <label class="form-check-label" for="show_expense_reminders_on_calendar1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_expense_reminders_on_calendar"
                                                    id="show_expense_reminders_on_calendar2" value="0"
                                                    @if ($show_expense_reminders_on_calendar->value != 1) checked @endif>
                                                <label class="form-check-label" for="show_expense_reminders_on_calendar2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <p class="form">Task Reminders</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_task_reminders_on_calendar"
                                                    id="show_task_reminders_on_calendar1" value="1"
                                                    @if ($show_task_reminders_on_calendar->value == 1) checked @endif>
                                                <label class="form-check-label" for="show_task_reminders_on_calendar1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_task_reminders_on_calendar"
                                                    id="show_task_reminders_on_calendar2" value="0"
                                                    @if ($show_task_reminders_on_calendar->value != 1) checked @endif>
                                                <label class="form-check-label" for="show_task_reminders_on_calendar2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <p class="form">Credit Note Reminders</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_credit_note_reminders_on_calendar"
                                                    id="show_credit_note_reminders_on_calendar1" value="1"
                                                    @if ($show_credit_note_reminders_on_calendar->value == 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="show_credit_note_reminders_on_calendar1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_credit_note_reminders_on_calendar"
                                                    id="show_credit_note_reminders_on_calendar2" value="0"
                                                    @if ($show_credit_note_reminders_on_calendar->value != 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="show_credit_note_reminders_on_calendar2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <p class="form">Invoices</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_invoices_on_calendar" id="show_invoices_on_calendar1"
                                                    value="1" @if ($show_invoices_on_calendar->value == 1) checked @endif>
                                                <label class="form-check-label" for="show_invoices_on_calendar1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_invoices_on_calendar" id="show_invoices_on_calendar2"
                                                    value="0" @if ($show_invoices_on_calendar->value != 1) checked @endif>
                                                <label class="form-check-label" for="show_invoices_on_calendar2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <p class="form">Estimates</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_estimates_on_calendar" id="show_estimates_on_calendar1"
                                                    value="1" @if ($show_estimates_on_calendar->value == 1) checked @endif>
                                                <label class="form-check-label" for="show_estimates_on_calendar1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_estimates_on_calendar" id="show_estimates_on_calendar2"
                                                    value="0" @if ($show_estimates_on_calendar->value != 1) checked @endif>
                                                <label class="form-check-label" for="show_estimates_on_calendar2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <p class="form">Proposals</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_proposals_on_calendar" id="show_proposals_on_calendar1"
                                                    value="1" @if ($show_proposals_on_calendar->value == 1) checked @endif>
                                                <label class="form-check-label" for="show_proposals_on_calendar1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_proposals_on_calendar" id="show_proposals_on_calendar2"
                                                    value="0" @if ($show_proposals_on_calendar->value != 1) checked @endif>
                                                <label class="form-check-label" for="show_proposals_on_calendar2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <p class="form">Contracts</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_contracts_on_calendar" id="show_contracts_on_calendar1"
                                                    value="1" @if ($show_contracts_on_calendar->value == 1) checked @endif>
                                                <label class="form-check-label" for="show_contracts_on_calendar1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_contracts_on_calendar" id="show_contracts_on_calendar2"
                                                    value="0" @if ($show_contracts_on_calendar->value != 1) checked @endif>
                                                <label class="form-check-label" for="show_contracts_on_calendar2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <p class="form">Tasks</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_tasks_on_calendar" id="show_tasks_on_calendar1"
                                                    value="1" @if ($show_tasks_on_calendar->value == 1) checked @endif>
                                                <label class="form-check-label" for="show_tasks_on_calendar1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_tasks_on_calendar" id="show_tasks_on_calendar2"
                                                    value="0" @if ($show_tasks_on_calendar->value != 1) checked @endif>
                                                <label class="form-check-label" for="show_tasks_on_calendar2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <p class="form">Show only tasks assigned to the logged in staff member</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="calendar_only_assigned_tasks" id="calendar_only_assigned_tasks1"
                                                    value="1" @if ($calendar_only_assigned_tasks->value == 1) checked @endif>
                                                <label class="form-check-label" for="calendar_only_assigned_tasks1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="calendar_only_assigned_tasks" id="calendar_only_assigned_tasks2"
                                                    value="0" @if ($calendar_only_assigned_tasks->value != 1) checked @endif>
                                                <label class="form-check-label" for="calendar_only_assigned_tasks2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <p class="form">Projects</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_projects_on_calendar" id="show_projects_on_calendar1"
                                                    value="1" @if ($show_projects_on_calendar->value == 1) checked @endif>
                                                <label class="form-check-label" for="show_projects_on_calendar1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_projects_on_calendar" id="show_projects_on_calendar2"
                                                    value="0" @if ($show_projects_on_calendar->value != 1) checked @endif>
                                                <label class="form-check-label" for="show_projects_on_calendar2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3 text-end">
                                        <button type="submit" class="btn btn-primary">Save Settings</button>
                                    </div>

                                </div>
                            </div>
                            {{-- general end  --}}
                            {{-- styling start  --}}
                            <div class="tab-pane fade " id="primary-pills-styling" role="tabpanel">
                                <div class="row">

                                    <div class="col-md-12">
                                        <label for="calendar_invoice_color" class="form-label">Invoice Color</label>
                                        <input type="text" id="calendar_invoice_color" name="calendar_invoice_color"
                                            class="jscolor form-control mb-2"
                                            value="{{ $calendar_invoice_color->value }}">
                                    </div>

                                    <div class="col-md-12">
                                        <label for="calendar_estimate_color" class="form-label">Estimate Color</label>
                                        <input type="text" id="calendar_estimate_color" name="calendar_estimate_color"
                                            class="jscolor form-control mb-2"
                                            value="{{ $calendar_estimate_color->value }}">
                                    </div>

                                    <div class="col-md-12">
                                        <label for="calendar_proposal_color" class="form-label">Proposal Color</label>
                                        <input type="text" name="calendar_proposal_color" id="calendar_proposal_color"
                                            class="jscolor form-control mb-2"
                                            value="{{ $calendar_proposal_color->value }}">
                                    </div>

                                    <div class="col-md-12">
                                        <label for="calendar_reminder_color" class="form-label">Reminder Color</label>
                                        <input type="text" name="calendar_reminder_color" id="calendar_reminder_color"
                                            class="jscolor form-control mb-2"
                                            value="{{ $calendar_reminder_color->value }}">
                                    </div>

                                    <div class="col-md-12">
                                        <label for="calendar_contract_color" class="form-label">Contract Color</label>
                                        <input type="text" name="calendar_contract_color" id="calendar_contract_color"
                                            class="jscolor form-control mb-2"
                                            value="{{ $calendar_contract_color->value }}">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="calendar_project_color" class="form-label">Project Color</label>
                                        <input type="text" name="calendar_project_color" id="calendar_project_color"
                                            class="jscolor form-control mb-2"
                                            value="{{ $calendar_project_color->value }}">
                                    </div>
                                    <div class="col-md-12 mb-3 text-end">
                                        <button type="submit" class="btn btn-primary">Save Settings</button>
                                    </div>
                                </div>
                            </div>
                            {{-- styling end  --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    {{-- color picker start  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jscolor/2.4.5/jscolor.min.js"></script>
    <script>
        window.addEventListener("DOMContentLoaded", function() {
            var colorInput = document.getElementById("invoice1");
            var picker = new jscolor(colorInput);
            picker.fromHSV(0, 100, 100); // Set initial color (optional)
            picker.onFineChange = function() {
                colorInput.value = '#' + this.rgbToHex(this.rgb[0], this.rgb[1], this.rgb[2]);
            };
        });
        window.addEventListener("DOMContentLoaded", function() {
            var colorInput = document.getElementById("estimate1");
            var picker = new jscolor(colorInput);
            picker.fromHSV(0, 100, 100); // Set initial color (optional)
            picker.onFineChange = function() {
                colorInput.value = '#' + this.rgbToHex(this.rgb[0], this.rgb[1], this.rgb[2]);
            };
        });
        window.addEventListener("DOMContentLoaded", function() {
            var colorInput = document.getElementById("proposal1");
            var picker = new jscolor(colorInput);
            picker.fromHSV(0, 100, 100); // Set initial color (optional)
            picker.onFineChange = function() {
                colorInput.value = '#' + this.rgbToHex(this.rgb[0], this.rgb[1], this.rgb[2]);
            };
        });
        window.addEventListener("DOMContentLoaded", function() {
            var colorInput = document.getElementById("reminder1");
            var picker = new jscolor(colorInput);
            picker.fromHSV(0, 100, 100); // Set initial color (optional)
            picker.onFineChange = function() {
                colorInput.value = '#' + this.rgbToHex(this.rgb[0], this.rgb[1], this.rgb[2]);
            };
        });
        window.addEventListener("DOMContentLoaded", function() {
            var colorInput = document.getElementById("contract1");
            var picker = new jscolor(colorInput);
            picker.fromHSV(0, 100, 100); // Set initial color (optional)
            picker.onFineChange = function() {
                colorInput.value = '#' + this.rgbToHex(this.rgb[0], this.rgb[1], this.rgb[2]);
            };
        });
        window.addEventListener("DOMContentLoaded", function() {
            var colorInput = document.getElementById("project1");
            var picker = new jscolor(colorInput);
            picker.fromHSV(0, 100, 100); // Set initial color (optional)
            picker.onFineChange = function() {
                colorInput.value = '#' + this.rgbToHex(this.rgb[0], this.rgb[1], this.rgb[2]);
            };
        });
    </script>
@endpush
