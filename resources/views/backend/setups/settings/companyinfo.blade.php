@extends('backend.layouts.main')
@section('title', 'Customer Details')
@section('content')
    <div class="row">

        <div class="col-md-3">
            <h4 class="mt-3 mb-3">Settings</h4>
            @include('backend.partials.settings-sidebar')
        </div>

        <div class="col-md-9">

            <h4 class="mt-3 mb-3">Company Information</h4>

            {{-- successfull message start --}}
            @if (session('group'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Weldone!</strong> {{ session('group') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('settings.companyinfo.update') }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            These information will be displayed on invoices/estimates/payments and other PDF documents where
                            company info is required
                        </div>

                        <div class="col-md-12">
                            <label for="invoice_company_name" class="form-label">Company Name</label>
                            <input type="text" name="invoice_company_name" id="invoice_company_name"
                                value="{{ $invoice_company_name->value }}" class="form-control mb-3">
                            @error('invoice_company_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="invoice_company_address" class="form-label">Address</label>
                            <input type="text" name="invoice_company_address" id="invoice_company_address"
                                value="{{ $invoice_company_address->value }}" class="form-control mb-3">
                            @error('invoice_company_address')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="invoice_company_city" class="form-label">City</label>
                            <input type="text" name="invoice_company_city" id="invoice_company_city"
                                value="{{ $invoice_company_city->value }}" class="form-control mb-3">
                            @error('invoice_company_city')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="company_state" class="form-label">State</label>
                            <input type="text" name="company_state" id="company_state"
                                value="{{ $company_state->value }}" class="form-control mb-3">
                            @error('company_state')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="invoice_company_country_code" class="form-label">Country Code</label>
                            <input type="text" name="invoice_company_country_code" id="invoice_company_country_code"
                                value="{{ $invoice_company_country_code->value }}" class="form-control mb-3">
                            @error('invoice_company_country_code')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="invoice_company_postal_code" class="form-label">Zip Code</label>
                            <input type="text" name="invoice_company_postal_code" id="invoice_company_postal_code"
                                value="{{ $invoice_company_postal_code->value }}" class="form-control mb-3">
                            @error('invoice_company_postal_code')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="invoice_company_phonenumber" class="form-label">Phone</label>
                            <input type="text" name="invoice_company_phonenumber" id="invoice_company_phonenumber"
                                value="{{ $invoice_company_phonenumber->value }}" class="form-control mb-3">
                            @error('invoice_company_phonenumber')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="company_vat" class="form-label">VAT Number</label>
                            <input type="text" name="company_vat" id="company_vat" value="{{ $company_vat->value }}"
                                class="form-control mb-3">
                            @error('company_vat')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="company_info_format" class="form-label">Company Information Format (PDF
                                and HTML)</label>
                            <textarea class="form-control mb-3" rows="5" name="company_info_format" id="company_info_format">{!! $company_info_format->value !!}
                            </textarea>
                            @error('company_info_format')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <p>
                            <a href="#" class="settings-textarea-merge-field"
                                data-to="company_info_format">{company_name}</a>
                            <a href="#" class="settings-textarea-merge-field"
                                data-to="company_info_format">{address}</a>,
                            <a href="#" class="settings-textarea-merge-field"
                                data-to="company_info_format">{city}</a>,
                            <a href="#" class="settings-textarea-merge-field"
                                data-to="company_info_format">{state}</a>,
                            <a href="#" class="settings-textarea-merge-field"
                                data-to="company_info_format">{zip_code}</a>,
                            <a href="#" class="settings-textarea-merge-field"
                                data-to="company_info_format">{country_code}</a>,
                            <a href="#" class="settings-textarea-merge-field"
                                data-to="company_info_format">{phone}</a>,
                            <a href="#" class="settings-textarea-merge-field"
                                data-to="company_info_format">{vat_number}</a>,
                            <a href="#" class="settings-textarea-merge-field"
                                data-to="company_info_format">{vat_number_with_label}</a>
                        </p>


                        <div class="col-md-12 mb-3 text-end">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var mergeFieldLinks = document.querySelectorAll('.settings-textarea-merge-field');
            var textarea = document.getElementById('company_info_format');

            mergeFieldLinks.forEach(function(link) {
                link.addEventListener('click', function(event) {
                    event.preventDefault();
                    var mergeField = this.textContent;
                    var cursorPos = textarea.selectionStart;
                    var textBeforeCursor = textarea.value.substring(0, cursorPos);
                    var textAfterCursor = textarea.value.substring(cursorPos);
                    // Append a newline character after each merge field
                    var mergeFieldWithNewline = mergeField + '\n';
                    textarea.value = textBeforeCursor + mergeFieldWithNewline + textAfterCursor;
                });
            });
        });
    </script>
@endpush
