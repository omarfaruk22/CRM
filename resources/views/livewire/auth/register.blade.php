<div>
    @include('backend.partials.alert')
    <form class="row g-3" wire:submit="register">
        <div class="col-12">
            <label for="inputName" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model.live="name" id="inputName" placeholder="Enter Name">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-12">
            <label for="inputEmailAddress" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" wire:model.live="email" id="inputEmailAddress" placeholder="Enter Email">
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-12">
            <label for="inputphone" class="form-label">Phone</label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" wire:model.live="phone" id="inputphone" placeholder="Enter Phone">
            @error('phone')
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
        <div class="col-12">
            <label for="inputConfirmPassword" class="form-label"> Confirm Password</label>
            <div class="input-group" id="show_hide_password">
                <input type="password" wire:model.live="confirm_password" class="form-control border-end-0 @error('confirm_password') is-invalid @enderror" id="inputConfirmPassword" placeholder="Enter Password"> 
                <a href="javascript:;" class="input-group-text bg-transparent @error('confirm_password') border-danger @enderror"><i class='bx bx-hide'></i></a>
            </div>
            @error('confirm_password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-12">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
        </div>
    </form>
    {{-- <form>
        <fieldset>
            <label class="block clearfix">
                <span class="block input-icon input-icon-right">
                    <input type="text" wire:model.live="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" />
                    <i class="ace-icon fa fa-user"></i>
                </span>
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </label>
            <label class="block clearfix">
                <span class="block input-icon input-icon-right">
                    <input type="text" wire:model.live="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" />
                    <i class="ace-icon fa fa-envelope"></i>
                </span>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </label>
            <label class="block clearfix">
                <span class="block input-icon input-icon-right">
                    <input type="text" wire:model.live="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone" />
                    <i class="ace-icon fa fa-phone"></i>
                </span>
                @error('phone')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </label>
            <label class="block clearfix">
                <span class="block input-icon input-icon-right">
                    <input type="password" wire:model.live="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" />
                    <i class="ace-icon fa fa-lock"></i>
                </span>
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </label>
            <label class="block clearfix">
                <span class="block input-icon input-icon-right">
                    <input type="password" wire:model.live="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror" placeholder="Confirm Password" />
                    <i class="ace-icon fa fa-lock"></i>
                </span>
                @error('confirm_password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </label>
            <div class="clearfix">
                <button type="submit" class="width-100 pull-right btn btn-sm btn-primary">
                    <i class="ace-icon fa fa-key"></i>
                    <span class="bigger-110">Register</span>
                </button>
            </div>
            <div class="space-4"></div>
        </fieldset>
    </form> --}}
</div>
