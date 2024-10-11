<!-- Modal -->
<div class="modal fade" id="convertToCustomerModal" tabindex="-1" aria-labelledby="convertToCustomerModalLabel2"
    aria-hidden="true" data-bs-backdrop="static" wire:ignore.self>
    <div class="modal-dialog" style="min-width: 50%">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="convertToCustomerModalLabel2">Convert TO Customer</h5>
                <button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit="updateLeadTOCustomer">
                    <!-- First Name -->
                    <div class="mb-3">
                        <label for="first_name" class="form-label"><span class="text-danger"> * </span> First
                            Name</label>
                        <input type="text" class="form-control @error('firstname') is-invalid @enderror"
                            id="firstname" wire:model="firstname" required>
                        @error('firstname')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Last Name -->
                    <div class="mb-3">
                        <label for="last_name" class="form-label"><span class="text-danger"> * </span> Last Name</label>
                        <input type="text" class="form-control @error('lastname') is-invalid @enderror"
                            id="lastname" wire:model="lastname" required>
                        @error('lastname')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Position -->
                    <div class="mb-3">
                        <label for="position" class="form-label">Position</label>
                        <input type="text" class="form-control @error('position') is-invalid @enderror"
                            id="position" wire:model="position">
                        @error('position')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label"><span class="text-danger"> * </span> Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            wire:model="email" required>
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Company -->
                    <div class="mb-3">
                        <label for="company" class="form-label">Company</label>
                        <input type="text" class="form-control @error('company') is-invalid @enderror" id="company"
                            wire:model="company">
                        @error('company')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Phone -->
                    <div class="mb-3">
                        <label for="phonenumber" class="form-label">Phone</label>
                        <input type="tel" class="form-control @error('phonenumber') is-invalid @enderror"
                            id="phonenumber" wire:model="phonenumber">
                        @error('phonenumber')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Website -->
                    <div class="mb-3">
                        <label for="website" class="form-label">Website</label>
                        <input type="text" class="form-control @error('website') is-invalid @enderror" id="website"
                            wire:model="website">
                        @error('website')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Address -->
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control @error('address') is-invalid @enderror" id="address" wire:model="address"></textarea>
                        @error('address')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- City -->
                    
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control @error('city') is-invalid @enderror" id="city"
                            wire:model="city" readonly>
                        @error('city')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- State -->
                    <div class="mb-3">
                        <label for="state" class="form-label">State</label>
                        <input type="text" class="form-control @error('state') is-invalid @enderror" id="state"
                            wire:model="state" readonly>
                        @error('state')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Country -->
                    <div class="mb-3 col">
                        <label for="country" class="form-label">Country</label>
                        <select class="form-control @error('country') is-invalid @enderror" id="country"
                            name="country" wire:model="country" required>
                            <option>-- Select Country --</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->short_name }}</option>
                            @endforeach
                        </select>
                        @error('country')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- ZIP -->
                    <div class="mb-3">
                        <label for="zip" class="form-label">ZIP</label>
                        <input type="text" class="form-control @error('zip') is-invalid @enderror" id="zip"
                            wire:model="zip">
                        @error('zip')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <!-- Password -->
                    <div class="mb-3" id="passwordSection">
                        <label for="password" class="form-label"><span class="text-danger"> * </span>
                            Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" wire:model="password" required>
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Send Set Password Email Checkbox -->
                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="send_set_password_email"
                            wire:model="send_set_password_email">
                        <label class="form-check-label" for="password_email">Send SET password email</label>
                    </div>

                    <!-- Do Not Send Welcome Email Checkbox -->
                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="do_not_send_welcome_email"
                            wire:model="do_not_send_welcome_email">
                        <label class="form-check-label" for="do_not_send_welcome_email">Do not send welcome
                            email</label>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" wire:click="closeModal"
                    data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Customer</button>
            </div>
            </form>
        </div>
    </div>
</div>
