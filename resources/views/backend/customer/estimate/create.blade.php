@extends('backend.layouts.main')
@section('title', 'Customer Details')
@push('css')
    <link href="{{ asset('backend/assets/plugins/input-tags/css/tagsinput.css') }}" rel="stylesheet" />
@endpush
@section('content')

<div class="col">
	<div class="modal fade" id="createEstimate" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add New Item</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
                    <div class="row">
				    	<div class="mx-auto">
				    		<form class="row g-3 needs-validation" novalidate>
				    			<div class="col-md-12">
				    				<label for="description" class="form-label"><span style="color: red">*</span> Description</label>
				    				<input type="text" name="description" class="form-control" id="description" placeholder="Description" value="">
				    			</div>
                                <div class="col-md-12">
				    				<label for="long_description" class="form-label">Long Description</label>
				    				<textarea name="long_description" class="form-control" id="long_description" placeholder="Address ..." rows="3"></textarea>
				    			</div>
                                <div class="col-md-12">
				    				<label for="usd_based_currency" class="form-label"><span style="color: red">*</span> Rate - USD (Base Currency)</label>
				    				<input type="text" name="usd_based_currency" class="form-control" id="usd_based_currency" placeholder="Rate - USD (Base Currency)" value="">
				    			</div>
                                <div class="col-md-12">
				    				<label for="eur_based_currency" class="form-label">Rate - EUR</label>
				    				<input type="text" name="eur_based_currency" class="form-control" id="eur_based_currency" placeholder="Rate - EUR" value="">
				    			</div>
				    			<div class="col-md-6">
				    				<label for="tax_1" class="form-label">Tax 1</label>
				    				<select id="tax_1" class="form-select">
				    					<option selected disabled value>No Tax</option>
				    					<option>One</option>
				    					<option>Two</option>
				    					<option>Three</option>
				    				</select>
				    			</div>
                                <div class="col-md-6">
                                    <label for="tax_2" class="form-label">Tax 2</label>
                                    <select id="tax_2" class="form-select" disabled>
                                        <option selected disabled value>No Tax</option>
                                        <option>One</option>
                                        <option>Two</option>
                                        <option>Three</option>
                                    </select>
                                </div>
				    			<div class="col-md-12">
				    				<label for="unit" class="form-label">Unit</label>
				    				<input type="text" name="unit" class="form-control" id="unit" placeholder="unit" value="">
				    			</div>

				    			<div class="col-md-12">
				    				<label for="shipping_bill_no" class="form-label"><i class="bx bx-edit fs-5"></i> SHIPMENT BL / AWB NO.</label>
				    				<input type="text" name="shipping_bill_no" class="form-control" id="shipping_bill_no" placeholder="SHIPMENT BL / AWB NO.">
				    			</div>

                                <div class="col-md-12">
				    				<label for="lodgement" class="form-label"><i class="bx bx-edit fs-5"></i> LODGEMENT / MANIFESTATION</label>
				    				<input type="text" name="lodgement" class="form-control" id="lodgement" placeholder="LODGEMENT / MANIFESTATION">
				    			</div>

                                <div class="col-md-12">
				    				<label for="arrival_date" class="form-label"><i class="bx bx-edit fs-5"></i> ARRIVAL DATE</label>
				    				<input type="text" name="arrival_date" class="form-control" id="arrival_date" placeholder="ARRIVAL DATE">
				    			</div>

                                <div class="col-md-12">
				    				<label for="supplier" class="form-label"><i class="bx bx-edit fs-5"></i> SUPPLIER</label>
				    				<input type="text" name="supplier" class="form-control" id="supplier" placeholder="SUPPLIER">
				    			</div>

                                <div class="col-md-12">
				    				<label for="stock_code" class="form-label"><i class="bx bx-edit fs-5"></i> STOCK CODE</label>
				    				<input type="text" name="stock_code" class="form-control" id="stock_code" placeholder="STOCK CODE">
				    			</div>

                                <div class="col-md-12">
				    				<label for="description" class="form-label"><i class="bx bx-edit fs-5"></i> DESCRIPTION</label>
				    				<input type="text" name="description" class="form-control" id="description" placeholder="DESCRIPTION">
				    			</div>
                                <div class="col-md-12">
                                    <label for="item_group" class="form-label">Item Group</label>
                                    <select id="item_group" class="form-select">
                                        <option selected disabled value>Choose.........</option>
                                        <option>One</option>
                                        <option>Two</option>
                                        <option>Three</option>
                                    </select>
                                </div>
				    		</form>
				    	</div>
				    </div>
                </div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save</button>
				</div>
			</div>
		</div>
	</div>
