@extends('backend.layouts.main')
@section('title', 'Customer Details')
@section('content')
<div class="row">
    <div class="col-md-8">
            <h4 class="mt-3 mb-3">New Subscriptions</h4>
        <div class="card">
            <form action="">
            <div class="card-body">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12 mb-3">
                            <level for="website" class="form-label">Billing Plan</level>
                                <select class="form-select "id="append-button-single-field" data-placeholder="Choose one thing">
                                    <option>Select plan</option>
                                    <option>Weekly</option>
                                    <option>Monthly</option>
                                </select>
                        </div>
                        <div class="col-md-12 ">
                            <level for="quantity" class="form-label">Quantity</level>
                            <input type="number" id="quantity" name="quantity" class="form-control" value="" aria-invalid="false">
                        </div>
                    </div>
                </div>
                            <div class="col-md-12 mb-3">
                                <level for="subscriptionname" class="form-label">Subscription Name</level>
                                <input type="text" id="subscriptionname" name="subscriptionname" class="form-control" value="" >
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="description" class="form-label">Description:</label>
                                <textarea id="description" class="form-control" rows="4"></textarea>
                            </div>
                            <div class="mb-3 col-md-12 mb-3">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked="">
                                <label class="form-check-label" for="flexSwitchCheckChecked"> Include description in invoice item</label>
                            </div>
                                <div class="col-md-12 mb-3">
                            <level for="customer" class="form-label">Customer</level>
                                <select class="form-select">
                                    <option>Select customer</option>
                                    <option>omr</option>
                                    <option>faruk</option>
                                </select>
                            </div>
                                <div class="col-md-12 mb-3">
                                        <level for="currency" class="form-label">Currency</level>
                                        <select class="form-select"disabled>
                                            <option>currency</option>
                                            <option>usd</option>
                                            <option>bdt</option>
                                        </select>
                                </div>
                                <div class="d-flex justify-content-between mb-3">
                                        <div class="col-md-5">
                                            <level for="tex1" class="form-label">Tax 1 (Stripe)</level>
                                            <select class="form-select">
                                                <option>Tex (18%)</option>
                                                <option>Tex (5%)</option>
                                                <option>Tex (10%)</option>
                                            </select>
                                        </div>
                                        <div class="col-md-5">
                                            <level for="tex2" class="form-label">Tax 2(Stripe)</level>
                                            <select class="form-select">
                                                <option>Tex (18%)</option>
                                                <option>Tex (5%)</option>
                                                <option>Tex (10%)</option>
                                            </select>
                                        </div>
                                        </div>
                                        <div class="mb-3 col-md-12">
                                            <label for="terms" class="form-label">Terms & Conditions:</label>
                                            <textarea id="terms" class="form-control" rows="4" placeholder="Enter customer terms &amp; conditions to be displayed to the customer before subscribe to the subscription."></textarea>
                                            </div>
                                            <div class="mb-3 col-md-12 text-md-end">
                                            <button type="submit" class="btn btn-primary text-right">Save</button>
                                        </div>
        </div>
        </div>
    </form>
    </div>
</div>
        
@endsection












