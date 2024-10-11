<div>

    {{-- Delete modal start  --}}
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="text-end">
                    <button type="button" class="btn-close m-3" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <h3>Are you sure?</h3>
                    <p>Delete this data</p>
                </div>
                <form wire:submit="destroy">
                    <div class="text-center my-4">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Delete modal end  --}}

    
    <div class="row">
        <div class="col-md-12">

            <div class="mb-3">
                <div>
                    <div class="col">
                        <a type="button" class="btn btn-primary" href="{{ route('setup.leads.webtolead.create') }}"> + New Form</a>
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

                            <div class="">
                                <a href="{{ route('setup.leads.webtolead.index') }}" class="btn btn-outline-secondary" type="button">Reset</a>
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
                                        <th>#Sl</th>
                                        <th>Form Name</th>
                                        <th>Total Submission</th>
                                        <th>Created By</th>
                                        <th>Updated By</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($webToLeads->isNotEmpty())
                                        @foreach ($webToLeads as $webToLead)
                                            <tr>
                                                <td> {{ $webToLeads->firstItem()+$loop->index }} </td>
                                                <td><a href="{{ route('setup.leads.webtolead.edit', $webToLead->id) }}">{{ $webToLead->name }}</a></td>
                                                <td></td>
                                                <td>{{ $webToLead->created_by }}</td>
                                                <td>{{ $webToLead->updated_by }}</td>
                                                <td>{{ $webToLead->updated_at }}</td>
                                                <td>{{ $webToLead->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('setup.leads.webtolead.edit', $webToLead->id) }}">
                                                        <span class="bx bx-edit fs-5"></span>
                                                    </a>
                                                    <a href="javascript:void(0);" wire:click="delete({{ $webToLead->id }})" class="text-danger" data-bs-toggle="modal" data-bs-target="#delete">
                                                        <span class="bx bx-trash text-danger fs-5"></span>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            <div>{{ $webToLeads->links('vendor.livewire.bootstrap') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
