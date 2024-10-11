@extends('backend.layouts.main')
@section('title', 'Staff')
@section('content')

<div class="row">

    <div class="col-md-10">
        <a href="{{ route('setup.staff.create') }}" class="btn btn-primary me-2 mb-3">
            <i class="bx bx-plus"></i> New Staff Member
        </a>
    </div>

    <div class="col-md-12">
        <livewire:backend.setups.staff.index>
    </div>    
</div>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $(document).ready(function () {
            $('.staff-checkbox').change(function () {

                var isActive = this.checked ? 1 : 0;
                var id = $(this).data('id');
                
                $.ajax({

                    type: 'POST',
                    url: '{{ route('staff.updatestatus', ['id' => 'id']) }}' + id,
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