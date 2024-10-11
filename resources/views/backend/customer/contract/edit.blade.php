@extends('backend.layouts.main')
@section('title', 'Contract Edit')
@section('content')

@push('css')
    <link href="{{ asset('backend/assets/plugins/fancy-file-uploader/fancy_fileupload.css') }}" rel="stylesheet" />
    {{--template_content Text editor  --}}
	<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
@endpush

    <div class="col">
		<div class="modal fade" id="renew_contact" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Renew Contract</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
                        <div class="mb-3">
					    	<label for="start_date" class="form-label"><span style="color: red">*</span> Start Date</label>
					    	<input type="date" class="form-control" id="start_date" placeholder="Start Date" required="">
					    </div>
                        <div class="mb-3">
					    	<label for="end_date" class="form-label">End Date</label>
					    	<input type="date" class="form-control" id="end_date" placeholder="End Date" required="">
					    </div>
                        <div class="mb-3">
					    	<label for="contact_value" class="form-label">Contact Value</label>
					    	<input type="text" class="form-control" id="contact_value" placeholder="Contact Value" required="">
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


    <div class="col">
		<div class="modal fade" id="add_template" tabindex="-1" aria-hidden="true" style="display: none;">
			<div class="modal-dialog modal-xl">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Add Template</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
                        <div class="mb-3">
							<label for="template_title" class="form-label"><span style="color: red">*</span> Template Title</label>
							<input type="text" class="form-control" id="template_title" placeholder="Template Title">
						</div>
                        <div class="mb-3">	
                            <label for="template_content" class="form-label"></i>Template Content</label>								
                            <textarea id="template_content" name="template_content"></textarea>
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

	<div class="row">
		<div class="col-xl-5">
            <h5 class="mb-3">Contract Information</h5>
			<div class="card">
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
        <div class="col-xl-7 mt-3">
            <div class="row">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h5 class="mb-3">The moment Alice appeared, she was always ready to agree.</h5>
                    </div>
                    <div class="col-md-6">
                        <div class="row justify-content-end">
                            <div class="col-auto">
                                <a href="{{ route('customers.profile.contracts.show',1) }}">View Contact</a>
                            </div>
                            <div class="col-auto">
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class='bx bxs-file-pdf'></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="#">View PDF</a></li>
                                        <li><a class="dropdown-item" href="#">View PDF in New Tab</a></li>
                                        <li><a class="dropdown-item" href="#">Download</a></li>
                                        <li><a class="dropdown-item" href="#">Print</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-auto">
                                <a href="{{ route('customers.profile.contracts.edit.send_to_email',1) }}" type="button" class="btn btn-outline-primary">
                                    <i class="fadeIn animated bx bx-envelope"></i>
                                </a>
                            </div>
                            <div class="col-auto">
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                        More
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                        <li><a class="dropdown-item" href="{{ route('customers.profile.contracts.show',1) }}">View Contract</a></li>
                                        <li><a class="dropdown-item" href="#">Marked as signed</a></li>
                                        <li><a class="dropdown-item" href="#">Copy</a></li>
                                        <li><a class="dropdown-item" href="#">Delete</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-pills mb-3" role="tablist">

                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" data-bs-toggle="pill" href="#contract" role="tab" aria-selected="true">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-title">Contract</div>
                                        </div>
                                    </a>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="pill" href="#attachments" role="tab" aria-selected="false" tabindex="-1">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-title">Attachments</div>
                                        </div>
                                    </a>
                                </li>


                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="pill" href="#comments" role="tab" aria-selected="false" tabindex="-1">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-title">Comments</div>
                                        </div>
                                    </a>
                                </li>


                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="pill" href="#renewal_history" role="tab" aria-selected="false" tabindex="-1">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-title">Renewal History</div>
                                        </div>
                                    </a>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="pill" href="#tasks" role="tab" aria-selected="false" tabindex="-1">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-title">Tasks</div>
                                        </div>
                                    </a>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="pill" href="#notes" role="tab" aria-selected="false" tabindex="-1">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-title">Notes</div>
                                        </div>
                                    </a>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="pill" href="#templates" role="tab" aria-selected="false" tabindex="-1">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-title">Templates</div>
                                        </div>
                                    </a>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="pill" href="#email_tracking" role="tab" aria-selected="false" tabindex="-1">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-title"><i class="lni lni-envelope"></i></div>
                                        </div>
                                    </a>
                                </li>

                            </ul>
                            <div class="tab-content" id="pills-tabContent">

                                <div class="tab-pane fade active show" id="contract" role="tabpanel">
                                    VERY deeply with a whiting. Now you know.' 'Who is this?' She said it to be a LITTLE larger, sir, if you don't know one,' said Alice, a little pattering of footsteps in the sea. But they HAVE their tails fast in their mouths; and the words all coming different, and then the other, looking uneasily at the end of half an hour or so there were three gardeners at it, and found quite a commotion in the prisoner's handwriting?' asked another of the well, and noticed that they couldn't get them out of its right paw.
                                </div>

                                <div class="tab-pane fade" id="attachments" role="tabpanel">
                                    <div class="card">
                                        <div class="card-body">
                                            <input id="fancy-file-upload" type="file" name="files" accept=".jpg, .png, image/jpeg, image/png" multiple>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="comments" role="tabpanel">
                                    <textarea class="form-control mb-3" id="add_comment" placeholder="" rows="3" required=""></textarea>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary px-4">Add Comment</button>
                                    </div>
                                </div> 

                                <div class="tab-pane fade" id="renewal_history" role="tabpanel">
                                    <button type="button" class="btn btn-primary px-2" data-bs-toggle="modal" data-bs-target="#renew_contact">
                                        <i class="lni lni-reload mr-1"></i>Renew Contact
                                    </button>
                                </div>  

                                <div class="tab-pane fade" id="tasks" role="tabpanel">
                                    <div class="mb-3">
                                        <a href="{{ route('customers.profile.contracts.edit.new_task', 1) }}" type="button" class="btn btn-primary px-2">+ New Task</a>
                                    </div>
                                    <div class="">
                                        <div class="d-flex justify-content-between mb-4">
                                            <div class="me-2 d-flex">
                                                <div class="me-2">
                                                    <select class="form-select" wire:model.live="size" name="size">
                                                        <option value="5">5</option>
                                                        <option selected value="10">10</option>
                                                        <option value="25">25</option>
                                                        <option value="50">50</option>
                                                        <option value="100">100</option>
                                                    </select>
                                                </div>
                                                <div class="">
                                                    <button type="button" class="btn btn-outline-secondary">Export</button>
                                                </div>
                                            </div>
                                            <div class="">
                                                <div class="d-flex">
                                                    <div class="search-box">
                                                        <input type="text" wire:model.live="search" class="form-control" id="searchProductList" autocomplete="off" placeholder="Search Users...">
                                                        <i class="ri-search-line search-icon"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table mb-0 table-hover align-middle">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Name</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Start Date</th>
                                                        <th scope="col">Due Date</th>
                                                        <th scope="col">Assign To</th>
                                                        <th scope="col">Tags</th>
                                                        <th scope="col">Priority</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>   

                                <div class="tab-pane fade" id="notes" role="tabpanel">
                                    <textarea class="form-control mb-3" id="note" placeholder="Address ..." rows="3" required=""></textarea>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary px-4">Add Note</button>
                                    </div>
                                </div>  

                                <div class="tab-pane fade" id="templates" role="tabpanel">
                                    <button type="button" class="btn btn-primary px-2" data-bs-toggle="modal" data-bs-target="#add_template">
                                        </i>Add Template
                                    </button>
                                </div> 
                                
                                <div class="tab-pane fade" id="email_tracking" role="tabpanel">
                                    <div>No tracked emails sent</div>
                                </div>  

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
@endsection


@push('js')
	<script src="{{ asset('backend/assets/plugins/fancy-file-uploader/jquery.ui.widget.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/fancy-file-uploader/jquery.fileupload.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/fancy-file-uploader/jquery.iframe-transport.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/fancy-file-uploader/jquery.fancy-fileupload.js') }}"></script>
    <script>
		$('#fancy-file-upload').FancyFileUpload({
			params: {
				action: 'fileuploader'
			},
			maxfilesize: 1000000
		});
	</script>

    {{-- template_content text editor  --}}
	<script>
    	ClassicEditor
        .create(document.querySelector('#template_content'))
        .catch(error => {
            console.error(error);
        });
	</script>

    
    {{-- send_mail_des text editor  --}}
	<script>
    	ClassicEditor
        .create(document.querySelector('#send_mail_des'))
        .catch(error => {
            console.error(error);
        });
	</script>

@endpush









