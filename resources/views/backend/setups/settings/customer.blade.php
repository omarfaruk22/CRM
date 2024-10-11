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

            <h4 class="mt-3 mb-3">Customers</h4>

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
                    <form action="{{ route('settings.customers.update') }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="col-md-12 mb-3">
                            <label for="clients_default_theme" class="form-label">Default customers theme</label>
                            <select class="form-select form-select-sm" name="clients_default_theme"
                                id="clients_default_theme" aria-label=".form-select-sm example">

                                <option value="smart_software" @if ($clients_default_theme == 'smart_software') selected @endif>Smart
                                    Software
                                </option>

                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="customer_default_country" class="form-label">Default Country</label>
                            <select class="form-select form-select-sm mb-3" name="customer_default_country"
                                id="customer_default_country" aria-label=".form-select-sm example">
                                <option>Nothing Select</option>
                                @foreach ($country as $countries)
                                    <option value="{{ $countries->id }}" @if ($customer_default_country->id == $countries->id) selected @endif>
                                        {{ $countries->short_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="visible_customer_profile_tabs" class="form-label">Visible Tabs (Profile)</label>
                            <select class="form-select form-select-sm" name="visible_customer_profile_tabs[]"
                                id="visible_customer_profile_tabs" aria-label=".form-select-sm example" multiple>
                                @foreach ($visibles as $visible)
                                    <option value="{{ $visible->value }}"
                                        {{ in_array($visible->value, json_decode($visible_customer_profile_tabs->value, true)) ? 'selected' : '' }}>
                                        {{ $visible->name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="country" class="form-label">Required fields for registration (customers
                                area)</label>
                            <select class="form-select form-select-sm" name="required_register_fields[]"
                                id="required_register_fields" aria-label=".form-select-sm example" multiple>
                                @foreach ($requiredfields as $requiredfield)
                                    <option value="{{ $requiredfield->value }}"
                                        {{ in_array($requiredfield->value, json_decode($required_register_fields->value, true)) ? 'selected' : '' }}>
                                        {{ $requiredfield->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12">
                            <p class="form">Company field is required?</p>
                            <div class="mb-3 col-md-12 d-flex">
                                <div class="me-2">
                                    <input class="form-check-input" type="radio" name="company_is_required"
                                        id="company_is_required1" value="1"
                                        @if ($company_is_required->value == 1) checked @endif>
                                    <label class="form-check-label" for="company_is_required1">
                                        Yes
                                    </label>
                                </div>
                                <div class="me-2">
                                    <input class="form-check-input" type="radio" name="company_is_required"
                                        id="company_is_required2"
                                        value="0"@if ($company_is_required->value != 1) checked @endif>
                                    <label class="form-check-label" for="company_is_required2">
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <p class="form">Company requires the usage of the VAT Number field</p>
                            <div class="mb-3 col-md-12 d-flex">
                                <div class="me-2">
                                    <input class="form-check-input" type="radio" name="company_requires_vat_number_field"
                                        id="company_requires_vat_number_field1" value="1"
                                        @if ($company_requires_vat_number_field->value == 1) checked @endif>
                                    <label class="form-check-label" for="company_requires_vat_number_field1">
                                        Yes
                                    </label>
                                </div>
                                <div class="me-2">
                                    <input class="form-check-input" type="radio" name="company_requires_vat_number_field"
                                        id="company_requires_vat_number_field2"
                                        value="0"@if ($company_requires_vat_number_field->value != 1) checked @endif>
                                    <label class="form-check-label" for="company_requires_vat_number_field2">
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <p class="form">Allow customers to register</p>
                            <div class="mb-3 col-md-12 d-flex">
                                <div class="me-2">
                                    <input class="form-check-input" type="radio" name="allow_registration"
                                        id="allow_registration1" value="1"
                                        @if ($allow_registration->value == 1) checked @endif>
                                    <label class="form-check-label" for="allow_registration1">
                                        Yes
                                    </label>
                                </div>
                                <div class="me-2">
                                    <input class="form-check-input" type="radio" name="allow_registration"
                                        id="allow_registration2"
                                        value="0"@if ($allow_registration->value != 1) checked @endif>
                                    <label class="form-check-label" for="allow_registration2">
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <p class="form">Require registration confirmation from administrator after customer register
                            </p>
                            <div class="mb-3 col-md-12 d-flex">
                                <div class="me-2">
                                    <input class="form-check-input" type="radio"
                                        name="customers_register_require_confirmation"
                                        id="customers_register_require_confirmation1" value="1"
                                        @if ($customers_register_require_confirmation->value == 1) checked @endif>
                                    <label class="form-check-label" for="customers_register_require_confirmation1">
                                        Yes
                                    </label>
                                </div>
                                <div class="me-2">
                                    <input class="form-check-input" type="radio"
                                        name="customers_register_require_confirmation"
                                        id="customers_register_require_confirmation2"
                                        value="0"@if ($customers_register_require_confirmation->value != 1) checked @endif>
                                    <label class="form-check-label" for="customers_register_require_confirmation2">
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <p class="form">Allow primary contact to manage other customer contacts
                            </p>
                            <div class="mb-3 col-md-12 d-flex">
                                <div class="me-2">
                                    <input class="form-check-input" type="radio"
                                        name="allow_primary_contact_to_manage_other_contacts"
                                        id="allow_primary_contact_to_manage_other_contacts1" value="1"
                                        @if ($allow_primary_contact_to_manage_other_contacts->value == 1) checked @endif>
                                    <label class="form-check-label"
                                        for="allow_allow_primary_contact_to_manage_other_contacts1registration1">
                                        Yes
                                    </label>
                                </div>
                                <div class="me-2">
                                    <input class="form-check-input" type="radio"
                                        name="allow_primary_contact_to_manage_other_contacts"
                                        id="allow_primary_contact_to_manage_other_contacts2"
                                        value="0"@if ($allow_primary_contact_to_manage_other_contacts->value != 1) checked @endif>
                                    <label class="form-check-label" for="allow_primary_contact_to_manage_other_contacts2">
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <p class="form">Enable Honeypot spam validation
                            </p>
                            <div class="mb-3 col-md-12 d-flex">
                                <div class="me-2">
                                    <input class="form-check-input" type="radio" name="enable_honeypot_spam_validation"
                                        id="enable_honeypot_spam_validation1" value="1"
                                        @if ($enable_honeypot_spam_validation->value == 1) checked @endif>
                                    <label class="form-check-label" for="enable_honeypot_spam_validation1">
                                        Yes
                                    </label>
                                </div>
                                <div class="me-2">
                                    <input class="form-check-input" type="radio" name="enable_honeypot_spam_validation"
                                        id="enable_honeypot_spam_validation2"
                                        value="0"@if ($enable_honeypot_spam_validation->value != 1) checked @endif>
                                    <label class="form-check-label" for="enable_honeypot_spam_validation2">
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <p class="form">Allow primary contact to view/edit billing & shipping details
                            </p>
                            <div class="mb-3 col-md-12 d-flex">
                                <div class="me-2">
                                    <input class="form-check-input" type="radio"
                                        name="allow_primary_contact_to_view_edit_billing_and_shipping"
                                        id="allow_primary_contact_to_view_edit_billing_and_shipping1" value="1"
                                        @if ($allow_primary_contact_to_view_edit_billing_and_shipping->value == 1) checked @endif>
                                    <label class="form-check-label"
                                        for="allow_primary_contact_to_view_edit_billing_and_shipping1">
                                        Yes
                                    </label>
                                </div>
                                <div class="me-2">
                                    <input class="form-check-input" type="radio"
                                        name="allow_primary_contact_to_view_edit_billing_and_shipping"
                                        id="allow_primary_contact_to_view_edit_billing_and_shipping2"
                                        value="0"@if ($allow_primary_contact_to_view_edit_billing_and_shipping->value != 1) checked @endif>
                                    <label class="form-check-label"
                                        for="allow_primary_contact_to_view_edit_billing_and_shipping2">
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <p class="form">Contacts see only own files uploaded in customer area (files uploaded in
                                customer profile)
                            </p>
                            <div class="mb-3 col-md-12 d-flex">
                                <div class="me-2">
                                    <input class="form-check-input" type="radio" name="only_own_files_contacts"
                                        id="only_own_files_contacts1" value="1"
                                        @if ($only_own_files_contacts->value == 1) checked @endif>
                                    <label class="form-check-label" for="only_own_files_contacts1">
                                        Yes
                                    </label>
                                </div>
                                <div class="me-2">
                                    <input class="form-check-input" type="radio" name="only_own_files_contacts"
                                        id="only_own_files_contacts2"
                                        value="0"@if ($only_own_files_contacts->value != 1) checked @endif>
                                    <label class="form-check-label" for="only_own_files_contacts2">
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <p class="form">Allow contacts to delete own files uploaded from customers area
                            </p>
                            <div class="mb-3 col-md-12 d-flex">
                                <div class="me-2">
                                    <input class="form-check-input" type="radio" name="allow_contact_to_delete_files"
                                        id="allow_contact_to_delete_files1" value="1"
                                        @if ($allow_contact_to_delete_files->value == 1) checked @endif>
                                    <label class="form-check-label" for="allow_contact_to_delete_files1">
                                        Yes
                                    </label>
                                </div>
                                <div class="me-2">
                                    <input class="form-check-input" type="radio" name="allow_contact_to_delete_files"
                                        id="allow_contact_to_delete_files2"
                                        value="0"@if ($allow_contact_to_delete_files->value != 1) checked @endif>
                                    <label class="form-check-label" for="allow_contact_to_delete_files2">
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <p class="form">Use Knowledge Base
                            </p>
                            <div class="mb-3 col-md-12 d-flex">
                                <div class="me-2">
                                    <input class="form-check-input" type="radio" name="use_knowledge_base"
                                        id="use_knowledge_base1" value="1"
                                        @if ($use_knowledge_base->value == 1) checked @endif>
                                    <label class="form-check-label" for="use_knowledge_base1">
                                        Yes
                                    </label>
                                </div>
                                <div class="me-2">
                                    <input class="form-check-input" type="radio" name="use_knowledge_base"
                                        id="use_knowledge_base2"
                                        value="0"@if ($use_knowledge_base->value != 1) checked @endif>
                                    <label class="form-check-label" for="use_knowledge_base2">
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <p class="form">Allow knowledge base to be viewed without registration
                            </p>
                            <div class="mb-3 col-md-12 d-flex">
                                <div class="me-2">
                                    <input class="form-check-input" type="radio"
                                        name="knowledge_base_without_registration"
                                        id="knowledge_base_without_registration1" value="1"
                                        @if ($knowledge_base_without_registration->value == 1) checked @endif>
                                    <label class="form-check-label" for="knowledge_base_without_registration1">
                                        Yes
                                    </label>
                                </div>
                                <div class="me-2">
                                    <input class="form-check-input" type="radio"
                                        name="knowledge_base_without_registration"
                                        id="knowledge_base_without_registration2"
                                        value="0"@if ($knowledge_base_without_registration->value != 1) checked @endif>
                                    <label class="form-check-label" for="knowledge_base_without_registration2">
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="country" class="form-label">Show Estimate request link in customers area?</label>
                            <select class="form-select form-select-sm" name="show_estimate_request_in_customers_area"
                                id="show_estimate_request_in_customers_area" aria-label=".form-select-sm example">
                                <option value="0">No </option>
                                @foreach ($estimate_areas as $estimate_area)
                                    <option value="{{ $estimate_area->id }}">{{ $estimate_area->form_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <h5 class="form">Default contact permissions</h5>
                        <div class="mb-3 col-md-12 ">
                            <div class="row">
                                <div class=" mb-1 col-md-3">
                                    <label class="form-level" for="dcp_1">Invoices</label>
                                </div>
                                <div class="mb-1 col-md-9">
                                    <input class="form-check-input pinvoice" name="default_contact_permissions[]"
                                        value="1" type="checkbox" id="dcp_1"
                                        {{ in_array(1, json_decode($default_contact_permissions->value, true)) ? 'checked' : '' }}>
                                </div>
                                <div class=" mb-1 col-md-3">
                                    <label class="form-level" for="dcp_2">Estimates</label>
                                </div>
                                <div class="mb-1 col-md-9">
                                    <input class="form-check-input pestimate" name="default_contact_permissions[]"
                                        value="2" type="checkbox" id="dcp_2"
                                        {{ in_array(2, json_decode($default_contact_permissions->value, true)) ? 'checked' : '' }}>
                                </div>
                                <div class=" mb-1 col-md-3">
                                    <label class="form-level" for="dcp_3">Contracts</label>
                                </div>
                                <div class="mb-1 col-md-9">
                                    <input class="form-check-input pcontract" type="checkbox"
                                        name="default_contact_permissions[]" value="3" id="dcp_3"
                                        {{ in_array(3, json_decode($default_contact_permissions->value, true)) ? 'checked' : '' }}>
                                </div>
                                <div class=" mb-1 col-md-3">
                                    <label class="form-level" for="dcp_4">Proposals</label>
                                </div>
                                <div class="mb-1 col-md-9">
                                    <input class="form-check-input pproposal" type="checkbox"
                                        name="default_contact_permissions[]" value="4" id="dcp_4"
                                        {{ in_array(4, json_decode($default_contact_permissions->value, true)) ? 'checked' : '' }}>
                                </div>
                                <div class=" mb-1 col-md-3">
                                    <label class="form-level" for="dcp_5">Support</label>
                                </div>
                                <div class="mb-1 col-md-9">
                                    <input class="form-check-input psupport" type="checkbox"
                                        name="default_contact_permissions[]" value="5" id="dcp_5"
                                        {{ in_array(5, json_decode($default_contact_permissions->value, true)) ? 'checked' : '' }}>
                                </div>
                                <div class=" mb-1 col-md-3">
                                    <label class="form-level" for="dcp_6">Projects</label>
                                </div>
                                <div class="mb-1 col-md-9">
                                    <input class="form-check-input pproject" type="checkbox"
                                        name="default_contact_permissions[]" value="6" id="dcp_6"
                                        {{ in_array(6, json_decode($default_contact_permissions->value, true)) ? 'checked' : '' }}>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="customer_info_format" class="form-label">Company Information Format (PDF
                                and HTML)</label>
                            <textarea class="form-control mb-3" rows="7" name="customer_info_format" id="customer_info_format">
                               {{ $customer_info_format->value }}
                            </textarea>
                        </div>
                        <p>
                            <a href="#" class="settings-textarea-merge-field"
                                data-to="customer_info_format">{company_name}</a>
                            <a href="#" class="settings-textarea-merge-field"
                                data-to="customer_info_format">{address}</a>,
                            <a href="#" class="settings-textarea-merge-field"
                                data-to="customer_info_format">{city}</a>,
                            <a href="#" class="settings-textarea-merge-field"
                                data-to="customer_info_format">{state}</a>,
                            <a href="#" class="settings-textarea-merge-field"
                                data-to="customer_info_format">{zip_code}</a>,
                            <a href="#" class="settings-textarea-merge-field"
                                data-to="customer_info_format">{country_code}</a>,
                            <a href="#" class="settings-textarea-merge-field"
                                data-to="customer_info_format">{phone}</a>,
                            <a href="#" class="settings-textarea-merge-field"
                                data-to="customer_info_format">{vat_number}</a>,
                            <a href="#" class="settings-textarea-merge-field"
                                data-to="customer_info_format">{vat_number_with_label}</a>
                        </p>

                        <div class="col-md-12 mb-3 text-end">
                            <button type="submit" class="btn btn-primary">Save Settings</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var mergeFieldLinks = document.querySelectorAll('.settings-textarea-merge-field');
            var textarea = document.getElementById('customer_info_format');

            mergeFieldLinks.forEach(function(link) {
                link.addEventListener('click', function(event) {
                    event.preventDefault();
                    var mergeField = this.textContent;
                    var cursorPos = textarea.selectionStart;
                    var textBeforeCursor = textarea.value.substring(0, cursorPos);
                    var textAfterCursor = textarea.value.substring(cursorPos);
                    // Append a newline character after each merge field
                    var mergeFieldWithNewline = mergeField + '\n';
                    textarea.value = textBeforeCursor + mergeFieldWithNewline + textAfterCursor;
                });
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{-- select 2  --}}
    <script>
        $(document).ready(function() {
            $('#clients_default_theme').select2();
            $('#customer_default_country').select2();
            $('#visible_customer_profile_tabs').select2();
            $('#required_register_fields').select2();
            $('#show_estimate_request_in_customers_area').select2();

        });
    </script>
    <script>
        $(document).ready(function() {
            $("#required_register_fields").change(function() {
                $value = $(this).val();
                // alert($value);
            });
        });
    </script>
@endpush
