@extends('backend.layouts.main')
@section('title', 'Create Invoice')
@push('css')
    <link href="{{ asset('backend/assets/plugins/input-tags/css/tagsinput.css') }}" rel="stylesheet" />
@endpush
@push('css')
	{{-- Text editor  --}}
	<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
@endpush
@section('content')

<h4>Ticket Information</h4>

<div class="row">
	<div class="col-xl-12 mx-auto">
		<div class="card">
			<div class="card-body p-4">
				<form action="{{ route('customers.profile.ticket.store') }}" method="POST">
                     @csrf
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <div class="col-md-12 mb-2">
                                <label for="ticket_subject" class="form-label">Subject</label>
                                <input name="ticket_subject" class="form-control" type="text" placeholder="">
                            </div>

                            <div class="col-md-12 mb-2">
                                <label for="ticket_contact" class="form-label">Contact</label>
                                <input name="ticket_contact" class="form-control" type="text" placeholder="">
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="ticket_name" class="form-label">Name</label>
                                    <div class="input-group mb-3">
                                          <input name="ticket_name" class="form-control" type="text" placeholder="">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-2">
                                    <label for="ticket_email" class="form-label">Email address</label>
                                    <div class="input-group mb-3">
                                        <input name="ticket_email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="ticket_department" class="form-label">Department</label>
                                    <div class="input-group mb-3">
                                           <input name="ticket_department" class="form-control" >
                                    </div>
                                </div>

                                <div class="col-md-6 mb-2">
                                    <label for="ticket_cc" class="form-label">CC</label>
                                    <div class="input-group mb-3">
                                        <input name="ticket_cc" class="form-control" type="text" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
							<div class="mb-3">
								<label for="ticket_tag" class="form-label"><i class="fa fa-tag"></i>Tags</label>
                                 <input name="ticket_tag" class="form-control" type="text" placeholder="">
								{{-- <select name="tag" multiple data-role="tagsinput">
									<option value="Amsterdam">Amsterdam</option>
									<option value="Washington">Washington</option>
									<option value="Sydney">Sydney</option>
									<option value="Beijing">Beijing</option>
									<option value="Cairo">Cairo</option>
								</select> --}}
							</div>
                            <div class="row ">
                                <div class="col">
                                    <label for="ticket_assignticket" class="form-label">Assign ticket (default is current user)</label>
                                           <input name="ticket_assignticket" class="form-control" type="text" placeholder="">
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="ticket_priority" class="form-label">Priority</label>
                                    <div class="input-group mb-3">
                                         <input name="ticket_priority" class="form-control" type="text" placeholder="">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-2">
                                    <label for="ticket_service" class="form-label">Service</label>
                                    <div class="input-group mb-3">
                                        <input name="ticket_service" class="form-control" type="text" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                            <div class="col-md-12 tw-mt-3">
                                <h4 class="tw-mt-0 tw-font-semibold tw-text-base tw-text-neutral-700">
                                    Ticket Body
                                </h4>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="ticket_predefined" class="form-label"></label>
                                    <div class="input-group mb-3">
                                            <input name="ticket_predefined" class="form-control" type="text" placeholder="Insert predefined Reply">
                                    </div>
                                </div>

                                <div class="col-md-6 mb-2">
                                    <label for="ticket_knowledge" class="form-label"></label>
                                    <div class="input-group mb-3">
                                        <input name="ticket_knowledge" class="form-control" type="text" placeholder="Insert knowledge base link">
                                    </div>
                                </div>
                            </div>
                                 <div class="col-md-12 mb-2">	
	                                    <label for="ticket_description" class="form-label"><i class="fa fa-tag"></i>Description</label>								
	                                    <textarea id="editor" name="description"></textarea>
                                </div>
                              {{-- <div class="attachments_area">
                                    <div class="row attachments">
                                        <div class="attachment">
                                            <div class="col-md-4 col-md-offset-8 mtop10">
                                                <div class="form-group">
                                                    <label for="attachment"
                                                        class="control-label">Attachments</label>
                                                    <div class="input-group">
                                                        <input type="file"
                                                            extension="jpg,png,pdf,doc,zip,rar"
                                                            filesize="209715200"
                                                            class="form-control" name="attachments[0]"
                                                            accept=".jpg,.png,.pdf,.doc,.zip,.rar,image/jpeg,image/png,application/pdf,application/msword,application/x-zip,application/x-rar">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-default add_more_attachments"
                                                                data-max="4"
                                                                type="button"><i class="fa fa-plus"></i></button>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                    <hr>
                             <div class="col-12">
                                <button class="btn btn-primary float-end" type="submit">Submit form</button>
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

@push('js')
    <script src="{{ asset('backend/assets/plugins/input-tags/js/tagsinput.js') }}"></script>
@endpush