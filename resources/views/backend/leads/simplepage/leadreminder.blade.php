<div class="row">
    <div class="col my-3">

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#setLeadReminderModal">
            Set Lead Reminder
        </button>

    </div>
</div>


<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-4">
                    <div class="me-2 d-flex">
                        <div class="me-2">
                            <select class="form-select" id="recordsPerPage">
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
                                <li><a class="dropdown-item" href="#">PDF</a></li>
                                <li><a class="dropdown-item" href="#">Excel</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="search-box">
                            <input type="text" id="searchInput" class="form-control" autocomplete="off"
                                placeholder="Search...">
                            <i class="ri-search-line search-icon"></i>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    @if ($reminders->count() > 0)

                        <table id="example" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Notified ?</th>
                                    <th>Assigned to</th>
                                    <th>Action</th> <!-- Added Action column -->
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($reminders as $reminder)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $reminder->description }}</td>
                                        <td>{{ \Carbon\Carbon::parse($reminder->date)->format('Y M d h:i A') }}</td>
                                        <td>
                                            @if ($reminder->notify_by_email == 0)
                                                <span class="badge bg-danger">Not Notified</span>
                                            @elseif ($reminder->notify_by_email == 1)
                                                <span class="badge bg-success">Notified</span>
                                            @endif
                                        </td>

                                        <td>
                                            <span class="text-secondary">
                                                @if (!@empty($reminder->staff))
                                                    @php $assigned = DB::table('staff')->find($reminder->staff); @endphp
                                                    @if (isset($assigned))
                                                        {{ $assigned->firstname }} {{ $assigned->lastname }}
                                                    @endif
                                                @endif
                                            </span>
                                        </td>
                                        <td>
                                            <!-- Action buttons -->
                                            {{-- data-bs-target="#editLeadReminderModal" --}}

                                            <button class="btn btn-sm btn-info editLeadReminder"
                                                data-reminder-id="{{ $reminder->id }}">Edit</button>


                                            <form action="{{ route('lead.reminder.destroy', $reminder->id) }}"
                                                method="POST" style="display:inline-block;"
                                                onsubmit="return confirm('Are you sure you want to delete this reminder?');">
                                                @csrf

                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    @else
                        <div class="row">
                            <div class="col">
                                <div class="card bg-danger">
                                    <p class=" text-white text-center my-2 fs-6">No reminder set yet</p>
                                </div>
                            </div>
                        </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>



<!-- Bootstrap Reminder Modal Add -->
<div class="modal fade" id="setLeadReminderModal" tabindex="-1" aria-labelledby="setLeadReminderModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" style="min-width: 40%!important;">
        <div class="modal-content">
            <form id="setLeadReminderForm" action="{{ route('lead.reminder.set') }}" method="POST">
                @csrf

                <input type="text" value="{{ $lead->id }}" name="lead_id" hidden>
                <input type="email" value="{{ $lead->email }}" name="email" hidden>



                <div class="modal-header">
                    <h5 class="modal-title" id="setLeadReminderModalLabel">
                        <i class='bx bx-question-mark'></i> Set Lead Reminder
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Date to be notified -->
                    <!-- Date and Time to be notified -->
                    <div class="mb-3">
                        <label for="dateToBeNotified" class="form-label"><span class="text-danger"> * </span>Date and
                            Time to be notified</label>
                        <input type="datetime-local" class="form-control" id="dateToBeNotified" name="dateToBeNotified"
                            required>
                    </div>


                    <!-- Set reminder to -->
                    <div class="mb-3">
                        <label for="setReminderTo" class="form-label"><span class="text-danger">* </span>Set reminder
                            to</label>
                        <select class="form-control" id="setReminderTo" name="staff" required>
                            <option value="" disabled selected>-- Select Staff --</option>
                            @foreach ($staffs as $staff)
                                <option value="{{ $staff->id }}"
                                    {{ $lead->assigned == $staff->id ? 'selected' : '' }}>
                                    {{ $staff->firstname . ' ' . $staff->lastname }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label"><span class="text-danger">*
                            </span>Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>

                    <!-- Send also an email for this reminder -->
                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="sendEmail" name="sendEmail">
                        <label class="form-check-label" for="sendEmail">Send also an email for this reminder</label>
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




<!-- Bootstrap Reminder Edit Modal -->
<div class="modal fade" id="editLeadReminderModal" tabindex="-1" aria-labelledby="setLeadReminderModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" style="min-width: 40%!important;">
        <div class="modal-content">
            <form id="setLeadReminderForm" action="{{ route('lead.reminder.edit') }}" method="POST">
                @csrf


                <input type="text" value="" name="reminder_id" hidden id="editreminder_id">
                <input type="text" value="" name="lead_id" hidden id="editrealID">



                <div class="modal-header">
                    <h5 class="modal-title" id="setLeadReminderModalLabel">
                        <i class='bx bx-question-mark'></i> Edit Lead Reminder
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Date to be notified -->
                    <!-- Date and Time to be notified -->
                    <div class="mb-3">
                        <label for="dateToBeNotified" class="form-label"><span class="text-danger"> * </span>Date and
                            Time to be notified</label>
                        <input type="datetime-local" class="form-control" id="editdateToBeNotified"
                            name="dateToBeNotified" required>
                    </div>


                    <!-- Set reminder to -->
                    <div class="mb-3">
                        <label for="setReminderTo" class="form-label"><span class="text-danger">* </span>Set reminder
                            to</label>
                        <select class="form-control" id="editsetReminderTo" name="staff" required>
                            <option value="" disabled selected>-- Select Staff --</option>
                            @foreach ($staffs as $staff)
                                <option value="{{ $staff->id }}"
                                    {{ $lead->assigned == $staff->id ? 'selected' : '' }}>
                                    {{ $staff->firstname . ' ' . $staff->lastname }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label"><span class="text-danger">*
                            </span>Description</label>
                        <textarea class="form-control" id="editdescription" name="description" rows="3" required></textarea>
                    </div>

                    <!-- Send also an email for this reminder -->
                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="editsendEmail" name="sendEmail">
                        <label class="form-check-label" for="sendEmail">Send also an email for this reminder</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
