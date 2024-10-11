@extends('backend.layouts.main')
@section('title', 'Customers')
@section('content')

			<!--breadcrumb-->
			<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
				<div class="breadcrumb-title pe-3">Subscriptions</div>
				<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Subscriptions Add</li>
							</ol>
						</nav>
				</div>
				<div class="ms-auto">
					<div class="btn-group">
							<button type="button" class="btn btn-primary">Settings</button>
							<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
								<a class="dropdown-item" href="javascript:;">Another action</a>
								<a class="dropdown-item" href="javascript:;">Something else here</a>
								<div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
							</div>
					</div>
				</div>
			</div>
				<!--end breadcrumb-->


            <div class=" border-0">
                <div class="card-header">
                    <h4 class="card-title">Subscriptions Add</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('subscription.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-body mx-4">
                                    <div class="col mb-3">
                                        <label for="billingPlan" class="form-label"><span class="text-danger">*</span> Billing Plan</label>
                                        <select id="billingPlan" name="billingPlan" class="form-select">
                                            <option selected>Choose...</option>
                                            <option>One</option>
                                        </select>
                                    </div>
                                    <div class="col mb-3">
                                        <label for="quantity" class="form-label"><span class="text-danger">*</span> Quantity</label>
                                        <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter Quantity">
                                    </div>
                                    <div class="col mb-3">
                                        <label for="date" class="form-label"><span class="text-secondary"><i class='bx bx-question-mark'></i></span> First Billing Date</label>
                                        <input type="date" class="form-control" id="date" name="date" placeholder="Enter First Billing Date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card-body mx-4">
                                    <div class="col mb-3">
                                        <label for="subname" class="form-label"><span class="text-danger">*</span> Subscription Name</label>
                                        <input type="text" class="form-control" id="subname" name="subname" placeholder="Enter Subscription Name">
                                    </div>
                                    <div class="col mb-3">
                                        <label for="description_in_item" class="form-label"><span class="text-danger">*</span> Description</label>
                                        <textarea type="text" class="form-control" id="description_in_item" name="description_in_item" style="height: 129px;" placeholder="Enter Description"></textarea>
                                        <p class="text-center text-secondary fs-7"> <i class='bx bx-wallet-alt'></i> Include description in invoice item</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-body mx-4">
                                    <div class="col mb-3">
                                        <label for="clientid" class="form-label"><span class="text-danger">*</span> Customer</label>
                                        <select id="clientid" name="clientid" class="form-select">
                                            <option value="1">1</option>
                                            @foreach ( $customers as $customer )
                                                <option value="{{ $customer->id }}">{{$customer->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>


                                    <div class="col mb-3">
                                        <label for="currency" class="form-label"> <span class="text-danger">*</span> Currency</label>
                                        <select id="currency" name="currency" class="form-select" readonly>
                                            <option selected>$USD</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="stripe_tax_id" class="form-label">Tax 1 (Stripe)</label>
                                                <select id="stripe_tax_id" name="stripe_tax_id" class="form-select">
                                                    <option selected>Choose...</option>
                                                    <option>One</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="stripe_tax_id_2" class="form-label"> Tax 2 (Stripe)</label>
                                                <select id="stripe_tax_id_2" name="stripe_tax_id_2" class="form-select">
                                                    <option selected>Choose...</option>
                                                    <option>One</option>
                                                    <option>Two</option>
                                                    <option>Three</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col mb-3">
                                        <label for="description" class="form-label"><span class="text-danger">*</span> Description</label>
                                        <textarea type="text" class="form-control" id="description" name="description" style="height: 129px;" placeholder="Enter customer terms & condition to be displayed to the customer before subscribe to the subscription"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3 mx-auto">
                                <button type="submit" class="btn btn-primary text-center"><i class='bx bxs-bell-ring'></i> Submit Subscription</button>
                            </div>
                        </div>
                    </form>

                </div>


            </div>







@endsection

@push('js')

@endpush
