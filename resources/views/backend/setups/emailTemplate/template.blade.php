@extends('backend.layouts.main')
@section('title', 'Email Templates')
@section('content')

@push('css')
	{{-- Text editor  --}}
	<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
@endpush

<div class="row">
    <div class="col-md-6">
        <h4 class="tw-mt-0 tw-font-semibold tw-text-lg tw-text-neutral-700">New Ticket Opened (Opened by Staff, Sent to Customer)</h4>
	    <div class="card">
	    	<div class="card-body p-4">
	    		<form class="row g-3 needs-validation" novalidate="">

	    			<div class="col-md-12">
	    				<label for="template_title" class="form-label"><span class="text-danger">*</span> Template Title</label>
	    				<input type="text" class="form-control" id="template_title" placeholder="New Ticket Opened (Opened by Staff, Sent to Customer)" value="" disabled>
	    			</div>
                    
	    			<div class="col-md-12">
	    				<label for="subject" class="form-label">Subject</label>
	    				<input type="text" class="form-control" id="subject" placeholder="New Support Ticket Opened" value="">
	    			</div>

                    <div class="col-md-12">
	    				<label for="template_title" class="form-label"><span class="text-danger">*</span>  From Name</label>
	    				<input type="text" class="form-control" id="template_title" placeholder="{companyname} | CRM" value="">
	    			</div>

	    			<div class="col-md-12">
	    				<div class="form-check">
	    					<input class="form-check-input" type="checkbox" id="plaintext">
	    					<label class="form-check-label" for="plaintext">Send as Plaintext</label>
	    				</div>
	    			</div>

	    			<div class="col-md-12">
	    				<div class="form-check">
	    					<input class="form-check-input" type="checkbox" id="disabledt">
	    					<label class="form-check-label" for="disabledt">disabledt</label>
	    				</div>
	    			</div>
                    
                    <div>
                        <div class="accordion" id="accordionExample">

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">English</button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="col-md-12 mb-2">	
                                            <label class="form-label"><i class="fa fa-tag"></i>Description</label>								
                                            <textarea id="english" name="description"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Portuguese_br</button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">	
                                        <div class="col-md-12 mb-2">	
                                            <div class="col-md-12 mb-3">
                                                <label for="subject" class="form-label">Subject</label>
                                                <input type="text" class="form-control" id="subject" placeholder="New Support Ticket Opened" value="">
                                            </div>
                                            <label class="form-label"><i class="fa fa-tag"></i>Description</label>								
                                            <textarea id="portuguese_br" name="description"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Indonesia</button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">	
                                        <div class="col-md-12 mb-2">
                                            <div class="col-md-12 mb-3">
                                                <label for="subject" class="form-label">Subject</label>
                                                <input type="text" class="form-control" id="subject" placeholder="New Support Ticket Opened" value="">
                                            </div>	
                                            <label class="form-label"><i class="fa fa-tag"></i>Description</label>								
                                            <textarea id="indonesia" name="description"></textarea>
                                        </div>
                                    </div>
                                </div>
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
    <div class="col-md-6">
        <h4 class="tw-mt-0 tw-font-semibold tw-text-lg tw-text-neutral-700">Available merge fields</h4>
        <div class="card">
	    	<div class="card-body p-4">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-warning">
                                If ticket is imported with email piping and the contact does not exist in the CRM the fields won't be replaced.
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="bold">Client</h5>
                                    <p>Contact Firstname <a href="#"><span class="text-end">{contact_firstname}</span></a></p>
                                    <p>Contact Lastname <a href="#"><span class="text-end">{contact_lastname}</span></a></p>
                                    <p>Contact Phone Number <a href="#"><span class="text-end">{contact_phonenumber}</span></a></p>
                                    <p>Contact Title <a href="#"><span class="text-end">{contact_title}</span></a></p>
                                    <p>Contact Email <a href="#"><span class="text-end">{contact_email}</span></a></p>
                                    <p><a href="#"><span class="text-end"></span></a></p>
                                    <p>Client Company <a href="#"><span class="text-end">{client_company}</span></a></p>
                                    <p>Client Phone Number <a href="#"><span class="text-end">{client_phonenumber}</span></a></p>
                                    <p>Client Country <a href="#"><span class="text-end">{client_country}</span></a></p>
                                    <p>Client City <a href="#"><span class="text-end">{client_city}</span></a></p>
                                    <p>Client Zip <a href="#"><span class="text-end">{client_zip}</span></a></p>
                                    <p>Client State <a href="#"><span class="text-end">{client_state}</span></a></p>
                                    <p>Client Address <a href="#"><span class="text-end">{client_address}</span></a></p>
                                    <p>Client Vat Number <a href="#"><span class="text-end">{client_vat_number}</span></a></p>
                                    <p>Client ID <a href="#"><span class="text-end">{client_id}</span></a></p>
                                    <p>Client Website <a href="#"><span class="text-end">{client_website}</span></a></p>
                                </div>
                                <div class="col-md-6">
                                    <h5 class="bold">Ticket</h5>
                                    <p>Ticket ID <a href="#"><span class="text-end">{ticket_id}</span></a></p>
                                    <p>Ticket URL <a href="#"><span class="text-end">{ticket_url}</span></a></p>
                                    <p>Ticket Public URL <a href="#"><span class="text-end">{ticket_public_url}</span></a></p>
                                    <p>Department <a href="#"><span class="text-end">{ticket_department}</span></a></p>
                                    <p>Department Email <a href="#"><span class="text-end">{ticket_department_email}</span></a></p>
                                    <p>Date Opened <a href="#"><span class="text-end">{ticket_date}</span></a></p>
                                    <p>Ticket Subject <a href="#"><span class="text-end">{ticket_subject}</span></a></p>
                                    <p>Ticket Message <a href="#"><span class="text-end">{ticket_message}</span></a></p>
                                    <p>Ticket Status <a href="#"><span class="text-end">{ticket_status}</span></a></p>
                                    <p>Ticket Priority <a href="#"><span class="text-end">{ticket_priority}</span></a></p>
                                    <p>Ticket Service <a href="#"><span class="text-end">{ticket_service}</span></a></p>
                                    <p>Project name <a href="#"><span class="text-end">{project_name}</span></a></p>
                                </div>
                                <div class="col-md-6">
                                    <h5 class="bold">Other</h5>
                                    <p>Logo URL <a href="#"><span class="text-end">{logo_url}</span></a></p>
                                    <p>Logo image with URL <a href="#"><span class="text-end">{logo_image_with_url}</span></a></p>
                                    <p>Dark logo image with URL <a href="#"><span class="text-end">{dark_logo_image_with_url}</span></a></p>
                                    <p>CRM URL <a href="#"><span class="text-end">{crm_url}</span></a></p>
                                    <p>Admin URL <a href="#"><span class="text-end">{admin_url}</span></a></p>
                                    <p>Main Domain <a href="#"><span class="text-end">{main_domain}</span></a></p>
                                    <p>Company Name <a href="#"><span class="text-end">{companyname}</span></a></p>
                                    <p>Email Signature <a href="#"><span class="text-end">{email_signature}</span></a></p>
                                    <p>(GDPR) Terms &amp; Conditions URL <a href="#"><span class="text-end">{terms_and_conditions_url}</span></a></p>
                                    <p>(GDPR) Privacy Policy URL <a href="#"><span class="text-end">{privacy_policy_url}</span></a></p>
                                </div>
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
	{{-- text editor  --}}
	<script>
    	ClassicEditor
        .create(document.querySelector('#english'))
        .catch(error => {
            console.error(error);
        });
	</script>

    <script>
    	ClassicEditor
        .create(document.querySelector('#portuguese_br'))
        .catch(error => {
            console.error(error);
        });
	</script>

    <script>
    	ClassicEditor
        .create(document.querySelector('#indonesia'))
        .catch(error => {
            console.error(error);
        });
	</script>
@endpush