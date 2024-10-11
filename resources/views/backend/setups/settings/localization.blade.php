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

            <h4 class="mt-3 mb-3">Localization</h4>

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
                    <form action="{{ route('settings.localization.update') }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="col-md-12 mb-3">
                            <label for="dateformat" class="form-label">Date Format</label>
                            <select class="form-select form-select-sm" name="dateformat" id="date_format"
                                aria-label=".form-select-sm example">
                                <option value="d-m-Y|%d-%m-%Y" @if ($dateformat->value == 'd-m-Y|%d-%m-%Y') selected @endif>d-m-Y
                                </option>
                                <option value="d/m/Y|%d/%m/%Y" @if ($dateformat->value == 'd/m/Y|%d/%m/%Y') selected @endif>d/m/Y
                                </option>
                                <option value="m-d-Y|%m-%d-%Y" @if ($dateformat->value == 'm-d-Y|%m-%d-%Y') selected @endif>m-d-Y
                                </option>
                                <option value="m.d.Y|%m.%d.%Y" @if ($dateformat->value == 'm.d.Y|%m.%d.%Y') selected @endif>d.m.Y
                                </option>
                                <option value="m/d/Y|%m/%d/%Y" @if ($dateformat->value == 'm/d/Y|%m/%d/%Y') selected @endif>m/d/Y
                                </option>
                                <option value="Y-m-d|%Y-%m-%d" @if ($dateformat->value == 'Y-m-d|%Y-%m-%d') selected @endif>Y-m-d
                                </option>
                                <option value="d.m.Y|%d.%m.%Y" @if ($dateformat->value == 'd.m.Y|%d.%m.%Y') selected @endif>d.m.Y
                                </option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="time_format" class="form-label">Time Format</label>
                            <select class="form-select form-select-sm" name="time_format"
                                aria-label=".form-select-sm example">
                                <option value="24" @if ($time_format->value == '24') selected @endif>24 hours</option>
                                <option value="12" @if ($time_format->value == '12') selected @endif>12 hours</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="default_timezone" class="form-label">Default Timezone</label>
                            <select class="form-select" name="default_timezone" id="d_timezone"
                                data-placeholder="Choose one thing">

                                <optgroup label="">
                                    @foreach ($timezones as $timezone)
                                        <option value="{{ $timezone->name }}"
                                            @if ($timezone->name == $default_timezone->value) selected @endif>{{ $timezone->name }}
                                        </option>
                                    @endforeach
                                </optgroup>

                            </select>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="active_language" class="form-label">Default Language</label>
                            <select class="form-select form-select-sm" name="active_language" id="d_language"
                                aria-label=".form-select-sm example">
                                @foreach ($languages as $language)
                                    <option value="{{ $language->name }}"
                                        @if ($language->name == $active_language->value) selected @endif>
                                        {{ $language->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12">
                            <p class="form">Disable Languages</p>
                            <div class="mb-3 col-md-12 d-flex">
                                <div class="me-2">
                                    <input class="form-check-input" type="radio" name="disable_language"
                                        id="disable_language1" value="1"
                                        @if ($disable_language->value == 1) checked @endif>
                                    <label class="form-check-label" for="disable_language1">
                                        Yes
                                    </label>
                                </div>
                                <div class="me-2">
                                    <input class="form-check-input" type="radio" name="disable_language"
                                        id="disable_language2" value="0"
                                        @if ($disable_language->value == !1) checked @endif>
                                    <label class="form-check-label" for="disable_language2">
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <p class="form">Output client PDF documents from admin area in client language</p>
                            <div class="mb-3 col-md-12 d-flex">
                                <div class="me-2">
                                    <input class="form-check-input" type="radio"
                                        name="output_client_pdfs_from_admin_area_in_client_language"
                                        id="output_client_pdfs_from_admin_area_in_client_language1" value="1"
                                        @if ($output_client_pdfs_from_admin_area_in_client_language->value == 1) checked @endif>
                                    <label class="form-check-label"
                                        for="output_client_pdfs_from_admin_area_in_client_language1">
                                        Yes
                                    </label>
                                </div>
                                <div class="me-2">
                                    <input class="form-check-input" type="radio"
                                        name="output_client_pdfs_from_admin_area_in_client_language"
                                        id="output_client_pdfs_from_admin_area_in_client_language2"
                                        value="0"@if ($output_client_pdfs_from_admin_area_in_client_language->value == !1) checked @endif>
                                    <label class="form-check-label"
                                        for="output_client_pdfs_from_admin_area_in_client_language2">
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3 text-end">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
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
            $('#d_language').select2();
            $('#d_timezone').select2();
            $('#date_format').select2();
        });
    </script>
@endpush
