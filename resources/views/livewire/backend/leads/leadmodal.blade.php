<!-- Add new lead Modal -->


<div class="modal fade" id="changeStatusmodel" tabindex="-1" data-bs-backdrop="static" aria-labelledby="changeexamplemodal"
    aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered modal-lg" style="min-width: 70%!important;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="changeexamplemodal">Add new lead</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="closeModal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
                <form wire:submit="store">
                    <div class="row">
                        <!-- Status -->
                        <div class="col mb-3">
                            <label for="status" class="form-label">
                                <span class="text-danger">*</span> Status
                            </label>
                            <div class="input-group">
                                <select class="form-control @error('status') is-invalid @enderror" id="status"
                                    wire:model="status" name="status" required>
                                    <option value="">-- Select Status --</option>
                                    @foreach ($statuses as $status)
                                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                                    @endforeach
                                </select>
                                <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal"
                                    data-bs-target="#createStatusModal">
                                    +
                                </button>
                            </div>
                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Source -->
                        <div class="col mb-3">
                            <label for="source" class="form-label">
                                <span class="text-danger">*</span> Source
                            </label>
                            <div class="input-group">
                                <select class="form-control @error('source') is-invalid @enderror" id="source"
                                    name="source" wire:model="source" required>
                                    <option value="">-- Select Source --</option>
                                    @foreach ($sources as $source)
                                        <option value="{{ $source->id }}">{{ $source->name }}</option>
                                    @endforeach
                                </select>
                                <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal"
                                    data-bs-target="#createSourceModal">
                                    +
                                </button>
                            </div>
                            @error('source')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Assigned -->
                        <div class="mb-3 col">
                            <label for="assigned" class="form-label">Assigned</label>
                            <select class="form-control @error('assigned') is-invalid @enderror" id="assigned"
                                name="assigned" wire:model="assigned" required>
                                <option value="">-- Select Assigned --</option>
                                @foreach ($staffs as $staff)
                                    <option value="{{ $staff->id }}">{{ $staff->firstname . ' ' . $staff->lastname }}
                                    </option>
                                @endforeach
                            </select>
                            @error('assigned')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="tags" class="form-label">
                                <span class="text-danger">
                                    <i class='bx bxs-purchase-tag-alt'></i>
                                </span>
                                Tags (multiple)
                            </label>
                            <div class="input-group">
                                <select class="form-select" id="tagsselects" multiple wire:model="tagesAdd" required>
                                    <option value="">-- Select Tags --</option>
                                    @foreach ($tagsesr as $tagess)
                                        <option value="{{ $tagess->id }}">{{ $tagess->tags }}</option>
                                    @endforeach
                                </select>
                                <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="modal"
                                    data-bs-target="#addTagsModal">
                                    +
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Name -->
                    <div class="row">
                        <div class="col mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" wire:model="name" name="name" id="name"
                                placeholder="Contact name" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Address -->
                        <div class="col mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Address"
                                wire:model="address"></textarea>
                            @error('address')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <!-- Position Field -->
                        <div class="mb-3 col">
                            <label for="position" class="form-label">Position</label>
                            <input type="text" class="form-control @error('position') is-invalid @enderror"
                                name="position" wire:model="position" placeholder="Position">
                            @error('position')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <!-- City Field -->
                        <div class="mb-3 col">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control @error('city') is-invalid @enderror"
                                name="city" wire:model="city" placeholder="City">
                            @error('city')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <!-- Email Field -->
                        <div class="mb-3 col">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" wire:model="email" placeholder="Email Address">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <!-- State Field -->
                        <div class="mb-3 col">
                            <label for="state" class="form-label">State</label>
                            <input type="text" class="form-control @error('state') is-invalid @enderror"
                                name="state" wire:model="state" placeholder="State">
                            @error('state')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <!-- Website -->
                        <div class="mb-3 col">
                            <label for="website" class="form-label">Website</label>
                            <input type="url" class="form-control @error('website') is-invalid @enderror"
                                name="website" wire:model="website" placeholder="Website">
                            @error('website')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <!-- Country -->
                        <div class="mb-3 col">
                            <label for="country" class="form-label">Country</label>
                            <select class="form-control @error('country') is-invalid @enderror" id="country"
                                name="country" wire:model="country" required>
                                <option value="">-- Select Country --</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->short_name }}</option>
                                @endforeach
                            </select>
                            @error('country')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <!-- Phone -->
                        <div class="mb-3 col">
                            <label for="phonenumber" class="form-label">Phone</label>
                            <input type="tel" class="form-control @error('phonenumber') is-invalid @enderror"
                                name="phonenumber" wire:model="phonenumber" placeholder="Phone">
                            @error('phonenumber')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <!-- Zip Code -->
                        <div class="mb-3 col">
                            <label for="zip" class="form-label">Zip Code</label>
                            <input type="text" class="form-control @error('zip') is-invalid @enderror"
                                name="zip" wire:model="zip" placeholder="Zip Code">
                            @error('zip')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <!-- Lead Value & Default Language -->
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="lead_value" class="form-label">Lead Value</label>
                            <div class="input-group">
                                <input type="number" class="form-control @error('lead_value') is-invalid @enderror"
                                    name="lead_value" wire:model="lead_value" placeholder="Lead Value">
                                <div class="input-group-append">
                                    <span class="input-group-text">$</span>
                                </div>
                            </div>
                            @error('lead_value')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3 col">
                            <label for="language" class="form-label">Default Language</label>
                            <select class="form-control @error('language') is-invalid @enderror" id="language"
                                name="language" wire:model="language" required>
                                <option value="">-- Select Language --</option>
                                @foreach ($languages as $lang)
                                    <option value="{{ $lang->id }}">{{ $lang->name }}</option>
                                @endforeach
                            </select>
                            @error('language')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <!-- Company -->
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="company" class="form-label">Company</label>
                            <input type="text" class="form-control @error('company') is-invalid @enderror"
                                name="company" wire:model="company" placeholder="Company">
                            @error('company')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                                wire:model="description" placeholder="Description"></textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <!-- Date Contacted -->
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="dateadded" class="form-label" wire:model="name">Date Contacted</label>
                            <input type="date" class="form-control @error('dateadded') is-invalid @enderror"
                                name="dateadded" wire:model="dateadded" placeholder="Date Contacted">
                            @error('dateadded')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col">
                            <label class="form-check-label ml-3">
                                <input type="checkbox" class="form-check-input" wire:model="is_public"
                                    value="1"> Public
                            </label>
                            <label class="form-check-label mx-3">
                                <input type="checkbox" class="form-check-input" wire:model="contactedToday"
                                    value="1"> Contacted Today
                            </label>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>

    </div>
