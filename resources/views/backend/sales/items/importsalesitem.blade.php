@extends('backend.layouts.main')
@section('title', 'Customers')
@section('content')
    @push('css')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    @endpush

    <div class="border py-3 mb-3">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="flex-grow-1 ms-3">
                    <span class="text-primary">1. Your CSV data should be in the format below. The first line of your CSV
                        file should be the column headers as in the table example. Also make sure that your file is UTF-8 to
                        avoid unnecessary encoding problems.</span><br>
                    <span class="text-primary">2. If the column you are trying to import is date make sure that is formatted
                        in format Y-m-d (2024-04-06).</span><br>
                    <span class="text-primary">3. Make sure you configure the default contact permission in
                        Setup->Settings->Customers to get the best results like auto assigning contact permissions and email
                        notification settings based on the permission.</span><br>
                    <span class="text-danger">4. Duplicate email rows won't be imported.</span>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <h5>Import Items</h5>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive mb-3">
                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Credit Note #</th>
                            <th scope="col">Credit Note Date</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Status</th>
                            <th scope="col">Project</th>
                            <th scope="col">Reference #</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Remaining Amount</th>
                            <th scope="col">Actions</th> <!-- New column for actions -->
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>CN-002</td>
                            <td>2024-06-09</td>
                            <td>Jane Smith</td>
                            <td><span class="badge bg-danger">Closed</span></td>
                            <td>Project B</td>
                            <td>REF-002</td>
                            <td>$150.00</td>
                            <td>$0.00</td>
                            <td class="">
                                <a href="{{ route('sales.credit.note.edit', ['id' => 1]) }}" class="btn btn-sm">
                                    <span class="text-info mr-2">
                                        <i class='bx bx-edit-alt fs-5'></i>
                                    </span>
                                </a>

                                @php
                                    $invoiceid = 1;
                                @endphp
                                <a href="" class="btn btn-sm">
                                    <span class="text-info mr-2">
                                        <i class='bx bxs-copy fs-5'></i>
                                    </span>

                                </a>

                                <!-- Delete Button -->
                                <a href="#" class="btn btn-sm"data-id="{{ $invoiceid }}" data-bs-toggle="modal"
                                    data-bs-target="#deletesalesInvoiceModal">
                                    <i class='bx bx-trash text-danger fs-5'></i>
                                </a>

                                <!-- Delete Modal -->
                                <div class="modal fade" id="deletesalesInvoiceModal" tabindex="-1"
                                    aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">Delete Credit
                                                    Invoice
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row  ">
                                                    <div class="col">
                                                        <h5 class="text-center ">Are you sure you want to
                                                            delete
                                                            this credit note ?</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <form action="{{ route('delete.credit.note.sales', ['id' => $invoiceid]) }}"
                                                    id="deleteInvoiceForm" method="POST">
                                                    @csrf
                                                    <button type="submit" id="confirmDelete"
                                                        class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <!-- Add more rows as needed with similar structure -->
                    </tbody>
                </table>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Welldone!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row mb-3">
                <form action="{{ route('customers.import_customer.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-4 mb-3">
                        <div class="col-md-12 mb-3">
                            <label for="choose_csv_file" class="form-label"><span class="text-danger">*</span> Choose CSV
                                File</label>
                            <input type="file" class="form-control mb-3" id="choose_csv_file" name="file"
                                value="{{ old('file') }}" placeholder="Choose CSV File">
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
                            <label for="default_password_for_all_contacts" class="form-label">Default password for all
                                contacts</label>
                            <input type="text" name="default_password_for_all_contacts" class="form-control"
                                id="default_password_for_all_contacts">
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
