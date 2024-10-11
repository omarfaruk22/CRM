@extends('backend.layouts.main')
@section('title', 'Forms')
@section('content')

<div class="row">

    <div class="col-md-10">
        <a href="{{ route('setup.estimate_request.forms.create') }}" class="btn btn-primary me-2 mb-3">
            <i class="bx bx-plus"></i>
            New Form
        </a>
    </div>

    <div class="col-md-12">
        <div class="card">

            <div class="card-header">
                <div class="d-flex justify-content-between py-4">

                    <div class="me-2 d-flex">
                        <div class="d-flex justify-content-end me-2">
                            {{-- {{$customers->links()}} --}}
                        </div>
						<div class="dropdown me-2">
							<button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Export</button>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="#">Pdf</a>
								</li>
                                <li><a class="dropdown-item" href="#">Excel</a></li>
							</ul>
						</div>
                        <div>
                            <a href="{{ route('setup.staff.index') }}" class="btn btn-outline-secondary me-2 mb-3">
                                Reset
                            </a>
                        </div>
                    </div>

                    <div class="">
                        <div class="d-flex">
                            <div class="search-box">
                                <form action="#" method="GET">
                                    <div class="input-group">
                                        <input type="search" name="keyword" id="search" class="form-control" placeholder="Search Customer..." value="{{ request('keyword') }}">
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
                    
                    {{-- error message start --}}
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
                                <th scope="col">ID</th>
                                <th scope="col">Form Name</th>
                                <th scope="col">Total Submissions</th>
                                <th scope="col">Created By</th>
                                <th scope="col">Updated By</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Updated At</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="{{ route('setup.estimate_request.forms.show') }}">John Doe</a></td>
                                <td>johndoe@example.com</td>
                                <td>Admin</td>
                                <td>Admin User</td>
                                <td>Admin User</td>
                                <td>2024-04-17</td>
                                <td>2024-04-17</td>
                                <td>
                                    <a href="{{ route('setup.estimate_request.forms.show') }}">
                                        <span class="bx bx-show fs-5"></span>
                                    </a>
                                    <a href="{{ route('setup.estimate_request.forms.edit') }}">
                                        <span class="bx bx-edit fs-5"></span>
                                    </a>
                                    <a href="">
                                        <span class="bx bx-trash text-danger fs-5"></span>
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