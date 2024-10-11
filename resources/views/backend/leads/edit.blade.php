@extends('backend.layouts.main')
@section('title', 'Sales Estimate Create')
@section('content')
    @push('css')
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
    @endpush



    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Edit Lead</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"> Edit Lead View</li>
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
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="profile-tab" data-bs-toggle="pill" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="true">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class='bx bx-home font-18 me-1'></i></div>
                                    <div class="tab-title">Profile</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="proposal-tab" data-bs-toggle="pill" href="#proposal" role="tab"
                                aria-controls="proposal" aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class='bx bx-user-pin font-18 me-1'></i></div>
                                    <div class="tab-title">Proposals</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="task-tab" data-bs-toggle="pill" href="#task" role="tab"
                                aria-controls="task" aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class='bx bx-microphone font-18 me-1'></i></div>
                                    <div class="tab-title">Tasks</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="attachments-tab" data-bs-toggle="pill" href="#attachments"
                                role="tab" aria-controls="attachments" aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class='bx bx-paperclip font-18 me-1'></i></div>
                                    <div class="tab-title">Attachments</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="reminder-tab" data-bs-toggle="pill" href="#reminder" role="tab"
                                aria-controls="reminder" aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class='bx bx-bell font-18 me-1'></i></div>
                                    <div class="tab-title">Reminders</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="notes-tab" data-bs-toggle="pill" href="#notes" role="tab"
                                aria-controls="notes" aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class='bx bx-note font-18 me-1'></i></div>
                                    <div class="tab-title">Notes</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="activity_log-tab" data-bs-toggle="pill" href="#activity_log"
                                role="tab" aria-controls="activity_log" aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class='bx bx-list-check font-18 me-1'></i></div>
                                    <div class="tab-title">Activity Log</div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="profile" role="tabpanel"
                            aria-labelledby="profile-tab">
                            @include('backend.leads.simplepage.mainlead')
                        </div>
                        <div class="tab-pane fade" id="proposal" role="tabpanel" aria-labelledby="proposal-tab">
                            {{-- Include your content for Proposals --}}
                            @include('backend.leads.simplepage.leadproposal')
                        </div>
                        <div class="tab-pane fade" id="task" role="tabpanel" aria-labelledby="task-tab">
                            {{-- Include your content for Tasks --}}
                            @include('backend.leads.simplepage.leadtask')

                        </div>
                        <div class="tab-pane fade" id="attachments" role="tabpanel" aria-labelledby="attachments-tab">
                            {{-- Include your content for Attachments --}}
                            @include('backend.leads.simplepage.leadproposal')

                        </div>
                        <div class="tab-pane fade" id="reminder" role="tabpanel" aria-labelledby="reminder-tab">
                            {{-- Include your content for Reminders --}}
                            @include('backend.leads.simplepage.leadreminder')
                        </div>
                        <div class="tab-pane fade" id="notes" role="tabpanel" aria-labelledby="notes-tab">
                            {{-- Include your content for Notes --}}
                            @include('backend.leads.simplepage.leadnotes')

                        </div>
                        <div class="tab-pane fade" id="activity_log" role="tabpanel" aria-labelledby="activity_log-tab">
                            {{-- Include your content for Activity Log --}}
                            @include('backend.leads.simplepage.leadactivity')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>








@endsection



@push('js')
    <script>
        $(document).ready(function() {
            // Initially hide and disable password input
            $('#passwordSection').hide();
            $('#password').prop('disabled', true);

            // Handle checkbox change event
            $('#send_set_password_email').change(function() {
                if ($(this).is(':checked')) {
                    // Checkbox is checked, hide and disable password input
                    $('#passwordSection').hide();
                    $('#password').prop('disabled', true);
                } else {
                    // Checkbox is unchecked, show and enable password input
                    $('#passwordSection').show();
                    $('#password').prop('disabled', false);
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // Function to toggle between leadinfobox and leadeditbox
            function toggleSections(showLeadInfoBox) {
                if (showLeadInfoBox) {
                    $('#leadinfobox').css('display', 'block').removeAttr('disabled'); // Show leadinfobox and enable
                    $('#leadeditbox').css('display', 'none').attr('disabled',
                        'disabled'); // Hide leadeditbox and disable
                    $('#togglebtn').css({
                        'background-color': 'white',
                        'color': 'black',
                        'font-size': '16px',
                        'border': '1px solid black',

                    });


                } else {
                    $('#leadinfobox').css('display', 'none').attr('disabled',
                        'disabled'); // Hide leadinfobox and disable
                    $('#leadeditbox').css('display', 'block').removeAttr('disabled'); // Show leadeditbox and enable
                    $('#togglebtn').css({
                        'background-color': '#2E83D9',
                        'color': 'white',
                        'border': 'none',


                    });


                }
            }

            // Initial load: Show leadinfobox and disable leadeditbox
            toggleSections(true);

            $('#togglebtn').click(function() {
                // Check if leadinfobox is currently visible
                if ($('#leadinfobox').css('display') !== 'none') {
                    toggleSections(false); // Toggle to leadeditbox
                } else {
                    toggleSections(true); // Toggle to leadinfobox
                }
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $('.editLeadReminder').click(function() {
                var reminderId = $(this).data('reminder-id');

                // alert(reminderId);
                $.ajax({
                    url: "{{ route('fetch-lead-reminder-data') }}",
                    type: 'GET',
                    data: {
                        id: reminderId
                    },
                    dataType: 'json',
                    success: function(response) {

                        console.log(response);

                        $('#editdateToBeNotified').val(response.date);
                        $('#editsetReminderTo').val(response.staff);
                        $('#editdescription').val(response
                            .description); // Make sure date format matches input type
                        $('#editsendEmail').val(response.notify_by_email);
                        $('#editrealID').val(response.rel_id);
                        $('#editreminder_id').val(response.id);


                        $('#editLeadReminderModal').modal('show');
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        // Handle errors gracefully
                    }
                });
            });
        });
    </script>



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
@endpush
