@extends('backend.layouts.main')
@section('title', 'Customers')
@section('content')


@include('backend.expenses.expensesmodal')
<div class="row">

    <div class="d-flex justify-content-between">

        <div class="">
            <a href="{{ route('mainexpense.add.record') }}" class="btn btn-primary me-2 mb-3">
                <i class="bx bx-plus"></i>
                Record Expenses
            </a>
            <a href="{{ route('mainexpense.import.record') }}" class="btn btn-primary me-2 mb-3">
                <i class='bx bx-upload'></i>
                Import Expenses
            </a>

        </div>

        <div class="">
            <button id="expenseOpen" class="btn btn-outline-dark btn-sm">
                <i class='bx bx-down-arrow-alt' ></i>
            </button>
            <a href="" class="btn btn-outline-dark btn-sm">
                <i class='bx bx-shape-square'></i>
            </a>
        </div>

    </div>

</div>



<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <p class="card-title text-success">Total</p>
                <p class="card-text text-primary fw-bold">$56</p>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <p class="card-title text-primary">Billable</p>
                <p class="card-text text-primary fw-bold">$20</p>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <p class="card-title text-success">Non Billable</p>
                <p class="card-text text-primary fw-bold">$20</p>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <p class="card-title text-primary">Not Invoiced</p>
                <p class="card-text text-primary fw-bold">$30</p>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <p class="card-title text-success">Billed</p>
                <p class="card-text text-primary fw-bold">$40</p>
            </div>
        </div>
    </div>
</div>
{{-- Top four card end  --}}

<div class="row">
    <div class="col">
        <div class="card">
            <div class=" card-body">
                <div class="expensetable">
                    <div class="d-flex justify-content-between mb-4">
                        <div class="me-2 d-flex">
                            <style>
                                    .selected {
                                                background-color: #c9d5dfd7;
                                                color: rgb(0, 0, 0)
                                        }
                            </style>
                            <div class="me-2">
                                <select class="form-select" wire:model.live="size" name="size">
                                    <option value="5">5</option>
                                    <option selected value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                            <div class="dropdown">
                                <button class="btn btn-outline-secondary dropdown-toggle me-2" type="button" data-bs-toggle="dropdown" aria-expanded=false>Export</button>
                                <ul class='dropdown-menu'>
                                    <li><a class='dropdown-item' href='#'>Pdf</a></li>
                                    <li><a class='dropdown-item' href='#'>Excel</a></li>
                                </ul>
                            </div>
                             <!-- Button trigger modal -->
                            <button type="button" class="btn btn-outline-secondary me-2" data-bs-toggle="modal" data-bs-target="#expensebulkActionsModal">
                                Bulk Actions
                            </button>
                            <!-- Adding Reset button -->
                            <button class='btn btn-outline-secondary' type='button' data-bs-toggle="tooltip" data-bs-placement="top" title="Reload"><i class='bx bx-reset'></i></button>
                        </div>


                        <div class="d-flex">
                            <div class="search-box">
                                <input type="text" wire:model.live="search" class="form-control" id="" autocomplete="off" placeholder="Search...">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                    </div>


                    <div class="table-responsive mb-3">
                        <table class="table mb-0 table-hover align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">Select</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Receipt</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Project</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Invoice</th>
                                    <th scope="col">Reference#</th>
                                    <th scope="col">Payment Method</th>
                                    <th scope="col">Actions</th> <!-- Added action column header -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="checkbox" id="selectCheckbox" name="select"></td>
                                    <td><a href="" class="togglechart">Hello</a></td>
                                    <td>ew</td>
                                    <td>we</td>
                                    <td>wewe</td>
                                    <td>wew</td>
                                    <td>we</td>
                                    <td>wer</td>
                                    <td>wer</td>
                                    <td>werwer</td>
                                    <td>werwer</td>
                                    <td> <!-- Added action icons -->
                                        <a href="#" class="btn btn-primary btn-sm" title="View"><i class='bx bx-show'></i></a>
                                        <a href="#" class="btn btn-warning btn-sm" title="Edit"><i class='bx bx-edit'></i></a>
                                        <a href="#" class="btn btn-danger btn-sm" title="Delete"><i class='bx bx-trash'></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>


