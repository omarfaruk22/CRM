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

                    {{-- Form Builder start  --}}
                    <div class="tab-pane fade show active" id="form-builder" role="tabpanel">
                        <div class="row">
                            <div class="col-md-3 py-3">
                                <ul class="list-group">
                                    <li class="list-group-item btn-secondary btn-block" data-text="Header">
                                        <i class="bx bx-heading align-middle fs-5"></i> Header
                                    </li>
                                    <li class="list-group-item btn-secondary btn-block" data-text="Paragraph">
                                        <i class="bx bx-paragraph align-middle fs-5"></i> Paragraph
                                    </li>
                                    <li class="list-group-item btn-secondary btn-block" data-text="File Upload">
                                        <i class="bx bx-upload align-middle fs-5"></i> File Upload
                                    </li>
                                    <li class="list-group-item btn-secondary btn-block" data-text="Contact">
                                        <i class="bx bx-phone align-middle fs-5"></i> Contact
                                    </li>
                                    <li class="list-group-item btn-secondary btn-block" data-text="Email">
                                        <i class="bx bx-envelope align-middle fs-5"></i> Email
                                    </li>
                                    <li class="list-group-item btn-secondary btn-block" data-text="Text Field">
                                        <i class="bx bx-message-square-detail align-middle fs-5"></i> Text Field
                                    </li>
                                    <li class="list-group-item btn-secondary btn-block" data-text="Text Area">
                                        <i class="bx bx-message-detail align-middle fs-5"></i> Text Area
                                    </li>
                                    <li class="list-group-item btn-secondary btn-block" data-text="Select">
                                        <i class="bx bx-chevron-down align-middle fs-5"></i> Select
                                    </li>
                                    <li class="list-group-item btn-secondary btn-block" data-text="Check Box Group">
                                        <i class="bx bx-checkbox-checked align-middle fs-5"></i> Check Box Group
                                    </li>
                                    <li class="list-group-item btn-secondary btn-block" data-text="Radio Group">
                                        <i class="bx bx-radio-circle-marked align-middle fs-5"></i> Radio Group
                                    </li>
                                    <li class="list-group-item btn-secondary btn-block" data-text="Data Field">
                                        <i class="bx bx-data align-middle fs-5"></i> Data Field
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-9">
                                <div id="textFieldArea" class="mt-3">

                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Form Builder start  --}}

                    {{-- Form Information & Setup start  --}}
                    <div class="tab-pane fade" id="form-information-&-setup" role="tabpanel">
                        <div class="row">
                            <div class="col-md-8 mx-auto">
                                <!-- buttons start -->
                                <div class="card-header pt-3">
                                    <ul class="nav nav-pills" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" data-bs-toggle="pill" href="#general" role="tab"
                                                aria-selected="true">
                                                <div class="d-flex align-items-center">
                                                    <div class="tab-title">General</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" data-bs-toggle="pill" href="#branding" role="tab" aria-selected="false">
                                                <div class="d-flex align-items-center">
                                                    <div class="tab-title">Branding</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" data-bs-toggle="pill" href="#submission" role="tab" aria-selected="false">
                                                <div class="d-flex align-items-center">
                                                    <div class="tab-title">Submission</div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" data-bs-toggle="pill" href="#notifications" role="tab" aria-selected="false">
                                                <div class="d-flex align-items-center">
                                                    <div class="tab-title">Notifications</div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- buttons end -->
                                <div class="card-body">
                                    <form action="" method="POST">
                                        @csrf
                                        <div class="tab-content" id="pills-tabContent">
                                            <!-- general start  -->
                                            <div class="tab-pane fade show active" id="general" role="tabpanel">
                                                <div class="row g-3 needs-validation" novalidate>
                                                    <div class="col-md-12">
                                                        <label for="form-name" class="form-label"><span class="text-danger">*</span> Form Name</label>
                                                        <input type="text" name="form-name" class="form-control mb-2" id="form-name">
                                                        @error('form-name')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="language" class="form-label"><span class="text-danger">*</span> Language</label>
                                                        <select name="language" class="form-select" id="language">
                                                            <option>Select Language</option>
                                                            @if ($languages->isNotEmpty())
                                                                @foreach ($languages as $language)
                                                                    <option value="{{ $language->id }}">{{ $language->name }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="status" class="form-label"><span class="text-danger">*</span> Status</label>
                                                        <select name="status" class="form-select" id="status">
                                                            <option>Select status</option>
                                                            <option>Cancelled</option>
                                                            <option>Processing</option>
                                                            <option>Compleded</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label for="responsible-assignee" class="form-label">Responsible (Assignee)</label><br>
                                                        <select id="responsible-assignee" class="form-select" multiple="multiple">
                                                            <option value="option1">Option 1</option>
                                                            <option value="option2">Option 2</option>
                                                            <option value="option3">Option 3</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-12 d-flex justify-content-end gap-3">
                                                        <button type="submit" class="btn btn-primary px-2">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- general end  -->
                                            <!-- branding start  -->
                                            <div class="tab-pane fade show" id="branding" role="tabpanel">
                                                <div class="row g-3 needs-validation" novalidate>
                                                    <div class="col-md-12">
                                                        <label for="submit-button-text" class="form-label"><span class="text-danger">*</span> Submit button text</label>
                                                        <input type="text" name="submit-button-text" class="form-control mb-2" id="submit-button-text">
                                                        @error('submit-button-text')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="submit-button-text" class="form-label">Submit button background text</label>
                                                        <input type="text" id="colorInput1" class="jscolor form-control mb-2" value="#ffffff">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="submit-button-text" class="form-label">Submit button background text</label>
                                                        <input type="text" id="colorInput2" class="jscolor form-control mb-2" value="#ffffff">
                                                    </div>
                                                    <div class="col-md-12 d-flex justify-content-end gap-3">
                                                        <button type="submit" class="btn btn-primary px-2">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- branding end  -->
                                            <!-- submission start  -->
                                            <div class="tab-pane fade show" id="submission" role="tabpanel">
                                                <div class="row g-3 needs-validation" novalidate>
                                                    <label for="" class="control-label bold">What should happen after a visitor submits this form?</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="1" required="">
                                                        <label class="form-check-label" for="1">Display thank you message</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="2" required="">
                                                        <label class="form-check-label" for="2">Redirect to another website</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="3" class="form-label"><span class="text-danger">*</span> Message to show after form is succcesfully submitted</label>
                                                        <textarea class="form-control" id="3" placeholder="" rows="3"></textarea>
                                                    </div>
                                                    <div class="col-md-12 d-flex justify-content-end gap-3">
                                                        <button type="submit" class="btn btn-primary px-2">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- submission end  -->
                                            <!-- submission start  -->
                                            <div class="tab-pane fade show" id="notifications" role="tabpanel">
                                                <div class="row g-3 needs-validation" novalidate>
                                                    <label for="" class="control-label bold">Notification settings</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="2" required="">
                                                        <label class="form-check-label" for="2">Notify when estimate request submitted</label>
                                                    </div>
                                                    <hr>
                                                    <div class="d-flex align-items-center gap-3">
                                                        <div class="form-check">
                                                            <input type="radio" class="form-check-input" id="bsValidation6" name="radio-stacked" required="">
                                                            <label class="form-check-label" for="bsValidation6">Specific Staff Members</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input type="radio" class="form-check-input" id="bsValidation7" name="radio-stacked" required="">
                                                            <label class="form-check-label" for="bsValidation7">Staff members with roles</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input type="radio" class="form-check-input" id="bsValidation7" name="radio-stacked" required="">
                                                            <label class="form-check-label" for="bsValidation7">Responsible person</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label for="staff-members-to-notify" class="form-label">Staff Members to Notify</label><br>
                                                        <select id="staff-members-to-notify" class="form-select" multiple="multiple">
                                                            <option value="option1">Option 1</option>
                                                            <option value="option2">Option 2</option>
                                                            <option value="option3">Option 3</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-12 d-flex justify-content-end gap-3">
                                                        <button type="submit" class="btn btn-primary px-2">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- submission end  -->
                                            
                                        </div>
                                    </form>
                                </div>
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


    {{-- By clicking a button, add text area start --}}
    <script>
        $(document).ready(function() {
            $('.list-group-item').on('click', function() {
                var text = $(this).data('text');
                var textField = $('<div class="textarea-container"><textarea class="editor" name=""></textarea><div class="textarea-buttons"><button class="btn btn-primary copy-btn btn-pagination"><i class="fas fa-copy"></i> Copy</button><button class="btn btn-warning edit-btn btn-pagination"><i class="fas fa-edit"></i> Edit</button><button class="btn btn-danger delete-btn btn-pagination"><i class="fas fa-trash-alt"></i> Delete</button></div></div>');
                textField.find('textarea').val(text);
                $('#textFieldArea').append(textField);
            });

            // Copy button functionality
            $('#textFieldArea').on('click', '.copy-btn', function() {
                var textArea = $(this).closest('.textarea-container').find('textarea');
                textArea.select();
                document.execCommand("copy");
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






