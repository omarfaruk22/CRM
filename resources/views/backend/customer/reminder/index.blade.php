@extends('backend.layouts.main')
@section('title', 'Customer Details')
@section('content')

    {{-- edit modal end --}}
    <div class="row">
        <div class="col-md-3">
            <h4 class="mt-3 mb-3"># {{ $customer->id }} || {{ $customer->company }}</h4>
            @include('backend.partials.profile-sidebar')
        </div>

        <div class="col-md-9">
            <livewire:backend.reminder.reminder-set :customer_id="$customer->id" />
        </div>

    </div>

@endsection
