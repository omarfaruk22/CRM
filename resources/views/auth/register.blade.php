@extends('auth.layouts.main')

@section('title', 'Register')

@section('content')
<div class="text-center mb-4">
    <p class="mb-0">Please enter your information</p>
</div>
<div class="form-body">
    
    <livewire:auth.register>
    
    <div class="mt-3">
        <div class="text-center ">
            <p class="mb-0"> Already have an account ? <a href="{{ route('login') }}">Login</a>
            </p>
        </div>
    </div>
</div>
@endsection