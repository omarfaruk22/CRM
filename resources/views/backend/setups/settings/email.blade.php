@extends('backend.layouts.main')
@section('title', 'Customer Details')
@section('content')
    <div class="row">
        <div class="col-md-3">
            <h4 class="mt-3 mb-3">Settings</h4>
            @include('backend.partials.settings-sidebar')
        </div>
        <div class="col-md-9">
            <h4 class="mt-3 mb-3">Email</h4>

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
                    <form action="{{ route('settings.email.update') }}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-pills mb-3" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" data-bs-toggle="pill" href="#primary-pills-smtp"
                                            role="tab" aria-selected="true">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon">
                                                </div>
                                                <div class="tab-title">SMTP Settings</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="pill" href="#primary-pills-email" role="tab"
                                            aria-selected="false" tabindex="-1">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon">
                                                </div>
                                                <div class="tab-title">Email Queue</div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade active show" id="primary-pills-smtp" role="tabpanel">
                                <div class="row">
                                    <div class="d-flex mb-3">
                                        <h5>SMTP Settings </h5>
                                        <p class="mt-1 mx-1"> Setup main email</p>
                                    </div>
                                    <hr>
                                    <div class="col-md-12">
                                        <p class="form">Mail Engine</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio" name="mail_engine"
                                                    id="mail_engine1" value="phpmailer"
                                                    @if ($mail_engine->value == 'phpmailer') checked @endif>
                                                <label class="form-check-label" for="mail_engine1">
                                                    PHP Mailer
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio" name="mail_engine"
                                                    id="mail_engine2" value="codeigniter"
                                                    @if ($mail_engine->value == 'codeigniter') checked @endif>
                                                <label class="form-check-label" for="mail_engine2">
                                                    CodeIgniter
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Email Protocol</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio" name="email_protocol"
                                                    id="email_protocol1" value="smtp"
                                                    @if ($email_protocol->value == 'smtp') checked @endif>
                                                <label class="form-check-label" for="email_protocol1">
                                                    SMTP
                                                </label>
                                            </div>
                                            <div class="me-2 microsoft">
                                                <input class="form-check-input" type="radio" name="email_protocol"
                                                    id="email_protocol2" value="microsoft"
                                                    @if ($email_protocol->value == 'microsoft') checked @endif>
                                                <label class="form-check-label" for="email_protocol2">
                                                    Microsoft OAuth 2.0
                                                </label>
                                            </div>
                                            <div class="me-2 google">
                                                <input class="form-check-input" type="radio" name="email_protocol"
                                                    id="email_protocol3" value="google"
                                                    @if ($email_protocol->value == 'google') checked @endif>
                                                <label class="form-check-label" for="email_protocol3">
                                                    Gmail OAuth 2.0
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio" name="email_protocol"
                                                    id="email_protocol4" value="sendmail"
                                                    @if ($email_protocol->value == 'sendmail') checked @endif>
                                                <label class="form-check-label" for="email_protocol4">
                                                    Sendmail
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio" name="email_protocol"
                                                    id="email_protocol5" value="mail"
                                                    @if ($email_protocol->value == 'mail') checked @endif>
                                                <label class="form-check-label" for="email_protocol5">
                                                    Mail

                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- this use for  Microsoft OAuth 2.0 and Gmail OAuth 2.0 when click this below table show  --}}
                                    <div class="border p-2 rounded d-none" id="m_soft">
                                        <p>These details are obtained by setting up an app in your Microsoft Azure
                                            developer
                                            portal.
                                        </p>
                                        <span class="d-flex"><strong>Redirect URL:&nbsp;</strong>
                                            <p>https://democrm.smarterp.biz/admin/smtp_oauth_microsoft/token</p>
                                        </span>
                                        <div class="col-md-12">
                                            <label for="microsoft_mail_client_id" class="form-label">Client Id</label>
                                            <input type="text" name="microsoft_mail_client_id"
                                                id="microsoft_mail_client_id"
                                                value="{{ $microsoft_mail_client_id->value }}" class="form-control mb-3">

                                        </div>
                                        <div class="col-md-12">
                                            <label for="microsoft_mail_client_secret" class="form-label">Client
                                                Secret</label>
                                            <input type="text" name="microsoft_mail_client_secret"
                                                id="microsoft_mail_client_secret" class="form-control mb-3"
                                                value="{{ $microsoft_mail_client_secret->value }}">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="microsoft_mail_azure_tenant_id" class="form-label">Tenant ID
                                                (only
                                                relevant for
                                                Azure)</label>
                                            <input type="text" name="microsoft_mail_azure_tenant_id"
                                                id="microsoft_mail_azure_tenant_id" class="form-control mb-3"
                                                value="{{ $microsoft_mail_azure_tenant_id->value }}">
                                        </div>
                                    </div>
                                    {{-- Microsoft OAuth 2.0 and Gmail OAuth 2.0 end --}}
                                    {{-- g outh --}}
                                    <div class="border p-2 rounded d-none" id="g_outh">
                                        <p>These details are obtained by setting up a project in your Google API
                                            Console.
                                        </p>
                                        <span class="d-flex"><strong>Redirect URL:&nbsp;</strong>
                                            <p> https://democrm.smarterp.biz/admin/smtp_oauth_google/token</p>
                                        </span>
                                        <div class="col-md-12">
                                            <label for="google_mail_client_id" class="form-label">Client Id</label>
                                            <input type="text" name="google_mail_client_id" id="google_mail_client_id"
                                                value="{{ $google_mail_client_id->value }}" class="form-control mb-3">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="google_mail_client_secret" class="form-label">Client
                                                Secret</label>
                                            <input type="text" name="google_mail_client_secret"
                                                id="google_mail_client_secret" class="form-control mb-3"
                                                value="{{ $google_mail_client_secret->value }}">
                                        </div>

                                    </div>
                                    {{-- end g outh  --}}

                                    <div class="col-md-12 mt-2 mb-3" id="o_mail1">
                                        <label for="smtp_encryption" class="form-label">Email Encryption</label>
                                        <select class="form-select form-select-sm" name="smtp_encryption"
                                            id="smtp_encryption" aria-label=".form-select-sm example">
                                            <option>None</option>
                                            <option value="ssl" @if ($smtp_encryption->value == 'ssl') selected @endif>
                                                SSL
                                            </option>
                                            <option value="tls" @if ($smtp_encryption->value == 'tls') selected @endif>
                                                TLS
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-12" id="o_mail2">
                                        <label for="smtp_host" class="form-label">SMTP Host</label>
                                        <input type="text" name="smtp_host" id="smtp_host"
                                            value="{{ $smtp_host->value }}" class="form-control mb-3">
                                    </div>
                                    <div class="col-md-12" id="o_mail3">
                                        <label for="smtp_port" class="form-label">SMTP Port</label>
                                        <input type="text" name="smtp_port" id="smtp_port" class="form-control mb-3"
                                            value="{{ $smtp_port->value }}">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="smtp_email" class="form-label">Email</label>
                                        <input type="text" name="smtp_email" id="smtp_email"
                                            class="form-control mb-3" value="{{ $smtp_email->value }}">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="smtp_username" class="form-label">SMTP Username</label>
                                        <input type="text" name="smtp_username" id="smtp_username"
                                            class="form-control mb-3" value="{{ $smtp_username->value }}">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="smtp_password" class="form-label">SMTP Password</label>
                                        <input type="password" name="smtp_password" id="smtp_password"
                                            class="form-control mb-3" value="{{ $smtp_password->value }}">

                                    </div>
                                    <div class="col-md-12">
                                        <label for="smtp_email_charset" class="form-label">Email Charset </label>
                                        <input type="text" name="smtp_email_charset" id="smtp_email_charset"
                                            class="form-control mb-3" value="{{ $smtp_email_charset->value }}">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="bcc_emails" class="form-label">BCC All Emails To</label>
                                        <input type="text" name="bcc_emails" id="bcc_emails"
                                            class="form-control mb-3" value="{{ $bcc_emails->value }}">
                                    </div>

                                    <div class="col-md-12">
                                        <label for="email_signature" class="form-label">Email Signature</label>
                                        <textarea type="text" name="email_signature" id="email_signature"class="form-control mb-3">
                                                {{ $email_signature->value }}
                                            </textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="email_header" class="form-label">Predefined Header</label>
                                        <textarea type="text" name="email_header" rows="6" id="email_header"class="form-control mb-3">
                                                            {!! $email_header->value !!}                                    
                                                </textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="email_footer" class="form-label">Predefined Footer</label>
                                        <textarea type="text" rows="8" name="email_footer" id="email_footer"class="form-control mb-3">
                                                {!! $email_footer->value !!}
                                                </textarea>
                                    </div>
                                    {{-- <div class="col-md-12">
                                            <h5>Send Test Email</h5>
                                            <p>Send test email to make sure that your SMTP settings is set correctly.
                                            </p>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control"
                                                    placeholder="Email Address" aria-label="Recipient's username"
                                                    aria-describedby="button-addon2">
                                                <button class="btn btn-outline-primary" type="button"
                                                    id="button-addon2">Test</button>
                                            </div>
                                        </div> --}}
                                    <div class="col-md-12 mb-3 text-end">
                                        <button type="submit" class="btn btn-primary">Save Settings</button>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="primary-pills-email" role="tabpanel">
                                <div class="row">
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        This feature requires a properly configured cron job. Before activating the
                                        feature,
                                        make
                                        sure that the cron job is configured as explanation in the documentation.
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form"> Enable Email Queue</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio" name="email_queue_enabled"
                                                    id="email_queue_enabled1" value="1"
                                                    @if ($email_queue_enabled->value == 1) checked @endif>
                                                <label class="form-check-label" for="email_queue_enabled1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio" name="email_queue_enabled"
                                                    id="email_queue_enabled2" value="0"
                                                    @if ($email_queue_enabled->value != 1) checked @endif>
                                                <label class="form-check-label" for="email_queue_enabled">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Do not add emails with attachments in the queue?</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="email_queue_skip_with_attachments"
                                                    id="email_queue_skip_with_attachments1" value="1"
                                                    @if ($email_queue_skip_with_attachments->value == 1) checked @endif>
                                                <label class="form-check-label" for="email_queue_skip_with_attachments1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="email_queue_skip_with_attachments"
                                                    id="email_queue_skip_with_attachments2" value="0"
                                                    @if ($email_queue_skip_with_attachments->value != 1) checked @endif>
                                                <label class="form-check-label" for="email_queue_skip_with_attachments2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <h4>Email Queue</h4>

                                        <div class="d-flex justify-content-between mb-4">
                                            <div class="me-2 d-flex">
                                                <div class="me-2">
                                                    <select class="form-select" wire:model.live="size" name="size">
                                                        <option value="5">5</option>
                                                        <option selected value="10">10</option>
                                                        <option value="25">25</option>
                                                        <option value="50">50</option>
                                                        <option value="100">100</option>
                                                    </select>
                                                </div>
                                                <div class="">
                                                    <div class="col">
                                                        <div class="dropdown">
                                                            <button class="btn btn-outline-secondary dropdown-toggle"
                                                                type="button" data-bs-toggle="dropdown"
                                                                aria-expanded="false">Export</button>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item"
                                                                        href="{{ route('customers.profile.contact.export.pdf', 1) }}">Pdf</a>
                                                                </li>
                                                                <li><a class="dropdown-item"
                                                                        href="{{ route('customers.profile.contact.export.excel', 1) }}">Excel</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="">
                                                <div class="d-flex">
                                                    <div class="search-box">
                                                        <input type="text" wire:model.live="search"
                                                            class="form-control" id="searchProductList"
                                                            autocomplete="off" placeholder="Search Users...">
                                                        <i class="ri-search-line search-icon"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table id="example" class="table table-striped table-bordered"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <td>Subject</td>
                                                        <th>To</th>
                                                        <th>Status</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td colspan="4">
                                                            <p>No entries found</p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3 text-end">
                                        <button type="submit" class="btn btn-primary">Save Settings</button>
                                    </div>
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
        $(document).ready(function() {
            // mail engine 
            function mailengine() {
                if ($('#mail_engine2').prop('checked')) {
                    $(".microsoft").hide();
                    $(".google").hide();
                } else {
                    $(".microsoft").show();
                    $(".google").show();
                }
            }
            mailengine();
            $('#mail_engine2').click(function() {
                mailengine();
            });
            $('#mail_engine1').click(function() {
                if ($('#mail_engine1').prop('checked')) {
                    $(".microsoft").show();
                    $(".google").show();
                } else {
                    $(".microsoft").hide();
                    $(".google").hide();
                }
            });
            // end mail engine 
            // email protocol 
            function emailprotocol2() {
                if ($('#email_protocol2').prop('checked')) {
                    $("#m_soft").removeClass('d-none');
                    $("#g_outh").addClass('d-none');
                    $("#o_mail1").removeClass('d-none');
                    $("#o_mail2").removeClass('d-none');
                    $("#o_mail3").removeClass('d-none');
                } else {
                    $("#m_soft").addClass('d-none');
                    $("#g_outh").removeClass('d-none');
                }
            }
            $('#email_protocol2').click(function() {
                emailprotocol2();
            });
            emailprotocol2();

            function emailprotocol3() {
                if ($('#email_protocol3').prop('checked')) {
                    $("#g_outh").removeClass('d-none');
                    $("#m_soft").addClass('d-none');
                    $("#o_mail1").removeClass('d-none');
                    $("#o_mail2").removeClass('d-none');
                    $("#o_mail3").removeClass('d-none');
                } else {
                    $("#g_outh").addClass('d-none');
                    $("#m_soft").removeClass('d-none');
                }
            }
            $('#email_protocol3').click(function() {
                emailprotocol3();
            });
            emailprotocol3();

            function emailprotocolat3() {
                if ($('#email_protocol1').prop('checked') || $('#email_protocol4').prop('checked') || $(
                        '#email_protocol5').prop('checked')) {
                    $("#g_outh").addClass('d-none');
                    $("#m_soft").addClass('d-none');
                    $("#o_mail1").removeClass('d-none');
                    $("#o_mail2").removeClass('d-none');
                    $("#o_mail3").removeClass('d-none');
                } else {
                    $("#g_outh").removeClass('d-none');
                    $("#m_soft").removeClass('d-none');
                }
            }
            $('#email_protocol1, #email_protocol4').click(function() {
                emailprotocolat3();
            });
            emailprotocolat3();

            function emailprotocol5() {
                if ($('#email_protocol5').prop('checked')) {
                    $("#o_mail1").addClass('d-none');
                    $("#o_mail2").addClass('d-none');
                    $("#o_mail3").addClass('d-none');
                    $("#g_outh").addClass('d-none');
                    $("#m_soft").addClass('d-none');
                } else {
                    $("#o_mail1").removeClass('d-none');
                    $("#o_mail2").removeClass('d-none');
                    $("#o_mail3").removeClass('d-none');
                }
            }
            $('#email_protocol5').click(function() {
                emailprotocol5();
            });
            emailprotocol5();
            // end email protocol 
        });
    </script>
@endpush
