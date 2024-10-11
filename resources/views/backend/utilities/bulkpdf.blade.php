@extends('backend.layouts.main')
@section('title', 'Project Details')
@section('content')


				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Bulk PDF</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Make your pdf</li>
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

            
            <!--end breadcrumb-->
            <div class="row">
                <div class="col-xl-6 mx-auto">
                    <div class="card">
                        <div class="card-header px-4 py-3">
                            <h5 class="mb-0">Bulk PDF Export                            </h5>
                        </div>
                        <div class="card-body p-4">
                            <form class="row g-3 needs-validation" novalidate>
                               
                                <div class="col-md-12">
                                    <label for="bsValidation8" class="form-label">Form Date</label>
                                    <input type="date" class="form-control" id="bsValidation8" placeholder="Date of Birth" required>
                                    <div class="invalid-feedback">
                                        Please select date.
                                    </div>
                                </div>
                                <div class="col-md-12 py-3">
                                    <label for="bsValidation9" class="form-label">Select Type</label>
                                    <select id="bsValidation9" class="form-select" required>
                                        <option selected disabled value>...</option>
                                        <option>One</option>
                                        <option>Two</option>
                                        <option>Three</option>
                                    </select>
                                    <div class="col-md-12 py-3">
                                        <label for="bsValidation8" class="form-label">To Date</label>
                                        <input type="date" class="form-control" id="bsValidation8" placeholder="Date of Birth" required>
                                        <div class="invalid-feedback">

                                        </div>
                                    </div>

                                    <div class="col-md-12 py-3">
                                        <label for="bsValidation8" class="form-label">Include Tag</label>
                                        <input type="date" class="form-control" id="bsValidation8" placeholder="Date of Birth" required>
                                        <div class="invalid-feedback">

                                        </div>
                                    </div>
                                    
                                <div class="col-md-12">
                                    <div class="d-md-flex d-grid align-items-center gap-3">
                                        <button type="submit" class="btn btn-primary px-4">Submit</button>
                                        <button type="reset" class="btn btn-light px-4">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->



@endsection

@push('js')


<script>
   
    {{-- Tooltips start  --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });

            tooltipTriggerList.forEach(function (tooltipTriggerEl) {
                tooltipTriggerEl.addEventListener('click', function () {
                    var tooltip = bootstrap.Tooltip.getInstance(tooltipTriggerEl);
                    tooltip.dispose();
                });
            });
        });
    </script>

    <script>
    function toggleDiv() {
        var div = document.getElementById('toggleDiv');
        if (div.style.display === 'none') {
        div.style.display = 'block';
        } else {
        div.style.display = 'none';
        }
    }
    </script>
    {{-- Tooltips end  --}}

@endpush
