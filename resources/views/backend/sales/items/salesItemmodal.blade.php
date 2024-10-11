<!--Add Item Modal -->
<div class="modal fade" id="addItemModalmain" tabindex="-1" aria-labelledby="addItemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="min-width: 40%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addItemModalLabel">Add New Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addItemForm" action="{{ route('main.estimate.item.create') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="col">
                            <label for="description" class="form-label"><span class="text-danger">*</span>
                                Description</label>
                            <input type="text" class="form-control" id="description" name="description" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="longDescription" class="form-label">Long Description</label>
                            <textarea class="form-control" id="longDescription" name="longDescription" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="rateUSD" class="form-label"><span class="text-danger">*</span> Rate - USD (Base
                                Currency)</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="rateUSD" name="rate">
                                <div class="input-group-text">
                                    <input type="checkbox" id="rateUSDCheckbox" class="rateCheckbox" name="rateCheckbox"
                                        value="USD" checked>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="rateEUR" class="form-label">Rate - EUR</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="rateEUR" name="rate" disabled>
                                <div class="input-group-text">
                                    <input type="checkbox" id="rateEURCheckbox" class="rateCheckbox" name="rateCheckbox"
                                        value="EUR">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="tax1" class="form-label">Tax 1</label>
                            <select class="form-select" id="tax1" name="tax1">
                                <option disabled selected>Tax1 Select</option>
                                @foreach ($taxes as $tax)
                                    <option value="{{ $tax->rate }}">{{ $tax->rate }}%</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="tax2" class="form-label">Tax 2</label>
                            <select class="form-select" id="tax2" name="tax2">
                                <option disabled selected>Tax2 Select</option>
                                @foreach ($taxes as $tax)
                                    <option value="{{ $tax->rate }}">{{ $tax->rate }}%</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label for="unit" class="form-label">Unit</label>
                            <input type="number" class="form-control" id="unit" name="unit">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="itemGroup" class="form-label">Item Group</label>
                            <select class="form-select" id="group_id" name="group_id">
                                @if (isset($groups))
                                    @foreach ($groups as $group)
                                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="addItemForm">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Group Modal -->
<div class="modal fade" id="salesgroupItemModal" tabindex="-1" aria-labelledby="salesgroupItemModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="min-width: 40%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="salesgroupItemModalLabel">Add New Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row mb-3">
                        <div class="col">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="New Group">
                                <button class="btn btn-primary" type="button">Create Group</button>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="grouptable">
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
                                            <div class="dropdown">
                                                <button class="btn btn-outline-secondary dropdown-toggle"
                                                    type="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false">Export</button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#">Pdf</a></li>
                                                    <li><a class="dropdown-item" href="#">Excel</a></li>
                                                </ul>
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
                                    <div class="table-responsive mb-3">
                                        <table class="table table-bordered table-hover">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col">ID #</th>
                                                    <th scope="col">Group Name</th>


                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td>1122</td>
                                                    <td>ashdiu aiusdg</td>

                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary mx-2" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



<!-- Delete Modal -->
<div class="modal fade" id="deletesalesInvoiceModal" tabindex="-1" aria-labelledby="deleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">
                    Delete Credit
                    Invoice
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row  ">
                    <div class="col">
                        <h5 class="text-center ">Are you sure
                            you want to
                            delete
                            this credit note ?</h5>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form action="" id="deleteInvoiceForm" method="POST">
                    @csrf
                    <button type="submit" id="confirmDelete" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
