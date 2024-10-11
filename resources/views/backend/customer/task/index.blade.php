@extends('backend.layouts.main')
@section('title', 'Customer Details')
@section('content')
<div class="row">
    <div class="col-md-3">
        <h4 class="mt-3 mb-3">#11 dev</h4>
        @include('backend.partials.profile-sidebar')
    </div>
    <div class="col-md-9">
        <h4 class="mt-3 mb-3">Tasks</h4>
        <div class="card">
            <div class="card-body">
                  <div class="d-flex justify-content-between ">
                        <div class="mb-3">
                            <a href="{{ route('customers.profile.task.create',1) }}" type="button" class="btn btn-primary px-2">+ New Task</a>
                        </div>
                          <div class="mb-3 d-flex justify-content-end ">
                            <button type="button" class="btn btn-white px-2 " data-bs-toggle="modal" data-bs-target="#contact"><i class='bx bxs-filter-alt' ></i></button>
                        </div>
                  </div>
                <p class="text-bold ">Related To:</p>
                <div class="row">
                    <div class="col-md-12 d-flex flex-wrap mb-2">
                        <div class="mx-1 mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked1" checked disabled>
                            <label class="form-check-label" for="flexCheckChecked1">Customer</label>
                        </div>
                      <div class="mx-1 mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="Projects">
                            <label class="form-check-label" for="Projects">Projects</label>
                        </div>
                        <div class="mx-1 mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked3">
                            <label class="form-check-label" for="flexCheckChecked3">Invoices</label>
                        </div>
                        <div class="mx-1 mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked4">
                            <label class="form-check-label" for="flexCheckChecked4">Estimates</label>
                        </div>
                        <div class="mx-1 mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked5">
                            <label class="form-check-label" for="flexCheckChecked5">Contracts</label>
                        </div>
                        <div class="mx-1 mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked6">
                            <label class="form-check-label" for="flexCheckChecked6">Tickets</label>
                        </div>
                        <div class="mx-1 mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked7">
                            <label class="form-check-label" for="flexCheckChecked7">Expenses</label>
                        </div>
                        <div class="mx-1 mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked8">
                            <label class="form-check-label" for="flexCheckChecked8">Proposals</label>
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
								<th>Name</th>
								<th>Status</th>
								<th>Start Date</th>
								<th>Due Date</th>
								<th>Assigned To</th>
								<th>Tags</th>
								<th>Priority</th>
                                <th>Action</th>
							</tr>
						</thead>
						<tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>marvin</td>
                               <td> 
                                     <span>
                                        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </a>
                                        <ul class="dropdown-menu" style=" list-style-type: none !important;" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">dddd</a></li>
                                            <li><a class="dropdown-item">Medium</a></li>
                                    </span>
                               </td>
                                <td>20/2/24</td>
                                <td>20/2/24</td>
                                <td><span><img src="" alt=""></span></td>
                                <td><span>
                                            <button style="border-radius: 10px;" class="btn btn-sm btn-white " type="button" >
                                                follw up
                                            </button></span></td>
                                
                                <td>
                                    <span>
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Low
                                        </a>
                                        <ul class="dropdown-menu" style=" list-style-type: none !important;" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="#">Low</a></li>
                                            <li><a class="dropdown-item" href="#">High</a></li>
                                            <li><a class="dropdown-item">Medium</a></li>
                                    </span>
                                </td>
                                <td>
                                    <a href="">
                                        <span class="bx bx-show fs-5"></span>
                                    </a>
                                    <a href="{{ route('customers.profile.task.edit',1) }}">
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

