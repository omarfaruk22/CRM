@extends('backend.layouts.main')
@section('title', 'Custom Fields Create')
@section('content')

    <div class="row">
        <div class="col-xl-8 mx-auto">
            <div class="card">
                <form action="{{ route('setup.custom-fields.store') }}" method="post">
                    @csrf
                    <div class="card-header px-4 py-3">
                        <h5 class="mb-0">Add new custom field</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3 needs-validation" novalidate="">

                            <div class="col-md-12">
                                <label for="fieldto" class="form-label"><span class="text-danger">*</span> Field Belongs
                                    to</label>
                                <select id="fieldto" name="fieldto" class="form-select">
                                    <option selected="" disabled="" value="">Nothing Selected</option>
                                    @foreach ($fieldname as $data)
                                        <option value="{{ $data->field_name }}">{{ $data->field_name }}</option>
                                    @endforeach
                                </select>
                                @error('fieldto')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label for="name" class="form-label"><span class="text-danger">*</span> Field
                                    Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Field Name" value="">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label for="type" class="form-label"><span class="text-danger">*</span> Type</label>
                                <select id="type" name="type" class="form-select">
                                    <option selected="" disabled="" value="">Nothing Selected</option>
                                    @foreach ($typename as $item)
                                        <option value="{{ $item->field_type_name }}">{{ $item->field_type_name }}</option>
                                    @endforeach
                                </select>
                                @error('type')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 Select MultiSelect Chackbox dynamictype" style="display:none;">
                                <label for="options" class="form-label">Options</label>
                                <textarea type="text" class="form-control" rows="4" name="options" id="options" placeholder="options"></textarea>

                            </div>

                            <div class="col-md-12 Textarea dynamictype">
                                <label for="default_value" class="form-label">Default Value</label>
                                <textarea type="text" class="form-control" rows="4" name="default_value" id="default_value"
                                    placeholder="Default Value"></textarea>
                            </div>

                            <div
                                class="col-md-12 Input Number Select MultiSelect Chackbox DatePicker DatetimePicker ColorPicker dynamictype">
                                <label for="default_value" class="form-label">Default Value</label>
                                <input type="text" class="form-control" name="default_value" id="default_value"
                                    placeholder="Default Value" value="">
                            </div>

                            <div class="alert alert-danger alert-dismissible fade show" style="display:none;" id="message"
                                role="alert">
                                <p></p>
                            </div>

                            <div class="col-md-12">
                                <label for="field_order" class="form-label">Order</label>
                                <input type="number" class="form-control" name="field_order" id="field_order"
                                    placeholder="Order">
                            </div>

                            <div class="col-md-12">
                                <label for="bs_column" class="form-label"><span class="text-danger">*</span> Grid (Bootstrap
                                    Column eq. 12) - Max is 12</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-secondary" type="button">col-md-</button>
                                    </div>
                                    <input type="number" class="form-control" name="bs_column" id="bs_column"
                                        placeholder="12" value="12">
                                </div>
                                @error('bs_column')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div
                                class="col-md-12 Company Leads Customers Contacts Contracts Tasks Staff Expenses Invoice Items CreditNote Estimate Proposal Projects Tickets dynamicFields">
                                <div class="form-check">
                                    <input class="form-check-input" name="active" type="checkbox" id="active"
                                        value="1">
                                    <label class="form-check-label" for="active">Disabled</label>
                                </div>
                            </div>

                            <div class="col-md-12 Chackbox dynamictype" style="display:none;">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="display_inline"
                                        id="display_inline" value="1">
                                    <label class="form-check-label" for="display_inline">Display Inline </label>
                                </div>
                            </div>


                            <div
                                class="col-md-12 Company Leads Staff Customers Contacts Contracts Tasks Expenses Invoice Items CreditNote Estimate Proposal Projects Tickets dynamicFields">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="only_admin" id="only_admin"
                                        value="1">
                                    <label class="form-check-label" for="only_admin">Restrict visibility for
                                        administrators only</label>
                                </div>
                            </div>

                            <div class="col-md-12 Customers Contacts Tasks  dynamicFields" style="display:none;">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="disalow_client_to_edit"
                                        id="disalow_client_to_edit" value="1">
                                    <label class="form-check-label" for="disalow_client_to_edit">Disallow Customer To Edit
                                        This Field </label>
                                </div>
                            </div>

                            <div
                                class="col-md-12 Company Leads Staff Customers Contacts Contracts Tasks Expenses Invoice Items CreditNote Estimate Proposal Projects Tickets dynamicFields">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="required" id="required"
                                        value="1">
                                    <label class="form-check-label" for="required">Required</label>
                                </div>
                            </div>

                            <p>Visibility</p>
                            <div
                                class="col-md-12 Company Leads Staff Customers Contacts Contracts Tasks Expenses Invoice Items CreditNote Estimate Proposal Projects Tickets dynamicFields">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="show_on_table"
                                        id="show_on_table" value="1">
                                    <label class="form-check-label" for="show_on_table">Show on table</label>
                                </div>
                            </div>
                            <div style="display:none;"
                                class="col-md-12 Company Customers Contacts Contracts Tasks Invoice CreditNote Estimate Proposal Projects Tickets dynamicFields">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="show_on_client_portal"
                                        id="show_on_client_portal" value="1">
                                    <label class="form-check-label" for="show_on_client_portal">Show on Client
                                        Portal</label>
                                </div>
                            </div>
                            <div class="col-md-12 Invoice Items CreditNote Estimate dynamicFields" style="display:none;">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="show_on_pdf" id="show_on_pdf"
                                        value="1">
                                    <label class="form-check-label" for="show_on_pdf">Show on PDF</label>
                                </div>
                            </div>
                            <div class="col-md-12 Tickets dynamicFields" style="display:none;">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="show_on_ticket_form"
                                        id="show_on_ticket_form" value="1">
                                    <label class="form-check-label" for="show_on_ticket_form">Show on ticket form</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer px-4 py-3">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary px-4" id="submitForm">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script>
        $(document).ready(function() {
            // field to start 
            $("#fieldto").change(function() {
                var selectedOption = $(this).val().split(' ').join('');

                $(".dynamicFields").css("display", "none");
                $("." + selectedOption + ".dynamicFields").css("display", "block");

                if (selectedOption === 'Company' || selectedOption === 'Items') {
                    $('#only_admin').prop('checked', false).prop('disabled', true);
                    $('#required').prop('checked', false).prop('disabled', true);
                    $('#show_on_client_portal').prop('checked', true).prop('disabled', true);
                    $('#show_on_table').prop('checked', true).prop('disabled', true);
                    $('#show_on_pdf').prop('checked', true).prop('disabled', true);
                } else {
                    $('#only_admin').prop('checked', false).prop('disabled', false);
                    $('#required').prop('disabled', false);
                    $('#show_on_client_portal').prop('checked', false).prop('disabled', false);
                    $('#show_on_table').prop('checked', false).prop('disabled', false);
                    $('#show_on_pdf').prop('checked', false).prop('disabled', false);

                }

                if (selectedOption === 'Leads' || selectedOption === 'Staff' || selectedOption ===
                    'Expenses') {
                    $('#only_admin').change(function() {
                        if ($(this).is(':checked')) {
                            $('#active').prop('disabled', false);
                            $('#disalow_client_to_edit').prop('disabled', false);
                        }
                    });
                }

                if (selectedOption === 'Customers' || selectedOption === 'Contacts' || selectedOption ===
                    'Contracts' || selectedOption === 'Tasks' || selectedOption === 'Invoice' ||
                    selectedOption === 'CreditNote' || selectedOption === 'Estimate' || selectedOption ===
                    'Proposal' || selectedOption === 'Projects' || selectedOption ===
                    'Tickets') {
                    $('#only_admin').change(function() {
                        if ($(this).is(':checked')) {
                            $('#show_on_client_portal').prop('disabled', true).prop('checked',
                                false);
                            $('#disalow_client_to_edit').prop('disabled', true).prop('checked',
                                false);
                        } else {
                            $('#show_on_client_portal').prop('disabled', false);
                            $('#disalow_client_to_edit').prop('disabled', false);
                        }
                    });
                }
                // else {
                //     $('#show_on_client_portal').prop('disabled', false);
                //     $('#disalow_client_to_edit').prop('disabled', false);
                // }

            });
            // field to end 
            // type start 
            $("#type").change(function() {

                var selectedtype = $(this).val().split(' ').join('');
                $(".dynamictype").css("display", "none");
                $("." + selectedtype + ".dynamictype").css("display", "block");

                $("." + selectedtype + ".dynamictype").find('#default_value').on("input", function() {
                    const valid = $.Deferred();
                    var value = $(this).val();
                    switch (selectedtype) {
                        case 'Input':
                        case 'Hyperlink ':
                        case 'Textarea':
                            valid.resolve({
                                valid: true,
                            });
                            break;
                        case 'Number':
                            valid.resolve({
                                valid: value === '' ? true : new RegExp(
                                    /^-?(?:\d+|\d*\.\d+)$/).test(
                                    value),
                                message: 'Enter a valid number.',
                            });
                            break;
                        case 'MultiSelect':
                        case 'Chackbox':
                        case 'Select':
                            if (value === '') {
                                valid.resolve({
                                    valid: true,
                                });
                            } else {
                                var defaultOptions = value.split(',')
                                    .map(function(option) {
                                        return option.trim();
                                    }).filter(function(option) {
                                        return option !== ''
                                    });

                                if (type === 'Select' && defaultOptions.length > 1) {
                                    valid.resolve({
                                        valid: true,
                                        message: 'You cannot have multiple options selected on "Select" field type.',
                                    });
                                } else {
                                    var availableOptions = $('#options').val().split(',')
                                        .map(function(option) {
                                            return option.trim();
                                        }).filter(function(option) {
                                            return option !== ''
                                        });

                                    var nonExistentOptions = defaultOptions.filter(function(i) {
                                        return availableOptions.indexOf(i) < 0;
                                    });

                                    valid.resolve({
                                        valid: nonExistentOptions.length === 0,
                                        message: nonExistentOptions.join(',') +
                                            ' options are not available in the options field.',
                                    });
                                }
                            }

                            break;
                        case 'DatePicker':
                        case 'DatetimePicker':
                            var isValid = value === '' || (selectedtype === 'DatePicker' &&
                                /^\d{4}-\d{2}-\d{2}$/.test(value)) || (selectedtype ===
                                'DatetimePicker' && /^\d{4}-\d{2}-\d{2} \d{2}:\d{2}$/.test(
                                    value));

                            valid.resolve({
                                valid: isValid,
                                message: 'Enter date in ' + (selectedtype === 'DatePicker' ?
                                        'Y-m-d' : 'Y-m-d H:i') +
                                    ' format or English date format for the PHP "<a href=\'https://www.php.net/manual/en/function.strtotime.php\'" target="_blank">strtotime</a> function.'
                            });
                            break;
                        case 'ColorPicker':
                            valid.resolve({
                                valid: value === '' ? true : new RegExp(
                                        /^#([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$/gm)
                                    .test(value),
                                message: 'Enter color in HEX format, for example: #f2dede',
                            })
                            break;

                    }
                    valid.then(f => {
                        if (f.valid) {
                            $('#message').hide();
                            $('#submitForm').prop('disabled', false);
                        } else {
                            $('#message').show();
                            $('#message').html(f.message);
                            $('#submitForm').prop('disabled', true);
                        }
                    })

                });
                // type end 
            });
        });
    </script>
@endpush