<div class="expenseOpensection" id="expenseOpensection" >
    <div class="card">
		<div class="card-body">

			<div class="d-flex justify-content-between">
                <ul class="nav nav-pills card-header mb-3" role="tablist" style="border:none!important;">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" data-bs-toggle="pill" href="#primary-pills-home" role="tab" aria-selected="true">
                            <div class="d-flex align-items-center">
                                <div class="tab-icon"><i class="bx bx-user-pin font-18 me-1"></i></div>
                                <div class="tab-title">Expense</div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="pill" href="#primary-pills-child" role="tab" aria-selected="false" tabindex="-1">
                            <div class="d-flex align-items-center">
                                <div class="tab-icon"><i class="bx bx-user-pin font-18 me-1"></i></div>
                                <div class="tab-title"> Child Expenses</div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="pill" href="#primary-pills-fork" role="tab" aria-selected="false" tabindex="-1">
                            <div class="d-flex align-items-center">
                                <div class="tab-icon"><i class="bx bx-user-pin font-18 me-1"></i></div>
                                <div class="tab-title"> Tasks </div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="pill" href="#primary-pills-nine" role="tab" aria-selected="false" tabindex="-1">
                            <div class="d-flex align-items-center">
                                <div class="tab-icon"><i class="bx bx-user-pin font-18 me-1"></i></div>
                                <div class="tab-title"> Reminders </div>
                            </div>
                        </a>
                    </li>
                </ul>

                <div class="nav-item  nav-pills card-header mb-3" role="button">
                    <button id="removeExpensesblock" class="btn btn-danger"> <i class='bx bx-show' ></i> </button>
                </div>
            </div>


			<div class="tab-content" id="pills-tabContent">

                {{-- Ticket to contact start  --}}
				<div class="tab-pane fade active show" id="primary-pills-home" role="tabpanel">
                    <section class="" style="margin: 0px 33px;">

                       @include('backend.expenses.expensesheader')
                        <div class="row">
                            <div class="card rounded-2 mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="d-flex justify-content-start">

                                               <div class="box">
                                                <button type="button" class="btn btn-sm btn-outline-primary px-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Cycles Remaining">
                                                    Cycles Remaining : Infinity
                                                    </button>
                                               </div>

                                                <div class="box mx-3">
                                                    <button type="button" class="btn btn-sm btn-outline-primary px-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Expense will be recreated on specific hour of the day based from the setting located at Setup-

                                                    >Settings-Cron Job">
                                                        <i class='bx bx-question-mark text-danger'></i>  Next Expense Date: 2024-06-04
                                                    </button>
                                                </div>
                                          </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                      <div class="row">
                        <div class="card rounded-2 mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>Amount: <span class="text-danger"> $12.00 </span></h5>
                                        <p class="text-secondary">Paid : Via Bank</p>

                                        <p><b>Tax 1: </b> 12.00% (dykjh)</p>
                                        <p><b>Tax 1: </b> 12.00% (dykjh)</p>
                                        <b class="text-danger"> Total with tax: $14.88 </b>
                                        <p><b>Date : </b> 2024-05-21 </p>
                                        <p><b>Ref #: </b> 123dasd </p>
                                        <p><b>Note : </b>  </p>
                                        <p><b>fgv : </b>  </p>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="input-group mb-3">
                                                    <i class='bx bx-file fs-4 mx-2' ></i> <b class="fs-4"> Expense Receipt </b>
                                                </div>
                                            </div>

                                            <div class="col-12 ">
                                                <input type="file" class="form-control ">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                      </div>
                    </section>
				</div>
                {{-- No Child Expenses Found start --}}
				<div class="tab-pane fade" id="primary-pills-child" role="tabpanel">
                    <section class="" style="margin: 0px 33px;">

                        @include('backend.expenses.expensesheader')

                        <div class="row">
                            <div class="col-12">
                                <p class="text-secondary"> No Child Expenses Found </p>
                            </div>
                        </div>

                     </section>

				</div>


                {{-- Ticket without contact start --}}
				<div class="tab-pane fade" id="primary-pills-fork" role="tabpanel">
                    <section class="" style="margin: 0px 33px;">

                        @include('backend.expenses.expensesheader')

                        <div class="row">

                            <div class="d-flex justify-content-between">

                                <div class="">
                                    <button type="button" class="btn btn-outline-primary me-2 mb-3" data-bs-toggle="modal" data-bs-target="#newTaskModal">
                                        <i class="bx bx-plus"></i>
                                        New Task
                                    </button>

                                </div>

                                <div class="">
                                    <a href="" class="btn btn-outline-dark btn-sm">
                                        <i class='bx bx-filter-alt m-0 ' ></i>
                                    </a>
                                </div>
                            </div>

                        </div>



                        <div class="row">
                            <div class="expensetable">
                                <div class="card-body">
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

                                             <!-- Button trigger modal -->


                                            <button class="btn btn-outline-secondary dropdown-toggle me-2" type="button" data-bs-toggle="dropdown" aria-expanded=false>Export</button>
                                            <ul class='dropdown-menu'>
                                                <li><a class='dropdown-item' href='#'>Pdf</a></li>
                                                <li><a class='dropdown-item' href='#'>Excel</a></li>
                                            </ul>

                                            <!-- Adding Reset button -->
                                            <button class='btn btn-outline-secondary' type='button' data-bs-toggle="tooltip" data-bs-placement="top" title="Reload"><i class='bx bx-reset'></i></button>
                                        </div>


                                        <div class="d-flex">
                                            <div class="search-box">
                                                <input type="text" wire:model.live="search" class="form-control" id="" autocomplete="off" placeholder="Search...">
                                                <i class="ri-search-line search-icon"></i>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="table-responsive mb-3">
                                        <table class="table mb-0 table-hover align-middle">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Start Date</th>
                                                    <th scope="col">Due Date</th>
                                                    <th scope="col">Assigned to</th>
                                                    <th scope="col">Tags</th>
                                                    <th scope="col">Priority</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>John Doe</td>
                                                    <td>In Progress</td>
                                                    <td>2024-05-01</td>
                                                    <td>2024-06-01</td>
                                                    <td>Jane Smith</td>
                                                    <td>Development, Urgent</td>
                                                    <td>High</td>
                                                    <td>
                                                        <button class='btn btn-outline-primary btn-sm' type='button' data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                            <i class='bx bx-edit-alt'></i>
                                                        </button>
                                                        <button class='btn btn-outline-danger btn-sm' type='button' data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                            <i class='bx bx-trash'></i>
                                                        </button>
                                                        <button class='btn btn-outline-info btn-sm' type='button' data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                            <i class='bx bx-show'></i>
                                                        </button>
                                                    </td>
                                                </tr>

                                                <!-- Add more rows as needed -->
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>





                     </section>
				</div>

                {{-- Reminder start --}}
				<div class="tab-pane fade" id="primary-pills-nine" role="tabpanel">
                    <section class="" style="margin: 0px 33px;">

                        @include('backend.expenses.expensesheader')

                        <div class="row">

                            <div class="d-flex justify-content-between">

                                <div class="">
                                    <button type="button" class="btn btn-outline-secondary me-2 mb-3" data-bs-toggle="modal" data-bs-target="#reminderModal">
                                        <i class="bx bx-plus"></i>
                                        Set a Reminder
                                    </button>

                                </div>

                                <div class="">
                                    <a href="" class="btn btn-outline-dark btn-sm">
                                        <i class='bx bx-filter-alt m-0 ' ></i>
                                    </a>
                                </div>
                            </div>

                        </div>



                        <div class="row">
                            <div class="expensetable">
                                <div class="card-body">
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

                                             <!-- Button trigger modal -->
                                             <button class="btn btn-outline-secondary dropdown-toggle me-2" type="button" data-bs-toggle="dropdown" aria-expanded=false>Export</button>
                                             <ul class='dropdown-menu'>
                                                 <li><a class='dropdown-item' href='#'>Pdf</a></li>
                                                 <li><a class='dropdown-item' href='#'>Excel</a></li>
                                             </ul>

                                            <!-- Adding Reset button -->
                                            <button class='btn btn-outline-secondary' type='button' data-bs-toggle="tooltip" data-bs-placement="top" title="Reload"><i class='bx bx-reset'></i></button>
                                        </div>


                                        <div class="d-flex">
                                            <div class="search-box">
                                                <input type="text" wire:model.live="search" class="form-control" id="" autocomplete="off" placeholder="Search...">
                                                <i class="ri-search-line search-icon"></i>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="table-responsive mb-3">
                                        <table class="table mb-0 table-hover align-middle">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Description</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Remind</th>
                                                    <th scope="col">Is notified?</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Meeting with client</td>
                                                    <td>2024-05-01</td>
                                                    <td>Yes</td>
                                                    <td>No</td>
                                                    <td>
                                                        <button class='btn btn-outline-primary btn-sm' type='button' data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                            <i class='bx bx-edit-alt'></i>
                                                        </button>
                                                        <button class='btn btn-outline-danger btn-sm' type='button' data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                            <i class='bx bx-trash'></i>
                                                        </button>
                                                        <button class='btn btn-outline-info btn-sm' type='button' data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                            <i class='bx bx-show'></i>
                                                        </button>
                                                    </td>
                                                </tr>

                                                <!-- Add more rows as needed -->
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>



                     </section>
				</div>
                {{-- Ticket without contact end --}}

			</div>
		</div>
	</div>
  </div>



