<div>

    {{-- Create Department modal start --}}
    <div class="modal fade" id="departmentModal" tabindex="-1" style="display: none;" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="">
                        <h6 class="modal-title">New Department</h6>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" wire:submit="store">
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label for="name" class="form-label"><span style="color: red">*</span> Department
                                    Name</label>
                                <input type="text" wire:model="name" name="name" id="name"
                                    placeholder="Department name"
                                    class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-12">
                                <input type="checkbox" wire:model="hidefromclient" name="hidefromclient"
                                    id="hidefromclient" value="1"
                                    class="form-check-input @error('hidefromclient') is-invalid @enderror">
                                <label class="form-check-label" for="hidefromclient">Hide From Client ?</label>
                                @error('hidefromclient')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <hr>
                            <div class="mb-3 col-md-12">
                                <label class="form-label" for="email">Department Email</label>
                                <input type="text" wire:model="email" name="email" id="email"
                                    placeholder="Enter email" class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-12">
                                <h5 class="form-label"> Email to ticket configuration</h5>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label class="form-label" for="imap_username">IMAP Username</label>
                                <input type="text" wire:model="imap_username" name="imap_username" id="imap_username"
                                    placeholder="IMAP Username"
                                    class="form-control @error('imap_username') is-invalid @enderror">
                                @error('imap_username')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-12">
                                <label class="form-label" for="host">IMAP Host</label>
                                <input type="text" wire:model="host" name="host" id="host"
                                    placeholder="IMAP Host" class="form-control @error('host') is-invalid @enderror">
                                @error('host')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-12">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" wire:model="password" name="password" id="password"
                                    placeholder="Password "
                                    class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-12">
                                <p>Encryption</p>
                                <input class="form-check-input @error('encryption') is-invalid @enderror" type="radio"
                                    wire:model="encryption" name="encryption" id="tls" value="TLS">
                                <label class="form-check-label" for="tls">TLS</label>
                                <input class="form-check-input @error('encryption') is-invalid @enderror" type="radio"
                                    wire:model="encryption" name="encryption" id="ssl" value="SSL">
                                <label class="form-check-label" for="ssl">SSL</label>
                                <input class="form-check-input @error('encryption') is-invalid @enderror" type="radio"
                                    wire:model="encryption" name="encryption" id="no_encryption"
                                    value="No Encryption">
                                <label class="form-check-label" for="no_encryption">No Encryption</label>
                                @error('encryption')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            {{-- <div class="mb-3 col-md-12">
                                <label class="form-label">Folder Retrieve Folders</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-12">
                                <input class="form-check-input" type="checkbox" value="1" id="" name="Delete" checked="">
                                <label class="form-check-label" for="Delete">Delete mail after import?</label>
                            </div>
                            
                            <hr>
                            <div class="mb-3 col-md-6">
                                <button class="btn btn-white">Test IMAP Connection</button>
                            </div>
                            --}}
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
    {{-- Create Department modal End  --}}


    {{-- Edit Department modal start  --}}
    <div class="modal fade" id="editModal" tabindex="-1" style="display: none;" aria-hidden="true"
        wire:ignore.self>
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="">
                        <h6 class="modal-title">Update Department</h6>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" wire:submit="update">
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label for="name" class="form-label"><span style="color: red">*</span> Department
                                    Name</label>
                                <input type="text" wire:model="name" name="name" id="name"
                                    placeholder="Department name"
                                    class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-12">
                                <input type="checkbox" wire:model="hidefromclient" name="hidefromclient"
                                    id="hidefromclient" value="1"
                                    class="form-check-input @error('hidefromclient') is-invalid @enderror">
                                <label class="form-check-label" for="hidefromclient">Hide From Client ?</label>
                                @error('hidefromclient')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <hr>
                            <div class="mb-3 col-md-12">
                                <label class="form-label" for="email">Department Email</label>
                                <input type="text" wire:model="email" name="email" id="email"
                                    placeholder="Enter email"
                                    class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-12">
                                <h5 class="form-label"> Email to ticket configuration</h5>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label class="form-label" for="imap_username">IMAP Username</label>
                                <input type="text" wire:model="imap_username" name="imap_username"
                                    id="imap_username" placeholder="IMAP Username"
                                    class="form-control @error('imap_username') is-invalid @enderror">
                                @error('imap_username')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-12">
                                <label class="form-label" for="host">IMAP Host</label>
                                <input type="text" wire:model="host" name="host" id="host"
                                    placeholder="IMAP Host" class="form-control @error('host') is-invalid @enderror">
                                @error('host')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-12">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" wire:model="password" name="password" id="password"
                                    placeholder="Password "
                                    class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-12">
                                <p>Encryption</p>
                                <input class="form-check-input @error('encryption') is-invalid @enderror"
                                    type="radio" wire:model="encryption" name="encryption" id="tls"
                                    value="TLS">
                                <label class="form-check-label" for="tls">TLS</label>
                                <input class="form-check-input @error('encryption') is-invalid @enderror"
                                    type="radio" wire:model="encryption" name="encryption" id="ssl"
                                    value="SSL">
                                <label class="form-check-label" for="ssl">SSL</label>
                                <input class="form-check-input @error('encryption') is-invalid @enderror"
                                    type="radio" wire:model="encryption" name="encryption" id="no_encryption"
                                    value="No Encryption">
                                <label class="form-check-label" for="no_encryption">No Encryption</label>
                                @error('encryption')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            {{-- <div class="mb-3 col-md-12">
                                <label class="form-label">Folder Retrieve Folders</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-12">
                                <input class="form-check-input" type="checkbox" value="1" id="" name="Delete" checked="">
                                <label class="form-check-label" for="Delete">Delete mail after import?</label>
                            </div>
                            
                            <hr>
                            <div class="mb-3 col-md-6">
                                <button class="btn btn-white">Test IMAP Connection</button>
                            </div>
                            --}}
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
    {{-- Edit Department modal End  --}}


    {{-- Delete Department modal start  --}}
    @include('livewire.modal')
    {{-- Delete Department modal end  --}}


    {{-- List page start  --}}
    <div class="row">
        <div class="card">
            <div class="card-body">
                <div class="col mb-3">
                    <button type="button" class="btn btn-primary px-2" data-bs-toggle="modal"
                        data-bs-target="#departmentModal">+ New Department</button>
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
                        <div class="">
                            <a href="{{ route('support.department.index') }}" type="button"
                                class="btn btn-outline-secondary">Reset</a>
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
                                <th>Name</th>
                                <th>Department Email</th>
                                <th>Google Calender Id</th>
                                <th>Created By</th>
                                <th>Updated By</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if ($departments->isNotEmpty())
                                @foreach ($departments as $department)
                                    <tr>
                                        <td>{{ $departments->firstItem() + $loop->index }}</td>
                                        <td>{{ $department->name }}</td>
                                        <td>{{ $department->email }}</td>
                                        <td>{{ $department->calendar_id }}</td>
                                        <td>{{ $department->created_by }}</td>
                                        <td>{{ $department->updated_by }}</td>
                                        <td>
                                            <a href="javascript:void(0);" wire:click="edit({{ $department->id }})"
                                                data-bs-toggle="modal" id="edit-button" data-bs-target="#editModal"
                                                class="contactEdit" data-id="">
                                                <span class="bx bx-edit fs-5"></span>
                                            </a>
                                            <a href="javascript:void(0);"
                                                wire:click="delete({{ $department->id }})"class="text-danger"
                                                data-bs-toggle="modal" data-bs-target="#delete">
                                                <span class="bx bx-trash text-danger fs-5"></span>
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
                    <div>{{ $departments->links('vendor.livewire.bootstrap') }}</div>
                </div>
            </div>
        </div>
    </div>
    {{-- List page end  --}}

</div>
