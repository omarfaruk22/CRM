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

            <h4 class="mt-3 mb-3">Leads</h4>

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
                    <form action="{{ route('settings.lead.update') }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="row">

                            <div class="col-md-12">
                                <label for="leads_kanban_limit" class="form-label">Limit leads kanban rows per
                                    status</label>
                                <input type="number" name="leads_kanban_limit" id="leads_kanban_limit"
                                    class="form-control mb-3" value="{{ $leads_kanban_limit->value }}">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="leads_default_status" class="form-label">Default status</label>
                                <select class="form-select form-select-sm" name="leads_default_status"
                                    id="leads_default_status" aria-label=".form-select-sm example">
                                    @foreach ($leadsstatuses as $leadsstatus)
                                        <option
                                            value="{{ $leadsstatus->id }}"{{ $leadsstatus->id == $leads_default_status->value ? 'selected' : '' }}>
                                            {{ $leadsstatus->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="Separator" class="form-label">Default source</label>
                                <select class="form-select form-select-sm" name="leads_default_source"
                                    id="leads_default_source" aria-label=".form-select-sm example">
                                    @foreach ($leadssources as $leadssource)
                                        <option value="{{ $leadssource->id }}"
                                            {{ $leadssource->id == $leads_default_source->value ? 'selected' : '' }}>
                                            {{ $leadssource->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="lead_unique_validation" class="form-label">Perform validation for duplicate lead
                                    on the
                                    following fields:</label>
                                <select class="form-select form-select-sm" name="lead_unique_validation[]"
                                    id="lead_unique_validation" multiple aria-label=".form-select-sm example">
                                    <option
                                        value="email"{{ in_array('email', json_decode($lead_unique_validation->value)) ? 'selected' : '' }}>
                                        Email Address </option>
                                    <option value="phonenumber"
                                        {{ in_array('phonenumber', json_decode($lead_unique_validation->value)) ? 'selected' : '' }}>
                                        Phone
                                    </option>
                                    <option value="website"
                                        {{ in_array('website', json_decode($lead_unique_validation->value)) ? 'selected' : '' }}>
                                        Website
                                    </option>
                                    <option value="company"
                                        {{ in_array('company', json_decode($lead_unique_validation->value)) ? 'selected' : '' }}>
                                        Company
                                    </option>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <p class="form">Auto assign as admin to customer after convert</p>
                                <div class="mb-3 col-md-12 d-flex">
                                    <div class="me-2">
                                        <input class="form-check-input" type="radio"
                                            name="auto_assign_customer_admin_after_lead_convert"
                                            id="auto_assign_customer_admin_after_lead_convert1" value="1"
                                            @if ($auto_assign_customer_admin_after_lead_convert->value == 1) checked @endif>
                                        <label class="form-check-label"
                                            for="auto_assign_customer_admin_after_lead_convert1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="me-2">
                                        <input class="form-check-input" type="radio"
                                            name="auto_assign_customer_admin_after_lead_convert"
                                            id="auto_assign_customer_admin_after_lead_convert2"
                                            value="0"@if ($auto_assign_customer_admin_after_lead_convert->value != 1) checked @endif>
                                        <label class="form-check-label"
                                            for="auto_assign_customer_admin_after_lead_convert2">
                                            No
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <p class="form">Allow non-admin staff members to import leads</p>
                                <div class="mb-3 col-md-12 d-flex">
                                    <div class="me-2">
                                        <input class="form-check-input" type="radio"
                                            name="allow_non_admin_members_to_import_leads"
                                            id="allow_non_admin_members_to_import_leads1" value="1"
                                            @if ($allow_non_admin_members_to_import_leads->value == 1) checked @endif>
                                        <label class="form-check-label" for="allow_non_admin_members_to_import_leads1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="me-2">
                                        <input class="form-check-input" type="radio"
                                            name="allow_non_admin_members_to_import_leads"
                                            id="allow_non_admin_members_to_import_leads2"
                                            value="0"@if ($allow_non_admin_members_to_import_leads->value != 1) checked @endif>
                                        <label class="form-check-label" for="allow_non_admin_members_to_import_leads2">
                                            No
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="Separator" class="form-label">Default leads kanban sort</label>
                                <select class="form-select form-select-sm" name="default_leads_kanban_sort"
                                    id="default_leads_kanban_sort" aria-label=".form-select-sm example">
                                    <option value="dateadded"
                                        {{ $default_leads_kanban_sort->value == 'phonenumber' ? 'selected' : '' }}>Date
                                        Created</option>
                                    <option value="leadorder"
                                        {{ $default_leads_kanban_sort->value == 'phonenumber' ? 'selected' : '' }}>Kanban
                                        Order</option>
                                    <option value="lastcontact"
                                        {{ $default_leads_kanban_sort->value == 'phonenumber' ? 'selected' : '' }}>Last
                                        Contact</option>
                                </select>
                            </div>

                            <div class="col-md-6 mt-4 pt-1">
                                <div class="mb-3 col-md-12 d-flex">
                                    <div class="me-2">
                                        <input class="form-check-input" type="radio"
                                            name="default_leads_kanban_sort_type" id="default_leads_kanban_sort_type1"
                                            value="asc" @if ($default_leads_kanban_sort_type->value == 'asc') checked @endif>
                                        <label class="form-check-label" for="default_leads_kanban_sort_type1">
                                            Ascending
                                        </label>
                                    </div>
                                    <div class="me-2">
                                        <input class="form-check-input" type="radio"
                                            name="default_leads_kanban_sort_type" id="default_leads_kanban_sort_type2"
                                            value="desc"@if ($default_leads_kanban_sort_type->value == 'desc') checked @endif>
                                        <label class="form-check-label" for="default_leads_kanban_sort_type2">
                                            Descending
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <p class="form">Do not allow leads to be edited after they are converted to customers
                                    (administrators not applied)</p>
                                <div class="mb-3 col-md-12 d-flex">
                                    <div class="me-2">
                                        <input class="form-check-input" type="radio"
                                            name="lead_lock_after_convert_to_customer"
                                            id="lead_lock_after_convert_to_customer1" value="1"
                                            @if ($lead_lock_after_convert_to_customer->value == 1) checked @endif>
                                        <label class="form-check-label" for="lead_lock_after_convert_to_customer1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="me-2">
                                        <input class="form-check-input" type="radio"
                                            name="lead_lock_after_convert_to_customer"
                                            id="lead_lock_after_convert_to_customer2"
                                            value="0"@if ($lead_lock_after_convert_to_customer->value != 1) checked @endif>
                                        <label class="form-check-label" for="lead_lock_after_convert_to_customer2">
                                            No
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="lead_modal_class" class="form-label">Modal Width Class (modal-lg, modal-xl,
                                    modal-xxl)</label>
                                <input type="text" name="lead_modal_class" id="lead_modal_class"
                                    class="form-control mb-3" value="{{ $lead_modal_class->value }}">
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
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{-- select 2  --}}
    <script>
        $(document).ready(function() {
            $('#lead_unique_validation').select2();


        });
    </script>
@endpush