</div>


<h4>Create New Estimate</h4>

<div class="row">
	<div class="col-xl-12 mx-auto">
		<div class="card">
			<div class="card-body p-4">
				<form>

                    <div class="row mb-5">
                        <div class="col-md-6">
                            <div class="col-md-12 mb-2">
                                <label for="customer" class="form-label"><span style="color: red">*</span> Customer</label>
                                <select id="customer" name="customer" class="form-select">
                                    <option selected disabled value>Choose...</option>
                                    <option>One</option>
                                    <option>Two</option>
                                    <option>Three</option>
                                </select>
                            </div>
                            <div><i class="bx bx-edit fs-5"></i></div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <p class="bold">Bill To</p>
                                    <address>
                                        <span class="">7561 Dimitri Garden</span><br>
                                        <span class="">East Everettechester,Oklahoma</span><br>                              
                                        <span class="">HT, 74467</span><br> 
                                    </address>
                                </div>
                                <div class="col-md-6">
                                    <p class="bold">Ship to</p>
                                    <address>
                                        <span class="">6587 Rowe Cape</span><br>
                                        <span class="">Roslynmouth, North Carolina</span><br>                              
                                        <span class="">HT, 46449</span><br> 
                                    </address>
                                </div>
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="estimate_number" class="form-label"><span style="color: red">*</span>Estimate Number</label>
                                <div class="input-group mb-3">
									<div class="input-group-text">EST-</div>
                                    <input type="text" name="estimate_number" class="form-control" id="estimate_number" placeholder="000015" value="">
								</div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="estimate_date" class="form-label"><span style="color: red">*</span>Estimate Date</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-text">EST-</div>
                                        <input type="date" name="estimate_date" class="form-control" id="estimate_date" placeholder="2024-03-26" value="">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-2">
                                    <label for="expiry_date" class="form-label">Expiry Date</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-text">EST-</div>
                                        <input type="date" name="expiry_date" class="form-control" id="expiry_date" placeholder="2024-03-26" value="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
							<div class="mb-3">
								<label class="form-label"><i class="fa fa-tag"></i>Tags</label>
								<select name="tag" multiple data-role="tagsinput">
									<option value="Amsterdam">Amsterdam</option>
									<option value="Washington">Washington</option>
									<option value="Sydney">Sydney</option>
									<option value="Beijing">Beijing</option>
									<option value="Cairo">Cairo</option>
								</select>
							</div>
                            <div class="row mb-2">
                                <div class="col-md-6 mb-2">
                                    <label for="customer" class="form-label"><span style="color: red">*</span> Currency</label>
                                    <select id="customer" name="customer" class="form-select">
                                        <option selected disabled value>Choose...</option>
                                        <option>One</option>
                                        <option>Two</option>
                                        <option>Three</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="customer" class="form-label">Status</label>
                                    <select id="customer" name="customer" class="form-select">
                                        <option selected disabled value>Choose...</option>
                                        <option>One</option>
                                        <option>Two</option>
                                        <option>Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="reference" class="form-label">Reference#</label>
                                <input type="text" name="reference" class="form-control" id="reference" placeholder="Reference" value="">
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6 mb-2">
                                    <label for="customer" class="form-label">Sale Agent</label>
                                    <select id="customer" name="customer" class="form-select">
                                        <option selected disabled value>Choose...</option>
                                        <option>One</option>
                                        <option>Two</option>
                                        <option>Three</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="customer" class="form-label">Discount Type</label>
                                    <select id="customer" name="customer" class="form-select">
                                        <option selected disabled value>Choose...</option>
                                        <option>One</option>
                                        <option>Two</option>
                                        <option>Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="admin_note" class="form-label">Admin Note</label>
                                <textarea class="form-control" id="admin_note" placeholder="Admin Note" rows="3"></textarea>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row d-flex justify-content-between mt-5">
                        <div class="col-md-6 mb-3">
						    <div class="input-group mb-3">
						    	<select class="form-select" id="append-button-single-field" data-placeholder="Choose one thing">
                                    <option></option>
                                    <optgroup label="Group 1">
                                        <option>Reactive</option>
                                        <option>Solution</option>
                                        <option>Conglomeration</option>
                                    </optgroup>
                                    <optgroup label="Group 2">
                                        <option>Algoritm</option>
                                        <option>Holistic</option>
                                    </optgroup>
						    	</select>
						    	<button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#createEstimate" type="button">+</button>
						    </div>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end mb-3">
                            <div class="d-flex align-items-center gap-3">
                                <span>Show quantity as:</span>
                                <div class="form-check form-check-success">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">Qty</label>
                                </div>
                                <div class="form-check form-check-success">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioSuccess">
                                    <label class="form-check-label" for="flexRadioSuccess">Hours</label>
                                </div>
                                <div class="form-check form-check-success">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDanger">
                                    <label class="form-check-label" for="flexRadioDanger">Qty/Hours</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive mb-5">
                        <table class="table mb-0 table-hover align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">Item</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">ARRIVAL DATE</th>
                                    <th scope="col">DESCRIPTION</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Rate</th>
                                    <th scope="col">Tax</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col"><i class="lni lni-cog"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"><textarea class="form-control" id="description" placeholder="Description" rows="3"></textarea></th>
                                    <td><textarea class="form-control" id="long_description" placeholder="Long Description" rows="3"></textarea></td>
                                    <td><input type="text" name="arrival_date" class="form-control" id="arrival_date" placeholder="" value=""></td>
                                    <td><input type="text" name="description" class="form-control" id="description" placeholder="" value=""></td>
                                    <td><input type="number" name="qty" class="form-control" id="qty" placeholder="" value=""></td>
                                    <td><input type="number" name="rate" class="form-control" id="rate" placeholder="" value=""></td>
                                    <td>
                                        <div class="mb-2">
                                            <select id="customer" name="customer" class="form-select">
                                                <option selected disabled value>No Tax</option>
                                                <option>One</option>
                                                <option>Two</option>
                                                <option>Three</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td></td>
                                    <td>
                                        <div class="col">
										    <button type="button" class="btn btn-primary px-2 pr-0"><i class='lni lni-checkmark'></i></button>
									    </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="row table-responsive d-flex justify-content-end mb-5">
                        <div class="col-md-8">
                            <table class="table mb-0">
                                <tbody>
                                    <tr>
                                        <td colspan="7"></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"></td>
                                        <td style="text-align: right;">Sub Total :</td>
                                        <td style="text-align: right; width: 100px;">$0.00</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"></td>
                                        <td style="text-align: right;">
                                            <div class="input-group">
                                                <span>Discount</span>&nbsp; &nbsp;
                                                <input type="number" name="discount" class="form-control" id="discount" placeholder="0" value="">
                                                <select class="form-select" id="prepend-append-dropdown-single-field" data-placeholder="Choose one thing" style="max-width: 150px;">
                                                    <option>%</option>
                                                    <option>Fixed Amount</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td style="text-align: right; width: 100px;">-$0.00</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"></td>
                                        <td style="text-align: right;">
                                            <div class="input-group">
                                                <span>Adjustment</span>&nbsp; &nbsp;
                                                <input type="adjustment" name="adjustment" class="form-control" id="adjustment" placeholder="0" value="">
                                            </div>
                                        </td>
                                        <td style="text-align: right; width: 100px;">-$0.00</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7"></td>
                                        <td style="text-align: right;">Total:</td>
                                        <td style="text-align: right; width: 100px;">$0.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <hr>

                    <div class="row mt-5 mb-3">
                        <div class="col-md-12 mb-3">
				        	<label for="client_note" class="form-label">Client Note</label>
				        	<textarea name="client_note" class="form-control" id="client_note" placeholder="Client Note" rows="3"></textarea>
				        </div>
                        <div class="col-md-12">
				        	<label for="terms_and_conditions" class="form-label">Terms & Conditions</label>
				        	<textarea name="terms_and_conditions" class="form-control" id="terms_and_conditions" placeholder="Terms & Conditions" rows="3">Alice looked all round the hall, but they were playing the Queen in a day or two: wouldn't it be of very little use, as it lasted.) 'Then the eleventh day must have been changed for Mabel! I'll try and repeat "'TIS THE VOICE OF THE SLUGGARD,"' said the White Rabbit, jumping up and to hear the.</textarea>
				        </div>
                    </div>
                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection

@push('js')
    <script src="{{ asset('backend/assets/plugins/input-tags/js/tagsinput.js') }}"></script>
@endpush










