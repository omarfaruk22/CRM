@extends('backend.layouts.main')
@section('title', 'Customer Details')
@push('css')
    <link href="{{ asset('backend/assets/plugins/input-tags/css/tagsinput.css') }}" rel="stylesheet" />
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
@endpush
@section('content')
    <div class="row">
        <div class="card">
            <div class="card-body">

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Create New Tag</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <form id="tagForm">
                                        @csrf
                                        <input type="text" class="form-control" id="tags" name="tags">
                                        <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 mb-3">
                    <h5>Add New Task</h5>
                </div>
                <hr>

                <form action="{{ route('tasks.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-md-8 d-flex flex-wrap align-items-center mb-2">

                            <div class="form-check mx-1 mb-2">
                                <input class="form-check-input" type="checkbox" name="is_public" id="is_public"
                                    value="1">
                                <label class="form-check-label" for="is_public" data-bs-toggle="tooltip"
                                    data-bs-placement="top"
                                    data-bs-original-title="If you set this task to public will be visible for all staff members. Otherwise will be only visible to members who are assignees,followers,creator or administrators">Public</label>
                            </div>

                            <div class="form-check mx-1 mb-2">
                                <input class="form-check-input" type="checkbox" name="billable" id="billable"
                                    value="1">
                                <label class="form-check-label" for="billable">Billable</label>
                            </div>


                        </div>

                        <div class="col-md-4 mb-2 d-flex justify-content-md-end">
                            <a type="button" class="btn btn-white" data-bs-toggle="collapse" data-bs-target="#addfile"
                                aria-expanded="false" aria-controls="collapseExample">+ Attach Files</a>
                        </div>

                    </div>

                    {{-- attech file colapse  --}}
                    <div class="collapse" id="addfile">
                        <div class="mb-3">
                            <label for="addfile" class="form-label">Attachment</label>

                            <div id="inputContainer">
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" id="inputGroupFile04"
                                        aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="file_name[]">
                                    <button class="btn btn-outline-secondary" type="button" id="addButton"><i
                                            class='bx bx-plus'></i></button>
                                </div>
                            </div>

                        </div>
                    </div>
                    {{-- end colopse  --}}
                    <hr>
                    <div class="row">

                        <div class="mb-3 col-md-6">
                            <label class="form-label">Subject</label>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-2 col-md-6">
                            <label class="form-label">Start Date</label>
                            <input type="date" name="startdate" id="startdate" class="form-control"
                                value="{{ date('Y-m-d') }}">
                        </div>

                        <div class="mb-2 col-md-6">
                            <label class="form-label">Priority</label>
                            <select class="form-select select2" name="priority" id="priority"
                                data-placeholder="Choose one thing">
                                <option></option>
                                @if ($priorities->isNotEmpty())
                                    @foreach ($priorities as $priority)
                                        <option value="{{ $priority->value }}">{{ $priority->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="mb-2 col-md-6">
                            <label class="form-label">Due Date</label>
                            <input type="date" class="form-control" name="duedate" id="duedate">
                        </div>

                        <div class="mb-2 col-md-12">
                            <label class="form-label">Repeat every</label>
                            <select class="form-select select2" name="repeat_every" id="repeat_every"
                                data-placeholder="Choose one thing">
                                <option></option>
                                <option value="1-week">1 week</option>
                                <option value="2-week">2 weeks</option>
                                <option value="1-month">1 Month</option>
                                <option value="2-month">2 Months</option>
                                <option value="3-month">3 Months</option>
                                <option value="6-month">6 Months</option>
                                <option value="1-year">1 Year</option>
                                <option value="custom">Custom</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-2  customFields" style="display: none;">
                            <input type="number" name="repeat_every_custom" id="repeat_every_custom"
                                class="form-control" value="1" aria-invalid="false" min="1">
                            <div id="error-message" class="text-danger" style="display: none;">Value must be at least 1.
                            </div>
                        </div>

                        <div class="col-md-6 mb-2  customFields" style="display: none;">
                            <select class="form-select" name="repeat_type_custom" id="repeat_type_custom"
                                data-placeholder="Choose option">
                                <option value="">Select plan</option>
                                <option value="day">Day(s)</option>
                                <option value="week">Week(s)</option>
                                <option value="month">Month(s)</option>
                                <option value="year">Year(s)</option>
                            </select>
                        </div>

                        <div class="col-md-6 ">
                            <label for="rr" class="form-lavel mb-2">Total Cycles</label>
                            <div class="input-group mb-3">
                                <div class="input-group-text text-end">
                                    <span class="me-1">Infinity</span>
                                    <input class="form-check-input" name="cycles" id="unlimited_cycles" type="checkbox"
                                        value="0" aria-label="Checkbox for following text input">
                                </div>
                                <input type="number" class="form-control" name="cycles" id="cycles"
                                    aria-label="Text input with checkbox">
                            </div>
                        </div>

                        <div class="mb-2 col-md-12">
                            <label class="form-label">Releted to</label>
                            <select class="form-select select2" name="rel_type" id="rel_type"
                                data-placeholder="Choose one thing">
                                <option value="">select </option>
                                @foreach ($releatedtos as $key => $releatedto)
                                    <option
                                        value="{{ $key }}"{{ $key == $releted_to['rel_type'] ? 'selected' : '' }}>
                                        {{ $releatedto }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-2 col-md-6 project related-section" style="display: none;">
                            <label class="form-label">Project</label>
                            <select class="form-select select2" name="rel_id" id="rel_id_project"
                                data-placeholder="Choose one thing">
                                <option></option>
                                @foreach ($projects as $project)
                                    <option
                                        value="{{ $project->id }}"{{ $project->id == $releted_to['id'] ? 'selected' : '' }}>
                                        #{{ $project->id }}-{{ $project->name }}-{{ $project->customer->company ?? 'No Company' }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-2 col-md-6 invoices related-section" style="display: none;">
                            <label class="form-label">Invoice</label>
                            <select class="form-select select2" name="rel_id" id="rel_id_invoice"
                                data-placeholder="Choose one thing">
                                @foreach ($invoices as $invoice)
                                    <option></option>
                                    <option value="{{ $invoice->id }}">
                                        {{ $invoice->prefix }}{{ str_pad($invoice->number, 5, 0, STR_PAD_LEFT) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-2 col-md-6 customer related-section" style="display: none;">
                            <label class="form-label">Customer</label>
                            <select class="form-select select2" name="rel_id" id="rel_id_customer"
                                data-placeholder="Choose one thing">
                                <option></option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->company }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-2 col-md-6 estimate related-section" style="display: none;">
                            <label class="form-label">Estimate</label>
                            <select class="form-select select2" name="rel_id" id="rel_id_estimate"
                                data-placeholder="Choose one thing">
                                <option></option>
                                @foreach ($estimates as $estimate)
                                    <option value="{{ $estimate->id }}">
                                        {{ $estimate->prefix }}{{ str_pad($estimate->number, 5, 0, STR_PAD_LEFT) }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        <div class="mb-2 col-md-6 contract related-section" style="display: none;">
                            <label class="form-label">Contract</label>
                            <select class="form-select select2" name="rel_id" id="rel_id_contract"
                                data-placeholder="Choose one thing">
                                <option></option>
                                @foreach ($contracts as $contract)
                                    <option value="{{ $contract->id }}">{{ $contract->subject }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-2 col-md-6 ticket related-section" style="display: none;">
                            <label class="form-label">Ticket</label>
                            <select class="form-select select2" name="rel_id" id="rel_id_ticket"
                                data-placeholder="Choose one thing">
                                <option></option>
                                @foreach ($tickets as $ticket)
                                    <option value="{{ $ticket->id }}">#{{ $ticket->id }}-{{ $ticket->subject }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-2 col-md-6 expense related-section" style="display: none;">
                            <label class="form-label">Expense</label>
                            <select class="form-select select2" name="rel_id" id="rel_id_expense"
                                data-placeholder="Choose one thing">
                                <option></option>
                                @foreach ($expenses as $expense)
                                    <option value="{{ $expense->id }}">
                                        {{ $expense->categories->name }}({{ $expense->expense_name }})</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="mb-2 col-md-6 leads related-section" style="display: none;">
                            <label class="form-label">Lead</label>
                            <select class="form-select select2" name="rel_id" id="rel_id_lead"
                                data-placeholder="Choose one thing">
                                <option></option>
                                @foreach ($leads as $lead)
                                    <option value="{{ $lead->id }}">{{ $lead->name }}-{{ $lead->email }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-2 col-md-6 proposal related-section" style="display: none;">
                            <label class="form-label">Proposal</label>
                            <select class="form-select select2" name="rel_id" id="rel_id_proposal"
                                data-placeholder="Choose one thing">
                                <option></option>
                                @foreach ($proposals as $proposal)
                                    <option value="{{ $proposal->id }}">
                                        PRO-{{ str_pad($proposal->id, 5, 0, STR_PAD_LEFT) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-2 col-md-6 project related-section" style="display: none;">
                            <label class="form-label">Milestone</label>
                            <select class="form-select select2" name="milestone" id="milestone"
                                data-placeholder="Choose one thing">
                                <option></option>
                                @foreach ($milestones as $milestone)
                                    <option value="{{ $milestone->id }}">{{ $milestone->name }}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="mb-3 col-md-6 invoices customer estimate contract ticket expense leads proposal related-section"
                            style="display: none;">
                            <label class="form-label">Hourly Rate</label>
                            <input type="number" class="form-control" name="hourly_rate" id="hourly_rate">
                        </div>

                        <div class="mb-2 col-md-6">
                            <label class="form-label">Assignees</label>
                            <select class="form-select select2" name="assignees[]" id="assignees" multiple
                                data-placeholder="Choose...">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-2 col-md-6">
                            <label class="form-label">Followers</label>
                            <select class="form-select select2" multiple name="followers[]" id="followers"
                                data-placeholder="Choose...">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="msg"></div>
                            <label class="form-label">Tags</label>
                            <div class="input-group">
                                <div class="w" style="width:95%;">
                                    <select class="form-select select2" name="tags[]" id="tags"
                                        data-placeholder="Choose..." multiple>
                                        @foreach ($tags as $tag)
                                            <option value="{{ $tag->id }}">{{ $tag->tags }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="w" style="width: 5%;">
                                    <button class="btn btn-sm btn-outline-secondary" type="button"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal"
                                        style="width: 100%; padding:5px;">
                                        +
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="mb-3 col-md-12">
                        <label for="description" class="form-label">Description:</label>
                        <textarea class="form-control" name="description" id="taskeditor" rows="4"></textarea>
                    </div>

                    <div class="col-md-12 text-end">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>

            </div>
            </form>

        </div>
    </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                theme: 'default',
                width: '100%',
            });


        });
    </script>
    <script src="{{ asset('backend/assets/plugins/input-tags/js/tagsinput.js') }}"></script>
    {{-- text editor  --}}
    <script>
        ClassicEditor
            .create(document.querySelector('#taskeditor'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        $(document).ready(function() {
            // if select custom 
            $('#repeat_every').change(function() {
                var customFields = $('.customFields');
                if ($(this).val() === 'custom') {
                    customFields.show();
                } else {
                    customFields.hide();
                }
            });

            // check box 
            $('#unlimited_cycles').change(function() {
                var textInput = $('#cycles');
                if ($(this).is(':checked')) {
                    textInput.prop('disabled', true);
                } else {
                    textInput.prop('disabled', false);
                }
            });

            // if select rel_type 
            $('#rel_type').change(function() {
                rel_type($(this).val());
            });
            rel_type($('#rel_type').val());

            function rel_type(element) {
                $('.related-section').hide().find('select').prop('disabled', true);
                if (element) {
                    $('.' + element).show().find('select').prop('disabled', false);
                }
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const inputContainer = document.getElementById('inputContainer');
            const addButton = document.getElementById('addButton');

            addButton.addEventListener('click', () => {
                const newInputGroup = document.createElement('div');
                newInputGroup.className = 'input-group mb-3';
                newInputGroup.innerHTML = `<input type="file" class="form-control" name="file_name[]" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                <button class="btn btn-outline-danger" type="button"><i class='bx bx-minus'></i></button>
            `;

                const removeButton = newInputGroup.querySelector('.btn-outline-danger');
                removeButton.addEventListener('click', () => {
                    newInputGroup.remove();
                });

                inputContainer.appendChild(newInputGroup);
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#tagForm').on('submit', function(event) {
                event.preventDefault();
                $('#tags').removeClass('is-invalid');
                $('.invalid-feedback').text('');

                $.ajax({
                    url: '{{ route('tag.create') }}',
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        jQuery(".msg").append('<div class="alert alert-success">' + response
                            .success +
                            '</div>');
                        jQuery("#exampleModal").modal('hide');
                        jQuery(".msg").fadeOut(5000);
                    },
                    error: function(response) {
                        if (response.responseJSON.errors) {
                            if (response.responseJSON.errors.tags) {
                                $('#tags').addClass('is-invalid');
                                $('.invalid-feedback').text(response.responseJSON.errors.tags[
                                    0]);
                            }
                        }
                    }
                });
            });
        });
    </script>
    {{-- for error message  --}}
    <script>
        $(document).ready(function() {
            $('#repeat_every_custom').on('input', function() {
                var value = $(this).val();
                if (value < 1) {
                    $(this).val(1);
                    $('#error-message').show();
                } else {
                    $('#error-message').hide();
                }
            });
        });
    </script>
@endpush
