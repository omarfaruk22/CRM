<div>

    {{-- Add New Customer Group modal start  --}}
    <div class="modal fade" wire:ignore.self id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form wire:submit="store">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Customer Group
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="name" class="form-label"><span style="color:red">*</span> Name</label>
                        <input type="text" wire:model="name" name="name" class="form-control @error('name') is-invalid @enderror" id="name">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" wire:click="closeModal" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Add New Customer Group modal start  --}}

    {{-- Update Customer Group modal start  --}}
    <div class="modal fade" wire:ignore.self id="edit" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form wire:submit="update">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Customer Group</h5>
                        <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="name" class="form-label"><span style="color:red">*</span> Name</label>
                        <input type="text" wire:model="name" name="name" class="form-control @error('name') is-invalid @enderror" id="name">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" wire:click="closeModal" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Update Customer Group modal start  --}}


    <div class="mb-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">+ New Customer Group</button>
    </div>

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

                    <div class="dropdown me-2">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Export</button>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Pdf</a></li>
                        <li><a class="dropdown-item" href="#">Excel</a></li>
                        </ul>
                    </div>

                    <div>
                        <a href="{{ route('setup.customer.index') }}" class="btn btn-outline-secondary" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Reload" data-bs-original-title="Reload"><i class="bx bx-reset"></i></a>
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


            <div class="row">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl#</th>
                                <th>Name</th>
                                <th>Created By</th>
                                <th>Updated By</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($customarsGroups as $customarsGroup)
                                <tr>
                                    <td>{{ $customarsGroups->firstItem() + $loop->index }}</td>
                                    <td>{{ $customarsGroup->gname }}</td>
                                    <td>{{ $customarsGroup->created_by }}</td>
                                    <td>{{ $customarsGroup->updated_by }}</td>
                                    <td>
                                        <a href="javascript:void(0);" wire:click="edit({{ $customarsGroup->id }})" data-bs-toggle="modal" data-bs-target="#edit">
                                            <span class="bx bx-edit fs-5"></span>
                                        </a>
                                        <form class="bx fs-5"action="{{ route('setup.customer.delete', ['id' => $customarsGroup->id]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button style="border:none; background: none;"
                                                class="bx bx-trash text-danger fs-5" href="" type="submit"
                                                class="btn btn-danger"></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">
                                        Customer Groups Not Found
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div>{{ $customarsGroups->links('vendor.livewire.bootstrap') }}</div>
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
