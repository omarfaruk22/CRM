<div id="detailBox">

    <div class="row">
        <div class="col-12 d-flex align-items-center justify-content-between my-3">
            <div class="leftsidebox">
                <h3>All Lead Info Before Make Customer</h3>
            </div>

            <div class="rightsidebox d-flex align-items-center">
                @if (!isset($customer_id))
                    <a wire:click="editCustomer({{ $id }})" title="Edit" data-bs-toggle="modal"
                        data-bs-target="#convertToCustomerModal" class="btn btn-danger text-white me-2">
                        <i class='bx bx-user-plus'></i> Convert to Customer
                    </a>
                @else
                    <a href="{{ route('customers.profile', ['id' => $customer_id]) }}"
                        class="btn btn-success text-white me-2">
                        <i class='bx bx-user-plus'></i> Go to Customer
                    </a>
                @endif

                <div class="btn btn-outline-secondary mx-2" id="leaddetail">
                    <i class='bx bx-edit-alt' style="margin: 1px;"></i>
                </div>
  
                <a type="submit" class="btn btn-outline-secondary mx-2" target="_blank"
                    href="{{ route('lead.pdf.index', $id ?? '') }}">
                    <i class='bx bx-printer' style="margin: 1px;"></i>
                </a>

                <div class="dropdown mx-2">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        More
                    </button>
                    <style>
                        .deletehovlead {
                            transition: font-weight 0.2s ease-in-out;
                        }

                        .deletehovlead:hover {
                            font-weight: 600;
                        }
                    </style>
                    <ul class="dropdown-menu text-center">
                        <li><button class="dropdown-item deletehovlead" type="button">Make Lost</button></li>
                        <li><button class="dropdown-item deletehovlead" type="button">Make as Junk</button></li>
                        <li><button onclick="return confirmDelete()" class="dropdown-item deletehovlead text-danger"
                                type="button" wire:click="deleteLead">Delete</button></li>
                    </ul>

                </div>
            </div>
        </div>
    </div>






    <div class="row">
        <div class="col-md-5">

            <div class="card">
                <h5 class="card-header">Lead Information</h5>
                <div class="card-body">

                    <p class="fs-6"><b>Name : </b> <span class="text-secondary">{{ $name }}</span></p>

                    <p><b>Position : </b> <span class="text-secondary">{{ $position }}</span></p>

                    <p><b>Email Address: </b>
                        <a href="mailto:{{ $email }}">
                            <span class="text-primary">{{ $email }}</span>
                        </a>
                    </p>


                    <p><b>Website : </b>
                        <a href="{{ $website }}">
                            <span class="text-primary">{{ $website }}</span>
                        </a>
                    </p>

                    <p><b>Phone: </b>
                        <a href="tel:{{ $phonenumber }}"><span class="text-primary">{{ $phonenumber }}</span>
                        </a>
                    </p>

                    <p class="fs-6"><b>Lead value : </b> <span class="text-danger">{{ $lead_value }} $ </span>
                    </p>
                    <p class="fs-6"> <b>Company : </b> <span class="text-secondary">{{ $company }}</span>
                    </p>
                    <p><b>Address : </b> <span class="text-secondary">{{ $address }}</span></p>
                    <p><b>City : </b> <span class="text-secondary">{{ $city }}</span></p>
                    <p><b>State : </b> <span class="text-secondary">{{ $state }}</span></p>
                    <p><b>Country : </b> <span class="text-secondary">{{ $country }}</span></p>
                    <p><b>Zip Code : </b> <span class="text-secondary">{{ $zip }}</span></p>
                    <p><b>Description : </b> <span class="text-secondary">{{ $description }}</span></p>

                </div>
            </div>


        </div>
        <div class="col-md-5">
            <div class="card">
                <h5 class="card-header">General Information</h5>
                <div class="card-body">

                    <p class="fs-6">
                        <b>Status : </b>
                        @if (!@empty($status))
                            @php $status = DB::table('leads_statuses')->find($status); @endphp
                            @if (isset($status))
                                <span class="badge bg-info">{{ $status->name }}</span>
                            @endif
                        @endif
                    </p>

                    <p class="fs-6">

                        <b>Source : </b>
                        @if (!@empty($source))
                            @php $source = DB::table('leads_sources')->find($source); @endphp
                            @if (isset($source))
                                <span class="badge bg-danger">{{ $source->name }}</span>
                            @endif
                        @endif
                    </p>

                    <p><b>Default Language : </b>
                        <span class="text-secondary">
                            @if (!@empty($language))
                                @php $language = DB::table('languages')->find($language); @endphp
                                @if (isset($language))
                                    {{ $language->name }}
                                @endif
                            @endif


                        </span>
                    </p>
                    <p><b>Assigned : </b> <span class="text-secondary">
                            @if (!@empty($assigned))
                                @php $staff = DB::table('staff')->find($assigned); @endphp
                                @if (isset($staff))
                                    {{ $staff->firstname . ' ' . $staff->lastname }}
                                @endif
                            @endif


                        </span>
                    </p>
                    <p><b>Tags : </b> <span class="text-secondary">Need to update</span></p>
                    <p><b>Created : </b> <span class="text-secondary">Need to update</span></p>
                    <p><b>Last Contact: </b> <span class="text-secondary">Need to update</span></p>
                    {{-- <p><b>Created: </b> <span class="text-secondary">{{ $timestamps }}</span></p> --}}
                    <p class="fs-6"><b>Public : </b>
                        @if ($is_public !== null)
                            @if ($is_public == 1)
                                <span class="bg-warning badge">Public</span>
                            @else
                                <span class="bg-success badge">Private</span>
                            @endif
                        @endif

                    </p>

                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col">
            <span><img src="" alt=""></span>
            <span>assigned to</span>
            <span>{{ $assigned }}</span>
        </div>
    </div>


