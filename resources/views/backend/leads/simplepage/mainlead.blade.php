 <div id="fullboxoflead">
     <div class="row">
         <div class="col-12 d-flex align-items-center justify-content-between my-3">
             <div class="leftsidebox">
                 <h3>All Lead Info Before Make Customer</h3>
             </div>

             <div class="rightsidebox d-flex align-items-center">
                 <!-- Example buttons (replace with your logic) -->
                 {{-- <a href="#" class="btn btn-danger text-white me-2">
                     <i class='bx bx-user-plus'></i> Convert to Customer
                 </a> --}}

                 @if (!isset($customer))
                     <button type="button" class="btn btn-danger text-white me-2" id="sendLeadIdButton"
                         data-bs-toggle="modal" data-bs-target="#convertToCustomerModal">
                         <i class='bx bx-user-plus'></i> Convert to Customer
                     </button>
                 @else
                     <a href="{{ route('customers.profile', ['id' => $customer->id]) }}"
                         class="btn btn-success text-white me-2">
                         <i class='bx bx-user-plus'></i> Go to Customer
                     </a>
                 @endif

                 <button class="btn btn-outline-secondary mx-2" id="togglebtn">
                     <i class='bx bx-edit-alt' style="margin: 1px;"></i>
                 </button>

                 <a href="#" class="btn btn-outline-secondary mx-2" target="_blank">
                     <i class='bx bx-printer' style="margin: 1px;"></i>
                 </a>

                 {{-- <div class="dropdown mx-2">
                     <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                         aria-expanded="false">
                         More
                     </button>
                     <ul class="dropdown-menu text-center">
                         <li><button class="dropdown-item deletehovlead" type="button">Make Lost</button></li>
                         <li><button class="dropdown-item deletehovlead" type="button">Make as Junk</button></li>
                         <li><button class="dropdown-item deletehovlead text-danger" type="button">Delete</button></li>
                     </ul>
                 </div> --}}
             </div>
         </div>
     </div>
     <div id="leadinfobox">
         <div class="row">
             <div class="col-md-6">
                 <div class="card">
                     <h5 class="card-header">Lead Information</h5>
                     <div class="card-body">
                         <p class="fs-6"><b>Name : </b> <span class="text-secondary">{{ $lead->name ?? 'N/A' }}</span>
                         </p>
                         <p><b>Position : </b> <span class="text-secondary">{{ $lead->title ?? 'N/A' }}</span></p>
                         <p><b>Email Address: </b> <a href="mailto:{{ $lead->email ?? '' }}"><span
                                     class="text-primary">{{ $lead->email ?? 'N/A' }}</span></a></p>
                         <p><b>Website : </b> <a href="{{ $lead->website ?? '#' }}"><span
                                     class="text-primary">{{ $lead->website ?? 'N/A' }}</span></a></p>
                         <p><b>Phone: </b> <a href="tel:{{ $lead->phonenumber ?? '' }}"><span
                                     class="text-primary">{{ $lead->phonenumber ?? 'N/A' }}</span></a></p>
                         <p class="fs-6"><b>Lead value : </b> <span
                                 class="text-danger">${{ $lead->lead_value ?? '0' }}</span></p>
                         <p class="fs-6"> <b>Company : </b> <span
                                 class="text-secondary">{{ $lead->company ?? 'N/A' }}</span></p>
                         <p><b>Address : </b> <span class="text-secondary">{{ $lead->address ?? 'N/A' }}</span></p>
                         <p><b>City : </b> <span class="text-secondary">{{ $lead->city ?? 'N/A' }}</span></p>
                         <p><b>State : </b> <span class="text-secondary">{{ $lead->state ?? 'N/A' }}</span></p>


                         <p><b>Country : </b> <span class="text-secondary">
                                 @if (!@empty($lead->country))
                                     @php $country = DB::table('countries')->find($lead->country); @endphp
                                     @if (isset($country))
                                         <span class="badge bg-info">{{ $country->short_name }}</span>
                                     @endif
                                 @endif
                             </span></p>

                         <p><b>Zip Code : </b> <span class="text-secondary">{{ $lead->zip ?? 'N/A' }}</span></p>
                         <p><b>Description : </b> <span class="text-secondary">{{ $lead->description ?? 'N/A' }}</span>
                         </p>
                     </div>
                 </div>
             </div>
             <div class="col-md-6">
                 <div class="card">
                     <h5 class="card-header">General Information</h5>
                     <div class="card-body">


                         <p class="fs-6"><b>Status : </b>
                             <span class="badge bg-info">

                                 @if (!@empty($lead->status))
                                     @php $status = DB::table('leads_statuses')->find($lead->status); @endphp
                                     @if (isset($status))
                                         {{ $status->name }}
                                     @endif
                                 @endif
                             </span>
                         </p>



                         <p class="fs-6"><b>Source : </b> <span class="badge bg-danger">
                                 @if (!@empty($lead->source))
                                     @php $source = DB::table('leads_sources')->find($lead->source); @endphp
                                     @if (isset($source))
                                         {{ $source->name }}
                                     @endif
                                 @endif

                             </span></p>
                         <p><b>Default Language : </b>
                             <span class="text-secondary">
                                 @if (!@empty($lead->language))
                                     @php $language = DB::table('languages')->find($lead->language); @endphp
                                     @if (isset($language))
                                         {{ $language->name }}
                                     @endif
                                 @endif
                             </span>
                         </p>

                         <p><b>Assigned : </b>
                             <span class="text-secondary">
                                 @if (!@empty($lead->assigned))
                                     @php $assigned = DB::table('staff')->find($lead->assigned); @endphp
                                     @if (isset($assigned))
                                         {{ $assigned->firstname }}
                                         {{ $assigned->lastname }}
                                     @endif
                                 @endif
                             </span>
                         </p>
                         <p><b>Tags : </b>
                             @php
                                 // Retrieve the lead tag data from the database
                                 $leadTag = DB::table('tagtables')
                                     ->where('rel_type', 'lead')
                                     ->where('rel_id', $lead->id)
                                     ->value('tag_id');

                                 $tagIds = [];
                                 if ($leadTag) {
                                     // Convert the leadTag string to an array
                                     $tagIds = explode(',', $leadTag);
                                 }
                             @endphp

                             @foreach ($tagIds as $tagId)
                                 @if (!empty($tagId))
                                     @php
                                         $tagrs = DB::table('tags')->find($tagId);
                                     @endphp
                                     @if ($tagrs)
                                         <p class="badge rounded-pill bg-dark text-light border border-1 me-1 ">
                                             {{ htmlspecialchars($tagrs->tags) }}
                                         </p>
                                     @else
                                         <p class="badge rounded-pill bg-danger me-1">No
                                             Data</p>
                                     @endif
                                 @endif
                             @endforeach
                         </p>

                         <p><b>Created : </b> <span class="text-secondary">{{ $lead->created_at ?? 'N/A' }}</span></p>
                         <p><b>Last Contact: </b> <span class="text-secondary">{{ $lead->lastcontact ?? 'N/A' }}</span>
                         </p>
                         <p class="fs-6"><b>Public : </b> <span
                                 class="bg-warning badge">{{ $lead->is_public ? 'Public' : 'Private' }}</span></p>
                     </div>
                 </div>
             </div>
         </div>
         <div class="row">
             <div class="col">
                 <span>Assigned to: </span>
                 <span>John Smith</span>
             </div>
         </div>
     </div>


 </div>

 <div id="leadeditbox">
     <div class="row">
         <div class="col">
             <form action="{{ route('lead.update.main', $lead->id) }}" method="POST">
                 @csrf

                 <div class="formsection">
                     <div class="row">

                         <!-- Status -->
                         <div class="col mb-3">
                             <label for="status" class="form-label">
                                 <span class="text-danger">*</span> Status
                             </label>
                             <div class="input-group">
                                 <select class="form-control @error('status') is-invalid @enderror" id="status"
                                     name="status" required>
                                     <option value="">-- Select Status --</option>
                                     @foreach ($statuses as $status)
                                         <option value="{{ $status->id }}"
                                             {{ $lead->status == $status->id ? 'selected' : '' }}>
                                             {{ $status->name }}</option>
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
                                     name="source" required>
                                     <option value="">-- Select Source --</option>
                                     @foreach ($sources as $source)
                                         <option value="{{ $source->id }}"
                                             {{ $lead->source == $source->id ? 'selected' : '' }}>
                                             {{ $source->name }}</option>
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
                                 name="assigned" required>
                                 <option value="">-- Select Assigned --</option>
                                 @foreach ($staffs as $staff)
                                     <option value="{{ $staff->id }}"
                                         {{ $lead->assigned == $staff->id ? 'selected' : '' }}>
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
                                 <select class="form-control select2" id="tags" name="tagesIDs[]" multiple
                                     required>
                                     @foreach ($tagses as $tag)
                                         <option value="{{ $tag->id }}"
                                             {{ in_array($tag->id, $taggs) ? 'selected' : '' }}>
                                             {{ $tag->tags }}
                                         </option>
                                     @endforeach
                                 </select>

                                 <button class="btn btn-sm btn-outline-secondary" type="button"
                                     data-bs-toggle="modal" data-bs-target="#addTagsModal">
                                     +
                                 </button>
                             </div>
                         </div>
                     </div>

                     <div class="row">
                         <div class="col mb-3">
                             <label for="name" class="form-label">Name</label>
                             <input type="text" name="name" id="name" placeholder="Department name"
                                 class="form-control @error('name') is-invalid @enderror"
                                 value="{{ old('name', $lead->name) }}">
                             @error('name')
                                 <small class="text-danger">{{ $message }}</small>
                             @enderror
                         </div>

                         <div class="col mb-3">
                             <label for="address" class="form-label">Address</label>
                             <textarea class="form-control @error('address') is-invalid @enderror" name="address" placeholder="address">{{ old('address', $lead->address) }}</textarea>
                             @error('address')
                                 <small class="text-danger">{{ $message }}</small>
                             @enderror
                         </div>
                     </div>

                     <div class="row">
                         <div class="col mb-3">
                             <label for="position" class="form-label">Position</label>
                             <input type="text" class="form-control @error('position') is-invalid @enderror"
                                 name="position" value="{{ old('position', $lead->title) }}">
                             @error('position')
                                 <small class="text-danger">{{ $message }}</small>
                             @enderror
                         </div>
                         <div class="col mb-3">
                             <label for="city" class="form-label">City</label>
                             <input type="text" class="form-control @error('city') is-invalid @enderror"
                                 name="city" value="{{ old('city', $lead->city) }}">
                             @error('city')
                                 <small class="text-danger">{{ $message }}</small>
                             @enderror
                         </div>
                     </div>

                     <div class="row">
                         <div class="col mb-3">
                             <label for="email" class="form-label">Email Address</label>
                             <input type="email" class="form-control @error('email') is-invalid @enderror"
                                 name="email" value="{{ old('email', $lead->email) }}">
                             @error('email')
                                 <small class="text-danger">{{ $message }}</small>
                             @enderror
                         </div>
                         <div class="col mb-3">
                             <label for="state" class="form-label">State</label>
                             <input type="text" class="form-control @error('state') is-invalid @enderror"
                                 name="state" value="{{ old('state', $lead->state) }}">
                             @error('state')
                                 <small class="text-danger">{{ $message }}</small>
                             @enderror
                         </div>
                     </div>

                     <div class="row">
                         <div class="col mb-3">
                             <label for="website" class="form-label">Website</label>
                             <input type="url" class="form-control @error('website') is-invalid @enderror"
                                 name="website" value="{{ old('website', $lead->website) }}">
                             @error('website')
                                 <small class="text-danger">{{ $message }}</small>
                             @enderror
                         </div>
                         <div class="col mb-3">
                             <label for="country" class="form-label">Country</label>
                             <select class="form-control @error('country') is-invalid @enderror" id="country"
                                 name="country" required>
                                 <option value="">-- Select Country --</option>
                                 @foreach ($countries as $country)
                                     <option value="{{ $country->id }}"
                                         {{ $lead->country == $country->id ? 'selected' : '' }}>
                                         {{ $country->short_name }}</option>
                                 @endforeach
                             </select>
                             @error('country')
                                 <small class="text-danger">{{ $message }}</small>
                             @enderror
                         </div>
                     </div>

                     <div class="row">
                         <div class="col mb-3">
                             <label for="phonenumber" class="form-label">Phone</label>
                             <input type="tel" class="form-control @error('phonenumber') is-invalid @enderror"
                                 name="phonenumber" value="{{ old('phonenumber', $lead->phonenumber) }}">
                             @error('phonenumber')
                                 <small class="text-danger">{{ $message }}</small>
                             @enderror
                         </div>
                         <div class="col mb-3">
                             <label for="zip" class="form-label">Zip Code</label>
                             <input type="text" class="form-control @error('zip') is-invalid @enderror"
                                 name="zip" value="{{ old('zip', $lead->zip) }}">
                             @error('zip')
                                 <small class="text-danger">{{ $message }}</small>
                             @enderror
                         </div>
                     </div>

                     <div class="row">
                         <div class="col mb-3">
                             <label for="lead_value" class="form-label">Lead Value</label>
                             <input type="number" class="form-control @error('lead_value') is-invalid @enderror"
                                 name="lead_value" value="{{ old('lead_value', $lead->lead_value) }}">
                             @error('lead_value')
                                 <small class="text-danger">{{ $message }}</small>
                             @enderror
                         </div>
                         <div class="col mb-3">
                             <label for="language" class="form-label">Default Language</label>
                             <select class="form-control @error('language') is-invalid @enderror" id="language"
                                 name="language" required>
                                 <option value="">-- Select Language --</option>
                                 @foreach ($languages as $language)
                                     <option value="{{ $language->id }}"
                                         {{ $lead->language == $language->id ? 'selected' : '' }}>
                                         {{ $language->name }}</option>
                                 @endforeach
                             </select>
                             @error('language')
                                 <small class="text-danger">{{ $message }}</small>
                             @enderror
                         </div>
                     </div>

                     <div class="row">
                         <div class="col mb-3">
                             <label for="company" class="form-label">Company</label>
                             <input type="text" class="form-control @error('company') is-invalid @enderror"
                                 name="company" value="{{ old('company', $lead->company) }}">
                             @error('company')
                                 <small class="text-danger">{{ $message }}</small>
                             @enderror
                         </div>
                     </div>

                     <div class="row">
                         <div class="col mb-3">
                             <label for="description" class="form-label">Description</label>
                             <textarea class="form-control @error('description') is-invalid @enderror" name="description">{{ old('description', $lead->description) }}</textarea>
                             @error('description')
                                 <small class="text-danger">{{ $message }}</small>
                             @enderror
                         </div>
                     </div>

                     <div class="row">
                         <div class="col mb-3">
                             <label for="dateadded" class="form-label">Date Contacted</label>
                             <input type="date" class="form-control @error('dateadded') is-invalid @enderror"
                                 name="dateadded" value="{{ old('dateadded', $lead->dateadded) }}">
                             @error('dateadded')
                                 <small class="text-danger">{{ $message }}</small>
                             @enderror
                         </div>
                     </div>

                     <div class="row my-4">
                         <div class="col">
                             <label class="form-check-label ml-3">
                                 <input type="checkbox" class="form-check-input" name="is_public" value="1"
                                     {{ $lead->is_public ? 'checked' : '' }}>
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
     </div>
 </div>




 <!-- Modal -->
 <div class="modal fade" id="convertToCustomerModal" tabindex="-1" aria-labelledby="convertToCustomerModalLabel2"
     aria-hidden="true" data-bs-backdrop="static">
     <div class="modal-dialog" style="min-width: 50%">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="convertToCustomerModalLabel2">Convert TO Customer</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <form id="customerForm" action="{{ route('leadtocustomer.update') }}" method="POST">
                     @csrf
                     <!-- First Name -->
                     <input type="text" name="lead_id" value="{{ $lead->id }}" hidden>
                     @php
                         $names = explode(' ', $lead->name, 2);
                         $firstname = $names[0];
                         $lastname = isset($names[1]) ? $names[1] : '';
                     @endphp

                     <div class="mb-3">
                         <label for="first_name" class="form-label"><span class="text-danger"> * </span> First
                             Name</label>
                         <input type="text" class="form-control" id="firstname" name="firstname"
                             value="{{ $firstname }}" required>
                     </div>

                     <!-- Last Name -->
                     <div class="mb-3">
                         <label for="last_name" class="form-label"><span class="text-danger"> * </span> Last
                             Name</label>
                         <input type="text" class="form-control" id="lastname" name="lastname"
                             value="{{ $lastname }}" required>
                     </div>


                     <!-- Position -->
                     <div class="mb-3">
                         <label for="position" class="form-label">Position</label>
                         <input type="text" class="form-control" id="position" name="position"
                             value="{{ $lead->title }}">
                     </div>

                     <!-- Email -->
                     <div class="mb-3">
                         <label for="email" class="form-label"><span class="text-danger"> * </span> Email</label>
                         <input type="email" class="form-control" id="email" name="email" required
                             value="{{ $lead->email }}">
                     </div>

                     <!-- Company -->
                     <div class="mb-3">
                         <label for="company" class="form-label">Company</label>
                         <input type="text" class="form-control" id="company" name="company"
                             value="{{ $lead->company }}">
                     </div>

                     <!-- Phone -->
                     <div class="mb-3">
                         <label for="phonenumber" class="form-label">Phone</label>
                         <input type="tel" class="form-control" id="phonenumber" name="phonenumber"
                             value="{{ $lead->phonenumber }}">
                     </div>

                     <!-- Website -->
                     <div class="mb-3">
                         <label for="website" class="form-label">Website</label>
                         <input type="text" class="form-control" id="website" name="website"
                             value="{{ $lead->website }}">
                     </div>

                     <!-- Address -->
                     <div class="mb-3">
                         <label for="address" class="form-label">Address</label>
                         <textarea class="form-control" id="address" name="address">{{ $lead->address }}</textarea>
                     </div>

                     <!-- City -->
                     <div class="mb-3">
                         <label for="city" class="form-label">City</label>
                         <input type="text" class="form-control" id="city" name="city" readonly
                             value="{{ $lead->city }}">
                     </div>

                     <!-- State -->
                     <div class="mb-3">
                         <label for="state" class="form-label">State</label>
                         <input type="text" class="form-control" id="state" name="state" readonly
                             value="{{ $lead->state }}">
                     </div>

                     <!-- Country -->
                     <div class="mb-3 col">
                         <label for="country" class="form-label">Country</label>
                         <select class="form-control" id="country" name="country" required>
                             <option value="" disabled>-- Select Country --</option>
                             @foreach ($countries as $country)
                                 <option value="{{ $country->id }}"
                                     {{ $country->id == $lead->country ? 'selected' : '' }}>
                                     {{ $country->short_name }}
                                 </option>
                             @endforeach
                         </select>
                     </div>


                     <!-- ZIP -->
                     <div class="mb-3">
                         <label for="zip" class="form-label">ZIP</label>
                         <input type="text" class="form-control" id="zip" name="zip"
                             value="{{ $lead->zip }}">
                     </div>

                     <!-- Password -->
                     <div class="mb-3" id="passwordSection">
                         <label for="password" class="form-label"><span class="text-danger"> * </span>
                             Password</label>
                         <input type="password" class="form-control" id="password" name="password" required>
                     </div>

                     <!-- Send Set Password Email Checkbox -->
                     <div class="form-check mb-3">
                         <input type="checkbox" class="form-check-input" id="send_set_password_email"
                             name="send_set_password_email">
                         <label class="form-check-label" for="send_set_password_email">Send SET password email</label>
                     </div>

                     <!-- Do Not Send Welcome Email Checkbox -->
                     <div class="form-check mb-3">
                         <input type="checkbox" class="form-check-input" id="do_not_send_welcome_email"
                             name="do_not_send_welcome_email">
                         <label class="form-check-label" for="do_not_send_welcome_email">Do not send welcome
                             email</label>
                     </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-primary">Save Customer</button>
             </div>
             </form>
         </div>
     </div>
 </div>
