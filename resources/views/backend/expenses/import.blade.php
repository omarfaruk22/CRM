@extends('backend.layouts.main')
@section('title', 'Customers')
@section('content')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
@endpush

<div class="row">
    <div class="col">
        <div class="card">
            <h5 class="card-header">Import Expenses</h5>
            <div class="card-body">
                <div class=" py-3 mb-3">
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
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="col mt-5">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Amount</th>
                                    <th>Tax</th>
                                    <th>Tax2</th>
                                    <th>Reference no</th>
                                    <th>Note</th>
                                    <th>Expense name</th>
                                    <th>Customer</th>
                                    <th>Billable</th>
                                    <th>Payment Mode</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Sample data</td>
                                    <td>Sample data</td>
                                    <td>Sample data</td>
                                    <td>Sample data</td>
                                    <td>Sample data</td>
                                    <td>Sample data</td>
                                    <td>Sample data</td>
                                    <td>Sample data</td>
                                    <td>Sample data</td>
                                    <td>Sample data</td>
                                    <td>Sample data</td>
                                </tr>
                                <!-- Add more rows as needed -->
                            </tbody>
                        </table>
                    </div>
                </div>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Welldone!</strong> {{session('success')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif



                <div class="row mb-3 mt-5">
                    <form action="{{ route('customers.import_customer.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-4 mb-3">
                            <div class="col-md-12 mb-3">
                                <label for="choose_csv_file" class="form-label"><span class="text-danger">*</span> Choose CSV File</label>
                                <input type="file" class="form-control mb-3" id="choose_csv_file" name="file" value="{{old ('file')}}" placeholder="Choose CSV File">
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
                            <div class="col-md-12 mb-3">
                                <label for="default_password_for_all_contacts" class="form-label">Default password for all contacts</label>
                                <input type="text" name="default_password_for_all_contacts" class="form-control" id="default_password_for_all_contacts">
                            </div>
                            <div class="col-md-3 mx-auto mb-3">
                                <button type="submit" class="btn btn-primary me-3">Import</button>

                            </div>
                        </div>

                    </form>
                </div>


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
			$('#groups').select2({
				placeholder: 'Select an option',
				width: '100%'
			});
		});
	</script>
@endpush
