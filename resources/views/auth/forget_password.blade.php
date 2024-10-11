@extends('auth.layouts.main')
@section('title', 'Forgot Password')
@section('content')

<div class="text-center mb-4">
    <p class="mb-0">Please provide your authorized email address</p>
</div>
<div class="form-body">
    
    <livewire:auth.forgot-password>
    
</div>

@endsection