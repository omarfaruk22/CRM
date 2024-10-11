@extends('backend.layouts.main')
@section('title', 'Contract')
@section('content')

<div class="row">

    <div class="d-flex justify-content-between">

        <div class="">
            <a href="{{ route('main.contract.info.create') }}" class="btn btn-primary me-2 mb-3">
                <i class="bx bx-plus"></i>
                New Contract
            </a>

        </div>

        <div class="">
            <a href="" class="btn btn-outline-dark btn-sm">
                <i class='bx bx-filter-alt m-0' ></i>
            </a>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5> <i class='bx bxs-collection'></i> Contract Summary</h5>
            </div>
            <div class="card-body">
                <div class="status-row mt-4">
                    <div class="status-item">
                        <p>
                            <span class="fs-5">@if (isset($totalContracts)) {{ $totalContracts }}@else No Data @endif</span>
                            <span class="text-info fs-7 hov">Active</span>
                        </p>
                    </div>
                    <div class="status-item">
                        <p>
                            <span class="fs-5">@if (isset($expired)) {{ $expired }} @else No Data @endif </span>
                             <span class="text-danger fs-7 hov">Expired</span>
                            </p>
                    </div>
                    <div class="status-item">
                        <p>
                            <span class="fs-5">@if (isset($abouttoexpire)) {{ $abouttoexpire }} @else No Data @endif  </span>
                            <span class="text-warning fs-7 hov">About to Expire</span>
                        </p>
                    </div>
                    <div class="status-item">
                        <p>
                            <span class="fs-5">@if (isset($recentlyadded)) {{ $recentlyadded }} @else No Data @endif </span>
                            <span class="text-success fs-7 hov">Recently Added</span>
                        </p>
                    </div>
                    <div class="status-item">
                        <p><span class="fs-5">@if (isset($trash)) {{ $trash }} @else <span class="text-danger">No Data</span> @endif</span> <span class="text-secondary fs-7 hov">Trash</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="card-body">
    <div id="chart1"></div>
</div> --}}
<div class="section">
    <div class="card">

     <div class="row">
           <div class="col-md-6">
            <div id="chart1"></div>
        </div>
        <div class="col-md-6">
            <canvas id="chart2" class=""></canvas>
        </div>
     </div>

</div>

</div>
@endsection

@push('js')
<script>
    var ctx1 = document.getElementById('chart1').getContext('2d');
    var chart1 = new Chart(ctx1, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June'],
            datasets: [{
                label: 'Dataset 1',
                data: [10, 20, 30, 40, 50, 60],
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        }
    });

    var ctx2 = document.getElementById('chart2').getContext('2d');
    var chart2 = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June'],
            datasets: [{
                label: 'Dataset 2',
                data: [60, 50, 40, 30, 20, 10],
                borderColor: 'rgb(255, 99, 132)',
                tension: 0.1
            }]
        }
    });
    </script>

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
