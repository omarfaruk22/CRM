@extends('backend.layouts.main')
@section('title', 'Customer Details')
@section('content')
<div class="row">
    <div class="col-md-3">
        <h4 class="mt-3 mb-3"># {{ $customer->id}} || {{ $customer->company}}</h4>
        @include('backend.partials.profile-sidebar')
    </div>
    <div class="col-md-9">
        <h4 class="mt-3 mb-3">Proposals</h4>
        <div class="card">
            <div class="card-body">
                  <div class="d-flex justify-content-between ">
                        <div class="mb-3">
                            <a href="{{ route('customers.profile.proposal.create',1) }}" type="button" class="btn btn-primary px-2">+ New Proposal</a>
                        </div>
                          <div class="mb-3 d-flex justify-content-end ">
                            <button type="button" class="btn btn-white px-2 " data-bs-toggle="modal" data-bs-target="#contact"><i class='bx bxs-filter-alt' ></i></button>
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
                <div class="row">
				<div class="table-responsive">
					<table id="example" class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr>
								<th>Proposal #</th>
								<th>Subject</th>
								<th>To</th>
								<th>Total</th>
								<th>Date</th>
								<th>Open Till</th>
								<th>Project</th>
								<th>Tags</th>
								<th>Date Created</th>
								<th>Status</th>
                                <th>Action</th>
							</tr>
						</thead>
						<tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>PRO-000004</td>
                                <td>house for rent deal</td>
                                <td>$2,390.78</td>
                                <td>30/03/2024</td>
                                <td>06/04/2024</td>
                                <td>Devyn</td>
                                <td><span class="border rounded-0">follow up</span><br>
                                <span class="border rounded-0"> up</span></td>
                                <td>30/03/2024 06:25:05</td>
                                <td>Approved</td>

                                <td>
                                    <a href="{{ route('customers.profile.proposal.show',1) }}">
                                        <span class="bx bx-show fs-5"></span>
                                    </a>
                                    <a href="{{ route('customers.profile.proposal.edit',1) }}">
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
</div>
@endsection

