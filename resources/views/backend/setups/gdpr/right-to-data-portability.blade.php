@extends('backend.layouts.main')
@section('title', 'GERP General')
@section('content')

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
@endpush


<div class="row">
    <div class="col-md-3 mb-3">
        @include('backend.setups.gdpr.sidebar')
    </div>
    <div class="col-md-9">
        <div class="card">
	    	<div class="card-header px-4 py-3">
	    		<h5 class="mb-0">Right to data portability <a href="">Learn More</a></h5>
	    	</div>
	    	<div class="card-body p-4">
	    		<form class="row g-3 needs-validation" novalidate="">

                    <h5>Contacts</h5>
                    <hr>
	    			<div class="col-md-12">
                        <label for="bsValidation2" class="form-label">Enable contact to export data (JSON)</label>
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

	    			<div class="col-md-6 mb-3">
	    				<label for="bsValidation2" class="form-label">Enable contact to export data (JSON)</label>
                        <select id="contacts" class="form-select" multiple="multiple">
                            <option value="option1">Option 1</option>
                            <option value="option2">Option 2</option>
                            <option value="option3">Option 3</option>
                        </select>
	    			</div>

                    <hr>
                    <h5>Leads</h5>
                    <hr>
	    			<div class="col-md-12">
                        <label for="bsValidation2" class="form-label">Enable contact to export data (JSON)</label>
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

	    			<div class="col-md-6 mb-3">
	    				<label for="bsValidation2" class="form-label">Enable contact to export data (JSON)</label>
                        <select id="leads" class="form-select" multiple="multiple">
                            <option value="option1">Option 1</option>
                            <option value="option2">Option 2</option>
                            <option value="option3">Option 3</option>
                        </select>
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
	<!-- Include Select2 JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#contacts').select2({
				placeholder: 'Select an option',
				width: '100%'
			});
		});
	</script>

    <script>
		$(document).ready(function() {
			$('#leads').select2({
				placeholder: 'Select an option',
				width: '100%'
			});
		});
	</script>
@endpush