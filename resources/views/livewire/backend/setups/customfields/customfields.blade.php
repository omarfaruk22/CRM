<div>
    {{-- Delete  modal start --}}
    @include('livewire.modal')
    {{-- Delete  modal end --}}
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between py-4">
                    <div class="me-2 d-flex">
                        <div class="d-flex justify-content-end me-2">
                        </div>
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
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">Export</button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Pdf</a>
                                </li>
                                <li><a class="dropdown-item" href="#">Excel</a></li>
                            </ul>
                        </div>
                        <div>
                            <a href="{{ route('setup.custom-fields.index') }}"
                                class="btn btn-outline-secondary me-2 mb-3">
                                Reset
                            </a>
                        </div>
                    </div>
                    <div class="">
                        <div class="d-flex">
                            <div class="search-box">

                                <div class="input-group">
                                    <input type="search" wire:model.live="search" name="keyword" id="search"
                                        class="form-control" placeholder="Search Customer..."
                                        value="{{ request('keyword') }}">

                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="card-body">

                <div class="table-responsive mb-3">

                    {{-- error message start --}}
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    {{-- error message end --}}

                    <table class="table mb-0 table-hover align-middle">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Belongs To</th>
                                <th scope="col">Type</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Active</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($customfield->isNotEmpty())
                                @foreach ($customfield as $data)
                                    <tr>

                                        <td>{{ $loop->iteration }}</td>
                                        <td><a
                                                href="{{ route('setup.custom-fields.edit', $data->id) }}">{{ $data->name }}</a>
                                        </td>
                                        <td>{{ $data->fieldto }}</td>
                                        <td>{{ $data->type }}</td>
                                        <td>{{ $data->slug }}</td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input custom-checkbox" type="checkbox"
                                                    id="active" data-id="{{ $data->id }}" <?php echo $data->active == 1 ? 'checked' : ''; ?>>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ route('setup.custom-fields.edit', $data->id) }}">
                                                <span class="bx bx-edit fs-5"></span>
                                            </a>
                                            <a href="javascript:void(0);" wire:click="delete({{ $data->id }})"
                                                class="text-danger" data-bs-toggle="modal" data-bs-target="#delete">
                                                <span class="bx bx-trash fs-5"></span>
                                            </a>
                                        </td>

                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7" class="text-center">
                                        No data found.
                                    </td>
                                </tr>
                            @endif

                        </tbody>
                    </table>
                    <div class="mt-2">{{ $customfield->links('vendor.livewire.bootstrap') }}</div>
                </div>

                <div class="d-flex justify-content-end">
                    {{-- {{$customers->links()}} --}}
                </div>
            </div>
        </div>
    </div>
</div>
