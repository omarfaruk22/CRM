@extends('backend.layouts.main')
@section('title', 'Customer Details')
@section('content')


<div class="row">
    <div class="col-md-4">
        <h4 class="mt-3 mb-3">Payment for Invoice INV-000006</h4>
        <div class="card">
            <div class="card-body">
                <form action="" method="POST">
                    <div class="row">
                        <div class="mb-3">
                            <label class="form-label"><span style="color: red">*</span> Amount Received</label>
                            <input type="text" name="first_name" placeholder=" Amount Received"  class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><span style="color: red">*</span> Payment Date</label>
                            <input type="date" name="first_name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Payment Mode</label>
                            <select name="" class="form-control" id="">
                                <option value="bank">Bank</option>
                                <option value="bank">Other</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Payment Method</label>
                            <input type="text" name="first_name" placeholder="Payment Method"  class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Transection ID</label>
                            <input type="text" name="first_name" placeholder="Transection ID"  class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Note</label>
                            <textarea type="text" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-12 text-end">
                        <button class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="d-flex justify-content-between">
            <h4 class="mt-3">Payment</h4>
            <button type="button" class="btn btn-success mt-3 mb-2">X</button>
        </div>
        <div class="card">
            <div class="card-body">
                <div id="invoice">
                    <div class="d-flex justify-content-between my-3">
                        <div class="mb-2">
                            <h6>Barton PLC</h6>
                            <div>455 Foggy Heights, AZ 85004, US</div>
                            <div>(123) 456-789</div>
                            <div>company@example.com</div>
                        </div>
                        <div class="text-end mb-2">
                            <h6>Perfex INC</h6>
                            <div>455 Foggy Heights, AZ 85004, US</div>
                            <div>(123) 456-789</div>
                            <div>company@example.com</div>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <h4>PAYMENT RECEIPT</h4>
                    </div>
                    <div class="col-md-6">
                        <p class="">Payment Date: 28/03/2024</span></p>
                        <hr>
                        <p>Payment Mode: Bank </p>
                        <div class="bg-success p-4 text-white rounded mb-3">
                            Total Amount<br>
                            $676.00
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h5>Payment For</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th><b>Invoice Number</b></th>
                                        <th><b>Invoice Date</b></th>
                                        <th><b>Invoice Amount</b></th>
                                        <th><b>Payment Amount</b></th>
                                        <th><b>Amount Due</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>INV-000006</td>
                                        <td>30/03/2024</td>
                                        <td>$3,332.00</td>
                                        <td>$676.00</td>
                                        <td>$2,656.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection












