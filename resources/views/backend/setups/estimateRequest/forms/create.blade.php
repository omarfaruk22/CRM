@extends('backend.layouts.main')
@section('title', 'Create Form')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
@endpush

@section('content')

    <div class="row">
        <div class="card">
            <div class="card-body">
                <p class="card-text">Create form first to be able to use the form builder.</p>
            </div>
        </div>
    </div>

    <livewire:backend.setups.estimaterequest.estimaterequestform>
        
@endsection
