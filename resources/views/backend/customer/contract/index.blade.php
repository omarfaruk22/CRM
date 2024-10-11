@extends('backend.layouts.main')
@section('title', 'Customer Details')
@section('content')

<div class="row">
    <div class="col-md-3">
        <h4 class="mt-3 mb-3"># {{ $customer->id}} || {{ $customer->company}}</h4>
        @include('backend.partials.profile-sidebar')
    </div>
    <div class="col-md-9">
        <h4 class="mt-3 mb-3">Contracts</h4>
        <div class="card">
            <div class="card-body">
                <div class="col mb-3">
					<a href="{{ route('customers.profile.contracts.create',1) }}" type="button" class="btn btn-primary px-2">+ New Contracts</a>
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
                                <input type="text" wire:model.live="search" class="form-control" id="searchId" autocomplete="off" placeholder="Search Users...">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="table-responsive">
					<table id="tableId" class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr>
								<th>Subject</th>
								<th>Contracts Type</th>
								<th>Contracts Value</th>
								<th>Start Date</th>
								<th>End Date</th>
								<th>Project</th>
                                <th>Signature</th>
                                <th>Action</th>
							</tr>
						</thead>
						<tbody>
                            <tr>
                                <th scope="row">Alice said with some difficulty, as it went, 'One side.</th>
                                <td>Void and Voidable Contracts</td>
                                <td>Rp1,665.00</td>
                                <td>2024-03-26</td>
                                <td>2024-04-06</td>
                                <td></td>
                                <td>Not Signed</td>
                                <td>
                                    <a href="{{ route('customers.profile.contracts.show',1) }}">
                                        <span class="bx bx-show fs-5"></span>
                                    </a>
                                    <a href="{{ route('customers.profile.contracts.edit',1) }}">
                                        <span class="bx bx-edit fs-5"></span>
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












