
<!DOCTYPE html>
<html dir="ltr">

<head>
 <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!--favicon-->
	<link rel="icon" href="{{ asset('backend/assets/images/favicon-32x32.png') }}" type="image/png"/>
	<!--plugins-->
	<link href="{{ asset('backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet"/>
	<link href="{{ asset('backend/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
	<link href="{{ asset('backend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
	<link href="{{ asset('backend/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet"/>
	<link href="{{ asset('backend/assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
	<!-- loader-->
	{{-- <link href="{{ asset('backend/assets/css/pace.min.css') }}" rel="stylesheet"/>
	<script src="{{ asset('backend/assets/js/pace.min.js') }}"></script> --}}
	<!-- Bootstrap CSS -->
	<link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('backend/assets/css/bootstrap-extended.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="{{ asset('backend/assets/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('backend/assets/css/icons.css') }}" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{ asset('backend/assets/css/dark-theme.css') }}"/>
	<link rel="stylesheet" href="{{ asset('backend/assets/css/semi-dark.css') }}"/>
	<link rel="stylesheet" href="{{ asset('backend/assets/css/header-colors.css') }}"/>
	<title>@yield('title','Smart software LTD')|Smart software LTD</title>
</head>

<body>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-8 m-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <label for="bcc" class="form-label">Subject</label>
                                <input type="text" class="form-control" name="Subject" id="Subject" value="" >
                                @error('bcc')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div> 
                            <div class="col-md-6 mb-2">
                                <label for="bcc" class="form-label">Your name</label>
                                <input type="text" class="form-control" name="Subject" id="Subject" value="" >
                                @error('bcc')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div> 
                            <div class="col-md-6 mb-2">
                                <label for="bcc" class="form-label">Email Address</label>
                                <input type="text" class="form-control" name="Subject" id="Subject" value="" >
                                @error('bcc')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div> 
                            <div class="col-md-12 mb-2">
                                <label for="bcc" class="form-label">Department</label>
                                <select class="form-select" name="" id="">
                                    <option value="">nine</option>
                                    <option value=""></option>
                                    <option value=""></option>
                                </select>
                                @error('bcc')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div> 
                            <div class="col-md-12 mb-2">
                                <label for="bcc" class="form-label">Priority</label>
                                <select class="form-select" name="" id="">
                                    <option value="">Low</option>
                                    <option value="">High</option>
                                    <option value="">Medium</option>
                                </select>
                                @error('bcc')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div> 
                            <div class="col-md-12 mb-2">
                                <label for="bcc" class="form-label">Service</label>
                                <select class="form-select" name="" id="">
                                    <option value="">Ameley</option>
                                    <option value=""></option>
                                    <option value=""></option>
                                </select>
                                @error('bcc')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div> 
                             <div class="col-md-12 mb-2">
                                <label for="company" class="form-label">Message</label>
                                <textarea type="text" name="company" rows="5" id="company" value="" class="form-control mb-3" >
                                   
                                </textarea>
                                @error('company')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 m-auto mb-2">
                                <label for="attachment" class="control-label">Attachments</label>
                                <div class="attachment-group">
                                    <div class="input-group col-md-6">
                                        <input type="file" class="form-control" name="attachments[]" accept=".jpg,.png,.pdf,.doc,.zip,.rar,image/jpeg,image/png,application/pdf,application/msword,application/x-zip,application/x-rar">
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary add_more_attachments" data-max="4" type="button" onclick="addAttachmentField()"><i class="bx bx-plus"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                           <div id="attachmentContainer"></div>
                           <div class="col-md-3 m-auto">
                            <button class="btn btn-success">Submit</button>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    function addAttachmentField() {
        var attachmentContainer = document.getElementById('attachmentContainer');
        var existingInputs = attachmentContainer.querySelectorAll('.attachment-group');

        // Check if the number of existing inputs is less than 4
        if (existingInputs.length < 4) {
            var attachmentGroup = document.createElement('div');
            attachmentGroup.className = 'attachment-group col-md-6 m-auto'; // Ensure all attachment groups have the same size

            var inputGroup = document.createElement('div');
            inputGroup.className = 'input-group';

            var input = document.createElement('input');
            input.type = 'file';
            input.className = 'form-control';
            input.name = 'attachments[]';
            input.accept = '.jpg,.png,.pdf,.doc,.zip,.rar,image/jpeg,image/png,application/pdf,application/msword,application/x-zip,application/x-rar';

            var minusButton = document.createElement('button');
            minusButton.className = 'btn btn-danger remove_attachment';
            minusButton.type = 'button';
            minusButton.innerHTML = '<i class="bx bx-minus"></i>';
            minusButton.onclick = function() {
                attachmentGroup.remove();
            };

            inputGroup.appendChild(input);
            inputGroup.appendChild(minusButton);

            attachmentGroup.appendChild(inputGroup);

            attachmentContainer.appendChild(attachmentGroup);
        } else {
            console.log('You can only add up to 4 attachments.');
        }
    }
</script>
</script>
   <script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js') }}"></script>
	<!--plugins-->
	<script src="{{ asset('backend/assets/js/jquery.min.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/apexcharts-bundle/js/apexcharts.min.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
	<script src="{{asset('backend/assets/plugins/input-tags/js/tagsinput.js')}}"></script>
	<script src="{{asset('backend/assets/js/index.js')}}"></script>
	<!--app JS-->
	<script src="{{ asset('backend/assets/js/app.js') }}"></script>
</body>
</html>