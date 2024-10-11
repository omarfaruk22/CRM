@extends('backend.layouts.main')
@section('title', 'GERP Consent')
@section('content')

@push('css')
	{{-- Text editor  --}}
	<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
@endpush


{{-- purpose of consent start  --}}
<div class="col">
	<div class="modal fade" id="consent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">New consent purpose</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
                    <div class="col-md-12 mb-3">
				    	<label for="name" class="form-label"><span class="text-danger">*</span> Name / Purpose</label>
				    	<input type="text" class="form-control" id="name" placeholder="Name" value="">
				    </div>
                    <div class="col-md-12 mb-3">
						<label for="description" class="form-label">Description</label>
						<textarea class="form-control" id="description" placeholder="Description ..." rows="3"></textarea>
					</div>
                </div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save</button>
				</div>
			</div>
		</div>
	</div>
</div>
{{-- purpose of consent end  --}}                            



<div class="row">
    <div class="col-md-3 mb-3">
        @include('backend.setups.gdpr.sidebar')
    </div>
    <div class="col-md-9">
        <div class="card">
	    	<div class="card-header px-4 py-3">
	    		<h5 class="mb-0">Consent <a href="">Learn More</a></h5>
	    	</div>
	    	<div class="card-body p-4">
	    		<form class="row g-3 needs-validation" novalidate="">

	    			<div class="col-md-12">
                        <label for="bsValidation2" class="form-label">Enable consent for contacts</label>
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
                        <label for="bsValidation2" class="form-label">Enable consent for leads</label>
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
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Public page consent information block</label>								
                        <textarea id="editor" name="description"></textarea>
	    			</div>

                    <hr>
                    <div class="row">

                        <div class="col-md-10">
                            <div class="d-flex align-items-center">
                                <a href="" class="btn btn-primary me-2 mb-3 btn-sm" data-bs-toggle="modal" data-bs-target="#consent"><i class="bx bx-plus"></i></a>
                                <h5 class="mb-0 pb-2">Purposes of consent</h5>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mb-4">
                            <div class="me-2 d-flex">
                                <div class="me-2">
                                    <select class="form-select" wire:model.live="size" name="size">
                                        <option value="5">5</option>
                                        <option selected="" value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
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
                                    <a href="" class="btn btn-outline-secondary me-2 mb-3">
                                        Reset
                                    </a>
                                </div>
                            </div>
                            <div class="">
                                <div class="d-flex">
                                    <div class="search-box">
                                        <input type="text" wire:model.live="search" class="form-control" id="searchProductList" autocomplete="off" placeholder="Search...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered align-middle" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>John Doe</td>
                                        <td>john@example.com</td>
                                        <td>Admin</td>
                                        <td>Active</td>
                                        <td>
                                            <a href="">
                                                <span class="bx bx-show fs-5"></span>
                                            </a>
                                            <a href="">
                                                <span class="bx bxs-edit fs-5"></span>
                                            </a>
                                            <a href="" onclick="return confirmDelete();">
                                                <span class="bx bx-trash text-danger fs-5"></span>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

	    			<div class="col-md-12">
	    				<div class="d-md-flex d-grid align-items-center gap-3">
	    					<button type="submit" class="btn btn-primary px-4">Submit</button>
	    				</div>
	    			</div>
	    		</form>
	    	</div>
	    </div>
    </div>
</div>
@endsection

@push('js')
	<script>
    	ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
	</script>
@endpush


