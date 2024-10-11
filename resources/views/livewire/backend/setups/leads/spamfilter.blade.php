<div>

    {{-- Add Spam Filter modal start  --}}
    <div wire:ignore.self class="modal fade" id="spamModal" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-md">
            <div class="modal-content">

                <div class="modal-header">
                    <div class="">
                        <h6 class="modal-title">Add Spam Filter</h6>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="" wire:submit="store">
                    <div class="modal-body">

                        <div class="form">
                            <div class="row">

                                <div class="mb-3 col-md-12">
                                    <label class="form-label"><span style="color: red">*</span>Type</label>
                                    <select wire:model="type"
                                        class="form-select form-select-sm @error('type') is-invalid @enderror"
                                        aria-label=".form-select-sm example">
                                        <option></option>
                                        <option value="sender">Senders</option>
                                        <option value="subject">subjects</option>
                                        <option value="phrase">pharses</option>
                                    </select>
                                    @error('type')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-12">
                                    <label class="form-label"><span style="color: red">*</span>Content</label>
                                    <textarea wire:model="value" type="text" name="" id=""
                                        class="form-control @error('value') is-invalid @enderror"></textarea>
                                    @error('value')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>
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
    {{-- Add Spam Filter modal end  --}}


    {{-- Delete modal start  --}}
    @include('livewire.modal')
    {{-- Delete modal end  --}}


    {{-- Edit spam filter start  --}}
    <div class="modal fade" id="edit" wire:ignore.self tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-md">
            <div class="modal-content">

                <form action="" wire:submit="update">

                    <div class="modal-header">
                        <div class="">
                            <h6 class="modal-title">Edit Spam Filter</h6>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">

                        <div class="form">
                            <div class="row">

                                <div class="mb-3 col-md-12">
                                    <label class="form-label"><span style="color: red">*</span>Type</label>
                                    <select wire:model="type"
                                        class="form-select form-select-sm @error('type') is-invalid @enderror"
                                        aria-label=".form-select-sm example">
                                        <option></option>
                                        <option value="sender">Senders</option>
                                        <option value="subject">subjects</option>
                                        <option value="phrase">pharses</option>
                                    </select>
                                    @error('type')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-12">
                                    <label class="form-label"><span style="color: red">*</span>Content</label>
                                    <textarea wire:model="value" type="text" name="" id=""
                                        class="form-control @error('value') is-invalid @enderror"></textarea>
                                    @error('value')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>
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
    {{-- Edit spam filter end  --}}


    {{-- List page start  --}}
    <div class="row">

        <div class="col mb-3">
            <button type="button" class="btn btn-primary px-2" data-bs-toggle="modal" data-bs-target="#spamModal">+ New
                Spam Filter</button>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="col">

                        {{-- buttons start  --}}
                        <ul class="nav nav-pills mb-3" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" data-bs-toggle="pill" href="#primary-pills-home"
                                    role="tab" aria-selected="true">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon"></div>
                                        <div class="tab-title">Blocked Senders</div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="pill" href="#primary-pills-profile"
                                    role="tab" aria-selected="false" tabindex="-1">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon"></div>
                                        <div class="tab-title">Blocked Subjects</div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="pill" href="#primary-pills-contact"
                                    role="tab" aria-selected="false" tabindex="-1">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon"></div>
                                        <div class="tab-title">Blocked Phrases</div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        {{-- buttons end  --}}

                        <hr>
                        <div class="tab-content" id="pills-tabContent">

                            {{-- Sender start here  --}}
                            <div class="tab-pane fade active show" id="primary-pills-home" role="tabpanel">

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
                                                <button class="btn btn-outline-secondary dropdown-toggle"
                                                    type="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false">Export</button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#">Pdf</a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="#">Excel</a></li>
                                                </ul>
                                            </div>
                                            <div class="">
                                                <a href="{{ route('setup.leads.emailIntegration.spamfilter') }}"
                                                    type="button" class="btn btn-outline-secondary">Reset</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex">
                                        <div class="search-box">
                                            <input type="text" wire:model.live="search" class="form-control"
                                                id="" autocomplete="off" placeholder="Search...">
                                            <i class="ri-search-line search-icon"></i>
                                        </div>
                                    </div>

                                </div>

                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered"
                                        style="width:100%">

                                        <thead>
                                            <tr>
                                                <th>#Sl</th>
                                                <th>Content</th>
                                                <th>Created By</th>
                                                <th>Updated By</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @forelse ($senders as $sender)
                                                <tr>
                                                    <td>{{ $senders->firstItem() + $loop->index }}</td>
                                                    <td>{{ $sender->value }}</td>
                                                    <td>{{ $sender->created_by }}</td>
                                                    <td>{{ $sender->updated_by }}</td>
                                                    <td>
                                                        <a href="javascript:void(0);"
                                                            wire:click="edit({{ $sender->id }})"
                                                            data-bs-toggle="modal" data-bs-target="#edit">
                                                            <span class="bx bx-edit fs-5"></span>
                                                        </a>
                                                        <a href="javascript:void(0);"
                                                            wire:click="delete({{ $sender->id }})"class="text-danger"
                                                            data-bs-toggle="modal" data-bs-target="#delete">
                                                            <span class="bx bx-trash text-danger fs-5"></span>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="text-center">
                                                        data Not Found
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <div>{{ $senders->links('vendor.livewire.bootstrap') }}</div>
                                </div>
                            </div>
                            {{-- Sender end here  --}}


                            {{-- Subject start here  --}}
                            <div class="tab-pane fade" id="primary-pills-profile" role="tabpanel">

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
                                                <button class="btn btn-outline-secondary dropdown-toggle"
                                                    type="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false">Export</button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#">Pdf</a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="#">Excel</a></li>
                                                </ul>
                                            </div>
                                            <div class="">
                                                <a href="{{ route('setup.leads.emailIntegration.spamfilter') }}"
                                                    type="button" class="btn btn-outline-secondary">Reset</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex">
                                        <div class="search-box">
                                            <input type="text" wire:model.live="search" class="form-control"
                                                id="" autocomplete="off" placeholder="Search...">
                                            <i class="ri-search-line search-icon"></i>
                                        </div>
                                    </div>

                                </div>

                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered"
                                        style="width:100%">

                                        <thead>
                                            <tr>
                                                <th>#Sl</th>
                                                <th>Content</th>
                                                <th>Created By</th>
                                                <th>Updated By</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @forelse ($subjects as $subject)
                                                <tr>
                                                    <td>{{ $subjects->firstItem() + $loop->index }}</td>
                                                    <td>{{ $subject->value }}</td>
                                                    <td>{{ $subject->created_by }}</td>
                                                    <td>{{ $subject->updated_by }}</td>
                                                    <td>
                                                        <a href="javascript:void(0);"
                                                            wire:click="edit({{ $subject->id }})"
                                                            data-bs-toggle="modal" data-bs-target="#edit">
                                                            <span class="bx bx-edit fs-5"></span>
                                                        </a>
                                                        <a href="javascript:void(0);"
                                                            wire:click="delete({{ $subject->id }})"class="text-danger"
                                                            data-bs-toggle="modal" data-bs-target="#delete">
                                                            <span class="bx bx-trash text-danger fs-5"></span>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="text-center">
                                                        data Not Found
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <div>{{ $subjects->links('vendor.livewire.bootstrap') }}</div>
                                </div>
                            </div>
                            {{-- Subject end here  --}}


                            {{-- Phrases start here  --}}
                            <div class="tab-pane fade" id="primary-pills-contact" role="tabpanel">

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
                                                <button class="btn btn-outline-secondary dropdown-toggle"
                                                    type="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false">Export</button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#">Pdf</a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="#">Excel</a></li>
                                                </ul>
                                            </div>
                                            <div class="">
                                                <a href="{{ route('setup.leads.emailIntegration.spamfilter') }}"
                                                    type="button" class="btn btn-outline-secondary">Reset</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex">
                                        <div class="search-box">
                                            <input type="text" wire:model.live="search" class="form-control"
                                                id="" autocomplete="off" placeholder="Search...">
                                            <i class="ri-search-line search-icon"></i>
                                        </div>
                                    </div>

                                </div>

                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered"
                                        style="width:100%">

                                        <thead>
                                            <tr>
                                                <th>#Sl</th>
                                                <th>Content</th>
                                                <th>Created By</th>
                                                <th>Updated By</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @forelse ($phrases as $phras)
                                                <tr>
                                                    <td>{{ $phrases->firstItem() + $loop->index }}</td>
                                                    <td>{{ $phras->value }}</td>
                                                    <td>{{ $phras->created_by }}</td>
                                                    <td>{{ $phras->updated_by }}</td>
                                                    <td>
                                                        <a href="javascript:void(0);"
                                                            wire:click="edit({{ $phras->id }})"
                                                            data-bs-toggle="modal" data-bs-target="#edit">
                                                            <span class="bx bx-edit fs-5"></span>
                                                        </a>
                                                        <a href="javascript:void(0);"
                                                            wire:click="delete({{ $phras->id }})"class="text-danger"
                                                            data-bs-toggle="modal" data-bs-target="#delete">
                                                            <span class="bx bx-trash text-danger fs-5"></span>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="text-center">
                                                        data Not Found
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <div>{{ $phrases->links('vendor.livewire.bootstrap') }}</div>
                                </div>
                            </div>
                            {{-- Phrases end here  --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    {{-- List page end  --}}

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