</div>


<!-- Update new lead Modal -->


<!-- Warning Modal -->
<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteLeadModal" tabindex="-1" aria-labelledby="lModalLabel" aria-hidden="true"
    wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered modal-lg " style="max-width: 400px!important;">
        <div class="modal-content ">
            <div class="modal-header mx-auto ">
                <h5 class="modal-title text-center text-danger" id="lModalLabel">Warning !</h5>

            </div>
            <div class="modal-body  text-white">

                <form wire:submit.prevent="deleteLead">
                    <h5 class="text-center ">Do you want to delete this Lead ?</h5>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-dark">Delete</button>
            </div>
            </form>
        </div>
    </div>
</div>


<!--BulkActionsModal Modal -->
<div class="modal fade" id="bulkActionsModal" tabindex="-1" aria-labelledby="bulkActionsModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bulkActionsModalLabel">Bulk Actions</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Modal content here -->
                <button type="button" class="btn btn-outline-secondary mt-3 me-2 merget">
                    <i class="fas fa-check"></i> Merge Tickets
                </button>
                <br>
                <button type="button" class="btn btn-outline-secondary mt-3 me-2 masst">
                    <i class="fas fa-check"></i> Mass Delete
                </button>




                <!-- Dropdowns and input field -->
                <div class="selectnone mt-3">
                    <div class="mb-3">
                        <label for="changeStatus" class="form-label">Change Status</label>
                        <select class="form-control" id="changeStatus" name="changeStatus">
                            <option value="open">Open</option>
                            <option value="inProgress">In progress</option>
                            <option value="alexandraMcLaughlin1">Alexandra Mclaughlin</option>
                            <option value="alexandraMcLaughlin2">Alexandra Mclaughlin</option>
                            <option value="answered">Answered</option>
                            <option value="onHold">On Hold</option>
                            <option value="closed">Closed</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="department" class="form-label">Department</label>
                        <select class="form-control" id="department" name="department">
                            <option value="Bernard Mcconnell">Bernard Mcconnell</option>
                            <option value="Aidan Schroeder">Aidan Schroeder</option>
                            <option value="Adele Woodward">Adele Woodward</option>
                        </select>

                    </div>
                    <div class="mb-3">
                        <label for="ticketPriority" class="form-label">Ticket Priority</label>
                        <select class="form-control" id="ticketPriority" name="ticketPriority">
                            <option value="Low">Low</option>
                            <option value="Medium">Medium</option>
                            <option value="High">High</option>
                        </select>

                    </div>
                    <div class="mb-3">
                        <label for="tags" class="form-label">Tags</label>
                        <select class="form-control" id="supporttag" name="supporttag">
                            <option value="Low">Low</option>
                            <option value="Medium">Medium</option>
                            <option value="High">High</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="service" class="form-label">Service</label>
                        <select class="form-control" id="supporttag" name="supporttag">
                            <option value="Low">Low</option>
                            <option value="Medium">Medium</option>
                            <option value="High">High</option>
                        </select>
                    </div>
                </div>
                <div class="selectMergeTickets mt-3">
                    <div class="mb-3">
                        <label for="changeStatus" class="form-label"> <span class="text-danger">*</span> Primary
                            Ticket</label>
                        <select class="form-control" id="changeStatus" name="changeStatus">
                            <!-- Options here -->
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="department" class="form-label"><span class="text-danger">*</span> Primary
                            Ticket Status</label>
                        <select class="form-control" id="department" name="department">
                            <!-- Options here -->
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Confirm</button>
            </div>
        </div>
    </div>
