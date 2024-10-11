<div>
    <form wire:submit="store">
        <div class="row g-2">

            <div class="col-sm-12 border-bottom mb-3 mt-3">
                <div class="form-check">
                    <input class="form-check-input" wire:model.live="is_not_staff" type="checkbox" id="is_not_staff">
                    <label class="form-check-label" for="is_not_staff">Not Staff Member</label>
                </div>
            </div>

            <div class="col-md-12 mb-3">
                <label for="role-select" class="form-label">Select Role</label>
                <select name="role" wire:model="role" class="form-select @error('role') is-invalid @enderror"
                    id="role-select">
                    <option value="">Select role</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                @error('role')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="{{ $image == null ? 'col-md-12' : 'col-md-10' }} mb-3">
                <label for="image" class="form-label">Profile Image</label>
                <input type="file" wire:model="image" name="image" class="form-control mb-2" id="image">
            </div>

            @if ($image != null)
                <div class="col-md-2">
                    <img style="width: 100%" src="{{ $image->temporaryUrl() }}" alt="">
                </div>
            @endif

            <div class="col-md-12 mb-3">
                <label for="first_name" class="form-label"><span class="text-danger">*</span> First Name</label>
                <input type="text" name="first_name" wire:model.live="first_name"
                    class="form-control @error('first_name') is-invalid @enderror" id="first_name"
                    placeholder="First Name">
                @error('first_name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-md-12 mb-3">
                <label for="last_name" class="form-label"><span class="text-danger">*</span> Last Name</label>
                <input type="text" name="last_name" wire:model.live="last_name"
                    class="form-control @error('last_name') is-invalid @enderror" id="last_name"
                    placeholder="Last Name">
                @error('last_name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-md-12 mb-3">
                <label for="email" class="form-label"><span class="text-danger">*</span> Email</label>
                <input type="email" name="email" wire:model.live="email"
                    class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email"
                    value="">
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="input-group mb-3">
                <label for="hourly_rate" class="form-label pb-0">Hourly Rate</label>
                <div class="input-group">
                    <input type="number" name="hourly_rate" wire:model.live="hourly_rate" class="form-control"
                        id="hourly_rate" placeholder="0.00">
                    <button class="btn btn-outline-secondary" type="button">$</button>
                </div>
            </div>

            <div class="col-md-12 mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" name="phone" wire:model.live="phone"
                    class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="Phone Number">
                @error('phone')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-md-12 mb-3">
                <label for="facebook" class="form-label"><i class="lni lni-facebook-filled"></i> Facebook</label>
                <input type="text" name="facebook" wire:model.live="facebook"
                    class="form-control @error('facebook') is-invalid @enderror" id="facebook" placeholder="Facebook">
                @error('facebook')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-md-12 mb-3">
                <label for="linkedIn" class="form-label"><i class="lni lni-linkedin-original"></i> LinkedIn</label>
                <input type="text" name="linkedIn" wire:model.live="linkedIn"
                    class="form-control @error('linkedIn') is-invalid @enderror" id="linkedIn"
                    placeholder="LinkedIn">
                @error('linkedIn')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-md-12 mb-3">
                <label for="skype" class="form-label"><i class="lni lni-skype"></i> Skype</label>
                <input type="text" name="skype" wire:model.live="skype"
                    class="form-control @error('skype') is-invalid @enderror" id="skype" placeholder="Skype">
                @error('skype')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-md-12 mb-3">
                <label for="default_language" class="form-label">Default Language</label>
                <select name="default_language" wire:model.live="default_language" class="form-select"
                    id="default_language">
                    <option>System Default</option>
                    @if ($languages->isNotEmpty())
                        @foreach ($languages as $language)
                            <option value="{{ $language->id }}">{{ $language->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <div class="col-md-12 mb-3">
                <label for="email-signature" class="form-label">Email Signature</label>
                <textarea name="email-signature" wire:model.live="email_signature" class="form-control" id="email-signature"
                    placeholder="Email Signature" rows="3"></textarea>
            </div>

            <div class="col-md-12 mb-3">
                <label for="direction" class="form-label">Direction</label>
                <select name="direction" wire:model.live="direction" class="form-select" id="direction">
                    <option value="">Select Direction</option>
                    <option value="ltr">LTR</option>
                    <option value="rtl">RTL</option>
                </select>
            </div>

            <hr>
            <div class="col-sm-9">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" wire:model.live="administrator"
                        id="administrator" name="administrator">
                    <label class="form-check-label" for="administrator">Administrator</label>
                </div>
            </div>

            <div class="col-sm-9 mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" wire:model.live="send_email" id="send-email"
                        name="send-email">
                    <label class="form-check-label" for="send-email">Send welcome email</label>
                </div>
            </div>

            <div class="input-group mb-4">
                <label for="password" class="form-label pb-0"><span class="text-danger">*</span> Password</label>
                <div class="input-group">
                    <input type="{{ $show_password == 1 ? 'text' : 'password' }}" name="password"
                        wire:model="password" class="form-control @error('password') is-invalid @enderror"
                        id="password" placeholder="Password">
                    @if ($show_password == 1)
                        <button class="btn btn-outline-secondary" wire:click="password_hide" type="button"><i
                                class="lni lni-eye"></i></button>
                    @else
                        <button class="btn btn-outline-secondary" wire:click="password_show" type="button"><i
                                class="lni lni-eye"></i></button>
                    @endif
                    <button class="btn btn-outline-secondary" wire:click="password_generate" type="button"><i
                            class="lni lni-reload"></i></button>
                </div>
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-md-12 d-flex justify-content-end gap-3">
                <button type="submit" class="btn btn-primary px-2">Save</button>
            </div>
        </div>
    </form>

</div>


@push('js')
    <!-- Include Select2 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#role').select2({
                placeholder: 'Select Role',
                width: '100%'
            });

            $('#role').on('change', function() {
                let data = $(this).val();

                @this.set('role_id', data);
            });
        });
    </script>
@endpush
