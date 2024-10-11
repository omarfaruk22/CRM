<div>

    {{-- Add New Priority modal start --}}
    <div class="modal fade" id="priorityModal" tabindex="-1" style="display: none;" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-scrollable modal-md">
            <div class="modal-content">

                <div class="modal-header">
                    <div class="">
                        <h6 class="modal-title">New Priority</h6>
                    </div>
                    <button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form wire:submit="store">

                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label class="form-label" for="name"><span style="color: red">*</span> Priority
                                    Name</label>
                                <input type="text" wire:model="name" name="name" id="name"
                                    placeholder="Priority Name"
                                    class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" wire:click="closeModal" class="btn btn-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Add New Priority modal end  --}}


    {{-- Edit Priority modal start --}}
    <div class="modal fade" id="editModal" tabindex="-1" style="display: none;" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-scrollable modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="">
                        <h6 class="modal-title">Edit Priority</h6>
                    </div>
                    <button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit="update">
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label class="form-label" for="name"><span style="color: red">*</span> Priority
                                    Name</label>
                                <input type="text" wire:model="name" name="name" id="name"
                                    placeholder="Priority Name"
                                    class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" wire:click="closeModal" class="btn btn-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Edit Priority modal end --}}


    {{-- Delete modal start --}}
    @include('livewire.modal')
    {{-- Delete modal end --}}


    {{-- List page start  --}}
    <div class="row">
        <div class="card">
            <div class="card-body">

                <div class="col mb-3">
                    <button type="button" class="btn btn-primary px-2" data-bs-toggle="modal"
                        data-bs-target="#priorityModal">+ New Priority</button>
                </div>

                <div class="d-flex justify-content-between mb-4">
                    <div class="me-2 d-flex">

                        <div class="me-2">
                            <select class="form-select" wire:model.live="size" name="size">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option selected value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>

                        <div class="me-2">
                            <div class="col">
                                <div class="dropdown">
                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">Export</button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Pdf</a>
                                        </li>
                                        <li><a class="dropdown-item" href="#">Excel</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div>
                            <a href="{{ route('support.ticket_priority.index') }}" class="btn btn-outline-secondary"
                                type="button">Reset</a>
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

                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">

                        <thead>
                            <tr>
                                <th>#Sl</th>
                                <th>Ticket Priority Name</th>
                                <th>Created By</th>
                                <th>Updated By</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if ($ticketPriorities->isNotEmpty())
                                @foreach ($ticketPriorities as $ticketPriority)
                                    <tr>
                                        <td>{{ $ticketPriorities->firstItem() + $loop->index }}</td>
                                        <td>{{ $ticketPriority->name }}</td>
                                        <td>{{ $ticketPriority->created_by }}</td>
                                        <td>{{ $ticketPriority->updated_by }}</td>
                                        <td>
                                            <a href="javascript:void(0)" wire:click="edit({{ $ticketPriority->id }})"
                                                data-bs-toggle="modal" id="edit-button" data-bs-target="#editModal">
                                                <span class="bx bx-edit fs-5"></span>
                                            </a>
                                            <a href="javascript:void(0);"
                                                wire:click="delete({{ $ticketPriority->id }})"class="text-danger"
                                                data-bs-toggle="modal" data-bs-target="#delete">
                                                <span class="bx bx-trash text-danger fs-5"></span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="text-center">
                                        No data found.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <div>{{ $ticketPriorities->links('vendor.livewire.bootstrap') }}</div>
                </div>
            </div>
        </div>
    </div>
    {{-- List page end  --}}
</div>
