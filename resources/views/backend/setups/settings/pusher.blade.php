@extends('backend.layouts.main')
@section('title', 'Customer Details')
@section('content')
    <div class="row">

        <div class="col-md-3">
            <h4 class="mt-3 mb-3">Settings</h4>
            @include('backend.partials.settings-sidebar')
        </div>

        <div class="col-md-9">

            <h4 class="mt-3 mb-3">Pusher.com</h4>

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
                    {{-- Billing and shipping start  --}}
                    <form action="{{ route('settings.pusher.update') }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="row">

                            <div class="col-md-12">
                                <label for="pusher_app_id" class="form-label">APP ID</label>
                                <input type="text" name="pusher_app_id" id="pusher_app_id" class="form-control mb-3"
                                    value="{{ $pusher_app_id->value }}">
                            </div>

                            <div class="col-md-12">
                                <label for="pusher_app_key" class="form-label">APP Key</label>
                                <input type="text" name="pusher_app_key" id="pusher_app_key" class="form-control mb-3"
                                    value="{{ $pusher_app_key->value }}">
                            </div>

                            <div class="col-md-12">
                                <label for="pusher_app_secret" class="form-label">APP Secret</label>
                                <input type="text" name="pusher_app_secret" id="pusher_app_secret"
                                    class="form-control mb-3" value="{{ $pusher_app_secret->value }}">
                            </div>

                            <div class="col-md-12">
                                <label for="pusher_cluster" class="form-label">Cluster
                                    https://pusher.com/docs/clusters</label>
                                <input type="text" name="pusher_cluster" id="pusher_cluster" class="form-control mb-3"
                                    value="{{ $pusher_cluster->value }}">
                            </div>

                            <div class="col-md-12">
                                <p>Enable Real Time Notifications</p>
                                <div class="mb-3 col-md-12 d-flex">
                                    <div class="me-2">
                                        <input class="form-check-input" type="radio" name="pusher_realtime_notifications"
                                            id="pusher_realtime_notifications1" value="1"
                                            @if ($pusher_realtime_notifications->value == 1) checked @endif>
                                        <label class="form-check-label" for="pusher_realtime_notifications1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="me-2">
                                        <input class="form-check-input" type="radio" name="pusher_realtime_notifications"
                                            id="pusher_realtime_notifications2" value="0"
                                            @if ($pusher_realtime_notifications->value != 1) checked @endif>
                                        <label class="form-check-label" for="pusher_realtime_notifications2">
                                            No
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <p> Enable Desktop Notifications</p>
                                <div class="mb-3 col-md-12 d-flex">
                                    <div class="me-2">
                                        <input class="form-check-input" type="radio" name="desktop_notifications"
                                            id="desktop_notifications1" value="1"
                                            @if ($desktop_notifications->value == 1) checked @endif>
                                        <label class="form-check-label" for="desktop_notifications1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="me-2">
                                        <input class="form-check-input" type="radio" name="desktop_notifications"
                                            id="desktop_notifications2" value="0"
                                            @if ($desktop_notifications->value != 1) checked @endif>
                                        <label class="form-check-label" for="desktop_notifications2">
                                            No
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="Separator" class="form-label">Auto Dismiss Desktop Notifications After X Seconds
                                    (0 to disable)</label>
                                <input type="text" class="form-control" name="auto_dismiss_desktop_notifications_after"
                                    id="auto_dismiss_desktop_notifications_after"
                                    value="{{ $auto_dismiss_desktop_notifications_after->value }}">
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
