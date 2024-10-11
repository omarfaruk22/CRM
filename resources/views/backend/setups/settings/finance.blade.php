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
            <h4 class="mt-3 mb-3">Finance</h4>
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
                    <form action="{{ route('settings.finance.update') }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-pills mb-3 col-md-8" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" data-bs-toggle="pill" href="#primary-pills-general"
                                            role="tab" aria-selected="false" tabindex="-1">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"></div>
                                                <div class="tab-titles">General</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="pill" href="#primary-pills-invoices"
                                            role="tab" aria-selected="true">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"></div>
                                                <div class="tab-title">Invoices</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="pill" href="#primary-pills-credit-notes"
                                            role="tab" aria-selected="true">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"></div>
                                                <div class="tab-title">Credit Notes</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="pill" href="#primary-pills-estimates"
                                            role="tab" aria-selected="true">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"></div>
                                                <div class="tab-title">Estimates</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="pill" href="#primary-pills-proposals"
                                            role="tab" aria-selected="true">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"></div>
                                                <div class="tab-title">Proposals</div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <hr>
                        {{-- general start  --}}
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade active show" id="primary-pills-general" role="tabpanel">
                                <div class="row">
                                    <h5>General</h5>
                                    <p>General settings</p>
                                    <hr>
                                    <div class="row">

                                        <div class="col-md-6 mb-3">
                                            <label for="decimal_separator" class="form-label">Decimal Separator</label>
                                            <select class="form-select form-select-sm" name="decimal_separator"
                                                aria-label=".form-select-sm example">
                                                <option value="."@if ($decimal_separator->value == '.') selected @endif>.
                                                </option>
                                                <option value=","@if ($decimal_separator->value == ',') selected @endif>,
                                                </option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="thousand_separator" class="form-label">Thousand Separator</label>
                                            <select class="form-select form-select-sm" name="thousand_separator"
                                                aria-label=".form-select-sm example">
                                                <option value="." @if ($thousand_separator->value == '.') selected @endif>.
                                                </option>
                                                <option value="," @if ($thousand_separator->value == ',') selected @endif>,
                                                </option>
                                                <option value="'" @if ($thousand_separator->value == "'") selected @endif>'
                                                    apostrophe</option>
                                                <option value="none" @if ($thousand_separator->value == 'none') selected @endif>
                                                    none</option>
                                                <option value="space" @if ($decimal_separator->value == 'space') selected @endif>
                                                    space</option>
                                            </select>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="prefix" class="form-label">Number padding zero's for prefix
                                                formats</label>
                                            <p>eq. If this value is 3 the number will be formatted: 005 or 025</p>
                                            <input type="number" name="number_padding_prefixes"
                                                id="number_padding_prefixes" value="{{ $number_padding_prefixes->value }}"
                                                class="form-control">
                                        </div>

                                        <div class="col-md-12">
                                            <p class="form">Automatically assign logged in staff as sale agent</p>
                                            <div class="mb-3 col-md-12 d-flex">
                                                <div class="me-2">
                                                    <input class="form-check-input" type="radio"
                                                        name="automatically_set_logged_in_staff_sales_agent"
                                                        id="automatically_set_logged_in_staff_sales_agent1" value="1"
                                                        @if ($automatically_set_logged_in_staff_sales_agent->value == 1) checked @endif>
                                                    <label class="form-check-label"
                                                        for="automatically_set_logged_in_staff_sales_agent1">
                                                        Yes
                                                    </label>
                                                </div>
                                                <div class="me-2">
                                                    <input class="form-check-input" type="radio"
                                                        name="automatically_set_logged_in_staff_sales_agent"
                                                        id="automatically_set_logged_in_staff_sales_agent2"
                                                        value="0"@if ($automatically_set_logged_in_staff_sales_agent->value != 1) checked @endif>
                                                    <label class="form-check-label"
                                                        for="automatically_set_logged_in_staff_sales_agent2">
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <p class="form">Show TAX per item</p>
                                            <div class="mb-3 col-md-12 d-flex">
                                                <div class="me-2">
                                                    <input class="form-check-input" type="radio"
                                                        name="show_tax_per_item" id="show_tax_per_item1" value="1"
                                                        @if ($show_tax_per_item->value == 1) checked @endif>
                                                    <label class="form-check-label" for="show_tax_per_item1">
                                                        Yes
                                                    </label>
                                                </div>
                                                <div class="me-2">
                                                    <input class="form-check-input" type="radio"
                                                        name="show_tax_per_item" id="show_tax_per_item2"
                                                        value="0"@if ($show_tax_per_item->value != 1) checked @endif>
                                                    <label class="form-check-label" for="show_tax_per_item2">
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <p class="form">Remove the tax name from item table row</p>
                                            <div class="mb-3 col-md-12 d-flex">
                                                <div class="me-2">
                                                    <input class="form-check-input" type="radio"
                                                        name="remove_tax_name_from_item_table"
                                                        id="remove_tax_name_from_item_table1" value="1"
                                                        @if ($remove_tax_name_from_item_table->value == 1) checked @endif>
                                                    <label class="form-check-label"
                                                        for="remove_tax_name_from_item_table1">
                                                        Yes
                                                    </label>
                                                </div>
                                                <div class="me-2">
                                                    <input class="form-check-input" type="radio"
                                                        name="remove_tax_name_from_item_table"
                                                        id="remove_tax_name_from_item_table2"
                                                        value="0"@if ($remove_tax_name_from_item_table->value != 1) checked @endif>
                                                    <label class="form-check-label"
                                                        for="remove_tax_name_from_item_table2">
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <p class="form">Exclude currency symbol from items table Amount</p>
                                            <div class="mb-3 col-md-12 d-flex">
                                                <div class="me-2">
                                                    <input class="form-check-input" type="radio"
                                                        name="items_table_amounts_exclude_currency_symbol"
                                                        id="items_table_amounts_exclude_currency_symbol1" value="1"
                                                        @if ($items_table_amounts_exclude_currency_symbol->value == 1) checked @endif>
                                                    <label class="form-check-label"
                                                        for="items_table_amounts_exclude_currency_symbol1">
                                                        Yes
                                                    </label>
                                                </div>
                                                <div class="me-2">
                                                    <input class="form-check-input" type="radio"
                                                        name="items_table_amounts_exclude_currency_symbol"
                                                        id="items_table_amounts_exclude_currency_symbol2"
                                                        value="0"@if ($items_table_amounts_exclude_currency_symbol->value != 1) checked @endif>
                                                    <label class="form-check-label"
                                                        for="items_table_amounts_exclude_currency_symbol2">
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="prefix" class="form-label">Default Tax</label>
                                            <select class="form-select form-select-sm" name="default_tax[]"
                                                id="d_tax" aria-label=".form-select-sm example" multiple>
                                                @if ($tax_rates->isNotEmpty())
                                                    @foreach ($tax_rates as $tax_rate)
                                                        <option value="{{ $tax_rate->rate }}"
                                                            {{ in_array($tax_rate->rate, json_decode($default_tax->value, true)) ? 'selected' : '' }}>
                                                            {{ $tax_rate->rate }}%
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>

                                        <div class="col-md-12">
                                            <p class="form">Remove decimals on numbers/money with zero decimals (2.00
                                                will
                                                become
                                                2,
                                                2.25 will stay 2.25)</p>
                                            <div class="mb-3 col-md-12 d-flex">
                                                <div class="me-2">
                                                    <input class="form-check-input" type="radio"
                                                        name="remove_decimals_on_zero" id="remove_decimals_on_zero1"
                                                        value="1" @if ($remove_decimals_on_zero->value == 1) checked @endif>
                                                    <label class="form-check-label" for="remove_decimals_on_zero1">
                                                        Yes
                                                    </label>
                                                </div>
                                                <div class="me-2">
                                                    <input class="form-check-input" type="radio"
                                                        name="remove_decimals_on_zero" id="remove_decimals_on_zero2"
                                                        value="0"@if ($remove_decimals_on_zero->value != 1) checked @endif>
                                                    <label class="form-check-label" for="remove_decimals_on_zero2">
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                        <h5>Amount to words</h5>
                                        <p>Output total amount to words in invoice/estimate/proposal</p>

                                        <div class="col-md-6">
                                            <p class="form">Enable</p>
                                            <div class="mb-3 col-md-12 d-flex">
                                                <div class="me-2">
                                                    <input class="form-check-input" type="radio"
                                                        name="total_to_words_enabled" id="total_to_words_enabled1"
                                                        value="1" @if ($total_to_words_enabled->value == 1) checked @endif>
                                                    <label class="form-check-label" for="total_to_words_enabled1">
                                                        Yes
                                                    </label>
                                                </div>
                                                <div class="me-2">
                                                    <input class="form-check-input" type="radio"
                                                        name="total_to_words_enabled" id="total_to_words_enabled2"
                                                        value="0"@if ($total_to_words_enabled->value != 1) checked @endif>
                                                    <label class="form-check-label" for="total_to_words_enabled2">
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <p class="form">Number words into lowercase</p>
                                            <div class="mb-3 col-md-12 d-flex">
                                                <div class="me-2">
                                                    <input class="form-check-input" type="radio"
                                                        name="total_to_words_lowercase" id="total_to_words_lowercase1"
                                                        value="1" @if ($total_to_words_lowercase->value == 1) checked @endif>
                                                    <label class="form-check-label" for="total_to_words_lowercase1">
                                                        Yes
                                                    </label>
                                                </div>
                                                <div class="me-2">
                                                    <input class="form-check-input" type="radio"
                                                        name="total_to_words_lowercase" id="total_to_words_lowercase2"
                                                        value="0" @if ($total_to_words_lowercase->value != 1) checked @endif>
                                                    <label class="form-check-label" for="total_to_words_lowercase2">
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="col-md-12 mb-3 text-end">
                                            <button type="submit" class="btn btn-primary">Save Settings</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- general end  --}}
                            {{-- invoices start  --}}
                            <div class="tab-pane fade " id="primary-pills-invoices" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="invoice_prefix" class="form-label">Invoice Number Prefix</label>
                                        <input type="text" name="invoice_prefix" id="invoice_prefix"
                                            value="{{ $invoice_prefix->value }}" class="form-control">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="next_invoice_number" class="form-label">Next Invoice Number</label>
                                        <input type="number" name="next_invoice_number" id="next_invoice_number"
                                            value="{{ $next_invoice_number->value }}" class="form-control">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="invoice_due_after" class="form-label">Invoice due after (days)</label>
                                        <input type="text" name="invoice_due_after" id="invoice_due_after"
                                            value="{{ $invoice_due_after->value }}" class="form-control">
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Allow staff members to view invoices where they are assigned to
                                        </p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="allow_staff_view_invoices_assigned"
                                                    id="allow_staff_view_invoices_assigned1" value="1"
                                                    @if ($allow_staff_view_invoices_assigned->value == 1) checked @endif>
                                                <label class="form-check-label" for="allow_staff_view_invoices_assigned1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="allow_staff_view_invoices_assigned"
                                                    id="allow_staff_view_invoices_assigned2"
                                                    value="0"@if ($allow_staff_view_invoices_assigned->value != 1) checked @endif>
                                                <label class="form-check-label" for="allow_staff_view_invoices_assigned2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Require client to be logged in to view invoice
                                        </p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="view_invoice_only_logged_in" id="view_invoice_only_logged_in1"
                                                    value="1" @if ($view_invoice_only_logged_in->value == 1) checked @endif>
                                                <label class="form-check-label" for="view_invoice_only_logged_in1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="view_invoice_only_logged_in" id="view_invoice_only_logged_in2"
                                                    value="0"@if ($view_invoice_only_logged_in->value != 1) checked @endif>
                                                <label class="form-check-label" for="view_invoice_only_logged_in2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Delete invoice allowed only on last invoice
                                        </p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="delete_only_on_last_invoice" id="delete_only_on_last_invoice1"
                                                    value="1" @if ($delete_only_on_last_invoice->value == 1) checked @endif>
                                                <label class="form-check-label" for="total_to_words_lowercase1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="delete_only_on_last_invoice" id="delete_only_on_last_invoice2"
                                                    value="0"@if ($delete_only_on_last_invoice->value != 1) checked @endif>
                                                <label class="form-check-label" for="delete_only_on_last_invoice2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Decrement invoice number on delete
                                        </p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="invoice_number_decrement_on_delete"
                                                    id="invoice_number_decrement_on_delete1" value="1"
                                                    @if ($invoice_number_decrement_on_delete->value == 1) checked @endif>
                                                <label class="form-check-label" for="invoice_number_decrement_on_delete1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="invoice_number_decrement_on_delete"
                                                    id="invoice_number_decrement_on_delete2"
                                                    value="0"@if ($invoice_number_decrement_on_delete->value != 1) checked @endif>
                                                <label class="form-check-label" for="invoice_number_decrement_on_delete2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Exclude invoices with draft status from customers area
                                        </p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="exclude_invoice_from_client_area_with_draft_status"
                                                    id="exclude_invoice_from_client_area_with_draft_status1"
                                                    value="1" @if ($exclude_invoice_from_client_area_with_draft_status->value == 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="exclude_invoice_from_client_area_with_draft_status1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="exclude_invoice_from_client_area_with_draft_status"
                                                    id="exclude_invoice_from_client_area_with_draft_status2"
                                                    value="0"@if ($exclude_invoice_from_client_area_with_draft_status->value != 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="exclude_invoice_from_client_area_with_draft_status2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Show Sale Agent On Invoice</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_sale_agent_on_invoices" id="show_sale_agent_on_invoices1"
                                                    value="1" @if ($show_sale_agent_on_invoices->value == 1) checked @endif>
                                                <label class="form-check-label" for="show_sale_agent_on_invoices1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_sale_agent_on_invoices" id="show_sale_agent_on_invoices2"
                                                    value="0"@if ($show_sale_agent_on_invoices->value != 1) checked @endif>
                                                <label class="form-check-label" for="show_sale_agent_on_invoices2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Show Project Name On Invoice</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_project_on_invoice" id="show_project_on_invoice1"
                                                    value="1" @if ($show_project_on_invoice->value == 1) checked @endif>
                                                <label class="form-check-label" for="show_project_on_invoice1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_project_on_invoice" id="show_project_on_invoice2"
                                                    value="0"@if ($show_project_on_invoice->value != 1) checked @endif>
                                                <label class="form-check-label" for="show_project_on_invoice2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <p class="form">Show Total Paid On Invoice</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_total_paid_on_invoice" id="show_total_paid_on_invoice1"
                                                    value="1" @if ($show_total_paid_on_invoice->value == 1) checked @endif>
                                                <label class="form-check-label" for="total_to_words_lowercase1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_total_paid_on_invoice" id="show_total_paid_on_invoice2"
                                                    value="0"@if ($show_total_paid_on_invoice->value != 1) checked @endif>
                                                <label class="form-check-label" for="show_total_paid_on_invoice2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Show Credits Applied On Invoice</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_credits_applied_on_invoice"
                                                    id="show_credits_applied_on_invoice1" value="1"
                                                    @if ($show_credits_applied_on_invoice->value == 1) checked @endif>
                                                <label class="form-check-label" for="show_credits_applied_on_invoice1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_credits_applied_on_invoice"
                                                    id="show_credits_applied_on_invoice2"
                                                    value="0"@if ($show_credits_applied_on_invoice->value != 1) checked @endif>
                                                <label class="form-check-label" for="show_credits_applied_on_invoice2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Show Amount Due On Invoice</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_amount_due_on_invoice" id="show_amount_due_on_invoice1"
                                                    value="1" @if ($show_amount_due_on_invoice->value == 1) checked @endif>
                                                <label class="form-check-label" for="show_amount_due_on_invoice1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_amount_due_on_invoice" id="show_amount_due_on_invoice2"
                                                    value="0"@if ($show_amount_due_on_invoice->value != 1) checked @endif>
                                                <label class="form-check-label" for="show_amount_due_on_invoice2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Attach invoice PDF when sending payment receipt to email</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="attach_invoice_to_payment_receipt_email"
                                                    id="attach_invoice_to_payment_receipt_email1" value="1"
                                                    @if ($attach_invoice_to_payment_receipt_email->value == 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="attach_invoice_to_payment_receipt_email1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="attach_invoice_to_payment_receipt_email"
                                                    id="attach_invoice_to_payment_receipt_email2"
                                                    value="0"@if ($attach_invoice_to_payment_receipt_email->value != 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="attach_invoice_to_payment_receipt_email2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Invoice Number Format</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="invoice_number_format" id="invoice_number_format1"
                                                    value="1" @if ($invoice_number_format->value == 1) checked @endif>
                                                <label class="form-check-label" for="invoice_number_format1">
                                                    Number Based (000001)
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="invoice_number_format" id="invoice_number_format2"
                                                    value="2" @if ($invoice_number_format->value == 2) checked @endif>
                                                <label class="form-check-label" for="invoice_number_format2">
                                                    Year Based (YYYY/000001)
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="invoice_number_format" id="invoice_number_format3"
                                                    value="3" @if ($invoice_number_format->value == 3) checked @endif>
                                                <label class="form-check-label" for="invoice_number_format3">
                                                    000001-YY
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="invoice_number_format" id="invoice_number_format4"
                                                    value="4" @if ($invoice_number_format->value == 4) checked @endif>
                                                <label class="form-check-label" for="invoice_number_format4">
                                                    000001/MM/YYYY
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="predefined_clientnote_invoice" class="form-label">Predefined Client
                                            Note</label>
                                        <textarea type="text" rows="6" name="predefined_clientnote_invoice"
                                            id="predefined_clientnote_invoice"class="form-control mb-3">
                                            {{ $predefined_clientnote_invoice->value }}
                                        </textarea>
                                        @error('sign')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <label for="predefined_terms_invoice" class="form-label">Predefined Terms &
                                            Conditions</label>
                                        <textarea type="text" rows="6" name="predefined_terms_invoice"
                                            id="predefined_terms_invoice"class="form-control mb-3">
                                             {{ $predefined_terms_invoice->value }}
                                         </textarea>
                                        @error('sign')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3 text-end">
                                        <button type="submit" class="btn btn-primary">Save Settings</button>
                                    </div>
                                </div>
                            </div>
                            {{-- invoices end  --}}
                            {{-- credit note start  --}}
                            <div class="tab-pane fade " id="primary-pills-credit-notes" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="credit_note_prefix" class="form-label">Credit Note Number
                                            Prefix</label>
                                        <input type="text" name="credit_note_prefix" id="credit_note_prefix"
                                            value="{{ $credit_note_prefix->value }}" class="form-control">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="next_credit_note_number" class="form-label">Next Credit Note
                                            Number</label>
                                        <input type="number" name="next_credit_note_number" id="next_credit_note_number"
                                            value="{{ $next_credit_note_number->value }}" class="form-control">
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Credit Note Number Format</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="credit_note_number_format" id="credit_note_number_format1"
                                                    value="1" @if ($credit_note_number_format->value == 1) checked @endif>
                                                <label class="form-check-label" for="credit_note_number_format1">
                                                    Number Based (000001)
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="credit_note_number_format" id="credit_note_number_format2"
                                                    value="2" @if ($credit_note_number_format->value == 2) checked @endif>
                                                <label class="form-check-label" for="credit_note_number_format2">
                                                    Year Based (YYYY/000001)
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="credit_note_number_format" id="credit_note_number_format3"
                                                    value="3" @if ($credit_note_number_format->value == 3) checked @endif>
                                                <label class="form-check-label" for="credit_note_number_format3">
                                                    000001-YY
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="credit_note_number_format" id="credit_note_number_format4"
                                                    value="4" @if ($credit_note_number_format->value == 4) checked @endif>
                                                <label class="form-check-label" for="credit_note_number_format4">
                                                    000001/MM/YYYY
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 ">
                                        <p class="form">Decrement credit note number on delete</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="credit_note_number_decrement_on_delete"
                                                    id="credit_note_number_decrement_on_delete1" value="1"
                                                    @if ($credit_note_number_decrement_on_delete->value == 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="credit_note_number_decrement_on_delete1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="credit_note_number_decrement_on_delete"
                                                    id="credit_note_number_decrement_on_delete2"
                                                    value="0"@if ($credit_note_number_decrement_on_delete->value != 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="credit_note_number_decrement_on_delete2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 ">
                                        <p class="form">Show Project Name On Credit Note</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_project_on_credit_note" id="show_project_on_credit_note1"
                                                    value="1" @if ($show_project_on_credit_note->value == 1) checked @endif>
                                                <label class="form-check-label" for="show_project_on_credit_note1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_project_on_credit_note" id="show_project_on_credit_note2"
                                                    value="0"@if ($show_project_on_credit_note->value != 1) checked @endif>
                                                <label class="form-check-label" for="show_project_on_credit_note2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <label for="predefined_clientnote_credit_note" class="form-label">Predefined
                                            Client Note</label>
                                        <textarea type="text" rows="6" name="predefined_clientnote_credit_note"
                                            id="predefined_clientnote_credit_note"class="form-control mb-3">
                                                 {{ $predefined_clientnote_credit_note->value }}
                                        </textarea>

                                    </div>
                                    <div class="col-md-12">
                                        <label for="predefined_terms_credit_note" class="form-label">Predefined Terms &
                                            Conditions</label>
                                        <textarea type="text" rows="6" name="predefined_terms_credit_note" id="predefined_terms_credit_note"
                                            class="form-control mb-3">
                                                {{ $predefined_terms_credit_note->value }}
                                        </textarea>

                                    </div>
                                    <div class="col-md-12 mb-3 text-end">
                                        <button type="submit" class="btn btn-primary">Save Settings</button>
                                    </div>
                                </div>
                            </div>
                            {{-- credit note end  --}}
                            {{-- estimate start  --}}
                            <div class="tab-pane fade " id="primary-pills-estimates" role="tabpanel">
                                <div class="row">

                                    <div class="col-md-12 mb-3">
                                        <label for="estimate_prefix" class="form-label">Estimate Number Prefix</label>
                                        <input type="text" name="estimate_prefix" id="estimate_prefix"
                                            value="{{ $estimate_prefix->value }}" class="form-control">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="next_estimate_number" class="form-label">Next estimate Number</label>
                                        <input type="number" name="Numnext_estimate_numberber" id="next_estimate_number"
                                            value="{{ $next_estimate_number->value }}" class="form-control">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="estimate_due_after" class="form-label">Estimate Due After
                                            (days)</label>
                                        <input type="text" name="estimate_due_after" id="estimate_due_after"
                                            value="{{ $estimate_due_after->value }}" class="form-control">
                                    </div>

                                    <div class="col-md-12 ">
                                        <p class="form">Delete estimate allowed only on last invoice</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="delete_only_on_last_estimate" id="delete_only_on_last_estimate1"
                                                    value="1" @if ($delete_only_on_last_estimate->value == 1) checked @endif>
                                                <label class="form-check-label" for="delete_only_on_last_estimate1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="delete_only_on_last_estimate" id="delete_only_on_last_estimate2"
                                                    value="0"@if ($delete_only_on_last_estimate->value != 1) checked @endif>
                                                <label class="form-check-label" for="delete_only_on_last_estimate2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 ">
                                        <p class="form">Decrement estimate number on delete</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="estimate_number_decrement_on_delete"
                                                    id="estimate_number_decrement_on_delete1" value="1"
                                                    @if ($estimate_number_decrement_on_delete->value == 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="estimate_number_decrement_on_delete1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="estimate_number_decrement_on_delete"
                                                    id="estimate_number_decrement_on_delete2"
                                                    value="0"@if ($estimate_number_decrement_on_delete->value != 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="estimate_number_decrement_on_delete2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 ">
                                        <p class="form">Allow staff members to view estimates where they are assigned to
                                        </p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="allow_staff_view_estimates_assigned"
                                                    id="allow_staff_view_estimates_assigned1" value="1"
                                                    @if ($allow_staff_view_estimates_assigned->value == 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="allow_staff_view_estimates_assigned1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="allow_staff_view_estimates_assigned"
                                                    id="allow_staff_view_estimates_assigned2"
                                                    value="0"@if ($allow_staff_view_estimates_assigned->value != 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="allow_staff_view_estimates_assigned2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 ">
                                        <p class="form">Require client to be logged in to view estimate
                                        </p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="view_estimate_only_logged_in" id="view_estimate_only_logged_in1"
                                                    value="1" @if ($view_estimate_only_logged_in->value == 1) checked @endif>
                                                <label class="form-check-label" for="view_estimate_only_logged_in1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="view_estimate_only_logged_in" id="view_estimate_only_logged_in2"
                                                    value="0"@if ($view_estimate_only_logged_in->value != 1) checked @endif>
                                                <label class="form-check-label" for="view_estimate_only_logged_in2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 ">
                                        <p class="form">Show Sale Agent On Estimate
                                        </p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_sale_agent_on_estimates" id="show_sale_agent_on_estimates1"
                                                    value="1" @if ($show_sale_agent_on_estimates->value == 1) checked @endif>
                                                <label class="form-check-label" for="show_sale_agent_on_estimates1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_sale_agent_on_estimates" id="show_sale_agent_on_estimates2"
                                                    value="0"@if ($show_sale_agent_on_estimates->value != 1) checked @endif>
                                                <label class="form-check-label" for="show_sale_agent_on_estimates2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 ">
                                        <p class="form">Show Project Name On Estimate
                                        </p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_project_on_estimate" id="show_project_on_estimate1"
                                                    value="1" @if ($show_project_on_estimate->value == 1) checked @endif>
                                                <label class="form-check-label" for="show_project_on_estimate1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_project_on_estimate" id="show_project_on_estimate2"
                                                    value="0"@if ($show_project_on_estimate->value != 1) checked @endif>
                                                <label class="form-check-label" for="show_project_on_estimate2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 ">
                                        <p class="form">Auto convert the estimate to invoice after client accept
                                        </p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="estimate_auto_convert_to_invoice_on_client_accept"
                                                    id="estimate_auto_convert_to_invoice_on_client_accept1" value="1"
                                                    @if ($estimate_auto_convert_to_invoice_on_client_accept->value == 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="estimate_auto_convert_to_invoice_on_client_accept1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="estimate_auto_convert_to_invoice_on_client_accept"
                                                    id="estimate_auto_convert_to_invoice_on_client_accept2"
                                                    value="0"@if ($estimate_auto_convert_to_invoice_on_client_accept->value != 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="estimate_auto_convert_to_invoice_on_client_accept2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 ">
                                        <p class="form">Exclude estimates with draft status from customers area
                                        </p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="exclude_estimate_from_client_area_with_draft_status"
                                                    id="exclude_estimate_from_client_area_with_draft_status1"
                                                    value="1" @if ($exclude_estimate_from_client_area_with_draft_status->value == 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="exclude_estimate_from_client_area_with_draft_status1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="exclude_estimate_from_client_area_with_draft_status"
                                                    id="exclude_estimate_from_client_area_with_draft_status2"
                                                    value="0"@if ($exclude_estimate_from_client_area_with_draft_status->value != 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="exclude_estimate_from_client_area_with_draft_status2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <p class="form">Estimate Number Format</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="estimate_number_format" id="estimate_number_format1"
                                                    value="1" @if ($estimate_number_format->value == 1) checked @endif>
                                                <label class="form-check-label" for="estimate_number_format1">
                                                    Number Based (000001)
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="estimate_number_format" id="estimate_number_format2"
                                                    value="2" @if ($estimate_number_format->value == 2) checked @endif>
                                                <label class="form-check-label" for="estimate_number_format2">
                                                    Year Based (YYYY/000001)
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="estimate_number_format" id="estimate_number_format3"
                                                    value="3" @if ($estimate_number_format->value == 3) checked @endif>
                                                <label class="form-check-label" for="estimate_number_format3">
                                                    000001-YY
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="estimate_number_format" id="estimate_number_format4"
                                                    value="4" @if ($estimate_number_format->value == 4) checked @endif>
                                                <label class="form-check-label" for="estimate_number_format4">
                                                    000001/MM/YYYY
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="estimates_pipeline_limit" class="form-label">Pipeline limit per
                                            status</label>
                                        <input type="text" name="estimates_pipeline_limit"
                                            id="estimates_pipeline_limit" value="{{ $estimates_pipeline_limit->value }}"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-7 mb-3">
                                        <label for="default_estimates_pipeline_sort" class="form-label">Default pipeline
                                            sort</label>
                                        <select class="form-select form-select-sm" name="default_estimates_pipeline_sort"
                                            id="default_estimates_pipeline_sort" aria-label=".form-select-sm example">
                                            <option value="datecreated"
                                                @if ($default_estimates_pipeline_sort->value == 'datecreated') selected @endif>Date Created</option>
                                            <option value="date" @if ($default_estimates_pipeline_sort->value == 'date') selected @endif>
                                                Estimate Date</option>
                                            <option value="pipeline_order"
                                                @if ($default_estimates_pipeline_sort->value == 'pipeline_order') selected @endif>Pipeline Order</option>
                                            <option value="expirydate" @if ($default_estimates_pipeline_sort->value == 'expirydate') selected @endif>
                                                Expiry Date</option>
                                        </select>
                                    </div>
                                    <div class="mt-4 col-md-5 d-flex">
                                        <div class="me-2">
                                            <input class="form-check-input" type="radio"
                                                name="default_estimates_pipeline_sort_type"
                                                id="default_estimates_pipeline_sort_type1" value="asc"
                                                @if ($default_estimates_pipeline_sort_type->value == 'asc') checked @endif>
                                            <label class="form-check-label" for="default_estimates_pipeline_sort_type1">
                                                Assending
                                            </label>
                                        </div>
                                        <div class="me-2">
                                            <input class="form-check-input" type="radio"
                                                name="default_estimates_pipeline_sort_type"
                                                id="default_estimates_pipeline_sort_type2" value="desc"
                                                @if ($default_estimates_pipeline_sort_type->value == 'desc') checked @endif>
                                            <label class="form-check-label" for="default_estimates_pipeline_sort_type2">
                                                Descending
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="predefined_clientnote_estimate" class="form-label">Predefined Client
                                            Note</label>
                                        <textarea type="text" rows="6" name="predefined_clientnote_estimate" id="predefined_clientnote_estimate"
                                            class="form-control mb-3">
                                                {{ $predefined_clientnote_estimate->value }}
                                         </textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="predefined_terms_estimate" class="form-label">Predefined Terms &
                                            Conditions</label>
                                        <textarea type="text" rows="6" name="predefined_terms_estimate"
                                            id="predefined_terms_estimate"class="form-control mb-3">
                                                {{ $predefined_terms_estimate->value }}
                                        </textarea>
                                        @error('sign')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3 text-end">
                                        <button type="submit" class="btn btn-primary">Save Settings</button>
                                    </div>
                                </div>
                            </div>
                            {{-- estimate end  --}}
                            {{-- proposals start  --}}
                            <div class="tab-pane fade " id="primary-pills-proposals" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="proposal_number_prefix" class="form-label">Proposal Number
                                            Prefix</label>
                                        <input type="text" name="proposal_number_prefix" id="proposal_number_prefix"
                                            value="{{ $proposal_number_prefix->value }}" class="form-control">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="proposal_due_after" class="form-label">Proposal Due After
                                            (days)</label>
                                        <input type="number" name="proposal_due_after" id="proposal_due_after"
                                            value="{{ $proposal_due_after->value }}" class="form-control">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="proposals_pipeline_limit" class="form-label">Pipeline limit per
                                            status</label>
                                        <input type="text" name="proposals_pipeline_limit"
                                            id="proposals_pipeline_limit" value="{{ $proposals_pipeline_limit->value }}"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-7 mb-3">
                                        <label for="Separator" class="form-label">Default pipeline sort</label>
                                        <select class="form-select form-select-sm" name="default_proposals_pipeline_sort"
                                            id="default_proposals_pipeline_sort" aria-label=".form-select-sm example">
                                            <option value="datecreated"
                                                @if ($default_proposals_pipeline_sort->value == 'datecreated') selected @endif>Date Created</option>
                                            <option value="date" @if ($default_proposals_pipeline_sort->value == 'date') selected @endif>
                                                Estimate Date</option>
                                            <option value="pipeline_order"
                                                @if ($default_proposals_pipeline_sort->value == 'pipeline_order') selected @endif>Pipeline Order</option>
                                            <option value="expirydate" @if ($default_proposals_pipeline_sort->value == 'expirydate') selected @endif>
                                                Expiry Date</option>
                                        </select>
                                    </div>
                                    <div class="mt-4 col-md-5 d-flex">
                                        <div class="me-2">
                                            <input class="form-check-input" type="radio"
                                                name="default_proposals_pipeline_sort_type"
                                                id="default_proposals_pipeline_sort_type1" value="asc"
                                                @if ($default_proposals_pipeline_sort_type->value == 'asc') checked @endif>
                                            <label class="form-check-label" for="default_proposals_pipeline_sort_type1">
                                                Assending
                                            </label>
                                        </div>
                                        <div class="me-2">
                                            <input class="form-check-input" type="radio"
                                                name="default_proposals_pipeline_sort_type"
                                                id="default_proposals_pipeline_sort_type2" value="desc"
                                                @if ($default_proposals_pipeline_sort_type->value == 'desc') checked @endif>
                                            <label class="form-check-label" for="default_proposals_pipeline_sort_type2">
                                                Descending
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-md-12 ">
                                        <p class="form">Show Project Name On Proposal
                                        </p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_project_on_proposal" id="show_project_on_proposal1"
                                                    value="1" @if ($show_project_on_proposal->value == 1) checked @endif>
                                                <label class="form-check-label" for="show_project_on_proposal1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_project_on_proposal" id="show_project_on_proposal2"
                                                    value="0" @if ($show_project_on_proposal->value != 1) checked @endif>
                                                <label class="form-check-label" for="show_project_on_proposal2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 ">
                                        <p class="form">Exclude proposals with draft status from customers area
                                        </p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="exclude_proposal_from_client_area_with_draft_status"
                                                    id="exclude_proposal_from_client_area_with_draft_status1"
                                                    value="1" @if ($exclude_proposal_from_client_area_with_draft_status->value == 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="exclude_proposal_from_client_area_with_draft_status1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="exclude_proposal_from_client_area_with_draft_status"
                                                    id="exclude_proposal_from_client_area_with_draft_status2"
                                                    value="0"@if ($exclude_proposal_from_client_area_with_draft_status->value != 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="exclude_proposal_from_client_area_with_draft_status2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 ">
                                        <p class="form">Allow staff members to view proposals where they are assigned to
                                        </p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="allow_staff_view_proposals_assigned"
                                                    id="allow_staff_view_proposals_assigned1" value="1"
                                                    @if ($allow_staff_view_proposals_assigned->value == 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="allow_staff_view_proposals_assigned1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="allow_staff_view_proposals_assigned"
                                                    id="allow_staff_view_proposals_assigned2"
                                                    value="0"@if ($allow_staff_view_proposals_assigned->value != 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="allow_staff_view_proposals_assigned2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="proposal_info_format" class="form-label">Proposal Info Format (PDF
                                            and HTML)
                                        </label>
                                        <textarea class="form-control mb-3" rows="6" name="proposal_info_format" id="proposal_info_format"> 
                                            {!! $proposal_info_format->value !!}
                                        </textarea>
                                    </div>
                                    <p>
                                        <a href="#" class="settings-textarea-merge-field"
                                            data-to="proposal_info_format">{proposal_to}</a>
                                        <a href="#" class="settings-textarea-merge-field"
                                            data-to="proposal_info_format">{address}</a>,
                                        <a href="#" class="settings-textarea-merge-field"
                                            data-to="proposal_info_format">{city}</a>,
                                        <a href="#" class="settings-textarea-merge-field"
                                            data-to="proposal_info_format">{state}</a>,
                                        <a href="#" class="settings-textarea-merge-field"
                                            data-to="proposal_info_format">{zip_code}</a>,
                                        <a href="#" class="settings-textarea-merge-field"
                                            data-to="proposal_info_format">{country_code}</a>,
                                        <a href="#" class="settings-textarea-merge-field"
                                            data-to="proposal_info_format">{phone}</a>,
                                        <a href="#" class="settings-textarea-merge-field"
                                            data-to="proposal_info_format">{country_name}</a>,
                                        <a href="#" class="settings-textarea-merge-field"
                                            data-to="proposal_info_format">{email}</a>
                                    </p>

                                    <div class="col-md-12 mb-3 text-end">
                                        <button type="submit" class="btn btn-primary">Save Settings</button>
                                    </div>
                                </div>
                            </div>
                            {{-- proposals end  --}}
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
            var textarea = document.getElementById('proposal_info_format');

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
            $('#d_tax').select2();

        });
    </script>
@endpush
