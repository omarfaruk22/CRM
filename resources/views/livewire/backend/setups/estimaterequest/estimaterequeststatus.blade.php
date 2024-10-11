<div>
    @include('livewire.modal');
    <div class="col-md-12">
        <div class="mb-3">
            <div>
                <div class="col">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        + New Lead Status</button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" wire:ignore.self tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="" wire:submit="store">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">New Lead Status
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        @include('backend.partials.alert')
                                        <div>
                                            <label for="name" class="form-label"><span style="color:red">* </span>
                                                Source Name</label>
                                            <input type="text" wire:model="name" name="name" class="form-control"
                                                id="name">
                                            @error('name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <label for="submit-button-text" class="form-label">Color</label>
                                            <input type="text" id="colorInput" wire:model="color" name="color"
                                                class="jscolor form-control mb-2" value="#ffffff">
                                        </div>
                                        <div class="mt-2">
                                            <label for="name" class="form-label">Order</label>
                                            <input type="number" wire:model='statusorder' name="statusorder"
                                                id="typeNumber" class="form-control" />
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
                    {{-- Create Modal end --}}
                    {{-- edit Modal Start --}}
                    <div class="modal fade" id="edit" wire:ignore.self tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="" wire:submit="update">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">New Lead Status
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        @include('backend.partials.alert')
                                        <div>
                                            <label for="name" class="form-label"><span style="color:red">* </span>
                                                Source Name</label>
                                            <input type="text" wire:model="name" name="name" class="form-control"
                                                id="name">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="submit-button-text" class="form-label">Color</label>
                                            <input type="text" id="colorInput" wire:model="color" name="color"
                                                class="jscolor form-control mb-2" value="#ffffff">
                                        </div>
                                        <div class="mt-2">
                                            <label for="name" class="form-label">Order</label>
                                            <input type="number" wire:model='statusorder' name="statusorder"
                                                id="typeNumber" class="form-control" />
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
                    {{-- edit Modal end --}}
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
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
                        <div class="">
                            <button type="button" class="btn btn-outline-secondary">Export</button>
                        </div>
                    </div>
                    <div class="">
                        <div class="d-flex">
                            <div class="search-box">
                                <input type="text" wire:model.live="search" class="form-control"
                                    id="searchProductList" autocomplete="off" placeholder="Search...">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Status Name</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($estimatestatuses as $estimatestatus)
                                    <tr>
                                        <td scope="row">{{ $estimatestatus->id }}</td>
                                        <td scope="row">{{ $estimatestatus->name }}</td>
                                        <td>
                                            <a href="javascript:void(0);" wire:click="edit({{ $estimatestatus->id }})"
                                                data-bs-toggle="modal" data-bs-target="#edit">
                                                <span class="bx bx-edit fs-5"></span>
                                            </a>
                                            <a href="javascript:void(0);"
                                                wire:click="delete({{ $estimatestatus->id }})"class="text-danger"
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
                        <div>
                            {{ $estimatestatuses->links('vendor.livewire.bootstrap') }}
                        </div>
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
