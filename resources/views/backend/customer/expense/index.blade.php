@extends('backend.layouts.main')

@section('title', 'Customer Expenses')

@section('content')
<div class="row">
    <div class="col-md-3">
        <h4 class="mt-3 mb-3"># {{ $customer->id}} || {{ $customer->company}}</h4>
        @include('backend.partials.profile-sidebar')
    </div>
    <div class="col-md-9">
        <h4 class="mt-3 mb-3">Expenses</h4>
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
					<button type="button" class="btn btn-primary px-2">+ Record Expenses</button>
				</div>
                <div class="mb-3 col-md-2">
                    <select class="form-select border-none" wire:model.live="size" name="size">
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                    </select>
                </div>
                <div class="row row-cols-1 row-cols-md-5 row-cols-lg-5 row-cols-xl-5 mb-3">
					<div class="col mb-2">
						<div class="border p-3 pb-0 rounded">
							<p class="text-warning">Total</p>
						    <h5 class="card-title">Rp0.00</h5>
						</div>
					</div>
                    <div class="col mb-2">
						<div class="border p-3 pb-0 rounded">
							<p class="text-primary fw-400">Billable</p>
						    <h5 class="card-title">Rp0.00</h5>
						</div>
					</div>
                    <div class="col mb-2">
						<div class="border p-3 pb-0 rounded">
							<p class="text-warning fw-400">Non Billable</p>
						    <h5 class="card-title">Rp0.00</h5>
						</div>
					</div>
                    <div class="col mb-2">
						<div class="border p-3 pb-0 rounded">
							<p class="text-danger fw-400">Not Invoiced</p>
						    <h5 class="card-title">Rp0.00</h5>
						</div>
					</div>
                    <div class="col mb-2">
						<div class="border p-3 pb-0 rounded">
							<p class="text-success fw-400">Billed</p>
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
                        <div class="">
                            <button type="button" class="btn btn-outline-secondary">Export</button>
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
								<th>#</th>
								<th>Category</th>
								<th>Amount</th>
								<th>Name</th>
								<th>Receipt</th>
								<th>Date</th>
								<th>Project</th>
								<th>Invoice</th>
								<th>Reference</th>
								<th>Payment Mode</th>
							</tr>
						</thead>
						<tbody>
                            <tr>
                                <th>1</th>
                                <td>Develop</td>
                                <td>Developer</td>
                                <td>027762525255</td>
                                <td>027762525255</td>
                                <td>027762525255</td>
                                <td>027762525255</td>
                                <td>027762525255</td>
                                <td>027762525255</td>
                                <td>027762525255</td>
                            </tr>
                            <tr>
                                <td colspan="10" class="text-center">
                                    No entries found
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












