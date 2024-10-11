<div>
    @include('livewire.modal');
    <div class="col-md-12">
        <div class="mb-3">
            <div>
                <div class="col">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
                        + New Source</button>
                    <!-- Modal -->
                    <div class="modal fade" wire:ignore.self id="create" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form wire:submit="store">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">New Source
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        @include('backend.partials.alert')
                                        <label for="name" class="form-label"><span style="color:red">*</span>
                                            Name</label>
                                        <input type="text" wire:model="name" name="name" class="form-control"
                                            id="name">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" wire:click="closeModal"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- Modal end for create --}}

                    {{-- Modal start for update --}}
                    <div class="modal fade" wire:ignore.self id="edit" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form wire:submit='update' action="">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">New Source
                                        </h5>
                                        <button type="button" wire:click="closeModal" class="btn-close"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <label for="name" class="form-label"><span style="color:red">* </span>
                                            Source Name</label>
                                        <input type="text" wire:model="name" name="name" class="form-control"
                                            id="name">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" wire:click="closeModal" class="btn btn-outline-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- Modal end for update --}}
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
                                    <th>Source Name</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($names as $name)
                                    <tr>
                                        <td scope="row">{{ $name->id }}</td>
                                        <td scope="row">{{ $name->name }}</td>
                                        <td>
                                            <a href="javascript:void(0);" wire:click="edit({{ $name->id }})"
                                                data-bs-toggle="modal" data-bs-target="#edit">
                                                <span class="bx bx-edit fs-5"></span>
                                            </a>
                                            <a href="javascript:void(0);"
                                                wire:click="delete({{ $name->id }})"class="text-danger"
                                                data-bs-toggle="modal" data-bs-target="#delete">
                                                <span class="bx bx-trash text-danger fs-5"></span>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            Source Name Not Found
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div>
                            {{ $names->links('vendor.livewire.bootstrap') }}
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
