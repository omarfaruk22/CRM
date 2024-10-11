<div>

    @push('js')
        <script>
            $(document).ready(function() {

                $('#mainleadselect').change(function() {
                    var isChecked = $(this).prop('checked'); // Check if master checkbox is checked
                    // Set all checkboxes in table rows to match master checkbox state
                    $('#example tbody input[type="checkbox"]').prop('checked', isChecked);
                });
                $('#example tbody').on('change', 'input[type="checkbox"]', function() {
                    var allChecked = true;

                    $('#example tbody input[type="checkbox"]').each(function() {
                        if (!$(this).prop('checked')) {
                            allChecked = false;
                            return false; // Exit loop early if one checkbox is unchecked
                        }
                    });
                    // Update master checkbox state based on allChecked variable
                    $('#mainleadselect').prop('checked', allChecked);
                });
            });
        </script>


        <script>
            $(document).ready(function() {
                $("#leaddetail").click(function(event) {
                    event.preventDefault(); // Prevent default action
                    $("#detailBox").hide(); // Hide element with id "detailBox"
                    $("#editBox").show(); // Show element with id "editBox"
                });
            });

            $("#passwordSection").toggle(!$("#send_set_password_email").is(":checked"));
            $("#send_set_password_email").change(function() {
                if ($(this).is(":checked")) {
                    $("#passwordSection").hide();
                    $("#password").prop("required", false); // Password not required if checkbox is checked
                } else {
                    $("#passwordSection").show();
                    $("#password").prop("required", true); // Password required if checkbox is unchecked
                }
            });


            $(document).ready(function() {
                $("#editLead").click(function(event) {
                    event.preventDefault(); // Prevent default action
                    $("#editBox").hide(); // Hide element with id "detailBox"
                    $("#detailBox").show(); // Show element with id "editBox"
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
            $(document).ready(function() {
                // Initially, hide the .leadBoxes
                $('.leadBoxes').hide();

                // When #leadsKanban button is clicked
                $('#leadsKanban').click(function() {
                    // Toggle visibility of .leadBoxes and .leadsTable
                    $('.leadBoxes, .leadsTable').toggle();
                });
            });


            $(document).ready(function() {
                // Initially hide the .leadsSummarybox
                $('.leadsSummarybox').hide();

                // Add click event listener to leadsSummary button
                $('#leadsSummary').click(function() {
                    // Toggle display of .leadsSummarybox with a transition time of 0.5s
                    $('.leadsSummarybox').fadeToggle(300);
                });
            });
        </script>

        <script>
            $(document).ready(function() {
                $('#tagsselects').select2({
                    placeholder: 'Select an option',
                    width: '100%',
                    dropdownParent: $('#changeStatusmodel')
                });
            });
        </script>
    @endpush

    @include('livewire.backend.leads.leadmodal')
    @include('livewire.backend.leads.leadupdatemodal')
    @include('livewire.backend.leads.customerCovertModal')





    <style>
        .boxlead {
            width: 340px;
            margin-right: 6px;
            display: inline-block;
            float: left;
            max-height: 501px;
            background: rgb(216, 214, 214);


            border: 1px solid rgb(218, 212, 212);
        }

        .leadbar {
            display: flex;
            justify-content: space-between;
            align-items: center;

            padding: 10px;
        }

        .content {
            padding: 10px;
        }

        .box-body {
            background: #ddeaf7;
        }
    </style>

    <style>
        /* Ensure Select2 component occupies 100% width */
        .select2-container {
            width: 97% !important;
        }



        .select2-container .select2-selection--single .select2-selection__rendered,
        .select2-container .select2-selection--multiple .select2-selection__rendered {
            line-height: normal !important;
            /* Override default line-height */
        }

        .select2-container .select2-selection--single .select2-selection__arrow,
        .select2-container .select2-selection--multiple .select2-selection__arrow {
            height: calc(1.5em + .75rem + 2px) !important;
            /* Match the height of Bootstrap form-select */
            top: 50% !important;
            bottom: 50% !important;
            /* Center the arrow vertically */
            transform: translateY(-50%);
        }

        /* Adjust input group to vertically center */
    </style>


    <div class="row">

        <div class="d-flex justify-content-between">
            <div class="">
                <!-- Button trigger modal -->
                <a href="#" class="btn btn-primary me-2 mb-3 ml-2" data-bs-toggle="modal"
                    data-bs-target="#changeStatusmodel">
                    <i class="bx bx-plus"></i> New Lead
                </a>

                <a href="{{ route('leads.import') }}" class="btn btn-primary me-2 mb-3">
                    <i class='bx bx-cloud-upload '></i>Import Leads
                </a>



                <button id="leadsSummary" class="btn btn-outline-dark me-2 mb-3 leadsSummary" type='button'
                    data-bs-toggle="tooltip" data-bs-placement="top" title="Lead Summary">
                    <i class='bx bx-food-menu ' style="margin: 1px;"></i>
                </button>
                <a href="{{ route('leads.swapkanban') }}" id="leadsKanban" class="btn btn-outline-dark e-2 mb-3"
                    type='button' data-bs-toggle="tooltip" data-bs-placement="top" title="Switch to Kanban">
                    <i class='bx bxs-dashboard' style="margin: 1px;"></i>
                </a>

            </div>
            <div class="">

                <div id="toggleDiv" class="card" style="display: none; z-index: 9999;">
                    <div class="card-body">
                        <div><a href="#">New Filter</a></div>
                        <p class="card-text">No saved filters, get started by creating a new filter.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>




    {{-- if you add this "leadsSummarybox" class in summary box then it will toggle --}}
    <div class="row ">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5> <i class='bx bxs-collection'></i> Leads Summary</h5>
                </div>
                <div class="card-body">
                    <div class="status-row mt-4">
                        <div class="status-item">
                            <p><span class="fs-5">
                                    @if (isset($totalLeadCount))
                                        {{ $totalLeadCount }}
                                    @else
                                        0
                                    @endif
                                </span> <span class="text-info fs-7 hov">Total Leads</span></p>
                        </div>
                        <div class="status-item">
                            <p><span class="fs-5">
                                    @if (isset($totalContactMade))
                                        {{ $totalContactMade }}
                                    @else
                                        0
                                    @endif
                                </span> <span class="text-success fs-7 hov">Lead to Customer</span></p>
                        </div>
                        <div class="status-item">
                            <p><span class="fs-5">
                                    @if (isset($totalPendingCustomer))
                                        {{ $totalPendingCustomer }}
                                    @else
                                        0
                                    @endif
                                </span> <span class="text-warning fs-7 hov">Lead Peanding </span></p>
                        </div>
                        <div class="status-item">
                            <p>
                                <span class="fs-5">

                                    @if (isset($companyCount))
                                        {{ $companyCount }}
                                    @else
                                        0
                                    @endif
                                </span>
                                <span class="text-success fs-7 hov">Customer </span>
                            </p>
                        </div>
                        <div class="status-item">
                            <p><span class="fs-5">4</span> <span class="text-secondary fs-7 hov">Lost Leads</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body ">

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
                            <div class="dropdown">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">Export</button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Pdf</a></li>
                                    <li><a class="dropdown-item" href="#">Excel</a></li>
                                </ul>
                            </div>


                        </div>
                        <div class="d-flex">
                            <div class="search-box">
                                <input type="text" wire:model.live="search" class="form-control" id=""
                                    autocomplete="off" placeholder="Search...">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="mx-3 my-3">
                                <div>{{ $leads->links('vendor.livewire.bootstrap') }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <form action="">
                            @php
                                $iterationCount = 0;
                            @endphp
                            @if (isset($leads) && count($leads) > 0)
                                <table id="example" class="table table-striped table-bordered table-responsive"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">Actions</th>
                                            <th scope="col"><input type="checkbox" id="mainleadselect"> </th>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Company</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Value</th>
                                            <th scope="col">Tags</th>
                                            <th scope="col">Assigned</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Source</th>
                                            <th scope="col">Last Contact</th>
                                            <th scope="col">Created Last</th>
                                            <!-- Added action column header -->
                                        </tr>
                                    </thead>


                                    <tbody>

                                        @foreach ($leads as $key => $lead)
                                            @php $iterationCount++; @endphp
                                            <tr>
                                                <td>
                                                    {{-- <button wire:click="editLead({{ $lead->id }})" class="btn btn-primary btn-sm" title="View">
                                            <i class="bx bx-show"></i>
                                        </button> --}}
                                                    <!-- trigger Edit Lead Modal -->
                                                    <a href="{{ route('mainlead.edit', $lead->id) }}" title="Edit">
                                                        <span class="text-info mx-2"><i
                                                                class='bx bx-edit-alt fs-5'></i></span>
                                                    </a>
                                                    <a wire:click="deleteLE({{ $lead->id }})" title="Delete"
                                                        data-bs-toggle="modal" data-bs-target="#deleteLeadModal">
                                                        <span class="text-danger mx-2"><i
                                                                class='bx bx-trash text-danger fs-5'></i></span>
                                                    </a>

                                                </td>
                                                <td><input type="checkbox" id="selectedleads" name="selectedleads[]"
                                                        value="{{ $lead->id }}">
                                                </td>
                                                <td>{{ ($leads->currentPage() - 1) * $leads->perPage() + $loop->iteration }}
                                                </td>
                                                <td>


                                                    @php
                                                        $customer = DB::table('customers')
                                                            ->where('id', $lead->client_id)
                                                            ->first();
                                                    @endphp

                                                    @if ($customer && $customer->id == $lead->client_id)
                                                        <i class='bx bxs-circle text-success'></i>
                                                        <!-- Green circle -->
                                                    @else
                                                        <i class='bx bxs-circle text-danger'></i><!-- Red circle -->
                                                    @endif

                                                    {{ $lead->name }}

                                                </td>
                                                <td>{{ $lead->company }} </td>
                                                <td>
                                                    <a href="mailto:{{ $lead->email }}">{{ $lead->email }}</a>
                                                </td>
                                                <td>
                                                    <a
                                                        href="tel:{{ $lead->phonenumber }}">{{ $lead->phonenumber }}</a>
                                                </td>
                                                <td>

                                                    @if (!@empty($lead->lead_value))
                                                        <b> <span class="text-secondary"> $ </span>
                                                            {{ $lead->lead_value }}
                                                        </b>
                                                    @else
                                                        <span class="text-danger"> Pending</span>
                                                    @endif

                                                </td>
                                                <td>
                                                    @php
                                                        // Retrieve the lead tag data from the database
                                                        $leadTag = DB::table('tagtables')
                                                            ->where('rel_type', 'lead')
                                                            ->where('rel_id', $lead->id)
                                                            ->value('tag_id');

                                                        $tagIds = [];
                                                        if ($leadTag) {
                                                            // Convert the leadTag string to an array
                                                            $tagIds = explode(',', $leadTag);
                                                        }
                                                    @endphp

                                                    @foreach ($tagIds as $tagId)
                                                        @if (!empty($tagId))
                                                            @php
                                                                $tagrs = DB::table('tags')->find($tagId);
                                                            @endphp
                                                            @if ($tagrs)
                                                                <p
                                                                    class="badge rounded-pill bg-dark text-light border border-1 me-1 ">
                                                                    {{ htmlspecialchars($tagrs->tags) }}
                                                                </p>
                                                            @else
                                                                <p class="badge rounded-pill bg-danger me-1">No
                                                                    Data</p>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                </td>



                                                <td>

                                                    @if (!@empty($lead->assigned))
                                                        @php $staff = DB::table('staff')->find($lead->assigned); @endphp
                                                        @if (isset($staff))
                                                            <a
                                                                href="{{ route('setup.staff.show', $staff->id) }}">{{ $staff->firstname . ' ' . $staff->lastname }}</a>
                                                        @endif
                                                    @endif
                                                </td>
                                                <td style="min-width:135px;">
                                                    @if (!empty($lead->status))
                                                        @php $status = DB::table('leads_statuses')->find($lead->status); @endphp
                                                        @if (isset($status->name))
                                                            <!-- Button to trigger the modal -->
                                                            <a href="#" class=" " data-bs-toggle="modal"
                                                                data-bs-target="#updateLeadStatusModal"
                                                                wire:click="editLeadstatus({{ $lead->id }})">
                                                                <i class='bx bxs-chevrons-down text-danger'></i> <span
                                                                    class="text-secondary">{{ $status->name }}</span>
                                                            </a>
                                                        @endif
                                                    @endif


                                                </td>
                                                <td>
                                                    @php
                                                        // Retrieve the source name
                                                        $source = DB::table('leads_sources')->find($lead->source);
                                                        $sourceName = isset($source->name)
                                                            ? $source->name
                                                            : 'Unknown Source';

                                                        // Determine the badge class based on the source value
                                                        $badgeClass = 'badge fs-7';
                                                        switch ($lead->source) {
                                                            case 1:
                                                                $badgeClass .= ' bg-primary';
                                                                break;
                                                            case 2:
                                                                $badgeClass .= ' bg-secondary';
                                                                break;
                                                            case 3:
                                                                $badgeClass .= ' bg-danger btn btn-sm';
                                                                break;
                                                            default:
                                                                $badgeClass = 'text-danger';
                                                                break;
                                                        }
                                                    @endphp

                                                    <p class="{{ $badgeClass }}">
                                                        {{ $sourceName }}
                                                    </p>
                                                </td>

                                                <td>{{ \Carbon\Carbon::parse($lead->created_at)->diffForHumans() }}
                                                </td>

                                                <td>{{ \Carbon\Carbon::parse($lead->dateadded)->format('d M Y h:i A') }}
                                                </td>



                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            @else
                                <div class="card bg-primary text-white my-4">
                                    <div class="card-body text-center">
                                        <p class="fs-6 font-weight-bold mb-0">
                                            No lead under:
                                            <a href="#"
                                                class="text-white font-weight-bold">{{ Auth::user()->name }}</a>
                                        </p>
                                    </div>
                                </div>

                            @endif
                        </form>
                        <div class="my-4">{{ $leads->links('vendor.livewire.bootstrap') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>







</div>
