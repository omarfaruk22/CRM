@extends('backend.layouts.main')
@section('title', 'Customer Details')
@section('content')
<div class="row">
    <div class="col-md-3">
        <h4 class="mt-3 mb-3"># {{ $customer->id}} || {{ $customer->company}}</h4>
        @include('backend.partials.profile-sidebar')
    </div>
    <div class="col-md-9">
        <h4 class="mt-3 mb-3">Subscriptions</h4>
        <div class="card">
            <div class="card-body">
                <div class="col mb-3">
					<a href="{{ route('customers.profile.subcriptions.create',1) }}" type="button" class="btn btn-primary px-2" >+ New Subscription</a>
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
								<th>Subscription Name</th>
								<th>Project</th>
								<th>Status</th>
								<th>Next Billing Cycle</th>
								<th>Date Subscribed</th>
								<th>Last Sent</th>
                                <th>Action</th>
							</tr>
						</thead>
						<tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>manage</td>
                                <td>Transportation</td>
                                <td>Not subscribed</td>
                                <td>10</td>
                                <td>10/10/24</td>
                                <td>12.11.23</td>
                                <td>
                                    <a href="#">
                                        <span class="bx bx-show fs-5"></span>
                                    </a>
                                    <a href="{{ route('customers.profile.subcriptions.edit',1) }}">
                                        <span class="bx bx-edit fs-5"></span>
                                    </a>
                                    <a href="">
                                        <span class="bx bx-trash text-danger fs-5"></span>
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












