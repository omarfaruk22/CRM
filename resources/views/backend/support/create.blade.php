@extends('backend.layouts.main')
@section('title', 'Support Tickets')

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
@endpush

@section('content')

    {{-- Create new tag modal start --}}
    <form action="{{ route('support.create_tag_from_ticket_information') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
            style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create New Tag</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input class="form-control" name="tags" type="text">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    {{-- Create new tag modal end --}}


    <div class="card card-body">
        <h4 class="">Ticket Information</h4>
    </div>

    <div class="card">
        <div class="card-body">

            {{-- Button start here  --}}
            <ul class="nav nav-pills card-header mb-3" role="tablist"
                style="border:none!important; background-color: #b8c0b8; color: white; padding: 15px;">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" data-bs-toggle="pill" href="#primary-pills-home" role="tab"
                        aria-selected="true">
                        <div class="d-flex align-items-center">
                            <div class="tab-icon"><i class="bx bx-user-pin font-18 me-1"></i></div>
                            <div class="tab-title">Ticket to contact</div>
                        </div>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" data-bs-toggle="pill" href="#primary-pills-profile" role="tab"
                        aria-selected="false" tabindex="-1">
                        <div class="d-flex align-items-center">
                            <div class="tab-icon"><i class="bx bx-user-pin font-18 me-1"></i></div>
                            <div class="tab-title">Ticket without contact</div>
                        </div>
                    </a>
                </li>
            </ul>
            {{-- Button end here  --}}

            <div class="tab-content" id="pills-tabContent">

                {{-- Ticket to contact start  --}}
                <div class="tab-pane fade active show" id="primary-pills-home" role="tabpanel">
                    <form action="{{ route('support.ticket_to_contact_store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <section>
                            <div class="row mb-3">
                                <div class="col-md-6">

                                    <div class="row">

                                        <div class="col-md-12 mb-3">
                                            <label for="subject" class="form-label">Subject</label>
                                            <input type="text" name="subject"
                                                class="form-control @error('subject') is-invalid @enderror" id="subject">
                                            @error('subject')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="row">

                                        <div class="col-md-6 mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror" id="name">
                                            @error('name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="email" class="form-label">Email address</label>
                                            <input type="email" name="email"
                                                class="form-control @error('email') is-invalid @enderror" id="email"
                                                aria-describedby="emailHelp">
                                            <span id="emailHelp" class="form-text">We'll never share your email with anyone
                                                else.</span>
                                            @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="departmentid" class="form-label">Department</label>
                                            <select class="form-select @error('departmentid') is-invalid @enderror"
                                                name="departmentid" id="departmentid" name="departmentid">
                                                @if ($departments->isNotEmpty())
                                                    <option selected="" value="">Select departments</option>
                                                    @foreach ($departments as $department)
                                                        <option value="{{ $department->id }}">{{ $department->name }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @error('departmentid')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="cc" class="form-label">CC</label>
                                            <input type="text" name="cc" class="form-control" id="cc">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">

                                    <div class="row">

                                        <div class="col-md-12 mb-3">
                                            <label for="tags" class="form-label"><i
                                                    class='bx bx-purchase-tag-alt'></i> Tags</label><br>

                                            @if (session('tags'))
                                                <div class="alert alert-success alert-dismissible fade show mt-3 mb-3"
                                                    role="alert">
                                                    <strong>Weldone!</strong> {{ session('tags') }}
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                        aria-label="Close"></button>
                                                </div>
                                            @endif

                                            <div class="input-group" style="width: 100%">
                                                <div class="" style="width: 95%">
                                                    <select id="tag1" class="form-select" multiple="multiple"
                                                        name="tags[]">
                                                        @if (!empty($tagNames))
                                                            @foreach ($tagNames->unique('tags') as $tag)
                                                                <option value="{{ $tag->id }}">{{ $tag->tags }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                                <div class="" style="width: 5%">
                                                    <button type="button" class="btn btn-sm btn-outline-secondary"
                                                        data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                        style="width: 100%; padding:5px;">+</button>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-12 mb-3">
                                            <label for="assigned" class="form-label">Assign ticket (default is current
                                                user)</label>
                                            <select class="form-select" id="assigned" name="assigned">
                                                @if ($staffs->isNotEmpty())
                                                    <option selected="" value="">Select user</option>
                                                    @foreach ($staffs as $staff)
                                                        <option value="{{ $staff->id }}"
                                                            @if ($staff->email === $authUserEmail) selected @endif>
                                                            {{ $staff->firstname . ' ' . $staff->lastname }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-md-6 mb-3">
                                            <label for="priorityId" class="form-label">Priority</label>
                                            <select class="form-control @error('priorityId') is-invalid @enderror"
                                                id="priorityId" name="priorityId">
                                                @if ($priorities->isNotEmpty())
                                                    <option selected="" value="">Select priority</option>
                                                    @foreach ($priorities as $priority)
                                                        <option value="{{ $priority->id }}">{{ $priority->name }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @error('priorityId')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="serviceId" class="form-label">Service</label>
                                            <select class="form-control @error('serviceId') is-invalid @enderror"
                                                id="serviceId" name="serviceId">
                                                @if ($services->isNotEmpty())
                                                    <option selected="" value="">Select Service</option>
                                                    @foreach ($services as $service)
                                                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @error('serviceId')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <br>
                            <hr>
                            <br>

                            <div class="row">

                                <div class="col-md-12 mb-3">
                                    <span class="h4 me-2">Ticket Body</span>
                                    <a href="{{ route('support.create') }}" class="btn btn-sm btn-outline-secondary"
                                        data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Refresh"
                                        data-bs-original-title="Refresh"><i class="bx bx-reset"></i></a>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <select class="form-select" id="predefinedReplay" name=""
                                        onchange="updateDescription(); toggleTextArea();">
                                        @if ($predefinedReplies->isNotEmpty())
                                            <option selected disabled value="">Insert predefined reply</option>
                                            @foreach ($predefinedReplies as $predefinedReply)
                                                <option value="{{ $predefinedReply->id }}">{{ $predefinedReply->name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>

                                    {{-- Hidden input for "Insert predefined reply" --}}
                                    <input type="hidden" id="selectedOptionIndex" name="selectedOptionIndex">
                                </div>

                                <div class="col-md-6">
                                    <select class="form-select" id="knowledgeBaseLink" name="knowledgeBase"
                                        onchange="updateDescription(); toggleTextArea();">
                                        <option selected disabled value="">Insert knowledge base link</option>
                                        @if ($knowledgeBaseLinks->isNotEmpty())
                                            @foreach ($knowledgeBaseLinks as $knowledgeBaseLink)
                                                <option value="{{ $knowledgeBaseLink->id }}">
                                                    {{ $knowledgeBaseLink->subject }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    {{-- Hidden input for "Insert knowledge base link" --}}
                                    <input type="hidden" id="selectedKnowledgeBaseIndex"
                                        name="selectedKnowledgeBaseIndex">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Description</label>
                                    <div style="display:block;" id="textEditorDiv">
                                        <textarea class="descriptionContainer" id="editor1" name="message1"></textarea><br>
                                    </div>
                                    <div style="display:none;" id="normalTextAreaDiv">
                                        <textarea name="message2" id="messageContainer" class="form-control" cols="50" rows="10"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="file_name" class="form-label">Attachment</label>
                                    <input type="file" name="file_name[]" class="form-control" id="file_name"
                                        multiple>
                                </div>

                                <div class="d-flex justify-content-end my-3">
                                    <button type="submit" class="btn btn-primary ">Open Ticket</button>
                                </div>
                            </div>


                        </section>
                    </form>
                </div>
                {{-- Ticket to contact end  --}}

                {{-- Ticket without contact start --}}
                <div class="tab-pane fade" id="primary-pills-profile" role="tabpanel">
                    <form action="{{ route('support.ticket_without_contact_store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <section>
                            <div class="row mb-3">
                                <div class="col-md-6">

                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="subject" class="form-label">Subject</label>
                                            <input type="text" name="subject"
                                                class="form-control @error('subject') is-invalid @enderror"
                                                id="subject">
                                            @error('subject')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="contactid" class="form-label">Contact</label>
                                            <select class="form-select @error('contactid') is-invalid @enderror"
                                                name="contactid" id="contactid">
                                                @if ($contacts->isNotEmpty())
                                                    <option selected="" value="">Select contact</option>
                                                    @foreach ($contacts as $contact)
                                                        <option value="{{ $contact->id }}">
                                                            {{ $contact->firstname . '' . $contact->lastname }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @error('contactid')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="row">

                                        <div class="col-md-6 mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror" id="name"
                                                disabled>
                                            @error('name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="email" class="form-label">Email address</label>
                                            <input type="email" name="email"
                                                class="form-control @error('email') is-invalid @enderror" id="email"
                                                aria-describedby="emailHelp" disabled>
                                            <span id="emailHelp" class="form-text">We'll never share your email with
                                                anyone else.</span>
                                            @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="departmentid" class="form-label">Department</label>
                                            <select class="form-select @error('departmentid') is-invalid @enderror"
                                                name="departmentid" id="departmentid" name="departmentid">
                                                @if ($departments->isNotEmpty())
                                                    <option selected="" value="">Select departments</option>
                                                    @foreach ($departments as $department)
                                                        <option value="{{ $department->id }}">{{ $department->name }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @error('departmentid')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="cc" class="form-label">CC</label>
                                            <input type="text" name="cc" class="form-control" id="cc">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">

                                    <div class="row">

                                        <div class="col-md-12 mb-3">
                                            <label for="tags" class="form-label"><i
                                                    class='bx bx-purchase-tag-alt'></i> Tags</label><br>

                                            @if (session('tags'))
                                                <div class="alert alert-success alert-dismissible fade show mt-3 mb-3"
                                                    role="alert">
                                                    <strong>Weldone!</strong> {{ session('tags') }}
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                        aria-label="Close"></button>
                                                </div>
                                            @endif

                                            <div class="input-group" style="width: 100%">
                                                <div class="" style="width: 95%">
                                                    <select id="tag2" class="form-select" multiple="multiple"
                                                        name="tags[]">
                                                        @if (!empty($tagNames))
                                                            @foreach ($tagNames->unique('tags') as $tag)
                                                                <option value="{{ $tag->id }}">{{ $tag->tags }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                                <div class="" style="width: 5%">
                                                    <button type="button" class="btn btn-sm btn-outline-secondary"
                                                        data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                        style="width: 100%; padding:5px;">+</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="assigned" class="form-label">Assign ticket (default is current
                                                user)</label>
                                            <select class="form-select" id="assigned" name="assigned">
                                                @if ($staffs->isNotEmpty())
                                                    <option selected="" value="">Select user</option>
                                                    @foreach ($staffs as $staff)
                                                        <option value="{{ $staff->id }}"
                                                            @if ($staff->email === $authUserEmail) selected @endif>
                                                            {{ $staff->firstname . ' ' . $staff->lastname }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-md-6 mb-3">
                                            <label for="priorityId" class="form-label">Priority</label>
                                            <select class="form-control @error('priorityId') is-invalid @enderror"
                                                id="priorityId" name="priorityId">
                                                @if ($priorities->isNotEmpty())
                                                    <option selected="" value="">Select priority</option>
                                                    @foreach ($priorities as $priority)
                                                        <option value="{{ $priority->id }}">{{ $priority->name }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @error('priorityId')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="serviceId" class="form-label">Service</label>
                                            <select class="form-control @error('serviceId') is-invalid @enderror"
                                                id="serviceId" name="serviceId">
                                                @if ($services->isNotEmpty())
                                                    <option selected="" value="">Select Service</option>
                                                    @foreach ($services as $service)
                                                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @error('serviceId')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <br>
                            <hr>
                            <br>
                            <div class="row">

                                <div class="col-md-12 mb-3">
                                    <span class="h4 me-2">Ticket Body</span>
                                    <a href="{{ route('support.create') }}" class="btn btn-sm btn-outline-secondary"
                                        data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Refresh"
                                        data-bs-original-title="Refresh"><i class="bx bx-reset"></i></a>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <select class="form-select" id="predefinedReplyNew" name=""
                                        onchange="updateDescriptionNew(); toggleTextAreaNew();">
                                        @if ($predefinedReplies->isNotEmpty())
                                            <option selected disabled value="">Insert predefined reply</option>
                                            @foreach ($predefinedReplies as $predefinedReply)
                                                <option value="{{ $predefinedReply->id }}">{{ $predefinedReply->name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    {{-- Hidden input for "Insert predefined reply" --}}
                                    <input type="hidden" id="selectedOptionIndexNew" name="selectedOptionIndexNew">
                                </div>

                                <div class="col-md-6">
                                    <select class="form-select" id="knowledgeBaseLinkNew" name="knowledgeBaseNew"
                                        onchange="updateDescriptionNew(); toggleTextAreaNew();">
                                        <option selected disabled value="">Insert knowledge base link</option>
                                        @if ($knowledgeBaseLinks->isNotEmpty())
                                            @foreach ($knowledgeBaseLinks as $knowledgeBaseLink)
                                                <option value="{{ $knowledgeBaseLink->id }}">
                                                    {{ $knowledgeBaseLink->subject }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    {{-- Hidden input for "Insert knowledge base link" --}}
                                    <input type="hidden" id="selectedKnowledgeBaseIndexNew"
                                        name="selectedKnowledgeBaseIndexNew">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Description</label>
                                    <div style="display:block;" id="textEditorDivNew">
                                        <textarea class="descriptionContainer" id="editor2" name="message1"></textarea><br>
                                    </div>
                                    <div style="display:none;" id="normalTextAreaDivNew">
                                        <textarea name="message2" id="messageContainerNew" class="form-control" cols="50" rows="10"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="file_name" class="form-label">Attachment</label>
                                    <input type="file" name="file_name[]" class="form-control" id="file_name"
                                        multiple>
                                </div>

                                <div class="d-flex justify-content-end my-3">
                                    <button type="submit" class="btn btn-primary">Open Ticket</button>
                                </div>
                            </div>
                        </section>
                    </form>
                </div>
                {{-- Ticket without contact end --}}

            </div>
        </div>
    </div>

@endsection



@push('js')
    {{-- Text editor  --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor1'))
            .catch(error => {
                console.error(error);
            });
    </script>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor2'))
            .catch(error => {
                console.error(error);
            });
    </script>



    <!-- Multiple Select -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tag1').select2({
                placeholder: 'Select an option',
                width: '100%'
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#tag2').select2({
                placeholder: 'Select an option',
                width: '100%'
            });
        });
    </script>



    {{-- updateDescription() function for predefne replay  --}}
    <script>
        function updateDescription() {

            // Select 'Select tag'
            var select = document.getElementById('predefinedReplay');

            // Take Select Option Index Value
            var takeSelectOptionIndexValue = select.selectedIndex;

            // Set the value of the hidden input field
            document.getElementById('selectedOptionIndex').value = takeSelectOptionIndexValue;

            // Get the input value and assign it to a new variable
            var inputValue = document.getElementById('selectedOptionIndex').value;


            // Store the id in session
            var id = inputValue;
            $.ajax({
                url: '{{ route('store_predefinedReplayId_in_session') }}',
                type: 'POST',
                dataType: 'json',
                data: {
                    id: id,
                    '_token': '{{ csrf_token() }}'
                },
            });
        }
    </script>



    {{-- For knowledge base link  --}}
    <script>
        function updateDescriptionForLink() {
            // Select 'Select tag'
            var select = document.getElementById('knowledgeBaseLink');

            // Take Select Option Index Value
            var takeSelectOptionIndexValue = select.selectedIndex;

            // Set the value of the hidden input field
            document.getElementById('selectedKnowledgeBaseIndex').value = takeSelectOptionIndexValue;

            // Get the input value and assign it to a new variable
            var inputValue = document.getElementById('selectedKnowledgeBaseIndex').value;

            // Store the id in session
            var id = inputValue;
            $.ajax({
                url: '{{ route('store_knowledgeBaseLinkId_in_session') }}',
                type: 'POST',
                dataType: 'json',
                data: {
                    id: id,
                    '_token': '{{ csrf_token() }}'
                },
            });

        }
    </script>

    {{-- Normal Text Field  --}}
    <script>
        function updateDescription() {

            var id1 = $('#predefinedReplay').val();
            var id2 = $('#knowledgeBaseLink').val();

            // Initialize variables to hold the values
            var message1 = '';
            var message2 = '';

            // Check if both select boxes have values selected
            if (id1 && id2) {

                // If both select boxes have values selected
                $.ajax({
                    url: '{{ route('get_predefined_reply_message') }}',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        id: id1,
                        '_token': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        message1 = response.message.message;
                        updateTextarea();
                    },
                });

                $.ajax({
                    url: '{{ route('get_knowledge_base_link') }}',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        id: id2,
                        '_token': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        message2 = response.message.description;
                        updateTextarea();
                    },
                });

            } else {
                // If only one select box has a value selected, update the textarea accordingly
                if (id1) {
                    $.ajax({
                        url: '{{ route('get_predefined_reply_message') }}',
                        type: 'GET',
                        dataType: 'json',
                        data: {
                            id: id1,
                            '_token': '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            message1 = response.message.message;
                            updateTextarea();
                        },
                    });
                }

                if (id2) {
                    $.ajax({
                        url: '{{ route('get_knowledge_base_link') }}',
                        type: 'GET',
                        dataType: 'json',
                        data: {
                            id: id2,
                            '_token': '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            message2 = response.message.description;
                            updateTextarea();
                        },
                    });
                }
            }

            // Function to update the textarea with concatenated values
            function updateTextarea() {
                $('#messageContainer').val(message1 + '\n' + message2);
            }
        }
    </script>


    <script>
        function toggleTextArea() {
            const textEditorDiv = document.getElementById('textEditorDiv');
            const normalTextAreaDiv = document.getElementById('normalTextAreaDiv');

            const predefinedReplaySelectedOption = document.getElementById('predefinedReplay').value;
            const knowledgeBaseLinkSelectedOption = document.getElementById('knowledgeBaseLink').value;

            if (predefinedReplaySelectedOption || knowledgeBaseLinkSelectedOption) {
                textEditorDiv.style.display = 'none';
                normalTextAreaDiv.style.display = 'block';
            } else {
                textEditorDiv.style.display = 'block';
                normalTextAreaDiv.style.display = 'none';
            }
        }
    </script>



    {{-- updateDescriptionNew() function for predefined reply --}}
    <script>
        function updateDescriptionNew() {
            // Select 'Select tag'
            var select = document.getElementById('predefinedReplyNew');

            // Take Select Option Index Value
            var takeSelectOptionIndexValue = select.selectedIndex;

            // Set the value of the hidden input field
            document.getElementById('selectedOptionIndexNew').value = takeSelectOptionIndexValue;

            // Get the input value and assign it to a new variable
            var inputValue = document.getElementById('selectedOptionIndexNew').value;

            // Store the id in session
            var id = inputValue;
            $.ajax({
                url: '{{ route('store_predefinedReplayId_in_session') }}',
                type: 'POST',
                dataType: 'json',
                data: {
                    id: id,
                    '_token': '{{ csrf_token() }}'
                },
            });
        }
    </script>

    {{-- For knowledge base link --}}
    <script>
        function updateDescriptionForLinkNew() {
            // Select 'Select tag'
            var select = document.getElementById('knowledgeBaseLinkNew');

            // Take Select Option Index Value
            var takeSelectOptionIndexValue = select.selectedIndex;

            // Set the value of the hidden input field
            document.getElementById('selectedKnowledgeBaseIndexNew').value = takeSelectOptionIndexValue;

            // Get the input value and assign it to a new variable
            var inputValue = document.getElementById('selectedKnowledgeBaseIndexNew').value;

            // Store the id in session
            var id = inputValue;
            $.ajax({
                url: '{{ route('store_knowledgeBaseLinkId_in_session') }}',
                type: 'POST',
                dataType: 'json',
                data: {
                    id: id,
                    '_token': '{{ csrf_token() }}'
                },
            });
        }
    </script>

    {{-- Normal Text Field --}}
    <script>
        function updateDescriptionNew() {
            var id1 = $('#predefinedReplyNew').val();
            var id2 = $('#knowledgeBaseLinkNew').val();

            // Initialize variables to hold the values
            var message1 = '';
            var message2 = '';

            // Check if both select boxes have values selected
            if (id1 && id2) {
                // If both select boxes have values selected
                $.ajax({
                    url: '{{ route('get_predefined_reply_message') }}',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        id: id1,
                        '_token': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        message1 = response.message.message;
                        updateTextareaNew();
                    },
                });

                $.ajax({
                    url: '{{ route('get_knowledge_base_link') }}',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        id: id2,
                        '_token': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        message2 = response.message.description;
                        updateTextareaNew();
                    },
                });

            } else {
                // If only one select box has a value selected, update the textarea accordingly
                if (id1) {
                    $.ajax({
                        url: '{{ route('get_predefined_reply_message') }}',
                        type: 'GET',
                        dataType: 'json',
                        data: {
                            id: id1,
                            '_token': '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            message1 = response.message.message;
                            updateTextareaNew();
                        },
                    });
                }

                if (id2) {
                    $.ajax({
                        url: '{{ route('get_knowledge_base_link') }}',
                        type: 'GET',
                        dataType: 'json',
                        data: {
                            id: id2,
                            '_token': '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            message2 = response.message.description;
                            updateTextareaNew();
                        },
                    });
                }
            }

            // Function to update the textarea with concatenated values
            function updateTextareaNew() {
                $('#messageContainerNew').val(message1 + '\n' + message2);
            }
        }
    </script>

    <script>
        function toggleTextAreaNew() {
            const textEditorDiv = document.getElementById('textEditorDivNew');
            const normalTextAreaDiv = document.getElementById('normalTextAreaDivNew');

            const predefinedReplySelectedOption = document.getElementById('predefinedReplyNew').value;
            const knowledgeBaseLinkSelectedOption = document.getElementById('knowledgeBaseLinkNew').value;

            if (predefinedReplySelectedOption || knowledgeBaseLinkSelectedOption) {
                textEditorDiv.style.display = 'none';
                normalTextAreaDiv.style.display = 'block';
            } else {
                textEditorDiv.style.display = 'block';
                normalTextAreaDiv.style.display = 'none';
            }
        }
    </script>
@endpush
