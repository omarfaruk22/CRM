@extends('backend.layouts.main')
@section('title', 'Customer Details')
@section('content')

<div class="col">
	<div class="modal fade" id="zipCreditnote" tabindex="-1" aria-labelledby="zipEstimateLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="zipCreditnote">ZIP Credit Notes</h5>
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
						<input class="form-check-input" type="radio" name="flexRadioDefault" id="open">
						<label class="form-check-label" for="open">
						  Open
						</label>
					</div>
                    <div class="form-check form-check-success">
						<input class="form-check-input" type="radio" name="flexRadioDefault" id="close">
						<label class="form-check-label" for="close">
						  Close
						</label>
					</div>
                    <div class="form-check form-check-success">
						<input class="form-check-input" type="radio" name="flexRadioDefault" id="void">
						<label class="form-check-label" for="void">
						  Void
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
					<a href="#" type="button" class="btn btn-primary">Save</a>
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
        <h4 class="mt-3 mb-3">Credit Notes</h4>
        <div class="card">
            <div class="card-body">

                <div class="col mb-3">
					<a href="{{ route('customers.profile.creditnote.create',1) }}" type="button" class="btn btn-primary px-2">+New Credit Note</a>
                    <button type="button" class="btn btn-primary px-2" data-bs-toggle="modal" data-bs-target="#zipCreditnote"> <i class="lni lni-zip"></i> Zip Estimate</button>
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
								<li><a class="dropdown-item" href="#">Pdf</a>
								</li>
                                <li><a class="dropdown-item" href="#">Excel</a></li>
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
								<th>Credit Note#</th>
								<th>Credit Note Date</th>
								<th>Status</th>
								<th>Project</th>
                                <th>Regerence#</th>
								<th>Amount</th>
								<th>Remaining amount</th>
                                <th>Action</th>
							</tr>
						</thead>
						<tbody>
                            <tr>
                                <th scope="row">Cn-000011</th>
                                <td>2024-03-31</td>
                                <td><span class="badge bg-info ">Open</span></td>
                                 <td></td>
                                <td>sdagas</td>
                                <td>$275.00</td>
                                <td>$275.00</td>
                                <td>
                                    <a href="{{ route('customers.profile.creditnote.show',1) }}">
                                        <span class="bx bx-show fs-5"></span>
                                    </a>
                                    <a href="{{ route('customers.profile.creditnote.edit', 1) }}">
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












