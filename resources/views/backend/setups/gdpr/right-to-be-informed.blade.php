@extends('backend.layouts.main')
@section('title', 'GERP General')
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
	    		<h5 class="mb-0">Right to be informed <a href="">Learn More</a></h5>
	    	</div>
	    	<div class="card-body p-4">
	    		<form class="row g-3 needs-validation" novalidate="">

	    			<div class="col-md-12">
                        <label for="bsValidation2" class="form-label">Enable Terms & Conditions for registration and customers portal</label>
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
                        <label for="bsValidation2" class="form-label">Enable Terms & Conditions for web to lead forms</label>
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
                        <label for="bsValidation2" class="form-label">Enable Terms & Conditions for ticket form</label>
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
                        <label for="bsValidation2" class="form-label">Show Terms & Conditions in customers area footer</label>
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
                        <label for="bsValidation2" class="form-label">Enable Terms & Conditions for estimate request forms</label>
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
                        <label class="form-label"><a href="{{ route('setup.gdpr.right_to_be_informed.terms_and_Conditions') }}">Terms & Conditions</a></label>								
                        <textarea id="terms_and_conditions" name="description"></textarea>
	    			</div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label"><a href="{{ route('setup.gdpr.right_to_be_informed.privacy_policy') }}">Privacy Policy</a></label>								
                        <textarea id="privacy_policy" name="description"></textarea>
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
        .create(document.querySelector('#terms_and_conditions'))
        .catch(error => {
            console.error(error);
        });
	</script>

    <script>
    	ClassicEditor
        .create(document.querySelector('#privacy_policy'))
        .catch(error => {
            console.error(error);
        });
	</script>
@endpush