@extends('backend.layouts.main')
@section('title', 'Customer Details')
@section('content')

<div class="row">
    <div class="col-md-3">
        <h4 class="mt-3 mb-3"># {{ $customer->id}} || {{ $customer->company}}</h4>
        @include('backend.partials.profile-sidebar')
    </div>
    <div class="col-md-9">
        <h4 class="mt-3 mb-3">Projects</h4>
        <div class="card">
            <div class="card-body">

                <div class="col mb-3">
					<a href="{{ route('customers.profile.projects.create',1) }}" type="button" class="btn btn-primary px-2">+ New Project</a>
				</div>

				<div class="row row-cols-1 row-cols-md-5 row-cols-lg-5 row-cols-xl-5 mb-3">
					<div class="col">
						<div class="border p-3 pb-0 rounded">
							<p class="text-primary">Not Started</p>
						    <h5 class="card-title">0</h5>
						</div>
					</div>
                    <div class="col">
						<div class="border p-3 pb-0 rounded">
							<p class="text-secondary fw-400">In Progress</p>
						    <h5 class="card-title">0</h5>
						</div>
					</div>
                    <div class="col">
						<div class="border p-3 pb-0 rounded">
							<p class="text-warning fw-400">On Hold</p>
						    <h5 class="card-title">0</h5>
						</div>
					</div>
                    <div class="col">
						<div class="border p-3 pb-0 rounded">
							<p class="text-danger fw-400">Cancelled</p>
						    <h5 class="card-title">0</h5>
						</div>
					</div>
                    <div class="col">
						<div class="border p-3 pb-0 rounded">
							<p class="text-success fw-400">Finished</p>
						    <h5 class="card-title">0</h5>
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
                                <input type="text" wire:model.live="search" class="form-control" id="searchProjectId" autocomplete="off" placeholder="Search Users...">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="table-responsive">
					<table id="projectTable" class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr>
                                <th>#</th>
								<th>Project Name</th>
								<th>Tags</th>
								<th>Start Date</th>
								<th>Dead Line</th>
								<th>Members</th>
								<th>Status</th>
                                <th>Action</th>
							</tr>
						</thead>
						<tbody>
                            <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href="{{ route('customers.profile', 1) }}">
                                        <span class="bx bx-show fs-5"></span>
                                    </a>
                                    <a href="">
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












