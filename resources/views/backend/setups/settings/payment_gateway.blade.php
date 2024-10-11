@extends('backend.layouts.main')
@section('title', 'Customer Details')
@section('content')
    <div class="row">

        <div class="col-md-3">
            <h4 class="mt-3 mb-3">Settings</h4>
            @include('backend.partials.settings-sidebar')
        </div>

        <div class="col-md-9">

            <h4 class="mt-3 mb-3">Payment Gateways</h4>

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
                    <form action="{{ route('settings.payment.update') }}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-pills mb-3 col-md-12 " role="tablist">
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
                                        <a class="nav-link" data-bs-toggle="pill" href="#primary-pills-Authorize.net"
                                            role="tab" aria-selected="true">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"></div>
                                                <div class="tab-title">Authorize.net Accept.js</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="pill" href="#primary-pills-instamojo"
                                            role="tab" aria-selected="true">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"></div>
                                                <div class="tab-title">Instamojo</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="pill" href="#primary-pills-mollie"
                                            role="tab" aria-selected="true">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"></div>
                                                <div class="tab-title">Mollie</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="pill" href="#primary-pills-braintree"
                                            role="tab" aria-selected="true">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"></div>
                                                <div class="tab-title">Braintree</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="pill" href="#primary-pills-paypals"
                                            role="tab" aria-selected="true">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"></div>
                                                <div class="tab-title">Paypal Smart Checkout</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="pill" href="#primary-pills-paypal"
                                            role="tab" aria-selected="true">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"></div>
                                                <div class="tab-title">Paypal</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="pill" href="#primary-pills-payu" role="tab"
                                            aria-selected="true">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"></div>
                                                <div class="tab-title">PayU Money</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="pill" href="#primary-pills-stripec"
                                            role="tab" aria-selected="true">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"></div>
                                                <div class="tab-title">Stripe Checkout</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="pill" href="#primary-pills-stripei"
                                            role="tab" aria-selected="true">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"></div>
                                                <div class="tab-title">Stripe iDEAL</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="pill" href="#primary-pills-2checkout"
                                            role="tab" aria-selected="true">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"></div>
                                                <div class="tab-title">2Checkout</div>
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

                                    <div class="col-md-12">
                                        <p class="form">Receive notification when customer pay invoice (built-in)</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="notification_when_customer_pay_invoice"
                                                    id="notification_when_customer_pay_invoice1" value="1"
                                                    @if ($notification_when_customer_pay_invoice->value == 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="notification_when_customer_pay_invoice1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="notification_when_customer_pay_invoice"
                                                    id="notification_when_customer_pay_invoice2" value="0"
                                                    @if ($notification_when_customer_pay_invoice->value != 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="notification_when_customer_pay_invoice2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Allow customer to modify the amount to pay (for online payments)
                                        </p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="allow_payment_amount_to_be_modified"
                                                    id="allow_payment_amount_to_be_modified1" value="1"
                                                    @if ($allow_payment_amount_to_be_modified->value == 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="allow_payment_amount_to_be_modified1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="allow_payment_amount_to_be_modified"
                                                    id="allow_payment_amount_to_be_modified2" value="0"
                                                    @if ($allow_payment_amount_to_be_modified->value != 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="allow_payment_amount_to_be_modified2">
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
                            {{-- general end  --}}
                            {{-- Authorize.net start  --}}
                            <div class="tab-pane fade " id="primary-pills-Authorize.net" role="tabpanel">
                                <div class="row">
                                    <h5>Authorize.net Accept.js</h5>
                                    <p class="text-warning">SSL is required if you're using the Authorize.Net AIM payment
                                        API.
                                        Authorize.net only supports 1 currency per account. Make sure you add only 1
                                        currency
                                        associated with your Authorize account in the currencies field.</p>
                                    <p>If you are enabling test mode, make sure to set test credentials from <a
                                            href="https://sandbox.authorize.net"
                                            target="_blank">https://sandbox.authorize.net</a></p>
                                    <p><b>Currently supported currencies:</b> USD, CAD, CHF, DKK, EUR, GBP, NOK, PLN, SEK,
                                        AUD,
                                        NZD</p>

                                    <div class="col-md-12">
                                        <p class="form">Active</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_authorize_acceptjs_active"
                                                    id="paymentmethod_authorize_acceptjs_active1" value="1"
                                                    @if ($paymentmethod_authorize_acceptjs_active->value == 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="paymentmethod_authorize_acceptjs_active1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_authorize_acceptjs_active"
                                                    id="paymentmethod_authorize_acceptjs_active2" value="0"
                                                    @if ($paymentmethod_authorize_acceptjs_active->value != 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="paymentmethod_authorize_acceptjs_active2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_authorize_acceptjs_label"
                                            class="form-label">Label</label>
                                        <input type="text" name="paymentmethod_authorize_acceptjs_label"
                                            id="paymentmethod_authorize_acceptjs_label"
                                            value="{{ $paymentmethod_authorize_acceptjs_label->value }}"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_authorize_acceptjs_public_key" class="form-label">Public
                                            Key</label>
                                        <input type="text" name="paymentmethod_authorize_acceptjs_public_key"
                                            id="paymentmethod_authorize_acceptjs_public_key"
                                            value="{{ $paymentmethod_authorize_acceptjs_public_key->value }}"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_authorize_acceptjs_api_login_id" class="form-label">API
                                            Login ID</label>
                                        <input type="text" name="paymentmethod_authorize_acceptjs_api_login_id"
                                            id="paymentmethod_authorize_acceptjs_api_login_id"
                                            value="{{ $paymentmethod_authorize_acceptjs_api_login_id->value }}"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_authorize_acceptjs_api_transaction_key"
                                            class="form-label">API Transaction ID</label>
                                        <input type="text" name="paymentmethod_authorize_acceptjs_api_transaction_key"
                                            id="paymentmethod_authorize_acceptjs_api_transaction_key"
                                            value="{{ $paymentmethod_authorize_acceptjs_api_transaction_key->value }}"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-12">
                                        <label for="paymentmethod_authorize_acceptjs_description_dashboard"
                                            class="form-label">Gateway Dashbord Payment
                                            Description</label>
                                        <textarea type="text" rows="6" name="paymentmethod_authorize_acceptjs_description_dashboard"
                                            id="paymentmethod_authorize_acceptjs_description_dashboard"class="form-control mb-3">
                                            {{ $paymentmethod_authorize_acceptjs_description_dashboard->value }}
                                        </textarea>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_authorize_acceptjs_currencies"
                                            class="form-label">Currency</label>
                                        <input type="text" name="paymentmethod_authorize_acceptjs_currencies"
                                            id="paymentmethod_authorize_acceptjs_currencies"
                                            value="{{ $paymentmethod_authorize_acceptjs_currencies->value }}"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Enable Test Mode</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_authorize_acceptjs_test_mode_enabled"
                                                    id="paymentmethod_authorize_acceptjs_test_mode_enabled1"
                                                    value="1" @if ($paymentmethod_authorize_acceptjs_test_mode_enabled->value == 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="paymentmethod_authorize_acceptjs_test_mode_enabled1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_authorize_acceptjs_test_mode_enabled"
                                                    id="paymentmethod_authorize_acceptjs_test_mode_enabled2"
                                                    value="0" @if ($paymentmethod_authorize_acceptjs_test_mode_enabled->value != 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="paymentmethod_authorize_acceptjs_test_mode_enabled2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Selected by default on invoice</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_authorize_acceptjs_default_selected"
                                                    id="paymentmethod_authorize_acceptjs_default_selected1" value="1"
                                                    @if ($paymentmethod_authorize_acceptjs_default_selected->value == 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="paymentmethod_authorize_acceptjs_default_selected1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_authorize_acceptjs_default_selected"
                                                    id="paymentmethod_authorize_acceptjs_default_selected2" value="0"
                                                    @if ($paymentmethod_authorize_acceptjs_default_selected->value != 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="paymentmethod_authorize_acceptjs_default_selected2">
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
                            {{-- Authorize.net end  --}}
                            {{-- instamojo start  --}}
                            <div class="tab-pane fade " id="primary-pills-instamojo" role="tabpanel">
                                <div class="row">
                                    <h5>Instamojo</h5>

                                    <div class="col-md-12">
                                        <p class="form">Active</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_instamojo_active"
                                                    id="paymentmethod_instamojo_active1" value="1"
                                                    @if ($paymentmethod_instamojo_active->value == 1) checked @endif>
                                                <label class="form-check-label" for="paymentmethod_instamojo_active1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_instamojo_active"
                                                    id="paymentmethod_instamojo_active2" value="0"
                                                    @if ($paymentmethod_instamojo_active->value != 1) checked @endif>
                                                <label class="form-check-label" for="paymentmethod_instamojo_active2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_instamojo_label" class="form-label">Label</label>
                                        <input type="text" name="paymentmethod_instamojo_label"
                                            id="paymentmethod_instamojo_label"
                                            value="{{ $paymentmethod_instamojo_label->value }}" class="form-control">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_instamojo_fee_fixed" class="form-label">Fixed
                                            Fee</label>
                                        <input type="text" name="paymentmethod_instamojo_fee_fixed"
                                            id="paymentmethod_instamojo_fee_fixed"
                                            value="{{ $paymentmethod_instamojo_fee_fixed->value }}" class="form-control">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_instamojo_fee_percent" class="form-label">Percentage
                                            Fee</label>
                                        <input type="text" name="paymentmethod_instamojo_fee_percent"
                                            id="paymentmethod_instamojo_fee_percent"
                                            value="{{ $paymentmethod_instamojo_fee_percent->value }}"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_instamojo_api_key" class="form-label">Private API
                                            Key</label>
                                        <input type="text" name="paymentmethod_instamojo_api_key"
                                            id="paymentmethod_instamojo_api_key"
                                            value="{{ $paymentmethod_instamojo_api_key->value }}" class="form-control">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_instamojo_auth_token" class="form-label">Private Auth
                                            Token</label>
                                        <input type="text" name="paymentmethod_instamojo_auth_token"
                                            id="paymentmethod_instamojo_auth_token"
                                            value="{{ $paymentmethod_instamojo_auth_token->value }}"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-12">
                                        <label for="paymentmethod_instamojo_description_dashboard"
                                            class="form-label">Gateway Dashbord Payment
                                            Description</label>
                                        <textarea type="text" rows="6" name="paymentmethod_instamojo_description_dashboard"
                                            id="paymentmethod_instamojo_description_dashboard"class="form-control mb-3">
                                            {{ $paymentmethod_instamojo_description_dashboard->value }}
                                        </textarea>

                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_instamojo_currencies"
                                            class="form-label">Currency</label>
                                        <input type="text" name="paymentmethod_instamojo_currencies"
                                            id="paymentmethod_instamojo_currencies" disabled
                                            value="{{ $paymentmethod_instamojo_currencies->value }}"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Enable Test Mode</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_instamojo_test_mode_enabled"
                                                    id="paymentmethod_instamojo_test_mode_enabled1" value="1"
                                                    @if ($paymentmethod_instamojo_test_mode_enabled->value == 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="paymentmethod_instamojo_test_mode_enabled1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_instamojo_test_mode_enabled"
                                                    id="paymentmethod_instamojo_test_mode_enabled2" value="0"
                                                    @if ($paymentmethod_instamojo_test_mode_enabled->value != 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="paymentmethod_instamojo_test_mode_enabled2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Selected by default on invoice</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_instamojo_default_selected"
                                                    id="paymentmethod_instamojo_default_selected1" value="1"
                                                    @if ($paymentmethod_instamojo_default_selected->value == 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="paymentmethod_instamojo_default_selected1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_instamojo_default_selected"
                                                    id="paymentmethod_instamojo_default_selected2" value="0"
                                                    @if ($paymentmethod_instamojo_default_selected->value != 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="paymentmethod_instamojo_default_selected2">
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
                            {{-- instamojo end  --}}
                            {{-- mollie start  --}}
                            <div class="tab-pane fade " id="primary-pills-mollie" role="tabpanel">
                                <div class="row">
                                    <h5>Mollie</h5>

                                    <div class="col-md-12">
                                        <p class="form">Active</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_mollie_active" id="paymentmethod_mollie_active1"
                                                    value="1" @if ($paymentmethod_mollie_active->value == 1) checked @endif>
                                                <label class="form-check-label" for="paymentmethod_mollie_active1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_mollie_active" id="paymentmethod_mollie_active2"
                                                    value="0" @if ($paymentmethod_mollie_active->value != 1) checked @endif>
                                                <label class="form-check-label" for="paymentmethod_mollie_active2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_mollie_label" class="form-label">Label</label>
                                        <input type="text" name="paymentmethod_mollie_label"
                                            id="paymentmethod_mollie_label"
                                            value="{{ $paymentmethod_mollie_label->value }}" class="form-control">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_mollie_api_key" class="form-label">API Key </label>
                                        <input type="text" name="paymentmethod_mollie_api_key"
                                            id="paymentmethod_mollie_api_key"
                                            value="{{ $paymentmethod_mollie_api_key->value }}" class="form-control">
                                    </div>

                                    <div class="col-md-12">
                                        <label for="paymentmethod_mollie_description_dashboard" class="form-label">Gateway
                                            Dashbord Payment
                                            Description</label>
                                        <textarea type="text" rows="6" name="paymentmethod_mollie_description_dashboard"
                                            id="paymentmethod_mollie_description_dashboard"class="form-control mb-3">
                                            {{ $paymentmethod_mollie_description_dashboard->value }}
                                        </textarea>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_mollie_currencies" class="form-label">Currency</label>
                                        <input type="text" name="paymentmethod_mollie_currencies"
                                            id="paymentmethod_mollie_currencies" disabled
                                            value="{{ $paymentmethod_mollie_currencies->value }}" class="form-control">
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Enable Test Mode</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_mollie_test_mode_enabled"
                                                    id="paymentmethod_mollie_test_mode_enabled1" value="1"
                                                    @if ($paymentmethod_mollie_test_mode_enabled->value == 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="paymentmethod_mollie_test_mode_enabled1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_mollie_test_mode_enabled"
                                                    id="paymentmethod_mollie_test_mode_enabled2" value="0"
                                                    @if ($paymentmethod_mollie_test_mode_enabled->value != 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="paymentmethod_mollie_test_mode_enabled2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Selected by default on invoice</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_mollie_default_selected"
                                                    id="paymentmethod_mollie_default_selected1" value="1"
                                                    @if ($paymentmethod_mollie_default_selected->value == 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="paymentmethod_mollie_default_selected1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_mollie_default_selected"
                                                    id="paymentmethod_mollie_default_selected2" value="0"
                                                    @if ($paymentmethod_mollie_default_selected->value != 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="paymentmethod_mollie_default_selected2">
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
                            {{--  mollie end  --}}
                            {{-- braintree start  --}}
                            <div class="tab-pane fade " id="primary-pills-braintree" role="tabpanel">
                                <div class="row">
                                    <h5>Braintree</h5>

                                    <div class="col-md-12">
                                        <p class="form">Active</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_paypal_braintree_active"
                                                    id="paymentmethod_paypal_braintree_active1" value="1"
                                                    @if ($paymentmethod_paypal_braintree_active->value == 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="paymentmethod_paypal_braintree_active1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_paypal_braintree_active"
                                                    id="paymentmethod_paypal_braintree_active2" value="0"
                                                    @if ($paymentmethod_paypal_braintree_active->value != 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="paymentmethod_paypal_braintree_active2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_paypal_braintree_label" class="form-label">Label</label>
                                        <input type="text" name="paymentmethod_paypal_braintree_label"
                                            id="paymentmethod_paypal_braintree_label"
                                            value="{{ $paymentmethod_paypal_braintree_label->value }}"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_paypal_braintree_merchant_id"
                                            class="form-label">Merchant ID</label>
                                        <input type="text" name="paymentmethod_paypal_braintree_merchant_id"
                                            id="paymentmethod_paypal_braintree_merchant_id"
                                            value="{{ $paymentmethod_paypal_braintree_merchant_id->value }}"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_paypal_braintree_api_public_key"
                                            class="form-label">Public Key</label>
                                        <input type="text" name="paymentmethod_paypal_braintree_api_public_key"
                                            id="paymentmethod_paypal_braintree_api_public_key"
                                            value="{{ $paymentmethod_paypal_braintree_api_public_key->value }}"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_paypal_braintree_api_private_key"
                                            class="form-label">Private Key</label>
                                        <input type="text" name="paymentmethod_paypal_braintree_api_private_key"
                                            id="paymentmethod_paypal_braintree_api_private_key"
                                            value="{{ $paymentmethod_paypal_braintree_api_private_key->value }}"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_paypal_braintree_currencies"
                                            class="form-label">Currency</label>
                                        <input type="text" name="paymentmethod_paypal_braintree_currencies"
                                            id="paymentmethod_paypal_braintree_currencies" disabled
                                            value="{{ $paymentmethod_paypal_braintree_currencies->value }}"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Enable PayPal Payments</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_paypal_braintree_paypal_enabled"
                                                    id="paymentmethod_paypal_braintree_paypal_enabled1" value="1"
                                                    @if ($paymentmethod_paypal_braintree_paypal_enabled->value == 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="paymentmethod_paypal_braintree_paypal_enabled1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_paypal_braintree_paypal_enabled"
                                                    id="paymentmethod_paypal_braintree_paypal_enabled2" value="0"
                                                    @if ($paymentmethod_paypal_braintree_paypal_enabled->value != 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="paymentmethod_paypal_braintree_paypal_enabled2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Enable Test Mode</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_paypal_braintree_test_mode_enabled"
                                                    id="paymentmethod_paypal_braintree_test_mode_enabled1" value="1"
                                                    @if ($paymentmethod_paypal_braintree_test_mode_enabled->value == 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="paymentmethod_paypal_braintree_test_mode_enabled1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_paypal_braintree_test_mode_enabled"
                                                    id="paymentmethod_paypal_braintree_test_mode_enabled2" value="0"
                                                    @if ($paymentmethod_paypal_braintree_test_mode_enabled->value != 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="paymentmethod_paypal_braintree_test_mode_enabled2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Selected by default on invoice</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_paypal_braintree_default_selected"
                                                    id="paymentmethod_paypal_braintree_default_selected1" value="1"
                                                    @if ($paymentmethod_paypal_braintree_default_selected->value == 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="paymentmethod_paypal_braintree_default_selected1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_paypal_braintree_default_selected"
                                                    id="paymentmethod_paypal_braintree_default_selected2" value="0"
                                                    @if ($paymentmethod_paypal_braintree_default_selected->value != 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="paymentmethod_paypal_braintree_default_selected2">
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
                            {{-- braintree end  --}}
                            {{-- paypal smart checkout start --}}
                            <div class="tab-pane fade " id="primary-pills-paypals" role="tabpanel">
                                <div class="row">
                                    <h5>Paypal Smart Checkout</h5>

                                    <div class="col-md-12">
                                        <p class="form">Active</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_paypal_checkout_active"
                                                    id="paymentmethod_paypal_checkout_active1" value="1"
                                                    @if ($paymentmethod_paypal_checkout_active->value == 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="paymentmethod_paypal_checkout_active1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_paypal_checkout_active"
                                                    id="paymentmethod_paypal_checkout_active2" value="0"
                                                    @if ($paymentmethod_paypal_checkout_active->value != 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="paymentmethod_paypal_checkout_active2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_paypal_checkout_label" class="form-label">Label</label>
                                        <input type="text" name="paymentmethod_paypal_checkout_label"
                                            id="paymentmethod_paypal_checkout_label"
                                            value="{{ $paymentmethod_paypal_checkout_label->value }}"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_paypal_checkout_fee_fixed" class="form-label">Fixed
                                            Fee</label>
                                        <input type="text" name="paymentmethod_paypal_checkout_fee_fixed"
                                            id="paymentmethod_paypal_checkout_fee_fixed"
                                            value="{{ $paymentmethod_paypal_checkout_fee_fixed->value }}"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_paypal_checkout_fee_percent"
                                            class="form-label">Percentage Fee</label>
                                        <input type="text" name="paymentmethod_paypal_checkout_fee_percent"
                                            id="paymentmethod_paypal_checkout_fee_percent"
                                            value="{{ $paymentmethod_paypal_checkout_fee_percent->value }}"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_paypal_checkout_client_id" class="form-label">Client
                                            Id</label>
                                        <input type="text" name="paymentmethod_paypal_checkout_client_id"
                                            id="paymentmethod_paypal_checkout_client_id"
                                            value="{{ $paymentmethod_paypal_checkout_client_id->value }}"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_paypal_checkout_secret"
                                            class="form-label">Secret</label>
                                        <input type="text" name="paymentmethod_paypal_checkout_secret"
                                            id="paymentmethod_paypal_checkout_secret"
                                            value="{{ $paymentmethod_paypal_checkout_secret->value }}"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-12">
                                        <label for="paymentmethod_paypal_checkout_payment_description"
                                            class="form-label">Gateway Dashbord Payment
                                            Description</label>
                                        <textarea type="text" rows="6" name="paymentmethod_paypal_checkout_payment_description"
                                            id="paymentmethod_paypal_checkout_payment_description"class="form-control mb-3">
                                             {{ $paymentmethod_paypal_checkout_payment_description->value }}
                                        </textarea>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_paypal_checkout_currencies"
                                            class="form-label">Currency</label>
                                        <input type="text" name="paymentmethod_paypal_checkout_currencies"
                                            id="paymentmethod_paypal_checkout_currencies" disabled
                                            value="{{ $paymentmethod_paypal_checkout_currencies->value }}"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Enable Test Mode</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_paypal_checkout_test_mode_enabled"
                                                    id="paymentmethod_paypal_checkout_test_mode_enabled1" value="1"
                                                    @if ($paymentmethod_paypal_checkout_test_mode_enabled->value == 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="paymentmethod_paypal_checkout_test_mode_enabled1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_paypal_checkout_test_mode_enabled"
                                                    id="paymentmethod_paypal_checkout_test_mode_enabled2" value="0"
                                                    @if ($paymentmethod_paypal_checkout_test_mode_enabled->value != 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="paymentmethod_paypal_checkout_test_mode_enabled2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Selected by default on invoice</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_paypal_checkout_default_selected"
                                                    id="paymentmethod_paypal_checkout_default_selected1" value="1"
                                                    @if ($paymentmethod_paypal_checkout_default_selected->value == 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="paymentmethod_paypal_checkout_default_selected1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_paypal_checkout_default_selected"
                                                    id="paymentmethod_paypal_checkout_default_selected2" value="0"
                                                    @if ($paymentmethod_paypal_checkout_default_selected->value != 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="paymentmethod_paypal_checkout_default_selected2">
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
                            {{-- paypal smart checkout end --}}
                            {{-- paypal  start --}}
                            <div class="tab-pane fade " id="primary-pills-paypal" role="tabpanel">
                                <div class="row">
                                    <h5>Paypal</h5>

                                    <div class="col-md-12">
                                        <p class="form">Active</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_paypal_active" id="paymentmethod_paypal_active1"
                                                    value="1" @if ($paymentmethod_paypal_active->value == 1) checked @endif>
                                                <label class="form-check-label" for="paymentmethod_paypal_active">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_paypal_active" id="paymentmethod_paypal_active2"
                                                    value="0" @if ($paymentmethod_paypal_active->value != 1) checked @endif>
                                                <label class="form-check-label" for="paymentmethod_paypal_active2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_paypal_label" class="form-label">Label</label>
                                        <input type="text" name="paymentmethod_paypal_label"
                                            id="paymentmethod_paypal_label"
                                            value="{{ $paymentmethod_paypal_label->value }}" class="form-control">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_paypal_fee_fixed" class="form-label">Fixed Fee</label>
                                        <input type="text" name="paymentmethod_paypal_fee_fixed"
                                            id="paymentmethod_paypal_fee_fixed"
                                            value="{{ $paymentmethod_paypal_fee_fixed->value }}" class="form-control">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_paypal_fee_percent" class="form-label">Percentage
                                            Fee</label>
                                        <input type="text" name="paymentmethod_paypal_fee_percent"
                                            id="paymentmethod_paypal_fee_percent"
                                            value="{{ $paymentmethod_paypal_fee_percent->value }}" class="form-control">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_paypal_username" class="form-label">PayPal API
                                            Username</label>
                                        <input type="text" name="paymentmethod_paypal_username"
                                            id="paymentmethod_paypal_username"
                                            value="{{ $paymentmethod_paypal_username->value }}" class="form-control">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_paypal_password" class="form-label">PayPal API
                                            Password</label>
                                        <input type="text" name="paymentmethod_paypal_password"
                                            id="paymentmethod_paypal_password"
                                            value="{{ $paymentmethod_paypal_password->value }}" class="form-control">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_paypal_signature" class="form-label">API
                                            Signature</label>
                                        <input type="text" name="paymentmethod_paypal_signature"
                                            id="paymentmethod_paypal_signature"
                                            value="{{ $paymentmethod_paypal_signature->value }}" class="form-control">
                                    </div>

                                    <div class="col-md-12">
                                        <label for="paymentmethod_paypal_description_dashboard" class="form-label">Gateway
                                            Dashbord Payment
                                            Description</label>
                                        <textarea type="text" rows="6" name="paymentmethod_paypal_description_dashboard"
                                            id="paymentmethod_paypal_description_dashboard"class="form-control mb-3">
                                              {{ $paymentmethod_paypal_description_dashboard->value }}
                                        </textarea>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_paypal_currencies" class="form-label">Currencies (coma
                                            separated)</label>
                                        <input type="text" name="paymentmethod_paypal_currencies"
                                            id="paymentmethod_paypal_currencies" disabled
                                            value="{{ $paymentmethod_paypal_currencies->value }}" class="form-control">
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Enable Test Mode</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_paypal_test_mode_enabled"
                                                    id="paymentmethod_paypal_test_mode_enabled1" value="1"
                                                    @if ($paymentmethod_paypal_test_mode_enabled->value == 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="paymentmethod_paypal_test_mode_enabled1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_paypal_test_mode_enabled"
                                                    id="paymentmethod_paypal_test_mode_enabled2" value="0"
                                                    @if ($paymentmethod_paypal_test_mode_enabled->value != 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="paymentmethod_paypal_test_mode_enabled2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Selected by default on invoice</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_paypal_default_selected"
                                                    id="paymentmethod_paypal_default_selected1" value="1"
                                                    @if ($paymentmethod_paypal_default_selected->value == 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="paymentmethod_paypal_default_selected1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_paypal_default_selected"
                                                    id="paymentmethod_paypal_default_selected2" value="0"
                                                    @if ($paymentmethod_paypal_default_selected->value != 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="paymentmethod_paypal_default_selected2">
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
                            {{-- paypal   end --}}
                            {{-- payu money  start --}}
                            <div class="tab-pane fade " id="primary-pills-payu" role="tabpanel">
                                <div class="row">
                                    <h5>PayU Money</h5>

                                    <div class="col-md-12">
                                        <p class="form">Active</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_payu_money_active"
                                                    id="paymentmethod_payu_money_active1" value="1"
                                                    @if ($paymentmethod_payu_money_active->value == 1) checked @endif>
                                                <label class="form-check-label" for="paymentmethod_payu_money_active1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_payu_money_active"
                                                    id="paymentmethod_payu_money_active2" value="0"
                                                    @if ($paymentmethod_payu_money_active->value != 1) checked @endif>
                                                <label class="form-check-label" for="paymentmethod_payu_money_active2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_payu_money_label" class="form-label">Label</label>
                                        <input type="text" name="paymentmethod_payu_money_label"
                                            id="paymentmethod_payu_money_label"
                                            value="{{ $paymentmethod_payu_money_label->value }} " class="form-control">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_payu_money_fee_fixed" class="form-label">Fixed
                                            Fee</label>
                                        <input type="text" name="paymentmethod_payu_money_fee_fixed"
                                            id="paymentmethod_payu_money_fee_fixed"
                                            value="{{ $paymentmethod_payu_money_fee_fixed->value }}"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_payu_money_fee_percent" class="form-label">Percentage
                                            Fee</label>
                                        <input type="text" name="paymentmethod_payu_money_fee_percent"
                                            id="paymentmethod_payu_money_fee_percent"
                                            value="{{ $paymentmethod_payu_money_fee_percent->value }}"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_payu_money_key" class="form-label">PayU Money
                                            Key</label>
                                        <input type="text" name="paymentmethod_payu_money_key"
                                            id="paymentmethod_payu_money_key"
                                            value="{{ $paymentmethod_payu_money_key->value }}" class="form-control">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_payu_money_salt" class="form-label">PayU Money
                                            Salt</label>
                                        <input type="text" name="paymentmethod_payu_money_salt"
                                            id="paymentmethod_payu_money_salt"
                                            value="{{ $paymentmethod_payu_money_salt->value }}" class="form-control">
                                    </div>

                                    <div class="col-md-12">
                                        <label for="paymentmethod_payu_money_description_dashboard"
                                            class="form-label">Gateway Dashbord Payment
                                            Description</label>
                                        <textarea type="text" rows="6" name="paymentmethod_payu_money_description_dashboard"
                                            id="paymentmethod_payu_money_description_dashboard"class="form-control mb-3">
                                            {{ $paymentmethod_payu_money_description_dashboard->value }}
                                        </textarea>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_payu_money_currencies" class="form-label">Currencies
                                        </label>
                                        <input type="text" name="paymentmethod_payu_money_currencies"
                                            id="paymentmethod_payu_money_currencies" disabled
                                            value="{{ $paymentmethod_payu_money_currencies->value }}"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Enable Test Mode</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_payu_money_test_mode_enabled"
                                                    id="paymentmethod_payu_money_test_mode_enabled1" value="1"
                                                    @if ($paymentmethod_payu_money_test_mode_enabled->value == 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="paymentmethod_payu_money_test_mode_enabled1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_payu_money_test_mode_enabled"
                                                    id="paymentmethod_payu_money_test_mode_enabled2" value="0"
                                                    @if ($paymentmethod_payu_money_test_mode_enabled->value != 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="paymentmethod_payu_money_test_mode_enabled2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Selected by default on invoice</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_payu_money_default_selected"
                                                    id="paymentmethod_payu_money_default_selected1" value="1"
                                                    @if ($paymentmethod_payu_money_default_selected->value == 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="paymentmethod_payu_money_default_selected1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_payu_money_default_selected"
                                                    id="paymentmethod_payu_money_default_selected2" value="0"
                                                    @if ($paymentmethod_payu_money_default_selected->value != 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="paymentmethod_payu_money_default_selected2">
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
                            {{-- payu money   end --}}
                            {{-- stripe checkout start --}}
                            <div class="tab-pane fade " id="primary-pills-stripec" role="tabpanel">
                                <div class="row">
                                    <h5>Stripe Checkout</h5>

                                    <div class="col-md-12">
                                        <p class="form">Active</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_stripe_active" id="paymentmethod_stripe_active1"
                                                    value="1" @if ($paymentmethod_stripe_active->value == 1) checked @endif>
                                                <label class="form-check-label" for="paymentmethod_stripe_active1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_stripe_active" id="paymentmethod_stripe_active2"
                                                    value="0" @if ($paymentmethod_stripe_active->value != 1) checked @endif>
                                                <label class="form-check-label" for="paymentmethod_stripe_active2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_stripe_label" class="form-label">Label</label>
                                        <input type="text" name="paymentmethod_stripe_label"
                                            id="paymentmethod_stripe_label"
                                            value="{{ $paymentmethod_stripe_label->value }} " class="form-control">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_stripe_fee_fixed" class="form-label">Fixed Fee</label>
                                        <input type="text" name="paymentmethod_stripe_fee_fixed"
                                            id="paymentmethod_stripe_fee_fixed"
                                            value="{{ $paymentmethod_stripe_fee_fixed->value }}" class="form-control">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_stripe_fee_percent" class="form-label">Percentage
                                            Fee</label>
                                        <input type="text" name="paymentmethod_stripe_fee_percent"
                                            id="paymentmethod_stripe_fee_percent"
                                            value="{{ $paymentmethod_stripe_fee_percent->value }}"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_stripe_api_publishable_key" class="form-label">Stripe
                                            Publishable Key</label>
                                        <input type="text" name="paymentmethod_stripe_api_publishable_key"
                                            id="paymentmethod_stripe_api_publishable_key"
                                            value="{{ $paymentmethod_stripe_api_publishable_key->value }}"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_stripe_api_secret_key" class="form-label">Stripe API
                                            Secret Key</label>
                                        <input type="text" name="paymentmethod_stripe_api_secret_key"
                                            id="paymentmethod_stripe_api_secret_key"
                                            value="{{ $paymentmethod_stripe_api_secret_key->value }}"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-12">
                                        <label for="paymentmethod_stripe_description_dashboard"
                                            class="form-label">Gateway Dashbord Payment
                                            Description</label>
                                        <textarea type="text" rows="6" name="paymentmethod_stripe_description_dashboard"
                                            id="paymentmethod_stripe_description_dashboard"class="form-control mb-3">
                                            {{ $paymentmethod_stripe_description_dashboard->value }}
                                        </textarea>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_stripe_currencies" class="form-label">Currencies
                                        </label>
                                        <input type="text" name="paymentmethod_stripe_currencies"
                                            id="paymentmethod_stripe_currencies" disabled
                                            value="{{ $paymentmethod_stripe_currencies->value }}" class="form-control">
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Enable Test Mode</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_stripe_allow_primary_contact_to_update_credit_card"
                                                    id="paymentmethod_stripe_allow_primary_contact_to_update_credit_card1"
                                                    value="1" @if ($paymentmethod_stripe_allow_primary_contact_to_update_credit_card->value == 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="paymentmethod_stripe_allow_primary_contact_to_update_credit_card1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_stripe_allow_primary_contact_to_update_credit_card"
                                                    id="paymentmethod_stripe_allow_primary_contact_to_update_credit_card2"
                                                    value="0" @if ($paymentmethod_stripe_allow_primary_contact_to_update_credit_card->value != 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="paymentmethod_stripe_allow_primary_contact_to_update_credit_card2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Selected by default on invoice</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_stripe_default_selected"
                                                    id="paymentmethod_stripe_default_selected1" value="1"
                                                    @if ($paymentmethod_stripe_default_selected->value == 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="paymentmethod_stripe_default_selected1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_stripe_default_selected"
                                                    id="paymentmethod_stripe_default_selected2" value="0"
                                                    @if ($paymentmethod_stripe_default_selected->value != 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="paymentmethod_stripe_default_selected2">
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
                            {{-- stripe checkout   end --}}
                            {{-- stripe ideal start --}}
                            <div class="tab-pane fade " id="primary-pills-stripei" role="tabpanel">
                                <div class="row">
                                    <h5>Stripe iDEAL</h5>

                                    <div class="col-md-12">
                                        <p class="form">Active</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_stripe_ideal_active"
                                                    id="paymentmethod_stripe_ideal_active1" value="1"
                                                    @if ($paymentmethod_stripe_ideal_active->value == 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="paymentmethod_stripe_ideal_active1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_stripe_ideal_active"
                                                    id="paymentmethod_stripe_ideal_active2" value="0"
                                                    @if ($paymentmethod_stripe_ideal_active->value != 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="paymentmethod_stripe_ideal_active2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_stripe_ideal_label" class="form-label">Label</label>
                                        <input type="text" name="paymentmethod_stripe_ideal_label"
                                            id="paymentmethod_stripe_ideal_label"
                                            value="{{ $paymentmethod_stripe_ideal_label->value }}"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_stripe_ideal_api_secret_key" class="form-label">Stripe
                                            API Secret Key</label>
                                        <input type="text" name="paymentmethod_stripe_ideal_api_secret_key"
                                            id="paymentmethod_stripe_ideal_api_secret_key"
                                            value="{{ $paymentmethod_stripe_ideal_api_secret_key->value }}"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_stripe_ideal_api_publishable_key"
                                            class="form-label">Stripe Publishable Key</label>
                                        <input type="text" name="paymentmethod_stripe_ideal_api_publishable_key"
                                            id="paymentmethod_stripe_ideal_api_publishable_key"
                                            value="{{ $paymentmethod_stripe_ideal_api_publishable_key->value }}"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-12">
                                        <label for="paymentmethod_stripe_ideal_description_dashboard"
                                            class="form-label">Gateway Dashbord Payment
                                            Description</label>
                                        <textarea type="text" rows="6" name="paymentmethod_stripe_ideal_description_dashboard"
                                            id="paymentmethod_stripe_ideal_description_dashboard"class="form-control mb-3">
                                            {{ $paymentmethod_stripe_ideal_description_dashboard->value }}
                                        </textarea>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="paymentmethod_stripe_ideal_description_dashboard"
                                            class="form-label">Statement Descriptor (shown in customer bank
                                            statement)</label>
                                        <textarea type="text" rows="6" name="paymentmethod_stripe_ideal_statement_descriptor"
                                            id="paymentmethod_stripe_ideal_statement_descriptor"class="form-control mb-3">
                                            {{ $paymentmethod_stripe_ideal_statement_descriptor->value }}
                                        </textarea>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_stripe_ideal_currencies" class="form-label">Currencies
                                            (coma separated) </label>
                                        <input type="text" name="paymentmethod_stripe_ideal_currencies"
                                            id="paymentmethod_stripe_ideal_currencies" disabled
                                            value="{{ $paymentmethod_stripe_ideal_currencies->value }}"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Selected by default on invoice</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_stripe_ideal_default_selected"
                                                    id="paymentmethod_stripe_ideal_default_selected1" value="1"
                                                    @if ($paymentmethod_stripe_ideal_default_selected->value == 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="paymentmethod_stripe_ideal_default_selected1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_stripe_ideal_default_selected"
                                                    id="paymentmethod_stripe_ideal_default_selected2" value="0"
                                                    @if ($paymentmethod_stripe_ideal_default_selected->value != 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="paymentmethod_stripe_ideal_default_selected2">
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
                            {{-- stripe ideal end --}}
                            {{-- 2checkout  start --}}
                            <div class="tab-pane fade " id="primary-pills-2checkout" role="tabpanel">
                                <div class="row">
                                    <h5>2Checkout</h5>
                                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                        The IPN Endpoint for 2Checkout is (
                                        https://democrm.smarterp.biz/gateways/two_checkout/webhook )
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Active</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_two_checkout_active"
                                                    id="paymentmethod_two_checkout_active1" value="1"
                                                    @if ($paymentmethod_two_checkout_active->value == 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="paymentmethod_two_checkout_active1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_two_checkout_active"
                                                    id="paymentmethod_two_checkout_active2" value="0"
                                                    @if ($paymentmethod_two_checkout_active->value != 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="paymentmethod_two_checkout_active2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_two_checkout_label" class="form-label">Label</label>
                                        <input type="text" name="paymentmethod_two_checkout_label"
                                            id="paymentmethod_two_checkout_label"
                                            value="{{ $paymentmethod_two_checkout_label->value }} "
                                            class="form-control">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_two_checkout_fee_fixed" class="form-label">Fixed
                                            Fee</label>
                                        <input type="text" name="paymentmethod_two_checkout_fee_fixed"
                                            id="paymentmethod_two_checkout_fee_fixed"
                                            value="{{ $paymentmethod_two_checkout_fee_fixed->value }}"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_two_checkout_fee_percent"
                                            class="form-label">Percentage Fee</label>
                                        <input type="text" name="paymentmethod_two_checkout_fee_percent"
                                            id="paymentmethod_two_checkout_fee_percent"
                                            value="{{ $paymentmethod_two_checkout_fee_percent->value }}"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_two_checkout_merchant_code"
                                            class="form-label">Merchant Code</label>
                                        <input type="text" name="paymentmethod_two_checkout_merchant_code"
                                            id="paymentmethod_two_checkout_merchant_code"
                                            value="{{ $paymentmethod_two_checkout_merchant_code->value }}"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_two_checkout_secret_key" class="form-label">Secret
                                            Code</label>
                                        <input type="text" name="paymentmethod_two_checkout_secret_key"
                                            id="paymentmethod_two_checkout_secret_key"
                                            value="{{ $paymentmethod_two_checkout_secret_key->value }}"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-12">
                                        <label for="paymentmethod_two_checkout_description" class="form-label">Gateway
                                            Dashbord Payment
                                            Description</label>
                                        <textarea type="text" rows="6" name="paymentmethod_two_checkout_description"
                                            id="paymentmethod_two_checkout_description"class="form-control mb-3">
                                                {{ $paymentmethod_two_checkout_description->value }} 
                                        </textarea>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="paymentmethod_two_checkout_currencies" class="form-label">Currencies
                                            (coma separated) </label>
                                        <input type="text" name="paymentmethod_two_checkout_currencies"
                                            id="paymentmethod_two_checkout_currencies" disabled
                                            value="{{ $paymentmethod_two_checkout_currencies->value }}"
                                            class="form-control">
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Enable Test Mode</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_two_checkout_test_mode_enabled"
                                                    id="paymentmethod_two_checkout_test_mode_enabled1" value="1"
                                                    @if ($paymentmethod_two_checkout_test_mode_enabled->value == 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="paymentmethod_two_checkout_test_mode_enabled1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_two_checkout_test_mode_enabled"
                                                    id="paymentmethod_two_checkout_test_mode_enabled2" value="0"
                                                    @if ($paymentmethod_two_checkout_test_mode_enabled->value != 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="paymentmethod_two_checkout_test_mode_enabled2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Selected by default on invoice</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_two_checkout_default_selected"
                                                    id="paymentmethod_two_checkout_default_selected1" value="1"
                                                    @if ($paymentmethod_two_checkout_default_selected->value == 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="paymentmethod_two_checkout_default_selected1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="paymentmethod_two_checkout_default_selected"
                                                    id="paymentmethod_two_checkout_default_selected2" value="0"
                                                    @if ($paymentmethod_two_checkout_default_selected->value != 1) checked @endif>
                                                <label class="form-check-label"
                                                    for="paymentmethod_two_checkout_default_selected2">
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
                    </form>
                    {{-- 2checkout end --}}
                </div>


            </div>
        </div>
    </div>
    </div>
@endsection
