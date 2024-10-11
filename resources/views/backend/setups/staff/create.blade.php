@extends('backend.layouts.main')
@section('title', 'Create Staff')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
@endpush

@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">

                <div class="card-body">

                    <livewire:backend.setups.staff.create>

                </div>
            </div>
        </div>
    </div>
@endsection







