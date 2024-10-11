@extends('backend.layouts.main')
@section('title', 'Customer Details')
@section('content')

@push('css')
    <link href="{{ asset('backend/assets/plugins/input-tags/css/tagsinput.css') }}" rel="stylesheet" />
	{{-- Multiple select  --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
	{{-- Text editor  --}}
	<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
@endpush


<div class="modal fade" id="customerGroup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Customer Group</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="name" class="form-label"><span style="color: red">*</span>Name</label>
                <input type="text" name="name" class="form-control" id="name">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="adminAssign" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Assign Admin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="name" class="form-label"><span style="color: red">*</span>Name</label>
                <input type="text" name="name" class="form-control" id="name">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<div class="row">
			<div class="col-md-12">
				<h4 class="mt-3 mb-3">Add new project</h4>
				<div class="card">
					<div class="card-body">
						<ul class="nav nav-pills mb-3" role="tablist">
							<li class="nav-item" role="presentation">
								<a class="nav-link active" data-bs-toggle="pill" href="#project-details" role="tab" aria-selected="true">
									<div class="d-flex align-items-center">
										<div class="tab-title">Project</div>
									</div>
								</a>
							</li>
							<li class="nav-item" role="presentation">
								<a class="nav-link" data-bs-toggle="pill" href="#billing-shipping" role="tab" aria-selected="false" tabindex="-1">
									<div class="d-flex align-items-center">
										<div class="tab-title">Project Settings</div>
									</div>
								</a>
							</li>
						</ul>
						<div class="tab-content" id="pills-tabContent">
							<div class="tab-pane fade active show" id="project-details" role="tabpanel">
								<form class="row g-3 needs-validation" novalidate>

									<div class="col-md-12 mb-2">
										<label for="company" class="form-label"><span style="color: red">*</span> Project Name</label>
										<input type="text" name="company" class="form-control" id="company" placeholder="Company" value="">
									</div>

									<div class="col-md-12 mb-2">
										<label for="customer" class="form-label"><span style="color: red">*</span> Customer</label>
										<select name="customer" class="form-select" id="customer">
											<option>Select Customer</option>
											<option>One</option>
											<option>Two</option>
											<option>Three</option>
											<option>Four</option>
											<option>Five</option>
										</select>
									</div>

									<div class="col-md-12 mb-2">
										<div class="form-check form-check-success">
											<input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedSuccess" checked="">
											<label class="form-check-label" for="flexCheckCheckedSuccess">
												Calculate progress through tasks
											</label> 
										</div>
									</div>

									<div class="col-md-12 mb-2">
										<label for="progress" class="form-label">Progress 25%</label>
										<div class="progress">
											<div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
										</div>
									</div>

									<div class="col-md-6 mb-2">
										<label for="billing_type" class="form-label"><span style="color: red">*</span> Billing Type</label>
										<select name="billing_type" class="form-select" id="billing_type">
											<option>Choose...........</option>
											<option>One</option>
											<option>Two</option>
											<option>Three</option>
											<option>Four</option>
											<option>Five</option>
										</select>
									</div>

									<div class="col-md-6 mb-2">
										<label for="status" class="form-label">Status</label>
										<select name="status" class="form-select" id="status">
											<option>Choose...........</option>
											<option>One</option>
											<option>Two</option>
											<option>Three</option>
											<option>Four</option>
											<option>Five</option>
										</select>
									</div>

									<div class="col-md-12 mb-2">
										<label for="rate_per_hour" class="form-label">Rate Per Hour</label>
										<input type="text" name="rate_per_hour" class="form-control" id="rate_per_hour" placeholder="Rate Per Hour" value="">
									</div>

									<div class="col-md-6 mb-2">
										<label for="estimated_hours" class="form-label">Estimated Hours</label>
										<select name="estimated_hours" class="form-select" id="estimated_hours">
											<option>Choose...........</option>
											<option>One</option>
											<option>Two</option>
											<option>Three</option>
											<option>Four</option>
											<option>Five</option>
										</select>
									</div>

									<div class="col-md-6 mb-2">
										<label for="members" class="form-label">Members</label>
										<select name="members" class="form-select" id="members">
											<option>Choose...........</option>
											<option>One</option>
											<option>Two</option>
											<option>Three</option>
											<option>Four</option>
											<option>Five</option>
										</select>
									</div>

									<div class="col-md-6 mb-3">
										<label for="start_date" class="form-label"><span style="color: red">*</span> Start Date</label>
										<input type="date" class="form-control" id="start_date" placeholder="">
									</div>

									<div class="col-md-6 mb-3">
										<label for="deadline" class="form-label">Deadline</label>
										<input type="date" class="form-control" id="deadline" placeholder="">
									</div>

									<div class="col-md-12 mb-3">
										<label for="tags" class="form-label">Tags</label><br>
										<select id="tags" name="tags" class="form-select" multiple="multiple">
											<option value="option1">Option 1</option>
											<option value="option2">Option 2</option>
											<option value="option3">Option 3</option>
										</select>
									</div>

									<div class="col-md-12 mb-2">	
										<label class="form-label"><i class="fa fa-tag"></i>Description</label>								
										<textarea id="editor" name="description"></textarea>
									</div>

									<div class="col-md-12 mb-2">
										<div class="form-check form-check-secondary">
											<input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedSuccess" checked="">
											<label class="form-check-label" for="flexCheckCheckedSuccess">
												Send project created email
											</label> 
										</div>
									</div>
									<div class="col-md-12 text-end">
										<button type="submit" class="btn btn-primary px-2">Save</button>
									</div>
								</form>
							</div>
							<div class="tab-pane fade" id="billing-shipping" role="tabpanel">
								<div class="row">
									<div class="col-md-12 mb-3">
										<label for="billing_type" class="form-label"><span style="color: red">*</span> Send contacts notifications</label>
										<select name="billing_type" class="form-select" id="billing_type">
											<option>Choose...........</option>
											<option>One</option>
											<option>Two</option>
											<option>Three</option>
											<option>Four</option>
											<option>Five</option>
										</select>
									</div>

									<div class="col-md-12 mb-3">
										<label for="visible_tabs" class="form-label">Visible Tabs</label><br>
										<select id="visible_tabs" name="visible_tabs" class="form-select" multiple="multiple">
											<option value="option1">Option 1</option>
											<option value="option2">Option 2</option>
											<option value="option3">Option 3</option>
										</select>
									</div>

									<div>
										<ul class="list-group list-group-flush">
											<li class="list-group-item" style="padding-left: 0"></li>
											<li class="list-group-item" style="padding-left: 0">
												<div class="form-check">
													<input class="form-check-input" type="checkbox" id="1">
													<label class="form-check-label" for="1">Allow customer to view tasks</label>
												</div>
											</li>
											<li class="list-group-item" style="padding-left: 0">
												<div class="form-check">
													<input class="form-check-input" type="checkbox" id="2">
													<label class="form-check-label" for="2">Allow customer to create tasks</label>
												</div>
											</li>
											<li class="list-group-item" style="padding-left: 0">
												<div class="form-check">
													<input class="form-check-input" type="checkbox" id="3">
													<label class="form-check-label" for="3">Allow customer to edit tasks (only tasks created from contact)</label>
												</div>
											</li>
											<li class="list-group-item" style="padding-left: 0">
												<div class="form-check">
													<input class="form-check-input" type="checkbox" id="4">
													<label class="form-check-label" for="4">Allow customer to comment on project tasks</label>
												</div>
											</li>
											<li class="list-group-item" style="padding-left: 0">
												<div class="form-check">
													<input class="form-check-input" type="checkbox" id="5">
													<label class="form-check-label" for="5">Allow customer to view task comments</label>
												</div>
											</li>
											<li class="list-group-item" style="padding-left: 0">
												<div class="form-check">
													<input class="form-check-input" type="checkbox" id="6">
													<label class="form-check-label" for="6">Allow customer to view task attachments</label>
												</div>
											</li>
											<li class="list-group-item" style="padding-left: 0">
												<div class="form-check">
													<input class="form-check-input" type="checkbox" id="7">
													<label class="form-check-label" for="7">Allow customer to view task checklist items</label>
												</div>
											</li>
											<li class="list-group-item" style="padding-left: 0">
												<div class="form-check">
													<input class="form-check-input" type="checkbox" id="8">
													<label class="form-check-label" for="8">Allow customer to upload attachments on tasks</label>
												</div>
											</li>
											<li class="list-group-item" style="padding-left: 0">
												<div class="form-check">
													<input class="form-check-input" type="checkbox" id="9">
													<label class="form-check-label" for="9">Allow customer to view task total logged time</label>
												</div>
											</li>
											<li class="list-group-item" style="padding-left: 0">
												<div class="form-check">
													<input class="form-check-input" type="checkbox" id="10">
													<label class="form-check-label" for="10">Allow customer to view finance overview</label>
												</div>
											</li>
											<li class="list-group-item" style="padding-left: 0">
												<div class="form-check">
													<input class="form-check-input" type="checkbox" id="11">
													<label class="form-check-label" for="11">Allow customer to upload files</label>
												</div>
											</li>
											<li class="list-group-item" style="padding-left: 0">
												<div class="form-check">
													<input class="form-check-input" type="checkbox" id="12">
													<label class="form-check-label" for="12">Allow customer to open discussions</label>
												</div>
											</li>
											<li class="list-group-item" style="padding-left: 0">
												<div class="form-check">
													<input class="form-check-input" type="checkbox" id="13">
													<label class="form-check-label" for="13">Allow customer to view milestones</label>
												</div>
											</li>
											<li class="list-group-item" style="padding-left: 0">
												<div class="form-check">
													<input class="form-check-input" type="checkbox" id="14">
													<label class="form-check-label" for="14">Allow customer to view Gantt</label>
												</div>
											</li>
											<li class="list-group-item" style="padding-left: 0">
												<div class="form-check">
													<input class="form-check-input" type="checkbox" id="15">
													<label class="form-check-label" for="15">Allow customer to view timesheets</label>
												</div>
											</li>
											<li class="list-group-item" style="padding-left: 0">
												<div class="form-check">
													<input class="form-check-input" type="checkbox" id="16">
													<label class="form-check-label" for="16">Allow customer to view activity log</label>
												</div>
											</li>
											<li class="list-group-item" style="padding-left: 0">
												<div class="form-check">
													<input class="form-check-input" type="checkbox" id="17">
													<label class="form-check-label" for="17">Allow customer to view team members</label>
												</div>
											</li>
											<li class="list-group-item" style="padding-left: 0">
												<div class="form-check">
													<input class="form-check-input" type="checkbox" id="18">
													<label class="form-check-label" for="18">Hide project tasks on main tasks table (admin area)</label>
												</div>
											</li>
											<li class="list-group-item"></li>
										</ul>
									</div>
								</div>
								<div class="col-md-12 text-end">
									<button type="submit" class="btn btn-primary px-2">Save</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-2"></div>
</div>

@endsection

@push('js')
    <script src="{{ asset('backend/assets/plugins/input-tags/js/tagsinput.js') }}"></script>

	<!-- Include Select2 JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#visible_tabs').select2({
				placeholder: 'Select an option',
				width: '100%'
			});
		});

		$(document).ready(function() {
			$('#tags').select2({
				placeholder: 'Select an option',
				width: '100%'
			});
		});
	</script>

	{{-- text editor  --}}
	<script>
    	ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
	</script>

@endpush










