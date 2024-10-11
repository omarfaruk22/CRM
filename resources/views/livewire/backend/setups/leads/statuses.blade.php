<div>

    <!-- New Lead Status Modal start -->
    <div class="modal fade" id="exampleModal" wire:ignore.self tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" wire:submit="store">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New Lead Status</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <div class="col-md-12 mb-3">
                            <label for="name" class="form-label"><span style="color:red">* </span> Source
                                Name</label>
                            <input type="text" wire:model="name" name="name"
                                class="form-control @error('name') is-invalid @enderror" id="name">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="submit-button-text" class="form-label">Color</label>
                            <input type="text" id="colorInput" wire:model="color" name="color"
                                class="jscolor form-control @error('color') is-invalid @enderror" value="#ffffff">
                            @error('color')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Order</label>
                            <input type="number" wire:model='statusorder' name="statusorder" id="typeNumber"
                                class="form-control @error('color') is-invalid @enderror" />
                            @error('number')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- New Lead Status Modal end -->


    {{-- Edit Status Modal Start --}}
    <div class="modal fade" id="edit" wire:ignore.self tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <form action="" wire:submit="update">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Status</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <div class="col-md-12 mb-3">
                            <label for="name" class="form-label"><span style="color:red">* </span>Source
                                Name</label>
                            <input type="text" wire:model="name" name="name"
                                class="form-control @error('name') is-invalid @enderror" id="name">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="submit-button-text" class="form-label">Color</label>
                            <input type="text" id="colorInput" wire:model="color" name="color"
                                class="jscolor form-control @error('color') is-invalid @enderror" value="">
                            @error('color')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mt-2">
                            <label for="statusorder" class="form-label">Order</label>
                            <input type="number" wire:model='statusorder' name="statusorder" id="typeNumber"
                                class="form-control @error('statusorder') is-invalid @enderror" />
                            @error('statusorder')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Edit Status Modal end --}}


    {{-- Delete modal start --}}
    @include('livewire.modal')
    {{-- Delete modal end --}}



    <div class="col-md-12">

        <div class="mb-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">+
                New Lead Status</button>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-4">
                    <div class="me-2 d-flex">
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
                            <div class="">
                                <a href="{{ route('setup.leads.statuses.index') }}" type="button"
                                    class="btn btn-outline-secondary">Reset</a>
                            </div>
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
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">

                            <thead>
                                <tr>
                                    <th>#Sl</th>
                                    <th>Status Name</th>
                                    <th>Created By</th>
                                    <th>Updated By</th>
                                    <th>Options</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($statuses as $status)
                                    <tr>
                                        <td>{{ $statuses->firstItem() + $loop->index }}</td>
                                        <td>{{ $status->name }}</td>
                                        <td>{{ $status->created_by }}</td>
                                        <td>{{ $status->updated_by }}</td>
                                        <td>
                                            <a href="javascript:void(0);" wire:click="edit({{ $status->id }})"
                                                data-bs-toggle="modal" data-bs-target="#edit">
                                                <span class="bx bx-edit fs-5"></span>
                                            </a>
                                            <a href="javascript:void(0);"
                                                wire:click="delete({{ $status->id }})"class="text-danger"
                                                data-bs-toggle="modal" data-bs-target="#delete">
                                                <span class="bx bx-trash text-danger fs-5"></span>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            Status Name Not Found
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div>{{ $statuses->links('vendor.livewire.bootstrap') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push('js')
    <script>
        document.addEventListener('livewire:initialized', () => {
            @this.on('close-modal', (event) => {
                $('#edit').modal('hide');
                $('#create').modal('hide');
            });
        });
    </script>
@endpush
