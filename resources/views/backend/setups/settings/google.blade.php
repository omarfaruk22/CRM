@extends('backend.layouts.main')
@section('title', 'Customer Details')
@section('content')
    <div class="row">

        <div class="col-md-3">
            <h4 class="mt-3 mb-3">Settings</h4>
            @include('backend.partials.settings-sidebar')
        </div>

        <div class="col-md-9">

            <h4 class="mt-3 mb-3">Google</h4>

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
                    <form action="{{ route('settings.google.update') }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-md-12">
                                <label for="google_api_key" class="form-label">Google API Key</label>
                                <input type="text" name="google_api_key" id="google_api_key" class="form-control mb-3"
                                    value="{{ $google_api_key->value }}">
                            </div>

                            <div class="col-md-12">
                                <label for="google_client_id" class="form-label">Google API Client ID</label>
                                <input type="text" name="google_client_id" id="google_client_id"
                                    class="form-control mb-3" value="{{ $google_client_id->value }}">
                            </div>

                            <div class="col-md-12">
                                <h6>reCAPTCHA</h6>
                                <label for="recaptcha_site_key" class="form-label">Site key</label>
                                <input type="text" name="recaptcha_site_key" id="recaptcha_site_key"
                                    class="form-control mb-3" value="{{ $recaptcha_site_key->value }}">
                            </div>

                            <div class="col-md-12">
                                <label for="recaptcha_secret_key" class="form-label">Secret key</label>
                                <input type="text" name="recaptcha_secret_key" id="recaptcha_secret_key"
                                    class="form-control mb-3" value="{{ $recaptcha_secret_key->value }}">
                            </div>


                            <div class="col-md-12">
                                <p class="form">Enable reCAPTCHA on customers area (Login/Register)</p>
                                <div class="mb-3 col-md-12 d-flex">
                                    <div class="me-2">
                                        <input class="form-check-input" type="radio" name="use_recaptcha_customers_area"
                                            id="use_recaptcha_customers_area1" value="1"
                                            @if ($use_recaptcha_customers_area->value == 1) checked @endif>
                                        <label class="form-check-label" for="use_recaptcha_customers_area1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="me-2">
                                        <input class="form-check-input" type="radio" name="use_recaptcha_customers_area"
                                            id="use_recaptcha_customers_area2" value="0"
                                            @if ($use_recaptcha_customers_area->value != 1) checked @endif>
                                        <label class="form-check-label" for="use_recaptcha_customers_area2">
                                            No
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="recaptcha_ignore_ips" class="form-label">Ignored IP Addresses</label>
                                <textarea type="text" name="recaptcha_ignore_ips" rows="6" id="recaptcha_ignore_ips" class="form-control mb-3">
                                    {{ $recaptcha_ignore_ips->value }}
                                </textarea>
                            </div>

                            <p>Enter coma separated IP addresses that you want the reCaptcha to skip validation.</p>
                            <hr>

                            <div class="col-md-12">
                                <h6>Calendar</h6>
                                <label for="google_calendar_main_calendar" class="form-label">Google Calendar ID</label>
                                <input type="text" name="google_calendar_main_calendar"
                                    id="google_calendar_main_calendar" class="form-control mb-3"
                                    value="{{ $google_calendar_main_calendar->value }}">
                            </div>

                            <hr>

                            <div class="col-md-12">
                                <h6>Google Picker</h6>
                                <p class="form"> Enable Google Picker</p>
                                <div class="mb-3 col-md-12 d-flex">
                                    <div class="me-2">
                                        <input class="form-check-input" type="radio" name="enable_google_picker"
                                            id="enable_google_picker1" value="1"
                                            @if ($enable_google_picker->value == 1) checked @endif>
                                        <label class="form-check-label" for="enable_google_picker1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="me-2">
                                        <input class="form-check-input" type="radio" name="enable_google_picker"
                                            id="enable_google_picker2" value="0"
                                            @if ($enable_google_picker->value != 1) checked @endif>
                                        <label class="form-check-label" for="enable_google_picker2">
                                            No
                                        </label>
                                    </div>
                                </div>
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
