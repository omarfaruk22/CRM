@extends('backend.layouts.main')
@section('title', 'Customer Details')
@section('content')

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">

    <style>
        @media only screen and (max-width: 768px) {
            .groupButton {
                width: 100%;
                margin-top: 16px;
            }
            .groupSelect{
                width: 100%;
            }
        }
        /* for assign admin selection field  */
        .select2-dropdown {
            z-index: 100000;
        }
    </style>
@endpush

{{-- Add New Customer start --}}
<form action="{{ route('customers.group_create') }}" method="POST" class="row g-3 needs-validation" novalidate>
    @csrf
    <div class="modal fade" id="customerGroup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
{{-- Add New Customer end --}}

{{-- create admin start --}}
<div class="modal fade" id="adminAssign" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('customers.profile.create_admin', $customer->id) }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Assign Admin</h5>
                </div>
                <div class="modal-body">
                    <label for="user_id" class="form-label"><span style="color: red">*</span> Name</label><br>
                    <select name="user_id[]" id="adminAssignSelect" class="form-select select2-dropdown" multiple="multiple">
                        <option value="">Select admin</option>
                        @if ($users->isNotEmpty())
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- create admin start --}}


<div class="row">

    <div class="col-md-3">
        <h4 class="mt-3 mb-3">#{{ $customer->id}} || {{ $customer->company}}</h4>
        @include('backend.partials.profile-sidebar')
    </div>

    <div class="col-md-9">

        <h4 class="mt-3 mb-3">Profile</h4>

        {{-- successfull message start --}}
        @if(session('group'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Weldone!</strong> {{session('group')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        {{-- successfull message end --}}

        <div class="card">
            <div class="card-body">

                {{-- Buttons start  --}}
                <ul class="nav nav-pills mb-3" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" data-bs-toggle="pill" href="#customer-details" role="tab" aria-selected="true">
                            <div class="d-flex align-items-center">
                                <div class="tab-title">Customer Details</div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="pill" href="#billing-shipping" role="tab" aria-selected="false" tabindex="-1">
                            <div class="d-flex align-items-center">
                                <div class="tab-title">Billing & Shipping</div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="pill" href="#customer-admins" role="tab" aria-selected="false" tabindex="-1">
                            <div class="d-flex align-items-center">
                                <div class="tab-title">Customer Admins</div>
                            </div>
                        </a>
                    </li>
                </ul>
                {{-- Buttons end  --}}

                {{-- Billing and shipping start  --}}
                <form action="{{ route('customers.update', $customer->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="tab-content" id="pills-tabContent">

                        {{-- customers details start --}}
                        <div class="tab-pane fade active show" id="customer-details" role="tabpanel">

                            <div class="col-md-12 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Show primary contact full name on Invoices, Estimates, Payments, Credit Notes
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="company" class="form-label">Company</label>
                                <input type="text" name="company" id="company" value="{{ $customer->company}}" class="form-control mb-3" value="{{old ('company')}}">
                                @error('company')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="phonenumber" class="form-label">Phone</label>
                                <input type="text" name="phonenumber" id="phonenumber" value="{{ $customer->phonenumber}}" class="form-control">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="website" class="form-label">Website</label>
                                <input type="text" name="website" id="website" value="{{ $customer->website}}" class="form-control">
                            </div>

                            @if ($customer->groupid)
                                <div class="col-md-12 mb-3">
                                    <label for="groupid" class="form-label">Groups</label>
                                    <div class="input-group mb-3">
                                        <select name="groupid[]" class="form-select groupSelect" id="mySelect" class="form-select" multiple="multiple">

                                            <option>Select Items</option>
                                            @php $groupIds = explode(',', $customer->groupid); @endphp
                                            @foreach ($groupIds as $groupId)
                                                @php $customerGroup = DB::table('customers_groups')->where('id', $groupId)->first(); @endphp
                                                @if ($customerGroup)
                                                    <option value="{{ $customerGroup->id }}" selected>{{ $customerGroup->gname }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <button class="btn btn-sm btn-outline-secondary groupButton" type="button" data-bs-toggle="modal" data-bs-target="#customerGroup">+</button>
                                    </div>
                                </div>
                            @endif

                            <div class="col-md-12 mb-3">
                                <label for="default_currency" class="form-label">Currency</label>
                                <select name="default_currency" class="form-select mb-3" id="default_currency">
                                    <option value="">Select Currency</option>
                                    @if ($currencies->isNotEmpty())
                                        @foreach ($currencies as $currency)
                                            <option {{ (!empty($customer) && $customer->default_currency == $currency->id) ? 'selected' : '' }} value="{{ $currency->id }}">{{ $currency->name}} {{ $currency->symbol}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="default_language" class="form-label">Default Language</label>
                                <select name="default_language" class="form-select" id="default_language">
                                    <option>Set Default Language</option>
                                    @if ($languages->isNotEmpty())
                                        @foreach ($languages as $language)
                                            <option {{ (!empty($customer) && $customer->default_language == $language->id) ? 'selected' : '' }} value="{{ $language->id }}">{{ $language->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea name="address" class="form-control" id="address" rows="3">{{ $customer->address}}</textarea>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="city" class="form-label">City</label>
                                <input name="city" type="text" class="form-control" id="city" value="{{ $customer->city}}">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="state" class="form-label">State</label>
                                <input name="state" type="text" class="form-control" id="state" value="{{ $customer->state}}">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="zip" class="form-label">Zip Code</label>
                                <input name="zip" type="text" class="form-control" id="zip" value="{{ $customer->zip}}">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="country" class="form-label">Country</label>
                                <select name="country" class="form-select" id="country">
                                    <option>Select Country</option>
                                    @if ($countries->isNotEmpty())
                                        @foreach ($countries as $country)
                                            <option {{ (!empty($customer) && $customer->country == $country->id) ? 'selected' : '' }} value="{{ $country->id }}">{{ $country->short_name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="col-md-12 mb-3 text-end">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                        {{-- customers details end --}}

                        {{-- Billing and shipping start  --}}
                        <div class="tab-pane fade" id="billing-shipping" role="tabpanel">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class=" d-flex justify-content-between mb-3">
                                        <div class="">Billing Address</div>
                                        <div class="">Same as Customer Info</div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="billing_street" class="form-label">Street</label>
                                        <textarea name="billing_street" class="form-control" id="billing_street" rows="3">{{ $customer->billing_street}}</textarea>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="billing_city" class="form-label">City</label>
                                        <input name="billing_city" type="text" class="form-control" id="billing_city" value="{{ $customer->billing_city}}">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="billing_state" class="form-label">State</label>
                                        <input name="billing_state" type="text" class="form-control" id="billing_state" value="{{ $customer->billing_city}}">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="billing_zip" class="form-label">Zip Code</label>
                                        <input name="billing_zip" type="text" class="form-control" id="billing_zip" value="{{ $customer->billing_city}}">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="billing_country" class="form-label">Country</label>
                                        <select name="billing_country" class="form-select" id="billing_country">
                                            <option>Select Country</option>
                                            @if ($countries->isNotEmpty())
                                                @foreach ($countries as $country)
                                                    <option {{ (!empty($customer) && $customer->billing_country == $country->id) ? 'selected' : '' }} value="{{ $country->id }}">{{ $country->short_name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class=" d-flex justify-content-between mb-3">
                                        <div class="">Shipping Address</div>
                                        <div class="">Copy Billing Address</div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="shipping_street" class="form-label">Street</label>
                                        <textarea name="shipping_street" class="form-control" id="shipping_street" rows="3">{{ $customer->shipping_street}}</textarea>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="shipping_city" class="form-label">City</label>
                                        <input name="shipping_city" type="text" class="form-control" id="shipping_city" value="{{ $customer->shipping_city}}">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="shipping_state" class="form-label">State</label>
                                        <input name="shipping_state" type="text" class="form-control" id="shipping_state" value="{{ $customer->shipping_state}}">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="zipCode" class="form-label">Zip Code</label>
                                        <input name="zipCode" type="text" class="form-control" id="shipping_zip" value="{{ $customer->shipping_zip}}">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="shipping_country" class="form-label">Country</label>
                                        <select name="shipping_country" class="form-select" id="shipping_country">
                                            <option>Select Country</option>
                                            @if ($countries->isNotEmpty())
                                                @foreach ($countries as $country)
                                                    <option {{ (!empty($customer) && $customer->shipping_country == $country->id) ? 'selected' : '' }} value="{{ $country->id }}">{{ $country->short_name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="alert alert-warning w-100" role="alert">
                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="shipping">
                                                <label class="form-check-label text-muted" for="shipping">
                                                    Update the shipping/billing info on all previous invoices/estimates
                                                </label>
                                                <br>
                                                <small>If you check this field shipping and billing info will be updated to all invoices and estimates. Note: Invoices with status paid won't be affected.</small>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="billing">
                                                <label class="form-check-label text-muted" for="billing">
                                                Update the shipping/billing info on all previous credit notes (Closed credit notes not affected)
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 text-end">
                                    <button type="submit" class="btn btn-primary px-2">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                {{-- Billing and shipping end  --}}

                {{-- Customer admin start  --}}
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade" id="customer-admins" role="tabpanel">
                        <button type="button" class="btn btn-primary me-2 mb-3" data-bs-toggle="modal" data-bs-target="#adminAssign">
                            <i class="bx bx-plus"></i> Assign Admin
                        </button>
                        <div class="d-flex justify-content-between mb-4">
                            <div class="me-2 d-flex">
                                <div class="me-2">
                                    <div class="">
                                        {{ $customerAdmins->links() }}
                                    </div>
                                </div>
                                <div class="">
                                    <button type="button" class="btn btn-outline-secondary">Export</button>
                                </div>
                            </div>
                            <div class="">
                                <div class="d-flex">
                                    <div class="search-box">
                                        <form action="" method="GET">
                                            <div class="input-group">
                                                <input type="search" name="keyword" id="search" class="form-control" autocomplete="off" placeholder="Search Users..." value="{{ request('keyword') }}">
                                                <button type="submit" class="btn btn-outline-secondary"><i class="lni lni-search-alt"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- message start --}}
                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{session('error')}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Welldone!</strong> {{session('success')}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        {{-- message end --}}

                        <div class="mb-3">
                            <table class="table mb-0 table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Staff Member</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Created By</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($customerAdmins->isNotEmpty())
                                        @foreach ($customerAdmins as $customerAdmin)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $customerAdmin->userName }}</td>
                                                <td>{{ $customerAdmin->created_at }}</td>
                                                <td>{{ $customerAdmin->created_by }}</td>
                                                <td>
                                                    <form action="{{ route('customers.profile.delete_admin', ['adminId' => $customerAdmin->id, 'customerId' => $customer->id]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn" onclick="return confirmDelete();">
                                                            <span class="bx bx-trash text-danger fs-5"></span>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="pagination d-flex justify-content-end">
                            {{ $customerAdmins->links() }}
                        </div>
                    </div>
                </div>
                {{-- Customer admin end  --}}
            </div>
        </div>

    </div>
</div>
@endsection

@push('js')
	<!-- Include Select2 JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#mySelect').select2({
                theme:'default',
            });
		});
	</script>

    <script>
		$(document).ready(function() {
			$('#adminAssignSelect').select2({
                theme:'default',
                width: '100%',
            });
		});
	</script>

    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this contact?");
        }
    </script>

@endpush
