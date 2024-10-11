<div>
    <div class="row">
        <div class="card">
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
                            <a class="nav-link" data-bs-toggle="pill" href="#branding" role="tab"
                                aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="tab-title">Branding</div>
                                </div>
                            </a>
                        </li>

                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="pill" href="#submission" role="tab"
                                aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="tab-title">Submission</div>
                                </div>
                            </a>
                        </li>

                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="pill" href="#notifications" role="tab"
                                aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="tab-title">Notifications</div>
                                </div>
                            </a>
                        </li>

                    </ul>
                </div>
                <!-- buttons end -->

                <div wire:ignore.self class="card-body">
                    <form action="" wire:submit="store">
                        <div class="tab-content" id="pills-tabContent">
                            <!-- general start  -->
                            <div class="tab-pane fade show active" id="general" role="tabpanel">
                                <div class="row g-3 needs-validation" novalidate>
                                    <div class="col-md-12">
                                        <label for="form-name" class="form-label"><span class="text-danger">*</span>Form
                                            Name</label>
                                        <input type="text" wire:model="form_name" name="form-name"
                                            class="form-control mb-2" id="form-name">
                                        @error('form_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-12">
                                        <label for="language" class="form-label"><span class="text-danger">*</span>
                                            Language</label>
                                        <select wire:model="language" name="language" class="form-select"
                                            id="language">
                                            <option>Select Language</option>
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
                                        <label for="status" class="form-label"><span class="text-danger">*</span>
                                            Status</label>
                                        <select wire:model="status_id" name="status" class="form-select"
                                            id="status">
                                            @foreach ($statuses as $status)
                                                <option value="{{ $status->id }}">{{ $status->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('status_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="responsible-assignee" class="form-label">Responsible (Assignee)</label><br>
                                        <select wire:model="responsible_id" name="" class="form-select"
                                            id="status">
                                            <option value="">Nothing Selected</option>
                                            @foreach ($responsibles as $responsible)
                                                <option value="{{ $responsible->id }}">{{ $responsible->firstname }}</option>
                                            @endforeach
                                        </select>
                                        @error('responsible_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- general end  -->

                            <!-- branding start  -->
                            <div class="tab-pane fade show" id="branding" role="tabpanel">
                                <div class="row g-3 needs-validation" novalidate>

                                    <div class="col-md-12">
                                        <label for="submit-button-text" class="form-label"><span
                                                class="text-danger">*</span> Submit button text</label>
                                        <input wire:model="button_text_name" type="text" name="submit-button-text"
                                            class="form-control mb-2" id="submit-button-text">
                                        @error('submit-button-text')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label for="submit-button-text" class="form-label">Submit button background
                                            text</label>
                                        <input wire:model="button_background_color" type="text" id="colorInput1"
                                            class="jscolor form-control mb-2" value="#ffffff">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="submit-button-text" class="form-label">Submit button background
                                            text</label>
                                        <input wire:model="button_background_text" type="text" id="colorInput2"
                                            class="jscolor form-control mb-2" value="#ffffff">
                                    </div>
                                </div>
                            </div>
                            <!-- branding end  -->

                            <!-- submission start  -->
                            <div class="tab-pane fade" id="submission" role="tabpanel">
                                <div class="row">
                                    <div class="card-body p-2">
                                        <div class="card-body">
                                            <p>What should happen after a visitor submits this form?</p>
                                            <!-- Checkbox for displaying thank you message -->
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="messageCheckbox">
                                                <label class="form-check-label" for="messageCheckbox">Display
                                                    thank you message</label>
                                            </div>

                                            <!-- Checkbox for redirecting to another website -->
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="urlCheckbox" checked>
                                                <label class="form-check-label" for="urlCheckbox">Redirect to
                                                    another website</label>
                                            </div>

                                        </div>

                                        <!-- Block for the thank you message -->
                                        <div id="messageBlock" style="display: none;">
                                            <div class="form-group">
                                                <label for="messageTextarea">Message to show after form is
                                                    succcesfully submitted</label>
                                                <textarea wire:model="display_message" class="form-control" id="messageTextarea" rows="3"></textarea>
                                            </div>
                                        </div>

                                        <!-- Block for the URL -->
                                        <div id="urlBlock">
                                            <div class="form-group">
                                                <label for="urlTextarea">Website URL</label>
                                                <input wire:model="redirect_url" class="form-control"
                                                    id="urlTextarea" rows="3"></input>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- submission end  -->

                            <!-- notification start  -->
                            <div class="tab-pane fade" id="notifications" role="tabpanel" class="col-12 col-lg-6">
                                <p>Notification settings</p>
                                <div class="form-check">
                                    <input name="notify_lead" class="form-check-input" type="checkbox"
                                        value="" id="toggleCheckbox">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Notify when lead imported
                                    </label>
                                </div>
                                <div id="secondBlock" style="display: none;" class="d-flex align-items-center gap-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault1" onclick="showSelect('roles')">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Staff members with roles
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault2" onclick="showSelect('specific')">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Specific Staff Members
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input wire:model='responsible_person' value="1"
                                            class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault3" onclick="showNothing()">
                                        <label class="form-check-label" for="flexRadioDefault3">
                                            Responsible person
                                        </label>
                                    </div>
                                </div>
                                <div id="selectContainer">
                                    <!-- This div will contain the select elements -->
                                </div>
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
            </div>
        </div>
    </div>
</div>




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
                <select class="form-select" wire:model='notify_role' id="InputLanguage" aria-label="Default select example">
                    <option selected>Nothing Selected</option>
                    <option value="1">Employee</option>
                </select>
            `;
            } else if (option === "specific") {
                selectHTML = `
                <label class='mt-2'>Staff Members to Notify</label>
                <select class="form-select" wire:model='notify_member' id="InputLanguage" aria-label="Default select example">
                    <option selected>Nothing Selected</option>
                    @foreach ($responsibles as $responsible)
                     <option value="{{ $responsible->id }}">
                      {{ $responsible->firstname }}</option>
                      @endforeach
                </select>
            `;
            }

            selectContainer.innerHTML = selectHTML;
        }

        function showNothing() {
            var selectContainer = document.getElementById("selectContainer");
            selectContainer.innerHTML = ""; // Clear the container to show nothing
        }
    </script>
    {{-- notification end --}}
@endpush
