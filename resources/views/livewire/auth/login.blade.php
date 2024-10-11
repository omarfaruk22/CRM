<div>
    @include('backend.partials.alert')
    <form class="row g-3" wire:submit="login">
        <div class="col-12">
            <label for="inputEmailAddress" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" wire:model.live="email" id="inputEmailAddress" placeholder="Enter Email">
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-12">
            <label for="inputChoosePassword" class="form-label">Password</label>
            <div class="input-group" id="show_hide_password">
                <input type="password" wire:model.live="password" class="form-control border-end-0 @error('password') is-invalid @enderror" id="inputChoosePassword" placeholder="Enter Password"> 
                <a href="javascript:;" class="input-group-text bg-transparent @error('password') border-danger @enderror"><i class='bx bx-hide'></i></a>
            </div>
            @error('password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-md-6">
            <div class="form-check form-switch">
                <input class="form-check-input" wire:model="remember" type="checkbox" id="flexSwitchCheckChecked">
                <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
            </div>
        </div>
        <div class="col-md-6 text-end">	<a href="{{ route('forget_passsword') }}">Forgot Password ?</a>
        </div>
        <div class="col-12">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Sign in</button>
            </div>
        </div>
    </form>
</div>
