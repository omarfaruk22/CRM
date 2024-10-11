@extends('backend.layouts.main')
@section('title', 'Customer Details')
@section('content')
    <div class="row">

        <div class="col-md-3">
            <h4 class="mt-3 mb-3">Settings</h4>
            @include('backend.partials.settings-sidebar')
        </div>

        <div class="col-md-9">

            <h4 class="mt-3 mb-3">General</h4>

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
                    <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="col-md-12 mb-3">
                            <label for="company_logo" class="form-label">Company Logo</label>
                            <input type="file" name="company_logo" id="company_logo" value="" class="form-control">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="company_logo_dark" class="form-label">Company Logo Dark</label>
                            <input type="file" name="company_logo_dark" id="company_logo_dark" value=""
                                class="form-control">
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="favicon" class="form-label">Favicon</label>
                            <input type="file" name="favicon" id="favicon" value="" class="form-control">
                        </div>

                        <div class="col-md-12">
                            <label for="companyname" class="form-label">Company Name</label>
                            <input type="text" name="companyname" id="companyname" class="form-control mb-3"
                                value="{{ $companyname->value }}">
                            @error('company')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="main_domain" class="form-label">Company Main Domain</label>
                            <input type="text" name="main_domain" id="main_domain" value="{{ $main_domains->value }}"
                                class="form-control mb-3">
                            @error('main_domain')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <p class="form">RTL Admin Area (Right to Left)</p>
                            <div class="mb-3 col-md-12 d-flex">
                                <div class="me-2">
                                    <input class="form-check-input" type="radio" name="rtl_support_admin"
                                        id="rtl_support_admin1" value="1"
                                        @if ($rtl_support_admin->value == 1) checked @endif>
                                    <label class="form-check-label" for="rtl_support_admin1">
                                        Yes
                                    </label>
                                </div>
                                <div class="me-2">
                                    <input class="form-check-input" type="radio" name="rtl_support_admin"
                                        id="rtl_support_admin2" value="0"
                                        @if ($rtl_support_admin->value == !1) checked @endif>
                                    <label class="form-check-label" for="rtl_support_admin2">
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <p class="form">RTL Customers Area (Right to Left)</p>
                            <div class="mb-3 col-md-12 d-flex">
                                <div class="me-2">
                                    <input class="form-check-input" type="radio" name="rtl_support_client"
                                        id="rtl_support_client1" value="1"
                                        @if ($rtl_support_client->value == 1) checked @endif>
                                    <label class="form-check-label" for="rtl_support_client1">
                                        Yes
                                    </label>
                                </div>
                                <div class="me-2">
                                    <input class="form-check-input" type="radio" name="rtl_support_client"
                                        id="rtl_support_client2" value="0"
                                        @if ($rtl_support_client->value == !1) checked @endif>
                                    <label class="form-check-label" for="rtl_support_client2">
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="allowed_files" class="form-label">Allowed file types</label>
                            <input type="text" name="allowed_files" id="allowed_files"
                                value="{{ $allowed_files->value }}" class="form-control">
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
