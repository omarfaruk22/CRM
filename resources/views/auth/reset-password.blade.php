@extends('auth.layouts.main')
@section('title', 'Login')
@section('content')

    <div class="text-center mb-4">
        <p class="mb-0">Please reset your password</p>
    </div>

    <div class="form-body">
        <div>
            <form class="row g-3" action="{{ route('processResetPassword') }}" method="post">
                @csrf

                <input class="form-group" type="hidden" name="token" value="{{$token}}">

                <div class="col-12">
                    <label for="inputChoosePassword" class="form-label">New Password</label>
                    <div class="input-group" id="show_hide_password">
                                    <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                    placeholder="New Password" name="new_password" value="">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-12">
                    <label for="inputChoosePassword" class="form-label">Confirm Password</label>
                    <div class="input-group" id="show_hide_password">
                                    <input type="password" class="form-control @error('confirm_password') is-invalid @enderror"
                    placeholder="Confirm Password" name="confirm_password" value="">
                        @error('confirm_password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>


                <div class="col-12">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection

















