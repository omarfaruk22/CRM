<div>
    @include('livewire.backend.reminder.reminderModal')

    <h4 class="mt-3 mb-3">Reminders</h4>
    <div class="card">
        <div class="card-body">
            <div class="col mb-3">
                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#reminder"
                    class="btn btn-primary px-2"><i class='bx bxs-bell'></i>Set Reminder</a>
            </div>
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
                    <div class="">
                        <button type="button" class="btn btn-outline-secondary">Export</button>
                    </div>
                </div>
                <div class="">
                    <div class="d-flex">
                        <div class="search-box">
                            <input type="text" wire:model.live="search" class="form-control" id=""
                                autocomplete="off" placeholder="Search...">
                            <i class="ri-search-line search-icon"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table id="tableId" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>

                            <th>Description</th>
                            <th>Date</th>
                            <th>Remind</th>
                            <th>Is Notified?</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>

                    @php
                        use Carbon\Carbon;

                    @endphp
                    <tbody>
                        @if (isset($reminders) && count($reminders) > 0)
                            @foreach ($reminders as $key => $reminder)
                                @php

                                    $formattedDate = Carbon::parse($reminder->date)->format('j-M-y h:i A');
                                @endphp
                                <tr>

                                    <td>{{ $reminder->description }}</td>
                                    <td>{{ $formattedDate }}</td>
                                    <td>
                                        @if (!@empty($reminder->staff))
                                            @php $staff = DB::table('staff')->find($reminder->staff); @endphp
                                            @if (isset($staff))
                                                {{ $staff->firstname . ' ' . $staff->lastname }}
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        @if ($reminder->notify_by_email == 1)
                                            <p class="badge bg-success"> Notified </p>
                                        @else
                                            <p class="badge bg-danger"> Not Notified </p>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a wire:click="editReminder({{ $reminder->id }})" data-bs-toggle="modal"
                                            data-bs-target="#editreminder">
                                            <span class="text-info mr-2"><i class='bx bx-edit-alt fs-5'></i></span>
                                        </a>
                                        <a href="#" wire:click.prevent="deleteReminderPop({{ $reminder->id }})"
                                            data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal">
                                            <i class='bx bx-trash text-danger fs-5'></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                <div class="my-4">{{ $reminders->links('vendor.livewire.bootstrap') }}</div>
            </div>
        </div>
    </div>



    {{-- <h1>{{ $customer->id }}</h1> --}}



</div>
