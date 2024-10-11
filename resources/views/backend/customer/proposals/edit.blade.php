@extends('backend.layouts.main')
@section('title', 'Customer Details')
@push('css')
    <link href="{{ asset('backend/assets/plugins/input-tags/css/tagsinput.css') }}" rel="stylesheet" />
@endpush
@section('content')

<div class="col">
    {{-- item moddal start  --}}
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
    {{-- end modal  --}}
</div>


<h4>Edit Proposal</h4>
<div class="row">
	<div class="col-xl-12 mx-auto">
		<div class="card">
			<div class="card-body p-4">
				<form>

                    <div class="row mb-5">
                        <div class="col-md-6">
                            <div class="col-md-12 mb-2">
                                <label for="sub" class="form-label"><span style="color: red">*</span> Subject</label>
                               <input type="text" class="form-control">
                            </div> 
                            <div class="col-md-12 mb-2">
                                <label for="releted" class="form-label"><span style="color: red">*</span> Releted</label>
                                <select id="releted" name="releted" class="form-select">
                                    <option selected disabled value>Choose...</option>
                                    <option>Lead</option>
                                    <option>Customer</option>
                                    <option>Three</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="date" class="form-label"><span style="color: red">*</span>Estimate Date</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-text">Date</div>
                                        <input type="date" name="date" class="form-control" id="date" placeholder="2024-03-26" value="">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-2">
                                    <label for="otill" class="form-label">Open Till</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-text">choose ..</div>
                                        <input type="date" name="otill" class="form-control" id="otill" placeholder="2024-03-26" value="">
                                    </div>
                                </div>
                                    <div class="col-md-6 mb-2">
                                     <label for="curency" class="form-label">Currency</label>
                                         <select id="curency" name="curency" class="form-select">
                                            <option selected disabled value>Choose...</option>
                                            <option>USD <small>$</small> </option>
                                            <option>EURO  <small>€</small> </option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="discount" class="form-label">Discount Type</label>
                                        <select id="discount" name="discount" class="form-select">
                                            <option selected disabled value>Choose...</option>
                                            <option>No discount</option>
                                            <option>Before Tex</option>
                                            <option>After Tex</option>
                                        </select>
                                    </div>
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
                                    <div class="mb-3">
                                        <div class="form- form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked="">
                                            <label class="form-check-label" for="flexSwitchCheckChecked">Allow Comments</label>
                                        </div>
                                    </div>
                                   
                            </div>
                        </div>

                        <div class="col-md-6">
							
                            <div class="row mb-2">
                                <div class="col-md-6 mb-2">
                                    <label for="status" class="form-label"><span style="color: red">*</span> Status</label>
                                    <select id="status" name="status" class="form-select">
                                        <option selected disabled value>Choose...</option>
                                        <option>Draft</option>
                                        <option>Sent</option>
                                        <option>Open</option>
                                        <option>Declined</option>
                                        <option>Acceped</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="assigned" class="form-label">Assigned</label>
                                    <select id="assigned" name="assigned" class="form-select">
                                        <option selected disabled value>Choose...</option>
                                        <option value="7">Zander Kshlerin</option>
                                        <option value="2">Wilmer Borer</option>
                                        <option value="6">Talon Franecki</option>
                                        <option value="9">Ruben Bechtelar</option>
                                        <option value="1" selected="">Martin Fay</option>
                                        <option value="10">Keanu Schmeler</option>
                                        <option value="5">Jordan Buckridge</option>
                                        <option value="8">Gustave Dach</option>
                                        <option value="3">Darion Morissette</option>
                                        <option value="4">Adalberto Murazik</option>
                                        <option value="11">Abhishek Yadav</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="to" class="form-label">To</label>
                                <input type="text" name="to" class="form-control" id="to" placeholder="To" value="">
                            </div>
                             <div class="col-md-12">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control" id="address" placeholder="address" rows="3"></textarea>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6 mb-2">
                                    <label for="city" class="form-label">City</label>
                                    <select id="city" name="city" class="form-select">
                                        <option selected disabled value>Choose...</option>
                                        <option>One</option>
                                        <option>Two</option>
                                        <option>Three</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="state" class="form-label">State</label>
                                    <select id="state" name="state" class="form-select">
                                        <option selected disabled value>Choose...</option>
                                        <option>One</option>
                                        <option>Two</option>
                                        <option>Three</option>
                                    </select>
                                </div>
                                 <div class="col-md-6 mb-2">
                                    <label for="country" class="form-label">Country</label>
                                    <select id="country" name="country" class="form-select">
                                        <option selected disabled value>Choose...</option>
                                        <option>One</option>
                                        <option>Two</option>
                                        <option>Three</option>
                                    </select>
                                </div>
                                 <div class="col-md-6 mb-2">
                                    <label for="zipcode" class="form-label">Zip Code</label>
                                    <select id="zipcode" name="zipcode" class="form-select">
                                        <option selected disabled value>Choose...</option>
                                        <option>One</option>
                                        <option>Two</option>
                                        <option>Three</option>
                                    </select>
                                </div>
                                 <div class="col-md-6 mb-2">
                                    <label for="email" class="form-label">Email</label>
                                   <input type="email" name="email" class="form-control">
                                </div>
                                  <div class="col-md-6 mb-2">
                                    <label for="phone" class="form-label">Phone</label>
                                   <input type="phone" class="form-control" name="phone">
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row d-flex justify-content-between mt-5">
                        <div class="col-md-6 mb-3">
                            <label for="item" class="form-label">Item</label>
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
                       <p>Include proposal items with merge field anywhere in proposal content as {proposal_items}</p>
                        
                    </div>
                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-white">Save & Send</button>
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










