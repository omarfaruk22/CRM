@extends('backend.layouts.main')
@section('title', 'Customer Details')
@section('content')
    @push('css')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @endpush
    <div class="row">

        <div class="col-md-3">
            <h4 class="mt-3 mb-3">Settings</h4>
            @include('backend.partials.settings-sidebar')
        </div>

        <div class="col-md-9">

            <h4 class="mt-3 mb-3">PDF</h4>

            {{-- successfull message start --}}
            @if (session('group'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Weldone!</strong> {{ session('group') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            {{-- successfull message end --}}

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('settings.pdf.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-pills mb-3 col-md-6" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" data-bs-toggle="pill" href="#primary-pills-general"
                                            role="tab" aria-selected="false" tabindex="-1">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"></div>
                                                <div class="tab-title">General</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link " data-bs-toggle="pill" href="#primary-pills-signature"
                                            role="tab" aria-selected="true">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"></div>
                                                <div class="tab-title">Signature</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link " data-bs-toggle="pill" href="#primary-pills-formets"
                                            role="tab" aria-selected="true">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"></div>
                                                <div class="tab-title">Document Formets</div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <hr>
                        <div class="tab-content" id="pills-tabContent">
                            {{-- general start  --}}
                            <div class="tab-pane fade active show" id="primary-pills-general" role="tabpanel">
                                <div class="row">

                                    <div class="col-md-12 mb-2 ">
                                        <level for="pdf_font" class="form-lavel">PDF Font</level>
                                        <select class="form-select mt-2" id="pdf_font" name="pdf_font">
                                            @foreach ($fonts as $font)
                                                <option value="{{ $font->value }}"
                                                    {{ $font->value == $pdf_font->value ? 'selected' : '' }}>
                                                    {{ $font->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Swap Company/Customer Details (company details to right side,
                                            customer
                                            details to left side)</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio" name="swap_pdf_info"
                                                    id="swap_pdf_info1" value="1"
                                                    @if ($swap_pdf_info->value == 1) checked @endif>
                                                <label class="form-check-label" for="swap_pdf_info1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio" name="swap_pdf_info"
                                                    id="swap_pdf_info2" value="0"
                                                    @if ($swap_pdf_info->value != 1) checked @endif>
                                                <label class="form-check-label" for="swap_pdf_info2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-2">
                                        <label for="pdf_font_size" class="form-label">Default font size</label>
                                        <input type="number" name="pdf_font_size" class="form-control mb-2"
                                            id="pdf_font_size" value="{{ $pdf_font_size->value }}">
                                    </div>


                                    <div class="col-md-12 mb-2">
                                        <label for="pdf_table_heading_color" class="form-label">Items table heading
                                            color</label>
                                        <input type="text" name="pdf_table_heading_color" id="pdf_table_heading_color"
                                            class="jscolor form-control mb-2"
                                            value="{{ $pdf_table_heading_color->value }}">
                                    </div>


                                    <div class="col-md-12 mb-2">
                                        <label for="pdf_table_heading_text_color" class="form-label">Items table
                                            heading
                                            text
                                            color</label>
                                        <input type="text" name="pdf_table_heading_text_color"
                                            id="pdf_table_heading_text_color" class="jscolor form-control mb-2"
                                            value="{{ $pdf_table_heading_text_color->value }}">
                                    </div>

                                    <div class="col-md-12 mb-2">
                                        <label for="custom_pdf_logo_image_url" class="form-label">Custom PDF Company
                                            Logo
                                            URL</label>
                                        <input type="text" name="custom_pdf_logo_image_url" class="form-control mb-2"
                                            id="custom_pdf_logo_image_url"
                                            value="{{ $custom_pdf_logo_image_url->value }}">
                                    </div>

                                    <div class="col-md-12 mb-2">
                                        <label for="pdf_logo_width" class="form-label">Logo Width (PX)</label>
                                        <input type="number" name="pdf_logo_width" class="form-control mb-2"
                                            id="pdf_logo_width" value="{{ $pdf_logo_width->value }}">
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Show Invoice/Estimate/Credit Note status on PDF documents</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_status_on_pdf_ei" id="show_status_on_pdf_ei1"
                                                    value="1" @if ($show_status_on_pdf_ei->value == 1) checked @endif>
                                                <label class="form-check-label" for="show_status_on_pdf_ei1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_status_on_pdf_ei" id="show_status_on_pdf_ei2"
                                                    value="0" @if ($show_status_on_pdf_ei->value != 1) checked @endif>
                                                <label class="form-check-label" for="show_status_on_pdf_ei2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Show Pay Invoice link to PDF (Not applied if invoice status
                                            is
                                            Cancelled)</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_pay_link_to_invoice_pdf" id="show_pay_link_to_invoice_pdf1"
                                                    value="1" @if ($show_pay_link_to_invoice_pdf->value == 1) checked @endif>
                                                <label class="form-check-label" for="show_pay_link_to_invoice_pdf1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_pay_link_to_invoice_pdf" id="show_pay_link_to_invoice_pdf2"
                                                    value="0" @if ($show_pay_link_to_invoice_pdf->value != 1) checked @endif>
                                                <label class="form-check-label" for="show_pay_link_to_invoice_pdf2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <p class="form">Show invoice payments (transactions) on PDF</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_transactions_on_invoice_pdf"
                                                    id="show_transactions_on_invoice_pdf1" value="1"
                                                    @if ($show_transactions_on_invoice_pdf->value == 1) checked @endif>
                                                <label class="form-check-label" for="show_transactions_on_invoice_pdf1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_transactions_on_invoice_pdf"
                                                    id="show_transactions_on_invoice_pdf2" value="0"
                                                    @if ($show_transactions_on_invoice_pdf->value != 1) checked @endif>
                                                <label class="form-check-label" for="show_transactions_on_invoice_pdf2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Show page number on PDF</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_page_number_on_pdf" id="show_page_number_on_pdf1"
                                                    value="1" @if ($show_page_number_on_pdf->value == 1) checked @endif>
                                                <label class="form-check-label" for="show_page_number_on_pdf1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_page_number_on_pdf" id="show_page_number_on_pdf2"
                                                    value="0" @if ($show_page_number_on_pdf->value != 1) checked @endif>
                                                <label class="form-check-label" for="show_page_number_on_pdf2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-3 text-end">
                                        <button type="submit" class="btn btn-primary">Save Settings</button>
                                    </div>


                                </div>
                            </div>
                            {{-- general end  --}}
                            {{-- Signature start  --}}
                            <div class="tab-pane fade " id="primary-pills-signature" role="tabpanel">
                                <div class="row">

                                    <div class="col-md-12">
                                        <p class="form">Show PDF Signature on Invoice</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_pdf_signature_invoice" id="show_pdf_signature_invoice1"
                                                    value="1" @if ($show_pdf_signature_invoice->value == 1) checked @endif>
                                                <label class="form-check-label" for="show_pdf_signature_invoice1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_pdf_signature_invoice" id="show_pdf_signature_invoice2"
                                                    value="0" @if ($show_pdf_signature_invoice->value != 1) checked @endif>
                                                <label class="form-check-label" for="show_pdf_signature_invoice2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Show PDF Signature on Estimate</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_pdf_signature_estimate" id="show_pdf_signature_estimate1"
                                                    value="1" @if ($show_pdf_signature_estimate->value == 1) checked @endif>
                                                <label class="form-check-label" for="show_pdf_signature_estimate1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_pdf_signature_estimate" id="show_pdf_signature_estimate2"
                                                    value="0" @if ($show_pdf_signature_estimate->value != 1) checked @endif>
                                                <label class="form-check-label" for="show_pdf_signature_estimate2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Show PDF Signature on Credit Note</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_pdf_signature_credit_note"
                                                    id="show_pdf_signature_credit_note1" value="1"
                                                    @if ($show_pdf_signature_credit_note->value == 1) checked @endif>
                                                <label class="form-check-label" for="show_pdf_signature_credit_note1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_pdf_signature_credit_note"
                                                    id="show_pdf_signature_credit_note2" value="0"
                                                    @if ($show_pdf_signature_credit_note->value != 1) checked @endif>
                                                <label class="form-check-label" for="show_pdf_signature_credit_note2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Show PDF Signature on Contract</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_pdf_signature_contract" id="show_pdf_signature_contract1"
                                                    value="1" @if ($show_pdf_signature_contract->value == 1) checked @endif>
                                                <label class="form-check-label" for="show_pdf_signature_contract1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_pdf_signature_contract" id="show_pdf_signature_contract2"
                                                    value="0" @if ($show_pdf_signature_contract->value != 1) checked @endif>
                                                <label class="form-check-label" for="show_pdf_signature_contract2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <p class="form">Show PDF Signature on Proposal</p>
                                        <div class="mb-3 col-md-12 d-flex">
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_pdf_signature_proposal" id="show_pdf_signature_proposal1"
                                                    value="1" @if ($show_pdf_signature_proposal->value == 1) checked @endif>
                                                <label class="form-check-label" for="show_pdf_signature_proposal1">
                                                    Yes
                                                </label>
                                            </div>
                                            <div class="me-2">
                                                <input class="form-check-input" type="radio"
                                                    name="show_pdf_signature_proposal" id="show_pdf_signature_proposal2"
                                                    value="0" @if ($show_pdf_signature_proposal->value != 1) checked @endif>
                                                <label class="form-check-label" for="show_pdf_signature_proposal2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-2">
                                        <label for="signature_image" class="form-label">Signature Image</label>
                                        <input type="file" name="signature_image" class="form-control mb-2"
                                            id="signature_image">
                                    </div>

                                    <div class="col-md-12 mb-3 text-end">
                                        <button type="submit" class="btn btn-primary">Save Settings</button>
                                    </div>

                                </div>
                            </div>
                            {{-- Signature end  --}}
                            {{-- document Formets start  --}}
                            <div class="tab-pane fade " id="primary-pills-formets" role="tabpanel">
                                <div class="row">

                                    <div class="col-md-12 mb-3 ">
                                        <level for="pdf_format_invoice" class="form-lavel">Invoice</level>
                                        <select class="form-select mt-2" name="pdf_format_invoice"
                                            id="pdf_format_invoice">
                                            @foreach ($formats as $format)
                                                <option value="{{ $format->value }}"
                                                    {{ $format->value == $pdf_format_invoice->value ? 'selected' : '' }}>
                                                    {{ $format->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="col-md-12 mb-3 ">
                                        <level for="pdf_format_estimate" class="form-lavel">Estimate</level>
                                        <select class="form-select mt-2" name="pdf_format_estimate"
                                            id="pdf_format_estimate">
                                            @foreach ($formats as $format)
                                                <option value="{{ $format->value }}"
                                                    {{ $format->value == $pdf_format_estimate->value ? 'selected' : '' }}>
                                                    {{ $format->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-12 mb-3 ">
                                        <level for="pdf_format_proposal" class="form-lavel">Proposal</level>
                                        <select class="form-select mt-2" name="pdf_format_proposal"
                                            id="pdf_format_proposal">
                                            @foreach ($formats as $format)
                                                <option value="{{ $format->value }}"
                                                    {{ $format->value == $pdf_format_proposal->value ? 'selected' : '' }}>
                                                    {{ $format->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-12 mb-3 ">
                                        <level for="pdf_format_payment" class="form-lavel">Payment</level>
                                        <select class="form-select mt-2" name="pdf_format_payment"
                                            id="pdf_format_payment">
                                            @foreach ($formats as $format)
                                                <option value="{{ $format->value }}"
                                                    {{ $format->value == $pdf_format_payment->value ? 'selected' : '' }}>
                                                    {{ $format->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-12 mb-3 ">
                                        <level for="cal" class="form-lavel">Credit Note</level>
                                        <select class="form-select mt-2" name="pdf_format_credit_note"
                                            id="pdf_format_credit_note">
                                            @foreach ($formats as $format)
                                                <option value="{{ $format->value }}"
                                                    {{ $format->value == $pdf_format_credit_note->value ? 'selected' : '' }}>
                                                    {{ $format->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-12 mb-3 ">
                                        <level for="pdf_format_contract" class="form-lavel">Contract</level>
                                        <select class="form-select mt-2" name="pdf_format_contract"
                                            id="pdf_format_contract">
                                            @foreach ($formats as $format)
                                                <option value="{{ $format->value }}"
                                                    {{ $format->value == $pdf_format_contract->value ? 'selected' : '' }}>
                                                    {{ $format->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-12 mb-3 ">
                                        <level for="pdf_format_statement" class="form-lavel">Statement</level>
                                        <select class="form-select mt-2" name="pdf_format_statement"
                                            id="pdf_format_statement">
                                            @foreach ($formats as $format)
                                                <option value="{{ $format->value }}"
                                                    {{ $format->value == $pdf_format_statement->value ? 'selected' : '' }}>
                                                    {{ $format->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-12 mb-3 text-end">
                                        <button type="submit" class="btn btn-primary">Save Settings</button>
                                    </div>

                                </div>
                            </div>
                            {{-- docoument formet end  --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{-- color picker start  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jscolor/2.4.5/jscolor.min.js"></script>
    <script>
        window.addEventListener("DOMContentLoaded", function() {
            var colorInput = document.getElementById("heading");
            var picker = new jscolor(colorInput);
            picker.fromHSV(0, 100, 100); // Set initial color (optional)
            picker.onFineChange = function() {
                colorInput.value = '#' + this.rgbToHex(this.rgb[0], this.rgb[1], this.rgb[2]);
            };
        });
        window.addEventListener("DOMContentLoaded", function() {
            var colorInput = document.getElementById("headingtext");
            var picker = new jscolor(colorInput);
            picker.fromHSV(0, 100, 100); // Set initial color (optional)
            picker.onFineChange = function() {
                colorInput.value = '#' + this.rgbToHex(this.rgb[0], this.rgb[1], this.rgb[2]);
            };
        });
    </script>
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('#font1').select2();
        });
    </script>
@endpush
