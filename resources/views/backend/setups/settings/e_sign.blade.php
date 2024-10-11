@extends('backend.layouts.main')
@section('title', 'Customer Details')
@section('content')
    <div class="row">

        <div class="col-md-3">
            <h4 class="mt-3 mb-3">Settings</h4>
            @include('backend.partials.settings-sidebar')
        </div>

        <div class="col-md-9">

            <h4 class="mt-3 mb-3">E-sign</h4>

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
                        <form action="{{ route('settings.e_sign.update') }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="col-md-12">
                                <h6>Proposal</h6>
                                <p class="form">Require digital signature and identity confirmation on accept</p>
                                <div class="mb-3 col-md-12 d-flex">
                                    <div class="me-2">
                                        <input class="form-check-input" type="radio"
                                            name="proposal_accept_identity_confirmation"
                                            id="proposal_accept_identity_confirmation1" value="1"
                                            @if ($proposal_accept_identity_confirmation->value == 1) checked @endif>
                                        <label class="form-check-label" for="proposal_accept_identity_confirmation1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="me-2">
                                        <input class="form-check-input" type="radio"
                                            name="proposal_accept_identity_confirmation"
                                            id="proposal_accept_identity_confirmation2" value="0"
                                            @if ($proposal_accept_identity_confirmation->value != 1) checked @endif>
                                        <label class="form-check-label" for="proposal_accept_identity_confirmation2">
                                            No
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <h6 class="form">Estimate</h6>
                                <p>Require digital signature and identity confirmation on accept</p>
                                <div class="mb-3 col-md-12 d-flex">
                                    <div class="me-2">
                                        <input class="form-check-input" type="radio"
                                            name="estimate_accept_identity_confirmation"
                                            id="estimate_accept_identity_confirmation1" value="1"
                                            @if ($estimate_accept_identity_confirmation->value == 1) checked @endif>
                                        <label class="form-check-label" for="estimate_accept_identity_confirmation1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="me-2">
                                        <input class="form-check-input" type="radio"
                                            name="estimate_accept_identity_confirmation"
                                            id="estimate_accept_identity_confirmation2" value="0"
                                            @if ($estimate_accept_identity_confirmation->value != 1) checked @endif>
                                        <label class="form-check-label" for="estimate_accept_identity_confirmation2">
                                            No
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="e_sign_legal_text" class="form-label">Legal Bound Text</label>
                                <textarea class="form-control" name="e_sign_legal_text" id="e_sign_legal_text" rows="6">
                                    {{ $e_sign_legal_text->value }}
                                </textarea>
                            </div>

                            <div class="col-md-12 mb-3 text-end">
                                <button type="submit" class="btn btn-primary">Save Settings</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
