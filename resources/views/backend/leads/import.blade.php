@extends('backend.layouts.main')
@section('title', 'Leads Import')
@section('content')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
@endpush

<div class="border py-3 mb-3">
	<div class="card-body">
		<div class="d-flex align-items-center">
			<div class="flex-grow-1 ms-3">
                <span class="text-primary">1. Your CSV data should be in the format below. The first line of your CSV file should be the column headers as in the table example. Also make sure that your file is UTF-8 to avoid unnecessary encoding problems.</span><br>
                <span class="text-primary">2. If the column you are trying to import is date make sure that is formatted in format Y-m-d (2024-04-06).</span><br>
                <span class="text-primary">3. Make sure you configure the default contact permission in Setup->Settings->Customers to get the best results like auto assigning contact permissions and email notification settings based on the permission.</span><br>
                <span class="text-danger">4. Duplicate email rows won't be imported.</span>
			</div>
		</div>
	</div>
</div>
<div class="mb-3">
    <h5>Import Leads</h5>
</div>
<div class="card">
	<div class="card-body">
        <div class="table-responsive mb-5">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col"><span class="text-danger">*</span> Firstname <br> <span class="text-primary">Contact field</span></th>
                        <th scope="col"><span class="text-danger">*</span> Lastname <br> <span class="text-primary">Contact field</span></th>
                        <th scope="col"><span class="text-danger">*</span> Email <br> <span class="text-primary">Contact field</span></th>
                        <th scope="col"> Contact phonenumber <br> <span class="text-primary">Contact field</span></th>
                        <th scope="col"> Position <br> <span class="text-primary">Contact field</span></th>
                        <th scope="col"><span class="text-danger">*</span> Company <br></th>
                        <th>Vat</th>
                        <th>Phonenumber</th>
                        <th>Country</th>
                        <th>City</th>
                        <th>Zip</th>
                        <th>State</th>
                        <th>Address</th>
                        <th>Website</th>
                        <th>Billing street</th>
                        <th>Billing city</th>
                        <th>Billing state</th>
                        <th>Billing zip</th>
                        <th>Billing country</th>
                        <th>Shipping street</th>
                        <th>Shipping city</th>
                        <th>Shipping state</th>
                        <th>Shipping zip</th>
                        <th>Shipping country</th>
                        <th>Longitude</th>
                        <th>Latitude</th>
                        <th>Stripe id</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th></th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <th></th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <th></th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <th></th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Welldone!</strong> {{session('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row mb-3">
            <form action="{{ route('lead.importup') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-4 mb-3">
                    <div class="col-md-12 mb-3">
                        <label for="choose_csv_file" class="form-label"><span class="text-danger">*</span> Choose CSV File</label>
                        <input type="file" class="form-control mb-3" id="choose_csv_file" name="file" value="" placeholder="Choose CSV File">
                        @error('file')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="groups" class="form-label">Groups</label><br>
                        <select id="groups" name="groups[]" class="form-select" multiple="multiple">
                            <option value="option1">Option 1</option>
                            <option value="option2">Option 2</option>
                            <option value="option3">Option 3</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="default_password_for_all_contacts" class="form-label">Default password for all contacts</label>
                        <input type="text" name="default_password_for_all_contacts" class="form-control" id="default_password_for_all_contacts">
                    </div>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary me-3">Import</button>

                </div>
            </form>
        </div>
	</div>
</div>


@endsection

@push('js')
	<!-- Include Select2 JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#groups').select2({
				placeholder: 'Select an option',
				width: '100%'
			});
		});
	</script>
@endpush
