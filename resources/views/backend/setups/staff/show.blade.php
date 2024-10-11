@extends('backend.layouts.main')
@section('title', 'View Staff')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
@endpush

@section('content')


    {{-- Top four card start  --}}
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-success">Total Logged Time</p>
                    <p class="card-text text-primary fw-bold">00:00</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-primary">Last Month Logged Time</p>
                    <p class="card-text text-primary fw-bold">00:00</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-success">This Month Logged Time</p>
                    <p class="card-text text-primary fw-bold">00:00</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-primary">Last Week Logged Time</p>
                    <p class="card-text text-primary fw-bold">00:00</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <p class="card-title text-success">This Week Logged Time</p>
                    <p class="card-text text-primary fw-bold">00:00</p>
                </div>
            </div>
        </div>
    </div>
    {{-- Top four card end  --}}

    <div class="row">

        {{-- Update staff start --}}
        <div class="col-md-5">
            <div class="card card-body">
                <form action="{{ route('setup.staff.update', $staffs->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="row g-2">

                        <div class="col-sm-12 border-bottom mb-3 mt-3">
                            <div class="form-check">
                                <input class="form-check-input" name="is_not_staff" type="checkbox" id="is_not_staff"
                                    value="1" {{ $staffs->is_not_staff == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_not_staff">Not Staff Member</label>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="role-select" class="form-label">Select Role</label>
                            <select name="role" class="form-select @error('role') is-invalid @enderror" id="role-select">
                                <option value="">Select role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" {{ $staffs->role == $role->id ? 'selected' : '' }}>
                                        {{ $role->name }}</option>
                                @endforeach
                            </select>
                            @error('role')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="{{ $staffs->profile_image == null ? 'col-md-12' : 'col-md-10' }} mb-3">
                            <label for="image" class="form-label">Profile Image</label>
                            <input type="file" name="image" class="form-control mb-2" id="image">
                        </div>

                        @if ($staffs->profile_image)
                            <div class="col-md-2">
                                <label for="" class="form-label"></label>
                                <img src="{{ asset('storage/users/' . $staffs->profile_image) }}" width="100%">
                            </div>
                        @endif

                        <div class="col-md-12 mb-3">
                            <label for="first_name" class="form-label"><span class="text-danger">*</span> First Name</label>
                            <input type="text" name="first_name" value="{{ $staffs->firstname }}"
                                class="form-control @error('first_name') is-invalid @enderror" id="first_name"
                                placeholder="First Name">
                            @error('first_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="last_name" class="form-label"><span class="text-danger">*</span> Last Name</label>
                            <input type="text" name="last_name" value="{{ $staffs->lastname }}"
                                class="form-control @error('last_name') is-invalid @enderror" id="last_name"
                                placeholder="Last Name">
                            @error('last_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="email" class="form-label"><span class="text-danger">*</span> Email</label>
                            <input type="email" name="email" value="{{ $staffs->email }}"
                                class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email"
                                value="">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <label for="hourly_rate" class="form-label pb-0">Hourly Rate</label>
                            <div class="input-group">
                                <input type="number" name="hourly_rate" value="{{ $staffs->hourly_rate }}"
                                    class="form-control" id="hourly_rate" placeholder="0.00">
                                <button class="btn btn-outline-secondary" type="button">$</button>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" name="phone" value="{{ $staffs->phone }}"
                                class="form-control @error('phone') is-invalid @enderror" id="phone"
                                placeholder="Phone Number">
                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="facebook" class="form-label"><i class="lni lni-facebook-filled"></i>
                                Facebook</label>
                            <input type="text" name="facebook" value="{{ $staffs->facebook }}"
                                class="form-control @error('facebook') is-invalid @enderror" id="facebook"
                                placeholder="Facebook">
                            @error('facebook')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="linkedIn" class="form-label"><i class="lni lni-linkedin-original"></i>
                                LinkedIn</label>
                            <input type="text" name="linkedIn" value="{{ $staffs->linkedin }}"
                                class="form-control @error('linkedIn') is-invalid @enderror" id="linkedIn"
                                placeholder="LinkedIn">
                            @error('linkedIn')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="skype" class="form-label"><i class="lni lni-skype"></i> Skype</label>
                            <input type="text" name="skype" value="{{ $staffs->skype }}"
                                class="form-control @error('skype') is-invalid @enderror" id="skype"
                                placeholder="Skype">
                            @error('skype')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="default_language" class="form-label">Default Language</label>
                            <select name="default_language" class="form-select" id="default_language">
                                <option>System Default</option>
                                @if ($languages->isNotEmpty())
                                    @foreach ($languages as $language)
                                        <option value="{{ $language->id }}"
                                            {{ $staffs->default_language == $language->id ? 'selected' : '' }}>
                                            {{ $language->name }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="email_signature" class="form-label">Email Signature</label>
                            <textarea name="email_signature" class="form-control @error('email_signature') is-invalid @enderror"
                                id="email_signature" placeholder="Email Signature" rows="3">{{ $staffs->email_signature }}</textarea>
                            @error('email_signature')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="direction" class="form-label">Direction</label>
                            <select name="direction" class="form-select" id="direction">
                                <option value="">Select Direction</option>
                                <option value="ltr" {{ $staffs->direction == 'ltr' ? 'selected' : '' }}>LTR</option>
                                <option value="rtl" {{ $staffs->direction == 'rtl' ? 'selected' : '' }}>RTL</option>
                            </select>
                        </div>

                        <hr>
                        <div class="col-sm-9">
                            <div class="form-check">
                                <input class="form-check-input" name="admin" type="checkbox" id="admin"
                                    name="admin" value="1" {{ $staffs->admin == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="admin">Administrator</label>
                            </div>
                        </div>


                        <div class="col-sm-9 mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="send-email" name="send-email">
                                <label class="form-check-label" for="send-email">Send welcome email</label>
                            </div>
                        </div>

                        <div class="input-group mb-4">
                            <label for="password" class="form-label pb-0"><span class="text-danger">*</span>
                                Password</label>
                            <div class="input-group">
                                <input type="password" name="password" value="{{ $staffs->password }}"
                                    class="form-control @error('password') is-invalid @enderror" id="password"
                                    placeholder="Password">
                                <button class="btn btn-outline-secondary toggle-password" type="button"><i
                                        class="lni lni-eye"></i></button>
                                <button class="btn btn-outline-secondary generate-password" type="button"><i
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
        </div>
        {{-- Update staff end --}}

        <div class="col-md-7">

            {{-- Notes Start  --}}
            <livewire:backend.setups.staff.notes :staffs="$staffs" />
            {{-- Notes End  --}}

            {{-- Timesheets and Reports start  --}}
            <div>
                <h4 class="mt-3">Timesheets & Reports</h4>
                <div class="card">
                    <div class="card-header pt-4">
                        <div class="input-group mb-3 col-md-6">
                            <select class="form-select" id="append-button-single-field"
                                data-placeholder="Choose one thing">
                                <option value="">Select...</option>
                                <option value="">This Month Logged Time</option>
                                <option value="">Last Month Logged Time</option>
                                <option value="">This Week Logged Time</option>
                                <option value="">Last Week Logged Time</option>
                                <option value="">Period</option>
                            </select>
                            <button class="btn btn-primary" type="button">Apply</button>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="d-flex justify-content-between py-4">

                            <div class="me-2 d-flex">
                                <div class="d-flex justify-content-end me-2">
                                    {{-- {{$customers->links()}} --}}
                                </div>
                                <div class="dropdown me-2">
                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">Export</button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Pdf</a>
                                        </li>
                                        <li><a class="dropdown-item" href="#">Excel</a></li>
                                    </ul>
                                </div>
                                <div>
                                    <a href="{{ route('setup.staff.index') }}"
                                        class="btn btn-outline-secondary me-2 mb-3">
                                        Reset
                                    </a>
                                </div>
                            </div>

                            <div class="">
                                <div class="d-flex">
                                    <div class="search-box">
                                        <form action="#" method="GET">
                                            <div class="input-group">
                                                <input type="search" name="keyword" id="search" class="form-control"
                                                    placeholder="Search Customer..." value="{{ request('keyword') }}">
                                                <button type="submit" class="btn btn-outline-secondary">
                                                    <i class="lni lni-search-alt"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="table-responsive mb-3">

                            <table class="table mb-0 table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">Task</th>
                                        <th scope="col">Start Time</th>
                                        <th scope="col">End Time</th>
                                        <th scope="col">Related</th>
                                        <th scope="col">Hourly Rate (Staff)</th>
                                        <th scope="col">Time (h)</th>
                                        <th scope="col">Time (Decimal)</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>John Doe</td>
                                        <td>johndoe@example.com</td>
                                        <td>Admin</td>
                                        <td>123-456-7890</td>
                                        <td>Yes</td>
                                        <td>Admin User</td>
                                        <td>Admin User</td>
                                        <td>
                                            <a href="">
                                                <span class="bx bx-show fs-5"></span>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>

                        <div class="d-flex justify-content-end">
                            {{-- {{$customers->links()}} --}}
                        </div>
                    </div>
                </div>
            </div>
            {{-- Timesheets and Reports end  --}}

            {{-- Projects start  --}}
            <div>
                <h4 class="mt-3">Projects</h4>
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between py-4">

                            <div class="me-2 d-flex">
                                <div class="d-flex justify-content-end me-2">
                                    {{-- {{$customers->links()}} --}}
                                </div>
                                <div class="dropdown me-2">
                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">Export</button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Pdf</a>
                                        </li>
                                        <li><a class="dropdown-item" href="#">Excel</a></li>
                                    </ul>
                                </div>
                                <div>
                                    <a href="{{ route('setup.staff.index') }}"
                                        class="btn btn-outline-secondary me-2 mb-3">
                                        Reset
                                    </a>
                                </div>
                            </div>

                            <div class="">
                                <div class="d-flex">
                                    <div class="search-box">
                                        <form action="#" method="GET">
                                            <div class="input-group">
                                                <input type="search" name="keyword" id="search" class="form-control"
                                                    placeholder="Search Customer..." value="{{ request('keyword') }}">
                                                <button type="submit" class="btn btn-outline-secondary">
                                                    <i class="lni lni-search-alt"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive mb-3">

                            <table class="table mb-0 table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">Project Name</th>
                                        <th scope="col">Start Date</th>
                                        <th scope="col">Deadline</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Project X</td>
                                        <td>2024-04-01</td>
                                        <td>2024-04-30</td>
                                        <td>In Progress</td>
                                        <td>
                                            <a href=""><span class="bx bx-show fs-5"></span></a>
                                            <a href=""><span class="bx bx-edit fs-5"></span></a>
                                            <a href=""><span class="bx bx-trash text-danger fs-5"></span></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-end">
                            {{-- {{$customers->links()}} --}}
                        </div>
                    </div>
                </div>
            </div>
            {{-- Projects end  --}}
        </div>
    </div>
@endsection

@push('js')
    <!-- Include Select2 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#role').select2({
                placeholder: 'Select an option',
                width: '100%'
            });
        });
    </script>


    {{-- Staff password start  --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const passwordInput = document.getElementById("password");
            const togglePasswordBtn = document.querySelector(".toggle-password");
            const generatePasswordBtn = document.querySelector(".generate-password");

            togglePasswordBtn.addEventListener("click", function() {
                const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
                passwordInput.setAttribute("type", type);
            });

            generatePasswordBtn.addEventListener("click", function() {
                const newPassword = Math.random().toString(36).slice(-8);
                passwordInput.value = newPassword;
            });
        });
    </script>
    {{-- Staff password end  --}}
@endpush
