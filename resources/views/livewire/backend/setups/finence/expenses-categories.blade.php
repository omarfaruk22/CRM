<div>
    @include('livewire.modal')
    {{-- Currency Create --}}
    <div wire:ignore.self class="modal fade" id="create" tabindex="-1" aria-labelledby="createLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createLabel">Add New Category</h5>
                    <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit="store">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                @include('backend.partials.alert')
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="name" class="form-label"><span class="text-danger">*</span> Category Name</label>
                                <input type="text" wire:model.live="name" class="form-control @error('name') is-invalid @enderror" id="name">
                                @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="description" class="form-label">Category Description</label>
                                <textarea wire:model.live="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="5"></textarea>
                                @error('description')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Currency Create --}}
    <div wire:ignore.self class="modal fade" id="edit" tabindex="-1" aria-labelledby="createLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createLabel">Edit Category</h5>
                    <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit="update">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                @include('backend.partials.alert')
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="name" class="form-label"><span class="text-danger">*</span> Category Name</label>
                                <input type="text" wire:model.live="name" class="form-control @error('name') is-invalid @enderror" id="name">
                                @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="description" class="form-label">Category Description</label>
                                <textarea wire:model.live="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="5"></textarea>
                                @error('description')<small class="text-danger">{{ $message }}</small>@enderror
                            </div>
                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <button type="button" class="btn btn-primary mt-3 mb-2" data-bs-toggle="modal" data-bs-target="#create">+ New Category</button>

    <div class="card">
        <div class="card-body">
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
                            <input type="text" wire:model.live="search" class="form-control" id="searchProductList"
                                autocomplete="off" placeholder="Search...">
                            <i class="ri-search-line search-icon"></i>
                        </div>
                    </div>
                </div>

            </div>
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered align-middle" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                        <tr>
                            <th scope="row">{{ $category->id }}</th>
                            <td>
                                {{ $category->name }} <br>
                            </td>
                            <td>{{ $category->description ?? 'N/A' }}</td>
                            <td>
                                <a href="javascript:void(0);" wire:click="edit({{ $category->id }})" data-bs-toggle="modal" data-bs-target="#edit">
                                    <span class="bx bx-edit fs-5"></span>
                                </a>
                                <a href="javascript:void(0);" wire:click="delete({{ $category->id }})" class="text-danger" data-bs-toggle="modal" data-bs-target="#delete">
                                    <span class="bx bx-trash fs-5"></span>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">
                                Data Not Found
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div>
                {{ $categories->links('vendor.livewire.bootstrap') }}
            </div>
        </div>
    </div>
</div>
@push('js')
    <script>
        document.addEventListener('livewire:initialized', ()=>{
            @this.on('close-modal', (event) => {
                $('#edit').modal('hide');
                $('#create').modal('hide');
            });
        });
    </script>
@endpush
