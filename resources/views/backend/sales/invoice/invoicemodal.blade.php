<!-- Modal -->
<div class="modal fade" id="addItemModal" tabindex="-1" aria-labelledby="addItemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="min-width: 40%";>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addItemModalLabel">Add New Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="description" class="form-label"><span class="text-danger">*</span>
                                Description</label>
                            <input type="text" class="form-control" id="description">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="longDescription" class="form-label">Long Description</label>
                            <textarea class="form-control" id="longDescription" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="rateUSD" class="form-label"><span class="text-danger">*</span> Rate - USD (Base
                                Currency)</label>
                            <input type="text" class="form-control" id="rateUSD">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="rateEUR" class="form-label">Rate - EUR</label>
                            <input type="text" class="form-control" id="rateEUR">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="tax1" class="form-label">Tax 1</label>
                            <select class="form-select" id="tax1">
                                <!-- Options for Tax 1 -->
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="tax2" class="form-label">Tax 2</label>
                            <select class="form-select" id="tax2">
                                <!-- Options for Tax 2 -->
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="unit" class="form-label">Unit</label>
                            <input type="text" class="form-control" id="unit">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="itemGroup" class="form-label">Item Group</label>
                            <select class="form-select" id="itemGroup">
                                <!-- Options for Item Group -->
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>





<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="min-width: 35%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mainvaluebox">
                        <div class="mb-3">
                            <label for="street" class="form-label">Street</label>
                            <textarea class="form-control" id="street" rows="4"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" id="city">
                        </div>
                        <div class="mb-3">
                            <label for="state" class="form-label">State</label>
                            <input type="text" class="form-control" id="state">
                        </div>
                        <div class="mb-3">
                            <label for="zip" class="form-label">Zip Code</label>
                            <input type="text" class="form-control" id="zip">
                        </div>
                        <div class="mb-3">
                            <label for="country" class="form-label">Country</label>
                            <select class="form-select" id="country">
                                <option value="" selected>Choose...</option>
                                <!-- Add more options here -->
                            </select>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="shippingAddress">
                                        <label class="form-check-label" for="shippingAddress">
                                            Shipping Address
                                        </label>
                                    </div>
                                    <div class="btn" id="myhidenin">
                                        <i class='bx bxs-user-circle fs-5 text-primary '></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="preferancebox" style="display: none;">
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="showShippingDetail">
                            <label class="form-check-label" for="showShippingDetail">
                                Show shipping detail in invoice
                            </label>
                        </div>

                        <div class="mb-3">
                            <label for="street" class="form-label">Street</label>
                            <textarea class="form-control" id="street" rows="4"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" id="city">
                        </div>
                        <div class="mb-3">
                            <label for="state" class="form-label">State</label>
                            <input type="text" class="form-control" id="state">
                        </div>
                        <div class="mb-3">
                            <label for="zip" class="form-label">Zip Code</label>
                            <input type="text" class="form-control" id="zip">
                        </div>
                        <div class="mb-3">
                            <label for="country" class="form-label">Country</label>
                            <select class="form-select" id="country">
                                <option value="" selected>Choose...</option>
                                <!-- Add more options here -->
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
