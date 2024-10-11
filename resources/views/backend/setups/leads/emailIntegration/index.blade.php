@extends('backend.layouts.main')
@section('title', 'Email Integration')
@section('content')

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    <style>
        #statusSelectContainer {
            width: 100%;
        }

        #sourceSelectContainer {
            width: 100%;
        }
    </style> 
@endpush


    <div class="row">

        <div class="mb-4">
            <div class="d-flex justify-content-between mb-2">
                <div class="">
                    <h5>Email Integration</h5>
                </div>
                <div class="">
                    <a type="button" class="btn btn-primary"
                        href="{{ route('setup.leads.emailIntegration.spamfilter') }}">Spam Filters</a>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('setup.leads.emailIntegration.update', $emailIntegrations->id) }}" method="POST">
                        @csrf

                        <div id="test-l-1" role="tabpanel" class="bs-stepper-pane" aria-labelledby="stepper1trigger1">

                            <div class="form-check">
                                <input class="form-check-input" name="active" type="checkbox" value="1" id="active" {{ ($emailIntegrations->active == 1) ? 'checked' : ''}}>
                                <label class="form-check-label" for="active">Active</label>
                            </div>

                            <div class="row g-3">

                                <div class="col-md-6">
                                    <label for="imap_server" class="form-label"><span style="color: red">*</span> IMAP Server</label>
                                    <input name="imap_server" type="text" class="form-control @error('imap_server')is-invalid @enderror" id="imap_server" value="{{ $emailIntegrations->imap_server }}" placeholder="IMAP Server">
                                    @error('imap_server')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                <div class="col-md-6">
                                    <label for="lead_status" class="form-label"><span style="color: red">*</span> Default Status</label>
                                    <div class="input-group" id="statusInputContainer">
                                        <div class="col-md-6" id="statusSelectContainer">
                                            <div id="statusSelect" style="display: flex;">
                                                <select name="lead_status" class="form-select @error('lead_status') is-invalid @enderror w-100" id="lead_status">
                                                    <option value="">Select.......</option>
                                                    @if ($statuses->isNotEmpty())
                                                        @foreach ($statuses as $status)
                                                            <option value="{{ $status->id }}" {{ ($emailIntegrations->lead_status == $status->id) ? 'selected' : ''}}>{{ $status->name }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    @error('lead_status')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                <div class="col-md-6">
                                    <label for="email" class="form-label"><span style="color: red">*</span>Email address (Login)</label>
                                    <input name="email" type="text" class="form-control @error('email')is-invalid @enderror" id="email" placeholder="Email Address" value="{{ $emailIntegrations->email }}">
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="lead_source" class="form-label"><span style="color: red">*</span> Default Source</label>
                                    <div class="input-group" id="sourceInputContainer" style="display: flex; align-items: center;">
                                        <div class="col-md-6" id="sourceSelectContainer">
                                            <div id="sourceSelect" style="display: flex;">
                                                <select name="lead_source" class="form-select @error('lead_source') is-invalid @enderror w-100" id="inputGroupSelect02" style="width: auto;">
                                                    <option value="">Select......</option>
                                                    @foreach ($sources as $source)
                                                        <option value="{{ $source->id }}" {{ ($emailIntegrations->lead_source == $source->id) ? 'selected' : ''}}>{{ $source->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    @error('lead_source')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="password" class="form-label"><span style="color: red">*</span>Password</label>
                                    <input name="password" type="password" class="form-control @error('password')is-invalid @enderror" id="password" placeholder="Password" value="{{ $emailIntegrations->password }}">
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="responsible" class="form-label"><span style="color: red">*</span> Responsible for new lead</label>
                                    <select name="responsible" class="form-select form-control @error('responsible') is-invalid @enderror">
                                        <option value="">Select........</option>
                                        @foreach ($responsibles as $responsible)
                                            <option value="{{ $responsible->id }}" {{ ($emailIntegrations->responsible == $responsible->id) ? 'selected' : ''}}>{{ $responsible->firstname }}</option>
                                        @endforeach
                                    </select>
                                    @error('responsible')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-6">

                                    <div class="col-md-12 mb-3">
                                        <label for="" class="form-label">Encryption</label>
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value="tls" name="encryption" id="encryption1" {{ ($emailIntegrations->encryption == 'tls') ? 'checked' : ''}}>
                                                <label class="form-check-label" for="encryption1">TLS</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value="ssl" name="encryption" id="encryption2" {{ ($emailIntegrations->encryption == 'ssl') ? 'checked' : ''}}>
                                                <label class="form-check-label" for="encryption2">SSL</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" value="noEncryption"name="encryption" id="encryption3" {{ ($emailIntegrations->encryption == 'noEncryption') ? 'checked' : ''}}>
                                                <label class="form-check-label" for="encryption3">No Encryption</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label mt-2" for="folder" ><span style="color: red">*</span>Folder Retrieve Folders</label>
                                        <select name="folder" class="form-select @error('folder') is-invalid @enderror" id="folder">
                                            <option value="">Select......</option>
                                            <option value="INBOX" {{ ($emailIntegrations->folder == 'INBOX') ? 'selected' : ''}}>INBOX</option>
                                        </select>
                                        @error('folder')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="check_every" class="form-label mt-2"><span style="color: red">*</span>Check Every (minutes)</label>
                                        <input name="check_every" type="number" class="form-control @error('check_every') is-invalid @enderror" id="check_every" value="{{$emailIntegrations->check_every}}">
                                        @error('check_every')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-12 mb-3">

                                        <div class="form-check mb-2">
                                            <input name="only_loop_on_unseen_emails" class="form-check-input" type="checkbox" value="1" id="only_loop_on_unseen_emails" {{ ($emailIntegrations->only_loop_on_unseen_emails == 1) ? 'checked' : ''}}>
                                            <label class="form-check-label" for="only_loop_on_unseen_emails">Only check non opened emails</label>
                                        </div>

                                        <div class="form-check mb-2">
                                            <input name="create_task_if_customer" class="form-check-input" type="checkbox" value="1" id="create_task_if_customer" {{ ($emailIntegrations->create_task_if_customer == 1) ? 'checked' : ''}}>
                                            <label class="form-check-label" for="create_task_if_customer">Create task if email sender is already customer and assign to responsible staff member.</label>
                                        </div>

                                        <div class="form-check">
                                            <input name="delete_after_import" class="form-check-input" type="checkbox" value="1" id="delete_after_import" {{ ($emailIntegrations->delete_after_import == 1) ? 'checked' : ''}}>
                                            <label class="form-check-label" for="delete_after_import"> Delete mail after import? </label>
                                        </div>

                                        <div class="form-check mb-3">
                                            <input name="mark_public" class="form-check-input" type="checkbox" value="1" id="mark_public" {{ ($emailIntegrations->mark_public == 1) ? 'checked' : ''}}>
                                            <label class="form-check-label" for="mark_public"> Auto mark as public</label>
                                        </div>
                                    </div>

                                </div>


                                <div class="col-md-6">
                                    <hr>
                                    <label for="" class="form-label">Notification settings</label>

                                    <div class="form-check">
                                        <input id="notify_lead_imported" name="notify_lead_imported" class="form-check-input notify-check" type="checkbox" value="1" {{ ($emailIntegrations->notify_lead_imported == 1) ? 'checked' : ''}}>
                                        <label for="notify_lead_imported" class="form-check-label">Notify when lead imported</label>
                                    </div>

                                    <div class="form-check">
                                        <input name="notify_lead_contact_more_times" class="form-check-input notify-check" type="checkbox" value="1" id="notify_lead_contact_more_times" {{ ($emailIntegrations->notify_lead_contact_more_times == 1) ? 'checked' : ''}}>
                                        <label class="form-check-label" for="notify_lead_contact_more_times">Notify if lead send email multiple times</label>
                                    </div>


                                    <hr>
                                    <div class="d-none align-items-center gap-3"  id="hiddenDiv">

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="notify_type" value="roles" id="staff_members_with_roles" {{ ($emailIntegrations->notify_type == 'roles') ? 'checked' : ''}}>
                                            <label class="form-check-label" for="staff_members_with_roles">Staff members with roles</label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="notify_type" value="specific staff" id="specific_staff_members" {{ ($emailIntegrations->notify_type == 'specific staff') ? 'checked' : ''}}>
                                            <label class="form-check-label" for="specific_staff_members">Specific Staff Members</label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="notify_type" value="assigned" id="responsible_person" {{ ($emailIntegrations->notify_type == 'assigned') ? 'checked' : ''}}>
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
                                                            $notifyIds = $emailIntegrations->notify_ids;
                                                            $notifyIds = explode(',', $notifyIds);
                                                        @endphp
                                                        <option value="{{ $role->id }}" 
                                                            @foreach ($notifyIds as $id)
                                                                {{ ($id == $role->id && $emailIntegrations->notify_type == 'roles') ? 'selected' : ''}}
                                                            @endforeach >
                                                            {{ $role->name }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="d-none mt-3" id="ssmHiddenDiv">
                                        <span>Staff Members to Notify</span>
                                        <select id="staff" class="form-select" multiple="multiple" name="notify_ids[]">
                                            <option value="">Select......</option>
                                            @if ($staffs->isNotEmpty())
                                                @foreach ($staffs as $staff)
                                                    @php
                                                        $notifyIds = $emailIntegrations->notify_ids;
                                                        $notifyIds = explode(',', $notifyIds);
                                                    @endphp
                                                    <option value="{{ $staff->id }}" 
                                                        @foreach ($notifyIds as $id)
                                                            {{ ($id == $staff->id && $emailIntegrations->notify_type == 'specific staff') ? 'selected' : ''}}
                                                        @endforeach>
                                                        {{ $staff->firstname }} {{ $staff->lastname }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="d-flex justify-content-between mt-4 mb-2">
                                <div class="me-2 d-flex"></div>
                                <div class="">
                                    <div class="d-flex">
                                        <div class="col">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection


@section("page-script")

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


@endsection





