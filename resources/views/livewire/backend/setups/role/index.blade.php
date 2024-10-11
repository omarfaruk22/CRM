<div>
    @include('livewire.modal')

    <a href="{{ route('roles.create') }}" class="btn btn-primary mb-1">+ New
        Role
    </a>

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
                            <input type="text" wire:model.live="search" class="form-control"
                                id="searchProductList" autocomplete="off" placeholder="Search...">
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
                            <th>Total User</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($roles as $role)
                            <tr>
                                <th scope="row">{{ $role->id }}</th>
                                <td>
                                    {{ $role->name }} <br>
                                </td>
                                <td>{{ role_use($role->id) }}</td>
                                <td>
                                    <a href="{{ route('roles.edit', $role->id) }}">
                                        <span class="bx bx-edit fs-5"></span>
                                    </a>
                                    
                                    <a href="javascript:void(0);" wire:click="delete({{ $role->id }})"
                                        class="text-danger" data-bs-toggle="modal" data-bs-target="#delete">
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
                {{ $roles->links('vendor.livewire.bootstrap') }}
            </div>
        </div>
    </div>
</div>
