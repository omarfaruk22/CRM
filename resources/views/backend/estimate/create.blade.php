@extends('backend.layouts.main')
@section('title', 'Project Details')
@section('content')

    <div class="row">
        <div class="card">
            <div class="card-body">
                <p class="card-text">Create form first to be able to use the form builder.</p>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="card">
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
                    <form action="{{ route('estimate.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="tab-content" id="pills-tabContent">

                            <!-- general start  -->
                            <div class="tab-pane fade active show " id="general" role="tabpanel">
                                <div class="row g-3 needs-validation" novalidate="">

                                    <div class="col-md-12">
                                        <label for="name" class="form-label">
                                            <span class="text-danger">*</span>Form Name
                                        </label>
                                        <input type="text" name="name" class="form-control mb-2 @error('name') is-invalid @enderror" id="name">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Use Google Recaptcha</label><br>
                                        <div class="d-flex">
                                            <div class="">
                                                <input type="radio" name="recaptcha" id="racaptcha_0" value="0" checked="">
                                                <label for="racaptcha_0">No</label>
                                            </div>&nbsp;
                                            <div class="">
                                                <input type="radio" name="recaptcha" id="recaptcha_1" value="1">
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
                                                    <option value="{{ $language->id }}">{{ $language->name }}</option>
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
                                                    <option value="{{ $status->id }}">{{ $status->name }}</option>
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
                                                    <option value="{{ $responsible->id }}">{{ $responsible->firstname.' '.$responsible->lastname }}</option>
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
                                        <input type="text" name="submit_btn_name" class="form-control mb-2 @error('submit_btn_name') is-invalid @enderror" id="submit_btn_name">
                                        @error('submit_btn_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="submit_btn_bg_color" class="form-label">Submit button background color</label>
                                        <input name="submit_btn_bg_color" type="text" id="submit_btn_bg_color" class="jscolor form-control mb-2" value="#ffffff" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" data-current-color="#FFFFFF" style="background-image: linear-gradient(to right, rgb(255, 255, 255) 0%, rgb(255, 255, 255) 30px, rgba(0, 0, 0, 0) 31px, rgba(0, 0, 0, 0) 100%), url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAQCAYAAAB3AH1ZAAAAAXNSR0IArs4c6QAAAFNJREFUSEtjnDlz5n8GPODs2bP4pBmMjY3xyuPSn5KSwrB169bljKMOGA2B0RAY8BBIS0vDWw6Qm89hhQMu/U5OTgxLlixZzjjqgNEQGA2BgQ4BADx2qkG0ILJiAAAAAElFTkSuQmCC&quot;) !important; background-position: left top, left top !important; background-size: auto, 32px 16px !important; background-repeat: repeat-y, repeat-y !important; background-origin: padding-box, padding-box !important; padding-left: 40px !important;">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="submit_btn_text_color" class="form-label">Submit button background text</label>
                                        <input name="submit_btn_text_color" type="text" id="submit_btn_text_color" class="jscolor form-control mb-2" value="#ffffff" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" data-current-color="#FFFFFF" style="background-image: linear-gradient(to right, rgb(255, 255, 255) 0%, rgb(255, 255, 255) 30px, rgba(0, 0, 0, 0) 31px, rgba(0, 0, 0, 0) 100%), url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAQCAYAAAB3AH1ZAAAAAXNSR0IArs4c6QAAAFNJREFUSEtjnDlz5n8GPODs2bP4pBmMjY3xyuPSn5KSwrB169bljKMOGA2B0RAY8BBIS0vDWw6Qm89hhQMu/U5OTgxLlixZzjjqgNEQGA2BgQ4BADx2qkG0ILJiAAAAAElFTkSuQmCC&quot;) !important; background-position: left top, left top !important; background-size: auto, 32px 16px !important; background-repeat: repeat-y, repeat-y !important; background-origin: padding-box, padding-box !important; padding-left: 40px !important;">
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
                                                <input class="form-check-input" type="checkbox" name="submit_action" value="0" id="messageCheckbox" >
                                                <label class="form-check-label" for="messageCheckbox">Display thank you message</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" name="submit_action" type="checkbox" value="1" id="urlCheckbox" checked="">
                                                <label class="form-check-label" for="urlCheckbox">Redirect to another website</label>
                                            </div>
                                            
                                        </div>

                                        <div class="mb-3" id="messageBlock" style="display: none;">
                                            <div class="form-group">
                                                <label for="success_submit_msg">Message to show after form is succcesfully submitted</label>
                                                <textarea name="success_submit_msg" class="form-control @error('success_submit_msg') is-invalid @enderror" id="success_submit_msg" rows="3"></textarea>
                                                @error('success_submit_msg')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-3" id="urlBlock" style="display: block;">
                                            <div class="form-group">
                                                <label for="submit_redirect_url">Website URL</label>
                                                <input name="submit_redirect_url" class="form-control @error('submit_redirect_url') is-invalid @enderror" id="submit_redirect_url">
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
                                    <input name="notify_request_submitted" class="form-check-input" type="checkbox" value="1" id="notificationCheckbox" checked>
                                    <label class="form-check-label" for="notificationCheckbox">Notify when lead imported</label>
                                </div>

                                <div class="" id="notificationBody" style="display: none">
                                    <hr>
                                    <div class="d-flex mb-3" >
                                        <div class="form-check me-3">
                                            <input class="form-check-input" type="radio" name="notify_type" value="roles" id="roles" onclick="showSelect('roles')">
                                            <label class="form-check-label" for="roles">Staff members with roles</label>
                                        </div>
                                        <div class="form-check me-3">
                                            <input class="form-check-input" type="radio" name="notify_type" value="specific_staff" id="specific_staff" onclick="showSelect('specific')">
                                            <label class="form-check-label" for="specific_staff">Specific Staff Members</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="notify_type" value="assigned" id="assigned" onclick="showNothing()">
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


    {{-- submisssion start --}}
    <script>
        function toggleVisibility() {
            var messageBlock = document.getElementById("messageBlock");
            var urlBlock = document.getElementById("urlBlock");
            var messageCheckbox = document.getElementById("messageCheckbox");
            var urlCheckbox = document.getElementById("urlCheckbox");

            if (messageCheckbox.checked) {
                messageBlock.style.display = "block";
            } else {
                messageBlock.style.display = "none";
            }

            if (urlCheckbox.checked) {
                urlBlock.style.display = "block";
            } else {
                urlBlock.style.display = "none";
            }
        }

        document.getElementById("messageCheckbox").addEventListener("click", toggleVisibility);
        document.getElementById("urlCheckbox").addEventListener("click", toggleVisibility);

        toggleVisibility();
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', (event) => {

            const successMessageCheckbox = document.getElementById('messageCheckbox');
            const websiteRedirectCheckbox = document.getElementById('urlCheckbox');

            var messageBlock = document.getElementById("messageBlock");
            var urlBlock = document.getElementById("urlBlock");

            successMessageCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    websiteRedirectCheckbox.checked = false;
                    urlBlock.style.display = "none";
                }
            });

            websiteRedirectCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    successMessageCheckbox.checked = false;
                    messageBlock.style.display = "none";
                }
            });
        });
    </script>
    {{-- submission end --}}


    {{-- notification start --}}
    <script>
        function showSelect(option) {
            var selectContainer = document.getElementById("selectContainer");
            var selectHTML = "";

            if (option === "roles") {
                selectHTML = `
                <label class='mt-2'>Roles to Notify</label>
                <select class="form-select" name="notify_ids[]" id="notify_ids_staff" aria-label="Default select example" multiple="multiple">
                    @if (count($roles) > 0)
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    @endif
                </select>
            `;
            } else if (option === "specific") {
                selectHTML = `
                <label class='mt-2'>Staff Members to Notify</label>
                <select class="form-select" name="notify_ids[]" id="notify_ids_roles" aria-label="Default select example" multiple="multiple">
                    @foreach ($responsibles as $responsible)
                        <option value="{{ $responsible->id }}">
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