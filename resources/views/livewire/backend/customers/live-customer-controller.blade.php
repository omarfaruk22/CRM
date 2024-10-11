<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-4">

                        <div class="me-2 d-flex">
                            <div class="me-2">
                                <select class="form-select" wire:model.live="size" name="size">
                                    <option value="5">5</option>
                                    <option selected value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>

                            <div class="dropdown me-2">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">Export</button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('customers.export.pdf') }}">Pdf</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('customers.export.excel') }}">Excel</a>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <a href="{{ route('customers.index') }}" class="btn btn-outline-secondary me-2 mb-3">
                                    Reset
                                </a>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="search-box">
                                <input type="text" wire:model.live="search" class="form-control" id=""
                                    autocomplete="off" placeholder="Search...">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                    </div>
                    {{-- For pagination  --}}
                    <div class="my-4">{{ $customers->links('vendor.livewire.bootstrap') }}</div>

                    <div class="table-responsive mb-3">

                        {{-- error message start --}}
                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        {{-- error message end --}}
                        @if ($customers->isNotEmpty())

                            <table class="table mb-0 table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Company</th>
                                        <th scope="col">Primary Contact</th>
                                        <th scope="col">Primary Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Groups</th>
                                        <th scope="col">Created By</th>
                                        <th scope="col">Updated By</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col">Updated At</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php
                                        $iterationCount = 0;
                                    @endphp


                                    @foreach ($customers as $customer)
                                        @php $iterationCount++; @endphp
                                        <tr>
                                            <th scope="row">
                                                {{ ($customers->currentPage() - 1) * $customers->perPage() + $loop->iteration }}
                                            </th>
                                            <td><a
                                                    href="{{ route('customers.profile', ['id' => $customer->id]) }}">{{ $customer->company }}</a>
                                            </td>
                                            <td> @php
                                                $contact = DB::table('contacts')
                                                    ->where('customer_id', $customer->id)
                                                    ->first();
                                            @endphp
                                                @if ($contact)
                                                    {{ $contact->firstname }} {{ $contact->lastname }}
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td>{{ $customer->email }}</td>
                                            <td>{{ $customer->phonenumber }}</td>
                                            <td>
                                                @if ($customer->active == 1)
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input customer-checkbox"
                                                            type="checkbox" id="flexSwitchCheckDefault" checked
                                                            data-id="{{ $customer->id }}">
                                                    </div>
                                                @else
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input customer-checkbox"
                                                            type="checkbox" id="flexSwitchCheckDefault"
                                                            data-id="{{ $customer->id }}">
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($customer->groupid != null)
                                                    @php $groupIds = explode(',', $customer->groupid); @endphp
                                                    @foreach ($groupIds as $groupId)
                                                        @php $customerGroup = DB::table('customers_groups')->where('id', $groupId)->first(); @endphp
                                                        @if ($customerGroup)
                                                            <span class="chip bg-secondary text-white">
                                                                {{ $customerGroup->gname }}
                                                            </span>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                @if (Auth::user()->id == $customer->created_by)
                                                    {{ Auth::user()->name }}
                                                @endif
                                            </td>
                                            <td>
                                                @if (Auth::user()->id == $customer->updated_by)
                                                    {{ Auth::user()->name }}
                                                @endif
                                            </td>

                                            <td>{{ \Carbon\Carbon::parse($customer->created_at)->format('d M Y h:i A') }}
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($customer->updated_at)->format('d M Y h:i A') }}
                                            </td>

                                            <td>
                                                <a href="{{ route('customers.profile', $customer->id) }}">
                                                    <span class="bx bx-show fs-5"></span>
                                                </a>
                                                <a href="{{ route('customers.profile.contact', $customer->id) }}">
                                                    <span class="bx bxs-contact fs-5"></span>
                                                </a>
                                                <a href="{{ route('customers.delete', $customer->id) }}"
                                                    onclick="return confirmDelete();">
                                                    <span class="bx bx-trash text-danger fs-5"></span>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        @else
                            <div class="card bg-primary text-white my-4">
                                <div class="card-body text-center">
                                    <p class="fs-6 font-weight-bold mb-0">
                                        No Customer under:
                                        <a href="#"
                                            class="text-white font-weight-bold">{{ Auth::user()->name }}</a>
                                    </p>
                                </div>
                            </div>
                        @endif
                    </div>
                    {{-- For pagination  --}}
                    <div class="my-4">{{ $customers->links('vendor.livewire.bootstrap') }}</div>

                </div>
            </div>
        </div>

    </div>
</div>
