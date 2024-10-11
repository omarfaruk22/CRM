@extends('backend.layouts.main')
@section('title', 'Project Details')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
@endpush
@section('content')

    <div class="row">
        
        <h4 class="form-label">Filter by</h4>
        <div class="col-md-4 mb-3 align-items-center">
            <select id="filter" name="filter" class="form-select" multiple="multiple">
                <option value="option1">Option 1</option>
                <option value="option2">Option 2</option>
                <option value="option3">Option 3</option>
            </select>
            <label for="" class="mb-0 mx-2">No Tasks Found</label>
        </div>

        <div class="col-md-4 mb-3">
            <div class="d-flex align-items-center">
                <select name="project_member" class="form-select flex-grow-1 me-2" id="project_member">
                    <option>Select Project Member</option>
                    <option>One</option>
                    <option>Two</option>
                    <option>Three</option>
                    <option>Four</option>
                    <option>Five</option>
                </select>
                <button type="submit" class="btn btn-primary">Apply</button>
            </div>
            <label for="" class="mb-0 mx-2"></label>
        </div>
        <div class="col-md-4"></div>
    </div>
@endsection


@push('js')
	<!-- Include Select2 JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#filter').select2({
				placeholder: 'Select an option',
				width: '100%'
			});
		});
	</script>
@endpush