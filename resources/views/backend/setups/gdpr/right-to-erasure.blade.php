@extends('backend.layouts.main')
@section('title', 'GERP General')
@section('content')
<div class="row">
    <div class="col-md-3 mb-3">
        @include('backend.setups.gdpr.sidebar')
    </div>
    <div class="col-md-9">
        <div class="card">
	    	<div class="card-header px-4 py-3">
	    		<h5 class="mb-0">Right to erasure <a href="">Learn More</a></h5>
	    	</div>
            <div class="card-body">
				<ul class="nav nav-pills mb-3" role="tablist">
					<li class="nav-item" role="presentation">
						<a class="nav-link active" data-bs-toggle="pill" href="#primary-pills-home" role="tab" aria-selected="true">
							<div class="d-flex align-items-center">
								<div class="tab-icon"><i class="bx bx-home font-18 me-1"></i>
								</div>
								<div class="tab-title">Config</div>
							</div>
						</a>
					</li>
					<li class="nav-item" role="presentation">
						<a class="nav-link" data-bs-toggle="pill" href="#primary-pills-profile" role="tab" aria-selected="false" tabindex="-1">
							<div class="d-flex align-items-center">
								<div class="tab-icon"><i class="bx bx-user-pin font-18 me-1"></i>
								</div>
								<div class="tab-title">Removal Request</div>
							</div>
						</a>
					</li>
				</ul>
				<div class="tab-content" id="pills-tabContent">

                    {{-- Config start  --}}
					<div class="tab-pane fade show active" id="primary-pills-home" role="tabpanel">
                        <form class="row g-3 needs-validation" novalidate="">
                            
                            <h5>Contacts</h5>
                            <hr>

                            <div class="col-md-12">
                                <label for="bsValidation2" class="form-label">Enable contact to request data removal</label>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="bsValidation6" name="radio-stacked" required="">
                                        <label class="form-check-label" for="bsValidation6">Yes</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="bsValidation7" name="radio-stacked" required="">
                                        <label class="form-check-label" for="bsValidation7">No</label>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="col-md-12">
                                <label for="bsValidation2" class="form-label">When deleting customer, delete also invoices and credit notes related to this customer.</label>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="bsValidation6" name="radio-stacked" required="">
                                        <label class="form-check-label" for="bsValidation6">Yes</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="bsValidation7" name="radio-stacked" required="">
                                        <label class="form-check-label" for="bsValidation7">No</label>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="col-md-12">
                                <label for="bsValidation2" class="form-label">When deleting customer, delete also estimates related to this customer.</label>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="bsValidation6" name="radio-stacked" required="">
                                        <label class="form-check-label" for="bsValidation6">Yes</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="bsValidation7" name="radio-stacked" required="">
                                        <label class="form-check-label" for="bsValidation7">No</label>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <h5>Leads</h5>
                            <hr>
                            <div class="col-md-12">
                                <label for="bsValidation2" class="form-label">Enable lead to request data removal (via public form)</label>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="bsValidation6" name="radio-stacked" required="">
                                        <label class="form-check-label" for="bsValidation6">Yes</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="bsValidation7" name="radio-stacked" required="">
                                        <label class="form-check-label" for="bsValidation7">No</label>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="col-md-12">
                                <label for="bsValidation2" class="form-label">After lead is converted to customer, delete all lead data</label>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="bsValidation6" name="radio-stacked" required="">
                                        <label class="form-check-label" for="bsValidation6">Yes</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="bsValidation7" name="radio-stacked" required="">
                                        <label class="form-check-label" for="bsValidation7">No</label>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="col-md-12">
                                <div class="d-md-flex d-grid align-items-center gap-3">
                                    <button type="submit" class="btn btn-primary px-4">Submit</button>
                                </div>
                            </div>
                        </form>					
                    </div>
                    {{-- Config end  --}}

                    {{-- Removal Request start  --}}
					<div class="tab-pane fade" id="primary-pills-profile" role="tabpanel">

                            <div class="card-body">

                                <div class="d-flex justify-content-between py-4">
                                    <div class="me-2 d-flex">
                                        <div class="d-flex justify-content-end me-2">
                                            {{-- {{$customers->links()}} --}}
                                        </div>
                                        <div class="dropdown me-2">
                                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Export</button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">Pdf</a>
                                                </li>
                                                <li><a class="dropdown-item" href="#">Excel</a></li>
                                            </ul>
                                        </div>
                                        <div>
                                            <a href="{{ route('setup.staff.index') }}" class="btn btn-outline-secondary me-2 mb-3">
                                                Reset
                                            </a>
                                        </div>
                                    </div>

                                    <div class="">
                                        <div class="d-flex">
                                            <div class="search-box">
                                                <form action="#" method="GET">
                                                    <div class="input-group">
                                                        <input type="search" name="keyword" id="search" class="form-control" placeholder="Search Customer..." value="{{ request('keyword') }}">
                                                        <button type="submit" class="btn btn-outline-secondary">
                                                            <i class="lni lni-search-alt"></i>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive mb-3">
                                    <table class="table table-hover mb-0 align-middle">
                                        <thead>
                                            <tr class="border">
                                                <th scope="col" class="border">Request ID</th>
                                                <th scope="col" class="border">Request Form</th>
                                                <th scope="col" class="border">Description</th>
                                                <th scope="col" class="border">Request Status</th>
                                                <th scope="col" class="border">Request Date</th>
                                                <th scope="col" class="border">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td><a href="">John Doe</a></td>
                                                <td>johndoe@example.com</td>
                                                <td>Admin</td>
                                                <td>123-456-7890</td>
                                                <td>
                                                    {{-- <a href="{{ route('setup.staff.show') }}"><span class="bx bx-show fs-5"></span></a> --}}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="d-flex justify-content-end">
                                    {{-- {{$customers->links()}} --}}
                                </div>
                            </div>

					</div>
                    {{-- Removal Request end  --}}
				</div>
			</div>
	    </div>
    </div>
</div>
@endsection