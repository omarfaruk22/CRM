@extends('backend.layouts.main')
@section('title', 'Customer Details')
@section('content')
    <div class="row">

        <div class="col-md-3">
            <h4 class="mt-3 mb-3">Settings</h4>
            @include('backend.partials.settings-sidebar')
        </div>

        <div class="col-md-9">

            <h4 class="mt-3 mb-3">SMS</h4>

            {{-- successfull message start --}}
            @if (session('group'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Weldone!</strong> {{ session('group') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <form action="{{ route('settings.sms.update') }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                Only 1 active SMS gateway is allowed
                            </div>

                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseOne" aria-expanded="false"
                                            aria-controls="flush-collapseOne">
                                            Clickatell
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample"
                                        style="">
                                        <div class="accordion-body">
                                            <div class="row">
                                                <p>Clickatell SMS integration is one way messaging, means that your
                                                    customers won't be able to reply to the SMS.</p>
                                                <hr>

                                                <div class="col-md-12">
                                                    <label for="sms_clickatell_api_key" class="form-label">API Key</label>
                                                    <input type="text" name="sms_clickatell_api_key"
                                                        id="sms_clickatell_api_key" class="form-control mb-3"
                                                        value="{{ $sms_clickatell_api_key->value }}">
                                                </div>

                                                <div class="col-md-12 mb-2">
                                                    <p class="form">Active</p>
                                                    <div class="mb-3 col-md-12 d-flex">
                                                        <div class="me-2">
                                                            <input class="form-check-input" type="radio"
                                                                name="sms_clickatell_active" id="sms_clickatell_active1"
                                                                value="1"
                                                                {{ $sms_clickatell_active->value == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="sms_clickatell_active1">
                                                                Yes
                                                            </label>
                                                        </div>
                                                        <div class="me-2">
                                                            <input class="form-check-input" type="radio"
                                                                name="sms_clickatell_active" id="sms_clickatell_active2"
                                                                value="0"
                                                                {{ $sms_clickatell_active->value != 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="sms_clickatell_active2">
                                                                No
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                            aria-controls="flush-collapseTwo">
                                            MSG91
                                        </button>
                                    </h2>
                                    <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample"
                                        style="">
                                        <div class="accordion-body">
                                            <div class="row">
                                                <p>MSG91 SMS integration is one way messaging, means that your customers
                                                    won't be able to reply to the SMS.</p>
                                                <hr>
                                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                    This SMS gateway is deprecated and may be removed in future updates.
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="sms_msg91_sender_id" class="form-label">Sender ID</label>
                                                    <input type="text" name="sms_msg91_sender_id"
                                                        id="sms_msg91_sender_id" class="form-control mb-3"
                                                        value="{{ $sms_msg91_sender_id->value }}">
                                                    <a
                                                        href="https://help.msg91.com/article/40-what-is-a-sender-id-how-to-select-a-sender-id">https://help.msg91.com/article/40-what-is-a-sender-id-how-to-select-a-sender-id</a>
                                                </div>

                                                <div class="col-md-12 mb-2">
                                                    <p class="form">Api Type</p>
                                                    <div class="mb-3 col-md-12 d-flex">
                                                        <div class="me-2">
                                                            <input class="form-check-input" type="radio"
                                                                name="sms_msg91_api_type" id="sms_msg91_api_type1"
                                                                value="world"
                                                                {{ $sms_msg91_api_type->value == 'world' ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="sms_msg91_api_type1">
                                                                World
                                                            </label>
                                                        </div>
                                                        <div class="me-2">
                                                            <input class="form-check-input" type="radio"
                                                                name="sms_msg91_api_type" id="sms_msg91_api_type2"
                                                                value="api"
                                                                {{ $sms_msg91_api_type->value == 'api' ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="sms_msg91_api_type2">
                                                                Api
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-md-12">
                                                    <label for="sms_msg91_auth_key" class="form-label">Auth Key</label>
                                                    <input type="text" name="sms_msg91_auth_key"
                                                        id="sms_msg91_auth_key" class="form-control mb-3"
                                                        value="{{ $sms_msg91_auth_key->value }}">
                                                </div>


                                                <div class="col-md-12 mb-2">
                                                    <p class="form">Active</p>
                                                    <div class="mb-3 col-md-12 d-flex">
                                                        <div class="me-2">
                                                            <input class="form-check-input" type="radio"
                                                                name="sms_msg91_active" id="sms_msg91_active1"
                                                                value="1"
                                                                {{ $sms_msg91_active->value == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="sms_msg91_active1">
                                                                Yes
                                                            </label>
                                                        </div>
                                                        <div class="me-2">
                                                            <input class="form-check-input" type="radio"
                                                                name="sms_msg91_active" id="sms_msg91_active2"
                                                                value="0"
                                                                {{ $sms_msg91_active->value != 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="sms_msg91_active2">
                                                                No
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingThree">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseThree"
                                            aria-expanded="false" aria-controls="flush-collapseThree">
                                            Twilio
                                        </button>
                                    </h2>
                                    <div id="flush-collapseThree" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <div class="row">
                                                <p>Twilio SMS integration is one way messaging, means that your customers
                                                    won't be able to reply to the SMS. Phone numbers must be in format
                                                    E.164. Click here to read more how phone numbers should be formatted.
                                                </p>

                                                <div class="col-md-12">
                                                    <label for="sms_twilio_account_sid" class="form-label">Account
                                                        SID</label>
                                                    <input type="text" name="sms_twilio_account_sid"
                                                        id="sms_twilio_account_sid" class="form-control mb-3"
                                                        value="{{ $sms_twilio_account_sid->value }}">
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="sms_twilio_auth_token" class="form-label">Auth
                                                        Token</label>
                                                    <input type="text" name="sms_twilio_auth_token"
                                                        id="sms_twilio_auth_token" class="form-control mb-3"
                                                        value="{{ $sms_twilio_auth_token->value }}">
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="sms_twilio_phone_number" class="form-label">Twilio Phone
                                                        Number</label>
                                                    <input type="text" name="sms_twilio_phone_number"
                                                        id="sms_twilio_phone_number" class="form-control mb-3"
                                                        value="{{ $sms_twilio_phone_number->value }}">
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="sms_twilio_sender_id" class="form-label">Alphanumeric
                                                        Sender
                                                        ID</label>
                                                    <input type="text" name="sms_twilio_sender_id"
                                                        id="sms_twilio_sender_id" class="form-control mb-3"
                                                        value="{{ $sms_twilio_sender_id->value }}">
                                                    <a
                                                        href="">https://www.twilio.com/blog/personalize-sms-alphanumeric-sender-id</a>
                                                </div>

                                                <div class="col-md-12 mb-2">
                                                    <p class="form">Active</p>
                                                    <div class="mb-3 col-md-12 d-flex">
                                                        <div class="me-2">
                                                            <input class="form-check-input" type="radio"
                                                                name="sms_twilio_active" id="sms_twilio_active1"
                                                                value="1"
                                                                {{ $sms_twilio_active->value == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="sms_twilio_active1">
                                                                Yes
                                                            </label>
                                                        </div>
                                                        <div class="me-2">
                                                            <input class="form-check-input" type="radio"
                                                                name="sms_twilio_active" id="sms_twilio_active2"
                                                                value="0"
                                                                {{ $sms_twilio_active->value != 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="sms_twilio_active2">
                                                                No
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="bitly_access_token" class="form-label">Bitly Access Token</label>
                                <input type="text" name="bitly_access_token" id="bitly_access_token"
                                    class="form-control mb-3" value="{{ $bitly_access_token->value }}">
                            </div>

                            <h6>Triggers</h6>
                            <div class="d-flex justify-content-between">
                                <div class="">
                                    <p>Invoice Overdue Notice</p>
                                </div>
                                <div class="">
                                    <a href="" data-bs-toggle="collapse" data-bs-target="#toggleDiv1"
                                        aria-expanded="false" aria-controls="toggleDiv">Available merge fields</a>
                                </div>
                            </div>
                            <p>Trigger when invoice overdue notice is sent to customer contacts.</p>

                            <div class="col-md-12">
                                <textarea class="form-control mb-3" name="sms_trigger_invoice_overdue_notice"
                                    id="sms_trigger_invoice_overdue_notice">{{ $sms_trigger_invoice_overdue_notice->value }}
                                </textarea>
                            </div>

                            <div class="collapse" id="toggleDiv1">
                                <p>
                                    <a href="#" class="settings-textarea-merge-field"
                                        data-to="sms_trigger_invoice_overdue_notice">{contact_firstname}</a>
                                    <a href="#" class="settings-textarea-merge-field"
                                        data-to="sms_trigger_invoice_overdue_notice">{contact_lastname}</a>,
                                    <a href="#" class="settings-textarea-merge-field"
                                        data-to="sms_trigger_invoice_overdue_notice">{client_company}</a>,
                                    <a href="#" class="settings-textarea-merge-field"
                                        data-to="sms_trigger_invoice_overdue_notice">{client_vat_number}</a>,
                                    <a href="#" class="settings-textarea-merge-field"
                                        data-to="sms_trigger_invoice_overdue_notice">{client_id}</a>,
                                    <a href="#" class="settings-textarea-merge-field"
                                        data-to="sms_trigger_invoice_overdue_notice">{country_code}</a>,
                                    <a href="#" class="settings-textarea-merge-field"
                                        data-to="sms_trigger_invoice_overdue_notice">{invoice_link}</a>,
                                    <a href="#" class="settings-textarea-merge-field"
                                        data-to="sms_trigger_invoice_overdue_notice">{invoice_number}</a>,
                                    <a href="#" class="settings-textarea-merge-field"
                                        data-to="sms_trigger_invoice_overdue_notice">{invoice_duedate}</a>
                                    <a href="#" class="settings-textarea-merge-field"
                                        data-to="sms_trigger_invoice_overdue_notice">{invoice_date}</a>
                                    <a href="#" class="settings-textarea-merge-field"
                                        data-to="sms_trigger_invoice_overdue_notice">{invoice_status}</a>
                                    <a href="#" class="settings-textarea-merge-field"
                                        data-to="sms_trigger_invoice_overdue_notice">{invoice_subtotal}</a>
                                    <a href="#" class="settings-textarea-merge-field"
                                        data-to="sms_trigger_invoice_overdue_notice">{invoice_total}</a>
                                    <a href="#" class="settings-textarea-merge-field"
                                        data-to="sms_trigger_invoice_overdue_notice">{invoice_amount_due}</a>
                                    <a href="#" class="settings-textarea-merge-field"
                                        data-to="sms_trigger_invoice_overdue_notice">{invoice_short_url}</a>
                                    <a href="#" class="settings-textarea-merge-field"
                                        data-to="sms_trigger_invoice_overdue_notice">{total_days_overdue}</a>
                                </p>
                                <hr>
                            </div>

                            <div class="d-flex justify-content-between">
                                <div class="">
                                    <h6>Invoice Due Notice</h6>
                                </div>
                                <div class="">
                                    <a href="" data-bs-toggle="collapse" data-bs-target="#toggleDiv2"
                                        aria-expanded="false" aria-controls="toggleDiv">Available merge fields</a>
                                </div>
                            </div>
                            <p>Trigger when invoice due notice is sent to customer contacts.</p>
                            <div class="col-md-12">
                                <textarea class="form-control mb-3" name="sms_trigger_invoice_due_notice" id="sms_trigger_invoice_due_notice">
                                    {{ $sms_trigger_invoice_due_notice->value }}
                                </textarea>
                            </div>

                            <div class="collapse" id="toggleDiv2">
                                <p>
                                    <a href="#" class="settings-textarea-merge-field1"
                                        data-to="sms_trigger_invoice_due_notice">{contact_firstname}</a>
                                    <a href="#" class="settings-textarea-merge-field1"
                                        data-to="sms_trigger_invoice_due_notice">{contact_lastname}</a>,
                                    <a href="#" class="settings-textarea-merge-field1"
                                        data-to="sms_trigger_invoice_due_notice">{client_company}</a>,
                                    <a href="#" class="settings-textarea-merge-field1"
                                        data-to="sms_trigger_invoice_due_notice">{client_vat_number}</a>,
                                    <a href="#" class="settings-textarea-merge-field1"
                                        data-to="sms_trigger_invoice_due_notice">{client_id}</a>,
                                    <a href="#" class="settings-textarea-merge-field1"
                                        data-to="sms_trigger_invoice_due_notice">{country_code}</a>,
                                    <a href="#" class="settings-textarea-merge-field1"
                                        data-to="sms_trigger_invoice_due_notice">{invoice_link}</a>,
                                    <a href="#" class="settings-textarea-merge-field1"
                                        data-to="sms_trigger_invoice_due_notice">{invoice_number}</a>,
                                    <a href="#" class="settings-textarea-merge-field1"
                                        data-to="sms_trigger_invoice_due_notice">{invoice_duedate}</a>
                                    <a href="#" class="settings-textarea-merge-field1"
                                        data-to="sms_trigger_invoice_due_notice">{invoice_date}</a>
                                    <a href="#" class="settings-textarea-merge-field1"
                                        data-to="sms_trigger_invoice_due_notice">{invoice_status}</a>
                                    <a href="#" class="settings-textarea-merge-field1"
                                        data-to="sms_trigger_invoice_due_notice">{invoice_subtotal}</a>
                                    <a href="#" class="settings-textarea-merge-field1"
                                        data-to="sms_trigger_invoice_due_notice">{invoice_total}</a>
                                    <a href="#" class="settings-textarea-merge-field1"
                                        data-to="sms_trigger_invoice_due_notice">{invoice_amount_due}</a>
                                    <a href="#" class="settings-textarea-merge-field1"
                                        data-to="sms_trigger_invoice_due_notice">{invoice_short_url}</a>
                                </p>
                            </div>

                            <div class="d-flex justify-content-between">
                                <div class="">
                                    <h6>Invoice Payment Recorded</h6>
                                </div>
                                <div class="">
                                    <a href="" data-bs-toggle="collapse" data-bs-target="#toggleDiv3"
                                        aria-expanded="false" aria-controls="toggleDiv">Available merge fields</a>
                                </div>
                            </div>
                            <p>Trigger when invoice payment is recorded.</p>
                            <div class="col-md-12">
                                <textarea class="form-control mb-3" name="sms_trigger_invoice_payment_recorded"
                                    id="sms_trigger_invoice_payment_recorded">
                                    {{ $sms_trigger_invoice_payment_recorded->value }}
                                </textarea>

                            </div>
                            <div class="collapse" id="toggleDiv3">
                                <p>

                                    <a href="#" class="settings-textarea-merge-field2"
                                        data-to="sms_trigger_invoice_payment_recorded">{contact_firstname}</a>
                                    <a href="#" class="settings-textarea-merge-field2"
                                        data-to="sms_trigger_invoice_payment_recorded">{contact_lastname}</a>,
                                    <a href="#" class="settings-textarea-merge-field2"
                                        data-to="sms_trigger_invoice_payment_recorded">{client_company}</a>,
                                    <a href="#" class="settings-textarea-merge-field2"
                                        data-to="sms_trigger_invoice_payment_recorded">{client_vat_number}</a>,
                                    <a href="#" class="settings-textarea-merge-field2"
                                        data-to="sms_trigger_invoice_payment_recorded">{client_id}</a>,
                                    <a href="#" class="settings-textarea-merge-field2"
                                        data-to="sms_trigger_invoice_payment_recorded">{country_code}</a>,
                                    <a href="#" class="settings-textarea-merge-field2"
                                        data-to="sms_trigger_invoice_payment_recorded">{invoice_link}</a>,
                                    <a href="#" class="settings-textarea-merge-field2"
                                        data-to="sms_trigger_invoice_payment_recorded">{invoice_number}</a>,
                                    <a href="#" class="settings-textarea-merge-field2"
                                        data-to="sms_trigger_invoice_payment_recorded">{invoice_duedate}</a>
                                    <a href="#" class="settings-textarea-merge-field2"
                                        data-to="sms_trigger_invoice_payment_recorded">{invoice_date}</a>
                                    <a href="#" class="settings-textarea-merge-field2"
                                        data-to="sms_trigger_invoice_payment_recorded">{invoice_status}</a>
                                    <a href="#" class="settings-textarea-merge-field2"
                                        data-to="sms_trigger_invoice_payment_recorded">{invoice_subtotal}</a>
                                    <a href="#" class="settings-textarea-merge-field2"
                                        data-to="sms_trigger_invoice_payment_recorded">{invoice_total}</a>
                                    <a href="#" class="settings-textarea-merge-field2"
                                        data-to="sms_trigger_invoice_payment_recorded">{invoice_amount_due}</a>
                                    <a href="#" class="settings-textarea-merge-field2"
                                        data-to="sms_trigger_invoice_payment_recorded">{invoice_short_url}</a>
                                    <a href="#" class="settings-textarea-merge-field2"
                                        data-to="sms_trigger_invoice_payment_recorded">{payment_total}</a>
                                    <a href="#" class="settings-textarea-merge-field2"
                                        data-to="sms_trigger_invoice_payment_recorded">{payment_date}</a>
                                </p>
                            </div>

                            <div class="d-flex justify-content-between">
                                <div class="">
                                    <h6>Estimate Expiration Reminder</h6>
                                </div>
                                <div class="">
                                    <a href="" data-bs-toggle="collapse" data-bs-target="#toggleDiv4"
                                        aria-expanded="false" aria-controls="toggleDiv">Available merge fields</a>
                                </div>
                            </div>
                            <p>Trigger when expiration reminder should be send to customer contacts.</p>
                            <div class="col-md-12">
                                <textarea class="form-control mb-3" name="sms_trigger_estimate_expiration_reminder"
                                    id="sms_trigger_estimate_expiration_reminder">
                                    {{ $sms_trigger_estimate_expiration_reminder->value }}
                            </textarea>
                                @error('vat_number')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="collapse" id="toggleDiv4">
                                <p>


                                    <a href="#" class="settings-textarea-merge-field3"
                                        data-to="sms_trigger_estimate_expiration_reminder">{contact_firstname}</a>
                                    <a href="#" class="settings-textarea-merge-field3"
                                        data-to="sms_trigger_estimate_expiration_reminder">{contact_lastname}</a>,
                                    <a href="#" class="settings-textarea-merge-field3"
                                        data-to="sms_trigger_estimate_expiration_reminder">{client_company}</a>,
                                    <a href="#" class="settings-textarea-merge-field3"
                                        data-to="sms_trigger_estimate_expiration_reminder">{client_vat_number}</a>,
                                    <a href="#" class="settings-textarea-merge-field3"
                                        data-to="sms_trigger_estimate_expiration_reminder">{client_id}</a>,
                                    <a href="#" class="settings-textarea-merge-field3"
                                        data-to="sms_trigger_estimate_expiration_reminder">{estimate_link}</a>,
                                    <a href="#" class="settings-textarea-merge-field3"
                                        data-to="sms_trigger_estimate_expiration_reminder">{estimate_number}</a>,
                                    <a href="#" class="settings-textarea-merge-field3"
                                        data-to="sms_trigger_estimate_expiration_reminder">{estimate_date}</a>,
                                    <a href="#" class="settings-textarea-merge-field3"
                                        data-to="sms_trigger_estimate_expiration_reminder">{estimate_status}</a>
                                    <a href="#" class="settings-textarea-merge-field3"
                                        data-to="sms_trigger_estimate_expiration_reminder">{estimate_subtotal}</a>
                                    <a href="#" class="settings-textarea-merge-field3"
                                        data-to="sms_trigger_estimate_expiration_reminder">{estimate_total}</a>
                                    <a href="#" class="settings-textarea-merge-field3"
                                        data-to="sms_trigger_estimate_expiration_reminder">{estimate_short_url}</a>

                                </p>
                            </div>

                            <div class="d-flex justify-content-between">
                                <div class="">
                                    <h6>Proposal Expiration Reminder</h6>
                                </div>
                                <div class="">
                                    <a href="" data-bs-toggle="collapse" data-bs-target="#toggleDiv5"
                                        aria-expanded="false" aria-controls="toggleDiv">Available merge fields</a>
                                </div>
                            </div>
                            <p>Trigger when expiration reminder should be send to proposal.</p>
                            <div class="col-md-12">
                                <textarea class="form-control mb-3" name="sms_trigger_proposal_expiration_reminder"
                                    id="sms_trigger_proposal_expiration_reminder">
                                    {{ $sms_trigger_proposal_expiration_reminder->value }}
                                 </textarea>

                            </div>
                            <div class="collapse" id="toggleDiv5">
                                <p>
                                    <a href="#" class="settings-textarea-merge-field4"
                                        data-to="sms_trigger_proposal_expiration_reminder">{proposal_number}</a>
                                    <a href="#" class="settings-textarea-merge-field4"
                                        data-to="sms_trigger_proposal_expiration_reminder">{proposal_id}</a>,
                                    <a href="#" class="settings-textarea-merge-field4"
                                        data-to="sms_trigger_proposal_expiration_reminder">{proposal_subject}</a>,
                                    <a href="#" class="settings-textarea-merge-field4"
                                        data-to="sms_trigger_proposal_expiration_reminder">{proposal_date}</a>,
                                    <a href="#" class="settings-textarea-merge-field4"
                                        data-to="sms_trigger_proposal_expiration_reminder">{proposal_open_till}</a>,
                                    <a href="#" class="settings-textarea-merge-field4"
                                        data-to="sms_trigger_proposal_expiration_reminder">{proposal_subtotal}</a>,
                                    <a href="#" class="settings-textarea-merge-field4"
                                        data-to="sms_trigger_proposal_expiration_reminder">{proposal_total}</a>,
                                    <a href="#" class="settings-textarea-merge-field4"
                                        data-to="sms_trigger_proposal_expiration_reminder">{proposal_proposal_to}</a>,
                                    <a href="#" class="settings-textarea-merge-field4"
                                        data-to="sms_trigger_proposal_expiration_reminder">{proposal_link}</a>
                                    <a href="#" class="settings-textarea-merge-field4"
                                        data-to="sms_trigger_proposal_expiration_reminder">{proposal_short_url}</a>

                                </p>
                            </div>

                            <div class="d-flex justify-content-between">
                                <div class="">
                                    <h6>New Comment on Proposal (to customer)</h6>
                                </div>
                                <div class="">
                                    <a href="" data-bs-toggle="collapse" data-bs-target="#toggleDiv6"
                                        aria-expanded="false" aria-controls="toggleDiv">Available merge fields</a>
                                </div>
                            </div>
                            <p>Trigger when staff member comments on proposal, SMS will be sent to proposal number
                                (customer/lead).</p>
                            <div class="col-md-12">
                                <textarea class="form-control mb-3" name="sms_trigger_proposal_new_comment_to_customer"
                                    id="sms_trigger_proposal_new_comment_to_customer">
                                    {{ $sms_trigger_proposal_new_comment_to_customer->value }}
                               </textarea>
                            </div>
                            <div class="collapse" id="toggleDiv6">
                                <p>
                                    {proposal_number}, {proposal_id}, {proposal_subject}, {proposal_date},
                                    {proposal_open_till}, {proposal_subtotal}, {proposal_total}, {proposal_proposal_to},
                                    {proposal_link}, {proposal_short_url}
                                </p>
                            </div>

                            <div class="d-flex justify-content-between">
                                <div class="">
                                    <h6>New Comment on Proposal (to staff)</h6>
                                </div>
                                <div class="">
                                    <a href="" data-bs-toggle="collapse" data-bs-target="#toggleDiv7"
                                        aria-expanded="false" aria-controls="toggleDiv">Available merge fields</a>
                                </div>
                            </div>
                            <p>Trigger when customer/lead comments on proposal, SMS will be sent to proposal creator and
                                assigned staff member.</p>
                            <div class="col-md-12">
                                <textarea class="form-control mb-3" name="sms_trigger_proposal_new_comment_to_staff"
                                    id="sms_trigger_proposal_new_comment_to_staff">
                                    {{ $sms_trigger_proposal_new_comment_to_staff->value }}
                            </textarea>
                            </div>
                            <div class="collapse" id="toggleDiv7">
                                <p>
                                    {proposal_number}, {proposal_id}, {proposal_subject}, {proposal_date},
                                    {proposal_open_till}, {proposal_subtotal}, {proposal_total}, {proposal_proposal_to},
                                    {proposal_link}, {proposal_short_url}
                                </p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="">
                                    <h6>New Comment on Contract (to customer)</h6>
                                </div>
                                <div class="">
                                    <a href="" data-bs-toggle="collapse" data-bs-target="#toggleDiv8"
                                        aria-expanded="false" aria-controls="toggleDiv">Available merge fields</a>
                                </div>
                            </div>
                            <p>Trigger when staff member add comment to contract, SMS will be sent customer contacts.</p>
                            <div class="col-md-12">
                                <textarea class="form-control mb-3" name="sms_trigger_contract_new_comment_to_customer"
                                    id="sms_trigger_contract_new_comment_to_customer">
                                    {{ $sms_trigger_contract_new_comment_to_customer->value }}
                            </textarea>
                            </div>
                            <div class="collapse" id="toggleDiv8">
                                <p>
                                    {contact_firstname}, {contact_lastname}, {client_company}, {client_vat_number},
                                    {client_id}, {contract_id}, {contract_subject}, {contract_datestart},
                                    {contract_dateend}, {contract_contract_value}, {contract_link}, {contract_short_url}
                                </p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="">
                                    <h6>New Comment on Contract (to staff)</h6>
                                </div>
                                <div class="">
                                    <a href="" data-bs-toggle="collapse" data-bs-target="#toggleDiv9"
                                        aria-expanded="false" aria-controls="toggleDiv">Available merge fields</a>
                                </div>
                            </div>
                            <p>Trigger when customer add comment to contract, SMS will be sent to contract creator.</p>
                            <div class="col-md-12">
                                <textarea class="form-control mb-3" name="sms_trigger_contract_new_comment_to_staff"
                                    id="sms_trigger_contract_new_comment_to_staff">
                                    {{ $sms_trigger_contract_new_comment_to_staff->value }}
                                </textarea>

                            </div>
                            <div class="collapse" id="toggleDiv9">
                                <p>
                                    {contract_id}, {contract_subject}, {contract_datestart}, {contract_dateend},
                                    {contract_contract_value}, {contract_link}, {contract_short_url}
                                </p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="">
                                    <h6>Contract Expiration Reminder</h6>
                                </div>
                                <div class="">
                                    <a href="" data-bs-toggle="collapse" data-bs-target="#toggleDiv10"
                                        aria-expanded="false" aria-controls="toggleDiv">Available merge fields</a>
                                </div>
                            </div>
                            <p>Contract Expiration Reminder Trigger when expiration reminder should be send via Cron Job to
                                customer contacts.</p>
                            <div class="col-md-12">
                                <textarea class="form-control mb-3" name="sms_trigger_contract_expiration_reminder"
                                    id="sms_trigger_contract_expiration_reminder">
                                    {{ $sms_trigger_contract_expiration_reminder->value }}
                            </textarea>
                            </div>
                            <div class="collapse" id="toggleDiv10">
                                <p>
                                    {contact_firstname}, {contact_lastname}, {client_company}, {client_vat_number},
                                    {client_id}, {contract_id}, {contract_subject}, {contract_datestart},
                                    {contract_dateend}, {contract_contract_value}, {contract_link}, {contract_short_url}
                                </p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="">
                                    <h6>Contract Sign Reminder</h6>
                                </div>
                                <div class="">
                                    <a href="" data-bs-toggle="collapse" data-bs-target="#toggleDiv11"
                                        aria-expanded="false" aria-controls="toggleDiv">Available merge fields</a>
                                </div>
                            </div>
                            <p>Trigger when the contract is first time sent to the customer and automatically stopped when
                                the contract is signed.</p>
                            <div class="col-md-12">
                                <textarea class="form-control mb-3" name="sms_trigger_contract_sign_reminder_to_customer"
                                    id="sms_trigger_contract_sign_reminder_to_customer">
                                    {{ $sms_trigger_contract_sign_reminder_to_customer->value }}
                            </textarea>
                            </div>
                            <div class="collapse" id="toggleDiv11">
                                <p>
                                    {contact_firstname}, {contact_lastname}, {client_company}, {client_vat_number},
                                    {client_id}, {contract_id}, {contract_subject}, {contract_datestart},
                                    {contract_dateend}, {contract_contract_value}, {contract_link}, {contract_short_url}
                                </p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="">
                                    <h6>Staff Reminder</h6>
                                </div>
                                <div class="">
                                    <a href="" data-bs-toggle="collapse" data-bs-target="#toggleDiv12"
                                        aria-expanded="false" aria-controls="toggleDiv">Available merge fields</a>
                                </div>
                            </div>
                            <p>Trigger when staff is notified for a specific custom <a href="">reminder</a> </p>
                            <div class="col-md-12">
                                <textarea class="form-control mb-3" name="sms_trigger_staff_reminder" id="sms_trigger_staff_reminder">
                                    {{ $sms_trigger_staff_reminder->value }}
                                </textarea>
                            </div>
                            <div class="collapse" id="toggleDiv12">
                                <p>
                                    {staff_firstname}, {staff_lastname}, {staff_reminder_description},
                                    {staff_reminder_date}, {staff_reminder_relation_name}, {staff_reminder_relation_link}
                                </p>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var mergeFieldLinks = document.querySelectorAll('.settings-textarea-merge-field');
            var textarea = document.getElementById('sms_trigger_invoice_overdue_notice');

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

        document.addEventListener('DOMContentLoaded', function() {
            var mergeFieldLinks = document.querySelectorAll('.settings-textarea-merge-field1');
            var textarea = document.getElementById('sms_trigger_invoice_due_notice');

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
        document.addEventListener('DOMContentLoaded', function() {
            var mergeFieldLinks = document.querySelectorAll('.settings-textarea-merge-field2');
            var textarea = document.getElementById('sms_trigger_invoice_payment_recorded');

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
        document.addEventListener('DOMContentLoaded', function() {
            var mergeFieldLinks = document.querySelectorAll('.settings-textarea-merge-field3');
            var textarea = document.getElementById('sms_trigger_estimate_expiration_reminder');

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
        document.addEventListener('DOMContentLoaded', function() {
            var mergeFieldLinks = document.querySelectorAll('.settings-textarea-merge-field4');
            var textarea = document.getElementById('sms_trigger_proposal_expiration_reminder');

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
@endpush
