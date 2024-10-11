{{--  
 //Add Reminder Modal --}}

<div class="modal fade" id="reminder" tabindex="-1" style="display: none;" aria-hidden="true" wire:ignore.self>>
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="d-flex">
                    <div class="">
                        <h6 class="modal-title"><span
                                style="border: 1px solid black; border-radius: 50%; width: 1px; height: 1px;"><i
                                    class='bx bx-question-mark'></i></span> Set Reminder</h6>
                    </div>
                </div>
                <button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form">
                    <form wire:submit.prevent="reminderStore">
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Date to be notified:</label>
                                <input type="datetime-local" class="form-control @error('date') is-invalid @enderror"
                                    name="date" wire:model="date">
                                @error('date')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-12">
                                <label class="form-label">Set reminder to:</label>
                                <select class="form-control @error('reminderto') is-invalid @enderror" id="reminderto"
                                    name="reminderto" wire:model="reminderto">
                                    <option value="">Select staff</option>
                                    @foreach ($staffes as $staff)
                                        <option value="{{ $staff->id }}">
                                            {{ $staff->firstname . ' ' . $staff->lastname }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('reminderto')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="description" class="form-label">Description:</label>
                                <textarea id="description" name="description" wire:model="description"
                                    class="form-control @error('description') is-invalid @enderror" rows="4"></textarea>
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-12">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
                                    wire:model="notify_by_email" checked="">
                                <label class="form-check-label" for="flexSwitchCheckChecked">Send also an email for
                                    this reminder</label>
                            </div>

                            <div class="mb-3 col-md-12 text-end">
                                <button type="submit" class="btn btn-primary">Set Reminder</button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>

        </div>
    </div>
</div>
{{-- this is edit modal  --}}
<div class="modal fade" id="editreminder" tabindex="-1" style="display: none;" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="d-flex">
                    <div class="">
                        <h6 class="modal-title"><span
                                style="border: 1px solid black; border-radius: 50%; width: 1px; height: 1px;"><i
                                    class='bx bx-question-mark'></i></span> Edit Reminder</h6>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form">
                    <form wire:submit.prevent="updateReminder">
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Date to be notified:</label>
                                <input type="datetime-local" class="form-control @error('date') is-invalid @enderror"
                                    name="date" wire:model="date">
                                @error('date')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-12">
                                <label class="form-label">Set reminder to:</label>
                                <select class="form-control @error('reminderto') is-invalid @enderror" id="reminderto"
                                    name="reminderto" wire:model="reminderto">
                                    <option value="">Select staff</option>
                                    @foreach ($staffes as $staff)
                                        <option value="{{ $staff->id }}">
                                            {{ $staff->firstname . ' ' . $staff->lastname }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('reminderto')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="description" class="form-label">Description:</label>
                                <textarea id="description" name="description" wire:model="description"
                                    class="form-control @error('description') is-invalid @enderror" rows="4"></textarea>
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-12">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
                                    wire:model="notify_by_email" checked="">
                                <label class="form-check-label" for="flexSwitchCheckChecked">Send also an email for
                                    this reminder</label>
                            </div>

                            <div class="mb-3 col-md-12 text-end">
                                <button type="submit" class="btn btn-primary">Set Reminder</button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>

        </div>
    </div>
</div>


<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this reminder?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" wire:click="deleteReminder">Delete</button>
            </div>
        </div>
    </div>
</div>
