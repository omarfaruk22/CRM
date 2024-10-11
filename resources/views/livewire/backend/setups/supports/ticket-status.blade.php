<div>


    {{-- New Ticket Status modal start --}}
    <div class="modal fade" id="priorityModal" tabindex="-1" style="display: none;" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-scrollable modal-md">
            <div class="modal-content">

                <div class="modal-header">
                    <div class="">
                        <h6 class="modal-title">New Ticket Status</h6>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="" wire:submit="store">
                        <div class="row">

                            <div class="mb-3 col-md-12">
                                <label class="form-label" for="name"><span style="color: red">*</span>Ticket Status
                                    Name</label>
                                <input type="text" wire:model="name" name="name" id="name"
                                    placeholder="Ticket Status Name"
                                    class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label for="submit-button-text" class="form-label">Pick Color</label>
                                <input type="text" wire:model="statuscolor" name="statuscolor" id="createColorInput"
                                    class="jscolor form-control mb-2 @error('statuscolor') is-invalid @enderror"
                                    value="#ffffff">
                                @error('statuscolor')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-12">
                                <label class="form-label" for="statusorder">Status Order</label>
                                <input type="number" wire:model="statusorder" id="statusorder" name="statusorder"
                                    class="form-control @error('statusorder') is-invalid @enderror" value=""
                                    aria-invalid="false">
                                @error('statusorder')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
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
    </div>
    {{-- New Ticket Status modal end --}}



    {{-- Edit Ticket Status modal start --}}
    <div class="modal fade" id="editModal" tabindex="-1" style="display: none;" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-scrollable modal-md">
            <div class="modal-content">

                <div class="modal-header">
                    <div class="">
                        <h6 class="modal-title">Edit Ticket Status</h6>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="" wire:submit="update">
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label class="form-label" for="name"><span style="color: red">*</span>Ticket Status
                                    Name</label>
                                <input type="text" wire:model="name" name="name" id="name"
                                    placeholder="Ticket Status Name"
                                    class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="submit-button-text" class="form-label">Pick Color</label>
                                <input type="text" wire:model="statuscolor" name="statuscolor" id="createColorInput"
                                    class="jscolor form-control mb-2 @error('statuscolor') is-invalid @enderror"
                                    value="#ffffff">
                                @error('statuscolor')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-12">
                                <label class="form-label" for="statusorder">Status Order</label>
                                <input type="number" wire:model="statusorder" id="statusorder" name="statusorder"
                                    class="form-control @error('statusorder') is-invalid @enderror" value=""
                                    aria-invalid="false">
                                @error('statusorder')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
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
    </div>
    {{-- Edit Ticket Status modal end --}}



    <!-- delete Modal start -->
    @include('livewire.modal')
    <!-- delete Modal end -->




    {{-- List start  --}}
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

                        <div class="dropdown me-2">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">Export</button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Pdf</a>
                                </li>
                                <li><a class="dropdown-item" href="#">Excel</a></li>
                            </ul>
                        </div>

                        <div>
                            <a href="{{ route('support.ticket_status.index') }}" class="btn btn-outline-secondary"
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
                                <td>#Sl</td>
                                <th>Ticket Status Name</th>
                                <th>Created By</th>
                                <th>Updated By</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($ticketStatuses->isNotEmpty())
                                @foreach ($ticketStatuses as $ticketStatus)
                                    <tr>
                                        <td>{{ $ticketStatuses->firstItem() + $loop->index }}</td>
                                        <td>{{ $ticketStatus->name }}</td>
                                        <td>{{ $ticketStatus->created_by }}</td>
                                        <td>{{ $ticketStatus->updated_by }}</td>
                                        <td>
                                            <a href="javascript:void(0)" wire:click="edit({{ $ticketStatus->id }})"
                                                data-bs-toggle="modal" id="edit-button" data-bs-target="#editModal"
                                                class="priorityEdit" data-id="">
                                                <span class="bx bx-edit fs-5"></span>
                                            </a>
                                            @if (
                                                $ticketStatus->name != 'Open' &&
                                                    $ticketStatus->name != 'In progress' &&
                                                    $ticketStatus->name != 'Answered' &&
                                                    $ticketStatus->name != 'On Hold' &&
                                                    $ticketStatus->name != 'Closed')
                                                <a href="javascript:void(0);"
                                                    wire:click="delete({{ $ticketStatus->id }})"class="text-danger"
                                                    data-bs-toggle="modal" data-bs-target="#delete">
                                                    <span class="bx bx-trash text-danger fs-5"></span>
                                                </a>
                                            @endif
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
                    <div>{{ $ticketStatuses->links('vendor.livewire.bootstrap') }}</div>
                </div>
            </div>
        </div>
    </div>
    {{-- List end  --}}



</div>