@endsection

@push('js')


<script>
    $(document).ready(function() {
        // Initially hide the expenseOpensection
        $("#expenseOpensection").css('display', 'none');

        $("#expenseOpen").on("click", function() {
            $("#expenseOpensection").toggle();
        });

        // $(".togglechart").on("click", function() {
        //     $("#expenseOpensection").toggle();
        // });

        $("#removeExpensesblock").on("click", function() {
            $("#expenseOpensection").toggle();
        });
    });
</script>


    {{-- modal select marge hide --}}
    <script>
       $(document).ready(function() {
    $('#massDelete').change(function() {
        if($(this).is(":checked")) {
            // Hide the other fields and their labels when 'massDelete' is checked
            $('#amount, label[for="amount"], #expenseCategory, label[for="expenseCategory"], #expenseDate, label[for="expenseDate"], #paymentMode, label[for="paymentMode"]').hide();
        } else {
            // Show the other fields and their labels when 'massDelete' is unchecked
            $('#amount, label[for="amount"], #expenseCategory, label[for="expenseCategory"], #expenseDate, label[for="expenseDate"], #paymentMode, label[for="paymentMode"]').show();
        }
    });
});

    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $(document).ready(function () {
            $('.customer-checkbox').change(function () {

                var isActive = this.checked ? 1 : 0;
                var id = $(this).data('id');

                $.ajax({
                    type: 'POST',
                    url: '{{ route('customers.updatestatus', ['id' => 'id']) }}' + id,
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    data: {
                        id: id,
                        isActive: isActive
                    },
                    success: function (response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Status updated Successfully',
                        });
                    },
                    error: function (xhr, error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
    <script>
        window.onload = function() {
            var checkboxes = document.querySelectorAll('input[type=checkbox]');
            checkboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    this.parentNode.parentNode.classList.toggle('selected');
                });
            });
        };
        </script>


    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this contact?");
        }
    </script>

<script>
    document.getElementById("supportButton").addEventListener("click", function() {
        var chartSection = document.querySelector(".chart-section");
        if (chartSection.style.display === "none") {
            chartSection.style.display = "block";
        } else {
            chartSection.style.display = "none";
        }
    });


    $(document).ready(function(){
    $("#selectCheckbox").change(function(){
        if($(this).is(":checked")){
            $(this).closest("tr").addClass("selected");
        } else {
            $(this).closest("tr").removeClass("selected");
        }
    });
});

    </script>


@endpush
