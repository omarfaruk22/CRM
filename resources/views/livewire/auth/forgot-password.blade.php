<div>
	<form class="row g-3" wire:submit="forgot_password">
        <div class="col-12">
            <label for="inputEmailAddress" class="form-label">Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" wire:model.live="email" id="inputEmailAddress" placeholder="Email address">
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-12">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

		<div class="col-12">
			<div class="text-center ">
				<p class="mb-0">Wait i remember my password...<a href="{{ route('login') }}">Click</a>
				</p>
			</div>
		</div>

    </form>
</div











