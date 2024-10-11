@extends('backend.layouts.main')
@section('title', 'Customer Details')
@section('content')

<div class="modal fade" id="zipPayment" tabindex="-1" aria-labelledby="zipEstimateLabel" aria-hidden="true">
	<div class="modal-dialog">
        <form action="{{ route('customer.contact.payment.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="zipEstimateLabel">ZIP Payment of #{{ $customer->id}} || {{ $customer->company}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="from_date" class="form-label">Payment Mode By</label>
                            <select name="" id="" class="form-control">
                                <option value="bank">All</option>
                                <option value="bank">Bank</option>
                                <option value="bank">OTher</option>
                            </select>
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
	</div>
</div>

<div class="row">
    <div class="col-md-3">
        <h4 class="mt-3 mb-3"># {{ $customer->id}} || {{ $customer->company}}</h4>
        @include('backend.partials.profile-sidebar')
    </div>
    <div class="col-md-9">
        <h4 class="mt-3 mb-3">Payments</h4>
        <div class="card">
            <div class="card-body">
                <div class="col mb-3">
					<button type="button" class="btn btn-primary px-2"  data-bs-toggle="modal" data-bs-target="#zipPayment"><i class='bx bxs-file-archive'></i> Zip Payments</button>
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
                                <input type="text" wire:model.live="search" class="form-control" id="searchId" autocomplete="off" placeholder="Search...">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="table-responsive">
					<table id="tableId" class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr>
								<th>Payment #</th>
								<th>Invoice #</th>
								<th>Payment Mode</th>
								<th>Transaction ID</th>
								<th>Amount</th>
								<th>Date</th>
                                <th>Action</th>
							</tr>
						</thead>
						<tbody>
                            <tr>
                                <th>2</th>
                                <td>INV-9909764</td>
                                <td>Bank</td>
                                <td></td>
                                <td>$76.77</td>
                                <td>12-01-2024</td>
                                <td>
                                    <a href="{{ route('customers.payment.show', 1) }}">
                                        <span class="bx bx-show fs-5"></span>
                                    </a>
                                    <a href="">
                                        <span class="bx bx-trash text-danger fs-5"></span>
                                    </a>
                                </td>
                            </tr>
						</tbody>
					</table>
				</div>
            </div>
        </div>

    </div>
</div>

@endsection












