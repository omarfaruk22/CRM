@extends('backend.layouts.main')
@section('title', 'Invoice Create')
@section('content')
    @push('css')
    @endpush

    @include('backend.sales.invoice.invoicemodal')

    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">New Invoice</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"> Sales Invoice Create View</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <button type="button" class="btn btn-primary">Settings</button>
                <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                    data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                        href="javascript:;">Action</a>
                    <a class="dropdown-item" href="javascript:;">Another action</a>
                    <a class="dropdown-item" href="javascript:;">Something else here</a>
                    <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated link</a>
                </div>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->




    <div class="row">
        <div class="col">
            <form action="{{ route('sales.proposals.store') }}" method="POST">

                @csrf
                <!-- Starting Card -->
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <div class="col-12 customer-box mb-3">
                                        <label for="salecustomer" class="form-label"> <span class="text-danger"> * </span>
                                            Customer </label>
                                        <select class="form-select select2" name="salecustomer" id="salesCustomer">
                                            @if (isset($customers))
                                                @foreach ($customers as $customer)
                                                    <option value="{{ $customer->id }}">{{ $customer->company }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-6">
                                        <!-- Button to trigger modal -->
                                        <button type="button" class="btn btn-sm btn-outline-primary p-1"
                                            data-bs-toggle="modal" data-bs-target="#editModal">
                                            <i class='bx bx-edit fs-7'></i>
                                        </button>
                                        <br>
                                        <label for="billTo" class="form-label mt-3">Bill to</label>
                                        <p class="m-0 p-0">__</p> <br>
                                        <p class="m-0 p-0">__, __</p> <br>
                                        <p class="m-0 p-0">__, __</p> <br>
                                    </div>
                                    <div class="col-6">
                                        <br class="mt-5">
                                        <label for="shipTo" class="form-label mt-3">Ship to</label>
                                        <p class="m-0 p-0">__</p> <br>
                                        <p class="m-0 p-0">__, __</p> <br>
                                        <p class="m-0 p-0">__, __</p> <br>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-12 customer-box mb-3">
                                        <label for="salecustomer" class="form-label"> <span class="text-danger"> * </span>
                                            Estimate Number </label>
                                        <div class="input-group">
                                            <div class="btn border border-secondary">INV-</div>
                                            <input type="text" class="form-control" name="estimate_number"
                                                id="estimate_number">
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="row mb-3">
                                    <div class="col">
                                        <label for="related" class="form-label">
                                            <span class="text-danger">*</span> Related
                                        </label>
                                        <select class="form-select" name="related" id="related">
                                            <option value=""></option>
                                           @if (isset($relations))
                                                @foreach ($relations->whereIn('id', [1, 2]) as $relation)
                                                    <option value="{{ $relation->id }}">{{ $relation->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>

                                    </div>
                                </div> --}}



                                {{-- <div class="row mb-3">
                                    <div class="col-12 lead-box mb-3">
                                        <label for="saleslead" class="form-label"> Lead </label>
                                        <select class="form-select select2" name="saleslead" id="saleslead">
                                            @if (isset($leads))
                                                @foreach ($leads as $lead)
                                                    <option value="{{ $lead->id }}">{{ $lead->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-12 customer-box mb-3">
                                        <label for="salecustomer" class="form-label"> Customer </label>
                                        <select class="form-select select2" name="salecustomer" id="salesCustomer">
                                            @if (isset($customers))
                                                @foreach ($customers as $customer)
                                                    <option value="{{ $customer->id }}">{{ $customer->company }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>


                                    @if (isset($customer->id))
                                        <div class="col-12 customer-box">
                                            <label for="salesCustomerProject" class="form-label">Projects</label>
                                            <select class="form-select " name="project" id="salesCustomerProject">
                                                <option value=""> -- Select Customer --</option>
                                            </select>
                                        </div>
                                    @endif


                                </div> --}}

                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label for="invoiceDate" class="form-label"> <span class="text-danger">*</span>
                                            Invoice Date </label>
                                        <input type="date" class="form-control" name="estimate_date" id="invoiceDate">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="open_till" class="form-label"> Due Date </label>
                                        <input type="date" class="form-control" name="expire_date" id="open_till">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <div class="form-check">
                                            <style>
                                                .form-check-input:checked {
                                                    background-color: red;
                                                    border-color: red;
                                                }

                                                .form-check-input:checked::before {
                                                    border-color: red;
                                                }
                                            </style>
                                            <input type="checkbox" class="form-check-input " id="preventOverdueReminders"
                                                name="prevent_overdue_reminders">
                                            <label class="form-check-label" for="preventOverdueReminders">
                                                Prevent sending overdue reminders for this invoice
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            {{-- Other half --}}
                            <div class="col-md-6">
                                <div class="row mb-4">
                                    <div class="">
                                        <label class="form-label"><i class="fa fa-tag"></i> Tags</label>
                                        <select class="form-select select2" name="tags[]" id="tags"
                                            data-placeholder="Choose..." multiple>
                                            @if (isset($tags))
                                                @foreach ($tags as $tag)
                                                    <option value="{{ $tag->id }}">{{ $tag->tags }}</option>
                                                @endforeach
                                            @endif

                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="">
                                        <label class="form-label"> Allowed payment modes for this
                                            invoice</label>
                                        <select class="form-select select2" name="payment_option[]" id="payment_option"
                                            data-placeholder="Choose Payment Option" multiple>
                                            @if (isset($payment_options))
                                                @foreach ($payment_options as $payment_option)
                                                    <option value="{{ $payment_option->id }}">{{ $payment_option->tags }}
                                                    </option>
                                                @endforeach
                                            @endif

                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="currency" class="form-label"> <span class="text-danger"></span>
                                            Currency </label>
                                        <select class="form-select" name="currency" id="currency">
                                            @if (isset($currencies))
                                                @foreach ($currencies as $currency)
                                                    <option value="{{ $currency->id }}">{{ $currency->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        {{-- <label for="status" class="form-label">Status</label>
                                        <select class="form-select" name="status" id="proposalstatus">
                                            @if (isset($statuses))
                                                @foreach ($statuses as $status)
                                                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                                                @endforeach
                                            @endif
                                        </select> --}}
                                        <label for="sales_agent" class="form-label"> <span class="text-danger"></span>
                                            Sale Agent </label>
                                        <select class="form-select" name="assigned" id="assignedProposal">
                                            @if (isset($staffs))
                                                @foreach ($staffs as $staff)
                                                    <option value="{{ $staff->id }}">
                                                        {{ $staff->firstname . ' ' . $staff->lastname }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="sales_agent" class="form-label"> <span class="text-danger"></span>
                                            Recurring Invoice ? </label>
                                        <select class="form-select" name="assigned" id="assignedProposal">
                                            @if (isset($staffs))
                                                @foreach ($staffs as $staff)
                                                    <option value="{{ $staff->id }}">
                                                        {{ $staff->firstname . ' ' . $staff->lastname }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="status" class="form-label">Discount Type</label>
                                        <select class="form-select" name="status" id="proposalstatus">
                                            @if (isset($statuses))
                                                @foreach ($statuses as $status)
                                                    <option value="{{ $status->id }}">{{ $status->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col">
                                        <label for="totalCycles" class="form-label">Total Cycles</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="totalCycles"
                                                id="totalCycles" disabled>
                                            <div class="btn">
                                                <input type="checkbox" id="infinityCheckbox" checked>
                                                <label for="infinityCheckbox">Infinity</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col">
                                        <label for="admin_note" class="form-label">Admin Note</label>
                                        <textarea type="email" class="form-control" name="admin_note" id="proposalemail"></textarea>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <hr class="m-0">

                <!-- Second card  -->
                <div class="card mt-0">
                    <div class="card-body mt-4">

                        {{-- option Section --}}
                        <div id="mainboxsalesinvoice">
                            <div class="row mb-4">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="input-group mb-3">
                                                <select class="form-select" id="addTaskSelect">
                                                    <option value="" disabled selected>Select Items</option>
                                                    @if (isset($items))
                                                        @foreach ($items as $item)
                                                            <option value="{{ $item->id }}">{{ $item->description }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <!-- Button to trigger modal -->
                                                <button class="btn btn-outline-secondary" type="button"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#addItemModalproposal">+</button>
                                            </div>
                                        </div>

                                        <div class="col-md-5">
                                            <div class="input-group mb-3">
                                                <select class="form-select" id="addTaskSelect">
                                                    <option value="" disabled selected>Bill Task</option>
                                                    {{-- @if (isset($items))
                @foreach ($items as $item)
                    <option value="{{ $item->id }}">{{ $item->description }}</option>
                @endforeach
            @endif --}}
                                                </select>
                                                <!-- Button to trigger modal -->
                                                <div class="btn btn-outline-secondary" type="button"><i
                                                        class='bx bx-question-mark'></i></div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-4 d-flex align-items-center">
                                    <label for="showQuantityAs" class="form-label mb-0 me-2">Show quantity
                                        as:</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="show_quantity_as"
                                            id="qtyOption" value="Qty">
                                        <label class="form-check-label" for="qtyOption">Qty</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="show_quantity_as"
                                            id="hoursOption" value="Hours">
                                        <label class="form-check-label" for="hoursOption">Hours</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="show_quantity_as"
                                            id="qtyHoursOption" value="Qty/Hours">
                                        <label class="form-check-label" for="qtyHoursOption">Qty/Hours</label>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="">
                            <table class="table table-responsive no-margin-padding-border">
                                <thead style="background-color: #878888dd; color: rgb(255, 255, 255);">
                                    <tr>
                                        <th class="col-6 col-md-2">Item</th>
                                        <th class="col-6 col-md-2">Description</th>
                                        <th class="col-6 col-md-2" id="myqtyOrhour">Hours</th>
                                        <th class="col-6 col-md-2">Rate</th>
                                        <th class="col-6 col-md-2">Tax</th>
                                        <th class="col-6 col-md-2">
                                            <div class="d-flex justify-content-between">
                                                <span>Amount</span>
                                                <span><i class='bx bxs-cog'></i></span>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- new row --}}

                                    <tr class="invoice-row">
                                        <td class="col-6 col-md-2">
                                            <textarea class="form-control" id="proposaldescription" name="description[]" placeholder="Description"></textarea>
                                        </td>
                                        <td class="col-6 col-md-2">
                                            <textarea class="form-control" id="proposallongDescription" name="longDescription[]" placeholder="Long Description"></textarea>
                                        </td>
                                        <td class="col-6 col-md-2">
                                            <input type="number" class="form-control mb-0" id="proposalunit"
                                                name="unit[]" placeholder="Unit" value="1">


                                            <p class="m-0">Inventore nisi ut pa</p>
                                        </td>
                                        <td class="col-6 col-md-2">
                                            <input type="number" class="form-control" name="rate[]" id="proposalrate"
                                                placeholder="Rate">
                                        </td>
                                        <td class="col-6 col-md-2">
                                            <select name="taxPercent[]" class="form-select" id="proposaltaxPercent">
                                                @if (isset($taxes))
                                                    @foreach ($taxes as $tax)
                                                        <option value="{{ $tax->rate }}">({{ $tax->name }})
                                                            {{ $tax->rate }} %</option>
                                                    @endforeach
                                                @endif
                                                <!-- Dynamic options can be added here -->
                                            </select>
                                        </td>
                                        <td class="col-6 col-md-2">
                                            <div id="btncontainer">
                                                <div class="d-flex justify-content-end">
                                                    <button class="btn btn-primary" id="addonerow">
                                                        <i class='bx bxs-check-square'></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                <tbody id="invoicefirst">

                                </tbody>
                            </table>
                        </div>


                        <div class="row">
                            <div class="col-md-3"></div>

                            <div class="col-md-9">
                                <div class="" style="margin-right: 10px;">
                                    <hr>
                                    <div class="row">
                                        <div class="d-flex justify-content-end align-items-center">
                                            <div class="col-7 d-flex align-items-center justify-content-end">
                                                <b class="form-label mb-0 me-2">Sub Total:</b>

                                            </div>
                                            <div class="col-2 text-end mx-2" id="subtotalvalue">
                                                $ 0.00
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="row">
                                        <div class="d-flex justify-content-end align-items-center">
                                            <div class="col-7 d-flex align-items-center justify-content-end">
                                                <b class="form-label mb-0 me-2">Discount:</b>
                                                <div class="input-group w-auto me-2">
                                                    <select class="form-select" id="discountTypeinput">
                                                        <option value="percent">%</option>
                                                        <option value="fixed">Fixed Amount</option>
                                                    </select>
                                                    <div id="percent">
                                                        <input type="number" name="tax_percent" class="form-control"
                                                            placeholder="Percentage">
                                                    </div>
                                                    <div id="fixedamount" style="display: none;">
                                                        <input type="number" name="tax_fixedAmount" class="form-control"
                                                            placeholder="Fixed Amount">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-2 text-end mx-2">
                                                $ 0.00
                                            </div>
                                        </div>
                                    </div>


                                    <hr>
                                    <div class="row">
                                        <div class="d-flex justify-content-end align-items-center">
                                            <div class="col-7 d-flex align-items-center justify-content-end">
                                                <b class="form-label mb-0 me-2"> Adjustment: </b>
                                                <input type="number" name="adjustment_cost" class="form-control">

                                            </div>
                                            <div class="col-2 text-end mx-2">
                                                $ 0.00
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="d-flex justify-content-end align-items-center">
                                            <div class="col-7 d-flex align-items-center justify-content-end">
                                                <b class="form-label mb-0 me-2">Total:</b>

                                            </div>
                                            <div class="col-2 text-end mx-2">
                                                $ 0.00
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col">
                        <label for="client_note" class="form-label">Client Note</label>
                        <textarea class="form-control" name="client_note" id="client_note" style="height: 110px;"></textarea>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col">
                        <label for="terms_condition" class="form-label">Terms & Conditions</label>
                        <textarea class="form-control" name="terms_condition" id="terms_condition" style="height: 110px;"></textarea>
                    </div>
                </div>


                <div class="row sticky-bottom">
                    <div class="col d-flex justify-content-end">
                        <button class="btn btn-light border-1 me-2">Save as Draft</button>
                        <button class="btn btn-primary">Save</button>
                    </div>
                </div>

            </form>
        </div>
    </div>



@endsection



@push('js')
    {{-- Item data collect --}}
    <script>
        $(document).ready(function() {
            $('#addTaskSelect').change(function() {
                var selectedItemId = $(this).val();


                $.ajax({
                    url: "{{ route('fetch-item-data') }}",
                    type: 'GET',
                    data: {
                        itemId: selectedItemId
                    },
                    success: function(response) {

                        $('#proposaldescription').val(response.description);
                        $('#proposallongDescription').val(response.long_description);

                        $('#proposalunit').val(response.unit);
                        $('#proposalrate').val(response.rate);
                        $('#proposaltaxPercent').val(response.tax);

                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>

    {{-- salescontact,salecustomer ,saleslead --}}

    {{-- lead data collect --}}
    <script>
        $(document).ready(function() {
            $('#saleslead').change(function() {
                var selectedLeadId = $(this).val();
                // console.log(selectedLeadId);

                $.ajax({
                    url: "{{ route('fetch-lead-data') }}",
                    type: 'GET',
                    data: {
                        leadId: selectedLeadId
                    },

                    success: function(response) {


                        $('#proposalstatus').val(response.status);
                        // $('#assignedProposal').val(response.assigned);
                        $('#proposaladdress').val(response.address);
                        $('#proposalcity').val(response.city);
                        $('#proposalstate').val(response.state);
                        $('#proposaladdress').val(response.address);
                        $('#proposalcountry').val(response.country);
                        $('#proposalzip').val(response.zip);
                        $('#proposalemail').val(response.email);
                        $('#proposalphone').val(response.phonenumber);
                        $('#proposalTo').val(response.name);

                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>

    {{-- Customer data collect --}}
    <script>
        $(document).ready(function() {
            $('#salesCustomer').change(function() {
                var selectedCustomerId = $(this).val();

                $.ajax({
                    url: "{{ route('fetch-customer-data') }}",
                    type: 'GET',
                    data: {
                        customerID: selectedCustomerId
                    },
                    success: function(response) {
                        var customer = response.customer;
                        var customerProjects = response.customer_projects;

                        // Update form fields based on customer data
                        $('#proposalstatus').val(customer.status);
                        $('#proposaladdress').val(customer.address);
                        $('#proposalcity').val(customer.city);
                        $('#proposalstate').val(customer.state);
                        $('#proposalcountry').val(customer.country);
                        $('#proposalzip').val(customer.zip);
                        $('#proposalemail').val(customer.proposalprimaryemailfrom);
                        $('#proposalphone').val(customer.phonenumber);
                        $('#proposalTo').val(customer.contactTo);

                        var projectsSelect = $('#salesCustomerProject');
                        projectsSelect.empty();

                        if (customerProjects && customerProjects.length > 0) {
                            $.each(customerProjects, function(index, project) {
                                projectsSelect.append($('<option>', {
                                    value: project.id,
                                    text: project.name,
                                }));

                            });

                            // Set background color to transparent and text color to default
                            projectsSelect.css({
                                'background': 'transparent',
                                'color': ''
                            });

                        } else {
                            // Append default option if no projects found
                            projectsSelect.append($('<option>', {
                                value: "",
                                text: "This customer not under any project"
                            }));

                            // Set background color to red and text color to white
                            projectsSelect.css({
                                'background': 'red',
                                'color': 'white'
                            });
                        }
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>






    <script>
        $(document).ready(function() {
            $('.select2').each(function() {
                $(this).select2({

                });


                var $select2Container = $(this).next('.select2-container');
                var $select2Selection = $select2Container.find('.select2-selection--single');
                var $select2Results = $select2Container.find('.select2-results');


                $select2Selection.css({
                    'min-height': '40px',
                    'padding': '6px 12px',
                    'border': '1px solid #ced4da',
                    'border-radius': '0.25rem',
                    'font-size': '1rem',
                    'line-height': '1.5',
                });


                $select2Results.find('.select2-results__options').css({
                    'max-height': '150px',
                    'overflow-y': 'auto',
                    'border': '1px solid #ced4da',
                    'border-radius': '0.25rem',
                    'font-size': '1rem',
                    'line-height': '1.5',
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {

            $('#preferancebox').hide();

            $('#shippingAddress').change(function() {
                $('#preferancebox').toggle($(this).is(':checked'));
            });

            $('#myhidenin').click(function() {
                $('#preferancebox').toggle();
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#discountTypeinput').change(function() {
                if ($(this).val() === 'percent') {
                    $('#percent').show();
                    $('#fixedamount').hide();
                } else

                if ($(this).val() === 'fixed') {
                    $('#percent').hide();
                    $('#fixedamount').show();
                }
            })
        });

        $(document).ready(function() {

            $('input[name="show_quantity_as"]').change(function() {
                var selectedValue = $('input[name="show_quantity_as"]:checked').val();
                $('#myqtyOrhour').html('<b>' + selectedValue + '</b>');
            });

            $('input[name="show_quantity_as"]:checked').trigger('change');
        });
    </script>


    {{-- Tooltips start  --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });

            tooltipTriggerList.forEach(function(tooltipTriggerEl) {
                tooltipTriggerEl.addEventListener('click', function() {
                    var tooltip = bootstrap.Tooltip.getInstance(tooltipTriggerEl);
                    tooltip.dispose();
                });
            });
        });
    </script>

    <script>
        function toggleDiv() {
            var div = document.getElementById('toggleDiv');
            if (div.style.display === 'none') {
                div.style.display = 'block';
            } else {
                div.style.display = 'none';
            }
        }
    </script>
    {{-- Tooltips end  --}}





    <script>
        $(document).ready(function() {
            $(document).on('click', '#addonerow', function(e) {

                var tax = $('#proposaltaxPercent').val();
                var description = $('#proposaldescription').val();
                var long_description = $('#proposallongDescription').val();
                var unit = $('#proposalunit').val();
                var rate = $('#proposalrate').val();


                e.preventDefault();


                var isValid = true;
                var currentRow = $(this).closest('tr');
                currentRow.find('textarea, input , select').each(function() {
                    if (!$(this).val()) {
                        isValid = false;
                        return false; // break the loop
                    }
                });

                if (isValid) {
                    var newRow = `
                <tr class="invoice-row mt-3">
                    <td class="col-6 col-md-2">
                        <textarea class="form-control" name="description[]" placeholder="Description" > ${description}</textarea>
                    </td>
                    <td class="col-6 col-md-2">
                        <textarea class="form-control" name="longDescription[]" placeholder="Long Description">${long_description}</textarea>
                    </td>
                    <td class="col-6 col-md-2">
                        <input type="number" class="form-control mb-0[]" name="unit[]" placeholder="Unit" value="${unit}">
                       
                    </td>
                    <td class="col-6 col-md-2">
                        <input type="number" class="form-control" name="rate[]" placeholder="Rate" value="${rate}"> 
                    </td>
                    <td class="col-6 col-md-2">
                         <select name="taxPercent[]" class="form-select" id="proposaltaxPercent">
                            @if (isset($taxes))
                                @foreach ($taxes as $tax)
                                <option value="${tax}">({{ $tax->name }}) {{ $tax->rate }} %</option>
                                @endforeach
                             @endif
                        </select>
                    </td>
                    <td class="col-6 col-md-2">
                         <div class="d-flex justify-content-end">
                                                    <button class="btn btn-danger deletethisrow">
                                                       <i class='bx bx-trash'></i>
                                                    </button>
                                                </div>
                    </td>
                </tr>`;
                    $('#invoicefirst').append(newRow);
                    $('#proposaltaxPercent').val('');
                    $('#proposaldescription').val('');
                    $('#proposallongDescription').val('');
                    $('#proposalunit').val('');
                    $('#proposalrate').val('');

                } else {
                    alert('Please fill in all fields before adding a new row.');
                }
            });

            $(document).on('click', '.deletethisrow', function(e) {
                e.preventDefault();
                $(this).closest('tr').remove();
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#infinityCheckbox').change(function() {
                if ($(this).is(':checked')) {
                    $('#totalCycles').prop('disabled', true);
                } else {
                    $('#totalCycles').prop('disabled', false);
                }
            });
        });
    </script>

    {{-- <script>
        $(document).ready(function() {
            $('#btncontainer').click(function() {
                var newButtonSection = `
                <div class="d-flex justify-content-end">
                    <button class="btn btn-danger deletethisrow">
                        <i class='bx bx-trash'></i>
                    </button>
                </div>
            `;
                $('#btncontainer').children().replaceWith(newButtonSection);
            });
        });
    </script> --}}
@endpush
