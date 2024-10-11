@extends('backend.layouts.main')
@section('title', 'Customer Details')
@section('content')
    @push('css')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @endpush
    <div class="row">

        <div class="col-md-3">
            <h4 class="mt-3 mb-3">Settings</h4>
            @include('backend.partials.settings-sidebar')
        </div>

        <div class="col-md-9">

            <h4 class="mt-3 mb-3">Misc</h4>

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
                    <form action="{{ route('settings.misc.update') }}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-pills mb-3 col-md-6" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" data-bs-toggle="pill" href="#primary-pills-misc"
                                            role="tab" aria-selected="false" tabindex="-1">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"></div>
                                                <div class="tab-title">Misc</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link " data-bs-toggle="pill" href="#primary-pills-tables"
                                            role="tab" aria-selected="true">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"></div>
                                                <div class="tab-title">Tables</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link " data-bs-toggle="pill" href="#primary-pills-create"
                                            role="tab" aria-selected="true">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"></div>
                                                <div class="tab-title">Inline Create</div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <hr>
                        <div class="tab-content" id="pills-tabContent">
                            {{-- misc start  --}}
                            <div class="tab-pane fade active show" id="primary-pills-misc" role="tabpanel">
                                <div class="row">

                                    <div class="col-md-12">
                                        <p class="form">Require client to be logged in to view contract</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="view_contract_only_logged_in" id="view_contract_only_logged_in1"
                                                    value="1"
                                                    {{ $view_contract_only_logged_in->value == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="view_contract_only_logged_in1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="view_contract_only_logged_in" id="view_contract_only_logged_in2"
                                                    value="0"
                                                    {{ $view_contract_only_logged_in->value != 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="view_contract_only_logged_in2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3 ">
                                        <level for="dropbox_app_key" class="form-lavel">Dropbox APP Key</level>
                                        <input type="text" class="form-control mt-2" name="dropbox_app_key"
                                            id="dropbox_app_key" value="{{ $dropbox_app_key->value }}">
                                    </div>

                                    <div class="col-md-12 mb-3 ">
                                        <level for="media_max_file_size_upload" class="form-lavel">Max file size upload in
                                            Media
                                            (MB)</level>
                                        <input type="number" class="form-control mt-2" name="media_max_file_size_upload"
                                            id="media_max_file_size_upload"
                                            value="{{ $media_max_file_size_upload->value }}">
                                    </div>

                                    <div class="col-md-12 mb-3 ">
                                        <level for="newsfeed_maximum_files_upload" class="form-lavel">Maximum files upload
                                            on
                                            post</level>
                                        <input type="number" class="form-control mt-2" name="newsfeed_maximum_files_upload"
                                            id="newsfeed_maximum_files_upload"
                                            value="{{ $newsfeed_maximum_files_upload->value }}">
                                    </div>

                                    <div class="col-md-12 mb-3 ">
                                        <level for="limit_top_search_bar_results_to" class="form-lavel">Limit Top Search
                                            Bar
                                            Results to</level>
                                        <input type="number" class="form-control mt-2"
                                            name="limit_top_search_bar_results_to" id="limit_top_search_bar_results_to"
                                            value="{{ $limit_top_search_bar_results_to->value }}">
                                    </div>

                                    <div class="col-md-12 mb-2 ">
                                        <level for="default_staff_role" class="form-lavel">Default Staff Role</level>
                                        <select class="form-select mt-2" id="default_staff_role"
                                            name="default_staff_role">
                                            @foreach ($staffs as $staff)
                                                <option
                                                    value="{{ $staff->id }}"{{ $staff->id == $default_staff_role->value ? 'selected' : '' }}>
                                                    {{ $staff->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-12 mb-3 ">
                                        <level for="delete_activity_log_older_then" class="form-lavel">Delete system
                                            activity
                                            log older then X
                                            months</level>
                                        <input type="number" class="form-control mt-2"
                                            name="delete_activity_log_older_then" id="delete_activity_log_older_then"
                                            value="{{ $delete_activity_log_older_then->value }}">
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Show setup menu item only when hover with mouse on main sidebar
                                            area
                                        </p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_setup_menu_item_only_on_hover"
                                                    id="show_setup_menu_item_only_on_hover1" value="1"
                                                    {{ $show_setup_menu_item_only_on_hover->value == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="show_setup_menu_item_only_on_hover1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_setup_menu_item_only_on_hover"
                                                    id="show_setup_menu_item_only_on_hover2" value="0"
                                                    {{ $show_setup_menu_item_only_on_hover->value != 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="show_setup_menu_item_only_on_hover2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Show help menu item on setup menu</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_help_on_setup_menu" id="show_help_on_setup_menu1"
                                                    value="1"
                                                    {{ $show_help_on_setup_menu->value == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="show_help_on_setup_menu1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_help_on_setup_menu" id="show_help_on_setup_menu2"
                                                    value="0"
                                                    {{ $show_help_on_setup_menu->value != 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="show_help_on_setup_menu2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Use minified files version for css and js (only system files)</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio" name="use_minified_files"
                                                    id="use_minified_files1" value="1"
                                                    {{ $use_minified_files->value == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="use_minified_files1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio" name="use_minified_files"
                                                    id="use_minified_files2" value="0"
                                                    {{ $use_minified_files->value != 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="use_minified_files2">
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
                            {{-- misc end  --}}
                            {{-- Signature start  --}}
                            <div class="tab-pane fade " id="primary-pills-tables" role="tabpanel">
                                <div class="row">

                                    <div class="col-md-12">
                                        <p class="form">Save last order for tables</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="save_last_order_for_tables" id="save_last_order_for_tables1"
                                                    value="1"
                                                    {{ $save_last_order_for_tables->value == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="save_last_order_for_tables1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="save_last_order_for_tables" id="save_last_order_for_tables2"
                                                    value="0"
                                                    {{ $save_last_order_for_tables->value != 1 ? 'checked' : '' }}>
                                                <label class="form-check-label" for="save_last_order_for_tables2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Show table export button</p>
                                        <div class="mb-3 col-md-12 ">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_table_export_button" id="show_table_export_button3"
                                                    value="to_all"
                                                    {{ $show_table_export_button->value == 'to_all' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="show_table_export_button3">
                                                    To all staff members
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_table_export_button" id="show_table_export_button2"
                                                    value="only_admins"
                                                    {{ $show_table_export_button->value == 'only_admins' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="show_table_export_button2">
                                                    Only to administrators
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_table_export_button" id="show_table_export_button3"
                                                    value="hide"
                                                    {{ $show_table_export_button->value == 'hide' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="show_table_export_button3">
                                                    Hide export button for all staff members
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3 ">
                                        <level for="tables_pagination_limit" class="form-lavel">Tables Pagination Limit
                                        </level>
                                        <input type="number" class="form-control mt-2" name="tables_pagination_limit"
                                            id="tables_pagination_limit" value="{{ $tables_pagination_limit->value }}">
                                    </div>

                                    <div class="col-md-12 mb-3 text-end">
                                        <button type="submit" class="btn btn-primary">Save Settings</button>
                                    </div>

                                </div>
                            </div>
                            {{-- Signature end  --}}
                            {{-- document Formets start  --}}
                            <div class="tab-pane fade " id="primary-pills-create" role="tabpanel">
                                <div class="row">

                                    <div class="col-md-12">
                                        <p class="form">Allow non-admin staff members to create Lead Status in Lead
                                            create/edit area?</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="staff_members_create_inline_lead_status"
                                                    id="staff_members_create_inline_lead_status1" value="1"
                                                    {{ $staff_members_create_inline_lead_status->value == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="staff_members_create_inline_lead_status1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="staff_members_create_inline_lead_status"
                                                    id="staff_members_create_inline_lead_status2" value="0"
                                                    {{ $staff_members_create_inline_lead_status->value != 1 ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="staff_members_create_inline_lead_status2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Allow non-admin staff members to create Lead Source in Lead
                                            create/edit area?</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="staff_members_create_inline_lead_source"
                                                    id="staff_members_create_inline_lead_source1" value="1"
                                                    {{ $staff_members_create_inline_lead_source->value == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="staff_members_create_inline_lead_source1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="staff_members_create_inline_lead_source"
                                                    id="staff_members_create_inline_lead_source2" value="0"
                                                    {{ $staff_members_create_inline_lead_source->value != 1 ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="staff_members_create_inline_lead_source2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Allow non-admin staff members to create Customer Group in
                                            Customer
                                            create/edit area?</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="staff_members_create_inline_customer_groups"
                                                    id="staff_members_create_inline_customer_groups1" value="1"
                                                    {{ $staff_members_create_inline_customer_groups->value == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="staff_members_create_inline_customer_groups1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="staff_members_create_inline_customer_groups"
                                                    id="staff_members_create_inline_customer_groups2" value="0"
                                                    {{ $staff_members_create_inline_customer_groups->value != 1 ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="staff_members_create_inline_customer_groups2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Allow non-admin staff members to create Service in Ticket
                                            create/edit
                                            area?</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="staff_members_create_inline_ticket_services"
                                                    id="staff_members_create_inline_ticket_services1" value="1"
                                                    {{ $staff_members_create_inline_ticket_services->value == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="staff_members_create_inline_ticket_services1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="staff_members_create_inline_ticket_services"
                                                    id="staff_members_create_inline_ticket_services2" value="0"
                                                    {{ $staff_members_create_inline_ticket_services->value != 1 ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="staff_members_create_inline_ticket_services2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Allow non-admin staff members to save predefined replies from
                                            ticket
                                            message</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="staff_members_save_tickets_predefined_replies"
                                                    id="staff_members_save_tickets_predefined_replies1" value="1"
                                                    {{ $staff_members_save_tickets_predefined_replies->value == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="staff_members_save_tickets_predefined_replies1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="staff_members_save_tickets_predefined_replies"
                                                    id="staff_members_save_tickets_predefined_replies2" value="0"
                                                    {{ $staff_members_save_tickets_predefined_replies->value != 1 ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="staff_members_save_tickets_predefined_replies2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Allow non-admin staff members to create Contract type in Contract
                                            create/edit area?</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="staff_members_create_inline_contract_types"
                                                    id="staff_members_create_inline_contract_types1" value="1"
                                                    {{ $staff_members_create_inline_contract_types->value == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="staff_members_create_inline_contract_types1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="staff_members_create_inline_contract_types"
                                                    id="staff_members_create_inline_contract_types2" value="0"
                                                    {{ $staff_members_create_inline_contract_types->value != 1 ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="staff_members_create_inline_contract_types2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Allow non-admin staff members to create Expense Category in
                                            Expense
                                            create/edit area?</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="staff_members_create_inline_expense_categories"
                                                    id="staff_members_create_inline_expense_categories1" value="1"
                                                    {{ $staff_members_create_inline_expense_categories->value == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="staff_members_create_inline_expense_categories1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="staff_members_create_inline_expense_categories"
                                                    id="staff_members_create_inline_expense_categories2" value="0"
                                                    {{ $staff_members_create_inline_expense_categories->value != 1 ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="staff_members_create_inline_expense_categories2">
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
                            {{-- docoument formet end  --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{-- select 2  --}}
    <script>
        $(document).ready(function() {
            $('#default_staff_role').select2();
        });
    </script>
@endpush
