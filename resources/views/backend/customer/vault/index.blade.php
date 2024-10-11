@extends('backend.layouts.main')
@section('title', 'Customer Details')
@section('content')
 <div class="modal fade" id="vault" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="d-flex">
                            <div class="">
                                <h6 class="modal-title">Vault Entry</h6>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form">
                            <form action="">
                                <div class="row">
                                        <div class="mb-3 col-md-12">
                                            <label class="form-label"> Server Address</label>
                                            <input type="text" class="form-control">
                                         </div>
                                         <div class="mb-3 col-md-12">
                                            <label class="form-label">Port</label>
                                            <input type="number" id="port" name="port" class="form-control" value="" aria-invalid="false">
                                         </div>
                                          <div class="mb-3 col-md-12">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" id="username" name="username" class="form-control" value="" >
                                         </div>
                                          <div class="mb-3 col-md-12">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" id="password" name="password" class="form-control" value="" >
                                         </div>
                                         <div class="mb-3 col-md-12">
                                            <label for="description" class="form-label">Short Description:</label>
                                            <textarea id="description" class="form-control" rows="4"></textarea>
                                         </div>
                                         <hr>
                                            <div class="mb-3 col-md-12">
                                             <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Visible to all staff member who have access to this customer
                                                </label>
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Visible only to administrators
                                                </label>
                                            </div>
                                             <div class="mb-3 col-md-12">
                                               <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                                                <label class="form-check-label" for="flexRadioDefault3">
                                                   Visible only to me (administrators are not excluded)
                                                </label>
                                            </div>

                                         <hr>
                                         <div class="mb-3 col-md-12">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked="">
                                           <label class="form-check-label" for="flexSwitchCheckChecked">Share this vault entry in projects with project members</label>
                                         </div>


                                </div>
                            </form>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
{{-- this is edit modal  --}}
 <div class="modal fade" id="editvault" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="d-flex">
                            <div class="">
                                <h6 class="modal-title">Vault Edit</h6>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form">
                            <form action="">
                                <div class="row">
                                        <div class="mb-3 col-md-12">
                                            <label class="form-label"> Server Address</label>
                                            <input type="text" class="form-control">
                                         </div>
                                         <div class="mb-3 col-md-12">
                                            <label class="form-label">Port</label>
                                            <input type="number" id="port" name="port" class="form-control" value="" aria-invalid="false">
                                         </div>
                                          <div class="mb-3 col-md-12">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" id="username" name="username" class="form-control" value="" >
                                         </div>
                                          <div class="mb-3 col-md-12">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" id="password" name="password" class="form-control" value="" >
                                         </div>
                                         <div class="mb-3 col-md-12">
                                            <label for="description" class="form-label">Short Description:</label>
                                            <textarea id="description" class="form-control" rows="4"></textarea>
                                         </div>
                                         <hr>
                                            <div class="mb-3 col-md-12">
                                             <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Visible to all staff member who have access to this customer
                                                </label>
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Visible only to administrators
                                                </label>
                                            </div>
                                             <div class="mb-3 col-md-12">
                                               <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                                                <label class="form-check-label" for="flexRadioDefault3">
                                                   Visible only to me (administrators are not excluded)
                                                </label>
                                            </div>

                                         <hr>
                                         <div class="mb-3 col-md-12">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked="">
                                           <label class="form-check-label" for="flexSwitchCheckChecked">Share this vault entry in projects with project members</label>
                                         </div>


                                </div>
                            </form>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- edit modal end --}}
        {{-- view password  --}}
        <div class="modal fade" id="viewpassword" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="d-flex">
                            <div class="">
                                <h6 class="modal-title">View Password</h6>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form">
                            <form action="">
                                <div class="row">
                                        <div class="mb-3 col-md-12">
                                            <label class="form-label">For security reasons please enter your password below</label>
                                            <input type="text" class="form-control">
                                         </div>
                                </div>
                            </form>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Confirm </button>
                    </div>
                </div>
            </div>
        </div>
        {{-- End view pasword  --}}

        <div class="row">
    <div class="col-md-3">
        <h4 class="mt-3 mb-3"># {{ $customer->id}} || {{ $customer->company}}</h4>
        @include('backend.partials.profile-sidebar')
    </div>
    <div class="col-md-9">
        <h4 class="mt-3 mb-3">Vault
        </h4>
        <div class="card">
            <div class="card-body">
                <div class="col mb-3">
					<a href="javascript:void(0)"  data-bs-toggle="modal" data-bs-target="#vault" class="btn btn-primary px-2"> + New Vault Entry</a>
				</div>
				<div class="col">
						<div class="card">
							<div class="card-body">
                                <div class="d-flex justify-content-between py-2">
                                    <div>
                                        <h5 class="card-title">Card title</h5>
                                    </div>
                                    <div>
                                        <a href="javascript:void(0)" class=" " data-bs-toggle="modal" data-bs-target="#editvault">
                                            <i class='bx bx-edit fs-4'></i>
                                        </a>
                                        <a href="javascript:void(0)" class=" ">
                                            <i class='bx bx-x fs-4 text-danger'></i>
                                        </a>
                                    </div>
                                </div>
                                <hr>
								<div class="d-flex justify-content-between py-2">

                                    <div class="">
                                        <p class="mb-1"><b>Server Address: </b>zfvzfv</p>
                                        <p class="mb-1"><b>Port:</b>123</p>
                                        <p class="mb-1"> <b>Username: </b>qwee</p>
                                        <p class="mb-1">
                                            <b>Password: </b><span class="vault-password-fake">•••••••••• </span><span class="vault-password-encrypted"></span> <a href="#" class="vault-view-password " data-bs-toggle="modal" data-bs-target="#viewpassword"><i class='bx bxs-lock-alt'></i></a>
                                        </p>
                                    </div>
                                    <div>
                                        <p><b>Short Description: </b><br>qwgdfhgjhj</p>
                                        <hr>
                                        <p class="text-muted"> This vault entry is created by Jamel Veum -<span class="text-has-action" data-toggle="tooltip" data-title="2024-03-26 23:19:10" data-original-title="" title="">35 minutes ago</span>
                                        </p>
                                        <p>
                                        </p>
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
