@extends('backend.layouts.main')
@section('title', 'Customer Details')
@section('content')
    <div class="row">

        <div class="col-md-3">
            <h4 class="mt-3 mb-3">Settings</h4>
            @include('backend.partials.settings-sidebar')
        </div>

        <div class="col-md-9">

            <h4 class="mt-3 mb-3">Support</h4>

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
                    <form action="{{ route('settings.support.update') }}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-pills mb-3 col-md-6" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" data-bs-toggle="pill" href="#primary-pills-general"
                                            role="tab" aria-selected="false" tabindex="-1">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"></div>
                                                <div class="tab-title">General</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link " data-bs-toggle="pill" href="#primary-pills-piping"
                                            role="tab" aria-selected="true">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"></div>
                                                <div class="tab-title">Email Piping</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link " data-bs-toggle="pill" href="#primary-pills-form" role="tab"
                                            aria-selected="true">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"></div>
                                                <div class="tab-title">Ticket Form</div>
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

                                    <div class="col-md-12">
                                        <p class="form">Use services
                                        </p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio" name="services"
                                                    id="services1" value="1"
                                                    @if ($services->value == 1) checked @endif>
                                                <label class="form-check-label" for="services1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio" name="services"
                                                    id="services2"
                                                    value="0"@if ($services->value != 1) checked @endif>
                                                <label class="form-check-label" for="services2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Allow staff to access only ticket that belongs to staff
                                            departments
                                        </p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="staff_access_only_assigned_departments"
                                                    id="staff_access_only_assigned_departments1" value="1"
                                                    @if ($staff_access_only_assigned_departments->value == 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="staff_access_only_assigned_departments1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="staff_access_only_assigned_departments"
                                                    id="staff_access_only_assigned_departments2"
                                                    value="0"@if ($staff_access_only_assigned_departments->value != 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="staff_access_only_assigned_departments2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Send staff-related ticket notifications to the ticket assignee
                                            only
                                        </p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="staff_related_ticket_notification_to_assignee_only"
                                                    id="staff_related_ticket_notification_to_assignee_only1"
                                                    value="1" @if ($staff_related_ticket_notification_to_assignee_only->value == 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="staff_related_ticket_notification_to_assignee_only1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="staff_related_ticket_notification_to_assignee_only"
                                                    id="staff_related_ticket_notification_to_assignee_only2"
                                                    value="0"@if ($staff_related_ticket_notification_to_assignee_only->value != 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="staff_related_ticket_notification_to_assignee_only2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Receive notification on new ticket opened
                                        </p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="receive_notification_on_new_ticket"
                                                    id="receive_notification_on_new_ticket1" value="1"
                                                    @if ($receive_notification_on_new_ticket->value == 1) checked @endif>
                                                <label class="form-check-label" for="receive_notification_on_new_ticket1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="receive_notification_on_new_ticket"
                                                    id="receive_notification_on_new_ticket2"
                                                    value="0"@if ($receive_notification_on_new_ticket->value != 1) checked @endif>
                                                <label class="form-check-label" for="receive_notification_on_new_ticket2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Receive notification when customer reply to a ticket
                                        </p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="receive_notification_on_new_ticket_replies"
                                                    id="receive_notification_on_new_ticket_replies1" value="1"
                                                    @if ($receive_notification_on_new_ticket_replies->value == 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="receive_notification_on_new_ticket_replies1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="receive_notification_on_new_ticket_replies"
                                                    id="receive_notification_on_new_ticket_replies2"
                                                    value="0"@if ($receive_notification_on_new_ticket_replies->value != 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="receive_notification_on_new_ticket_replies2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form"> Allow staff members to open tickets to all contacts?
                                        </p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="staff_members_open_tickets_to_all_contacts"
                                                    id="staff_members_open_tickets_to_all_contacts1" value="1"
                                                    @if ($staff_members_open_tickets_to_all_contacts->value == 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="staff_members_open_tickets_to_all_contacts1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="staff_members_open_tickets_to_all_contacts"
                                                    id="staff_members_open_tickets_to_all_contacts2"
                                                    value="0"@if ($staff_members_open_tickets_to_all_contacts->value != 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="staff_members_open_tickets_to_all_contacts2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form"> Automatically assign the ticket to the first staff that post a
                                            reply?
                                        </p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="automatically_assign_ticket_to_first_staff_responding"
                                                    id="automatically_assign_ticket_to_first_staff_responding1"
                                                    value="1" @if ($automatically_assign_ticket_to_first_staff_responding->value == 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="automatically_assign_ticket_to_first_staff_responding1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="automatically_assign_ticket_to_first_staff_responding"
                                                    id="automatically_assign_ticket_to_first_staff_responding2"
                                                    value="0"@if ($automatically_assign_ticket_to_first_staff_responding->value != 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="automatically_assign_ticket_to_first_staff_responding2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form"> Allow access to tickets for non staff members
                                        </p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="access_tickets_to_none_staff_members"
                                                    id="access_tickets_to_none_staff_members1" value="1"
                                                    @if ($access_tickets_to_none_staff_members->value == 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="access_tickets_to_none_staff_members1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="access_tickets_to_none_staff_members"
                                                    id="access_tickets_to_none_staff_members2"
                                                    value="0"@if ($access_tickets_to_none_staff_members->value != 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="access_tickets_to_none_staff_members2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Allow non-admin staff members to delete ticket attachments
                                        </p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="allow_non_admin_staff_to_delete_ticket_attachments"
                                                    id="allow_non_admin_staff_to_delete_ticket_attachments1"
                                                    value="1" @if ($allow_non_admin_staff_to_delete_ticket_attachments->value == 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="allow_non_admin_staff_to_delete_ticket_attachments1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="allow_non_admin_staff_to_delete_ticket_attachments"
                                                    id="allow_non_admin_staff_to_delete_ticket_attachments2"
                                                    value="0"@if ($allow_non_admin_staff_to_delete_ticket_attachments->value != 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="allow_non_admin_staff_to_delete_ticket_attachments2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Allow non-admin staff members to delete tickets and replies
                                        </p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="allow_non_admin_members_to_delete_tickets_and_replies"
                                                    id="allow_non_admin_members_to_delete_tickets_and_replies1"
                                                    value="1" @if ($allow_non_admin_members_to_delete_tickets_and_replies->value == 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="allow_non_admin_members_to_delete_tickets_and_replies1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="allow_non_admin_members_to_delete_tickets_and_replies"
                                                    id="allow_non_admin_members_to_delete_tickets_and_replies2"
                                                    value="0"@if ($allow_non_admin_members_to_delete_tickets_and_replies->value != 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="allow_non_admin_members_to_delete_tickets_and_replies2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Allow customer to change ticket status from customers area
                                        </p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="allow_customer_to_change_ticket_status"
                                                    id="allow_customer_to_change_ticket_status1" value="1"
                                                    @if ($allow_customer_to_change_ticket_status->value == 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="allow_customer_to_change_ticket_status1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="allow_customer_to_change_ticket_status"
                                                    id="allow_customer_to_change_ticket_status2"
                                                    value="0"@if ($allow_customer_to_change_ticket_status->value != 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="allow_customer_to_change_ticket_status2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">In customers area only show tickets related to the logged in
                                            contact
                                            (Primary contact not applied)
                                        </p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="only_show_contact_tickets" id="only_show_contact_tickets1"
                                                    value="1" @if ($only_show_contact_tickets->value == 1) checked @endif>
                                                <label class="form-check-label" for="only_show_contact_tickets1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="only_show_contact_tickets" id="only_show_contact_tickets2"
                                                    value="0"@if ($only_show_contact_tickets->value != 1) checked @endif>
                                                <label class="form-check-label" for="only_show_contact_tickets2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Ticket Replies Order
                                        </p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="ticket_replies_order" id="ticket_replies_order1" value="1"
                                                    @if ($ticket_replies_order->value == 'asc') checked @endif>
                                                <label class="form-check-label" for="ticket_replies_order1">
                                                    Ascending
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="ticket_replies_order" id="ticket_replies_order2"
                                                    value="0"@if ($ticket_replies_order->value != 'desc') checked @endif>
                                                <label class="form-check-label" for="ticket_replies_order2">
                                                    Descending
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Enable support menu item badge
                                        </p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="enable_support_menu_badges" id="enable_support_menu_badges1"
                                                    value="1" @if ($enable_support_menu_badges->value == 1) checked @endif>
                                                <label class="form-check-label" for="enable_support_menu_badges1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="enable_support_menu_badges" id="enable_support_menu_badges2"
                                                    value="0"@if ($enable_support_menu_badges->value != 1) checked @endif>
                                                <label class="form-check-label" for="enable_support_menu_badges2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="bcc" class="form-label">Default status selected when replying to
                                            ticket</label>
                                        <select class="form-select form-select-sm" name="default_ticket_reply_status"
                                            id="default_ticket_reply_status" aria-label=".form-select-sm example">
                                            @foreach ($ticketstatus as $tstatus)
                                                <option value="{{ $tstatus->id }}"
                                                    {{ $tstatus->id == $default_ticket_reply_status->value ? 'selected' : '' }}>
                                                    {{ $tstatus->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="maximum_allowed_ticket_attachments" class="form-label">Maximum ticket
                                            attachments</label>
                                        <input type="number" name="maximum_allowed_ticket_attachments"
                                            id="maximum_allowed_ticket_attachments" class="form-control mb-3"
                                            value="{{ $maximum_allowed_ticket_attachments->value }}">
                                    </div>

                                    <div class="col-md-12">
                                        <label for="ticket_attachments_file_extensions" class="form-label">Allowed
                                            attachments file
                                            extensions</label>
                                        <input type="text" name="ticket_attachments_file_extensions"
                                            id="ticket_attachments_file_extensions" class="form-control mb-3"
                                            value="{{ $ticket_attachments_file_extensions->value }}">

                                    </div>

                                    <div class="col-md-12 mb-3 text-end">
                                        <button type="submit" class="btn btn-primary">Save Settings</button>
                                    </div>

                                </div>
                            </div>
                            {{-- general end  --}}
                            {{-- email piping start  --}}
                            <div class="tab-pane fade show" id="primary-pills-piping" role="tabpanel">
                                <div class="row">
                                    <p class="mb-2">cPanel forwarder path: <span
                                            class="text-danger">/home/democrm.smarterp.biz/public_html/pipe.php</span></p>

                                    <div class="col-md-12">
                                        <p class="form">Pipe Only on Registered Users
                                        </p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="email_piping_only_registered" id="email_piping_only_registered1"
                                                    value="1" @if ($email_piping_only_registered->value == 1) checked @endif>
                                                <label class="form-check-label" for="email_piping_only_registered1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="email_piping_only_registered" id="email_piping_only_registered2"
                                                    value="0"@if ($email_piping_only_registered->value != 1) checked @endif>
                                                <label class="form-check-label" for="email_piping_only_registered2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Only Replies Allowed by Email
                                        </p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="email_piping_only_replies" id="email_piping_only_replies1"
                                                    value="1" @if ($email_piping_only_replies->value == 1) checked @endif>
                                                <label class="form-check-label" for="email_piping_only_replies1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="email_piping_only_replies" id="email_piping_only_replies2"
                                                    value="0"@if ($email_piping_only_replies->value != 1) checked @endif>
                                                <label class="form-check-label" for="email_piping_only_replies2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Try to import only the actual ticket reply (without
                                            quoted/forwarded
                                            message)
                                        </p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="ticket_import_reply_only" id="ticket_import_reply_only1"
                                                    value="1" @if ($ticket_import_reply_only->value == 1) checked @endif>
                                                <label class="form-check-label" for="ticket_import_reply_only1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="ticket_import_reply_only" id="ticket_import_reply_only2"
                                                    value="0"@if ($ticket_import_reply_only->value != 1) checked @endif>
                                                <label class="form-check-label" for="ticket_import_reply_only2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="bcc" class="form-label">Default priority on piped ticket</label>
                                        <select class="form-select form-select-sm" name="email_piping_default_priority"
                                            id="email_piping_default_priority" aria-label=".form-select-sm example">
                                            @foreach ($ticketpriorities as $ticketprioritiy)
                                                <option
                                                    value="{{ $ticketprioritiy->id }}"{{ $ticketprioritiy->id == $email_piping_default_priority->value ? 'selected' : '' }}>
                                                    {{ $ticketprioritiy->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-12 mb-3 text-end">
                                        <button type="submit" class="btn btn-primary">Save Settings</button>
                                    </div>

                                </div>
                            </div>
                            {{-- email piping end  --}}
                            {{-- ticket form start  --}}
                            <div class="tab-pane fade " id="primary-pills-form" role="tabpanel">
                                <div class="row">
                                    <h5 class="mb-2">Form Info</h5>
                                    <p><b>Form url:</b>
                                        <span class="label label-default">
                                            <a href=" {{ route('settings.support.ticketform') }}" target="_blank">
                                                https://democrm.smarterp.biz/forms/ticket
                                            </a>
                                        </span>
                                    </p>
                                    <p class="mb-2"><b>Form file location:</b>
                                        <span class="text-danger">/home/democrm.smarterp.biz/public_html/pipe.php</span>
                                    </p>
                                    <hr>
                                    <p class="mb-2"><b>Embed form</b></p>

                                    <div class="col-md-12">
                                        <label for="company" class="form-label">Copy & Paste the code anywhere in your
                                            site
                                            to show the form, additionally you can adjust the width and height px to fit for
                                            your website.</label>
                                        <textarea type="text" name="company" rows="2" id="company" value="" class="form-control mb-3">
                                    <iframe width="600" height="850" href=" {{ route('settings.support.ticketform') }}" frameborder="0" allowfullscreen></iframe>
                                </textarea>
                                        @error('company')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <h6 class="mb-2">Share direct link</h6>
                                    <p>
                                        <span class="label label-default">
                                            <a href=" {{ route('settings.support.ticketform') }}" target="_blank">
                                                https://democrm.smarterp.biz/forms/ticket?styled=1

                                            </a>
                                        </span>
                                    </p>
                                    <p>
                                        <span class="label">
                                            <a href=" {{ route('settings.support.ticketform') }}" target="_blank">
                                                https://democrm.smarterp.biz/forms/ticket?styled=1&with_logo=1

                                            </a>
                                        </span>
                                    </p>
                                    <h6>When placing the iframe snippet code consider the following:</h6>
                                    <p>1. If the protocol of your installation is http use a http page inside the iframe.
                                    </p>
                                    <p class="text-success">2. If the protocol of your installation is https use a https
                                        page
                                        inside the iframe.</p>
                                    <p>None SSL installation will need to place the link in non ssl eq. landing page and
                                        backwards.</p>
                                    <h6 class="mb-2">Change form container column (Bootstrap)</h6>
                                    <p>
                                        <span class="label label-default">
                                            <a href=" {{ route('settings.support.ticketform') }}" target="_blank">
                                                https://democrm.smarterp.biz/forms/ticket?col=col-md-8

                                            </a>
                                        </span>
                                    </p>
                                    <p>
                                        <span class="label label-default">
                                            <a href=" {{ route('settings.support.ticketform') }}" target="_blank">
                                                https://democrm.smarterp.biz/forms/ticket?col=col-md-8+col-md-offset-2

                                            </a>
                                        </span>
                                    </p>
                                    <p>
                                        <span class="label label-default">
                                            <a href=" {{ route('settings.support.ticketform') }}" target="_blank">
                                                https://democrm.smarterp.biz/forms/ticket?col=col-md-5

                                            </a>
                                        </span>
                                    </p>
                                    <h6 class="mb-2">Specifiy language</h6>
                                    <p>
                                        <span class="label label-default">
                                            <a href=" {{ route('settings.support.ticketform') }}" target="_blank">
                                                https://democrm.smarterp.biz/forms/ticket?language=english

                                            </a>
                                        </span>
                                    </p>
                                </div>

                                <div class="col-md-12 mb-3 text-end">
                                    <button type="submit" class="btn btn-primary">Save Settings</button>
                                </div>

                            </div>
                            {{-- ticket piping end  --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
