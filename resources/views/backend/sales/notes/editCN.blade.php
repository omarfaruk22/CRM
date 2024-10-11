@extends('backend.layouts.main')
@section('title', 'Project Details')
@section('content')

    @include('backend.sales.invoice.invoicemodal')

    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Edit Credit Note</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Credit Note View</li>
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
        <div class="col-md mb-3">

            <h5 class="">
                CN: 0123
                <span class="badge bg-warning text-dark fs-7">status</span>
            </h5>


        </div>
    </div>


    <div class="row">
        <div class="col">
            <form action="">
                <!-- Starting Card -->
                <!-- Starting Card -->
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mb-4">
                                    <div class="col mb-2">
                                        <label for="customer" class="form-label">
                                            <span class="text-danger">*</span> Customer
                                        </label>
                                        <input type="text" class="form-control" name="customer" id="customer">
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

                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label for="invoiceDate" class="form-label">
                                            <span class="text-danger">*</span> Credit Note Date
                                        </label>
                                        <input type="date" class="form-control" id="creditnoteDate">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="dueDate" class="form-label">
                                            <span class="text-danger">*</span> Credit Note
                                        </label>
                                        <input type="date" class="form-control" id="creditnoteboxr">
                                    </div>
                                </div>
                            </div>



                            {{-- Other half --}}
                            <div class="col-md-6">

                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <label for="currency" class="form-label">Currency</label>
                                        <select class="form-select" id="currency">
                                            <option value="usd">USD</option>
                                            <option value="eur">EUR</option>
                                            <option value="gbp">GBP</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="salesAgent" class="form-label">Discount Type</label>
                                        <select class="form-select" id="discounttype">
                                            <option value="agent1">No Discount</option>
                                            <option value="agent2">Yes </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col">
                                        <label for="" class="form-label">Referance #</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <label for="adminNote" class="form-label">Admin Note</label>
                                        <textarea class="form-control" id="adminNote" rows="4"></textarea>
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
                                                    <option selected>Add Item</option>
                                                    <option value="task1">Item 1</option>
                                                    <option value="task2">Item 2</option>
                                                    <option value="task3">Item 3</option>
                                                </select>
                                                <!-- Button to trigger modal -->
                                                <button class="btn btn-outline-secondary" type="button"
                                                    data-bs-toggle="modal" data-bs-target="#addItemModal">+</button>

                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="input-group mb-3">
                                                <select class="form-select" id="billTaskSelect">
                                                    <option selected>Bill Task</option>
                                                    <option value="bill1">Bill 1</option>
                                                    <option value="bill2">Bill 2</option>
                                                    <option value="bill3">Bill 3</option>
                                                </select>
                                                <button class="btn btn-outline-secondary" type="button">?</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 d-flex align-items-center">
                                    <label for="showQuantityAs" class="form-label mb-0 me-2">Show quantity
                                        as:</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="quantityOptions"
                                            id="qtyOption" value="Qty">
                                        <label class="form-check-label" for="qtyOption">Qty</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="quantityOptions"
                                            id="hoursOption" value="Hours">
                                        <label class="form-check-label" for="hoursOption">Hours</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="quantityOptions"
                                            id="qtyHoursOption" value="Qty/Hours">
                                        <label class="form-check-label" for="qtyHoursOption">Qty/Hours</label>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div id="headerbox">
                            <div class="row mb-4 rounded-2"
                                style="background-color: #878888dd; color:rgb(255, 255, 255); margin: 0px 2px;">
                                <div class="col-md-2">
                                    <div class="card-header"><b>Item</b></div>
                                </div>
                                <div class="col-md-2">
                                    <div class="card-header"><b>Description</b>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="card-header" id="myqtyOrhour"><b>Hours</b></div>
                                </div>
                                <div class="col-md-2">
                                    <div class="card-header"><b>Rate</b></div>
                                </div>
                                <div class="col-md-2">
                                    <div class="card-header"><b>Tax</b></div>
                                </div>
                                <div class="col-md-2">
                                    <div class="d-flex justify-content-between">
                                        <div class="card-header"><b>Amount</b></div>
                                        <div class="card-header"><b><i class='bx bxs-cog'></i></b></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- input section --}}
                        <div id="invoicefirst">
                            <div class="row mb-4">
                                <div class="col-md-2">

                                    <textarea type="text" class="form-control" id="item" placeholder="Description"></textarea>
                                </div>
                                <div class="col-md-2">

                                    <textarea type="text" class="form-control" id="description" placeholder="   Long Description"></textarea>
                                </div>
                                <div class="col-md-2">

                                    <input type="number" class="form-control mb-0" id="hours" placeholder="Hours">
                                    <p class="">Inventore nisi ut pa</p>
                                </div>
                                <div class="col-md-2">

                                    <input type="number" class="form-control" id="rate" placeholder="Rate">
                                </div>
                                <div class="col-md-2">

                                    <input type="number" class="form-control" id="tax" placeholder="Tax">
                                </div>
                                <div class="col-md-2">
                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-primary" style="margin-right: 60px;"><i
                                                class='bx bxs-check-square'></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="invoicePlus" style="display: block;">
                            <div class="row mb-4">
                                <div class="col-md-2">
                                    <textarea type="text" class="form-control" id="item" placeholder="Description"></textarea>
                                </div>
                                <div class="col-md-2">
                                    <textarea type="text" class="form-control" id="description" placeholder=" Long Description"></textarea>
                                </div>
                                <div class="col-md-2">
                                    <input type="number" class="form-control mb-0" id="hours" placeholder="Hours">
                                    <p class="">Inventore nisi ut pa</p>
                                </div>
                                <div class="col-md-2">
                                    <input type="number" class="form-control" id="rate" placeholder="Rate">
                                </div>
                                <div class="col-md-2">
                                    <input type="number" class="form-control" id="tax" placeholder="Tax">
                                </div>
                                <div class="col-md-2">
                                    <div class="d-flex justify-content-end">
                                        <div id="invoicePlusdeletebtn" class="btn btn-danger"
                                            style="margin-right: 60px;">
                                            <i class='bx bx-x'></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div id="invoicemergebox" style="display: none;">
                            <div class="row mb-4">
                                <div class="col-md-2">
                                    <textarea type="text" class="form-control" id="item" placeholder="Description"></textarea>
                                </div>
                                <div class="col-md-2">
                                    <textarea type="text" class="form-control" id="description" placeholder="Long Description"></textarea>
                                </div>
                                <div class="col-md-2">
                                    <input type="number" class="form-control mb-0" id="hours" placeholder="Hours">
                                </div>
                                <div class="col-md-2">
                                    <input type="number" class="form-control" id="rate" placeholder="Rate">
                                </div>
                                <div class="col-md-2">
                                    <input type="number" class="form-control" id="tax" placeholder="Tax">
                                </div>
                                <div class="col-md-2">
                                    <div class="d-flex justify-content-end">
                                        <div id="removemergeboxbtn" class="btn btn-danger" style="margin-right: 60px;"><i
                                                class='bx bxs-trash-alt'></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-md-3">


                            </div>

                            <div class="col-md-9">
                                <div class="" style="margin-right: 10px;">
                                    <hr>
                                    <div class="row">
                                        <div class="d-flex justify-content-end align-items-center">
                                            <div class="col-7 d-flex align-items-center justify-content-end">
                                                <b class="form-label mb-0 me-2">Sub Total:</b>

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
                                                <b class="form-label mb-0 me-2">Discount:</b>
                                                <div class="input-group w-auto me-2">
                                                    <select class="form-select" id="discountTypeinput">
                                                        <option value="percent">%</option>
                                                        <option value="fixed">Fixed Amount</option>
                                                    </select>
                                                    <div id="percent">
                                                        <input type="number" class="form-control"
                                                            placeholder="Percentage">
                                                    </div>
                                                    <div id="fixedamount" style="display: none;">
                                                        <input type="number" class="form-control"
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
                                                <b class="form-label mb-0 me-2">Adjustment:</b>
                                                <input type="number" class="form-control">

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
                        <hr>

                        <div class="row">
                            <div class="col">
                                <label for="clientNote" class="form-label">Client Note</label>
                                <textarea class="form-control" name="clientNote" id="clientNote" cols="30" rows="4"></textarea>
                            </div>
                        </div>

                        <div class="row mt-4"> <!-- Added mt-4 for spacing between rows -->
                            <div class="col">
                                <label for="termsConditions" class="form-label">Terms & Conditions</label>
                                <textarea class="form-control" name="termsConditions" id="termsConditions" cols="30" rows="4"></textarea>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="row sticky-bottom">
                    <div class="col d-flex justify-content-end">
                        <button class="btn btn-outline-dark me-2">Save as Draft</button>
                        <button class="btn btn-primary">Save</button>
                    </div>
                </div>

            </form>
        </div>
    </div>



@endsection

@push('js')
    <script>
       
        $(document).ready(function() {
            $('#invoicePlus').show();

            $('#invoicePlusdeletebtn').click(function() {
                $('#invoicePlus').toggle();
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
            });
        });


        $(document).ready(function() {

            $('input[name="quantityOptions"]').change(function() {
                var selectedValue = $('input[name="quantityOptions"]:checked').val();
                $('#myqtyOrhour').html('<b>' + selectedValue + '</b>');
            });

            $('input[name="quantityOptions"]:checked').trigger('change');
        });
    </script>






    {{-- Text editor  --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor1'))
            .catch(error => {
                console.error(error);
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
@endpush
