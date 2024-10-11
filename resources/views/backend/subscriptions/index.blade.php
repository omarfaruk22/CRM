@extends('backend.layouts.main')
@section('title', 'Customers')
@section('content')

			<!--breadcrumb-->
			<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
				<div class="breadcrumb-title pe-3">Subscriptions</div>
				<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Subscriptions views</li>
							</ol>
						</nav>
				</div>
				<div class="ms-auto">
					<div class="btn-group">
							<button type="button" class="btn btn-primary">Settings</button>
							<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
							</button>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
								<a class="dropdown-item" href="javascript:;">Another action</a>
								<a class="dropdown-item" href="javascript:;">Something else here</a>
								<div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
							</div>
					</div>
				</div>
			</div>
				<!--end breadcrumb-->


                <div class="row">

                    <div class="d-flex justify-content-between">

                        <div class="">
                            <a href="{{ route('subscription.create') }}" class="btn btn-primary me-2 mb-3">
                                <i class="bx bx-plus"></i>
                                New Subscription
                            </a>
                            <button id="supportButton" class="btn btn-outline-dark me-2 mb-3">
                                <i class='bx bx-sort'></i>
                            </button>
                        </div>

                        <div class="">
                            <a href="" class="btn btn-outline-dark btn-sm">
                                <i class='bx bx-filter-alt m-0' ></i>
                            </a>
                        </div>
                    </div>
                </div>




                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h5> <i class='bx bxs-collection'></i> Subscriptions Summary</h5>
                            </div>
                            <div class="card-body">
                                <div class="status-row mt-4">
                                    <div class="status-item">
                                        <p><span class="fs-5">0</span> <span class="text-info fs-7 hov">Subscribed</span></p>
                                    </div>
                                    <div class="status-item">
                                        <p><span class="fs-5">0</span> <span class="text-success fs-7 hov">Active</span></p>
                                    </div>
                                    <div class="status-item">
                                        <p><span class="fs-5">0</span> <span class="text-success fs-7 hov">Future</span></p>
                                    </div>
                                    <div class="status-item">
                                        <p><span class="fs-5">0</span> <span class="text-warning fs-7 hov">Past Due</span></p>
                                    </div>
                                    <div class="status-item">
                                        <p><span class="fs-5">0</span> <span class="text-danger fs-7 hov">Unpaid</span></p>
                                    </div>
                                    <div class="status-item">
                                        <p><span class="fs-5">0</span> <span class="text-warning fs-7 hov">Incomplete</span></p>
                                    </div>
                                    <div class="status-item">
                                        <p><span class="fs-5">0</span> <span class="text-secondary fs-7 hov">Canceled</span></p>
                                    </div>
                                    <div class="status-item">
                                        <p><span class="fs-5">0</span> <span class="text-secondary fs-7 hov" >Incomplete Expired</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


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

                                        <div class="d-flex justify-content-end me-2">

                                        </div>
                                        <div class="dropdown me-2">
                                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Export</button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="{{ route('customers.export.pdf') }}">Pdf</a>
                                                </li>
                                                <li><a class="dropdown-item" href="{{ route('customers.export.excel') }}">Excel</a></li>
                                            </ul>
                                        </div>
                                        <div>
                                             <!-- Adding Reset button -->
                                             <button class='btn btn-outline-secondary' type='button' data-bs-toggle="tooltip" data-bs-placement="top" title="Reload"><i class='bx bx-reset'></i></button>
                                        </div>
                                    </div>

                                    <div class="">
                                        <div class="d-flex">
                                            <div class="search-box">
                                                <form action="{{ route('customers.search') }}" method="GET">
                                                    <div class="input-group">
                                                        <input type="search" name="keyword" id="search" class="form-control" placeholder="Search Customer..." value="{{ request('keyword') }}">
                                                        <button type="submit" class="btn btn-outline-secondary"><i class="lni lni-search-alt"></i></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive mb-3">

                                    {{-- error message start--}}
                                    @if(session('error'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            {{session('error')}}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif
                                    {{-- error message end --}}

                                    <table class="table mb-0 table-hover align-middle">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Subscription Name</th>
                                                <th scope="col">Customer</th>
                                                <th scope="col">Project Email</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Next Billing Cycle</th>
                                                <th scope="col">Date Subscribed</th>
                                                <th scope="col">Last Sent</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($subscriptions->isNotEmpty())
                                                @foreach ($subscriptions as $subscription)
                                                    <tr>
                                                        <th scope="row">{{$loop->iteration}}</th>
                                                        <th><p class="fs-6 text-secondary">{{ $subscription->name }}</p></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>

                                                        {{-- <td><a href="{{ route('customers.profile', $customer->id) }}">{{ $customer->company }}</a></td>
                                                        <td>{{ $customer->firstname}} {{ $customer->lastname}}</td>
                                                        <td>{{ $customer->email}}</td>
                                                        <td>{{ $customer->phonenumber}}</td>
                                                        <td>
                                                            @if ($customer->active == 1)
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input customer-checkbox" type="checkbox" id="flexSwitchCheckDefault" checked data-id="{{ $customer->id }}">
                                                                </div>
                                                            @else
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input customer-checkbox" type="checkbox" id="flexSwitchCheckDefault" data-id="{{ $customer->id }}">
                                                                </div>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($customer->groupid != NULL)
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
                                                        <td>{{ $customer->created_at}}</td>
                                                        <td>{{ $customer->updated_at}}</td> --}}
                                                        {{-- <td>
                                                            <a href="{{ route('customers.profile', $customer->id) }}">
                                                                <span class="bx bx-show fs-5"></span>
                                                            </a>
                                                            <a href="{{ route('customers.profile.contact', $customer->id) }}">
                                                                <span class="bx bxs-contact fs-5"></span>
                                                            </a>
                                                            <a href="{{ route('customers.delete', $customer->id) }}" onclick="return confirmDelete();">
                                                                <span class="bx bx-trash text-danger fs-5"></span>
                                                            </a>
                                                        </td> --}}
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                {{-- For pagination  --}}
                                <div class="d-flex justify-content-end">

                                </div>
                            </div>
                        </div>
                    </div>

                </div>


@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $(document).ready(function () {
            $('.customer-checkbox').change(function () {

                var isActive = this.checked ? 1 : 0;
                var id = $(this).data('id');

                $.ajax({
                    type: 'POST',
                    url: '{{ route('customers.updatestatus', ['id' => 'id']) }}' + id,
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    data: {
                        id: id,
                        isActive: isActive
                    },
                    success: function (response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Status updated Successfully',
                        });
                    },
                    error: function (xhr, error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>

    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this contact?");
        }
    </script>
@endpush