</div>


<!-- Create Status Modal -->


<!-- New Lead Status Modal start -->
<div class="modal fade" id="createStatusModal" wire:ignore.self tabindex="-1"
    aria-labelledby="createStatusModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" wire:submit="leadstatusstore">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Lead Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <div class="col-md-12 mb-3">
                        <label for="name" class="form-label"><span style="color:red">* </span> Status
                            Name</label>
                        <input type="text" wire:model="name" name="name"
                            class="form-control @error('name') is-invalid @enderror" id="name">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                        wire:click="closeModal">Close</button>
                    <button type="submit" class="btn btn-primary " data-bs-toggle="modal"
                        data-bs-target="#changeStatusmodel"> Save</button>
                </div>

            </form>
        </div>
    </div>
</div>


<!-- Create Source Modal -->




<div class="modal fade" id="createSourceModal" tabindex="-1" aria-labelledby="createSourceModalLabel"
    aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">

            <form wire:submit="leadsourcestore">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Lead Source</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <label for="name" class="form-label"><span style="color:red">*</span>Name</label>
                    <input type="text" wire:model="name" name="name"
                        class="form-control @error('name') is-invalid @enderror" id="name">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary " data-bs-toggle="modal"
                        data-bs-target="#changeStatusmodel"> Save</button>
                </div>

            </form>
        </div>
    </div>
</div>
<!-- New Source Modal end-->
<!--Add Tag  Modal -->
<div class="modal fade" id="addTagsModal" wire:ignore.self tabindex="-1" aria-labelledby="createtagModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" wire:submit="tagstore">

                <div class="modal-header">
                    <h5 class="modal-title" id="createtagModalLabel">Add Tags</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        data-bs-toggle="modal" data-bs-target="#changeStatusmodel"></button>
                </div>

                <div class="modal-body">

                    <div class="col-md-12 mb-3">
                        <label for="tags" class="form-label"><span style="color:red">* </span>
                            Tag</label>
                        <input type="text" wire:model="tags" name="tags"
                            class="form-control @error('tags') is-invalid @enderror" id="tags">
                        @error('tags')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                </div>

                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary " data-bs-toggle="modal"
                        data-bs-target="#changeStatusmodel"> Save</button>
                </div>

            </form>
        </div>
    </div>
</div>
