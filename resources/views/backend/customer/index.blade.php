@extends('backend.layouts.main')
@section('title', 'Customers')
@section('content')

    <div class="row">

        <div class="d-flex justify-content-between">

            <div class="">
                <a href="{{ route('customers.create') }}" class="btn btn-primary me-2 mb-3">
                    <i class="bx bx-plus"></i>
                    New Customer
                </a>
                <a href="{{ route('customers.import_customer') }}" class="btn btn-primary me-2 mb-3">
                    <i class='bx bx-upload'></i>
                    Import Customer
                </a>

                <a href="{{ route('customers.contact') }}" class="btn btn-white btn-outline-secondary me-2 mb-3">
                    <i class='bx bx-user-circle'></i>
                    Contacts
                </a>
            </div>

            <div class="">
                <a href="" class="btn btn-outline-dark btn-sm">
                    <i class='bx bx-filter-alt m-0'></i>
                </a>
            </div>
        </div>

    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5> <i class='bx bxs-collection'></i> Customers Summary</h5>
                </div>
                <div class="card-body">
                    <div class="status-row mt-4">
                        <div class="status-item">
                            <p><span class="fs-5">{{ $totalCustomers }}</span> <span class="text-info fs-7 hov">Total
                                    Customers</span></p>
                        </div>
                        <div class="status-item">
                            <p><span class="fs-5">{{ $activeCustomers }}</span> <span class="text-success fs-7 hov">Active
                                    Customers</span></p>
                        </div>
                        <div class="status-item">
                            <p><span class="fs-5">{{ $inactiveCustomers }}</span> <span
                                    class="text-danger fs-7 hov">Inactive Customers</span></p>
                        </div>
                        <div class="status-item">
                            <p><span class="fs-5">{{ $totalContacts }}</span> <span class="text-info fs-7 hov">Total
                                    Contacts</span></p>
                        </div>
                        <div class="status-item">
                            <p><span class="fs-5">{{ $activeContacts }}</span> <span class="text-success fs-7 hov">Active
                                    Contacts</span></p>
                        </div>
                        <div class="status-item">
                            <p><span class="fs-5">{{ $inactiveContacts }}</span> <span
                                    class="text-danger fs-7 hov">Inactive Contacts</span></p>
                        </div>
                        <div class="status-item">
                            <p><span class="fs-5">{{ $loggedInContacts }}</span> <span class="text-info fs-7 hov">Contacts
                                    Logged In</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <livewire:backend.customers.live-customer-controller/>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $(document).ready(function() {
            $('.customer-checkbox').change(function() {

                var isActive = this.checked ? 1 : 0;
                var id = $(this).data('id');

                $.ajax({
                    type: 'POST',
                    url: '{{ route('customers.updatestatus', ['id' => 'id']) }}' + id,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        id: id,
                        isActive: isActive
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Status updated Successfully',
                        });
                    },
                    error: function(xhr, error) {
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
