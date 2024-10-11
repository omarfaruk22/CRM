@extends('backend.layouts.main')
@section('title', 'Customer Details')
@section('content')
    <div class="row">

        <div class="col-md-3">
            <h4 class="mt-3 mb-3">Settings</h4>
            @include('backend.partials.settings-sidebar')
        </div>

        <div class="col-md-9">

            <h4 class="mt-3 mb-3">Corn Job</h4>

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
                    <form action="{{ route('settings.cron_jobs.update') }}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-pills mb-3 col-md-12" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" data-bs-toggle="pill" href="#primary-pills-command"
                                            role="tab" aria-selected="false" tabindex="-1">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"></div>
                                                <div class="tab-title">Command</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link " data-bs-toggle="pill" href="#primary-pills-invoice"
                                            role="tab" aria-selected="true">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"></div>
                                                <div class="tab-title">Invoice</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link " data-bs-toggle="pill" href="#primary-pills-estimate"
                                            role="tab" aria-selected="true">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"></div>
                                                <div class="tab-title">Estimates</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link " data-bs-toggle="pill" href="#primary-pills-proposals"
                                            role="tab" aria-selected="true">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"></div>
                                                <div class="tab-title">Proposals</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link " data-bs-toggle="pill" href="#primary-pills-expences"
                                            role="tab" aria-selected="true">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"></div>
                                                <div class="tab-title">Expences</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link " data-bs-toggle="pill" href="#primary-pills-contracts"
                                            role="tab" aria-selected="true">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"></div>
                                                <div class="tab-title">Contracts</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link " data-bs-toggle="pill" href="#primary-pills-tasks"
                                            role="tab" aria-selected="true">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"></div>
                                                <div class="tab-title">Tasks</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link " data-bs-toggle="pill" href="#primary-pills-tickets"
                                            role="tab" aria-selected="true">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"></div>
                                                <div class="tab-title">Tickets</div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <hr>
                        <div class="tab-content" id="pills-tabContent">
                            {{-- command start  --}}
                            <div class="tab-pane fade active show" id="primary-pills-command" role="tabpanel">
                                <div class="row">
                                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                                        CRON COMMAND: wget -q -O- https://democrm.smarterp.biz/cron/index
                                        Run Cron Manually
                                    </div>
                                </div>
                            </div>
                            {{-- command end  --}}
                            {{-- invoice start  --}}
                            <div class="tab-pane fade show" id="primary-pills-invoice" role="tabpanel">
                                <div class="row">

                                    <div class="col-md-12 mb-3 ">
                                        <level for="invoice_auto_operations_hour" class="form-lavel">Hour of day to
                                            perform automatic
                                            operations
                                        </level>
                                        <input type="number" class="form-control mt-2"
                                            name="invoice_auto_operations_hour" id="invoice_auto_operations_hour"
                                            value="{{ $invoice_auto_operations_hour->value }}">
                                    </div>

                                    <h6>Overdue Notices</h6>
                                    <p>Overdue notices are sent when the invoice becomes overdue.</p>
                                    <div class="col-md-6 mb-3 ">
                                        <level for="automatically_send_invoice_overdue_reminder_after" class="form-lavel">
                                            Auto send reminder after (days)</level>
                                        <input type="number" class="form-control mt-2"
                                            name="automatically_send_invoice_overdue_reminder_after"
                                            id="automatically_send_invoice_overdue_reminder_after"
                                            value="{{ $automatically_send_invoice_overdue_reminder_after->value }}">
                                    </div>

                                    <div class="col-md-6 mb-3 ">
                                        <level for="automatically_resend_invoice_overdue_reminder_after"
                                            class="form-lavel">Auto re-send reminder after (days)
                                        </level>
                                        <input type="number" class="form-control mt-2"
                                            name="automatically_resend_invoice_overdue_reminder_after"
                                            id="automatically_resend_invoice_overdue_reminder_after"
                                            value="{{ $automatically_resend_invoice_overdue_reminder_after->value }}">
                                    </div>

                                    <h6>Due Reminders</h6>
                                    <p>Due reminders are sent to unpaid and partially paid invoices as reminder to the
                                        customer
                                        to pay the invoice before is due.</p>
                                    <div class="col-md-6 mb-3 ">
                                        <level for="invoice_due_notice_before" class="form-lavel">Send due reminder X days
                                            before due date
                                        </level>
                                        <input type="number" class="form-control mt-2" name="invoice_due_notice_before"
                                            id="invoice_due_notice_before"
                                            value="{{ $invoice_due_notice_before->value }}">
                                    </div>

                                    <div class="col-md-6 mb-3 ">
                                        <level for="invoice_due_notice_resend_after" class="form-lavel">Auto re-send
                                            reminder after (days)
                                        </level>
                                        <input type="number" class="form-control mt-2"
                                            name="invoice_due_notice_resend_after" id="invoice_due_notice_resend_after"
                                            value="{{ $invoice_due_notice_resend_after->value }}">
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Recurring Invoices</p>
                                        <div class="mb-3 col-md-12">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="new_recurring_invoice_action" id="new_recurring_invoice_action1"
                                                    value="generate_and_send"
                                                    @if ($new_recurring_invoice_action->value == 'generate_and_send') checked @endif>
                                                <label class="form-check-label" for="new_recurring_invoice_action1">
                                                    Generate and autosend the renewed invoice to the customer
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="new_recurring_invoice_action" id="new_recurring_invoice_action2"
                                                    value="generate_unpaid"
                                                    @if ($new_recurring_invoice_action->value == 'generate_unpaid') checked @endif>
                                                <label class="form-check-label" for="new_recurring_invoice_action2">
                                                    Generate a Unpaid Invoice
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="new_recurring_invoice_action" id="new_recurring_invoice_action3"
                                                    value="generate_draft"
                                                    @if ($new_recurring_invoice_action->value == 'generate_draft') checked @endif>
                                                <label class="form-check-label" for="new_recurring_invoice_action3">
                                                    Generate a Draft Invoice
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form"> Create new invoice from recurring invoice only if the invoice is
                                            with status paid?</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="create_invoice_from_recurring_only_on_paid_invoices"
                                                    id="create_invoice_from_recurring_only_on_paid_invoices1"
                                                    value="1" @if ($create_invoice_from_recurring_only_on_paid_invoices->value == 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="create_invoice_from_recurring_only_on_paid_invoices1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="create_invoice_from_recurring_only_on_paid_invoices"
                                                    id="create_invoice_from_recurring_only_on_paid_invoices2"
                                                    value="0" @if ($create_invoice_from_recurring_only_on_paid_invoices->value != 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="create_invoice_from_recurring_only_on_paid_invoices2">
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
                            {{-- invoice end  --}}
                            {{-- estimate start  --}}
                            <div class="tab-pane fade " id="primary-pills-estimate" role="tabpanel">
                                <div class="row">

                                    <div class="col-md-12 mb-3 ">
                                        <level for="estimates_auto_operations_hour" class="form-lavel">Hour of day to
                                            perform automatic
                                            operations
                                        </level>
                                        <input type="number" class="form-control mt-2"
                                            name="estimates_auto_operations_hour" id="estimates_auto_operations_hour"
                                            value="{{ $estimates_auto_operations_hour->value }}">
                                    </div>

                                    <div class="col-md-12 mb-3 ">
                                        <level for="send_estimate_expiry_reminder_before" class="form-lavel">Send
                                            expiration reminder before (DAYS)
                                        </level>
                                        <input type="number" class="form-control mt-2"
                                            name="send_estimate_expiry_reminder_before"
                                            id="send_estimate_expiry_reminder_before"
                                            value="{{ $send_estimate_expiry_reminder_before->value }}">
                                    </div>

                                    <div class="col-md-12 mb-3 text-end">
                                        <button type="submit" class="btn btn-primary">Save Settings</button>
                                    </div>

                                </div>
                            </div>
                            {{-- estimate end  --}}
                            {{-- proposals  start  --}}
                            <div class="tab-pane fade " id="primary-pills-proposals" role="tabpanel">
                                <div class="row">

                                    <div class="col-md-12 mb-3 ">
                                        <level for="proposals_auto_operations_hour" class="form-lavel">Hour of day to
                                            perform automatic
                                            operations
                                        </level>
                                        <input type="number" class="form-control mt-2"
                                            name="proposals_auto_operations_hour" id="proposals_auto_operations_hour"
                                            value="{{ $proposals_auto_operations_hour->value }}">
                                    </div>

                                    <div class="col-md-12 mb-3 ">
                                        <level for="send_proposal_expiry_reminder_before" class="form-lavel">Send
                                            expiration reminder before (DAYS)
                                        </level>
                                        <input type="number" class="form-control mt-2"
                                            name="send_proposal_expiry_reminder_before"
                                            id="send_proposal_expiry_reminder_before"
                                            value="{{ $send_proposal_expiry_reminder_before->value }}">
                                    </div>

                                    <div class="col-md-12 mb-3 text-end">
                                        <button type="submit" class="btn btn-primary">Save Settings</button>
                                    </div>
                                </div>
                            </div>
                            {{-- proposals  end  --}}
                            {{-- expences start  --}}
                            <div class="tab-pane fade " id="primary-pills-expences" role="tabpanel">
                                <div class="row">

                                    <div class="col-md-12 mb-3 ">
                                        <level for="expenses_auto_operations_hour" class="form-lavel">Hour of day to
                                            perform automatic
                                            operations
                                        </level>
                                        <input type="number" class="form-control mt-2"
                                            name="expenses_auto_operations_hour" id="expenses_auto_operations_hour"
                                            value="{{ $expenses_auto_operations_hour->value }}">
                                    </div>

                                    <div class="col-md-12 mb-3 text-end">
                                        <button type="submit" class="btn btn-primary">Save Settings</button>
                                    </div>
                                </div>
                            </div>
                            {{-- expences end  --}}
                            {{--  contracts start  --}}
                            <div class="tab-pane fade " id="primary-pills-contracts" role="tabpanel">
                                <div class="row">

                                    <div class="col-md-12 mb-3 ">
                                        <level for="contracts_auto_operations_hour" class="form-lavel">Hour of day to
                                            perform automatic
                                            operations
                                        </level>
                                        <input type="number" class="form-control mt-2"
                                            name="contracts_auto_operations_hour" id="contracts_auto_operations_hour"
                                            value="{{ $contracts_auto_operations_hour->value }}">
                                    </div>

                                    <div class="col-md-12 mb-3 ">
                                        <level for="contract_expiration_before" class="form-lavel">Send expiration
                                            reminder before (DAYS)
                                        </level>
                                        <input type="number" class="form-control mt-2" name="contract_expiration_before"
                                            id="contract_expiration_before"
                                            value="{{ $contract_expiration_before->value }}">
                                    </div>

                                    <h6>Sign Reminders</h6>
                                    <p>Sign reminders are sent to the customer contacts after the contract is first time
                                        sent to
                                        the customer and they are automatically stopped when the contract is signed.</p>
                                    <div class="col-md-12 mb-3 ">
                                        <level for="contract_sign_reminder_every_days" class="form-lavel">Send expiration
                                            reminder before (DAYS)
                                        </level>
                                        <input type="number" class="form-control mt-2"
                                            name="contract_sign_reminder_every_days"
                                            id="contract_sign_reminder_every_days"
                                            value="{{ $contract_sign_reminder_every_days->value }}">
                                    </div>

                                    <div class="col-md-12 mb-3 text-end">
                                        <button type="submit" class="btn btn-primary">Save Settings</button>
                                    </div>
                                </div>

                            </div>
                            {{-- contracts end  --}}
                            {{--  tasks start  --}}
                            <div class="tab-pane fade " id="primary-pills-tasks" role="tabpanel">
                                <div class="row">

                                    <div class="col-md-12 mb-3 ">
                                        <level for="tasks_reminder_notification_hour" class="form-lavel">Hour of day to
                                            perform automatic
                                            operations
                                        </level>
                                        <input type="number" class="form-control mt-2"
                                            name="tasks_reminder_notification_hour" id="tasks_reminder_notification_hour"
                                            value="{{ $tasks_reminder_notification_hour->value }}">
                                    </div>

                                    <div class="col-md-12 mb-3 ">
                                        <level for="tasks_reminder_notification_before" class="form-lavel">Task deadline
                                            reminder before (Days)
                                        </level>
                                        <input type="number" class="form-control mt-2"
                                            name="tasks_reminder_notification_before"
                                            id="tasks_reminder_notification_before"
                                            value="{{ $tasks_reminder_notification_before->value }}">
                                    </div>

                                    <div class="col-md-12 mb-3 ">
                                        <level for="automatically_stop_task_timer_after_hours" class="form-lavel">
                                            Automaticaly stop task timers after
                                            (hours)
                                        </level>
                                        <input type="number" class="form-control mt-2"
                                            name="automatically_stop_task_timer_after_hours"
                                            id="automatically_stop_task_timer_after_hours"
                                            value="{{ $automatically_stop_task_timer_after_hours->value }}">
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Send an email reminder of billable tasks completed but not billed
                                        </p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="reminder_for_completed_but_not_billed_tasks"
                                                    id="reminder_for_completed_but_not_billed_tasks1" value="1"
                                                    @if ($reminder_for_completed_but_not_billed_tasks->value == 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="reminder_for_completed_but_not_billed_tasks1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="reminder_for_completed_but_not_billed_tasks"
                                                    id="reminder_for_completed_but_not_billed_tasks2" value="0"
                                                    @if ($reminder_for_completed_but_not_billed_tasks->value != 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="reminder_for_completed_but_not_billed_tasks2">
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
                            {{--  tasks end  --}}
                            {{-- ticket  start  --}}
                            <div class="tab-pane fade " id="primary-pills-tickets" role="tabpanel">
                                <div class="row">

                                    <div class="col-md-12 mb-3 ">
                                        <level for="autoclose_tickets_after" class="form-lavel">Auto close ticket after
                                            (Hours)</level>
                                        <input type="number" class="form-control mt-2" name="autoclose_tickets_after"
                                            id="autoclose_tickets_after" value="{{ $autoclose_tickets_after->value }}">
                                    </div>

                                    <div class="col-md-12 mb-3 text-end">
                                        <button type="submit" class="btn btn-primary">Save Settings</button>
                                    </div>
                                </div>
                            </div>
                            {{-- ticket  end  --}}
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
