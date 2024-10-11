@extends('backend.layouts.main')
@section('title', 'Customer Details')
@section('content')
    <div class="row">

        <div class="col-md-3">
            <h4 class="mt-3 mb-3">Settings</h4>
            @include('backend.partials.settings-sidebar')
        </div>

        <div class="col-md-9">

            <h4 class="mt-3 mb-3">Subscriptions</h4>

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
                    <div class="row">
                        {{-- Billing and shipping start  --}}
                        <form action="{{ route('settings.subscription.update') }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <div class="col-md-12">
                                <p class="form">Show subscriptions in customers area?</p>
                                <div class="mb-3 col-md-12 d-flex">
                                    <div class="me-2">
                                        <input class="form-check-input" type="radio"
                                            name="show_subscriptions_in_customers_area"
                                            id="show_subscriptions_in_customers_area1" value="1"
                                            @if ($show_subscriptions_in_customers_area->value == 1) checked @endif>
                                        <label class="form-check-label" for="show_subscriptions_in_customers_area1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="me-2">
                                        <input class="form-check-input" type="radio"
                                            name="show_subscriptions_in_customers_area"
                                            id="show_subscriptions_in_customers_area2" value="0"
                                            @if ($show_subscriptions_in_customers_area->value != 1) checked @endif>
                                        <label class="form-check-label" for="show_subscriptions_in_customers_area2">
                                            No
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <h5 class="form">After subscription payment is succeeded</h5>
                                <div class="mb-3 col-md-12">
                                    <div class="me-2">
                                        <input class="form-check-input" type="radio"
                                            name="after_subscription_payment_captured"
                                            id="after_subscription_payment_captured1" value="send_invoice_and_receipt"
                                            @if ($after_subscription_payment_captured->value == 'send_invoice_and_receipt') checked @endif>
                                        <label class="form-check-label" for="after_subscription_payment_captured1">
                                            Send Invoice and Payment Receipt
                                        </label>
                                    </div>
                                    <div class="me-2">
                                        <input class="form-check-input" type="radio"
                                            name="after_subscription_payment_captured"
                                            id="after_subscription_payment_captured2" value="send_invoice"
                                            @if ($after_subscription_payment_captured->value == 'send_invoice') checked @endif>
                                        <label class="form-check-label" for="after_subscription_payment_captured2">
                                            Send Invoice
                                        </label>
                                    </div>
                                    <div class="me-2">
                                        <input class="form-check-input" type="radio"
                                            name="after_subscription_payment_captured"
                                            id="after_subscription_payment_captured3" value="send_payment_receipt"
                                            @if ($after_subscription_payment_captured->value == 'send_payment_receipt') checked @endif>
                                        <label class="form-check-label" for="after_subscription_payment_captured3">
                                            Send Payment Receipt
                                        </label>
                                    </div>
                                    <div class="me-2">
                                        <input class="form-check-input" type="radio"
                                            name="after_subscription_payment_captured"
                                            id="after_subscription_payment_captured4" value="nothing"
                                            @if ($after_subscription_payment_captured->value == 'nothing') checked @endif>
                                        <label class="form-check-label" for="after_subscription_payment_captured4">
                                            Do Nothing
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <p>Email Template: Subscription Payment Succeeded</p>

                            <div class="col-md-12 mb-3 text-end">
                                <button type="submit" class="btn btn-primary">Save Settings</button>
                            </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
