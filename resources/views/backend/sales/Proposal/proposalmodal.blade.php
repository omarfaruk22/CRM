<!--Add Item Modal -->
<div class="modal fade" id="addItemModalproposal" tabindex="-1" aria-labelledby="addItemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="min-width: 40%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addItemModalLabel">Add New Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addItemForm" action="{{ route('sales.proposals.item.create') }}" method="POST">
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
