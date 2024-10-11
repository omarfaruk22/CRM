@extends('backend.layouts.main')
@section('title', 'GERP Right of Access')
@section('content')

@push('css')
	{{-- Text editor  --}}
	<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
@endpush

<div class="row">
    <div class="col-md-3 mb-3">
        @include('backend.setups.gdpr.sidebar')
    </div>
    <div class="col-md-9">
        <div class="card">
	    	<div class="card-header px-4 py-3">
	    		<h5 class="mb-0">Right of access/Right to rectification <a href="">Learn More</a></h5>
	    	</div>
	    	<div class="card-body p-4">
	    		<form class="row g-3 needs-validation" novalidate="">
                    <h5>Contacts</h5>
                    <hr>
                    <p>
                        The customers area gives your customers access to login and view their personal information. Also the customers area provide with access to update their personal information like first name, last name, email address, phone etc...
                        <br>
                        <br>
                        Below you can find additional options you may want to allow the contacts to modify.
                    </p>
                    <hr>
	    			<div class="col-md-12">
                        <p>Profile/Contact</p>
                        <label for="bsValidation2" class="form-label">Allow primary contact to view/edit billing & shipping details</label>
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
                        <p>Updating billing and shipping details from customers area won't affect already created invoices, estimates, credit notes.</p>
	    			</div>

                    <hr>
	    			<div class="col-md-12">
                        <label for="bsValidation2" class="form-label">Allow contacts to delete own files uploaded from customers area</label>
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
                        <label for="bsValidation2" class="form-label"> Enable public form for leads</label>
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
                        <label for="bsValidation2" class="form-label"> Show lead custom fields on public form</label>
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
                        <label for="bsValidation2" class="form-label"> Show lead attachments on public form and allow attachments to removed by the lead</label>
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
	{{-- text editor  --}}
	<script>
    	ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
	</script>
@endpush