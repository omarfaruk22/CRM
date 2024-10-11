@extends('backend.layouts.main')
@section('title', 'Create Form')
@push('css')
    {{-- multiple select  --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
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
            /* Add any other styles as needed */
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
            /* Add any other styles as needed */
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

@section('content')

    <div class="row">

        <ul class="nav nav-pills mb-3" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" data-bs-toggle="pill" href="#form-builder" role="tab" aria-selected="true">
                    <div class="d-flex align-items-center">
                        <div class="tab-title">Form Builder</div>
                    </div>
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" data-bs-toggle="pill" href="#form-information-&-setup" role="tab" aria-selected="false" tabindex="-1">
                    <div class="d-flex align-items-center">
                        <div class="tab-title">Form Information & Setup</div>
                    </div>
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" data-bs-toggle="pill" href="#integration-code" role="tab" aria-selected="false" tabindex="-1">
                    <div class="d-flex align-items-center">
                        <div class="tab-title">Integration Code</div>
                    </div>
                </a>
            </li>
        </ul>
                
        <div class="card">
            <div class="card-body">
                <div class="tab-content" id="pills-tabContent">

                    {{-- Form Builder start --}}
                    <div class="tab-pane fade show active" id="form-builder" role="tabpanel">
                        <div class="row">
                            <div class="col-md-3 py-3">
                                <ul class="list-group">
                                    <li class="list-group-item btn-secondary btn-block" data-type="header">
                                        <i class="fas fa-heading align-middle fs-5"></i> Header
                                    </li>
                                    <li class="list-group-item btn-secondary btn-block" data-type="paragraph">
                                        <i class="fas fa-paragraph align-middle fs-5"></i> Paragraph
                                    </li>
                                    <li class="list-group-item btn-secondary btn-block" data-type="file-upload">
                                        <i class="fas fa-upload align-middle fs-5"></i> File Upload
                                    </li>
                                    <li class="list-group-item btn-secondary btn-block" data-type="contact">
                                        <i class="fas fa-phone align-middle fs-5"></i> Contact
                                    </li>
                                    <li class="list-group-item btn-secondary btn-block" data-type="email">
                                        <i class="fas fa-envelope align-middle fs-5"></i> Email
                                    </li>
                                    <li class="list-group-item btn-secondary btn-block" data-type="text-field">
                                        <i class="fas fa-pen-square align-middle fs-5"></i> Text Field
                                    </li>
                                    <li class="list-group-item btn-secondary btn-block" data-type="text-area">
                                        <i class="fas fa-text-width align-middle fs-5"></i> Text Area
                                    </li>
                                    <li class="list-group-item btn-secondary btn-block" data-type="select">
                                        <i class="fas fa-caret-square-down align-middle fs-5"></i> Select
                                    </li>
                                    <li class="list-group-item btn-secondary btn-block" data-type="checkbox-group">
                                        <i class="fas fa-check-square align-middle fs-5"></i> Check Box Group
                                    </li>
                                    <li class="list-group-item btn-secondary btn-block" data-type="radio-group">
                                        <i class="fas fa-dot-circle align-middle fs-5"></i> Radio Group
                                    </li>
                                    <li class="list-group-item btn-secondary btn-block" data-type="date-field">
                                        <i class="fas fa-calendar-alt align-middle fs-5"></i> Date Field
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-9">
                                <form id="dynamicForm" action="{{ route('estimate.form_store', $estimateRequests->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" id="formDesign" name="form_design">
                                    <div id="formArea" class="mt-3">
                                        <!-- Dynamic form elements will be added here -->
                                    </div>
                                    <div class="d-flex justify-content-end mb-5">
                                        <button type="submit" class="btn btn-sm btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- Form Builder end --}}

                    {{-- Form Information & Setup start  --}}
                    <div class="tab-pane fade" id="form-information-&-setup" role="tabpanel">
                        <div class="row">
                            <div class="col-md-8 mx-auto">

                                <!-- buttons start -->
                                <div class="card-header pt-3">
                                    <ul class="nav nav-pills" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" data-bs-toggle="pill" href="#general" role="tab" aria-selected="false" tabindex="-1">
                                                <div class="d-flex align-items-center">
                                                    <div class="tab-title">General</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" data-bs-toggle="pill" href="#branding" role="tab" aria-selected="false" tabindex="-1">
                                                <div class="d-flex align-items-center">
                                                    <div class="tab-title">Branding</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" data-bs-toggle="pill" href="#submission" role="tab" aria-selected="false" tabindex="-1">
                                                <div class="d-flex align-items-center">
                                                    <div class="tab-title">Submission</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" data-bs-toggle="pill" href="#notifications" role="tab" aria-selected="true">
                                                <div class="d-flex align-items-center">
                                                    <div class="tab-title">Notifications</div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- buttons end -->

                                {{-- Button body start  --}}
                                <div class="card-body">
                                    <form action="{{ route('estimate.update', $estimateRequests->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')

                                        <div class="tab-content" id="pills-tabContent">

                                            <!-- general start  -->
                                            <div class="tab-pane fade active show " id="general" role="tabpanel">
                                                <div class="row g-3 needs-validation" novalidate="">
                                                    <div class="col-md-12">
                                                        <label for="name" class="form-label">
                                                            <span class="text-danger">*</span>Form Name
                                                        </label>
                                                        <input type="text" name="name" class="form-control mb-2 @error('name') is-invalid @enderror" id="name" value="{{ $estimateRequests->name }}">
                                                        @error('name')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Use Google Recaptcha</label><br>
                                                        <div class="d-flex">
                                                            <div class="">
                                                                <input type="radio" name="recaptcha" id="recaptcha_0" value="0" {{ ($estimateRequests->recaptcha == 0) ? 'checked' : '' }}>
                                                                <label for="racaptcha_0">No</label>
                                                            </div>&nbsp;
                                                            <div class="">
                                                                <input type="radio" name="recaptcha" id="recaptcha_1" value="1" {{ ($estimateRequests->recaptcha == 1) ? 'checked' : '' }}>
                                                                <label for="recaptcha_1">Yes</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="language" class="form-label"><span class="text-danger">*</span>Language</label>
                                                        <select name="language" class="form-select @error('language') is-invalid @enderror" id="language">
                                                            <option value="" selected disabled>Select Language</option>
                                                            @if ($languages->isNotEmpty())
                                                                @foreach ($languages as $language)
                                                                    <option value="{{ $language->id }}" {{ ( $language->id === $estimateRequests->language) ? 'selected' : '' }}>{{ $language->name }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        @error('language')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="status" class="form-label"><span class="text-danger">*</span>Status</label>
                                                        <select name="status" class="form-select @error('status') is-invalid @enderror" id="status">
                                                            <option value="" selected disabled>Nothing Selected</option>
                                                            @if (count($estimateRequestStatuses) > 0)
                                                                @foreach ($estimateRequestStatuses as $status)
                                                                    <option value="{{ $status->id }}" {{ ( $status->id === $estimateRequests->status) ? 'selected' : '' }}>{{ $status->name }}</option>
                                                                @endforeach
                                                            @else
                                                                <option value="" disabled>Not found</option>
                                                            @endif
                                                            @error('status')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </select>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label for="responsible" class="form-label">Responsible (Assignee)</label><br>
                                                        <select name="responsible" class="form-select" id="responsible">
                                                            <option value="" selected disabled>Nothing Selected</option>
                                                            @if (count($responsibles) > 0)
                                                                @foreach ($responsibles as $responsible)
                                                                    <option value="{{ $responsible->id }}" {{ ( $responsible->id === $estimateRequests->responsible) ? 'selected' : '' }}>{{ $responsible->firstname.' '.$responsible->lastname }}</option>
                                                                @endforeach
                                                            @else
                                                                <option value="" disabled>Not found</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- general end  -->

                                            <!-- branding start  -->
                                            <div class="tab-pane fade" id="branding" role="tabpanel">
                                                <div class="row g-3 needs-validation" novalidate="">
                                                    <div class="col-md-12">
                                                        <label for="submit_btn_name" class="form-label"><span class="text-danger">*</span> Submit button text</label>
                                                        <input type="text" name="submit_btn_name" class="form-control mb-2 @error('submit_btn_name') is-invalid @enderror" id="submit_btn_name" value="{{ $estimateRequests->submit_btn_name }}">
                                                        @error('submit_btn_name')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="submit_btn_bg_color" class="form-label">Submit button background color</label>
                                                        <input name="submit_btn_bg_color" type="text" id="submit_btn_bg_color" class="jscolor form-control mb-2" value="{{ $estimateRequests->submit_btn_bg_color }}" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" data-current-color="#FFFFFF" style="background-image: linear-gradient(to right, rgb(255, 255, 255) 0%, rgb(255, 255, 255) 30px, rgba(0, 0, 0, 0) 31px, rgba(0, 0, 0, 0) 100%), url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAQCAYAAAB3AH1ZAAAAAXNSR0IArs4c6QAAAFNJREFUSEtjnDlz5n8GPODs2bP4pBmMjY3xyuPSn5KSwrB169bljKMOGA2B0RAY8BBIS0vDWw6Qm89hhQMu/U5OTgxLlixZzjjqgNEQGA2BgQ4BADx2qkG0ILJiAAAAAElFTkSuQmCC&quot;) !important; background-position: left top, left top !important; background-size: auto, 32px 16px !important; background-repeat: repeat-y, repeat-y !important; background-origin: padding-box, padding-box !important; padding-left: 40px !important;">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="submit_btn_text_color" class="form-label">Submit button background text</label>
                                                        <input name="submit_btn_text_color" type="text" id="submit_btn_text_color" class="jscolor form-control mb-2" value="{{ $estimateRequests->submit_btn_text_color }}" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" data-current-color="#FFFFFF" style="background-image: linear-gradient(to right, rgb(255, 255, 255) 0%, rgb(255, 255, 255) 30px, rgba(0, 0, 0, 0) 31px, rgba(0, 0, 0, 0) 100%), url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAQCAYAAAB3AH1ZAAAAAXNSR0IArs4c6QAAAFNJREFUSEtjnDlz5n8GPODs2bP4pBmMjY3xyuPSn5KSwrB169bljKMOGA2B0RAY8BBIS0vDWw6Qm89hhQMu/U5OTgxLlixZzjjqgNEQGA2BgQ4BADx2qkG0ILJiAAAAAElFTkSuQmCC&quot;) !important; background-position: left top, left top !important; background-size: auto, 32px 16px !important; background-repeat: repeat-y, repeat-y !important; background-origin: padding-box, padding-box !important; padding-left: 40px !important;">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- branding end  -->

                                            <!-- submission start  -->
                                            <div class="tab-pane fade" id="submission" role="tabpanel">
                                                <div class="row">
                                                    <div class="card-body p-2">
                                                        <div class="mb-3">
                                                            <p>What should happen after a visitor submits this form?</p>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="submit_action" value="0" id="messageCheckbox" {{ ($estimateRequests->submit_action == 0) ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="messageCheckbox">Display thank you message</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" name="submit_action" type="checkbox" value="1" id="urlCheckbox" {{ ($estimateRequests->submit_action == 1) ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="urlCheckbox">Redirect to another website</label>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="mb-3" id="messageBlock" style="display: none;">
                                                            <div class="form-group">
                                                                <label for="success_submit_msg">Message to show after form is succcesfully submitted</label>
                                                                <textarea name="success_submit_msg" class="form-control @error('success_submit_msg') is-invalid @enderror" id="success_submit_msg" rows="3">{{ $estimateRequests->success_submit_msg }}</textarea>
                                                                @error('success_submit_msg')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="mb-3" id="urlBlock" style="display: block;">
                                                            <div class="form-group">
                                                                <label for="submit_redirect_url">Website URL</label>
                                                                <input name="submit_redirect_url" class="form-control @error('submit_redirect_url') is-invalid @enderror" id="submit_redirect_url" value="{{ $estimateRequests->submit_redirect_url }}">
                                                                @error('submit_redirect_url')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- submission end  -->


                                            <!-- notification start  -->
                                            <div class="tab-pane fade" id="notifications" role="tabpanel">
                                                
                                                <p>Notification settings</p>

                                                <div class="form-check mb-3">
                                                    <input name="notify_request_submitted" class="form-check-input" type="checkbox" value="1" id="notificationCheckbox" {{ ($estimateRequests->notify_request_submitted == 1) ? 'checked' : '' }} >
                                                    <label class="form-check-label" for="notificationCheckbox">Notify when lead imported</label>
                                                </div>

                                                <div class="" id="notificationBody" style="display: none">
                                                    <hr>
                                                    <div class="d-flex mb-3" >
                                                        <div class="form-check me-3">
                                                            <input class="form-check-input" type="radio" name="notify_type" value="roles" id="roles" onclick="showSelect('roles')" {{ ($estimateRequests->notify_type == 'roles') ? 'checked' : '' }} >
                                                            <label class="form-check-label" for="roles">Staff members with roles</label>
                                                        </div>
                                                        <div class="form-check me-3">
                                                            <input class="form-check-input" type="radio" name="notify_type" value="specific_staff" id="specific_staff" onclick="showSelect('specific')" {{ ($estimateRequests->notify_type == 'specific_staff') ? 'checked' : '' }} >
                                                            <label class="form-check-label" for="specific_staff">Specific Staff Members</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="notify_type" value="assigned" id="assigned" onclick="showNothing()" {{ ($estimateRequests->notify_type == 'assigned') ? 'checked' : '' }} >
                                                            <label class="form-check-label" for="assigned">Responsible person</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3" id="selectContainer"></div>
                                            </div>
                                            <!-- notification end  -->
                                        </div>


                                        <div class="col-md-12 mt-2">
                                            <div class="d-md-flex d-grid align-items-center gap-3">
                                                <button type="submit" class="btn btn-primary px-4">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                {{-- Button body end  --}}
                            </div>
                        </div>
                    </div>
                    {{-- Form Information & Setup end  --}}

                    {{-- Integration Code start  --}}
                    <div class="tab-pane fade" id="integration-code" role="tabpanel">
                        <p>Copy & Paste the code anywhere in your site to show the form, additionally you can adjust the width and height px to fit for your website.</p>
						<textarea class="form-control mb-3" id="input40" name="address" rows="3" placeholder=""><iframe width="600" height="850" src="https://democrm.smarterp.biz/forms/quote/82e2bc9b6c9144d8f6ba588328a1757f" frameborder="0" sandbox="allow-top-navigation allow-forms allow-scripts allow-same-origin allow-popups" allowfullscreen></iframe></textarea>
                        <h4 class="bold">Share direct link</h4>
                        <div class="chip">
                            https://democrm.smarterp.biz/forms/quote/82e2bc9b6c9144d8f6ba588328a1757f?styled=1
                        </div>
                        <br>
                        <div class="chip">
                            https://democrm.smarterp.biz/forms/quote/82e2bc9b6c9144d8f6ba588328a1757f?styled=1&with_logo=1
                        </div>
                        <hr>
                        <p class="bold mtop15">When placing the iframe snippet code consider the following:</p>
                        <p class="">1. If the protocol of your installation is http use a http page inside the iframe.</p>
                        <p class="bold text-success">2. If the protocol of your installation is https use a https page inside the iframe.</p>
                        <p>None SSL installation will need to place the link in non ssl eq. landing page and backwards.</p>
                    </div>
                    {{-- Integration Code end  --}}
                </div>
            </div>
        </div>

    </div>
    
@endsection


@push('js')

    {{-- Form Builder start  --}}
    <script>
        $(document).ready(function () {
            $('.list-group-item').on('click', function () {
                var type = $(this).data('type');
                var element;

                switch (type) {
                    case 'header':
                        element = createHeader();
                        break;
                    case 'paragraph':
                        element = createParagraph();
                        break;
                    case 'file-upload':
                        element = createFileUpload();
                        break;
                    case 'contact':
                        element = createContact();
                        break;
                    case 'email':
                        element = createEmail();
                        break;
                    case 'text-field':
                        element = createTextField();
                        break;
                    case 'text-area':
                        element = createTextArea();
                        break;
                    case 'select':
                        element = createSelect();
                        break;
                    case 'checkbox-group':
                        element = createCheckboxGroup();
                        break;
                    case 'radio-group':
                        element = createRadioGroup();
                        break;
                    case 'date-field':
                        element = createDateField();
                        break;
                    default:
                        break;
                }

                $('#formArea').append(element);
                updateFormDesign(); // Update form design HTML
            });

            // Function to create header
            function createHeader() {
                return `<div class="form-group mb-3">
                    <label>Header</label>
                    <input type="text" class="form-control" name="form_data[]" placeholder="Enter header text">
                    <button type="button" class="btn btn-danger btn-sm mt-2 delete-btn">Delete</button>
                </div>`;
            }

            // Function to create paragraph
            function createParagraph() {
                return `<div class="form-group mb-3">
                    <label>Paragraph</label>
                    <textarea class="form-control" name="form_data[]" rows="3" placeholder="Enter paragraph text"></textarea>
                    <button type="button" class="btn btn-danger btn-sm mt-2 delete-btn">Delete</button>
                </div>`;
            }

            // Function to create file upload
            function createFileUpload() {
                return `<div class="form-group mb-3">
                    <label>File Upload</label>
                    <input type="file" class="form-control-file" name="form_data[]">
                    <br>
                    <button type="button" class="btn btn-danger btn-sm mt-2 delete-btn">Delete</button>
                </div>`;
            }

            // Function to create contact
            function createContact() {
                return `<div class="form-group mb-3">
                    <label>Contact</label>
                    <input type="text" class="form-control" name="form_data[]" placeholder="Enter contact number">
                    <button type="button" class="btn btn-danger btn-sm mt-2 delete-btn">Delete</button>
                </div>`;
            }

            // Function to create email
            function createEmail() {
                return `<div class="form-group mb-3">
                    <label>Email</label>
                    <input type="email" class="form-control" name="form_data[]" placeholder="Enter email">
                    <button type="button" class="btn btn-danger btn-sm mt-2 delete-btn">Delete</button>
                </div>`;
            }

            // Function to create text field
            function createTextField() {
                return `<div class="form-group mb-3">
                    <label>Text Field</label>
                    <input type="text" class="form-control" name="form_data[]" placeholder="Enter text">
                    <button type="button" class="btn btn-danger btn-sm mt-2 delete-btn">Delete</button>
                </div>`;
            }

            // Function to create text area
            function createTextArea() {
                return `<div class="form-group mb-3">
                    <label>Text Area</label>
                    <textarea class="form-control" rows="3" name="form_data[]" placeholder="Enter text"></textarea>
                    <button type="button" class="btn btn-danger btn-sm mt-2 delete-btn">Delete</button>
                </div>`;
            }

            // Function to create select
            function createSelect() {
                return `<div class="form-group mb-3">
                    <label>Select</label>
                    <select class="form-control" name="form_data[]">
                        <option>Option 1</option>
                        <option>Option 2</option>
                        <option>Option 3</option>
                    </select>
                    <button type="button" class="btn btn-danger btn-sm mt-2 delete-btn">Delete</button>
                </div>`;
            }

            // Function to create checkbox group
            function createCheckboxGroup() {
                return `<div class="form-group mb-3">
                    <label>Check Box Group</label>
                    <div class="form-check">
                        <input class="form-check-input" name="form_data[]" type="checkbox" value="" id="checkbox1">
                        <label class="form-check-label" for="checkbox1">Option 1</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="form_data[]" type="checkbox" value="" id="checkbox2">
                        <label class="form-check-label" for="checkbox2">Option 2</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="form_data[]" type="checkbox" value="" id="checkbox3">
                        <label class="form-check-label" for="checkbox3">Option 3</label>
                    </div>
                    <button type="button" class="btn btn-danger btn-sm mt-2 delete-btn">Delete</button>
                </div>`;
            }

            // Function to create radio group
            function createRadioGroup() {
                return `<div class="form-group mb-3">
                    <label>Radio Group</label>
                    <div class="form-check">
                        <input class="form-check-input" name="form_data[]" type="radio" name="radioGroup" id="radio1" value="option1">
                        <label class="form-check-label" for="radio1">Option 1</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="form_data[]" type="radio" name="radioGroup" id="radio2" value="option2">
                        <label class="form-check-label" for="radio2">Option 2</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="form_data[]" type="radio" name="radioGroup" id="radio3" value="option3">
                        <label class="form-check-label" for="radio3">Option 2</label>
                    </div>
                    <button type="button" class="btn btn-danger btn-sm mt-2 delete-btn">Delete</button>
                </div>`;
            }

            // Function to create date field
            function createDateField() {
                return `<div class="form-group">
                    <label>Date Field</label>
                    <input type="date" class="form-control" name="form_data[]">
                    <button type="button" class="btn btn-danger btn-sm mt-2 delete-btn">Delete</button>
                </div>`;
            }

            // Update form design HTML
            function updateFormDesign() {
                var formDesign = $('#formArea').html();
                $('#formDesign').val(formDesign);
            }

            // Delete button functionality
            $('#formArea').on('click', '.delete-btn', function () {
                $(this).closest('.form-group').remove();
                updateFormDesign(); // Update form design HTML after deletion
            });
        });
    </script>
    {{-- Form Builder end  --}}

    <!-- Include Select2 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#responsible-assignee').select2({
                placeholder: 'Select an option',
                width: '100%'
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#staff-members-to-notify').select2({
                placeholder: 'Select an option',
                width: '100%'
            });
        });
    </script>


    {{-- color picker start  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jscolor/2.4.5/jscolor.min.js"></script>

    {{-- color input one  --}}
    <script>
        window.addEventListener("DOMContentLoaded", function() {
            var colorInput1 = document.getElementById("colorInput1");
            var picker = new jscolor(colorInput1);
            picker.fromHSV(0, 100, 100);
            picker.onFineChange = function() {
                colorInput1.value = '#' + this.rgbToHex(this.rgb[0], this.rgb[1], this.rgb[2]);
            };
        });
    </script>

    {{-- color input two  --}}
    <script>
        window.addEventListener("DOMContentLoaded", function() {
            var colorInput2 = document.getElementById("colorInput2");
            var picker = new jscolor(colorInput2);
            picker.fromHSV(0, 100, 100);
            picker.onFineChange = function() {
                colorInput2.value = '#' + this.rgbToHex(this.rgb[0], this.rgb[1], this.rgb[2]);
            };
        });
    </script>

    {{-- color picker end  --}}


    {{-- submisssion start --}}
    <script>
        // JavaScript function to toggle visibility based on checkbox state
        function toggleVisibility() {
            var messageBlock = document.getElementById("messageBlock");
            var urlBlock = document.getElementById("urlBlock");
            var messageCheckbox = document.getElementById("messageCheckbox");
            var urlCheckbox = document.getElementById("urlCheckbox");

            // If "Display thank you message" checkbox is checked, show the message block
            if (messageCheckbox.checked) {
                messageBlock.style.display = "block";
            } else {
                messageBlock.style.display = "none";
            }

            // If "Redirect to another website" checkbox is checked, show the URL block
            if (urlCheckbox.checked) {
                urlBlock.style.display = "block";
            } else {
                urlBlock.style.display = "none";
            }
        }

        // Attach event listeners to both checkboxes to call the toggle function
        document.getElementById("messageCheckbox").addEventListener("click", toggleVisibility);
        document.getElementById("urlCheckbox").addEventListener("click", toggleVisibility);

        // Call the toggle function initially to set the initial state
        toggleVisibility();
    </script>
    {{-- submission end --}}


    {{--  notification start --}}
    <script>
        function showSelect(option) {
            var selectContainer = document.getElementById("selectContainer");
            var selectHTML = "";

            if (option === "roles") {
                selectHTML = `
                <label class='mt-2'>Roles to Notify</label>
                @php
                    $notify_ids = explode(',', $estimateRequests->notify_ids);
                @endphp

                <select class="form-select" name="notify_ids[]" id="notify_ids_staff" aria-label="Default select example" multiple="multiple">
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" 
                            @if ($estimateRequests->notify_ids != null && $estimateRequests->notify_type == 'roles')
                                {{ in_array($role->id, $notify_ids) ? 'selected' : '' }}
                            @endif
                            >{{ $role->name }}</option>
                    @endforeach
                </select>
            `;
            } else if (option === "specific") {
                selectHTML = `
                <label class='mt-2'>Staff Members to Notify</label>
                @php
                    $notify_ids = explode(',', $estimateRequests->notify_ids);
                @endphp
                <select class="form-select" name="notify_ids[]" id="notify_ids_roles" aria-label="Default select example" multiple="multiple">
                    @foreach ($responsibles as $responsible)
                        <option value="{{ $responsible->id }}" 
                            @if ($estimateRequests->notify_ids != null && $estimateRequests->notify_type == 'specific_staff')
                                {{ in_array($responsible->id, $notify_ids) ? 'selected' : '' }}
                            @endif
                            >
                            {{ $responsible->firstname . ' ' . $responsible->lastname }}
                        </option>
                    @endforeach
                </select>
            `;
            }

            selectContainer.innerHTML = selectHTML;

            // Multiple select apply here 
            if (option === "roles") {
                $('#notify_ids_staff').select2({
                    placeholder: 'Select an option',
                    width: '100%'
                });
            } else if (option === "specific") {
                $('#notify_ids_roles').select2({
                    placeholder: 'Select an option',
                    width: '100%'
                });
            }
        }

        function showNothing() {
            var selectContainer = document.getElementById("selectContainer");
            selectContainer.innerHTML = "";
        }

        
    </script>

    <script>
        document.getElementById("notificationCheckbox").addEventListener("change", notificationVisibility);

        function notificationVisibility() {
            var messageCheckbox = document.getElementById("notificationCheckbox");
            var messageBlock = document.getElementById("notificationBody");

            if (messageCheckbox.checked) {
                messageBlock.style.display = "block";
            } else {
                messageBlock.style.display = "none";
            }
        }

        notificationVisibility();
    </script>
    {{-- notification end --}}


@endpush






