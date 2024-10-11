@extends('backend.layouts.main')
@section('title', 'Customer Details')
@section('content')

<div class="col">
	<div class="modal fade" id="zipEstimate" tabindex="-1" aria-labelledby="zipEstimateLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="zipEstimateLabel">ZIP Estimates</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
                    <span class="mb-3">Status</span>
                    <div class="form-check form-check-success">
						<input class="form-check-input" type="radio" name="flexRadioDefault" id="all">
						<label class="form-check-label" for="all">
						  All
						</label>
					</div>
                    <div class="form-check form-check-success">
						<input class="form-check-input" type="radio" name="flexRadioDefault" id="draft">
						<label class="form-check-label" for="draft">
						  Draft
						</label>
					</div>
                    <div class="form-check form-check-success">
						<input class="form-check-input" type="radio" name="flexRadioDefault" id="send">
						<label class="form-check-label" for="send">
						  Send
						</label>
					</div>
                    <div class="form-check form-check-success">
						<input class="form-check-input" type="radio" name="flexRadioDefault" id="expired">
						<label class="form-check-label" for="expired">
						  Expired
						</label>
					</div>
                    <div class="form-check form-check-success">
						<input class="form-check-input" type="radio" name="flexRadioDefault" id="declined">
						<label class="form-check-label" for="declined">
						  Declined
						</label>
					</div>
                    <div class="form-check form-check-success mb-3">
						<input class="form-check-input" type="radio" name="flexRadioDefault" id="accepted">
						<label class="form-check-label" for="accepted">
						  Accepted
						</label>
					</div>
                    <div class="col-md-12 mb-3">
						<label for="from_date" class="form-label">From Date:</label>
						<input type="date" class="form-control" id="from_date" placeholder="">
					</div>
                    <div class="col-md-12 mb-3">
						<label for="to_date" class="form-label">To Date:</label>
						<input type="date" class="form-control" id="to_date" placeholder="">
					</div>
                </div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<a href="{{ route('customers.profile.estimates.zip_estimate',1) }}" type="button" class="btn btn-primary">Save</a>
				</div>
			</div>
		</div>
	</div>
</div>



<div class="row">
    <div class="col-md-3">
        <h4 class="mt-3 mb-3"># {{ $customer->id}} || {{ $customer->company}}</h4>
        @include('backend.partials.profile-sidebar')
    </div>
    <div class="col-md-9">
        <h4 class="mt-3 mb-3">Estimates</h4>
        <div class="card">
            <div class="card-body">

                <div class="col mb-3">
					<a href="{{ route('customers.profile.estimates.create',1) }}" type="button" class="btn btn-primary px-2">+ Create New Estimate</a>
                    <button type="button" class="btn btn-primary px-2" data-bs-toggle="modal" data-bs-target="#zipEstimate"> <i class="lni lni-zip"></i> Zip Estimate</button>
				</div>

				<div class="row row-cols-1 row-cols-md-5 row-cols-lg-5 row-cols-xl-5 mb-3">
					<div class="col mb-2">
						<div class="border p-3 pb-0 rounded">
							<p class="text-primary">Draft</p>
						    <h5 class="card-title">Rp0.00</h5>
						</div>
					</div>
                    <div class="col mb-2">
						<div class="border p-3 pb-0 rounded">
							<p class="text-secondary fw-400">Sent</p>
						    <h5 class="card-title">Rp0.00</h5>
						</div>
					</div>
                    <div class="col mb-2">
						<div class="border p-3 pb-0 rounded">
							<p class="text-warning fw-400">Expired</p>
						    <h5 class="card-title">Rp0.00</h5>
						</div>
					</div>
                    <div class="col mb-2">
						<div class="border p-3 pb-0 rounded">
							<p class="text-danger fw-400">Declined</p>
						    <h5 class="card-title">Rp0.00</h5>
						</div>
					</div>
                    <div class="col mb-2">
						<div class="border p-3 pb-0 rounded">
							<p class="text-success fw-400">Accepted</p>
						    <h5 class="card-title">Rp0.00</h5>
						</div>
					</div>
				</div>


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
							<button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Export</button>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="{{ route('customers.profile.estimates.export.pdf',1) }}">Pdf</a>
								</li>
                                <li><a class="dropdown-item" href="{{ route('customers.profile.estimates.export.excel',1) }}">Excel</a></li>
							</ul>
						</div>
                    </div>
                    <div class="">
                        <div class="d-flex">
                            <div class="search-box">
                                <input type="text" wire:model.live="search" class="form-control" id="searchProductList" autocomplete="off" placeholder="Search Users...">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="table-responsive">
					<table id="example" class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr>
								<th>Estimate#</th>
								<th>Amount</th>
								<th>Total Tax</th>
								<th>Project</th>
								<th>Tags</th>
								<th>Date</th>
                                <th>Expiry Date</th>
                                <th>Regerence#</th>
                                <th>Status</th>
                                <th>Action</th>
							</tr>
						</thead>
						<tbody>
                            <tr>
                                <th scope="row">EST-000011</th>
                                <td>Rp1,530.00</td>
                                <td>Rp180.00</td>
                                <td></td>
                                <td></td>
                                <td>12-12-12</td>
                                <td>12-12-12</td>
                                <td></td>
                                <td><span class="badge bg-danger">Declined</span></td>
                                <td>
                                    <a href="{{ route('customers.profile.estimates.show',1) }}">
                                        <span class="bx bx-show fs-5"></span>
                                    </a>
                                    <a href="{{ route('customers.profile.estimates.edit', 1) }}">
                                        <span class="bx bx-edit fs-5"></span>
                                    </a>
                                </td>
                            </tr>
						</tbody>
						<tfoot>
						</tfoot>
					</table>
				</div>
            </div>
        </div>
    </div>
</div>

@endsection