</div>

{{-- @push('css')
    <!-- Include Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
@endpush --}}

<div id="editBox" style="display:none;">
    <form wire:submit.prevent="updateLead">
        <div class="headingsection">
            <div class="row">
                <div class="col-12 d-flex align-items-center justify-content-between my-3">
                    <div class="leftsidebox">
                        <h3>Edit Lead Before Make Customer</h3>
                    </div>

                    <div class="rightsidebox d-flex align-items-center">
                        <button type="submit" class="btn btn-primary text-white me-2">
                            Save Lead
                        </button>

                        <button class="btn btn-outline-secondary mx-2" id="editLead">
                            <i class='bx bx-edit-alt' style="margin: 1px;"></i>
                        </button>
                        <button class="btn btn-outline-secondary mx-2">
                            <i class='bx bx-printer' style="margin: 1px;"></i>
                        </button>
                        <div class="dropdown mx-2">
                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                More
                            </button>
                            <ul class="dropdown-menu">
                                <li><button class="dropdown-item" type="button">Make Lost</button></li>
                                <li><button class="dropdown-item" type="button">Make as Junk</button></li>
                                <li><button class="dropdown-item" type="button">Delete</button></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="formsection">
            <div class="row">

                <!-- Status -->
                <div class="col mb-3">
                    <label for="status" class="form-label">
                        <span class="text-danger">*</span> Status
                    </label>
                    <div class="input-group">
                        <select class="form-control @error('status') is-invalid @enderror" id="status"
                            wire:model="status" name="status" required>
                            <option> -- Select Status --</option>
                            @foreach ($statuses as $status)
                                <option value="{{ $status->id }}">{{ $status->name }}</option>
                            @endforeach
                        </select>

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
                            <option>-- Select Source --</option>
                            @foreach ($sources as $source)
                                <option value="{{ $source->id }}">{{ $source->name }}</option>
                            @endforeach
                        </select>

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
                        <option> -- Select Assigned --</option>
                        @foreach ($staffs as $staff)
                            <option value="{{ $staff->id }}">
                                {{ $staff->firstname . ' ' . $staff->lastname }}</option>
                        @endforeach
                    </select>
                    @error('assigned')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- Tags -->

            <div class="row mb-3">
                <div class="col-12">
                    <label for="tags" class="form-label">
                        <span class="text-danger">
                            <i class='bx bxs-purchase-tag-alt'></i>
                        </span>
                        Tags (multiple)
                    </label>
                    <div class="input-group">
                        <select class="form-control select2" id="tags" multiple wire:model="tagesAdd" required>
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





            <div class="row">

                <div class=" col mb-3">
                    <label for="name" class="form-label"> Name</label>
                    <input type="text" wire:model="name" name="name" id="name"
                        placeholder="Department name" class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Address-->
                <div class="col mb-3">
                    <label for="address" class="form-label"> Address</label>

                    <textarea class="form-control @error('address') is-invalid @enderror" name="address" placeholder = "address"
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
                        name="position" wire:model="position">
                    @error('position')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <!-- City Field -->
                <div class="mb-3 col">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control @error('city') is-invalid @enderror" name="city"
                        wire:model="city">
                    @error('city')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>


            <div class="row">
                <!-- Email Field -->
                <div class="mb-3 col">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        wire:model="email">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <!-- State Field -->
                <div class="mb-3 col">
                    <label for="state" class="form-label">State</label>
                    <input type="text" class="form-control @error('state') is-invalid @enderror" name="state"
                        wire:model="state">
                    @error('state')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>


            <div class="row">
                <!--  Website -->
                <div class="mb-3 col">
                    <label for="website" class="form-label">Website</label>
                    <input type="url" class="form-control @error('website') is-invalid @enderror" name="website"
                        wire:model="website">
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
                        name="phonenumber" wire:model="phonenumber">
                    @error('phonenumber')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <!-- Zip Code -->
                <div class="mb-3 col">
                    <label for="zip" class="form-label">Zip Code</label>
                    <input type="text" class="form-control @error('zip') is-invalid @enderror" name="zip"
                        wire:model="zip">
                    @error('zip')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- Lead Value & Default Language -->
            <div class="row">
                <div class="mb-3 col">
                    <label for="lead_value" class="form-label">Lead Value</label>
                    <input type="number" class="form-control @error('lead_value') is-invalid @enderror"
                        name="lead_value" wire:model="lead_value">
                    @error('lead_value')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>


                <div class="mb-3 col">
                    <label for="language" class="form-label">Default Language</label>
                    <select class="form-control @error('language') is-invalid @enderror" id="language"
                        name="language" wire:model="language" required>
                        <option value="">-- Select Language --</option>
                        @foreach ($languages as $language)
                            <option value="{{ $language->id }}">{{ $language->name }}</option>
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
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="company"
                        wire:model="company">
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
                        wire:model="description"></textarea>
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- Date Contacted -->
            <div class="row">
                <div class="mb-3 col">
                    <label for="dateadded" class="form-label">Date Contacted</label>
                    <input type="date" class="form-control @error('dateadded') is-invalid @enderror"
                        name="dateadded" wire:model="dateadded">
                    @error('dateadded')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="row my-4">
                <div class="col">
                    <label class="form-check-label ml-3">
                        <input type="checkbox" class="form-check-input" wire:model="is_public" value="1">
                        Public
                    </label>

                </div>
            </div>

            <button type="submit" class="btn btn-primary text-white me-2 float-end">
                Save Lead
            </button>

        </div>
    </form>
</div>
