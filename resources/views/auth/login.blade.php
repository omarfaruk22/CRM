@extends('auth.layouts.main')
@section('title', 'Login')
@section('content')

    <div class="text-center mb-4">
        <p class="mb-0">Please log in to your account</p>
    </div>
    <div class="form-body">

        <livewire:auth.login>

            {{-- <div class="mt-3">
        <div class="text-center ">
            <p class="mb-0">Don't have an account yet? <a href="{{ route('register') }}">Sign up</a>
            </p>
        </div>
    </div> --}}
    </div>

@endsection
