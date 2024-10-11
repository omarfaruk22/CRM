<div>
    {{-- Create reminder modal start --}}
    <div class="modal fade" id="createReminder" tabindex="-1" style="display: none;" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Set Ticket Reminder</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="createReminder">
                    <div class="modal-body">

                        <div class="form-group mb-3">
                            <label for="date"><span class="text-danger">*</span> Date to be notified</label>
                            <input type="date" class="form-control" id="date" wire:model.defer="date">
                            @error('date') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="staff"><span class="text-danger">*</span> Set reminder to</label>
                            <select class="form-control" id="staff" wire:model.defer="staff">
                                @if (!empty($staffs))
                                    @foreach ($staffs as $staffItem)
                                        @if(!empty($ticket))
                                            <option value="{{ $staffItem->id }}">{{ $staffItem->firstname.' '.$staffItem->lastname }}</option>
                                        @endif
                                    @endforeach
                                @endif
                            </select>
                            @error('staff') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="description"><span class="text-danger">*</span> Description</label>
                            <textarea class="form-control" id="description" rows="3" wire:model.defer="description"></textarea>
                            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="notify_by_email" wire:model.defer="notify_by_email">
                                <label class="form-check-label" for="notify_by_email">
                                    Send also an email for this reminder
                                </label>
                            </div>
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
    {{-- Create reminder modal End --}}


    {{-- Edit reminder modal start --}}
    <div class="modal fade" id="editReminder" tabindex="-1" style="display: none;" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Reminder</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="updateReminder">
                    <div class="modal-body">

                        <div class="form-group mb-3">
                            <label for="date"><span class="text-danger">*</span> Date to be notified</label>
                            <input type="date" class="form-control" id="date" wire:model.defer="date">
                            @error('date') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="staff"><span class="text-danger">*</span> Set reminder to</label>
                            <select class="form-control" id="staff" wire:model.defer="staff">
                                @if (!empty($staffs))
                                    @foreach ($staffs as $staffItem)
                                        <option value="{{ $staffItem->id }}">{{ $staffItem->firstname.' '.$staffItem->lastname }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('staff') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="description"><span class="text-danger">*</span> Description</label>
                            <textarea class="form-control" id="description" rows="3" wire:model.defer="description"></textarea>
                            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="notify_by_email" wire:model.defer="notify_by_email">
                                <label class="form-check-label" for="notify_by_email">
                                    Send also an email for this reminder
                                </label>
                            </div>
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
    {{-- Edit reminder modal End --}}


    {{-- Delete reminder modal start --}}
    <div class="modal fade" id="deleteReminder" tabindex="-1" style="display: none;" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Reminder</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <center>
                        <h4>Are you sure?</h4>
                        <p>Want to delete this reminder</p>
                    </center>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" wire:click="confirmDelete">Delete</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Delete reminder modal End --}}


    {{-- List page start --}}
    <div class="">

        <div class="col mb-3">
            <button type="button" class="btn btn-outline-secondary px-2" data-bs-toggle="modal" data-bs-target="#createReminder">
                <i class="bx bx-bell text-primary fs-5"></i> Set Ticket Reminder
            </button>
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
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Export</button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Pdf</a></li>
                        <li><a class="dropdown-item" href="#">Excel</a></li>
                    </ul>
                </div>
            </div>
            <div class="d-flex">
                <div class="search-box">
                    <input type="text" wire:model.live="search" class="form-control" id="" autocomplete="off" placeholder="Search...">
                    <i class="ri-search-line search-icon"></i>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <td>#Sl</td>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Remind</th>
                        <th>Is notified</th>
                        <th>Created By</th>
                        <th>Updated By</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($reminders->isNotEmpty())
                        @foreach ($reminders as $reminder)
                            <tr>
                                <td> {{ $reminders->firstItem() + $loop->index }} </td>
                                <td> {{ $reminder->description }} </td>
                                <td> {{ $reminder->date }} </td>
                                <td> 
                                    @if (!empty($staffs))
                                        @foreach ($staffs as $staff)
                                            @if ($staff->id == $reminder->staff)
                                                 {{ $staff->firstname.' '.$staff->lastname }} 
                                            @endif
                                        @endforeach
                                    @endif
                                </td>
                                <td> 
                                    @if ($reminder->isnotified != null)
                                        {{ $reminder->isnotified }} 
                                    @else
                                        No
                                    @endif
                                </td>
                                <td> {{ $reminder->created_by }} </td>
                                <td> {{ $reminder->updated_by }} </td>
                                <td>
                                    <a href="javascript:void(0);" wire:click="edit({{ $reminder->id }})" data-bs-toggle="modal" id="edit-button" data-bs-target="#editReminder" class="contactEdit" data-id="">
                                        <span class="bx bx-edit fs-5 text-primary"></span>
                                    </a>
                                    <a href="javascript:void(0);" wire:click="delete({{ $reminder->id }})" data-bs-target='#deleteReminder' data-bs-toggle="modal">
                                        <i class="bx bx-trash text-danger fs-5" ></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8" class="text-center">No data found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            <div>{{ $reminders->links('vendor.livewire.bootstrap') }}</div>
        </div>
    </div>
    {{-- List page end --}}
</div>

