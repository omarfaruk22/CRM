@extends('backend.layouts.main')
@section('title', 'Project Details')
@section('content')


				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Calender</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Calender - Date</li>
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
                <style>
                    #calendar {
                        width: 100%;
                        font-size: 24px;
                        text-align: center;
                    }
                </style>

                <div id="calendar"></div>
         


@endsection

@push('js')

<script>
    $(document).ready(function() {
        var date = new Date();
        var daysInMonth = new Date(date.getFullYear(), date.getMonth()+1, 0).getDate();
        var calendar = $('#calendar');
        calendar.append('<h2>' + (date.getMonth()+1) + '/' + date.getFullYear() + '</h2>');
        for (var i = 1; i <= daysInMonth; i++) {
            calendar.append(i + '<br>');
        }
    });
</script>
<script>
   
    {{-- Tooltips start  --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });

            tooltipTriggerList.forEach(function (tooltipTriggerEl) {
                tooltipTriggerEl.addEventListener('click', function () {
                    var tooltip = bootstrap.Tooltip.getInstance(tooltipTriggerEl);
                    tooltip.dispose();
                });
            });
        });
    </script>

    <script>
    function toggleDiv() {
        var div = document.getElementById('toggleDiv');
        if (div.style.display === 'none') {
        div.style.display = 'block';
        } else {
        div.style.display = 'none';
        }
    }
    </script>
    {{-- Tooltips end  --}}

@endpush
