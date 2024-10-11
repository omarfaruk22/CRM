@extends('backend.layouts.main')
@section('title', 'Customers')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')

    {{-- Add New Customer Group modal --}}
    <form action="{{ route('customers.group_create') }}" method="POST" class="row g-3 needs-validation" novalidate>
        @csrf
        <div class="modal fade" id="groups" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Customer Group</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="name" class="form-label"><span style="color: red">* </span>Name</label>
                        <input type="text" name="gname" class="form-control" id="name">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-outline-primary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">

                <!-- buttons start -->
                <div class="card-header">
                    <ul class="nav nav-pills" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-toggle="pill" href="#customer-details" role="tab"
                                aria-selected="true">
                                <div class="d-flex align-items-center">
                                    <div class="tab-title">Customer Details</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="pill" href="#billing" role="tab" aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="tab-title">Billing & Shipping</div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- buttons end -->

                <div class="card-body">
                    <form action="{{ route('customers.store') }}" method="POST">
                        @csrf
                        <div class="tab-content" id="pills-tabContent">

                            <!-- customer-details start  -->
                            <div class="tab-pane fade show active" id="customer-details" role="tabpanel">
                                <div class="row g-3 needs-validation" novalidate>

                                    <div class="col-md-12">
                                        <label for="company" class="form-label"><span style="color: red">*</span>
                                            Company</label>
                                        <input type="text" name="company" class="form-control mb-2" id="company"
                                            placeholder="Company Name" value="{{ old('company') }}">
                                        @error('company')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-12">
                                        <label for="vat" class="form-label">VAT Number</label>
                                        <input type="text" name="vat" class="form-control" id="vat"
                                            placeholder="VAT Number" value="">
                                    </div>

                                    <div class="col-md-12">
                                        <label for="phonenumber" class="form-label">Phone Number</label>
                                        <input type="text" name="phonenumber" class="form-control" id="phonenumber"
                                            placeholder="Phone Number">
                                    </div>

                                    <div class="col-md-12">
                                        <label for="website" class="form-label">Web Site</label>
                                        <input type="text" name="website" class="form-control" id="website"
                                            placeholder="Web Site">
                                    </div>

                                    <div class="col-md-12">
                                        <label for="name" class="form-label">Groups</label>
                                        {{-- successfull message start --}}
                                        @if (session('group'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <strong>Weldone!</strong> {{ session('group') }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                        @endif
                                        {{-- successfull message end --}}
                                        <div class="input-group mb-3">
                                            <select name="groupid[]" class="form-select select2" multiple
                                                id="append-button-single-field" data-placeholder="Select groups">
                                                <option>Select groups</option>
                                                @if ($customers_groups->isNotEmpty())
                                                    @foreach ($customers_groups as $customers_group)
                                                    {{ $customers_group->gname }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <button class="btn btn-sm btn-outline-secondary gnameCreateButton"
                                                type="button" data-bs-toggle="modal" data-bs-target="#groups">+</button>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="default_currency" class="form-label">Currency</label>
                                        <select name="default_currency" class="form-select mb-3" id="default_currency">
                                            <option value="">Select Currency</option>
                                            @if ($currencies->isNotEmpty())
                                                @foreach ($currencies as $currency)
                                                    <option value="{{ $currency->id }}">{{ $currency->name }}
                                                        {{ $currency->symbol }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="default_language" class="form-label">Default Language</label>
                                        <select name="default_language" class="form-select" id="default_language">
                                            <option>Set Default Language</option>
                                            @if ($languages->isNotEmpty())
                                                @foreach ($languages as $language)
                                                    <option value="{{ $language->id }}">{{ $language->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="address" class="form-label">Address</label>
                                        <textarea name="address" class="form-control" id="address" placeholder="Address ..." rows="3"></textarea>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="city" class="form-label">City</label>
                                        <input type="text" name="city" id="city" class="form-control"
                                            placeholder="City">
                                    </div>

                                    <div class="col-md-12">
                                        <label for="state" class="form-label">State</label>
                                        <input name="state" type="text" class="form-control" id="state"
                                            placeholder="State">
                                    </div>

                                    <div class="col-md-12">
                                        <label for="zip" class="form-label">Zip</label>
                                        <input name="zip" type="text" class="form-control" id="Zip"
                                            placeholder="Zip">
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="country" class="form-label">Country</label>
                                        <select name="country" class="form-select" id="country">
                                            <option value="0">Select Country</option>
                                            @if ($countries->isNotEmpty())
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}">{{ $country->short_name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>

                                    <div class="col-md-12 d-flex justify-content-end gap-3">
                                        <button type="button" class="btn btn-outline-secondary px-2">Save and Create
                                            Contact</button>
                                        <button type="submit" class="btn btn-primary px-2">Save</button>
                                    </div>
                                </div>
                            </div>
                            <!-- customer-details end  -->

                            <!-- Billing and Shipping start  -->
                            <div class="tab-pane fade" id="billing" role="tabpanel">
                                <div class="row">

                                    {{-- Billing address start --}}
                                    <div class="col-md-6 mb-3">
                                        <div class=" d-flex justify-content-between mb-3">
                                            <div class="">Billing Address</div>
                                            <div class="">Same as Customer Info</div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="billing_street" class="form-label">Street</label>
                                            <textarea name="billing_street" class="form-control" id="billing_street" placeholder="Street" rows="3"></textarea>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="billing_city" class="form-label">City</label>
                                            <input name="billing_city" type="text" class="form-control"
                                                id="billing_city" placeholder="City">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="billing_state" class="form-label">State</label>
                                            <input name="billing_state" type="text" class="form-control"
                                                id="state" placeholder="State">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="billing_zip" class="form-label">Zip Code</label>
                                            <input name="billing_zip" type="text" class="form-control"
                                                id="billing_zip" placeholder="Zip Code">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="billing_country" class="form-label">Country</label>
                                            <select name="billing_country" class="form-select" id="billing_country">
                                                <option value="0">Select County</option>
                                                @if ($countries->isNotEmpty())
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->id }}">{{ $country->short_name }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    {{-- Billing address end --}}

                                    {{-- Shipping address start --}}
                                    <div class="col-md-6">
                                        <div class=" d-flex justify-content-between mb-3">
                                            <div class="">Shipping Address</div>
                                            <div class="">Copy Billing Address</div>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="shipping_street" class="form-label">Street</label>
                                            <textarea name="shipping_street" class="form-control" id="shipping_street" placeholder="Street" rows="3"></textarea>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="shipping_city" class="form-label">City</label>
                                            <input name="shipping_city" type="text" class="form-control"
                                                id="shipping_city" placeholder="City">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="shipping_state" class="form-label">State</label>
                                            <input name="shipping_state" type="text" class="form-control"
                                                id="shipping_state" placeholder="State">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="shipping_zip" class="form-label">Zip Code</label>
                                            <input name="shipping_zip" type="text" class="form-control"
                                                id="shipping_zip" placeholder="Zip Code">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="shipping_country" class="form-label">County</label>
                                            <select name="shipping_country" class="form-select" id="shipping_country">
                                                <option value="0">Select County</option>
                                                @if ($countries->isNotEmpty())
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->id }}">{{ $country->short_name }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    {{-- Shipping address end --}}

                                    <div class="col-md-12 d-flex justify-content-end gap-3">
                                        <button type="button" class="btn btn-outline-secondary px-2">Save and Create
                                            Contact</button>
                                        <button type="submit" class="btn btn-primary px-2">Save</button>
                                    </div>

                                </div>
                            </div>
                            <!-- Billing and Shipping End  -->
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
@endsection


@push('js')
    {{-- select multiple input  --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                theme: 'default',
            });
        });
    </script>

    {{-- company input field validation  --}}
    <script>
        function validateCompany() {
            var companyValue = document.getElementById('company').value;
            if (companyValue.trim() === '') {
                alert('Company field is required.');
                return false;
            }
            return true;
        }
    </script>
@endpush
