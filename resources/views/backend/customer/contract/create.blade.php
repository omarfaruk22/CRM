@extends('backend.layouts.main')
@section('title', 'Customer Details')
@section('content')
	<div class="row">
		<div class="col-xl-6">
            <h5 class="mb-0">Contract Information</h5>
			<div class="card mt-3">
				<div class="card-body p-4">
					<form class="row g-3 needs-validation" novalidate>

                        <div class="col-md-12 d-flex">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="1">
                                <label class="form-check-label" for="1">Trash</label>
                            </div>&nbsp;&nbsp;
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="2">
                                <label class="form-check-label" for="2">Hide from customer</label>
                            </div>
                        </div>

                        <div class="col-md-12">
							<label for="customer" class="form-label"><span style="color: red">*</span> Customer</label>
							<select id="customer" name="customer" class="form-select" >
								<option selected disabled value>...</option>
								<option>One</option>
								<option>Two</option>
								<option>Three</option>
							</select>
						</div>

						<div class="col-md-12">
							<label for="subject" class="form-label"><span style="color: red">*</span> Subject</label>
							<input type="text" class="form-control" id="subject" placeholder="Subject" value="">
						</div>

                        <div class="col-md-12">
							<label for="contact_value" class="form-label">Contact Value</label>
							<input type="number" class="form-control" id="contact_value" value="">
						</div>

                        <div class="col-md-12">
							<label for="contact_type" class="form-label">Contact Type</label>
							<select id="contact_type" name="contact_type" class="form-select" >
								<option selected disabled value>...</option>
								<option>One</option>
								<option>Two</option>
								<option>Three</option>
							</select>
						</div>

                        
						<div class="col-md-6">
							<label for="start_date" class="form-label">Start Date</label>
							<input type="date" name="start_date" class="form-control" id="start_date">
						</div>

						<div class="col-md-6">
							<label for="end_date" class="form-label">End Date</label>
							<input type="date" name="end_date" class="form-control" id="end_date">
						</div>

						<div class="col-md-12">
							<label for="description" class="form-label">Description</label>
							<textarea class="form-control" id="description" placeholder="Description ..." rows="5"></textarea>
						</div>

						<div class="col-md-12">
							<div class="d-md-flex d-grid align-items-center gap-3">
								<button type="submit" class="btn btn-primary px-4">Save</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection












