@extends('backend.layouts.main')
@section('title', 'Customer Statements')
@section('content')

    <div class="row">

        <div class="col-md-3">
            <h4 class="mt-3 mb-3">#{{ $customer->id }} {{ $customer->company }}</h4>
            @include('backend.partials.profile-sidebar')
        </div>

        <div class="col-md-9">
            <div class="d-flex justify-content-between">
                <h4 class="mt-3 mb-3">Statement</h4>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="col-md-4">
                            <select class="form-select mb-3" aria-label="Default select example">
                                <option value="">Select</option>
                                <option value="Option 1">Today </option>
                                <option value="Option 2">This month</option>
                                <option value="Option 2">This Weak</option>
                                <option value="Option 3">Last Month</option>
                                <option value="Option 3">This Month</option>
                                <option value="Option 3">Last Year</option>
                                <option value="Option 3">Period</option>
							</select>
                        </div>
                        <div class="text-end col-md-8">
                            <a href="{{ route('customers.profile.pdf.download',['id' =>$customer->id]) }}" class="btn btn-white"><i class='bx bx-printer'></i></a>
                            <a href="{{ route('customers.profile.pdf.show',['id' =>$customer->id]) }}" target="1"  class="btn btn-white"><i class='bx bxs-file-pdf'></i></a>
                            <a type="button" class="btn btn-white"><i class='bx bxs-envelope'></i></a>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between my-3">
                        <div class="mb-2">
                            <h5>Customer Statement For {{ $customer->company }}</h5>
                        </div>
                        <div class="text-end mb-2">
                            <h6>Perfex INC</h6>
                            <div>455 Foggy Heights, AZ 85004, US</div>
                            <div>(123) 456-789</div>
                            <div>company@example.com</div>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <div class="d-flex justify-content-between my-3">

                        <div class="mb-2">
                            @if ($customer != NULL)
                                <span>To:</span> <br><br>
                                <h6>{{ $customer->company }}</h6>
                                <span>{{ $customer->billing_street }}</span><br>
                                <span>{{ $customer->billing_city }}</span><br>
                                <span>{{ $customer->billing_state }}</span><br>
                                <span>VAT Number: {{ $customer->vat }}</span><br>
                                @if ($contact != NULL)
                                    <span>{{ $contact->email }}</span><br>
                                @endif
                            @endif
                        </div>

                        <div class="mb-2">
                            <h5>Account summary</h5>
                            <p>2024-03-04<span> To </span>2024-03-27</p>

                            <table class="table statement-account-summary">
                                <tbody>
                                    <tr>
                                        <td class="">Beginning Balance:</td>
                                        <td>Rp0.00</td>
                                    </tr>
                                    <tr>
                                        <td>Invoiced Amount:</td>
                                        <td>Rp9,555.00</td>
                                    </tr>
                                    <tr>
                                        <td>Amount Paid:</td>
                                        <td>Rp1,511.00</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td><b>Balance Due</b>:</td>
                                        <td>Rp8,044.00</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="text-center bold padding-10 mb-3">Showing all invoices and payments between 2024-03-01 and 2024-03-31</div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th><b>Date</b></th>
                                            <th><b>Details</b></th>
                                            <th><b>Amount</b></th>
                                            <th><b>Payments</b></th>
                                            <th><b>Balance</b></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>2024-03-01</td>
                                            <td>Beginning Balance</td>
                                            <td>0.00</td>
                                            <td></td>
                                            <td>0.00</td>
                                        </tr>
                                        <tr>
                                            <td>2024-03-26</td>
                                            <td>
                                                Invoice <a href="https://perfexcrm.com/demo/admin/invoices/list_invoices/11" target="_blank">INV-000011</a> - due on 2024-04-25                    </td>
                                            <td>5,870.00</td>
                                            <td></td>
                                            <td>5,870.00</td>
                                        </tr>
                                        <tr>
                                            <td>2024-03-26</td>
                                            <td>
                                                Invoice <a href="https://perfexcrm.com/demo/admin/invoices/list_invoices/18" target="_blank">INV-000017</a> - due on 2024-04-25                    </td>
                                            <td>3,685.00 </td>
                                            <td></td>
                                            <td>9,555.00 </td>
                                        </tr>
                                        <tr>
                                            <td>2024-03-28</td>
                                            <td>
                                                Payment (<a href="https://perfexcrm.com/demo/admin/payments/payment/3" target="_blank">#3</a>) to invoice INV-000011                    </td>
                                            <td> </td>
                                            <td>1,511.00</td>
                                            <td>8,044.00</td>
                                        </tr>
                                    </tbody>
                                    <tfoot class="statement_tfoot">
                                        <tr>
                                            <td colspan="3">
                                                <b>Balance Due</b>
                                            </td>
                                            <td colspan="2">
                                                <b>Rp8,044.00</b>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
