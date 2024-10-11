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
                    <h5>Edit Task</h5>
                </div>
                <hr>

                <form action="{{ route('tasks.update', $tasks->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row">

                        <div class="col-md-8 d-flex flex-wrap align-items-center mb-2">

                            <div class="form-check mx-1 mb-2">
                                <input class="form-check-input" type="checkbox" name="is_public" id="is_public"
                                    value="1"{{ $tasks->is_public == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_public" data-bs-toggle="tooltip"
                                    data-bs-placement="top"
                                    data-bs-original-title="If you set this task to public will be visible for all staff members. Otherwise will be only visible to members who are assignees,followers,creator or administrators">Public</label>
                            </div>

                            <div class="form-check mx-1 mb-2">
                                <input class="form-check-input" type="checkbox" name="billable" id="billable"
                                    value="1" {{ $tasks->billable == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="billable">Billable</label>
                            </div>

                            <div class="form-check mx-1 mb-2 project related-section" style="display: none;">
                                <input class="form-check-input" type="checkbox" name="visible_to_client"
                                    id="visible_to_client" value="1"
                                    {{ $tasks->visible_to_client == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="visible_to_client">Visible to customer</label>
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
                            <input type="text" name="name" id="name" value="{{ $tasks->name }}"
                                class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-2 col-md-6">
                            <label class="form-label">Start Date</label>
                            <input type="date" name="startdate" id="startdate" class="form-control"
                                value="{{ $tasks->startdate }}">
                        </div>

                        <div class="mb-2 col-md-6">
                            <label class="form-label">Priority</label>
                            <select class="form-select select2" name="priority" id="priority"
                                data-placeholder="Choose one thing">
                                <option></option>
                                @if ($Priorities->isNotEmpty())
                                    @foreach ($Priorities as $priority)
                                        <option value="{{ $priority->value }}"
                                            {{ $priority->value == $tasks->priority ? 'selected' : '' }}>
                                            {{ $priority->name }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="mb-2 col-md-6">
                            <label class="form-label">Due Date</label>
                            <input type="date" class="form-control" name="duedate" id="duedate"
                                value="{{ $tasks->duedate }}">
                        </div>

                        <div class="mb-2 col-md-12">
                            <label class="form-label">Repeat every</label>
                            <select class="form-select select2" name="repeat_every" id="repeat_every"
                                data-placeholder="Choose one thing">
                                <option></option>
                                <option
                                    value="1-week"{{ $tasks->repeat_every == 1 && $tasks->recurring_type == 'week' ? 'selected' : '' }}>
                                    1 week
                                </option>
                                <option
                                    value="2-week"{{ $tasks->repeat_every == 2 && $tasks->recurring_type == 'week' ? 'selected' : '' }}>
                                    2 weeks
                                </option>
                                <option
                                    value="1-month"{{ $tasks->repeat_every == 1 && $tasks->recurring_type == 'month' ? 'selected' : '' }}>
                                    1 Month
                                </option>
                                <option
                                    value="2-month"{{ $tasks->repeat_every == 2 && $tasks->recurring_type == 'month' ? 'selected' : '' }}>
                                    2 Months
                                </option>
                                <option
                                    value="3-month"{{ $tasks->repeat_every == 3 && $tasks->recurring_type == 'month' ? 'selected' : '' }}>
                                    3 Months
                                </option>
                                <option
                                    value="6-month"{{ $tasks->repeat_every == 6 && $tasks->recurring_type == 'month' ? 'selected' : '' }}>
                                    6 Months
                                </option>
                                <option
                                    value="1-year"{{ $tasks->repeat_every == 1 && $tasks->recurring_type == 'year' ? 'selected' : '' }}>
                                    1 Year
                                </option>
                                <option value="custom"{{ $tasks->custom_recurring == 1 ? 'selected' : '' }}>Custom
                                </option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-2  customFields" style="display: none;">
                            <input type="number" name="repeat_every_custom" id="repeat_every_custom"
                                class="form-control" value="1" aria-invalid="false" min="1"
                                value="{{ $tasks->repeat_every }}">
                            <div id="error-message" class="text-danger" style="display: none;">Value must be at least 1.
                            </div>
                        </div>

                        <div class="col-md-6 mb-2  customFields" style="display: none;">
                            <select class="form-select" name="repeat_type_custom" id="repeat_type_custom"
                                data-placeholder="Choose option">
                                <option value="">Select plan</option>
                                <option value="day"{{ $tasks->recurring_type == 'day' ? 'selected' : '' }}>Day(s)
                                </option>
                                <option value="week"{{ $tasks->recurring_type == 'week' ? 'selected' : '' }}>Week(s)
                                </option>
                                <option value="month"{{ $tasks->recurring_type == 'month' ? 'selected' : '' }}>Month(s)
                                </option>
                                <option value="year"{{ $tasks->recurring_type == 'year' ? 'selected' : '' }}>Year(s)
                                </option>
                            </select>
                        </div>

                        <div class="col-md-6 ">
                            <label for="rr" class="form-lavel mb-2">Total Cycles</label>
                            <div class="input-group mb-3">
                                <div class="input-group-text text-end">
                                    <span class="me-1">Infinity</span>
                                    <input class="form-check-input" name="cycles" id="unlimited_cycles" type="checkbox"
                                        value="0" aria-label="Checkbox for following text input"
                                        {{ $tasks->cycles == 0 ? 'checked' : '' }}>
                                </div>
                                <input type="number" class="form-control" name="cycles" id="cycles"
                                    aria-label="Text input with checkbox" value="{{ $tasks->cycles }}">
                            </div>
                        </div>

                        <div class="mb-2 col-md-12">
                            <label class="form-label">Releted to</label>
                            <select class="form-select select2" name="rel_type" id="rel_type"
                                data-placeholder="Choose one thing">
                                <option value="">select </option>
                                @foreach ($releatedtos as $key => $releatedto)
                                    <option value="{{ $key }}"{{ $tasks->rel_type == $key ? 'selected' : '' }}>
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
                                        value="{{ $project->id }}"{{ $tasks->rel_id == $project->id ? 'selected' : '' }}>
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
                                    <option
                                        value="{{ $invoice->id }}"{{ $tasks->rel_id == $invoice->id ? 'selected' : '' }}>
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
                                    <option
                                        value="{{ $customer->id }}"{{ $tasks->rel_id == $customer->id ? 'selected' : '' }}>
                                        {{ $customer->company }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-2 col-md-6 estimate related-section" style="display: none;">
                            <label class="form-label">Estimate</label>
                            <select class="form-select select2" name="rel_id" id="rel_id_estimate"
                                data-placeholder="Choose one thing">
                                <option></option>
                                @foreach ($estimates as $estimate)
                                    <option value="{{ $estimate->id }}"
                                        {{ $tasks->rel_id == $estimate->id ? 'selected' : '' }}>
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
                                    <option value="{{ $contract->id }}"
                                        {{ $tasks->rel_id == $contract->id ? 'selected' : '' }}>{{ $contract->subject }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-2 col-md-6 ticket related-section" style="display: none;">
                            <label class="form-label">Ticket</label>
                            <select class="form-select select2" name="rel_id" id="rel_id_ticket"
                                data-placeholder="Choose one thing">
                                <option></option>
                                @foreach ($tickets as $ticket)
                                    <option value="{{ $ticket->id }}"
                                        {{ $tasks->rel_id == $ticket->id ? 'selected' : '' }}>
                                        #{{ $ticket->id }}-{{ $ticket->subject }}
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
                                    <option value="{{ $expense->id }}"
                                        {{ $tasks->rel_id == $expense->id ? 'selected' : '' }}>
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
                                    <option
                                        value="{{ $lead->id }}"{{ $tasks->rel_id == $lead->id ? 'selected' : '' }}>
                                        {{ $lead->name }}-{{ $lead->email }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-2 col-md-6 proposal related-section" style="display: none;">
                            <label class="form-label">Proposal</label>
                            <select class="form-select select2" name="rel_id" id="rel_id_proposal"
                                data-placeholder="Choose one thing">
                                <option></option>
                                @foreach ($proposals as $proposal)
                                    <option
                                        value="{{ $proposal->id }}"{{ $tasks->rel_id == $proposal->id ? 'selected' : '' }}>
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
                            <input type="number" class="form-control" name="hourly_rate" id="hourly_rate"
                                value="{{ $tasks->hourly_rate }}">
                        </div>

                        <div class="mb-2 col-md-6">
                            <label class="form-label">Assignees</label>
                            <select class="form-select select2" name="assignees[]" id="assignees" multiple
                                data-placeholder="Choose...">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}"
                                        {{ in_array($user->id, $assignee) ? 'selected' : '' }}>
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
                                    <option value="{{ $user->id }}"
                                        {{ in_array($user->id, $followers) ? 'selected' : '' }}>
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
                                            <option value="{{ $tag->id }}"
                                                {{ in_array($tag->id, $taggs) ? 'selected' : '' }}>{{ $tag->tags }}
                                            </option>
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
                        @if ($tasks->status == 4)
                            <div class="mb-2 col-md-6">
                                <label class="form-label">Finished</label>
                                <input type="date" class="form-control" name="datefinished" id="datefinished"
                                    value="{{ $tasks->datefinished }}">
                            </div>
                        @endif

                    </div>

                    <div class="mb-3 col-md-12">
                        <label for="description" class="form-label">Description:</label>
                        <textarea class="form-control" name="description" id="taskeditor" rows="4">{{ $tasks->description }}</textarea>
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
                repeatevery($(this));
            });

            repeatevery($('#repeat_every'));

            function repeatevery(element) {
                var customFields = $('.customFields');
                if (element.val() === 'custom') {
                    customFields.show();
                } else {
                    customFields.hide();
                }
            }
            // check box 
            $('#unlimited_cycles').change(function() {
                unlimited_cycles($(this));
            });
            unlimited_cycles($('#unlimited_cycles'));

            function unlimited_cycles(element) {
                var textInput = $('#cycles');
                if (element.is(':checked')) {
                    textInput.prop('disabled', true);
                } else {
                    textInput.prop('disabled', false);
                }
            }

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
