@extends('backend.layouts.main')
@section('title', 'Web to lead')
@section('content')

@push('css')

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">

    <style>
        .list-group-item:hover {
            background-color: #f0f0f0;
            cursor: pointer; 
        }
        .list-group-item.active {
            background-color: #007bff; 
            color: #fff; 
        }
        .list-group-item.active:hover {
            background-color: #007bff;
        }
    </style>


    {{-- By clicking a button, add text area start --}}
    <style>
        /* Style for textarea container */
        .textarea-container {
            position: relative;
            width: 100%;
        }

        /* Style for textarea */
        .editor {
            width: 100%;
        }

        /* Style for buttons */
        .textarea-buttons {
            position: absolute;
            top: 0;
            right: 0;
        }

        /* Style for textarea container */
        .textarea-container {
            position: relative;
            width: 100%;
        }

        /* Style for textarea */
        .editor {
            width: 100%;
        }

        /* Style for buttons container */
        .textarea-buttons {
            position: absolute;
            top: 0;
            right: 0;
        }

        /* Style for pagination-like buttons */
        .btn-pagination {
            border-radius: 0 !important;
            margin-right: 5px;
        }
    </style>
    {{-- By clicking a button, add text area end --}}

@endpush


    <div class="row">
        <div class="col-md-12">

            {{-- Buttons start  --}}
            <div class="mb-3">
                <ul class="nav nav-pills" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" data-bs-toggle="pill" href="#formBilder" role="tab"
                            aria-selected="true">
                            <div class="d-flex align-items-center">
                                <div class="tab-title">Form Builder</div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="pill" href="#informationSetups" role="tab"
                            aria-selected="false">
                            <div class="d-flex align-items-center">
                                <div class="tab-title">Form Information & Setups</div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="pill" href="#integrationCode" role="tab"
                            aria-selected="false">
                            <div class="d-flex align-items-center">
                                <div class="tab-title">Integration Code</div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            {{-- Button End  --}}

            <div class="card">
                <div class="card-body">

                        <div class="tab-content" id="pills-tabContent">

                            <!-- Form Builder start -->
                            <div class="tab-pane fade show active" id="formBilder" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-3 py-3">
                                        <ul class="list-group">
                                            <li class="list-group-item btn-secondary btn-block" data-text="Header">
                                                <i class="fadeIn animated bx bx-heading"></i> Header
                                            </li>
                                            <li class="list-group-item btn-secondary btn-block" data-text="Paragraph">
                                                <i class="fadeIn animated bx bx-paragraph"></i> Paragraph
                                            </li>
                                            <li class="list-group-item btn-secondary btn-block" data-text="File Upload">
                                                <i class="fadeIn animated bx bx-upload"></i> File Upload
                                            </li>
                                            <li class="list-group-item btn-secondary btn-block" data-text="Name">
                                               Name
                                            </li>
                                            <li class="list-group-item btn-secondary btn-block" data-text="Position">
                                                Position
                                            </li>
                                            <li class="list-group-item btn-secondary btn-block" data-text="Email Address">
                                                Email Address
                                            </li>
                                            <li class="list-group-item btn-secondary btn-block" data-text="Phone">
                                                Phone 
                                            </li>
                                            <li class="list-group-item btn-secondary btn-block" data-text="Lead Value">
                                                Lead Value
                                            </li>
                                            <li class="list-group-item btn-secondary btn-block" data-text="Company">
                                                Company
                                            </li>
                                            <li class="list-group-item btn-secondary btn-block" data-text="Address">
                                                Address
                                            </li>
                                            <li class="list-group-item btn-secondary btn-block" data-text="City">
                                                City
                                            </li>
                                            <li class="list-group-item btn-secondary btn-block" data-text="State">
                                                State
                                            </li>
                                            <li class="list-group-item btn-secondary btn-block" data-text="Country">
                                                Country 
                                            </li>
                                            <li class="list-group-item btn-secondary btn-block" data-text="Zip Code">
                                                Zip Code 
                                            </li>
                                            <li class="list-group-item btn-secondary btn-block" data-text="Description">
                                                Description 
                                            </li>
                                            <li class="list-group-item btn-secondary btn-block" data-text="Website">
                                                Website
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-9">
                                        <div id="textFieldArea" class="mt-3">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Form Builder end  -->


                            <!-- Form Information & Setups start  -->
                            <div class="tab-pane fade" id="informationSetups" role="tabpanel">
                                <div class="row">
                                    <div class="row">
                                        <div class="col-md-10 m-auto">
                                            <div class="card-body">

                                                <!-- buttons start -->
                                                <ul class="nav nav-pills mb-4" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <a class="nav-link active text-decoration-none" data-bs-toggle="pill" href="#general" role="tab" aria-selected="true">
                                                            <div class="d-flex align-items-center">
                                                                <div class="tab-title">General</div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <a class="nav-link text-decoration-none" data-bs-toggle="pill" href="#branding" role="tab" aria-selected="false">
                                                            <div class="d-flex align-items-center">
                                                                <div class="tab-title">Branding</div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <a class="nav-link text-decoration-none" data-bs-toggle="pill" href="#submission" role="tab" aria-selected="false">
                                                            <div class="d-flex align-items-center">
                                                                <div class="tab-title">Submission</div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <a class="nav-link text-decoration-none" data-bs-toggle="pill" href="#notifications" role="tab" aria-selected="false">
                                                            <div class="d-flex align-items-center">
                                                                <div class="tab-title">Notifications</div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <!-- buttons end -->

                                                <form action="{{ route('setup.leads.webtolead.update', $webToLeads->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')

                                                    <div class="tab-content" id="pills-tabContent">
                                                        <!-- General start -->
                                                        <div class="tab-pane fade show active" id="general" role="tabpane1">

                                                            <div class="col-md-12 mb-3">
                                                                <label for="name" class="form-label"><span style="color: red">*</span> Form Name</label>
                                                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Form name" value="{{ $webToLeads->name }}">
                                                                @error('name')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>

                                                            <div class="col-md-12 mb-3">
                                                                <label for="language" class="form-label"><span style="color: red">*</span> Language</label>
                                                                <select name="language" class="form-select @error('language') is-invalid @enderror" id="language">
                                                                    <option value="">Select...</option>
                                                                    @if ($languages->isNotEmpty())
                                                                        @foreach ($languages as $language)
                                                                            <option value="{{ $language->id }}" {{ $webToLeads->language ==  $language->id ? 'selected': ''}}>{{ $language->name }}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                                @error('language')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror <br>
                                                                <span>For validation messages</span>
                                                            </div>

                                                            <div class="col-md-12 mb-3">
                                                                <label for="lead_name_prefix" class="form-label">Lead title prefix</label>
                                                                <input type="text" name="lead_name_prefix" class="form-control" id="lead_name_prefix" placeholder="Lead title prefix" value="{{ $webToLeads->lead_name_prefix }}">
                                                                <p>For each newly created lead via the form, the lead name will be prefixed with the text added in the field for easier recognition.</p>
                                                            </div>

                                                            <div class="col-md-12 mb-3">
                                                                <label for="lead_source" class="form-label"><span style="color: red">*</span>Source</label>
                                                                <div class="input-group">
                                                                    <select name="lead_source" class="form-select @error('lead_source') is-invalid @enderror" id="lead_source">
                                                                        <option value="">Select...</option>
                                                                        @if ($sources->isNotEmpty())
                                                                            @foreach ($sources as $source)
                                                                                <option value="{{ $source->id }}" {{ $webToLeads->lead_source ==  $source->id ? 'selected': ''}}>{{ $source->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                                @error('lead_source')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                            
                                                            <div class="col-md-12 mb-3">
                                                                <label for="lead_status" class="form-label"><span style="color: red">*</span>Status</label>
                                                                <div class="input-group">
                                                                    <select name="lead_status" class="form-select @error('lead_status') is-invalid @enderror" id="lead_status">
                                                                        <option value="">Select...</option>
                                                                        @if ($statuses->isNotEmpty())
                                                                            @foreach ($statuses as $status)
                                                                                <option value="{{ $status->id }}" {{ $webToLeads->lead_status ==  $status->id ? 'selected': ''}}>{{ $status->name }}</option>
                                                                            @endforeach
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                                @error('lead_status')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>

                                                            <div class="col-md-12 mb-3">
                                                                <label for="responsible" class="form-label"><span style="color: red">*</span> Responsible (Assignee)</label>
                                                                <select name="responsible" id="responsible" class="form-select @error('responsible') is-invalid @enderror">
                                                                    <option value="">Select...</option>
                                                                    @if ($staffs->isNotEmpty())
                                                                        @foreach ($staffs as $staff)
                                                                            <option value="{{ $staff->id }}" {{ $webToLeads->responsible ==  $staff->id ? 'selected': ''}}>{{ $staff->firstname }} {{ $staff->lastname }}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                                @error('responsible')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                            <div class="d-flex justify-content-end">
                                                                <button type="submit" class="btn btn-primary px-4">Submit</button>
                                                            </div>
                                                        </div>
                                                        <!-- General end  -->


                                                        
                                                        <!-- Branding start  -->
                                                        <div class="tab-pane fade show" id="branding" role="tabpane2">

                                                            <div class="col-md-12 mb-3">
                                                                <label for="submit_btn_name" class="form-label"><span class="text-danger">*</span> Submit button name</label>
                                                                <input  type="text" name="submit_btn_name" value="{{ $webToLeads->submit_btn_name }}" class="form-control mb-2 @error('submit_btn_name') is-invalid @enderror" id="submit_btn_name">
                                                                @error('submit_btn_name')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-6 mb-3">
                                                                    <label for="submit_btn_bg_color" class="form-label"><span class="text-danger">*</span> Submit button background color</label>
                                                                    <input name="submit_btn_bg_color" value="{{ $webToLeads->submit_btn_bg_color }}" type="text" id="submit_btn_bg_color" class="jscolor form-control mb-2 @error('submit_btn_bg_color') is-invalid @enderror" >
                                                                    @error('submit_btn_bg_color')
                                                                        <small class="text-danger">{{ $message }}</small>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <label for="submit_btn_text_color" class="form-label"><span class="text-danger">*</span> Submit button background text</label>
                                                                    <input name="submit_btn_text_color" value="{{ $webToLeads->submit_btn_text_color }}" id="submit_btn_text_color" type="text" class="jscolor form-control mb-2 @error('submit_btn_text_color') is-invalid @enderror">
                                                                    @error('submit_btn_text_color')
                                                                        <small class="text-danger">{{ $message }}</small>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="d-flex justify-content-end">
                                                                <button type="submit" class="btn btn-primary px-4">Submit</button>
                                                            </div>
                                                        </div>
                                                        <!-- Branding End  -->
                                                        


                                                        <!-- Submission start  -->
                                                        <div class="tab-pane fade" id="submission" role="tabpane3">
                                                            <p>What should happen after a visitor submits this form?</p>
                                                            <div class="form-check">
                                                                <input class="form-check-input" name="submit_action" type="checkbox" value="0" id="displayMessage" {{ $webToLeads->submit_action == 0 ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="displayMessage">Display thank you message</label>
                                                            </div>
                                                            
                                                            <div class="form-check mb-3">
                                                                <input class="form-check-input" name="submit_action" type="checkbox" value="1" id="redirectUrl" {{ $webToLeads->submit_action == 1 ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="redirectUrl">Redirect to another website</label>
                                                            </div>
                                                            <!-- Block for Display thank you message message start -->
                                                            <div class="mb-3" id="thankYouMessage" style="display: none;">
                                                                <div class="form-group mb-3">
                                                                    <label for="success_submit_msg" class="form-check-label"><span class="text-danger">*</span> Message to show after form is successfully submitted</label>
                                                                    <textarea name="success_submit_msg" class="form-control @error('success_submit_msg') is-invalid @enderror" id="success_submit_msg" rows="3">{{ $webToLeads->success_submit_msg }}</textarea>
                                                                    @error('success_submit_msg')
                                                                        <small class="text-danger">{{ $message }}</small>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <!-- Block for Display thank you message message end -->

                                                            <!-- Website URL start -->
                                                            <div class="mb-3" id="websiteUrl" style="display: none;">
                                                                <div class="form-group">
                                                                    <label class="form-check-label" for="submit_redirect_url"><span class="text-danger">*</span> Website URL</label>
                                                                    <input name="submit_redirect_url" value="{{ $webToLeads->submit_redirect_url }}" class="form-control @error('submit_redirect_url') is-invalid @enderror" id="submit_redirect_url"></input>
                                                                    @error('submit_redirect_url')
                                                                        <small class="text-danger">{{ $message }}</small>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <!-- Website URL end -->

                                                            {{-- common for both "Display thank you message" and "Redirect to another website" start  --}}
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="1" name="mark_public" id="mark_public" {{ $webToLeads->mark_public == 1 ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="mark_public">Auto mark as public</label>
                                                            </div>

                                                            <div class="form-check mb-3">
                                                                <input class="form-check-input" name="allow_duplicate" type="checkbox" value="1" id="allow_duplicate" {{ $webToLeads->allow_duplicate == 1 ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="allow_duplicate"> Allow duplicate lead to be inserted into database?</label>
                                                            </div>

                                                            <div class="row mb-3" id="allow_duplicate_body">

                                                                <div class="col-md-6 mb-3">
                                                                    <label for="track_duplicate_field" class="form-label">Prevent duplicate on field</label>
                                                                    <div class="input-group">
                                                                        <select name="track_duplicate_field" id="track_duplicate_field" class="form-select">
                                                                            <option value="">Select...</option>
                                                                            @if ($fields->isNotEmpty())
                                                                                @foreach ($fields as $field)
                                                                                    <option value="{{ strtolower($field->name) }}" {{ $webToLeads->track_duplicate_field == strtolower($field->name) ? 'selected' : '' }}>{{ $field->name }}</option>
                                                                                @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6 mb-3">
                                                                    <label for="track_duplicate_field_and" class="form-label">+ field (leave blank to track duplicates only by 1 field)</label>
                                                                    <div class="input-group">
                                                                        <select name="track_duplicate_field_and" id="track_duplicate_field_and" class="form-select"  >
                                                                            <option value="">Select...</option>
                                                                            @if ($fields->isNotEmpty())
                                                                                @foreach ($fields as $field)
                                                                                    <option value="{{ strtolower($field->name) }}" {{ $webToLeads->track_duplicate_field_and == strtolower($field->name) ? 'selected' : '' }}>{{ $field->name }}</option>
                                                                                @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6 mb-3">
                                                                    <div class="form-check mt-2">
                                                                        <input class="form-check-input" name="create_task_on_duplicate" type="checkbox" value="1" id="create_task_on_duplicate" {{ $webToLeads->create_task_on_duplicate == 1 ? 'checked' : '' }}>
                                                                        <label class="form-check-label" for="create_task_on_duplicate">Create duplicate lead data as task and assign to responsible staff member</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            {{-- common for both "Display thank you message" and "Redirect to another website" end  --}}
                                                            <div class="d-flex justify-content-end">
                                                                <button type="submit" class="btn btn-primary px-4">Submit</button>
                                                            </div>
                                                        </div>
                                                        <!-- Submission End  -->


                                                        <!-- Notifications start  -->
                                                        <div class="tab-pane fade mb-3" id="notifications" role="tabpane4">

                                                            <div class="form-check">
                                                                <input id="notify_lead_imported" name="notify_lead_imported" value="1" class="form-check-input notify-check" type="checkbox" {{ $webToLeads->notify_lead_imported == 1 ? 'checked' : '' }}>
                                                                <label for="notify_lead_imported" class="form-check-label">Notify when lead imported</label>
                                                            </div>

                                                            <div class="d-none align-items-center gap-3"  id="hiddenDiv">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="notify_type" value="roles" id="staff_members_with_roles" {{ $webToLeads->notify_type == 'roles' ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="staff_members_with_roles">Staff members with roles</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="notify_type" value="specific staff" id="specific_staff_members" {{ $webToLeads->notify_type == 'specific staff' ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="specific_staff_members">Specific Staff Members</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="notify_type" value="assigned" id="responsible_person" {{ $webToLeads->notify_type == 'assigned' ? 'checked' : '' }}>
                                                                    <label class="form-check-label" for="responsible_person">Responsible person</label>
                                                                </div>
                                                            </div>

                                                            <div class="d-none mt-3" id="smwrHiddenDiv">
                                                                <span>Roles to Notify</span>
                                                                <div class="col-md-12 mb-3">
                                                                    <select id="role" class="form-select" multiple="multiple" name="notify_ids[]">
                                                                        <option value="">Select......</option>
                                                                        @if ($roles->isNotEmpty())
                                                                            @foreach ($roles as $role)
                                                                                @php
                                                                                    $notifyIds = $webToLeads->notify_ids;
                                                                                    $notifyIds = explode(',', $notifyIds);
                                                                                @endphp
                                                                                <option value="{{ $role->id }}" 
                                                                                    @foreach ($notifyIds as $id)
                                                                                        {{ ($id == $role->id && $webToLeads->notify_type == 'roles') ? 'selected' : ''}}
                                                                                    @endforeach >
                                                                                    {{ $role->name }}
                                                                                </option>
                                                                            @endforeach
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="d-none mt-3 mb-3" id="ssmHiddenDiv">
                                                                <span>Staff Members to Notify</span>
                                                                <select id="staff" class="form-select" multiple="multiple" name="notify_ids[]">
                                                                    <option value="">Select......</option>
                                                                    @if ($staffs->isNotEmpty())
                                                                        @foreach ($staffs as $staff)
                                                                            @php
                                                                                $notifyIds = $webToLeads->notify_ids;
                                                                                $notifyIds = explode(',', $notifyIds);
                                                                            @endphp
                                                                            <option value="{{ $staff->id }}" 
                                                                                @foreach ($notifyIds as $id)
                                                                                    {{ ($id == $staff->id && $webToLeads->notify_type == 'specific staff') ? 'selected' : ''}}
                                                                                @endforeach>
                                                                                {{ $staff->firstname }} {{ $staff->lastname }}
                                                                            </option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>

                                                            <div class="d-flex justify-content-end">
                                                                <button type="submit" class="btn btn-primary px-4">Submit</button>
                                                            </div>

                                                        </div>
                                                        <!-- Notifications End  -->
                                                        
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Form Information & Setups End  -->


                            <!-- Integration Code start  -->
                            <div class="tab-pane fade" id="integrationCode" role="tabpanel">
                                <div class="card-body p-4">

                                    <p>Copy &amp; Paste the code anywhere in your site to show the form, additionally you can adjust the width and height px to fit for your website.</p>
                                    <textarea class="form-control mb-5" rows="2">&lt;iframe width="600" height="850" src="https://democrm.smarterp.biz/forms/wtl/7d1f3d2a1ddea65b405b84aacec1f193" frameborder="0" sandbox="allow-top-navigation allow-forms allow-scripts allow-same-origin allow-popups" allowfullscreen&gt;&lt;/iframe&gt;</textarea>
                                    
                                    <h4 class="tw-my-5 bold">Share direct link</h4>
                                    <span class="chip">
                                        <a href="#" target="_blank">
                                            https://democrm.smarterp.biz/forms/wtl/7d1f3d2a1ddea65b405b84aacec1f193?styled=1                                        </a>
                                    </span> <br>

                                    <span class="chip">
                                        <a href="#" target="_blank">
                                            https://democrm.smarterp.biz/forms/wtl/7d1f3d2a1ddea65b405b84aacec1f193?styled=1&with_logo=1                                      </a>
                                    </span><br><br><br>

                                    <hr>

                                    <p class="bold mtop15">When placing the iframe snippet code consider the following:</p>
                                    <p class="">1. If the protocol of your installation is http use a http page inside the iframe.</p>
                                    <p class="bold text-success">2. If the protocol of your installation is https use a https page inside the iframe.</p>
                                    <p>None SSL installation will need to place the link in non ssl eq. landing page and backwards.</p>

                                </div>
                            </div>
                            <!-- Integration Code End  -->

                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@push('js')

    {{-- color picker start  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jscolor/2.4.5/jscolor.min.js"></script>

    <script>
        window.addEventListener("DOMContentLoaded", function() {
            var colorInput = document.getElementById("colorInput");
            var picker = new jscolor(colorInput);
                picker.fromHSV(0, 100, 100);
                picker.onFineChange = function() {
                    colorInput.value = '#' + this.rgbToHex(this.rgb[0], this.rgb[1], this.rgb[2]);
            };
        });
    </script>
    {{-- color picker end  --}}


    {{-- display message start --}}
    <script>
        $(document).ready(function() {
            $('#displayMessage').change(function() {
                if(this.checked) {
                    $('#thankYouMessage').show();
                } else {
                    $('#thankYouMessage').hide();
                }
            });

            $('#thankYouMessage').show();
        });
    </script>
    {{-- display message end --}}


    {{-- display message start --}}
    <script>
        $(document).ready(function() {
            $('#redirectUrl').change(function() {
                if(this.checked) {
                    $('#websiteUrl').show();
                } else {
                    $('#websiteUrl').hide();
                }
            });
        });
    </script>
    {{-- display message end --}}


    {{-- Allow_duplicate start --}}
    <script>
        $(document).ready(function() {
            $('#allow_duplicate').change(function() {
                if(this.checked) {
                    $('#allow_duplicate_body').hide();

                } else {
                    $('#allow_duplicate_body').show();
                }
            });

            $('#allow_duplicate_body').hide();
            $('#allow_duplicate').trigger('change');
        });
    </script>
    {{-- Allow_duplicate end --}}



{{-- notification start  --}}
    <script>
        $(document).ready(function(){
            $(".notify-check").on("click", function(){
                if($(".notify-check:checked").length > 0){
                      $("#hiddenDiv").removeClass('d-none');
                      $("#hiddenDiv").addClass('d-flex');
                }else{
                    $("#hiddenDiv").removeClass('d-flex');
                    $("#hiddenDiv").addClass('d-none');
                    $("#ssmHiddenDiv").addClass('d-none');
                    $("#smwrHiddenDiv").addClass('d-none');
                }
            })

            if($(".notify-check:checked").length > 0){
                  $("#hiddenDiv").removeClass('d-none');
                  $("#hiddenDiv").addClass('d-flex');
            }else{
                $("#hiddenDiv").removeClass('d-flex');
                $("#hiddenDiv").addClass('d-none');
                $("#ssmHiddenDiv").addClass('d-none');
                $("#smwrHiddenDiv").addClass('d-none');
            }
        });
    </script>


    <script>
        $(document).ready(function(){
            $("#staff_members_with_roles").on("click", function(){
                if($("#staff_members_with_roles:checked").length > 0){
                    $("#ssmHiddenDiv").addClass('d-none');
                    $("#smwrHiddenDiv").removeClass('d-none');
                }else{
                    $("#smwrHiddenDiv").addClass('d-none');
                }
            });

            if($("#staff_members_with_roles:checked").length > 0){
                $("#ssmHiddenDiv").addClass('d-none');
                $("#smwrHiddenDiv").removeClass('d-none');
            }
        });
    </script>


    <script>
        $(document).ready(function(){
            $("#specific_staff_members").on("click", function(){
                if($("#specific_staff_members:checked").length > 0){
                    $("#smwrHiddenDiv").addClass('d-none');
                    $("#ssmHiddenDiv").removeClass('d-none');
                }else{
                    $("#ssmHiddenDiv").hide();
                }
            });

            if($("#specific_staff_members:checked").length > 0){
                $("#smwrHiddenDiv").addClass('d-none');
                $("#ssmHiddenDiv").removeClass('d-none');
            }
        });
    </script>


    <script>
        $(document).ready(function(){
            $("#responsible_person").on("click", function(){
                if($("#responsible_person:checked").length > 0){
                    $("#smwrHiddenDiv").addClass('d-none');
                    $("#ssmHiddenDiv").addClass('d-none');
                }
            });
        });
    </script>


	<!-- Role-->
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#role').select2({
				placeholder: 'Select an option',
				width: '100%'
			});

            $('#role').on('change', function() {
                $("#staff option").each(function(){
                    $(this).removeAttr("selected");
               });
               $("#staff").trigger('change');
            });
		});
	</script>



    <!-- Staff -->
	<script>
		$(document).ready(function() {
			$('#staff').select2({
				placeholder: 'Select an option',
				width: '100%'
			});

            $('#staff').on('change', function() {
               $("#role option").each(function(){
                    $(this).removeAttr("selected");
               });
               $("#role").trigger('change');
            });
		});
	</script>
    {{-- notification end  --}}



    {{-- By clicking a button, add text area start --}}
    <script>

        $(document).ready(function() {

            $('.list-group-item').on('click', function() {
                var text = $(this).data('text');
                var textField = $('<div class="textarea-container"><textarea class="editor" name=""></textarea><div class="textarea-buttons"><button class="btn btn-warning edit-btn btn-pagination"><i class="fas fa-edit"></i> Edit</button><button class="btn btn-danger delete-btn btn-pagination"><i class="fas fa-trash-alt"></i> Delete</button></div></div>');
                textField.find('textarea').val(text);
                $('#textFieldArea').append(textField);
            });

            // Edit button functionality (optional)
            $('#textFieldArea').on('click', '.edit-btn', function() {
                var textArea = $(this).closest('.textarea-container').find('textarea');
                // Implement edit functionality as needed
            });

            // Delete button functionality
            $('#textFieldArea').on('click', '.delete-btn', function() {
                $(this).closest('.textarea-container').remove();
            });
        });

    </script>
    {{-- By clicking a button, add text area end --}}

@endpush

